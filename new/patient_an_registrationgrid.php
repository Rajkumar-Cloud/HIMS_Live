<?php
namespace PHPMaker2020\HIMS;

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
<?php if (!$patient_an_registration_grid->isExport()) { ?>
<script>
var fpatient_an_registrationgrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fpatient_an_registrationgrid = new ew.Form("fpatient_an_registrationgrid", "grid");
	fpatient_an_registrationgrid.formKeyCountName = '<?php echo $patient_an_registration_grid->FormKeyCountName ?>';

	// Validate form
	fpatient_an_registrationgrid.validate = function() {
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
			<?php if ($patient_an_registration_grid->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->id->caption(), $patient_an_registration_grid->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->pid->Required) { ?>
				elm = this.getElements("x" + infix + "_pid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->pid->caption(), $patient_an_registration_grid->pid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_pid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_an_registration_grid->pid->errorMessage()) ?>");
			<?php if ($patient_an_registration_grid->fid->Required) { ?>
				elm = this.getElements("x" + infix + "_fid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->fid->caption(), $patient_an_registration_grid->fid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_fid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_an_registration_grid->fid->errorMessage()) ?>");
			<?php if ($patient_an_registration_grid->G->Required) { ?>
				elm = this.getElements("x" + infix + "_G");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->G->caption(), $patient_an_registration_grid->G->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->P->Required) { ?>
				elm = this.getElements("x" + infix + "_P");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->P->caption(), $patient_an_registration_grid->P->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->L->Required) { ?>
				elm = this.getElements("x" + infix + "_L");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->L->caption(), $patient_an_registration_grid->L->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->A->Required) { ?>
				elm = this.getElements("x" + infix + "_A");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->A->caption(), $patient_an_registration_grid->A->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->E->Required) { ?>
				elm = this.getElements("x" + infix + "_E");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->E->caption(), $patient_an_registration_grid->E->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->M->Required) { ?>
				elm = this.getElements("x" + infix + "_M");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->M->caption(), $patient_an_registration_grid->M->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->LMP->Required) { ?>
				elm = this.getElements("x" + infix + "_LMP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->LMP->caption(), $patient_an_registration_grid->LMP->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->EDO->Required) { ?>
				elm = this.getElements("x" + infix + "_EDO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->EDO->caption(), $patient_an_registration_grid->EDO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->MenstrualHistory->Required) { ?>
				elm = this.getElements("x" + infix + "_MenstrualHistory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->MenstrualHistory->caption(), $patient_an_registration_grid->MenstrualHistory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->MaritalHistory->Required) { ?>
				elm = this.getElements("x" + infix + "_MaritalHistory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->MaritalHistory->caption(), $patient_an_registration_grid->MaritalHistory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->ObstetricHistory->Required) { ?>
				elm = this.getElements("x" + infix + "_ObstetricHistory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->ObstetricHistory->caption(), $patient_an_registration_grid->ObstetricHistory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->PreviousHistoryofGDM->Required) { ?>
				elm = this.getElements("x" + infix + "_PreviousHistoryofGDM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->PreviousHistoryofGDM->caption(), $patient_an_registration_grid->PreviousHistoryofGDM->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->PreviousHistorofPIH->Required) { ?>
				elm = this.getElements("x" + infix + "_PreviousHistorofPIH");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->PreviousHistorofPIH->caption(), $patient_an_registration_grid->PreviousHistorofPIH->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->PreviousHistoryofIUGR->Required) { ?>
				elm = this.getElements("x" + infix + "_PreviousHistoryofIUGR");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->PreviousHistoryofIUGR->caption(), $patient_an_registration_grid->PreviousHistoryofIUGR->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->PreviousHistoryofOligohydramnios->Required) { ?>
				elm = this.getElements("x" + infix + "_PreviousHistoryofOligohydramnios");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->PreviousHistoryofOligohydramnios->caption(), $patient_an_registration_grid->PreviousHistoryofOligohydramnios->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->PreviousHistoryofPreterm->Required) { ?>
				elm = this.getElements("x" + infix + "_PreviousHistoryofPreterm");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->PreviousHistoryofPreterm->caption(), $patient_an_registration_grid->PreviousHistoryofPreterm->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->G1->Required) { ?>
				elm = this.getElements("x" + infix + "_G1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->G1->caption(), $patient_an_registration_grid->G1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->G2->Required) { ?>
				elm = this.getElements("x" + infix + "_G2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->G2->caption(), $patient_an_registration_grid->G2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->G3->Required) { ?>
				elm = this.getElements("x" + infix + "_G3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->G3->caption(), $patient_an_registration_grid->G3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->DeliveryNDLSCS1->Required) { ?>
				elm = this.getElements("x" + infix + "_DeliveryNDLSCS1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->DeliveryNDLSCS1->caption(), $patient_an_registration_grid->DeliveryNDLSCS1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->DeliveryNDLSCS2->Required) { ?>
				elm = this.getElements("x" + infix + "_DeliveryNDLSCS2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->DeliveryNDLSCS2->caption(), $patient_an_registration_grid->DeliveryNDLSCS2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->DeliveryNDLSCS3->Required) { ?>
				elm = this.getElements("x" + infix + "_DeliveryNDLSCS3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->DeliveryNDLSCS3->caption(), $patient_an_registration_grid->DeliveryNDLSCS3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->BabySexweight1->Required) { ?>
				elm = this.getElements("x" + infix + "_BabySexweight1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->BabySexweight1->caption(), $patient_an_registration_grid->BabySexweight1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->BabySexweight2->Required) { ?>
				elm = this.getElements("x" + infix + "_BabySexweight2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->BabySexweight2->caption(), $patient_an_registration_grid->BabySexweight2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->BabySexweight3->Required) { ?>
				elm = this.getElements("x" + infix + "_BabySexweight3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->BabySexweight3->caption(), $patient_an_registration_grid->BabySexweight3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->PastMedicalHistory->Required) { ?>
				elm = this.getElements("x" + infix + "_PastMedicalHistory[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->PastMedicalHistory->caption(), $patient_an_registration_grid->PastMedicalHistory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->PastSurgicalHistory->Required) { ?>
				elm = this.getElements("x" + infix + "_PastSurgicalHistory[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->PastSurgicalHistory->caption(), $patient_an_registration_grid->PastSurgicalHistory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->FamilyHistory->Required) { ?>
				elm = this.getElements("x" + infix + "_FamilyHistory[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->FamilyHistory->caption(), $patient_an_registration_grid->FamilyHistory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->Viability->Required) { ?>
				elm = this.getElements("x" + infix + "_Viability");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->Viability->caption(), $patient_an_registration_grid->Viability->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->ViabilityDATE->Required) { ?>
				elm = this.getElements("x" + infix + "_ViabilityDATE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->ViabilityDATE->caption(), $patient_an_registration_grid->ViabilityDATE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->ViabilityREPORT->Required) { ?>
				elm = this.getElements("x" + infix + "_ViabilityREPORT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->ViabilityREPORT->caption(), $patient_an_registration_grid->ViabilityREPORT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->Viability2->Required) { ?>
				elm = this.getElements("x" + infix + "_Viability2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->Viability2->caption(), $patient_an_registration_grid->Viability2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->Viability2DATE->Required) { ?>
				elm = this.getElements("x" + infix + "_Viability2DATE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->Viability2DATE->caption(), $patient_an_registration_grid->Viability2DATE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->Viability2REPORT->Required) { ?>
				elm = this.getElements("x" + infix + "_Viability2REPORT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->Viability2REPORT->caption(), $patient_an_registration_grid->Viability2REPORT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->NTscan->Required) { ?>
				elm = this.getElements("x" + infix + "_NTscan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->NTscan->caption(), $patient_an_registration_grid->NTscan->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->NTscanDATE->Required) { ?>
				elm = this.getElements("x" + infix + "_NTscanDATE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->NTscanDATE->caption(), $patient_an_registration_grid->NTscanDATE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->NTscanREPORT->Required) { ?>
				elm = this.getElements("x" + infix + "_NTscanREPORT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->NTscanREPORT->caption(), $patient_an_registration_grid->NTscanREPORT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->EarlyTarget->Required) { ?>
				elm = this.getElements("x" + infix + "_EarlyTarget");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->EarlyTarget->caption(), $patient_an_registration_grid->EarlyTarget->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->EarlyTargetDATE->Required) { ?>
				elm = this.getElements("x" + infix + "_EarlyTargetDATE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->EarlyTargetDATE->caption(), $patient_an_registration_grid->EarlyTargetDATE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->EarlyTargetREPORT->Required) { ?>
				elm = this.getElements("x" + infix + "_EarlyTargetREPORT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->EarlyTargetREPORT->caption(), $patient_an_registration_grid->EarlyTargetREPORT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->Anomaly->Required) { ?>
				elm = this.getElements("x" + infix + "_Anomaly");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->Anomaly->caption(), $patient_an_registration_grid->Anomaly->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->AnomalyDATE->Required) { ?>
				elm = this.getElements("x" + infix + "_AnomalyDATE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->AnomalyDATE->caption(), $patient_an_registration_grid->AnomalyDATE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->AnomalyREPORT->Required) { ?>
				elm = this.getElements("x" + infix + "_AnomalyREPORT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->AnomalyREPORT->caption(), $patient_an_registration_grid->AnomalyREPORT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->Growth->Required) { ?>
				elm = this.getElements("x" + infix + "_Growth");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->Growth->caption(), $patient_an_registration_grid->Growth->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->GrowthDATE->Required) { ?>
				elm = this.getElements("x" + infix + "_GrowthDATE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->GrowthDATE->caption(), $patient_an_registration_grid->GrowthDATE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->GrowthREPORT->Required) { ?>
				elm = this.getElements("x" + infix + "_GrowthREPORT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->GrowthREPORT->caption(), $patient_an_registration_grid->GrowthREPORT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->Growth1->Required) { ?>
				elm = this.getElements("x" + infix + "_Growth1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->Growth1->caption(), $patient_an_registration_grid->Growth1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->Growth1DATE->Required) { ?>
				elm = this.getElements("x" + infix + "_Growth1DATE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->Growth1DATE->caption(), $patient_an_registration_grid->Growth1DATE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->Growth1REPORT->Required) { ?>
				elm = this.getElements("x" + infix + "_Growth1REPORT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->Growth1REPORT->caption(), $patient_an_registration_grid->Growth1REPORT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->ANProfile->Required) { ?>
				elm = this.getElements("x" + infix + "_ANProfile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->ANProfile->caption(), $patient_an_registration_grid->ANProfile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->ANProfileDATE->Required) { ?>
				elm = this.getElements("x" + infix + "_ANProfileDATE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->ANProfileDATE->caption(), $patient_an_registration_grid->ANProfileDATE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->ANProfileINHOUSE->Required) { ?>
				elm = this.getElements("x" + infix + "_ANProfileINHOUSE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->ANProfileINHOUSE->caption(), $patient_an_registration_grid->ANProfileINHOUSE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->ANProfileREPORT->Required) { ?>
				elm = this.getElements("x" + infix + "_ANProfileREPORT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->ANProfileREPORT->caption(), $patient_an_registration_grid->ANProfileREPORT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->DualMarker->Required) { ?>
				elm = this.getElements("x" + infix + "_DualMarker");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->DualMarker->caption(), $patient_an_registration_grid->DualMarker->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->DualMarkerDATE->Required) { ?>
				elm = this.getElements("x" + infix + "_DualMarkerDATE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->DualMarkerDATE->caption(), $patient_an_registration_grid->DualMarkerDATE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->DualMarkerINHOUSE->Required) { ?>
				elm = this.getElements("x" + infix + "_DualMarkerINHOUSE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->DualMarkerINHOUSE->caption(), $patient_an_registration_grid->DualMarkerINHOUSE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->DualMarkerREPORT->Required) { ?>
				elm = this.getElements("x" + infix + "_DualMarkerREPORT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->DualMarkerREPORT->caption(), $patient_an_registration_grid->DualMarkerREPORT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->Quadruple->Required) { ?>
				elm = this.getElements("x" + infix + "_Quadruple");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->Quadruple->caption(), $patient_an_registration_grid->Quadruple->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->QuadrupleDATE->Required) { ?>
				elm = this.getElements("x" + infix + "_QuadrupleDATE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->QuadrupleDATE->caption(), $patient_an_registration_grid->QuadrupleDATE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->QuadrupleINHOUSE->Required) { ?>
				elm = this.getElements("x" + infix + "_QuadrupleINHOUSE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->QuadrupleINHOUSE->caption(), $patient_an_registration_grid->QuadrupleINHOUSE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->QuadrupleREPORT->Required) { ?>
				elm = this.getElements("x" + infix + "_QuadrupleREPORT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->QuadrupleREPORT->caption(), $patient_an_registration_grid->QuadrupleREPORT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->A5month->Required) { ?>
				elm = this.getElements("x" + infix + "_A5month");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->A5month->caption(), $patient_an_registration_grid->A5month->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->A5monthDATE->Required) { ?>
				elm = this.getElements("x" + infix + "_A5monthDATE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->A5monthDATE->caption(), $patient_an_registration_grid->A5monthDATE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->A5monthINHOUSE->Required) { ?>
				elm = this.getElements("x" + infix + "_A5monthINHOUSE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->A5monthINHOUSE->caption(), $patient_an_registration_grid->A5monthINHOUSE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->A5monthREPORT->Required) { ?>
				elm = this.getElements("x" + infix + "_A5monthREPORT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->A5monthREPORT->caption(), $patient_an_registration_grid->A5monthREPORT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->A7month->Required) { ?>
				elm = this.getElements("x" + infix + "_A7month");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->A7month->caption(), $patient_an_registration_grid->A7month->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->A7monthDATE->Required) { ?>
				elm = this.getElements("x" + infix + "_A7monthDATE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->A7monthDATE->caption(), $patient_an_registration_grid->A7monthDATE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->A7monthINHOUSE->Required) { ?>
				elm = this.getElements("x" + infix + "_A7monthINHOUSE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->A7monthINHOUSE->caption(), $patient_an_registration_grid->A7monthINHOUSE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->A7monthREPORT->Required) { ?>
				elm = this.getElements("x" + infix + "_A7monthREPORT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->A7monthREPORT->caption(), $patient_an_registration_grid->A7monthREPORT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->A9month->Required) { ?>
				elm = this.getElements("x" + infix + "_A9month");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->A9month->caption(), $patient_an_registration_grid->A9month->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->A9monthDATE->Required) { ?>
				elm = this.getElements("x" + infix + "_A9monthDATE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->A9monthDATE->caption(), $patient_an_registration_grid->A9monthDATE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->A9monthINHOUSE->Required) { ?>
				elm = this.getElements("x" + infix + "_A9monthINHOUSE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->A9monthINHOUSE->caption(), $patient_an_registration_grid->A9monthINHOUSE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->A9monthREPORT->Required) { ?>
				elm = this.getElements("x" + infix + "_A9monthREPORT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->A9monthREPORT->caption(), $patient_an_registration_grid->A9monthREPORT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->INJ->Required) { ?>
				elm = this.getElements("x" + infix + "_INJ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->INJ->caption(), $patient_an_registration_grid->INJ->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->INJDATE->Required) { ?>
				elm = this.getElements("x" + infix + "_INJDATE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->INJDATE->caption(), $patient_an_registration_grid->INJDATE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->INJINHOUSE->Required) { ?>
				elm = this.getElements("x" + infix + "_INJINHOUSE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->INJINHOUSE->caption(), $patient_an_registration_grid->INJINHOUSE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->INJREPORT->Required) { ?>
				elm = this.getElements("x" + infix + "_INJREPORT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->INJREPORT->caption(), $patient_an_registration_grid->INJREPORT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->Bleeding->Required) { ?>
				elm = this.getElements("x" + infix + "_Bleeding[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->Bleeding->caption(), $patient_an_registration_grid->Bleeding->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->Hypothyroidism->Required) { ?>
				elm = this.getElements("x" + infix + "_Hypothyroidism");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->Hypothyroidism->caption(), $patient_an_registration_grid->Hypothyroidism->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->PICMENumber->Required) { ?>
				elm = this.getElements("x" + infix + "_PICMENumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->PICMENumber->caption(), $patient_an_registration_grid->PICMENumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->Outcome->Required) { ?>
				elm = this.getElements("x" + infix + "_Outcome");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->Outcome->caption(), $patient_an_registration_grid->Outcome->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->DateofAdmission->Required) { ?>
				elm = this.getElements("x" + infix + "_DateofAdmission");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->DateofAdmission->caption(), $patient_an_registration_grid->DateofAdmission->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->DateodProcedure->Required) { ?>
				elm = this.getElements("x" + infix + "_DateodProcedure");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->DateodProcedure->caption(), $patient_an_registration_grid->DateodProcedure->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->Miscarriage->Required) { ?>
				elm = this.getElements("x" + infix + "_Miscarriage");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->Miscarriage->caption(), $patient_an_registration_grid->Miscarriage->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->ModeOfDelivery->Required) { ?>
				elm = this.getElements("x" + infix + "_ModeOfDelivery");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->ModeOfDelivery->caption(), $patient_an_registration_grid->ModeOfDelivery->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->ND->Required) { ?>
				elm = this.getElements("x" + infix + "_ND");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->ND->caption(), $patient_an_registration_grid->ND->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->NDS->Required) { ?>
				elm = this.getElements("x" + infix + "_NDS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->NDS->caption(), $patient_an_registration_grid->NDS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->NDP->Required) { ?>
				elm = this.getElements("x" + infix + "_NDP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->NDP->caption(), $patient_an_registration_grid->NDP->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->Vaccum->Required) { ?>
				elm = this.getElements("x" + infix + "_Vaccum");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->Vaccum->caption(), $patient_an_registration_grid->Vaccum->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->VaccumS->Required) { ?>
				elm = this.getElements("x" + infix + "_VaccumS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->VaccumS->caption(), $patient_an_registration_grid->VaccumS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->VaccumP->Required) { ?>
				elm = this.getElements("x" + infix + "_VaccumP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->VaccumP->caption(), $patient_an_registration_grid->VaccumP->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->Forceps->Required) { ?>
				elm = this.getElements("x" + infix + "_Forceps");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->Forceps->caption(), $patient_an_registration_grid->Forceps->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->ForcepsS->Required) { ?>
				elm = this.getElements("x" + infix + "_ForcepsS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->ForcepsS->caption(), $patient_an_registration_grid->ForcepsS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->ForcepsP->Required) { ?>
				elm = this.getElements("x" + infix + "_ForcepsP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->ForcepsP->caption(), $patient_an_registration_grid->ForcepsP->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->Elective->Required) { ?>
				elm = this.getElements("x" + infix + "_Elective");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->Elective->caption(), $patient_an_registration_grid->Elective->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->ElectiveS->Required) { ?>
				elm = this.getElements("x" + infix + "_ElectiveS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->ElectiveS->caption(), $patient_an_registration_grid->ElectiveS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->ElectiveP->Required) { ?>
				elm = this.getElements("x" + infix + "_ElectiveP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->ElectiveP->caption(), $patient_an_registration_grid->ElectiveP->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->Emergency->Required) { ?>
				elm = this.getElements("x" + infix + "_Emergency");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->Emergency->caption(), $patient_an_registration_grid->Emergency->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->EmergencyS->Required) { ?>
				elm = this.getElements("x" + infix + "_EmergencyS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->EmergencyS->caption(), $patient_an_registration_grid->EmergencyS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->EmergencyP->Required) { ?>
				elm = this.getElements("x" + infix + "_EmergencyP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->EmergencyP->caption(), $patient_an_registration_grid->EmergencyP->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->Maturity->Required) { ?>
				elm = this.getElements("x" + infix + "_Maturity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->Maturity->caption(), $patient_an_registration_grid->Maturity->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->Baby1->Required) { ?>
				elm = this.getElements("x" + infix + "_Baby1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->Baby1->caption(), $patient_an_registration_grid->Baby1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->Baby2->Required) { ?>
				elm = this.getElements("x" + infix + "_Baby2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->Baby2->caption(), $patient_an_registration_grid->Baby2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->sex1->Required) { ?>
				elm = this.getElements("x" + infix + "_sex1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->sex1->caption(), $patient_an_registration_grid->sex1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->sex2->Required) { ?>
				elm = this.getElements("x" + infix + "_sex2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->sex2->caption(), $patient_an_registration_grid->sex2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->weight1->Required) { ?>
				elm = this.getElements("x" + infix + "_weight1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->weight1->caption(), $patient_an_registration_grid->weight1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->weight2->Required) { ?>
				elm = this.getElements("x" + infix + "_weight2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->weight2->caption(), $patient_an_registration_grid->weight2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->NICU1->Required) { ?>
				elm = this.getElements("x" + infix + "_NICU1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->NICU1->caption(), $patient_an_registration_grid->NICU1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->NICU2->Required) { ?>
				elm = this.getElements("x" + infix + "_NICU2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->NICU2->caption(), $patient_an_registration_grid->NICU2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->Jaundice1->Required) { ?>
				elm = this.getElements("x" + infix + "_Jaundice1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->Jaundice1->caption(), $patient_an_registration_grid->Jaundice1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->Jaundice2->Required) { ?>
				elm = this.getElements("x" + infix + "_Jaundice2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->Jaundice2->caption(), $patient_an_registration_grid->Jaundice2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->Others1->Required) { ?>
				elm = this.getElements("x" + infix + "_Others1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->Others1->caption(), $patient_an_registration_grid->Others1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->Others2->Required) { ?>
				elm = this.getElements("x" + infix + "_Others2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->Others2->caption(), $patient_an_registration_grid->Others2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->SpillOverReasons->Required) { ?>
				elm = this.getElements("x" + infix + "_SpillOverReasons");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->SpillOverReasons->caption(), $patient_an_registration_grid->SpillOverReasons->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->ANClosed->Required) { ?>
				elm = this.getElements("x" + infix + "_ANClosed[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->ANClosed->caption(), $patient_an_registration_grid->ANClosed->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->ANClosedDATE->Required) { ?>
				elm = this.getElements("x" + infix + "_ANClosedDATE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->ANClosedDATE->caption(), $patient_an_registration_grid->ANClosedDATE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->PastMedicalHistoryOthers->Required) { ?>
				elm = this.getElements("x" + infix + "_PastMedicalHistoryOthers");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->PastMedicalHistoryOthers->caption(), $patient_an_registration_grid->PastMedicalHistoryOthers->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->PastSurgicalHistoryOthers->Required) { ?>
				elm = this.getElements("x" + infix + "_PastSurgicalHistoryOthers");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->PastSurgicalHistoryOthers->caption(), $patient_an_registration_grid->PastSurgicalHistoryOthers->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->FamilyHistoryOthers->Required) { ?>
				elm = this.getElements("x" + infix + "_FamilyHistoryOthers");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->FamilyHistoryOthers->caption(), $patient_an_registration_grid->FamilyHistoryOthers->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->PresentPregnancyComplicationsOthers->Required) { ?>
				elm = this.getElements("x" + infix + "_PresentPregnancyComplicationsOthers");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->PresentPregnancyComplicationsOthers->caption(), $patient_an_registration_grid->PresentPregnancyComplicationsOthers->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_grid->ETdate->Required) { ?>
				elm = this.getElements("x" + infix + "_ETdate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_grid->ETdate->caption(), $patient_an_registration_grid->ETdate->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
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

	// Form_CustomValidate
	fpatient_an_registrationgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatient_an_registrationgrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpatient_an_registrationgrid.lists["x_MenstrualHistory"] = <?php echo $patient_an_registration_grid->MenstrualHistory->Lookup->toClientList($patient_an_registration_grid) ?>;
	fpatient_an_registrationgrid.lists["x_MenstrualHistory"].options = <?php echo JsonEncode($patient_an_registration_grid->MenstrualHistory->options(FALSE, TRUE)) ?>;
	fpatient_an_registrationgrid.lists["x_PreviousHistoryofGDM"] = <?php echo $patient_an_registration_grid->PreviousHistoryofGDM->Lookup->toClientList($patient_an_registration_grid) ?>;
	fpatient_an_registrationgrid.lists["x_PreviousHistoryofGDM"].options = <?php echo JsonEncode($patient_an_registration_grid->PreviousHistoryofGDM->options(FALSE, TRUE)) ?>;
	fpatient_an_registrationgrid.lists["x_PreviousHistorofPIH"] = <?php echo $patient_an_registration_grid->PreviousHistorofPIH->Lookup->toClientList($patient_an_registration_grid) ?>;
	fpatient_an_registrationgrid.lists["x_PreviousHistorofPIH"].options = <?php echo JsonEncode($patient_an_registration_grid->PreviousHistorofPIH->options(FALSE, TRUE)) ?>;
	fpatient_an_registrationgrid.lists["x_PreviousHistoryofIUGR"] = <?php echo $patient_an_registration_grid->PreviousHistoryofIUGR->Lookup->toClientList($patient_an_registration_grid) ?>;
	fpatient_an_registrationgrid.lists["x_PreviousHistoryofIUGR"].options = <?php echo JsonEncode($patient_an_registration_grid->PreviousHistoryofIUGR->options(FALSE, TRUE)) ?>;
	fpatient_an_registrationgrid.lists["x_PreviousHistoryofOligohydramnios"] = <?php echo $patient_an_registration_grid->PreviousHistoryofOligohydramnios->Lookup->toClientList($patient_an_registration_grid) ?>;
	fpatient_an_registrationgrid.lists["x_PreviousHistoryofOligohydramnios"].options = <?php echo JsonEncode($patient_an_registration_grid->PreviousHistoryofOligohydramnios->options(FALSE, TRUE)) ?>;
	fpatient_an_registrationgrid.lists["x_PreviousHistoryofPreterm"] = <?php echo $patient_an_registration_grid->PreviousHistoryofPreterm->Lookup->toClientList($patient_an_registration_grid) ?>;
	fpatient_an_registrationgrid.lists["x_PreviousHistoryofPreterm"].options = <?php echo JsonEncode($patient_an_registration_grid->PreviousHistoryofPreterm->options(FALSE, TRUE)) ?>;
	fpatient_an_registrationgrid.lists["x_PastMedicalHistory[]"] = <?php echo $patient_an_registration_grid->PastMedicalHistory->Lookup->toClientList($patient_an_registration_grid) ?>;
	fpatient_an_registrationgrid.lists["x_PastMedicalHistory[]"].options = <?php echo JsonEncode($patient_an_registration_grid->PastMedicalHistory->options(FALSE, TRUE)) ?>;
	fpatient_an_registrationgrid.lists["x_PastSurgicalHistory[]"] = <?php echo $patient_an_registration_grid->PastSurgicalHistory->Lookup->toClientList($patient_an_registration_grid) ?>;
	fpatient_an_registrationgrid.lists["x_PastSurgicalHistory[]"].options = <?php echo JsonEncode($patient_an_registration_grid->PastSurgicalHistory->options(FALSE, TRUE)) ?>;
	fpatient_an_registrationgrid.lists["x_FamilyHistory[]"] = <?php echo $patient_an_registration_grid->FamilyHistory->Lookup->toClientList($patient_an_registration_grid) ?>;
	fpatient_an_registrationgrid.lists["x_FamilyHistory[]"].options = <?php echo JsonEncode($patient_an_registration_grid->FamilyHistory->options(FALSE, TRUE)) ?>;
	fpatient_an_registrationgrid.lists["x_Bleeding[]"] = <?php echo $patient_an_registration_grid->Bleeding->Lookup->toClientList($patient_an_registration_grid) ?>;
	fpatient_an_registrationgrid.lists["x_Bleeding[]"].options = <?php echo JsonEncode($patient_an_registration_grid->Bleeding->options(FALSE, TRUE)) ?>;
	fpatient_an_registrationgrid.lists["x_Miscarriage"] = <?php echo $patient_an_registration_grid->Miscarriage->Lookup->toClientList($patient_an_registration_grid) ?>;
	fpatient_an_registrationgrid.lists["x_Miscarriage"].options = <?php echo JsonEncode($patient_an_registration_grid->Miscarriage->options(FALSE, TRUE)) ?>;
	fpatient_an_registrationgrid.lists["x_ModeOfDelivery"] = <?php echo $patient_an_registration_grid->ModeOfDelivery->Lookup->toClientList($patient_an_registration_grid) ?>;
	fpatient_an_registrationgrid.lists["x_ModeOfDelivery"].options = <?php echo JsonEncode($patient_an_registration_grid->ModeOfDelivery->options(FALSE, TRUE)) ?>;
	fpatient_an_registrationgrid.lists["x_NDS"] = <?php echo $patient_an_registration_grid->NDS->Lookup->toClientList($patient_an_registration_grid) ?>;
	fpatient_an_registrationgrid.lists["x_NDS"].options = <?php echo JsonEncode($patient_an_registration_grid->NDS->options(FALSE, TRUE)) ?>;
	fpatient_an_registrationgrid.lists["x_NDP"] = <?php echo $patient_an_registration_grid->NDP->Lookup->toClientList($patient_an_registration_grid) ?>;
	fpatient_an_registrationgrid.lists["x_NDP"].options = <?php echo JsonEncode($patient_an_registration_grid->NDP->options(FALSE, TRUE)) ?>;
	fpatient_an_registrationgrid.lists["x_VaccumS"] = <?php echo $patient_an_registration_grid->VaccumS->Lookup->toClientList($patient_an_registration_grid) ?>;
	fpatient_an_registrationgrid.lists["x_VaccumS"].options = <?php echo JsonEncode($patient_an_registration_grid->VaccumS->options(FALSE, TRUE)) ?>;
	fpatient_an_registrationgrid.lists["x_VaccumP"] = <?php echo $patient_an_registration_grid->VaccumP->Lookup->toClientList($patient_an_registration_grid) ?>;
	fpatient_an_registrationgrid.lists["x_VaccumP"].options = <?php echo JsonEncode($patient_an_registration_grid->VaccumP->options(FALSE, TRUE)) ?>;
	fpatient_an_registrationgrid.lists["x_ForcepsS"] = <?php echo $patient_an_registration_grid->ForcepsS->Lookup->toClientList($patient_an_registration_grid) ?>;
	fpatient_an_registrationgrid.lists["x_ForcepsS"].options = <?php echo JsonEncode($patient_an_registration_grid->ForcepsS->options(FALSE, TRUE)) ?>;
	fpatient_an_registrationgrid.lists["x_ForcepsP"] = <?php echo $patient_an_registration_grid->ForcepsP->Lookup->toClientList($patient_an_registration_grid) ?>;
	fpatient_an_registrationgrid.lists["x_ForcepsP"].options = <?php echo JsonEncode($patient_an_registration_grid->ForcepsP->options(FALSE, TRUE)) ?>;
	fpatient_an_registrationgrid.lists["x_ElectiveS"] = <?php echo $patient_an_registration_grid->ElectiveS->Lookup->toClientList($patient_an_registration_grid) ?>;
	fpatient_an_registrationgrid.lists["x_ElectiveS"].options = <?php echo JsonEncode($patient_an_registration_grid->ElectiveS->options(FALSE, TRUE)) ?>;
	fpatient_an_registrationgrid.lists["x_ElectiveP"] = <?php echo $patient_an_registration_grid->ElectiveP->Lookup->toClientList($patient_an_registration_grid) ?>;
	fpatient_an_registrationgrid.lists["x_ElectiveP"].options = <?php echo JsonEncode($patient_an_registration_grid->ElectiveP->options(FALSE, TRUE)) ?>;
	fpatient_an_registrationgrid.lists["x_EmergencyS"] = <?php echo $patient_an_registration_grid->EmergencyS->Lookup->toClientList($patient_an_registration_grid) ?>;
	fpatient_an_registrationgrid.lists["x_EmergencyS"].options = <?php echo JsonEncode($patient_an_registration_grid->EmergencyS->options(FALSE, TRUE)) ?>;
	fpatient_an_registrationgrid.lists["x_EmergencyP"] = <?php echo $patient_an_registration_grid->EmergencyP->Lookup->toClientList($patient_an_registration_grid) ?>;
	fpatient_an_registrationgrid.lists["x_EmergencyP"].options = <?php echo JsonEncode($patient_an_registration_grid->EmergencyP->options(FALSE, TRUE)) ?>;
	fpatient_an_registrationgrid.lists["x_Maturity"] = <?php echo $patient_an_registration_grid->Maturity->Lookup->toClientList($patient_an_registration_grid) ?>;
	fpatient_an_registrationgrid.lists["x_Maturity"].options = <?php echo JsonEncode($patient_an_registration_grid->Maturity->options(FALSE, TRUE)) ?>;
	fpatient_an_registrationgrid.lists["x_SpillOverReasons"] = <?php echo $patient_an_registration_grid->SpillOverReasons->Lookup->toClientList($patient_an_registration_grid) ?>;
	fpatient_an_registrationgrid.lists["x_SpillOverReasons"].options = <?php echo JsonEncode($patient_an_registration_grid->SpillOverReasons->options(FALSE, TRUE)) ?>;
	fpatient_an_registrationgrid.lists["x_ANClosed[]"] = <?php echo $patient_an_registration_grid->ANClosed->Lookup->toClientList($patient_an_registration_grid) ?>;
	fpatient_an_registrationgrid.lists["x_ANClosed[]"].options = <?php echo JsonEncode($patient_an_registration_grid->ANClosed->options(FALSE, TRUE)) ?>;
	loadjs.done("fpatient_an_registrationgrid");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<?php } ?>
<?php
$patient_an_registration_grid->renderOtherOptions();
?>
<?php if ($patient_an_registration_grid->TotalRecords > 0 || $patient_an_registration->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_an_registration_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_an_registration">
<?php if ($patient_an_registration_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $patient_an_registration_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpatient_an_registrationgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_patient_an_registration" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_patient_an_registrationgrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_an_registration->RowType = ROWTYPE_HEADER;

// Render list options
$patient_an_registration_grid->renderListOptions();

// Render list options (header, left)
$patient_an_registration_grid->ListOptions->render("header", "left");
?>
<?php if ($patient_an_registration_grid->id->Visible) { // id ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_an_registration_grid->id->headerCellClass() ?>"><div id="elh_patient_an_registration_id" class="patient_an_registration_id"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_an_registration_grid->id->headerCellClass() ?>"><div><div id="elh_patient_an_registration_id" class="patient_an_registration_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->pid->Visible) { // pid ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->pid) == "") { ?>
		<th data-name="pid" class="<?php echo $patient_an_registration_grid->pid->headerCellClass() ?>"><div id="elh_patient_an_registration_pid" class="patient_an_registration_pid"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->pid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pid" class="<?php echo $patient_an_registration_grid->pid->headerCellClass() ?>"><div><div id="elh_patient_an_registration_pid" class="patient_an_registration_pid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->pid->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->pid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->pid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->fid->Visible) { // fid ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->fid) == "") { ?>
		<th data-name="fid" class="<?php echo $patient_an_registration_grid->fid->headerCellClass() ?>"><div id="elh_patient_an_registration_fid" class="patient_an_registration_fid"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->fid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="fid" class="<?php echo $patient_an_registration_grid->fid->headerCellClass() ?>"><div><div id="elh_patient_an_registration_fid" class="patient_an_registration_fid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->fid->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->fid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->fid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->G->Visible) { // G ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->G) == "") { ?>
		<th data-name="G" class="<?php echo $patient_an_registration_grid->G->headerCellClass() ?>"><div id="elh_patient_an_registration_G" class="patient_an_registration_G"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->G->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="G" class="<?php echo $patient_an_registration_grid->G->headerCellClass() ?>"><div><div id="elh_patient_an_registration_G" class="patient_an_registration_G">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->G->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->G->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->G->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->P->Visible) { // P ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->P) == "") { ?>
		<th data-name="P" class="<?php echo $patient_an_registration_grid->P->headerCellClass() ?>"><div id="elh_patient_an_registration_P" class="patient_an_registration_P"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->P->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="P" class="<?php echo $patient_an_registration_grid->P->headerCellClass() ?>"><div><div id="elh_patient_an_registration_P" class="patient_an_registration_P">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->P->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->P->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->P->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->L->Visible) { // L ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->L) == "") { ?>
		<th data-name="L" class="<?php echo $patient_an_registration_grid->L->headerCellClass() ?>"><div id="elh_patient_an_registration_L" class="patient_an_registration_L"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->L->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="L" class="<?php echo $patient_an_registration_grid->L->headerCellClass() ?>"><div><div id="elh_patient_an_registration_L" class="patient_an_registration_L">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->L->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->L->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->L->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->A->Visible) { // A ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->A) == "") { ?>
		<th data-name="A" class="<?php echo $patient_an_registration_grid->A->headerCellClass() ?>"><div id="elh_patient_an_registration_A" class="patient_an_registration_A"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->A->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A" class="<?php echo $patient_an_registration_grid->A->headerCellClass() ?>"><div><div id="elh_patient_an_registration_A" class="patient_an_registration_A">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->A->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->A->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->A->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->E->Visible) { // E ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->E) == "") { ?>
		<th data-name="E" class="<?php echo $patient_an_registration_grid->E->headerCellClass() ?>"><div id="elh_patient_an_registration_E" class="patient_an_registration_E"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->E->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="E" class="<?php echo $patient_an_registration_grid->E->headerCellClass() ?>"><div><div id="elh_patient_an_registration_E" class="patient_an_registration_E">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->E->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->E->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->E->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->M->Visible) { // M ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->M) == "") { ?>
		<th data-name="M" class="<?php echo $patient_an_registration_grid->M->headerCellClass() ?>"><div id="elh_patient_an_registration_M" class="patient_an_registration_M"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->M->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="M" class="<?php echo $patient_an_registration_grid->M->headerCellClass() ?>"><div><div id="elh_patient_an_registration_M" class="patient_an_registration_M">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->M->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->M->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->M->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->LMP->Visible) { // LMP ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->LMP) == "") { ?>
		<th data-name="LMP" class="<?php echo $patient_an_registration_grid->LMP->headerCellClass() ?>"><div id="elh_patient_an_registration_LMP" class="patient_an_registration_LMP"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->LMP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LMP" class="<?php echo $patient_an_registration_grid->LMP->headerCellClass() ?>"><div><div id="elh_patient_an_registration_LMP" class="patient_an_registration_LMP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->LMP->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->LMP->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->LMP->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->EDO->Visible) { // EDO ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->EDO) == "") { ?>
		<th data-name="EDO" class="<?php echo $patient_an_registration_grid->EDO->headerCellClass() ?>"><div id="elh_patient_an_registration_EDO" class="patient_an_registration_EDO"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->EDO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EDO" class="<?php echo $patient_an_registration_grid->EDO->headerCellClass() ?>"><div><div id="elh_patient_an_registration_EDO" class="patient_an_registration_EDO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->EDO->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->EDO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->EDO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->MenstrualHistory->Visible) { // MenstrualHistory ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->MenstrualHistory) == "") { ?>
		<th data-name="MenstrualHistory" class="<?php echo $patient_an_registration_grid->MenstrualHistory->headerCellClass() ?>"><div id="elh_patient_an_registration_MenstrualHistory" class="patient_an_registration_MenstrualHistory"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->MenstrualHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MenstrualHistory" class="<?php echo $patient_an_registration_grid->MenstrualHistory->headerCellClass() ?>"><div><div id="elh_patient_an_registration_MenstrualHistory" class="patient_an_registration_MenstrualHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->MenstrualHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->MenstrualHistory->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->MenstrualHistory->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->MaritalHistory->Visible) { // MaritalHistory ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->MaritalHistory) == "") { ?>
		<th data-name="MaritalHistory" class="<?php echo $patient_an_registration_grid->MaritalHistory->headerCellClass() ?>"><div id="elh_patient_an_registration_MaritalHistory" class="patient_an_registration_MaritalHistory"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->MaritalHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MaritalHistory" class="<?php echo $patient_an_registration_grid->MaritalHistory->headerCellClass() ?>"><div><div id="elh_patient_an_registration_MaritalHistory" class="patient_an_registration_MaritalHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->MaritalHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->MaritalHistory->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->MaritalHistory->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->ObstetricHistory->Visible) { // ObstetricHistory ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->ObstetricHistory) == "") { ?>
		<th data-name="ObstetricHistory" class="<?php echo $patient_an_registration_grid->ObstetricHistory->headerCellClass() ?>"><div id="elh_patient_an_registration_ObstetricHistory" class="patient_an_registration_ObstetricHistory"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->ObstetricHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ObstetricHistory" class="<?php echo $patient_an_registration_grid->ObstetricHistory->headerCellClass() ?>"><div><div id="elh_patient_an_registration_ObstetricHistory" class="patient_an_registration_ObstetricHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->ObstetricHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->ObstetricHistory->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->ObstetricHistory->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->PreviousHistoryofGDM->Visible) { // PreviousHistoryofGDM ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->PreviousHistoryofGDM) == "") { ?>
		<th data-name="PreviousHistoryofGDM" class="<?php echo $patient_an_registration_grid->PreviousHistoryofGDM->headerCellClass() ?>"><div id="elh_patient_an_registration_PreviousHistoryofGDM" class="patient_an_registration_PreviousHistoryofGDM"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->PreviousHistoryofGDM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PreviousHistoryofGDM" class="<?php echo $patient_an_registration_grid->PreviousHistoryofGDM->headerCellClass() ?>"><div><div id="elh_patient_an_registration_PreviousHistoryofGDM" class="patient_an_registration_PreviousHistoryofGDM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->PreviousHistoryofGDM->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->PreviousHistoryofGDM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->PreviousHistoryofGDM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->PreviousHistorofPIH->Visible) { // PreviousHistorofPIH ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->PreviousHistorofPIH) == "") { ?>
		<th data-name="PreviousHistorofPIH" class="<?php echo $patient_an_registration_grid->PreviousHistorofPIH->headerCellClass() ?>"><div id="elh_patient_an_registration_PreviousHistorofPIH" class="patient_an_registration_PreviousHistorofPIH"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->PreviousHistorofPIH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PreviousHistorofPIH" class="<?php echo $patient_an_registration_grid->PreviousHistorofPIH->headerCellClass() ?>"><div><div id="elh_patient_an_registration_PreviousHistorofPIH" class="patient_an_registration_PreviousHistorofPIH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->PreviousHistorofPIH->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->PreviousHistorofPIH->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->PreviousHistorofPIH->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->PreviousHistoryofIUGR->Visible) { // PreviousHistoryofIUGR ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->PreviousHistoryofIUGR) == "") { ?>
		<th data-name="PreviousHistoryofIUGR" class="<?php echo $patient_an_registration_grid->PreviousHistoryofIUGR->headerCellClass() ?>"><div id="elh_patient_an_registration_PreviousHistoryofIUGR" class="patient_an_registration_PreviousHistoryofIUGR"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->PreviousHistoryofIUGR->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PreviousHistoryofIUGR" class="<?php echo $patient_an_registration_grid->PreviousHistoryofIUGR->headerCellClass() ?>"><div><div id="elh_patient_an_registration_PreviousHistoryofIUGR" class="patient_an_registration_PreviousHistoryofIUGR">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->PreviousHistoryofIUGR->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->PreviousHistoryofIUGR->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->PreviousHistoryofIUGR->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->PreviousHistoryofOligohydramnios->Visible) { // PreviousHistoryofOligohydramnios ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->PreviousHistoryofOligohydramnios) == "") { ?>
		<th data-name="PreviousHistoryofOligohydramnios" class="<?php echo $patient_an_registration_grid->PreviousHistoryofOligohydramnios->headerCellClass() ?>"><div id="elh_patient_an_registration_PreviousHistoryofOligohydramnios" class="patient_an_registration_PreviousHistoryofOligohydramnios"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->PreviousHistoryofOligohydramnios->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PreviousHistoryofOligohydramnios" class="<?php echo $patient_an_registration_grid->PreviousHistoryofOligohydramnios->headerCellClass() ?>"><div><div id="elh_patient_an_registration_PreviousHistoryofOligohydramnios" class="patient_an_registration_PreviousHistoryofOligohydramnios">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->PreviousHistoryofOligohydramnios->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->PreviousHistoryofOligohydramnios->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->PreviousHistoryofOligohydramnios->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->PreviousHistoryofPreterm->Visible) { // PreviousHistoryofPreterm ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->PreviousHistoryofPreterm) == "") { ?>
		<th data-name="PreviousHistoryofPreterm" class="<?php echo $patient_an_registration_grid->PreviousHistoryofPreterm->headerCellClass() ?>"><div id="elh_patient_an_registration_PreviousHistoryofPreterm" class="patient_an_registration_PreviousHistoryofPreterm"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->PreviousHistoryofPreterm->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PreviousHistoryofPreterm" class="<?php echo $patient_an_registration_grid->PreviousHistoryofPreterm->headerCellClass() ?>"><div><div id="elh_patient_an_registration_PreviousHistoryofPreterm" class="patient_an_registration_PreviousHistoryofPreterm">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->PreviousHistoryofPreterm->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->PreviousHistoryofPreterm->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->PreviousHistoryofPreterm->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->G1->Visible) { // G1 ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->G1) == "") { ?>
		<th data-name="G1" class="<?php echo $patient_an_registration_grid->G1->headerCellClass() ?>"><div id="elh_patient_an_registration_G1" class="patient_an_registration_G1"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->G1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="G1" class="<?php echo $patient_an_registration_grid->G1->headerCellClass() ?>"><div><div id="elh_patient_an_registration_G1" class="patient_an_registration_G1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->G1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->G1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->G1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->G2->Visible) { // G2 ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->G2) == "") { ?>
		<th data-name="G2" class="<?php echo $patient_an_registration_grid->G2->headerCellClass() ?>"><div id="elh_patient_an_registration_G2" class="patient_an_registration_G2"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->G2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="G2" class="<?php echo $patient_an_registration_grid->G2->headerCellClass() ?>"><div><div id="elh_patient_an_registration_G2" class="patient_an_registration_G2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->G2->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->G2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->G2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->G3->Visible) { // G3 ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->G3) == "") { ?>
		<th data-name="G3" class="<?php echo $patient_an_registration_grid->G3->headerCellClass() ?>"><div id="elh_patient_an_registration_G3" class="patient_an_registration_G3"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->G3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="G3" class="<?php echo $patient_an_registration_grid->G3->headerCellClass() ?>"><div><div id="elh_patient_an_registration_G3" class="patient_an_registration_G3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->G3->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->G3->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->G3->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->DeliveryNDLSCS1->Visible) { // DeliveryNDLSCS1 ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->DeliveryNDLSCS1) == "") { ?>
		<th data-name="DeliveryNDLSCS1" class="<?php echo $patient_an_registration_grid->DeliveryNDLSCS1->headerCellClass() ?>"><div id="elh_patient_an_registration_DeliveryNDLSCS1" class="patient_an_registration_DeliveryNDLSCS1"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->DeliveryNDLSCS1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeliveryNDLSCS1" class="<?php echo $patient_an_registration_grid->DeliveryNDLSCS1->headerCellClass() ?>"><div><div id="elh_patient_an_registration_DeliveryNDLSCS1" class="patient_an_registration_DeliveryNDLSCS1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->DeliveryNDLSCS1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->DeliveryNDLSCS1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->DeliveryNDLSCS1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->DeliveryNDLSCS2->Visible) { // DeliveryNDLSCS2 ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->DeliveryNDLSCS2) == "") { ?>
		<th data-name="DeliveryNDLSCS2" class="<?php echo $patient_an_registration_grid->DeliveryNDLSCS2->headerCellClass() ?>"><div id="elh_patient_an_registration_DeliveryNDLSCS2" class="patient_an_registration_DeliveryNDLSCS2"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->DeliveryNDLSCS2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeliveryNDLSCS2" class="<?php echo $patient_an_registration_grid->DeliveryNDLSCS2->headerCellClass() ?>"><div><div id="elh_patient_an_registration_DeliveryNDLSCS2" class="patient_an_registration_DeliveryNDLSCS2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->DeliveryNDLSCS2->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->DeliveryNDLSCS2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->DeliveryNDLSCS2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->DeliveryNDLSCS3->Visible) { // DeliveryNDLSCS3 ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->DeliveryNDLSCS3) == "") { ?>
		<th data-name="DeliveryNDLSCS3" class="<?php echo $patient_an_registration_grid->DeliveryNDLSCS3->headerCellClass() ?>"><div id="elh_patient_an_registration_DeliveryNDLSCS3" class="patient_an_registration_DeliveryNDLSCS3"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->DeliveryNDLSCS3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeliveryNDLSCS3" class="<?php echo $patient_an_registration_grid->DeliveryNDLSCS3->headerCellClass() ?>"><div><div id="elh_patient_an_registration_DeliveryNDLSCS3" class="patient_an_registration_DeliveryNDLSCS3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->DeliveryNDLSCS3->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->DeliveryNDLSCS3->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->DeliveryNDLSCS3->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->BabySexweight1->Visible) { // BabySexweight1 ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->BabySexweight1) == "") { ?>
		<th data-name="BabySexweight1" class="<?php echo $patient_an_registration_grid->BabySexweight1->headerCellClass() ?>"><div id="elh_patient_an_registration_BabySexweight1" class="patient_an_registration_BabySexweight1"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->BabySexweight1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BabySexweight1" class="<?php echo $patient_an_registration_grid->BabySexweight1->headerCellClass() ?>"><div><div id="elh_patient_an_registration_BabySexweight1" class="patient_an_registration_BabySexweight1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->BabySexweight1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->BabySexweight1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->BabySexweight1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->BabySexweight2->Visible) { // BabySexweight2 ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->BabySexweight2) == "") { ?>
		<th data-name="BabySexweight2" class="<?php echo $patient_an_registration_grid->BabySexweight2->headerCellClass() ?>"><div id="elh_patient_an_registration_BabySexweight2" class="patient_an_registration_BabySexweight2"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->BabySexweight2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BabySexweight2" class="<?php echo $patient_an_registration_grid->BabySexweight2->headerCellClass() ?>"><div><div id="elh_patient_an_registration_BabySexweight2" class="patient_an_registration_BabySexweight2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->BabySexweight2->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->BabySexweight2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->BabySexweight2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->BabySexweight3->Visible) { // BabySexweight3 ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->BabySexweight3) == "") { ?>
		<th data-name="BabySexweight3" class="<?php echo $patient_an_registration_grid->BabySexweight3->headerCellClass() ?>"><div id="elh_patient_an_registration_BabySexweight3" class="patient_an_registration_BabySexweight3"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->BabySexweight3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BabySexweight3" class="<?php echo $patient_an_registration_grid->BabySexweight3->headerCellClass() ?>"><div><div id="elh_patient_an_registration_BabySexweight3" class="patient_an_registration_BabySexweight3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->BabySexweight3->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->BabySexweight3->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->BabySexweight3->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->PastMedicalHistory->Visible) { // PastMedicalHistory ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->PastMedicalHistory) == "") { ?>
		<th data-name="PastMedicalHistory" class="<?php echo $patient_an_registration_grid->PastMedicalHistory->headerCellClass() ?>"><div id="elh_patient_an_registration_PastMedicalHistory" class="patient_an_registration_PastMedicalHistory"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->PastMedicalHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PastMedicalHistory" class="<?php echo $patient_an_registration_grid->PastMedicalHistory->headerCellClass() ?>"><div><div id="elh_patient_an_registration_PastMedicalHistory" class="patient_an_registration_PastMedicalHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->PastMedicalHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->PastMedicalHistory->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->PastMedicalHistory->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->PastSurgicalHistory->Visible) { // PastSurgicalHistory ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->PastSurgicalHistory) == "") { ?>
		<th data-name="PastSurgicalHistory" class="<?php echo $patient_an_registration_grid->PastSurgicalHistory->headerCellClass() ?>"><div id="elh_patient_an_registration_PastSurgicalHistory" class="patient_an_registration_PastSurgicalHistory"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->PastSurgicalHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PastSurgicalHistory" class="<?php echo $patient_an_registration_grid->PastSurgicalHistory->headerCellClass() ?>"><div><div id="elh_patient_an_registration_PastSurgicalHistory" class="patient_an_registration_PastSurgicalHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->PastSurgicalHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->PastSurgicalHistory->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->PastSurgicalHistory->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->FamilyHistory->Visible) { // FamilyHistory ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->FamilyHistory) == "") { ?>
		<th data-name="FamilyHistory" class="<?php echo $patient_an_registration_grid->FamilyHistory->headerCellClass() ?>"><div id="elh_patient_an_registration_FamilyHistory" class="patient_an_registration_FamilyHistory"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->FamilyHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FamilyHistory" class="<?php echo $patient_an_registration_grid->FamilyHistory->headerCellClass() ?>"><div><div id="elh_patient_an_registration_FamilyHistory" class="patient_an_registration_FamilyHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->FamilyHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->FamilyHistory->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->FamilyHistory->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->Viability->Visible) { // Viability ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->Viability) == "") { ?>
		<th data-name="Viability" class="<?php echo $patient_an_registration_grid->Viability->headerCellClass() ?>"><div id="elh_patient_an_registration_Viability" class="patient_an_registration_Viability"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Viability->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Viability" class="<?php echo $patient_an_registration_grid->Viability->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Viability" class="patient_an_registration_Viability">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Viability->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->Viability->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->Viability->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->ViabilityDATE->Visible) { // ViabilityDATE ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->ViabilityDATE) == "") { ?>
		<th data-name="ViabilityDATE" class="<?php echo $patient_an_registration_grid->ViabilityDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_ViabilityDATE" class="patient_an_registration_ViabilityDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->ViabilityDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ViabilityDATE" class="<?php echo $patient_an_registration_grid->ViabilityDATE->headerCellClass() ?>"><div><div id="elh_patient_an_registration_ViabilityDATE" class="patient_an_registration_ViabilityDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->ViabilityDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->ViabilityDATE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->ViabilityDATE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->ViabilityREPORT->Visible) { // ViabilityREPORT ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->ViabilityREPORT) == "") { ?>
		<th data-name="ViabilityREPORT" class="<?php echo $patient_an_registration_grid->ViabilityREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_ViabilityREPORT" class="patient_an_registration_ViabilityREPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->ViabilityREPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ViabilityREPORT" class="<?php echo $patient_an_registration_grid->ViabilityREPORT->headerCellClass() ?>"><div><div id="elh_patient_an_registration_ViabilityREPORT" class="patient_an_registration_ViabilityREPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->ViabilityREPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->ViabilityREPORT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->ViabilityREPORT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->Viability2->Visible) { // Viability2 ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->Viability2) == "") { ?>
		<th data-name="Viability2" class="<?php echo $patient_an_registration_grid->Viability2->headerCellClass() ?>"><div id="elh_patient_an_registration_Viability2" class="patient_an_registration_Viability2"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Viability2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Viability2" class="<?php echo $patient_an_registration_grid->Viability2->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Viability2" class="patient_an_registration_Viability2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Viability2->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->Viability2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->Viability2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->Viability2DATE->Visible) { // Viability2DATE ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->Viability2DATE) == "") { ?>
		<th data-name="Viability2DATE" class="<?php echo $patient_an_registration_grid->Viability2DATE->headerCellClass() ?>"><div id="elh_patient_an_registration_Viability2DATE" class="patient_an_registration_Viability2DATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Viability2DATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Viability2DATE" class="<?php echo $patient_an_registration_grid->Viability2DATE->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Viability2DATE" class="patient_an_registration_Viability2DATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Viability2DATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->Viability2DATE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->Viability2DATE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->Viability2REPORT->Visible) { // Viability2REPORT ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->Viability2REPORT) == "") { ?>
		<th data-name="Viability2REPORT" class="<?php echo $patient_an_registration_grid->Viability2REPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_Viability2REPORT" class="patient_an_registration_Viability2REPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Viability2REPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Viability2REPORT" class="<?php echo $patient_an_registration_grid->Viability2REPORT->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Viability2REPORT" class="patient_an_registration_Viability2REPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Viability2REPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->Viability2REPORT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->Viability2REPORT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->NTscan->Visible) { // NTscan ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->NTscan) == "") { ?>
		<th data-name="NTscan" class="<?php echo $patient_an_registration_grid->NTscan->headerCellClass() ?>"><div id="elh_patient_an_registration_NTscan" class="patient_an_registration_NTscan"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->NTscan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NTscan" class="<?php echo $patient_an_registration_grid->NTscan->headerCellClass() ?>"><div><div id="elh_patient_an_registration_NTscan" class="patient_an_registration_NTscan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->NTscan->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->NTscan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->NTscan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->NTscanDATE->Visible) { // NTscanDATE ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->NTscanDATE) == "") { ?>
		<th data-name="NTscanDATE" class="<?php echo $patient_an_registration_grid->NTscanDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_NTscanDATE" class="patient_an_registration_NTscanDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->NTscanDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NTscanDATE" class="<?php echo $patient_an_registration_grid->NTscanDATE->headerCellClass() ?>"><div><div id="elh_patient_an_registration_NTscanDATE" class="patient_an_registration_NTscanDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->NTscanDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->NTscanDATE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->NTscanDATE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->NTscanREPORT->Visible) { // NTscanREPORT ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->NTscanREPORT) == "") { ?>
		<th data-name="NTscanREPORT" class="<?php echo $patient_an_registration_grid->NTscanREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_NTscanREPORT" class="patient_an_registration_NTscanREPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->NTscanREPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NTscanREPORT" class="<?php echo $patient_an_registration_grid->NTscanREPORT->headerCellClass() ?>"><div><div id="elh_patient_an_registration_NTscanREPORT" class="patient_an_registration_NTscanREPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->NTscanREPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->NTscanREPORT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->NTscanREPORT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->EarlyTarget->Visible) { // EarlyTarget ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->EarlyTarget) == "") { ?>
		<th data-name="EarlyTarget" class="<?php echo $patient_an_registration_grid->EarlyTarget->headerCellClass() ?>"><div id="elh_patient_an_registration_EarlyTarget" class="patient_an_registration_EarlyTarget"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->EarlyTarget->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EarlyTarget" class="<?php echo $patient_an_registration_grid->EarlyTarget->headerCellClass() ?>"><div><div id="elh_patient_an_registration_EarlyTarget" class="patient_an_registration_EarlyTarget">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->EarlyTarget->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->EarlyTarget->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->EarlyTarget->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->EarlyTargetDATE->Visible) { // EarlyTargetDATE ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->EarlyTargetDATE) == "") { ?>
		<th data-name="EarlyTargetDATE" class="<?php echo $patient_an_registration_grid->EarlyTargetDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_EarlyTargetDATE" class="patient_an_registration_EarlyTargetDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->EarlyTargetDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EarlyTargetDATE" class="<?php echo $patient_an_registration_grid->EarlyTargetDATE->headerCellClass() ?>"><div><div id="elh_patient_an_registration_EarlyTargetDATE" class="patient_an_registration_EarlyTargetDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->EarlyTargetDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->EarlyTargetDATE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->EarlyTargetDATE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->EarlyTargetREPORT->Visible) { // EarlyTargetREPORT ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->EarlyTargetREPORT) == "") { ?>
		<th data-name="EarlyTargetREPORT" class="<?php echo $patient_an_registration_grid->EarlyTargetREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_EarlyTargetREPORT" class="patient_an_registration_EarlyTargetREPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->EarlyTargetREPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EarlyTargetREPORT" class="<?php echo $patient_an_registration_grid->EarlyTargetREPORT->headerCellClass() ?>"><div><div id="elh_patient_an_registration_EarlyTargetREPORT" class="patient_an_registration_EarlyTargetREPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->EarlyTargetREPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->EarlyTargetREPORT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->EarlyTargetREPORT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->Anomaly->Visible) { // Anomaly ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->Anomaly) == "") { ?>
		<th data-name="Anomaly" class="<?php echo $patient_an_registration_grid->Anomaly->headerCellClass() ?>"><div id="elh_patient_an_registration_Anomaly" class="patient_an_registration_Anomaly"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Anomaly->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Anomaly" class="<?php echo $patient_an_registration_grid->Anomaly->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Anomaly" class="patient_an_registration_Anomaly">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Anomaly->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->Anomaly->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->Anomaly->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->AnomalyDATE->Visible) { // AnomalyDATE ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->AnomalyDATE) == "") { ?>
		<th data-name="AnomalyDATE" class="<?php echo $patient_an_registration_grid->AnomalyDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_AnomalyDATE" class="patient_an_registration_AnomalyDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->AnomalyDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnomalyDATE" class="<?php echo $patient_an_registration_grid->AnomalyDATE->headerCellClass() ?>"><div><div id="elh_patient_an_registration_AnomalyDATE" class="patient_an_registration_AnomalyDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->AnomalyDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->AnomalyDATE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->AnomalyDATE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->AnomalyREPORT->Visible) { // AnomalyREPORT ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->AnomalyREPORT) == "") { ?>
		<th data-name="AnomalyREPORT" class="<?php echo $patient_an_registration_grid->AnomalyREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_AnomalyREPORT" class="patient_an_registration_AnomalyREPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->AnomalyREPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnomalyREPORT" class="<?php echo $patient_an_registration_grid->AnomalyREPORT->headerCellClass() ?>"><div><div id="elh_patient_an_registration_AnomalyREPORT" class="patient_an_registration_AnomalyREPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->AnomalyREPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->AnomalyREPORT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->AnomalyREPORT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->Growth->Visible) { // Growth ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->Growth) == "") { ?>
		<th data-name="Growth" class="<?php echo $patient_an_registration_grid->Growth->headerCellClass() ?>"><div id="elh_patient_an_registration_Growth" class="patient_an_registration_Growth"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Growth->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Growth" class="<?php echo $patient_an_registration_grid->Growth->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Growth" class="patient_an_registration_Growth">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Growth->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->Growth->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->Growth->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->GrowthDATE->Visible) { // GrowthDATE ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->GrowthDATE) == "") { ?>
		<th data-name="GrowthDATE" class="<?php echo $patient_an_registration_grid->GrowthDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_GrowthDATE" class="patient_an_registration_GrowthDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->GrowthDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GrowthDATE" class="<?php echo $patient_an_registration_grid->GrowthDATE->headerCellClass() ?>"><div><div id="elh_patient_an_registration_GrowthDATE" class="patient_an_registration_GrowthDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->GrowthDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->GrowthDATE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->GrowthDATE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->GrowthREPORT->Visible) { // GrowthREPORT ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->GrowthREPORT) == "") { ?>
		<th data-name="GrowthREPORT" class="<?php echo $patient_an_registration_grid->GrowthREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_GrowthREPORT" class="patient_an_registration_GrowthREPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->GrowthREPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GrowthREPORT" class="<?php echo $patient_an_registration_grid->GrowthREPORT->headerCellClass() ?>"><div><div id="elh_patient_an_registration_GrowthREPORT" class="patient_an_registration_GrowthREPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->GrowthREPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->GrowthREPORT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->GrowthREPORT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->Growth1->Visible) { // Growth1 ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->Growth1) == "") { ?>
		<th data-name="Growth1" class="<?php echo $patient_an_registration_grid->Growth1->headerCellClass() ?>"><div id="elh_patient_an_registration_Growth1" class="patient_an_registration_Growth1"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Growth1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Growth1" class="<?php echo $patient_an_registration_grid->Growth1->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Growth1" class="patient_an_registration_Growth1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Growth1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->Growth1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->Growth1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->Growth1DATE->Visible) { // Growth1DATE ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->Growth1DATE) == "") { ?>
		<th data-name="Growth1DATE" class="<?php echo $patient_an_registration_grid->Growth1DATE->headerCellClass() ?>"><div id="elh_patient_an_registration_Growth1DATE" class="patient_an_registration_Growth1DATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Growth1DATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Growth1DATE" class="<?php echo $patient_an_registration_grid->Growth1DATE->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Growth1DATE" class="patient_an_registration_Growth1DATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Growth1DATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->Growth1DATE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->Growth1DATE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->Growth1REPORT->Visible) { // Growth1REPORT ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->Growth1REPORT) == "") { ?>
		<th data-name="Growth1REPORT" class="<?php echo $patient_an_registration_grid->Growth1REPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_Growth1REPORT" class="patient_an_registration_Growth1REPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Growth1REPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Growth1REPORT" class="<?php echo $patient_an_registration_grid->Growth1REPORT->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Growth1REPORT" class="patient_an_registration_Growth1REPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Growth1REPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->Growth1REPORT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->Growth1REPORT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->ANProfile->Visible) { // ANProfile ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->ANProfile) == "") { ?>
		<th data-name="ANProfile" class="<?php echo $patient_an_registration_grid->ANProfile->headerCellClass() ?>"><div id="elh_patient_an_registration_ANProfile" class="patient_an_registration_ANProfile"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->ANProfile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ANProfile" class="<?php echo $patient_an_registration_grid->ANProfile->headerCellClass() ?>"><div><div id="elh_patient_an_registration_ANProfile" class="patient_an_registration_ANProfile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->ANProfile->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->ANProfile->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->ANProfile->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->ANProfileDATE->Visible) { // ANProfileDATE ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->ANProfileDATE) == "") { ?>
		<th data-name="ANProfileDATE" class="<?php echo $patient_an_registration_grid->ANProfileDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_ANProfileDATE" class="patient_an_registration_ANProfileDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->ANProfileDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ANProfileDATE" class="<?php echo $patient_an_registration_grid->ANProfileDATE->headerCellClass() ?>"><div><div id="elh_patient_an_registration_ANProfileDATE" class="patient_an_registration_ANProfileDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->ANProfileDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->ANProfileDATE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->ANProfileDATE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->ANProfileINHOUSE->Visible) { // ANProfileINHOUSE ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->ANProfileINHOUSE) == "") { ?>
		<th data-name="ANProfileINHOUSE" class="<?php echo $patient_an_registration_grid->ANProfileINHOUSE->headerCellClass() ?>"><div id="elh_patient_an_registration_ANProfileINHOUSE" class="patient_an_registration_ANProfileINHOUSE"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->ANProfileINHOUSE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ANProfileINHOUSE" class="<?php echo $patient_an_registration_grid->ANProfileINHOUSE->headerCellClass() ?>"><div><div id="elh_patient_an_registration_ANProfileINHOUSE" class="patient_an_registration_ANProfileINHOUSE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->ANProfileINHOUSE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->ANProfileINHOUSE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->ANProfileINHOUSE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->ANProfileREPORT->Visible) { // ANProfileREPORT ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->ANProfileREPORT) == "") { ?>
		<th data-name="ANProfileREPORT" class="<?php echo $patient_an_registration_grid->ANProfileREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_ANProfileREPORT" class="patient_an_registration_ANProfileREPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->ANProfileREPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ANProfileREPORT" class="<?php echo $patient_an_registration_grid->ANProfileREPORT->headerCellClass() ?>"><div><div id="elh_patient_an_registration_ANProfileREPORT" class="patient_an_registration_ANProfileREPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->ANProfileREPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->ANProfileREPORT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->ANProfileREPORT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->DualMarker->Visible) { // DualMarker ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->DualMarker) == "") { ?>
		<th data-name="DualMarker" class="<?php echo $patient_an_registration_grid->DualMarker->headerCellClass() ?>"><div id="elh_patient_an_registration_DualMarker" class="patient_an_registration_DualMarker"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->DualMarker->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DualMarker" class="<?php echo $patient_an_registration_grid->DualMarker->headerCellClass() ?>"><div><div id="elh_patient_an_registration_DualMarker" class="patient_an_registration_DualMarker">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->DualMarker->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->DualMarker->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->DualMarker->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->DualMarkerDATE->Visible) { // DualMarkerDATE ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->DualMarkerDATE) == "") { ?>
		<th data-name="DualMarkerDATE" class="<?php echo $patient_an_registration_grid->DualMarkerDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_DualMarkerDATE" class="patient_an_registration_DualMarkerDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->DualMarkerDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DualMarkerDATE" class="<?php echo $patient_an_registration_grid->DualMarkerDATE->headerCellClass() ?>"><div><div id="elh_patient_an_registration_DualMarkerDATE" class="patient_an_registration_DualMarkerDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->DualMarkerDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->DualMarkerDATE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->DualMarkerDATE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->DualMarkerINHOUSE->Visible) { // DualMarkerINHOUSE ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->DualMarkerINHOUSE) == "") { ?>
		<th data-name="DualMarkerINHOUSE" class="<?php echo $patient_an_registration_grid->DualMarkerINHOUSE->headerCellClass() ?>"><div id="elh_patient_an_registration_DualMarkerINHOUSE" class="patient_an_registration_DualMarkerINHOUSE"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->DualMarkerINHOUSE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DualMarkerINHOUSE" class="<?php echo $patient_an_registration_grid->DualMarkerINHOUSE->headerCellClass() ?>"><div><div id="elh_patient_an_registration_DualMarkerINHOUSE" class="patient_an_registration_DualMarkerINHOUSE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->DualMarkerINHOUSE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->DualMarkerINHOUSE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->DualMarkerINHOUSE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->DualMarkerREPORT->Visible) { // DualMarkerREPORT ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->DualMarkerREPORT) == "") { ?>
		<th data-name="DualMarkerREPORT" class="<?php echo $patient_an_registration_grid->DualMarkerREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_DualMarkerREPORT" class="patient_an_registration_DualMarkerREPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->DualMarkerREPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DualMarkerREPORT" class="<?php echo $patient_an_registration_grid->DualMarkerREPORT->headerCellClass() ?>"><div><div id="elh_patient_an_registration_DualMarkerREPORT" class="patient_an_registration_DualMarkerREPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->DualMarkerREPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->DualMarkerREPORT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->DualMarkerREPORT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->Quadruple->Visible) { // Quadruple ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->Quadruple) == "") { ?>
		<th data-name="Quadruple" class="<?php echo $patient_an_registration_grid->Quadruple->headerCellClass() ?>"><div id="elh_patient_an_registration_Quadruple" class="patient_an_registration_Quadruple"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Quadruple->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Quadruple" class="<?php echo $patient_an_registration_grid->Quadruple->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Quadruple" class="patient_an_registration_Quadruple">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Quadruple->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->Quadruple->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->Quadruple->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->QuadrupleDATE->Visible) { // QuadrupleDATE ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->QuadrupleDATE) == "") { ?>
		<th data-name="QuadrupleDATE" class="<?php echo $patient_an_registration_grid->QuadrupleDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_QuadrupleDATE" class="patient_an_registration_QuadrupleDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->QuadrupleDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="QuadrupleDATE" class="<?php echo $patient_an_registration_grid->QuadrupleDATE->headerCellClass() ?>"><div><div id="elh_patient_an_registration_QuadrupleDATE" class="patient_an_registration_QuadrupleDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->QuadrupleDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->QuadrupleDATE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->QuadrupleDATE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->QuadrupleINHOUSE->Visible) { // QuadrupleINHOUSE ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->QuadrupleINHOUSE) == "") { ?>
		<th data-name="QuadrupleINHOUSE" class="<?php echo $patient_an_registration_grid->QuadrupleINHOUSE->headerCellClass() ?>"><div id="elh_patient_an_registration_QuadrupleINHOUSE" class="patient_an_registration_QuadrupleINHOUSE"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->QuadrupleINHOUSE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="QuadrupleINHOUSE" class="<?php echo $patient_an_registration_grid->QuadrupleINHOUSE->headerCellClass() ?>"><div><div id="elh_patient_an_registration_QuadrupleINHOUSE" class="patient_an_registration_QuadrupleINHOUSE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->QuadrupleINHOUSE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->QuadrupleINHOUSE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->QuadrupleINHOUSE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->QuadrupleREPORT->Visible) { // QuadrupleREPORT ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->QuadrupleREPORT) == "") { ?>
		<th data-name="QuadrupleREPORT" class="<?php echo $patient_an_registration_grid->QuadrupleREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_QuadrupleREPORT" class="patient_an_registration_QuadrupleREPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->QuadrupleREPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="QuadrupleREPORT" class="<?php echo $patient_an_registration_grid->QuadrupleREPORT->headerCellClass() ?>"><div><div id="elh_patient_an_registration_QuadrupleREPORT" class="patient_an_registration_QuadrupleREPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->QuadrupleREPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->QuadrupleREPORT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->QuadrupleREPORT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->A5month->Visible) { // A5month ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->A5month) == "") { ?>
		<th data-name="A5month" class="<?php echo $patient_an_registration_grid->A5month->headerCellClass() ?>"><div id="elh_patient_an_registration_A5month" class="patient_an_registration_A5month"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->A5month->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A5month" class="<?php echo $patient_an_registration_grid->A5month->headerCellClass() ?>"><div><div id="elh_patient_an_registration_A5month" class="patient_an_registration_A5month">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->A5month->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->A5month->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->A5month->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->A5monthDATE->Visible) { // A5monthDATE ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->A5monthDATE) == "") { ?>
		<th data-name="A5monthDATE" class="<?php echo $patient_an_registration_grid->A5monthDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_A5monthDATE" class="patient_an_registration_A5monthDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->A5monthDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A5monthDATE" class="<?php echo $patient_an_registration_grid->A5monthDATE->headerCellClass() ?>"><div><div id="elh_patient_an_registration_A5monthDATE" class="patient_an_registration_A5monthDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->A5monthDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->A5monthDATE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->A5monthDATE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->A5monthINHOUSE->Visible) { // A5monthINHOUSE ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->A5monthINHOUSE) == "") { ?>
		<th data-name="A5monthINHOUSE" class="<?php echo $patient_an_registration_grid->A5monthINHOUSE->headerCellClass() ?>"><div id="elh_patient_an_registration_A5monthINHOUSE" class="patient_an_registration_A5monthINHOUSE"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->A5monthINHOUSE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A5monthINHOUSE" class="<?php echo $patient_an_registration_grid->A5monthINHOUSE->headerCellClass() ?>"><div><div id="elh_patient_an_registration_A5monthINHOUSE" class="patient_an_registration_A5monthINHOUSE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->A5monthINHOUSE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->A5monthINHOUSE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->A5monthINHOUSE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->A5monthREPORT->Visible) { // A5monthREPORT ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->A5monthREPORT) == "") { ?>
		<th data-name="A5monthREPORT" class="<?php echo $patient_an_registration_grid->A5monthREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_A5monthREPORT" class="patient_an_registration_A5monthREPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->A5monthREPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A5monthREPORT" class="<?php echo $patient_an_registration_grid->A5monthREPORT->headerCellClass() ?>"><div><div id="elh_patient_an_registration_A5monthREPORT" class="patient_an_registration_A5monthREPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->A5monthREPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->A5monthREPORT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->A5monthREPORT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->A7month->Visible) { // A7month ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->A7month) == "") { ?>
		<th data-name="A7month" class="<?php echo $patient_an_registration_grid->A7month->headerCellClass() ?>"><div id="elh_patient_an_registration_A7month" class="patient_an_registration_A7month"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->A7month->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A7month" class="<?php echo $patient_an_registration_grid->A7month->headerCellClass() ?>"><div><div id="elh_patient_an_registration_A7month" class="patient_an_registration_A7month">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->A7month->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->A7month->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->A7month->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->A7monthDATE->Visible) { // A7monthDATE ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->A7monthDATE) == "") { ?>
		<th data-name="A7monthDATE" class="<?php echo $patient_an_registration_grid->A7monthDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_A7monthDATE" class="patient_an_registration_A7monthDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->A7monthDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A7monthDATE" class="<?php echo $patient_an_registration_grid->A7monthDATE->headerCellClass() ?>"><div><div id="elh_patient_an_registration_A7monthDATE" class="patient_an_registration_A7monthDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->A7monthDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->A7monthDATE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->A7monthDATE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->A7monthINHOUSE->Visible) { // A7monthINHOUSE ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->A7monthINHOUSE) == "") { ?>
		<th data-name="A7monthINHOUSE" class="<?php echo $patient_an_registration_grid->A7monthINHOUSE->headerCellClass() ?>"><div id="elh_patient_an_registration_A7monthINHOUSE" class="patient_an_registration_A7monthINHOUSE"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->A7monthINHOUSE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A7monthINHOUSE" class="<?php echo $patient_an_registration_grid->A7monthINHOUSE->headerCellClass() ?>"><div><div id="elh_patient_an_registration_A7monthINHOUSE" class="patient_an_registration_A7monthINHOUSE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->A7monthINHOUSE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->A7monthINHOUSE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->A7monthINHOUSE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->A7monthREPORT->Visible) { // A7monthREPORT ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->A7monthREPORT) == "") { ?>
		<th data-name="A7monthREPORT" class="<?php echo $patient_an_registration_grid->A7monthREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_A7monthREPORT" class="patient_an_registration_A7monthREPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->A7monthREPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A7monthREPORT" class="<?php echo $patient_an_registration_grid->A7monthREPORT->headerCellClass() ?>"><div><div id="elh_patient_an_registration_A7monthREPORT" class="patient_an_registration_A7monthREPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->A7monthREPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->A7monthREPORT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->A7monthREPORT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->A9month->Visible) { // A9month ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->A9month) == "") { ?>
		<th data-name="A9month" class="<?php echo $patient_an_registration_grid->A9month->headerCellClass() ?>"><div id="elh_patient_an_registration_A9month" class="patient_an_registration_A9month"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->A9month->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A9month" class="<?php echo $patient_an_registration_grid->A9month->headerCellClass() ?>"><div><div id="elh_patient_an_registration_A9month" class="patient_an_registration_A9month">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->A9month->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->A9month->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->A9month->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->A9monthDATE->Visible) { // A9monthDATE ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->A9monthDATE) == "") { ?>
		<th data-name="A9monthDATE" class="<?php echo $patient_an_registration_grid->A9monthDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_A9monthDATE" class="patient_an_registration_A9monthDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->A9monthDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A9monthDATE" class="<?php echo $patient_an_registration_grid->A9monthDATE->headerCellClass() ?>"><div><div id="elh_patient_an_registration_A9monthDATE" class="patient_an_registration_A9monthDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->A9monthDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->A9monthDATE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->A9monthDATE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->A9monthINHOUSE->Visible) { // A9monthINHOUSE ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->A9monthINHOUSE) == "") { ?>
		<th data-name="A9monthINHOUSE" class="<?php echo $patient_an_registration_grid->A9monthINHOUSE->headerCellClass() ?>"><div id="elh_patient_an_registration_A9monthINHOUSE" class="patient_an_registration_A9monthINHOUSE"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->A9monthINHOUSE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A9monthINHOUSE" class="<?php echo $patient_an_registration_grid->A9monthINHOUSE->headerCellClass() ?>"><div><div id="elh_patient_an_registration_A9monthINHOUSE" class="patient_an_registration_A9monthINHOUSE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->A9monthINHOUSE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->A9monthINHOUSE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->A9monthINHOUSE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->A9monthREPORT->Visible) { // A9monthREPORT ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->A9monthREPORT) == "") { ?>
		<th data-name="A9monthREPORT" class="<?php echo $patient_an_registration_grid->A9monthREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_A9monthREPORT" class="patient_an_registration_A9monthREPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->A9monthREPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A9monthREPORT" class="<?php echo $patient_an_registration_grid->A9monthREPORT->headerCellClass() ?>"><div><div id="elh_patient_an_registration_A9monthREPORT" class="patient_an_registration_A9monthREPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->A9monthREPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->A9monthREPORT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->A9monthREPORT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->INJ->Visible) { // INJ ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->INJ) == "") { ?>
		<th data-name="INJ" class="<?php echo $patient_an_registration_grid->INJ->headerCellClass() ?>"><div id="elh_patient_an_registration_INJ" class="patient_an_registration_INJ"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->INJ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="INJ" class="<?php echo $patient_an_registration_grid->INJ->headerCellClass() ?>"><div><div id="elh_patient_an_registration_INJ" class="patient_an_registration_INJ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->INJ->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->INJ->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->INJ->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->INJDATE->Visible) { // INJDATE ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->INJDATE) == "") { ?>
		<th data-name="INJDATE" class="<?php echo $patient_an_registration_grid->INJDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_INJDATE" class="patient_an_registration_INJDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->INJDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="INJDATE" class="<?php echo $patient_an_registration_grid->INJDATE->headerCellClass() ?>"><div><div id="elh_patient_an_registration_INJDATE" class="patient_an_registration_INJDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->INJDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->INJDATE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->INJDATE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->INJINHOUSE->Visible) { // INJINHOUSE ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->INJINHOUSE) == "") { ?>
		<th data-name="INJINHOUSE" class="<?php echo $patient_an_registration_grid->INJINHOUSE->headerCellClass() ?>"><div id="elh_patient_an_registration_INJINHOUSE" class="patient_an_registration_INJINHOUSE"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->INJINHOUSE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="INJINHOUSE" class="<?php echo $patient_an_registration_grid->INJINHOUSE->headerCellClass() ?>"><div><div id="elh_patient_an_registration_INJINHOUSE" class="patient_an_registration_INJINHOUSE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->INJINHOUSE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->INJINHOUSE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->INJINHOUSE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->INJREPORT->Visible) { // INJREPORT ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->INJREPORT) == "") { ?>
		<th data-name="INJREPORT" class="<?php echo $patient_an_registration_grid->INJREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_INJREPORT" class="patient_an_registration_INJREPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->INJREPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="INJREPORT" class="<?php echo $patient_an_registration_grid->INJREPORT->headerCellClass() ?>"><div><div id="elh_patient_an_registration_INJREPORT" class="patient_an_registration_INJREPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->INJREPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->INJREPORT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->INJREPORT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->Bleeding->Visible) { // Bleeding ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->Bleeding) == "") { ?>
		<th data-name="Bleeding" class="<?php echo $patient_an_registration_grid->Bleeding->headerCellClass() ?>"><div id="elh_patient_an_registration_Bleeding" class="patient_an_registration_Bleeding"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Bleeding->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Bleeding" class="<?php echo $patient_an_registration_grid->Bleeding->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Bleeding" class="patient_an_registration_Bleeding">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Bleeding->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->Bleeding->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->Bleeding->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->Hypothyroidism->Visible) { // Hypothyroidism ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->Hypothyroidism) == "") { ?>
		<th data-name="Hypothyroidism" class="<?php echo $patient_an_registration_grid->Hypothyroidism->headerCellClass() ?>"><div id="elh_patient_an_registration_Hypothyroidism" class="patient_an_registration_Hypothyroidism"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Hypothyroidism->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Hypothyroidism" class="<?php echo $patient_an_registration_grid->Hypothyroidism->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Hypothyroidism" class="patient_an_registration_Hypothyroidism">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Hypothyroidism->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->Hypothyroidism->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->Hypothyroidism->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->PICMENumber->Visible) { // PICMENumber ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->PICMENumber) == "") { ?>
		<th data-name="PICMENumber" class="<?php echo $patient_an_registration_grid->PICMENumber->headerCellClass() ?>"><div id="elh_patient_an_registration_PICMENumber" class="patient_an_registration_PICMENumber"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->PICMENumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PICMENumber" class="<?php echo $patient_an_registration_grid->PICMENumber->headerCellClass() ?>"><div><div id="elh_patient_an_registration_PICMENumber" class="patient_an_registration_PICMENumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->PICMENumber->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->PICMENumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->PICMENumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->Outcome->Visible) { // Outcome ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->Outcome) == "") { ?>
		<th data-name="Outcome" class="<?php echo $patient_an_registration_grid->Outcome->headerCellClass() ?>"><div id="elh_patient_an_registration_Outcome" class="patient_an_registration_Outcome"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Outcome->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Outcome" class="<?php echo $patient_an_registration_grid->Outcome->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Outcome" class="patient_an_registration_Outcome">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Outcome->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->Outcome->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->Outcome->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->DateofAdmission->Visible) { // DateofAdmission ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->DateofAdmission) == "") { ?>
		<th data-name="DateofAdmission" class="<?php echo $patient_an_registration_grid->DateofAdmission->headerCellClass() ?>"><div id="elh_patient_an_registration_DateofAdmission" class="patient_an_registration_DateofAdmission"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->DateofAdmission->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DateofAdmission" class="<?php echo $patient_an_registration_grid->DateofAdmission->headerCellClass() ?>"><div><div id="elh_patient_an_registration_DateofAdmission" class="patient_an_registration_DateofAdmission">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->DateofAdmission->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->DateofAdmission->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->DateofAdmission->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->DateodProcedure->Visible) { // DateodProcedure ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->DateodProcedure) == "") { ?>
		<th data-name="DateodProcedure" class="<?php echo $patient_an_registration_grid->DateodProcedure->headerCellClass() ?>"><div id="elh_patient_an_registration_DateodProcedure" class="patient_an_registration_DateodProcedure"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->DateodProcedure->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DateodProcedure" class="<?php echo $patient_an_registration_grid->DateodProcedure->headerCellClass() ?>"><div><div id="elh_patient_an_registration_DateodProcedure" class="patient_an_registration_DateodProcedure">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->DateodProcedure->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->DateodProcedure->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->DateodProcedure->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->Miscarriage->Visible) { // Miscarriage ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->Miscarriage) == "") { ?>
		<th data-name="Miscarriage" class="<?php echo $patient_an_registration_grid->Miscarriage->headerCellClass() ?>"><div id="elh_patient_an_registration_Miscarriage" class="patient_an_registration_Miscarriage"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Miscarriage->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Miscarriage" class="<?php echo $patient_an_registration_grid->Miscarriage->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Miscarriage" class="patient_an_registration_Miscarriage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Miscarriage->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->Miscarriage->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->Miscarriage->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->ModeOfDelivery->Visible) { // ModeOfDelivery ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->ModeOfDelivery) == "") { ?>
		<th data-name="ModeOfDelivery" class="<?php echo $patient_an_registration_grid->ModeOfDelivery->headerCellClass() ?>"><div id="elh_patient_an_registration_ModeOfDelivery" class="patient_an_registration_ModeOfDelivery"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->ModeOfDelivery->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeOfDelivery" class="<?php echo $patient_an_registration_grid->ModeOfDelivery->headerCellClass() ?>"><div><div id="elh_patient_an_registration_ModeOfDelivery" class="patient_an_registration_ModeOfDelivery">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->ModeOfDelivery->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->ModeOfDelivery->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->ModeOfDelivery->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->ND->Visible) { // ND ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->ND) == "") { ?>
		<th data-name="ND" class="<?php echo $patient_an_registration_grid->ND->headerCellClass() ?>"><div id="elh_patient_an_registration_ND" class="patient_an_registration_ND"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->ND->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ND" class="<?php echo $patient_an_registration_grid->ND->headerCellClass() ?>"><div><div id="elh_patient_an_registration_ND" class="patient_an_registration_ND">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->ND->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->ND->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->ND->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->NDS->Visible) { // NDS ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->NDS) == "") { ?>
		<th data-name="NDS" class="<?php echo $patient_an_registration_grid->NDS->headerCellClass() ?>"><div id="elh_patient_an_registration_NDS" class="patient_an_registration_NDS"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->NDS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NDS" class="<?php echo $patient_an_registration_grid->NDS->headerCellClass() ?>"><div><div id="elh_patient_an_registration_NDS" class="patient_an_registration_NDS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->NDS->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->NDS->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->NDS->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->NDP->Visible) { // NDP ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->NDP) == "") { ?>
		<th data-name="NDP" class="<?php echo $patient_an_registration_grid->NDP->headerCellClass() ?>"><div id="elh_patient_an_registration_NDP" class="patient_an_registration_NDP"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->NDP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NDP" class="<?php echo $patient_an_registration_grid->NDP->headerCellClass() ?>"><div><div id="elh_patient_an_registration_NDP" class="patient_an_registration_NDP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->NDP->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->NDP->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->NDP->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->Vaccum->Visible) { // Vaccum ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->Vaccum) == "") { ?>
		<th data-name="Vaccum" class="<?php echo $patient_an_registration_grid->Vaccum->headerCellClass() ?>"><div id="elh_patient_an_registration_Vaccum" class="patient_an_registration_Vaccum"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Vaccum->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Vaccum" class="<?php echo $patient_an_registration_grid->Vaccum->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Vaccum" class="patient_an_registration_Vaccum">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Vaccum->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->Vaccum->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->Vaccum->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->VaccumS->Visible) { // VaccumS ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->VaccumS) == "") { ?>
		<th data-name="VaccumS" class="<?php echo $patient_an_registration_grid->VaccumS->headerCellClass() ?>"><div id="elh_patient_an_registration_VaccumS" class="patient_an_registration_VaccumS"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->VaccumS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VaccumS" class="<?php echo $patient_an_registration_grid->VaccumS->headerCellClass() ?>"><div><div id="elh_patient_an_registration_VaccumS" class="patient_an_registration_VaccumS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->VaccumS->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->VaccumS->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->VaccumS->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->VaccumP->Visible) { // VaccumP ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->VaccumP) == "") { ?>
		<th data-name="VaccumP" class="<?php echo $patient_an_registration_grid->VaccumP->headerCellClass() ?>"><div id="elh_patient_an_registration_VaccumP" class="patient_an_registration_VaccumP"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->VaccumP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VaccumP" class="<?php echo $patient_an_registration_grid->VaccumP->headerCellClass() ?>"><div><div id="elh_patient_an_registration_VaccumP" class="patient_an_registration_VaccumP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->VaccumP->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->VaccumP->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->VaccumP->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->Forceps->Visible) { // Forceps ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->Forceps) == "") { ?>
		<th data-name="Forceps" class="<?php echo $patient_an_registration_grid->Forceps->headerCellClass() ?>"><div id="elh_patient_an_registration_Forceps" class="patient_an_registration_Forceps"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Forceps->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Forceps" class="<?php echo $patient_an_registration_grid->Forceps->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Forceps" class="patient_an_registration_Forceps">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Forceps->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->Forceps->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->Forceps->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->ForcepsS->Visible) { // ForcepsS ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->ForcepsS) == "") { ?>
		<th data-name="ForcepsS" class="<?php echo $patient_an_registration_grid->ForcepsS->headerCellClass() ?>"><div id="elh_patient_an_registration_ForcepsS" class="patient_an_registration_ForcepsS"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->ForcepsS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ForcepsS" class="<?php echo $patient_an_registration_grid->ForcepsS->headerCellClass() ?>"><div><div id="elh_patient_an_registration_ForcepsS" class="patient_an_registration_ForcepsS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->ForcepsS->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->ForcepsS->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->ForcepsS->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->ForcepsP->Visible) { // ForcepsP ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->ForcepsP) == "") { ?>
		<th data-name="ForcepsP" class="<?php echo $patient_an_registration_grid->ForcepsP->headerCellClass() ?>"><div id="elh_patient_an_registration_ForcepsP" class="patient_an_registration_ForcepsP"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->ForcepsP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ForcepsP" class="<?php echo $patient_an_registration_grid->ForcepsP->headerCellClass() ?>"><div><div id="elh_patient_an_registration_ForcepsP" class="patient_an_registration_ForcepsP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->ForcepsP->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->ForcepsP->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->ForcepsP->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->Elective->Visible) { // Elective ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->Elective) == "") { ?>
		<th data-name="Elective" class="<?php echo $patient_an_registration_grid->Elective->headerCellClass() ?>"><div id="elh_patient_an_registration_Elective" class="patient_an_registration_Elective"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Elective->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Elective" class="<?php echo $patient_an_registration_grid->Elective->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Elective" class="patient_an_registration_Elective">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Elective->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->Elective->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->Elective->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->ElectiveS->Visible) { // ElectiveS ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->ElectiveS) == "") { ?>
		<th data-name="ElectiveS" class="<?php echo $patient_an_registration_grid->ElectiveS->headerCellClass() ?>"><div id="elh_patient_an_registration_ElectiveS" class="patient_an_registration_ElectiveS"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->ElectiveS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ElectiveS" class="<?php echo $patient_an_registration_grid->ElectiveS->headerCellClass() ?>"><div><div id="elh_patient_an_registration_ElectiveS" class="patient_an_registration_ElectiveS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->ElectiveS->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->ElectiveS->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->ElectiveS->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->ElectiveP->Visible) { // ElectiveP ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->ElectiveP) == "") { ?>
		<th data-name="ElectiveP" class="<?php echo $patient_an_registration_grid->ElectiveP->headerCellClass() ?>"><div id="elh_patient_an_registration_ElectiveP" class="patient_an_registration_ElectiveP"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->ElectiveP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ElectiveP" class="<?php echo $patient_an_registration_grid->ElectiveP->headerCellClass() ?>"><div><div id="elh_patient_an_registration_ElectiveP" class="patient_an_registration_ElectiveP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->ElectiveP->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->ElectiveP->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->ElectiveP->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->Emergency->Visible) { // Emergency ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->Emergency) == "") { ?>
		<th data-name="Emergency" class="<?php echo $patient_an_registration_grid->Emergency->headerCellClass() ?>"><div id="elh_patient_an_registration_Emergency" class="patient_an_registration_Emergency"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Emergency->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Emergency" class="<?php echo $patient_an_registration_grid->Emergency->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Emergency" class="patient_an_registration_Emergency">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Emergency->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->Emergency->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->Emergency->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->EmergencyS->Visible) { // EmergencyS ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->EmergencyS) == "") { ?>
		<th data-name="EmergencyS" class="<?php echo $patient_an_registration_grid->EmergencyS->headerCellClass() ?>"><div id="elh_patient_an_registration_EmergencyS" class="patient_an_registration_EmergencyS"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->EmergencyS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EmergencyS" class="<?php echo $patient_an_registration_grid->EmergencyS->headerCellClass() ?>"><div><div id="elh_patient_an_registration_EmergencyS" class="patient_an_registration_EmergencyS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->EmergencyS->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->EmergencyS->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->EmergencyS->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->EmergencyP->Visible) { // EmergencyP ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->EmergencyP) == "") { ?>
		<th data-name="EmergencyP" class="<?php echo $patient_an_registration_grid->EmergencyP->headerCellClass() ?>"><div id="elh_patient_an_registration_EmergencyP" class="patient_an_registration_EmergencyP"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->EmergencyP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EmergencyP" class="<?php echo $patient_an_registration_grid->EmergencyP->headerCellClass() ?>"><div><div id="elh_patient_an_registration_EmergencyP" class="patient_an_registration_EmergencyP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->EmergencyP->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->EmergencyP->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->EmergencyP->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->Maturity->Visible) { // Maturity ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->Maturity) == "") { ?>
		<th data-name="Maturity" class="<?php echo $patient_an_registration_grid->Maturity->headerCellClass() ?>"><div id="elh_patient_an_registration_Maturity" class="patient_an_registration_Maturity"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Maturity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Maturity" class="<?php echo $patient_an_registration_grid->Maturity->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Maturity" class="patient_an_registration_Maturity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Maturity->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->Maturity->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->Maturity->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->Baby1->Visible) { // Baby1 ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->Baby1) == "") { ?>
		<th data-name="Baby1" class="<?php echo $patient_an_registration_grid->Baby1->headerCellClass() ?>"><div id="elh_patient_an_registration_Baby1" class="patient_an_registration_Baby1"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Baby1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Baby1" class="<?php echo $patient_an_registration_grid->Baby1->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Baby1" class="patient_an_registration_Baby1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Baby1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->Baby1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->Baby1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->Baby2->Visible) { // Baby2 ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->Baby2) == "") { ?>
		<th data-name="Baby2" class="<?php echo $patient_an_registration_grid->Baby2->headerCellClass() ?>"><div id="elh_patient_an_registration_Baby2" class="patient_an_registration_Baby2"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Baby2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Baby2" class="<?php echo $patient_an_registration_grid->Baby2->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Baby2" class="patient_an_registration_Baby2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Baby2->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->Baby2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->Baby2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->sex1->Visible) { // sex1 ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->sex1) == "") { ?>
		<th data-name="sex1" class="<?php echo $patient_an_registration_grid->sex1->headerCellClass() ?>"><div id="elh_patient_an_registration_sex1" class="patient_an_registration_sex1"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->sex1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sex1" class="<?php echo $patient_an_registration_grid->sex1->headerCellClass() ?>"><div><div id="elh_patient_an_registration_sex1" class="patient_an_registration_sex1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->sex1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->sex1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->sex1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->sex2->Visible) { // sex2 ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->sex2) == "") { ?>
		<th data-name="sex2" class="<?php echo $patient_an_registration_grid->sex2->headerCellClass() ?>"><div id="elh_patient_an_registration_sex2" class="patient_an_registration_sex2"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->sex2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sex2" class="<?php echo $patient_an_registration_grid->sex2->headerCellClass() ?>"><div><div id="elh_patient_an_registration_sex2" class="patient_an_registration_sex2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->sex2->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->sex2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->sex2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->weight1->Visible) { // weight1 ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->weight1) == "") { ?>
		<th data-name="weight1" class="<?php echo $patient_an_registration_grid->weight1->headerCellClass() ?>"><div id="elh_patient_an_registration_weight1" class="patient_an_registration_weight1"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->weight1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="weight1" class="<?php echo $patient_an_registration_grid->weight1->headerCellClass() ?>"><div><div id="elh_patient_an_registration_weight1" class="patient_an_registration_weight1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->weight1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->weight1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->weight1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->weight2->Visible) { // weight2 ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->weight2) == "") { ?>
		<th data-name="weight2" class="<?php echo $patient_an_registration_grid->weight2->headerCellClass() ?>"><div id="elh_patient_an_registration_weight2" class="patient_an_registration_weight2"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->weight2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="weight2" class="<?php echo $patient_an_registration_grid->weight2->headerCellClass() ?>"><div><div id="elh_patient_an_registration_weight2" class="patient_an_registration_weight2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->weight2->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->weight2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->weight2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->NICU1->Visible) { // NICU1 ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->NICU1) == "") { ?>
		<th data-name="NICU1" class="<?php echo $patient_an_registration_grid->NICU1->headerCellClass() ?>"><div id="elh_patient_an_registration_NICU1" class="patient_an_registration_NICU1"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->NICU1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NICU1" class="<?php echo $patient_an_registration_grid->NICU1->headerCellClass() ?>"><div><div id="elh_patient_an_registration_NICU1" class="patient_an_registration_NICU1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->NICU1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->NICU1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->NICU1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->NICU2->Visible) { // NICU2 ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->NICU2) == "") { ?>
		<th data-name="NICU2" class="<?php echo $patient_an_registration_grid->NICU2->headerCellClass() ?>"><div id="elh_patient_an_registration_NICU2" class="patient_an_registration_NICU2"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->NICU2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NICU2" class="<?php echo $patient_an_registration_grid->NICU2->headerCellClass() ?>"><div><div id="elh_patient_an_registration_NICU2" class="patient_an_registration_NICU2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->NICU2->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->NICU2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->NICU2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->Jaundice1->Visible) { // Jaundice1 ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->Jaundice1) == "") { ?>
		<th data-name="Jaundice1" class="<?php echo $patient_an_registration_grid->Jaundice1->headerCellClass() ?>"><div id="elh_patient_an_registration_Jaundice1" class="patient_an_registration_Jaundice1"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Jaundice1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Jaundice1" class="<?php echo $patient_an_registration_grid->Jaundice1->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Jaundice1" class="patient_an_registration_Jaundice1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Jaundice1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->Jaundice1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->Jaundice1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->Jaundice2->Visible) { // Jaundice2 ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->Jaundice2) == "") { ?>
		<th data-name="Jaundice2" class="<?php echo $patient_an_registration_grid->Jaundice2->headerCellClass() ?>"><div id="elh_patient_an_registration_Jaundice2" class="patient_an_registration_Jaundice2"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Jaundice2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Jaundice2" class="<?php echo $patient_an_registration_grid->Jaundice2->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Jaundice2" class="patient_an_registration_Jaundice2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Jaundice2->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->Jaundice2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->Jaundice2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->Others1->Visible) { // Others1 ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->Others1) == "") { ?>
		<th data-name="Others1" class="<?php echo $patient_an_registration_grid->Others1->headerCellClass() ?>"><div id="elh_patient_an_registration_Others1" class="patient_an_registration_Others1"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Others1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Others1" class="<?php echo $patient_an_registration_grid->Others1->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Others1" class="patient_an_registration_Others1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Others1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->Others1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->Others1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->Others2->Visible) { // Others2 ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->Others2) == "") { ?>
		<th data-name="Others2" class="<?php echo $patient_an_registration_grid->Others2->headerCellClass() ?>"><div id="elh_patient_an_registration_Others2" class="patient_an_registration_Others2"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Others2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Others2" class="<?php echo $patient_an_registration_grid->Others2->headerCellClass() ?>"><div><div id="elh_patient_an_registration_Others2" class="patient_an_registration_Others2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->Others2->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->Others2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->Others2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->SpillOverReasons->Visible) { // SpillOverReasons ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->SpillOverReasons) == "") { ?>
		<th data-name="SpillOverReasons" class="<?php echo $patient_an_registration_grid->SpillOverReasons->headerCellClass() ?>"><div id="elh_patient_an_registration_SpillOverReasons" class="patient_an_registration_SpillOverReasons"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->SpillOverReasons->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SpillOverReasons" class="<?php echo $patient_an_registration_grid->SpillOverReasons->headerCellClass() ?>"><div><div id="elh_patient_an_registration_SpillOverReasons" class="patient_an_registration_SpillOverReasons">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->SpillOverReasons->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->SpillOverReasons->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->SpillOverReasons->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->ANClosed->Visible) { // ANClosed ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->ANClosed) == "") { ?>
		<th data-name="ANClosed" class="<?php echo $patient_an_registration_grid->ANClosed->headerCellClass() ?>"><div id="elh_patient_an_registration_ANClosed" class="patient_an_registration_ANClosed"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->ANClosed->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ANClosed" class="<?php echo $patient_an_registration_grid->ANClosed->headerCellClass() ?>"><div><div id="elh_patient_an_registration_ANClosed" class="patient_an_registration_ANClosed">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->ANClosed->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->ANClosed->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->ANClosed->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->ANClosedDATE->Visible) { // ANClosedDATE ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->ANClosedDATE) == "") { ?>
		<th data-name="ANClosedDATE" class="<?php echo $patient_an_registration_grid->ANClosedDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_ANClosedDATE" class="patient_an_registration_ANClosedDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->ANClosedDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ANClosedDATE" class="<?php echo $patient_an_registration_grid->ANClosedDATE->headerCellClass() ?>"><div><div id="elh_patient_an_registration_ANClosedDATE" class="patient_an_registration_ANClosedDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->ANClosedDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->ANClosedDATE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->ANClosedDATE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->PastMedicalHistoryOthers->Visible) { // PastMedicalHistoryOthers ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->PastMedicalHistoryOthers) == "") { ?>
		<th data-name="PastMedicalHistoryOthers" class="<?php echo $patient_an_registration_grid->PastMedicalHistoryOthers->headerCellClass() ?>"><div id="elh_patient_an_registration_PastMedicalHistoryOthers" class="patient_an_registration_PastMedicalHistoryOthers"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->PastMedicalHistoryOthers->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PastMedicalHistoryOthers" class="<?php echo $patient_an_registration_grid->PastMedicalHistoryOthers->headerCellClass() ?>"><div><div id="elh_patient_an_registration_PastMedicalHistoryOthers" class="patient_an_registration_PastMedicalHistoryOthers">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->PastMedicalHistoryOthers->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->PastMedicalHistoryOthers->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->PastMedicalHistoryOthers->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->PastSurgicalHistoryOthers->Visible) { // PastSurgicalHistoryOthers ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->PastSurgicalHistoryOthers) == "") { ?>
		<th data-name="PastSurgicalHistoryOthers" class="<?php echo $patient_an_registration_grid->PastSurgicalHistoryOthers->headerCellClass() ?>"><div id="elh_patient_an_registration_PastSurgicalHistoryOthers" class="patient_an_registration_PastSurgicalHistoryOthers"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->PastSurgicalHistoryOthers->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PastSurgicalHistoryOthers" class="<?php echo $patient_an_registration_grid->PastSurgicalHistoryOthers->headerCellClass() ?>"><div><div id="elh_patient_an_registration_PastSurgicalHistoryOthers" class="patient_an_registration_PastSurgicalHistoryOthers">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->PastSurgicalHistoryOthers->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->PastSurgicalHistoryOthers->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->PastSurgicalHistoryOthers->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->FamilyHistoryOthers->Visible) { // FamilyHistoryOthers ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->FamilyHistoryOthers) == "") { ?>
		<th data-name="FamilyHistoryOthers" class="<?php echo $patient_an_registration_grid->FamilyHistoryOthers->headerCellClass() ?>"><div id="elh_patient_an_registration_FamilyHistoryOthers" class="patient_an_registration_FamilyHistoryOthers"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->FamilyHistoryOthers->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FamilyHistoryOthers" class="<?php echo $patient_an_registration_grid->FamilyHistoryOthers->headerCellClass() ?>"><div><div id="elh_patient_an_registration_FamilyHistoryOthers" class="patient_an_registration_FamilyHistoryOthers">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->FamilyHistoryOthers->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->FamilyHistoryOthers->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->FamilyHistoryOthers->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->PresentPregnancyComplicationsOthers->Visible) { // PresentPregnancyComplicationsOthers ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->PresentPregnancyComplicationsOthers) == "") { ?>
		<th data-name="PresentPregnancyComplicationsOthers" class="<?php echo $patient_an_registration_grid->PresentPregnancyComplicationsOthers->headerCellClass() ?>"><div id="elh_patient_an_registration_PresentPregnancyComplicationsOthers" class="patient_an_registration_PresentPregnancyComplicationsOthers"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->PresentPregnancyComplicationsOthers->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PresentPregnancyComplicationsOthers" class="<?php echo $patient_an_registration_grid->PresentPregnancyComplicationsOthers->headerCellClass() ?>"><div><div id="elh_patient_an_registration_PresentPregnancyComplicationsOthers" class="patient_an_registration_PresentPregnancyComplicationsOthers">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->PresentPregnancyComplicationsOthers->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->PresentPregnancyComplicationsOthers->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->PresentPregnancyComplicationsOthers->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_grid->ETdate->Visible) { // ETdate ?>
	<?php if ($patient_an_registration_grid->SortUrl($patient_an_registration_grid->ETdate) == "") { ?>
		<th data-name="ETdate" class="<?php echo $patient_an_registration_grid->ETdate->headerCellClass() ?>"><div id="elh_patient_an_registration_ETdate" class="patient_an_registration_ETdate"><div class="ew-table-header-caption"><?php echo $patient_an_registration_grid->ETdate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ETdate" class="<?php echo $patient_an_registration_grid->ETdate->headerCellClass() ?>"><div><div id="elh_patient_an_registration_ETdate" class="patient_an_registration_ETdate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_grid->ETdate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_grid->ETdate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_grid->ETdate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
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
$patient_an_registration_grid->StartRecord = 1;
$patient_an_registration_grid->StopRecord = $patient_an_registration_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($patient_an_registration->isConfirm() || $patient_an_registration_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($patient_an_registration_grid->FormKeyCountName) && ($patient_an_registration_grid->isGridAdd() || $patient_an_registration_grid->isGridEdit() || $patient_an_registration->isConfirm())) {
		$patient_an_registration_grid->KeyCount = $CurrentForm->getValue($patient_an_registration_grid->FormKeyCountName);
		$patient_an_registration_grid->StopRecord = $patient_an_registration_grid->StartRecord + $patient_an_registration_grid->KeyCount - 1;
	}
}
$patient_an_registration_grid->RecordCount = $patient_an_registration_grid->StartRecord - 1;
if ($patient_an_registration_grid->Recordset && !$patient_an_registration_grid->Recordset->EOF) {
	$patient_an_registration_grid->Recordset->moveFirst();
	$selectLimit = $patient_an_registration_grid->UseSelectLimit;
	if (!$selectLimit && $patient_an_registration_grid->StartRecord > 1)
		$patient_an_registration_grid->Recordset->move($patient_an_registration_grid->StartRecord - 1);
} elseif (!$patient_an_registration->AllowAddDeleteRow && $patient_an_registration_grid->StopRecord == 0) {
	$patient_an_registration_grid->StopRecord = $patient_an_registration->GridAddRowCount;
}

// Initialize aggregate
$patient_an_registration->RowType = ROWTYPE_AGGREGATEINIT;
$patient_an_registration->resetAttributes();
$patient_an_registration_grid->renderRow();
if ($patient_an_registration_grid->isGridAdd())
	$patient_an_registration_grid->RowIndex = 0;
if ($patient_an_registration_grid->isGridEdit())
	$patient_an_registration_grid->RowIndex = 0;
while ($patient_an_registration_grid->RecordCount < $patient_an_registration_grid->StopRecord) {
	$patient_an_registration_grid->RecordCount++;
	if ($patient_an_registration_grid->RecordCount >= $patient_an_registration_grid->StartRecord) {
		$patient_an_registration_grid->RowCount++;
		if ($patient_an_registration_grid->isGridAdd() || $patient_an_registration_grid->isGridEdit() || $patient_an_registration->isConfirm()) {
			$patient_an_registration_grid->RowIndex++;
			$CurrentForm->Index = $patient_an_registration_grid->RowIndex;
			if ($CurrentForm->hasValue($patient_an_registration_grid->FormActionName) && ($patient_an_registration->isConfirm() || $patient_an_registration_grid->EventCancelled))
				$patient_an_registration_grid->RowAction = strval($CurrentForm->getValue($patient_an_registration_grid->FormActionName));
			elseif ($patient_an_registration_grid->isGridAdd())
				$patient_an_registration_grid->RowAction = "insert";
			else
				$patient_an_registration_grid->RowAction = "";
		}

		// Set up key count
		$patient_an_registration_grid->KeyCount = $patient_an_registration_grid->RowIndex;

		// Init row class and style
		$patient_an_registration->resetAttributes();
		$patient_an_registration->CssClass = "";
		if ($patient_an_registration_grid->isGridAdd()) {
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
		if ($patient_an_registration_grid->isGridAdd()) // Grid add
			$patient_an_registration->RowType = ROWTYPE_ADD; // Render add
		if ($patient_an_registration_grid->isGridAdd() && $patient_an_registration->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$patient_an_registration_grid->restoreCurrentRowFormValues($patient_an_registration_grid->RowIndex); // Restore form values
		if ($patient_an_registration_grid->isGridEdit()) { // Grid edit
			if ($patient_an_registration->EventCancelled)
				$patient_an_registration_grid->restoreCurrentRowFormValues($patient_an_registration_grid->RowIndex); // Restore form values
			if ($patient_an_registration_grid->RowAction == "insert")
				$patient_an_registration->RowType = ROWTYPE_ADD; // Render add
			else
				$patient_an_registration->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($patient_an_registration_grid->isGridEdit() && ($patient_an_registration->RowType == ROWTYPE_EDIT || $patient_an_registration->RowType == ROWTYPE_ADD) && $patient_an_registration->EventCancelled) // Update failed
			$patient_an_registration_grid->restoreCurrentRowFormValues($patient_an_registration_grid->RowIndex); // Restore form values
		if ($patient_an_registration->RowType == ROWTYPE_EDIT) // Edit row
			$patient_an_registration_grid->EditRowCount++;
		if ($patient_an_registration->isConfirm()) // Confirm row
			$patient_an_registration_grid->restoreCurrentRowFormValues($patient_an_registration_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$patient_an_registration->RowAttrs->merge(["data-rowindex" => $patient_an_registration_grid->RowCount, "id" => "r" . $patient_an_registration_grid->RowCount . "_patient_an_registration", "data-rowtype" => $patient_an_registration->RowType]);

		// Render row
		$patient_an_registration_grid->renderRow();

		// Render list options
		$patient_an_registration_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($patient_an_registration_grid->RowAction != "delete" && $patient_an_registration_grid->RowAction != "insertdelete" && !($patient_an_registration_grid->RowAction == "insert" && $patient_an_registration->isConfirm() && $patient_an_registration_grid->emptyRow())) {
?>
	<tr <?php echo $patient_an_registration->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_an_registration_grid->ListOptions->render("body", "left", $patient_an_registration_grid->RowCount);
?>
	<?php if ($patient_an_registration_grid->id->Visible) { // id ?>
		<td data-name="id" <?php echo $patient_an_registration_grid->id->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_id" class="form-group"></span>
<input type="hidden" data-table="patient_an_registration" data-field="x_id" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_id" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_an_registration_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_id" class="form-group">
<span<?php echo $patient_an_registration_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_id" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_id" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_an_registration_grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_id">
<span<?php echo $patient_an_registration_grid->id->viewAttributes() ?>><?php echo $patient_an_registration_grid->id->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_id" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_id" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_an_registration_grid->id->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_id" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_id" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_an_registration_grid->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_id" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_id" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_an_registration_grid->id->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_id" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_id" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_an_registration_grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->pid->Visible) { // pid ?>
		<td data-name="pid" <?php echo $patient_an_registration_grid->pid->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_an_registration_grid->pid->getSessionValue() != "") { ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_pid" class="form-group">
<span<?php echo $patient_an_registration_grid->pid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->pid->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_pid" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_pid" value="<?php echo HtmlEncode($patient_an_registration_grid->pid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_pid" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_pid" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_pid" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_pid" size="30" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->pid->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->pid->EditValue ?>"<?php echo $patient_an_registration_grid->pid->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_pid" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_pid" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_pid" value="<?php echo HtmlEncode($patient_an_registration_grid->pid->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($patient_an_registration_grid->pid->getSessionValue() != "") { ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_pid" class="form-group">
<span<?php echo $patient_an_registration_grid->pid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->pid->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_pid" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_pid" value="<?php echo HtmlEncode($patient_an_registration_grid->pid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_pid" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_pid" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_pid" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_pid" size="30" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->pid->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->pid->EditValue ?>"<?php echo $patient_an_registration_grid->pid->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_pid">
<span<?php echo $patient_an_registration_grid->pid->viewAttributes() ?>><?php echo $patient_an_registration_grid->pid->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_pid" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_pid" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_pid" value="<?php echo HtmlEncode($patient_an_registration_grid->pid->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_pid" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_pid" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_pid" value="<?php echo HtmlEncode($patient_an_registration_grid->pid->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_pid" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_pid" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_pid" value="<?php echo HtmlEncode($patient_an_registration_grid->pid->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_pid" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_pid" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_pid" value="<?php echo HtmlEncode($patient_an_registration_grid->pid->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->fid->Visible) { // fid ?>
		<td data-name="fid" <?php echo $patient_an_registration_grid->fid->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_an_registration_grid->fid->getSessionValue() != "") { ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_fid" class="form-group">
<span<?php echo $patient_an_registration_grid->fid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->fid->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_fid" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_fid" value="<?php echo HtmlEncode($patient_an_registration_grid->fid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_fid" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_fid" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_fid" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_fid" size="30" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->fid->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->fid->EditValue ?>"<?php echo $patient_an_registration_grid->fid->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_fid" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_fid" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_fid" value="<?php echo HtmlEncode($patient_an_registration_grid->fid->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($patient_an_registration_grid->fid->getSessionValue() != "") { ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_fid" class="form-group">
<span<?php echo $patient_an_registration_grid->fid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->fid->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_fid" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_fid" value="<?php echo HtmlEncode($patient_an_registration_grid->fid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_fid" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_fid" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_fid" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_fid" size="30" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->fid->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->fid->EditValue ?>"<?php echo $patient_an_registration_grid->fid->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_fid">
<span<?php echo $patient_an_registration_grid->fid->viewAttributes() ?>><?php echo $patient_an_registration_grid->fid->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_fid" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_fid" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_fid" value="<?php echo HtmlEncode($patient_an_registration_grid->fid->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_fid" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_fid" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_fid" value="<?php echo HtmlEncode($patient_an_registration_grid->fid->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_fid" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_fid" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_fid" value="<?php echo HtmlEncode($patient_an_registration_grid->fid->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_fid" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_fid" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_fid" value="<?php echo HtmlEncode($patient_an_registration_grid->fid->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->G->Visible) { // G ?>
		<td data-name="G" <?php echo $patient_an_registration_grid->G->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_G" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_G" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_G" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_G" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->G->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->G->EditValue ?>"<?php echo $patient_an_registration_grid->G->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_G" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_G" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_G" value="<?php echo HtmlEncode($patient_an_registration_grid->G->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_G" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_G" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_G" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_G" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->G->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->G->EditValue ?>"<?php echo $patient_an_registration_grid->G->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_G">
<span<?php echo $patient_an_registration_grid->G->viewAttributes() ?>><?php echo $patient_an_registration_grid->G->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_G" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_G" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_G" value="<?php echo HtmlEncode($patient_an_registration_grid->G->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_G" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_G" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_G" value="<?php echo HtmlEncode($patient_an_registration_grid->G->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_G" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_G" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_G" value="<?php echo HtmlEncode($patient_an_registration_grid->G->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_G" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_G" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_G" value="<?php echo HtmlEncode($patient_an_registration_grid->G->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->P->Visible) { // P ?>
		<td data-name="P" <?php echo $patient_an_registration_grid->P->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_P" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_P" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_P" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_P" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->P->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->P->EditValue ?>"<?php echo $patient_an_registration_grid->P->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_P" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_P" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_P" value="<?php echo HtmlEncode($patient_an_registration_grid->P->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_P" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_P" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_P" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_P" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->P->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->P->EditValue ?>"<?php echo $patient_an_registration_grid->P->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_P">
<span<?php echo $patient_an_registration_grid->P->viewAttributes() ?>><?php echo $patient_an_registration_grid->P->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_P" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_P" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_P" value="<?php echo HtmlEncode($patient_an_registration_grid->P->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_P" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_P" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_P" value="<?php echo HtmlEncode($patient_an_registration_grid->P->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_P" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_P" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_P" value="<?php echo HtmlEncode($patient_an_registration_grid->P->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_P" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_P" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_P" value="<?php echo HtmlEncode($patient_an_registration_grid->P->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->L->Visible) { // L ?>
		<td data-name="L" <?php echo $patient_an_registration_grid->L->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_L" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_L" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_L" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_L" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->L->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->L->EditValue ?>"<?php echo $patient_an_registration_grid->L->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_L" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_L" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_L" value="<?php echo HtmlEncode($patient_an_registration_grid->L->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_L" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_L" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_L" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_L" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->L->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->L->EditValue ?>"<?php echo $patient_an_registration_grid->L->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_L">
<span<?php echo $patient_an_registration_grid->L->viewAttributes() ?>><?php echo $patient_an_registration_grid->L->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_L" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_L" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_L" value="<?php echo HtmlEncode($patient_an_registration_grid->L->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_L" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_L" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_L" value="<?php echo HtmlEncode($patient_an_registration_grid->L->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_L" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_L" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_L" value="<?php echo HtmlEncode($patient_an_registration_grid->L->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_L" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_L" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_L" value="<?php echo HtmlEncode($patient_an_registration_grid->L->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->A->Visible) { // A ?>
		<td data-name="A" <?php echo $patient_an_registration_grid->A->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_A" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_A" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->A->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->A->EditValue ?>"<?php echo $patient_an_registration_grid->A->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A" value="<?php echo HtmlEncode($patient_an_registration_grid->A->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_A" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_A" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->A->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->A->EditValue ?>"<?php echo $patient_an_registration_grid->A->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_A">
<span<?php echo $patient_an_registration_grid->A->viewAttributes() ?>><?php echo $patient_an_registration_grid->A->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A" value="<?php echo HtmlEncode($patient_an_registration_grid->A->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A" value="<?php echo HtmlEncode($patient_an_registration_grid->A->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A" value="<?php echo HtmlEncode($patient_an_registration_grid->A->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A" value="<?php echo HtmlEncode($patient_an_registration_grid->A->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->E->Visible) { // E ?>
		<td data-name="E" <?php echo $patient_an_registration_grid->E->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_E" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_E" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_E" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_E" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->E->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->E->EditValue ?>"<?php echo $patient_an_registration_grid->E->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_E" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_E" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_E" value="<?php echo HtmlEncode($patient_an_registration_grid->E->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_E" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_E" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_E" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_E" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->E->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->E->EditValue ?>"<?php echo $patient_an_registration_grid->E->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_E">
<span<?php echo $patient_an_registration_grid->E->viewAttributes() ?>><?php echo $patient_an_registration_grid->E->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_E" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_E" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_E" value="<?php echo HtmlEncode($patient_an_registration_grid->E->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_E" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_E" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_E" value="<?php echo HtmlEncode($patient_an_registration_grid->E->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_E" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_E" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_E" value="<?php echo HtmlEncode($patient_an_registration_grid->E->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_E" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_E" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_E" value="<?php echo HtmlEncode($patient_an_registration_grid->E->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->M->Visible) { // M ?>
		<td data-name="M" <?php echo $patient_an_registration_grid->M->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_M" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_M" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_M" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_M" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->M->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->M->EditValue ?>"<?php echo $patient_an_registration_grid->M->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_M" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_M" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_M" value="<?php echo HtmlEncode($patient_an_registration_grid->M->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_M" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_M" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_M" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_M" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->M->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->M->EditValue ?>"<?php echo $patient_an_registration_grid->M->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_M">
<span<?php echo $patient_an_registration_grid->M->viewAttributes() ?>><?php echo $patient_an_registration_grid->M->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_M" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_M" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_M" value="<?php echo HtmlEncode($patient_an_registration_grid->M->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_M" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_M" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_M" value="<?php echo HtmlEncode($patient_an_registration_grid->M->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_M" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_M" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_M" value="<?php echo HtmlEncode($patient_an_registration_grid->M->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_M" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_M" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_M" value="<?php echo HtmlEncode($patient_an_registration_grid->M->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->LMP->Visible) { // LMP ?>
		<td data-name="LMP" <?php echo $patient_an_registration_grid->LMP->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_LMP" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_LMP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_LMP" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_LMP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->LMP->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->LMP->EditValue ?>"<?php echo $patient_an_registration_grid->LMP->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->LMP->ReadOnly && !$patient_an_registration_grid->LMP->Disabled && !isset($patient_an_registration_grid->LMP->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->LMP->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_LMP", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_LMP" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_LMP" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_LMP" value="<?php echo HtmlEncode($patient_an_registration_grid->LMP->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_LMP" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_LMP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_LMP" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_LMP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->LMP->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->LMP->EditValue ?>"<?php echo $patient_an_registration_grid->LMP->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->LMP->ReadOnly && !$patient_an_registration_grid->LMP->Disabled && !isset($patient_an_registration_grid->LMP->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->LMP->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_LMP", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_LMP">
<span<?php echo $patient_an_registration_grid->LMP->viewAttributes() ?>><?php echo $patient_an_registration_grid->LMP->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_LMP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_LMP" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_LMP" value="<?php echo HtmlEncode($patient_an_registration_grid->LMP->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_LMP" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_LMP" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_LMP" value="<?php echo HtmlEncode($patient_an_registration_grid->LMP->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_LMP" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_LMP" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_LMP" value="<?php echo HtmlEncode($patient_an_registration_grid->LMP->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_LMP" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_LMP" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_LMP" value="<?php echo HtmlEncode($patient_an_registration_grid->LMP->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->EDO->Visible) { // EDO ?>
		<td data-name="EDO" <?php echo $patient_an_registration_grid->EDO->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_EDO" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_EDO" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EDO" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EDO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->EDO->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->EDO->EditValue ?>"<?php echo $patient_an_registration_grid->EDO->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->EDO->ReadOnly && !$patient_an_registration_grid->EDO->Disabled && !isset($patient_an_registration_grid->EDO->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->EDO->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_EDO", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_EDO" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_EDO" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_EDO" value="<?php echo HtmlEncode($patient_an_registration_grid->EDO->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_EDO" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_EDO" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EDO" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EDO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->EDO->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->EDO->EditValue ?>"<?php echo $patient_an_registration_grid->EDO->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->EDO->ReadOnly && !$patient_an_registration_grid->EDO->Disabled && !isset($patient_an_registration_grid->EDO->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->EDO->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_EDO", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_EDO">
<span<?php echo $patient_an_registration_grid->EDO->viewAttributes() ?>><?php echo $patient_an_registration_grid->EDO->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_EDO" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EDO" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EDO" value="<?php echo HtmlEncode($patient_an_registration_grid->EDO->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_EDO" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_EDO" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_EDO" value="<?php echo HtmlEncode($patient_an_registration_grid->EDO->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_EDO" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_EDO" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_EDO" value="<?php echo HtmlEncode($patient_an_registration_grid->EDO->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_EDO" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_EDO" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_EDO" value="<?php echo HtmlEncode($patient_an_registration_grid->EDO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->MenstrualHistory->Visible) { // MenstrualHistory ?>
		<td data-name="MenstrualHistory" <?php echo $patient_an_registration_grid->MenstrualHistory->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_MenstrualHistory" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_MenstrualHistory" data-value-separator="<?php echo $patient_an_registration_grid->MenstrualHistory->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_MenstrualHistory" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_MenstrualHistory"<?php echo $patient_an_registration_grid->MenstrualHistory->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->MenstrualHistory->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_MenstrualHistory") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_MenstrualHistory" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_MenstrualHistory" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_MenstrualHistory" value="<?php echo HtmlEncode($patient_an_registration_grid->MenstrualHistory->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_MenstrualHistory" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_MenstrualHistory" data-value-separator="<?php echo $patient_an_registration_grid->MenstrualHistory->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_MenstrualHistory" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_MenstrualHistory"<?php echo $patient_an_registration_grid->MenstrualHistory->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->MenstrualHistory->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_MenstrualHistory") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_MenstrualHistory">
<span<?php echo $patient_an_registration_grid->MenstrualHistory->viewAttributes() ?>><?php echo $patient_an_registration_grid->MenstrualHistory->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_MenstrualHistory" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_MenstrualHistory" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_MenstrualHistory" value="<?php echo HtmlEncode($patient_an_registration_grid->MenstrualHistory->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_MenstrualHistory" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_MenstrualHistory" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_MenstrualHistory" value="<?php echo HtmlEncode($patient_an_registration_grid->MenstrualHistory->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_MenstrualHistory" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_MenstrualHistory" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_MenstrualHistory" value="<?php echo HtmlEncode($patient_an_registration_grid->MenstrualHistory->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_MenstrualHistory" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_MenstrualHistory" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_MenstrualHistory" value="<?php echo HtmlEncode($patient_an_registration_grid->MenstrualHistory->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->MaritalHistory->Visible) { // MaritalHistory ?>
		<td data-name="MaritalHistory" <?php echo $patient_an_registration_grid->MaritalHistory->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_MaritalHistory" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_MaritalHistory" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_MaritalHistory" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_MaritalHistory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->MaritalHistory->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->MaritalHistory->EditValue ?>"<?php echo $patient_an_registration_grid->MaritalHistory->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_MaritalHistory" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_MaritalHistory" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_MaritalHistory" value="<?php echo HtmlEncode($patient_an_registration_grid->MaritalHistory->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_MaritalHistory" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_MaritalHistory" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_MaritalHistory" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_MaritalHistory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->MaritalHistory->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->MaritalHistory->EditValue ?>"<?php echo $patient_an_registration_grid->MaritalHistory->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_MaritalHistory">
<span<?php echo $patient_an_registration_grid->MaritalHistory->viewAttributes() ?>><?php echo $patient_an_registration_grid->MaritalHistory->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_MaritalHistory" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_MaritalHistory" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_MaritalHistory" value="<?php echo HtmlEncode($patient_an_registration_grid->MaritalHistory->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_MaritalHistory" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_MaritalHistory" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_MaritalHistory" value="<?php echo HtmlEncode($patient_an_registration_grid->MaritalHistory->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_MaritalHistory" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_MaritalHistory" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_MaritalHistory" value="<?php echo HtmlEncode($patient_an_registration_grid->MaritalHistory->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_MaritalHistory" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_MaritalHistory" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_MaritalHistory" value="<?php echo HtmlEncode($patient_an_registration_grid->MaritalHistory->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->ObstetricHistory->Visible) { // ObstetricHistory ?>
		<td data-name="ObstetricHistory" <?php echo $patient_an_registration_grid->ObstetricHistory->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_ObstetricHistory" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_ObstetricHistory" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ObstetricHistory" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ObstetricHistory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->ObstetricHistory->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->ObstetricHistory->EditValue ?>"<?php echo $patient_an_registration_grid->ObstetricHistory->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ObstetricHistory" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ObstetricHistory" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ObstetricHistory" value="<?php echo HtmlEncode($patient_an_registration_grid->ObstetricHistory->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_ObstetricHistory" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_ObstetricHistory" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ObstetricHistory" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ObstetricHistory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->ObstetricHistory->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->ObstetricHistory->EditValue ?>"<?php echo $patient_an_registration_grid->ObstetricHistory->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_ObstetricHistory">
<span<?php echo $patient_an_registration_grid->ObstetricHistory->viewAttributes() ?>><?php echo $patient_an_registration_grid->ObstetricHistory->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ObstetricHistory" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ObstetricHistory" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ObstetricHistory" value="<?php echo HtmlEncode($patient_an_registration_grid->ObstetricHistory->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ObstetricHistory" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ObstetricHistory" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ObstetricHistory" value="<?php echo HtmlEncode($patient_an_registration_grid->ObstetricHistory->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ObstetricHistory" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ObstetricHistory" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ObstetricHistory" value="<?php echo HtmlEncode($patient_an_registration_grid->ObstetricHistory->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ObstetricHistory" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ObstetricHistory" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ObstetricHistory" value="<?php echo HtmlEncode($patient_an_registration_grid->ObstetricHistory->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->PreviousHistoryofGDM->Visible) { // PreviousHistoryofGDM ?>
		<td data-name="PreviousHistoryofGDM" <?php echo $patient_an_registration_grid->PreviousHistoryofGDM->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_PreviousHistoryofGDM" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_PreviousHistoryofGDM" data-value-separator="<?php echo $patient_an_registration_grid->PreviousHistoryofGDM->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofGDM" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofGDM"<?php echo $patient_an_registration_grid->PreviousHistoryofGDM->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->PreviousHistoryofGDM->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_PreviousHistoryofGDM") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofGDM" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofGDM" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofGDM" value="<?php echo HtmlEncode($patient_an_registration_grid->PreviousHistoryofGDM->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_PreviousHistoryofGDM" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_PreviousHistoryofGDM" data-value-separator="<?php echo $patient_an_registration_grid->PreviousHistoryofGDM->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofGDM" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofGDM"<?php echo $patient_an_registration_grid->PreviousHistoryofGDM->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->PreviousHistoryofGDM->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_PreviousHistoryofGDM") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_PreviousHistoryofGDM">
<span<?php echo $patient_an_registration_grid->PreviousHistoryofGDM->viewAttributes() ?>><?php echo $patient_an_registration_grid->PreviousHistoryofGDM->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofGDM" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofGDM" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofGDM" value="<?php echo HtmlEncode($patient_an_registration_grid->PreviousHistoryofGDM->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofGDM" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofGDM" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofGDM" value="<?php echo HtmlEncode($patient_an_registration_grid->PreviousHistoryofGDM->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofGDM" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofGDM" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofGDM" value="<?php echo HtmlEncode($patient_an_registration_grid->PreviousHistoryofGDM->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofGDM" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofGDM" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofGDM" value="<?php echo HtmlEncode($patient_an_registration_grid->PreviousHistoryofGDM->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->PreviousHistorofPIH->Visible) { // PreviousHistorofPIH ?>
		<td data-name="PreviousHistorofPIH" <?php echo $patient_an_registration_grid->PreviousHistorofPIH->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_PreviousHistorofPIH" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_PreviousHistorofPIH" data-value-separator="<?php echo $patient_an_registration_grid->PreviousHistorofPIH->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistorofPIH" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistorofPIH"<?php echo $patient_an_registration_grid->PreviousHistorofPIH->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->PreviousHistorofPIH->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_PreviousHistorofPIH") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistorofPIH" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistorofPIH" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistorofPIH" value="<?php echo HtmlEncode($patient_an_registration_grid->PreviousHistorofPIH->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_PreviousHistorofPIH" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_PreviousHistorofPIH" data-value-separator="<?php echo $patient_an_registration_grid->PreviousHistorofPIH->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistorofPIH" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistorofPIH"<?php echo $patient_an_registration_grid->PreviousHistorofPIH->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->PreviousHistorofPIH->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_PreviousHistorofPIH") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_PreviousHistorofPIH">
<span<?php echo $patient_an_registration_grid->PreviousHistorofPIH->viewAttributes() ?>><?php echo $patient_an_registration_grid->PreviousHistorofPIH->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistorofPIH" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistorofPIH" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistorofPIH" value="<?php echo HtmlEncode($patient_an_registration_grid->PreviousHistorofPIH->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistorofPIH" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistorofPIH" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistorofPIH" value="<?php echo HtmlEncode($patient_an_registration_grid->PreviousHistorofPIH->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistorofPIH" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistorofPIH" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistorofPIH" value="<?php echo HtmlEncode($patient_an_registration_grid->PreviousHistorofPIH->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistorofPIH" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistorofPIH" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistorofPIH" value="<?php echo HtmlEncode($patient_an_registration_grid->PreviousHistorofPIH->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->PreviousHistoryofIUGR->Visible) { // PreviousHistoryofIUGR ?>
		<td data-name="PreviousHistoryofIUGR" <?php echo $patient_an_registration_grid->PreviousHistoryofIUGR->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_PreviousHistoryofIUGR" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_PreviousHistoryofIUGR" data-value-separator="<?php echo $patient_an_registration_grid->PreviousHistoryofIUGR->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofIUGR" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofIUGR"<?php echo $patient_an_registration_grid->PreviousHistoryofIUGR->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->PreviousHistoryofIUGR->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_PreviousHistoryofIUGR") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofIUGR" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofIUGR" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofIUGR" value="<?php echo HtmlEncode($patient_an_registration_grid->PreviousHistoryofIUGR->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_PreviousHistoryofIUGR" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_PreviousHistoryofIUGR" data-value-separator="<?php echo $patient_an_registration_grid->PreviousHistoryofIUGR->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofIUGR" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofIUGR"<?php echo $patient_an_registration_grid->PreviousHistoryofIUGR->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->PreviousHistoryofIUGR->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_PreviousHistoryofIUGR") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_PreviousHistoryofIUGR">
<span<?php echo $patient_an_registration_grid->PreviousHistoryofIUGR->viewAttributes() ?>><?php echo $patient_an_registration_grid->PreviousHistoryofIUGR->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofIUGR" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofIUGR" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofIUGR" value="<?php echo HtmlEncode($patient_an_registration_grid->PreviousHistoryofIUGR->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofIUGR" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofIUGR" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofIUGR" value="<?php echo HtmlEncode($patient_an_registration_grid->PreviousHistoryofIUGR->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofIUGR" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofIUGR" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofIUGR" value="<?php echo HtmlEncode($patient_an_registration_grid->PreviousHistoryofIUGR->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofIUGR" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofIUGR" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofIUGR" value="<?php echo HtmlEncode($patient_an_registration_grid->PreviousHistoryofIUGR->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->PreviousHistoryofOligohydramnios->Visible) { // PreviousHistoryofOligohydramnios ?>
		<td data-name="PreviousHistoryofOligohydramnios" <?php echo $patient_an_registration_grid->PreviousHistoryofOligohydramnios->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_PreviousHistoryofOligohydramnios" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_PreviousHistoryofOligohydramnios" data-value-separator="<?php echo $patient_an_registration_grid->PreviousHistoryofOligohydramnios->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofOligohydramnios" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofOligohydramnios"<?php echo $patient_an_registration_grid->PreviousHistoryofOligohydramnios->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->PreviousHistoryofOligohydramnios->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_PreviousHistoryofOligohydramnios") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofOligohydramnios" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofOligohydramnios" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofOligohydramnios" value="<?php echo HtmlEncode($patient_an_registration_grid->PreviousHistoryofOligohydramnios->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_PreviousHistoryofOligohydramnios" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_PreviousHistoryofOligohydramnios" data-value-separator="<?php echo $patient_an_registration_grid->PreviousHistoryofOligohydramnios->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofOligohydramnios" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofOligohydramnios"<?php echo $patient_an_registration_grid->PreviousHistoryofOligohydramnios->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->PreviousHistoryofOligohydramnios->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_PreviousHistoryofOligohydramnios") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_PreviousHistoryofOligohydramnios">
<span<?php echo $patient_an_registration_grid->PreviousHistoryofOligohydramnios->viewAttributes() ?>><?php echo $patient_an_registration_grid->PreviousHistoryofOligohydramnios->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofOligohydramnios" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofOligohydramnios" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofOligohydramnios" value="<?php echo HtmlEncode($patient_an_registration_grid->PreviousHistoryofOligohydramnios->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofOligohydramnios" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofOligohydramnios" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofOligohydramnios" value="<?php echo HtmlEncode($patient_an_registration_grid->PreviousHistoryofOligohydramnios->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofOligohydramnios" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofOligohydramnios" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofOligohydramnios" value="<?php echo HtmlEncode($patient_an_registration_grid->PreviousHistoryofOligohydramnios->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofOligohydramnios" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofOligohydramnios" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofOligohydramnios" value="<?php echo HtmlEncode($patient_an_registration_grid->PreviousHistoryofOligohydramnios->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->PreviousHistoryofPreterm->Visible) { // PreviousHistoryofPreterm ?>
		<td data-name="PreviousHistoryofPreterm" <?php echo $patient_an_registration_grid->PreviousHistoryofPreterm->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_PreviousHistoryofPreterm" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_PreviousHistoryofPreterm" data-value-separator="<?php echo $patient_an_registration_grid->PreviousHistoryofPreterm->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofPreterm" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofPreterm"<?php echo $patient_an_registration_grid->PreviousHistoryofPreterm->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->PreviousHistoryofPreterm->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_PreviousHistoryofPreterm") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofPreterm" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofPreterm" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofPreterm" value="<?php echo HtmlEncode($patient_an_registration_grid->PreviousHistoryofPreterm->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_PreviousHistoryofPreterm" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_PreviousHistoryofPreterm" data-value-separator="<?php echo $patient_an_registration_grid->PreviousHistoryofPreterm->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofPreterm" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofPreterm"<?php echo $patient_an_registration_grid->PreviousHistoryofPreterm->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->PreviousHistoryofPreterm->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_PreviousHistoryofPreterm") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_PreviousHistoryofPreterm">
<span<?php echo $patient_an_registration_grid->PreviousHistoryofPreterm->viewAttributes() ?>><?php echo $patient_an_registration_grid->PreviousHistoryofPreterm->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofPreterm" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofPreterm" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofPreterm" value="<?php echo HtmlEncode($patient_an_registration_grid->PreviousHistoryofPreterm->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofPreterm" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofPreterm" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofPreterm" value="<?php echo HtmlEncode($patient_an_registration_grid->PreviousHistoryofPreterm->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofPreterm" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofPreterm" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofPreterm" value="<?php echo HtmlEncode($patient_an_registration_grid->PreviousHistoryofPreterm->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofPreterm" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofPreterm" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofPreterm" value="<?php echo HtmlEncode($patient_an_registration_grid->PreviousHistoryofPreterm->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->G1->Visible) { // G1 ?>
		<td data-name="G1" <?php echo $patient_an_registration_grid->G1->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_G1" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_G1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_G1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_G1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->G1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->G1->EditValue ?>"<?php echo $patient_an_registration_grid->G1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_G1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_G1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_G1" value="<?php echo HtmlEncode($patient_an_registration_grid->G1->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_G1" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_G1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_G1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_G1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->G1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->G1->EditValue ?>"<?php echo $patient_an_registration_grid->G1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_G1">
<span<?php echo $patient_an_registration_grid->G1->viewAttributes() ?>><?php echo $patient_an_registration_grid->G1->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_G1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_G1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_G1" value="<?php echo HtmlEncode($patient_an_registration_grid->G1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_G1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_G1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_G1" value="<?php echo HtmlEncode($patient_an_registration_grid->G1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_G1" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_G1" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_G1" value="<?php echo HtmlEncode($patient_an_registration_grid->G1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_G1" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_G1" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_G1" value="<?php echo HtmlEncode($patient_an_registration_grid->G1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->G2->Visible) { // G2 ?>
		<td data-name="G2" <?php echo $patient_an_registration_grid->G2->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_G2" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_G2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_G2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_G2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->G2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->G2->EditValue ?>"<?php echo $patient_an_registration_grid->G2->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_G2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_G2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_G2" value="<?php echo HtmlEncode($patient_an_registration_grid->G2->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_G2" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_G2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_G2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_G2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->G2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->G2->EditValue ?>"<?php echo $patient_an_registration_grid->G2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_G2">
<span<?php echo $patient_an_registration_grid->G2->viewAttributes() ?>><?php echo $patient_an_registration_grid->G2->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_G2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_G2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_G2" value="<?php echo HtmlEncode($patient_an_registration_grid->G2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_G2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_G2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_G2" value="<?php echo HtmlEncode($patient_an_registration_grid->G2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_G2" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_G2" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_G2" value="<?php echo HtmlEncode($patient_an_registration_grid->G2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_G2" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_G2" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_G2" value="<?php echo HtmlEncode($patient_an_registration_grid->G2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->G3->Visible) { // G3 ?>
		<td data-name="G3" <?php echo $patient_an_registration_grid->G3->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_G3" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_G3" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_G3" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_G3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->G3->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->G3->EditValue ?>"<?php echo $patient_an_registration_grid->G3->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_G3" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_G3" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_G3" value="<?php echo HtmlEncode($patient_an_registration_grid->G3->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_G3" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_G3" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_G3" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_G3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->G3->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->G3->EditValue ?>"<?php echo $patient_an_registration_grid->G3->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_G3">
<span<?php echo $patient_an_registration_grid->G3->viewAttributes() ?>><?php echo $patient_an_registration_grid->G3->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_G3" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_G3" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_G3" value="<?php echo HtmlEncode($patient_an_registration_grid->G3->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_G3" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_G3" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_G3" value="<?php echo HtmlEncode($patient_an_registration_grid->G3->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_G3" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_G3" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_G3" value="<?php echo HtmlEncode($patient_an_registration_grid->G3->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_G3" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_G3" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_G3" value="<?php echo HtmlEncode($patient_an_registration_grid->G3->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->DeliveryNDLSCS1->Visible) { // DeliveryNDLSCS1 ?>
		<td data-name="DeliveryNDLSCS1" <?php echo $patient_an_registration_grid->DeliveryNDLSCS1->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_DeliveryNDLSCS1" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->DeliveryNDLSCS1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->DeliveryNDLSCS1->EditValue ?>"<?php echo $patient_an_registration_grid->DeliveryNDLSCS1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS1" value="<?php echo HtmlEncode($patient_an_registration_grid->DeliveryNDLSCS1->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_DeliveryNDLSCS1" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->DeliveryNDLSCS1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->DeliveryNDLSCS1->EditValue ?>"<?php echo $patient_an_registration_grid->DeliveryNDLSCS1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_DeliveryNDLSCS1">
<span<?php echo $patient_an_registration_grid->DeliveryNDLSCS1->viewAttributes() ?>><?php echo $patient_an_registration_grid->DeliveryNDLSCS1->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS1" value="<?php echo HtmlEncode($patient_an_registration_grid->DeliveryNDLSCS1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS1" value="<?php echo HtmlEncode($patient_an_registration_grid->DeliveryNDLSCS1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS1" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS1" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS1" value="<?php echo HtmlEncode($patient_an_registration_grid->DeliveryNDLSCS1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS1" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS1" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS1" value="<?php echo HtmlEncode($patient_an_registration_grid->DeliveryNDLSCS1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->DeliveryNDLSCS2->Visible) { // DeliveryNDLSCS2 ?>
		<td data-name="DeliveryNDLSCS2" <?php echo $patient_an_registration_grid->DeliveryNDLSCS2->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_DeliveryNDLSCS2" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->DeliveryNDLSCS2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->DeliveryNDLSCS2->EditValue ?>"<?php echo $patient_an_registration_grid->DeliveryNDLSCS2->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS2" value="<?php echo HtmlEncode($patient_an_registration_grid->DeliveryNDLSCS2->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_DeliveryNDLSCS2" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->DeliveryNDLSCS2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->DeliveryNDLSCS2->EditValue ?>"<?php echo $patient_an_registration_grid->DeliveryNDLSCS2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_DeliveryNDLSCS2">
<span<?php echo $patient_an_registration_grid->DeliveryNDLSCS2->viewAttributes() ?>><?php echo $patient_an_registration_grid->DeliveryNDLSCS2->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS2" value="<?php echo HtmlEncode($patient_an_registration_grid->DeliveryNDLSCS2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS2" value="<?php echo HtmlEncode($patient_an_registration_grid->DeliveryNDLSCS2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS2" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS2" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS2" value="<?php echo HtmlEncode($patient_an_registration_grid->DeliveryNDLSCS2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS2" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS2" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS2" value="<?php echo HtmlEncode($patient_an_registration_grid->DeliveryNDLSCS2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->DeliveryNDLSCS3->Visible) { // DeliveryNDLSCS3 ?>
		<td data-name="DeliveryNDLSCS3" <?php echo $patient_an_registration_grid->DeliveryNDLSCS3->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_DeliveryNDLSCS3" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS3" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS3" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->DeliveryNDLSCS3->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->DeliveryNDLSCS3->EditValue ?>"<?php echo $patient_an_registration_grid->DeliveryNDLSCS3->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS3" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS3" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS3" value="<?php echo HtmlEncode($patient_an_registration_grid->DeliveryNDLSCS3->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_DeliveryNDLSCS3" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS3" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS3" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->DeliveryNDLSCS3->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->DeliveryNDLSCS3->EditValue ?>"<?php echo $patient_an_registration_grid->DeliveryNDLSCS3->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_DeliveryNDLSCS3">
<span<?php echo $patient_an_registration_grid->DeliveryNDLSCS3->viewAttributes() ?>><?php echo $patient_an_registration_grid->DeliveryNDLSCS3->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS3" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS3" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS3" value="<?php echo HtmlEncode($patient_an_registration_grid->DeliveryNDLSCS3->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS3" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS3" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS3" value="<?php echo HtmlEncode($patient_an_registration_grid->DeliveryNDLSCS3->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS3" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS3" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS3" value="<?php echo HtmlEncode($patient_an_registration_grid->DeliveryNDLSCS3->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS3" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS3" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS3" value="<?php echo HtmlEncode($patient_an_registration_grid->DeliveryNDLSCS3->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->BabySexweight1->Visible) { // BabySexweight1 ?>
		<td data-name="BabySexweight1" <?php echo $patient_an_registration_grid->BabySexweight1->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_BabySexweight1" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_BabySexweight1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->BabySexweight1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->BabySexweight1->EditValue ?>"<?php echo $patient_an_registration_grid->BabySexweight1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight1" value="<?php echo HtmlEncode($patient_an_registration_grid->BabySexweight1->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_BabySexweight1" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_BabySexweight1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->BabySexweight1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->BabySexweight1->EditValue ?>"<?php echo $patient_an_registration_grid->BabySexweight1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_BabySexweight1">
<span<?php echo $patient_an_registration_grid->BabySexweight1->viewAttributes() ?>><?php echo $patient_an_registration_grid->BabySexweight1->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight1" value="<?php echo HtmlEncode($patient_an_registration_grid->BabySexweight1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight1" value="<?php echo HtmlEncode($patient_an_registration_grid->BabySexweight1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight1" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight1" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight1" value="<?php echo HtmlEncode($patient_an_registration_grid->BabySexweight1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight1" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight1" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight1" value="<?php echo HtmlEncode($patient_an_registration_grid->BabySexweight1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->BabySexweight2->Visible) { // BabySexweight2 ?>
		<td data-name="BabySexweight2" <?php echo $patient_an_registration_grid->BabySexweight2->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_BabySexweight2" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_BabySexweight2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->BabySexweight2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->BabySexweight2->EditValue ?>"<?php echo $patient_an_registration_grid->BabySexweight2->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight2" value="<?php echo HtmlEncode($patient_an_registration_grid->BabySexweight2->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_BabySexweight2" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_BabySexweight2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->BabySexweight2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->BabySexweight2->EditValue ?>"<?php echo $patient_an_registration_grid->BabySexweight2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_BabySexweight2">
<span<?php echo $patient_an_registration_grid->BabySexweight2->viewAttributes() ?>><?php echo $patient_an_registration_grid->BabySexweight2->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight2" value="<?php echo HtmlEncode($patient_an_registration_grid->BabySexweight2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight2" value="<?php echo HtmlEncode($patient_an_registration_grid->BabySexweight2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight2" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight2" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight2" value="<?php echo HtmlEncode($patient_an_registration_grid->BabySexweight2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight2" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight2" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight2" value="<?php echo HtmlEncode($patient_an_registration_grid->BabySexweight2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->BabySexweight3->Visible) { // BabySexweight3 ?>
		<td data-name="BabySexweight3" <?php echo $patient_an_registration_grid->BabySexweight3->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_BabySexweight3" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_BabySexweight3" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight3" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->BabySexweight3->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->BabySexweight3->EditValue ?>"<?php echo $patient_an_registration_grid->BabySexweight3->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight3" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight3" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight3" value="<?php echo HtmlEncode($patient_an_registration_grid->BabySexweight3->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_BabySexweight3" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_BabySexweight3" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight3" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->BabySexweight3->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->BabySexweight3->EditValue ?>"<?php echo $patient_an_registration_grid->BabySexweight3->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_BabySexweight3">
<span<?php echo $patient_an_registration_grid->BabySexweight3->viewAttributes() ?>><?php echo $patient_an_registration_grid->BabySexweight3->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight3" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight3" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight3" value="<?php echo HtmlEncode($patient_an_registration_grid->BabySexweight3->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight3" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight3" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight3" value="<?php echo HtmlEncode($patient_an_registration_grid->BabySexweight3->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight3" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight3" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight3" value="<?php echo HtmlEncode($patient_an_registration_grid->BabySexweight3->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight3" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight3" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight3" value="<?php echo HtmlEncode($patient_an_registration_grid->BabySexweight3->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->PastMedicalHistory->Visible) { // PastMedicalHistory ?>
		<td data-name="PastMedicalHistory" <?php echo $patient_an_registration_grid->PastMedicalHistory->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_PastMedicalHistory" class="form-group">
<div id="tp_x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="patient_an_registration" data-field="x_PastMedicalHistory" data-value-separator="<?php echo $patient_an_registration_grid->PastMedicalHistory->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory[]" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory[]" value="{value}"<?php echo $patient_an_registration_grid->PastMedicalHistory->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_an_registration_grid->PastMedicalHistory->checkBoxListHtml(FALSE, "x{$patient_an_registration_grid->RowIndex}_PastMedicalHistory[]") ?>
</div></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastMedicalHistory" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory[]" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory[]" value="<?php echo HtmlEncode($patient_an_registration_grid->PastMedicalHistory->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_PastMedicalHistory" class="form-group">
<div id="tp_x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="patient_an_registration" data-field="x_PastMedicalHistory" data-value-separator="<?php echo $patient_an_registration_grid->PastMedicalHistory->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory[]" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory[]" value="{value}"<?php echo $patient_an_registration_grid->PastMedicalHistory->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_an_registration_grid->PastMedicalHistory->checkBoxListHtml(FALSE, "x{$patient_an_registration_grid->RowIndex}_PastMedicalHistory[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_PastMedicalHistory">
<span<?php echo $patient_an_registration_grid->PastMedicalHistory->viewAttributes() ?>><?php echo $patient_an_registration_grid->PastMedicalHistory->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastMedicalHistory" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory" value="<?php echo HtmlEncode($patient_an_registration_grid->PastMedicalHistory->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PastMedicalHistory" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory[]" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory[]" value="<?php echo HtmlEncode($patient_an_registration_grid->PastMedicalHistory->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastMedicalHistory" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory" value="<?php echo HtmlEncode($patient_an_registration_grid->PastMedicalHistory->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PastMedicalHistory" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory[]" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory[]" value="<?php echo HtmlEncode($patient_an_registration_grid->PastMedicalHistory->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->PastSurgicalHistory->Visible) { // PastSurgicalHistory ?>
		<td data-name="PastSurgicalHistory" <?php echo $patient_an_registration_grid->PastSurgicalHistory->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_PastSurgicalHistory" class="form-group">
<div id="tp_x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="patient_an_registration" data-field="x_PastSurgicalHistory" data-value-separator="<?php echo $patient_an_registration_grid->PastSurgicalHistory->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory[]" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory[]" value="{value}"<?php echo $patient_an_registration_grid->PastSurgicalHistory->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_an_registration_grid->PastSurgicalHistory->checkBoxListHtml(FALSE, "x{$patient_an_registration_grid->RowIndex}_PastSurgicalHistory[]") ?>
</div></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastSurgicalHistory" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory[]" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory[]" value="<?php echo HtmlEncode($patient_an_registration_grid->PastSurgicalHistory->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_PastSurgicalHistory" class="form-group">
<div id="tp_x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="patient_an_registration" data-field="x_PastSurgicalHistory" data-value-separator="<?php echo $patient_an_registration_grid->PastSurgicalHistory->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory[]" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory[]" value="{value}"<?php echo $patient_an_registration_grid->PastSurgicalHistory->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_an_registration_grid->PastSurgicalHistory->checkBoxListHtml(FALSE, "x{$patient_an_registration_grid->RowIndex}_PastSurgicalHistory[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_PastSurgicalHistory">
<span<?php echo $patient_an_registration_grid->PastSurgicalHistory->viewAttributes() ?>><?php echo $patient_an_registration_grid->PastSurgicalHistory->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastSurgicalHistory" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory" value="<?php echo HtmlEncode($patient_an_registration_grid->PastSurgicalHistory->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PastSurgicalHistory" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory[]" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory[]" value="<?php echo HtmlEncode($patient_an_registration_grid->PastSurgicalHistory->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastSurgicalHistory" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory" value="<?php echo HtmlEncode($patient_an_registration_grid->PastSurgicalHistory->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PastSurgicalHistory" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory[]" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory[]" value="<?php echo HtmlEncode($patient_an_registration_grid->PastSurgicalHistory->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->FamilyHistory->Visible) { // FamilyHistory ?>
		<td data-name="FamilyHistory" <?php echo $patient_an_registration_grid->FamilyHistory->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_FamilyHistory" class="form-group">
<div id="tp_x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="patient_an_registration" data-field="x_FamilyHistory" data-value-separator="<?php echo $patient_an_registration_grid->FamilyHistory->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory[]" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory[]" value="{value}"<?php echo $patient_an_registration_grid->FamilyHistory->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_an_registration_grid->FamilyHistory->checkBoxListHtml(FALSE, "x{$patient_an_registration_grid->RowIndex}_FamilyHistory[]") ?>
</div></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_FamilyHistory" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory[]" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory[]" value="<?php echo HtmlEncode($patient_an_registration_grid->FamilyHistory->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_FamilyHistory" class="form-group">
<div id="tp_x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="patient_an_registration" data-field="x_FamilyHistory" data-value-separator="<?php echo $patient_an_registration_grid->FamilyHistory->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory[]" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory[]" value="{value}"<?php echo $patient_an_registration_grid->FamilyHistory->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_an_registration_grid->FamilyHistory->checkBoxListHtml(FALSE, "x{$patient_an_registration_grid->RowIndex}_FamilyHistory[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_FamilyHistory">
<span<?php echo $patient_an_registration_grid->FamilyHistory->viewAttributes() ?>><?php echo $patient_an_registration_grid->FamilyHistory->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_FamilyHistory" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory" value="<?php echo HtmlEncode($patient_an_registration_grid->FamilyHistory->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_FamilyHistory" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory[]" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory[]" value="<?php echo HtmlEncode($patient_an_registration_grid->FamilyHistory->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_FamilyHistory" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory" value="<?php echo HtmlEncode($patient_an_registration_grid->FamilyHistory->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_FamilyHistory" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory[]" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory[]" value="<?php echo HtmlEncode($patient_an_registration_grid->FamilyHistory->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Viability->Visible) { // Viability ?>
		<td data-name="Viability" <?php echo $patient_an_registration_grid->Viability->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Viability" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_Viability" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Viability->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Viability->EditValue ?>"<?php echo $patient_an_registration_grid->Viability->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability" value="<?php echo HtmlEncode($patient_an_registration_grid->Viability->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Viability" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_Viability" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Viability->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Viability->EditValue ?>"<?php echo $patient_an_registration_grid->Viability->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Viability">
<span<?php echo $patient_an_registration_grid->Viability->viewAttributes() ?>><?php echo $patient_an_registration_grid->Viability->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability" value="<?php echo HtmlEncode($patient_an_registration_grid->Viability->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability" value="<?php echo HtmlEncode($patient_an_registration_grid->Viability->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability" value="<?php echo HtmlEncode($patient_an_registration_grid->Viability->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability" value="<?php echo HtmlEncode($patient_an_registration_grid->Viability->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->ViabilityDATE->Visible) { // ViabilityDATE ?>
		<td data-name="ViabilityDATE" <?php echo $patient_an_registration_grid->ViabilityDATE->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_ViabilityDATE" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_ViabilityDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->ViabilityDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->ViabilityDATE->EditValue ?>"<?php echo $patient_an_registration_grid->ViabilityDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->ViabilityDATE->ReadOnly && !$patient_an_registration_grid->ViabilityDATE->Disabled && !isset($patient_an_registration_grid->ViabilityDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->ViabilityDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ViabilityDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->ViabilityDATE->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_ViabilityDATE" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_ViabilityDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->ViabilityDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->ViabilityDATE->EditValue ?>"<?php echo $patient_an_registration_grid->ViabilityDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->ViabilityDATE->ReadOnly && !$patient_an_registration_grid->ViabilityDATE->Disabled && !isset($patient_an_registration_grid->ViabilityDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->ViabilityDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_ViabilityDATE">
<span<?php echo $patient_an_registration_grid->ViabilityDATE->viewAttributes() ?>><?php echo $patient_an_registration_grid->ViabilityDATE->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ViabilityDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->ViabilityDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ViabilityDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->ViabilityDATE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ViabilityDATE" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityDATE" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->ViabilityDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ViabilityDATE" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityDATE" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->ViabilityDATE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->ViabilityREPORT->Visible) { // ViabilityREPORT ?>
		<td data-name="ViabilityREPORT" <?php echo $patient_an_registration_grid->ViabilityREPORT->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_ViabilityREPORT" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_ViabilityREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->ViabilityREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->ViabilityREPORT->EditValue ?>"<?php echo $patient_an_registration_grid->ViabilityREPORT->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ViabilityREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->ViabilityREPORT->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_ViabilityREPORT" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_ViabilityREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->ViabilityREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->ViabilityREPORT->EditValue ?>"<?php echo $patient_an_registration_grid->ViabilityREPORT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_ViabilityREPORT">
<span<?php echo $patient_an_registration_grid->ViabilityREPORT->viewAttributes() ?>><?php echo $patient_an_registration_grid->ViabilityREPORT->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ViabilityREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->ViabilityREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ViabilityREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->ViabilityREPORT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ViabilityREPORT" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityREPORT" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->ViabilityREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ViabilityREPORT" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityREPORT" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->ViabilityREPORT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Viability2->Visible) { // Viability2 ?>
		<td data-name="Viability2" <?php echo $patient_an_registration_grid->Viability2->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Viability2" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_Viability2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Viability2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Viability2->EditValue ?>"<?php echo $patient_an_registration_grid->Viability2->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2" value="<?php echo HtmlEncode($patient_an_registration_grid->Viability2->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Viability2" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_Viability2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Viability2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Viability2->EditValue ?>"<?php echo $patient_an_registration_grid->Viability2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Viability2">
<span<?php echo $patient_an_registration_grid->Viability2->viewAttributes() ?>><?php echo $patient_an_registration_grid->Viability2->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2" value="<?php echo HtmlEncode($patient_an_registration_grid->Viability2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2" value="<?php echo HtmlEncode($patient_an_registration_grid->Viability2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2" value="<?php echo HtmlEncode($patient_an_registration_grid->Viability2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2" value="<?php echo HtmlEncode($patient_an_registration_grid->Viability2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Viability2DATE->Visible) { // Viability2DATE ?>
		<td data-name="Viability2DATE" <?php echo $patient_an_registration_grid->Viability2DATE->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Viability2DATE" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_Viability2DATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2DATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2DATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Viability2DATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Viability2DATE->EditValue ?>"<?php echo $patient_an_registration_grid->Viability2DATE->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->Viability2DATE->ReadOnly && !$patient_an_registration_grid->Viability2DATE->Disabled && !isset($patient_an_registration_grid->Viability2DATE->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->Viability2DATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2DATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2DATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2DATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2DATE" value="<?php echo HtmlEncode($patient_an_registration_grid->Viability2DATE->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Viability2DATE" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_Viability2DATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2DATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2DATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Viability2DATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Viability2DATE->EditValue ?>"<?php echo $patient_an_registration_grid->Viability2DATE->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->Viability2DATE->ReadOnly && !$patient_an_registration_grid->Viability2DATE->Disabled && !isset($patient_an_registration_grid->Viability2DATE->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->Viability2DATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2DATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Viability2DATE">
<span<?php echo $patient_an_registration_grid->Viability2DATE->viewAttributes() ?>><?php echo $patient_an_registration_grid->Viability2DATE->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2DATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2DATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2DATE" value="<?php echo HtmlEncode($patient_an_registration_grid->Viability2DATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2DATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2DATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2DATE" value="<?php echo HtmlEncode($patient_an_registration_grid->Viability2DATE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2DATE" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2DATE" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2DATE" value="<?php echo HtmlEncode($patient_an_registration_grid->Viability2DATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2DATE" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2DATE" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2DATE" value="<?php echo HtmlEncode($patient_an_registration_grid->Viability2DATE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Viability2REPORT->Visible) { // Viability2REPORT ?>
		<td data-name="Viability2REPORT" <?php echo $patient_an_registration_grid->Viability2REPORT->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Viability2REPORT" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_Viability2REPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2REPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2REPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Viability2REPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Viability2REPORT->EditValue ?>"<?php echo $patient_an_registration_grid->Viability2REPORT->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2REPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2REPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2REPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->Viability2REPORT->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Viability2REPORT" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_Viability2REPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2REPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2REPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Viability2REPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Viability2REPORT->EditValue ?>"<?php echo $patient_an_registration_grid->Viability2REPORT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Viability2REPORT">
<span<?php echo $patient_an_registration_grid->Viability2REPORT->viewAttributes() ?>><?php echo $patient_an_registration_grid->Viability2REPORT->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2REPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2REPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2REPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->Viability2REPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2REPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2REPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2REPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->Viability2REPORT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2REPORT" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2REPORT" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2REPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->Viability2REPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2REPORT" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2REPORT" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2REPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->Viability2REPORT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->NTscan->Visible) { // NTscan ?>
		<td data-name="NTscan" <?php echo $patient_an_registration_grid->NTscan->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_NTscan" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_NTscan" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscan" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscan" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->NTscan->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->NTscan->EditValue ?>"<?php echo $patient_an_registration_grid->NTscan->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscan" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_NTscan" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_NTscan" value="<?php echo HtmlEncode($patient_an_registration_grid->NTscan->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_NTscan" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_NTscan" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscan" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscan" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->NTscan->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->NTscan->EditValue ?>"<?php echo $patient_an_registration_grid->NTscan->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_NTscan">
<span<?php echo $patient_an_registration_grid->NTscan->viewAttributes() ?>><?php echo $patient_an_registration_grid->NTscan->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscan" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscan" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscan" value="<?php echo HtmlEncode($patient_an_registration_grid->NTscan->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscan" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_NTscan" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_NTscan" value="<?php echo HtmlEncode($patient_an_registration_grid->NTscan->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscan" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscan" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscan" value="<?php echo HtmlEncode($patient_an_registration_grid->NTscan->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscan" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_NTscan" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_NTscan" value="<?php echo HtmlEncode($patient_an_registration_grid->NTscan->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->NTscanDATE->Visible) { // NTscanDATE ?>
		<td data-name="NTscanDATE" <?php echo $patient_an_registration_grid->NTscanDATE->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_NTscanDATE" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_NTscanDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->NTscanDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->NTscanDATE->EditValue ?>"<?php echo $patient_an_registration_grid->NTscanDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->NTscanDATE->ReadOnly && !$patient_an_registration_grid->NTscanDATE->Disabled && !isset($patient_an_registration_grid->NTscanDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->NTscanDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscanDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->NTscanDATE->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_NTscanDATE" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_NTscanDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->NTscanDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->NTscanDATE->EditValue ?>"<?php echo $patient_an_registration_grid->NTscanDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->NTscanDATE->ReadOnly && !$patient_an_registration_grid->NTscanDATE->Disabled && !isset($patient_an_registration_grid->NTscanDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->NTscanDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_NTscanDATE">
<span<?php echo $patient_an_registration_grid->NTscanDATE->viewAttributes() ?>><?php echo $patient_an_registration_grid->NTscanDATE->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscanDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->NTscanDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscanDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->NTscanDATE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscanDATE" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanDATE" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->NTscanDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscanDATE" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanDATE" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->NTscanDATE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->NTscanREPORT->Visible) { // NTscanREPORT ?>
		<td data-name="NTscanREPORT" <?php echo $patient_an_registration_grid->NTscanREPORT->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_NTscanREPORT" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_NTscanREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->NTscanREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->NTscanREPORT->EditValue ?>"<?php echo $patient_an_registration_grid->NTscanREPORT->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscanREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->NTscanREPORT->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_NTscanREPORT" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_NTscanREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->NTscanREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->NTscanREPORT->EditValue ?>"<?php echo $patient_an_registration_grid->NTscanREPORT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_NTscanREPORT">
<span<?php echo $patient_an_registration_grid->NTscanREPORT->viewAttributes() ?>><?php echo $patient_an_registration_grid->NTscanREPORT->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscanREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->NTscanREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscanREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->NTscanREPORT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscanREPORT" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanREPORT" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->NTscanREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscanREPORT" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanREPORT" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->NTscanREPORT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->EarlyTarget->Visible) { // EarlyTarget ?>
		<td data-name="EarlyTarget" <?php echo $patient_an_registration_grid->EarlyTarget->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_EarlyTarget" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_EarlyTarget" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTarget" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTarget" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->EarlyTarget->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->EarlyTarget->EditValue ?>"<?php echo $patient_an_registration_grid->EarlyTarget->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTarget" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTarget" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTarget" value="<?php echo HtmlEncode($patient_an_registration_grid->EarlyTarget->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_EarlyTarget" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_EarlyTarget" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTarget" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTarget" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->EarlyTarget->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->EarlyTarget->EditValue ?>"<?php echo $patient_an_registration_grid->EarlyTarget->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_EarlyTarget">
<span<?php echo $patient_an_registration_grid->EarlyTarget->viewAttributes() ?>><?php echo $patient_an_registration_grid->EarlyTarget->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTarget" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTarget" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTarget" value="<?php echo HtmlEncode($patient_an_registration_grid->EarlyTarget->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTarget" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTarget" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTarget" value="<?php echo HtmlEncode($patient_an_registration_grid->EarlyTarget->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTarget" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTarget" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTarget" value="<?php echo HtmlEncode($patient_an_registration_grid->EarlyTarget->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTarget" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTarget" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTarget" value="<?php echo HtmlEncode($patient_an_registration_grid->EarlyTarget->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->EarlyTargetDATE->Visible) { // EarlyTargetDATE ?>
		<td data-name="EarlyTargetDATE" <?php echo $patient_an_registration_grid->EarlyTargetDATE->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_EarlyTargetDATE" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_EarlyTargetDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->EarlyTargetDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->EarlyTargetDATE->EditValue ?>"<?php echo $patient_an_registration_grid->EarlyTargetDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->EarlyTargetDATE->ReadOnly && !$patient_an_registration_grid->EarlyTargetDATE->Disabled && !isset($patient_an_registration_grid->EarlyTargetDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->EarlyTargetDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTargetDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->EarlyTargetDATE->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_EarlyTargetDATE" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_EarlyTargetDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->EarlyTargetDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->EarlyTargetDATE->EditValue ?>"<?php echo $patient_an_registration_grid->EarlyTargetDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->EarlyTargetDATE->ReadOnly && !$patient_an_registration_grid->EarlyTargetDATE->Disabled && !isset($patient_an_registration_grid->EarlyTargetDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->EarlyTargetDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_EarlyTargetDATE">
<span<?php echo $patient_an_registration_grid->EarlyTargetDATE->viewAttributes() ?>><?php echo $patient_an_registration_grid->EarlyTargetDATE->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTargetDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->EarlyTargetDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTargetDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->EarlyTargetDATE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTargetDATE" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetDATE" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->EarlyTargetDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTargetDATE" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetDATE" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->EarlyTargetDATE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->EarlyTargetREPORT->Visible) { // EarlyTargetREPORT ?>
		<td data-name="EarlyTargetREPORT" <?php echo $patient_an_registration_grid->EarlyTargetREPORT->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_EarlyTargetREPORT" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_EarlyTargetREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->EarlyTargetREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->EarlyTargetREPORT->EditValue ?>"<?php echo $patient_an_registration_grid->EarlyTargetREPORT->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTargetREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->EarlyTargetREPORT->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_EarlyTargetREPORT" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_EarlyTargetREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->EarlyTargetREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->EarlyTargetREPORT->EditValue ?>"<?php echo $patient_an_registration_grid->EarlyTargetREPORT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_EarlyTargetREPORT">
<span<?php echo $patient_an_registration_grid->EarlyTargetREPORT->viewAttributes() ?>><?php echo $patient_an_registration_grid->EarlyTargetREPORT->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTargetREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->EarlyTargetREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTargetREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->EarlyTargetREPORT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTargetREPORT" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetREPORT" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->EarlyTargetREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTargetREPORT" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetREPORT" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->EarlyTargetREPORT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Anomaly->Visible) { // Anomaly ?>
		<td data-name="Anomaly" <?php echo $patient_an_registration_grid->Anomaly->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Anomaly" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_Anomaly" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Anomaly" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Anomaly" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Anomaly->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Anomaly->EditValue ?>"<?php echo $patient_an_registration_grid->Anomaly->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Anomaly" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Anomaly" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Anomaly" value="<?php echo HtmlEncode($patient_an_registration_grid->Anomaly->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Anomaly" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_Anomaly" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Anomaly" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Anomaly" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Anomaly->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Anomaly->EditValue ?>"<?php echo $patient_an_registration_grid->Anomaly->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Anomaly">
<span<?php echo $patient_an_registration_grid->Anomaly->viewAttributes() ?>><?php echo $patient_an_registration_grid->Anomaly->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Anomaly" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Anomaly" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Anomaly" value="<?php echo HtmlEncode($patient_an_registration_grid->Anomaly->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Anomaly" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Anomaly" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Anomaly" value="<?php echo HtmlEncode($patient_an_registration_grid->Anomaly->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Anomaly" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Anomaly" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Anomaly" value="<?php echo HtmlEncode($patient_an_registration_grid->Anomaly->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Anomaly" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Anomaly" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Anomaly" value="<?php echo HtmlEncode($patient_an_registration_grid->Anomaly->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->AnomalyDATE->Visible) { // AnomalyDATE ?>
		<td data-name="AnomalyDATE" <?php echo $patient_an_registration_grid->AnomalyDATE->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_AnomalyDATE" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_AnomalyDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->AnomalyDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->AnomalyDATE->EditValue ?>"<?php echo $patient_an_registration_grid->AnomalyDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->AnomalyDATE->ReadOnly && !$patient_an_registration_grid->AnomalyDATE->Disabled && !isset($patient_an_registration_grid->AnomalyDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->AnomalyDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_AnomalyDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->AnomalyDATE->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_AnomalyDATE" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_AnomalyDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->AnomalyDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->AnomalyDATE->EditValue ?>"<?php echo $patient_an_registration_grid->AnomalyDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->AnomalyDATE->ReadOnly && !$patient_an_registration_grid->AnomalyDATE->Disabled && !isset($patient_an_registration_grid->AnomalyDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->AnomalyDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_AnomalyDATE">
<span<?php echo $patient_an_registration_grid->AnomalyDATE->viewAttributes() ?>><?php echo $patient_an_registration_grid->AnomalyDATE->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_AnomalyDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->AnomalyDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_AnomalyDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->AnomalyDATE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_AnomalyDATE" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyDATE" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->AnomalyDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_AnomalyDATE" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyDATE" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->AnomalyDATE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->AnomalyREPORT->Visible) { // AnomalyREPORT ?>
		<td data-name="AnomalyREPORT" <?php echo $patient_an_registration_grid->AnomalyREPORT->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_AnomalyREPORT" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_AnomalyREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->AnomalyREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->AnomalyREPORT->EditValue ?>"<?php echo $patient_an_registration_grid->AnomalyREPORT->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_AnomalyREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->AnomalyREPORT->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_AnomalyREPORT" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_AnomalyREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->AnomalyREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->AnomalyREPORT->EditValue ?>"<?php echo $patient_an_registration_grid->AnomalyREPORT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_AnomalyREPORT">
<span<?php echo $patient_an_registration_grid->AnomalyREPORT->viewAttributes() ?>><?php echo $patient_an_registration_grid->AnomalyREPORT->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_AnomalyREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->AnomalyREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_AnomalyREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->AnomalyREPORT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_AnomalyREPORT" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyREPORT" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->AnomalyREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_AnomalyREPORT" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyREPORT" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->AnomalyREPORT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Growth->Visible) { // Growth ?>
		<td data-name="Growth" <?php echo $patient_an_registration_grid->Growth->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Growth" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_Growth" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Growth->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Growth->EditValue ?>"<?php echo $patient_an_registration_grid->Growth->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth" value="<?php echo HtmlEncode($patient_an_registration_grid->Growth->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Growth" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_Growth" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Growth->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Growth->EditValue ?>"<?php echo $patient_an_registration_grid->Growth->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Growth">
<span<?php echo $patient_an_registration_grid->Growth->viewAttributes() ?>><?php echo $patient_an_registration_grid->Growth->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth" value="<?php echo HtmlEncode($patient_an_registration_grid->Growth->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth" value="<?php echo HtmlEncode($patient_an_registration_grid->Growth->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth" value="<?php echo HtmlEncode($patient_an_registration_grid->Growth->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth" value="<?php echo HtmlEncode($patient_an_registration_grid->Growth->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->GrowthDATE->Visible) { // GrowthDATE ?>
		<td data-name="GrowthDATE" <?php echo $patient_an_registration_grid->GrowthDATE->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_GrowthDATE" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_GrowthDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->GrowthDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->GrowthDATE->EditValue ?>"<?php echo $patient_an_registration_grid->GrowthDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->GrowthDATE->ReadOnly && !$patient_an_registration_grid->GrowthDATE->Disabled && !isset($patient_an_registration_grid->GrowthDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->GrowthDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_GrowthDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->GrowthDATE->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_GrowthDATE" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_GrowthDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->GrowthDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->GrowthDATE->EditValue ?>"<?php echo $patient_an_registration_grid->GrowthDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->GrowthDATE->ReadOnly && !$patient_an_registration_grid->GrowthDATE->Disabled && !isset($patient_an_registration_grid->GrowthDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->GrowthDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_GrowthDATE">
<span<?php echo $patient_an_registration_grid->GrowthDATE->viewAttributes() ?>><?php echo $patient_an_registration_grid->GrowthDATE->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_GrowthDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->GrowthDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_GrowthDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->GrowthDATE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_GrowthDATE" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthDATE" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->GrowthDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_GrowthDATE" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthDATE" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->GrowthDATE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->GrowthREPORT->Visible) { // GrowthREPORT ?>
		<td data-name="GrowthREPORT" <?php echo $patient_an_registration_grid->GrowthREPORT->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_GrowthREPORT" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_GrowthREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->GrowthREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->GrowthREPORT->EditValue ?>"<?php echo $patient_an_registration_grid->GrowthREPORT->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_GrowthREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->GrowthREPORT->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_GrowthREPORT" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_GrowthREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->GrowthREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->GrowthREPORT->EditValue ?>"<?php echo $patient_an_registration_grid->GrowthREPORT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_GrowthREPORT">
<span<?php echo $patient_an_registration_grid->GrowthREPORT->viewAttributes() ?>><?php echo $patient_an_registration_grid->GrowthREPORT->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_GrowthREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->GrowthREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_GrowthREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->GrowthREPORT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_GrowthREPORT" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthREPORT" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->GrowthREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_GrowthREPORT" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthREPORT" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->GrowthREPORT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Growth1->Visible) { // Growth1 ?>
		<td data-name="Growth1" <?php echo $patient_an_registration_grid->Growth1->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Growth1" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_Growth1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Growth1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Growth1->EditValue ?>"<?php echo $patient_an_registration_grid->Growth1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1" value="<?php echo HtmlEncode($patient_an_registration_grid->Growth1->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Growth1" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_Growth1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Growth1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Growth1->EditValue ?>"<?php echo $patient_an_registration_grid->Growth1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Growth1">
<span<?php echo $patient_an_registration_grid->Growth1->viewAttributes() ?>><?php echo $patient_an_registration_grid->Growth1->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1" value="<?php echo HtmlEncode($patient_an_registration_grid->Growth1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1" value="<?php echo HtmlEncode($patient_an_registration_grid->Growth1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1" value="<?php echo HtmlEncode($patient_an_registration_grid->Growth1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1" value="<?php echo HtmlEncode($patient_an_registration_grid->Growth1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Growth1DATE->Visible) { // Growth1DATE ?>
		<td data-name="Growth1DATE" <?php echo $patient_an_registration_grid->Growth1DATE->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Growth1DATE" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_Growth1DATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1DATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1DATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Growth1DATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Growth1DATE->EditValue ?>"<?php echo $patient_an_registration_grid->Growth1DATE->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->Growth1DATE->ReadOnly && !$patient_an_registration_grid->Growth1DATE->Disabled && !isset($patient_an_registration_grid->Growth1DATE->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->Growth1DATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1DATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1DATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1DATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1DATE" value="<?php echo HtmlEncode($patient_an_registration_grid->Growth1DATE->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Growth1DATE" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_Growth1DATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1DATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1DATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Growth1DATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Growth1DATE->EditValue ?>"<?php echo $patient_an_registration_grid->Growth1DATE->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->Growth1DATE->ReadOnly && !$patient_an_registration_grid->Growth1DATE->Disabled && !isset($patient_an_registration_grid->Growth1DATE->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->Growth1DATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1DATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Growth1DATE">
<span<?php echo $patient_an_registration_grid->Growth1DATE->viewAttributes() ?>><?php echo $patient_an_registration_grid->Growth1DATE->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1DATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1DATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1DATE" value="<?php echo HtmlEncode($patient_an_registration_grid->Growth1DATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1DATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1DATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1DATE" value="<?php echo HtmlEncode($patient_an_registration_grid->Growth1DATE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1DATE" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1DATE" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1DATE" value="<?php echo HtmlEncode($patient_an_registration_grid->Growth1DATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1DATE" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1DATE" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1DATE" value="<?php echo HtmlEncode($patient_an_registration_grid->Growth1DATE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Growth1REPORT->Visible) { // Growth1REPORT ?>
		<td data-name="Growth1REPORT" <?php echo $patient_an_registration_grid->Growth1REPORT->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Growth1REPORT" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_Growth1REPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1REPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1REPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Growth1REPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Growth1REPORT->EditValue ?>"<?php echo $patient_an_registration_grid->Growth1REPORT->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1REPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1REPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1REPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->Growth1REPORT->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Growth1REPORT" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_Growth1REPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1REPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1REPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Growth1REPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Growth1REPORT->EditValue ?>"<?php echo $patient_an_registration_grid->Growth1REPORT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Growth1REPORT">
<span<?php echo $patient_an_registration_grid->Growth1REPORT->viewAttributes() ?>><?php echo $patient_an_registration_grid->Growth1REPORT->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1REPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1REPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1REPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->Growth1REPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1REPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1REPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1REPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->Growth1REPORT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1REPORT" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1REPORT" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1REPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->Growth1REPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1REPORT" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1REPORT" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1REPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->Growth1REPORT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->ANProfile->Visible) { // ANProfile ?>
		<td data-name="ANProfile" <?php echo $patient_an_registration_grid->ANProfile->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_ANProfile" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_ANProfile" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfile" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->ANProfile->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->ANProfile->EditValue ?>"<?php echo $patient_an_registration_grid->ANProfile->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfile" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfile" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfile" value="<?php echo HtmlEncode($patient_an_registration_grid->ANProfile->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_ANProfile" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_ANProfile" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfile" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->ANProfile->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->ANProfile->EditValue ?>"<?php echo $patient_an_registration_grid->ANProfile->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_ANProfile">
<span<?php echo $patient_an_registration_grid->ANProfile->viewAttributes() ?>><?php echo $patient_an_registration_grid->ANProfile->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfile" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfile" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfile" value="<?php echo HtmlEncode($patient_an_registration_grid->ANProfile->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfile" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfile" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfile" value="<?php echo HtmlEncode($patient_an_registration_grid->ANProfile->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfile" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfile" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfile" value="<?php echo HtmlEncode($patient_an_registration_grid->ANProfile->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfile" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfile" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfile" value="<?php echo HtmlEncode($patient_an_registration_grid->ANProfile->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->ANProfileDATE->Visible) { // ANProfileDATE ?>
		<td data-name="ANProfileDATE" <?php echo $patient_an_registration_grid->ANProfileDATE->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_ANProfileDATE" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_ANProfileDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->ANProfileDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->ANProfileDATE->EditValue ?>"<?php echo $patient_an_registration_grid->ANProfileDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->ANProfileDATE->ReadOnly && !$patient_an_registration_grid->ANProfileDATE->Disabled && !isset($patient_an_registration_grid->ANProfileDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->ANProfileDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->ANProfileDATE->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_ANProfileDATE" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_ANProfileDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->ANProfileDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->ANProfileDATE->EditValue ?>"<?php echo $patient_an_registration_grid->ANProfileDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->ANProfileDATE->ReadOnly && !$patient_an_registration_grid->ANProfileDATE->Disabled && !isset($patient_an_registration_grid->ANProfileDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->ANProfileDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_ANProfileDATE">
<span<?php echo $patient_an_registration_grid->ANProfileDATE->viewAttributes() ?>><?php echo $patient_an_registration_grid->ANProfileDATE->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->ANProfileDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->ANProfileDATE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileDATE" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileDATE" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->ANProfileDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileDATE" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileDATE" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->ANProfileDATE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->ANProfileINHOUSE->Visible) { // ANProfileINHOUSE ?>
		<td data-name="ANProfileINHOUSE" <?php echo $patient_an_registration_grid->ANProfileINHOUSE->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_ANProfileINHOUSE" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_ANProfileINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->ANProfileINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->ANProfileINHOUSE->EditValue ?>"<?php echo $patient_an_registration_grid->ANProfileINHOUSE->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileINHOUSE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileINHOUSE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->ANProfileINHOUSE->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_ANProfileINHOUSE" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_ANProfileINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->ANProfileINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->ANProfileINHOUSE->EditValue ?>"<?php echo $patient_an_registration_grid->ANProfileINHOUSE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_ANProfileINHOUSE">
<span<?php echo $patient_an_registration_grid->ANProfileINHOUSE->viewAttributes() ?>><?php echo $patient_an_registration_grid->ANProfileINHOUSE->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->ANProfileINHOUSE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileINHOUSE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileINHOUSE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->ANProfileINHOUSE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileINHOUSE" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileINHOUSE" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->ANProfileINHOUSE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileINHOUSE" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileINHOUSE" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->ANProfileINHOUSE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->ANProfileREPORT->Visible) { // ANProfileREPORT ?>
		<td data-name="ANProfileREPORT" <?php echo $patient_an_registration_grid->ANProfileREPORT->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_ANProfileREPORT" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_ANProfileREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->ANProfileREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->ANProfileREPORT->EditValue ?>"<?php echo $patient_an_registration_grid->ANProfileREPORT->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->ANProfileREPORT->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_ANProfileREPORT" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_ANProfileREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->ANProfileREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->ANProfileREPORT->EditValue ?>"<?php echo $patient_an_registration_grid->ANProfileREPORT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_ANProfileREPORT">
<span<?php echo $patient_an_registration_grid->ANProfileREPORT->viewAttributes() ?>><?php echo $patient_an_registration_grid->ANProfileREPORT->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->ANProfileREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->ANProfileREPORT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileREPORT" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileREPORT" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->ANProfileREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileREPORT" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileREPORT" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->ANProfileREPORT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->DualMarker->Visible) { // DualMarker ?>
		<td data-name="DualMarker" <?php echo $patient_an_registration_grid->DualMarker->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_DualMarker" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_DualMarker" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarker" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarker" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->DualMarker->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->DualMarker->EditValue ?>"<?php echo $patient_an_registration_grid->DualMarker->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarker" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarker" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarker" value="<?php echo HtmlEncode($patient_an_registration_grid->DualMarker->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_DualMarker" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_DualMarker" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarker" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarker" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->DualMarker->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->DualMarker->EditValue ?>"<?php echo $patient_an_registration_grid->DualMarker->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_DualMarker">
<span<?php echo $patient_an_registration_grid->DualMarker->viewAttributes() ?>><?php echo $patient_an_registration_grid->DualMarker->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarker" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarker" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarker" value="<?php echo HtmlEncode($patient_an_registration_grid->DualMarker->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarker" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarker" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarker" value="<?php echo HtmlEncode($patient_an_registration_grid->DualMarker->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarker" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarker" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarker" value="<?php echo HtmlEncode($patient_an_registration_grid->DualMarker->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarker" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarker" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarker" value="<?php echo HtmlEncode($patient_an_registration_grid->DualMarker->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->DualMarkerDATE->Visible) { // DualMarkerDATE ?>
		<td data-name="DualMarkerDATE" <?php echo $patient_an_registration_grid->DualMarkerDATE->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_DualMarkerDATE" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_DualMarkerDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->DualMarkerDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->DualMarkerDATE->EditValue ?>"<?php echo $patient_an_registration_grid->DualMarkerDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->DualMarkerDATE->ReadOnly && !$patient_an_registration_grid->DualMarkerDATE->Disabled && !isset($patient_an_registration_grid->DualMarkerDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->DualMarkerDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->DualMarkerDATE->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_DualMarkerDATE" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_DualMarkerDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->DualMarkerDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->DualMarkerDATE->EditValue ?>"<?php echo $patient_an_registration_grid->DualMarkerDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->DualMarkerDATE->ReadOnly && !$patient_an_registration_grid->DualMarkerDATE->Disabled && !isset($patient_an_registration_grid->DualMarkerDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->DualMarkerDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_DualMarkerDATE">
<span<?php echo $patient_an_registration_grid->DualMarkerDATE->viewAttributes() ?>><?php echo $patient_an_registration_grid->DualMarkerDATE->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->DualMarkerDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->DualMarkerDATE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerDATE" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerDATE" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->DualMarkerDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerDATE" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerDATE" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->DualMarkerDATE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->DualMarkerINHOUSE->Visible) { // DualMarkerINHOUSE ?>
		<td data-name="DualMarkerINHOUSE" <?php echo $patient_an_registration_grid->DualMarkerINHOUSE->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_DualMarkerINHOUSE" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_DualMarkerINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->DualMarkerINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->DualMarkerINHOUSE->EditValue ?>"<?php echo $patient_an_registration_grid->DualMarkerINHOUSE->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerINHOUSE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerINHOUSE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->DualMarkerINHOUSE->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_DualMarkerINHOUSE" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_DualMarkerINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->DualMarkerINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->DualMarkerINHOUSE->EditValue ?>"<?php echo $patient_an_registration_grid->DualMarkerINHOUSE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_DualMarkerINHOUSE">
<span<?php echo $patient_an_registration_grid->DualMarkerINHOUSE->viewAttributes() ?>><?php echo $patient_an_registration_grid->DualMarkerINHOUSE->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->DualMarkerINHOUSE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerINHOUSE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerINHOUSE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->DualMarkerINHOUSE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerINHOUSE" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerINHOUSE" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->DualMarkerINHOUSE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerINHOUSE" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerINHOUSE" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->DualMarkerINHOUSE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->DualMarkerREPORT->Visible) { // DualMarkerREPORT ?>
		<td data-name="DualMarkerREPORT" <?php echo $patient_an_registration_grid->DualMarkerREPORT->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_DualMarkerREPORT" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_DualMarkerREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->DualMarkerREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->DualMarkerREPORT->EditValue ?>"<?php echo $patient_an_registration_grid->DualMarkerREPORT->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->DualMarkerREPORT->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_DualMarkerREPORT" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_DualMarkerREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->DualMarkerREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->DualMarkerREPORT->EditValue ?>"<?php echo $patient_an_registration_grid->DualMarkerREPORT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_DualMarkerREPORT">
<span<?php echo $patient_an_registration_grid->DualMarkerREPORT->viewAttributes() ?>><?php echo $patient_an_registration_grid->DualMarkerREPORT->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->DualMarkerREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->DualMarkerREPORT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerREPORT" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerREPORT" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->DualMarkerREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerREPORT" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerREPORT" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->DualMarkerREPORT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Quadruple->Visible) { // Quadruple ?>
		<td data-name="Quadruple" <?php echo $patient_an_registration_grid->Quadruple->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Quadruple" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_Quadruple" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Quadruple" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Quadruple" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Quadruple->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Quadruple->EditValue ?>"<?php echo $patient_an_registration_grid->Quadruple->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Quadruple" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Quadruple" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Quadruple" value="<?php echo HtmlEncode($patient_an_registration_grid->Quadruple->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Quadruple" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_Quadruple" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Quadruple" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Quadruple" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Quadruple->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Quadruple->EditValue ?>"<?php echo $patient_an_registration_grid->Quadruple->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Quadruple">
<span<?php echo $patient_an_registration_grid->Quadruple->viewAttributes() ?>><?php echo $patient_an_registration_grid->Quadruple->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Quadruple" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Quadruple" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Quadruple" value="<?php echo HtmlEncode($patient_an_registration_grid->Quadruple->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Quadruple" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Quadruple" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Quadruple" value="<?php echo HtmlEncode($patient_an_registration_grid->Quadruple->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Quadruple" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Quadruple" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Quadruple" value="<?php echo HtmlEncode($patient_an_registration_grid->Quadruple->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Quadruple" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Quadruple" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Quadruple" value="<?php echo HtmlEncode($patient_an_registration_grid->Quadruple->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->QuadrupleDATE->Visible) { // QuadrupleDATE ?>
		<td data-name="QuadrupleDATE" <?php echo $patient_an_registration_grid->QuadrupleDATE->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_QuadrupleDATE" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_QuadrupleDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->QuadrupleDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->QuadrupleDATE->EditValue ?>"<?php echo $patient_an_registration_grid->QuadrupleDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->QuadrupleDATE->ReadOnly && !$patient_an_registration_grid->QuadrupleDATE->Disabled && !isset($patient_an_registration_grid->QuadrupleDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->QuadrupleDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->QuadrupleDATE->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_QuadrupleDATE" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_QuadrupleDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->QuadrupleDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->QuadrupleDATE->EditValue ?>"<?php echo $patient_an_registration_grid->QuadrupleDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->QuadrupleDATE->ReadOnly && !$patient_an_registration_grid->QuadrupleDATE->Disabled && !isset($patient_an_registration_grid->QuadrupleDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->QuadrupleDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_QuadrupleDATE">
<span<?php echo $patient_an_registration_grid->QuadrupleDATE->viewAttributes() ?>><?php echo $patient_an_registration_grid->QuadrupleDATE->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->QuadrupleDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->QuadrupleDATE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleDATE" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleDATE" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->QuadrupleDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleDATE" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleDATE" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->QuadrupleDATE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->QuadrupleINHOUSE->Visible) { // QuadrupleINHOUSE ?>
		<td data-name="QuadrupleINHOUSE" <?php echo $patient_an_registration_grid->QuadrupleINHOUSE->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_QuadrupleINHOUSE" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_QuadrupleINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->QuadrupleINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->QuadrupleINHOUSE->EditValue ?>"<?php echo $patient_an_registration_grid->QuadrupleINHOUSE->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleINHOUSE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleINHOUSE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->QuadrupleINHOUSE->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_QuadrupleINHOUSE" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_QuadrupleINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->QuadrupleINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->QuadrupleINHOUSE->EditValue ?>"<?php echo $patient_an_registration_grid->QuadrupleINHOUSE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_QuadrupleINHOUSE">
<span<?php echo $patient_an_registration_grid->QuadrupleINHOUSE->viewAttributes() ?>><?php echo $patient_an_registration_grid->QuadrupleINHOUSE->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->QuadrupleINHOUSE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleINHOUSE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleINHOUSE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->QuadrupleINHOUSE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleINHOUSE" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleINHOUSE" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->QuadrupleINHOUSE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleINHOUSE" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleINHOUSE" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->QuadrupleINHOUSE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->QuadrupleREPORT->Visible) { // QuadrupleREPORT ?>
		<td data-name="QuadrupleREPORT" <?php echo $patient_an_registration_grid->QuadrupleREPORT->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_QuadrupleREPORT" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_QuadrupleREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->QuadrupleREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->QuadrupleREPORT->EditValue ?>"<?php echo $patient_an_registration_grid->QuadrupleREPORT->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->QuadrupleREPORT->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_QuadrupleREPORT" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_QuadrupleREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->QuadrupleREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->QuadrupleREPORT->EditValue ?>"<?php echo $patient_an_registration_grid->QuadrupleREPORT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_QuadrupleREPORT">
<span<?php echo $patient_an_registration_grid->QuadrupleREPORT->viewAttributes() ?>><?php echo $patient_an_registration_grid->QuadrupleREPORT->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->QuadrupleREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->QuadrupleREPORT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleREPORT" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleREPORT" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->QuadrupleREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleREPORT" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleREPORT" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->QuadrupleREPORT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->A5month->Visible) { // A5month ?>
		<td data-name="A5month" <?php echo $patient_an_registration_grid->A5month->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_A5month" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_A5month" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5month" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5month" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->A5month->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->A5month->EditValue ?>"<?php echo $patient_an_registration_grid->A5month->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5month" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A5month" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A5month" value="<?php echo HtmlEncode($patient_an_registration_grid->A5month->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_A5month" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_A5month" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5month" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5month" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->A5month->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->A5month->EditValue ?>"<?php echo $patient_an_registration_grid->A5month->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_A5month">
<span<?php echo $patient_an_registration_grid->A5month->viewAttributes() ?>><?php echo $patient_an_registration_grid->A5month->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5month" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5month" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5month" value="<?php echo HtmlEncode($patient_an_registration_grid->A5month->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A5month" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A5month" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A5month" value="<?php echo HtmlEncode($patient_an_registration_grid->A5month->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5month" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A5month" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A5month" value="<?php echo HtmlEncode($patient_an_registration_grid->A5month->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A5month" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A5month" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A5month" value="<?php echo HtmlEncode($patient_an_registration_grid->A5month->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->A5monthDATE->Visible) { // A5monthDATE ?>
		<td data-name="A5monthDATE" <?php echo $patient_an_registration_grid->A5monthDATE->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_A5monthDATE" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_A5monthDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->A5monthDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->A5monthDATE->EditValue ?>"<?php echo $patient_an_registration_grid->A5monthDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->A5monthDATE->ReadOnly && !$patient_an_registration_grid->A5monthDATE->Disabled && !isset($patient_an_registration_grid->A5monthDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->A5monthDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->A5monthDATE->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_A5monthDATE" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_A5monthDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->A5monthDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->A5monthDATE->EditValue ?>"<?php echo $patient_an_registration_grid->A5monthDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->A5monthDATE->ReadOnly && !$patient_an_registration_grid->A5monthDATE->Disabled && !isset($patient_an_registration_grid->A5monthDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->A5monthDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_A5monthDATE">
<span<?php echo $patient_an_registration_grid->A5monthDATE->viewAttributes() ?>><?php echo $patient_an_registration_grid->A5monthDATE->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->A5monthDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->A5monthDATE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthDATE" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthDATE" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->A5monthDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthDATE" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthDATE" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->A5monthDATE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->A5monthINHOUSE->Visible) { // A5monthINHOUSE ?>
		<td data-name="A5monthINHOUSE" <?php echo $patient_an_registration_grid->A5monthINHOUSE->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_A5monthINHOUSE" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_A5monthINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->A5monthINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->A5monthINHOUSE->EditValue ?>"<?php echo $patient_an_registration_grid->A5monthINHOUSE->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthINHOUSE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthINHOUSE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->A5monthINHOUSE->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_A5monthINHOUSE" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_A5monthINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->A5monthINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->A5monthINHOUSE->EditValue ?>"<?php echo $patient_an_registration_grid->A5monthINHOUSE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_A5monthINHOUSE">
<span<?php echo $patient_an_registration_grid->A5monthINHOUSE->viewAttributes() ?>><?php echo $patient_an_registration_grid->A5monthINHOUSE->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->A5monthINHOUSE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthINHOUSE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthINHOUSE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->A5monthINHOUSE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthINHOUSE" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthINHOUSE" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->A5monthINHOUSE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthINHOUSE" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthINHOUSE" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->A5monthINHOUSE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->A5monthREPORT->Visible) { // A5monthREPORT ?>
		<td data-name="A5monthREPORT" <?php echo $patient_an_registration_grid->A5monthREPORT->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_A5monthREPORT" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_A5monthREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->A5monthREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->A5monthREPORT->EditValue ?>"<?php echo $patient_an_registration_grid->A5monthREPORT->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->A5monthREPORT->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_A5monthREPORT" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_A5monthREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->A5monthREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->A5monthREPORT->EditValue ?>"<?php echo $patient_an_registration_grid->A5monthREPORT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_A5monthREPORT">
<span<?php echo $patient_an_registration_grid->A5monthREPORT->viewAttributes() ?>><?php echo $patient_an_registration_grid->A5monthREPORT->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->A5monthREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->A5monthREPORT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthREPORT" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthREPORT" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->A5monthREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthREPORT" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthREPORT" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->A5monthREPORT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->A7month->Visible) { // A7month ?>
		<td data-name="A7month" <?php echo $patient_an_registration_grid->A7month->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_A7month" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_A7month" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7month" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7month" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->A7month->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->A7month->EditValue ?>"<?php echo $patient_an_registration_grid->A7month->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7month" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A7month" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A7month" value="<?php echo HtmlEncode($patient_an_registration_grid->A7month->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_A7month" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_A7month" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7month" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7month" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->A7month->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->A7month->EditValue ?>"<?php echo $patient_an_registration_grid->A7month->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_A7month">
<span<?php echo $patient_an_registration_grid->A7month->viewAttributes() ?>><?php echo $patient_an_registration_grid->A7month->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7month" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7month" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7month" value="<?php echo HtmlEncode($patient_an_registration_grid->A7month->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A7month" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A7month" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A7month" value="<?php echo HtmlEncode($patient_an_registration_grid->A7month->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7month" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A7month" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A7month" value="<?php echo HtmlEncode($patient_an_registration_grid->A7month->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A7month" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A7month" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A7month" value="<?php echo HtmlEncode($patient_an_registration_grid->A7month->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->A7monthDATE->Visible) { // A7monthDATE ?>
		<td data-name="A7monthDATE" <?php echo $patient_an_registration_grid->A7monthDATE->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_A7monthDATE" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_A7monthDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->A7monthDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->A7monthDATE->EditValue ?>"<?php echo $patient_an_registration_grid->A7monthDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->A7monthDATE->ReadOnly && !$patient_an_registration_grid->A7monthDATE->Disabled && !isset($patient_an_registration_grid->A7monthDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->A7monthDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->A7monthDATE->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_A7monthDATE" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_A7monthDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->A7monthDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->A7monthDATE->EditValue ?>"<?php echo $patient_an_registration_grid->A7monthDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->A7monthDATE->ReadOnly && !$patient_an_registration_grid->A7monthDATE->Disabled && !isset($patient_an_registration_grid->A7monthDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->A7monthDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_A7monthDATE">
<span<?php echo $patient_an_registration_grid->A7monthDATE->viewAttributes() ?>><?php echo $patient_an_registration_grid->A7monthDATE->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->A7monthDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->A7monthDATE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthDATE" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthDATE" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->A7monthDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthDATE" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthDATE" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->A7monthDATE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->A7monthINHOUSE->Visible) { // A7monthINHOUSE ?>
		<td data-name="A7monthINHOUSE" <?php echo $patient_an_registration_grid->A7monthINHOUSE->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_A7monthINHOUSE" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_A7monthINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->A7monthINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->A7monthINHOUSE->EditValue ?>"<?php echo $patient_an_registration_grid->A7monthINHOUSE->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthINHOUSE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthINHOUSE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->A7monthINHOUSE->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_A7monthINHOUSE" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_A7monthINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->A7monthINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->A7monthINHOUSE->EditValue ?>"<?php echo $patient_an_registration_grid->A7monthINHOUSE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_A7monthINHOUSE">
<span<?php echo $patient_an_registration_grid->A7monthINHOUSE->viewAttributes() ?>><?php echo $patient_an_registration_grid->A7monthINHOUSE->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->A7monthINHOUSE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthINHOUSE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthINHOUSE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->A7monthINHOUSE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthINHOUSE" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthINHOUSE" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->A7monthINHOUSE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthINHOUSE" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthINHOUSE" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->A7monthINHOUSE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->A7monthREPORT->Visible) { // A7monthREPORT ?>
		<td data-name="A7monthREPORT" <?php echo $patient_an_registration_grid->A7monthREPORT->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_A7monthREPORT" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_A7monthREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->A7monthREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->A7monthREPORT->EditValue ?>"<?php echo $patient_an_registration_grid->A7monthREPORT->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->A7monthREPORT->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_A7monthREPORT" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_A7monthREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->A7monthREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->A7monthREPORT->EditValue ?>"<?php echo $patient_an_registration_grid->A7monthREPORT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_A7monthREPORT">
<span<?php echo $patient_an_registration_grid->A7monthREPORT->viewAttributes() ?>><?php echo $patient_an_registration_grid->A7monthREPORT->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->A7monthREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->A7monthREPORT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthREPORT" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthREPORT" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->A7monthREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthREPORT" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthREPORT" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->A7monthREPORT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->A9month->Visible) { // A9month ?>
		<td data-name="A9month" <?php echo $patient_an_registration_grid->A9month->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_A9month" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_A9month" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9month" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9month" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->A9month->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->A9month->EditValue ?>"<?php echo $patient_an_registration_grid->A9month->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9month" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A9month" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A9month" value="<?php echo HtmlEncode($patient_an_registration_grid->A9month->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_A9month" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_A9month" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9month" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9month" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->A9month->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->A9month->EditValue ?>"<?php echo $patient_an_registration_grid->A9month->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_A9month">
<span<?php echo $patient_an_registration_grid->A9month->viewAttributes() ?>><?php echo $patient_an_registration_grid->A9month->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9month" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9month" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9month" value="<?php echo HtmlEncode($patient_an_registration_grid->A9month->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A9month" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A9month" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A9month" value="<?php echo HtmlEncode($patient_an_registration_grid->A9month->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9month" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A9month" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A9month" value="<?php echo HtmlEncode($patient_an_registration_grid->A9month->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A9month" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A9month" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A9month" value="<?php echo HtmlEncode($patient_an_registration_grid->A9month->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->A9monthDATE->Visible) { // A9monthDATE ?>
		<td data-name="A9monthDATE" <?php echo $patient_an_registration_grid->A9monthDATE->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_A9monthDATE" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_A9monthDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->A9monthDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->A9monthDATE->EditValue ?>"<?php echo $patient_an_registration_grid->A9monthDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->A9monthDATE->ReadOnly && !$patient_an_registration_grid->A9monthDATE->Disabled && !isset($patient_an_registration_grid->A9monthDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->A9monthDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->A9monthDATE->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_A9monthDATE" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_A9monthDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->A9monthDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->A9monthDATE->EditValue ?>"<?php echo $patient_an_registration_grid->A9monthDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->A9monthDATE->ReadOnly && !$patient_an_registration_grid->A9monthDATE->Disabled && !isset($patient_an_registration_grid->A9monthDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->A9monthDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_A9monthDATE">
<span<?php echo $patient_an_registration_grid->A9monthDATE->viewAttributes() ?>><?php echo $patient_an_registration_grid->A9monthDATE->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->A9monthDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->A9monthDATE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthDATE" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthDATE" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->A9monthDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthDATE" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthDATE" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->A9monthDATE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->A9monthINHOUSE->Visible) { // A9monthINHOUSE ?>
		<td data-name="A9monthINHOUSE" <?php echo $patient_an_registration_grid->A9monthINHOUSE->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_A9monthINHOUSE" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_A9monthINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->A9monthINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->A9monthINHOUSE->EditValue ?>"<?php echo $patient_an_registration_grid->A9monthINHOUSE->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthINHOUSE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthINHOUSE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->A9monthINHOUSE->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_A9monthINHOUSE" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_A9monthINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->A9monthINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->A9monthINHOUSE->EditValue ?>"<?php echo $patient_an_registration_grid->A9monthINHOUSE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_A9monthINHOUSE">
<span<?php echo $patient_an_registration_grid->A9monthINHOUSE->viewAttributes() ?>><?php echo $patient_an_registration_grid->A9monthINHOUSE->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->A9monthINHOUSE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthINHOUSE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthINHOUSE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->A9monthINHOUSE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthINHOUSE" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthINHOUSE" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->A9monthINHOUSE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthINHOUSE" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthINHOUSE" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->A9monthINHOUSE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->A9monthREPORT->Visible) { // A9monthREPORT ?>
		<td data-name="A9monthREPORT" <?php echo $patient_an_registration_grid->A9monthREPORT->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_A9monthREPORT" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_A9monthREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->A9monthREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->A9monthREPORT->EditValue ?>"<?php echo $patient_an_registration_grid->A9monthREPORT->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->A9monthREPORT->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_A9monthREPORT" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_A9monthREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->A9monthREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->A9monthREPORT->EditValue ?>"<?php echo $patient_an_registration_grid->A9monthREPORT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_A9monthREPORT">
<span<?php echo $patient_an_registration_grid->A9monthREPORT->viewAttributes() ?>><?php echo $patient_an_registration_grid->A9monthREPORT->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->A9monthREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->A9monthREPORT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthREPORT" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthREPORT" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->A9monthREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthREPORT" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthREPORT" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->A9monthREPORT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->INJ->Visible) { // INJ ?>
		<td data-name="INJ" <?php echo $patient_an_registration_grid->INJ->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_INJ" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_INJ" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJ" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJ" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->INJ->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->INJ->EditValue ?>"<?php echo $patient_an_registration_grid->INJ->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJ" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_INJ" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_INJ" value="<?php echo HtmlEncode($patient_an_registration_grid->INJ->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_INJ" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_INJ" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJ" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJ" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->INJ->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->INJ->EditValue ?>"<?php echo $patient_an_registration_grid->INJ->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_INJ">
<span<?php echo $patient_an_registration_grid->INJ->viewAttributes() ?>><?php echo $patient_an_registration_grid->INJ->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJ" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJ" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJ" value="<?php echo HtmlEncode($patient_an_registration_grid->INJ->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_INJ" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_INJ" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_INJ" value="<?php echo HtmlEncode($patient_an_registration_grid->INJ->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJ" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_INJ" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_INJ" value="<?php echo HtmlEncode($patient_an_registration_grid->INJ->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_INJ" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_INJ" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_INJ" value="<?php echo HtmlEncode($patient_an_registration_grid->INJ->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->INJDATE->Visible) { // INJDATE ?>
		<td data-name="INJDATE" <?php echo $patient_an_registration_grid->INJDATE->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_INJDATE" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_INJDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->INJDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->INJDATE->EditValue ?>"<?php echo $patient_an_registration_grid->INJDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->INJDATE->ReadOnly && !$patient_an_registration_grid->INJDATE->Disabled && !isset($patient_an_registration_grid->INJDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->INJDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_INJDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_INJDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_INJDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->INJDATE->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_INJDATE" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_INJDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->INJDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->INJDATE->EditValue ?>"<?php echo $patient_an_registration_grid->INJDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->INJDATE->ReadOnly && !$patient_an_registration_grid->INJDATE->Disabled && !isset($patient_an_registration_grid->INJDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->INJDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_INJDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_INJDATE">
<span<?php echo $patient_an_registration_grid->INJDATE->viewAttributes() ?>><?php echo $patient_an_registration_grid->INJDATE->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->INJDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_INJDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_INJDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_INJDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->INJDATE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJDATE" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_INJDATE" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_INJDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->INJDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_INJDATE" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_INJDATE" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_INJDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->INJDATE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->INJINHOUSE->Visible) { // INJINHOUSE ?>
		<td data-name="INJINHOUSE" <?php echo $patient_an_registration_grid->INJINHOUSE->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_INJINHOUSE" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_INJINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->INJINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->INJINHOUSE->EditValue ?>"<?php echo $patient_an_registration_grid->INJINHOUSE->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJINHOUSE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_INJINHOUSE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_INJINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->INJINHOUSE->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_INJINHOUSE" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_INJINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->INJINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->INJINHOUSE->EditValue ?>"<?php echo $patient_an_registration_grid->INJINHOUSE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_INJINHOUSE">
<span<?php echo $patient_an_registration_grid->INJINHOUSE->viewAttributes() ?>><?php echo $patient_an_registration_grid->INJINHOUSE->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->INJINHOUSE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_INJINHOUSE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_INJINHOUSE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_INJINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->INJINHOUSE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJINHOUSE" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_INJINHOUSE" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_INJINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->INJINHOUSE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_INJINHOUSE" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_INJINHOUSE" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_INJINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->INJINHOUSE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->INJREPORT->Visible) { // INJREPORT ?>
		<td data-name="INJREPORT" <?php echo $patient_an_registration_grid->INJREPORT->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_INJREPORT" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_INJREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->INJREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->INJREPORT->EditValue ?>"<?php echo $patient_an_registration_grid->INJREPORT->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_INJREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_INJREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->INJREPORT->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_INJREPORT" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_INJREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->INJREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->INJREPORT->EditValue ?>"<?php echo $patient_an_registration_grid->INJREPORT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_INJREPORT">
<span<?php echo $patient_an_registration_grid->INJREPORT->viewAttributes() ?>><?php echo $patient_an_registration_grid->INJREPORT->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->INJREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_INJREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_INJREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_INJREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->INJREPORT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJREPORT" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_INJREPORT" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_INJREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->INJREPORT->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_INJREPORT" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_INJREPORT" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_INJREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->INJREPORT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Bleeding->Visible) { // Bleeding ?>
		<td data-name="Bleeding" <?php echo $patient_an_registration_grid->Bleeding->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Bleeding" class="form-group">
<div id="tp_x<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="patient_an_registration" data-field="x_Bleeding" data-value-separator="<?php echo $patient_an_registration_grid->Bleeding->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding[]" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding[]" value="{value}"<?php echo $patient_an_registration_grid->Bleeding->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_an_registration_grid->Bleeding->checkBoxListHtml(FALSE, "x{$patient_an_registration_grid->RowIndex}_Bleeding[]") ?>
</div></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Bleeding" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding[]" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding[]" value="<?php echo HtmlEncode($patient_an_registration_grid->Bleeding->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Bleeding" class="form-group">
<div id="tp_x<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="patient_an_registration" data-field="x_Bleeding" data-value-separator="<?php echo $patient_an_registration_grid->Bleeding->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding[]" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding[]" value="{value}"<?php echo $patient_an_registration_grid->Bleeding->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_an_registration_grid->Bleeding->checkBoxListHtml(FALSE, "x{$patient_an_registration_grid->RowIndex}_Bleeding[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Bleeding">
<span<?php echo $patient_an_registration_grid->Bleeding->viewAttributes() ?>><?php echo $patient_an_registration_grid->Bleeding->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Bleeding" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding" value="<?php echo HtmlEncode($patient_an_registration_grid->Bleeding->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Bleeding" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding[]" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding[]" value="<?php echo HtmlEncode($patient_an_registration_grid->Bleeding->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Bleeding" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding" value="<?php echo HtmlEncode($patient_an_registration_grid->Bleeding->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Bleeding" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding[]" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding[]" value="<?php echo HtmlEncode($patient_an_registration_grid->Bleeding->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Hypothyroidism->Visible) { // Hypothyroidism ?>
		<td data-name="Hypothyroidism" <?php echo $patient_an_registration_grid->Hypothyroidism->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Hypothyroidism" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_Hypothyroidism" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Hypothyroidism" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Hypothyroidism" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Hypothyroidism->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Hypothyroidism->EditValue ?>"<?php echo $patient_an_registration_grid->Hypothyroidism->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Hypothyroidism" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Hypothyroidism" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Hypothyroidism" value="<?php echo HtmlEncode($patient_an_registration_grid->Hypothyroidism->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Hypothyroidism" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_Hypothyroidism" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Hypothyroidism" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Hypothyroidism" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Hypothyroidism->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Hypothyroidism->EditValue ?>"<?php echo $patient_an_registration_grid->Hypothyroidism->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Hypothyroidism">
<span<?php echo $patient_an_registration_grid->Hypothyroidism->viewAttributes() ?>><?php echo $patient_an_registration_grid->Hypothyroidism->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Hypothyroidism" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Hypothyroidism" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Hypothyroidism" value="<?php echo HtmlEncode($patient_an_registration_grid->Hypothyroidism->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Hypothyroidism" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Hypothyroidism" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Hypothyroidism" value="<?php echo HtmlEncode($patient_an_registration_grid->Hypothyroidism->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Hypothyroidism" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Hypothyroidism" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Hypothyroidism" value="<?php echo HtmlEncode($patient_an_registration_grid->Hypothyroidism->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Hypothyroidism" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Hypothyroidism" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Hypothyroidism" value="<?php echo HtmlEncode($patient_an_registration_grid->Hypothyroidism->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->PICMENumber->Visible) { // PICMENumber ?>
		<td data-name="PICMENumber" <?php echo $patient_an_registration_grid->PICMENumber->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_PICMENumber" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_PICMENumber" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PICMENumber" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PICMENumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->PICMENumber->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->PICMENumber->EditValue ?>"<?php echo $patient_an_registration_grid->PICMENumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PICMENumber" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PICMENumber" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PICMENumber" value="<?php echo HtmlEncode($patient_an_registration_grid->PICMENumber->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_PICMENumber" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_PICMENumber" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PICMENumber" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PICMENumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->PICMENumber->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->PICMENumber->EditValue ?>"<?php echo $patient_an_registration_grid->PICMENumber->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_PICMENumber">
<span<?php echo $patient_an_registration_grid->PICMENumber->viewAttributes() ?>><?php echo $patient_an_registration_grid->PICMENumber->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PICMENumber" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PICMENumber" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PICMENumber" value="<?php echo HtmlEncode($patient_an_registration_grid->PICMENumber->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PICMENumber" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PICMENumber" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PICMENumber" value="<?php echo HtmlEncode($patient_an_registration_grid->PICMENumber->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PICMENumber" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_PICMENumber" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_PICMENumber" value="<?php echo HtmlEncode($patient_an_registration_grid->PICMENumber->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PICMENumber" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_PICMENumber" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_PICMENumber" value="<?php echo HtmlEncode($patient_an_registration_grid->PICMENumber->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Outcome->Visible) { // Outcome ?>
		<td data-name="Outcome" <?php echo $patient_an_registration_grid->Outcome->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Outcome" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_Outcome" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Outcome" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Outcome" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Outcome->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Outcome->EditValue ?>"<?php echo $patient_an_registration_grid->Outcome->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Outcome" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Outcome" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Outcome" value="<?php echo HtmlEncode($patient_an_registration_grid->Outcome->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Outcome" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_Outcome" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Outcome" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Outcome" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Outcome->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Outcome->EditValue ?>"<?php echo $patient_an_registration_grid->Outcome->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Outcome">
<span<?php echo $patient_an_registration_grid->Outcome->viewAttributes() ?>><?php echo $patient_an_registration_grid->Outcome->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Outcome" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Outcome" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Outcome" value="<?php echo HtmlEncode($patient_an_registration_grid->Outcome->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Outcome" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Outcome" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Outcome" value="<?php echo HtmlEncode($patient_an_registration_grid->Outcome->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Outcome" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Outcome" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Outcome" value="<?php echo HtmlEncode($patient_an_registration_grid->Outcome->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Outcome" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Outcome" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Outcome" value="<?php echo HtmlEncode($patient_an_registration_grid->Outcome->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->DateofAdmission->Visible) { // DateofAdmission ?>
		<td data-name="DateofAdmission" <?php echo $patient_an_registration_grid->DateofAdmission->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_DateofAdmission" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_DateofAdmission" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DateofAdmission" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DateofAdmission" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->DateofAdmission->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->DateofAdmission->EditValue ?>"<?php echo $patient_an_registration_grid->DateofAdmission->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->DateofAdmission->ReadOnly && !$patient_an_registration_grid->DateofAdmission->Disabled && !isset($patient_an_registration_grid->DateofAdmission->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->DateofAdmission->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_DateofAdmission", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DateofAdmission" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DateofAdmission" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DateofAdmission" value="<?php echo HtmlEncode($patient_an_registration_grid->DateofAdmission->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_DateofAdmission" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_DateofAdmission" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DateofAdmission" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DateofAdmission" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->DateofAdmission->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->DateofAdmission->EditValue ?>"<?php echo $patient_an_registration_grid->DateofAdmission->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->DateofAdmission->ReadOnly && !$patient_an_registration_grid->DateofAdmission->Disabled && !isset($patient_an_registration_grid->DateofAdmission->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->DateofAdmission->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_DateofAdmission", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_DateofAdmission">
<span<?php echo $patient_an_registration_grid->DateofAdmission->viewAttributes() ?>><?php echo $patient_an_registration_grid->DateofAdmission->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DateofAdmission" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DateofAdmission" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DateofAdmission" value="<?php echo HtmlEncode($patient_an_registration_grid->DateofAdmission->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_DateofAdmission" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DateofAdmission" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DateofAdmission" value="<?php echo HtmlEncode($patient_an_registration_grid->DateofAdmission->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DateofAdmission" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_DateofAdmission" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_DateofAdmission" value="<?php echo HtmlEncode($patient_an_registration_grid->DateofAdmission->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_DateofAdmission" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_DateofAdmission" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_DateofAdmission" value="<?php echo HtmlEncode($patient_an_registration_grid->DateofAdmission->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->DateodProcedure->Visible) { // DateodProcedure ?>
		<td data-name="DateodProcedure" <?php echo $patient_an_registration_grid->DateodProcedure->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_DateodProcedure" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_DateodProcedure" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DateodProcedure" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DateodProcedure" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->DateodProcedure->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->DateodProcedure->EditValue ?>"<?php echo $patient_an_registration_grid->DateodProcedure->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DateodProcedure" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DateodProcedure" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DateodProcedure" value="<?php echo HtmlEncode($patient_an_registration_grid->DateodProcedure->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_DateodProcedure" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_DateodProcedure" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DateodProcedure" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DateodProcedure" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->DateodProcedure->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->DateodProcedure->EditValue ?>"<?php echo $patient_an_registration_grid->DateodProcedure->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_DateodProcedure">
<span<?php echo $patient_an_registration_grid->DateodProcedure->viewAttributes() ?>><?php echo $patient_an_registration_grid->DateodProcedure->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DateodProcedure" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DateodProcedure" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DateodProcedure" value="<?php echo HtmlEncode($patient_an_registration_grid->DateodProcedure->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_DateodProcedure" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DateodProcedure" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DateodProcedure" value="<?php echo HtmlEncode($patient_an_registration_grid->DateodProcedure->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DateodProcedure" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_DateodProcedure" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_DateodProcedure" value="<?php echo HtmlEncode($patient_an_registration_grid->DateodProcedure->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_DateodProcedure" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_DateodProcedure" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_DateodProcedure" value="<?php echo HtmlEncode($patient_an_registration_grid->DateodProcedure->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Miscarriage->Visible) { // Miscarriage ?>
		<td data-name="Miscarriage" <?php echo $patient_an_registration_grid->Miscarriage->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Miscarriage" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_Miscarriage" data-value-separator="<?php echo $patient_an_registration_grid->Miscarriage->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Miscarriage" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Miscarriage"<?php echo $patient_an_registration_grid->Miscarriage->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->Miscarriage->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_Miscarriage") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Miscarriage" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Miscarriage" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Miscarriage" value="<?php echo HtmlEncode($patient_an_registration_grid->Miscarriage->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Miscarriage" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_Miscarriage" data-value-separator="<?php echo $patient_an_registration_grid->Miscarriage->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Miscarriage" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Miscarriage"<?php echo $patient_an_registration_grid->Miscarriage->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->Miscarriage->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_Miscarriage") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Miscarriage">
<span<?php echo $patient_an_registration_grid->Miscarriage->viewAttributes() ?>><?php echo $patient_an_registration_grid->Miscarriage->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Miscarriage" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Miscarriage" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Miscarriage" value="<?php echo HtmlEncode($patient_an_registration_grid->Miscarriage->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Miscarriage" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Miscarriage" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Miscarriage" value="<?php echo HtmlEncode($patient_an_registration_grid->Miscarriage->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Miscarriage" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Miscarriage" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Miscarriage" value="<?php echo HtmlEncode($patient_an_registration_grid->Miscarriage->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Miscarriage" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Miscarriage" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Miscarriage" value="<?php echo HtmlEncode($patient_an_registration_grid->Miscarriage->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->ModeOfDelivery->Visible) { // ModeOfDelivery ?>
		<td data-name="ModeOfDelivery" <?php echo $patient_an_registration_grid->ModeOfDelivery->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_ModeOfDelivery" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_ModeOfDelivery" data-value-separator="<?php echo $patient_an_registration_grid->ModeOfDelivery->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ModeOfDelivery" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ModeOfDelivery"<?php echo $patient_an_registration_grid->ModeOfDelivery->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->ModeOfDelivery->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_ModeOfDelivery") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ModeOfDelivery" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ModeOfDelivery" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ModeOfDelivery" value="<?php echo HtmlEncode($patient_an_registration_grid->ModeOfDelivery->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_ModeOfDelivery" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_ModeOfDelivery" data-value-separator="<?php echo $patient_an_registration_grid->ModeOfDelivery->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ModeOfDelivery" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ModeOfDelivery"<?php echo $patient_an_registration_grid->ModeOfDelivery->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->ModeOfDelivery->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_ModeOfDelivery") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_ModeOfDelivery">
<span<?php echo $patient_an_registration_grid->ModeOfDelivery->viewAttributes() ?>><?php echo $patient_an_registration_grid->ModeOfDelivery->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ModeOfDelivery" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ModeOfDelivery" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ModeOfDelivery" value="<?php echo HtmlEncode($patient_an_registration_grid->ModeOfDelivery->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ModeOfDelivery" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ModeOfDelivery" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ModeOfDelivery" value="<?php echo HtmlEncode($patient_an_registration_grid->ModeOfDelivery->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ModeOfDelivery" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ModeOfDelivery" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ModeOfDelivery" value="<?php echo HtmlEncode($patient_an_registration_grid->ModeOfDelivery->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ModeOfDelivery" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ModeOfDelivery" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ModeOfDelivery" value="<?php echo HtmlEncode($patient_an_registration_grid->ModeOfDelivery->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->ND->Visible) { // ND ?>
		<td data-name="ND" <?php echo $patient_an_registration_grid->ND->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_ND" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_ND" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ND" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ND" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->ND->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->ND->EditValue ?>"<?php echo $patient_an_registration_grid->ND->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ND" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ND" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ND" value="<?php echo HtmlEncode($patient_an_registration_grid->ND->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_ND" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_ND" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ND" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ND" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->ND->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->ND->EditValue ?>"<?php echo $patient_an_registration_grid->ND->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_ND">
<span<?php echo $patient_an_registration_grid->ND->viewAttributes() ?>><?php echo $patient_an_registration_grid->ND->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ND" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ND" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ND" value="<?php echo HtmlEncode($patient_an_registration_grid->ND->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ND" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ND" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ND" value="<?php echo HtmlEncode($patient_an_registration_grid->ND->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ND" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ND" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ND" value="<?php echo HtmlEncode($patient_an_registration_grid->ND->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ND" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ND" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ND" value="<?php echo HtmlEncode($patient_an_registration_grid->ND->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->NDS->Visible) { // NDS ?>
		<td data-name="NDS" <?php echo $patient_an_registration_grid->NDS->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_NDS" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_NDS" data-value-separator="<?php echo $patient_an_registration_grid->NDS->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NDS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NDS"<?php echo $patient_an_registration_grid->NDS->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->NDS->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_NDS") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_NDS" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_NDS" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_NDS" value="<?php echo HtmlEncode($patient_an_registration_grid->NDS->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_NDS" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_NDS" data-value-separator="<?php echo $patient_an_registration_grid->NDS->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NDS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NDS"<?php echo $patient_an_registration_grid->NDS->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->NDS->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_NDS") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_NDS">
<span<?php echo $patient_an_registration_grid->NDS->viewAttributes() ?>><?php echo $patient_an_registration_grid->NDS->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NDS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NDS" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NDS" value="<?php echo HtmlEncode($patient_an_registration_grid->NDS->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_NDS" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_NDS" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_NDS" value="<?php echo HtmlEncode($patient_an_registration_grid->NDS->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NDS" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_NDS" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_NDS" value="<?php echo HtmlEncode($patient_an_registration_grid->NDS->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_NDS" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_NDS" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_NDS" value="<?php echo HtmlEncode($patient_an_registration_grid->NDS->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->NDP->Visible) { // NDP ?>
		<td data-name="NDP" <?php echo $patient_an_registration_grid->NDP->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_NDP" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_NDP" data-value-separator="<?php echo $patient_an_registration_grid->NDP->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NDP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NDP"<?php echo $patient_an_registration_grid->NDP->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->NDP->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_NDP") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_NDP" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_NDP" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_NDP" value="<?php echo HtmlEncode($patient_an_registration_grid->NDP->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_NDP" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_NDP" data-value-separator="<?php echo $patient_an_registration_grid->NDP->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NDP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NDP"<?php echo $patient_an_registration_grid->NDP->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->NDP->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_NDP") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_NDP">
<span<?php echo $patient_an_registration_grid->NDP->viewAttributes() ?>><?php echo $patient_an_registration_grid->NDP->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NDP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NDP" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NDP" value="<?php echo HtmlEncode($patient_an_registration_grid->NDP->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_NDP" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_NDP" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_NDP" value="<?php echo HtmlEncode($patient_an_registration_grid->NDP->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NDP" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_NDP" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_NDP" value="<?php echo HtmlEncode($patient_an_registration_grid->NDP->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_NDP" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_NDP" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_NDP" value="<?php echo HtmlEncode($patient_an_registration_grid->NDP->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Vaccum->Visible) { // Vaccum ?>
		<td data-name="Vaccum" <?php echo $patient_an_registration_grid->Vaccum->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Vaccum" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_Vaccum" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Vaccum" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Vaccum" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Vaccum->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Vaccum->EditValue ?>"<?php echo $patient_an_registration_grid->Vaccum->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Vaccum" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Vaccum" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Vaccum" value="<?php echo HtmlEncode($patient_an_registration_grid->Vaccum->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Vaccum" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_Vaccum" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Vaccum" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Vaccum" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Vaccum->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Vaccum->EditValue ?>"<?php echo $patient_an_registration_grid->Vaccum->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Vaccum">
<span<?php echo $patient_an_registration_grid->Vaccum->viewAttributes() ?>><?php echo $patient_an_registration_grid->Vaccum->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Vaccum" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Vaccum" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Vaccum" value="<?php echo HtmlEncode($patient_an_registration_grid->Vaccum->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Vaccum" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Vaccum" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Vaccum" value="<?php echo HtmlEncode($patient_an_registration_grid->Vaccum->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Vaccum" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Vaccum" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Vaccum" value="<?php echo HtmlEncode($patient_an_registration_grid->Vaccum->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Vaccum" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Vaccum" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Vaccum" value="<?php echo HtmlEncode($patient_an_registration_grid->Vaccum->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->VaccumS->Visible) { // VaccumS ?>
		<td data-name="VaccumS" <?php echo $patient_an_registration_grid->VaccumS->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_VaccumS" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_VaccumS" data-value-separator="<?php echo $patient_an_registration_grid->VaccumS->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumS"<?php echo $patient_an_registration_grid->VaccumS->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->VaccumS->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_VaccumS") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_VaccumS" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumS" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumS" value="<?php echo HtmlEncode($patient_an_registration_grid->VaccumS->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_VaccumS" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_VaccumS" data-value-separator="<?php echo $patient_an_registration_grid->VaccumS->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumS"<?php echo $patient_an_registration_grid->VaccumS->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->VaccumS->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_VaccumS") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_VaccumS">
<span<?php echo $patient_an_registration_grid->VaccumS->viewAttributes() ?>><?php echo $patient_an_registration_grid->VaccumS->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_VaccumS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumS" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumS" value="<?php echo HtmlEncode($patient_an_registration_grid->VaccumS->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_VaccumS" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumS" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumS" value="<?php echo HtmlEncode($patient_an_registration_grid->VaccumS->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_VaccumS" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumS" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumS" value="<?php echo HtmlEncode($patient_an_registration_grid->VaccumS->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_VaccumS" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumS" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumS" value="<?php echo HtmlEncode($patient_an_registration_grid->VaccumS->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->VaccumP->Visible) { // VaccumP ?>
		<td data-name="VaccumP" <?php echo $patient_an_registration_grid->VaccumP->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_VaccumP" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_VaccumP" data-value-separator="<?php echo $patient_an_registration_grid->VaccumP->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumP"<?php echo $patient_an_registration_grid->VaccumP->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->VaccumP->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_VaccumP") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_VaccumP" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumP" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumP" value="<?php echo HtmlEncode($patient_an_registration_grid->VaccumP->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_VaccumP" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_VaccumP" data-value-separator="<?php echo $patient_an_registration_grid->VaccumP->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumP"<?php echo $patient_an_registration_grid->VaccumP->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->VaccumP->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_VaccumP") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_VaccumP">
<span<?php echo $patient_an_registration_grid->VaccumP->viewAttributes() ?>><?php echo $patient_an_registration_grid->VaccumP->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_VaccumP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumP" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumP" value="<?php echo HtmlEncode($patient_an_registration_grid->VaccumP->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_VaccumP" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumP" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumP" value="<?php echo HtmlEncode($patient_an_registration_grid->VaccumP->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_VaccumP" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumP" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumP" value="<?php echo HtmlEncode($patient_an_registration_grid->VaccumP->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_VaccumP" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumP" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumP" value="<?php echo HtmlEncode($patient_an_registration_grid->VaccumP->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Forceps->Visible) { // Forceps ?>
		<td data-name="Forceps" <?php echo $patient_an_registration_grid->Forceps->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Forceps" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_Forceps" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Forceps" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Forceps" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Forceps->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Forceps->EditValue ?>"<?php echo $patient_an_registration_grid->Forceps->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Forceps" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Forceps" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Forceps" value="<?php echo HtmlEncode($patient_an_registration_grid->Forceps->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Forceps" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_Forceps" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Forceps" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Forceps" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Forceps->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Forceps->EditValue ?>"<?php echo $patient_an_registration_grid->Forceps->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Forceps">
<span<?php echo $patient_an_registration_grid->Forceps->viewAttributes() ?>><?php echo $patient_an_registration_grid->Forceps->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Forceps" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Forceps" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Forceps" value="<?php echo HtmlEncode($patient_an_registration_grid->Forceps->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Forceps" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Forceps" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Forceps" value="<?php echo HtmlEncode($patient_an_registration_grid->Forceps->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Forceps" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Forceps" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Forceps" value="<?php echo HtmlEncode($patient_an_registration_grid->Forceps->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Forceps" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Forceps" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Forceps" value="<?php echo HtmlEncode($patient_an_registration_grid->Forceps->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->ForcepsS->Visible) { // ForcepsS ?>
		<td data-name="ForcepsS" <?php echo $patient_an_registration_grid->ForcepsS->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_ForcepsS" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_ForcepsS" data-value-separator="<?php echo $patient_an_registration_grid->ForcepsS->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsS"<?php echo $patient_an_registration_grid->ForcepsS->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->ForcepsS->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_ForcepsS") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ForcepsS" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsS" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsS" value="<?php echo HtmlEncode($patient_an_registration_grid->ForcepsS->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_ForcepsS" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_ForcepsS" data-value-separator="<?php echo $patient_an_registration_grid->ForcepsS->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsS"<?php echo $patient_an_registration_grid->ForcepsS->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->ForcepsS->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_ForcepsS") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_ForcepsS">
<span<?php echo $patient_an_registration_grid->ForcepsS->viewAttributes() ?>><?php echo $patient_an_registration_grid->ForcepsS->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ForcepsS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsS" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsS" value="<?php echo HtmlEncode($patient_an_registration_grid->ForcepsS->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ForcepsS" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsS" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsS" value="<?php echo HtmlEncode($patient_an_registration_grid->ForcepsS->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ForcepsS" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsS" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsS" value="<?php echo HtmlEncode($patient_an_registration_grid->ForcepsS->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ForcepsS" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsS" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsS" value="<?php echo HtmlEncode($patient_an_registration_grid->ForcepsS->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->ForcepsP->Visible) { // ForcepsP ?>
		<td data-name="ForcepsP" <?php echo $patient_an_registration_grid->ForcepsP->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_ForcepsP" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_ForcepsP" data-value-separator="<?php echo $patient_an_registration_grid->ForcepsP->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsP"<?php echo $patient_an_registration_grid->ForcepsP->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->ForcepsP->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_ForcepsP") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ForcepsP" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsP" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsP" value="<?php echo HtmlEncode($patient_an_registration_grid->ForcepsP->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_ForcepsP" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_ForcepsP" data-value-separator="<?php echo $patient_an_registration_grid->ForcepsP->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsP"<?php echo $patient_an_registration_grid->ForcepsP->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->ForcepsP->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_ForcepsP") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_ForcepsP">
<span<?php echo $patient_an_registration_grid->ForcepsP->viewAttributes() ?>><?php echo $patient_an_registration_grid->ForcepsP->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ForcepsP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsP" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsP" value="<?php echo HtmlEncode($patient_an_registration_grid->ForcepsP->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ForcepsP" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsP" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsP" value="<?php echo HtmlEncode($patient_an_registration_grid->ForcepsP->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ForcepsP" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsP" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsP" value="<?php echo HtmlEncode($patient_an_registration_grid->ForcepsP->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ForcepsP" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsP" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsP" value="<?php echo HtmlEncode($patient_an_registration_grid->ForcepsP->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Elective->Visible) { // Elective ?>
		<td data-name="Elective" <?php echo $patient_an_registration_grid->Elective->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Elective" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_Elective" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Elective" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Elective" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Elective->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Elective->EditValue ?>"<?php echo $patient_an_registration_grid->Elective->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Elective" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Elective" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Elective" value="<?php echo HtmlEncode($patient_an_registration_grid->Elective->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Elective" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_Elective" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Elective" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Elective" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Elective->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Elective->EditValue ?>"<?php echo $patient_an_registration_grid->Elective->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Elective">
<span<?php echo $patient_an_registration_grid->Elective->viewAttributes() ?>><?php echo $patient_an_registration_grid->Elective->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Elective" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Elective" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Elective" value="<?php echo HtmlEncode($patient_an_registration_grid->Elective->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Elective" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Elective" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Elective" value="<?php echo HtmlEncode($patient_an_registration_grid->Elective->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Elective" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Elective" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Elective" value="<?php echo HtmlEncode($patient_an_registration_grid->Elective->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Elective" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Elective" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Elective" value="<?php echo HtmlEncode($patient_an_registration_grid->Elective->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->ElectiveS->Visible) { // ElectiveS ?>
		<td data-name="ElectiveS" <?php echo $patient_an_registration_grid->ElectiveS->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_ElectiveS" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_ElectiveS" data-value-separator="<?php echo $patient_an_registration_grid->ElectiveS->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveS"<?php echo $patient_an_registration_grid->ElectiveS->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->ElectiveS->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_ElectiveS") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ElectiveS" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveS" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveS" value="<?php echo HtmlEncode($patient_an_registration_grid->ElectiveS->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_ElectiveS" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_ElectiveS" data-value-separator="<?php echo $patient_an_registration_grid->ElectiveS->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveS"<?php echo $patient_an_registration_grid->ElectiveS->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->ElectiveS->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_ElectiveS") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_ElectiveS">
<span<?php echo $patient_an_registration_grid->ElectiveS->viewAttributes() ?>><?php echo $patient_an_registration_grid->ElectiveS->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ElectiveS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveS" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveS" value="<?php echo HtmlEncode($patient_an_registration_grid->ElectiveS->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ElectiveS" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveS" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveS" value="<?php echo HtmlEncode($patient_an_registration_grid->ElectiveS->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ElectiveS" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveS" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveS" value="<?php echo HtmlEncode($patient_an_registration_grid->ElectiveS->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ElectiveS" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveS" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveS" value="<?php echo HtmlEncode($patient_an_registration_grid->ElectiveS->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->ElectiveP->Visible) { // ElectiveP ?>
		<td data-name="ElectiveP" <?php echo $patient_an_registration_grid->ElectiveP->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_ElectiveP" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_ElectiveP" data-value-separator="<?php echo $patient_an_registration_grid->ElectiveP->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveP"<?php echo $patient_an_registration_grid->ElectiveP->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->ElectiveP->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_ElectiveP") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ElectiveP" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveP" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveP" value="<?php echo HtmlEncode($patient_an_registration_grid->ElectiveP->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_ElectiveP" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_ElectiveP" data-value-separator="<?php echo $patient_an_registration_grid->ElectiveP->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveP"<?php echo $patient_an_registration_grid->ElectiveP->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->ElectiveP->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_ElectiveP") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_ElectiveP">
<span<?php echo $patient_an_registration_grid->ElectiveP->viewAttributes() ?>><?php echo $patient_an_registration_grid->ElectiveP->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ElectiveP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveP" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveP" value="<?php echo HtmlEncode($patient_an_registration_grid->ElectiveP->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ElectiveP" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveP" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveP" value="<?php echo HtmlEncode($patient_an_registration_grid->ElectiveP->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ElectiveP" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveP" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveP" value="<?php echo HtmlEncode($patient_an_registration_grid->ElectiveP->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ElectiveP" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveP" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveP" value="<?php echo HtmlEncode($patient_an_registration_grid->ElectiveP->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Emergency->Visible) { // Emergency ?>
		<td data-name="Emergency" <?php echo $patient_an_registration_grid->Emergency->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Emergency" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_Emergency" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Emergency" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Emergency" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Emergency->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Emergency->EditValue ?>"<?php echo $patient_an_registration_grid->Emergency->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Emergency" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Emergency" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Emergency" value="<?php echo HtmlEncode($patient_an_registration_grid->Emergency->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Emergency" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_Emergency" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Emergency" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Emergency" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Emergency->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Emergency->EditValue ?>"<?php echo $patient_an_registration_grid->Emergency->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Emergency">
<span<?php echo $patient_an_registration_grid->Emergency->viewAttributes() ?>><?php echo $patient_an_registration_grid->Emergency->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Emergency" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Emergency" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Emergency" value="<?php echo HtmlEncode($patient_an_registration_grid->Emergency->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Emergency" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Emergency" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Emergency" value="<?php echo HtmlEncode($patient_an_registration_grid->Emergency->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Emergency" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Emergency" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Emergency" value="<?php echo HtmlEncode($patient_an_registration_grid->Emergency->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Emergency" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Emergency" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Emergency" value="<?php echo HtmlEncode($patient_an_registration_grid->Emergency->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->EmergencyS->Visible) { // EmergencyS ?>
		<td data-name="EmergencyS" <?php echo $patient_an_registration_grid->EmergencyS->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_EmergencyS" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_EmergencyS" data-value-separator="<?php echo $patient_an_registration_grid->EmergencyS->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyS"<?php echo $patient_an_registration_grid->EmergencyS->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->EmergencyS->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_EmergencyS") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_EmergencyS" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyS" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyS" value="<?php echo HtmlEncode($patient_an_registration_grid->EmergencyS->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_EmergencyS" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_EmergencyS" data-value-separator="<?php echo $patient_an_registration_grid->EmergencyS->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyS"<?php echo $patient_an_registration_grid->EmergencyS->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->EmergencyS->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_EmergencyS") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_EmergencyS">
<span<?php echo $patient_an_registration_grid->EmergencyS->viewAttributes() ?>><?php echo $patient_an_registration_grid->EmergencyS->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_EmergencyS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyS" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyS" value="<?php echo HtmlEncode($patient_an_registration_grid->EmergencyS->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_EmergencyS" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyS" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyS" value="<?php echo HtmlEncode($patient_an_registration_grid->EmergencyS->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_EmergencyS" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyS" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyS" value="<?php echo HtmlEncode($patient_an_registration_grid->EmergencyS->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_EmergencyS" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyS" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyS" value="<?php echo HtmlEncode($patient_an_registration_grid->EmergencyS->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->EmergencyP->Visible) { // EmergencyP ?>
		<td data-name="EmergencyP" <?php echo $patient_an_registration_grid->EmergencyP->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_EmergencyP" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_EmergencyP" data-value-separator="<?php echo $patient_an_registration_grid->EmergencyP->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyP"<?php echo $patient_an_registration_grid->EmergencyP->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->EmergencyP->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_EmergencyP") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_EmergencyP" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyP" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyP" value="<?php echo HtmlEncode($patient_an_registration_grid->EmergencyP->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_EmergencyP" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_EmergencyP" data-value-separator="<?php echo $patient_an_registration_grid->EmergencyP->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyP"<?php echo $patient_an_registration_grid->EmergencyP->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->EmergencyP->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_EmergencyP") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_EmergencyP">
<span<?php echo $patient_an_registration_grid->EmergencyP->viewAttributes() ?>><?php echo $patient_an_registration_grid->EmergencyP->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_EmergencyP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyP" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyP" value="<?php echo HtmlEncode($patient_an_registration_grid->EmergencyP->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_EmergencyP" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyP" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyP" value="<?php echo HtmlEncode($patient_an_registration_grid->EmergencyP->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_EmergencyP" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyP" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyP" value="<?php echo HtmlEncode($patient_an_registration_grid->EmergencyP->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_EmergencyP" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyP" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyP" value="<?php echo HtmlEncode($patient_an_registration_grid->EmergencyP->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Maturity->Visible) { // Maturity ?>
		<td data-name="Maturity" <?php echo $patient_an_registration_grid->Maturity->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Maturity" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_Maturity" data-value-separator="<?php echo $patient_an_registration_grid->Maturity->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Maturity" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Maturity"<?php echo $patient_an_registration_grid->Maturity->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->Maturity->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_Maturity") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Maturity" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Maturity" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Maturity" value="<?php echo HtmlEncode($patient_an_registration_grid->Maturity->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Maturity" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_Maturity" data-value-separator="<?php echo $patient_an_registration_grid->Maturity->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Maturity" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Maturity"<?php echo $patient_an_registration_grid->Maturity->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->Maturity->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_Maturity") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Maturity">
<span<?php echo $patient_an_registration_grid->Maturity->viewAttributes() ?>><?php echo $patient_an_registration_grid->Maturity->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Maturity" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Maturity" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Maturity" value="<?php echo HtmlEncode($patient_an_registration_grid->Maturity->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Maturity" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Maturity" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Maturity" value="<?php echo HtmlEncode($patient_an_registration_grid->Maturity->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Maturity" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Maturity" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Maturity" value="<?php echo HtmlEncode($patient_an_registration_grid->Maturity->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Maturity" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Maturity" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Maturity" value="<?php echo HtmlEncode($patient_an_registration_grid->Maturity->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Baby1->Visible) { // Baby1 ?>
		<td data-name="Baby1" <?php echo $patient_an_registration_grid->Baby1->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Baby1" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_Baby1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Baby1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Baby1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Baby1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Baby1->EditValue ?>"<?php echo $patient_an_registration_grid->Baby1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Baby1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Baby1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Baby1" value="<?php echo HtmlEncode($patient_an_registration_grid->Baby1->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Baby1" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_Baby1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Baby1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Baby1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Baby1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Baby1->EditValue ?>"<?php echo $patient_an_registration_grid->Baby1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Baby1">
<span<?php echo $patient_an_registration_grid->Baby1->viewAttributes() ?>><?php echo $patient_an_registration_grid->Baby1->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Baby1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Baby1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Baby1" value="<?php echo HtmlEncode($patient_an_registration_grid->Baby1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Baby1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Baby1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Baby1" value="<?php echo HtmlEncode($patient_an_registration_grid->Baby1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Baby1" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Baby1" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Baby1" value="<?php echo HtmlEncode($patient_an_registration_grid->Baby1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Baby1" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Baby1" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Baby1" value="<?php echo HtmlEncode($patient_an_registration_grid->Baby1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Baby2->Visible) { // Baby2 ?>
		<td data-name="Baby2" <?php echo $patient_an_registration_grid->Baby2->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Baby2" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_Baby2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Baby2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Baby2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Baby2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Baby2->EditValue ?>"<?php echo $patient_an_registration_grid->Baby2->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Baby2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Baby2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Baby2" value="<?php echo HtmlEncode($patient_an_registration_grid->Baby2->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Baby2" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_Baby2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Baby2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Baby2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Baby2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Baby2->EditValue ?>"<?php echo $patient_an_registration_grid->Baby2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Baby2">
<span<?php echo $patient_an_registration_grid->Baby2->viewAttributes() ?>><?php echo $patient_an_registration_grid->Baby2->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Baby2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Baby2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Baby2" value="<?php echo HtmlEncode($patient_an_registration_grid->Baby2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Baby2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Baby2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Baby2" value="<?php echo HtmlEncode($patient_an_registration_grid->Baby2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Baby2" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Baby2" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Baby2" value="<?php echo HtmlEncode($patient_an_registration_grid->Baby2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Baby2" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Baby2" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Baby2" value="<?php echo HtmlEncode($patient_an_registration_grid->Baby2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->sex1->Visible) { // sex1 ?>
		<td data-name="sex1" <?php echo $patient_an_registration_grid->sex1->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_sex1" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_sex1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_sex1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_sex1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->sex1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->sex1->EditValue ?>"<?php echo $patient_an_registration_grid->sex1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_sex1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_sex1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_sex1" value="<?php echo HtmlEncode($patient_an_registration_grid->sex1->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_sex1" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_sex1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_sex1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_sex1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->sex1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->sex1->EditValue ?>"<?php echo $patient_an_registration_grid->sex1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_sex1">
<span<?php echo $patient_an_registration_grid->sex1->viewAttributes() ?>><?php echo $patient_an_registration_grid->sex1->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_sex1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_sex1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_sex1" value="<?php echo HtmlEncode($patient_an_registration_grid->sex1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_sex1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_sex1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_sex1" value="<?php echo HtmlEncode($patient_an_registration_grid->sex1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_sex1" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_sex1" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_sex1" value="<?php echo HtmlEncode($patient_an_registration_grid->sex1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_sex1" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_sex1" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_sex1" value="<?php echo HtmlEncode($patient_an_registration_grid->sex1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->sex2->Visible) { // sex2 ?>
		<td data-name="sex2" <?php echo $patient_an_registration_grid->sex2->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_sex2" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_sex2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_sex2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_sex2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->sex2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->sex2->EditValue ?>"<?php echo $patient_an_registration_grid->sex2->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_sex2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_sex2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_sex2" value="<?php echo HtmlEncode($patient_an_registration_grid->sex2->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_sex2" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_sex2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_sex2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_sex2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->sex2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->sex2->EditValue ?>"<?php echo $patient_an_registration_grid->sex2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_sex2">
<span<?php echo $patient_an_registration_grid->sex2->viewAttributes() ?>><?php echo $patient_an_registration_grid->sex2->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_sex2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_sex2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_sex2" value="<?php echo HtmlEncode($patient_an_registration_grid->sex2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_sex2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_sex2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_sex2" value="<?php echo HtmlEncode($patient_an_registration_grid->sex2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_sex2" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_sex2" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_sex2" value="<?php echo HtmlEncode($patient_an_registration_grid->sex2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_sex2" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_sex2" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_sex2" value="<?php echo HtmlEncode($patient_an_registration_grid->sex2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->weight1->Visible) { // weight1 ?>
		<td data-name="weight1" <?php echo $patient_an_registration_grid->weight1->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_weight1" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_weight1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_weight1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_weight1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->weight1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->weight1->EditValue ?>"<?php echo $patient_an_registration_grid->weight1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_weight1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_weight1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_weight1" value="<?php echo HtmlEncode($patient_an_registration_grid->weight1->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_weight1" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_weight1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_weight1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_weight1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->weight1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->weight1->EditValue ?>"<?php echo $patient_an_registration_grid->weight1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_weight1">
<span<?php echo $patient_an_registration_grid->weight1->viewAttributes() ?>><?php echo $patient_an_registration_grid->weight1->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_weight1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_weight1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_weight1" value="<?php echo HtmlEncode($patient_an_registration_grid->weight1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_weight1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_weight1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_weight1" value="<?php echo HtmlEncode($patient_an_registration_grid->weight1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_weight1" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_weight1" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_weight1" value="<?php echo HtmlEncode($patient_an_registration_grid->weight1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_weight1" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_weight1" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_weight1" value="<?php echo HtmlEncode($patient_an_registration_grid->weight1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->weight2->Visible) { // weight2 ?>
		<td data-name="weight2" <?php echo $patient_an_registration_grid->weight2->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_weight2" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_weight2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_weight2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_weight2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->weight2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->weight2->EditValue ?>"<?php echo $patient_an_registration_grid->weight2->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_weight2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_weight2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_weight2" value="<?php echo HtmlEncode($patient_an_registration_grid->weight2->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_weight2" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_weight2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_weight2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_weight2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->weight2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->weight2->EditValue ?>"<?php echo $patient_an_registration_grid->weight2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_weight2">
<span<?php echo $patient_an_registration_grid->weight2->viewAttributes() ?>><?php echo $patient_an_registration_grid->weight2->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_weight2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_weight2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_weight2" value="<?php echo HtmlEncode($patient_an_registration_grid->weight2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_weight2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_weight2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_weight2" value="<?php echo HtmlEncode($patient_an_registration_grid->weight2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_weight2" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_weight2" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_weight2" value="<?php echo HtmlEncode($patient_an_registration_grid->weight2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_weight2" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_weight2" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_weight2" value="<?php echo HtmlEncode($patient_an_registration_grid->weight2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->NICU1->Visible) { // NICU1 ?>
		<td data-name="NICU1" <?php echo $patient_an_registration_grid->NICU1->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_NICU1" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_NICU1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NICU1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NICU1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->NICU1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->NICU1->EditValue ?>"<?php echo $patient_an_registration_grid->NICU1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_NICU1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_NICU1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_NICU1" value="<?php echo HtmlEncode($patient_an_registration_grid->NICU1->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_NICU1" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_NICU1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NICU1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NICU1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->NICU1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->NICU1->EditValue ?>"<?php echo $patient_an_registration_grid->NICU1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_NICU1">
<span<?php echo $patient_an_registration_grid->NICU1->viewAttributes() ?>><?php echo $patient_an_registration_grid->NICU1->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NICU1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NICU1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NICU1" value="<?php echo HtmlEncode($patient_an_registration_grid->NICU1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_NICU1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_NICU1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_NICU1" value="<?php echo HtmlEncode($patient_an_registration_grid->NICU1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NICU1" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_NICU1" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_NICU1" value="<?php echo HtmlEncode($patient_an_registration_grid->NICU1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_NICU1" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_NICU1" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_NICU1" value="<?php echo HtmlEncode($patient_an_registration_grid->NICU1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->NICU2->Visible) { // NICU2 ?>
		<td data-name="NICU2" <?php echo $patient_an_registration_grid->NICU2->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_NICU2" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_NICU2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NICU2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NICU2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->NICU2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->NICU2->EditValue ?>"<?php echo $patient_an_registration_grid->NICU2->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_NICU2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_NICU2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_NICU2" value="<?php echo HtmlEncode($patient_an_registration_grid->NICU2->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_NICU2" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_NICU2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NICU2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NICU2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->NICU2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->NICU2->EditValue ?>"<?php echo $patient_an_registration_grid->NICU2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_NICU2">
<span<?php echo $patient_an_registration_grid->NICU2->viewAttributes() ?>><?php echo $patient_an_registration_grid->NICU2->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NICU2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NICU2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NICU2" value="<?php echo HtmlEncode($patient_an_registration_grid->NICU2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_NICU2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_NICU2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_NICU2" value="<?php echo HtmlEncode($patient_an_registration_grid->NICU2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NICU2" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_NICU2" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_NICU2" value="<?php echo HtmlEncode($patient_an_registration_grid->NICU2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_NICU2" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_NICU2" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_NICU2" value="<?php echo HtmlEncode($patient_an_registration_grid->NICU2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Jaundice1->Visible) { // Jaundice1 ?>
		<td data-name="Jaundice1" <?php echo $patient_an_registration_grid->Jaundice1->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Jaundice1" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_Jaundice1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Jaundice1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Jaundice1->EditValue ?>"<?php echo $patient_an_registration_grid->Jaundice1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Jaundice1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice1" value="<?php echo HtmlEncode($patient_an_registration_grid->Jaundice1->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Jaundice1" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_Jaundice1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Jaundice1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Jaundice1->EditValue ?>"<?php echo $patient_an_registration_grid->Jaundice1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Jaundice1">
<span<?php echo $patient_an_registration_grid->Jaundice1->viewAttributes() ?>><?php echo $patient_an_registration_grid->Jaundice1->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Jaundice1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice1" value="<?php echo HtmlEncode($patient_an_registration_grid->Jaundice1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Jaundice1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice1" value="<?php echo HtmlEncode($patient_an_registration_grid->Jaundice1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Jaundice1" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice1" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice1" value="<?php echo HtmlEncode($patient_an_registration_grid->Jaundice1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Jaundice1" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice1" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice1" value="<?php echo HtmlEncode($patient_an_registration_grid->Jaundice1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Jaundice2->Visible) { // Jaundice2 ?>
		<td data-name="Jaundice2" <?php echo $patient_an_registration_grid->Jaundice2->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Jaundice2" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_Jaundice2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Jaundice2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Jaundice2->EditValue ?>"<?php echo $patient_an_registration_grid->Jaundice2->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Jaundice2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice2" value="<?php echo HtmlEncode($patient_an_registration_grid->Jaundice2->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Jaundice2" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_Jaundice2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Jaundice2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Jaundice2->EditValue ?>"<?php echo $patient_an_registration_grid->Jaundice2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Jaundice2">
<span<?php echo $patient_an_registration_grid->Jaundice2->viewAttributes() ?>><?php echo $patient_an_registration_grid->Jaundice2->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Jaundice2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice2" value="<?php echo HtmlEncode($patient_an_registration_grid->Jaundice2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Jaundice2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice2" value="<?php echo HtmlEncode($patient_an_registration_grid->Jaundice2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Jaundice2" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice2" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice2" value="<?php echo HtmlEncode($patient_an_registration_grid->Jaundice2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Jaundice2" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice2" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice2" value="<?php echo HtmlEncode($patient_an_registration_grid->Jaundice2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Others1->Visible) { // Others1 ?>
		<td data-name="Others1" <?php echo $patient_an_registration_grid->Others1->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Others1" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_Others1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Others1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Others1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Others1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Others1->EditValue ?>"<?php echo $patient_an_registration_grid->Others1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Others1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Others1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Others1" value="<?php echo HtmlEncode($patient_an_registration_grid->Others1->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Others1" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_Others1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Others1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Others1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Others1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Others1->EditValue ?>"<?php echo $patient_an_registration_grid->Others1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Others1">
<span<?php echo $patient_an_registration_grid->Others1->viewAttributes() ?>><?php echo $patient_an_registration_grid->Others1->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Others1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Others1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Others1" value="<?php echo HtmlEncode($patient_an_registration_grid->Others1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Others1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Others1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Others1" value="<?php echo HtmlEncode($patient_an_registration_grid->Others1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Others1" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Others1" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Others1" value="<?php echo HtmlEncode($patient_an_registration_grid->Others1->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Others1" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Others1" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Others1" value="<?php echo HtmlEncode($patient_an_registration_grid->Others1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Others2->Visible) { // Others2 ?>
		<td data-name="Others2" <?php echo $patient_an_registration_grid->Others2->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Others2" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_Others2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Others2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Others2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Others2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Others2->EditValue ?>"<?php echo $patient_an_registration_grid->Others2->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Others2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Others2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Others2" value="<?php echo HtmlEncode($patient_an_registration_grid->Others2->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Others2" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_Others2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Others2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Others2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Others2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Others2->EditValue ?>"<?php echo $patient_an_registration_grid->Others2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_Others2">
<span<?php echo $patient_an_registration_grid->Others2->viewAttributes() ?>><?php echo $patient_an_registration_grid->Others2->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Others2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Others2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Others2" value="<?php echo HtmlEncode($patient_an_registration_grid->Others2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Others2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Others2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Others2" value="<?php echo HtmlEncode($patient_an_registration_grid->Others2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Others2" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Others2" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_Others2" value="<?php echo HtmlEncode($patient_an_registration_grid->Others2->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_Others2" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Others2" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_Others2" value="<?php echo HtmlEncode($patient_an_registration_grid->Others2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->SpillOverReasons->Visible) { // SpillOverReasons ?>
		<td data-name="SpillOverReasons" <?php echo $patient_an_registration_grid->SpillOverReasons->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_SpillOverReasons" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_SpillOverReasons" data-value-separator="<?php echo $patient_an_registration_grid->SpillOverReasons->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_SpillOverReasons" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_SpillOverReasons"<?php echo $patient_an_registration_grid->SpillOverReasons->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->SpillOverReasons->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_SpillOverReasons") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_SpillOverReasons" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_SpillOverReasons" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_SpillOverReasons" value="<?php echo HtmlEncode($patient_an_registration_grid->SpillOverReasons->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_SpillOverReasons" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_SpillOverReasons" data-value-separator="<?php echo $patient_an_registration_grid->SpillOverReasons->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_SpillOverReasons" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_SpillOverReasons"<?php echo $patient_an_registration_grid->SpillOverReasons->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->SpillOverReasons->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_SpillOverReasons") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_SpillOverReasons">
<span<?php echo $patient_an_registration_grid->SpillOverReasons->viewAttributes() ?>><?php echo $patient_an_registration_grid->SpillOverReasons->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_SpillOverReasons" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_SpillOverReasons" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_SpillOverReasons" value="<?php echo HtmlEncode($patient_an_registration_grid->SpillOverReasons->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_SpillOverReasons" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_SpillOverReasons" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_SpillOverReasons" value="<?php echo HtmlEncode($patient_an_registration_grid->SpillOverReasons->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_SpillOverReasons" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_SpillOverReasons" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_SpillOverReasons" value="<?php echo HtmlEncode($patient_an_registration_grid->SpillOverReasons->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_SpillOverReasons" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_SpillOverReasons" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_SpillOverReasons" value="<?php echo HtmlEncode($patient_an_registration_grid->SpillOverReasons->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->ANClosed->Visible) { // ANClosed ?>
		<td data-name="ANClosed" <?php echo $patient_an_registration_grid->ANClosed->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_ANClosed" class="form-group">
<div id="tp_x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="patient_an_registration" data-field="x_ANClosed" data-value-separator="<?php echo $patient_an_registration_grid->ANClosed->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed[]" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed[]" value="{value}"<?php echo $patient_an_registration_grid->ANClosed->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_an_registration_grid->ANClosed->checkBoxListHtml(FALSE, "x{$patient_an_registration_grid->RowIndex}_ANClosed[]") ?>
</div></div>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANClosed" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed[]" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed[]" value="<?php echo HtmlEncode($patient_an_registration_grid->ANClosed->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_ANClosed" class="form-group">
<div id="tp_x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="patient_an_registration" data-field="x_ANClosed" data-value-separator="<?php echo $patient_an_registration_grid->ANClosed->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed[]" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed[]" value="{value}"<?php echo $patient_an_registration_grid->ANClosed->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_an_registration_grid->ANClosed->checkBoxListHtml(FALSE, "x{$patient_an_registration_grid->RowIndex}_ANClosed[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_ANClosed">
<span<?php echo $patient_an_registration_grid->ANClosed->viewAttributes() ?>><?php echo $patient_an_registration_grid->ANClosed->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANClosed" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed" value="<?php echo HtmlEncode($patient_an_registration_grid->ANClosed->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ANClosed" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed[]" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed[]" value="<?php echo HtmlEncode($patient_an_registration_grid->ANClosed->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANClosed" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed" value="<?php echo HtmlEncode($patient_an_registration_grid->ANClosed->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ANClosed" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed[]" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed[]" value="<?php echo HtmlEncode($patient_an_registration_grid->ANClosed->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->ANClosedDATE->Visible) { // ANClosedDATE ?>
		<td data-name="ANClosedDATE" <?php echo $patient_an_registration_grid->ANClosedDATE->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_ANClosedDATE" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_ANClosedDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosedDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosedDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->ANClosedDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->ANClosedDATE->EditValue ?>"<?php echo $patient_an_registration_grid->ANClosedDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->ANClosedDATE->ReadOnly && !$patient_an_registration_grid->ANClosedDATE->Disabled && !isset($patient_an_registration_grid->ANClosedDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->ANClosedDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosedDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANClosedDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosedDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosedDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->ANClosedDATE->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_ANClosedDATE" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_ANClosedDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosedDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosedDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->ANClosedDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->ANClosedDATE->EditValue ?>"<?php echo $patient_an_registration_grid->ANClosedDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->ANClosedDATE->ReadOnly && !$patient_an_registration_grid->ANClosedDATE->Disabled && !isset($patient_an_registration_grid->ANClosedDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->ANClosedDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosedDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_ANClosedDATE">
<span<?php echo $patient_an_registration_grid->ANClosedDATE->viewAttributes() ?>><?php echo $patient_an_registration_grid->ANClosedDATE->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANClosedDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosedDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosedDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->ANClosedDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ANClosedDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosedDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosedDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->ANClosedDATE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANClosedDATE" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosedDATE" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosedDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->ANClosedDATE->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ANClosedDATE" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosedDATE" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosedDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->ANClosedDATE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->PastMedicalHistoryOthers->Visible) { // PastMedicalHistoryOthers ?>
		<td data-name="PastMedicalHistoryOthers" <?php echo $patient_an_registration_grid->PastMedicalHistoryOthers->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_PastMedicalHistoryOthers" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_PastMedicalHistoryOthers" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistoryOthers" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistoryOthers" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->PastMedicalHistoryOthers->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->PastMedicalHistoryOthers->EditValue ?>"<?php echo $patient_an_registration_grid->PastMedicalHistoryOthers->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastMedicalHistoryOthers" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistoryOthers" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistoryOthers" value="<?php echo HtmlEncode($patient_an_registration_grid->PastMedicalHistoryOthers->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_PastMedicalHistoryOthers" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_PastMedicalHistoryOthers" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistoryOthers" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistoryOthers" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->PastMedicalHistoryOthers->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->PastMedicalHistoryOthers->EditValue ?>"<?php echo $patient_an_registration_grid->PastMedicalHistoryOthers->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_PastMedicalHistoryOthers">
<span<?php echo $patient_an_registration_grid->PastMedicalHistoryOthers->viewAttributes() ?>><?php echo $patient_an_registration_grid->PastMedicalHistoryOthers->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastMedicalHistoryOthers" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistoryOthers" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistoryOthers" value="<?php echo HtmlEncode($patient_an_registration_grid->PastMedicalHistoryOthers->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PastMedicalHistoryOthers" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistoryOthers" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistoryOthers" value="<?php echo HtmlEncode($patient_an_registration_grid->PastMedicalHistoryOthers->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastMedicalHistoryOthers" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistoryOthers" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistoryOthers" value="<?php echo HtmlEncode($patient_an_registration_grid->PastMedicalHistoryOthers->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PastMedicalHistoryOthers" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistoryOthers" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistoryOthers" value="<?php echo HtmlEncode($patient_an_registration_grid->PastMedicalHistoryOthers->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->PastSurgicalHistoryOthers->Visible) { // PastSurgicalHistoryOthers ?>
		<td data-name="PastSurgicalHistoryOthers" <?php echo $patient_an_registration_grid->PastSurgicalHistoryOthers->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_PastSurgicalHistoryOthers" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_PastSurgicalHistoryOthers" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistoryOthers" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistoryOthers" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->PastSurgicalHistoryOthers->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->PastSurgicalHistoryOthers->EditValue ?>"<?php echo $patient_an_registration_grid->PastSurgicalHistoryOthers->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastSurgicalHistoryOthers" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistoryOthers" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistoryOthers" value="<?php echo HtmlEncode($patient_an_registration_grid->PastSurgicalHistoryOthers->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_PastSurgicalHistoryOthers" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_PastSurgicalHistoryOthers" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistoryOthers" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistoryOthers" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->PastSurgicalHistoryOthers->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->PastSurgicalHistoryOthers->EditValue ?>"<?php echo $patient_an_registration_grid->PastSurgicalHistoryOthers->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_PastSurgicalHistoryOthers">
<span<?php echo $patient_an_registration_grid->PastSurgicalHistoryOthers->viewAttributes() ?>><?php echo $patient_an_registration_grid->PastSurgicalHistoryOthers->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastSurgicalHistoryOthers" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistoryOthers" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistoryOthers" value="<?php echo HtmlEncode($patient_an_registration_grid->PastSurgicalHistoryOthers->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PastSurgicalHistoryOthers" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistoryOthers" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistoryOthers" value="<?php echo HtmlEncode($patient_an_registration_grid->PastSurgicalHistoryOthers->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastSurgicalHistoryOthers" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistoryOthers" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistoryOthers" value="<?php echo HtmlEncode($patient_an_registration_grid->PastSurgicalHistoryOthers->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PastSurgicalHistoryOthers" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistoryOthers" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistoryOthers" value="<?php echo HtmlEncode($patient_an_registration_grid->PastSurgicalHistoryOthers->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->FamilyHistoryOthers->Visible) { // FamilyHistoryOthers ?>
		<td data-name="FamilyHistoryOthers" <?php echo $patient_an_registration_grid->FamilyHistoryOthers->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_FamilyHistoryOthers" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_FamilyHistoryOthers" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistoryOthers" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistoryOthers" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->FamilyHistoryOthers->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->FamilyHistoryOthers->EditValue ?>"<?php echo $patient_an_registration_grid->FamilyHistoryOthers->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_FamilyHistoryOthers" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistoryOthers" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistoryOthers" value="<?php echo HtmlEncode($patient_an_registration_grid->FamilyHistoryOthers->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_FamilyHistoryOthers" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_FamilyHistoryOthers" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistoryOthers" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistoryOthers" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->FamilyHistoryOthers->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->FamilyHistoryOthers->EditValue ?>"<?php echo $patient_an_registration_grid->FamilyHistoryOthers->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_FamilyHistoryOthers">
<span<?php echo $patient_an_registration_grid->FamilyHistoryOthers->viewAttributes() ?>><?php echo $patient_an_registration_grid->FamilyHistoryOthers->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_FamilyHistoryOthers" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistoryOthers" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistoryOthers" value="<?php echo HtmlEncode($patient_an_registration_grid->FamilyHistoryOthers->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_FamilyHistoryOthers" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistoryOthers" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistoryOthers" value="<?php echo HtmlEncode($patient_an_registration_grid->FamilyHistoryOthers->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_FamilyHistoryOthers" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistoryOthers" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistoryOthers" value="<?php echo HtmlEncode($patient_an_registration_grid->FamilyHistoryOthers->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_FamilyHistoryOthers" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistoryOthers" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistoryOthers" value="<?php echo HtmlEncode($patient_an_registration_grid->FamilyHistoryOthers->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->PresentPregnancyComplicationsOthers->Visible) { // PresentPregnancyComplicationsOthers ?>
		<td data-name="PresentPregnancyComplicationsOthers" <?php echo $patient_an_registration_grid->PresentPregnancyComplicationsOthers->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_PresentPregnancyComplicationsOthers" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_PresentPregnancyComplicationsOthers" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PresentPregnancyComplicationsOthers" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PresentPregnancyComplicationsOthers" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->PresentPregnancyComplicationsOthers->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->PresentPregnancyComplicationsOthers->EditValue ?>"<?php echo $patient_an_registration_grid->PresentPregnancyComplicationsOthers->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PresentPregnancyComplicationsOthers" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PresentPregnancyComplicationsOthers" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PresentPregnancyComplicationsOthers" value="<?php echo HtmlEncode($patient_an_registration_grid->PresentPregnancyComplicationsOthers->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_PresentPregnancyComplicationsOthers" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_PresentPregnancyComplicationsOthers" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PresentPregnancyComplicationsOthers" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PresentPregnancyComplicationsOthers" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->PresentPregnancyComplicationsOthers->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->PresentPregnancyComplicationsOthers->EditValue ?>"<?php echo $patient_an_registration_grid->PresentPregnancyComplicationsOthers->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_PresentPregnancyComplicationsOthers">
<span<?php echo $patient_an_registration_grid->PresentPregnancyComplicationsOthers->viewAttributes() ?>><?php echo $patient_an_registration_grid->PresentPregnancyComplicationsOthers->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PresentPregnancyComplicationsOthers" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PresentPregnancyComplicationsOthers" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PresentPregnancyComplicationsOthers" value="<?php echo HtmlEncode($patient_an_registration_grid->PresentPregnancyComplicationsOthers->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PresentPregnancyComplicationsOthers" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PresentPregnancyComplicationsOthers" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PresentPregnancyComplicationsOthers" value="<?php echo HtmlEncode($patient_an_registration_grid->PresentPregnancyComplicationsOthers->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PresentPregnancyComplicationsOthers" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_PresentPregnancyComplicationsOthers" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_PresentPregnancyComplicationsOthers" value="<?php echo HtmlEncode($patient_an_registration_grid->PresentPregnancyComplicationsOthers->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_PresentPregnancyComplicationsOthers" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_PresentPregnancyComplicationsOthers" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_PresentPregnancyComplicationsOthers" value="<?php echo HtmlEncode($patient_an_registration_grid->PresentPregnancyComplicationsOthers->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->ETdate->Visible) { // ETdate ?>
		<td data-name="ETdate" <?php echo $patient_an_registration_grid->ETdate->cellAttributes() ?>>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_ETdate" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_ETdate" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ETdate" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ETdate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->ETdate->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->ETdate->EditValue ?>"<?php echo $patient_an_registration_grid->ETdate->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->ETdate->ReadOnly && !$patient_an_registration_grid->ETdate->Disabled && !isset($patient_an_registration_grid->ETdate->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->ETdate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_ETdate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ETdate" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ETdate" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ETdate" value="<?php echo HtmlEncode($patient_an_registration_grid->ETdate->OldValue) ?>">
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_ETdate" class="form-group">
<input type="text" data-table="patient_an_registration" data-field="x_ETdate" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ETdate" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ETdate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->ETdate->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->ETdate->EditValue ?>"<?php echo $patient_an_registration_grid->ETdate->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->ETdate->ReadOnly && !$patient_an_registration_grid->ETdate->Disabled && !isset($patient_an_registration_grid->ETdate->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->ETdate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_ETdate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_an_registration->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_an_registration_grid->RowCount ?>_patient_an_registration_ETdate">
<span<?php echo $patient_an_registration_grid->ETdate->viewAttributes() ?>><?php echo $patient_an_registration_grid->ETdate->getViewValue() ?></span>
</span>
<?php if (!$patient_an_registration->isConfirm()) { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ETdate" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ETdate" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ETdate" value="<?php echo HtmlEncode($patient_an_registration_grid->ETdate->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ETdate" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ETdate" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ETdate" value="<?php echo HtmlEncode($patient_an_registration_grid->ETdate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ETdate" name="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ETdate" id="fpatient_an_registrationgrid$x<?php echo $patient_an_registration_grid->RowIndex ?>_ETdate" value="<?php echo HtmlEncode($patient_an_registration_grid->ETdate->FormValue) ?>">
<input type="hidden" data-table="patient_an_registration" data-field="x_ETdate" name="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ETdate" id="fpatient_an_registrationgrid$o<?php echo $patient_an_registration_grid->RowIndex ?>_ETdate" value="<?php echo HtmlEncode($patient_an_registration_grid->ETdate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_an_registration_grid->ListOptions->render("body", "right", $patient_an_registration_grid->RowCount);
?>
	</tr>
<?php if ($patient_an_registration->RowType == ROWTYPE_ADD || $patient_an_registration->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "load"], function() {
	fpatient_an_registrationgrid.updateLists(<?php echo $patient_an_registration_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$patient_an_registration_grid->isGridAdd() || $patient_an_registration->CurrentMode == "copy")
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
		$patient_an_registration->RowAttrs->merge(["data-rowindex" => $patient_an_registration_grid->RowIndex, "id" => "r0_patient_an_registration", "data-rowtype" => ROWTYPE_ADD]);
		$patient_an_registration->RowAttrs->appendClass("ew-template");
		$patient_an_registration->RowType = ROWTYPE_ADD;

		// Render row
		$patient_an_registration_grid->renderRow();

		// Render list options
		$patient_an_registration_grid->renderListOptions();
		$patient_an_registration_grid->StartRowCount = 0;
?>
	<tr <?php echo $patient_an_registration->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_an_registration_grid->ListOptions->render("body", "left", $patient_an_registration_grid->RowIndex);
?>
	<?php if ($patient_an_registration_grid->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_id" class="form-group patient_an_registration_id"></span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_id" class="form-group patient_an_registration_id">
<span<?php echo $patient_an_registration_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_id" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_id" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_an_registration_grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_id" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_id" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_an_registration_grid->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->pid->Visible) { // pid ?>
		<td data-name="pid">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<?php if ($patient_an_registration_grid->pid->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_an_registration_pid" class="form-group patient_an_registration_pid">
<span<?php echo $patient_an_registration_grid->pid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->pid->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_pid" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_pid" value="<?php echo HtmlEncode($patient_an_registration_grid->pid->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_pid" class="form-group patient_an_registration_pid">
<input type="text" data-table="patient_an_registration" data-field="x_pid" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_pid" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_pid" size="30" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->pid->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->pid->EditValue ?>"<?php echo $patient_an_registration_grid->pid->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_pid" class="form-group patient_an_registration_pid">
<span<?php echo $patient_an_registration_grid->pid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->pid->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_pid" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_pid" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_pid" value="<?php echo HtmlEncode($patient_an_registration_grid->pid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_pid" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_pid" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_pid" value="<?php echo HtmlEncode($patient_an_registration_grid->pid->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->fid->Visible) { // fid ?>
		<td data-name="fid">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<?php if ($patient_an_registration_grid->fid->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_an_registration_fid" class="form-group patient_an_registration_fid">
<span<?php echo $patient_an_registration_grid->fid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->fid->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_fid" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_fid" value="<?php echo HtmlEncode($patient_an_registration_grid->fid->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_fid" class="form-group patient_an_registration_fid">
<input type="text" data-table="patient_an_registration" data-field="x_fid" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_fid" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_fid" size="30" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->fid->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->fid->EditValue ?>"<?php echo $patient_an_registration_grid->fid->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_fid" class="form-group patient_an_registration_fid">
<span<?php echo $patient_an_registration_grid->fid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->fid->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_fid" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_fid" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_fid" value="<?php echo HtmlEncode($patient_an_registration_grid->fid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_fid" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_fid" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_fid" value="<?php echo HtmlEncode($patient_an_registration_grid->fid->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->G->Visible) { // G ?>
		<td data-name="G">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_G" class="form-group patient_an_registration_G">
<input type="text" data-table="patient_an_registration" data-field="x_G" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_G" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_G" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->G->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->G->EditValue ?>"<?php echo $patient_an_registration_grid->G->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_G" class="form-group patient_an_registration_G">
<span<?php echo $patient_an_registration_grid->G->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->G->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_G" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_G" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_G" value="<?php echo HtmlEncode($patient_an_registration_grid->G->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_G" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_G" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_G" value="<?php echo HtmlEncode($patient_an_registration_grid->G->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->P->Visible) { // P ?>
		<td data-name="P">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_P" class="form-group patient_an_registration_P">
<input type="text" data-table="patient_an_registration" data-field="x_P" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_P" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_P" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->P->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->P->EditValue ?>"<?php echo $patient_an_registration_grid->P->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_P" class="form-group patient_an_registration_P">
<span<?php echo $patient_an_registration_grid->P->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->P->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_P" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_P" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_P" value="<?php echo HtmlEncode($patient_an_registration_grid->P->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_P" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_P" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_P" value="<?php echo HtmlEncode($patient_an_registration_grid->P->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->L->Visible) { // L ?>
		<td data-name="L">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_L" class="form-group patient_an_registration_L">
<input type="text" data-table="patient_an_registration" data-field="x_L" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_L" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_L" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->L->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->L->EditValue ?>"<?php echo $patient_an_registration_grid->L->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_L" class="form-group patient_an_registration_L">
<span<?php echo $patient_an_registration_grid->L->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->L->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_L" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_L" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_L" value="<?php echo HtmlEncode($patient_an_registration_grid->L->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_L" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_L" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_L" value="<?php echo HtmlEncode($patient_an_registration_grid->L->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->A->Visible) { // A ?>
		<td data-name="A">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_A" class="form-group patient_an_registration_A">
<input type="text" data-table="patient_an_registration" data-field="x_A" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->A->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->A->EditValue ?>"<?php echo $patient_an_registration_grid->A->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_A" class="form-group patient_an_registration_A">
<span<?php echo $patient_an_registration_grid->A->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->A->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A" value="<?php echo HtmlEncode($patient_an_registration_grid->A->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A" value="<?php echo HtmlEncode($patient_an_registration_grid->A->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->E->Visible) { // E ?>
		<td data-name="E">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_E" class="form-group patient_an_registration_E">
<input type="text" data-table="patient_an_registration" data-field="x_E" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_E" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_E" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->E->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->E->EditValue ?>"<?php echo $patient_an_registration_grid->E->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_E" class="form-group patient_an_registration_E">
<span<?php echo $patient_an_registration_grid->E->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->E->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_E" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_E" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_E" value="<?php echo HtmlEncode($patient_an_registration_grid->E->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_E" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_E" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_E" value="<?php echo HtmlEncode($patient_an_registration_grid->E->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->M->Visible) { // M ?>
		<td data-name="M">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_M" class="form-group patient_an_registration_M">
<input type="text" data-table="patient_an_registration" data-field="x_M" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_M" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_M" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->M->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->M->EditValue ?>"<?php echo $patient_an_registration_grid->M->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_M" class="form-group patient_an_registration_M">
<span<?php echo $patient_an_registration_grid->M->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->M->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_M" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_M" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_M" value="<?php echo HtmlEncode($patient_an_registration_grid->M->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_M" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_M" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_M" value="<?php echo HtmlEncode($patient_an_registration_grid->M->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->LMP->Visible) { // LMP ?>
		<td data-name="LMP">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_LMP" class="form-group patient_an_registration_LMP">
<input type="text" data-table="patient_an_registration" data-field="x_LMP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_LMP" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_LMP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->LMP->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->LMP->EditValue ?>"<?php echo $patient_an_registration_grid->LMP->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->LMP->ReadOnly && !$patient_an_registration_grid->LMP->Disabled && !isset($patient_an_registration_grid->LMP->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->LMP->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_LMP", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_LMP" class="form-group patient_an_registration_LMP">
<span<?php echo $patient_an_registration_grid->LMP->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->LMP->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_LMP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_LMP" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_LMP" value="<?php echo HtmlEncode($patient_an_registration_grid->LMP->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_LMP" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_LMP" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_LMP" value="<?php echo HtmlEncode($patient_an_registration_grid->LMP->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->EDO->Visible) { // EDO ?>
		<td data-name="EDO">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_EDO" class="form-group patient_an_registration_EDO">
<input type="text" data-table="patient_an_registration" data-field="x_EDO" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EDO" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EDO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->EDO->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->EDO->EditValue ?>"<?php echo $patient_an_registration_grid->EDO->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->EDO->ReadOnly && !$patient_an_registration_grid->EDO->Disabled && !isset($patient_an_registration_grid->EDO->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->EDO->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_EDO", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_EDO" class="form-group patient_an_registration_EDO">
<span<?php echo $patient_an_registration_grid->EDO->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->EDO->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_EDO" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EDO" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EDO" value="<?php echo HtmlEncode($patient_an_registration_grid->EDO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_EDO" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_EDO" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_EDO" value="<?php echo HtmlEncode($patient_an_registration_grid->EDO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->MenstrualHistory->Visible) { // MenstrualHistory ?>
		<td data-name="MenstrualHistory">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_MenstrualHistory" class="form-group patient_an_registration_MenstrualHistory">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_MenstrualHistory" data-value-separator="<?php echo $patient_an_registration_grid->MenstrualHistory->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_MenstrualHistory" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_MenstrualHistory"<?php echo $patient_an_registration_grid->MenstrualHistory->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->MenstrualHistory->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_MenstrualHistory") ?>
		</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_MenstrualHistory" class="form-group patient_an_registration_MenstrualHistory">
<span<?php echo $patient_an_registration_grid->MenstrualHistory->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->MenstrualHistory->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_MenstrualHistory" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_MenstrualHistory" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_MenstrualHistory" value="<?php echo HtmlEncode($patient_an_registration_grid->MenstrualHistory->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_MenstrualHistory" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_MenstrualHistory" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_MenstrualHistory" value="<?php echo HtmlEncode($patient_an_registration_grid->MenstrualHistory->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->MaritalHistory->Visible) { // MaritalHistory ?>
		<td data-name="MaritalHistory">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_MaritalHistory" class="form-group patient_an_registration_MaritalHistory">
<input type="text" data-table="patient_an_registration" data-field="x_MaritalHistory" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_MaritalHistory" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_MaritalHistory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->MaritalHistory->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->MaritalHistory->EditValue ?>"<?php echo $patient_an_registration_grid->MaritalHistory->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_MaritalHistory" class="form-group patient_an_registration_MaritalHistory">
<span<?php echo $patient_an_registration_grid->MaritalHistory->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->MaritalHistory->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_MaritalHistory" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_MaritalHistory" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_MaritalHistory" value="<?php echo HtmlEncode($patient_an_registration_grid->MaritalHistory->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_MaritalHistory" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_MaritalHistory" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_MaritalHistory" value="<?php echo HtmlEncode($patient_an_registration_grid->MaritalHistory->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->ObstetricHistory->Visible) { // ObstetricHistory ?>
		<td data-name="ObstetricHistory">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_ObstetricHistory" class="form-group patient_an_registration_ObstetricHistory">
<input type="text" data-table="patient_an_registration" data-field="x_ObstetricHistory" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ObstetricHistory" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ObstetricHistory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->ObstetricHistory->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->ObstetricHistory->EditValue ?>"<?php echo $patient_an_registration_grid->ObstetricHistory->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_ObstetricHistory" class="form-group patient_an_registration_ObstetricHistory">
<span<?php echo $patient_an_registration_grid->ObstetricHistory->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->ObstetricHistory->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ObstetricHistory" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ObstetricHistory" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ObstetricHistory" value="<?php echo HtmlEncode($patient_an_registration_grid->ObstetricHistory->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ObstetricHistory" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ObstetricHistory" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ObstetricHistory" value="<?php echo HtmlEncode($patient_an_registration_grid->ObstetricHistory->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->PreviousHistoryofGDM->Visible) { // PreviousHistoryofGDM ?>
		<td data-name="PreviousHistoryofGDM">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_PreviousHistoryofGDM" class="form-group patient_an_registration_PreviousHistoryofGDM">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_PreviousHistoryofGDM" data-value-separator="<?php echo $patient_an_registration_grid->PreviousHistoryofGDM->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofGDM" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofGDM"<?php echo $patient_an_registration_grid->PreviousHistoryofGDM->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->PreviousHistoryofGDM->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_PreviousHistoryofGDM") ?>
		</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_PreviousHistoryofGDM" class="form-group patient_an_registration_PreviousHistoryofGDM">
<span<?php echo $patient_an_registration_grid->PreviousHistoryofGDM->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->PreviousHistoryofGDM->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofGDM" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofGDM" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofGDM" value="<?php echo HtmlEncode($patient_an_registration_grid->PreviousHistoryofGDM->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofGDM" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofGDM" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofGDM" value="<?php echo HtmlEncode($patient_an_registration_grid->PreviousHistoryofGDM->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->PreviousHistorofPIH->Visible) { // PreviousHistorofPIH ?>
		<td data-name="PreviousHistorofPIH">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_PreviousHistorofPIH" class="form-group patient_an_registration_PreviousHistorofPIH">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_PreviousHistorofPIH" data-value-separator="<?php echo $patient_an_registration_grid->PreviousHistorofPIH->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistorofPIH" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistorofPIH"<?php echo $patient_an_registration_grid->PreviousHistorofPIH->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->PreviousHistorofPIH->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_PreviousHistorofPIH") ?>
		</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_PreviousHistorofPIH" class="form-group patient_an_registration_PreviousHistorofPIH">
<span<?php echo $patient_an_registration_grid->PreviousHistorofPIH->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->PreviousHistorofPIH->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistorofPIH" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistorofPIH" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistorofPIH" value="<?php echo HtmlEncode($patient_an_registration_grid->PreviousHistorofPIH->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistorofPIH" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistorofPIH" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistorofPIH" value="<?php echo HtmlEncode($patient_an_registration_grid->PreviousHistorofPIH->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->PreviousHistoryofIUGR->Visible) { // PreviousHistoryofIUGR ?>
		<td data-name="PreviousHistoryofIUGR">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_PreviousHistoryofIUGR" class="form-group patient_an_registration_PreviousHistoryofIUGR">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_PreviousHistoryofIUGR" data-value-separator="<?php echo $patient_an_registration_grid->PreviousHistoryofIUGR->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofIUGR" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofIUGR"<?php echo $patient_an_registration_grid->PreviousHistoryofIUGR->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->PreviousHistoryofIUGR->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_PreviousHistoryofIUGR") ?>
		</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_PreviousHistoryofIUGR" class="form-group patient_an_registration_PreviousHistoryofIUGR">
<span<?php echo $patient_an_registration_grid->PreviousHistoryofIUGR->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->PreviousHistoryofIUGR->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofIUGR" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofIUGR" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofIUGR" value="<?php echo HtmlEncode($patient_an_registration_grid->PreviousHistoryofIUGR->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofIUGR" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofIUGR" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofIUGR" value="<?php echo HtmlEncode($patient_an_registration_grid->PreviousHistoryofIUGR->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->PreviousHistoryofOligohydramnios->Visible) { // PreviousHistoryofOligohydramnios ?>
		<td data-name="PreviousHistoryofOligohydramnios">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_PreviousHistoryofOligohydramnios" class="form-group patient_an_registration_PreviousHistoryofOligohydramnios">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_PreviousHistoryofOligohydramnios" data-value-separator="<?php echo $patient_an_registration_grid->PreviousHistoryofOligohydramnios->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofOligohydramnios" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofOligohydramnios"<?php echo $patient_an_registration_grid->PreviousHistoryofOligohydramnios->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->PreviousHistoryofOligohydramnios->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_PreviousHistoryofOligohydramnios") ?>
		</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_PreviousHistoryofOligohydramnios" class="form-group patient_an_registration_PreviousHistoryofOligohydramnios">
<span<?php echo $patient_an_registration_grid->PreviousHistoryofOligohydramnios->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->PreviousHistoryofOligohydramnios->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofOligohydramnios" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofOligohydramnios" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofOligohydramnios" value="<?php echo HtmlEncode($patient_an_registration_grid->PreviousHistoryofOligohydramnios->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofOligohydramnios" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofOligohydramnios" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofOligohydramnios" value="<?php echo HtmlEncode($patient_an_registration_grid->PreviousHistoryofOligohydramnios->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->PreviousHistoryofPreterm->Visible) { // PreviousHistoryofPreterm ?>
		<td data-name="PreviousHistoryofPreterm">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_PreviousHistoryofPreterm" class="form-group patient_an_registration_PreviousHistoryofPreterm">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_PreviousHistoryofPreterm" data-value-separator="<?php echo $patient_an_registration_grid->PreviousHistoryofPreterm->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofPreterm" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofPreterm"<?php echo $patient_an_registration_grid->PreviousHistoryofPreterm->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->PreviousHistoryofPreterm->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_PreviousHistoryofPreterm") ?>
		</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_PreviousHistoryofPreterm" class="form-group patient_an_registration_PreviousHistoryofPreterm">
<span<?php echo $patient_an_registration_grid->PreviousHistoryofPreterm->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->PreviousHistoryofPreterm->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofPreterm" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofPreterm" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofPreterm" value="<?php echo HtmlEncode($patient_an_registration_grid->PreviousHistoryofPreterm->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PreviousHistoryofPreterm" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofPreterm" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PreviousHistoryofPreterm" value="<?php echo HtmlEncode($patient_an_registration_grid->PreviousHistoryofPreterm->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->G1->Visible) { // G1 ?>
		<td data-name="G1">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_G1" class="form-group patient_an_registration_G1">
<input type="text" data-table="patient_an_registration" data-field="x_G1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_G1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_G1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->G1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->G1->EditValue ?>"<?php echo $patient_an_registration_grid->G1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_G1" class="form-group patient_an_registration_G1">
<span<?php echo $patient_an_registration_grid->G1->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->G1->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_G1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_G1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_G1" value="<?php echo HtmlEncode($patient_an_registration_grid->G1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_G1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_G1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_G1" value="<?php echo HtmlEncode($patient_an_registration_grid->G1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->G2->Visible) { // G2 ?>
		<td data-name="G2">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_G2" class="form-group patient_an_registration_G2">
<input type="text" data-table="patient_an_registration" data-field="x_G2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_G2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_G2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->G2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->G2->EditValue ?>"<?php echo $patient_an_registration_grid->G2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_G2" class="form-group patient_an_registration_G2">
<span<?php echo $patient_an_registration_grid->G2->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->G2->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_G2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_G2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_G2" value="<?php echo HtmlEncode($patient_an_registration_grid->G2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_G2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_G2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_G2" value="<?php echo HtmlEncode($patient_an_registration_grid->G2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->G3->Visible) { // G3 ?>
		<td data-name="G3">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_G3" class="form-group patient_an_registration_G3">
<input type="text" data-table="patient_an_registration" data-field="x_G3" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_G3" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_G3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->G3->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->G3->EditValue ?>"<?php echo $patient_an_registration_grid->G3->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_G3" class="form-group patient_an_registration_G3">
<span<?php echo $patient_an_registration_grid->G3->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->G3->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_G3" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_G3" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_G3" value="<?php echo HtmlEncode($patient_an_registration_grid->G3->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_G3" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_G3" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_G3" value="<?php echo HtmlEncode($patient_an_registration_grid->G3->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->DeliveryNDLSCS1->Visible) { // DeliveryNDLSCS1 ?>
		<td data-name="DeliveryNDLSCS1">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_DeliveryNDLSCS1" class="form-group patient_an_registration_DeliveryNDLSCS1">
<input type="text" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->DeliveryNDLSCS1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->DeliveryNDLSCS1->EditValue ?>"<?php echo $patient_an_registration_grid->DeliveryNDLSCS1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_DeliveryNDLSCS1" class="form-group patient_an_registration_DeliveryNDLSCS1">
<span<?php echo $patient_an_registration_grid->DeliveryNDLSCS1->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->DeliveryNDLSCS1->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS1" value="<?php echo HtmlEncode($patient_an_registration_grid->DeliveryNDLSCS1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS1" value="<?php echo HtmlEncode($patient_an_registration_grid->DeliveryNDLSCS1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->DeliveryNDLSCS2->Visible) { // DeliveryNDLSCS2 ?>
		<td data-name="DeliveryNDLSCS2">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_DeliveryNDLSCS2" class="form-group patient_an_registration_DeliveryNDLSCS2">
<input type="text" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->DeliveryNDLSCS2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->DeliveryNDLSCS2->EditValue ?>"<?php echo $patient_an_registration_grid->DeliveryNDLSCS2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_DeliveryNDLSCS2" class="form-group patient_an_registration_DeliveryNDLSCS2">
<span<?php echo $patient_an_registration_grid->DeliveryNDLSCS2->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->DeliveryNDLSCS2->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS2" value="<?php echo HtmlEncode($patient_an_registration_grid->DeliveryNDLSCS2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS2" value="<?php echo HtmlEncode($patient_an_registration_grid->DeliveryNDLSCS2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->DeliveryNDLSCS3->Visible) { // DeliveryNDLSCS3 ?>
		<td data-name="DeliveryNDLSCS3">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_DeliveryNDLSCS3" class="form-group patient_an_registration_DeliveryNDLSCS3">
<input type="text" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS3" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS3" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->DeliveryNDLSCS3->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->DeliveryNDLSCS3->EditValue ?>"<?php echo $patient_an_registration_grid->DeliveryNDLSCS3->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_DeliveryNDLSCS3" class="form-group patient_an_registration_DeliveryNDLSCS3">
<span<?php echo $patient_an_registration_grid->DeliveryNDLSCS3->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->DeliveryNDLSCS3->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS3" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS3" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS3" value="<?php echo HtmlEncode($patient_an_registration_grid->DeliveryNDLSCS3->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS3" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS3" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DeliveryNDLSCS3" value="<?php echo HtmlEncode($patient_an_registration_grid->DeliveryNDLSCS3->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->BabySexweight1->Visible) { // BabySexweight1 ?>
		<td data-name="BabySexweight1">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_BabySexweight1" class="form-group patient_an_registration_BabySexweight1">
<input type="text" data-table="patient_an_registration" data-field="x_BabySexweight1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->BabySexweight1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->BabySexweight1->EditValue ?>"<?php echo $patient_an_registration_grid->BabySexweight1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_BabySexweight1" class="form-group patient_an_registration_BabySexweight1">
<span<?php echo $patient_an_registration_grid->BabySexweight1->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->BabySexweight1->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight1" value="<?php echo HtmlEncode($patient_an_registration_grid->BabySexweight1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight1" value="<?php echo HtmlEncode($patient_an_registration_grid->BabySexweight1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->BabySexweight2->Visible) { // BabySexweight2 ?>
		<td data-name="BabySexweight2">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_BabySexweight2" class="form-group patient_an_registration_BabySexweight2">
<input type="text" data-table="patient_an_registration" data-field="x_BabySexweight2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->BabySexweight2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->BabySexweight2->EditValue ?>"<?php echo $patient_an_registration_grid->BabySexweight2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_BabySexweight2" class="form-group patient_an_registration_BabySexweight2">
<span<?php echo $patient_an_registration_grid->BabySexweight2->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->BabySexweight2->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight2" value="<?php echo HtmlEncode($patient_an_registration_grid->BabySexweight2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight2" value="<?php echo HtmlEncode($patient_an_registration_grid->BabySexweight2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->BabySexweight3->Visible) { // BabySexweight3 ?>
		<td data-name="BabySexweight3">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_BabySexweight3" class="form-group patient_an_registration_BabySexweight3">
<input type="text" data-table="patient_an_registration" data-field="x_BabySexweight3" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight3" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->BabySexweight3->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->BabySexweight3->EditValue ?>"<?php echo $patient_an_registration_grid->BabySexweight3->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_BabySexweight3" class="form-group patient_an_registration_BabySexweight3">
<span<?php echo $patient_an_registration_grid->BabySexweight3->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->BabySexweight3->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight3" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight3" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight3" value="<?php echo HtmlEncode($patient_an_registration_grid->BabySexweight3->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_BabySexweight3" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight3" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_BabySexweight3" value="<?php echo HtmlEncode($patient_an_registration_grid->BabySexweight3->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->PastMedicalHistory->Visible) { // PastMedicalHistory ?>
		<td data-name="PastMedicalHistory">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_PastMedicalHistory" class="form-group patient_an_registration_PastMedicalHistory">
<div id="tp_x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="patient_an_registration" data-field="x_PastMedicalHistory" data-value-separator="<?php echo $patient_an_registration_grid->PastMedicalHistory->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory[]" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory[]" value="{value}"<?php echo $patient_an_registration_grid->PastMedicalHistory->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_an_registration_grid->PastMedicalHistory->checkBoxListHtml(FALSE, "x{$patient_an_registration_grid->RowIndex}_PastMedicalHistory[]") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_PastMedicalHistory" class="form-group patient_an_registration_PastMedicalHistory">
<span<?php echo $patient_an_registration_grid->PastMedicalHistory->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->PastMedicalHistory->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastMedicalHistory" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory" value="<?php echo HtmlEncode($patient_an_registration_grid->PastMedicalHistory->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastMedicalHistory" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory[]" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistory[]" value="<?php echo HtmlEncode($patient_an_registration_grid->PastMedicalHistory->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->PastSurgicalHistory->Visible) { // PastSurgicalHistory ?>
		<td data-name="PastSurgicalHistory">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_PastSurgicalHistory" class="form-group patient_an_registration_PastSurgicalHistory">
<div id="tp_x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="patient_an_registration" data-field="x_PastSurgicalHistory" data-value-separator="<?php echo $patient_an_registration_grid->PastSurgicalHistory->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory[]" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory[]" value="{value}"<?php echo $patient_an_registration_grid->PastSurgicalHistory->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_an_registration_grid->PastSurgicalHistory->checkBoxListHtml(FALSE, "x{$patient_an_registration_grid->RowIndex}_PastSurgicalHistory[]") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_PastSurgicalHistory" class="form-group patient_an_registration_PastSurgicalHistory">
<span<?php echo $patient_an_registration_grid->PastSurgicalHistory->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->PastSurgicalHistory->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastSurgicalHistory" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory" value="<?php echo HtmlEncode($patient_an_registration_grid->PastSurgicalHistory->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastSurgicalHistory" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory[]" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistory[]" value="<?php echo HtmlEncode($patient_an_registration_grid->PastSurgicalHistory->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->FamilyHistory->Visible) { // FamilyHistory ?>
		<td data-name="FamilyHistory">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_FamilyHistory" class="form-group patient_an_registration_FamilyHistory">
<div id="tp_x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="patient_an_registration" data-field="x_FamilyHistory" data-value-separator="<?php echo $patient_an_registration_grid->FamilyHistory->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory[]" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory[]" value="{value}"<?php echo $patient_an_registration_grid->FamilyHistory->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_an_registration_grid->FamilyHistory->checkBoxListHtml(FALSE, "x{$patient_an_registration_grid->RowIndex}_FamilyHistory[]") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_FamilyHistory" class="form-group patient_an_registration_FamilyHistory">
<span<?php echo $patient_an_registration_grid->FamilyHistory->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->FamilyHistory->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_FamilyHistory" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory" value="<?php echo HtmlEncode($patient_an_registration_grid->FamilyHistory->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_FamilyHistory" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory[]" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistory[]" value="<?php echo HtmlEncode($patient_an_registration_grid->FamilyHistory->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Viability->Visible) { // Viability ?>
		<td data-name="Viability">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Viability" class="form-group patient_an_registration_Viability">
<input type="text" data-table="patient_an_registration" data-field="x_Viability" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Viability->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Viability->EditValue ?>"<?php echo $patient_an_registration_grid->Viability->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Viability" class="form-group patient_an_registration_Viability">
<span<?php echo $patient_an_registration_grid->Viability->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->Viability->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability" value="<?php echo HtmlEncode($patient_an_registration_grid->Viability->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability" value="<?php echo HtmlEncode($patient_an_registration_grid->Viability->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->ViabilityDATE->Visible) { // ViabilityDATE ?>
		<td data-name="ViabilityDATE">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_ViabilityDATE" class="form-group patient_an_registration_ViabilityDATE">
<input type="text" data-table="patient_an_registration" data-field="x_ViabilityDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->ViabilityDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->ViabilityDATE->EditValue ?>"<?php echo $patient_an_registration_grid->ViabilityDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->ViabilityDATE->ReadOnly && !$patient_an_registration_grid->ViabilityDATE->Disabled && !isset($patient_an_registration_grid->ViabilityDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->ViabilityDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_ViabilityDATE" class="form-group patient_an_registration_ViabilityDATE">
<span<?php echo $patient_an_registration_grid->ViabilityDATE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->ViabilityDATE->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ViabilityDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->ViabilityDATE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ViabilityDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->ViabilityDATE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->ViabilityREPORT->Visible) { // ViabilityREPORT ?>
		<td data-name="ViabilityREPORT">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_ViabilityREPORT" class="form-group patient_an_registration_ViabilityREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_ViabilityREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->ViabilityREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->ViabilityREPORT->EditValue ?>"<?php echo $patient_an_registration_grid->ViabilityREPORT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_ViabilityREPORT" class="form-group patient_an_registration_ViabilityREPORT">
<span<?php echo $patient_an_registration_grid->ViabilityREPORT->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->ViabilityREPORT->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ViabilityREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->ViabilityREPORT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ViabilityREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ViabilityREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->ViabilityREPORT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Viability2->Visible) { // Viability2 ?>
		<td data-name="Viability2">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Viability2" class="form-group patient_an_registration_Viability2">
<input type="text" data-table="patient_an_registration" data-field="x_Viability2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Viability2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Viability2->EditValue ?>"<?php echo $patient_an_registration_grid->Viability2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Viability2" class="form-group patient_an_registration_Viability2">
<span<?php echo $patient_an_registration_grid->Viability2->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->Viability2->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2" value="<?php echo HtmlEncode($patient_an_registration_grid->Viability2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2" value="<?php echo HtmlEncode($patient_an_registration_grid->Viability2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Viability2DATE->Visible) { // Viability2DATE ?>
		<td data-name="Viability2DATE">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Viability2DATE" class="form-group patient_an_registration_Viability2DATE">
<input type="text" data-table="patient_an_registration" data-field="x_Viability2DATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2DATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2DATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Viability2DATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Viability2DATE->EditValue ?>"<?php echo $patient_an_registration_grid->Viability2DATE->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->Viability2DATE->ReadOnly && !$patient_an_registration_grid->Viability2DATE->Disabled && !isset($patient_an_registration_grid->Viability2DATE->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->Viability2DATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2DATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Viability2DATE" class="form-group patient_an_registration_Viability2DATE">
<span<?php echo $patient_an_registration_grid->Viability2DATE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->Viability2DATE->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2DATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2DATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2DATE" value="<?php echo HtmlEncode($patient_an_registration_grid->Viability2DATE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2DATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2DATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2DATE" value="<?php echo HtmlEncode($patient_an_registration_grid->Viability2DATE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Viability2REPORT->Visible) { // Viability2REPORT ?>
		<td data-name="Viability2REPORT">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Viability2REPORT" class="form-group patient_an_registration_Viability2REPORT">
<input type="text" data-table="patient_an_registration" data-field="x_Viability2REPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2REPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2REPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Viability2REPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Viability2REPORT->EditValue ?>"<?php echo $patient_an_registration_grid->Viability2REPORT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Viability2REPORT" class="form-group patient_an_registration_Viability2REPORT">
<span<?php echo $patient_an_registration_grid->Viability2REPORT->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->Viability2REPORT->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2REPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2REPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2REPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->Viability2REPORT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Viability2REPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2REPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Viability2REPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->Viability2REPORT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->NTscan->Visible) { // NTscan ?>
		<td data-name="NTscan">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_NTscan" class="form-group patient_an_registration_NTscan">
<input type="text" data-table="patient_an_registration" data-field="x_NTscan" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscan" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscan" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->NTscan->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->NTscan->EditValue ?>"<?php echo $patient_an_registration_grid->NTscan->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_NTscan" class="form-group patient_an_registration_NTscan">
<span<?php echo $patient_an_registration_grid->NTscan->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->NTscan->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscan" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscan" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscan" value="<?php echo HtmlEncode($patient_an_registration_grid->NTscan->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscan" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_NTscan" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_NTscan" value="<?php echo HtmlEncode($patient_an_registration_grid->NTscan->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->NTscanDATE->Visible) { // NTscanDATE ?>
		<td data-name="NTscanDATE">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_NTscanDATE" class="form-group patient_an_registration_NTscanDATE">
<input type="text" data-table="patient_an_registration" data-field="x_NTscanDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->NTscanDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->NTscanDATE->EditValue ?>"<?php echo $patient_an_registration_grid->NTscanDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->NTscanDATE->ReadOnly && !$patient_an_registration_grid->NTscanDATE->Disabled && !isset($patient_an_registration_grid->NTscanDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->NTscanDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_NTscanDATE" class="form-group patient_an_registration_NTscanDATE">
<span<?php echo $patient_an_registration_grid->NTscanDATE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->NTscanDATE->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscanDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->NTscanDATE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscanDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->NTscanDATE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->NTscanREPORT->Visible) { // NTscanREPORT ?>
		<td data-name="NTscanREPORT">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_NTscanREPORT" class="form-group patient_an_registration_NTscanREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_NTscanREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->NTscanREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->NTscanREPORT->EditValue ?>"<?php echo $patient_an_registration_grid->NTscanREPORT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_NTscanREPORT" class="form-group patient_an_registration_NTscanREPORT">
<span<?php echo $patient_an_registration_grid->NTscanREPORT->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->NTscanREPORT->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscanREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->NTscanREPORT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NTscanREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_NTscanREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->NTscanREPORT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->EarlyTarget->Visible) { // EarlyTarget ?>
		<td data-name="EarlyTarget">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_EarlyTarget" class="form-group patient_an_registration_EarlyTarget">
<input type="text" data-table="patient_an_registration" data-field="x_EarlyTarget" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTarget" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTarget" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->EarlyTarget->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->EarlyTarget->EditValue ?>"<?php echo $patient_an_registration_grid->EarlyTarget->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_EarlyTarget" class="form-group patient_an_registration_EarlyTarget">
<span<?php echo $patient_an_registration_grid->EarlyTarget->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->EarlyTarget->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTarget" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTarget" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTarget" value="<?php echo HtmlEncode($patient_an_registration_grid->EarlyTarget->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTarget" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTarget" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTarget" value="<?php echo HtmlEncode($patient_an_registration_grid->EarlyTarget->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->EarlyTargetDATE->Visible) { // EarlyTargetDATE ?>
		<td data-name="EarlyTargetDATE">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_EarlyTargetDATE" class="form-group patient_an_registration_EarlyTargetDATE">
<input type="text" data-table="patient_an_registration" data-field="x_EarlyTargetDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->EarlyTargetDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->EarlyTargetDATE->EditValue ?>"<?php echo $patient_an_registration_grid->EarlyTargetDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->EarlyTargetDATE->ReadOnly && !$patient_an_registration_grid->EarlyTargetDATE->Disabled && !isset($patient_an_registration_grid->EarlyTargetDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->EarlyTargetDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_EarlyTargetDATE" class="form-group patient_an_registration_EarlyTargetDATE">
<span<?php echo $patient_an_registration_grid->EarlyTargetDATE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->EarlyTargetDATE->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTargetDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->EarlyTargetDATE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTargetDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->EarlyTargetDATE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->EarlyTargetREPORT->Visible) { // EarlyTargetREPORT ?>
		<td data-name="EarlyTargetREPORT">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_EarlyTargetREPORT" class="form-group patient_an_registration_EarlyTargetREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_EarlyTargetREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->EarlyTargetREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->EarlyTargetREPORT->EditValue ?>"<?php echo $patient_an_registration_grid->EarlyTargetREPORT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_EarlyTargetREPORT" class="form-group patient_an_registration_EarlyTargetREPORT">
<span<?php echo $patient_an_registration_grid->EarlyTargetREPORT->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->EarlyTargetREPORT->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTargetREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->EarlyTargetREPORT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_EarlyTargetREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_EarlyTargetREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->EarlyTargetREPORT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Anomaly->Visible) { // Anomaly ?>
		<td data-name="Anomaly">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Anomaly" class="form-group patient_an_registration_Anomaly">
<input type="text" data-table="patient_an_registration" data-field="x_Anomaly" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Anomaly" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Anomaly" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Anomaly->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Anomaly->EditValue ?>"<?php echo $patient_an_registration_grid->Anomaly->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Anomaly" class="form-group patient_an_registration_Anomaly">
<span<?php echo $patient_an_registration_grid->Anomaly->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->Anomaly->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Anomaly" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Anomaly" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Anomaly" value="<?php echo HtmlEncode($patient_an_registration_grid->Anomaly->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Anomaly" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Anomaly" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Anomaly" value="<?php echo HtmlEncode($patient_an_registration_grid->Anomaly->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->AnomalyDATE->Visible) { // AnomalyDATE ?>
		<td data-name="AnomalyDATE">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_AnomalyDATE" class="form-group patient_an_registration_AnomalyDATE">
<input type="text" data-table="patient_an_registration" data-field="x_AnomalyDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->AnomalyDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->AnomalyDATE->EditValue ?>"<?php echo $patient_an_registration_grid->AnomalyDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->AnomalyDATE->ReadOnly && !$patient_an_registration_grid->AnomalyDATE->Disabled && !isset($patient_an_registration_grid->AnomalyDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->AnomalyDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_AnomalyDATE" class="form-group patient_an_registration_AnomalyDATE">
<span<?php echo $patient_an_registration_grid->AnomalyDATE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->AnomalyDATE->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_AnomalyDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->AnomalyDATE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_AnomalyDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->AnomalyDATE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->AnomalyREPORT->Visible) { // AnomalyREPORT ?>
		<td data-name="AnomalyREPORT">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_AnomalyREPORT" class="form-group patient_an_registration_AnomalyREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_AnomalyREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->AnomalyREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->AnomalyREPORT->EditValue ?>"<?php echo $patient_an_registration_grid->AnomalyREPORT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_AnomalyREPORT" class="form-group patient_an_registration_AnomalyREPORT">
<span<?php echo $patient_an_registration_grid->AnomalyREPORT->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->AnomalyREPORT->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_AnomalyREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->AnomalyREPORT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_AnomalyREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_AnomalyREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->AnomalyREPORT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Growth->Visible) { // Growth ?>
		<td data-name="Growth">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Growth" class="form-group patient_an_registration_Growth">
<input type="text" data-table="patient_an_registration" data-field="x_Growth" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Growth->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Growth->EditValue ?>"<?php echo $patient_an_registration_grid->Growth->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Growth" class="form-group patient_an_registration_Growth">
<span<?php echo $patient_an_registration_grid->Growth->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->Growth->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth" value="<?php echo HtmlEncode($patient_an_registration_grid->Growth->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth" value="<?php echo HtmlEncode($patient_an_registration_grid->Growth->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->GrowthDATE->Visible) { // GrowthDATE ?>
		<td data-name="GrowthDATE">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_GrowthDATE" class="form-group patient_an_registration_GrowthDATE">
<input type="text" data-table="patient_an_registration" data-field="x_GrowthDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->GrowthDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->GrowthDATE->EditValue ?>"<?php echo $patient_an_registration_grid->GrowthDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->GrowthDATE->ReadOnly && !$patient_an_registration_grid->GrowthDATE->Disabled && !isset($patient_an_registration_grid->GrowthDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->GrowthDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_GrowthDATE" class="form-group patient_an_registration_GrowthDATE">
<span<?php echo $patient_an_registration_grid->GrowthDATE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->GrowthDATE->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_GrowthDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->GrowthDATE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_GrowthDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->GrowthDATE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->GrowthREPORT->Visible) { // GrowthREPORT ?>
		<td data-name="GrowthREPORT">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_GrowthREPORT" class="form-group patient_an_registration_GrowthREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_GrowthREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->GrowthREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->GrowthREPORT->EditValue ?>"<?php echo $patient_an_registration_grid->GrowthREPORT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_GrowthREPORT" class="form-group patient_an_registration_GrowthREPORT">
<span<?php echo $patient_an_registration_grid->GrowthREPORT->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->GrowthREPORT->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_GrowthREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->GrowthREPORT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_GrowthREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_GrowthREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->GrowthREPORT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Growth1->Visible) { // Growth1 ?>
		<td data-name="Growth1">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Growth1" class="form-group patient_an_registration_Growth1">
<input type="text" data-table="patient_an_registration" data-field="x_Growth1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Growth1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Growth1->EditValue ?>"<?php echo $patient_an_registration_grid->Growth1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Growth1" class="form-group patient_an_registration_Growth1">
<span<?php echo $patient_an_registration_grid->Growth1->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->Growth1->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1" value="<?php echo HtmlEncode($patient_an_registration_grid->Growth1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1" value="<?php echo HtmlEncode($patient_an_registration_grid->Growth1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Growth1DATE->Visible) { // Growth1DATE ?>
		<td data-name="Growth1DATE">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Growth1DATE" class="form-group patient_an_registration_Growth1DATE">
<input type="text" data-table="patient_an_registration" data-field="x_Growth1DATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1DATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1DATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Growth1DATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Growth1DATE->EditValue ?>"<?php echo $patient_an_registration_grid->Growth1DATE->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->Growth1DATE->ReadOnly && !$patient_an_registration_grid->Growth1DATE->Disabled && !isset($patient_an_registration_grid->Growth1DATE->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->Growth1DATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1DATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Growth1DATE" class="form-group patient_an_registration_Growth1DATE">
<span<?php echo $patient_an_registration_grid->Growth1DATE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->Growth1DATE->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1DATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1DATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1DATE" value="<?php echo HtmlEncode($patient_an_registration_grid->Growth1DATE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1DATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1DATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1DATE" value="<?php echo HtmlEncode($patient_an_registration_grid->Growth1DATE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Growth1REPORT->Visible) { // Growth1REPORT ?>
		<td data-name="Growth1REPORT">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Growth1REPORT" class="form-group patient_an_registration_Growth1REPORT">
<input type="text" data-table="patient_an_registration" data-field="x_Growth1REPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1REPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1REPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Growth1REPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Growth1REPORT->EditValue ?>"<?php echo $patient_an_registration_grid->Growth1REPORT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Growth1REPORT" class="form-group patient_an_registration_Growth1REPORT">
<span<?php echo $patient_an_registration_grid->Growth1REPORT->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->Growth1REPORT->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1REPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1REPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1REPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->Growth1REPORT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Growth1REPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1REPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Growth1REPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->Growth1REPORT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->ANProfile->Visible) { // ANProfile ?>
		<td data-name="ANProfile">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_ANProfile" class="form-group patient_an_registration_ANProfile">
<input type="text" data-table="patient_an_registration" data-field="x_ANProfile" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfile" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->ANProfile->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->ANProfile->EditValue ?>"<?php echo $patient_an_registration_grid->ANProfile->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_ANProfile" class="form-group patient_an_registration_ANProfile">
<span<?php echo $patient_an_registration_grid->ANProfile->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->ANProfile->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfile" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfile" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfile" value="<?php echo HtmlEncode($patient_an_registration_grid->ANProfile->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfile" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfile" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfile" value="<?php echo HtmlEncode($patient_an_registration_grid->ANProfile->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->ANProfileDATE->Visible) { // ANProfileDATE ?>
		<td data-name="ANProfileDATE">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_ANProfileDATE" class="form-group patient_an_registration_ANProfileDATE">
<input type="text" data-table="patient_an_registration" data-field="x_ANProfileDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->ANProfileDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->ANProfileDATE->EditValue ?>"<?php echo $patient_an_registration_grid->ANProfileDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->ANProfileDATE->ReadOnly && !$patient_an_registration_grid->ANProfileDATE->Disabled && !isset($patient_an_registration_grid->ANProfileDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->ANProfileDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_ANProfileDATE" class="form-group patient_an_registration_ANProfileDATE">
<span<?php echo $patient_an_registration_grid->ANProfileDATE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->ANProfileDATE->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->ANProfileDATE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->ANProfileDATE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->ANProfileINHOUSE->Visible) { // ANProfileINHOUSE ?>
		<td data-name="ANProfileINHOUSE">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_ANProfileINHOUSE" class="form-group patient_an_registration_ANProfileINHOUSE">
<input type="text" data-table="patient_an_registration" data-field="x_ANProfileINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->ANProfileINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->ANProfileINHOUSE->EditValue ?>"<?php echo $patient_an_registration_grid->ANProfileINHOUSE->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_ANProfileINHOUSE" class="form-group patient_an_registration_ANProfileINHOUSE">
<span<?php echo $patient_an_registration_grid->ANProfileINHOUSE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->ANProfileINHOUSE->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->ANProfileINHOUSE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileINHOUSE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileINHOUSE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->ANProfileINHOUSE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->ANProfileREPORT->Visible) { // ANProfileREPORT ?>
		<td data-name="ANProfileREPORT">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_ANProfileREPORT" class="form-group patient_an_registration_ANProfileREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_ANProfileREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->ANProfileREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->ANProfileREPORT->EditValue ?>"<?php echo $patient_an_registration_grid->ANProfileREPORT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_ANProfileREPORT" class="form-group patient_an_registration_ANProfileREPORT">
<span<?php echo $patient_an_registration_grid->ANProfileREPORT->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->ANProfileREPORT->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->ANProfileREPORT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANProfileREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANProfileREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->ANProfileREPORT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->DualMarker->Visible) { // DualMarker ?>
		<td data-name="DualMarker">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_DualMarker" class="form-group patient_an_registration_DualMarker">
<input type="text" data-table="patient_an_registration" data-field="x_DualMarker" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarker" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarker" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->DualMarker->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->DualMarker->EditValue ?>"<?php echo $patient_an_registration_grid->DualMarker->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_DualMarker" class="form-group patient_an_registration_DualMarker">
<span<?php echo $patient_an_registration_grid->DualMarker->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->DualMarker->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarker" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarker" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarker" value="<?php echo HtmlEncode($patient_an_registration_grid->DualMarker->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarker" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarker" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarker" value="<?php echo HtmlEncode($patient_an_registration_grid->DualMarker->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->DualMarkerDATE->Visible) { // DualMarkerDATE ?>
		<td data-name="DualMarkerDATE">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_DualMarkerDATE" class="form-group patient_an_registration_DualMarkerDATE">
<input type="text" data-table="patient_an_registration" data-field="x_DualMarkerDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->DualMarkerDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->DualMarkerDATE->EditValue ?>"<?php echo $patient_an_registration_grid->DualMarkerDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->DualMarkerDATE->ReadOnly && !$patient_an_registration_grid->DualMarkerDATE->Disabled && !isset($patient_an_registration_grid->DualMarkerDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->DualMarkerDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_DualMarkerDATE" class="form-group patient_an_registration_DualMarkerDATE">
<span<?php echo $patient_an_registration_grid->DualMarkerDATE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->DualMarkerDATE->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->DualMarkerDATE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->DualMarkerDATE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->DualMarkerINHOUSE->Visible) { // DualMarkerINHOUSE ?>
		<td data-name="DualMarkerINHOUSE">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_DualMarkerINHOUSE" class="form-group patient_an_registration_DualMarkerINHOUSE">
<input type="text" data-table="patient_an_registration" data-field="x_DualMarkerINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->DualMarkerINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->DualMarkerINHOUSE->EditValue ?>"<?php echo $patient_an_registration_grid->DualMarkerINHOUSE->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_DualMarkerINHOUSE" class="form-group patient_an_registration_DualMarkerINHOUSE">
<span<?php echo $patient_an_registration_grid->DualMarkerINHOUSE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->DualMarkerINHOUSE->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->DualMarkerINHOUSE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerINHOUSE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerINHOUSE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->DualMarkerINHOUSE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->DualMarkerREPORT->Visible) { // DualMarkerREPORT ?>
		<td data-name="DualMarkerREPORT">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_DualMarkerREPORT" class="form-group patient_an_registration_DualMarkerREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_DualMarkerREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->DualMarkerREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->DualMarkerREPORT->EditValue ?>"<?php echo $patient_an_registration_grid->DualMarkerREPORT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_DualMarkerREPORT" class="form-group patient_an_registration_DualMarkerREPORT">
<span<?php echo $patient_an_registration_grid->DualMarkerREPORT->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->DualMarkerREPORT->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->DualMarkerREPORT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DualMarkerREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DualMarkerREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->DualMarkerREPORT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Quadruple->Visible) { // Quadruple ?>
		<td data-name="Quadruple">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Quadruple" class="form-group patient_an_registration_Quadruple">
<input type="text" data-table="patient_an_registration" data-field="x_Quadruple" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Quadruple" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Quadruple" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Quadruple->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Quadruple->EditValue ?>"<?php echo $patient_an_registration_grid->Quadruple->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Quadruple" class="form-group patient_an_registration_Quadruple">
<span<?php echo $patient_an_registration_grid->Quadruple->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->Quadruple->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Quadruple" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Quadruple" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Quadruple" value="<?php echo HtmlEncode($patient_an_registration_grid->Quadruple->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Quadruple" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Quadruple" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Quadruple" value="<?php echo HtmlEncode($patient_an_registration_grid->Quadruple->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->QuadrupleDATE->Visible) { // QuadrupleDATE ?>
		<td data-name="QuadrupleDATE">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_QuadrupleDATE" class="form-group patient_an_registration_QuadrupleDATE">
<input type="text" data-table="patient_an_registration" data-field="x_QuadrupleDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->QuadrupleDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->QuadrupleDATE->EditValue ?>"<?php echo $patient_an_registration_grid->QuadrupleDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->QuadrupleDATE->ReadOnly && !$patient_an_registration_grid->QuadrupleDATE->Disabled && !isset($patient_an_registration_grid->QuadrupleDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->QuadrupleDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_QuadrupleDATE" class="form-group patient_an_registration_QuadrupleDATE">
<span<?php echo $patient_an_registration_grid->QuadrupleDATE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->QuadrupleDATE->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->QuadrupleDATE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->QuadrupleDATE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->QuadrupleINHOUSE->Visible) { // QuadrupleINHOUSE ?>
		<td data-name="QuadrupleINHOUSE">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_QuadrupleINHOUSE" class="form-group patient_an_registration_QuadrupleINHOUSE">
<input type="text" data-table="patient_an_registration" data-field="x_QuadrupleINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->QuadrupleINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->QuadrupleINHOUSE->EditValue ?>"<?php echo $patient_an_registration_grid->QuadrupleINHOUSE->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_QuadrupleINHOUSE" class="form-group patient_an_registration_QuadrupleINHOUSE">
<span<?php echo $patient_an_registration_grid->QuadrupleINHOUSE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->QuadrupleINHOUSE->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->QuadrupleINHOUSE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleINHOUSE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleINHOUSE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->QuadrupleINHOUSE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->QuadrupleREPORT->Visible) { // QuadrupleREPORT ?>
		<td data-name="QuadrupleREPORT">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_QuadrupleREPORT" class="form-group patient_an_registration_QuadrupleREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_QuadrupleREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->QuadrupleREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->QuadrupleREPORT->EditValue ?>"<?php echo $patient_an_registration_grid->QuadrupleREPORT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_QuadrupleREPORT" class="form-group patient_an_registration_QuadrupleREPORT">
<span<?php echo $patient_an_registration_grid->QuadrupleREPORT->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->QuadrupleREPORT->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->QuadrupleREPORT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_QuadrupleREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_QuadrupleREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->QuadrupleREPORT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->A5month->Visible) { // A5month ?>
		<td data-name="A5month">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_A5month" class="form-group patient_an_registration_A5month">
<input type="text" data-table="patient_an_registration" data-field="x_A5month" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5month" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5month" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->A5month->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->A5month->EditValue ?>"<?php echo $patient_an_registration_grid->A5month->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_A5month" class="form-group patient_an_registration_A5month">
<span<?php echo $patient_an_registration_grid->A5month->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->A5month->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5month" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5month" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5month" value="<?php echo HtmlEncode($patient_an_registration_grid->A5month->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5month" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A5month" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A5month" value="<?php echo HtmlEncode($patient_an_registration_grid->A5month->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->A5monthDATE->Visible) { // A5monthDATE ?>
		<td data-name="A5monthDATE">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_A5monthDATE" class="form-group patient_an_registration_A5monthDATE">
<input type="text" data-table="patient_an_registration" data-field="x_A5monthDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->A5monthDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->A5monthDATE->EditValue ?>"<?php echo $patient_an_registration_grid->A5monthDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->A5monthDATE->ReadOnly && !$patient_an_registration_grid->A5monthDATE->Disabled && !isset($patient_an_registration_grid->A5monthDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->A5monthDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_A5monthDATE" class="form-group patient_an_registration_A5monthDATE">
<span<?php echo $patient_an_registration_grid->A5monthDATE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->A5monthDATE->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->A5monthDATE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->A5monthDATE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->A5monthINHOUSE->Visible) { // A5monthINHOUSE ?>
		<td data-name="A5monthINHOUSE">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_A5monthINHOUSE" class="form-group patient_an_registration_A5monthINHOUSE">
<input type="text" data-table="patient_an_registration" data-field="x_A5monthINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->A5monthINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->A5monthINHOUSE->EditValue ?>"<?php echo $patient_an_registration_grid->A5monthINHOUSE->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_A5monthINHOUSE" class="form-group patient_an_registration_A5monthINHOUSE">
<span<?php echo $patient_an_registration_grid->A5monthINHOUSE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->A5monthINHOUSE->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->A5monthINHOUSE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthINHOUSE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthINHOUSE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->A5monthINHOUSE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->A5monthREPORT->Visible) { // A5monthREPORT ?>
		<td data-name="A5monthREPORT">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_A5monthREPORT" class="form-group patient_an_registration_A5monthREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_A5monthREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->A5monthREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->A5monthREPORT->EditValue ?>"<?php echo $patient_an_registration_grid->A5monthREPORT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_A5monthREPORT" class="form-group patient_an_registration_A5monthREPORT">
<span<?php echo $patient_an_registration_grid->A5monthREPORT->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->A5monthREPORT->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->A5monthREPORT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A5monthREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A5monthREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->A5monthREPORT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->A7month->Visible) { // A7month ?>
		<td data-name="A7month">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_A7month" class="form-group patient_an_registration_A7month">
<input type="text" data-table="patient_an_registration" data-field="x_A7month" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7month" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7month" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->A7month->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->A7month->EditValue ?>"<?php echo $patient_an_registration_grid->A7month->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_A7month" class="form-group patient_an_registration_A7month">
<span<?php echo $patient_an_registration_grid->A7month->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->A7month->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7month" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7month" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7month" value="<?php echo HtmlEncode($patient_an_registration_grid->A7month->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7month" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A7month" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A7month" value="<?php echo HtmlEncode($patient_an_registration_grid->A7month->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->A7monthDATE->Visible) { // A7monthDATE ?>
		<td data-name="A7monthDATE">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_A7monthDATE" class="form-group patient_an_registration_A7monthDATE">
<input type="text" data-table="patient_an_registration" data-field="x_A7monthDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->A7monthDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->A7monthDATE->EditValue ?>"<?php echo $patient_an_registration_grid->A7monthDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->A7monthDATE->ReadOnly && !$patient_an_registration_grid->A7monthDATE->Disabled && !isset($patient_an_registration_grid->A7monthDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->A7monthDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_A7monthDATE" class="form-group patient_an_registration_A7monthDATE">
<span<?php echo $patient_an_registration_grid->A7monthDATE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->A7monthDATE->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->A7monthDATE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->A7monthDATE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->A7monthINHOUSE->Visible) { // A7monthINHOUSE ?>
		<td data-name="A7monthINHOUSE">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_A7monthINHOUSE" class="form-group patient_an_registration_A7monthINHOUSE">
<input type="text" data-table="patient_an_registration" data-field="x_A7monthINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->A7monthINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->A7monthINHOUSE->EditValue ?>"<?php echo $patient_an_registration_grid->A7monthINHOUSE->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_A7monthINHOUSE" class="form-group patient_an_registration_A7monthINHOUSE">
<span<?php echo $patient_an_registration_grid->A7monthINHOUSE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->A7monthINHOUSE->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->A7monthINHOUSE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthINHOUSE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthINHOUSE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->A7monthINHOUSE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->A7monthREPORT->Visible) { // A7monthREPORT ?>
		<td data-name="A7monthREPORT">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_A7monthREPORT" class="form-group patient_an_registration_A7monthREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_A7monthREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->A7monthREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->A7monthREPORT->EditValue ?>"<?php echo $patient_an_registration_grid->A7monthREPORT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_A7monthREPORT" class="form-group patient_an_registration_A7monthREPORT">
<span<?php echo $patient_an_registration_grid->A7monthREPORT->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->A7monthREPORT->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->A7monthREPORT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A7monthREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A7monthREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->A7monthREPORT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->A9month->Visible) { // A9month ?>
		<td data-name="A9month">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_A9month" class="form-group patient_an_registration_A9month">
<input type="text" data-table="patient_an_registration" data-field="x_A9month" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9month" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9month" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->A9month->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->A9month->EditValue ?>"<?php echo $patient_an_registration_grid->A9month->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_A9month" class="form-group patient_an_registration_A9month">
<span<?php echo $patient_an_registration_grid->A9month->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->A9month->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9month" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9month" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9month" value="<?php echo HtmlEncode($patient_an_registration_grid->A9month->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9month" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A9month" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A9month" value="<?php echo HtmlEncode($patient_an_registration_grid->A9month->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->A9monthDATE->Visible) { // A9monthDATE ?>
		<td data-name="A9monthDATE">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_A9monthDATE" class="form-group patient_an_registration_A9monthDATE">
<input type="text" data-table="patient_an_registration" data-field="x_A9monthDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->A9monthDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->A9monthDATE->EditValue ?>"<?php echo $patient_an_registration_grid->A9monthDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->A9monthDATE->ReadOnly && !$patient_an_registration_grid->A9monthDATE->Disabled && !isset($patient_an_registration_grid->A9monthDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->A9monthDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_A9monthDATE" class="form-group patient_an_registration_A9monthDATE">
<span<?php echo $patient_an_registration_grid->A9monthDATE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->A9monthDATE->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->A9monthDATE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->A9monthDATE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->A9monthINHOUSE->Visible) { // A9monthINHOUSE ?>
		<td data-name="A9monthINHOUSE">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_A9monthINHOUSE" class="form-group patient_an_registration_A9monthINHOUSE">
<input type="text" data-table="patient_an_registration" data-field="x_A9monthINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->A9monthINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->A9monthINHOUSE->EditValue ?>"<?php echo $patient_an_registration_grid->A9monthINHOUSE->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_A9monthINHOUSE" class="form-group patient_an_registration_A9monthINHOUSE">
<span<?php echo $patient_an_registration_grid->A9monthINHOUSE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->A9monthINHOUSE->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->A9monthINHOUSE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthINHOUSE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthINHOUSE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->A9monthINHOUSE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->A9monthREPORT->Visible) { // A9monthREPORT ?>
		<td data-name="A9monthREPORT">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_A9monthREPORT" class="form-group patient_an_registration_A9monthREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_A9monthREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->A9monthREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->A9monthREPORT->EditValue ?>"<?php echo $patient_an_registration_grid->A9monthREPORT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_A9monthREPORT" class="form-group patient_an_registration_A9monthREPORT">
<span<?php echo $patient_an_registration_grid->A9monthREPORT->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->A9monthREPORT->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->A9monthREPORT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_A9monthREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_A9monthREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->A9monthREPORT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->INJ->Visible) { // INJ ?>
		<td data-name="INJ">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_INJ" class="form-group patient_an_registration_INJ">
<input type="text" data-table="patient_an_registration" data-field="x_INJ" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJ" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJ" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->INJ->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->INJ->EditValue ?>"<?php echo $patient_an_registration_grid->INJ->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_INJ" class="form-group patient_an_registration_INJ">
<span<?php echo $patient_an_registration_grid->INJ->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->INJ->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJ" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJ" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJ" value="<?php echo HtmlEncode($patient_an_registration_grid->INJ->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJ" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_INJ" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_INJ" value="<?php echo HtmlEncode($patient_an_registration_grid->INJ->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->INJDATE->Visible) { // INJDATE ?>
		<td data-name="INJDATE">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_INJDATE" class="form-group patient_an_registration_INJDATE">
<input type="text" data-table="patient_an_registration" data-field="x_INJDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->INJDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->INJDATE->EditValue ?>"<?php echo $patient_an_registration_grid->INJDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->INJDATE->ReadOnly && !$patient_an_registration_grid->INJDATE->Disabled && !isset($patient_an_registration_grid->INJDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->INJDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_INJDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_INJDATE" class="form-group patient_an_registration_INJDATE">
<span<?php echo $patient_an_registration_grid->INJDATE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->INJDATE->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->INJDATE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_INJDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_INJDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->INJDATE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->INJINHOUSE->Visible) { // INJINHOUSE ?>
		<td data-name="INJINHOUSE">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_INJINHOUSE" class="form-group patient_an_registration_INJINHOUSE">
<input type="text" data-table="patient_an_registration" data-field="x_INJINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->INJINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->INJINHOUSE->EditValue ?>"<?php echo $patient_an_registration_grid->INJINHOUSE->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_INJINHOUSE" class="form-group patient_an_registration_INJINHOUSE">
<span<?php echo $patient_an_registration_grid->INJINHOUSE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->INJINHOUSE->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJINHOUSE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJINHOUSE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->INJINHOUSE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJINHOUSE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_INJINHOUSE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_INJINHOUSE" value="<?php echo HtmlEncode($patient_an_registration_grid->INJINHOUSE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->INJREPORT->Visible) { // INJREPORT ?>
		<td data-name="INJREPORT">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_INJREPORT" class="form-group patient_an_registration_INJREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_INJREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->INJREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->INJREPORT->EditValue ?>"<?php echo $patient_an_registration_grid->INJREPORT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_INJREPORT" class="form-group patient_an_registration_INJREPORT">
<span<?php echo $patient_an_registration_grid->INJREPORT->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->INJREPORT->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJREPORT" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJREPORT" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_INJREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->INJREPORT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_INJREPORT" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_INJREPORT" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_INJREPORT" value="<?php echo HtmlEncode($patient_an_registration_grid->INJREPORT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Bleeding->Visible) { // Bleeding ?>
		<td data-name="Bleeding">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Bleeding" class="form-group patient_an_registration_Bleeding">
<div id="tp_x<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="patient_an_registration" data-field="x_Bleeding" data-value-separator="<?php echo $patient_an_registration_grid->Bleeding->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding[]" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding[]" value="{value}"<?php echo $patient_an_registration_grid->Bleeding->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_an_registration_grid->Bleeding->checkBoxListHtml(FALSE, "x{$patient_an_registration_grid->RowIndex}_Bleeding[]") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Bleeding" class="form-group patient_an_registration_Bleeding">
<span<?php echo $patient_an_registration_grid->Bleeding->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->Bleeding->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Bleeding" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding" value="<?php echo HtmlEncode($patient_an_registration_grid->Bleeding->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Bleeding" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding[]" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Bleeding[]" value="<?php echo HtmlEncode($patient_an_registration_grid->Bleeding->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Hypothyroidism->Visible) { // Hypothyroidism ?>
		<td data-name="Hypothyroidism">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Hypothyroidism" class="form-group patient_an_registration_Hypothyroidism">
<input type="text" data-table="patient_an_registration" data-field="x_Hypothyroidism" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Hypothyroidism" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Hypothyroidism" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Hypothyroidism->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Hypothyroidism->EditValue ?>"<?php echo $patient_an_registration_grid->Hypothyroidism->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Hypothyroidism" class="form-group patient_an_registration_Hypothyroidism">
<span<?php echo $patient_an_registration_grid->Hypothyroidism->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->Hypothyroidism->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Hypothyroidism" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Hypothyroidism" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Hypothyroidism" value="<?php echo HtmlEncode($patient_an_registration_grid->Hypothyroidism->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Hypothyroidism" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Hypothyroidism" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Hypothyroidism" value="<?php echo HtmlEncode($patient_an_registration_grid->Hypothyroidism->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->PICMENumber->Visible) { // PICMENumber ?>
		<td data-name="PICMENumber">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_PICMENumber" class="form-group patient_an_registration_PICMENumber">
<input type="text" data-table="patient_an_registration" data-field="x_PICMENumber" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PICMENumber" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PICMENumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->PICMENumber->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->PICMENumber->EditValue ?>"<?php echo $patient_an_registration_grid->PICMENumber->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_PICMENumber" class="form-group patient_an_registration_PICMENumber">
<span<?php echo $patient_an_registration_grid->PICMENumber->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->PICMENumber->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PICMENumber" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PICMENumber" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PICMENumber" value="<?php echo HtmlEncode($patient_an_registration_grid->PICMENumber->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PICMENumber" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PICMENumber" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PICMENumber" value="<?php echo HtmlEncode($patient_an_registration_grid->PICMENumber->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Outcome->Visible) { // Outcome ?>
		<td data-name="Outcome">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Outcome" class="form-group patient_an_registration_Outcome">
<input type="text" data-table="patient_an_registration" data-field="x_Outcome" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Outcome" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Outcome" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Outcome->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Outcome->EditValue ?>"<?php echo $patient_an_registration_grid->Outcome->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Outcome" class="form-group patient_an_registration_Outcome">
<span<?php echo $patient_an_registration_grid->Outcome->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->Outcome->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Outcome" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Outcome" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Outcome" value="<?php echo HtmlEncode($patient_an_registration_grid->Outcome->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Outcome" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Outcome" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Outcome" value="<?php echo HtmlEncode($patient_an_registration_grid->Outcome->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->DateofAdmission->Visible) { // DateofAdmission ?>
		<td data-name="DateofAdmission">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_DateofAdmission" class="form-group patient_an_registration_DateofAdmission">
<input type="text" data-table="patient_an_registration" data-field="x_DateofAdmission" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DateofAdmission" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DateofAdmission" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->DateofAdmission->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->DateofAdmission->EditValue ?>"<?php echo $patient_an_registration_grid->DateofAdmission->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->DateofAdmission->ReadOnly && !$patient_an_registration_grid->DateofAdmission->Disabled && !isset($patient_an_registration_grid->DateofAdmission->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->DateofAdmission->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_DateofAdmission", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_DateofAdmission" class="form-group patient_an_registration_DateofAdmission">
<span<?php echo $patient_an_registration_grid->DateofAdmission->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->DateofAdmission->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DateofAdmission" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DateofAdmission" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DateofAdmission" value="<?php echo HtmlEncode($patient_an_registration_grid->DateofAdmission->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DateofAdmission" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DateofAdmission" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DateofAdmission" value="<?php echo HtmlEncode($patient_an_registration_grid->DateofAdmission->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->DateodProcedure->Visible) { // DateodProcedure ?>
		<td data-name="DateodProcedure">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_DateodProcedure" class="form-group patient_an_registration_DateodProcedure">
<input type="text" data-table="patient_an_registration" data-field="x_DateodProcedure" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DateodProcedure" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DateodProcedure" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->DateodProcedure->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->DateodProcedure->EditValue ?>"<?php echo $patient_an_registration_grid->DateodProcedure->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_DateodProcedure" class="form-group patient_an_registration_DateodProcedure">
<span<?php echo $patient_an_registration_grid->DateodProcedure->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->DateodProcedure->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_DateodProcedure" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_DateodProcedure" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_DateodProcedure" value="<?php echo HtmlEncode($patient_an_registration_grid->DateodProcedure->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_DateodProcedure" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_DateodProcedure" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_DateodProcedure" value="<?php echo HtmlEncode($patient_an_registration_grid->DateodProcedure->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Miscarriage->Visible) { // Miscarriage ?>
		<td data-name="Miscarriage">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Miscarriage" class="form-group patient_an_registration_Miscarriage">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_Miscarriage" data-value-separator="<?php echo $patient_an_registration_grid->Miscarriage->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Miscarriage" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Miscarriage"<?php echo $patient_an_registration_grid->Miscarriage->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->Miscarriage->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_Miscarriage") ?>
		</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Miscarriage" class="form-group patient_an_registration_Miscarriage">
<span<?php echo $patient_an_registration_grid->Miscarriage->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->Miscarriage->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Miscarriage" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Miscarriage" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Miscarriage" value="<?php echo HtmlEncode($patient_an_registration_grid->Miscarriage->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Miscarriage" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Miscarriage" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Miscarriage" value="<?php echo HtmlEncode($patient_an_registration_grid->Miscarriage->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->ModeOfDelivery->Visible) { // ModeOfDelivery ?>
		<td data-name="ModeOfDelivery">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_ModeOfDelivery" class="form-group patient_an_registration_ModeOfDelivery">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_ModeOfDelivery" data-value-separator="<?php echo $patient_an_registration_grid->ModeOfDelivery->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ModeOfDelivery" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ModeOfDelivery"<?php echo $patient_an_registration_grid->ModeOfDelivery->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->ModeOfDelivery->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_ModeOfDelivery") ?>
		</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_ModeOfDelivery" class="form-group patient_an_registration_ModeOfDelivery">
<span<?php echo $patient_an_registration_grid->ModeOfDelivery->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->ModeOfDelivery->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ModeOfDelivery" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ModeOfDelivery" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ModeOfDelivery" value="<?php echo HtmlEncode($patient_an_registration_grid->ModeOfDelivery->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ModeOfDelivery" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ModeOfDelivery" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ModeOfDelivery" value="<?php echo HtmlEncode($patient_an_registration_grid->ModeOfDelivery->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->ND->Visible) { // ND ?>
		<td data-name="ND">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_ND" class="form-group patient_an_registration_ND">
<input type="text" data-table="patient_an_registration" data-field="x_ND" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ND" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ND" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->ND->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->ND->EditValue ?>"<?php echo $patient_an_registration_grid->ND->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_ND" class="form-group patient_an_registration_ND">
<span<?php echo $patient_an_registration_grid->ND->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->ND->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ND" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ND" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ND" value="<?php echo HtmlEncode($patient_an_registration_grid->ND->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ND" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ND" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ND" value="<?php echo HtmlEncode($patient_an_registration_grid->ND->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->NDS->Visible) { // NDS ?>
		<td data-name="NDS">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_NDS" class="form-group patient_an_registration_NDS">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_NDS" data-value-separator="<?php echo $patient_an_registration_grid->NDS->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NDS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NDS"<?php echo $patient_an_registration_grid->NDS->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->NDS->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_NDS") ?>
		</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_NDS" class="form-group patient_an_registration_NDS">
<span<?php echo $patient_an_registration_grid->NDS->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->NDS->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_NDS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NDS" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NDS" value="<?php echo HtmlEncode($patient_an_registration_grid->NDS->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NDS" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_NDS" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_NDS" value="<?php echo HtmlEncode($patient_an_registration_grid->NDS->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->NDP->Visible) { // NDP ?>
		<td data-name="NDP">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_NDP" class="form-group patient_an_registration_NDP">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_NDP" data-value-separator="<?php echo $patient_an_registration_grid->NDP->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NDP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NDP"<?php echo $patient_an_registration_grid->NDP->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->NDP->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_NDP") ?>
		</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_NDP" class="form-group patient_an_registration_NDP">
<span<?php echo $patient_an_registration_grid->NDP->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->NDP->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_NDP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NDP" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NDP" value="<?php echo HtmlEncode($patient_an_registration_grid->NDP->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NDP" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_NDP" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_NDP" value="<?php echo HtmlEncode($patient_an_registration_grid->NDP->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Vaccum->Visible) { // Vaccum ?>
		<td data-name="Vaccum">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Vaccum" class="form-group patient_an_registration_Vaccum">
<input type="text" data-table="patient_an_registration" data-field="x_Vaccum" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Vaccum" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Vaccum" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Vaccum->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Vaccum->EditValue ?>"<?php echo $patient_an_registration_grid->Vaccum->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Vaccum" class="form-group patient_an_registration_Vaccum">
<span<?php echo $patient_an_registration_grid->Vaccum->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->Vaccum->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Vaccum" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Vaccum" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Vaccum" value="<?php echo HtmlEncode($patient_an_registration_grid->Vaccum->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Vaccum" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Vaccum" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Vaccum" value="<?php echo HtmlEncode($patient_an_registration_grid->Vaccum->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->VaccumS->Visible) { // VaccumS ?>
		<td data-name="VaccumS">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_VaccumS" class="form-group patient_an_registration_VaccumS">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_VaccumS" data-value-separator="<?php echo $patient_an_registration_grid->VaccumS->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumS"<?php echo $patient_an_registration_grid->VaccumS->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->VaccumS->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_VaccumS") ?>
		</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_VaccumS" class="form-group patient_an_registration_VaccumS">
<span<?php echo $patient_an_registration_grid->VaccumS->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->VaccumS->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_VaccumS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumS" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumS" value="<?php echo HtmlEncode($patient_an_registration_grid->VaccumS->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_VaccumS" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumS" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumS" value="<?php echo HtmlEncode($patient_an_registration_grid->VaccumS->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->VaccumP->Visible) { // VaccumP ?>
		<td data-name="VaccumP">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_VaccumP" class="form-group patient_an_registration_VaccumP">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_VaccumP" data-value-separator="<?php echo $patient_an_registration_grid->VaccumP->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumP"<?php echo $patient_an_registration_grid->VaccumP->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->VaccumP->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_VaccumP") ?>
		</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_VaccumP" class="form-group patient_an_registration_VaccumP">
<span<?php echo $patient_an_registration_grid->VaccumP->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->VaccumP->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_VaccumP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumP" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumP" value="<?php echo HtmlEncode($patient_an_registration_grid->VaccumP->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_VaccumP" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumP" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_VaccumP" value="<?php echo HtmlEncode($patient_an_registration_grid->VaccumP->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Forceps->Visible) { // Forceps ?>
		<td data-name="Forceps">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Forceps" class="form-group patient_an_registration_Forceps">
<input type="text" data-table="patient_an_registration" data-field="x_Forceps" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Forceps" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Forceps" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Forceps->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Forceps->EditValue ?>"<?php echo $patient_an_registration_grid->Forceps->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Forceps" class="form-group patient_an_registration_Forceps">
<span<?php echo $patient_an_registration_grid->Forceps->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->Forceps->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Forceps" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Forceps" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Forceps" value="<?php echo HtmlEncode($patient_an_registration_grid->Forceps->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Forceps" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Forceps" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Forceps" value="<?php echo HtmlEncode($patient_an_registration_grid->Forceps->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->ForcepsS->Visible) { // ForcepsS ?>
		<td data-name="ForcepsS">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_ForcepsS" class="form-group patient_an_registration_ForcepsS">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_ForcepsS" data-value-separator="<?php echo $patient_an_registration_grid->ForcepsS->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsS"<?php echo $patient_an_registration_grid->ForcepsS->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->ForcepsS->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_ForcepsS") ?>
		</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_ForcepsS" class="form-group patient_an_registration_ForcepsS">
<span<?php echo $patient_an_registration_grid->ForcepsS->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->ForcepsS->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ForcepsS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsS" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsS" value="<?php echo HtmlEncode($patient_an_registration_grid->ForcepsS->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ForcepsS" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsS" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsS" value="<?php echo HtmlEncode($patient_an_registration_grid->ForcepsS->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->ForcepsP->Visible) { // ForcepsP ?>
		<td data-name="ForcepsP">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_ForcepsP" class="form-group patient_an_registration_ForcepsP">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_ForcepsP" data-value-separator="<?php echo $patient_an_registration_grid->ForcepsP->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsP"<?php echo $patient_an_registration_grid->ForcepsP->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->ForcepsP->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_ForcepsP") ?>
		</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_ForcepsP" class="form-group patient_an_registration_ForcepsP">
<span<?php echo $patient_an_registration_grid->ForcepsP->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->ForcepsP->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ForcepsP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsP" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsP" value="<?php echo HtmlEncode($patient_an_registration_grid->ForcepsP->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ForcepsP" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsP" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ForcepsP" value="<?php echo HtmlEncode($patient_an_registration_grid->ForcepsP->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Elective->Visible) { // Elective ?>
		<td data-name="Elective">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Elective" class="form-group patient_an_registration_Elective">
<input type="text" data-table="patient_an_registration" data-field="x_Elective" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Elective" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Elective" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Elective->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Elective->EditValue ?>"<?php echo $patient_an_registration_grid->Elective->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Elective" class="form-group patient_an_registration_Elective">
<span<?php echo $patient_an_registration_grid->Elective->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->Elective->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Elective" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Elective" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Elective" value="<?php echo HtmlEncode($patient_an_registration_grid->Elective->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Elective" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Elective" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Elective" value="<?php echo HtmlEncode($patient_an_registration_grid->Elective->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->ElectiveS->Visible) { // ElectiveS ?>
		<td data-name="ElectiveS">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_ElectiveS" class="form-group patient_an_registration_ElectiveS">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_ElectiveS" data-value-separator="<?php echo $patient_an_registration_grid->ElectiveS->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveS"<?php echo $patient_an_registration_grid->ElectiveS->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->ElectiveS->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_ElectiveS") ?>
		</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_ElectiveS" class="form-group patient_an_registration_ElectiveS">
<span<?php echo $patient_an_registration_grid->ElectiveS->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->ElectiveS->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ElectiveS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveS" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveS" value="<?php echo HtmlEncode($patient_an_registration_grid->ElectiveS->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ElectiveS" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveS" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveS" value="<?php echo HtmlEncode($patient_an_registration_grid->ElectiveS->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->ElectiveP->Visible) { // ElectiveP ?>
		<td data-name="ElectiveP">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_ElectiveP" class="form-group patient_an_registration_ElectiveP">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_ElectiveP" data-value-separator="<?php echo $patient_an_registration_grid->ElectiveP->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveP"<?php echo $patient_an_registration_grid->ElectiveP->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->ElectiveP->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_ElectiveP") ?>
		</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_ElectiveP" class="form-group patient_an_registration_ElectiveP">
<span<?php echo $patient_an_registration_grid->ElectiveP->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->ElectiveP->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ElectiveP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveP" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveP" value="<?php echo HtmlEncode($patient_an_registration_grid->ElectiveP->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ElectiveP" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveP" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ElectiveP" value="<?php echo HtmlEncode($patient_an_registration_grid->ElectiveP->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Emergency->Visible) { // Emergency ?>
		<td data-name="Emergency">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Emergency" class="form-group patient_an_registration_Emergency">
<input type="text" data-table="patient_an_registration" data-field="x_Emergency" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Emergency" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Emergency" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Emergency->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Emergency->EditValue ?>"<?php echo $patient_an_registration_grid->Emergency->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Emergency" class="form-group patient_an_registration_Emergency">
<span<?php echo $patient_an_registration_grid->Emergency->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->Emergency->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Emergency" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Emergency" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Emergency" value="<?php echo HtmlEncode($patient_an_registration_grid->Emergency->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Emergency" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Emergency" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Emergency" value="<?php echo HtmlEncode($patient_an_registration_grid->Emergency->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->EmergencyS->Visible) { // EmergencyS ?>
		<td data-name="EmergencyS">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_EmergencyS" class="form-group patient_an_registration_EmergencyS">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_EmergencyS" data-value-separator="<?php echo $patient_an_registration_grid->EmergencyS->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyS"<?php echo $patient_an_registration_grid->EmergencyS->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->EmergencyS->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_EmergencyS") ?>
		</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_EmergencyS" class="form-group patient_an_registration_EmergencyS">
<span<?php echo $patient_an_registration_grid->EmergencyS->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->EmergencyS->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_EmergencyS" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyS" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyS" value="<?php echo HtmlEncode($patient_an_registration_grid->EmergencyS->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_EmergencyS" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyS" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyS" value="<?php echo HtmlEncode($patient_an_registration_grid->EmergencyS->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->EmergencyP->Visible) { // EmergencyP ?>
		<td data-name="EmergencyP">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_EmergencyP" class="form-group patient_an_registration_EmergencyP">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_EmergencyP" data-value-separator="<?php echo $patient_an_registration_grid->EmergencyP->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyP"<?php echo $patient_an_registration_grid->EmergencyP->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->EmergencyP->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_EmergencyP") ?>
		</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_EmergencyP" class="form-group patient_an_registration_EmergencyP">
<span<?php echo $patient_an_registration_grid->EmergencyP->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->EmergencyP->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_EmergencyP" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyP" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyP" value="<?php echo HtmlEncode($patient_an_registration_grid->EmergencyP->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_EmergencyP" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyP" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_EmergencyP" value="<?php echo HtmlEncode($patient_an_registration_grid->EmergencyP->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Maturity->Visible) { // Maturity ?>
		<td data-name="Maturity">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Maturity" class="form-group patient_an_registration_Maturity">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_Maturity" data-value-separator="<?php echo $patient_an_registration_grid->Maturity->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Maturity" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Maturity"<?php echo $patient_an_registration_grid->Maturity->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->Maturity->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_Maturity") ?>
		</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Maturity" class="form-group patient_an_registration_Maturity">
<span<?php echo $patient_an_registration_grid->Maturity->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->Maturity->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Maturity" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Maturity" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Maturity" value="<?php echo HtmlEncode($patient_an_registration_grid->Maturity->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Maturity" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Maturity" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Maturity" value="<?php echo HtmlEncode($patient_an_registration_grid->Maturity->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Baby1->Visible) { // Baby1 ?>
		<td data-name="Baby1">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Baby1" class="form-group patient_an_registration_Baby1">
<input type="text" data-table="patient_an_registration" data-field="x_Baby1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Baby1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Baby1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Baby1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Baby1->EditValue ?>"<?php echo $patient_an_registration_grid->Baby1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Baby1" class="form-group patient_an_registration_Baby1">
<span<?php echo $patient_an_registration_grid->Baby1->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->Baby1->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Baby1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Baby1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Baby1" value="<?php echo HtmlEncode($patient_an_registration_grid->Baby1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Baby1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Baby1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Baby1" value="<?php echo HtmlEncode($patient_an_registration_grid->Baby1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Baby2->Visible) { // Baby2 ?>
		<td data-name="Baby2">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Baby2" class="form-group patient_an_registration_Baby2">
<input type="text" data-table="patient_an_registration" data-field="x_Baby2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Baby2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Baby2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Baby2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Baby2->EditValue ?>"<?php echo $patient_an_registration_grid->Baby2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Baby2" class="form-group patient_an_registration_Baby2">
<span<?php echo $patient_an_registration_grid->Baby2->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->Baby2->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Baby2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Baby2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Baby2" value="<?php echo HtmlEncode($patient_an_registration_grid->Baby2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Baby2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Baby2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Baby2" value="<?php echo HtmlEncode($patient_an_registration_grid->Baby2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->sex1->Visible) { // sex1 ?>
		<td data-name="sex1">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_sex1" class="form-group patient_an_registration_sex1">
<input type="text" data-table="patient_an_registration" data-field="x_sex1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_sex1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_sex1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->sex1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->sex1->EditValue ?>"<?php echo $patient_an_registration_grid->sex1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_sex1" class="form-group patient_an_registration_sex1">
<span<?php echo $patient_an_registration_grid->sex1->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->sex1->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_sex1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_sex1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_sex1" value="<?php echo HtmlEncode($patient_an_registration_grid->sex1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_sex1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_sex1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_sex1" value="<?php echo HtmlEncode($patient_an_registration_grid->sex1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->sex2->Visible) { // sex2 ?>
		<td data-name="sex2">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_sex2" class="form-group patient_an_registration_sex2">
<input type="text" data-table="patient_an_registration" data-field="x_sex2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_sex2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_sex2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->sex2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->sex2->EditValue ?>"<?php echo $patient_an_registration_grid->sex2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_sex2" class="form-group patient_an_registration_sex2">
<span<?php echo $patient_an_registration_grid->sex2->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->sex2->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_sex2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_sex2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_sex2" value="<?php echo HtmlEncode($patient_an_registration_grid->sex2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_sex2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_sex2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_sex2" value="<?php echo HtmlEncode($patient_an_registration_grid->sex2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->weight1->Visible) { // weight1 ?>
		<td data-name="weight1">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_weight1" class="form-group patient_an_registration_weight1">
<input type="text" data-table="patient_an_registration" data-field="x_weight1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_weight1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_weight1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->weight1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->weight1->EditValue ?>"<?php echo $patient_an_registration_grid->weight1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_weight1" class="form-group patient_an_registration_weight1">
<span<?php echo $patient_an_registration_grid->weight1->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->weight1->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_weight1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_weight1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_weight1" value="<?php echo HtmlEncode($patient_an_registration_grid->weight1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_weight1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_weight1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_weight1" value="<?php echo HtmlEncode($patient_an_registration_grid->weight1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->weight2->Visible) { // weight2 ?>
		<td data-name="weight2">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_weight2" class="form-group patient_an_registration_weight2">
<input type="text" data-table="patient_an_registration" data-field="x_weight2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_weight2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_weight2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->weight2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->weight2->EditValue ?>"<?php echo $patient_an_registration_grid->weight2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_weight2" class="form-group patient_an_registration_weight2">
<span<?php echo $patient_an_registration_grid->weight2->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->weight2->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_weight2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_weight2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_weight2" value="<?php echo HtmlEncode($patient_an_registration_grid->weight2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_weight2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_weight2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_weight2" value="<?php echo HtmlEncode($patient_an_registration_grid->weight2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->NICU1->Visible) { // NICU1 ?>
		<td data-name="NICU1">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_NICU1" class="form-group patient_an_registration_NICU1">
<input type="text" data-table="patient_an_registration" data-field="x_NICU1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NICU1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NICU1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->NICU1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->NICU1->EditValue ?>"<?php echo $patient_an_registration_grid->NICU1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_NICU1" class="form-group patient_an_registration_NICU1">
<span<?php echo $patient_an_registration_grid->NICU1->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->NICU1->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_NICU1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NICU1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NICU1" value="<?php echo HtmlEncode($patient_an_registration_grid->NICU1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NICU1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_NICU1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_NICU1" value="<?php echo HtmlEncode($patient_an_registration_grid->NICU1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->NICU2->Visible) { // NICU2 ?>
		<td data-name="NICU2">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_NICU2" class="form-group patient_an_registration_NICU2">
<input type="text" data-table="patient_an_registration" data-field="x_NICU2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NICU2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NICU2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->NICU2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->NICU2->EditValue ?>"<?php echo $patient_an_registration_grid->NICU2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_NICU2" class="form-group patient_an_registration_NICU2">
<span<?php echo $patient_an_registration_grid->NICU2->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->NICU2->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_NICU2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_NICU2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_NICU2" value="<?php echo HtmlEncode($patient_an_registration_grid->NICU2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_NICU2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_NICU2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_NICU2" value="<?php echo HtmlEncode($patient_an_registration_grid->NICU2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Jaundice1->Visible) { // Jaundice1 ?>
		<td data-name="Jaundice1">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Jaundice1" class="form-group patient_an_registration_Jaundice1">
<input type="text" data-table="patient_an_registration" data-field="x_Jaundice1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Jaundice1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Jaundice1->EditValue ?>"<?php echo $patient_an_registration_grid->Jaundice1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Jaundice1" class="form-group patient_an_registration_Jaundice1">
<span<?php echo $patient_an_registration_grid->Jaundice1->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->Jaundice1->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Jaundice1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice1" value="<?php echo HtmlEncode($patient_an_registration_grid->Jaundice1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Jaundice1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice1" value="<?php echo HtmlEncode($patient_an_registration_grid->Jaundice1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Jaundice2->Visible) { // Jaundice2 ?>
		<td data-name="Jaundice2">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Jaundice2" class="form-group patient_an_registration_Jaundice2">
<input type="text" data-table="patient_an_registration" data-field="x_Jaundice2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Jaundice2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Jaundice2->EditValue ?>"<?php echo $patient_an_registration_grid->Jaundice2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Jaundice2" class="form-group patient_an_registration_Jaundice2">
<span<?php echo $patient_an_registration_grid->Jaundice2->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->Jaundice2->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Jaundice2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice2" value="<?php echo HtmlEncode($patient_an_registration_grid->Jaundice2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Jaundice2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Jaundice2" value="<?php echo HtmlEncode($patient_an_registration_grid->Jaundice2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Others1->Visible) { // Others1 ?>
		<td data-name="Others1">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Others1" class="form-group patient_an_registration_Others1">
<input type="text" data-table="patient_an_registration" data-field="x_Others1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Others1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Others1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Others1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Others1->EditValue ?>"<?php echo $patient_an_registration_grid->Others1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Others1" class="form-group patient_an_registration_Others1">
<span<?php echo $patient_an_registration_grid->Others1->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->Others1->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Others1" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Others1" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Others1" value="<?php echo HtmlEncode($patient_an_registration_grid->Others1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Others1" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Others1" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Others1" value="<?php echo HtmlEncode($patient_an_registration_grid->Others1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->Others2->Visible) { // Others2 ?>
		<td data-name="Others2">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_Others2" class="form-group patient_an_registration_Others2">
<input type="text" data-table="patient_an_registration" data-field="x_Others2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Others2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Others2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->Others2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->Others2->EditValue ?>"<?php echo $patient_an_registration_grid->Others2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_Others2" class="form-group patient_an_registration_Others2">
<span<?php echo $patient_an_registration_grid->Others2->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->Others2->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_Others2" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_Others2" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_Others2" value="<?php echo HtmlEncode($patient_an_registration_grid->Others2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_Others2" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_Others2" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_Others2" value="<?php echo HtmlEncode($patient_an_registration_grid->Others2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->SpillOverReasons->Visible) { // SpillOverReasons ?>
		<td data-name="SpillOverReasons">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_SpillOverReasons" class="form-group patient_an_registration_SpillOverReasons">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_SpillOverReasons" data-value-separator="<?php echo $patient_an_registration_grid->SpillOverReasons->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_SpillOverReasons" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_SpillOverReasons"<?php echo $patient_an_registration_grid->SpillOverReasons->editAttributes() ?>>
			<?php echo $patient_an_registration_grid->SpillOverReasons->selectOptionListHtml("x{$patient_an_registration_grid->RowIndex}_SpillOverReasons") ?>
		</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_SpillOverReasons" class="form-group patient_an_registration_SpillOverReasons">
<span<?php echo $patient_an_registration_grid->SpillOverReasons->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->SpillOverReasons->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_SpillOverReasons" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_SpillOverReasons" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_SpillOverReasons" value="<?php echo HtmlEncode($patient_an_registration_grid->SpillOverReasons->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_SpillOverReasons" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_SpillOverReasons" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_SpillOverReasons" value="<?php echo HtmlEncode($patient_an_registration_grid->SpillOverReasons->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->ANClosed->Visible) { // ANClosed ?>
		<td data-name="ANClosed">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_ANClosed" class="form-group patient_an_registration_ANClosed">
<div id="tp_x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="patient_an_registration" data-field="x_ANClosed" data-value-separator="<?php echo $patient_an_registration_grid->ANClosed->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed[]" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed[]" value="{value}"<?php echo $patient_an_registration_grid->ANClosed->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_an_registration_grid->ANClosed->checkBoxListHtml(FALSE, "x{$patient_an_registration_grid->RowIndex}_ANClosed[]") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_ANClosed" class="form-group patient_an_registration_ANClosed">
<span<?php echo $patient_an_registration_grid->ANClosed->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->ANClosed->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANClosed" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed" value="<?php echo HtmlEncode($patient_an_registration_grid->ANClosed->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANClosed" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed[]" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosed[]" value="<?php echo HtmlEncode($patient_an_registration_grid->ANClosed->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->ANClosedDATE->Visible) { // ANClosedDATE ?>
		<td data-name="ANClosedDATE">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_ANClosedDATE" class="form-group patient_an_registration_ANClosedDATE">
<input type="text" data-table="patient_an_registration" data-field="x_ANClosedDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosedDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosedDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->ANClosedDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->ANClosedDATE->EditValue ?>"<?php echo $patient_an_registration_grid->ANClosedDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->ANClosedDATE->ReadOnly && !$patient_an_registration_grid->ANClosedDATE->Disabled && !isset($patient_an_registration_grid->ANClosedDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->ANClosedDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosedDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_ANClosedDATE" class="form-group patient_an_registration_ANClosedDATE">
<span<?php echo $patient_an_registration_grid->ANClosedDATE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->ANClosedDATE->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANClosedDATE" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosedDATE" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosedDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->ANClosedDATE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ANClosedDATE" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosedDATE" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ANClosedDATE" value="<?php echo HtmlEncode($patient_an_registration_grid->ANClosedDATE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->PastMedicalHistoryOthers->Visible) { // PastMedicalHistoryOthers ?>
		<td data-name="PastMedicalHistoryOthers">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_PastMedicalHistoryOthers" class="form-group patient_an_registration_PastMedicalHistoryOthers">
<input type="text" data-table="patient_an_registration" data-field="x_PastMedicalHistoryOthers" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistoryOthers" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistoryOthers" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->PastMedicalHistoryOthers->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->PastMedicalHistoryOthers->EditValue ?>"<?php echo $patient_an_registration_grid->PastMedicalHistoryOthers->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_PastMedicalHistoryOthers" class="form-group patient_an_registration_PastMedicalHistoryOthers">
<span<?php echo $patient_an_registration_grid->PastMedicalHistoryOthers->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->PastMedicalHistoryOthers->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastMedicalHistoryOthers" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistoryOthers" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistoryOthers" value="<?php echo HtmlEncode($patient_an_registration_grid->PastMedicalHistoryOthers->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastMedicalHistoryOthers" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistoryOthers" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PastMedicalHistoryOthers" value="<?php echo HtmlEncode($patient_an_registration_grid->PastMedicalHistoryOthers->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->PastSurgicalHistoryOthers->Visible) { // PastSurgicalHistoryOthers ?>
		<td data-name="PastSurgicalHistoryOthers">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_PastSurgicalHistoryOthers" class="form-group patient_an_registration_PastSurgicalHistoryOthers">
<input type="text" data-table="patient_an_registration" data-field="x_PastSurgicalHistoryOthers" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistoryOthers" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistoryOthers" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->PastSurgicalHistoryOthers->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->PastSurgicalHistoryOthers->EditValue ?>"<?php echo $patient_an_registration_grid->PastSurgicalHistoryOthers->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_PastSurgicalHistoryOthers" class="form-group patient_an_registration_PastSurgicalHistoryOthers">
<span<?php echo $patient_an_registration_grid->PastSurgicalHistoryOthers->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->PastSurgicalHistoryOthers->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastSurgicalHistoryOthers" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistoryOthers" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistoryOthers" value="<?php echo HtmlEncode($patient_an_registration_grid->PastSurgicalHistoryOthers->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PastSurgicalHistoryOthers" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistoryOthers" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PastSurgicalHistoryOthers" value="<?php echo HtmlEncode($patient_an_registration_grid->PastSurgicalHistoryOthers->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->FamilyHistoryOthers->Visible) { // FamilyHistoryOthers ?>
		<td data-name="FamilyHistoryOthers">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_FamilyHistoryOthers" class="form-group patient_an_registration_FamilyHistoryOthers">
<input type="text" data-table="patient_an_registration" data-field="x_FamilyHistoryOthers" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistoryOthers" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistoryOthers" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->FamilyHistoryOthers->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->FamilyHistoryOthers->EditValue ?>"<?php echo $patient_an_registration_grid->FamilyHistoryOthers->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_FamilyHistoryOthers" class="form-group patient_an_registration_FamilyHistoryOthers">
<span<?php echo $patient_an_registration_grid->FamilyHistoryOthers->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->FamilyHistoryOthers->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_FamilyHistoryOthers" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistoryOthers" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistoryOthers" value="<?php echo HtmlEncode($patient_an_registration_grid->FamilyHistoryOthers->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_FamilyHistoryOthers" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistoryOthers" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_FamilyHistoryOthers" value="<?php echo HtmlEncode($patient_an_registration_grid->FamilyHistoryOthers->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->PresentPregnancyComplicationsOthers->Visible) { // PresentPregnancyComplicationsOthers ?>
		<td data-name="PresentPregnancyComplicationsOthers">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_PresentPregnancyComplicationsOthers" class="form-group patient_an_registration_PresentPregnancyComplicationsOthers">
<input type="text" data-table="patient_an_registration" data-field="x_PresentPregnancyComplicationsOthers" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PresentPregnancyComplicationsOthers" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PresentPregnancyComplicationsOthers" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->PresentPregnancyComplicationsOthers->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->PresentPregnancyComplicationsOthers->EditValue ?>"<?php echo $patient_an_registration_grid->PresentPregnancyComplicationsOthers->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_PresentPregnancyComplicationsOthers" class="form-group patient_an_registration_PresentPregnancyComplicationsOthers">
<span<?php echo $patient_an_registration_grid->PresentPregnancyComplicationsOthers->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->PresentPregnancyComplicationsOthers->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_PresentPregnancyComplicationsOthers" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_PresentPregnancyComplicationsOthers" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_PresentPregnancyComplicationsOthers" value="<?php echo HtmlEncode($patient_an_registration_grid->PresentPregnancyComplicationsOthers->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_PresentPregnancyComplicationsOthers" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_PresentPregnancyComplicationsOthers" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_PresentPregnancyComplicationsOthers" value="<?php echo HtmlEncode($patient_an_registration_grid->PresentPregnancyComplicationsOthers->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_an_registration_grid->ETdate->Visible) { // ETdate ?>
		<td data-name="ETdate">
<?php if (!$patient_an_registration->isConfirm()) { ?>
<span id="el$rowindex$_patient_an_registration_ETdate" class="form-group patient_an_registration_ETdate">
<input type="text" data-table="patient_an_registration" data-field="x_ETdate" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ETdate" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ETdate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_grid->ETdate->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_grid->ETdate->EditValue ?>"<?php echo $patient_an_registration_grid->ETdate->editAttributes() ?>>
<?php if (!$patient_an_registration_grid->ETdate->ReadOnly && !$patient_an_registration_grid->ETdate->Disabled && !isset($patient_an_registration_grid->ETdate->EditAttrs["readonly"]) && !isset($patient_an_registration_grid->ETdate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationgrid", "x<?php echo $patient_an_registration_grid->RowIndex ?>_ETdate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_an_registration_ETdate" class="form-group patient_an_registration_ETdate">
<span<?php echo $patient_an_registration_grid->ETdate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_grid->ETdate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_ETdate" name="x<?php echo $patient_an_registration_grid->RowIndex ?>_ETdate" id="x<?php echo $patient_an_registration_grid->RowIndex ?>_ETdate" value="<?php echo HtmlEncode($patient_an_registration_grid->ETdate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_an_registration" data-field="x_ETdate" name="o<?php echo $patient_an_registration_grid->RowIndex ?>_ETdate" id="o<?php echo $patient_an_registration_grid->RowIndex ?>_ETdate" value="<?php echo HtmlEncode($patient_an_registration_grid->ETdate->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_an_registration_grid->ListOptions->render("body", "right", $patient_an_registration_grid->RowIndex);
?>
<script>
loadjs.ready(["fpatient_an_registrationgrid", "load"], function() {
	fpatient_an_registrationgrid.updateLists(<?php echo $patient_an_registration_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
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
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($patient_an_registration_grid->Recordset)
	$patient_an_registration_grid->Recordset->Close();
?>
<?php if ($patient_an_registration_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $patient_an_registration_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_an_registration_grid->TotalRecords == 0 && !$patient_an_registration->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_an_registration_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$patient_an_registration_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$patient_an_registration->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_patient_an_registration",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php
$patient_an_registration_grid->terminate();
?>