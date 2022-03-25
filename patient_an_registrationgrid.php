<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($patient_an_registration_grid))
	$patient_an_registration_grid = new patient_an_registration_grid();

// Run the page
$patient_an_registration_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_an_registration_grid->Page_Render();
?>
<?php if (!$patient_an_registration->isExport()) { ?>
<script>

// Form object
var fpatient_an_registrationgrid = new ew.Form("fpatient_an_registrationgrid", "grid");
fpatient_an_registrationgrid.formKeyCountName = '<?php echo $patient_an_registration_grid->FormKeyCountName ?>';

// Validate form
fpatient_an_registrationgrid.validate = function() {
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
		<?php if ($patient_an_registration_grid->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->id->caption(), $patient_an_registration->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->pid->Required) { ?>
			elm = this.getElements("x" + infix + "_pid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->pid->caption(), $patient_an_registration->pid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_pid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_an_registration->pid->errorMessage()) ?>");
		<?php if ($patient_an_registration_grid->fid->Required) { ?>
			elm = this.getElements("x" + infix + "_fid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->fid->caption(), $patient_an_registration->fid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_fid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_an_registration->fid->errorMessage()) ?>");
		<?php if ($patient_an_registration_grid->G->Required) { ?>
			elm = this.getElements("x" + infix + "_G");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->G->caption(), $patient_an_registration->G->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->P->Required) { ?>
			elm = this.getElements("x" + infix + "_P");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->P->caption(), $patient_an_registration->P->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->L->Required) { ?>
			elm = this.getElements("x" + infix + "_L");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->L->caption(), $patient_an_registration->L->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->A->Required) { ?>
			elm = this.getElements("x" + infix + "_A");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->A->caption(), $patient_an_registration->A->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->E->Required) { ?>
			elm = this.getElements("x" + infix + "_E");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->E->caption(), $patient_an_registration->E->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->M->Required) { ?>
			elm = this.getElements("x" + infix + "_M");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->M->caption(), $patient_an_registration->M->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->LMP->Required) { ?>
			elm = this.getElements("x" + infix + "_LMP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->LMP->caption(), $patient_an_registration->LMP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->EDO->Required) { ?>
			elm = this.getElements("x" + infix + "_EDO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->EDO->caption(), $patient_an_registration->EDO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->MenstrualHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_MenstrualHistory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->MenstrualHistory->caption(), $patient_an_registration->MenstrualHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->MaritalHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_MaritalHistory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->MaritalHistory->caption(), $patient_an_registration->MaritalHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->ObstetricHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_ObstetricHistory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->ObstetricHistory->caption(), $patient_an_registration->ObstetricHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->PreviousHistoryofGDM->Required) { ?>
			elm = this.getElements("x" + infix + "_PreviousHistoryofGDM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->PreviousHistoryofGDM->caption(), $patient_an_registration->PreviousHistoryofGDM->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->PreviousHistorofPIH->Required) { ?>
			elm = this.getElements("x" + infix + "_PreviousHistorofPIH");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->PreviousHistorofPIH->caption(), $patient_an_registration->PreviousHistorofPIH->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->PreviousHistoryofIUGR->Required) { ?>
			elm = this.getElements("x" + infix + "_PreviousHistoryofIUGR");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->PreviousHistoryofIUGR->caption(), $patient_an_registration->PreviousHistoryofIUGR->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->PreviousHistoryofOligohydramnios->Required) { ?>
			elm = this.getElements("x" + infix + "_PreviousHistoryofOligohydramnios");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->PreviousHistoryofOligohydramnios->caption(), $patient_an_registration->PreviousHistoryofOligohydramnios->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->PreviousHistoryofPreterm->Required) { ?>
			elm = this.getElements("x" + infix + "_PreviousHistoryofPreterm");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->PreviousHistoryofPreterm->caption(), $patient_an_registration->PreviousHistoryofPreterm->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->G1->Required) { ?>
			elm = this.getElements("x" + infix + "_G1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->G1->caption(), $patient_an_registration->G1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->G2->Required) { ?>
			elm = this.getElements("x" + infix + "_G2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->G2->caption(), $patient_an_registration->G2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->G3->Required) { ?>
			elm = this.getElements("x" + infix + "_G3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->G3->caption(), $patient_an_registration->G3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->DeliveryNDLSCS1->Required) { ?>
			elm = this.getElements("x" + infix + "_DeliveryNDLSCS1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->DeliveryNDLSCS1->caption(), $patient_an_registration->DeliveryNDLSCS1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->DeliveryNDLSCS2->Required) { ?>
			elm = this.getElements("x" + infix + "_DeliveryNDLSCS2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->DeliveryNDLSCS2->caption(), $patient_an_registration->DeliveryNDLSCS2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->DeliveryNDLSCS3->Required) { ?>
			elm = this.getElements("x" + infix + "_DeliveryNDLSCS3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->DeliveryNDLSCS3->caption(), $patient_an_registration->DeliveryNDLSCS3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->BabySexweight1->Required) { ?>
			elm = this.getElements("x" + infix + "_BabySexweight1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->BabySexweight1->caption(), $patient_an_registration->BabySexweight1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->BabySexweight2->Required) { ?>
			elm = this.getElements("x" + infix + "_BabySexweight2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->BabySexweight2->caption(), $patient_an_registration->BabySexweight2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->BabySexweight3->Required) { ?>
			elm = this.getElements("x" + infix + "_BabySexweight3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->BabySexweight3->caption(), $patient_an_registration->BabySexweight3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->PastMedicalHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_PastMedicalHistory[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->PastMedicalHistory->caption(), $patient_an_registration->PastMedicalHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->PastSurgicalHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_PastSurgicalHistory[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->PastSurgicalHistory->caption(), $patient_an_registration->PastSurgicalHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->FamilyHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_FamilyHistory[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->FamilyHistory->caption(), $patient_an_registration->FamilyHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->Viability->Required) { ?>
			elm = this.getElements("x" + infix + "_Viability");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Viability->caption(), $patient_an_registration->Viability->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->ViabilityDATE->Required) { ?>
			elm = this.getElements("x" + infix + "_ViabilityDATE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->ViabilityDATE->caption(), $patient_an_registration->ViabilityDATE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->ViabilityREPORT->Required) { ?>
			elm = this.getElements("x" + infix + "_ViabilityREPORT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->ViabilityREPORT->caption(), $patient_an_registration->ViabilityREPORT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->Viability2->Required) { ?>
			elm = this.getElements("x" + infix + "_Viability2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Viability2->caption(), $patient_an_registration->Viability2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->Viability2DATE->Required) { ?>
			elm = this.getElements("x" + infix + "_Viability2DATE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Viability2DATE->caption(), $patient_an_registration->Viability2DATE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->Viability2REPORT->Required) { ?>
			elm = this.getElements("x" + infix + "_Viability2REPORT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Viability2REPORT->caption(), $patient_an_registration->Viability2REPORT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->NTscan->Required) { ?>
			elm = this.getElements("x" + infix + "_NTscan");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->NTscan->caption(), $patient_an_registration->NTscan->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->NTscanDATE->Required) { ?>
			elm = this.getElements("x" + infix + "_NTscanDATE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->NTscanDATE->caption(), $patient_an_registration->NTscanDATE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->NTscanREPORT->Required) { ?>
			elm = this.getElements("x" + infix + "_NTscanREPORT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->NTscanREPORT->caption(), $patient_an_registration->NTscanREPORT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->EarlyTarget->Required) { ?>
			elm = this.getElements("x" + infix + "_EarlyTarget");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->EarlyTarget->caption(), $patient_an_registration->EarlyTarget->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->EarlyTargetDATE->Required) { ?>
			elm = this.getElements("x" + infix + "_EarlyTargetDATE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->EarlyTargetDATE->caption(), $patient_an_registration->EarlyTargetDATE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->EarlyTargetREPORT->Required) { ?>
			elm = this.getElements("x" + infix + "_EarlyTargetREPORT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->EarlyTargetREPORT->caption(), $patient_an_registration->EarlyTargetREPORT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->Anomaly->Required) { ?>
			elm = this.getElements("x" + infix + "_Anomaly");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Anomaly->caption(), $patient_an_registration->Anomaly->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->AnomalyDATE->Required) { ?>
			elm = this.getElements("x" + infix + "_AnomalyDATE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->AnomalyDATE->caption(), $patient_an_registration->AnomalyDATE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->AnomalyREPORT->Required) { ?>
			elm = this.getElements("x" + infix + "_AnomalyREPORT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->AnomalyREPORT->caption(), $patient_an_registration->AnomalyREPORT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->Growth->Required) { ?>
			elm = this.getElements("x" + infix + "_Growth");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Growth->caption(), $patient_an_registration->Growth->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->GrowthDATE->Required) { ?>
			elm = this.getElements("x" + infix + "_GrowthDATE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->GrowthDATE->caption(), $patient_an_registration->GrowthDATE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->GrowthREPORT->Required) { ?>
			elm = this.getElements("x" + infix + "_GrowthREPORT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->GrowthREPORT->caption(), $patient_an_registration->GrowthREPORT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->Growth1->Required) { ?>
			elm = this.getElements("x" + infix + "_Growth1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Growth1->caption(), $patient_an_registration->Growth1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->Growth1DATE->Required) { ?>
			elm = this.getElements("x" + infix + "_Growth1DATE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Growth1DATE->caption(), $patient_an_registration->Growth1DATE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->Growth1REPORT->Required) { ?>
			elm = this.getElements("x" + infix + "_Growth1REPORT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Growth1REPORT->caption(), $patient_an_registration->Growth1REPORT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->ANProfile->Required) { ?>
			elm = this.getElements("x" + infix + "_ANProfile");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->ANProfile->caption(), $patient_an_registration->ANProfile->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->ANProfileDATE->Required) { ?>
			elm = this.getElements("x" + infix + "_ANProfileDATE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->ANProfileDATE->caption(), $patient_an_registration->ANProfileDATE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->ANProfileINHOUSE->Required) { ?>
			elm = this.getElements("x" + infix + "_ANProfileINHOUSE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->ANProfileINHOUSE->caption(), $patient_an_registration->ANProfileINHOUSE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->ANProfileREPORT->Required) { ?>
			elm = this.getElements("x" + infix + "_ANProfileREPORT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->ANProfileREPORT->caption(), $patient_an_registration->ANProfileREPORT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->DualMarker->Required) { ?>
			elm = this.getElements("x" + infix + "_DualMarker");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->DualMarker->caption(), $patient_an_registration->DualMarker->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->DualMarkerDATE->Required) { ?>
			elm = this.getElements("x" + infix + "_DualMarkerDATE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->DualMarkerDATE->caption(), $patient_an_registration->DualMarkerDATE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->DualMarkerINHOUSE->Required) { ?>
			elm = this.getElements("x" + infix + "_DualMarkerINHOUSE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->DualMarkerINHOUSE->caption(), $patient_an_registration->DualMarkerINHOUSE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->DualMarkerREPORT->Required) { ?>
			elm = this.getElements("x" + infix + "_DualMarkerREPORT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->DualMarkerREPORT->caption(), $patient_an_registration->DualMarkerREPORT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->Quadruple->Required) { ?>
			elm = this.getElements("x" + infix + "_Quadruple");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Quadruple->caption(), $patient_an_registration->Quadruple->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->QuadrupleDATE->Required) { ?>
			elm = this.getElements("x" + infix + "_QuadrupleDATE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->QuadrupleDATE->caption(), $patient_an_registration->QuadrupleDATE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->QuadrupleINHOUSE->Required) { ?>
			elm = this.getElements("x" + infix + "_QuadrupleINHOUSE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->QuadrupleINHOUSE->caption(), $patient_an_registration->QuadrupleINHOUSE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->QuadrupleREPORT->Required) { ?>
			elm = this.getElements("x" + infix + "_QuadrupleREPORT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->QuadrupleREPORT->caption(), $patient_an_registration->QuadrupleREPORT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->A5month->Required) { ?>
			elm = this.getElements("x" + infix + "_A5month");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->A5month->caption(), $patient_an_registration->A5month->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->A5monthDATE->Required) { ?>
			elm = this.getElements("x" + infix + "_A5monthDATE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->A5monthDATE->caption(), $patient_an_registration->A5monthDATE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->A5monthINHOUSE->Required) { ?>
			elm = this.getElements("x" + infix + "_A5monthINHOUSE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->A5monthINHOUSE->caption(), $patient_an_registration->A5monthINHOUSE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->A5monthREPORT->Required) { ?>
			elm = this.getElements("x" + infix + "_A5monthREPORT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->A5monthREPORT->caption(), $patient_an_registration->A5monthREPORT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->A7month->Required) { ?>
			elm = this.getElements("x" + infix + "_A7month");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->A7month->caption(), $patient_an_registration->A7month->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->A7monthDATE->Required) { ?>
			elm = this.getElements("x" + infix + "_A7monthDATE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->A7monthDATE->caption(), $patient_an_registration->A7monthDATE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->A7monthINHOUSE->Required) { ?>
			elm = this.getElements("x" + infix + "_A7monthINHOUSE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->A7monthINHOUSE->caption(), $patient_an_registration->A7monthINHOUSE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->A7monthREPORT->Required) { ?>
			elm = this.getElements("x" + infix + "_A7monthREPORT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->A7monthREPORT->caption(), $patient_an_registration->A7monthREPORT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->A9month->Required) { ?>
			elm = this.getElements("x" + infix + "_A9month");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->A9month->caption(), $patient_an_registration->A9month->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->A9monthDATE->Required) { ?>
			elm = this.getElements("x" + infix + "_A9monthDATE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->A9monthDATE->caption(), $patient_an_registration->A9monthDATE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->A9monthINHOUSE->Required) { ?>
			elm = this.getElements("x" + infix + "_A9monthINHOUSE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->A9monthINHOUSE->caption(), $patient_an_registration->A9monthINHOUSE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->A9monthREPORT->Required) { ?>
			elm = this.getElements("x" + infix + "_A9monthREPORT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->A9monthREPORT->caption(), $patient_an_registration->A9monthREPORT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->INJ->Required) { ?>
			elm = this.getElements("x" + infix + "_INJ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->INJ->caption(), $patient_an_registration->INJ->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->INJDATE->Required) { ?>
			elm = this.getElements("x" + infix + "_INJDATE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->INJDATE->caption(), $patient_an_registration->INJDATE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->INJINHOUSE->Required) { ?>
			elm = this.getElements("x" + infix + "_INJINHOUSE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->INJINHOUSE->caption(), $patient_an_registration->INJINHOUSE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->INJREPORT->Required) { ?>
			elm = this.getElements("x" + infix + "_INJREPORT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->INJREPORT->caption(), $patient_an_registration->INJREPORT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->Bleeding->Required) { ?>
			elm = this.getElements("x" + infix + "_Bleeding[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Bleeding->caption(), $patient_an_registration->Bleeding->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->Hypothyroidism->Required) { ?>
			elm = this.getElements("x" + infix + "_Hypothyroidism");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Hypothyroidism->caption(), $patient_an_registration->Hypothyroidism->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->PICMENumber->Required) { ?>
			elm = this.getElements("x" + infix + "_PICMENumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->PICMENumber->caption(), $patient_an_registration->PICMENumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->Outcome->Required) { ?>
			elm = this.getElements("x" + infix + "_Outcome");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Outcome->caption(), $patient_an_registration->Outcome->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->DateofAdmission->Required) { ?>
			elm = this.getElements("x" + infix + "_DateofAdmission");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->DateofAdmission->caption(), $patient_an_registration->DateofAdmission->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->DateodProcedure->Required) { ?>
			elm = this.getElements("x" + infix + "_DateodProcedure");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->DateodProcedure->caption(), $patient_an_registration->DateodProcedure->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->Miscarriage->Required) { ?>
			elm = this.getElements("x" + infix + "_Miscarriage");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Miscarriage->caption(), $patient_an_registration->Miscarriage->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->ModeOfDelivery->Required) { ?>
			elm = this.getElements("x" + infix + "_ModeOfDelivery");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->ModeOfDelivery->caption(), $patient_an_registration->ModeOfDelivery->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->ND->Required) { ?>
			elm = this.getElements("x" + infix + "_ND");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->ND->caption(), $patient_an_registration->ND->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->NDS->Required) { ?>
			elm = this.getElements("x" + infix + "_NDS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->NDS->caption(), $patient_an_registration->NDS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->NDP->Required) { ?>
			elm = this.getElements("x" + infix + "_NDP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->NDP->caption(), $patient_an_registration->NDP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->Vaccum->Required) { ?>
			elm = this.getElements("x" + infix + "_Vaccum");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Vaccum->caption(), $patient_an_registration->Vaccum->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->VaccumS->Required) { ?>
			elm = this.getElements("x" + infix + "_VaccumS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->VaccumS->caption(), $patient_an_registration->VaccumS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->VaccumP->Required) { ?>
			elm = this.getElements("x" + infix + "_VaccumP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->VaccumP->caption(), $patient_an_registration->VaccumP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->Forceps->Required) { ?>
			elm = this.getElements("x" + infix + "_Forceps");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Forceps->caption(), $patient_an_registration->Forceps->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->ForcepsS->Required) { ?>
			elm = this.getElements("x" + infix + "_ForcepsS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->ForcepsS->caption(), $patient_an_registration->ForcepsS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->ForcepsP->Required) { ?>
			elm = this.getElements("x" + infix + "_ForcepsP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->ForcepsP->caption(), $patient_an_registration->ForcepsP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->Elective->Required) { ?>
			elm = this.getElements("x" + infix + "_Elective");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Elective->caption(), $patient_an_registration->Elective->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->ElectiveS->Required) { ?>
			elm = this.getElements("x" + infix + "_ElectiveS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->ElectiveS->caption(), $patient_an_registration->ElectiveS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->ElectiveP->Required) { ?>
			elm = this.getElements("x" + infix + "_ElectiveP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->ElectiveP->caption(), $patient_an_registration->ElectiveP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->Emergency->Required) { ?>
			elm = this.getElements("x" + infix + "_Emergency");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Emergency->caption(), $patient_an_registration->Emergency->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->EmergencyS->Required) { ?>
			elm = this.getElements("x" + infix + "_EmergencyS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->EmergencyS->caption(), $patient_an_registration->EmergencyS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->EmergencyP->Required) { ?>
			elm = this.getElements("x" + infix + "_EmergencyP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->EmergencyP->caption(), $patient_an_registration->EmergencyP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->Maturity->Required) { ?>
			elm = this.getElements("x" + infix + "_Maturity");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Maturity->caption(), $patient_an_registration->Maturity->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->Baby1->Required) { ?>
			elm = this.getElements("x" + infix + "_Baby1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Baby1->caption(), $patient_an_registration->Baby1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->Baby2->Required) { ?>
			elm = this.getElements("x" + infix + "_Baby2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Baby2->caption(), $patient_an_registration->Baby2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->sex1->Required) { ?>
			elm = this.getElements("x" + infix + "_sex1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->sex1->caption(), $patient_an_registration->sex1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->sex2->Required) { ?>
			elm = this.getElements("x" + infix + "_sex2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->sex2->caption(), $patient_an_registration->sex2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->weight1->Required) { ?>
			elm = this.getElements("x" + infix + "_weight1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->weight1->caption(), $patient_an_registration->weight1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->weight2->Required) { ?>
			elm = this.getElements("x" + infix + "_weight2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->weight2->caption(), $patient_an_registration->weight2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->NICU1->Required) { ?>
			elm = this.getElements("x" + infix + "_NICU1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->NICU1->caption(), $patient_an_registration->NICU1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->NICU2->Required) { ?>
			elm = this.getElements("x" + infix + "_NICU2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->NICU2->caption(), $patient_an_registration->NICU2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->Jaundice1->Required) { ?>
			elm = this.getElements("x" + infix + "_Jaundice1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Jaundice1->caption(), $patient_an_registration->Jaundice1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->Jaundice2->Required) { ?>
			elm = this.getElements("x" + infix + "_Jaundice2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Jaundice2->caption(), $patient_an_registration->Jaundice2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->Others1->Required) { ?>
			elm = this.getElements("x" + infix + "_Others1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Others1->caption(), $patient_an_registration->Others1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->Others2->Required) { ?>
			elm = this.getElements("x" + infix + "_Others2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Others2->caption(), $patient_an_registration->Others2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->SpillOverReasons->Required) { ?>
			elm = this.getElements("x" + infix + "_SpillOverReasons");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->SpillOverReasons->caption(), $patient_an_registration->SpillOverReasons->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->ANClosed->Required) { ?>
			elm = this.getElements("x" + infix + "_ANClosed[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->ANClosed->caption(), $patient_an_registration->ANClosed->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->ANClosedDATE->Required) { ?>
			elm = this.getElements("x" + infix + "_ANClosedDATE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->ANClosedDATE->caption(), $patient_an_registration->ANClosedDATE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->PastMedicalHistoryOthers->Required) { ?>
			elm = this.getElements("x" + infix + "_PastMedicalHistoryOthers");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->PastMedicalHistoryOthers->caption(), $patient_an_registration->PastMedicalHistoryOthers->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->PastSurgicalHistoryOthers->Required) { ?>
			elm = this.getElements("x" + infix + "_PastSurgicalHistoryOthers");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->PastSurgicalHistoryOthers->caption(), $patient_an_registration->PastSurgicalHistoryOthers->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->FamilyHistoryOthers->Required) { ?>
			elm = this.getElements("x" + infix + "_FamilyHistoryOthers");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->FamilyHistoryOthers->caption(), $patient_an_registration->FamilyHistoryOthers->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->PresentPregnancyComplicationsOthers->Required) { ?>
			elm = this.getElements("x" + infix + "_PresentPregnancyComplicationsOthers");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->PresentPregnancyComplicationsOthers->caption(), $patient_an_registration->PresentPregnancyComplicationsOthers->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_grid->ETdate->Required) { ?>
			elm = this.getElements("x" + infix + "_ETdate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->ETdate->caption(), $patient_an_registration->ETdate->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
fpatient_an_registrationgrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "pid", false)) return false;
	if (ew.valueChanged(fobj, infix, "fid", false)) return false;
	if (ew.valueChanged(fobj, infix, "G", false)) return false;
	if (ew.valueChanged(fobj, infix, "P", false)) return false;
	if (ew.valueChanged(fobj, infix, "L", false)) return false;
	if (ew.valueChanged(fobj, infix, "A", false)) return false;
	if (ew.valueChanged(fobj, infix, "E", false)) return false;
	if (ew.valueChanged(fobj, infix, "M", false)) return false;
	if (ew.valueChanged(fobj, infix, "LMP", false)) return false;
	if (ew.valueChanged(fobj, infix, "EDO", false)) return false;
	if (ew.valueChanged(fobj, infix, "MenstrualHistory", false)) return false;
	if (ew.valueChanged(fobj, infix, "MaritalHistory", false)) return false;
	if (ew.valueChanged(fobj, infix, "ObstetricHistory", false)) return false;
	if (ew.valueChanged(fobj, infix, "PreviousHistoryofGDM", false)) return false;
	if (ew.valueChanged(fobj, infix, "PreviousHistorofPIH", false)) return false;
	if (ew.valueChanged(fobj, infix, "PreviousHistoryofIUGR", false)) return false;
	if (ew.valueChanged(fobj, infix, "PreviousHistoryofOligohydramnios", false)) return false;
	if (ew.valueChanged(fobj, infix, "PreviousHistoryofPreterm", false)) return false;
	if (ew.valueChanged(fobj, infix, "G1", false)) return false;
	if (ew.valueChanged(fobj, infix, "G2", false)) return false;
	if (ew.valueChanged(fobj, infix, "G3", false)) return false;
	if (ew.valueChanged(fobj, infix, "DeliveryNDLSCS1", false)) return false;
	if (ew.valueChanged(fobj, infix, "DeliveryNDLSCS2", false)) return false;
	if (ew.valueChanged(fobj, infix, "DeliveryNDLSCS3", false)) return false;
	if (ew.valueChanged(fobj, infix, "BabySexweight1", false)) return false;
	if (ew.valueChanged(fobj, infix, "BabySexweight2", false)) return false;
	if (ew.valueChanged(fobj, infix, "BabySexweight3", false)) return false;
	if (ew.valueChanged(fobj, infix, "PastMedicalHistory[]", false)) return false;
	if (ew.valueChanged(fobj, infix, "PastSurgicalHistory[]", false)) return false;
	if (ew.valueChanged(fobj, infix, "FamilyHistory[]", false)) return false;
	if (ew.valueChanged(fobj, infix, "Viability", false)) return false;
	if (ew.valueChanged(fobj, infix, "ViabilityDATE", false)) return false;
	if (ew.valueChanged(fobj, infix, "ViabilityREPORT", false)) return false;
	if (ew.valueChanged(fobj, infix, "Viability2", false)) return false;
	if (ew.valueChanged(fobj, infix, "Viability2DATE", false)) return false;
	if (ew.valueChanged(fobj, infix, "Viability2REPORT", false)) return false;
	if (ew.valueChanged(fobj, infix, "NTscan", false)) return false;
	if (ew.valueChanged(fobj, infix, "NTscanDATE", false)) return false;
	if (ew.valueChanged(fobj, infix, "NTscanREPORT", false)) return false;
	if (ew.valueChanged(fobj, infix, "EarlyTarget", false)) return false;
	if (ew.valueChanged(fobj, infix, "EarlyTargetDATE", false)) return false;
	if (ew.valueChanged(fobj, infix, "EarlyTargetREPORT", false)) return false;
	if (ew.valueChanged(fobj, infix, "Anomaly", false)) return false;
	if (ew.valueChanged(fobj, infix, "AnomalyDATE", false)) return false;
	if (ew.valueChanged(fobj, infix, "AnomalyREPORT", false)) return false;
	if (ew.valueChanged(fobj, infix, "Growth", false)) return false;
	if (ew.valueChanged(fobj, infix, "GrowthDATE", false)) return false;
	if (ew.valueChanged(fobj, infix, "GrowthREPORT", false)) return false;
	if (ew.valueChanged(fobj, infix, "Growth1", false)) return false;
	if (ew.valueChanged(fobj, infix, "Growth1DATE", false)) return false;
	if (ew.valueChanged(fobj, infix, "Growth1REPORT", false)) return false;
	if (ew.valueChanged(fobj, infix, "ANProfile", false)) return false;
	if (ew.valueChanged(fobj, infix, "ANProfileDATE", false)) return false;
	if (ew.valueChanged(fobj, infix, "ANProfileINHOUSE", false)) return false;
	if (ew.valueChanged(fobj, infix, "ANProfileREPORT", false)) return false;
	if (ew.valueChanged(fobj, infix, "DualMarker", false)) return false;
	if (ew.valueChanged(fobj, infix, "DualMarkerDATE", false)) return false;
	if (ew.valueChanged(fobj, infix, "DualMarkerINHOUSE", false)) return false;
	if (ew.valueChanged(fobj, infix, "DualMarkerREPORT", false)) return false;
	if (ew.valueChanged(fobj, infix, "Quadruple", false)) return false;
	if (ew.valueChanged(fobj, infix, "QuadrupleDATE", false)) return false;
	if (ew.valueChanged(fobj, infix, "QuadrupleINHOUSE", false)) return false;
	if (ew.valueChanged(fobj, infix, "QuadrupleREPORT", false)) return false;
	if (ew.valueChanged(fobj, infix, "A5month", false)) return false;
	if (ew.valueChanged(fobj, infix, "A5monthDATE", false)) return false;
	if (ew.valueChanged(fobj, infix, "A5monthINHOUSE", false)) return false;
	if (ew.valueChanged(fobj, infix, "A5monthREPORT", false)) return false;
	if (ew.valueChanged(fobj, infix, "A7month", false)) return false;
	if (ew.valueChanged(fobj, infix, "A7monthDATE", false)) return false;
	if (ew.valueChanged(fobj, infix, "A7monthINHOUSE", false)) return false;
	if (ew.valueChanged(fobj, infix, "A7monthREPORT", false)) return false;
	if (ew.valueChanged(fobj, infix, "A9month", false)) return false;
	if (ew.valueChanged(fobj, infix, "A9monthDATE", false)) return false;
	if (ew.valueChanged(fobj, infix, "A9monthINHOUSE", false)) return false;
	if (ew.valueChanged(fobj, infix, "A9monthREPORT", false)) return false;
	if (ew.valueChanged(fobj, infix, "INJ", false)) return false;
	if (ew.valueChanged(fobj, infix, "INJDATE", false)) return false;
	if (ew.valueChanged(fobj, infix, "INJINHOUSE", false)) return false;
	if (ew.valueChanged(fobj, infix, "INJREPORT", false)) return false;
	if (ew.valueChanged(fobj, infix, "Bleeding[]", false)) return false;
	if (ew.valueChanged(fobj, infix, "Hypothyroidism", false)) return false;
	if (ew.valueChanged(fobj, infix, "PICMENumber", false)) return false;
	if (ew.valueChanged(fobj, infix, "Outcome", false)) return false;
	if (ew.valueChanged(fobj, infix, "DateofAdmission", false)) return false;
	if (ew.valueChanged(fobj, infix, "DateodProcedure", false)) return false;
	if (ew.valueChanged(fobj, infix, "Miscarriage", false)) return false;
	if (ew.valueChanged(fobj, infix, "ModeOfDelivery", false)) return false;
	if (ew.valueChanged(fobj, infix, "ND", false)) return false;
	if (ew.valueChanged(fobj, infix, "NDS", false)) return false;
	if (ew.valueChanged(fobj, infix, "NDP", false)) return false;
	if (ew.valueChanged(fobj, infix, "Vaccum", false)) return false;
	if (ew.valueChanged(fobj, infix, "VaccumS", false)) return false;
	if (ew.valueChanged(fobj, infix, "VaccumP", false)) return false;
	if (ew.valueChanged(fobj, infix, "Forceps", false)) return false;
	if (ew.valueChanged(fobj, infix, "ForcepsS", false)) return false;
	if (ew.valueChanged(fobj, infix, "ForcepsP", false)) return false;
	if (ew.valueChanged(fobj, infix, "Elective", false)) return false;
	if (ew.valueChanged(fobj, infix, "ElectiveS", false)) return false;
	if (ew.valueChanged(fobj, infix, "ElectiveP", false)) return false;
	if (ew.valueChanged(fobj, infix, "Emergency", false)) return false;
	if (ew.valueChanged(fobj, infix, "EmergencyS", false)) return false;
	if (ew.valueChanged(fobj, infix, "EmergencyP", false)) return false;
	if (ew.valueChanged(fobj, infix, "Maturity", false)) return false;
	if (ew.valueChanged(fobj, infix, "Baby1", false)) return false;
	if (ew.valueChanged(fobj, infix, "Baby2", false)) return false;
	if (ew.valueChanged(fobj, infix, "sex1", false)) return false;
	if (ew.valueChanged(fobj, infix, "sex2", false)) return false;
	if (ew.valueChanged(fobj, infix, "weight1", false)) return false;
	if (ew.valueChanged(fobj, infix, "weight2", false)) return false;
	if (ew.valueChanged(fobj, infix, "NICU1", false)) return false;
	if (ew.valueChanged(fobj, infix, "NICU2", false)) return false;
	if (ew.valueChanged(fobj, infix, "Jaundice1", false)) return false;
	if (ew.valueChanged(fobj, infix, "Jaundice2", false)) return false;
	if (ew.valueChanged(fobj, infix, "Others1", false)) return false;
	if (ew.valueChanged(fobj, infix, "Others2", false)) return false;
	if (ew.valueChanged(fobj, infix, "SpillOverReasons", false)) return false;
	if (ew.valueChanged(fobj, infix, "ANClosed[]", false)) return false;
	if (ew.valueChanged(fobj, infix, "ANClosedDATE", false)) return false;
	if (ew.valueChanged(fobj, infix, "PastMedicalHistoryOthers", false)) return false;
	if (ew.valueChanged(fobj, infix, "PastSurgicalHistoryOthers", false)) return false;
	if (ew.valueChanged(fobj, infix, "FamilyHistoryOthers", false)) return false;
	if (ew.valueChanged(fobj, infix, "PresentPregnancyComplicationsOthers", false)) return false;
	if (ew.valueChanged(fobj, infix, "ETdate", false)) return false;
	return true;
}

// Form_CustomValidate event
fpatient_an_registrationgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_an_registrationgrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_an_registrationgrid.lists["x_MenstrualHistory"] = <?php echo $patient_an_registration_grid->MenstrualHistory->Lookup->toClientList() ?>;
fpatient_an_registrationgrid.lists["x_MenstrualHistory"].options = <?php echo JsonEncode($patient_an_registration_grid->MenstrualHistory->options(FALSE, TRUE)) ?>;
fpatient_an_registrationgrid.lists["x_PreviousHistoryofGDM"] = <?php echo $patient_an_registration_grid->PreviousHistoryofGDM->Lookup->toClientList() ?>;
fpatient_an_registrationgrid.lists["x_PreviousHistoryofGDM"].options = <?php echo JsonEncode($patient_an_registration_grid->PreviousHistoryofGDM->options(FALSE, TRUE)) ?>;
fpatient_an_registrationgrid.lists["x_PreviousHistorofPIH"] = <?php echo $patient_an_registration_grid->PreviousHistorofPIH->Lookup->toClientList() ?>;
fpatient_an_registrationgrid.lists["x_PreviousHistorofPIH"].options = <?php echo JsonEncode($patient_an_registration_grid->PreviousHistorofPIH->options(FALSE, TRUE)) ?>;
fpatient_an_registrationgrid.lists["x_PreviousHistoryofIUGR"] = <?php echo $patient_an_registration_grid->PreviousHistoryofIUGR->Lookup->toClientList() ?>;
fpatient_an_registrationgrid.lists["x_PreviousHistoryofIUGR"].options = <?php echo JsonEncode($patient_an_registration_grid->PreviousHistoryofIUGR->options(FALSE, TRUE)) ?>;
fpatient_an_registrationgrid.lists["x_PreviousHistoryofOligohydramnios"] = <?php echo $patient_an_registration_grid->PreviousHistoryofOligohydramnios->Lookup->toClientList() ?>;
fpatient_an_registrationgrid.lists["x_PreviousHistoryofOligohydramnios"].options = <?php echo JsonEncode($patient_an_registration_grid->PreviousHistoryofOligohydramnios->options(FALSE, TRUE)) ?>;
fpatient_an_registrationgrid.lists["x_PreviousHistoryofPreterm"] = <?php echo $patient_an_registration_grid->PreviousHistoryofPreterm->Lookup->toClientList() ?>;
fpatient_an_registrationgrid.lists["x_PreviousHistoryofPreterm"].options = <?php echo JsonEncode($patient_an_registration_grid->PreviousHistoryofPreterm->options(FALSE, TRUE)) ?>;
fpatient_an_registrationgrid.lists["x_PastMedicalHistory[]"] = <?php echo $patient_an_registration_grid->PastMedicalHistory->Lookup->toClientList() ?>;
fpatient_an_registrationgrid.lists["x_PastMedicalHistory[]"].options = <?php echo JsonEncode($patient_an_registration_grid->PastMedicalHistory->options(FALSE, TRUE)) ?>;
fpatient_an_registrationgrid.lists["x_PastSurgicalHistory[]"] = <?php echo $patient_an_registration_grid->PastSurgicalHistory->Lookup->toClientList() ?>;
fpatient_an_registrationgrid.lists["x_PastSurgicalHistory[]"].options = <?php echo JsonEncode($patient_an_registration_grid->PastSurgicalHistory->options(FALSE, TRUE)) ?>;
fpatient_an_registrationgrid.lists["x_FamilyHistory[]"] = <?php echo $patient_an_registration_grid->FamilyHistory->Lookup->toClientList() ?>;
fpatient_an_registrationgrid.lists["x_FamilyHistory[]"].options = <?php echo JsonEncode($patient_an_registration_grid->FamilyHistory->options(FALSE, TRUE)) ?>;
fpatient_an_registrationgrid.lists["x_Bleeding[]"] = <?php echo $patient_an_registration_grid->Bleeding->Lookup->toClientList() ?>;
fpatient_an_registrationgrid.lists["x_Bleeding[]"].options = <?php echo JsonEncode($patient_an_registration_grid->Bleeding->options(FALSE, TRUE)) ?>;
fpatient_an_registrationgrid.lists["x_Miscarriage"] = <?php echo $patient_an_registration_grid->Miscarriage->Lookup->toClientList() ?>;
fpatient_an_registrationgrid.lists["x_Miscarriage"].options = <?php echo JsonEncode($patient_an_registration_grid->Miscarriage->options(FALSE, TRUE)) ?>;
fpatient_an_registrationgrid.lists["x_ModeOfDelivery"] = <?php echo $patient_an_registration_grid->ModeOfDelivery->Lookup->toClientList() ?>;
fpatient_an_registrationgrid.lists["x_ModeOfDelivery"].options = <?php echo JsonEncode($patient_an_registration_grid->ModeOfDelivery->options(FALSE, TRUE)) ?>;
fpatient_an_registrationgrid.lists["x_NDS"] = <?php echo $patient_an_registration_grid->NDS->Lookup->toClientList() ?>;
fpatient_an_registrationgrid.lists["x_NDS"].options = <?php echo JsonEncode($patient_an_registration_grid->NDS->options(FALSE, TRUE)) ?>;
fpatient_an_registrationgrid.lists["x_NDP"] = <?php echo $patient_an_registration_grid->NDP->Lookup->toClientList() ?>;
fpatient_an_registrationgrid.lists["x_NDP"].options = <?php echo JsonEncode($patient_an_registration_grid->NDP->options(FALSE, TRUE)) ?>;
fpatient_an_registrationgrid.lists["x_VaccumS"] = <?php echo $patient_an_registration_grid->VaccumS->Lookup->toClientList() ?>;
fpatient_an_registrationgrid.lists["x_VaccumS"].options = <?php echo JsonEncode($patient_an_registration_grid->VaccumS->options(FALSE, TRUE)) ?>;
fpatient_an_registrationgrid.lists["x_VaccumP"] = <?php echo $patient_an_registration_grid->VaccumP->Lookup->toClientList() ?>;
fpatient_an_registrationgrid.lists["x_VaccumP"].options = <?php echo JsonEncode($patient_an_registration_grid->VaccumP->options(FALSE, TRUE)) ?>;
fpatient_an_registrationgrid.lists["x_ForcepsS"] = <?php echo $patient_an_registration_grid->ForcepsS->Lookup->toClientList() ?>;
fpatient_an_registrationgrid.lists["x_ForcepsS"].options = <?php echo JsonEncode($patient_an_registration_grid->ForcepsS->options(FALSE, TRUE)) ?>;
fpatient_an_registrationgrid.lists["x_ForcepsP"] = <?php echo $patient_an_registration_grid->ForcepsP->Lookup->toClientList() ?>;
fpatient_an_registrationgrid.lists["x_ForcepsP"].options = <?php echo JsonEncode($patient_an_registration_grid->ForcepsP->options(FALSE, TRUE)) ?>;
fpatient_an_registrationgrid.lists["x_ElectiveS"] = <?php echo $patient_an_registration_grid->ElectiveS->Lookup->toClientList() ?>;
fpatient_an_registrationgrid.lists["x_ElectiveS"].options = <?php echo JsonEncode($patient_an_registration_grid->ElectiveS->options(FALSE, TRUE)) ?>;
fpatient_an_registrationgrid.lists["x_ElectiveP"] = <?php echo $patient_an_registration_grid->ElectiveP->Lookup->toClientList() ?>;
fpatient_an_registrationgrid.lists["x_ElectiveP"].options = <?php echo JsonEncode($patient_an_registration_grid->ElectiveP->options(FALSE, TRUE)) ?>;
fpatient_an_registrationgrid.lists["x_EmergencyS"] = <?php echo $patient_an_registration_grid->EmergencyS->Lookup->toClientList() ?>;
fpatient_an_registrationgrid.lists["x_EmergencyS"].options = <?php echo JsonEncode($patient_an_registration_grid->EmergencyS->options(FALSE, TRUE)) ?>;
fpatient_an_registrationgrid.lists["x_EmergencyP"] = <?php echo $patient_an_registration_grid->EmergencyP->Lookup->toClientList() ?>;
fpatient_an_registrationgrid.lists["x_EmergencyP"].options = <?php echo JsonEncode($patient_an_registration_grid->EmergencyP->options(FALSE, TRUE)) ?>;
fpatient_an_registrationgrid.lists["x_Maturity"] = <?php echo $patient_an_registration_grid->Maturity->Lookup->toClientList() ?>;
fpatient_an_registrationgrid.lists["x_Maturity"].options = <?php echo JsonEncode($patient_an_registration_grid->Maturity->options(FALSE, TRUE)) ?>;
fpatient_an_registrationgrid.lists["x_SpillOverReasons"] = <?php echo $patient_an_registration_grid->SpillOverReasons->Lookup->toClientList() ?>;
fpatient_an_registrationgrid.lists["x_SpillOverReasons"].options = <?php echo JsonEncode($patient_an_registration_grid->SpillOverReasons->options(FALSE, TRUE)) ?>;
fpatient_an_registrationgrid.lists["x_ANClosed[]"] = <?php echo $patient_an_registration_grid->ANClosed->Lookup->toClientList() ?>;
fpatient_an_registrationgrid.lists["x_ANClosed[]"].options = <?php echo JsonEncode($patient_an_registration_grid->ANClosed->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$patient_an_registration_grid->renderOtherOptions();
?>
<?php $patient_an_registration_grid->showPageHeader(); ?>
<?php
$patient_an_registration_grid->showMessage();
?>
<?php if ($patient_an_registration_grid->TotalRecs > 0 || $patient_an_registration->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_an_registration_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_an_registration">
<?php if ($patient_an_registration_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $patient_an_registration_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpatient_an_registrationgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_patient_an_registration" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_patient_an_registrationgrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_an_registration_grid->RowType = ROWTYPE_HEADER;

// Render list options
$patient_an_registration_grid->renderListOptions();

// Render list options (header, left)
$patient_an_registration_grid->ListOptions->render("header", "left");
?>
<?php if ($patient_an_registration->id->Visible) { // id ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_an_registration->id->headerCellClass() ?>"><div id="elh_patient_an_registration_id" class="patient_an_registration_id"><div class="ew-table-header-caption"><?php echo $patient_an_registration->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_an_registration->id->headerCellClass() ?>"><div><div id="elh_patient_an_registration_id" class="patient_an_registration_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->pid->Visible) { // pid ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->pid) == "") { ?>
		<th data-name="pid" class="<?php echo $patient_an_registration->pid->headerCellClass() ?>"><div id="elh_patient_an_registration_pid" class="patient_an_registration_pid"><div class="ew-table-header-caption"><?php echo $patient_an_registration->pid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pid" class="<?php echo $patient_an_registration->pid->headerCellClass() ?>"><div><div id="elh_patient_an_registration_pid" class="patient_an_registration_pid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->pid->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->pid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->pid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->fid->Visible) { // fid ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->fid) == "") { ?>
		<th data-name="fid" class="<?php echo $patient_an_registration->fid->headerCellClass() ?>"><div id="elh_patient_an_registration_fid" class="patient_an_registration_fid"><div class="ew-table-header-caption"><?php echo $patient_an_registration->fid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="fid" class="<?php echo $patient_an_registration->fid->headerCellClass() ?>"><div><div id="elh_patient_an_registration_fid" class="patient_an_registration_fid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->fid->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->fid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->fid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->G->Visible) { // G ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->G) == "") { ?>
		<th data-name="G" class="<?php echo $patient_an_registration->G->headerCellClass() ?>"><div id="elh_patient_an_registration_G" class="patient_an_registration_G"><div class="ew-table-header-caption"><?php echo $patient_an_registration->G->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="G" class="<?php echo $patient_an_registration->G->headerCellClass() ?>"><div><div id="elh_patient_an_registration_G" class="patient_an_registration_G">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->G->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->G->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->G->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->P->Visible) { // P ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->P) == "") { ?>
		<th data-name="P" class="<?php echo $patient_an_registration->P->headerCellClass() ?>"><div id="elh_patient_an_registration_P" class="patient_an_registration_P"><div class="ew-table-header-caption"><?php echo $patient_an_registration->P->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="P" class="<?php echo $patient_an_registration->P->headerCellClass() ?>"><div><div id="elh_patient_an_registration_P" class="patient_an_registration_P">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->P->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->P->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->P->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->L->Visible) { // L ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->L) == "") { ?>
		<th data-name="L" class="<?php echo $patient_an_registration->L->headerCellClass() ?>"><div id="elh_patient_an_registration_L" class="patient_an_registration_L"><div class="ew-table-header-caption"><?php echo $patient_an_registration->L->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="L" class="<?php echo $patient_an_registration->L->headerCellClass() ?>"><div><div id="elh_patient_an_registration_L" class="patient_an_registration_L">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->L->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->L->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->L->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->A->Visible) { // A ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->A) == "") { ?>
		<th data-name="A" class="<?php echo $patient_an_registration->A->headerCellClass() ?>"><div id="elh_patient_an_registration_A" class="patient_an_registration_A"><div class="ew-table-header-caption"><?php echo $patient_an_registration->A->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A" class="<?php echo $patient_an_registration->A->headerCellClass() ?>"><div><div id="elh_patient_an_registration_A" class="patient_an_registration_A">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->A->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->A->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->A->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->E->Visible) { // E ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->E) == "") { ?>
		<th data-name="E" class="<?php echo $patient_an_registration->E->headerCellClass() ?>"><div id="elh_patient_an_registration_E" class="patient_an_registration_E"><div class="ew-table-header-caption"><?php echo $patient_an_registration->E->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="E" class="<?php echo $patient_an_registration->E->headerCellClass() ?>"><div><div id="elh_patient_an_registration_E" class="patient_an_registration_E">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->E->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->E->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->E->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->M->Visible) { // M ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->M) == "") { ?>
		<th data-name="M" class="<?php echo $patient_an_registration->M->headerCellClass() ?>"><div id="elh_patient_an_registration_M" class="patient_an_registration_M"><div class="ew-table-header-caption"><?php echo $patient_an_registration->M->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="M" class="<?php echo $patient_an_registration->M->headerCellClass() ?>"><div><div id="elh_patient_an_registration_M" class="patient_an_registration_M">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->M->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->M->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->M->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->LMP->Visible) { // LMP ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->LMP) == "") { ?>
		<th data-name="LMP" class="<?php echo $patient_an_registration->LMP->headerCellClass() ?>"><div id="elh_patient_an_registration_LMP" class="patient_an_registration_LMP"><div class="ew-table-header-caption"><?php echo $patient_an_registration->LMP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LMP" class="<?php echo $patient_an_registration->LMP->headerCellClass() ?>"><div><div id="elh_patient_an_registration_LMP" class="patient_an_registration_LMP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->LMP->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->LMP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->LMP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->EDO->Visible) { // EDO ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->EDO) == "") { ?>
		<th data-name="EDO" class="<?php echo $patient_an_registration->EDO->headerCellClass() ?>"><div id="elh_patient_an_registration_EDO" class="patient_an_registration_EDO"><div class="ew-table-header-caption"><?php echo $patient_an_registration->EDO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EDO" class="<?php echo $patient_an_registration->EDO->headerCellClass() ?>"><div><div id="elh_patient_an_registration_EDO" class="patient_an_registration_EDO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->EDO->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->EDO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->EDO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->MenstrualHistory->Visible) { // MenstrualHistory ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->MenstrualHistory) == "") { ?>
		<th data-name="MenstrualHistory" class="<?php echo $patient_an_registration->MenstrualHistory->headerCellClass() ?>"><div id="elh_patient_an_registration_MenstrualHistory" class="patient_an_registration_MenstrualHistory"><div class="ew-table-header-caption"><?php echo $patient_an_registration->MenstrualHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MenstrualHistory" class="<?php echo $patient_an_registration->MenstrualHistory->headerCellClass() ?>"><div><div id="elh_patient_an_registration_MenstrualHistory" class="patient_an_registration_MenstrualHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->MenstrualHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->MenstrualHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->MenstrualHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->MaritalHistory->Visible) { // MaritalHistory ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->MaritalHistory) == "") { ?>
		<th data-name="MaritalHistory" class="<?php echo $patient_an_registration->MaritalHistory->headerCellClass() ?>"><div id="elh_patient_an_registration_MaritalHistory" class="patient_an_registration_MaritalHistory"><div class="ew-table-header-caption"><?php echo $patient_an_registration->MaritalHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MaritalHistory" class="<?php echo $patient_an_registration->MaritalHistory->headerCellClass() ?>"><div><div id="elh_patient_an_registration_MaritalHistory" class="patient_an_registration_MaritalHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->MaritalHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->MaritalHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->MaritalHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->ObstetricHistory->Visible) { // ObstetricHistory ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->ObstetricHistory) == "") { ?>
		<th data-name="ObstetricHistory" class="<?php echo $patient_an_registration->ObstetricHistory->headerCellClass() ?>"><div id="elh_patient_an_registration_ObstetricHistory" class="patient_an_registration_ObstetricHistory"><div class="ew-table-header-caption"><?php echo $patient_an_registration->ObstetricHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ObstetricHistory" class="<?php echo $patient_an_registration->ObstetricHistory->headerCellClass() ?>"><div><div id="elh_patient_an_registration_ObstetricHistory" class="patient_an_registration_ObstetricHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->ObstetricHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->ObstetricHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->ObstetricHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->PreviousHistoryofGDM->Visible) { // PreviousHistoryofGDM ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->PreviousHistoryofGDM) == "") { ?>
		<th data-name="PreviousHistoryofGDM" class="<?php echo $patient_an_registration->PreviousHistoryofGDM->headerCellClass() ?>"><div id="elh_patient_an_registration_PreviousHistoryofGDM" class="patient_an_registration_PreviousHistoryofGDM"><div class="ew-table-header-caption"><?php echo $patient_an_registration->PreviousHistoryofGDM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PreviousHistoryofGDM" class="<?php echo $patient_an_registration->PreviousHistoryofGDM->headerCellClass() ?>"><div><div id="elh_patient_an_registration_PreviousHistoryofGDM" class="patient_an_registration_PreviousHistoryofGDM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->PreviousHistoryofGDM->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->PreviousHistoryofGDM->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->PreviousHistoryofGDM->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->PreviousHistorofPIH->Visible) { // PreviousHistorofPIH ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->PreviousHistorofPIH) == "") { ?>
		<th data-name="PreviousHistorofPIH" class="<?php echo $patient_an_registration->PreviousHistorofPIH->headerCellClass() ?>"><div id="elh_patient_an_registration_PreviousHistorofPIH" class="patient_an_registration_PreviousHistorofPIH"><div class="ew-table-header-caption"><?php echo $patient_an_registration->PreviousHistorofPIH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PreviousHistorofPIH" class="<?php echo $patient_an_registration->PreviousHistorofPIH->headerCellClass() ?>"><div><div id="elh_patient_an_registration_PreviousHistorofPIH" class="patient_an_registration_PreviousHistorofPIH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->PreviousHistorofPIH->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->PreviousHistorofPIH->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->PreviousHistorofPIH->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->PreviousHistoryofIUGR->Visible) { // PreviousHistoryofIUGR ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->PreviousHistoryofIUGR) == "") { ?>
		<th data-name="PreviousHistoryofIUGR" class="<?php echo $patient_an_registration->PreviousHistoryofIUGR->headerCellClass() ?>"><div id="elh_patient_an_registration_PreviousHistoryofIUGR" class="patient_an_registration_PreviousHistoryofIUGR"><div class="ew-table-header-caption"><?php echo $patient_an_registration->PreviousHistoryofIUGR->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PreviousHistoryofIUGR" class="<?php echo $patient_an_registration->PreviousHistoryofIUGR->headerCellClass() ?>"><div><div id="elh_patient_an_registration_PreviousHistoryofIUGR" class="patient_an_registration_PreviousHistoryofIUGR">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->PreviousHistoryofIUGR->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->PreviousHistoryofIUGR->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->PreviousHistoryofIUGR->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->PreviousHistoryofOligohydramnios->Visible) { // PreviousHistoryofOligohydramnios ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->PreviousHistoryofOligohydramnios) == "") { ?>
		<th data-name="PreviousHistoryofOligohydramnios" class="<?php echo $patient_an_registration->PreviousHistoryofOligohydramnios->headerCellClass() ?>"><div id="elh_patient_an_registration_PreviousHistoryofOligohydramnios" class="patient_an_registration_PreviousHistoryofOligohydramnios"><div class="ew-table-header-caption"><?php echo $patient_an_registration->PreviousHistoryofOligohydramnios->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PreviousHistoryofOligohydramnios" class="<?php echo $patient_an_registration->PreviousHistoryofOligohydramnios->headerCellClass() ?>"><div><div id="elh_patient_an_registration_PreviousHistoryofOligohydramnios" class="patient_an_registration_PreviousHistoryofOligohydramnios">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->PreviousHistoryofOligohydramnios->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->PreviousHistoryofOligohydramnios->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->PreviousHistoryofOligohydramnios->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->PreviousHistoryofPreterm->Visible) { // PreviousHistoryofPreterm ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->PreviousHistoryofPreterm) == "") { ?>
		<th data-name="PreviousHistoryofPreterm" class="<?php echo $patient_an_registration->PreviousHistoryofPreterm->headerCellClass() ?>"><div id="elh_patient_an_registration_PreviousHistoryofPreterm" class="patient_an_registration_PreviousHistoryofPreterm"><div class="ew-table-header-caption"><?php echo $patient_an_registration->PreviousHistoryofPreterm->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PreviousHistoryofPreterm" class="<?php echo $patient_an_registration->PreviousHistoryofPreterm->headerCellClass() ?>"><div><div id="elh_patient_an_registration_PreviousHistoryofPreterm" class="patient_an_registration_PreviousHistoryofPreterm">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->PreviousHistoryofPreterm->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->PreviousHistoryofPreterm->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->PreviousHistoryofPreterm->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->G1->Visible) { // G1 ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->G1) == "") { ?>
		<th data-name="G1" class="<?php echo $patient_an_registration->G1->headerCellClass() ?>"><div id="elh_patient_an_registration_G1" class="patient_an_registration_G1"><div class="ew-table-header-caption"><?php echo $patient_an_registration->G1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="G1" class="<?php echo $patient_an_registration->G1->headerCellClass() ?>"><div><div id="elh_patient_an_registration_G1" class="patient_an_registration_G1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->G1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->G1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->G1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->G2->Visible) { // G2 ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->G2) == "") { ?>
		<th data-name="G2" class="<?php echo $patient_an_registration->G2->headerCellClass() ?>"><div id="elh_patient_an_registration_G2" class="patient_an_registration_G2"><div class="ew-table-header-caption"><?php echo $patient_an_registration->G2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="G2" class="<?php echo $patient_an_registration->G2->headerCellClass() ?>"><div><div id="elh_patient_an_registration_G2" class="patient_an_registration_G2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->G2->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->G2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->G2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->G3->Visible) { // G3 ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->G3) == "") { ?>
		<th data-name="G3" class="<?php echo $patient_an_registration->G3->headerCellClass() ?>"><div id="elh_patient_an_registration_G3" class="patient_an_registration_G3"><div class="ew-table-header-caption"><?php echo $patient_an_registration->G3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="G3" class="<?php echo $patient_an_registration->G3->headerCellClass() ?>"><div><div id="elh_patient_an_registration_G3" class="patient_an_registration_G3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->G3->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->G3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->G3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->DeliveryNDLSCS1->Visible) { // DeliveryNDLSCS1 ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->DeliveryNDLSCS1) == "") { ?>
		<th data-name="DeliveryNDLSCS1" class="<?php echo $patient_an_registration->DeliveryNDLSCS1->headerCellClass() ?>"><div id="elh_patient_an_registration_DeliveryNDLSCS1" class="patient_an_registration_DeliveryNDLSCS1"><div class="ew-table-header-caption"><?php echo $patient_an_registration->DeliveryNDLSCS1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeliveryNDLSCS1" class="<?php echo $patient_an_registration->DeliveryNDLSCS1->headerCellClass() ?>"><div><div id="elh_patient_an_registration_DeliveryNDLSCS1" class="patient_an_registration_DeliveryNDLSCS1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->DeliveryNDLSCS1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->DeliveryNDLSCS1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->DeliveryNDLSCS1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->DeliveryNDLSCS2->Visible) { // DeliveryNDLSCS2 ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->DeliveryNDLSCS2) == "") { ?>
		<th data-name="DeliveryNDLSCS2" class="<?php echo $patient_an_registration->DeliveryNDLSCS2->headerCellClass() ?>"><div id="elh_patient_an_registration_DeliveryNDLSCS2" class="patient_an_registration_DeliveryNDLSCS2"><div class="ew-table-header-caption"><?php echo $patient_an_registration->DeliveryNDLSCS2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeliveryNDLSCS2" class="<?php echo $patient_an_registration->DeliveryNDLSCS2->headerCellClass() ?>"><div><div id="elh_patient_an_registration_DeliveryNDLSCS2" class="patient_an_registration_DeliveryNDLSCS2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->DeliveryNDLSCS2->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->DeliveryNDLSCS2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->DeliveryNDLSCS2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->DeliveryNDLSCS3->Visible) { // DeliveryNDLSCS3 ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->DeliveryNDLSCS3) == "") { ?>
		<th data-name="DeliveryNDLSCS3" class="<?php echo $patient_an_registration->DeliveryNDLSCS3->headerCellClass() ?>"><div id="elh_patient_an_registration_DeliveryNDLSCS3" class="patient_an_registration_DeliveryNDLSCS3"><div class="ew-table-header-caption"><?php echo $patient_an_registration->DeliveryNDLSCS3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeliveryNDLSCS3" class="<?php echo $patient_an_registration->DeliveryNDLSCS3->headerCellClass() ?>"><div><div id="elh_patient_an_registration_DeliveryNDLSCS3" class="patient_an_registration_DeliveryNDLSCS3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->DeliveryNDLSCS3->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->DeliveryNDLSCS3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->DeliveryNDLSCS3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->BabySexweight1->Visible) { // BabySexweight1 ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->BabySexweight1) == "") { ?>
		<th data-name="BabySexweight1" class="<?php echo $patient_an_registration->BabySexweight1->headerCellClass() ?>"><div id="elh_patient_an_registration_BabySexweight1" class="patient_an_registration_BabySexweight1"><div class="ew-table-header-caption"><?php echo $patient_an_registration->BabySexweight1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BabySexweight1" class="<?php echo $patient_an_registration->BabySexweight1->headerCellClass() ?>"><div><div id="elh_patient_an_registration_BabySexweight1" class="patient_an_registration_BabySexweight1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->BabySexweight1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->BabySexweight1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->BabySexweight1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->BabySexweight2->Visible) { // BabySexweight2 ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->BabySexweight2) == "") { ?>
		<th data-name="BabySexweight2" class="<?php echo $patient_an_registration->BabySexweight2->headerCellClass() ?>"><div id="elh_patient_an_registration_BabySexweight2" class="patient_an_registration_BabySexweight2"><div class="ew-table-header-caption"><?php echo $patient_an_registration->BabySexweight2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BabySexweight2" class="<?php echo $patient_an_registration->BabySexweight2->headerCellClass() ?>"><div><div id="elh_patient_an_registration_BabySexweight2" class="patient_an_registration_BabySexweight2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->BabySexweight2->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->BabySexweight2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->BabySexweight2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->BabySexweight3->Visible) { // BabySexweight3 ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->BabySexweight3) == "") { ?>
		<th data-name="BabySexweight3" class="<?php echo $patient_an_registration->BabySexweight3->headerCellClass() ?>"><div id="elh_patient_an_registration_BabySexweight3" class="patient_an_registration_BabySexweight3"><div class="ew-table-header-caption"><?php echo $patient_an_registration->BabySexweight3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BabySexweight3" class="<?php echo $patient_an_registration->BabySexweight3->headerCellClass() ?>"><div><div id="elh_patient_an_registration_BabySexweight3" class="patient_an_registration_BabySexweight3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->BabySexweight3->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->BabySexweight3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->BabySexweight3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->PastMedicalHistory->Visible) { // PastMedicalHistory ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->PastMedicalHistory) == "") { ?>
		<th data-name="PastMedicalHistory" class="<?php echo $patient_an_registration->PastMedicalHistory->headerCellClass() ?>"><div id="elh_patient_an_registration_PastMedicalHistory" class="patient_an_registration_PastMedicalHistory"><div class="ew-table-header-caption"><?php echo $patient_an_registration->PastMedicalHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PastMedicalHistory" class="<?php echo $patient_an_registration->PastMedicalHistory->headerCellClass() ?>"><div><div id="elh_patient_an_registration_PastMedicalHistory" class="patient_an_registration_PastMedicalHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->PastMedicalHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->PastMedicalHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->PastMedicalHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->PastSurgicalHistory->Visible) { // PastSurgicalHistory ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->PastSurgicalHistory) == "") { ?>
		<th data-name="PastSurgicalHistory" class="<?php echo $patient_an_registration->PastSurgicalHistory->headerCellClass() ?>"><div id="elh_patient_an_registration_PastSurgicalHistory" class="patient_an_registration_PastSurgicalHistory"><div class="ew-table-header-caption"><?php echo $patient_an_registration->PastSurgicalHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PastSurgicalHistory" class="<?php echo $patient_an_registration->PastSurgicalHistory->headerCellClass() ?>"><div><div id="elh_patient_an_registration_PastSurgicalHistory" class="patient_an_registration_PastSurgicalHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->PastSurgicalHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->PastSurgicalHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->PastSurgicalHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->FamilyHistory->Visible) { // FamilyHistory ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->FamilyHistory) == "") { ?>
		<th data-name="FamilyHistory" class="<?php echo $patient_an_registration->FamilyHistory->headerCellClass() ?>"><div id="elh_patient_an_registration_FamilyHistory" class="patient_an_registration_FamilyHistory"><div class="ew-table-header-caption"><?php echo $patient_an_registration->FamilyHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FamilyHistory" class="<?php echo $patient_an_registration->FamilyHistory->headerCellClass() ?>"><div><div id="elh_patient_an_registration_FamilyHistory" class="patient_an_registration_FamilyHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->FamilyHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->FamilyHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->FamilyHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Viability->Visible) { // Viability ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Viability) == "") { ?>
		<th data-name="Viability" class="<?php echo $patient_an_registration->Viability->headerCellClass() ?>"><div id="elh_patient_an_registration_Viability" class="patient_an_registration_Viability"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Viability->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Viability" class="<?php echo $patient_an_registration->Viability->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Viability" class="patient_an_registration_Viability">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Viability->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Viability->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Viability->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->ViabilityDATE->Visible) { // ViabilityDATE ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->ViabilityDATE) == "") { ?>
		<th data-name="ViabilityDATE" class="<?php echo $patient_an_registration->ViabilityDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_ViabilityDATE" class="patient_an_registration_ViabilityDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration->ViabilityDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ViabilityDATE" class="<?php echo $patient_an_registration->ViabilityDATE->headerCellClass() ?>"><div><div id="elh_patient_an_registration_ViabilityDATE" class="patient_an_registration_ViabilityDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->ViabilityDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->ViabilityDATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->ViabilityDATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->ViabilityREPORT->Visible) { // ViabilityREPORT ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->ViabilityREPORT) == "") { ?>
		<th data-name="ViabilityREPORT" class="<?php echo $patient_an_registration->ViabilityREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_ViabilityREPORT" class="patient_an_registration_ViabilityREPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration->ViabilityREPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ViabilityREPORT" class="<?php echo $patient_an_registration->ViabilityREPORT->headerCellClass() ?>"><div><div id="elh_patient_an_registration_ViabilityREPORT" class="patient_an_registration_ViabilityREPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->ViabilityREPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->ViabilityREPORT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->ViabilityREPORT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Viability2->Visible) { // Viability2 ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Viability2) == "") { ?>
		<th data-name="Viability2" class="<?php echo $patient_an_registration->Viability2->headerCellClass() ?>"><div id="elh_patient_an_registration_Viability2" class="patient_an_registration_Viability2"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Viability2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Viability2" class="<?php echo $patient_an_registration->Viability2->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Viability2" class="patient_an_registration_Viability2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Viability2->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Viability2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Viability2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Viability2DATE->Visible) { // Viability2DATE ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Viability2DATE) == "") { ?>
		<th data-name="Viability2DATE" class="<?php echo $patient_an_registration->Viability2DATE->headerCellClass() ?>"><div id="elh_patient_an_registration_Viability2DATE" class="patient_an_registration_Viability2DATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Viability2DATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Viability2DATE" class="<?php echo $patient_an_registration->Viability2DATE->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Viability2DATE" class="patient_an_registration_Viability2DATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Viability2DATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Viability2DATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Viability2DATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Viability2REPORT->Visible) { // Viability2REPORT ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Viability2REPORT) == "") { ?>
		<th data-name="Viability2REPORT" class="<?php echo $patient_an_registration->Viability2REPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_Viability2REPORT" class="patient_an_registration_Viability2REPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Viability2REPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Viability2REPORT" class="<?php echo $patient_an_registration->Viability2REPORT->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Viability2REPORT" class="patient_an_registration_Viability2REPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Viability2REPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Viability2REPORT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Viability2REPORT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->NTscan->Visible) { // NTscan ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->NTscan) == "") { ?>
		<th data-name="NTscan" class="<?php echo $patient_an_registration->NTscan->headerCellClass() ?>"><div id="elh_patient_an_registration_NTscan" class="patient_an_registration_NTscan"><div class="ew-table-header-caption"><?php echo $patient_an_registration->NTscan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NTscan" class="<?php echo $patient_an_registration->NTscan->headerCellClass() ?>"><div><div id="elh_patient_an_registration_NTscan" class="patient_an_registration_NTscan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->NTscan->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->NTscan->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->NTscan->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->NTscanDATE->Visible) { // NTscanDATE ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->NTscanDATE) == "") { ?>
		<th data-name="NTscanDATE" class="<?php echo $patient_an_registration->NTscanDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_NTscanDATE" class="patient_an_registration_NTscanDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration->NTscanDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NTscanDATE" class="<?php echo $patient_an_registration->NTscanDATE->headerCellClass() ?>"><div><div id="elh_patient_an_registration_NTscanDATE" class="patient_an_registration_NTscanDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->NTscanDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->NTscanDATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->NTscanDATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->NTscanREPORT->Visible) { // NTscanREPORT ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->NTscanREPORT) == "") { ?>
		<th data-name="NTscanREPORT" class="<?php echo $patient_an_registration->NTscanREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_NTscanREPORT" class="patient_an_registration_NTscanREPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration->NTscanREPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NTscanREPORT" class="<?php echo $patient_an_registration->NTscanREPORT->headerCellClass() ?>"><div><div id="elh_patient_an_registration_NTscanREPORT" class="patient_an_registration_NTscanREPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->NTscanREPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->NTscanREPORT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->NTscanREPORT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->EarlyTarget->Visible) { // EarlyTarget ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->EarlyTarget) == "") { ?>
		<th data-name="EarlyTarget" class="<?php echo $patient_an_registration->EarlyTarget->headerCellClass() ?>"><div id="elh_patient_an_registration_EarlyTarget" class="patient_an_registration_EarlyTarget"><div class="ew-table-header-caption"><?php echo $patient_an_registration->EarlyTarget->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EarlyTarget" class="<?php echo $patient_an_registration->EarlyTarget->headerCellClass() ?>"><div><div id="elh_patient_an_registration_EarlyTarget" class="patient_an_registration_EarlyTarget">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->EarlyTarget->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->EarlyTarget->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->EarlyTarget->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->EarlyTargetDATE->Visible) { // EarlyTargetDATE ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->EarlyTargetDATE) == "") { ?>
		<th data-name="EarlyTargetDATE" class="<?php echo $patient_an_registration->EarlyTargetDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_EarlyTargetDATE" class="patient_an_registration_EarlyTargetDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration->EarlyTargetDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EarlyTargetDATE" class="<?php echo $patient_an_registration->EarlyTargetDATE->headerCellClass() ?>"><div><div id="elh_patient_an_registration_EarlyTargetDATE" class="patient_an_registration_EarlyTargetDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->EarlyTargetDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->EarlyTargetDATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->EarlyTargetDATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->EarlyTargetREPORT->Visible) { // EarlyTargetREPORT ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->EarlyTargetREPORT) == "") { ?>
		<th data-name="EarlyTargetREPORT" class="<?php echo $patient_an_registration->EarlyTargetREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_EarlyTargetREPORT" class="patient_an_registration_EarlyTargetREPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration->EarlyTargetREPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EarlyTargetREPORT" class="<?php echo $patient_an_registration->EarlyTargetREPORT->headerCellClass() ?>"><div><div id="elh_patient_an_registration_EarlyTargetREPORT" class="patient_an_registration_EarlyTargetREPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->EarlyTargetREPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->EarlyTargetREPORT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->EarlyTargetREPORT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Anomaly->Visible) { // Anomaly ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Anomaly) == "") { ?>
		<th data-name="Anomaly" class="<?php echo $patient_an_registration->Anomaly->headerCellClass() ?>"><div id="elh_patient_an_registration_Anomaly" class="patient_an_registration_Anomaly"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Anomaly->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Anomaly" class="<?php echo $patient_an_registration->Anomaly->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Anomaly" class="patient_an_registration_Anomaly">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Anomaly->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Anomaly->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Anomaly->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->AnomalyDATE->Visible) { // AnomalyDATE ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->AnomalyDATE) == "") { ?>
		<th data-name="AnomalyDATE" class="<?php echo $patient_an_registration->AnomalyDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_AnomalyDATE" class="patient_an_registration_AnomalyDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration->AnomalyDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnomalyDATE" class="<?php echo $patient_an_registration->AnomalyDATE->headerCellClass() ?>"><div><div id="elh_patient_an_registration_AnomalyDATE" class="patient_an_registration_AnomalyDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->AnomalyDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->AnomalyDATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->AnomalyDATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->AnomalyREPORT->Visible) { // AnomalyREPORT ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->AnomalyREPORT) == "") { ?>
		<th data-name="AnomalyREPORT" class="<?php echo $patient_an_registration->AnomalyREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_AnomalyREPORT" class="patient_an_registration_AnomalyREPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration->AnomalyREPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnomalyREPORT" class="<?php echo $patient_an_registration->AnomalyREPORT->headerCellClass() ?>"><div><div id="elh_patient_an_registration_AnomalyREPORT" class="patient_an_registration_AnomalyREPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->AnomalyREPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->AnomalyREPORT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->AnomalyREPORT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Growth->Visible) { // Growth ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Growth) == "") { ?>
		<th data-name="Growth" class="<?php echo $patient_an_registration->Growth->headerCellClass() ?>"><div id="elh_patient_an_registration_Growth" class="patient_an_registration_Growth"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Growth->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Growth" class="<?php echo $patient_an_registration->Growth->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Growth" class="patient_an_registration_Growth">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Growth->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Growth->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Growth->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->GrowthDATE->Visible) { // GrowthDATE ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->GrowthDATE) == "") { ?>
		<th data-name="GrowthDATE" class="<?php echo $patient_an_registration->GrowthDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_GrowthDATE" class="patient_an_registration_GrowthDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration->GrowthDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GrowthDATE" class="<?php echo $patient_an_registration->GrowthDATE->headerCellClass() ?>"><div><div id="elh_patient_an_registration_GrowthDATE" class="patient_an_registration_GrowthDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->GrowthDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->GrowthDATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->GrowthDATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->GrowthREPORT->Visible) { // GrowthREPORT ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->GrowthREPORT) == "") { ?>
		<th data-name="GrowthREPORT" class="<?php echo $patient_an_registration->GrowthREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_GrowthREPORT" class="patient_an_registration_GrowthREPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration->GrowthREPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GrowthREPORT" class="<?php echo $patient_an_registration->GrowthREPORT->headerCellClass() ?>"><div><div id="elh_patient_an_registration_GrowthREPORT" class="patient_an_registration_GrowthREPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->GrowthREPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->GrowthREPORT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->GrowthREPORT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Growth1->Visible) { // Growth1 ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Growth1) == "") { ?>
		<th data-name="Growth1" class="<?php echo $patient_an_registration->Growth1->headerCellClass() ?>"><div id="elh_patient_an_registration_Growth1" class="patient_an_registration_Growth1"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Growth1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Growth1" class="<?php echo $patient_an_registration->Growth1->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Growth1" class="patient_an_registration_Growth1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Growth1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Growth1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Growth1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Growth1DATE->Visible) { // Growth1DATE ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Growth1DATE) == "") { ?>
		<th data-name="Growth1DATE" class="<?php echo $patient_an_registration->Growth1DATE->headerCellClass() ?>"><div id="elh_patient_an_registration_Growth1DATE" class="patient_an_registration_Growth1DATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Growth1DATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Growth1DATE" class="<?php echo $patient_an_registration->Growth1DATE->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Growth1DATE" class="patient_an_registration_Growth1DATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Growth1DATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Growth1DATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Growth1DATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Growth1REPORT->Visible) { // Growth1REPORT ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Growth1REPORT) == "") { ?>
		<th data-name="Growth1REPORT" class="<?php echo $patient_an_registration->Growth1REPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_Growth1REPORT" class="patient_an_registration_Growth1REPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Growth1REPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Growth1REPORT" class="<?php echo $patient_an_registration->Growth1REPORT->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Growth1REPORT" class="patient_an_registration_Growth1REPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Growth1REPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Growth1REPORT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Growth1REPORT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->ANProfile->Visible) { // ANProfile ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->ANProfile) == "") { ?>
		<th data-name="ANProfile" class="<?php echo $patient_an_registration->ANProfile->headerCellClass() ?>"><div id="elh_patient_an_registration_ANProfile" class="patient_an_registration_ANProfile"><div class="ew-table-header-caption"><?php echo $patient_an_registration->ANProfile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ANProfile" class="<?php echo $patient_an_registration->ANProfile->headerCellClass() ?>"><div><div id="elh_patient_an_registration_ANProfile" class="patient_an_registration_ANProfile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->ANProfile->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->ANProfile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->ANProfile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->ANProfileDATE->Visible) { // ANProfileDATE ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->ANProfileDATE) == "") { ?>
		<th data-name="ANProfileDATE" class="<?php echo $patient_an_registration->ANProfileDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_ANProfileDATE" class="patient_an_registration_ANProfileDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration->ANProfileDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ANProfileDATE" class="<?php echo $patient_an_registration->ANProfileDATE->headerCellClass() ?>"><div><div id="elh_patient_an_registration_ANProfileDATE" class="patient_an_registration_ANProfileDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->ANProfileDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->ANProfileDATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->ANProfileDATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->ANProfileINHOUSE->Visible) { // ANProfileINHOUSE ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->ANProfileINHOUSE) == "") { ?>
		<th data-name="ANProfileINHOUSE" class="<?php echo $patient_an_registration->ANProfileINHOUSE->headerCellClass() ?>"><div id="elh_patient_an_registration_ANProfileINHOUSE" class="patient_an_registration_ANProfileINHOUSE"><div class="ew-table-header-caption"><?php echo $patient_an_registration->ANProfileINHOUSE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ANProfileINHOUSE" class="<?php echo $patient_an_registration->ANProfileINHOUSE->headerCellClass() ?>"><div><div id="elh_patient_an_registration_ANProfileINHOUSE" class="patient_an_registration_ANProfileINHOUSE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->ANProfileINHOUSE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->ANProfileINHOUSE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->ANProfileINHOUSE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->ANProfileREPORT->Visible) { // ANProfileREPORT ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->ANProfileREPORT) == "") { ?>
		<th data-name="ANProfileREPORT" class="<?php echo $patient_an_registration->ANProfileREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_ANProfileREPORT" class="patient_an_registration_ANProfileREPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration->ANProfileREPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ANProfileREPORT" class="<?php echo $patient_an_registration->ANProfileREPORT->headerCellClass() ?>"><div><div id="elh_patient_an_registration_ANProfileREPORT" class="patient_an_registration_ANProfileREPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->ANProfileREPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->ANProfileREPORT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->ANProfileREPORT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->DualMarker->Visible) { // DualMarker ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->DualMarker) == "") { ?>
		<th data-name="DualMarker" class="<?php echo $patient_an_registration->DualMarker->headerCellClass() ?>"><div id="elh_patient_an_registration_DualMarker" class="patient_an_registration_DualMarker"><div class="ew-table-header-caption"><?php echo $patient_an_registration->DualMarker->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DualMarker" class="<?php echo $patient_an_registration->DualMarker->headerCellClass() ?>"><div><div id="elh_patient_an_registration_DualMarker" class="patient_an_registration_DualMarker">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->DualMarker->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->DualMarker->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->DualMarker->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->DualMarkerDATE->Visible) { // DualMarkerDATE ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->DualMarkerDATE) == "") { ?>
		<th data-name="DualMarkerDATE" class="<?php echo $patient_an_registration->DualMarkerDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_DualMarkerDATE" class="patient_an_registration_DualMarkerDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration->DualMarkerDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DualMarkerDATE" class="<?php echo $patient_an_registration->DualMarkerDATE->headerCellClass() ?>"><div><div id="elh_patient_an_registration_DualMarkerDATE" class="patient_an_registration_DualMarkerDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->DualMarkerDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->DualMarkerDATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->DualMarkerDATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->DualMarkerINHOUSE->Visible) { // DualMarkerINHOUSE ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->DualMarkerINHOUSE) == "") { ?>
		<th data-name="DualMarkerINHOUSE" class="<?php echo $patient_an_registration->DualMarkerINHOUSE->headerCellClass() ?>"><div id="elh_patient_an_registration_DualMarkerINHOUSE" class="patient_an_registration_DualMarkerINHOUSE"><div class="ew-table-header-caption"><?php echo $patient_an_registration->DualMarkerINHOUSE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DualMarkerINHOUSE" class="<?php echo $patient_an_registration->DualMarkerINHOUSE->headerCellClass() ?>"><div><div id="elh_patient_an_registration_DualMarkerINHOUSE" class="patient_an_registration_DualMarkerINHOUSE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->DualMarkerINHOUSE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->DualMarkerINHOUSE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->DualMarkerINHOUSE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->DualMarkerREPORT->Visible) { // DualMarkerREPORT ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->DualMarkerREPORT) == "") { ?>
		<th data-name="DualMarkerREPORT" class="<?php echo $patient_an_registration->DualMarkerREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_DualMarkerREPORT" class="patient_an_registration_DualMarkerREPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration->DualMarkerREPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DualMarkerREPORT" class="<?php echo $patient_an_registration->DualMarkerREPORT->headerCellClass() ?>"><div><div id="elh_patient_an_registration_DualMarkerREPORT" class="patient_an_registration_DualMarkerREPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->DualMarkerREPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->DualMarkerREPORT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->DualMarkerREPORT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Quadruple->Visible) { // Quadruple ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Quadruple) == "") { ?>
		<th data-name="Quadruple" class="<?php echo $patient_an_registration->Quadruple->headerCellClass() ?>"><div id="elh_patient_an_registration_Quadruple" class="patient_an_registration_Quadruple"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Quadruple->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Quadruple" class="<?php echo $patient_an_registration->Quadruple->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Quadruple" class="patient_an_registration_Quadruple">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Quadruple->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Quadruple->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Quadruple->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->QuadrupleDATE->Visible) { // QuadrupleDATE ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->QuadrupleDATE) == "") { ?>
		<th data-name="QuadrupleDATE" class="<?php echo $patient_an_registration->QuadrupleDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_QuadrupleDATE" class="patient_an_registration_QuadrupleDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration->QuadrupleDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="QuadrupleDATE" class="<?php echo $patient_an_registration->QuadrupleDATE->headerCellClass() ?>"><div><div id="elh_patient_an_registration_QuadrupleDATE" class="patient_an_registration_QuadrupleDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->QuadrupleDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->QuadrupleDATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->QuadrupleDATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->QuadrupleINHOUSE->Visible) { // QuadrupleINHOUSE ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->QuadrupleINHOUSE) == "") { ?>
		<th data-name="QuadrupleINHOUSE" class="<?php echo $patient_an_registration->QuadrupleINHOUSE->headerCellClass() ?>"><div id="elh_patient_an_registration_QuadrupleINHOUSE" class="patient_an_registration_QuadrupleINHOUSE"><div class="ew-table-header-caption"><?php echo $patient_an_registration->QuadrupleINHOUSE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="QuadrupleINHOUSE" class="<?php echo $patient_an_registration->QuadrupleINHOUSE->headerCellClass() ?>"><div><div id="elh_patient_an_registration_QuadrupleINHOUSE" class="patient_an_registration_QuadrupleINHOUSE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->QuadrupleINHOUSE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->QuadrupleINHOUSE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->QuadrupleINHOUSE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->QuadrupleREPORT->Visible) { // QuadrupleREPORT ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->QuadrupleREPORT) == "") { ?>
		<th data-name="QuadrupleREPORT" class="<?php echo $patient_an_registration->QuadrupleREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_QuadrupleREPORT" class="patient_an_registration_QuadrupleREPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration->QuadrupleREPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="QuadrupleREPORT" class="<?php echo $patient_an_registration->QuadrupleREPORT->headerCellClass() ?>"><div><div id="elh_patient_an_registration_QuadrupleREPORT" class="patient_an_registration_QuadrupleREPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->QuadrupleREPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->QuadrupleREPORT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->QuadrupleREPORT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->A5month->Visible) { // A5month ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->A5month) == "") { ?>
		<th data-name="A5month" class="<?php echo $patient_an_registration->A5month->headerCellClass() ?>"><div id="elh_patient_an_registration_A5month" class="patient_an_registration_A5month"><div class="ew-table-header-caption"><?php echo $patient_an_registration->A5month->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A5month" class="<?php echo $patient_an_registration->A5month->headerCellClass() ?>"><div><div id="elh_patient_an_registration_A5month" class="patient_an_registration_A5month">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->A5month->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->A5month->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->A5month->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->A5monthDATE->Visible) { // A5monthDATE ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->A5monthDATE) == "") { ?>
		<th data-name="A5monthDATE" class="<?php echo $patient_an_registration->A5monthDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_A5monthDATE" class="patient_an_registration_A5monthDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration->A5monthDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A5monthDATE" class="<?php echo $patient_an_registration->A5monthDATE->headerCellClass() ?>"><div><div id="elh_patient_an_registration_A5monthDATE" class="patient_an_registration_A5monthDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->A5monthDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->A5monthDATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->A5monthDATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->A5monthINHOUSE->Visible) { // A5monthINHOUSE ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->A5monthINHOUSE) == "") { ?>
		<th data-name="A5monthINHOUSE" class="<?php echo $patient_an_registration->A5monthINHOUSE->headerCellClass() ?>"><div id="elh_patient_an_registration_A5monthINHOUSE" class="patient_an_registration_A5monthINHOUSE"><div class="ew-table-header-caption"><?php echo $patient_an_registration->A5monthINHOUSE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A5monthINHOUSE" class="<?php echo $patient_an_registration->A5monthINHOUSE->headerCellClass() ?>"><div><div id="elh_patient_an_registration_A5monthINHOUSE" class="patient_an_registration_A5monthINHOUSE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->A5monthINHOUSE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->A5monthINHOUSE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->A5monthINHOUSE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->A5monthREPORT->Visible) { // A5monthREPORT ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->A5monthREPORT) == "") { ?>
		<th data-name="A5monthREPORT" class="<?php echo $patient_an_registration->A5monthREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_A5monthREPORT" class="patient_an_registration_A5monthREPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration->A5monthREPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A5monthREPORT" class="<?php echo $patient_an_registration->A5monthREPORT->headerCellClass() ?>"><div><div id="elh_patient_an_registration_A5monthREPORT" class="patient_an_registration_A5monthREPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->A5monthREPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->A5monthREPORT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->A5monthREPORT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->A7month->Visible) { // A7month ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->A7month) == "") { ?>
		<th data-name="A7month" class="<?php echo $patient_an_registration->A7month->headerCellClass() ?>"><div id="elh_patient_an_registration_A7month" class="patient_an_registration_A7month"><div class="ew-table-header-caption"><?php echo $patient_an_registration->A7month->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A7month" class="<?php echo $patient_an_registration->A7month->headerCellClass() ?>"><div><div id="elh_patient_an_registration_A7month" class="patient_an_registration_A7month">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->A7month->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->A7month->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->A7month->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->A7monthDATE->Visible) { // A7monthDATE ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->A7monthDATE) == "") { ?>
		<th data-name="A7monthDATE" class="<?php echo $patient_an_registration->A7monthDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_A7monthDATE" class="patient_an_registration_A7monthDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration->A7monthDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A7monthDATE" class="<?php echo $patient_an_registration->A7monthDATE->headerCellClass() ?>"><div><div id="elh_patient_an_registration_A7monthDATE" class="patient_an_registration_A7monthDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->A7monthDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->A7monthDATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->A7monthDATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->A7monthINHOUSE->Visible) { // A7monthINHOUSE ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->A7monthINHOUSE) == "") { ?>
		<th data-name="A7monthINHOUSE" class="<?php echo $patient_an_registration->A7monthINHOUSE->headerCellClass() ?>"><div id="elh_patient_an_registration_A7monthINHOUSE" class="patient_an_registration_A7monthINHOUSE"><div class="ew-table-header-caption"><?php echo $patient_an_registration->A7monthINHOUSE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A7monthINHOUSE" class="<?php echo $patient_an_registration->A7monthINHOUSE->headerCellClass() ?>"><div><div id="elh_patient_an_registration_A7monthINHOUSE" class="patient_an_registration_A7monthINHOUSE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->A7monthINHOUSE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->A7monthINHOUSE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->A7monthINHOUSE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->A7monthREPORT->Visible) { // A7monthREPORT ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->A7monthREPORT) == "") { ?>
		<th data-name="A7monthREPORT" class="<?php echo $patient_an_registration->A7monthREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_A7monthREPORT" class="patient_an_registration_A7monthREPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration->A7monthREPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A7monthREPORT" class="<?php echo $patient_an_registration->A7monthREPORT->headerCellClass() ?>"><div><div id="elh_patient_an_registration_A7monthREPORT" class="patient_an_registration_A7monthREPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->A7monthREPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->A7monthREPORT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->A7monthREPORT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->A9month->Visible) { // A9month ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->A9month) == "") { ?>
		<th data-name="A9month" class="<?php echo $patient_an_registration->A9month->headerCellClass() ?>"><div id="elh_patient_an_registration_A9month" class="patient_an_registration_A9month"><div class="ew-table-header-caption"><?php echo $patient_an_registration->A9month->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A9month" class="<?php echo $patient_an_registration->A9month->headerCellClass() ?>"><div><div id="elh_patient_an_registration_A9month" class="patient_an_registration_A9month">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->A9month->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->A9month->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->A9month->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->A9monthDATE->Visible) { // A9monthDATE ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->A9monthDATE) == "") { ?>
		<th data-name="A9monthDATE" class="<?php echo $patient_an_registration->A9monthDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_A9monthDATE" class="patient_an_registration_A9monthDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration->A9monthDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A9monthDATE" class="<?php echo $patient_an_registration->A9monthDATE->headerCellClass() ?>"><div><div id="elh_patient_an_registration_A9monthDATE" class="patient_an_registration_A9monthDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->A9monthDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->A9monthDATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->A9monthDATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->A9monthINHOUSE->Visible) { // A9monthINHOUSE ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->A9monthINHOUSE) == "") { ?>
		<th data-name="A9monthINHOUSE" class="<?php echo $patient_an_registration->A9monthINHOUSE->headerCellClass() ?>"><div id="elh_patient_an_registration_A9monthINHOUSE" class="patient_an_registration_A9monthINHOUSE"><div class="ew-table-header-caption"><?php echo $patient_an_registration->A9monthINHOUSE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A9monthINHOUSE" class="<?php echo $patient_an_registration->A9monthINHOUSE->headerCellClass() ?>"><div><div id="elh_patient_an_registration_A9monthINHOUSE" class="patient_an_registration_A9monthINHOUSE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->A9monthINHOUSE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->A9monthINHOUSE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->A9monthINHOUSE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->A9monthREPORT->Visible) { // A9monthREPORT ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->A9monthREPORT) == "") { ?>
		<th data-name="A9monthREPORT" class="<?php echo $patient_an_registration->A9monthREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_A9monthREPORT" class="patient_an_registration_A9monthREPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration->A9monthREPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A9monthREPORT" class="<?php echo $patient_an_registration->A9monthREPORT->headerCellClass() ?>"><div><div id="elh_patient_an_registration_A9monthREPORT" class="patient_an_registration_A9monthREPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->A9monthREPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->A9monthREPORT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->A9monthREPORT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->INJ->Visible) { // INJ ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->INJ) == "") { ?>
		<th data-name="INJ" class="<?php echo $patient_an_registration->INJ->headerCellClass() ?>"><div id="elh_patient_an_registration_INJ" class="patient_an_registration_INJ"><div class="ew-table-header-caption"><?php echo $patient_an_registration->INJ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="INJ" class="<?php echo $patient_an_registration->INJ->headerCellClass() ?>"><div><div id="elh_patient_an_registration_INJ" class="patient_an_registration_INJ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->INJ->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->INJ->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->INJ->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->INJDATE->Visible) { // INJDATE ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->INJDATE) == "") { ?>
		<th data-name="INJDATE" class="<?php echo $patient_an_registration->INJDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_INJDATE" class="patient_an_registration_INJDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration->INJDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="INJDATE" class="<?php echo $patient_an_registration->INJDATE->headerCellClass() ?>"><div><div id="elh_patient_an_registration_INJDATE" class="patient_an_registration_INJDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->INJDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->INJDATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->INJDATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->INJINHOUSE->Visible) { // INJINHOUSE ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->INJINHOUSE) == "") { ?>
		<th data-name="INJINHOUSE" class="<?php echo $patient_an_registration->INJINHOUSE->headerCellClass() ?>"><div id="elh_patient_an_registration_INJINHOUSE" class="patient_an_registration_INJINHOUSE"><div class="ew-table-header-caption"><?php echo $patient_an_registration->INJINHOUSE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="INJINHOUSE" class="<?php echo $patient_an_registration->INJINHOUSE->headerCellClass() ?>"><div><div id="elh_patient_an_registration_INJINHOUSE" class="patient_an_registration_INJINHOUSE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->INJINHOUSE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->INJINHOUSE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->INJINHOUSE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->INJREPORT->Visible) { // INJREPORT ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->INJREPORT) == "") { ?>
		<th data-name="INJREPORT" class="<?php echo $patient_an_registration->INJREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_INJREPORT" class="patient_an_registration_INJREPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration->INJREPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="INJREPORT" class="<?php echo $patient_an_registration->INJREPORT->headerCellClass() ?>"><div><div id="elh_patient_an_registration_INJREPORT" class="patient_an_registration_INJREPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->INJREPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->INJREPORT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->INJREPORT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Bleeding->Visible) { // Bleeding ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Bleeding) == "") { ?>
		<th data-name="Bleeding" class="<?php echo $patient_an_registration->Bleeding->headerCellClass() ?>"><div id="elh_patient_an_registration_Bleeding" class="patient_an_registration_Bleeding"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Bleeding->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Bleeding" class="<?php echo $patient_an_registration->Bleeding->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Bleeding" class="patient_an_registration_Bleeding">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Bleeding->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Bleeding->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Bleeding->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Hypothyroidism->Visible) { // Hypothyroidism ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Hypothyroidism) == "") { ?>
		<th data-name="Hypothyroidism" class="<?php echo $patient_an_registration->Hypothyroidism->headerCellClass() ?>"><div id="elh_patient_an_registration_Hypothyroidism" class="patient_an_registration_Hypothyroidism"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Hypothyroidism->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Hypothyroidism" class="<?php echo $patient_an_registration->Hypothyroidism->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Hypothyroidism" class="patient_an_registration_Hypothyroidism">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Hypothyroidism->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Hypothyroidism->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Hypothyroidism->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->PICMENumber->Visible) { // PICMENumber ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->PICMENumber) == "") { ?>
		<th data-name="PICMENumber" class="<?php echo $patient_an_registration->PICMENumber->headerCellClass() ?>"><div id="elh_patient_an_registration_PICMENumber" class="patient_an_registration_PICMENumber"><div class="ew-table-header-caption"><?php echo $patient_an_registration->PICMENumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PICMENumber" class="<?php echo $patient_an_registration->PICMENumber->headerCellClass() ?>"><div><div id="elh_patient_an_registration_PICMENumber" class="patient_an_registration_PICMENumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->PICMENumber->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->PICMENumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->PICMENumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Outcome->Visible) { // Outcome ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Outcome) == "") { ?>
		<th data-name="Outcome" class="<?php echo $patient_an_registration->Outcome->headerCellClass() ?>"><div id="elh_patient_an_registration_Outcome" class="patient_an_registration_Outcome"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Outcome->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Outcome" class="<?php echo $patient_an_registration->Outcome->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Outcome" class="patient_an_registration_Outcome">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Outcome->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Outcome->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Outcome->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->DateofAdmission->Visible) { // DateofAdmission ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->DateofAdmission) == "") { ?>
		<th data-name="DateofAdmission" class="<?php echo $patient_an_registration->DateofAdmission->headerCellClass() ?>"><div id="elh_patient_an_registration_DateofAdmission" class="patient_an_registration_DateofAdmission"><div class="ew-table-header-caption"><?php echo $patient_an_registration->DateofAdmission->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DateofAdmission" class="<?php echo $patient_an_registration->DateofAdmission->headerCellClass() ?>"><div><div id="elh_patient_an_registration_DateofAdmission" class="patient_an_registration_DateofAdmission">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->DateofAdmission->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->DateofAdmission->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->DateofAdmission->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->DateodProcedure->Visible) { // DateodProcedure ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->DateodProcedure) == "") { ?>
		<th data-name="DateodProcedure" class="<?php echo $patient_an_registration->DateodProcedure->headerCellClass() ?>"><div id="elh_patient_an_registration_DateodProcedure" class="patient_an_registration_DateodProcedure"><div class="ew-table-header-caption"><?php echo $patient_an_registration->DateodProcedure->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DateodProcedure" class="<?php echo $patient_an_registration->DateodProcedure->headerCellClass() ?>"><div><div id="elh_patient_an_registration_DateodProcedure" class="patient_an_registration_DateodProcedure">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->DateodProcedure->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->DateodProcedure->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->DateodProcedure->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Miscarriage->Visible) { // Miscarriage ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Miscarriage) == "") { ?>
		<th data-name="Miscarriage" class="<?php echo $patient_an_registration->Miscarriage->headerCellClass() ?>"><div id="elh_patient_an_registration_Miscarriage" class="patient_an_registration_Miscarriage"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Miscarriage->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Miscarriage" class="<?php echo $patient_an_registration->Miscarriage->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Miscarriage" class="patient_an_registration_Miscarriage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Miscarriage->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Miscarriage->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Miscarriage->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->ModeOfDelivery->Visible) { // ModeOfDelivery ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->ModeOfDelivery) == "") { ?>
		<th data-name="ModeOfDelivery" class="<?php echo $patient_an_registration->ModeOfDelivery->headerCellClass() ?>"><div id="elh_patient_an_registration_ModeOfDelivery" class="patient_an_registration_ModeOfDelivery"><div class="ew-table-header-caption"><?php echo $patient_an_registration->ModeOfDelivery->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeOfDelivery" class="<?php echo $patient_an_registration->ModeOfDelivery->headerCellClass() ?>"><div><div id="elh_patient_an_registration_ModeOfDelivery" class="patient_an_registration_ModeOfDelivery">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->ModeOfDelivery->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->ModeOfDelivery->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->ModeOfDelivery->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->ND->Visible) { // ND ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->ND) == "") { ?>
		<th data-name="ND" class="<?php echo $patient_an_registration->ND->headerCellClass() ?>"><div id="elh_patient_an_registration_ND" class="patient_an_registration_ND"><div class="ew-table-header-caption"><?php echo $patient_an_registration->ND->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ND" class="<?php echo $patient_an_registration->ND->headerCellClass() ?>"><div><div id="elh_patient_an_registration_ND" class="patient_an_registration_ND">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->ND->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->ND->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->ND->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->NDS->Visible) { // NDS ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->NDS) == "") { ?>
		<th data-name="NDS" class="<?php echo $patient_an_registration->NDS->headerCellClass() ?>"><div id="elh_patient_an_registration_NDS" class="patient_an_registration_NDS"><div class="ew-table-header-caption"><?php echo $patient_an_registration->NDS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NDS" class="<?php echo $patient_an_registration->NDS->headerCellClass() ?>"><div><div id="elh_patient_an_registration_NDS" class="patient_an_registration_NDS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->NDS->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->NDS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->NDS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->NDP->Visible) { // NDP ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->NDP) == "") { ?>
		<th data-name="NDP" class="<?php echo $patient_an_registration->NDP->headerCellClass() ?>"><div id="elh_patient_an_registration_NDP" class="patient_an_registration_NDP"><div class="ew-table-header-caption"><?php echo $patient_an_registration->NDP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NDP" class="<?php echo $patient_an_registration->NDP->headerCellClass() ?>"><div><div id="elh_patient_an_registration_NDP" class="patient_an_registration_NDP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->NDP->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->NDP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->NDP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Vaccum->Visible) { // Vaccum ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Vaccum) == "") { ?>
		<th data-name="Vaccum" class="<?php echo $patient_an_registration->Vaccum->headerCellClass() ?>"><div id="elh_patient_an_registration_Vaccum" class="patient_an_registration_Vaccum"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Vaccum->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Vaccum" class="<?php echo $patient_an_registration->Vaccum->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Vaccum" class="patient_an_registration_Vaccum">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Vaccum->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Vaccum->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Vaccum->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->VaccumS->Visible) { // VaccumS ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->VaccumS) == "") { ?>
		<th data-name="VaccumS" class="<?php echo $patient_an_registration->VaccumS->headerCellClass() ?>"><div id="elh_patient_an_registration_VaccumS" class="patient_an_registration_VaccumS"><div class="ew-table-header-caption"><?php echo $patient_an_registration->VaccumS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VaccumS" class="<?php echo $patient_an_registration->VaccumS->headerCellClass() ?>"><div><div id="elh_patient_an_registration_VaccumS" class="patient_an_registration_VaccumS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->VaccumS->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->VaccumS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->VaccumS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->VaccumP->Visible) { // VaccumP ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->VaccumP) == "") { ?>
		<th data-name="VaccumP" class="<?php echo $patient_an_registration->VaccumP->headerCellClass() ?>"><div id="elh_patient_an_registration_VaccumP" class="patient_an_registration_VaccumP"><div class="ew-table-header-caption"><?php echo $patient_an_registration->VaccumP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VaccumP" class="<?php echo $patient_an_registration->VaccumP->headerCellClass() ?>"><div><div id="elh_patient_an_registration_VaccumP" class="patient_an_registration_VaccumP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->VaccumP->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->VaccumP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->VaccumP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Forceps->Visible) { // Forceps ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Forceps) == "") { ?>
		<th data-name="Forceps" class="<?php echo $patient_an_registration->Forceps->headerCellClass() ?>"><div id="elh_patient_an_registration_Forceps" class="patient_an_registration_Forceps"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Forceps->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Forceps" class="<?php echo $patient_an_registration->Forceps->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Forceps" class="patient_an_registration_Forceps">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Forceps->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Forceps->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Forceps->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->ForcepsS->Visible) { // ForcepsS ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->ForcepsS) == "") { ?>
		<th data-name="ForcepsS" class="<?php echo $patient_an_registration->ForcepsS->headerCellClass() ?>"><div id="elh_patient_an_registration_ForcepsS" class="patient_an_registration_ForcepsS"><div class="ew-table-header-caption"><?php echo $patient_an_registration->ForcepsS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ForcepsS" class="<?php echo $patient_an_registration->ForcepsS->headerCellClass() ?>"><div><div id="elh_patient_an_registration_ForcepsS" class="patient_an_registration_ForcepsS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->ForcepsS->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->ForcepsS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->ForcepsS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->ForcepsP->Visible) { // ForcepsP ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->ForcepsP) == "") { ?>
		<th data-name="ForcepsP" class="<?php echo $patient_an_registration->ForcepsP->headerCellClass() ?>"><div id="elh_patient_an_registration_ForcepsP" class="patient_an_registration_ForcepsP"><div class="ew-table-header-caption"><?php echo $patient_an_registration->ForcepsP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ForcepsP" class="<?php echo $patient_an_registration->ForcepsP->headerCellClass() ?>"><div><div id="elh_patient_an_registration_ForcepsP" class="patient_an_registration_ForcepsP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->ForcepsP->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->ForcepsP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->ForcepsP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Elective->Visible) { // Elective ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Elective) == "") { ?>
		<th data-name="Elective" class="<?php echo $patient_an_registration->Elective->headerCellClass() ?>"><div id="elh_patient_an_registration_Elective" class="patient_an_registration_Elective"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Elective->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Elective" class="<?php echo $patient_an_registration->Elective->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Elective" class="patient_an_registration_Elective">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Elective->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Elective->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Elective->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->ElectiveS->Visible) { // ElectiveS ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->ElectiveS) == "") { ?>
		<th data-name="ElectiveS" class="<?php echo $patient_an_registration->ElectiveS->headerCellClass() ?>"><div id="elh_patient_an_registration_ElectiveS" class="patient_an_registration_ElectiveS"><div class="ew-table-header-caption"><?php echo $patient_an_registration->ElectiveS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ElectiveS" class="<?php echo $patient_an_registration->ElectiveS->headerCellClass() ?>"><div><div id="elh_patient_an_registration_ElectiveS" class="patient_an_registration_ElectiveS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->ElectiveS->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->ElectiveS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->ElectiveS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->ElectiveP->Visible) { // ElectiveP ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->ElectiveP) == "") { ?>
		<th data-name="ElectiveP" class="<?php echo $patient_an_registration->ElectiveP->headerCellClass() ?>"><div id="elh_patient_an_registration_ElectiveP" class="patient_an_registration_ElectiveP"><div class="ew-table-header-caption"><?php echo $patient_an_registration->ElectiveP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ElectiveP" class="<?php echo $patient_an_registration->ElectiveP->headerCellClass() ?>"><div><div id="elh_patient_an_registration_ElectiveP" class="patient_an_registration_ElectiveP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->ElectiveP->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->ElectiveP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->ElectiveP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Emergency->Visible) { // Emergency ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Emergency) == "") { ?>
		<th data-name="Emergency" class="<?php echo $patient_an_registration->Emergency->headerCellClass() ?>"><div id="elh_patient_an_registration_Emergency" class="patient_an_registration_Emergency"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Emergency->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Emergency" class="<?php echo $patient_an_registration->Emergency->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Emergency" class="patient_an_registration_Emergency">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Emergency->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Emergency->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Emergency->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->EmergencyS->Visible) { // EmergencyS ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->EmergencyS) == "") { ?>
		<th data-name="EmergencyS" class="<?php echo $patient_an_registration->EmergencyS->headerCellClass() ?>"><div id="elh_patient_an_registration_EmergencyS" class="patient_an_registration_EmergencyS"><div class="ew-table-header-caption"><?php echo $patient_an_registration->EmergencyS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EmergencyS" class="<?php echo $patient_an_registration->EmergencyS->headerCellClass() ?>"><div><div id="elh_patient_an_registration_EmergencyS" class="patient_an_registration_EmergencyS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->EmergencyS->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->EmergencyS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->EmergencyS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->EmergencyP->Visible) { // EmergencyP ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->EmergencyP) == "") { ?>
		<th data-name="EmergencyP" class="<?php echo $patient_an_registration->EmergencyP->headerCellClass() ?>"><div id="elh_patient_an_registration_EmergencyP" class="patient_an_registration_EmergencyP"><div class="ew-table-header-caption"><?php echo $patient_an_registration->EmergencyP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EmergencyP" class="<?php echo $patient_an_registration->EmergencyP->headerCellClass() ?>"><div><div id="elh_patient_an_registration_EmergencyP" class="patient_an_registration_EmergencyP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->EmergencyP->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->EmergencyP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->EmergencyP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Maturity->Visible) { // Maturity ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Maturity) == "") { ?>
		<th data-name="Maturity" class="<?php echo $patient_an_registration->Maturity->headerCellClass() ?>"><div id="elh_patient_an_registration_Maturity" class="patient_an_registration_Maturity"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Maturity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Maturity" class="<?php echo $patient_an_registration->Maturity->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Maturity" class="patient_an_registration_Maturity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Maturity->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Maturity->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Maturity->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Baby1->Visible) { // Baby1 ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Baby1) == "") { ?>
		<th data-name="Baby1" class="<?php echo $patient_an_registration->Baby1->headerCellClass() ?>"><div id="elh_patient_an_registration_Baby1" class="patient_an_registration_Baby1"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Baby1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Baby1" class="<?php echo $patient_an_registration->Baby1->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Baby1" class="patient_an_registration_Baby1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Baby1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Baby1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Baby1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Baby2->Visible) { // Baby2 ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Baby2) == "") { ?>
		<th data-name="Baby2" class="<?php echo $patient_an_registration->Baby2->headerCellClass() ?>"><div id="elh_patient_an_registration_Baby2" class="patient_an_registration_Baby2"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Baby2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Baby2" class="<?php echo $patient_an_registration->Baby2->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Baby2" class="patient_an_registration_Baby2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Baby2->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Baby2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Baby2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->sex1->Visible) { // sex1 ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->sex1) == "") { ?>
		<th data-name="sex1" class="<?php echo $patient_an_registration->sex1->headerCellClass() ?>"><div id="elh_patient_an_registration_sex1" class="patient_an_registration_sex1"><div class="ew-table-header-caption"><?php echo $patient_an_registration->sex1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sex1" class="<?php echo $patient_an_registration->sex1->headerCellClass() ?>"><div><div id="elh_patient_an_registration_sex1" class="patient_an_registration_sex1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->sex1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->sex1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->sex1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->sex2->Visible) { // sex2 ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->sex2) == "") { ?>
		<th data-name="sex2" class="<?php echo $patient_an_registration->sex2->headerCellClass() ?>"><div id="elh_patient_an_registration_sex2" class="patient_an_registration_sex2"><div class="ew-table-header-caption"><?php echo $patient_an_registration->sex2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sex2" class="<?php echo $patient_an_registration->sex2->headerCellClass() ?>"><div><div id="elh_patient_an_registration_sex2" class="patient_an_registration_sex2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->sex2->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->sex2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->sex2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->weight1->Visible) { // weight1 ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->weight1) == "") { ?>
		<th data-name="weight1" class="<?php echo $patient_an_registration->weight1->headerCellClass() ?>"><div id="elh_patient_an_registration_weight1" class="patient_an_registration_weight1"><div class="ew-table-header-caption"><?php echo $patient_an_registration->weight1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="weight1" class="<?php echo $patient_an_registration->weight1->headerCellClass() ?>"><div><div id="elh_patient_an_registration_weight1" class="patient_an_registration_weight1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->weight1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->weight1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->weight1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->weight2->Visible) { // weight2 ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->weight2) == "") { ?>
		<th data-name="weight2" class="<?php echo $patient_an_registration->weight2->headerCellClass() ?>"><div id="elh_patient_an_registration_weight2" class="patient_an_registration_weight2"><div class="ew-table-header-caption"><?php echo $patient_an_registration->weight2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="weight2" class="<?php echo $patient_an_registration->weight2->headerCellClass() ?>"><div><div id="elh_patient_an_registration_weight2" class="patient_an_registration_weight2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->weight2->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->weight2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->weight2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->NICU1->Visible) { // NICU1 ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->NICU1) == "") { ?>
		<th data-name="NICU1" class="<?php echo $patient_an_registration->NICU1->headerCellClass() ?>"><div id="elh_patient_an_registration_NICU1" class="patient_an_registration_NICU1"><div class="ew-table-header-caption"><?php echo $patient_an_registration->NICU1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NICU1" class="<?php echo $patient_an_registration->NICU1->headerCellClass() ?>"><div><div id="elh_patient_an_registration_NICU1" class="patient_an_registration_NICU1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->NICU1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->NICU1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->NICU1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->NICU2->Visible) { // NICU2 ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->NICU2) == "") { ?>
		<th data-name="NICU2" class="<?php echo $patient_an_registration->NICU2->headerCellClass() ?>"><div id="elh_patient_an_registration_NICU2" class="patient_an_registration_NICU2"><div class="ew-table-header-caption"><?php echo $patient_an_registration->NICU2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NICU2" class="<?php echo $patient_an_registration->NICU2->headerCellClass() ?>"><div><div id="elh_patient_an_registration_NICU2" class="patient_an_registration_NICU2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->NICU2->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->NICU2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->NICU2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Jaundice1->Visible) { // Jaundice1 ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Jaundice1) == "") { ?>
		<th data-name="Jaundice1" class="<?php echo $patient_an_registration->Jaundice1->headerCellClass() ?>"><div id="elh_patient_an_registration_Jaundice1" class="patient_an_registration_Jaundice1"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Jaundice1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Jaundice1" class="<?php echo $patient_an_registration->Jaundice1->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Jaundice1" class="patient_an_registration_Jaundice1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Jaundice1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Jaundice1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Jaundice1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Jaundice2->Visible) { // Jaundice2 ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Jaundice2) == "") { ?>
		<th data-name="Jaundice2" class="<?php echo $patient_an_registration->Jaundice2->headerCellClass() ?>"><div id="elh_patient_an_registration_Jaundice2" class="patient_an_registration_Jaundice2"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Jaundice2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Jaundice2" class="<?php echo $patient_an_registration->Jaundice2->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Jaundice2" class="patient_an_registration_Jaundice2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Jaundice2->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Jaundice2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Jaundice2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Others1->Visible) { // Others1 ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Others1) == "") { ?>
		<th data-name="Others1" class="<?php echo $patient_an_registration->Others1->headerCellClass() ?>"><div id="elh_patient_an_registration_Others1" class="patient_an_registration_Others1"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Others1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Others1" class="<?php echo $patient_an_registration->Others1->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Others1" class="patient_an_registration_Others1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Others1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Others1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Others1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Others2->Visible) { // Others2 ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Others2) == "") { ?>
		<th data-name="Others2" class="<?php echo $patient_an_registration->Others2->headerCellClass() ?>"><div id="elh_patient_an_registration_Others2" class="patient_an_registration_Others2"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Others2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Others2" class="<?php echo $patient_an_registration->Others2->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Others2" class="patient_an_registration_Others2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Others2->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Others2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Others2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->SpillOverReasons->Visible) { // SpillOverReasons ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->SpillOverReasons) == "") { ?>
		<th data-name="SpillOverReasons" class="<?php echo $patient_an_registration->SpillOverReasons->headerCellClass() ?>"><div id="elh_patient_an_registration_SpillOverReasons" class="patient_an_registration_SpillOverReasons"><div class="ew-table-header-caption"><?php echo $patient_an_registration->SpillOverReasons->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SpillOverReasons" class="<?php echo $patient_an_registration->SpillOverReasons->headerCellClass() ?>"><div><div id="elh_patient_an_registration_SpillOverReasons" class="patient_an_registration_SpillOverReasons">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->SpillOverReasons->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->SpillOverReasons->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->SpillOverReasons->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->ANClosed->Visible) { // ANClosed ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->ANClosed) == "") { ?>
		<th data-name="ANClosed" class="<?php echo $patient_an_registration->ANClosed->headerCellClass() ?>"><div id="elh_patient_an_registration_ANClosed" class="patient_an_registration_ANClosed"><div class="ew-table-header-caption"><?php echo $patient_an_registration->ANClosed->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ANClosed" class="<?php echo $patient_an_registration->ANClosed->headerCellClass() ?>"><div><div id="elh_patient_an_registration_ANClosed" class="patient_an_registration_ANClosed">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->ANClosed->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->ANClosed->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->ANClosed->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->ANClosedDATE->Visible) { // ANClosedDATE ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->ANClosedDATE) == "") { ?>
		<th data-name="ANClosedDATE" class="<?php echo $patient_an_registration->ANClosedDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_ANClosedDATE" class="patient_an_registration_ANClosedDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration->ANClosedDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ANClosedDATE" class="<?php echo $patient_an_registration->ANClosedDATE->headerCellClass() ?>"><div><div id="elh_patient_an_registration_ANClosedDATE" class="patient_an_registration_ANClosedDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->ANClosedDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->ANClosedDATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->ANClosedDATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->PastMedicalHistoryOthers->Visible) { // PastMedicalHistoryOthers ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->PastMedicalHistoryOthers) == "") { ?>
		<th data-name="PastMedicalHistoryOthers" class="<?php echo $patient_an_registration->PastMedicalHistoryOthers->headerCellClass() ?>"><div id="elh_patient_an_registration_PastMedicalHistoryOthers" class="patient_an_registration_PastMedicalHistoryOthers"><div class="ew-table-header-caption"><?php echo $patient_an_registration->PastMedicalHistoryOthers->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PastMedicalHistoryOthers" class="<?php echo $patient_an_registration->PastMedicalHistoryOthers->headerCellClass() ?>"><div><div id="elh_patient_an_registration_PastMedicalHistoryOthers" class="patient_an_registration_PastMedicalHistoryOthers">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->PastMedicalHistoryOthers->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->PastMedicalHistoryOthers->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->PastMedicalHistoryOthers->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->PastSurgicalHistoryOthers->Visible) { // PastSurgicalHistoryOthers ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->PastSurgicalHistoryOthers) == "") { ?>
		<th data-name="PastSurgicalHistoryOthers" class="<?php echo $patient_an_registration->PastSurgicalHistoryOthers->headerCellClass() ?>"><div id="elh_patient_an_registration_PastSurgicalHistoryOthers" class="patient_an_registration_PastSurgicalHistoryOthers"><div class="ew-table-header-caption"><?php echo $patient_an_registration->PastSurgicalHistoryOthers->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PastSurgicalHistoryOthers" class="<?php echo $patient_an_registration->PastSurgicalHistoryOthers->headerCellClass() ?>"><div><div id="elh_patient_an_registration_PastSurgicalHistoryOthers" class="patient_an_registration_PastSurgicalHistoryOthers">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->PastSurgicalHistoryOthers->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->PastSurgicalHistoryOthers->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->PastSurgicalHistoryOthers->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->FamilyHistoryOthers->Visible) { // FamilyHistoryOthers ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->FamilyHistoryOthers) == "") { ?>
		<th data-name="FamilyHistoryOthers" class="<?php echo $patient_an_registration->FamilyHistoryOthers->headerCellClass() ?>"><div id="elh_patient_an_registration_FamilyHistoryOthers" class="patient_an_registration_FamilyHistoryOthers"><div class="ew-table-header-caption"><?php echo $patient_an_registration->FamilyHistoryOthers->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FamilyHistoryOthers" class="<?php echo $patient_an_registration->FamilyHistoryOthers->headerCellClass() ?>"><div><div id="elh_patient_an_registration_FamilyHistoryOthers" class="patient_an_registration_FamilyHistoryOthers">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->FamilyHistoryOthers->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->FamilyHistoryOthers->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->FamilyHistoryOthers->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->PresentPregnancyComplicationsOthers->Visible) { // PresentPregnancyComplicationsOthers ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->PresentPregnancyComplicationsOthers) == "") { ?>
		<th data-name="PresentPregnancyComplicationsOthers" class="<?php echo $patient_an_registration->PresentPregnancyComplicationsOthers->headerCellClass() ?>"><div id="elh_patient_an_registration_PresentPregnancyComplicationsOthers" class="patient_an_registration_PresentPregnancyComplicationsOthers"><div class="ew-table-header-caption"><?php echo $patient_an_registration->PresentPregnancyComplicationsOthers->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PresentPregnancyComplicationsOthers" class="<?php echo $patient_an_registration->PresentPregnancyComplicationsOthers->headerCellClass() ?>"><div><div id="elh_patient_an_registration_PresentPregnancyComplicationsOthers" class="patient_an_registration_PresentPregnancyComplicationsOthers">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->PresentPregnancyComplicationsOthers->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->PresentPregnancyComplicationsOthers->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->PresentPregnancyComplicationsOthers->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->ETdate->Visible) { // ETdate ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->ETdate) == "") { ?>
		<th data-name="ETdate" class="<?php echo $patient_an_registration->ETdate->headerCellClass() ?>"><div id="elh_patient_an_registration_ETdate" class="patient_an_registration_ETdate"><div class="ew-table-header-caption"><?php echo $patient_an_registration->ETdate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ETdate" class="<?php echo $patient_an_registration->ETdate->headerCellClass() ?>"><div><div id="elh_patient_an_registration_ETdate" class="patient_an_registration_ETdate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->ETdate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->ETdate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->ETdate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_an_registration_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$patient_an_registration_grid->StartRec = 1;
$patient_an_registration_grid->StopRec = $patient_an_registration_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $patient_an_registration_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($patient_an_registration_grid->FormKeyCountName) && ($patient_an_registration->isGridAdd() || $patient_an_registration->isGridEdit() || $patient_an_registration->isConfirm())) {
		$patient_an_registration_grid->KeyCount = $CurrentForm->getValue($patient_an_registration_grid->FormKeyCountName);
		$patient_an_registration_grid->StopRec = $patient_an_registration_grid->StartRec + $patient_an_registration_grid->KeyCount - 1;
	}
}
$patient_an_registration_grid->RecCnt = $patient_an_registration_grid->StartRec - 1;
if ($patient_an_registration_grid->Recordset && !$patient_an_registration_grid->Recordset->EOF) {
	$patient_an_registration_grid->Recordset->moveFirst();
	$selectLimit = $patient_an_registration_grid->UseSelectLimit;
	if (!$selectLimit && $patient_an_registration_grid->StartRec > 1)
		$patient_an_registration_grid->Recordset->move($patient_an_registration_grid->StartRec - 1);
} elseif (!$patient_an_registration->AllowAddDeleteRow && $patient_an_registration_grid->StopRec == 0) {
	$patient_an_registration_grid->StopRec = $patient_an_registration->GridAddRowCount;
}

// Initialize aggregate
$patient_an_registration->RowType = ROWTYPE_AGGREGATEINIT;
$patient_an_registration->resetAttributes();
$patient_an_registration_grid->renderRow();
if ($patient_an_registration->isGridAdd())
	$patient_an_registration_grid->RowIndex = 0;
if ($patient_an_registration->isGridEdit())
	$patient_an_registration_grid->RowIndex = 0;
while ($patient_an_registration_grid->RecCnt < $patient_an_registration_grid->StopRec) {
	$patient_an_registration_grid->RecCnt++;
	if ($patient_an_registration_grid->RecCnt >= $patient_an_registration_grid->StartRec) {
		$patient_an_registration_grid->RowCnt++;
		if ($patient_an_registration->isGridAdd() || $patient_an_registration->isGridEdit() || $patient_an_registration->isConfirm()) {
			$patient_an_registration_grid->RowIndex++;
			$CurrentForm->Index = $patient_an_registration_grid->RowIndex;
			if ($CurrentForm->hasValue($patient_an_registration_grid->FormActionName) && $patient_an_registration_grid->EventCancelled)
				$patient_an_registration_grid->RowAction = strval($CurrentForm->getValue($patient_an_registration_grid->FormActionName));
			elseif ($patient_an_registration->isGridAdd())
				$patient_an_registration_grid->RowAction = "insert";
			else
				$patient_an_registration_grid->RowAction = "";
		}

		// Set up key count
		$patient_an_registration_grid->KeyCount = $patient_an_registration_grid->RowIndex;

		// Init row class and style
		$patient_an_registration->resetAttributes();
		$patient_an_registration->CssClass = "";
		if ($patient_an_registration->isGridAdd()) {
			if ($patient_an_registration->CurrentMode == "copy") {
				$patient_an_registration_grid->loadRowValues($patient_an_registration_grid->Recordset); // Load row values
				$patient_an_registration_grid->setRecordKey($patient_an_registration_grid->RowOldKey, $patient_an_registration_grid->Recordset); // Set old record key
			} else {
				$patient_an_registration_grid->loadRowValues(); // Load default values
				$patient_an_registration_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$patient_an_registration_grid->loadRowValues($patient_an_registration_grid->Recordset); // Load row values
		}
		$patient_an_registration->RowType = ROWTYPE_VIEW; // Render view
		if ($patient_an_registration->isGridAdd()) // Grid add
			$patient_an_registration->RowType = ROWTYPE_ADD; // Render add
		if ($patient_an_registration->isGridAdd() && $patient_an_registration->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$patient_an_registration_grid->restoreCurrentRowFormValues($patient_an_registration_grid->RowIndex); // Restore form values
		if ($patient_an_registration->isGridEdit()) { // Grid edit
			if ($patient_an_registration->EventCancelled)
				$patient_an_registration_grid->restoreCurrentRowFormValues($patient_an_registration_grid->RowIndex); // Restore form values
			if ($patient_an_registration_grid->RowAction == "insert")
				$patient_an_registration->RowType = ROWTYPE_ADD; // Render add
			else
				$patient_an_registration->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($patient_an_registration->isGridEdit() && ($patient_an_registration->RowType == ROWTYPE_EDIT || $patient_an_registration->RowType == ROWTYPE_ADD) && $patient_an_registration->EventCancelled) // Update failed
			$patient_an_registration_grid->restoreCurrentRowFormValues($patient_an_registration_grid->RowIndex); // Restore form values
		if ($patient_an_registration->RowType == ROWTYPE_EDIT) // Edit row
			$patient_an_registration_grid->EditRowCnt++;
		if ($patient_an_registration->isConfirm()) // Confirm row
			$patient_an_registration_grid->restoreCurrentRowFormValues($patient_an_registration_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$patient_an_registration->RowAttrs = array_merge($patient_an_registration->RowAttrs, array('data-rowindex'=>$patient_an_registration_grid->RowCnt, 'id'=>'r' . $patient_an_registration_grid->RowCnt . '_patient_an_registration', 'data-rowtype'=>$patient_an_registration->RowType));

		// Render row
		$patient_an_registration_grid->renderRow();

		// Render list options
		$patient_an_registration_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($patient_an_registration_grid->RowAction <> "delete" && $patient_an_registration_grid->RowAction <> "insertdelete" && !($patient_an_registration_grid->RowAction == "insert" && $patient_an_registration->isConfirm() && $patient_an_registration_grid->emptyRow())) {
?>
	<tr<?php echo $patient_an_registration->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_an_registration_grid->ListOptions->render("body", "left", $patient_an_registration_grid->RowCnt);
?>
	<?php if ($patient_an_registration->id->Visible) { // id ?>
		<td data-name="id"<?php echo $patient_an_registration->id->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_id" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_id" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_an_registration->id->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_id" class="form-group patient_an_registration_id">
<span<?php echo $patient_an_registration->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_id" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_id" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_an_registration->id->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_id" class="patient_an_registration_id">
<span<?php echo $patient_an_registration->id->viewAttributes() ?>>
<?php echo $patient_an_registration->id->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_id" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_id" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_an_registration->id->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_id" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_id" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_an_registration->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_id" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_id" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_an_registration->id->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_id" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_id" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_an_registration->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->pid->Visible) { // pid ?>
		<td data-name="pid"<?php echo $patient_an_registration->pid->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_an_registration->pid->getSessionValue() <> "") { ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_pid" class="form-group patient_an_registration_pid">
<span<?php echo $patient_an_registration->pid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->pid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_pid" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_pid" value="<?php echo HtmlEncode($patient_an_registration->pid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_pid" class="form-group patient_an_registration_pid">
<input type="text" data-table="patient_an_registration" data-field="x_pid" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_pid" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_pid" size="30" placeholder="<?php echo HtmlEncode($patient_an_registration->pid->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->pid->EditValue ?>"<?php echo $patient_an_registration->pid->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_pid" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_pid" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_pid" value="<?php echo HtmlEncode($patient_an_registration->pid->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($patient_an_registration->pid->getSessionValue() <> "") { ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_pid" class="form-group patient_an_registration_pid">
<span<?php echo $patient_an_registration->pid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->pid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_pid" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_pid" value="<?php echo HtmlEncode($patient_an_registration->pid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_pid" class="form-group patient_an_registration_pid">
<input type="text" data-table="patient_an_registration" data-field="x_pid" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_pid" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_pid" size="30" placeholder="<?php echo HtmlEncode($patient_an_registration->pid->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->pid->EditValue ?>"<?php echo $patient_an_registration->pid->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_pid" class="patient_an_registration_pid">
<span<?php echo $patient_an_registration->pid->viewAttributes() ?>>
<?php echo $patient_an_registration->pid->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_pid" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_pid" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_pid" value="<?php echo HtmlEncode($patient_an_registration->pid->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_pid" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_pid" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_pid" value="<?php echo HtmlEncode($patient_an_registration->pid->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_pid" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_pid" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_pid" value="<?php echo HtmlEncode($patient_an_registration->pid->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_pid" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_pid" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_pid" value="<?php echo HtmlEncode($patient_an_registration->pid->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->fid->Visible) { // fid ?>
		<td data-name="fid"<?php echo $patient_an_registration->fid->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_an_registration->fid->getSessionValue() <> "") { ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_fid" class="form-group patient_an_registration_fid">
<span<?php echo $patient_an_registration->fid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->fid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_fid" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_fid" value="<?php echo HtmlEncode($patient_an_registration->fid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_fid" class="form-group patient_an_registration_fid">
<input type="text" data-table="patient_an_registration" data-field="x_fid" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_fid" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_fid" size="30" placeholder="<?php echo HtmlEncode($patient_an_registration->fid->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->fid->EditValue ?>"<?php echo $patient_an_registration->fid->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_fid" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_fid" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_fid" value="<?php echo HtmlEncode($patient_an_registration->fid->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($patient_an_registration->fid->getSessionValue() <> "") { ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_fid" class="form-group patient_an_registration_fid">
<span<?php echo $patient_an_registration->fid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->fid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_fid" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_fid" value="<?php echo HtmlEncode($patient_an_registration->fid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_fid" class="form-group patient_an_registration_fid">
<input type="text" data-table="patient_an_registration" data-field="x_fid" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_fid" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_fid" size="30" placeholder="<?php echo HtmlEncode($patient_an_registration->fid->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->fid->EditValue ?>"<?php echo $patient_an_registration->fid->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_fid" class="patient_an_registration_fid">
<span<?php echo $patient_an_registration->fid->viewAttributes() ?>>
<?php echo $patient_an_registration->fid->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_fid" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_fid" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_fid" value="<?php echo HtmlEncode($patient_an_registration->fid->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_fid" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_fid" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_fid" value="<?php echo HtmlEncode($patient_an_registration->fid->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_fid" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_fid" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_fid" value="<?php echo HtmlEncode($patient_an_registration->fid->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_fid" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_fid" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_fid" value="<?php echo HtmlEncode($patient_an_registration->fid->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->G->Visible) { // G ?>
		<td data-name="G"<?php echo $patient_an_registration->G->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_G" class="form-group patient_an_registration_G">
<input type="text" data-table="patient_an_registration" data-field="x_G" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_G" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_G" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->G->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->G->EditValue ?>"<?php echo $patient_an_registration->G->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_G" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_G" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_G" value="<?php echo HtmlEncode($patient_an_registration->G->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_G" class="form-group patient_an_registration_G">
<input type="text" data-table="patient_an_registration" data-field="x_G" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_G" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_G" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->G->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->G->EditValue ?>"<?php echo $patient_an_registration->G->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_G" class="patient_an_registration_G">
<span<?php echo $patient_an_registration->G->viewAttributes() ?>>
<?php echo $patient_an_registration->G->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_G" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_G" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_G" value="<?php echo HtmlEncode($patient_an_registration->G->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_G" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_G" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_G" value="<?php echo HtmlEncode($patient_an_registration->G->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_G" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_G" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_G" value="<?php echo HtmlEncode($patient_an_registration->G->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_G" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_G" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_G" value="<?php echo HtmlEncode($patient_an_registration->G->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->P->Visible) { // P ?>
		<td data-name="P"<?php echo $patient_an_registration->P->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_P" class="form-group patient_an_registration_P">
<input type="text" data-table="patient_an_registration" data-field="x_P" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_P" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_P" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->P->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->P->EditValue ?>"<?php echo $patient_an_registration->P->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_P" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_P" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_P" value="<?php echo HtmlEncode($patient_an_registration->P->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_P" class="form-group patient_an_registration_P">
<input type="text" data-table="patient_an_registration" data-field="x_P" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_P" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_P" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->P->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->P->EditValue ?>"<?php echo $patient_an_registration->P->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_P" class="patient_an_registration_P">
<span<?php echo $patient_an_registration->P->viewAttributes() ?>>
<?php echo $patient_an_registration->P->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_P" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_P" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_P" value="<?php echo HtmlEncode($patient_an_registration->P->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_P" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_P" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_P" value="<?php echo HtmlEncode($patient_an_registration->P->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_P" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_P" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_P" value="<?php echo HtmlEncode($patient_an_registration->P->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_P" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_P" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_P" value="<?php echo HtmlEncode($patient_an_registration->P->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->L->Visible) { // L ?>
		<td data-name="L"<?php echo $patient_an_registration->L->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_L" class="form-group patient_an_registration_L">
<input type="text" data-table="patient_an_registration" data-field="x_L" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_L" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_L" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->L->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->L->EditValue ?>"<?php echo $patient_an_registration->L->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_L" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_L" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_L" value="<?php echo HtmlEncode($patient_an_registration->L->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_L" class="form-group patient_an_registration_L">
<input type="text" data-table="patient_an_registration" data-field="x_L" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_L" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_L" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->L->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->L->EditValue ?>"<?php echo $patient_an_registration->L->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_L" class="patient_an_registration_L">
<span<?php echo $patient_an_registration->L->viewAttributes() ?>>
<?php echo $patient_an_registration->L->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_L" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_L" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_L" value="<?php echo HtmlEncode($patient_an_registration->L->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_L" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_L" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_L" value="<?php echo HtmlEncode($patient_an_registration->L->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_L" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_L" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_L" value="<?php echo HtmlEncode($patient_an_registration->L->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_L" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_L" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_L" value="<?php echo HtmlEncode($patient_an_registration->L->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->A->Visible) { // A ?>
		<td data-name="A"<?php echo $patient_an_registration->A->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_A" class="form-group patient_an_registration_A">
<input type="text" data-table="patient_an_registration" data-field="x_A" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A->EditValue ?>"<?php echo $patient_an_registration->A->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A" value="<?php echo HtmlEncode($patient_an_registration->A->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_A" class="form-group patient_an_registration_A">
<input type="text" data-table="patient_an_registration" data-field="x_A" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A->EditValue ?>"<?php echo $patient_an_registration->A->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_A" class="patient_an_registration_A">
<span<?php echo $patient_an_registration->A->viewAttributes() ?>>
<?php echo $patient_an_registration->A->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A" value="<?php echo HtmlEncode($patient_an_registration->A->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A" value="<?php echo HtmlEncode($patient_an_registration->A->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A" value="<?php echo HtmlEncode($patient_an_registration->A->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A" value="<?php echo HtmlEncode($patient_an_registration->A->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->E->Visible) { // E ?>
		<td data-name="E"<?php echo $patient_an_registration->E->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_E" class="form-group patient_an_registration_E">
<input type="text" data-table="patient_an_registration" data-field="x_E" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_E" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_E" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->E->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->E->EditValue ?>"<?php echo $patient_an_registration->E->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_E" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_E" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_E" value="<?php echo HtmlEncode($patient_an_registration->E->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_E" class="form-group patient_an_registration_E">
<input type="text" data-table="patient_an_registration" data-field="x_E" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_E" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_E" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->E->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->E->EditValue ?>"<?php echo $patient_an_registration->E->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_E" class="patient_an_registration_E">
<span<?php echo $patient_an_registration->E->viewAttributes() ?>>
<?php echo $patient_an_registration->E->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_E" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_E" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_E" value="<?php echo HtmlEncode($patient_an_registration->E->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_E" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_E" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_E" value="<?php echo HtmlEncode($patient_an_registration->E->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_E" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_E" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_E" value="<?php echo HtmlEncode($patient_an_registration->E->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_E" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_E" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_E" value="<?php echo HtmlEncode($patient_an_registration->E->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->M->Visible) { // M ?>
		<td data-name="M"<?php echo $patient_an_registration->M->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_M" class="form-group patient_an_registration_M">
<input type="text" data-table="patient_an_registration" data-field="x_M" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_M" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_M" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->M->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->M->EditValue ?>"<?php echo $patient_an_registration->M->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_M" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_M" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_M" value="<?php echo HtmlEncode($patient_an_registration->M->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_M" class="form-group patient_an_registration_M">
<input type="text" data-table="patient_an_registration" data-field="x_M" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_M" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_M" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->M->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->M->EditValue ?>"<?php echo $patient_an_registration->M->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_M" class="patient_an_registration_M">
<span<?php echo $patient_an_registration->M->viewAttributes() ?>>
<?php echo $patient_an_registration->M->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_M" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_M" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_M" value="<?php echo HtmlEncode($patient_an_registration->M->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_M" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_M" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_M" value="<?php echo HtmlEncode($patient_an_registration->M->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_M" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_M" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_M" value="<?php echo HtmlEncode($patient_an_registration->M->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_M" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_M" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_M" value="<?php echo HtmlEncode($patient_an_registration->M->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->LMP->Visible) { // LMP ?>
		<td data-name="LMP"<?php echo $patient_an_registration->LMP->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_LMP" class="form-group patient_an_registration_LMP">
<input type="text" data-table="patient_an_registration" data-field="x_LMP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_LMP" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_LMP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->LMP->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->LMP->EditValue ?>"<?php echo $patient_an_registration->LMP->editAttributes() ?>>
<?php if (!$patient_an_registration->LMP->ReadOnly && !$patient_an_registration->LMP->Disabled && !isset($patient_an_registration->LMP->EditAttrs["readonly"]) && !isset($patient_an_registration->LMP->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_LMP", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_LMP" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_LMP" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_LMP" value="<?php echo HtmlEncode($patient_an_registration->LMP->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_LMP" class="form-group patient_an_registration_LMP">
<input type="text" data-table="patient_an_registration" data-field="x_LMP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_LMP" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_LMP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->LMP->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->LMP->EditValue ?>"<?php echo $patient_an_registration->LMP->editAttributes() ?>>
<?php if (!$patient_an_registration->LMP->ReadOnly && !$patient_an_registration->LMP->Disabled && !isset($patient_an_registration->LMP->EditAttrs["readonly"]) && !isset($patient_an_registration->LMP->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_LMP", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_LMP" class="patient_an_registration_LMP">
<span<?php echo $patient_an_registration->LMP->viewAttributes() ?>>
<?php echo $patient_an_registration->LMP->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_LMP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_LMP" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_LMP" value="<?php echo HtmlEncode($patient_an_registration->LMP->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_LMP" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_LMP" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_LMP" value="<?php echo HtmlEncode($patient_an_registration->LMP->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_LMP" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_LMP" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_LMP" value="<?php echo HtmlEncode($patient_an_registration->LMP->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_LMP" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_LMP" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_LMP" value="<?php echo HtmlEncode($patient_an_registration->LMP->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->EDO->Visible) { // EDO ?>
		<td data-name="EDO"<?php echo $patient_an_registration->EDO->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_EDO" class="form-group patient_an_registration_EDO">
<input type="text" data-table="patient_an_registration" data-field="x_EDO" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EDO" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EDO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->EDO->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->EDO->EditValue ?>"<?php echo $patient_an_registration->EDO->editAttributes() ?>>
<?php if (!$patient_an_registration->EDO->ReadOnly && !$patient_an_registration->EDO->Disabled && !isset($patient_an_registration->EDO->EditAttrs["readonly"]) && !isset($patient_an_registration->EDO->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_EDO", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_EDO" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_EDO" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_EDO" value="<?php echo HtmlEncode($patient_an_registration->EDO->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_EDO" class="form-group patient_an_registration_EDO">
<input type="text" data-table="patient_an_registration" data-field="x_EDO" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EDO" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EDO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->EDO->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->EDO->EditValue ?>"<?php echo $patient_an_registration->EDO->editAttributes() ?>>
<?php if (!$patient_an_registration->EDO->ReadOnly && !$patient_an_registration->EDO->Disabled && !isset($patient_an_registration->EDO->EditAttrs["readonly"]) && !isset($patient_an_registration->EDO->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_EDO", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_EDO" class="patient_an_registration_EDO">
<span<?php echo $patient_an_registration->EDO->viewAttributes() ?>>
<?php echo $patient_an_registration->EDO->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_EDO" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EDO" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EDO" value="<?php echo HtmlEncode($patient_an_registration->EDO->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_EDO" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_EDO" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_EDO" value="<?php echo HtmlEncode($patient_an_registration->EDO->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_EDO" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_EDO" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_EDO" value="<?php echo HtmlEncode($patient_an_registration->EDO->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_EDO" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_EDO" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_EDO" value="<?php echo HtmlEncode($patient_an_registration->EDO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->MenstrualHistory->Visible) { // MenstrualHistory ?>
		<td data-name="MenstrualHistory"<?php echo $patient_an_registration->MenstrualHistory->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_MenstrualHistory" class="form-group patient_an_registration_MenstrualHistory">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_MenstrualHistory" data-value-separator="<?php echo $patient_an_registration->MenstrualHistory->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_MenstrualHistory" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_MenstrualHistory"<?php echo $patient_an_registration->MenstrualHistory->editAttributes() ?>>
		<?php echo $patient_an_registration->MenstrualHistory->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_MenstrualHistory") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_MenstrualHistory" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_MenstrualHistory" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_MenstrualHistory" value="<?php echo HtmlEncode($patient_an_registration->MenstrualHistory->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_MenstrualHistory" class="form-group patient_an_registration_MenstrualHistory">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_MenstrualHistory" data-value-separator="<?php echo $patient_an_registration->MenstrualHistory->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_MenstrualHistory" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_MenstrualHistory"<?php echo $patient_an_registration->MenstrualHistory->editAttributes() ?>>
		<?php echo $patient_an_registration->MenstrualHistory->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_MenstrualHistory") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_MenstrualHistory" class="patient_an_registration_MenstrualHistory">
<span<?php echo $patient_an_registration->MenstrualHistory->viewAttributes() ?>>
<?php echo $patient_an_registration->MenstrualHistory->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_MenstrualHistory" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_MenstrualHistory" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_MenstrualHistory" value="<?php echo HtmlEncode($patient_an_registration->MenstrualHistory->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_MenstrualHistory" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_MenstrualHistory" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_MenstrualHistory" value="<?php echo HtmlEncode($patient_an_registration->MenstrualHistory->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_MenstrualHistory" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_MenstrualHistory" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_MenstrualHistory" value="<?php echo HtmlEncode($patient_an_registration->MenstrualHistory->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_MenstrualHistory" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_MenstrualHistory" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_MenstrualHistory" value="<?php echo HtmlEncode($patient_an_registration->MenstrualHistory->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->MaritalHistory->Visible) { // MaritalHistory ?>
		<td data-name="MaritalHistory"<?php echo $patient_an_registration->MaritalHistory->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_MaritalHistory" class="form-group patient_an_registration_MaritalHistory">
<input type="text" data-table="patient_an_registration" data-field="x_MaritalHistory" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_MaritalHistory" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_MaritalHistory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->MaritalHistory->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->MaritalHistory->EditValue ?>"<?php echo $patient_an_registration->MaritalHistory->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_MaritalHistory" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_MaritalHistory" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_MaritalHistory" value="<?php echo HtmlEncode($patient_an_registration->MaritalHistory->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_MaritalHistory" class="form-group patient_an_registration_MaritalHistory">
<input type="text" data-table="patient_an_registration" data-field="x_MaritalHistory" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_MaritalHistory" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_MaritalHistory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->MaritalHistory->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->MaritalHistory->EditValue ?>"<?php echo $patient_an_registration->MaritalHistory->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_MaritalHistory" class="patient_an_registration_MaritalHistory">
<span<?php echo $patient_an_registration->MaritalHistory->viewAttributes() ?>>
<?php echo $patient_an_registration->MaritalHistory->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_MaritalHistory" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_MaritalHistory" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_MaritalHistory" value="<?php echo HtmlEncode($patient_an_registration->MaritalHistory->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_MaritalHistory" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_MaritalHistory" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_MaritalHistory" value="<?php echo HtmlEncode($patient_an_registration->MaritalHistory->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_MaritalHistory" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_MaritalHistory" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_MaritalHistory" value="<?php echo HtmlEncode($patient_an_registration->MaritalHistory->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_MaritalHistory" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_MaritalHistory" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_MaritalHistory" value="<?php echo HtmlEncode($patient_an_registration->MaritalHistory->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->ObstetricHistory->Visible) { // ObstetricHistory ?>
		<td data-name="ObstetricHistory"<?php echo $patient_an_registration->ObstetricHistory->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_ObstetricHistory" class="form-group patient_an_registration_ObstetricHistory">
<input type="text" data-table="patient_an_registration" data-field="x_ObstetricHistory" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ObstetricHistory" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ObstetricHistory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->ObstetricHistory->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->ObstetricHistory->EditValue ?>"<?php echo $patient_an_registration->ObstetricHistory->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ObstetricHistory" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ObstetricHistory" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ObstetricHistory" value="<?php echo HtmlEncode($patient_an_registration->ObstetricHistory->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_ObstetricHistory" class="form-group patient_an_registration_ObstetricHistory">
<input type="text" data-table="patient_an_registration" data-field="x_ObstetricHistory" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ObstetricHistory" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ObstetricHistory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->ObstetricHistory->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->ObstetricHistory->EditValue ?>"<?php echo $patient_an_registration->ObstetricHistory->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_ObstetricHistory" class="patient_an_registration_ObstetricHistory">
<span<?php echo $patient_an_registration->ObstetricHistory->viewAttributes() ?>>
<?php echo $patient_an_registration->ObstetricHistory->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ObstetricHistory" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ObstetricHistory" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ObstetricHistory" value="<?php echo HtmlEncode($patient_an_registration->ObstetricHistory->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ObstetricHistory" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ObstetricHistory" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ObstetricHistory" value="<?php echo HtmlEncode($patient_an_registration->ObstetricHistory->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ObstetricHistory" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ObstetricHistory" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ObstetricHistory" value="<?php echo HtmlEncode($patient_an_registration->ObstetricHistory->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ObstetricHistory" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ObstetricHistory" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ObstetricHistory" value="<?php echo HtmlEncode($patient_an_registration->ObstetricHistory->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->PreviousHistoryofGDM->Visible) { // PreviousHistoryofGDM ?>
		<td data-name="PreviousHistoryofGDM"<?php echo $patient_an_registration->PreviousHistoryofGDM->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_PreviousHistoryofGDM" class="form-group patient_an_registration_PreviousHistoryofGDM">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_PreviousHistoryofGDM" data-value-separator="<?php echo $patient_an_registration->PreviousHistoryofGDM->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofGDM" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofGDM"<?php echo $patient_an_registration->PreviousHistoryofGDM->editAttributes() ?>>
		<?php echo $patient_an_registration->PreviousHistoryofGDM->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofGDM") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofGDM" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofGDM" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofGDM" value="<?php echo HtmlEncode($patient_an_registration->PreviousHistoryofGDM->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_PreviousHistoryofGDM" class="form-group patient_an_registration_PreviousHistoryofGDM">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_PreviousHistoryofGDM" data-value-separator="<?php echo $patient_an_registration->PreviousHistoryofGDM->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofGDM" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofGDM"<?php echo $patient_an_registration->PreviousHistoryofGDM->editAttributes() ?>>
		<?php echo $patient_an_registration->PreviousHistoryofGDM->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofGDM") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_PreviousHistoryofGDM" class="patient_an_registration_PreviousHistoryofGDM">
<span<?php echo $patient_an_registration->PreviousHistoryofGDM->viewAttributes() ?>>
<?php echo $patient_an_registration->PreviousHistoryofGDM->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofGDM" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofGDM" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofGDM" value="<?php echo HtmlEncode($patient_an_registration->PreviousHistoryofGDM->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofGDM" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofGDM" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofGDM" value="<?php echo HtmlEncode($patient_an_registration->PreviousHistoryofGDM->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofGDM" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofGDM" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofGDM" value="<?php echo HtmlEncode($patient_an_registration->PreviousHistoryofGDM->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofGDM" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofGDM" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofGDM" value="<?php echo HtmlEncode($patient_an_registration->PreviousHistoryofGDM->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->PreviousHistorofPIH->Visible) { // PreviousHistorofPIH ?>
		<td data-name="PreviousHistorofPIH"<?php echo $patient_an_registration->PreviousHistorofPIH->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_PreviousHistorofPIH" class="form-group patient_an_registration_PreviousHistorofPIH">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_PreviousHistorofPIH" data-value-separator="<?php echo $patient_an_registration->PreviousHistorofPIH->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistorofPIH" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistorofPIH"<?php echo $patient_an_registration->PreviousHistorofPIH->editAttributes() ?>>
		<?php echo $patient_an_registration->PreviousHistorofPIH->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistorofPIH") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistorofPIH" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistorofPIH" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistorofPIH" value="<?php echo HtmlEncode($patient_an_registration->PreviousHistorofPIH->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_PreviousHistorofPIH" class="form-group patient_an_registration_PreviousHistorofPIH">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_PreviousHistorofPIH" data-value-separator="<?php echo $patient_an_registration->PreviousHistorofPIH->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistorofPIH" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistorofPIH"<?php echo $patient_an_registration->PreviousHistorofPIH->editAttributes() ?>>
		<?php echo $patient_an_registration->PreviousHistorofPIH->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistorofPIH") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_PreviousHistorofPIH" class="patient_an_registration_PreviousHistorofPIH">
<span<?php echo $patient_an_registration->PreviousHistorofPIH->viewAttributes() ?>>
<?php echo $patient_an_registration->PreviousHistorofPIH->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistorofPIH" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistorofPIH" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistorofPIH" value="<?php echo HtmlEncode($patient_an_registration->PreviousHistorofPIH->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistorofPIH" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistorofPIH" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistorofPIH" value="<?php echo HtmlEncode($patient_an_registration->PreviousHistorofPIH->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistorofPIH" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistorofPIH" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistorofPIH" value="<?php echo HtmlEncode($patient_an_registration->PreviousHistorofPIH->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistorofPIH" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistorofPIH" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistorofPIH" value="<?php echo HtmlEncode($patient_an_registration->PreviousHistorofPIH->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->PreviousHistoryofIUGR->Visible) { // PreviousHistoryofIUGR ?>
		<td data-name="PreviousHistoryofIUGR"<?php echo $patient_an_registration->PreviousHistoryofIUGR->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_PreviousHistoryofIUGR" class="form-group patient_an_registration_PreviousHistoryofIUGR">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_PreviousHistoryofIUGR" data-value-separator="<?php echo $patient_an_registration->PreviousHistoryofIUGR->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofIUGR" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofIUGR"<?php echo $patient_an_registration->PreviousHistoryofIUGR->editAttributes() ?>>
		<?php echo $patient_an_registration->PreviousHistoryofIUGR->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofIUGR") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofIUGR" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofIUGR" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofIUGR" value="<?php echo HtmlEncode($patient_an_registration->PreviousHistoryofIUGR->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_PreviousHistoryofIUGR" class="form-group patient_an_registration_PreviousHistoryofIUGR">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_PreviousHistoryofIUGR" data-value-separator="<?php echo $patient_an_registration->PreviousHistoryofIUGR->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofIUGR" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofIUGR"<?php echo $patient_an_registration->PreviousHistoryofIUGR->editAttributes() ?>>
		<?php echo $patient_an_registration->PreviousHistoryofIUGR->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofIUGR") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_PreviousHistoryofIUGR" class="patient_an_registration_PreviousHistoryofIUGR">
<span<?php echo $patient_an_registration->PreviousHistoryofIUGR->viewAttributes() ?>>
<?php echo $patient_an_registration->PreviousHistoryofIUGR->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofIUGR" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofIUGR" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofIUGR" value="<?php echo HtmlEncode($patient_an_registration->PreviousHistoryofIUGR->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofIUGR" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofIUGR" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofIUGR" value="<?php echo HtmlEncode($patient_an_registration->PreviousHistoryofIUGR->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofIUGR" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofIUGR" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofIUGR" value="<?php echo HtmlEncode($patient_an_registration->PreviousHistoryofIUGR->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofIUGR" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofIUGR" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofIUGR" value="<?php echo HtmlEncode($patient_an_registration->PreviousHistoryofIUGR->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->PreviousHistoryofOligohydramnios->Visible) { // PreviousHistoryofOligohydramnios ?>
		<td data-name="PreviousHistoryofOligohydramnios"<?php echo $patient_an_registration->PreviousHistoryofOligohydramnios->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_PreviousHistoryofOligohydramnios" class="form-group patient_an_registration_PreviousHistoryofOligohydramnios">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_PreviousHistoryofOligohydramnios" data-value-separator="<?php echo $patient_an_registration->PreviousHistoryofOligohydramnios->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofOligohydramnios" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofOligohydramnios"<?php echo $patient_an_registration->PreviousHistoryofOligohydramnios->editAttributes() ?>>
		<?php echo $patient_an_registration->PreviousHistoryofOligohydramnios->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofOligohydramnios") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofOligohydramnios" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofOligohydramnios" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofOligohydramnios" value="<?php echo HtmlEncode($patient_an_registration->PreviousHistoryofOligohydramnios->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_PreviousHistoryofOligohydramnios" class="form-group patient_an_registration_PreviousHistoryofOligohydramnios">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_PreviousHistoryofOligohydramnios" data-value-separator="<?php echo $patient_an_registration->PreviousHistoryofOligohydramnios->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofOligohydramnios" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofOligohydramnios"<?php echo $patient_an_registration->PreviousHistoryofOligohydramnios->editAttributes() ?>>
		<?php echo $patient_an_registration->PreviousHistoryofOligohydramnios->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofOligohydramnios") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_PreviousHistoryofOligohydramnios" class="patient_an_registration_PreviousHistoryofOligohydramnios">
<span<?php echo $patient_an_registration->PreviousHistoryofOligohydramnios->viewAttributes() ?>>
<?php echo $patient_an_registration->PreviousHistoryofOligohydramnios->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofOligohydramnios" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofOligohydramnios" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofOligohydramnios" value="<?php echo HtmlEncode($patient_an_registration->PreviousHistoryofOligohydramnios->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofOligohydramnios" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofOligohydramnios" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofOligohydramnios" value="<?php echo HtmlEncode($patient_an_registration->PreviousHistoryofOligohydramnios->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofOligohydramnios" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofOligohydramnios" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofOligohydramnios" value="<?php echo HtmlEncode($patient_an_registration->PreviousHistoryofOligohydramnios->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofOligohydramnios" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofOligohydramnios" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofOligohydramnios" value="<?php echo HtmlEncode($patient_an_registration->PreviousHistoryofOligohydramnios->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->PreviousHistoryofPreterm->Visible) { // PreviousHistoryofPreterm ?>
		<td data-name="PreviousHistoryofPreterm"<?php echo $patient_an_registration->PreviousHistoryofPreterm->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_PreviousHistoryofPreterm" class="form-group patient_an_registration_PreviousHistoryofPreterm">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_PreviousHistoryofPreterm" data-value-separator="<?php echo $patient_an_registration->PreviousHistoryofPreterm->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofPreterm" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofPreterm"<?php echo $patient_an_registration->PreviousHistoryofPreterm->editAttributes() ?>>
		<?php echo $patient_an_registration->PreviousHistoryofPreterm->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofPreterm") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofPreterm" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofPreterm" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofPreterm" value="<?php echo HtmlEncode($patient_an_registration->PreviousHistoryofPreterm->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_PreviousHistoryofPreterm" class="form-group patient_an_registration_PreviousHistoryofPreterm">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_PreviousHistoryofPreterm" data-value-separator="<?php echo $patient_an_registration->PreviousHistoryofPreterm->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofPreterm" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofPreterm"<?php echo $patient_an_registration->PreviousHistoryofPreterm->editAttributes() ?>>
		<?php echo $patient_an_registration->PreviousHistoryofPreterm->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofPreterm") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_PreviousHistoryofPreterm" class="patient_an_registration_PreviousHistoryofPreterm">
<span<?php echo $patient_an_registration->PreviousHistoryofPreterm->viewAttributes() ?>>
<?php echo $patient_an_registration->PreviousHistoryofPreterm->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofPreterm" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofPreterm" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofPreterm" value="<?php echo HtmlEncode($patient_an_registration->PreviousHistoryofPreterm->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofPreterm" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofPreterm" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofPreterm" value="<?php echo HtmlEncode($patient_an_registration->PreviousHistoryofPreterm->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofPreterm" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofPreterm" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofPreterm" value="<?php echo HtmlEncode($patient_an_registration->PreviousHistoryofPreterm->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofPreterm" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofPreterm" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofPreterm" value="<?php echo HtmlEncode($patient_an_registration->PreviousHistoryofPreterm->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->G1->Visible) { // G1 ?>
		<td data-name="G1"<?php echo $patient_an_registration->G1->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_G1" class="form-group patient_an_registration_G1">
<input type="text" data-table="patient_an_registration" data-field="x_G1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_G1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_G1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->G1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->G1->EditValue ?>"<?php echo $patient_an_registration->G1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_G1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_G1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_G1" value="<?php echo HtmlEncode($patient_an_registration->G1->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_G1" class="form-group patient_an_registration_G1">
<input type="text" data-table="patient_an_registration" data-field="x_G1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_G1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_G1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->G1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->G1->EditValue ?>"<?php echo $patient_an_registration->G1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_G1" class="patient_an_registration_G1">
<span<?php echo $patient_an_registration->G1->viewAttributes() ?>>
<?php echo $patient_an_registration->G1->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_G1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_G1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_G1" value="<?php echo HtmlEncode($patient_an_registration->G1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_G1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_G1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_G1" value="<?php echo HtmlEncode($patient_an_registration->G1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_G1" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_G1" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_G1" value="<?php echo HtmlEncode($patient_an_registration->G1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_G1" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_G1" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_G1" value="<?php echo HtmlEncode($patient_an_registration->G1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->G2->Visible) { // G2 ?>
		<td data-name="G2"<?php echo $patient_an_registration->G2->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_G2" class="form-group patient_an_registration_G2">
<input type="text" data-table="patient_an_registration" data-field="x_G2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_G2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_G2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->G2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->G2->EditValue ?>"<?php echo $patient_an_registration->G2->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_G2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_G2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_G2" value="<?php echo HtmlEncode($patient_an_registration->G2->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_G2" class="form-group patient_an_registration_G2">
<input type="text" data-table="patient_an_registration" data-field="x_G2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_G2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_G2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->G2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->G2->EditValue ?>"<?php echo $patient_an_registration->G2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_G2" class="patient_an_registration_G2">
<span<?php echo $patient_an_registration->G2->viewAttributes() ?>>
<?php echo $patient_an_registration->G2->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_G2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_G2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_G2" value="<?php echo HtmlEncode($patient_an_registration->G2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_G2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_G2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_G2" value="<?php echo HtmlEncode($patient_an_registration->G2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_G2" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_G2" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_G2" value="<?php echo HtmlEncode($patient_an_registration->G2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_G2" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_G2" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_G2" value="<?php echo HtmlEncode($patient_an_registration->G2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->G3->Visible) { // G3 ?>
		<td data-name="G3"<?php echo $patient_an_registration->G3->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_G3" class="form-group patient_an_registration_G3">
<input type="text" data-table="patient_an_registration" data-field="x_G3" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_G3" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_G3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->G3->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->G3->EditValue ?>"<?php echo $patient_an_registration->G3->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_G3" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_G3" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_G3" value="<?php echo HtmlEncode($patient_an_registration->G3->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_G3" class="form-group patient_an_registration_G3">
<input type="text" data-table="patient_an_registration" data-field="x_G3" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_G3" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_G3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->G3->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->G3->EditValue ?>"<?php echo $patient_an_registration->G3->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_G3" class="patient_an_registration_G3">
<span<?php echo $patient_an_registration->G3->viewAttributes() ?>>
<?php echo $patient_an_registration->G3->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_G3" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_G3" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_G3" value="<?php echo HtmlEncode($patient_an_registration->G3->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_G3" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_G3" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_G3" value="<?php echo HtmlEncode($patient_an_registration->G3->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_G3" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_G3" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_G3" value="<?php echo HtmlEncode($patient_an_registration->G3->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_G3" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_G3" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_G3" value="<?php echo HtmlEncode($patient_an_registration->G3->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->DeliveryNDLSCS1->Visible) { // DeliveryNDLSCS1 ?>
		<td data-name="DeliveryNDLSCS1"<?php echo $patient_an_registration->DeliveryNDLSCS1->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_DeliveryNDLSCS1" class="form-group patient_an_registration_DeliveryNDLSCS1">
<input type="text" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->DeliveryNDLSCS1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->DeliveryNDLSCS1->EditValue ?>"<?php echo $patient_an_registration->DeliveryNDLSCS1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS1" value="<?php echo HtmlEncode($patient_an_registration->DeliveryNDLSCS1->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_DeliveryNDLSCS1" class="form-group patient_an_registration_DeliveryNDLSCS1">
<input type="text" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->DeliveryNDLSCS1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->DeliveryNDLSCS1->EditValue ?>"<?php echo $patient_an_registration->DeliveryNDLSCS1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_DeliveryNDLSCS1" class="patient_an_registration_DeliveryNDLSCS1">
<span<?php echo $patient_an_registration->DeliveryNDLSCS1->viewAttributes() ?>>
<?php echo $patient_an_registration->DeliveryNDLSCS1->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS1" value="<?php echo HtmlEncode($patient_an_registration->DeliveryNDLSCS1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS1" value="<?php echo HtmlEncode($patient_an_registration->DeliveryNDLSCS1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS1" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS1" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS1" value="<?php echo HtmlEncode($patient_an_registration->DeliveryNDLSCS1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS1" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS1" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS1" value="<?php echo HtmlEncode($patient_an_registration->DeliveryNDLSCS1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->DeliveryNDLSCS2->Visible) { // DeliveryNDLSCS2 ?>
		<td data-name="DeliveryNDLSCS2"<?php echo $patient_an_registration->DeliveryNDLSCS2->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_DeliveryNDLSCS2" class="form-group patient_an_registration_DeliveryNDLSCS2">
<input type="text" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->DeliveryNDLSCS2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->DeliveryNDLSCS2->EditValue ?>"<?php echo $patient_an_registration->DeliveryNDLSCS2->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS2" value="<?php echo HtmlEncode($patient_an_registration->DeliveryNDLSCS2->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_DeliveryNDLSCS2" class="form-group patient_an_registration_DeliveryNDLSCS2">
<input type="text" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->DeliveryNDLSCS2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->DeliveryNDLSCS2->EditValue ?>"<?php echo $patient_an_registration->DeliveryNDLSCS2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_DeliveryNDLSCS2" class="patient_an_registration_DeliveryNDLSCS2">
<span<?php echo $patient_an_registration->DeliveryNDLSCS2->viewAttributes() ?>>
<?php echo $patient_an_registration->DeliveryNDLSCS2->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS2" value="<?php echo HtmlEncode($patient_an_registration->DeliveryNDLSCS2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS2" value="<?php echo HtmlEncode($patient_an_registration->DeliveryNDLSCS2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS2" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS2" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS2" value="<?php echo HtmlEncode($patient_an_registration->DeliveryNDLSCS2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS2" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS2" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS2" value="<?php echo HtmlEncode($patient_an_registration->DeliveryNDLSCS2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->DeliveryNDLSCS3->Visible) { // DeliveryNDLSCS3 ?>
		<td data-name="DeliveryNDLSCS3"<?php echo $patient_an_registration->DeliveryNDLSCS3->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_DeliveryNDLSCS3" class="form-group patient_an_registration_DeliveryNDLSCS3">
<input type="text" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS3" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS3" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->DeliveryNDLSCS3->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->DeliveryNDLSCS3->EditValue ?>"<?php echo $patient_an_registration->DeliveryNDLSCS3->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS3" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS3" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS3" value="<?php echo HtmlEncode($patient_an_registration->DeliveryNDLSCS3->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_DeliveryNDLSCS3" class="form-group patient_an_registration_DeliveryNDLSCS3">
<input type="text" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS3" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS3" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->DeliveryNDLSCS3->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->DeliveryNDLSCS3->EditValue ?>"<?php echo $patient_an_registration->DeliveryNDLSCS3->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_DeliveryNDLSCS3" class="patient_an_registration_DeliveryNDLSCS3">
<span<?php echo $patient_an_registration->DeliveryNDLSCS3->viewAttributes() ?>>
<?php echo $patient_an_registration->DeliveryNDLSCS3->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS3" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS3" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS3" value="<?php echo HtmlEncode($patient_an_registration->DeliveryNDLSCS3->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS3" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS3" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS3" value="<?php echo HtmlEncode($patient_an_registration->DeliveryNDLSCS3->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS3" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS3" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS3" value="<?php echo HtmlEncode($patient_an_registration->DeliveryNDLSCS3->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS3" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS3" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS3" value="<?php echo HtmlEncode($patient_an_registration->DeliveryNDLSCS3->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->BabySexweight1->Visible) { // BabySexweight1 ?>
		<td data-name="BabySexweight1"<?php echo $patient_an_registration->BabySexweight1->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_BabySexweight1" class="form-group patient_an_registration_BabySexweight1">
<input type="text" data-table="patient_an_registration" data-field="x_BabySexweight1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->BabySexweight1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->BabySexweight1->EditValue ?>"<?php echo $patient_an_registration->BabySexweight1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight1" value="<?php echo HtmlEncode($patient_an_registration->BabySexweight1->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_BabySexweight1" class="form-group patient_an_registration_BabySexweight1">
<input type="text" data-table="patient_an_registration" data-field="x_BabySexweight1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->BabySexweight1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->BabySexweight1->EditValue ?>"<?php echo $patient_an_registration->BabySexweight1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_BabySexweight1" class="patient_an_registration_BabySexweight1">
<span<?php echo $patient_an_registration->BabySexweight1->viewAttributes() ?>>
<?php echo $patient_an_registration->BabySexweight1->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight1" value="<?php echo HtmlEncode($patient_an_registration->BabySexweight1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight1" value="<?php echo HtmlEncode($patient_an_registration->BabySexweight1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight1" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight1" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight1" value="<?php echo HtmlEncode($patient_an_registration->BabySexweight1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight1" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight1" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight1" value="<?php echo HtmlEncode($patient_an_registration->BabySexweight1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->BabySexweight2->Visible) { // BabySexweight2 ?>
		<td data-name="BabySexweight2"<?php echo $patient_an_registration->BabySexweight2->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_BabySexweight2" class="form-group patient_an_registration_BabySexweight2">
<input type="text" data-table="patient_an_registration" data-field="x_BabySexweight2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->BabySexweight2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->BabySexweight2->EditValue ?>"<?php echo $patient_an_registration->BabySexweight2->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight2" value="<?php echo HtmlEncode($patient_an_registration->BabySexweight2->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_BabySexweight2" class="form-group patient_an_registration_BabySexweight2">
<input type="text" data-table="patient_an_registration" data-field="x_BabySexweight2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->BabySexweight2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->BabySexweight2->EditValue ?>"<?php echo $patient_an_registration->BabySexweight2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_BabySexweight2" class="patient_an_registration_BabySexweight2">
<span<?php echo $patient_an_registration->BabySexweight2->viewAttributes() ?>>
<?php echo $patient_an_registration->BabySexweight2->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight2" value="<?php echo HtmlEncode($patient_an_registration->BabySexweight2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight2" value="<?php echo HtmlEncode($patient_an_registration->BabySexweight2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight2" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight2" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight2" value="<?php echo HtmlEncode($patient_an_registration->BabySexweight2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight2" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight2" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight2" value="<?php echo HtmlEncode($patient_an_registration->BabySexweight2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->BabySexweight3->Visible) { // BabySexweight3 ?>
		<td data-name="BabySexweight3"<?php echo $patient_an_registration->BabySexweight3->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_BabySexweight3" class="form-group patient_an_registration_BabySexweight3">
<input type="text" data-table="patient_an_registration" data-field="x_BabySexweight3" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight3" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->BabySexweight3->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->BabySexweight3->EditValue ?>"<?php echo $patient_an_registration->BabySexweight3->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight3" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight3" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight3" value="<?php echo HtmlEncode($patient_an_registration->BabySexweight3->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_BabySexweight3" class="form-group patient_an_registration_BabySexweight3">
<input type="text" data-table="patient_an_registration" data-field="x_BabySexweight3" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight3" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->BabySexweight3->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->BabySexweight3->EditValue ?>"<?php echo $patient_an_registration->BabySexweight3->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_BabySexweight3" class="patient_an_registration_BabySexweight3">
<span<?php echo $patient_an_registration->BabySexweight3->viewAttributes() ?>>
<?php echo $patient_an_registration->BabySexweight3->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight3" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight3" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight3" value="<?php echo HtmlEncode($patient_an_registration->BabySexweight3->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight3" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight3" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight3" value="<?php echo HtmlEncode($patient_an_registration->BabySexweight3->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight3" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight3" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight3" value="<?php echo HtmlEncode($patient_an_registration->BabySexweight3->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight3" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight3" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight3" value="<?php echo HtmlEncode($patient_an_registration->BabySexweight3->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->PastMedicalHistory->Visible) { // PastMedicalHistory ?>
		<td data-name="PastMedicalHistory"<?php echo $patient_an_registration->PastMedicalHistory->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_PastMedicalHistory" class="form-group patient_an_registration_PastMedicalHistory">
<div id="tp_x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_an_registration" data-field="x_PastMedicalHistory" data-value-separator="<?php echo $patient_an_registration->PastMedicalHistory->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory[]" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory[]" value="{value}"<?php echo $patient_an_registration->PastMedicalHistory->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_an_registration->PastMedicalHistory->checkBoxListHtml(FALSE, "x{$patient_an_registration_grid->RowIndex}_PastMedicalHistory[]") ?>
</div></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastMedicalHistory" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory[]" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory[]" value="<?php echo HtmlEncode($patient_an_registration->PastMedicalHistory->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_PastMedicalHistory" class="form-group patient_an_registration_PastMedicalHistory">
<div id="tp_x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_an_registration" data-field="x_PastMedicalHistory" data-value-separator="<?php echo $patient_an_registration->PastMedicalHistory->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory[]" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory[]" value="{value}"<?php echo $patient_an_registration->PastMedicalHistory->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_an_registration->PastMedicalHistory->checkBoxListHtml(FALSE, "x{$patient_an_registration_grid->RowIndex}_PastMedicalHistory[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_PastMedicalHistory" class="patient_an_registration_PastMedicalHistory">
<span<?php echo $patient_an_registration->PastMedicalHistory->viewAttributes() ?>>
<?php echo $patient_an_registration->PastMedicalHistory->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastMedicalHistory" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory" value="<?php echo HtmlEncode($patient_an_registration->PastMedicalHistory->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PastMedicalHistory" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory[]" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory[]" value="<?php echo HtmlEncode($patient_an_registration->PastMedicalHistory->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastMedicalHistory" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory" value="<?php echo HtmlEncode($patient_an_registration->PastMedicalHistory->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PastMedicalHistory" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory[]" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory[]" value="<?php echo HtmlEncode($patient_an_registration->PastMedicalHistory->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->PastSurgicalHistory->Visible) { // PastSurgicalHistory ?>
		<td data-name="PastSurgicalHistory"<?php echo $patient_an_registration->PastSurgicalHistory->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_PastSurgicalHistory" class="form-group patient_an_registration_PastSurgicalHistory">
<div id="tp_x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_an_registration" data-field="x_PastSurgicalHistory" data-value-separator="<?php echo $patient_an_registration->PastSurgicalHistory->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory[]" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory[]" value="{value}"<?php echo $patient_an_registration->PastSurgicalHistory->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_an_registration->PastSurgicalHistory->checkBoxListHtml(FALSE, "x{$patient_an_registration_grid->RowIndex}_PastSurgicalHistory[]") ?>
</div></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastSurgicalHistory" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory[]" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory[]" value="<?php echo HtmlEncode($patient_an_registration->PastSurgicalHistory->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_PastSurgicalHistory" class="form-group patient_an_registration_PastSurgicalHistory">
<div id="tp_x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_an_registration" data-field="x_PastSurgicalHistory" data-value-separator="<?php echo $patient_an_registration->PastSurgicalHistory->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory[]" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory[]" value="{value}"<?php echo $patient_an_registration->PastSurgicalHistory->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_an_registration->PastSurgicalHistory->checkBoxListHtml(FALSE, "x{$patient_an_registration_grid->RowIndex}_PastSurgicalHistory[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_PastSurgicalHistory" class="patient_an_registration_PastSurgicalHistory">
<span<?php echo $patient_an_registration->PastSurgicalHistory->viewAttributes() ?>>
<?php echo $patient_an_registration->PastSurgicalHistory->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastSurgicalHistory" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory" value="<?php echo HtmlEncode($patient_an_registration->PastSurgicalHistory->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PastSurgicalHistory" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory[]" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory[]" value="<?php echo HtmlEncode($patient_an_registration->PastSurgicalHistory->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastSurgicalHistory" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory" value="<?php echo HtmlEncode($patient_an_registration->PastSurgicalHistory->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PastSurgicalHistory" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory[]" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory[]" value="<?php echo HtmlEncode($patient_an_registration->PastSurgicalHistory->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->FamilyHistory->Visible) { // FamilyHistory ?>
		<td data-name="FamilyHistory"<?php echo $patient_an_registration->FamilyHistory->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_FamilyHistory" class="form-group patient_an_registration_FamilyHistory">
<div id="tp_x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_an_registration" data-field="x_FamilyHistory" data-value-separator="<?php echo $patient_an_registration->FamilyHistory->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory[]" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory[]" value="{value}"<?php echo $patient_an_registration->FamilyHistory->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_an_registration->FamilyHistory->checkBoxListHtml(FALSE, "x{$patient_an_registration_grid->RowIndex}_FamilyHistory[]") ?>
</div></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_FamilyHistory" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory[]" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory[]" value="<?php echo HtmlEncode($patient_an_registration->FamilyHistory->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_FamilyHistory" class="form-group patient_an_registration_FamilyHistory">
<div id="tp_x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_an_registration" data-field="x_FamilyHistory" data-value-separator="<?php echo $patient_an_registration->FamilyHistory->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory[]" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory[]" value="{value}"<?php echo $patient_an_registration->FamilyHistory->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_an_registration->FamilyHistory->checkBoxListHtml(FALSE, "x{$patient_an_registration_grid->RowIndex}_FamilyHistory[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_FamilyHistory" class="patient_an_registration_FamilyHistory">
<span<?php echo $patient_an_registration->FamilyHistory->viewAttributes() ?>>
<?php echo $patient_an_registration->FamilyHistory->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_FamilyHistory" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory" value="<?php echo HtmlEncode($patient_an_registration->FamilyHistory->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_FamilyHistory" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory[]" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory[]" value="<?php echo HtmlEncode($patient_an_registration->FamilyHistory->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_FamilyHistory" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory" value="<?php echo HtmlEncode($patient_an_registration->FamilyHistory->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_FamilyHistory" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory[]" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory[]" value="<?php echo HtmlEncode($patient_an_registration->FamilyHistory->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Viability->Visible) { // Viability ?>
		<td data-name="Viability"<?php echo $patient_an_registration->Viability->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Viability" class="form-group patient_an_registration_Viability">
<input type="text" data-table="patient_an_registration" data-field="x_Viability" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Viability->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Viability->EditValue ?>"<?php echo $patient_an_registration->Viability->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability" value="<?php echo HtmlEncode($patient_an_registration->Viability->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Viability" class="form-group patient_an_registration_Viability">
<input type="text" data-table="patient_an_registration" data-field="x_Viability" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Viability->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Viability->EditValue ?>"<?php echo $patient_an_registration->Viability->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Viability" class="patient_an_registration_Viability">
<span<?php echo $patient_an_registration->Viability->viewAttributes() ?>>
<?php echo $patient_an_registration->Viability->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability" value="<?php echo HtmlEncode($patient_an_registration->Viability->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability" value="<?php echo HtmlEncode($patient_an_registration->Viability->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability" value="<?php echo HtmlEncode($patient_an_registration->Viability->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability" value="<?php echo HtmlEncode($patient_an_registration->Viability->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->ViabilityDATE->Visible) { // ViabilityDATE ?>
		<td data-name="ViabilityDATE"<?php echo $patient_an_registration->ViabilityDATE->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_ViabilityDATE" class="form-group patient_an_registration_ViabilityDATE">
<input type="text" data-table="patient_an_registration" data-field="x_ViabilityDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->ViabilityDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->ViabilityDATE->EditValue ?>"<?php echo $patient_an_registration->ViabilityDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->ViabilityDATE->ReadOnly && !$patient_an_registration->ViabilityDATE->Disabled && !isset($patient_an_registration->ViabilityDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->ViabilityDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ViabilityDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityDATE" value="<?php echo HtmlEncode($patient_an_registration->ViabilityDATE->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_ViabilityDATE" class="form-group patient_an_registration_ViabilityDATE">
<input type="text" data-table="patient_an_registration" data-field="x_ViabilityDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->ViabilityDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->ViabilityDATE->EditValue ?>"<?php echo $patient_an_registration->ViabilityDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->ViabilityDATE->ReadOnly && !$patient_an_registration->ViabilityDATE->Disabled && !isset($patient_an_registration->ViabilityDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->ViabilityDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_ViabilityDATE" class="patient_an_registration_ViabilityDATE">
<span<?php echo $patient_an_registration->ViabilityDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->ViabilityDATE->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ViabilityDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityDATE" value="<?php echo HtmlEncode($patient_an_registration->ViabilityDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ViabilityDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityDATE" value="<?php echo HtmlEncode($patient_an_registration->ViabilityDATE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ViabilityDATE" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityDATE" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityDATE" value="<?php echo HtmlEncode($patient_an_registration->ViabilityDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ViabilityDATE" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityDATE" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityDATE" value="<?php echo HtmlEncode($patient_an_registration->ViabilityDATE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->ViabilityREPORT->Visible) { // ViabilityREPORT ?>
		<td data-name="ViabilityREPORT"<?php echo $patient_an_registration->ViabilityREPORT->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_ViabilityREPORT" class="form-group patient_an_registration_ViabilityREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_ViabilityREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->ViabilityREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->ViabilityREPORT->EditValue ?>"<?php echo $patient_an_registration->ViabilityREPORT->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ViabilityREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityREPORT" value="<?php echo HtmlEncode($patient_an_registration->ViabilityREPORT->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_ViabilityREPORT" class="form-group patient_an_registration_ViabilityREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_ViabilityREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->ViabilityREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->ViabilityREPORT->EditValue ?>"<?php echo $patient_an_registration->ViabilityREPORT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_ViabilityREPORT" class="patient_an_registration_ViabilityREPORT">
<span<?php echo $patient_an_registration->ViabilityREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->ViabilityREPORT->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ViabilityREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityREPORT" value="<?php echo HtmlEncode($patient_an_registration->ViabilityREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ViabilityREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityREPORT" value="<?php echo HtmlEncode($patient_an_registration->ViabilityREPORT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ViabilityREPORT" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityREPORT" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityREPORT" value="<?php echo HtmlEncode($patient_an_registration->ViabilityREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ViabilityREPORT" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityREPORT" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityREPORT" value="<?php echo HtmlEncode($patient_an_registration->ViabilityREPORT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Viability2->Visible) { // Viability2 ?>
		<td data-name="Viability2"<?php echo $patient_an_registration->Viability2->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Viability2" class="form-group patient_an_registration_Viability2">
<input type="text" data-table="patient_an_registration" data-field="x_Viability2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Viability2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Viability2->EditValue ?>"<?php echo $patient_an_registration->Viability2->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2" value="<?php echo HtmlEncode($patient_an_registration->Viability2->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Viability2" class="form-group patient_an_registration_Viability2">
<input type="text" data-table="patient_an_registration" data-field="x_Viability2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Viability2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Viability2->EditValue ?>"<?php echo $patient_an_registration->Viability2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Viability2" class="patient_an_registration_Viability2">
<span<?php echo $patient_an_registration->Viability2->viewAttributes() ?>>
<?php echo $patient_an_registration->Viability2->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2" value="<?php echo HtmlEncode($patient_an_registration->Viability2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2" value="<?php echo HtmlEncode($patient_an_registration->Viability2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2" value="<?php echo HtmlEncode($patient_an_registration->Viability2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2" value="<?php echo HtmlEncode($patient_an_registration->Viability2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Viability2DATE->Visible) { // Viability2DATE ?>
		<td data-name="Viability2DATE"<?php echo $patient_an_registration->Viability2DATE->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Viability2DATE" class="form-group patient_an_registration_Viability2DATE">
<input type="text" data-table="patient_an_registration" data-field="x_Viability2DATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2DATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2DATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Viability2DATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Viability2DATE->EditValue ?>"<?php echo $patient_an_registration->Viability2DATE->editAttributes() ?>>
<?php if (!$patient_an_registration->Viability2DATE->ReadOnly && !$patient_an_registration->Viability2DATE->Disabled && !isset($patient_an_registration->Viability2DATE->EditAttrs["readonly"]) && !isset($patient_an_registration->Viability2DATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2DATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2DATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2DATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2DATE" value="<?php echo HtmlEncode($patient_an_registration->Viability2DATE->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Viability2DATE" class="form-group patient_an_registration_Viability2DATE">
<input type="text" data-table="patient_an_registration" data-field="x_Viability2DATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2DATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2DATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Viability2DATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Viability2DATE->EditValue ?>"<?php echo $patient_an_registration->Viability2DATE->editAttributes() ?>>
<?php if (!$patient_an_registration->Viability2DATE->ReadOnly && !$patient_an_registration->Viability2DATE->Disabled && !isset($patient_an_registration->Viability2DATE->EditAttrs["readonly"]) && !isset($patient_an_registration->Viability2DATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2DATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Viability2DATE" class="patient_an_registration_Viability2DATE">
<span<?php echo $patient_an_registration->Viability2DATE->viewAttributes() ?>>
<?php echo $patient_an_registration->Viability2DATE->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2DATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2DATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2DATE" value="<?php echo HtmlEncode($patient_an_registration->Viability2DATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2DATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2DATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2DATE" value="<?php echo HtmlEncode($patient_an_registration->Viability2DATE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2DATE" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2DATE" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2DATE" value="<?php echo HtmlEncode($patient_an_registration->Viability2DATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2DATE" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2DATE" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2DATE" value="<?php echo HtmlEncode($patient_an_registration->Viability2DATE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Viability2REPORT->Visible) { // Viability2REPORT ?>
		<td data-name="Viability2REPORT"<?php echo $patient_an_registration->Viability2REPORT->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Viability2REPORT" class="form-group patient_an_registration_Viability2REPORT">
<input type="text" data-table="patient_an_registration" data-field="x_Viability2REPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2REPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2REPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Viability2REPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Viability2REPORT->EditValue ?>"<?php echo $patient_an_registration->Viability2REPORT->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2REPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2REPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2REPORT" value="<?php echo HtmlEncode($patient_an_registration->Viability2REPORT->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Viability2REPORT" class="form-group patient_an_registration_Viability2REPORT">
<input type="text" data-table="patient_an_registration" data-field="x_Viability2REPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2REPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2REPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Viability2REPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Viability2REPORT->EditValue ?>"<?php echo $patient_an_registration->Viability2REPORT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Viability2REPORT" class="patient_an_registration_Viability2REPORT">
<span<?php echo $patient_an_registration->Viability2REPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->Viability2REPORT->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2REPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2REPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2REPORT" value="<?php echo HtmlEncode($patient_an_registration->Viability2REPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2REPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2REPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2REPORT" value="<?php echo HtmlEncode($patient_an_registration->Viability2REPORT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2REPORT" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2REPORT" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2REPORT" value="<?php echo HtmlEncode($patient_an_registration->Viability2REPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2REPORT" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2REPORT" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2REPORT" value="<?php echo HtmlEncode($patient_an_registration->Viability2REPORT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->NTscan->Visible) { // NTscan ?>
		<td data-name="NTscan"<?php echo $patient_an_registration->NTscan->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_NTscan" class="form-group patient_an_registration_NTscan">
<input type="text" data-table="patient_an_registration" data-field="x_NTscan" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscan" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscan" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->NTscan->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->NTscan->EditValue ?>"<?php echo $patient_an_registration->NTscan->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscan" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_NTscan" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_NTscan" value="<?php echo HtmlEncode($patient_an_registration->NTscan->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_NTscan" class="form-group patient_an_registration_NTscan">
<input type="text" data-table="patient_an_registration" data-field="x_NTscan" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscan" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscan" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->NTscan->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->NTscan->EditValue ?>"<?php echo $patient_an_registration->NTscan->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_NTscan" class="patient_an_registration_NTscan">
<span<?php echo $patient_an_registration->NTscan->viewAttributes() ?>>
<?php echo $patient_an_registration->NTscan->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscan" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscan" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscan" value="<?php echo HtmlEncode($patient_an_registration->NTscan->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscan" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_NTscan" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_NTscan" value="<?php echo HtmlEncode($patient_an_registration->NTscan->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscan" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscan" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscan" value="<?php echo HtmlEncode($patient_an_registration->NTscan->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscan" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_NTscan" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_NTscan" value="<?php echo HtmlEncode($patient_an_registration->NTscan->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->NTscanDATE->Visible) { // NTscanDATE ?>
		<td data-name="NTscanDATE"<?php echo $patient_an_registration->NTscanDATE->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_NTscanDATE" class="form-group patient_an_registration_NTscanDATE">
<input type="text" data-table="patient_an_registration" data-field="x_NTscanDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->NTscanDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->NTscanDATE->EditValue ?>"<?php echo $patient_an_registration->NTscanDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->NTscanDATE->ReadOnly && !$patient_an_registration->NTscanDATE->Disabled && !isset($patient_an_registration->NTscanDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->NTscanDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscanDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanDATE" value="<?php echo HtmlEncode($patient_an_registration->NTscanDATE->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_NTscanDATE" class="form-group patient_an_registration_NTscanDATE">
<input type="text" data-table="patient_an_registration" data-field="x_NTscanDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->NTscanDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->NTscanDATE->EditValue ?>"<?php echo $patient_an_registration->NTscanDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->NTscanDATE->ReadOnly && !$patient_an_registration->NTscanDATE->Disabled && !isset($patient_an_registration->NTscanDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->NTscanDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_NTscanDATE" class="patient_an_registration_NTscanDATE">
<span<?php echo $patient_an_registration->NTscanDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->NTscanDATE->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscanDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanDATE" value="<?php echo HtmlEncode($patient_an_registration->NTscanDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscanDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanDATE" value="<?php echo HtmlEncode($patient_an_registration->NTscanDATE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscanDATE" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanDATE" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanDATE" value="<?php echo HtmlEncode($patient_an_registration->NTscanDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscanDATE" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanDATE" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanDATE" value="<?php echo HtmlEncode($patient_an_registration->NTscanDATE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->NTscanREPORT->Visible) { // NTscanREPORT ?>
		<td data-name="NTscanREPORT"<?php echo $patient_an_registration->NTscanREPORT->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_NTscanREPORT" class="form-group patient_an_registration_NTscanREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_NTscanREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->NTscanREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->NTscanREPORT->EditValue ?>"<?php echo $patient_an_registration->NTscanREPORT->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscanREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanREPORT" value="<?php echo HtmlEncode($patient_an_registration->NTscanREPORT->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_NTscanREPORT" class="form-group patient_an_registration_NTscanREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_NTscanREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->NTscanREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->NTscanREPORT->EditValue ?>"<?php echo $patient_an_registration->NTscanREPORT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_NTscanREPORT" class="patient_an_registration_NTscanREPORT">
<span<?php echo $patient_an_registration->NTscanREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->NTscanREPORT->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscanREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanREPORT" value="<?php echo HtmlEncode($patient_an_registration->NTscanREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscanREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanREPORT" value="<?php echo HtmlEncode($patient_an_registration->NTscanREPORT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscanREPORT" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanREPORT" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanREPORT" value="<?php echo HtmlEncode($patient_an_registration->NTscanREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscanREPORT" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanREPORT" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanREPORT" value="<?php echo HtmlEncode($patient_an_registration->NTscanREPORT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->EarlyTarget->Visible) { // EarlyTarget ?>
		<td data-name="EarlyTarget"<?php echo $patient_an_registration->EarlyTarget->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_EarlyTarget" class="form-group patient_an_registration_EarlyTarget">
<input type="text" data-table="patient_an_registration" data-field="x_EarlyTarget" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTarget" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTarget" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->EarlyTarget->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->EarlyTarget->EditValue ?>"<?php echo $patient_an_registration->EarlyTarget->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTarget" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTarget" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTarget" value="<?php echo HtmlEncode($patient_an_registration->EarlyTarget->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_EarlyTarget" class="form-group patient_an_registration_EarlyTarget">
<input type="text" data-table="patient_an_registration" data-field="x_EarlyTarget" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTarget" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTarget" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->EarlyTarget->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->EarlyTarget->EditValue ?>"<?php echo $patient_an_registration->EarlyTarget->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_EarlyTarget" class="patient_an_registration_EarlyTarget">
<span<?php echo $patient_an_registration->EarlyTarget->viewAttributes() ?>>
<?php echo $patient_an_registration->EarlyTarget->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTarget" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTarget" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTarget" value="<?php echo HtmlEncode($patient_an_registration->EarlyTarget->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTarget" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTarget" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTarget" value="<?php echo HtmlEncode($patient_an_registration->EarlyTarget->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTarget" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTarget" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTarget" value="<?php echo HtmlEncode($patient_an_registration->EarlyTarget->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTarget" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTarget" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTarget" value="<?php echo HtmlEncode($patient_an_registration->EarlyTarget->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->EarlyTargetDATE->Visible) { // EarlyTargetDATE ?>
		<td data-name="EarlyTargetDATE"<?php echo $patient_an_registration->EarlyTargetDATE->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_EarlyTargetDATE" class="form-group patient_an_registration_EarlyTargetDATE">
<input type="text" data-table="patient_an_registration" data-field="x_EarlyTargetDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->EarlyTargetDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->EarlyTargetDATE->EditValue ?>"<?php echo $patient_an_registration->EarlyTargetDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->EarlyTargetDATE->ReadOnly && !$patient_an_registration->EarlyTargetDATE->Disabled && !isset($patient_an_registration->EarlyTargetDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->EarlyTargetDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTargetDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetDATE" value="<?php echo HtmlEncode($patient_an_registration->EarlyTargetDATE->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_EarlyTargetDATE" class="form-group patient_an_registration_EarlyTargetDATE">
<input type="text" data-table="patient_an_registration" data-field="x_EarlyTargetDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->EarlyTargetDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->EarlyTargetDATE->EditValue ?>"<?php echo $patient_an_registration->EarlyTargetDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->EarlyTargetDATE->ReadOnly && !$patient_an_registration->EarlyTargetDATE->Disabled && !isset($patient_an_registration->EarlyTargetDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->EarlyTargetDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_EarlyTargetDATE" class="patient_an_registration_EarlyTargetDATE">
<span<?php echo $patient_an_registration->EarlyTargetDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->EarlyTargetDATE->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTargetDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetDATE" value="<?php echo HtmlEncode($patient_an_registration->EarlyTargetDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTargetDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetDATE" value="<?php echo HtmlEncode($patient_an_registration->EarlyTargetDATE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTargetDATE" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetDATE" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetDATE" value="<?php echo HtmlEncode($patient_an_registration->EarlyTargetDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTargetDATE" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetDATE" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetDATE" value="<?php echo HtmlEncode($patient_an_registration->EarlyTargetDATE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->EarlyTargetREPORT->Visible) { // EarlyTargetREPORT ?>
		<td data-name="EarlyTargetREPORT"<?php echo $patient_an_registration->EarlyTargetREPORT->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_EarlyTargetREPORT" class="form-group patient_an_registration_EarlyTargetREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_EarlyTargetREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->EarlyTargetREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->EarlyTargetREPORT->EditValue ?>"<?php echo $patient_an_registration->EarlyTargetREPORT->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTargetREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetREPORT" value="<?php echo HtmlEncode($patient_an_registration->EarlyTargetREPORT->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_EarlyTargetREPORT" class="form-group patient_an_registration_EarlyTargetREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_EarlyTargetREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->EarlyTargetREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->EarlyTargetREPORT->EditValue ?>"<?php echo $patient_an_registration->EarlyTargetREPORT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_EarlyTargetREPORT" class="patient_an_registration_EarlyTargetREPORT">
<span<?php echo $patient_an_registration->EarlyTargetREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->EarlyTargetREPORT->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTargetREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetREPORT" value="<?php echo HtmlEncode($patient_an_registration->EarlyTargetREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTargetREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetREPORT" value="<?php echo HtmlEncode($patient_an_registration->EarlyTargetREPORT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTargetREPORT" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetREPORT" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetREPORT" value="<?php echo HtmlEncode($patient_an_registration->EarlyTargetREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTargetREPORT" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetREPORT" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetREPORT" value="<?php echo HtmlEncode($patient_an_registration->EarlyTargetREPORT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Anomaly->Visible) { // Anomaly ?>
		<td data-name="Anomaly"<?php echo $patient_an_registration->Anomaly->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Anomaly" class="form-group patient_an_registration_Anomaly">
<input type="text" data-table="patient_an_registration" data-field="x_Anomaly" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Anomaly" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Anomaly" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Anomaly->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Anomaly->EditValue ?>"<?php echo $patient_an_registration->Anomaly->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Anomaly" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Anomaly" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Anomaly" value="<?php echo HtmlEncode($patient_an_registration->Anomaly->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Anomaly" class="form-group patient_an_registration_Anomaly">
<input type="text" data-table="patient_an_registration" data-field="x_Anomaly" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Anomaly" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Anomaly" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Anomaly->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Anomaly->EditValue ?>"<?php echo $patient_an_registration->Anomaly->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Anomaly" class="patient_an_registration_Anomaly">
<span<?php echo $patient_an_registration->Anomaly->viewAttributes() ?>>
<?php echo $patient_an_registration->Anomaly->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Anomaly" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Anomaly" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Anomaly" value="<?php echo HtmlEncode($patient_an_registration->Anomaly->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Anomaly" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Anomaly" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Anomaly" value="<?php echo HtmlEncode($patient_an_registration->Anomaly->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Anomaly" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Anomaly" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Anomaly" value="<?php echo HtmlEncode($patient_an_registration->Anomaly->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Anomaly" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Anomaly" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Anomaly" value="<?php echo HtmlEncode($patient_an_registration->Anomaly->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->AnomalyDATE->Visible) { // AnomalyDATE ?>
		<td data-name="AnomalyDATE"<?php echo $patient_an_registration->AnomalyDATE->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_AnomalyDATE" class="form-group patient_an_registration_AnomalyDATE">
<input type="text" data-table="patient_an_registration" data-field="x_AnomalyDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->AnomalyDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->AnomalyDATE->EditValue ?>"<?php echo $patient_an_registration->AnomalyDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->AnomalyDATE->ReadOnly && !$patient_an_registration->AnomalyDATE->Disabled && !isset($patient_an_registration->AnomalyDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->AnomalyDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_AnomalyDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyDATE" value="<?php echo HtmlEncode($patient_an_registration->AnomalyDATE->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_AnomalyDATE" class="form-group patient_an_registration_AnomalyDATE">
<input type="text" data-table="patient_an_registration" data-field="x_AnomalyDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->AnomalyDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->AnomalyDATE->EditValue ?>"<?php echo $patient_an_registration->AnomalyDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->AnomalyDATE->ReadOnly && !$patient_an_registration->AnomalyDATE->Disabled && !isset($patient_an_registration->AnomalyDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->AnomalyDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_AnomalyDATE" class="patient_an_registration_AnomalyDATE">
<span<?php echo $patient_an_registration->AnomalyDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->AnomalyDATE->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_AnomalyDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyDATE" value="<?php echo HtmlEncode($patient_an_registration->AnomalyDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_AnomalyDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyDATE" value="<?php echo HtmlEncode($patient_an_registration->AnomalyDATE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_AnomalyDATE" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyDATE" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyDATE" value="<?php echo HtmlEncode($patient_an_registration->AnomalyDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_AnomalyDATE" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyDATE" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyDATE" value="<?php echo HtmlEncode($patient_an_registration->AnomalyDATE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->AnomalyREPORT->Visible) { // AnomalyREPORT ?>
		<td data-name="AnomalyREPORT"<?php echo $patient_an_registration->AnomalyREPORT->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_AnomalyREPORT" class="form-group patient_an_registration_AnomalyREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_AnomalyREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->AnomalyREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->AnomalyREPORT->EditValue ?>"<?php echo $patient_an_registration->AnomalyREPORT->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_AnomalyREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyREPORT" value="<?php echo HtmlEncode($patient_an_registration->AnomalyREPORT->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_AnomalyREPORT" class="form-group patient_an_registration_AnomalyREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_AnomalyREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->AnomalyREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->AnomalyREPORT->EditValue ?>"<?php echo $patient_an_registration->AnomalyREPORT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_AnomalyREPORT" class="patient_an_registration_AnomalyREPORT">
<span<?php echo $patient_an_registration->AnomalyREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->AnomalyREPORT->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_AnomalyREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyREPORT" value="<?php echo HtmlEncode($patient_an_registration->AnomalyREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_AnomalyREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyREPORT" value="<?php echo HtmlEncode($patient_an_registration->AnomalyREPORT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_AnomalyREPORT" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyREPORT" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyREPORT" value="<?php echo HtmlEncode($patient_an_registration->AnomalyREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_AnomalyREPORT" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyREPORT" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyREPORT" value="<?php echo HtmlEncode($patient_an_registration->AnomalyREPORT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Growth->Visible) { // Growth ?>
		<td data-name="Growth"<?php echo $patient_an_registration->Growth->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Growth" class="form-group patient_an_registration_Growth">
<input type="text" data-table="patient_an_registration" data-field="x_Growth" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Growth->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Growth->EditValue ?>"<?php echo $patient_an_registration->Growth->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth" value="<?php echo HtmlEncode($patient_an_registration->Growth->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Growth" class="form-group patient_an_registration_Growth">
<input type="text" data-table="patient_an_registration" data-field="x_Growth" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Growth->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Growth->EditValue ?>"<?php echo $patient_an_registration->Growth->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Growth" class="patient_an_registration_Growth">
<span<?php echo $patient_an_registration->Growth->viewAttributes() ?>>
<?php echo $patient_an_registration->Growth->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth" value="<?php echo HtmlEncode($patient_an_registration->Growth->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth" value="<?php echo HtmlEncode($patient_an_registration->Growth->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth" value="<?php echo HtmlEncode($patient_an_registration->Growth->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth" value="<?php echo HtmlEncode($patient_an_registration->Growth->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->GrowthDATE->Visible) { // GrowthDATE ?>
		<td data-name="GrowthDATE"<?php echo $patient_an_registration->GrowthDATE->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_GrowthDATE" class="form-group patient_an_registration_GrowthDATE">
<input type="text" data-table="patient_an_registration" data-field="x_GrowthDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->GrowthDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->GrowthDATE->EditValue ?>"<?php echo $patient_an_registration->GrowthDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->GrowthDATE->ReadOnly && !$patient_an_registration->GrowthDATE->Disabled && !isset($patient_an_registration->GrowthDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->GrowthDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_GrowthDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthDATE" value="<?php echo HtmlEncode($patient_an_registration->GrowthDATE->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_GrowthDATE" class="form-group patient_an_registration_GrowthDATE">
<input type="text" data-table="patient_an_registration" data-field="x_GrowthDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->GrowthDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->GrowthDATE->EditValue ?>"<?php echo $patient_an_registration->GrowthDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->GrowthDATE->ReadOnly && !$patient_an_registration->GrowthDATE->Disabled && !isset($patient_an_registration->GrowthDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->GrowthDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_GrowthDATE" class="patient_an_registration_GrowthDATE">
<span<?php echo $patient_an_registration->GrowthDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->GrowthDATE->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_GrowthDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthDATE" value="<?php echo HtmlEncode($patient_an_registration->GrowthDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_GrowthDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthDATE" value="<?php echo HtmlEncode($patient_an_registration->GrowthDATE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_GrowthDATE" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthDATE" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthDATE" value="<?php echo HtmlEncode($patient_an_registration->GrowthDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_GrowthDATE" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthDATE" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthDATE" value="<?php echo HtmlEncode($patient_an_registration->GrowthDATE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->GrowthREPORT->Visible) { // GrowthREPORT ?>
		<td data-name="GrowthREPORT"<?php echo $patient_an_registration->GrowthREPORT->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_GrowthREPORT" class="form-group patient_an_registration_GrowthREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_GrowthREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->GrowthREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->GrowthREPORT->EditValue ?>"<?php echo $patient_an_registration->GrowthREPORT->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_GrowthREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthREPORT" value="<?php echo HtmlEncode($patient_an_registration->GrowthREPORT->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_GrowthREPORT" class="form-group patient_an_registration_GrowthREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_GrowthREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->GrowthREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->GrowthREPORT->EditValue ?>"<?php echo $patient_an_registration->GrowthREPORT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_GrowthREPORT" class="patient_an_registration_GrowthREPORT">
<span<?php echo $patient_an_registration->GrowthREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->GrowthREPORT->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_GrowthREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthREPORT" value="<?php echo HtmlEncode($patient_an_registration->GrowthREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_GrowthREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthREPORT" value="<?php echo HtmlEncode($patient_an_registration->GrowthREPORT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_GrowthREPORT" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthREPORT" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthREPORT" value="<?php echo HtmlEncode($patient_an_registration->GrowthREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_GrowthREPORT" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthREPORT" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthREPORT" value="<?php echo HtmlEncode($patient_an_registration->GrowthREPORT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Growth1->Visible) { // Growth1 ?>
		<td data-name="Growth1"<?php echo $patient_an_registration->Growth1->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Growth1" class="form-group patient_an_registration_Growth1">
<input type="text" data-table="patient_an_registration" data-field="x_Growth1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Growth1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Growth1->EditValue ?>"<?php echo $patient_an_registration->Growth1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1" value="<?php echo HtmlEncode($patient_an_registration->Growth1->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Growth1" class="form-group patient_an_registration_Growth1">
<input type="text" data-table="patient_an_registration" data-field="x_Growth1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Growth1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Growth1->EditValue ?>"<?php echo $patient_an_registration->Growth1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Growth1" class="patient_an_registration_Growth1">
<span<?php echo $patient_an_registration->Growth1->viewAttributes() ?>>
<?php echo $patient_an_registration->Growth1->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1" value="<?php echo HtmlEncode($patient_an_registration->Growth1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1" value="<?php echo HtmlEncode($patient_an_registration->Growth1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1" value="<?php echo HtmlEncode($patient_an_registration->Growth1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1" value="<?php echo HtmlEncode($patient_an_registration->Growth1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Growth1DATE->Visible) { // Growth1DATE ?>
		<td data-name="Growth1DATE"<?php echo $patient_an_registration->Growth1DATE->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Growth1DATE" class="form-group patient_an_registration_Growth1DATE">
<input type="text" data-table="patient_an_registration" data-field="x_Growth1DATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1DATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1DATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Growth1DATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Growth1DATE->EditValue ?>"<?php echo $patient_an_registration->Growth1DATE->editAttributes() ?>>
<?php if (!$patient_an_registration->Growth1DATE->ReadOnly && !$patient_an_registration->Growth1DATE->Disabled && !isset($patient_an_registration->Growth1DATE->EditAttrs["readonly"]) && !isset($patient_an_registration->Growth1DATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1DATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1DATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1DATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1DATE" value="<?php echo HtmlEncode($patient_an_registration->Growth1DATE->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Growth1DATE" class="form-group patient_an_registration_Growth1DATE">
<input type="text" data-table="patient_an_registration" data-field="x_Growth1DATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1DATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1DATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Growth1DATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Growth1DATE->EditValue ?>"<?php echo $patient_an_registration->Growth1DATE->editAttributes() ?>>
<?php if (!$patient_an_registration->Growth1DATE->ReadOnly && !$patient_an_registration->Growth1DATE->Disabled && !isset($patient_an_registration->Growth1DATE->EditAttrs["readonly"]) && !isset($patient_an_registration->Growth1DATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1DATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Growth1DATE" class="patient_an_registration_Growth1DATE">
<span<?php echo $patient_an_registration->Growth1DATE->viewAttributes() ?>>
<?php echo $patient_an_registration->Growth1DATE->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1DATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1DATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1DATE" value="<?php echo HtmlEncode($patient_an_registration->Growth1DATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1DATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1DATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1DATE" value="<?php echo HtmlEncode($patient_an_registration->Growth1DATE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1DATE" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1DATE" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1DATE" value="<?php echo HtmlEncode($patient_an_registration->Growth1DATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1DATE" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1DATE" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1DATE" value="<?php echo HtmlEncode($patient_an_registration->Growth1DATE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Growth1REPORT->Visible) { // Growth1REPORT ?>
		<td data-name="Growth1REPORT"<?php echo $patient_an_registration->Growth1REPORT->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Growth1REPORT" class="form-group patient_an_registration_Growth1REPORT">
<input type="text" data-table="patient_an_registration" data-field="x_Growth1REPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1REPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1REPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Growth1REPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Growth1REPORT->EditValue ?>"<?php echo $patient_an_registration->Growth1REPORT->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1REPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1REPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1REPORT" value="<?php echo HtmlEncode($patient_an_registration->Growth1REPORT->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Growth1REPORT" class="form-group patient_an_registration_Growth1REPORT">
<input type="text" data-table="patient_an_registration" data-field="x_Growth1REPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1REPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1REPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Growth1REPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Growth1REPORT->EditValue ?>"<?php echo $patient_an_registration->Growth1REPORT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Growth1REPORT" class="patient_an_registration_Growth1REPORT">
<span<?php echo $patient_an_registration->Growth1REPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->Growth1REPORT->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1REPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1REPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1REPORT" value="<?php echo HtmlEncode($patient_an_registration->Growth1REPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1REPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1REPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1REPORT" value="<?php echo HtmlEncode($patient_an_registration->Growth1REPORT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1REPORT" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1REPORT" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1REPORT" value="<?php echo HtmlEncode($patient_an_registration->Growth1REPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1REPORT" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1REPORT" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1REPORT" value="<?php echo HtmlEncode($patient_an_registration->Growth1REPORT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->ANProfile->Visible) { // ANProfile ?>
		<td data-name="ANProfile"<?php echo $patient_an_registration->ANProfile->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_ANProfile" class="form-group patient_an_registration_ANProfile">
<input type="text" data-table="patient_an_registration" data-field="x_ANProfile" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfile" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->ANProfile->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->ANProfile->EditValue ?>"<?php echo $patient_an_registration->ANProfile->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfile" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfile" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfile" value="<?php echo HtmlEncode($patient_an_registration->ANProfile->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_ANProfile" class="form-group patient_an_registration_ANProfile">
<input type="text" data-table="patient_an_registration" data-field="x_ANProfile" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfile" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->ANProfile->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->ANProfile->EditValue ?>"<?php echo $patient_an_registration->ANProfile->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_ANProfile" class="patient_an_registration_ANProfile">
<span<?php echo $patient_an_registration->ANProfile->viewAttributes() ?>>
<?php echo $patient_an_registration->ANProfile->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfile" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfile" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfile" value="<?php echo HtmlEncode($patient_an_registration->ANProfile->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfile" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfile" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfile" value="<?php echo HtmlEncode($patient_an_registration->ANProfile->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfile" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfile" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfile" value="<?php echo HtmlEncode($patient_an_registration->ANProfile->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfile" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfile" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfile" value="<?php echo HtmlEncode($patient_an_registration->ANProfile->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->ANProfileDATE->Visible) { // ANProfileDATE ?>
		<td data-name="ANProfileDATE"<?php echo $patient_an_registration->ANProfileDATE->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_ANProfileDATE" class="form-group patient_an_registration_ANProfileDATE">
<input type="text" data-table="patient_an_registration" data-field="x_ANProfileDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->ANProfileDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->ANProfileDATE->EditValue ?>"<?php echo $patient_an_registration->ANProfileDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->ANProfileDATE->ReadOnly && !$patient_an_registration->ANProfileDATE->Disabled && !isset($patient_an_registration->ANProfileDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->ANProfileDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileDATE" value="<?php echo HtmlEncode($patient_an_registration->ANProfileDATE->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_ANProfileDATE" class="form-group patient_an_registration_ANProfileDATE">
<input type="text" data-table="patient_an_registration" data-field="x_ANProfileDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->ANProfileDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->ANProfileDATE->EditValue ?>"<?php echo $patient_an_registration->ANProfileDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->ANProfileDATE->ReadOnly && !$patient_an_registration->ANProfileDATE->Disabled && !isset($patient_an_registration->ANProfileDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->ANProfileDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_ANProfileDATE" class="patient_an_registration_ANProfileDATE">
<span<?php echo $patient_an_registration->ANProfileDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->ANProfileDATE->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileDATE" value="<?php echo HtmlEncode($patient_an_registration->ANProfileDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileDATE" value="<?php echo HtmlEncode($patient_an_registration->ANProfileDATE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileDATE" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileDATE" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileDATE" value="<?php echo HtmlEncode($patient_an_registration->ANProfileDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileDATE" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileDATE" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileDATE" value="<?php echo HtmlEncode($patient_an_registration->ANProfileDATE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->ANProfileINHOUSE->Visible) { // ANProfileINHOUSE ?>
		<td data-name="ANProfileINHOUSE"<?php echo $patient_an_registration->ANProfileINHOUSE->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_ANProfileINHOUSE" class="form-group patient_an_registration_ANProfileINHOUSE">
<input type="text" data-table="patient_an_registration" data-field="x_ANProfileINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->ANProfileINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->ANProfileINHOUSE->EditValue ?>"<?php echo $patient_an_registration->ANProfileINHOUSE->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileINHOUSE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileINHOUSE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->ANProfileINHOUSE->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_ANProfileINHOUSE" class="form-group patient_an_registration_ANProfileINHOUSE">
<input type="text" data-table="patient_an_registration" data-field="x_ANProfileINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->ANProfileINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->ANProfileINHOUSE->EditValue ?>"<?php echo $patient_an_registration->ANProfileINHOUSE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_ANProfileINHOUSE" class="patient_an_registration_ANProfileINHOUSE">
<span<?php echo $patient_an_registration->ANProfileINHOUSE->viewAttributes() ?>>
<?php echo $patient_an_registration->ANProfileINHOUSE->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->ANProfileINHOUSE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileINHOUSE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileINHOUSE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->ANProfileINHOUSE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileINHOUSE" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileINHOUSE" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->ANProfileINHOUSE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileINHOUSE" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileINHOUSE" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->ANProfileINHOUSE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->ANProfileREPORT->Visible) { // ANProfileREPORT ?>
		<td data-name="ANProfileREPORT"<?php echo $patient_an_registration->ANProfileREPORT->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_ANProfileREPORT" class="form-group patient_an_registration_ANProfileREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_ANProfileREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->ANProfileREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->ANProfileREPORT->EditValue ?>"<?php echo $patient_an_registration->ANProfileREPORT->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileREPORT" value="<?php echo HtmlEncode($patient_an_registration->ANProfileREPORT->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_ANProfileREPORT" class="form-group patient_an_registration_ANProfileREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_ANProfileREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->ANProfileREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->ANProfileREPORT->EditValue ?>"<?php echo $patient_an_registration->ANProfileREPORT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_ANProfileREPORT" class="patient_an_registration_ANProfileREPORT">
<span<?php echo $patient_an_registration->ANProfileREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->ANProfileREPORT->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileREPORT" value="<?php echo HtmlEncode($patient_an_registration->ANProfileREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileREPORT" value="<?php echo HtmlEncode($patient_an_registration->ANProfileREPORT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileREPORT" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileREPORT" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileREPORT" value="<?php echo HtmlEncode($patient_an_registration->ANProfileREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileREPORT" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileREPORT" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileREPORT" value="<?php echo HtmlEncode($patient_an_registration->ANProfileREPORT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->DualMarker->Visible) { // DualMarker ?>
		<td data-name="DualMarker"<?php echo $patient_an_registration->DualMarker->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_DualMarker" class="form-group patient_an_registration_DualMarker">
<input type="text" data-table="patient_an_registration" data-field="x_DualMarker" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarker" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarker" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->DualMarker->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->DualMarker->EditValue ?>"<?php echo $patient_an_registration->DualMarker->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarker" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarker" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarker" value="<?php echo HtmlEncode($patient_an_registration->DualMarker->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_DualMarker" class="form-group patient_an_registration_DualMarker">
<input type="text" data-table="patient_an_registration" data-field="x_DualMarker" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarker" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarker" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->DualMarker->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->DualMarker->EditValue ?>"<?php echo $patient_an_registration->DualMarker->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_DualMarker" class="patient_an_registration_DualMarker">
<span<?php echo $patient_an_registration->DualMarker->viewAttributes() ?>>
<?php echo $patient_an_registration->DualMarker->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarker" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarker" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarker" value="<?php echo HtmlEncode($patient_an_registration->DualMarker->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarker" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarker" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarker" value="<?php echo HtmlEncode($patient_an_registration->DualMarker->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarker" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarker" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarker" value="<?php echo HtmlEncode($patient_an_registration->DualMarker->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarker" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarker" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarker" value="<?php echo HtmlEncode($patient_an_registration->DualMarker->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->DualMarkerDATE->Visible) { // DualMarkerDATE ?>
		<td data-name="DualMarkerDATE"<?php echo $patient_an_registration->DualMarkerDATE->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_DualMarkerDATE" class="form-group patient_an_registration_DualMarkerDATE">
<input type="text" data-table="patient_an_registration" data-field="x_DualMarkerDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->DualMarkerDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->DualMarkerDATE->EditValue ?>"<?php echo $patient_an_registration->DualMarkerDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->DualMarkerDATE->ReadOnly && !$patient_an_registration->DualMarkerDATE->Disabled && !isset($patient_an_registration->DualMarkerDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->DualMarkerDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerDATE" value="<?php echo HtmlEncode($patient_an_registration->DualMarkerDATE->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_DualMarkerDATE" class="form-group patient_an_registration_DualMarkerDATE">
<input type="text" data-table="patient_an_registration" data-field="x_DualMarkerDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->DualMarkerDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->DualMarkerDATE->EditValue ?>"<?php echo $patient_an_registration->DualMarkerDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->DualMarkerDATE->ReadOnly && !$patient_an_registration->DualMarkerDATE->Disabled && !isset($patient_an_registration->DualMarkerDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->DualMarkerDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_DualMarkerDATE" class="patient_an_registration_DualMarkerDATE">
<span<?php echo $patient_an_registration->DualMarkerDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->DualMarkerDATE->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerDATE" value="<?php echo HtmlEncode($patient_an_registration->DualMarkerDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerDATE" value="<?php echo HtmlEncode($patient_an_registration->DualMarkerDATE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerDATE" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerDATE" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerDATE" value="<?php echo HtmlEncode($patient_an_registration->DualMarkerDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerDATE" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerDATE" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerDATE" value="<?php echo HtmlEncode($patient_an_registration->DualMarkerDATE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->DualMarkerINHOUSE->Visible) { // DualMarkerINHOUSE ?>
		<td data-name="DualMarkerINHOUSE"<?php echo $patient_an_registration->DualMarkerINHOUSE->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_DualMarkerINHOUSE" class="form-group patient_an_registration_DualMarkerINHOUSE">
<input type="text" data-table="patient_an_registration" data-field="x_DualMarkerINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->DualMarkerINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->DualMarkerINHOUSE->EditValue ?>"<?php echo $patient_an_registration->DualMarkerINHOUSE->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerINHOUSE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerINHOUSE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->DualMarkerINHOUSE->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_DualMarkerINHOUSE" class="form-group patient_an_registration_DualMarkerINHOUSE">
<input type="text" data-table="patient_an_registration" data-field="x_DualMarkerINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->DualMarkerINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->DualMarkerINHOUSE->EditValue ?>"<?php echo $patient_an_registration->DualMarkerINHOUSE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_DualMarkerINHOUSE" class="patient_an_registration_DualMarkerINHOUSE">
<span<?php echo $patient_an_registration->DualMarkerINHOUSE->viewAttributes() ?>>
<?php echo $patient_an_registration->DualMarkerINHOUSE->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->DualMarkerINHOUSE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerINHOUSE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerINHOUSE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->DualMarkerINHOUSE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerINHOUSE" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerINHOUSE" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->DualMarkerINHOUSE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerINHOUSE" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerINHOUSE" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->DualMarkerINHOUSE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->DualMarkerREPORT->Visible) { // DualMarkerREPORT ?>
		<td data-name="DualMarkerREPORT"<?php echo $patient_an_registration->DualMarkerREPORT->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_DualMarkerREPORT" class="form-group patient_an_registration_DualMarkerREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_DualMarkerREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->DualMarkerREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->DualMarkerREPORT->EditValue ?>"<?php echo $patient_an_registration->DualMarkerREPORT->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerREPORT" value="<?php echo HtmlEncode($patient_an_registration->DualMarkerREPORT->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_DualMarkerREPORT" class="form-group patient_an_registration_DualMarkerREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_DualMarkerREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->DualMarkerREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->DualMarkerREPORT->EditValue ?>"<?php echo $patient_an_registration->DualMarkerREPORT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_DualMarkerREPORT" class="patient_an_registration_DualMarkerREPORT">
<span<?php echo $patient_an_registration->DualMarkerREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->DualMarkerREPORT->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerREPORT" value="<?php echo HtmlEncode($patient_an_registration->DualMarkerREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerREPORT" value="<?php echo HtmlEncode($patient_an_registration->DualMarkerREPORT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerREPORT" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerREPORT" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerREPORT" value="<?php echo HtmlEncode($patient_an_registration->DualMarkerREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerREPORT" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerREPORT" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerREPORT" value="<?php echo HtmlEncode($patient_an_registration->DualMarkerREPORT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Quadruple->Visible) { // Quadruple ?>
		<td data-name="Quadruple"<?php echo $patient_an_registration->Quadruple->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Quadruple" class="form-group patient_an_registration_Quadruple">
<input type="text" data-table="patient_an_registration" data-field="x_Quadruple" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Quadruple" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Quadruple" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Quadruple->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Quadruple->EditValue ?>"<?php echo $patient_an_registration->Quadruple->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Quadruple" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Quadruple" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Quadruple" value="<?php echo HtmlEncode($patient_an_registration->Quadruple->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Quadruple" class="form-group patient_an_registration_Quadruple">
<input type="text" data-table="patient_an_registration" data-field="x_Quadruple" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Quadruple" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Quadruple" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Quadruple->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Quadruple->EditValue ?>"<?php echo $patient_an_registration->Quadruple->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Quadruple" class="patient_an_registration_Quadruple">
<span<?php echo $patient_an_registration->Quadruple->viewAttributes() ?>>
<?php echo $patient_an_registration->Quadruple->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Quadruple" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Quadruple" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Quadruple" value="<?php echo HtmlEncode($patient_an_registration->Quadruple->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Quadruple" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Quadruple" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Quadruple" value="<?php echo HtmlEncode($patient_an_registration->Quadruple->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Quadruple" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Quadruple" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Quadruple" value="<?php echo HtmlEncode($patient_an_registration->Quadruple->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Quadruple" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Quadruple" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Quadruple" value="<?php echo HtmlEncode($patient_an_registration->Quadruple->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->QuadrupleDATE->Visible) { // QuadrupleDATE ?>
		<td data-name="QuadrupleDATE"<?php echo $patient_an_registration->QuadrupleDATE->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_QuadrupleDATE" class="form-group patient_an_registration_QuadrupleDATE">
<input type="text" data-table="patient_an_registration" data-field="x_QuadrupleDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->QuadrupleDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->QuadrupleDATE->EditValue ?>"<?php echo $patient_an_registration->QuadrupleDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->QuadrupleDATE->ReadOnly && !$patient_an_registration->QuadrupleDATE->Disabled && !isset($patient_an_registration->QuadrupleDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->QuadrupleDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleDATE" value="<?php echo HtmlEncode($patient_an_registration->QuadrupleDATE->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_QuadrupleDATE" class="form-group patient_an_registration_QuadrupleDATE">
<input type="text" data-table="patient_an_registration" data-field="x_QuadrupleDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->QuadrupleDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->QuadrupleDATE->EditValue ?>"<?php echo $patient_an_registration->QuadrupleDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->QuadrupleDATE->ReadOnly && !$patient_an_registration->QuadrupleDATE->Disabled && !isset($patient_an_registration->QuadrupleDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->QuadrupleDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_QuadrupleDATE" class="patient_an_registration_QuadrupleDATE">
<span<?php echo $patient_an_registration->QuadrupleDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->QuadrupleDATE->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleDATE" value="<?php echo HtmlEncode($patient_an_registration->QuadrupleDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleDATE" value="<?php echo HtmlEncode($patient_an_registration->QuadrupleDATE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleDATE" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleDATE" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleDATE" value="<?php echo HtmlEncode($patient_an_registration->QuadrupleDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleDATE" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleDATE" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleDATE" value="<?php echo HtmlEncode($patient_an_registration->QuadrupleDATE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->QuadrupleINHOUSE->Visible) { // QuadrupleINHOUSE ?>
		<td data-name="QuadrupleINHOUSE"<?php echo $patient_an_registration->QuadrupleINHOUSE->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_QuadrupleINHOUSE" class="form-group patient_an_registration_QuadrupleINHOUSE">
<input type="text" data-table="patient_an_registration" data-field="x_QuadrupleINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->QuadrupleINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->QuadrupleINHOUSE->EditValue ?>"<?php echo $patient_an_registration->QuadrupleINHOUSE->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleINHOUSE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleINHOUSE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->QuadrupleINHOUSE->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_QuadrupleINHOUSE" class="form-group patient_an_registration_QuadrupleINHOUSE">
<input type="text" data-table="patient_an_registration" data-field="x_QuadrupleINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->QuadrupleINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->QuadrupleINHOUSE->EditValue ?>"<?php echo $patient_an_registration->QuadrupleINHOUSE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_QuadrupleINHOUSE" class="patient_an_registration_QuadrupleINHOUSE">
<span<?php echo $patient_an_registration->QuadrupleINHOUSE->viewAttributes() ?>>
<?php echo $patient_an_registration->QuadrupleINHOUSE->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->QuadrupleINHOUSE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleINHOUSE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleINHOUSE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->QuadrupleINHOUSE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleINHOUSE" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleINHOUSE" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->QuadrupleINHOUSE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleINHOUSE" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleINHOUSE" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->QuadrupleINHOUSE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->QuadrupleREPORT->Visible) { // QuadrupleREPORT ?>
		<td data-name="QuadrupleREPORT"<?php echo $patient_an_registration->QuadrupleREPORT->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_QuadrupleREPORT" class="form-group patient_an_registration_QuadrupleREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_QuadrupleREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->QuadrupleREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->QuadrupleREPORT->EditValue ?>"<?php echo $patient_an_registration->QuadrupleREPORT->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleREPORT" value="<?php echo HtmlEncode($patient_an_registration->QuadrupleREPORT->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_QuadrupleREPORT" class="form-group patient_an_registration_QuadrupleREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_QuadrupleREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->QuadrupleREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->QuadrupleREPORT->EditValue ?>"<?php echo $patient_an_registration->QuadrupleREPORT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_QuadrupleREPORT" class="patient_an_registration_QuadrupleREPORT">
<span<?php echo $patient_an_registration->QuadrupleREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->QuadrupleREPORT->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleREPORT" value="<?php echo HtmlEncode($patient_an_registration->QuadrupleREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleREPORT" value="<?php echo HtmlEncode($patient_an_registration->QuadrupleREPORT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleREPORT" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleREPORT" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleREPORT" value="<?php echo HtmlEncode($patient_an_registration->QuadrupleREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleREPORT" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleREPORT" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleREPORT" value="<?php echo HtmlEncode($patient_an_registration->QuadrupleREPORT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->A5month->Visible) { // A5month ?>
		<td data-name="A5month"<?php echo $patient_an_registration->A5month->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_A5month" class="form-group patient_an_registration_A5month">
<input type="text" data-table="patient_an_registration" data-field="x_A5month" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5month" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5month" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A5month->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A5month->EditValue ?>"<?php echo $patient_an_registration->A5month->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5month" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A5month" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A5month" value="<?php echo HtmlEncode($patient_an_registration->A5month->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_A5month" class="form-group patient_an_registration_A5month">
<input type="text" data-table="patient_an_registration" data-field="x_A5month" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5month" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5month" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A5month->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A5month->EditValue ?>"<?php echo $patient_an_registration->A5month->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_A5month" class="patient_an_registration_A5month">
<span<?php echo $patient_an_registration->A5month->viewAttributes() ?>>
<?php echo $patient_an_registration->A5month->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5month" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5month" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5month" value="<?php echo HtmlEncode($patient_an_registration->A5month->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A5month" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A5month" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A5month" value="<?php echo HtmlEncode($patient_an_registration->A5month->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5month" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A5month" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A5month" value="<?php echo HtmlEncode($patient_an_registration->A5month->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A5month" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A5month" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A5month" value="<?php echo HtmlEncode($patient_an_registration->A5month->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->A5monthDATE->Visible) { // A5monthDATE ?>
		<td data-name="A5monthDATE"<?php echo $patient_an_registration->A5monthDATE->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_A5monthDATE" class="form-group patient_an_registration_A5monthDATE">
<input type="text" data-table="patient_an_registration" data-field="x_A5monthDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A5monthDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A5monthDATE->EditValue ?>"<?php echo $patient_an_registration->A5monthDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->A5monthDATE->ReadOnly && !$patient_an_registration->A5monthDATE->Disabled && !isset($patient_an_registration->A5monthDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->A5monthDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthDATE" value="<?php echo HtmlEncode($patient_an_registration->A5monthDATE->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_A5monthDATE" class="form-group patient_an_registration_A5monthDATE">
<input type="text" data-table="patient_an_registration" data-field="x_A5monthDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A5monthDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A5monthDATE->EditValue ?>"<?php echo $patient_an_registration->A5monthDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->A5monthDATE->ReadOnly && !$patient_an_registration->A5monthDATE->Disabled && !isset($patient_an_registration->A5monthDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->A5monthDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_A5monthDATE" class="patient_an_registration_A5monthDATE">
<span<?php echo $patient_an_registration->A5monthDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->A5monthDATE->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthDATE" value="<?php echo HtmlEncode($patient_an_registration->A5monthDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthDATE" value="<?php echo HtmlEncode($patient_an_registration->A5monthDATE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthDATE" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthDATE" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthDATE" value="<?php echo HtmlEncode($patient_an_registration->A5monthDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthDATE" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthDATE" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthDATE" value="<?php echo HtmlEncode($patient_an_registration->A5monthDATE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->A5monthINHOUSE->Visible) { // A5monthINHOUSE ?>
		<td data-name="A5monthINHOUSE"<?php echo $patient_an_registration->A5monthINHOUSE->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_A5monthINHOUSE" class="form-group patient_an_registration_A5monthINHOUSE">
<input type="text" data-table="patient_an_registration" data-field="x_A5monthINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A5monthINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A5monthINHOUSE->EditValue ?>"<?php echo $patient_an_registration->A5monthINHOUSE->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthINHOUSE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthINHOUSE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->A5monthINHOUSE->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_A5monthINHOUSE" class="form-group patient_an_registration_A5monthINHOUSE">
<input type="text" data-table="patient_an_registration" data-field="x_A5monthINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A5monthINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A5monthINHOUSE->EditValue ?>"<?php echo $patient_an_registration->A5monthINHOUSE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_A5monthINHOUSE" class="patient_an_registration_A5monthINHOUSE">
<span<?php echo $patient_an_registration->A5monthINHOUSE->viewAttributes() ?>>
<?php echo $patient_an_registration->A5monthINHOUSE->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->A5monthINHOUSE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthINHOUSE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthINHOUSE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->A5monthINHOUSE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthINHOUSE" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthINHOUSE" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->A5monthINHOUSE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthINHOUSE" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthINHOUSE" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->A5monthINHOUSE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->A5monthREPORT->Visible) { // A5monthREPORT ?>
		<td data-name="A5monthREPORT"<?php echo $patient_an_registration->A5monthREPORT->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_A5monthREPORT" class="form-group patient_an_registration_A5monthREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_A5monthREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A5monthREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A5monthREPORT->EditValue ?>"<?php echo $patient_an_registration->A5monthREPORT->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthREPORT" value="<?php echo HtmlEncode($patient_an_registration->A5monthREPORT->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_A5monthREPORT" class="form-group patient_an_registration_A5monthREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_A5monthREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A5monthREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A5monthREPORT->EditValue ?>"<?php echo $patient_an_registration->A5monthREPORT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_A5monthREPORT" class="patient_an_registration_A5monthREPORT">
<span<?php echo $patient_an_registration->A5monthREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->A5monthREPORT->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthREPORT" value="<?php echo HtmlEncode($patient_an_registration->A5monthREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthREPORT" value="<?php echo HtmlEncode($patient_an_registration->A5monthREPORT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthREPORT" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthREPORT" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthREPORT" value="<?php echo HtmlEncode($patient_an_registration->A5monthREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthREPORT" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthREPORT" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthREPORT" value="<?php echo HtmlEncode($patient_an_registration->A5monthREPORT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->A7month->Visible) { // A7month ?>
		<td data-name="A7month"<?php echo $patient_an_registration->A7month->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_A7month" class="form-group patient_an_registration_A7month">
<input type="text" data-table="patient_an_registration" data-field="x_A7month" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7month" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7month" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A7month->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A7month->EditValue ?>"<?php echo $patient_an_registration->A7month->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7month" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A7month" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A7month" value="<?php echo HtmlEncode($patient_an_registration->A7month->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_A7month" class="form-group patient_an_registration_A7month">
<input type="text" data-table="patient_an_registration" data-field="x_A7month" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7month" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7month" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A7month->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A7month->EditValue ?>"<?php echo $patient_an_registration->A7month->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_A7month" class="patient_an_registration_A7month">
<span<?php echo $patient_an_registration->A7month->viewAttributes() ?>>
<?php echo $patient_an_registration->A7month->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7month" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7month" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7month" value="<?php echo HtmlEncode($patient_an_registration->A7month->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A7month" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A7month" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A7month" value="<?php echo HtmlEncode($patient_an_registration->A7month->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7month" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A7month" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A7month" value="<?php echo HtmlEncode($patient_an_registration->A7month->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A7month" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A7month" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A7month" value="<?php echo HtmlEncode($patient_an_registration->A7month->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->A7monthDATE->Visible) { // A7monthDATE ?>
		<td data-name="A7monthDATE"<?php echo $patient_an_registration->A7monthDATE->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_A7monthDATE" class="form-group patient_an_registration_A7monthDATE">
<input type="text" data-table="patient_an_registration" data-field="x_A7monthDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A7monthDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A7monthDATE->EditValue ?>"<?php echo $patient_an_registration->A7monthDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->A7monthDATE->ReadOnly && !$patient_an_registration->A7monthDATE->Disabled && !isset($patient_an_registration->A7monthDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->A7monthDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthDATE" value="<?php echo HtmlEncode($patient_an_registration->A7monthDATE->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_A7monthDATE" class="form-group patient_an_registration_A7monthDATE">
<input type="text" data-table="patient_an_registration" data-field="x_A7monthDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A7monthDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A7monthDATE->EditValue ?>"<?php echo $patient_an_registration->A7monthDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->A7monthDATE->ReadOnly && !$patient_an_registration->A7monthDATE->Disabled && !isset($patient_an_registration->A7monthDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->A7monthDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_A7monthDATE" class="patient_an_registration_A7monthDATE">
<span<?php echo $patient_an_registration->A7monthDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->A7monthDATE->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthDATE" value="<?php echo HtmlEncode($patient_an_registration->A7monthDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthDATE" value="<?php echo HtmlEncode($patient_an_registration->A7monthDATE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthDATE" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthDATE" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthDATE" value="<?php echo HtmlEncode($patient_an_registration->A7monthDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthDATE" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthDATE" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthDATE" value="<?php echo HtmlEncode($patient_an_registration->A7monthDATE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->A7monthINHOUSE->Visible) { // A7monthINHOUSE ?>
		<td data-name="A7monthINHOUSE"<?php echo $patient_an_registration->A7monthINHOUSE->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_A7monthINHOUSE" class="form-group patient_an_registration_A7monthINHOUSE">
<input type="text" data-table="patient_an_registration" data-field="x_A7monthINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A7monthINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A7monthINHOUSE->EditValue ?>"<?php echo $patient_an_registration->A7monthINHOUSE->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthINHOUSE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthINHOUSE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->A7monthINHOUSE->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_A7monthINHOUSE" class="form-group patient_an_registration_A7monthINHOUSE">
<input type="text" data-table="patient_an_registration" data-field="x_A7monthINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A7monthINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A7monthINHOUSE->EditValue ?>"<?php echo $patient_an_registration->A7monthINHOUSE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_A7monthINHOUSE" class="patient_an_registration_A7monthINHOUSE">
<span<?php echo $patient_an_registration->A7monthINHOUSE->viewAttributes() ?>>
<?php echo $patient_an_registration->A7monthINHOUSE->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->A7monthINHOUSE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthINHOUSE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthINHOUSE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->A7monthINHOUSE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthINHOUSE" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthINHOUSE" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->A7monthINHOUSE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthINHOUSE" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthINHOUSE" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->A7monthINHOUSE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->A7monthREPORT->Visible) { // A7monthREPORT ?>
		<td data-name="A7monthREPORT"<?php echo $patient_an_registration->A7monthREPORT->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_A7monthREPORT" class="form-group patient_an_registration_A7monthREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_A7monthREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A7monthREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A7monthREPORT->EditValue ?>"<?php echo $patient_an_registration->A7monthREPORT->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthREPORT" value="<?php echo HtmlEncode($patient_an_registration->A7monthREPORT->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_A7monthREPORT" class="form-group patient_an_registration_A7monthREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_A7monthREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A7monthREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A7monthREPORT->EditValue ?>"<?php echo $patient_an_registration->A7monthREPORT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_A7monthREPORT" class="patient_an_registration_A7monthREPORT">
<span<?php echo $patient_an_registration->A7monthREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->A7monthREPORT->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthREPORT" value="<?php echo HtmlEncode($patient_an_registration->A7monthREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthREPORT" value="<?php echo HtmlEncode($patient_an_registration->A7monthREPORT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthREPORT" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthREPORT" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthREPORT" value="<?php echo HtmlEncode($patient_an_registration->A7monthREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthREPORT" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthREPORT" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthREPORT" value="<?php echo HtmlEncode($patient_an_registration->A7monthREPORT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->A9month->Visible) { // A9month ?>
		<td data-name="A9month"<?php echo $patient_an_registration->A9month->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_A9month" class="form-group patient_an_registration_A9month">
<input type="text" data-table="patient_an_registration" data-field="x_A9month" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9month" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9month" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A9month->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A9month->EditValue ?>"<?php echo $patient_an_registration->A9month->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9month" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A9month" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A9month" value="<?php echo HtmlEncode($patient_an_registration->A9month->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_A9month" class="form-group patient_an_registration_A9month">
<input type="text" data-table="patient_an_registration" data-field="x_A9month" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9month" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9month" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A9month->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A9month->EditValue ?>"<?php echo $patient_an_registration->A9month->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_A9month" class="patient_an_registration_A9month">
<span<?php echo $patient_an_registration->A9month->viewAttributes() ?>>
<?php echo $patient_an_registration->A9month->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9month" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9month" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9month" value="<?php echo HtmlEncode($patient_an_registration->A9month->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A9month" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A9month" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A9month" value="<?php echo HtmlEncode($patient_an_registration->A9month->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9month" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A9month" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A9month" value="<?php echo HtmlEncode($patient_an_registration->A9month->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A9month" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A9month" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A9month" value="<?php echo HtmlEncode($patient_an_registration->A9month->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->A9monthDATE->Visible) { // A9monthDATE ?>
		<td data-name="A9monthDATE"<?php echo $patient_an_registration->A9monthDATE->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_A9monthDATE" class="form-group patient_an_registration_A9monthDATE">
<input type="text" data-table="patient_an_registration" data-field="x_A9monthDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A9monthDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A9monthDATE->EditValue ?>"<?php echo $patient_an_registration->A9monthDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->A9monthDATE->ReadOnly && !$patient_an_registration->A9monthDATE->Disabled && !isset($patient_an_registration->A9monthDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->A9monthDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthDATE" value="<?php echo HtmlEncode($patient_an_registration->A9monthDATE->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_A9monthDATE" class="form-group patient_an_registration_A9monthDATE">
<input type="text" data-table="patient_an_registration" data-field="x_A9monthDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A9monthDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A9monthDATE->EditValue ?>"<?php echo $patient_an_registration->A9monthDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->A9monthDATE->ReadOnly && !$patient_an_registration->A9monthDATE->Disabled && !isset($patient_an_registration->A9monthDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->A9monthDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_A9monthDATE" class="patient_an_registration_A9monthDATE">
<span<?php echo $patient_an_registration->A9monthDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->A9monthDATE->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthDATE" value="<?php echo HtmlEncode($patient_an_registration->A9monthDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthDATE" value="<?php echo HtmlEncode($patient_an_registration->A9monthDATE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthDATE" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthDATE" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthDATE" value="<?php echo HtmlEncode($patient_an_registration->A9monthDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthDATE" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthDATE" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthDATE" value="<?php echo HtmlEncode($patient_an_registration->A9monthDATE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->A9monthINHOUSE->Visible) { // A9monthINHOUSE ?>
		<td data-name="A9monthINHOUSE"<?php echo $patient_an_registration->A9monthINHOUSE->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_A9monthINHOUSE" class="form-group patient_an_registration_A9monthINHOUSE">
<input type="text" data-table="patient_an_registration" data-field="x_A9monthINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A9monthINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A9monthINHOUSE->EditValue ?>"<?php echo $patient_an_registration->A9monthINHOUSE->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthINHOUSE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthINHOUSE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->A9monthINHOUSE->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_A9monthINHOUSE" class="form-group patient_an_registration_A9monthINHOUSE">
<input type="text" data-table="patient_an_registration" data-field="x_A9monthINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A9monthINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A9monthINHOUSE->EditValue ?>"<?php echo $patient_an_registration->A9monthINHOUSE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_A9monthINHOUSE" class="patient_an_registration_A9monthINHOUSE">
<span<?php echo $patient_an_registration->A9monthINHOUSE->viewAttributes() ?>>
<?php echo $patient_an_registration->A9monthINHOUSE->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->A9monthINHOUSE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthINHOUSE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthINHOUSE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->A9monthINHOUSE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthINHOUSE" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthINHOUSE" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->A9monthINHOUSE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthINHOUSE" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthINHOUSE" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->A9monthINHOUSE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->A9monthREPORT->Visible) { // A9monthREPORT ?>
		<td data-name="A9monthREPORT"<?php echo $patient_an_registration->A9monthREPORT->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_A9monthREPORT" class="form-group patient_an_registration_A9monthREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_A9monthREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A9monthREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A9monthREPORT->EditValue ?>"<?php echo $patient_an_registration->A9monthREPORT->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthREPORT" value="<?php echo HtmlEncode($patient_an_registration->A9monthREPORT->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_A9monthREPORT" class="form-group patient_an_registration_A9monthREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_A9monthREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A9monthREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A9monthREPORT->EditValue ?>"<?php echo $patient_an_registration->A9monthREPORT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_A9monthREPORT" class="patient_an_registration_A9monthREPORT">
<span<?php echo $patient_an_registration->A9monthREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->A9monthREPORT->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthREPORT" value="<?php echo HtmlEncode($patient_an_registration->A9monthREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthREPORT" value="<?php echo HtmlEncode($patient_an_registration->A9monthREPORT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthREPORT" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthREPORT" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthREPORT" value="<?php echo HtmlEncode($patient_an_registration->A9monthREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthREPORT" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthREPORT" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthREPORT" value="<?php echo HtmlEncode($patient_an_registration->A9monthREPORT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->INJ->Visible) { // INJ ?>
		<td data-name="INJ"<?php echo $patient_an_registration->INJ->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_INJ" class="form-group patient_an_registration_INJ">
<input type="text" data-table="patient_an_registration" data-field="x_INJ" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJ" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJ" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->INJ->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->INJ->EditValue ?>"<?php echo $patient_an_registration->INJ->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJ" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_INJ" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_INJ" value="<?php echo HtmlEncode($patient_an_registration->INJ->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_INJ" class="form-group patient_an_registration_INJ">
<input type="text" data-table="patient_an_registration" data-field="x_INJ" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJ" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJ" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->INJ->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->INJ->EditValue ?>"<?php echo $patient_an_registration->INJ->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_INJ" class="patient_an_registration_INJ">
<span<?php echo $patient_an_registration->INJ->viewAttributes() ?>>
<?php echo $patient_an_registration->INJ->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJ" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJ" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJ" value="<?php echo HtmlEncode($patient_an_registration->INJ->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_INJ" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_INJ" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_INJ" value="<?php echo HtmlEncode($patient_an_registration->INJ->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJ" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_INJ" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_INJ" value="<?php echo HtmlEncode($patient_an_registration->INJ->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_INJ" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_INJ" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_INJ" value="<?php echo HtmlEncode($patient_an_registration->INJ->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->INJDATE->Visible) { // INJDATE ?>
		<td data-name="INJDATE"<?php echo $patient_an_registration->INJDATE->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_INJDATE" class="form-group patient_an_registration_INJDATE">
<input type="text" data-table="patient_an_registration" data-field="x_INJDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->INJDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->INJDATE->EditValue ?>"<?php echo $patient_an_registration->INJDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->INJDATE->ReadOnly && !$patient_an_registration->INJDATE->Disabled && !isset($patient_an_registration->INJDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->INJDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_INJDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_INJDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_INJDATE" value="<?php echo HtmlEncode($patient_an_registration->INJDATE->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_INJDATE" class="form-group patient_an_registration_INJDATE">
<input type="text" data-table="patient_an_registration" data-field="x_INJDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->INJDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->INJDATE->EditValue ?>"<?php echo $patient_an_registration->INJDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->INJDATE->ReadOnly && !$patient_an_registration->INJDATE->Disabled && !isset($patient_an_registration->INJDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->INJDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_INJDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_INJDATE" class="patient_an_registration_INJDATE">
<span<?php echo $patient_an_registration->INJDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->INJDATE->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJDATE" value="<?php echo HtmlEncode($patient_an_registration->INJDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_INJDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_INJDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_INJDATE" value="<?php echo HtmlEncode($patient_an_registration->INJDATE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJDATE" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_INJDATE" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_INJDATE" value="<?php echo HtmlEncode($patient_an_registration->INJDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_INJDATE" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_INJDATE" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_INJDATE" value="<?php echo HtmlEncode($patient_an_registration->INJDATE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->INJINHOUSE->Visible) { // INJINHOUSE ?>
		<td data-name="INJINHOUSE"<?php echo $patient_an_registration->INJINHOUSE->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_INJINHOUSE" class="form-group patient_an_registration_INJINHOUSE">
<input type="text" data-table="patient_an_registration" data-field="x_INJINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->INJINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->INJINHOUSE->EditValue ?>"<?php echo $patient_an_registration->INJINHOUSE->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJINHOUSE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_INJINHOUSE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_INJINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->INJINHOUSE->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_INJINHOUSE" class="form-group patient_an_registration_INJINHOUSE">
<input type="text" data-table="patient_an_registration" data-field="x_INJINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->INJINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->INJINHOUSE->EditValue ?>"<?php echo $patient_an_registration->INJINHOUSE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_INJINHOUSE" class="patient_an_registration_INJINHOUSE">
<span<?php echo $patient_an_registration->INJINHOUSE->viewAttributes() ?>>
<?php echo $patient_an_registration->INJINHOUSE->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->INJINHOUSE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_INJINHOUSE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_INJINHOUSE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_INJINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->INJINHOUSE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJINHOUSE" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_INJINHOUSE" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_INJINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->INJINHOUSE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_INJINHOUSE" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_INJINHOUSE" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_INJINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->INJINHOUSE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->INJREPORT->Visible) { // INJREPORT ?>
		<td data-name="INJREPORT"<?php echo $patient_an_registration->INJREPORT->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_INJREPORT" class="form-group patient_an_registration_INJREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_INJREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->INJREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->INJREPORT->EditValue ?>"<?php echo $patient_an_registration->INJREPORT->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_INJREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_INJREPORT" value="<?php echo HtmlEncode($patient_an_registration->INJREPORT->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_INJREPORT" class="form-group patient_an_registration_INJREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_INJREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->INJREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->INJREPORT->EditValue ?>"<?php echo $patient_an_registration->INJREPORT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_INJREPORT" class="patient_an_registration_INJREPORT">
<span<?php echo $patient_an_registration->INJREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->INJREPORT->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJREPORT" value="<?php echo HtmlEncode($patient_an_registration->INJREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_INJREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_INJREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_INJREPORT" value="<?php echo HtmlEncode($patient_an_registration->INJREPORT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJREPORT" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_INJREPORT" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_INJREPORT" value="<?php echo HtmlEncode($patient_an_registration->INJREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_INJREPORT" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_INJREPORT" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_INJREPORT" value="<?php echo HtmlEncode($patient_an_registration->INJREPORT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Bleeding->Visible) { // Bleeding ?>
		<td data-name="Bleeding"<?php echo $patient_an_registration->Bleeding->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Bleeding" class="form-group patient_an_registration_Bleeding">
<div id="tp_x<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_an_registration" data-field="x_Bleeding" data-value-separator="<?php echo $patient_an_registration->Bleeding->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding[]" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding[]" value="{value}"<?php echo $patient_an_registration->Bleeding->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_an_registration->Bleeding->checkBoxListHtml(FALSE, "x{$patient_an_registration_grid->RowIndex}_Bleeding[]") ?>
</div></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Bleeding" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding[]" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding[]" value="<?php echo HtmlEncode($patient_an_registration->Bleeding->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Bleeding" class="form-group patient_an_registration_Bleeding">
<div id="tp_x<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_an_registration" data-field="x_Bleeding" data-value-separator="<?php echo $patient_an_registration->Bleeding->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding[]" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding[]" value="{value}"<?php echo $patient_an_registration->Bleeding->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_an_registration->Bleeding->checkBoxListHtml(FALSE, "x{$patient_an_registration_grid->RowIndex}_Bleeding[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Bleeding" class="patient_an_registration_Bleeding">
<span<?php echo $patient_an_registration->Bleeding->viewAttributes() ?>>
<?php echo $patient_an_registration->Bleeding->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Bleeding" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding" value="<?php echo HtmlEncode($patient_an_registration->Bleeding->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Bleeding" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding[]" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding[]" value="<?php echo HtmlEncode($patient_an_registration->Bleeding->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Bleeding" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding" value="<?php echo HtmlEncode($patient_an_registration->Bleeding->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Bleeding" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding[]" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding[]" value="<?php echo HtmlEncode($patient_an_registration->Bleeding->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Hypothyroidism->Visible) { // Hypothyroidism ?>
		<td data-name="Hypothyroidism"<?php echo $patient_an_registration->Hypothyroidism->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Hypothyroidism" class="form-group patient_an_registration_Hypothyroidism">
<input type="text" data-table="patient_an_registration" data-field="x_Hypothyroidism" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Hypothyroidism" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Hypothyroidism" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Hypothyroidism->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Hypothyroidism->EditValue ?>"<?php echo $patient_an_registration->Hypothyroidism->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Hypothyroidism" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Hypothyroidism" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Hypothyroidism" value="<?php echo HtmlEncode($patient_an_registration->Hypothyroidism->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Hypothyroidism" class="form-group patient_an_registration_Hypothyroidism">
<input type="text" data-table="patient_an_registration" data-field="x_Hypothyroidism" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Hypothyroidism" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Hypothyroidism" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Hypothyroidism->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Hypothyroidism->EditValue ?>"<?php echo $patient_an_registration->Hypothyroidism->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Hypothyroidism" class="patient_an_registration_Hypothyroidism">
<span<?php echo $patient_an_registration->Hypothyroidism->viewAttributes() ?>>
<?php echo $patient_an_registration->Hypothyroidism->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Hypothyroidism" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Hypothyroidism" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Hypothyroidism" value="<?php echo HtmlEncode($patient_an_registration->Hypothyroidism->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Hypothyroidism" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Hypothyroidism" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Hypothyroidism" value="<?php echo HtmlEncode($patient_an_registration->Hypothyroidism->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Hypothyroidism" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Hypothyroidism" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Hypothyroidism" value="<?php echo HtmlEncode($patient_an_registration->Hypothyroidism->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Hypothyroidism" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Hypothyroidism" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Hypothyroidism" value="<?php echo HtmlEncode($patient_an_registration->Hypothyroidism->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->PICMENumber->Visible) { // PICMENumber ?>
		<td data-name="PICMENumber"<?php echo $patient_an_registration->PICMENumber->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_PICMENumber" class="form-group patient_an_registration_PICMENumber">
<input type="text" data-table="patient_an_registration" data-field="x_PICMENumber" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PICMENumber" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PICMENumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->PICMENumber->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->PICMENumber->EditValue ?>"<?php echo $patient_an_registration->PICMENumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PICMENumber" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PICMENumber" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PICMENumber" value="<?php echo HtmlEncode($patient_an_registration->PICMENumber->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_PICMENumber" class="form-group patient_an_registration_PICMENumber">
<input type="text" data-table="patient_an_registration" data-field="x_PICMENumber" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PICMENumber" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PICMENumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->PICMENumber->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->PICMENumber->EditValue ?>"<?php echo $patient_an_registration->PICMENumber->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_PICMENumber" class="patient_an_registration_PICMENumber">
<span<?php echo $patient_an_registration->PICMENumber->viewAttributes() ?>>
<?php echo $patient_an_registration->PICMENumber->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PICMENumber" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PICMENumber" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PICMENumber" value="<?php echo HtmlEncode($patient_an_registration->PICMENumber->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PICMENumber" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PICMENumber" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PICMENumber" value="<?php echo HtmlEncode($patient_an_registration->PICMENumber->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PICMENumber" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_PICMENumber" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_PICMENumber" value="<?php echo HtmlEncode($patient_an_registration->PICMENumber->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PICMENumber" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_PICMENumber" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_PICMENumber" value="<?php echo HtmlEncode($patient_an_registration->PICMENumber->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Outcome->Visible) { // Outcome ?>
		<td data-name="Outcome"<?php echo $patient_an_registration->Outcome->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Outcome" class="form-group patient_an_registration_Outcome">
<input type="text" data-table="patient_an_registration" data-field="x_Outcome" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Outcome" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Outcome" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Outcome->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Outcome->EditValue ?>"<?php echo $patient_an_registration->Outcome->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Outcome" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Outcome" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Outcome" value="<?php echo HtmlEncode($patient_an_registration->Outcome->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Outcome" class="form-group patient_an_registration_Outcome">
<input type="text" data-table="patient_an_registration" data-field="x_Outcome" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Outcome" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Outcome" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Outcome->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Outcome->EditValue ?>"<?php echo $patient_an_registration->Outcome->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Outcome" class="patient_an_registration_Outcome">
<span<?php echo $patient_an_registration->Outcome->viewAttributes() ?>>
<?php echo $patient_an_registration->Outcome->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Outcome" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Outcome" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Outcome" value="<?php echo HtmlEncode($patient_an_registration->Outcome->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Outcome" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Outcome" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Outcome" value="<?php echo HtmlEncode($patient_an_registration->Outcome->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Outcome" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Outcome" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Outcome" value="<?php echo HtmlEncode($patient_an_registration->Outcome->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Outcome" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Outcome" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Outcome" value="<?php echo HtmlEncode($patient_an_registration->Outcome->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->DateofAdmission->Visible) { // DateofAdmission ?>
		<td data-name="DateofAdmission"<?php echo $patient_an_registration->DateofAdmission->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_DateofAdmission" class="form-group patient_an_registration_DateofAdmission">
<input type="text" data-table="patient_an_registration" data-field="x_DateofAdmission" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DateofAdmission" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DateofAdmission" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->DateofAdmission->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->DateofAdmission->EditValue ?>"<?php echo $patient_an_registration->DateofAdmission->editAttributes() ?>>
<?php if (!$patient_an_registration->DateofAdmission->ReadOnly && !$patient_an_registration->DateofAdmission->Disabled && !isset($patient_an_registration->DateofAdmission->EditAttrs["readonly"]) && !isset($patient_an_registration->DateofAdmission->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_DateofAdmission", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DateofAdmission" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DateofAdmission" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DateofAdmission" value="<?php echo HtmlEncode($patient_an_registration->DateofAdmission->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_DateofAdmission" class="form-group patient_an_registration_DateofAdmission">
<input type="text" data-table="patient_an_registration" data-field="x_DateofAdmission" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DateofAdmission" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DateofAdmission" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->DateofAdmission->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->DateofAdmission->EditValue ?>"<?php echo $patient_an_registration->DateofAdmission->editAttributes() ?>>
<?php if (!$patient_an_registration->DateofAdmission->ReadOnly && !$patient_an_registration->DateofAdmission->Disabled && !isset($patient_an_registration->DateofAdmission->EditAttrs["readonly"]) && !isset($patient_an_registration->DateofAdmission->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_DateofAdmission", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_DateofAdmission" class="patient_an_registration_DateofAdmission">
<span<?php echo $patient_an_registration->DateofAdmission->viewAttributes() ?>>
<?php echo $patient_an_registration->DateofAdmission->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DateofAdmission" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DateofAdmission" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DateofAdmission" value="<?php echo HtmlEncode($patient_an_registration->DateofAdmission->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_DateofAdmission" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DateofAdmission" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DateofAdmission" value="<?php echo HtmlEncode($patient_an_registration->DateofAdmission->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DateofAdmission" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_DateofAdmission" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_DateofAdmission" value="<?php echo HtmlEncode($patient_an_registration->DateofAdmission->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_DateofAdmission" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_DateofAdmission" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_DateofAdmission" value="<?php echo HtmlEncode($patient_an_registration->DateofAdmission->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->DateodProcedure->Visible) { // DateodProcedure ?>
		<td data-name="DateodProcedure"<?php echo $patient_an_registration->DateodProcedure->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_DateodProcedure" class="form-group patient_an_registration_DateodProcedure">
<input type="text" data-table="patient_an_registration" data-field="x_DateodProcedure" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DateodProcedure" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DateodProcedure" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->DateodProcedure->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->DateodProcedure->EditValue ?>"<?php echo $patient_an_registration->DateodProcedure->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DateodProcedure" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DateodProcedure" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DateodProcedure" value="<?php echo HtmlEncode($patient_an_registration->DateodProcedure->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_DateodProcedure" class="form-group patient_an_registration_DateodProcedure">
<input type="text" data-table="patient_an_registration" data-field="x_DateodProcedure" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DateodProcedure" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DateodProcedure" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->DateodProcedure->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->DateodProcedure->EditValue ?>"<?php echo $patient_an_registration->DateodProcedure->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_DateodProcedure" class="patient_an_registration_DateodProcedure">
<span<?php echo $patient_an_registration->DateodProcedure->viewAttributes() ?>>
<?php echo $patient_an_registration->DateodProcedure->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DateodProcedure" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DateodProcedure" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DateodProcedure" value="<?php echo HtmlEncode($patient_an_registration->DateodProcedure->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_DateodProcedure" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DateodProcedure" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DateodProcedure" value="<?php echo HtmlEncode($patient_an_registration->DateodProcedure->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DateodProcedure" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_DateodProcedure" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_DateodProcedure" value="<?php echo HtmlEncode($patient_an_registration->DateodProcedure->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_DateodProcedure" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_DateodProcedure" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_DateodProcedure" value="<?php echo HtmlEncode($patient_an_registration->DateodProcedure->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Miscarriage->Visible) { // Miscarriage ?>
		<td data-name="Miscarriage"<?php echo $patient_an_registration->Miscarriage->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Miscarriage" class="form-group patient_an_registration_Miscarriage">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_Miscarriage" data-value-separator="<?php echo $patient_an_registration->Miscarriage->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Miscarriage" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Miscarriage"<?php echo $patient_an_registration->Miscarriage->editAttributes() ?>>
		<?php echo $patient_an_registration->Miscarriage->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_Miscarriage") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Miscarriage" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Miscarriage" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Miscarriage" value="<?php echo HtmlEncode($patient_an_registration->Miscarriage->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Miscarriage" class="form-group patient_an_registration_Miscarriage">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_Miscarriage" data-value-separator="<?php echo $patient_an_registration->Miscarriage->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Miscarriage" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Miscarriage"<?php echo $patient_an_registration->Miscarriage->editAttributes() ?>>
		<?php echo $patient_an_registration->Miscarriage->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_Miscarriage") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Miscarriage" class="patient_an_registration_Miscarriage">
<span<?php echo $patient_an_registration->Miscarriage->viewAttributes() ?>>
<?php echo $patient_an_registration->Miscarriage->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Miscarriage" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Miscarriage" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Miscarriage" value="<?php echo HtmlEncode($patient_an_registration->Miscarriage->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Miscarriage" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Miscarriage" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Miscarriage" value="<?php echo HtmlEncode($patient_an_registration->Miscarriage->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Miscarriage" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Miscarriage" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Miscarriage" value="<?php echo HtmlEncode($patient_an_registration->Miscarriage->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Miscarriage" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Miscarriage" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Miscarriage" value="<?php echo HtmlEncode($patient_an_registration->Miscarriage->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->ModeOfDelivery->Visible) { // ModeOfDelivery ?>
		<td data-name="ModeOfDelivery"<?php echo $patient_an_registration->ModeOfDelivery->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_ModeOfDelivery" class="form-group patient_an_registration_ModeOfDelivery">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_ModeOfDelivery" data-value-separator="<?php echo $patient_an_registration->ModeOfDelivery->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ModeOfDelivery" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ModeOfDelivery"<?php echo $patient_an_registration->ModeOfDelivery->editAttributes() ?>>
		<?php echo $patient_an_registration->ModeOfDelivery->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_ModeOfDelivery") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ModeOfDelivery" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ModeOfDelivery" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ModeOfDelivery" value="<?php echo HtmlEncode($patient_an_registration->ModeOfDelivery->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_ModeOfDelivery" class="form-group patient_an_registration_ModeOfDelivery">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_ModeOfDelivery" data-value-separator="<?php echo $patient_an_registration->ModeOfDelivery->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ModeOfDelivery" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ModeOfDelivery"<?php echo $patient_an_registration->ModeOfDelivery->editAttributes() ?>>
		<?php echo $patient_an_registration->ModeOfDelivery->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_ModeOfDelivery") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_ModeOfDelivery" class="patient_an_registration_ModeOfDelivery">
<span<?php echo $patient_an_registration->ModeOfDelivery->viewAttributes() ?>>
<?php echo $patient_an_registration->ModeOfDelivery->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ModeOfDelivery" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ModeOfDelivery" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ModeOfDelivery" value="<?php echo HtmlEncode($patient_an_registration->ModeOfDelivery->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ModeOfDelivery" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ModeOfDelivery" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ModeOfDelivery" value="<?php echo HtmlEncode($patient_an_registration->ModeOfDelivery->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ModeOfDelivery" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ModeOfDelivery" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ModeOfDelivery" value="<?php echo HtmlEncode($patient_an_registration->ModeOfDelivery->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ModeOfDelivery" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ModeOfDelivery" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ModeOfDelivery" value="<?php echo HtmlEncode($patient_an_registration->ModeOfDelivery->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->ND->Visible) { // ND ?>
		<td data-name="ND"<?php echo $patient_an_registration->ND->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_ND" class="form-group patient_an_registration_ND">
<input type="text" data-table="patient_an_registration" data-field="x_ND" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ND" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ND" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->ND->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->ND->EditValue ?>"<?php echo $patient_an_registration->ND->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ND" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ND" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ND" value="<?php echo HtmlEncode($patient_an_registration->ND->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_ND" class="form-group patient_an_registration_ND">
<input type="text" data-table="patient_an_registration" data-field="x_ND" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ND" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ND" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->ND->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->ND->EditValue ?>"<?php echo $patient_an_registration->ND->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_ND" class="patient_an_registration_ND">
<span<?php echo $patient_an_registration->ND->viewAttributes() ?>>
<?php echo $patient_an_registration->ND->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ND" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ND" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ND" value="<?php echo HtmlEncode($patient_an_registration->ND->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ND" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ND" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ND" value="<?php echo HtmlEncode($patient_an_registration->ND->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ND" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ND" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ND" value="<?php echo HtmlEncode($patient_an_registration->ND->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ND" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ND" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ND" value="<?php echo HtmlEncode($patient_an_registration->ND->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->NDS->Visible) { // NDS ?>
		<td data-name="NDS"<?php echo $patient_an_registration->NDS->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_NDS" class="form-group patient_an_registration_NDS">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_NDS" data-value-separator="<?php echo $patient_an_registration->NDS->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NDS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NDS"<?php echo $patient_an_registration->NDS->editAttributes() ?>>
		<?php echo $patient_an_registration->NDS->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_NDS") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_NDS" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_NDS" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_NDS" value="<?php echo HtmlEncode($patient_an_registration->NDS->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_NDS" class="form-group patient_an_registration_NDS">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_NDS" data-value-separator="<?php echo $patient_an_registration->NDS->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NDS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NDS"<?php echo $patient_an_registration->NDS->editAttributes() ?>>
		<?php echo $patient_an_registration->NDS->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_NDS") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_NDS" class="patient_an_registration_NDS">
<span<?php echo $patient_an_registration->NDS->viewAttributes() ?>>
<?php echo $patient_an_registration->NDS->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NDS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NDS" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NDS" value="<?php echo HtmlEncode($patient_an_registration->NDS->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_NDS" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_NDS" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_NDS" value="<?php echo HtmlEncode($patient_an_registration->NDS->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NDS" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_NDS" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_NDS" value="<?php echo HtmlEncode($patient_an_registration->NDS->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_NDS" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_NDS" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_NDS" value="<?php echo HtmlEncode($patient_an_registration->NDS->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->NDP->Visible) { // NDP ?>
		<td data-name="NDP"<?php echo $patient_an_registration->NDP->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_NDP" class="form-group patient_an_registration_NDP">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_NDP" data-value-separator="<?php echo $patient_an_registration->NDP->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NDP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NDP"<?php echo $patient_an_registration->NDP->editAttributes() ?>>
		<?php echo $patient_an_registration->NDP->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_NDP") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_NDP" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_NDP" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_NDP" value="<?php echo HtmlEncode($patient_an_registration->NDP->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_NDP" class="form-group patient_an_registration_NDP">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_NDP" data-value-separator="<?php echo $patient_an_registration->NDP->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NDP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NDP"<?php echo $patient_an_registration->NDP->editAttributes() ?>>
		<?php echo $patient_an_registration->NDP->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_NDP") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_NDP" class="patient_an_registration_NDP">
<span<?php echo $patient_an_registration->NDP->viewAttributes() ?>>
<?php echo $patient_an_registration->NDP->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NDP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NDP" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NDP" value="<?php echo HtmlEncode($patient_an_registration->NDP->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_NDP" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_NDP" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_NDP" value="<?php echo HtmlEncode($patient_an_registration->NDP->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NDP" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_NDP" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_NDP" value="<?php echo HtmlEncode($patient_an_registration->NDP->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_NDP" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_NDP" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_NDP" value="<?php echo HtmlEncode($patient_an_registration->NDP->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Vaccum->Visible) { // Vaccum ?>
		<td data-name="Vaccum"<?php echo $patient_an_registration->Vaccum->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Vaccum" class="form-group patient_an_registration_Vaccum">
<input type="text" data-table="patient_an_registration" data-field="x_Vaccum" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Vaccum" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Vaccum" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Vaccum->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Vaccum->EditValue ?>"<?php echo $patient_an_registration->Vaccum->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Vaccum" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Vaccum" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Vaccum" value="<?php echo HtmlEncode($patient_an_registration->Vaccum->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Vaccum" class="form-group patient_an_registration_Vaccum">
<input type="text" data-table="patient_an_registration" data-field="x_Vaccum" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Vaccum" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Vaccum" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Vaccum->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Vaccum->EditValue ?>"<?php echo $patient_an_registration->Vaccum->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Vaccum" class="patient_an_registration_Vaccum">
<span<?php echo $patient_an_registration->Vaccum->viewAttributes() ?>>
<?php echo $patient_an_registration->Vaccum->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Vaccum" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Vaccum" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Vaccum" value="<?php echo HtmlEncode($patient_an_registration->Vaccum->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Vaccum" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Vaccum" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Vaccum" value="<?php echo HtmlEncode($patient_an_registration->Vaccum->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Vaccum" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Vaccum" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Vaccum" value="<?php echo HtmlEncode($patient_an_registration->Vaccum->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Vaccum" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Vaccum" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Vaccum" value="<?php echo HtmlEncode($patient_an_registration->Vaccum->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->VaccumS->Visible) { // VaccumS ?>
		<td data-name="VaccumS"<?php echo $patient_an_registration->VaccumS->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_VaccumS" class="form-group patient_an_registration_VaccumS">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_VaccumS" data-value-separator="<?php echo $patient_an_registration->VaccumS->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumS"<?php echo $patient_an_registration->VaccumS->editAttributes() ?>>
		<?php echo $patient_an_registration->VaccumS->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumS") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_VaccumS" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumS" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumS" value="<?php echo HtmlEncode($patient_an_registration->VaccumS->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_VaccumS" class="form-group patient_an_registration_VaccumS">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_VaccumS" data-value-separator="<?php echo $patient_an_registration->VaccumS->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumS"<?php echo $patient_an_registration->VaccumS->editAttributes() ?>>
		<?php echo $patient_an_registration->VaccumS->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumS") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_VaccumS" class="patient_an_registration_VaccumS">
<span<?php echo $patient_an_registration->VaccumS->viewAttributes() ?>>
<?php echo $patient_an_registration->VaccumS->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_VaccumS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumS" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumS" value="<?php echo HtmlEncode($patient_an_registration->VaccumS->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_VaccumS" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumS" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumS" value="<?php echo HtmlEncode($patient_an_registration->VaccumS->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_VaccumS" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumS" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumS" value="<?php echo HtmlEncode($patient_an_registration->VaccumS->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_VaccumS" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumS" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumS" value="<?php echo HtmlEncode($patient_an_registration->VaccumS->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->VaccumP->Visible) { // VaccumP ?>
		<td data-name="VaccumP"<?php echo $patient_an_registration->VaccumP->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_VaccumP" class="form-group patient_an_registration_VaccumP">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_VaccumP" data-value-separator="<?php echo $patient_an_registration->VaccumP->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumP"<?php echo $patient_an_registration->VaccumP->editAttributes() ?>>
		<?php echo $patient_an_registration->VaccumP->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumP") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_VaccumP" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumP" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumP" value="<?php echo HtmlEncode($patient_an_registration->VaccumP->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_VaccumP" class="form-group patient_an_registration_VaccumP">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_VaccumP" data-value-separator="<?php echo $patient_an_registration->VaccumP->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumP"<?php echo $patient_an_registration->VaccumP->editAttributes() ?>>
		<?php echo $patient_an_registration->VaccumP->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumP") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_VaccumP" class="patient_an_registration_VaccumP">
<span<?php echo $patient_an_registration->VaccumP->viewAttributes() ?>>
<?php echo $patient_an_registration->VaccumP->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_VaccumP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumP" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumP" value="<?php echo HtmlEncode($patient_an_registration->VaccumP->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_VaccumP" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumP" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumP" value="<?php echo HtmlEncode($patient_an_registration->VaccumP->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_VaccumP" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumP" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumP" value="<?php echo HtmlEncode($patient_an_registration->VaccumP->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_VaccumP" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumP" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumP" value="<?php echo HtmlEncode($patient_an_registration->VaccumP->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Forceps->Visible) { // Forceps ?>
		<td data-name="Forceps"<?php echo $patient_an_registration->Forceps->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Forceps" class="form-group patient_an_registration_Forceps">
<input type="text" data-table="patient_an_registration" data-field="x_Forceps" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Forceps" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Forceps" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Forceps->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Forceps->EditValue ?>"<?php echo $patient_an_registration->Forceps->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Forceps" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Forceps" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Forceps" value="<?php echo HtmlEncode($patient_an_registration->Forceps->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Forceps" class="form-group patient_an_registration_Forceps">
<input type="text" data-table="patient_an_registration" data-field="x_Forceps" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Forceps" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Forceps" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Forceps->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Forceps->EditValue ?>"<?php echo $patient_an_registration->Forceps->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Forceps" class="patient_an_registration_Forceps">
<span<?php echo $patient_an_registration->Forceps->viewAttributes() ?>>
<?php echo $patient_an_registration->Forceps->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Forceps" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Forceps" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Forceps" value="<?php echo HtmlEncode($patient_an_registration->Forceps->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Forceps" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Forceps" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Forceps" value="<?php echo HtmlEncode($patient_an_registration->Forceps->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Forceps" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Forceps" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Forceps" value="<?php echo HtmlEncode($patient_an_registration->Forceps->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Forceps" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Forceps" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Forceps" value="<?php echo HtmlEncode($patient_an_registration->Forceps->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->ForcepsS->Visible) { // ForcepsS ?>
		<td data-name="ForcepsS"<?php echo $patient_an_registration->ForcepsS->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_ForcepsS" class="form-group patient_an_registration_ForcepsS">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_ForcepsS" data-value-separator="<?php echo $patient_an_registration->ForcepsS->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsS"<?php echo $patient_an_registration->ForcepsS->editAttributes() ?>>
		<?php echo $patient_an_registration->ForcepsS->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsS") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ForcepsS" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsS" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsS" value="<?php echo HtmlEncode($patient_an_registration->ForcepsS->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_ForcepsS" class="form-group patient_an_registration_ForcepsS">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_ForcepsS" data-value-separator="<?php echo $patient_an_registration->ForcepsS->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsS"<?php echo $patient_an_registration->ForcepsS->editAttributes() ?>>
		<?php echo $patient_an_registration->ForcepsS->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsS") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_ForcepsS" class="patient_an_registration_ForcepsS">
<span<?php echo $patient_an_registration->ForcepsS->viewAttributes() ?>>
<?php echo $patient_an_registration->ForcepsS->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ForcepsS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsS" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsS" value="<?php echo HtmlEncode($patient_an_registration->ForcepsS->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ForcepsS" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsS" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsS" value="<?php echo HtmlEncode($patient_an_registration->ForcepsS->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ForcepsS" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsS" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsS" value="<?php echo HtmlEncode($patient_an_registration->ForcepsS->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ForcepsS" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsS" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsS" value="<?php echo HtmlEncode($patient_an_registration->ForcepsS->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->ForcepsP->Visible) { // ForcepsP ?>
		<td data-name="ForcepsP"<?php echo $patient_an_registration->ForcepsP->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_ForcepsP" class="form-group patient_an_registration_ForcepsP">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_ForcepsP" data-value-separator="<?php echo $patient_an_registration->ForcepsP->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsP"<?php echo $patient_an_registration->ForcepsP->editAttributes() ?>>
		<?php echo $patient_an_registration->ForcepsP->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsP") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ForcepsP" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsP" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsP" value="<?php echo HtmlEncode($patient_an_registration->ForcepsP->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_ForcepsP" class="form-group patient_an_registration_ForcepsP">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_ForcepsP" data-value-separator="<?php echo $patient_an_registration->ForcepsP->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsP"<?php echo $patient_an_registration->ForcepsP->editAttributes() ?>>
		<?php echo $patient_an_registration->ForcepsP->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsP") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_ForcepsP" class="patient_an_registration_ForcepsP">
<span<?php echo $patient_an_registration->ForcepsP->viewAttributes() ?>>
<?php echo $patient_an_registration->ForcepsP->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ForcepsP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsP" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsP" value="<?php echo HtmlEncode($patient_an_registration->ForcepsP->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ForcepsP" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsP" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsP" value="<?php echo HtmlEncode($patient_an_registration->ForcepsP->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ForcepsP" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsP" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsP" value="<?php echo HtmlEncode($patient_an_registration->ForcepsP->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ForcepsP" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsP" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsP" value="<?php echo HtmlEncode($patient_an_registration->ForcepsP->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Elective->Visible) { // Elective ?>
		<td data-name="Elective"<?php echo $patient_an_registration->Elective->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Elective" class="form-group patient_an_registration_Elective">
<input type="text" data-table="patient_an_registration" data-field="x_Elective" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Elective" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Elective" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Elective->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Elective->EditValue ?>"<?php echo $patient_an_registration->Elective->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Elective" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Elective" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Elective" value="<?php echo HtmlEncode($patient_an_registration->Elective->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Elective" class="form-group patient_an_registration_Elective">
<input type="text" data-table="patient_an_registration" data-field="x_Elective" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Elective" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Elective" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Elective->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Elective->EditValue ?>"<?php echo $patient_an_registration->Elective->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Elective" class="patient_an_registration_Elective">
<span<?php echo $patient_an_registration->Elective->viewAttributes() ?>>
<?php echo $patient_an_registration->Elective->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Elective" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Elective" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Elective" value="<?php echo HtmlEncode($patient_an_registration->Elective->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Elective" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Elective" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Elective" value="<?php echo HtmlEncode($patient_an_registration->Elective->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Elective" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Elective" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Elective" value="<?php echo HtmlEncode($patient_an_registration->Elective->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Elective" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Elective" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Elective" value="<?php echo HtmlEncode($patient_an_registration->Elective->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->ElectiveS->Visible) { // ElectiveS ?>
		<td data-name="ElectiveS"<?php echo $patient_an_registration->ElectiveS->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_ElectiveS" class="form-group patient_an_registration_ElectiveS">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_ElectiveS" data-value-separator="<?php echo $patient_an_registration->ElectiveS->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveS"<?php echo $patient_an_registration->ElectiveS->editAttributes() ?>>
		<?php echo $patient_an_registration->ElectiveS->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveS") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ElectiveS" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveS" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveS" value="<?php echo HtmlEncode($patient_an_registration->ElectiveS->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_ElectiveS" class="form-group patient_an_registration_ElectiveS">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_ElectiveS" data-value-separator="<?php echo $patient_an_registration->ElectiveS->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveS"<?php echo $patient_an_registration->ElectiveS->editAttributes() ?>>
		<?php echo $patient_an_registration->ElectiveS->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveS") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_ElectiveS" class="patient_an_registration_ElectiveS">
<span<?php echo $patient_an_registration->ElectiveS->viewAttributes() ?>>
<?php echo $patient_an_registration->ElectiveS->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ElectiveS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveS" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveS" value="<?php echo HtmlEncode($patient_an_registration->ElectiveS->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ElectiveS" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveS" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveS" value="<?php echo HtmlEncode($patient_an_registration->ElectiveS->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ElectiveS" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveS" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveS" value="<?php echo HtmlEncode($patient_an_registration->ElectiveS->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ElectiveS" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveS" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveS" value="<?php echo HtmlEncode($patient_an_registration->ElectiveS->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->ElectiveP->Visible) { // ElectiveP ?>
		<td data-name="ElectiveP"<?php echo $patient_an_registration->ElectiveP->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_ElectiveP" class="form-group patient_an_registration_ElectiveP">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_ElectiveP" data-value-separator="<?php echo $patient_an_registration->ElectiveP->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveP"<?php echo $patient_an_registration->ElectiveP->editAttributes() ?>>
		<?php echo $patient_an_registration->ElectiveP->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveP") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ElectiveP" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveP" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveP" value="<?php echo HtmlEncode($patient_an_registration->ElectiveP->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_ElectiveP" class="form-group patient_an_registration_ElectiveP">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_ElectiveP" data-value-separator="<?php echo $patient_an_registration->ElectiveP->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveP"<?php echo $patient_an_registration->ElectiveP->editAttributes() ?>>
		<?php echo $patient_an_registration->ElectiveP->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveP") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_ElectiveP" class="patient_an_registration_ElectiveP">
<span<?php echo $patient_an_registration->ElectiveP->viewAttributes() ?>>
<?php echo $patient_an_registration->ElectiveP->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ElectiveP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveP" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveP" value="<?php echo HtmlEncode($patient_an_registration->ElectiveP->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ElectiveP" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveP" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveP" value="<?php echo HtmlEncode($patient_an_registration->ElectiveP->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ElectiveP" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveP" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveP" value="<?php echo HtmlEncode($patient_an_registration->ElectiveP->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ElectiveP" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveP" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveP" value="<?php echo HtmlEncode($patient_an_registration->ElectiveP->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Emergency->Visible) { // Emergency ?>
		<td data-name="Emergency"<?php echo $patient_an_registration->Emergency->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Emergency" class="form-group patient_an_registration_Emergency">
<input type="text" data-table="patient_an_registration" data-field="x_Emergency" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Emergency" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Emergency" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Emergency->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Emergency->EditValue ?>"<?php echo $patient_an_registration->Emergency->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Emergency" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Emergency" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Emergency" value="<?php echo HtmlEncode($patient_an_registration->Emergency->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Emergency" class="form-group patient_an_registration_Emergency">
<input type="text" data-table="patient_an_registration" data-field="x_Emergency" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Emergency" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Emergency" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Emergency->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Emergency->EditValue ?>"<?php echo $patient_an_registration->Emergency->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Emergency" class="patient_an_registration_Emergency">
<span<?php echo $patient_an_registration->Emergency->viewAttributes() ?>>
<?php echo $patient_an_registration->Emergency->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Emergency" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Emergency" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Emergency" value="<?php echo HtmlEncode($patient_an_registration->Emergency->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Emergency" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Emergency" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Emergency" value="<?php echo HtmlEncode($patient_an_registration->Emergency->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Emergency" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Emergency" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Emergency" value="<?php echo HtmlEncode($patient_an_registration->Emergency->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Emergency" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Emergency" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Emergency" value="<?php echo HtmlEncode($patient_an_registration->Emergency->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->EmergencyS->Visible) { // EmergencyS ?>
		<td data-name="EmergencyS"<?php echo $patient_an_registration->EmergencyS->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_EmergencyS" class="form-group patient_an_registration_EmergencyS">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_EmergencyS" data-value-separator="<?php echo $patient_an_registration->EmergencyS->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyS"<?php echo $patient_an_registration->EmergencyS->editAttributes() ?>>
		<?php echo $patient_an_registration->EmergencyS->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyS") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_EmergencyS" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyS" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyS" value="<?php echo HtmlEncode($patient_an_registration->EmergencyS->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_EmergencyS" class="form-group patient_an_registration_EmergencyS">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_EmergencyS" data-value-separator="<?php echo $patient_an_registration->EmergencyS->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyS"<?php echo $patient_an_registration->EmergencyS->editAttributes() ?>>
		<?php echo $patient_an_registration->EmergencyS->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyS") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_EmergencyS" class="patient_an_registration_EmergencyS">
<span<?php echo $patient_an_registration->EmergencyS->viewAttributes() ?>>
<?php echo $patient_an_registration->EmergencyS->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_EmergencyS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyS" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyS" value="<?php echo HtmlEncode($patient_an_registration->EmergencyS->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_EmergencyS" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyS" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyS" value="<?php echo HtmlEncode($patient_an_registration->EmergencyS->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_EmergencyS" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyS" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyS" value="<?php echo HtmlEncode($patient_an_registration->EmergencyS->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_EmergencyS" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyS" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyS" value="<?php echo HtmlEncode($patient_an_registration->EmergencyS->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->EmergencyP->Visible) { // EmergencyP ?>
		<td data-name="EmergencyP"<?php echo $patient_an_registration->EmergencyP->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_EmergencyP" class="form-group patient_an_registration_EmergencyP">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_EmergencyP" data-value-separator="<?php echo $patient_an_registration->EmergencyP->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyP"<?php echo $patient_an_registration->EmergencyP->editAttributes() ?>>
		<?php echo $patient_an_registration->EmergencyP->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyP") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_EmergencyP" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyP" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyP" value="<?php echo HtmlEncode($patient_an_registration->EmergencyP->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_EmergencyP" class="form-group patient_an_registration_EmergencyP">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_EmergencyP" data-value-separator="<?php echo $patient_an_registration->EmergencyP->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyP"<?php echo $patient_an_registration->EmergencyP->editAttributes() ?>>
		<?php echo $patient_an_registration->EmergencyP->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyP") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_EmergencyP" class="patient_an_registration_EmergencyP">
<span<?php echo $patient_an_registration->EmergencyP->viewAttributes() ?>>
<?php echo $patient_an_registration->EmergencyP->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_EmergencyP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyP" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyP" value="<?php echo HtmlEncode($patient_an_registration->EmergencyP->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_EmergencyP" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyP" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyP" value="<?php echo HtmlEncode($patient_an_registration->EmergencyP->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_EmergencyP" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyP" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyP" value="<?php echo HtmlEncode($patient_an_registration->EmergencyP->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_EmergencyP" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyP" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyP" value="<?php echo HtmlEncode($patient_an_registration->EmergencyP->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Maturity->Visible) { // Maturity ?>
		<td data-name="Maturity"<?php echo $patient_an_registration->Maturity->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Maturity" class="form-group patient_an_registration_Maturity">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_Maturity" data-value-separator="<?php echo $patient_an_registration->Maturity->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Maturity" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Maturity"<?php echo $patient_an_registration->Maturity->editAttributes() ?>>
		<?php echo $patient_an_registration->Maturity->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_Maturity") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Maturity" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Maturity" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Maturity" value="<?php echo HtmlEncode($patient_an_registration->Maturity->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Maturity" class="form-group patient_an_registration_Maturity">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_Maturity" data-value-separator="<?php echo $patient_an_registration->Maturity->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Maturity" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Maturity"<?php echo $patient_an_registration->Maturity->editAttributes() ?>>
		<?php echo $patient_an_registration->Maturity->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_Maturity") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Maturity" class="patient_an_registration_Maturity">
<span<?php echo $patient_an_registration->Maturity->viewAttributes() ?>>
<?php echo $patient_an_registration->Maturity->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Maturity" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Maturity" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Maturity" value="<?php echo HtmlEncode($patient_an_registration->Maturity->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Maturity" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Maturity" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Maturity" value="<?php echo HtmlEncode($patient_an_registration->Maturity->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Maturity" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Maturity" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Maturity" value="<?php echo HtmlEncode($patient_an_registration->Maturity->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Maturity" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Maturity" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Maturity" value="<?php echo HtmlEncode($patient_an_registration->Maturity->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Baby1->Visible) { // Baby1 ?>
		<td data-name="Baby1"<?php echo $patient_an_registration->Baby1->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Baby1" class="form-group patient_an_registration_Baby1">
<input type="text" data-table="patient_an_registration" data-field="x_Baby1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Baby1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Baby1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Baby1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Baby1->EditValue ?>"<?php echo $patient_an_registration->Baby1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Baby1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Baby1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Baby1" value="<?php echo HtmlEncode($patient_an_registration->Baby1->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Baby1" class="form-group patient_an_registration_Baby1">
<input type="text" data-table="patient_an_registration" data-field="x_Baby1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Baby1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Baby1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Baby1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Baby1->EditValue ?>"<?php echo $patient_an_registration->Baby1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Baby1" class="patient_an_registration_Baby1">
<span<?php echo $patient_an_registration->Baby1->viewAttributes() ?>>
<?php echo $patient_an_registration->Baby1->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Baby1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Baby1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Baby1" value="<?php echo HtmlEncode($patient_an_registration->Baby1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Baby1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Baby1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Baby1" value="<?php echo HtmlEncode($patient_an_registration->Baby1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Baby1" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Baby1" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Baby1" value="<?php echo HtmlEncode($patient_an_registration->Baby1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Baby1" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Baby1" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Baby1" value="<?php echo HtmlEncode($patient_an_registration->Baby1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Baby2->Visible) { // Baby2 ?>
		<td data-name="Baby2"<?php echo $patient_an_registration->Baby2->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Baby2" class="form-group patient_an_registration_Baby2">
<input type="text" data-table="patient_an_registration" data-field="x_Baby2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Baby2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Baby2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Baby2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Baby2->EditValue ?>"<?php echo $patient_an_registration->Baby2->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Baby2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Baby2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Baby2" value="<?php echo HtmlEncode($patient_an_registration->Baby2->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Baby2" class="form-group patient_an_registration_Baby2">
<input type="text" data-table="patient_an_registration" data-field="x_Baby2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Baby2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Baby2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Baby2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Baby2->EditValue ?>"<?php echo $patient_an_registration->Baby2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Baby2" class="patient_an_registration_Baby2">
<span<?php echo $patient_an_registration->Baby2->viewAttributes() ?>>
<?php echo $patient_an_registration->Baby2->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Baby2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Baby2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Baby2" value="<?php echo HtmlEncode($patient_an_registration->Baby2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Baby2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Baby2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Baby2" value="<?php echo HtmlEncode($patient_an_registration->Baby2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Baby2" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Baby2" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Baby2" value="<?php echo HtmlEncode($patient_an_registration->Baby2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Baby2" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Baby2" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Baby2" value="<?php echo HtmlEncode($patient_an_registration->Baby2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->sex1->Visible) { // sex1 ?>
		<td data-name="sex1"<?php echo $patient_an_registration->sex1->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_sex1" class="form-group patient_an_registration_sex1">
<input type="text" data-table="patient_an_registration" data-field="x_sex1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_sex1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_sex1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->sex1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->sex1->EditValue ?>"<?php echo $patient_an_registration->sex1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_sex1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_sex1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_sex1" value="<?php echo HtmlEncode($patient_an_registration->sex1->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_sex1" class="form-group patient_an_registration_sex1">
<input type="text" data-table="patient_an_registration" data-field="x_sex1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_sex1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_sex1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->sex1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->sex1->EditValue ?>"<?php echo $patient_an_registration->sex1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_sex1" class="patient_an_registration_sex1">
<span<?php echo $patient_an_registration->sex1->viewAttributes() ?>>
<?php echo $patient_an_registration->sex1->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_sex1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_sex1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_sex1" value="<?php echo HtmlEncode($patient_an_registration->sex1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_sex1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_sex1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_sex1" value="<?php echo HtmlEncode($patient_an_registration->sex1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_sex1" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_sex1" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_sex1" value="<?php echo HtmlEncode($patient_an_registration->sex1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_sex1" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_sex1" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_sex1" value="<?php echo HtmlEncode($patient_an_registration->sex1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->sex2->Visible) { // sex2 ?>
		<td data-name="sex2"<?php echo $patient_an_registration->sex2->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_sex2" class="form-group patient_an_registration_sex2">
<input type="text" data-table="patient_an_registration" data-field="x_sex2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_sex2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_sex2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->sex2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->sex2->EditValue ?>"<?php echo $patient_an_registration->sex2->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_sex2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_sex2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_sex2" value="<?php echo HtmlEncode($patient_an_registration->sex2->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_sex2" class="form-group patient_an_registration_sex2">
<input type="text" data-table="patient_an_registration" data-field="x_sex2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_sex2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_sex2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->sex2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->sex2->EditValue ?>"<?php echo $patient_an_registration->sex2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_sex2" class="patient_an_registration_sex2">
<span<?php echo $patient_an_registration->sex2->viewAttributes() ?>>
<?php echo $patient_an_registration->sex2->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_sex2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_sex2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_sex2" value="<?php echo HtmlEncode($patient_an_registration->sex2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_sex2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_sex2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_sex2" value="<?php echo HtmlEncode($patient_an_registration->sex2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_sex2" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_sex2" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_sex2" value="<?php echo HtmlEncode($patient_an_registration->sex2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_sex2" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_sex2" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_sex2" value="<?php echo HtmlEncode($patient_an_registration->sex2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->weight1->Visible) { // weight1 ?>
		<td data-name="weight1"<?php echo $patient_an_registration->weight1->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_weight1" class="form-group patient_an_registration_weight1">
<input type="text" data-table="patient_an_registration" data-field="x_weight1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_weight1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_weight1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->weight1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->weight1->EditValue ?>"<?php echo $patient_an_registration->weight1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_weight1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_weight1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_weight1" value="<?php echo HtmlEncode($patient_an_registration->weight1->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_weight1" class="form-group patient_an_registration_weight1">
<input type="text" data-table="patient_an_registration" data-field="x_weight1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_weight1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_weight1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->weight1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->weight1->EditValue ?>"<?php echo $patient_an_registration->weight1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_weight1" class="patient_an_registration_weight1">
<span<?php echo $patient_an_registration->weight1->viewAttributes() ?>>
<?php echo $patient_an_registration->weight1->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_weight1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_weight1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_weight1" value="<?php echo HtmlEncode($patient_an_registration->weight1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_weight1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_weight1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_weight1" value="<?php echo HtmlEncode($patient_an_registration->weight1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_weight1" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_weight1" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_weight1" value="<?php echo HtmlEncode($patient_an_registration->weight1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_weight1" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_weight1" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_weight1" value="<?php echo HtmlEncode($patient_an_registration->weight1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->weight2->Visible) { // weight2 ?>
		<td data-name="weight2"<?php echo $patient_an_registration->weight2->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_weight2" class="form-group patient_an_registration_weight2">
<input type="text" data-table="patient_an_registration" data-field="x_weight2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_weight2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_weight2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->weight2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->weight2->EditValue ?>"<?php echo $patient_an_registration->weight2->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_weight2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_weight2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_weight2" value="<?php echo HtmlEncode($patient_an_registration->weight2->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_weight2" class="form-group patient_an_registration_weight2">
<input type="text" data-table="patient_an_registration" data-field="x_weight2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_weight2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_weight2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->weight2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->weight2->EditValue ?>"<?php echo $patient_an_registration->weight2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_weight2" class="patient_an_registration_weight2">
<span<?php echo $patient_an_registration->weight2->viewAttributes() ?>>
<?php echo $patient_an_registration->weight2->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_weight2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_weight2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_weight2" value="<?php echo HtmlEncode($patient_an_registration->weight2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_weight2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_weight2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_weight2" value="<?php echo HtmlEncode($patient_an_registration->weight2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_weight2" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_weight2" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_weight2" value="<?php echo HtmlEncode($patient_an_registration->weight2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_weight2" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_weight2" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_weight2" value="<?php echo HtmlEncode($patient_an_registration->weight2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->NICU1->Visible) { // NICU1 ?>
		<td data-name="NICU1"<?php echo $patient_an_registration->NICU1->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_NICU1" class="form-group patient_an_registration_NICU1">
<input type="text" data-table="patient_an_registration" data-field="x_NICU1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NICU1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NICU1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->NICU1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->NICU1->EditValue ?>"<?php echo $patient_an_registration->NICU1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_NICU1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_NICU1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_NICU1" value="<?php echo HtmlEncode($patient_an_registration->NICU1->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_NICU1" class="form-group patient_an_registration_NICU1">
<input type="text" data-table="patient_an_registration" data-field="x_NICU1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NICU1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NICU1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->NICU1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->NICU1->EditValue ?>"<?php echo $patient_an_registration->NICU1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_NICU1" class="patient_an_registration_NICU1">
<span<?php echo $patient_an_registration->NICU1->viewAttributes() ?>>
<?php echo $patient_an_registration->NICU1->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NICU1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NICU1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NICU1" value="<?php echo HtmlEncode($patient_an_registration->NICU1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_NICU1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_NICU1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_NICU1" value="<?php echo HtmlEncode($patient_an_registration->NICU1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NICU1" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_NICU1" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_NICU1" value="<?php echo HtmlEncode($patient_an_registration->NICU1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_NICU1" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_NICU1" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_NICU1" value="<?php echo HtmlEncode($patient_an_registration->NICU1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->NICU2->Visible) { // NICU2 ?>
		<td data-name="NICU2"<?php echo $patient_an_registration->NICU2->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_NICU2" class="form-group patient_an_registration_NICU2">
<input type="text" data-table="patient_an_registration" data-field="x_NICU2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NICU2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NICU2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->NICU2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->NICU2->EditValue ?>"<?php echo $patient_an_registration->NICU2->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_NICU2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_NICU2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_NICU2" value="<?php echo HtmlEncode($patient_an_registration->NICU2->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_NICU2" class="form-group patient_an_registration_NICU2">
<input type="text" data-table="patient_an_registration" data-field="x_NICU2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NICU2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NICU2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->NICU2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->NICU2->EditValue ?>"<?php echo $patient_an_registration->NICU2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_NICU2" class="patient_an_registration_NICU2">
<span<?php echo $patient_an_registration->NICU2->viewAttributes() ?>>
<?php echo $patient_an_registration->NICU2->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NICU2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NICU2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NICU2" value="<?php echo HtmlEncode($patient_an_registration->NICU2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_NICU2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_NICU2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_NICU2" value="<?php echo HtmlEncode($patient_an_registration->NICU2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NICU2" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_NICU2" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_NICU2" value="<?php echo HtmlEncode($patient_an_registration->NICU2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_NICU2" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_NICU2" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_NICU2" value="<?php echo HtmlEncode($patient_an_registration->NICU2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Jaundice1->Visible) { // Jaundice1 ?>
		<td data-name="Jaundice1"<?php echo $patient_an_registration->Jaundice1->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Jaundice1" class="form-group patient_an_registration_Jaundice1">
<input type="text" data-table="patient_an_registration" data-field="x_Jaundice1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Jaundice1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Jaundice1->EditValue ?>"<?php echo $patient_an_registration->Jaundice1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Jaundice1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice1" value="<?php echo HtmlEncode($patient_an_registration->Jaundice1->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Jaundice1" class="form-group patient_an_registration_Jaundice1">
<input type="text" data-table="patient_an_registration" data-field="x_Jaundice1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Jaundice1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Jaundice1->EditValue ?>"<?php echo $patient_an_registration->Jaundice1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Jaundice1" class="patient_an_registration_Jaundice1">
<span<?php echo $patient_an_registration->Jaundice1->viewAttributes() ?>>
<?php echo $patient_an_registration->Jaundice1->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Jaundice1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice1" value="<?php echo HtmlEncode($patient_an_registration->Jaundice1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Jaundice1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice1" value="<?php echo HtmlEncode($patient_an_registration->Jaundice1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Jaundice1" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice1" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice1" value="<?php echo HtmlEncode($patient_an_registration->Jaundice1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Jaundice1" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice1" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice1" value="<?php echo HtmlEncode($patient_an_registration->Jaundice1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Jaundice2->Visible) { // Jaundice2 ?>
		<td data-name="Jaundice2"<?php echo $patient_an_registration->Jaundice2->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Jaundice2" class="form-group patient_an_registration_Jaundice2">
<input type="text" data-table="patient_an_registration" data-field="x_Jaundice2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Jaundice2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Jaundice2->EditValue ?>"<?php echo $patient_an_registration->Jaundice2->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Jaundice2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice2" value="<?php echo HtmlEncode($patient_an_registration->Jaundice2->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Jaundice2" class="form-group patient_an_registration_Jaundice2">
<input type="text" data-table="patient_an_registration" data-field="x_Jaundice2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Jaundice2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Jaundice2->EditValue ?>"<?php echo $patient_an_registration->Jaundice2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Jaundice2" class="patient_an_registration_Jaundice2">
<span<?php echo $patient_an_registration->Jaundice2->viewAttributes() ?>>
<?php echo $patient_an_registration->Jaundice2->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Jaundice2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice2" value="<?php echo HtmlEncode($patient_an_registration->Jaundice2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Jaundice2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice2" value="<?php echo HtmlEncode($patient_an_registration->Jaundice2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Jaundice2" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice2" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice2" value="<?php echo HtmlEncode($patient_an_registration->Jaundice2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Jaundice2" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice2" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice2" value="<?php echo HtmlEncode($patient_an_registration->Jaundice2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Others1->Visible) { // Others1 ?>
		<td data-name="Others1"<?php echo $patient_an_registration->Others1->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Others1" class="form-group patient_an_registration_Others1">
<input type="text" data-table="patient_an_registration" data-field="x_Others1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Others1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Others1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Others1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Others1->EditValue ?>"<?php echo $patient_an_registration->Others1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Others1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Others1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Others1" value="<?php echo HtmlEncode($patient_an_registration->Others1->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Others1" class="form-group patient_an_registration_Others1">
<input type="text" data-table="patient_an_registration" data-field="x_Others1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Others1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Others1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Others1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Others1->EditValue ?>"<?php echo $patient_an_registration->Others1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Others1" class="patient_an_registration_Others1">
<span<?php echo $patient_an_registration->Others1->viewAttributes() ?>>
<?php echo $patient_an_registration->Others1->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Others1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Others1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Others1" value="<?php echo HtmlEncode($patient_an_registration->Others1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Others1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Others1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Others1" value="<?php echo HtmlEncode($patient_an_registration->Others1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Others1" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Others1" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Others1" value="<?php echo HtmlEncode($patient_an_registration->Others1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Others1" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Others1" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Others1" value="<?php echo HtmlEncode($patient_an_registration->Others1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Others2->Visible) { // Others2 ?>
		<td data-name="Others2"<?php echo $patient_an_registration->Others2->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Others2" class="form-group patient_an_registration_Others2">
<input type="text" data-table="patient_an_registration" data-field="x_Others2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Others2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Others2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Others2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Others2->EditValue ?>"<?php echo $patient_an_registration->Others2->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Others2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Others2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Others2" value="<?php echo HtmlEncode($patient_an_registration->Others2->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Others2" class="form-group patient_an_registration_Others2">
<input type="text" data-table="patient_an_registration" data-field="x_Others2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Others2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Others2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Others2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Others2->EditValue ?>"<?php echo $patient_an_registration->Others2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_Others2" class="patient_an_registration_Others2">
<span<?php echo $patient_an_registration->Others2->viewAttributes() ?>>
<?php echo $patient_an_registration->Others2->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Others2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Others2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Others2" value="<?php echo HtmlEncode($patient_an_registration->Others2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Others2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Others2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Others2" value="<?php echo HtmlEncode($patient_an_registration->Others2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Others2" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Others2" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Others2" value="<?php echo HtmlEncode($patient_an_registration->Others2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Others2" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Others2" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Others2" value="<?php echo HtmlEncode($patient_an_registration->Others2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->SpillOverReasons->Visible) { // SpillOverReasons ?>
		<td data-name="SpillOverReasons"<?php echo $patient_an_registration->SpillOverReasons->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_SpillOverReasons" class="form-group patient_an_registration_SpillOverReasons">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_SpillOverReasons" data-value-separator="<?php echo $patient_an_registration->SpillOverReasons->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_SpillOverReasons" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_SpillOverReasons"<?php echo $patient_an_registration->SpillOverReasons->editAttributes() ?>>
		<?php echo $patient_an_registration->SpillOverReasons->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_SpillOverReasons") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_SpillOverReasons" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_SpillOverReasons" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_SpillOverReasons" value="<?php echo HtmlEncode($patient_an_registration->SpillOverReasons->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_SpillOverReasons" class="form-group patient_an_registration_SpillOverReasons">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_SpillOverReasons" data-value-separator="<?php echo $patient_an_registration->SpillOverReasons->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_SpillOverReasons" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_SpillOverReasons"<?php echo $patient_an_registration->SpillOverReasons->editAttributes() ?>>
		<?php echo $patient_an_registration->SpillOverReasons->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_SpillOverReasons") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_SpillOverReasons" class="patient_an_registration_SpillOverReasons">
<span<?php echo $patient_an_registration->SpillOverReasons->viewAttributes() ?>>
<?php echo $patient_an_registration->SpillOverReasons->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_SpillOverReasons" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_SpillOverReasons" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_SpillOverReasons" value="<?php echo HtmlEncode($patient_an_registration->SpillOverReasons->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_SpillOverReasons" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_SpillOverReasons" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_SpillOverReasons" value="<?php echo HtmlEncode($patient_an_registration->SpillOverReasons->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_SpillOverReasons" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_SpillOverReasons" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_SpillOverReasons" value="<?php echo HtmlEncode($patient_an_registration->SpillOverReasons->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_SpillOverReasons" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_SpillOverReasons" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_SpillOverReasons" value="<?php echo HtmlEncode($patient_an_registration->SpillOverReasons->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->ANClosed->Visible) { // ANClosed ?>
		<td data-name="ANClosed"<?php echo $patient_an_registration->ANClosed->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_ANClosed" class="form-group patient_an_registration_ANClosed">
<div id="tp_x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_an_registration" data-field="x_ANClosed" data-value-separator="<?php echo $patient_an_registration->ANClosed->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed[]" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed[]" value="{value}"<?php echo $patient_an_registration->ANClosed->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_an_registration->ANClosed->checkBoxListHtml(FALSE, "x{$patient_an_registration_grid->RowIndex}_ANClosed[]") ?>
</div></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANClosed" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed[]" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed[]" value="<?php echo HtmlEncode($patient_an_registration->ANClosed->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_ANClosed" class="form-group patient_an_registration_ANClosed">
<div id="tp_x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_an_registration" data-field="x_ANClosed" data-value-separator="<?php echo $patient_an_registration->ANClosed->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed[]" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed[]" value="{value}"<?php echo $patient_an_registration->ANClosed->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_an_registration->ANClosed->checkBoxListHtml(FALSE, "x{$patient_an_registration_grid->RowIndex}_ANClosed[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_ANClosed" class="patient_an_registration_ANClosed">
<span<?php echo $patient_an_registration->ANClosed->viewAttributes() ?>>
<?php echo $patient_an_registration->ANClosed->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANClosed" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed" value="<?php echo HtmlEncode($patient_an_registration->ANClosed->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ANClosed" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed[]" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed[]" value="<?php echo HtmlEncode($patient_an_registration->ANClosed->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANClosed" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed" value="<?php echo HtmlEncode($patient_an_registration->ANClosed->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ANClosed" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed[]" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed[]" value="<?php echo HtmlEncode($patient_an_registration->ANClosed->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->ANClosedDATE->Visible) { // ANClosedDATE ?>
		<td data-name="ANClosedDATE"<?php echo $patient_an_registration->ANClosedDATE->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_ANClosedDATE" class="form-group patient_an_registration_ANClosedDATE">
<input type="text" data-table="patient_an_registration" data-field="x_ANClosedDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosedDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosedDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->ANClosedDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->ANClosedDATE->EditValue ?>"<?php echo $patient_an_registration->ANClosedDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->ANClosedDATE->ReadOnly && !$patient_an_registration->ANClosedDATE->Disabled && !isset($patient_an_registration->ANClosedDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->ANClosedDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosedDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANClosedDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosedDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosedDATE" value="<?php echo HtmlEncode($patient_an_registration->ANClosedDATE->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_ANClosedDATE" class="form-group patient_an_registration_ANClosedDATE">
<input type="text" data-table="patient_an_registration" data-field="x_ANClosedDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosedDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosedDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->ANClosedDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->ANClosedDATE->EditValue ?>"<?php echo $patient_an_registration->ANClosedDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->ANClosedDATE->ReadOnly && !$patient_an_registration->ANClosedDATE->Disabled && !isset($patient_an_registration->ANClosedDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->ANClosedDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosedDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_ANClosedDATE" class="patient_an_registration_ANClosedDATE">
<span<?php echo $patient_an_registration->ANClosedDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->ANClosedDATE->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANClosedDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosedDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosedDATE" value="<?php echo HtmlEncode($patient_an_registration->ANClosedDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ANClosedDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosedDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosedDATE" value="<?php echo HtmlEncode($patient_an_registration->ANClosedDATE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANClosedDATE" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosedDATE" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosedDATE" value="<?php echo HtmlEncode($patient_an_registration->ANClosedDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ANClosedDATE" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosedDATE" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosedDATE" value="<?php echo HtmlEncode($patient_an_registration->ANClosedDATE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->PastMedicalHistoryOthers->Visible) { // PastMedicalHistoryOthers ?>
		<td data-name="PastMedicalHistoryOthers"<?php echo $patient_an_registration->PastMedicalHistoryOthers->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_PastMedicalHistoryOthers" class="form-group patient_an_registration_PastMedicalHistoryOthers">
<input type="text" data-table="patient_an_registration" data-field="x_PastMedicalHistoryOthers" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistoryOthers" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistoryOthers" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->PastMedicalHistoryOthers->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->PastMedicalHistoryOthers->EditValue ?>"<?php echo $patient_an_registration->PastMedicalHistoryOthers->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastMedicalHistoryOthers" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistoryOthers" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistoryOthers" value="<?php echo HtmlEncode($patient_an_registration->PastMedicalHistoryOthers->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_PastMedicalHistoryOthers" class="form-group patient_an_registration_PastMedicalHistoryOthers">
<input type="text" data-table="patient_an_registration" data-field="x_PastMedicalHistoryOthers" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistoryOthers" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistoryOthers" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->PastMedicalHistoryOthers->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->PastMedicalHistoryOthers->EditValue ?>"<?php echo $patient_an_registration->PastMedicalHistoryOthers->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_PastMedicalHistoryOthers" class="patient_an_registration_PastMedicalHistoryOthers">
<span<?php echo $patient_an_registration->PastMedicalHistoryOthers->viewAttributes() ?>>
<?php echo $patient_an_registration->PastMedicalHistoryOthers->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastMedicalHistoryOthers" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistoryOthers" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistoryOthers" value="<?php echo HtmlEncode($patient_an_registration->PastMedicalHistoryOthers->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PastMedicalHistoryOthers" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistoryOthers" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistoryOthers" value="<?php echo HtmlEncode($patient_an_registration->PastMedicalHistoryOthers->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastMedicalHistoryOthers" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistoryOthers" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistoryOthers" value="<?php echo HtmlEncode($patient_an_registration->PastMedicalHistoryOthers->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PastMedicalHistoryOthers" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistoryOthers" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistoryOthers" value="<?php echo HtmlEncode($patient_an_registration->PastMedicalHistoryOthers->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->PastSurgicalHistoryOthers->Visible) { // PastSurgicalHistoryOthers ?>
		<td data-name="PastSurgicalHistoryOthers"<?php echo $patient_an_registration->PastSurgicalHistoryOthers->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_PastSurgicalHistoryOthers" class="form-group patient_an_registration_PastSurgicalHistoryOthers">
<input type="text" data-table="patient_an_registration" data-field="x_PastSurgicalHistoryOthers" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistoryOthers" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistoryOthers" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->PastSurgicalHistoryOthers->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->PastSurgicalHistoryOthers->EditValue ?>"<?php echo $patient_an_registration->PastSurgicalHistoryOthers->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastSurgicalHistoryOthers" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistoryOthers" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistoryOthers" value="<?php echo HtmlEncode($patient_an_registration->PastSurgicalHistoryOthers->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_PastSurgicalHistoryOthers" class="form-group patient_an_registration_PastSurgicalHistoryOthers">
<input type="text" data-table="patient_an_registration" data-field="x_PastSurgicalHistoryOthers" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistoryOthers" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistoryOthers" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->PastSurgicalHistoryOthers->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->PastSurgicalHistoryOthers->EditValue ?>"<?php echo $patient_an_registration->PastSurgicalHistoryOthers->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_PastSurgicalHistoryOthers" class="patient_an_registration_PastSurgicalHistoryOthers">
<span<?php echo $patient_an_registration->PastSurgicalHistoryOthers->viewAttributes() ?>>
<?php echo $patient_an_registration->PastSurgicalHistoryOthers->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastSurgicalHistoryOthers" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistoryOthers" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistoryOthers" value="<?php echo HtmlEncode($patient_an_registration->PastSurgicalHistoryOthers->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PastSurgicalHistoryOthers" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistoryOthers" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistoryOthers" value="<?php echo HtmlEncode($patient_an_registration->PastSurgicalHistoryOthers->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastSurgicalHistoryOthers" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistoryOthers" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistoryOthers" value="<?php echo HtmlEncode($patient_an_registration->PastSurgicalHistoryOthers->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PastSurgicalHistoryOthers" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistoryOthers" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistoryOthers" value="<?php echo HtmlEncode($patient_an_registration->PastSurgicalHistoryOthers->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->FamilyHistoryOthers->Visible) { // FamilyHistoryOthers ?>
		<td data-name="FamilyHistoryOthers"<?php echo $patient_an_registration->FamilyHistoryOthers->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_FamilyHistoryOthers" class="form-group patient_an_registration_FamilyHistoryOthers">
<input type="text" data-table="patient_an_registration" data-field="x_FamilyHistoryOthers" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistoryOthers" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistoryOthers" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->FamilyHistoryOthers->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->FamilyHistoryOthers->EditValue ?>"<?php echo $patient_an_registration->FamilyHistoryOthers->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_FamilyHistoryOthers" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistoryOthers" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistoryOthers" value="<?php echo HtmlEncode($patient_an_registration->FamilyHistoryOthers->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_FamilyHistoryOthers" class="form-group patient_an_registration_FamilyHistoryOthers">
<input type="text" data-table="patient_an_registration" data-field="x_FamilyHistoryOthers" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistoryOthers" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistoryOthers" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->FamilyHistoryOthers->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->FamilyHistoryOthers->EditValue ?>"<?php echo $patient_an_registration->FamilyHistoryOthers->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_FamilyHistoryOthers" class="patient_an_registration_FamilyHistoryOthers">
<span<?php echo $patient_an_registration->FamilyHistoryOthers->viewAttributes() ?>>
<?php echo $patient_an_registration->FamilyHistoryOthers->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_FamilyHistoryOthers" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistoryOthers" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistoryOthers" value="<?php echo HtmlEncode($patient_an_registration->FamilyHistoryOthers->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_FamilyHistoryOthers" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistoryOthers" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistoryOthers" value="<?php echo HtmlEncode($patient_an_registration->FamilyHistoryOthers->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_FamilyHistoryOthers" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistoryOthers" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistoryOthers" value="<?php echo HtmlEncode($patient_an_registration->FamilyHistoryOthers->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_FamilyHistoryOthers" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistoryOthers" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistoryOthers" value="<?php echo HtmlEncode($patient_an_registration->FamilyHistoryOthers->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->PresentPregnancyComplicationsOthers->Visible) { // PresentPregnancyComplicationsOthers ?>
		<td data-name="PresentPregnancyComplicationsOthers"<?php echo $patient_an_registration->PresentPregnancyComplicationsOthers->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_PresentPregnancyComplicationsOthers" class="form-group patient_an_registration_PresentPregnancyComplicationsOthers">
<input type="text" data-table="patient_an_registration" data-field="x_PresentPregnancyComplicationsOthers" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PresentPregnancyComplicationsOthers" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PresentPregnancyComplicationsOthers" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->PresentPregnancyComplicationsOthers->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->PresentPregnancyComplicationsOthers->EditValue ?>"<?php echo $patient_an_registration->PresentPregnancyComplicationsOthers->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PresentPregnancyComplicationsOthers" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PresentPregnancyComplicationsOthers" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PresentPregnancyComplicationsOthers" value="<?php echo HtmlEncode($patient_an_registration->PresentPregnancyComplicationsOthers->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_PresentPregnancyComplicationsOthers" class="form-group patient_an_registration_PresentPregnancyComplicationsOthers">
<input type="text" data-table="patient_an_registration" data-field="x_PresentPregnancyComplicationsOthers" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PresentPregnancyComplicationsOthers" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PresentPregnancyComplicationsOthers" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->PresentPregnancyComplicationsOthers->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->PresentPregnancyComplicationsOthers->EditValue ?>"<?php echo $patient_an_registration->PresentPregnancyComplicationsOthers->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_PresentPregnancyComplicationsOthers" class="patient_an_registration_PresentPregnancyComplicationsOthers">
<span<?php echo $patient_an_registration->PresentPregnancyComplicationsOthers->viewAttributes() ?>>
<?php echo $patient_an_registration->PresentPregnancyComplicationsOthers->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PresentPregnancyComplicationsOthers" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PresentPregnancyComplicationsOthers" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PresentPregnancyComplicationsOthers" value="<?php echo HtmlEncode($patient_an_registration->PresentPregnancyComplicationsOthers->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PresentPregnancyComplicationsOthers" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PresentPregnancyComplicationsOthers" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PresentPregnancyComplicationsOthers" value="<?php echo HtmlEncode($patient_an_registration->PresentPregnancyComplicationsOthers->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PresentPregnancyComplicationsOthers" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_PresentPregnancyComplicationsOthers" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_PresentPregnancyComplicationsOthers" value="<?php echo HtmlEncode($patient_an_registration->PresentPregnancyComplicationsOthers->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PresentPregnancyComplicationsOthers" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_PresentPregnancyComplicationsOthers" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_PresentPregnancyComplicationsOthers" value="<?php echo HtmlEncode($patient_an_registration->PresentPregnancyComplicationsOthers->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->ETdate->Visible) { // ETdate ?>
		<td data-name="ETdate"<?php echo $patient_an_registration->ETdate->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_ETdate" class="form-group patient_an_registration_ETdate">
<input type="text" data-table="patient_an_registration" data-field="x_ETdate" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ETdate" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ETdate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->ETdate->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->ETdate->EditValue ?>"<?php echo $patient_an_registration->ETdate->editAttributes() ?>>
<?php if (!$patient_an_registration->ETdate->ReadOnly && !$patient_an_registration->ETdate->Disabled && !isset($patient_an_registration->ETdate->EditAttrs["readonly"]) && !isset($patient_an_registration->ETdate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_ETdate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ETdate" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ETdate" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ETdate" value="<?php echo HtmlEncode($patient_an_registration->ETdate->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_ETdate" class="form-group patient_an_registration_ETdate">
<input type="text" data-table="patient_an_registration" data-field="x_ETdate" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ETdate" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ETdate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->ETdate->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->ETdate->EditValue ?>"<?php echo $patient_an_registration->ETdate->editAttributes() ?>>
<?php if (!$patient_an_registration->ETdate->ReadOnly && !$patient_an_registration->ETdate->Disabled && !isset($patient_an_registration->ETdate->EditAttrs["readonly"]) && !isset($patient_an_registration->ETdate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_ETdate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCnt ?>_patient_an_registration_ETdate" class="patient_an_registration_ETdate">
<span<?php echo $patient_an_registration->ETdate->viewAttributes() ?>>
<?php echo $patient_an_registration->ETdate->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ETdate" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ETdate" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ETdate" value="<?php echo HtmlEncode($patient_an_registration->ETdate->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ETdate" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ETdate" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ETdate" value="<?php echo HtmlEncode($patient_an_registration->ETdate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ETdate" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ETdate" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ETdate" value="<?php echo HtmlEncode($patient_an_registration->ETdate->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ETdate" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ETdate" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ETdate" value="<?php echo HtmlEncode($patient_an_registration->ETdate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_an_registration_grid->ListOptions->render("body", "right", $patient_an_registration_grid->RowCnt);
?>
	</tr>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD || $patient_an_registration->RowType == ROWTYPE_EDIT) { ?>
<script>
fpatient_an_registrationgrid.updateLists(<?php echo $patient_an_registration_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$patient_an_registration->isGridAdd() || $patient_an_registration->CurrentMode == "copy")
		if (!$patient_an_registration_grid->Recordset->EOF)
			$patient_an_registration_grid->Recordset->moveNext();
}
?>
<?php
	if ($patient_an_registration->CurrentMode == "add" || $patient_an_registration->CurrentMode == "copy" || $patient_an_registration->CurrentMode == "edit") {
		$patient_an_registration_grid->RowIndex = '$rowindex$';
		$patient_an_registration_grid->loadRowValues();

		// Set row properties
		$patient_an_registration->resetAttributes();
		$patient_an_registration->RowAttrs = array_merge($patient_an_registration->RowAttrs, array('data-rowindex'=>$patient_an_registration_grid->RowIndex, 'id'=>'r0_patient_an_registration', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($patient_an_registration->RowAttrs["class"], "ew-template");
		$patient_an_registration->RowType = ROWTYPE_ADD;

		// Render row
		$patient_an_registration_grid->renderRow();

		// Render list options
		$patient_an_registration_grid->renderListOptions();
		$patient_an_registration_grid->StartRowCnt = 0;
?>
	<tr<?php echo $patient_an_registration->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_an_registration_grid->ListOptions->render("body", "left", $patient_an_registration_grid->RowIndex);
?>
	<?php if ($patient_an_registration->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_id" class="form-group patient_an_registration_id">
<span<?php echo $patient_an_registration->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_id" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_id" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_an_registration->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_id" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_id" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_an_registration->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->pid->Visible) { // pid ?>
		<td data-name="pid">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<?php if ($patient_an_registration->pid->getSessionValue() <> "") { ?>
<span id="el$rowindex$_patient_an_registration_pid" class="form-group patient_an_registration_pid">
<span<?php echo $patient_an_registration->pid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->pid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_pid" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_pid" value="<?php echo HtmlEncode($patient_an_registration->pid->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_pid" class="form-group patient_an_registration_pid">
<input type="text" data-table="patient_an_registration" data-field="x_pid" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_pid" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_pid" size="30" placeholder="<?php echo HtmlEncode($patient_an_registration->pid->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->pid->EditValue ?>"<?php echo $patient_an_registration->pid->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_pid" class="form-group patient_an_registration_pid">
<span<?php echo $patient_an_registration->pid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->pid->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_pid" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_pid" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_pid" value="<?php echo HtmlEncode($patient_an_registration->pid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_pid" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_pid" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_pid" value="<?php echo HtmlEncode($patient_an_registration->pid->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->fid->Visible) { // fid ?>
		<td data-name="fid">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<?php if ($patient_an_registration->fid->getSessionValue() <> "") { ?>
<span id="el$rowindex$_patient_an_registration_fid" class="form-group patient_an_registration_fid">
<span<?php echo $patient_an_registration->fid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->fid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_fid" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_fid" value="<?php echo HtmlEncode($patient_an_registration->fid->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_fid" class="form-group patient_an_registration_fid">
<input type="text" data-table="patient_an_registration" data-field="x_fid" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_fid" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_fid" size="30" placeholder="<?php echo HtmlEncode($patient_an_registration->fid->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->fid->EditValue ?>"<?php echo $patient_an_registration->fid->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_fid" class="form-group patient_an_registration_fid">
<span<?php echo $patient_an_registration->fid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->fid->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_fid" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_fid" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_fid" value="<?php echo HtmlEncode($patient_an_registration->fid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_fid" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_fid" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_fid" value="<?php echo HtmlEncode($patient_an_registration->fid->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->G->Visible) { // G ?>
		<td data-name="G">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_G" class="form-group patient_an_registration_G">
<input type="text" data-table="patient_an_registration" data-field="x_G" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_G" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_G" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->G->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->G->EditValue ?>"<?php echo $patient_an_registration->G->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_G" class="form-group patient_an_registration_G">
<span<?php echo $patient_an_registration->G->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->G->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_G" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_G" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_G" value="<?php echo HtmlEncode($patient_an_registration->G->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_G" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_G" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_G" value="<?php echo HtmlEncode($patient_an_registration->G->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->P->Visible) { // P ?>
		<td data-name="P">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_P" class="form-group patient_an_registration_P">
<input type="text" data-table="patient_an_registration" data-field="x_P" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_P" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_P" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->P->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->P->EditValue ?>"<?php echo $patient_an_registration->P->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_P" class="form-group patient_an_registration_P">
<span<?php echo $patient_an_registration->P->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->P->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_P" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_P" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_P" value="<?php echo HtmlEncode($patient_an_registration->P->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_P" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_P" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_P" value="<?php echo HtmlEncode($patient_an_registration->P->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->L->Visible) { // L ?>
		<td data-name="L">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_L" class="form-group patient_an_registration_L">
<input type="text" data-table="patient_an_registration" data-field="x_L" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_L" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_L" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->L->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->L->EditValue ?>"<?php echo $patient_an_registration->L->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_L" class="form-group patient_an_registration_L">
<span<?php echo $patient_an_registration->L->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->L->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_L" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_L" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_L" value="<?php echo HtmlEncode($patient_an_registration->L->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_L" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_L" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_L" value="<?php echo HtmlEncode($patient_an_registration->L->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->A->Visible) { // A ?>
		<td data-name="A">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_A" class="form-group patient_an_registration_A">
<input type="text" data-table="patient_an_registration" data-field="x_A" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A->EditValue ?>"<?php echo $patient_an_registration->A->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_A" class="form-group patient_an_registration_A">
<span<?php echo $patient_an_registration->A->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->A->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A" value="<?php echo HtmlEncode($patient_an_registration->A->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A" value="<?php echo HtmlEncode($patient_an_registration->A->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->E->Visible) { // E ?>
		<td data-name="E">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_E" class="form-group patient_an_registration_E">
<input type="text" data-table="patient_an_registration" data-field="x_E" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_E" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_E" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->E->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->E->EditValue ?>"<?php echo $patient_an_registration->E->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_E" class="form-group patient_an_registration_E">
<span<?php echo $patient_an_registration->E->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->E->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_E" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_E" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_E" value="<?php echo HtmlEncode($patient_an_registration->E->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_E" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_E" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_E" value="<?php echo HtmlEncode($patient_an_registration->E->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->M->Visible) { // M ?>
		<td data-name="M">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_M" class="form-group patient_an_registration_M">
<input type="text" data-table="patient_an_registration" data-field="x_M" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_M" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_M" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->M->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->M->EditValue ?>"<?php echo $patient_an_registration->M->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_M" class="form-group patient_an_registration_M">
<span<?php echo $patient_an_registration->M->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->M->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_M" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_M" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_M" value="<?php echo HtmlEncode($patient_an_registration->M->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_M" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_M" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_M" value="<?php echo HtmlEncode($patient_an_registration->M->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->LMP->Visible) { // LMP ?>
		<td data-name="LMP">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_LMP" class="form-group patient_an_registration_LMP">
<input type="text" data-table="patient_an_registration" data-field="x_LMP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_LMP" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_LMP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->LMP->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->LMP->EditValue ?>"<?php echo $patient_an_registration->LMP->editAttributes() ?>>
<?php if (!$patient_an_registration->LMP->ReadOnly && !$patient_an_registration->LMP->Disabled && !isset($patient_an_registration->LMP->EditAttrs["readonly"]) && !isset($patient_an_registration->LMP->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_LMP", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_LMP" class="form-group patient_an_registration_LMP">
<span<?php echo $patient_an_registration->LMP->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->LMP->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_LMP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_LMP" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_LMP" value="<?php echo HtmlEncode($patient_an_registration->LMP->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_LMP" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_LMP" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_LMP" value="<?php echo HtmlEncode($patient_an_registration->LMP->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->EDO->Visible) { // EDO ?>
		<td data-name="EDO">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_EDO" class="form-group patient_an_registration_EDO">
<input type="text" data-table="patient_an_registration" data-field="x_EDO" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EDO" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EDO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->EDO->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->EDO->EditValue ?>"<?php echo $patient_an_registration->EDO->editAttributes() ?>>
<?php if (!$patient_an_registration->EDO->ReadOnly && !$patient_an_registration->EDO->Disabled && !isset($patient_an_registration->EDO->EditAttrs["readonly"]) && !isset($patient_an_registration->EDO->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_EDO", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_EDO" class="form-group patient_an_registration_EDO">
<span<?php echo $patient_an_registration->EDO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->EDO->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_EDO" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EDO" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EDO" value="<?php echo HtmlEncode($patient_an_registration->EDO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_EDO" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_EDO" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_EDO" value="<?php echo HtmlEncode($patient_an_registration->EDO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->MenstrualHistory->Visible) { // MenstrualHistory ?>
		<td data-name="MenstrualHistory">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_MenstrualHistory" class="form-group patient_an_registration_MenstrualHistory">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_MenstrualHistory" data-value-separator="<?php echo $patient_an_registration->MenstrualHistory->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_MenstrualHistory" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_MenstrualHistory"<?php echo $patient_an_registration->MenstrualHistory->editAttributes() ?>>
		<?php echo $patient_an_registration->MenstrualHistory->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_MenstrualHistory") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_MenstrualHistory" class="form-group patient_an_registration_MenstrualHistory">
<span<?php echo $patient_an_registration->MenstrualHistory->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->MenstrualHistory->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_MenstrualHistory" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_MenstrualHistory" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_MenstrualHistory" value="<?php echo HtmlEncode($patient_an_registration->MenstrualHistory->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_MenstrualHistory" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_MenstrualHistory" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_MenstrualHistory" value="<?php echo HtmlEncode($patient_an_registration->MenstrualHistory->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->MaritalHistory->Visible) { // MaritalHistory ?>
		<td data-name="MaritalHistory">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_MaritalHistory" class="form-group patient_an_registration_MaritalHistory">
<input type="text" data-table="patient_an_registration" data-field="x_MaritalHistory" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_MaritalHistory" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_MaritalHistory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->MaritalHistory->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->MaritalHistory->EditValue ?>"<?php echo $patient_an_registration->MaritalHistory->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_MaritalHistory" class="form-group patient_an_registration_MaritalHistory">
<span<?php echo $patient_an_registration->MaritalHistory->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->MaritalHistory->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_MaritalHistory" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_MaritalHistory" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_MaritalHistory" value="<?php echo HtmlEncode($patient_an_registration->MaritalHistory->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_MaritalHistory" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_MaritalHistory" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_MaritalHistory" value="<?php echo HtmlEncode($patient_an_registration->MaritalHistory->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->ObstetricHistory->Visible) { // ObstetricHistory ?>
		<td data-name="ObstetricHistory">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_ObstetricHistory" class="form-group patient_an_registration_ObstetricHistory">
<input type="text" data-table="patient_an_registration" data-field="x_ObstetricHistory" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ObstetricHistory" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ObstetricHistory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->ObstetricHistory->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->ObstetricHistory->EditValue ?>"<?php echo $patient_an_registration->ObstetricHistory->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_ObstetricHistory" class="form-group patient_an_registration_ObstetricHistory">
<span<?php echo $patient_an_registration->ObstetricHistory->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->ObstetricHistory->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ObstetricHistory" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ObstetricHistory" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ObstetricHistory" value="<?php echo HtmlEncode($patient_an_registration->ObstetricHistory->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ObstetricHistory" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ObstetricHistory" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ObstetricHistory" value="<?php echo HtmlEncode($patient_an_registration->ObstetricHistory->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->PreviousHistoryofGDM->Visible) { // PreviousHistoryofGDM ?>
		<td data-name="PreviousHistoryofGDM">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_PreviousHistoryofGDM" class="form-group patient_an_registration_PreviousHistoryofGDM">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_PreviousHistoryofGDM" data-value-separator="<?php echo $patient_an_registration->PreviousHistoryofGDM->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofGDM" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofGDM"<?php echo $patient_an_registration->PreviousHistoryofGDM->editAttributes() ?>>
		<?php echo $patient_an_registration->PreviousHistoryofGDM->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofGDM") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_PreviousHistoryofGDM" class="form-group patient_an_registration_PreviousHistoryofGDM">
<span<?php echo $patient_an_registration->PreviousHistoryofGDM->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->PreviousHistoryofGDM->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofGDM" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofGDM" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofGDM" value="<?php echo HtmlEncode($patient_an_registration->PreviousHistoryofGDM->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofGDM" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofGDM" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofGDM" value="<?php echo HtmlEncode($patient_an_registration->PreviousHistoryofGDM->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->PreviousHistorofPIH->Visible) { // PreviousHistorofPIH ?>
		<td data-name="PreviousHistorofPIH">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_PreviousHistorofPIH" class="form-group patient_an_registration_PreviousHistorofPIH">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_PreviousHistorofPIH" data-value-separator="<?php echo $patient_an_registration->PreviousHistorofPIH->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistorofPIH" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistorofPIH"<?php echo $patient_an_registration->PreviousHistorofPIH->editAttributes() ?>>
		<?php echo $patient_an_registration->PreviousHistorofPIH->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistorofPIH") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_PreviousHistorofPIH" class="form-group patient_an_registration_PreviousHistorofPIH">
<span<?php echo $patient_an_registration->PreviousHistorofPIH->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->PreviousHistorofPIH->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistorofPIH" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistorofPIH" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistorofPIH" value="<?php echo HtmlEncode($patient_an_registration->PreviousHistorofPIH->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistorofPIH" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistorofPIH" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistorofPIH" value="<?php echo HtmlEncode($patient_an_registration->PreviousHistorofPIH->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->PreviousHistoryofIUGR->Visible) { // PreviousHistoryofIUGR ?>
		<td data-name="PreviousHistoryofIUGR">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_PreviousHistoryofIUGR" class="form-group patient_an_registration_PreviousHistoryofIUGR">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_PreviousHistoryofIUGR" data-value-separator="<?php echo $patient_an_registration->PreviousHistoryofIUGR->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofIUGR" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofIUGR"<?php echo $patient_an_registration->PreviousHistoryofIUGR->editAttributes() ?>>
		<?php echo $patient_an_registration->PreviousHistoryofIUGR->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofIUGR") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_PreviousHistoryofIUGR" class="form-group patient_an_registration_PreviousHistoryofIUGR">
<span<?php echo $patient_an_registration->PreviousHistoryofIUGR->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->PreviousHistoryofIUGR->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofIUGR" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofIUGR" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofIUGR" value="<?php echo HtmlEncode($patient_an_registration->PreviousHistoryofIUGR->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofIUGR" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofIUGR" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofIUGR" value="<?php echo HtmlEncode($patient_an_registration->PreviousHistoryofIUGR->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->PreviousHistoryofOligohydramnios->Visible) { // PreviousHistoryofOligohydramnios ?>
		<td data-name="PreviousHistoryofOligohydramnios">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_PreviousHistoryofOligohydramnios" class="form-group patient_an_registration_PreviousHistoryofOligohydramnios">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_PreviousHistoryofOligohydramnios" data-value-separator="<?php echo $patient_an_registration->PreviousHistoryofOligohydramnios->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofOligohydramnios" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofOligohydramnios"<?php echo $patient_an_registration->PreviousHistoryofOligohydramnios->editAttributes() ?>>
		<?php echo $patient_an_registration->PreviousHistoryofOligohydramnios->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofOligohydramnios") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_PreviousHistoryofOligohydramnios" class="form-group patient_an_registration_PreviousHistoryofOligohydramnios">
<span<?php echo $patient_an_registration->PreviousHistoryofOligohydramnios->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->PreviousHistoryofOligohydramnios->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofOligohydramnios" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofOligohydramnios" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofOligohydramnios" value="<?php echo HtmlEncode($patient_an_registration->PreviousHistoryofOligohydramnios->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofOligohydramnios" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofOligohydramnios" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofOligohydramnios" value="<?php echo HtmlEncode($patient_an_registration->PreviousHistoryofOligohydramnios->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->PreviousHistoryofPreterm->Visible) { // PreviousHistoryofPreterm ?>
		<td data-name="PreviousHistoryofPreterm">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_PreviousHistoryofPreterm" class="form-group patient_an_registration_PreviousHistoryofPreterm">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_PreviousHistoryofPreterm" data-value-separator="<?php echo $patient_an_registration->PreviousHistoryofPreterm->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofPreterm" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofPreterm"<?php echo $patient_an_registration->PreviousHistoryofPreterm->editAttributes() ?>>
		<?php echo $patient_an_registration->PreviousHistoryofPreterm->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofPreterm") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_PreviousHistoryofPreterm" class="form-group patient_an_registration_PreviousHistoryofPreterm">
<span<?php echo $patient_an_registration->PreviousHistoryofPreterm->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->PreviousHistoryofPreterm->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofPreterm" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofPreterm" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofPreterm" value="<?php echo HtmlEncode($patient_an_registration->PreviousHistoryofPreterm->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofPreterm" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofPreterm" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofPreterm" value="<?php echo HtmlEncode($patient_an_registration->PreviousHistoryofPreterm->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->G1->Visible) { // G1 ?>
		<td data-name="G1">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_G1" class="form-group patient_an_registration_G1">
<input type="text" data-table="patient_an_registration" data-field="x_G1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_G1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_G1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->G1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->G1->EditValue ?>"<?php echo $patient_an_registration->G1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_G1" class="form-group patient_an_registration_G1">
<span<?php echo $patient_an_registration->G1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->G1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_G1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_G1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_G1" value="<?php echo HtmlEncode($patient_an_registration->G1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_G1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_G1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_G1" value="<?php echo HtmlEncode($patient_an_registration->G1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->G2->Visible) { // G2 ?>
		<td data-name="G2">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_G2" class="form-group patient_an_registration_G2">
<input type="text" data-table="patient_an_registration" data-field="x_G2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_G2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_G2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->G2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->G2->EditValue ?>"<?php echo $patient_an_registration->G2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_G2" class="form-group patient_an_registration_G2">
<span<?php echo $patient_an_registration->G2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->G2->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_G2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_G2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_G2" value="<?php echo HtmlEncode($patient_an_registration->G2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_G2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_G2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_G2" value="<?php echo HtmlEncode($patient_an_registration->G2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->G3->Visible) { // G3 ?>
		<td data-name="G3">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_G3" class="form-group patient_an_registration_G3">
<input type="text" data-table="patient_an_registration" data-field="x_G3" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_G3" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_G3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->G3->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->G3->EditValue ?>"<?php echo $patient_an_registration->G3->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_G3" class="form-group patient_an_registration_G3">
<span<?php echo $patient_an_registration->G3->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->G3->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_G3" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_G3" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_G3" value="<?php echo HtmlEncode($patient_an_registration->G3->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_G3" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_G3" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_G3" value="<?php echo HtmlEncode($patient_an_registration->G3->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->DeliveryNDLSCS1->Visible) { // DeliveryNDLSCS1 ?>
		<td data-name="DeliveryNDLSCS1">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_DeliveryNDLSCS1" class="form-group patient_an_registration_DeliveryNDLSCS1">
<input type="text" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->DeliveryNDLSCS1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->DeliveryNDLSCS1->EditValue ?>"<?php echo $patient_an_registration->DeliveryNDLSCS1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_DeliveryNDLSCS1" class="form-group patient_an_registration_DeliveryNDLSCS1">
<span<?php echo $patient_an_registration->DeliveryNDLSCS1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->DeliveryNDLSCS1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS1" value="<?php echo HtmlEncode($patient_an_registration->DeliveryNDLSCS1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS1" value="<?php echo HtmlEncode($patient_an_registration->DeliveryNDLSCS1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->DeliveryNDLSCS2->Visible) { // DeliveryNDLSCS2 ?>
		<td data-name="DeliveryNDLSCS2">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_DeliveryNDLSCS2" class="form-group patient_an_registration_DeliveryNDLSCS2">
<input type="text" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->DeliveryNDLSCS2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->DeliveryNDLSCS2->EditValue ?>"<?php echo $patient_an_registration->DeliveryNDLSCS2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_DeliveryNDLSCS2" class="form-group patient_an_registration_DeliveryNDLSCS2">
<span<?php echo $patient_an_registration->DeliveryNDLSCS2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->DeliveryNDLSCS2->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS2" value="<?php echo HtmlEncode($patient_an_registration->DeliveryNDLSCS2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS2" value="<?php echo HtmlEncode($patient_an_registration->DeliveryNDLSCS2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->DeliveryNDLSCS3->Visible) { // DeliveryNDLSCS3 ?>
		<td data-name="DeliveryNDLSCS3">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_DeliveryNDLSCS3" class="form-group patient_an_registration_DeliveryNDLSCS3">
<input type="text" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS3" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS3" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->DeliveryNDLSCS3->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->DeliveryNDLSCS3->EditValue ?>"<?php echo $patient_an_registration->DeliveryNDLSCS3->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_DeliveryNDLSCS3" class="form-group patient_an_registration_DeliveryNDLSCS3">
<span<?php echo $patient_an_registration->DeliveryNDLSCS3->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->DeliveryNDLSCS3->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS3" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS3" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS3" value="<?php echo HtmlEncode($patient_an_registration->DeliveryNDLSCS3->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS3" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS3" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS3" value="<?php echo HtmlEncode($patient_an_registration->DeliveryNDLSCS3->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->BabySexweight1->Visible) { // BabySexweight1 ?>
		<td data-name="BabySexweight1">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_BabySexweight1" class="form-group patient_an_registration_BabySexweight1">
<input type="text" data-table="patient_an_registration" data-field="x_BabySexweight1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->BabySexweight1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->BabySexweight1->EditValue ?>"<?php echo $patient_an_registration->BabySexweight1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_BabySexweight1" class="form-group patient_an_registration_BabySexweight1">
<span<?php echo $patient_an_registration->BabySexweight1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->BabySexweight1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight1" value="<?php echo HtmlEncode($patient_an_registration->BabySexweight1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight1" value="<?php echo HtmlEncode($patient_an_registration->BabySexweight1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->BabySexweight2->Visible) { // BabySexweight2 ?>
		<td data-name="BabySexweight2">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_BabySexweight2" class="form-group patient_an_registration_BabySexweight2">
<input type="text" data-table="patient_an_registration" data-field="x_BabySexweight2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->BabySexweight2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->BabySexweight2->EditValue ?>"<?php echo $patient_an_registration->BabySexweight2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_BabySexweight2" class="form-group patient_an_registration_BabySexweight2">
<span<?php echo $patient_an_registration->BabySexweight2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->BabySexweight2->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight2" value="<?php echo HtmlEncode($patient_an_registration->BabySexweight2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight2" value="<?php echo HtmlEncode($patient_an_registration->BabySexweight2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->BabySexweight3->Visible) { // BabySexweight3 ?>
		<td data-name="BabySexweight3">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_BabySexweight3" class="form-group patient_an_registration_BabySexweight3">
<input type="text" data-table="patient_an_registration" data-field="x_BabySexweight3" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight3" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->BabySexweight3->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->BabySexweight3->EditValue ?>"<?php echo $patient_an_registration->BabySexweight3->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_BabySexweight3" class="form-group patient_an_registration_BabySexweight3">
<span<?php echo $patient_an_registration->BabySexweight3->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->BabySexweight3->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight3" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight3" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight3" value="<?php echo HtmlEncode($patient_an_registration->BabySexweight3->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight3" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight3" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight3" value="<?php echo HtmlEncode($patient_an_registration->BabySexweight3->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->PastMedicalHistory->Visible) { // PastMedicalHistory ?>
		<td data-name="PastMedicalHistory">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_PastMedicalHistory" class="form-group patient_an_registration_PastMedicalHistory">
<div id="tp_x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_an_registration" data-field="x_PastMedicalHistory" data-value-separator="<?php echo $patient_an_registration->PastMedicalHistory->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory[]" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory[]" value="{value}"<?php echo $patient_an_registration->PastMedicalHistory->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_an_registration->PastMedicalHistory->checkBoxListHtml(FALSE, "x{$patient_an_registration_grid->RowIndex}_PastMedicalHistory[]") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_PastMedicalHistory" class="form-group patient_an_registration_PastMedicalHistory">
<span<?php echo $patient_an_registration->PastMedicalHistory->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->PastMedicalHistory->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastMedicalHistory" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory" value="<?php echo HtmlEncode($patient_an_registration->PastMedicalHistory->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastMedicalHistory" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory[]" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory[]" value="<?php echo HtmlEncode($patient_an_registration->PastMedicalHistory->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->PastSurgicalHistory->Visible) { // PastSurgicalHistory ?>
		<td data-name="PastSurgicalHistory">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_PastSurgicalHistory" class="form-group patient_an_registration_PastSurgicalHistory">
<div id="tp_x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_an_registration" data-field="x_PastSurgicalHistory" data-value-separator="<?php echo $patient_an_registration->PastSurgicalHistory->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory[]" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory[]" value="{value}"<?php echo $patient_an_registration->PastSurgicalHistory->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_an_registration->PastSurgicalHistory->checkBoxListHtml(FALSE, "x{$patient_an_registration_grid->RowIndex}_PastSurgicalHistory[]") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_PastSurgicalHistory" class="form-group patient_an_registration_PastSurgicalHistory">
<span<?php echo $patient_an_registration->PastSurgicalHistory->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->PastSurgicalHistory->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastSurgicalHistory" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory" value="<?php echo HtmlEncode($patient_an_registration->PastSurgicalHistory->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastSurgicalHistory" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory[]" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory[]" value="<?php echo HtmlEncode($patient_an_registration->PastSurgicalHistory->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->FamilyHistory->Visible) { // FamilyHistory ?>
		<td data-name="FamilyHistory">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_FamilyHistory" class="form-group patient_an_registration_FamilyHistory">
<div id="tp_x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_an_registration" data-field="x_FamilyHistory" data-value-separator="<?php echo $patient_an_registration->FamilyHistory->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory[]" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory[]" value="{value}"<?php echo $patient_an_registration->FamilyHistory->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_an_registration->FamilyHistory->checkBoxListHtml(FALSE, "x{$patient_an_registration_grid->RowIndex}_FamilyHistory[]") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_FamilyHistory" class="form-group patient_an_registration_FamilyHistory">
<span<?php echo $patient_an_registration->FamilyHistory->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->FamilyHistory->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_FamilyHistory" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory" value="<?php echo HtmlEncode($patient_an_registration->FamilyHistory->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_FamilyHistory" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory[]" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory[]" value="<?php echo HtmlEncode($patient_an_registration->FamilyHistory->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Viability->Visible) { // Viability ?>
		<td data-name="Viability">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Viability" class="form-group patient_an_registration_Viability">
<input type="text" data-table="patient_an_registration" data-field="x_Viability" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Viability->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Viability->EditValue ?>"<?php echo $patient_an_registration->Viability->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Viability" class="form-group patient_an_registration_Viability">
<span<?php echo $patient_an_registration->Viability->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->Viability->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability" value="<?php echo HtmlEncode($patient_an_registration->Viability->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability" value="<?php echo HtmlEncode($patient_an_registration->Viability->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->ViabilityDATE->Visible) { // ViabilityDATE ?>
		<td data-name="ViabilityDATE">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_ViabilityDATE" class="form-group patient_an_registration_ViabilityDATE">
<input type="text" data-table="patient_an_registration" data-field="x_ViabilityDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->ViabilityDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->ViabilityDATE->EditValue ?>"<?php echo $patient_an_registration->ViabilityDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->ViabilityDATE->ReadOnly && !$patient_an_registration->ViabilityDATE->Disabled && !isset($patient_an_registration->ViabilityDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->ViabilityDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_ViabilityDATE" class="form-group patient_an_registration_ViabilityDATE">
<span<?php echo $patient_an_registration->ViabilityDATE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->ViabilityDATE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ViabilityDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityDATE" value="<?php echo HtmlEncode($patient_an_registration->ViabilityDATE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ViabilityDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityDATE" value="<?php echo HtmlEncode($patient_an_registration->ViabilityDATE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->ViabilityREPORT->Visible) { // ViabilityREPORT ?>
		<td data-name="ViabilityREPORT">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_ViabilityREPORT" class="form-group patient_an_registration_ViabilityREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_ViabilityREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->ViabilityREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->ViabilityREPORT->EditValue ?>"<?php echo $patient_an_registration->ViabilityREPORT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_ViabilityREPORT" class="form-group patient_an_registration_ViabilityREPORT">
<span<?php echo $patient_an_registration->ViabilityREPORT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->ViabilityREPORT->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ViabilityREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityREPORT" value="<?php echo HtmlEncode($patient_an_registration->ViabilityREPORT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ViabilityREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityREPORT" value="<?php echo HtmlEncode($patient_an_registration->ViabilityREPORT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Viability2->Visible) { // Viability2 ?>
		<td data-name="Viability2">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Viability2" class="form-group patient_an_registration_Viability2">
<input type="text" data-table="patient_an_registration" data-field="x_Viability2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Viability2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Viability2->EditValue ?>"<?php echo $patient_an_registration->Viability2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Viability2" class="form-group patient_an_registration_Viability2">
<span<?php echo $patient_an_registration->Viability2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->Viability2->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2" value="<?php echo HtmlEncode($patient_an_registration->Viability2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2" value="<?php echo HtmlEncode($patient_an_registration->Viability2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Viability2DATE->Visible) { // Viability2DATE ?>
		<td data-name="Viability2DATE">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Viability2DATE" class="form-group patient_an_registration_Viability2DATE">
<input type="text" data-table="patient_an_registration" data-field="x_Viability2DATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2DATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2DATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Viability2DATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Viability2DATE->EditValue ?>"<?php echo $patient_an_registration->Viability2DATE->editAttributes() ?>>
<?php if (!$patient_an_registration->Viability2DATE->ReadOnly && !$patient_an_registration->Viability2DATE->Disabled && !isset($patient_an_registration->Viability2DATE->EditAttrs["readonly"]) && !isset($patient_an_registration->Viability2DATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2DATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Viability2DATE" class="form-group patient_an_registration_Viability2DATE">
<span<?php echo $patient_an_registration->Viability2DATE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->Viability2DATE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2DATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2DATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2DATE" value="<?php echo HtmlEncode($patient_an_registration->Viability2DATE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2DATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2DATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2DATE" value="<?php echo HtmlEncode($patient_an_registration->Viability2DATE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Viability2REPORT->Visible) { // Viability2REPORT ?>
		<td data-name="Viability2REPORT">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Viability2REPORT" class="form-group patient_an_registration_Viability2REPORT">
<input type="text" data-table="patient_an_registration" data-field="x_Viability2REPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2REPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2REPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Viability2REPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Viability2REPORT->EditValue ?>"<?php echo $patient_an_registration->Viability2REPORT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Viability2REPORT" class="form-group patient_an_registration_Viability2REPORT">
<span<?php echo $patient_an_registration->Viability2REPORT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->Viability2REPORT->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2REPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2REPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2REPORT" value="<?php echo HtmlEncode($patient_an_registration->Viability2REPORT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2REPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2REPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2REPORT" value="<?php echo HtmlEncode($patient_an_registration->Viability2REPORT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->NTscan->Visible) { // NTscan ?>
		<td data-name="NTscan">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_NTscan" class="form-group patient_an_registration_NTscan">
<input type="text" data-table="patient_an_registration" data-field="x_NTscan" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscan" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscan" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->NTscan->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->NTscan->EditValue ?>"<?php echo $patient_an_registration->NTscan->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_NTscan" class="form-group patient_an_registration_NTscan">
<span<?php echo $patient_an_registration->NTscan->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->NTscan->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscan" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscan" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscan" value="<?php echo HtmlEncode($patient_an_registration->NTscan->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscan" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_NTscan" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_NTscan" value="<?php echo HtmlEncode($patient_an_registration->NTscan->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->NTscanDATE->Visible) { // NTscanDATE ?>
		<td data-name="NTscanDATE">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_NTscanDATE" class="form-group patient_an_registration_NTscanDATE">
<input type="text" data-table="patient_an_registration" data-field="x_NTscanDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->NTscanDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->NTscanDATE->EditValue ?>"<?php echo $patient_an_registration->NTscanDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->NTscanDATE->ReadOnly && !$patient_an_registration->NTscanDATE->Disabled && !isset($patient_an_registration->NTscanDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->NTscanDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_NTscanDATE" class="form-group patient_an_registration_NTscanDATE">
<span<?php echo $patient_an_registration->NTscanDATE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->NTscanDATE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscanDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanDATE" value="<?php echo HtmlEncode($patient_an_registration->NTscanDATE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscanDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanDATE" value="<?php echo HtmlEncode($patient_an_registration->NTscanDATE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->NTscanREPORT->Visible) { // NTscanREPORT ?>
		<td data-name="NTscanREPORT">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_NTscanREPORT" class="form-group patient_an_registration_NTscanREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_NTscanREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->NTscanREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->NTscanREPORT->EditValue ?>"<?php echo $patient_an_registration->NTscanREPORT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_NTscanREPORT" class="form-group patient_an_registration_NTscanREPORT">
<span<?php echo $patient_an_registration->NTscanREPORT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->NTscanREPORT->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscanREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanREPORT" value="<?php echo HtmlEncode($patient_an_registration->NTscanREPORT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscanREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanREPORT" value="<?php echo HtmlEncode($patient_an_registration->NTscanREPORT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->EarlyTarget->Visible) { // EarlyTarget ?>
		<td data-name="EarlyTarget">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_EarlyTarget" class="form-group patient_an_registration_EarlyTarget">
<input type="text" data-table="patient_an_registration" data-field="x_EarlyTarget" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTarget" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTarget" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->EarlyTarget->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->EarlyTarget->EditValue ?>"<?php echo $patient_an_registration->EarlyTarget->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_EarlyTarget" class="form-group patient_an_registration_EarlyTarget">
<span<?php echo $patient_an_registration->EarlyTarget->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->EarlyTarget->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTarget" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTarget" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTarget" value="<?php echo HtmlEncode($patient_an_registration->EarlyTarget->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTarget" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTarget" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTarget" value="<?php echo HtmlEncode($patient_an_registration->EarlyTarget->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->EarlyTargetDATE->Visible) { // EarlyTargetDATE ?>
		<td data-name="EarlyTargetDATE">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_EarlyTargetDATE" class="form-group patient_an_registration_EarlyTargetDATE">
<input type="text" data-table="patient_an_registration" data-field="x_EarlyTargetDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->EarlyTargetDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->EarlyTargetDATE->EditValue ?>"<?php echo $patient_an_registration->EarlyTargetDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->EarlyTargetDATE->ReadOnly && !$patient_an_registration->EarlyTargetDATE->Disabled && !isset($patient_an_registration->EarlyTargetDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->EarlyTargetDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_EarlyTargetDATE" class="form-group patient_an_registration_EarlyTargetDATE">
<span<?php echo $patient_an_registration->EarlyTargetDATE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->EarlyTargetDATE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTargetDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetDATE" value="<?php echo HtmlEncode($patient_an_registration->EarlyTargetDATE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTargetDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetDATE" value="<?php echo HtmlEncode($patient_an_registration->EarlyTargetDATE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->EarlyTargetREPORT->Visible) { // EarlyTargetREPORT ?>
		<td data-name="EarlyTargetREPORT">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_EarlyTargetREPORT" class="form-group patient_an_registration_EarlyTargetREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_EarlyTargetREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->EarlyTargetREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->EarlyTargetREPORT->EditValue ?>"<?php echo $patient_an_registration->EarlyTargetREPORT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_EarlyTargetREPORT" class="form-group patient_an_registration_EarlyTargetREPORT">
<span<?php echo $patient_an_registration->EarlyTargetREPORT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->EarlyTargetREPORT->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTargetREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetREPORT" value="<?php echo HtmlEncode($patient_an_registration->EarlyTargetREPORT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTargetREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetREPORT" value="<?php echo HtmlEncode($patient_an_registration->EarlyTargetREPORT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Anomaly->Visible) { // Anomaly ?>
		<td data-name="Anomaly">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Anomaly" class="form-group patient_an_registration_Anomaly">
<input type="text" data-table="patient_an_registration" data-field="x_Anomaly" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Anomaly" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Anomaly" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Anomaly->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Anomaly->EditValue ?>"<?php echo $patient_an_registration->Anomaly->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Anomaly" class="form-group patient_an_registration_Anomaly">
<span<?php echo $patient_an_registration->Anomaly->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->Anomaly->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Anomaly" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Anomaly" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Anomaly" value="<?php echo HtmlEncode($patient_an_registration->Anomaly->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Anomaly" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Anomaly" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Anomaly" value="<?php echo HtmlEncode($patient_an_registration->Anomaly->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->AnomalyDATE->Visible) { // AnomalyDATE ?>
		<td data-name="AnomalyDATE">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_AnomalyDATE" class="form-group patient_an_registration_AnomalyDATE">
<input type="text" data-table="patient_an_registration" data-field="x_AnomalyDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->AnomalyDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->AnomalyDATE->EditValue ?>"<?php echo $patient_an_registration->AnomalyDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->AnomalyDATE->ReadOnly && !$patient_an_registration->AnomalyDATE->Disabled && !isset($patient_an_registration->AnomalyDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->AnomalyDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_AnomalyDATE" class="form-group patient_an_registration_AnomalyDATE">
<span<?php echo $patient_an_registration->AnomalyDATE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->AnomalyDATE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_AnomalyDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyDATE" value="<?php echo HtmlEncode($patient_an_registration->AnomalyDATE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_AnomalyDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyDATE" value="<?php echo HtmlEncode($patient_an_registration->AnomalyDATE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->AnomalyREPORT->Visible) { // AnomalyREPORT ?>
		<td data-name="AnomalyREPORT">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_AnomalyREPORT" class="form-group patient_an_registration_AnomalyREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_AnomalyREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->AnomalyREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->AnomalyREPORT->EditValue ?>"<?php echo $patient_an_registration->AnomalyREPORT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_AnomalyREPORT" class="form-group patient_an_registration_AnomalyREPORT">
<span<?php echo $patient_an_registration->AnomalyREPORT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->AnomalyREPORT->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_AnomalyREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyREPORT" value="<?php echo HtmlEncode($patient_an_registration->AnomalyREPORT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_AnomalyREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyREPORT" value="<?php echo HtmlEncode($patient_an_registration->AnomalyREPORT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Growth->Visible) { // Growth ?>
		<td data-name="Growth">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Growth" class="form-group patient_an_registration_Growth">
<input type="text" data-table="patient_an_registration" data-field="x_Growth" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Growth->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Growth->EditValue ?>"<?php echo $patient_an_registration->Growth->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Growth" class="form-group patient_an_registration_Growth">
<span<?php echo $patient_an_registration->Growth->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->Growth->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth" value="<?php echo HtmlEncode($patient_an_registration->Growth->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth" value="<?php echo HtmlEncode($patient_an_registration->Growth->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->GrowthDATE->Visible) { // GrowthDATE ?>
		<td data-name="GrowthDATE">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_GrowthDATE" class="form-group patient_an_registration_GrowthDATE">
<input type="text" data-table="patient_an_registration" data-field="x_GrowthDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->GrowthDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->GrowthDATE->EditValue ?>"<?php echo $patient_an_registration->GrowthDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->GrowthDATE->ReadOnly && !$patient_an_registration->GrowthDATE->Disabled && !isset($patient_an_registration->GrowthDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->GrowthDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_GrowthDATE" class="form-group patient_an_registration_GrowthDATE">
<span<?php echo $patient_an_registration->GrowthDATE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->GrowthDATE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_GrowthDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthDATE" value="<?php echo HtmlEncode($patient_an_registration->GrowthDATE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_GrowthDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthDATE" value="<?php echo HtmlEncode($patient_an_registration->GrowthDATE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->GrowthREPORT->Visible) { // GrowthREPORT ?>
		<td data-name="GrowthREPORT">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_GrowthREPORT" class="form-group patient_an_registration_GrowthREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_GrowthREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->GrowthREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->GrowthREPORT->EditValue ?>"<?php echo $patient_an_registration->GrowthREPORT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_GrowthREPORT" class="form-group patient_an_registration_GrowthREPORT">
<span<?php echo $patient_an_registration->GrowthREPORT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->GrowthREPORT->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_GrowthREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthREPORT" value="<?php echo HtmlEncode($patient_an_registration->GrowthREPORT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_GrowthREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthREPORT" value="<?php echo HtmlEncode($patient_an_registration->GrowthREPORT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Growth1->Visible) { // Growth1 ?>
		<td data-name="Growth1">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Growth1" class="form-group patient_an_registration_Growth1">
<input type="text" data-table="patient_an_registration" data-field="x_Growth1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Growth1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Growth1->EditValue ?>"<?php echo $patient_an_registration->Growth1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Growth1" class="form-group patient_an_registration_Growth1">
<span<?php echo $patient_an_registration->Growth1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->Growth1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1" value="<?php echo HtmlEncode($patient_an_registration->Growth1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1" value="<?php echo HtmlEncode($patient_an_registration->Growth1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Growth1DATE->Visible) { // Growth1DATE ?>
		<td data-name="Growth1DATE">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Growth1DATE" class="form-group patient_an_registration_Growth1DATE">
<input type="text" data-table="patient_an_registration" data-field="x_Growth1DATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1DATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1DATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Growth1DATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Growth1DATE->EditValue ?>"<?php echo $patient_an_registration->Growth1DATE->editAttributes() ?>>
<?php if (!$patient_an_registration->Growth1DATE->ReadOnly && !$patient_an_registration->Growth1DATE->Disabled && !isset($patient_an_registration->Growth1DATE->EditAttrs["readonly"]) && !isset($patient_an_registration->Growth1DATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1DATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Growth1DATE" class="form-group patient_an_registration_Growth1DATE">
<span<?php echo $patient_an_registration->Growth1DATE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->Growth1DATE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1DATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1DATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1DATE" value="<?php echo HtmlEncode($patient_an_registration->Growth1DATE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1DATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1DATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1DATE" value="<?php echo HtmlEncode($patient_an_registration->Growth1DATE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Growth1REPORT->Visible) { // Growth1REPORT ?>
		<td data-name="Growth1REPORT">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Growth1REPORT" class="form-group patient_an_registration_Growth1REPORT">
<input type="text" data-table="patient_an_registration" data-field="x_Growth1REPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1REPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1REPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Growth1REPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Growth1REPORT->EditValue ?>"<?php echo $patient_an_registration->Growth1REPORT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Growth1REPORT" class="form-group patient_an_registration_Growth1REPORT">
<span<?php echo $patient_an_registration->Growth1REPORT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->Growth1REPORT->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1REPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1REPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1REPORT" value="<?php echo HtmlEncode($patient_an_registration->Growth1REPORT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1REPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1REPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1REPORT" value="<?php echo HtmlEncode($patient_an_registration->Growth1REPORT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->ANProfile->Visible) { // ANProfile ?>
		<td data-name="ANProfile">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_ANProfile" class="form-group patient_an_registration_ANProfile">
<input type="text" data-table="patient_an_registration" data-field="x_ANProfile" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfile" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->ANProfile->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->ANProfile->EditValue ?>"<?php echo $patient_an_registration->ANProfile->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_ANProfile" class="form-group patient_an_registration_ANProfile">
<span<?php echo $patient_an_registration->ANProfile->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->ANProfile->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfile" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfile" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfile" value="<?php echo HtmlEncode($patient_an_registration->ANProfile->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfile" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfile" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfile" value="<?php echo HtmlEncode($patient_an_registration->ANProfile->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->ANProfileDATE->Visible) { // ANProfileDATE ?>
		<td data-name="ANProfileDATE">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_ANProfileDATE" class="form-group patient_an_registration_ANProfileDATE">
<input type="text" data-table="patient_an_registration" data-field="x_ANProfileDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->ANProfileDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->ANProfileDATE->EditValue ?>"<?php echo $patient_an_registration->ANProfileDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->ANProfileDATE->ReadOnly && !$patient_an_registration->ANProfileDATE->Disabled && !isset($patient_an_registration->ANProfileDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->ANProfileDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_ANProfileDATE" class="form-group patient_an_registration_ANProfileDATE">
<span<?php echo $patient_an_registration->ANProfileDATE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->ANProfileDATE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileDATE" value="<?php echo HtmlEncode($patient_an_registration->ANProfileDATE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileDATE" value="<?php echo HtmlEncode($patient_an_registration->ANProfileDATE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->ANProfileINHOUSE->Visible) { // ANProfileINHOUSE ?>
		<td data-name="ANProfileINHOUSE">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_ANProfileINHOUSE" class="form-group patient_an_registration_ANProfileINHOUSE">
<input type="text" data-table="patient_an_registration" data-field="x_ANProfileINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->ANProfileINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->ANProfileINHOUSE->EditValue ?>"<?php echo $patient_an_registration->ANProfileINHOUSE->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_ANProfileINHOUSE" class="form-group patient_an_registration_ANProfileINHOUSE">
<span<?php echo $patient_an_registration->ANProfileINHOUSE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->ANProfileINHOUSE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->ANProfileINHOUSE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileINHOUSE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileINHOUSE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->ANProfileINHOUSE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->ANProfileREPORT->Visible) { // ANProfileREPORT ?>
		<td data-name="ANProfileREPORT">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_ANProfileREPORT" class="form-group patient_an_registration_ANProfileREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_ANProfileREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->ANProfileREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->ANProfileREPORT->EditValue ?>"<?php echo $patient_an_registration->ANProfileREPORT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_ANProfileREPORT" class="form-group patient_an_registration_ANProfileREPORT">
<span<?php echo $patient_an_registration->ANProfileREPORT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->ANProfileREPORT->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileREPORT" value="<?php echo HtmlEncode($patient_an_registration->ANProfileREPORT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileREPORT" value="<?php echo HtmlEncode($patient_an_registration->ANProfileREPORT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->DualMarker->Visible) { // DualMarker ?>
		<td data-name="DualMarker">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_DualMarker" class="form-group patient_an_registration_DualMarker">
<input type="text" data-table="patient_an_registration" data-field="x_DualMarker" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarker" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarker" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->DualMarker->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->DualMarker->EditValue ?>"<?php echo $patient_an_registration->DualMarker->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_DualMarker" class="form-group patient_an_registration_DualMarker">
<span<?php echo $patient_an_registration->DualMarker->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->DualMarker->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarker" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarker" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarker" value="<?php echo HtmlEncode($patient_an_registration->DualMarker->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarker" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarker" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarker" value="<?php echo HtmlEncode($patient_an_registration->DualMarker->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->DualMarkerDATE->Visible) { // DualMarkerDATE ?>
		<td data-name="DualMarkerDATE">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_DualMarkerDATE" class="form-group patient_an_registration_DualMarkerDATE">
<input type="text" data-table="patient_an_registration" data-field="x_DualMarkerDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->DualMarkerDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->DualMarkerDATE->EditValue ?>"<?php echo $patient_an_registration->DualMarkerDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->DualMarkerDATE->ReadOnly && !$patient_an_registration->DualMarkerDATE->Disabled && !isset($patient_an_registration->DualMarkerDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->DualMarkerDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_DualMarkerDATE" class="form-group patient_an_registration_DualMarkerDATE">
<span<?php echo $patient_an_registration->DualMarkerDATE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->DualMarkerDATE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerDATE" value="<?php echo HtmlEncode($patient_an_registration->DualMarkerDATE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerDATE" value="<?php echo HtmlEncode($patient_an_registration->DualMarkerDATE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->DualMarkerINHOUSE->Visible) { // DualMarkerINHOUSE ?>
		<td data-name="DualMarkerINHOUSE">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_DualMarkerINHOUSE" class="form-group patient_an_registration_DualMarkerINHOUSE">
<input type="text" data-table="patient_an_registration" data-field="x_DualMarkerINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->DualMarkerINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->DualMarkerINHOUSE->EditValue ?>"<?php echo $patient_an_registration->DualMarkerINHOUSE->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_DualMarkerINHOUSE" class="form-group patient_an_registration_DualMarkerINHOUSE">
<span<?php echo $patient_an_registration->DualMarkerINHOUSE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->DualMarkerINHOUSE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->DualMarkerINHOUSE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerINHOUSE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerINHOUSE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->DualMarkerINHOUSE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->DualMarkerREPORT->Visible) { // DualMarkerREPORT ?>
		<td data-name="DualMarkerREPORT">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_DualMarkerREPORT" class="form-group patient_an_registration_DualMarkerREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_DualMarkerREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->DualMarkerREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->DualMarkerREPORT->EditValue ?>"<?php echo $patient_an_registration->DualMarkerREPORT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_DualMarkerREPORT" class="form-group patient_an_registration_DualMarkerREPORT">
<span<?php echo $patient_an_registration->DualMarkerREPORT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->DualMarkerREPORT->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerREPORT" value="<?php echo HtmlEncode($patient_an_registration->DualMarkerREPORT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerREPORT" value="<?php echo HtmlEncode($patient_an_registration->DualMarkerREPORT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Quadruple->Visible) { // Quadruple ?>
		<td data-name="Quadruple">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Quadruple" class="form-group patient_an_registration_Quadruple">
<input type="text" data-table="patient_an_registration" data-field="x_Quadruple" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Quadruple" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Quadruple" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Quadruple->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Quadruple->EditValue ?>"<?php echo $patient_an_registration->Quadruple->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Quadruple" class="form-group patient_an_registration_Quadruple">
<span<?php echo $patient_an_registration->Quadruple->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->Quadruple->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Quadruple" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Quadruple" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Quadruple" value="<?php echo HtmlEncode($patient_an_registration->Quadruple->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Quadruple" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Quadruple" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Quadruple" value="<?php echo HtmlEncode($patient_an_registration->Quadruple->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->QuadrupleDATE->Visible) { // QuadrupleDATE ?>
		<td data-name="QuadrupleDATE">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_QuadrupleDATE" class="form-group patient_an_registration_QuadrupleDATE">
<input type="text" data-table="patient_an_registration" data-field="x_QuadrupleDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->QuadrupleDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->QuadrupleDATE->EditValue ?>"<?php echo $patient_an_registration->QuadrupleDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->QuadrupleDATE->ReadOnly && !$patient_an_registration->QuadrupleDATE->Disabled && !isset($patient_an_registration->QuadrupleDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->QuadrupleDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_QuadrupleDATE" class="form-group patient_an_registration_QuadrupleDATE">
<span<?php echo $patient_an_registration->QuadrupleDATE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->QuadrupleDATE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleDATE" value="<?php echo HtmlEncode($patient_an_registration->QuadrupleDATE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleDATE" value="<?php echo HtmlEncode($patient_an_registration->QuadrupleDATE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->QuadrupleINHOUSE->Visible) { // QuadrupleINHOUSE ?>
		<td data-name="QuadrupleINHOUSE">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_QuadrupleINHOUSE" class="form-group patient_an_registration_QuadrupleINHOUSE">
<input type="text" data-table="patient_an_registration" data-field="x_QuadrupleINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->QuadrupleINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->QuadrupleINHOUSE->EditValue ?>"<?php echo $patient_an_registration->QuadrupleINHOUSE->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_QuadrupleINHOUSE" class="form-group patient_an_registration_QuadrupleINHOUSE">
<span<?php echo $patient_an_registration->QuadrupleINHOUSE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->QuadrupleINHOUSE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->QuadrupleINHOUSE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleINHOUSE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleINHOUSE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->QuadrupleINHOUSE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->QuadrupleREPORT->Visible) { // QuadrupleREPORT ?>
		<td data-name="QuadrupleREPORT">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_QuadrupleREPORT" class="form-group patient_an_registration_QuadrupleREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_QuadrupleREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->QuadrupleREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->QuadrupleREPORT->EditValue ?>"<?php echo $patient_an_registration->QuadrupleREPORT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_QuadrupleREPORT" class="form-group patient_an_registration_QuadrupleREPORT">
<span<?php echo $patient_an_registration->QuadrupleREPORT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->QuadrupleREPORT->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleREPORT" value="<?php echo HtmlEncode($patient_an_registration->QuadrupleREPORT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleREPORT" value="<?php echo HtmlEncode($patient_an_registration->QuadrupleREPORT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->A5month->Visible) { // A5month ?>
		<td data-name="A5month">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_A5month" class="form-group patient_an_registration_A5month">
<input type="text" data-table="patient_an_registration" data-field="x_A5month" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5month" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5month" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A5month->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A5month->EditValue ?>"<?php echo $patient_an_registration->A5month->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_A5month" class="form-group patient_an_registration_A5month">
<span<?php echo $patient_an_registration->A5month->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->A5month->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5month" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5month" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5month" value="<?php echo HtmlEncode($patient_an_registration->A5month->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5month" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A5month" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A5month" value="<?php echo HtmlEncode($patient_an_registration->A5month->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->A5monthDATE->Visible) { // A5monthDATE ?>
		<td data-name="A5monthDATE">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_A5monthDATE" class="form-group patient_an_registration_A5monthDATE">
<input type="text" data-table="patient_an_registration" data-field="x_A5monthDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A5monthDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A5monthDATE->EditValue ?>"<?php echo $patient_an_registration->A5monthDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->A5monthDATE->ReadOnly && !$patient_an_registration->A5monthDATE->Disabled && !isset($patient_an_registration->A5monthDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->A5monthDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_A5monthDATE" class="form-group patient_an_registration_A5monthDATE">
<span<?php echo $patient_an_registration->A5monthDATE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->A5monthDATE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthDATE" value="<?php echo HtmlEncode($patient_an_registration->A5monthDATE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthDATE" value="<?php echo HtmlEncode($patient_an_registration->A5monthDATE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->A5monthINHOUSE->Visible) { // A5monthINHOUSE ?>
		<td data-name="A5monthINHOUSE">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_A5monthINHOUSE" class="form-group patient_an_registration_A5monthINHOUSE">
<input type="text" data-table="patient_an_registration" data-field="x_A5monthINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A5monthINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A5monthINHOUSE->EditValue ?>"<?php echo $patient_an_registration->A5monthINHOUSE->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_A5monthINHOUSE" class="form-group patient_an_registration_A5monthINHOUSE">
<span<?php echo $patient_an_registration->A5monthINHOUSE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->A5monthINHOUSE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->A5monthINHOUSE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthINHOUSE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthINHOUSE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->A5monthINHOUSE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->A5monthREPORT->Visible) { // A5monthREPORT ?>
		<td data-name="A5monthREPORT">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_A5monthREPORT" class="form-group patient_an_registration_A5monthREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_A5monthREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A5monthREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A5monthREPORT->EditValue ?>"<?php echo $patient_an_registration->A5monthREPORT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_A5monthREPORT" class="form-group patient_an_registration_A5monthREPORT">
<span<?php echo $patient_an_registration->A5monthREPORT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->A5monthREPORT->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthREPORT" value="<?php echo HtmlEncode($patient_an_registration->A5monthREPORT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthREPORT" value="<?php echo HtmlEncode($patient_an_registration->A5monthREPORT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->A7month->Visible) { // A7month ?>
		<td data-name="A7month">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_A7month" class="form-group patient_an_registration_A7month">
<input type="text" data-table="patient_an_registration" data-field="x_A7month" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7month" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7month" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A7month->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A7month->EditValue ?>"<?php echo $patient_an_registration->A7month->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_A7month" class="form-group patient_an_registration_A7month">
<span<?php echo $patient_an_registration->A7month->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->A7month->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7month" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7month" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7month" value="<?php echo HtmlEncode($patient_an_registration->A7month->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7month" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A7month" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A7month" value="<?php echo HtmlEncode($patient_an_registration->A7month->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->A7monthDATE->Visible) { // A7monthDATE ?>
		<td data-name="A7monthDATE">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_A7monthDATE" class="form-group patient_an_registration_A7monthDATE">
<input type="text" data-table="patient_an_registration" data-field="x_A7monthDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A7monthDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A7monthDATE->EditValue ?>"<?php echo $patient_an_registration->A7monthDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->A7monthDATE->ReadOnly && !$patient_an_registration->A7monthDATE->Disabled && !isset($patient_an_registration->A7monthDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->A7monthDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_A7monthDATE" class="form-group patient_an_registration_A7monthDATE">
<span<?php echo $patient_an_registration->A7monthDATE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->A7monthDATE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthDATE" value="<?php echo HtmlEncode($patient_an_registration->A7monthDATE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthDATE" value="<?php echo HtmlEncode($patient_an_registration->A7monthDATE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->A7monthINHOUSE->Visible) { // A7monthINHOUSE ?>
		<td data-name="A7monthINHOUSE">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_A7monthINHOUSE" class="form-group patient_an_registration_A7monthINHOUSE">
<input type="text" data-table="patient_an_registration" data-field="x_A7monthINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A7monthINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A7monthINHOUSE->EditValue ?>"<?php echo $patient_an_registration->A7monthINHOUSE->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_A7monthINHOUSE" class="form-group patient_an_registration_A7monthINHOUSE">
<span<?php echo $patient_an_registration->A7monthINHOUSE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->A7monthINHOUSE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->A7monthINHOUSE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthINHOUSE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthINHOUSE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->A7monthINHOUSE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->A7monthREPORT->Visible) { // A7monthREPORT ?>
		<td data-name="A7monthREPORT">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_A7monthREPORT" class="form-group patient_an_registration_A7monthREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_A7monthREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A7monthREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A7monthREPORT->EditValue ?>"<?php echo $patient_an_registration->A7monthREPORT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_A7monthREPORT" class="form-group patient_an_registration_A7monthREPORT">
<span<?php echo $patient_an_registration->A7monthREPORT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->A7monthREPORT->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthREPORT" value="<?php echo HtmlEncode($patient_an_registration->A7monthREPORT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthREPORT" value="<?php echo HtmlEncode($patient_an_registration->A7monthREPORT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->A9month->Visible) { // A9month ?>
		<td data-name="A9month">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_A9month" class="form-group patient_an_registration_A9month">
<input type="text" data-table="patient_an_registration" data-field="x_A9month" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9month" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9month" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A9month->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A9month->EditValue ?>"<?php echo $patient_an_registration->A9month->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_A9month" class="form-group patient_an_registration_A9month">
<span<?php echo $patient_an_registration->A9month->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->A9month->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9month" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9month" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9month" value="<?php echo HtmlEncode($patient_an_registration->A9month->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9month" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A9month" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A9month" value="<?php echo HtmlEncode($patient_an_registration->A9month->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->A9monthDATE->Visible) { // A9monthDATE ?>
		<td data-name="A9monthDATE">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_A9monthDATE" class="form-group patient_an_registration_A9monthDATE">
<input type="text" data-table="patient_an_registration" data-field="x_A9monthDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A9monthDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A9monthDATE->EditValue ?>"<?php echo $patient_an_registration->A9monthDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->A9monthDATE->ReadOnly && !$patient_an_registration->A9monthDATE->Disabled && !isset($patient_an_registration->A9monthDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->A9monthDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_A9monthDATE" class="form-group patient_an_registration_A9monthDATE">
<span<?php echo $patient_an_registration->A9monthDATE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->A9monthDATE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthDATE" value="<?php echo HtmlEncode($patient_an_registration->A9monthDATE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthDATE" value="<?php echo HtmlEncode($patient_an_registration->A9monthDATE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->A9monthINHOUSE->Visible) { // A9monthINHOUSE ?>
		<td data-name="A9monthINHOUSE">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_A9monthINHOUSE" class="form-group patient_an_registration_A9monthINHOUSE">
<input type="text" data-table="patient_an_registration" data-field="x_A9monthINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A9monthINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A9monthINHOUSE->EditValue ?>"<?php echo $patient_an_registration->A9monthINHOUSE->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_A9monthINHOUSE" class="form-group patient_an_registration_A9monthINHOUSE">
<span<?php echo $patient_an_registration->A9monthINHOUSE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->A9monthINHOUSE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->A9monthINHOUSE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthINHOUSE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthINHOUSE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->A9monthINHOUSE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->A9monthREPORT->Visible) { // A9monthREPORT ?>
		<td data-name="A9monthREPORT">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_A9monthREPORT" class="form-group patient_an_registration_A9monthREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_A9monthREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A9monthREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A9monthREPORT->EditValue ?>"<?php echo $patient_an_registration->A9monthREPORT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_A9monthREPORT" class="form-group patient_an_registration_A9monthREPORT">
<span<?php echo $patient_an_registration->A9monthREPORT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->A9monthREPORT->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthREPORT" value="<?php echo HtmlEncode($patient_an_registration->A9monthREPORT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthREPORT" value="<?php echo HtmlEncode($patient_an_registration->A9monthREPORT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->INJ->Visible) { // INJ ?>
		<td data-name="INJ">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_INJ" class="form-group patient_an_registration_INJ">
<input type="text" data-table="patient_an_registration" data-field="x_INJ" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJ" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJ" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->INJ->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->INJ->EditValue ?>"<?php echo $patient_an_registration->INJ->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_INJ" class="form-group patient_an_registration_INJ">
<span<?php echo $patient_an_registration->INJ->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->INJ->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJ" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJ" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJ" value="<?php echo HtmlEncode($patient_an_registration->INJ->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJ" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_INJ" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_INJ" value="<?php echo HtmlEncode($patient_an_registration->INJ->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->INJDATE->Visible) { // INJDATE ?>
		<td data-name="INJDATE">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_INJDATE" class="form-group patient_an_registration_INJDATE">
<input type="text" data-table="patient_an_registration" data-field="x_INJDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->INJDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->INJDATE->EditValue ?>"<?php echo $patient_an_registration->INJDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->INJDATE->ReadOnly && !$patient_an_registration->INJDATE->Disabled && !isset($patient_an_registration->INJDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->INJDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_INJDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_INJDATE" class="form-group patient_an_registration_INJDATE">
<span<?php echo $patient_an_registration->INJDATE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->INJDATE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJDATE" value="<?php echo HtmlEncode($patient_an_registration->INJDATE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_INJDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_INJDATE" value="<?php echo HtmlEncode($patient_an_registration->INJDATE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->INJINHOUSE->Visible) { // INJINHOUSE ?>
		<td data-name="INJINHOUSE">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_INJINHOUSE" class="form-group patient_an_registration_INJINHOUSE">
<input type="text" data-table="patient_an_registration" data-field="x_INJINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->INJINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->INJINHOUSE->EditValue ?>"<?php echo $patient_an_registration->INJINHOUSE->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_INJINHOUSE" class="form-group patient_an_registration_INJINHOUSE">
<span<?php echo $patient_an_registration->INJINHOUSE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->INJINHOUSE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->INJINHOUSE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJINHOUSE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_INJINHOUSE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_INJINHOUSE" value="<?php echo HtmlEncode($patient_an_registration->INJINHOUSE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->INJREPORT->Visible) { // INJREPORT ?>
		<td data-name="INJREPORT">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_INJREPORT" class="form-group patient_an_registration_INJREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_INJREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->INJREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->INJREPORT->EditValue ?>"<?php echo $patient_an_registration->INJREPORT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_INJREPORT" class="form-group patient_an_registration_INJREPORT">
<span<?php echo $patient_an_registration->INJREPORT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->INJREPORT->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJREPORT" value="<?php echo HtmlEncode($patient_an_registration->INJREPORT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_INJREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_INJREPORT" value="<?php echo HtmlEncode($patient_an_registration->INJREPORT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Bleeding->Visible) { // Bleeding ?>
		<td data-name="Bleeding">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Bleeding" class="form-group patient_an_registration_Bleeding">
<div id="tp_x<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_an_registration" data-field="x_Bleeding" data-value-separator="<?php echo $patient_an_registration->Bleeding->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding[]" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding[]" value="{value}"<?php echo $patient_an_registration->Bleeding->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_an_registration->Bleeding->checkBoxListHtml(FALSE, "x{$patient_an_registration_grid->RowIndex}_Bleeding[]") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Bleeding" class="form-group patient_an_registration_Bleeding">
<span<?php echo $patient_an_registration->Bleeding->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->Bleeding->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Bleeding" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding" value="<?php echo HtmlEncode($patient_an_registration->Bleeding->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Bleeding" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding[]" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding[]" value="<?php echo HtmlEncode($patient_an_registration->Bleeding->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Hypothyroidism->Visible) { // Hypothyroidism ?>
		<td data-name="Hypothyroidism">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Hypothyroidism" class="form-group patient_an_registration_Hypothyroidism">
<input type="text" data-table="patient_an_registration" data-field="x_Hypothyroidism" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Hypothyroidism" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Hypothyroidism" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Hypothyroidism->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Hypothyroidism->EditValue ?>"<?php echo $patient_an_registration->Hypothyroidism->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Hypothyroidism" class="form-group patient_an_registration_Hypothyroidism">
<span<?php echo $patient_an_registration->Hypothyroidism->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->Hypothyroidism->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Hypothyroidism" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Hypothyroidism" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Hypothyroidism" value="<?php echo HtmlEncode($patient_an_registration->Hypothyroidism->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Hypothyroidism" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Hypothyroidism" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Hypothyroidism" value="<?php echo HtmlEncode($patient_an_registration->Hypothyroidism->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->PICMENumber->Visible) { // PICMENumber ?>
		<td data-name="PICMENumber">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_PICMENumber" class="form-group patient_an_registration_PICMENumber">
<input type="text" data-table="patient_an_registration" data-field="x_PICMENumber" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PICMENumber" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PICMENumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->PICMENumber->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->PICMENumber->EditValue ?>"<?php echo $patient_an_registration->PICMENumber->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_PICMENumber" class="form-group patient_an_registration_PICMENumber">
<span<?php echo $patient_an_registration->PICMENumber->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->PICMENumber->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PICMENumber" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PICMENumber" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PICMENumber" value="<?php echo HtmlEncode($patient_an_registration->PICMENumber->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PICMENumber" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PICMENumber" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PICMENumber" value="<?php echo HtmlEncode($patient_an_registration->PICMENumber->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Outcome->Visible) { // Outcome ?>
		<td data-name="Outcome">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Outcome" class="form-group patient_an_registration_Outcome">
<input type="text" data-table="patient_an_registration" data-field="x_Outcome" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Outcome" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Outcome" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Outcome->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Outcome->EditValue ?>"<?php echo $patient_an_registration->Outcome->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Outcome" class="form-group patient_an_registration_Outcome">
<span<?php echo $patient_an_registration->Outcome->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->Outcome->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Outcome" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Outcome" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Outcome" value="<?php echo HtmlEncode($patient_an_registration->Outcome->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Outcome" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Outcome" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Outcome" value="<?php echo HtmlEncode($patient_an_registration->Outcome->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->DateofAdmission->Visible) { // DateofAdmission ?>
		<td data-name="DateofAdmission">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_DateofAdmission" class="form-group patient_an_registration_DateofAdmission">
<input type="text" data-table="patient_an_registration" data-field="x_DateofAdmission" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DateofAdmission" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DateofAdmission" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->DateofAdmission->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->DateofAdmission->EditValue ?>"<?php echo $patient_an_registration->DateofAdmission->editAttributes() ?>>
<?php if (!$patient_an_registration->DateofAdmission->ReadOnly && !$patient_an_registration->DateofAdmission->Disabled && !isset($patient_an_registration->DateofAdmission->EditAttrs["readonly"]) && !isset($patient_an_registration->DateofAdmission->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_DateofAdmission", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_DateofAdmission" class="form-group patient_an_registration_DateofAdmission">
<span<?php echo $patient_an_registration->DateofAdmission->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->DateofAdmission->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DateofAdmission" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DateofAdmission" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DateofAdmission" value="<?php echo HtmlEncode($patient_an_registration->DateofAdmission->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DateofAdmission" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DateofAdmission" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DateofAdmission" value="<?php echo HtmlEncode($patient_an_registration->DateofAdmission->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->DateodProcedure->Visible) { // DateodProcedure ?>
		<td data-name="DateodProcedure">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_DateodProcedure" class="form-group patient_an_registration_DateodProcedure">
<input type="text" data-table="patient_an_registration" data-field="x_DateodProcedure" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DateodProcedure" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DateodProcedure" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->DateodProcedure->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->DateodProcedure->EditValue ?>"<?php echo $patient_an_registration->DateodProcedure->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_DateodProcedure" class="form-group patient_an_registration_DateodProcedure">
<span<?php echo $patient_an_registration->DateodProcedure->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->DateodProcedure->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DateodProcedure" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DateodProcedure" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DateodProcedure" value="<?php echo HtmlEncode($patient_an_registration->DateodProcedure->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DateodProcedure" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DateodProcedure" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DateodProcedure" value="<?php echo HtmlEncode($patient_an_registration->DateodProcedure->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Miscarriage->Visible) { // Miscarriage ?>
		<td data-name="Miscarriage">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Miscarriage" class="form-group patient_an_registration_Miscarriage">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_Miscarriage" data-value-separator="<?php echo $patient_an_registration->Miscarriage->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Miscarriage" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Miscarriage"<?php echo $patient_an_registration->Miscarriage->editAttributes() ?>>
		<?php echo $patient_an_registration->Miscarriage->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_Miscarriage") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Miscarriage" class="form-group patient_an_registration_Miscarriage">
<span<?php echo $patient_an_registration->Miscarriage->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->Miscarriage->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Miscarriage" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Miscarriage" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Miscarriage" value="<?php echo HtmlEncode($patient_an_registration->Miscarriage->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Miscarriage" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Miscarriage" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Miscarriage" value="<?php echo HtmlEncode($patient_an_registration->Miscarriage->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->ModeOfDelivery->Visible) { // ModeOfDelivery ?>
		<td data-name="ModeOfDelivery">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_ModeOfDelivery" class="form-group patient_an_registration_ModeOfDelivery">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_ModeOfDelivery" data-value-separator="<?php echo $patient_an_registration->ModeOfDelivery->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ModeOfDelivery" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ModeOfDelivery"<?php echo $patient_an_registration->ModeOfDelivery->editAttributes() ?>>
		<?php echo $patient_an_registration->ModeOfDelivery->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_ModeOfDelivery") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_ModeOfDelivery" class="form-group patient_an_registration_ModeOfDelivery">
<span<?php echo $patient_an_registration->ModeOfDelivery->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->ModeOfDelivery->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ModeOfDelivery" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ModeOfDelivery" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ModeOfDelivery" value="<?php echo HtmlEncode($patient_an_registration->ModeOfDelivery->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ModeOfDelivery" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ModeOfDelivery" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ModeOfDelivery" value="<?php echo HtmlEncode($patient_an_registration->ModeOfDelivery->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->ND->Visible) { // ND ?>
		<td data-name="ND">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_ND" class="form-group patient_an_registration_ND">
<input type="text" data-table="patient_an_registration" data-field="x_ND" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ND" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ND" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->ND->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->ND->EditValue ?>"<?php echo $patient_an_registration->ND->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_ND" class="form-group patient_an_registration_ND">
<span<?php echo $patient_an_registration->ND->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->ND->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ND" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ND" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ND" value="<?php echo HtmlEncode($patient_an_registration->ND->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ND" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ND" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ND" value="<?php echo HtmlEncode($patient_an_registration->ND->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->NDS->Visible) { // NDS ?>
		<td data-name="NDS">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_NDS" class="form-group patient_an_registration_NDS">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_NDS" data-value-separator="<?php echo $patient_an_registration->NDS->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NDS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NDS"<?php echo $patient_an_registration->NDS->editAttributes() ?>>
		<?php echo $patient_an_registration->NDS->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_NDS") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_NDS" class="form-group patient_an_registration_NDS">
<span<?php echo $patient_an_registration->NDS->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->NDS->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_NDS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NDS" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NDS" value="<?php echo HtmlEncode($patient_an_registration->NDS->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NDS" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_NDS" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_NDS" value="<?php echo HtmlEncode($patient_an_registration->NDS->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->NDP->Visible) { // NDP ?>
		<td data-name="NDP">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_NDP" class="form-group patient_an_registration_NDP">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_NDP" data-value-separator="<?php echo $patient_an_registration->NDP->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NDP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NDP"<?php echo $patient_an_registration->NDP->editAttributes() ?>>
		<?php echo $patient_an_registration->NDP->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_NDP") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_NDP" class="form-group patient_an_registration_NDP">
<span<?php echo $patient_an_registration->NDP->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->NDP->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_NDP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NDP" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NDP" value="<?php echo HtmlEncode($patient_an_registration->NDP->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NDP" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_NDP" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_NDP" value="<?php echo HtmlEncode($patient_an_registration->NDP->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Vaccum->Visible) { // Vaccum ?>
		<td data-name="Vaccum">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Vaccum" class="form-group patient_an_registration_Vaccum">
<input type="text" data-table="patient_an_registration" data-field="x_Vaccum" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Vaccum" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Vaccum" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Vaccum->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Vaccum->EditValue ?>"<?php echo $patient_an_registration->Vaccum->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Vaccum" class="form-group patient_an_registration_Vaccum">
<span<?php echo $patient_an_registration->Vaccum->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->Vaccum->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Vaccum" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Vaccum" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Vaccum" value="<?php echo HtmlEncode($patient_an_registration->Vaccum->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Vaccum" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Vaccum" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Vaccum" value="<?php echo HtmlEncode($patient_an_registration->Vaccum->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->VaccumS->Visible) { // VaccumS ?>
		<td data-name="VaccumS">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_VaccumS" class="form-group patient_an_registration_VaccumS">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_VaccumS" data-value-separator="<?php echo $patient_an_registration->VaccumS->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumS"<?php echo $patient_an_registration->VaccumS->editAttributes() ?>>
		<?php echo $patient_an_registration->VaccumS->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumS") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_VaccumS" class="form-group patient_an_registration_VaccumS">
<span<?php echo $patient_an_registration->VaccumS->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->VaccumS->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_VaccumS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumS" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumS" value="<?php echo HtmlEncode($patient_an_registration->VaccumS->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_VaccumS" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumS" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumS" value="<?php echo HtmlEncode($patient_an_registration->VaccumS->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->VaccumP->Visible) { // VaccumP ?>
		<td data-name="VaccumP">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_VaccumP" class="form-group patient_an_registration_VaccumP">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_VaccumP" data-value-separator="<?php echo $patient_an_registration->VaccumP->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumP"<?php echo $patient_an_registration->VaccumP->editAttributes() ?>>
		<?php echo $patient_an_registration->VaccumP->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumP") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_VaccumP" class="form-group patient_an_registration_VaccumP">
<span<?php echo $patient_an_registration->VaccumP->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->VaccumP->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_VaccumP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumP" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumP" value="<?php echo HtmlEncode($patient_an_registration->VaccumP->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_VaccumP" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumP" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumP" value="<?php echo HtmlEncode($patient_an_registration->VaccumP->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Forceps->Visible) { // Forceps ?>
		<td data-name="Forceps">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Forceps" class="form-group patient_an_registration_Forceps">
<input type="text" data-table="patient_an_registration" data-field="x_Forceps" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Forceps" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Forceps" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Forceps->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Forceps->EditValue ?>"<?php echo $patient_an_registration->Forceps->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Forceps" class="form-group patient_an_registration_Forceps">
<span<?php echo $patient_an_registration->Forceps->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->Forceps->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Forceps" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Forceps" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Forceps" value="<?php echo HtmlEncode($patient_an_registration->Forceps->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Forceps" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Forceps" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Forceps" value="<?php echo HtmlEncode($patient_an_registration->Forceps->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->ForcepsS->Visible) { // ForcepsS ?>
		<td data-name="ForcepsS">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_ForcepsS" class="form-group patient_an_registration_ForcepsS">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_ForcepsS" data-value-separator="<?php echo $patient_an_registration->ForcepsS->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsS"<?php echo $patient_an_registration->ForcepsS->editAttributes() ?>>
		<?php echo $patient_an_registration->ForcepsS->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsS") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_ForcepsS" class="form-group patient_an_registration_ForcepsS">
<span<?php echo $patient_an_registration->ForcepsS->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->ForcepsS->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ForcepsS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsS" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsS" value="<?php echo HtmlEncode($patient_an_registration->ForcepsS->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ForcepsS" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsS" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsS" value="<?php echo HtmlEncode($patient_an_registration->ForcepsS->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->ForcepsP->Visible) { // ForcepsP ?>
		<td data-name="ForcepsP">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_ForcepsP" class="form-group patient_an_registration_ForcepsP">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_ForcepsP" data-value-separator="<?php echo $patient_an_registration->ForcepsP->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsP"<?php echo $patient_an_registration->ForcepsP->editAttributes() ?>>
		<?php echo $patient_an_registration->ForcepsP->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsP") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_ForcepsP" class="form-group patient_an_registration_ForcepsP">
<span<?php echo $patient_an_registration->ForcepsP->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->ForcepsP->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ForcepsP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsP" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsP" value="<?php echo HtmlEncode($patient_an_registration->ForcepsP->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ForcepsP" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsP" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsP" value="<?php echo HtmlEncode($patient_an_registration->ForcepsP->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Elective->Visible) { // Elective ?>
		<td data-name="Elective">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Elective" class="form-group patient_an_registration_Elective">
<input type="text" data-table="patient_an_registration" data-field="x_Elective" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Elective" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Elective" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Elective->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Elective->EditValue ?>"<?php echo $patient_an_registration->Elective->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Elective" class="form-group patient_an_registration_Elective">
<span<?php echo $patient_an_registration->Elective->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->Elective->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Elective" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Elective" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Elective" value="<?php echo HtmlEncode($patient_an_registration->Elective->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Elective" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Elective" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Elective" value="<?php echo HtmlEncode($patient_an_registration->Elective->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->ElectiveS->Visible) { // ElectiveS ?>
		<td data-name="ElectiveS">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_ElectiveS" class="form-group patient_an_registration_ElectiveS">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_ElectiveS" data-value-separator="<?php echo $patient_an_registration->ElectiveS->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveS"<?php echo $patient_an_registration->ElectiveS->editAttributes() ?>>
		<?php echo $patient_an_registration->ElectiveS->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveS") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_ElectiveS" class="form-group patient_an_registration_ElectiveS">
<span<?php echo $patient_an_registration->ElectiveS->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->ElectiveS->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ElectiveS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveS" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveS" value="<?php echo HtmlEncode($patient_an_registration->ElectiveS->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ElectiveS" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveS" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveS" value="<?php echo HtmlEncode($patient_an_registration->ElectiveS->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->ElectiveP->Visible) { // ElectiveP ?>
		<td data-name="ElectiveP">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_ElectiveP" class="form-group patient_an_registration_ElectiveP">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_ElectiveP" data-value-separator="<?php echo $patient_an_registration->ElectiveP->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveP"<?php echo $patient_an_registration->ElectiveP->editAttributes() ?>>
		<?php echo $patient_an_registration->ElectiveP->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveP") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_ElectiveP" class="form-group patient_an_registration_ElectiveP">
<span<?php echo $patient_an_registration->ElectiveP->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->ElectiveP->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ElectiveP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveP" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveP" value="<?php echo HtmlEncode($patient_an_registration->ElectiveP->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ElectiveP" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveP" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveP" value="<?php echo HtmlEncode($patient_an_registration->ElectiveP->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Emergency->Visible) { // Emergency ?>
		<td data-name="Emergency">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Emergency" class="form-group patient_an_registration_Emergency">
<input type="text" data-table="patient_an_registration" data-field="x_Emergency" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Emergency" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Emergency" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Emergency->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Emergency->EditValue ?>"<?php echo $patient_an_registration->Emergency->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Emergency" class="form-group patient_an_registration_Emergency">
<span<?php echo $patient_an_registration->Emergency->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->Emergency->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Emergency" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Emergency" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Emergency" value="<?php echo HtmlEncode($patient_an_registration->Emergency->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Emergency" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Emergency" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Emergency" value="<?php echo HtmlEncode($patient_an_registration->Emergency->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->EmergencyS->Visible) { // EmergencyS ?>
		<td data-name="EmergencyS">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_EmergencyS" class="form-group patient_an_registration_EmergencyS">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_EmergencyS" data-value-separator="<?php echo $patient_an_registration->EmergencyS->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyS"<?php echo $patient_an_registration->EmergencyS->editAttributes() ?>>
		<?php echo $patient_an_registration->EmergencyS->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyS") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_EmergencyS" class="form-group patient_an_registration_EmergencyS">
<span<?php echo $patient_an_registration->EmergencyS->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->EmergencyS->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_EmergencyS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyS" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyS" value="<?php echo HtmlEncode($patient_an_registration->EmergencyS->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_EmergencyS" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyS" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyS" value="<?php echo HtmlEncode($patient_an_registration->EmergencyS->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->EmergencyP->Visible) { // EmergencyP ?>
		<td data-name="EmergencyP">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_EmergencyP" class="form-group patient_an_registration_EmergencyP">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_EmergencyP" data-value-separator="<?php echo $patient_an_registration->EmergencyP->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyP"<?php echo $patient_an_registration->EmergencyP->editAttributes() ?>>
		<?php echo $patient_an_registration->EmergencyP->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyP") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_EmergencyP" class="form-group patient_an_registration_EmergencyP">
<span<?php echo $patient_an_registration->EmergencyP->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->EmergencyP->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_EmergencyP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyP" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyP" value="<?php echo HtmlEncode($patient_an_registration->EmergencyP->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_EmergencyP" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyP" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyP" value="<?php echo HtmlEncode($patient_an_registration->EmergencyP->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Maturity->Visible) { // Maturity ?>
		<td data-name="Maturity">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Maturity" class="form-group patient_an_registration_Maturity">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_Maturity" data-value-separator="<?php echo $patient_an_registration->Maturity->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Maturity" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Maturity"<?php echo $patient_an_registration->Maturity->editAttributes() ?>>
		<?php echo $patient_an_registration->Maturity->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_Maturity") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Maturity" class="form-group patient_an_registration_Maturity">
<span<?php echo $patient_an_registration->Maturity->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->Maturity->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Maturity" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Maturity" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Maturity" value="<?php echo HtmlEncode($patient_an_registration->Maturity->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Maturity" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Maturity" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Maturity" value="<?php echo HtmlEncode($patient_an_registration->Maturity->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Baby1->Visible) { // Baby1 ?>
		<td data-name="Baby1">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Baby1" class="form-group patient_an_registration_Baby1">
<input type="text" data-table="patient_an_registration" data-field="x_Baby1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Baby1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Baby1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Baby1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Baby1->EditValue ?>"<?php echo $patient_an_registration->Baby1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Baby1" class="form-group patient_an_registration_Baby1">
<span<?php echo $patient_an_registration->Baby1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->Baby1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Baby1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Baby1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Baby1" value="<?php echo HtmlEncode($patient_an_registration->Baby1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Baby1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Baby1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Baby1" value="<?php echo HtmlEncode($patient_an_registration->Baby1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Baby2->Visible) { // Baby2 ?>
		<td data-name="Baby2">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Baby2" class="form-group patient_an_registration_Baby2">
<input type="text" data-table="patient_an_registration" data-field="x_Baby2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Baby2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Baby2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Baby2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Baby2->EditValue ?>"<?php echo $patient_an_registration->Baby2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Baby2" class="form-group patient_an_registration_Baby2">
<span<?php echo $patient_an_registration->Baby2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->Baby2->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Baby2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Baby2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Baby2" value="<?php echo HtmlEncode($patient_an_registration->Baby2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Baby2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Baby2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Baby2" value="<?php echo HtmlEncode($patient_an_registration->Baby2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->sex1->Visible) { // sex1 ?>
		<td data-name="sex1">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_sex1" class="form-group patient_an_registration_sex1">
<input type="text" data-table="patient_an_registration" data-field="x_sex1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_sex1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_sex1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->sex1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->sex1->EditValue ?>"<?php echo $patient_an_registration->sex1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_sex1" class="form-group patient_an_registration_sex1">
<span<?php echo $patient_an_registration->sex1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->sex1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_sex1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_sex1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_sex1" value="<?php echo HtmlEncode($patient_an_registration->sex1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_sex1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_sex1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_sex1" value="<?php echo HtmlEncode($patient_an_registration->sex1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->sex2->Visible) { // sex2 ?>
		<td data-name="sex2">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_sex2" class="form-group patient_an_registration_sex2">
<input type="text" data-table="patient_an_registration" data-field="x_sex2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_sex2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_sex2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->sex2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->sex2->EditValue ?>"<?php echo $patient_an_registration->sex2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_sex2" class="form-group patient_an_registration_sex2">
<span<?php echo $patient_an_registration->sex2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->sex2->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_sex2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_sex2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_sex2" value="<?php echo HtmlEncode($patient_an_registration->sex2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_sex2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_sex2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_sex2" value="<?php echo HtmlEncode($patient_an_registration->sex2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->weight1->Visible) { // weight1 ?>
		<td data-name="weight1">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_weight1" class="form-group patient_an_registration_weight1">
<input type="text" data-table="patient_an_registration" data-field="x_weight1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_weight1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_weight1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->weight1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->weight1->EditValue ?>"<?php echo $patient_an_registration->weight1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_weight1" class="form-group patient_an_registration_weight1">
<span<?php echo $patient_an_registration->weight1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->weight1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_weight1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_weight1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_weight1" value="<?php echo HtmlEncode($patient_an_registration->weight1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_weight1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_weight1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_weight1" value="<?php echo HtmlEncode($patient_an_registration->weight1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->weight2->Visible) { // weight2 ?>
		<td data-name="weight2">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_weight2" class="form-group patient_an_registration_weight2">
<input type="text" data-table="patient_an_registration" data-field="x_weight2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_weight2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_weight2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->weight2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->weight2->EditValue ?>"<?php echo $patient_an_registration->weight2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_weight2" class="form-group patient_an_registration_weight2">
<span<?php echo $patient_an_registration->weight2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->weight2->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_weight2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_weight2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_weight2" value="<?php echo HtmlEncode($patient_an_registration->weight2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_weight2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_weight2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_weight2" value="<?php echo HtmlEncode($patient_an_registration->weight2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->NICU1->Visible) { // NICU1 ?>
		<td data-name="NICU1">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_NICU1" class="form-group patient_an_registration_NICU1">
<input type="text" data-table="patient_an_registration" data-field="x_NICU1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NICU1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NICU1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->NICU1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->NICU1->EditValue ?>"<?php echo $patient_an_registration->NICU1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_NICU1" class="form-group patient_an_registration_NICU1">
<span<?php echo $patient_an_registration->NICU1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->NICU1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_NICU1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NICU1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NICU1" value="<?php echo HtmlEncode($patient_an_registration->NICU1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NICU1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_NICU1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_NICU1" value="<?php echo HtmlEncode($patient_an_registration->NICU1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->NICU2->Visible) { // NICU2 ?>
		<td data-name="NICU2">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_NICU2" class="form-group patient_an_registration_NICU2">
<input type="text" data-table="patient_an_registration" data-field="x_NICU2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NICU2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NICU2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->NICU2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->NICU2->EditValue ?>"<?php echo $patient_an_registration->NICU2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_NICU2" class="form-group patient_an_registration_NICU2">
<span<?php echo $patient_an_registration->NICU2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->NICU2->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_NICU2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NICU2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NICU2" value="<?php echo HtmlEncode($patient_an_registration->NICU2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NICU2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_NICU2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_NICU2" value="<?php echo HtmlEncode($patient_an_registration->NICU2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Jaundice1->Visible) { // Jaundice1 ?>
		<td data-name="Jaundice1">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Jaundice1" class="form-group patient_an_registration_Jaundice1">
<input type="text" data-table="patient_an_registration" data-field="x_Jaundice1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Jaundice1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Jaundice1->EditValue ?>"<?php echo $patient_an_registration->Jaundice1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Jaundice1" class="form-group patient_an_registration_Jaundice1">
<span<?php echo $patient_an_registration->Jaundice1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->Jaundice1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Jaundice1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice1" value="<?php echo HtmlEncode($patient_an_registration->Jaundice1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Jaundice1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice1" value="<?php echo HtmlEncode($patient_an_registration->Jaundice1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Jaundice2->Visible) { // Jaundice2 ?>
		<td data-name="Jaundice2">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Jaundice2" class="form-group patient_an_registration_Jaundice2">
<input type="text" data-table="patient_an_registration" data-field="x_Jaundice2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Jaundice2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Jaundice2->EditValue ?>"<?php echo $patient_an_registration->Jaundice2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Jaundice2" class="form-group patient_an_registration_Jaundice2">
<span<?php echo $patient_an_registration->Jaundice2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->Jaundice2->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Jaundice2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice2" value="<?php echo HtmlEncode($patient_an_registration->Jaundice2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Jaundice2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice2" value="<?php echo HtmlEncode($patient_an_registration->Jaundice2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Others1->Visible) { // Others1 ?>
		<td data-name="Others1">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Others1" class="form-group patient_an_registration_Others1">
<input type="text" data-table="patient_an_registration" data-field="x_Others1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Others1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Others1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Others1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Others1->EditValue ?>"<?php echo $patient_an_registration->Others1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Others1" class="form-group patient_an_registration_Others1">
<span<?php echo $patient_an_registration->Others1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->Others1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Others1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Others1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Others1" value="<?php echo HtmlEncode($patient_an_registration->Others1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Others1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Others1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Others1" value="<?php echo HtmlEncode($patient_an_registration->Others1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Others2->Visible) { // Others2 ?>
		<td data-name="Others2">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Others2" class="form-group patient_an_registration_Others2">
<input type="text" data-table="patient_an_registration" data-field="x_Others2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Others2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Others2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Others2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Others2->EditValue ?>"<?php echo $patient_an_registration->Others2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Others2" class="form-group patient_an_registration_Others2">
<span<?php echo $patient_an_registration->Others2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->Others2->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Others2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Others2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Others2" value="<?php echo HtmlEncode($patient_an_registration->Others2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Others2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Others2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Others2" value="<?php echo HtmlEncode($patient_an_registration->Others2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->SpillOverReasons->Visible) { // SpillOverReasons ?>
		<td data-name="SpillOverReasons">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_SpillOverReasons" class="form-group patient_an_registration_SpillOverReasons">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_SpillOverReasons" data-value-separator="<?php echo $patient_an_registration->SpillOverReasons->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_SpillOverReasons" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_SpillOverReasons"<?php echo $patient_an_registration->SpillOverReasons->editAttributes() ?>>
		<?php echo $patient_an_registration->SpillOverReasons->selectOptionListHtml("x<?php echo $patient_an_registration_grid->RowIndex ?>_SpillOverReasons") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_SpillOverReasons" class="form-group patient_an_registration_SpillOverReasons">
<span<?php echo $patient_an_registration->SpillOverReasons->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->SpillOverReasons->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_SpillOverReasons" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_SpillOverReasons" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_SpillOverReasons" value="<?php echo HtmlEncode($patient_an_registration->SpillOverReasons->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_SpillOverReasons" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_SpillOverReasons" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_SpillOverReasons" value="<?php echo HtmlEncode($patient_an_registration->SpillOverReasons->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->ANClosed->Visible) { // ANClosed ?>
		<td data-name="ANClosed">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_ANClosed" class="form-group patient_an_registration_ANClosed">
<div id="tp_x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_an_registration" data-field="x_ANClosed" data-value-separator="<?php echo $patient_an_registration->ANClosed->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed[]" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed[]" value="{value}"<?php echo $patient_an_registration->ANClosed->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_an_registration->ANClosed->checkBoxListHtml(FALSE, "x{$patient_an_registration_grid->RowIndex}_ANClosed[]") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_ANClosed" class="form-group patient_an_registration_ANClosed">
<span<?php echo $patient_an_registration->ANClosed->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->ANClosed->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANClosed" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed" value="<?php echo HtmlEncode($patient_an_registration->ANClosed->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANClosed" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed[]" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed[]" value="<?php echo HtmlEncode($patient_an_registration->ANClosed->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->ANClosedDATE->Visible) { // ANClosedDATE ?>
		<td data-name="ANClosedDATE">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_ANClosedDATE" class="form-group patient_an_registration_ANClosedDATE">
<input type="text" data-table="patient_an_registration" data-field="x_ANClosedDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosedDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosedDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->ANClosedDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->ANClosedDATE->EditValue ?>"<?php echo $patient_an_registration->ANClosedDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->ANClosedDATE->ReadOnly && !$patient_an_registration->ANClosedDATE->Disabled && !isset($patient_an_registration->ANClosedDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->ANClosedDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosedDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_ANClosedDATE" class="form-group patient_an_registration_ANClosedDATE">
<span<?php echo $patient_an_registration->ANClosedDATE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->ANClosedDATE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANClosedDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosedDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosedDATE" value="<?php echo HtmlEncode($patient_an_registration->ANClosedDATE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANClosedDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosedDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosedDATE" value="<?php echo HtmlEncode($patient_an_registration->ANClosedDATE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->PastMedicalHistoryOthers->Visible) { // PastMedicalHistoryOthers ?>
		<td data-name="PastMedicalHistoryOthers">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_PastMedicalHistoryOthers" class="form-group patient_an_registration_PastMedicalHistoryOthers">
<input type="text" data-table="patient_an_registration" data-field="x_PastMedicalHistoryOthers" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistoryOthers" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistoryOthers" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->PastMedicalHistoryOthers->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->PastMedicalHistoryOthers->EditValue ?>"<?php echo $patient_an_registration->PastMedicalHistoryOthers->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_PastMedicalHistoryOthers" class="form-group patient_an_registration_PastMedicalHistoryOthers">
<span<?php echo $patient_an_registration->PastMedicalHistoryOthers->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->PastMedicalHistoryOthers->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastMedicalHistoryOthers" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistoryOthers" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistoryOthers" value="<?php echo HtmlEncode($patient_an_registration->PastMedicalHistoryOthers->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastMedicalHistoryOthers" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistoryOthers" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistoryOthers" value="<?php echo HtmlEncode($patient_an_registration->PastMedicalHistoryOthers->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->PastSurgicalHistoryOthers->Visible) { // PastSurgicalHistoryOthers ?>
		<td data-name="PastSurgicalHistoryOthers">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_PastSurgicalHistoryOthers" class="form-group patient_an_registration_PastSurgicalHistoryOthers">
<input type="text" data-table="patient_an_registration" data-field="x_PastSurgicalHistoryOthers" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistoryOthers" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistoryOthers" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->PastSurgicalHistoryOthers->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->PastSurgicalHistoryOthers->EditValue ?>"<?php echo $patient_an_registration->PastSurgicalHistoryOthers->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_PastSurgicalHistoryOthers" class="form-group patient_an_registration_PastSurgicalHistoryOthers">
<span<?php echo $patient_an_registration->PastSurgicalHistoryOthers->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->PastSurgicalHistoryOthers->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastSurgicalHistoryOthers" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistoryOthers" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistoryOthers" value="<?php echo HtmlEncode($patient_an_registration->PastSurgicalHistoryOthers->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastSurgicalHistoryOthers" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistoryOthers" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistoryOthers" value="<?php echo HtmlEncode($patient_an_registration->PastSurgicalHistoryOthers->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->FamilyHistoryOthers->Visible) { // FamilyHistoryOthers ?>
		<td data-name="FamilyHistoryOthers">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_FamilyHistoryOthers" class="form-group patient_an_registration_FamilyHistoryOthers">
<input type="text" data-table="patient_an_registration" data-field="x_FamilyHistoryOthers" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistoryOthers" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistoryOthers" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->FamilyHistoryOthers->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->FamilyHistoryOthers->EditValue ?>"<?php echo $patient_an_registration->FamilyHistoryOthers->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_FamilyHistoryOthers" class="form-group patient_an_registration_FamilyHistoryOthers">
<span<?php echo $patient_an_registration->FamilyHistoryOthers->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->FamilyHistoryOthers->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_FamilyHistoryOthers" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistoryOthers" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistoryOthers" value="<?php echo HtmlEncode($patient_an_registration->FamilyHistoryOthers->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_FamilyHistoryOthers" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistoryOthers" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistoryOthers" value="<?php echo HtmlEncode($patient_an_registration->FamilyHistoryOthers->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->PresentPregnancyComplicationsOthers->Visible) { // PresentPregnancyComplicationsOthers ?>
		<td data-name="PresentPregnancyComplicationsOthers">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_PresentPregnancyComplicationsOthers" class="form-group patient_an_registration_PresentPregnancyComplicationsOthers">
<input type="text" data-table="patient_an_registration" data-field="x_PresentPregnancyComplicationsOthers" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PresentPregnancyComplicationsOthers" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PresentPregnancyComplicationsOthers" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->PresentPregnancyComplicationsOthers->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->PresentPregnancyComplicationsOthers->EditValue ?>"<?php echo $patient_an_registration->PresentPregnancyComplicationsOthers->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_PresentPregnancyComplicationsOthers" class="form-group patient_an_registration_PresentPregnancyComplicationsOthers">
<span<?php echo $patient_an_registration->PresentPregnancyComplicationsOthers->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->PresentPregnancyComplicationsOthers->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PresentPregnancyComplicationsOthers" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PresentPregnancyComplicationsOthers" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PresentPregnancyComplicationsOthers" value="<?php echo HtmlEncode($patient_an_registration->PresentPregnancyComplicationsOthers->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PresentPregnancyComplicationsOthers" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PresentPregnancyComplicationsOthers" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PresentPregnancyComplicationsOthers" value="<?php echo HtmlEncode($patient_an_registration->PresentPregnancyComplicationsOthers->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration->ETdate->Visible) { // ETdate ?>
		<td data-name="ETdate">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_ETdate" class="form-group patient_an_registration_ETdate">
<input type="text" data-table="patient_an_registration" data-field="x_ETdate" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ETdate" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ETdate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->ETdate->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->ETdate->EditValue ?>"<?php echo $patient_an_registration->ETdate->editAttributes() ?>>
<?php if (!$patient_an_registration->ETdate->ReadOnly && !$patient_an_registration->ETdate->Disabled && !isset($patient_an_registration->ETdate->EditAttrs["readonly"]) && !isset($patient_an_registration->ETdate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_ETdate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_ETdate" class="form-group patient_an_registration_ETdate">
<span<?php echo $patient_an_registration->ETdate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->ETdate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ETdate" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ETdate" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ETdate" value="<?php echo HtmlEncode($patient_an_registration->ETdate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ETdate" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ETdate" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ETdate" value="<?php echo HtmlEncode($patient_an_registration->ETdate->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_an_registration_grid->ListOptions->render("body", "right", $patient_an_registration_grid->RowIndex);
?>
<script>
fpatient_an_registrationgrid.updateLists(<?php echo $patient_an_registration_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($patient_an_registration->CurrentMode == "add" || $patient_an_registration->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $patient_an_registration_grid->FormKeyCountName ?>" id="<?php echo $patient_an_registration_grid->FormKeyCountName ?>" value="<?php echo $patient_an_registration_grid->KeyCount ?>">
<?php echo $patient_an_registration_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($patient_an_registration->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $patient_an_registration_grid->FormKeyCountName ?>" id="<?php echo $patient_an_registration_grid->FormKeyCountName ?>" value="<?php echo $patient_an_registration_grid->KeyCount ?>">
<?php echo $patient_an_registration_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($patient_an_registration->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fpatient_an_registrationgrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($patient_an_registration_grid->Recordset)
	$patient_an_registration_grid->Recordset->Close();
?>
</div>
<?php if ($patient_an_registration_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $patient_an_registration_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_an_registration_grid->TotalRecs == 0 && !$patient_an_registration->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_an_registration_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$patient_an_registration_grid->terminate();
?>
<?php if (!$patient_an_registration->isExport()) { ?>
<script>
ew.scrollableTable("gmp_patient_an_registration", "95%", "");
</script>
<?php } ?>