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
$patient_ot_surgery_register_add = new patient_ot_surgery_register_add();

// Run the page
$patient_ot_surgery_register_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_ot_surgery_register_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fpatient_ot_surgery_registeradd = currentForm = new ew.Form("fpatient_ot_surgery_registeradd", "add");

// Validate form
fpatient_ot_surgery_registeradd.validate = function() {
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
		<?php if ($patient_ot_surgery_register_add->PatID->Required) { ?>
			elm = this.getElements("x" + infix + "_PatID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register->PatID->caption(), $patient_ot_surgery_register->PatID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_surgery_register_add->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register->PatientName->caption(), $patient_ot_surgery_register->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_surgery_register_add->mrnno->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register->mrnno->caption(), $patient_ot_surgery_register->mrnno->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_surgery_register_add->MobileNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_MobileNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register->MobileNumber->caption(), $patient_ot_surgery_register->MobileNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_surgery_register_add->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register->Age->caption(), $patient_ot_surgery_register->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_surgery_register_add->Gender->Required) { ?>
			elm = this.getElements("x" + infix + "_Gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register->Gender->caption(), $patient_ot_surgery_register->Gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_surgery_register_add->profilePic->Required) { ?>
			elm = this.getElements("x" + infix + "_profilePic");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register->profilePic->caption(), $patient_ot_surgery_register->profilePic->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_surgery_register_add->diagnosis->Required) { ?>
			elm = this.getElements("x" + infix + "_diagnosis");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register->diagnosis->caption(), $patient_ot_surgery_register->diagnosis->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_surgery_register_add->proposedSurgery->Required) { ?>
			elm = this.getElements("x" + infix + "_proposedSurgery");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register->proposedSurgery->caption(), $patient_ot_surgery_register->proposedSurgery->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_surgery_register_add->surgeryProcedure->Required) { ?>
			elm = this.getElements("x" + infix + "_surgeryProcedure");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register->surgeryProcedure->caption(), $patient_ot_surgery_register->surgeryProcedure->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_surgery_register_add->typeOfAnaesthesia->Required) { ?>
			elm = this.getElements("x" + infix + "_typeOfAnaesthesia");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register->typeOfAnaesthesia->caption(), $patient_ot_surgery_register->typeOfAnaesthesia->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_surgery_register_add->RecievedTime->Required) { ?>
			elm = this.getElements("x" + infix + "_RecievedTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register->RecievedTime->caption(), $patient_ot_surgery_register->RecievedTime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RecievedTime");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_ot_surgery_register->RecievedTime->errorMessage()) ?>");
		<?php if ($patient_ot_surgery_register_add->AnaesthesiaStarted->Required) { ?>
			elm = this.getElements("x" + infix + "_AnaesthesiaStarted");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register->AnaesthesiaStarted->caption(), $patient_ot_surgery_register->AnaesthesiaStarted->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AnaesthesiaStarted");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_ot_surgery_register->AnaesthesiaStarted->errorMessage()) ?>");
		<?php if ($patient_ot_surgery_register_add->AnaesthesiaEnded->Required) { ?>
			elm = this.getElements("x" + infix + "_AnaesthesiaEnded");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register->AnaesthesiaEnded->caption(), $patient_ot_surgery_register->AnaesthesiaEnded->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AnaesthesiaEnded");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_ot_surgery_register->AnaesthesiaEnded->errorMessage()) ?>");
		<?php if ($patient_ot_surgery_register_add->surgeryStarted->Required) { ?>
			elm = this.getElements("x" + infix + "_surgeryStarted");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register->surgeryStarted->caption(), $patient_ot_surgery_register->surgeryStarted->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_surgeryStarted");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_ot_surgery_register->surgeryStarted->errorMessage()) ?>");
		<?php if ($patient_ot_surgery_register_add->surgeryEnded->Required) { ?>
			elm = this.getElements("x" + infix + "_surgeryEnded");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register->surgeryEnded->caption(), $patient_ot_surgery_register->surgeryEnded->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_surgeryEnded");
			if (elm && !ew.checkShortEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_ot_surgery_register->surgeryEnded->errorMessage()) ?>");
		<?php if ($patient_ot_surgery_register_add->RecoveryTime->Required) { ?>
			elm = this.getElements("x" + infix + "_RecoveryTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register->RecoveryTime->caption(), $patient_ot_surgery_register->RecoveryTime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RecoveryTime");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_ot_surgery_register->RecoveryTime->errorMessage()) ?>");
		<?php if ($patient_ot_surgery_register_add->ShiftedTime->Required) { ?>
			elm = this.getElements("x" + infix + "_ShiftedTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register->ShiftedTime->caption(), $patient_ot_surgery_register->ShiftedTime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ShiftedTime");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_ot_surgery_register->ShiftedTime->errorMessage()) ?>");
		<?php if ($patient_ot_surgery_register_add->Duration->Required) { ?>
			elm = this.getElements("x" + infix + "_Duration");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register->Duration->caption(), $patient_ot_surgery_register->Duration->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_surgery_register_add->Surgeon->Required) { ?>
			elm = this.getElements("x" + infix + "_Surgeon");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register->Surgeon->caption(), $patient_ot_surgery_register->Surgeon->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_surgery_register_add->Anaesthetist->Required) { ?>
			elm = this.getElements("x" + infix + "_Anaesthetist");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register->Anaesthetist->caption(), $patient_ot_surgery_register->Anaesthetist->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_surgery_register_add->AsstSurgeon1->Required) { ?>
			elm = this.getElements("x" + infix + "_AsstSurgeon1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register->AsstSurgeon1->caption(), $patient_ot_surgery_register->AsstSurgeon1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_surgery_register_add->AsstSurgeon2->Required) { ?>
			elm = this.getElements("x" + infix + "_AsstSurgeon2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register->AsstSurgeon2->caption(), $patient_ot_surgery_register->AsstSurgeon2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_surgery_register_add->paediatric->Required) { ?>
			elm = this.getElements("x" + infix + "_paediatric");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register->paediatric->caption(), $patient_ot_surgery_register->paediatric->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_surgery_register_add->ScrubNurse1->Required) { ?>
			elm = this.getElements("x" + infix + "_ScrubNurse1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register->ScrubNurse1->caption(), $patient_ot_surgery_register->ScrubNurse1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_surgery_register_add->ScrubNurse2->Required) { ?>
			elm = this.getElements("x" + infix + "_ScrubNurse2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register->ScrubNurse2->caption(), $patient_ot_surgery_register->ScrubNurse2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_surgery_register_add->FloorNurse->Required) { ?>
			elm = this.getElements("x" + infix + "_FloorNurse");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register->FloorNurse->caption(), $patient_ot_surgery_register->FloorNurse->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_surgery_register_add->Technician->Required) { ?>
			elm = this.getElements("x" + infix + "_Technician");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register->Technician->caption(), $patient_ot_surgery_register->Technician->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_surgery_register_add->HouseKeeping->Required) { ?>
			elm = this.getElements("x" + infix + "_HouseKeeping");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register->HouseKeeping->caption(), $patient_ot_surgery_register->HouseKeeping->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_surgery_register_add->countsCheckedMops->Required) { ?>
			elm = this.getElements("x" + infix + "_countsCheckedMops");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register->countsCheckedMops->caption(), $patient_ot_surgery_register->countsCheckedMops->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_surgery_register_add->gauze->Required) { ?>
			elm = this.getElements("x" + infix + "_gauze");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register->gauze->caption(), $patient_ot_surgery_register->gauze->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_surgery_register_add->needles->Required) { ?>
			elm = this.getElements("x" + infix + "_needles");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register->needles->caption(), $patient_ot_surgery_register->needles->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_surgery_register_add->bloodloss->Required) { ?>
			elm = this.getElements("x" + infix + "_bloodloss");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register->bloodloss->caption(), $patient_ot_surgery_register->bloodloss->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_surgery_register_add->bloodtransfusion->Required) { ?>
			elm = this.getElements("x" + infix + "_bloodtransfusion");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register->bloodtransfusion->caption(), $patient_ot_surgery_register->bloodtransfusion->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_surgery_register_add->implantsUsed->Required) { ?>
			elm = this.getElements("x" + infix + "_implantsUsed");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register->implantsUsed->caption(), $patient_ot_surgery_register->implantsUsed->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_surgery_register_add->MaterialsForHPE->Required) { ?>
			elm = this.getElements("x" + infix + "_MaterialsForHPE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register->MaterialsForHPE->caption(), $patient_ot_surgery_register->MaterialsForHPE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_surgery_register_add->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register->status->caption(), $patient_ot_surgery_register->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_surgery_register_add->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register->createdby->caption(), $patient_ot_surgery_register->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_surgery_register_add->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register->createddatetime->caption(), $patient_ot_surgery_register->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_surgery_register_add->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register->modifiedby->caption(), $patient_ot_surgery_register->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_surgery_register_add->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register->modifieddatetime->caption(), $patient_ot_surgery_register->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_surgery_register_add->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register->HospID->caption(), $patient_ot_surgery_register->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_surgery_register_add->PatientSearch->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientSearch");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register->PatientSearch->caption(), $patient_ot_surgery_register->PatientSearch->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_surgery_register_add->Reception->Required) { ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register->Reception->caption(), $patient_ot_surgery_register->Reception->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_ot_surgery_register->Reception->errorMessage()) ?>");
		<?php if ($patient_ot_surgery_register_add->PatientID->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register->PatientID->caption(), $patient_ot_surgery_register->PatientID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_surgery_register_add->PId->Required) { ?>
			elm = this.getElements("x" + infix + "_PId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register->PId->caption(), $patient_ot_surgery_register->PId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_ot_surgery_register->PId->errorMessage()) ?>");

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
fpatient_ot_surgery_registeradd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_ot_surgery_registeradd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_ot_surgery_registeradd.lists["x_Surgeon"] = <?php echo $patient_ot_surgery_register_add->Surgeon->Lookup->toClientList() ?>;
fpatient_ot_surgery_registeradd.lists["x_Surgeon"].options = <?php echo JsonEncode($patient_ot_surgery_register_add->Surgeon->lookupOptions()) ?>;
fpatient_ot_surgery_registeradd.lists["x_Anaesthetist"] = <?php echo $patient_ot_surgery_register_add->Anaesthetist->Lookup->toClientList() ?>;
fpatient_ot_surgery_registeradd.lists["x_Anaesthetist"].options = <?php echo JsonEncode($patient_ot_surgery_register_add->Anaesthetist->lookupOptions()) ?>;
fpatient_ot_surgery_registeradd.lists["x_AsstSurgeon1"] = <?php echo $patient_ot_surgery_register_add->AsstSurgeon1->Lookup->toClientList() ?>;
fpatient_ot_surgery_registeradd.lists["x_AsstSurgeon1"].options = <?php echo JsonEncode($patient_ot_surgery_register_add->AsstSurgeon1->lookupOptions()) ?>;
fpatient_ot_surgery_registeradd.lists["x_AsstSurgeon2"] = <?php echo $patient_ot_surgery_register_add->AsstSurgeon2->Lookup->toClientList() ?>;
fpatient_ot_surgery_registeradd.lists["x_AsstSurgeon2"].options = <?php echo JsonEncode($patient_ot_surgery_register_add->AsstSurgeon2->lookupOptions()) ?>;
fpatient_ot_surgery_registeradd.lists["x_paediatric"] = <?php echo $patient_ot_surgery_register_add->paediatric->Lookup->toClientList() ?>;
fpatient_ot_surgery_registeradd.lists["x_paediatric"].options = <?php echo JsonEncode($patient_ot_surgery_register_add->paediatric->lookupOptions()) ?>;
fpatient_ot_surgery_registeradd.lists["x_PatientSearch"] = <?php echo $patient_ot_surgery_register_add->PatientSearch->Lookup->toClientList() ?>;
fpatient_ot_surgery_registeradd.lists["x_PatientSearch"].options = <?php echo JsonEncode($patient_ot_surgery_register_add->PatientSearch->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $patient_ot_surgery_register_add->showPageHeader(); ?>
<?php
$patient_ot_surgery_register_add->showMessage();
?>
<form name="fpatient_ot_surgery_registeradd" id="fpatient_ot_surgery_registeradd" class="<?php echo $patient_ot_surgery_register_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_ot_surgery_register_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_ot_surgery_register_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_ot_surgery_register">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$patient_ot_surgery_register_add->IsModal ?>">
<?php if ($patient_ot_surgery_register->getCurrentMasterTable() == "ip_admission") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?php echo $patient_ot_surgery_register->Reception->getSessionValue() ?>">
<input type="hidden" name="fk_mrnNo" value="<?php echo $patient_ot_surgery_register->mrnno->getSessionValue() ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo $patient_ot_surgery_register->PId->getSessionValue() ?>">
<?php } ?>
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($patient_ot_surgery_register->PatID->Visible) { // PatID ?>
	<div id="r_PatID" class="form-group row">
		<label id="elh_patient_ot_surgery_register_PatID" for="x_PatID" class="<?php echo $patient_ot_surgery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_PatID" class="patient_ot_surgery_registeradd" type="text/html"><span><?php echo $patient_ot_surgery_register->PatID->caption() ?><?php echo ($patient_ot_surgery_register->PatID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_surgery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_surgery_register->PatID->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_PatID" class="patient_ot_surgery_registeradd" type="text/html">
<span id="el_patient_ot_surgery_register_PatID">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register->PatID->EditValue ?>"<?php echo $patient_ot_surgery_register->PatID->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_surgery_register->PatID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_patient_ot_surgery_register_PatientName" for="x_PatientName" class="<?php echo $patient_ot_surgery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_PatientName" class="patient_ot_surgery_registeradd" type="text/html"><span><?php echo $patient_ot_surgery_register->PatientName->caption() ?><?php echo ($patient_ot_surgery_register->PatientName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_surgery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_surgery_register->PatientName->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_PatientName" class="patient_ot_surgery_registeradd" type="text/html">
<span id="el_patient_ot_surgery_register_PatientName">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register->PatientName->EditValue ?>"<?php echo $patient_ot_surgery_register->PatientName->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_surgery_register->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_patient_ot_surgery_register_mrnno" for="x_mrnno" class="<?php echo $patient_ot_surgery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_mrnno" class="patient_ot_surgery_registeradd" type="text/html"><span><?php echo $patient_ot_surgery_register->mrnno->caption() ?><?php echo ($patient_ot_surgery_register->mrnno->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_surgery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_surgery_register->mrnno->cellAttributes() ?>>
<?php if ($patient_ot_surgery_register->mrnno->getSessionValue() <> "") { ?>
<script id="tpx_patient_ot_surgery_register_mrnno" class="patient_ot_surgery_registeradd" type="text/html">
<span id="el_patient_ot_surgery_register_mrnno">
<span<?php echo $patient_ot_surgery_register->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_surgery_register->mrnno->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" id="x_mrnno" name="x_mrnno" value="<?php echo HtmlEncode($patient_ot_surgery_register->mrnno->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_patient_ot_surgery_register_mrnno" class="patient_ot_surgery_registeradd" type="text/html">
<span id="el_patient_ot_surgery_register_mrnno">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register->mrnno->EditValue ?>"<?php echo $patient_ot_surgery_register->mrnno->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php echo $patient_ot_surgery_register->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register->MobileNumber->Visible) { // MobileNumber ?>
	<div id="r_MobileNumber" class="form-group row">
		<label id="elh_patient_ot_surgery_register_MobileNumber" for="x_MobileNumber" class="<?php echo $patient_ot_surgery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_MobileNumber" class="patient_ot_surgery_registeradd" type="text/html"><span><?php echo $patient_ot_surgery_register->MobileNumber->caption() ?><?php echo ($patient_ot_surgery_register->MobileNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_surgery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_surgery_register->MobileNumber->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_MobileNumber" class="patient_ot_surgery_registeradd" type="text/html">
<span id="el_patient_ot_surgery_register_MobileNumber">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register->MobileNumber->EditValue ?>"<?php echo $patient_ot_surgery_register->MobileNumber->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_surgery_register->MobileNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_patient_ot_surgery_register_Age" for="x_Age" class="<?php echo $patient_ot_surgery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_Age" class="patient_ot_surgery_registeradd" type="text/html"><span><?php echo $patient_ot_surgery_register->Age->caption() ?><?php echo ($patient_ot_surgery_register->Age->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_surgery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_surgery_register->Age->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_Age" class="patient_ot_surgery_registeradd" type="text/html">
<span id="el_patient_ot_surgery_register_Age">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register->Age->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register->Age->EditValue ?>"<?php echo $patient_ot_surgery_register->Age->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_surgery_register->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label id="elh_patient_ot_surgery_register_Gender" for="x_Gender" class="<?php echo $patient_ot_surgery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_Gender" class="patient_ot_surgery_registeradd" type="text/html"><span><?php echo $patient_ot_surgery_register->Gender->caption() ?><?php echo ($patient_ot_surgery_register->Gender->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_surgery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_surgery_register->Gender->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_Gender" class="patient_ot_surgery_registeradd" type="text/html">
<span id="el_patient_ot_surgery_register_Gender">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register->Gender->EditValue ?>"<?php echo $patient_ot_surgery_register->Gender->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_surgery_register->Gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_patient_ot_surgery_register_profilePic" for="x_profilePic" class="<?php echo $patient_ot_surgery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_profilePic" class="patient_ot_surgery_registeradd" type="text/html"><span><?php echo $patient_ot_surgery_register->profilePic->caption() ?><?php echo ($patient_ot_surgery_register->profilePic->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_surgery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_surgery_register->profilePic->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_profilePic" class="patient_ot_surgery_registeradd" type="text/html">
<span id="el_patient_ot_surgery_register_profilePic">
<textarea data-table="patient_ot_surgery_register" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register->profilePic->getPlaceHolder()) ?>"<?php echo $patient_ot_surgery_register->profilePic->editAttributes() ?>><?php echo $patient_ot_surgery_register->profilePic->EditValue ?></textarea>
</span>
</script>
<?php echo $patient_ot_surgery_register->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register->diagnosis->Visible) { // diagnosis ?>
	<div id="r_diagnosis" class="form-group row">
		<label id="elh_patient_ot_surgery_register_diagnosis" for="x_diagnosis" class="<?php echo $patient_ot_surgery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_diagnosis" class="patient_ot_surgery_registeradd" type="text/html"><span><?php echo $patient_ot_surgery_register->diagnosis->caption() ?><?php echo ($patient_ot_surgery_register->diagnosis->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_surgery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_surgery_register->diagnosis->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_diagnosis" class="patient_ot_surgery_registeradd" type="text/html">
<span id="el_patient_ot_surgery_register_diagnosis">
<textarea data-table="patient_ot_surgery_register" data-field="x_diagnosis" name="x_diagnosis" id="x_diagnosis" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register->diagnosis->getPlaceHolder()) ?>"<?php echo $patient_ot_surgery_register->diagnosis->editAttributes() ?>><?php echo $patient_ot_surgery_register->diagnosis->EditValue ?></textarea>
</span>
</script>
<?php echo $patient_ot_surgery_register->diagnosis->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register->proposedSurgery->Visible) { // proposedSurgery ?>
	<div id="r_proposedSurgery" class="form-group row">
		<label id="elh_patient_ot_surgery_register_proposedSurgery" for="x_proposedSurgery" class="<?php echo $patient_ot_surgery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_proposedSurgery" class="patient_ot_surgery_registeradd" type="text/html"><span><?php echo $patient_ot_surgery_register->proposedSurgery->caption() ?><?php echo ($patient_ot_surgery_register->proposedSurgery->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_surgery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_surgery_register->proposedSurgery->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_proposedSurgery" class="patient_ot_surgery_registeradd" type="text/html">
<span id="el_patient_ot_surgery_register_proposedSurgery">
<textarea data-table="patient_ot_surgery_register" data-field="x_proposedSurgery" name="x_proposedSurgery" id="x_proposedSurgery" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register->proposedSurgery->getPlaceHolder()) ?>"<?php echo $patient_ot_surgery_register->proposedSurgery->editAttributes() ?>><?php echo $patient_ot_surgery_register->proposedSurgery->EditValue ?></textarea>
</span>
</script>
<?php echo $patient_ot_surgery_register->proposedSurgery->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register->surgeryProcedure->Visible) { // surgeryProcedure ?>
	<div id="r_surgeryProcedure" class="form-group row">
		<label id="elh_patient_ot_surgery_register_surgeryProcedure" for="x_surgeryProcedure" class="<?php echo $patient_ot_surgery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_surgeryProcedure" class="patient_ot_surgery_registeradd" type="text/html"><span><?php echo $patient_ot_surgery_register->surgeryProcedure->caption() ?><?php echo ($patient_ot_surgery_register->surgeryProcedure->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_surgery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_surgery_register->surgeryProcedure->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_surgeryProcedure" class="patient_ot_surgery_registeradd" type="text/html">
<span id="el_patient_ot_surgery_register_surgeryProcedure">
<textarea data-table="patient_ot_surgery_register" data-field="x_surgeryProcedure" name="x_surgeryProcedure" id="x_surgeryProcedure" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register->surgeryProcedure->getPlaceHolder()) ?>"<?php echo $patient_ot_surgery_register->surgeryProcedure->editAttributes() ?>><?php echo $patient_ot_surgery_register->surgeryProcedure->EditValue ?></textarea>
</span>
</script>
<?php echo $patient_ot_surgery_register->surgeryProcedure->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register->typeOfAnaesthesia->Visible) { // typeOfAnaesthesia ?>
	<div id="r_typeOfAnaesthesia" class="form-group row">
		<label id="elh_patient_ot_surgery_register_typeOfAnaesthesia" for="x_typeOfAnaesthesia" class="<?php echo $patient_ot_surgery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_typeOfAnaesthesia" class="patient_ot_surgery_registeradd" type="text/html"><span><?php echo $patient_ot_surgery_register->typeOfAnaesthesia->caption() ?><?php echo ($patient_ot_surgery_register->typeOfAnaesthesia->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_surgery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_surgery_register->typeOfAnaesthesia->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_typeOfAnaesthesia" class="patient_ot_surgery_registeradd" type="text/html">
<span id="el_patient_ot_surgery_register_typeOfAnaesthesia">
<textarea data-table="patient_ot_surgery_register" data-field="x_typeOfAnaesthesia" name="x_typeOfAnaesthesia" id="x_typeOfAnaesthesia" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register->typeOfAnaesthesia->getPlaceHolder()) ?>"<?php echo $patient_ot_surgery_register->typeOfAnaesthesia->editAttributes() ?>><?php echo $patient_ot_surgery_register->typeOfAnaesthesia->EditValue ?></textarea>
</span>
</script>
<?php echo $patient_ot_surgery_register->typeOfAnaesthesia->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register->RecievedTime->Visible) { // RecievedTime ?>
	<div id="r_RecievedTime" class="form-group row">
		<label id="elh_patient_ot_surgery_register_RecievedTime" for="x_RecievedTime" class="<?php echo $patient_ot_surgery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_RecievedTime" class="patient_ot_surgery_registeradd" type="text/html"><span><?php echo $patient_ot_surgery_register->RecievedTime->caption() ?><?php echo ($patient_ot_surgery_register->RecievedTime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_surgery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_surgery_register->RecievedTime->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_RecievedTime" class="patient_ot_surgery_registeradd" type="text/html">
<span id="el_patient_ot_surgery_register_RecievedTime">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_RecievedTime" data-format="11" name="x_RecievedTime" id="x_RecievedTime" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register->RecievedTime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register->RecievedTime->EditValue ?>"<?php echo $patient_ot_surgery_register->RecievedTime->editAttributes() ?>>
<?php if (!$patient_ot_surgery_register->RecievedTime->ReadOnly && !$patient_ot_surgery_register->RecievedTime->Disabled && !isset($patient_ot_surgery_register->RecievedTime->EditAttrs["readonly"]) && !isset($patient_ot_surgery_register->RecievedTime->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_ot_surgery_registeradd_js">
ew.createDateTimePicker("fpatient_ot_surgery_registeradd", "x_RecievedTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php echo $patient_ot_surgery_register->RecievedTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register->AnaesthesiaStarted->Visible) { // AnaesthesiaStarted ?>
	<div id="r_AnaesthesiaStarted" class="form-group row">
		<label id="elh_patient_ot_surgery_register_AnaesthesiaStarted" for="x_AnaesthesiaStarted" class="<?php echo $patient_ot_surgery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_AnaesthesiaStarted" class="patient_ot_surgery_registeradd" type="text/html"><span><?php echo $patient_ot_surgery_register->AnaesthesiaStarted->caption() ?><?php echo ($patient_ot_surgery_register->AnaesthesiaStarted->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_surgery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_surgery_register->AnaesthesiaStarted->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_AnaesthesiaStarted" class="patient_ot_surgery_registeradd" type="text/html">
<span id="el_patient_ot_surgery_register_AnaesthesiaStarted">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_AnaesthesiaStarted" data-format="11" name="x_AnaesthesiaStarted" id="x_AnaesthesiaStarted" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register->AnaesthesiaStarted->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register->AnaesthesiaStarted->EditValue ?>"<?php echo $patient_ot_surgery_register->AnaesthesiaStarted->editAttributes() ?>>
<?php if (!$patient_ot_surgery_register->AnaesthesiaStarted->ReadOnly && !$patient_ot_surgery_register->AnaesthesiaStarted->Disabled && !isset($patient_ot_surgery_register->AnaesthesiaStarted->EditAttrs["readonly"]) && !isset($patient_ot_surgery_register->AnaesthesiaStarted->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_ot_surgery_registeradd_js">
ew.createDateTimePicker("fpatient_ot_surgery_registeradd", "x_AnaesthesiaStarted", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php echo $patient_ot_surgery_register->AnaesthesiaStarted->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register->AnaesthesiaEnded->Visible) { // AnaesthesiaEnded ?>
	<div id="r_AnaesthesiaEnded" class="form-group row">
		<label id="elh_patient_ot_surgery_register_AnaesthesiaEnded" for="x_AnaesthesiaEnded" class="<?php echo $patient_ot_surgery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_AnaesthesiaEnded" class="patient_ot_surgery_registeradd" type="text/html"><span><?php echo $patient_ot_surgery_register->AnaesthesiaEnded->caption() ?><?php echo ($patient_ot_surgery_register->AnaesthesiaEnded->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_surgery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_surgery_register->AnaesthesiaEnded->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_AnaesthesiaEnded" class="patient_ot_surgery_registeradd" type="text/html">
<span id="el_patient_ot_surgery_register_AnaesthesiaEnded">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_AnaesthesiaEnded" data-format="11" name="x_AnaesthesiaEnded" id="x_AnaesthesiaEnded" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register->AnaesthesiaEnded->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register->AnaesthesiaEnded->EditValue ?>"<?php echo $patient_ot_surgery_register->AnaesthesiaEnded->editAttributes() ?>>
<?php if (!$patient_ot_surgery_register->AnaesthesiaEnded->ReadOnly && !$patient_ot_surgery_register->AnaesthesiaEnded->Disabled && !isset($patient_ot_surgery_register->AnaesthesiaEnded->EditAttrs["readonly"]) && !isset($patient_ot_surgery_register->AnaesthesiaEnded->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_ot_surgery_registeradd_js">
ew.createDateTimePicker("fpatient_ot_surgery_registeradd", "x_AnaesthesiaEnded", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php echo $patient_ot_surgery_register->AnaesthesiaEnded->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register->surgeryStarted->Visible) { // surgeryStarted ?>
	<div id="r_surgeryStarted" class="form-group row">
		<label id="elh_patient_ot_surgery_register_surgeryStarted" for="x_surgeryStarted" class="<?php echo $patient_ot_surgery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_surgeryStarted" class="patient_ot_surgery_registeradd" type="text/html"><span><?php echo $patient_ot_surgery_register->surgeryStarted->caption() ?><?php echo ($patient_ot_surgery_register->surgeryStarted->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_surgery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_surgery_register->surgeryStarted->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_surgeryStarted" class="patient_ot_surgery_registeradd" type="text/html">
<span id="el_patient_ot_surgery_register_surgeryStarted">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_surgeryStarted" data-format="11" name="x_surgeryStarted" id="x_surgeryStarted" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register->surgeryStarted->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register->surgeryStarted->EditValue ?>"<?php echo $patient_ot_surgery_register->surgeryStarted->editAttributes() ?>>
<?php if (!$patient_ot_surgery_register->surgeryStarted->ReadOnly && !$patient_ot_surgery_register->surgeryStarted->Disabled && !isset($patient_ot_surgery_register->surgeryStarted->EditAttrs["readonly"]) && !isset($patient_ot_surgery_register->surgeryStarted->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_ot_surgery_registeradd_js">
ew.createDateTimePicker("fpatient_ot_surgery_registeradd", "x_surgeryStarted", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php echo $patient_ot_surgery_register->surgeryStarted->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register->surgeryEnded->Visible) { // surgeryEnded ?>
	<div id="r_surgeryEnded" class="form-group row">
		<label id="elh_patient_ot_surgery_register_surgeryEnded" for="x_surgeryEnded" class="<?php echo $patient_ot_surgery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_surgeryEnded" class="patient_ot_surgery_registeradd" type="text/html"><span><?php echo $patient_ot_surgery_register->surgeryEnded->caption() ?><?php echo ($patient_ot_surgery_register->surgeryEnded->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_surgery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_surgery_register->surgeryEnded->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_surgeryEnded" class="patient_ot_surgery_registeradd" type="text/html">
<span id="el_patient_ot_surgery_register_surgeryEnded">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_surgeryEnded" data-format="17" name="x_surgeryEnded" id="x_surgeryEnded" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register->surgeryEnded->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register->surgeryEnded->EditValue ?>"<?php echo $patient_ot_surgery_register->surgeryEnded->editAttributes() ?>>
<?php if (!$patient_ot_surgery_register->surgeryEnded->ReadOnly && !$patient_ot_surgery_register->surgeryEnded->Disabled && !isset($patient_ot_surgery_register->surgeryEnded->EditAttrs["readonly"]) && !isset($patient_ot_surgery_register->surgeryEnded->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_ot_surgery_registeradd_js">
ew.createDateTimePicker("fpatient_ot_surgery_registeradd", "x_surgeryEnded", {"ignoreReadonly":true,"useCurrent":false,"format":17});
</script>
<?php echo $patient_ot_surgery_register->surgeryEnded->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register->RecoveryTime->Visible) { // RecoveryTime ?>
	<div id="r_RecoveryTime" class="form-group row">
		<label id="elh_patient_ot_surgery_register_RecoveryTime" for="x_RecoveryTime" class="<?php echo $patient_ot_surgery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_RecoveryTime" class="patient_ot_surgery_registeradd" type="text/html"><span><?php echo $patient_ot_surgery_register->RecoveryTime->caption() ?><?php echo ($patient_ot_surgery_register->RecoveryTime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_surgery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_surgery_register->RecoveryTime->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_RecoveryTime" class="patient_ot_surgery_registeradd" type="text/html">
<span id="el_patient_ot_surgery_register_RecoveryTime">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_RecoveryTime" data-format="11" name="x_RecoveryTime" id="x_RecoveryTime" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register->RecoveryTime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register->RecoveryTime->EditValue ?>"<?php echo $patient_ot_surgery_register->RecoveryTime->editAttributes() ?>>
<?php if (!$patient_ot_surgery_register->RecoveryTime->ReadOnly && !$patient_ot_surgery_register->RecoveryTime->Disabled && !isset($patient_ot_surgery_register->RecoveryTime->EditAttrs["readonly"]) && !isset($patient_ot_surgery_register->RecoveryTime->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_ot_surgery_registeradd_js">
ew.createDateTimePicker("fpatient_ot_surgery_registeradd", "x_RecoveryTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php echo $patient_ot_surgery_register->RecoveryTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register->ShiftedTime->Visible) { // ShiftedTime ?>
	<div id="r_ShiftedTime" class="form-group row">
		<label id="elh_patient_ot_surgery_register_ShiftedTime" for="x_ShiftedTime" class="<?php echo $patient_ot_surgery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_ShiftedTime" class="patient_ot_surgery_registeradd" type="text/html"><span><?php echo $patient_ot_surgery_register->ShiftedTime->caption() ?><?php echo ($patient_ot_surgery_register->ShiftedTime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_surgery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_surgery_register->ShiftedTime->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_ShiftedTime" class="patient_ot_surgery_registeradd" type="text/html">
<span id="el_patient_ot_surgery_register_ShiftedTime">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_ShiftedTime" data-format="11" name="x_ShiftedTime" id="x_ShiftedTime" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register->ShiftedTime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register->ShiftedTime->EditValue ?>"<?php echo $patient_ot_surgery_register->ShiftedTime->editAttributes() ?>>
<?php if (!$patient_ot_surgery_register->ShiftedTime->ReadOnly && !$patient_ot_surgery_register->ShiftedTime->Disabled && !isset($patient_ot_surgery_register->ShiftedTime->EditAttrs["readonly"]) && !isset($patient_ot_surgery_register->ShiftedTime->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_ot_surgery_registeradd_js">
ew.createDateTimePicker("fpatient_ot_surgery_registeradd", "x_ShiftedTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php echo $patient_ot_surgery_register->ShiftedTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register->Duration->Visible) { // Duration ?>
	<div id="r_Duration" class="form-group row">
		<label id="elh_patient_ot_surgery_register_Duration" for="x_Duration" class="<?php echo $patient_ot_surgery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_Duration" class="patient_ot_surgery_registeradd" type="text/html"><span><?php echo $patient_ot_surgery_register->Duration->caption() ?><?php echo ($patient_ot_surgery_register->Duration->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_surgery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_surgery_register->Duration->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_Duration" class="patient_ot_surgery_registeradd" type="text/html">
<span id="el_patient_ot_surgery_register_Duration">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_Duration" name="x_Duration" id="x_Duration" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register->Duration->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register->Duration->EditValue ?>"<?php echo $patient_ot_surgery_register->Duration->editAttributes() ?>>
<?php if (!$patient_ot_surgery_register->Duration->ReadOnly && !$patient_ot_surgery_register->Duration->Disabled && !isset($patient_ot_surgery_register->Duration->EditAttrs["readonly"]) && !isset($patient_ot_surgery_register->Duration->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_ot_surgery_registeradd_js">ew.createTimePicker("fpatient_ot_surgery_registeradd", "x_Duration", {"timeFormat":"h:i A","step":15});
</script>
<?php echo $patient_ot_surgery_register->Duration->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register->Surgeon->Visible) { // Surgeon ?>
	<div id="r_Surgeon" class="form-group row">
		<label id="elh_patient_ot_surgery_register_Surgeon" for="x_Surgeon" class="<?php echo $patient_ot_surgery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_Surgeon" class="patient_ot_surgery_registeradd" type="text/html"><span><?php echo $patient_ot_surgery_register->Surgeon->caption() ?><?php echo ($patient_ot_surgery_register->Surgeon->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_surgery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_surgery_register->Surgeon->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_Surgeon" class="patient_ot_surgery_registeradd" type="text/html">
<span id="el_patient_ot_surgery_register_Surgeon">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_ot_surgery_register" data-field="x_Surgeon" data-value-separator="<?php echo $patient_ot_surgery_register->Surgeon->displayValueSeparatorAttribute() ?>" id="x_Surgeon" name="x_Surgeon"<?php echo $patient_ot_surgery_register->Surgeon->editAttributes() ?>>
		<?php echo $patient_ot_surgery_register->Surgeon->selectOptionListHtml("x_Surgeon") ?>
	</select>
</div>
<?php echo $patient_ot_surgery_register->Surgeon->Lookup->getParamTag("p_x_Surgeon") ?>
</span>
</script>
<?php echo $patient_ot_surgery_register->Surgeon->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register->Anaesthetist->Visible) { // Anaesthetist ?>
	<div id="r_Anaesthetist" class="form-group row">
		<label id="elh_patient_ot_surgery_register_Anaesthetist" for="x_Anaesthetist" class="<?php echo $patient_ot_surgery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_Anaesthetist" class="patient_ot_surgery_registeradd" type="text/html"><span><?php echo $patient_ot_surgery_register->Anaesthetist->caption() ?><?php echo ($patient_ot_surgery_register->Anaesthetist->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_surgery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_surgery_register->Anaesthetist->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_Anaesthetist" class="patient_ot_surgery_registeradd" type="text/html">
<span id="el_patient_ot_surgery_register_Anaesthetist">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_ot_surgery_register" data-field="x_Anaesthetist" data-value-separator="<?php echo $patient_ot_surgery_register->Anaesthetist->displayValueSeparatorAttribute() ?>" id="x_Anaesthetist" name="x_Anaesthetist"<?php echo $patient_ot_surgery_register->Anaesthetist->editAttributes() ?>>
		<?php echo $patient_ot_surgery_register->Anaesthetist->selectOptionListHtml("x_Anaesthetist") ?>
	</select>
</div>
<?php echo $patient_ot_surgery_register->Anaesthetist->Lookup->getParamTag("p_x_Anaesthetist") ?>
</span>
</script>
<?php echo $patient_ot_surgery_register->Anaesthetist->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register->AsstSurgeon1->Visible) { // AsstSurgeon1 ?>
	<div id="r_AsstSurgeon1" class="form-group row">
		<label id="elh_patient_ot_surgery_register_AsstSurgeon1" for="x_AsstSurgeon1" class="<?php echo $patient_ot_surgery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_AsstSurgeon1" class="patient_ot_surgery_registeradd" type="text/html"><span><?php echo $patient_ot_surgery_register->AsstSurgeon1->caption() ?><?php echo ($patient_ot_surgery_register->AsstSurgeon1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_surgery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_surgery_register->AsstSurgeon1->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_AsstSurgeon1" class="patient_ot_surgery_registeradd" type="text/html">
<span id="el_patient_ot_surgery_register_AsstSurgeon1">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_ot_surgery_register" data-field="x_AsstSurgeon1" data-value-separator="<?php echo $patient_ot_surgery_register->AsstSurgeon1->displayValueSeparatorAttribute() ?>" id="x_AsstSurgeon1" name="x_AsstSurgeon1"<?php echo $patient_ot_surgery_register->AsstSurgeon1->editAttributes() ?>>
		<?php echo $patient_ot_surgery_register->AsstSurgeon1->selectOptionListHtml("x_AsstSurgeon1") ?>
	</select>
</div>
<?php echo $patient_ot_surgery_register->AsstSurgeon1->Lookup->getParamTag("p_x_AsstSurgeon1") ?>
</span>
</script>
<?php echo $patient_ot_surgery_register->AsstSurgeon1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register->AsstSurgeon2->Visible) { // AsstSurgeon2 ?>
	<div id="r_AsstSurgeon2" class="form-group row">
		<label id="elh_patient_ot_surgery_register_AsstSurgeon2" for="x_AsstSurgeon2" class="<?php echo $patient_ot_surgery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_AsstSurgeon2" class="patient_ot_surgery_registeradd" type="text/html"><span><?php echo $patient_ot_surgery_register->AsstSurgeon2->caption() ?><?php echo ($patient_ot_surgery_register->AsstSurgeon2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_surgery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_surgery_register->AsstSurgeon2->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_AsstSurgeon2" class="patient_ot_surgery_registeradd" type="text/html">
<span id="el_patient_ot_surgery_register_AsstSurgeon2">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_ot_surgery_register" data-field="x_AsstSurgeon2" data-value-separator="<?php echo $patient_ot_surgery_register->AsstSurgeon2->displayValueSeparatorAttribute() ?>" id="x_AsstSurgeon2" name="x_AsstSurgeon2"<?php echo $patient_ot_surgery_register->AsstSurgeon2->editAttributes() ?>>
		<?php echo $patient_ot_surgery_register->AsstSurgeon2->selectOptionListHtml("x_AsstSurgeon2") ?>
	</select>
</div>
<?php echo $patient_ot_surgery_register->AsstSurgeon2->Lookup->getParamTag("p_x_AsstSurgeon2") ?>
</span>
</script>
<?php echo $patient_ot_surgery_register->AsstSurgeon2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register->paediatric->Visible) { // paediatric ?>
	<div id="r_paediatric" class="form-group row">
		<label id="elh_patient_ot_surgery_register_paediatric" for="x_paediatric" class="<?php echo $patient_ot_surgery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_paediatric" class="patient_ot_surgery_registeradd" type="text/html"><span><?php echo $patient_ot_surgery_register->paediatric->caption() ?><?php echo ($patient_ot_surgery_register->paediatric->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_surgery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_surgery_register->paediatric->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_paediatric" class="patient_ot_surgery_registeradd" type="text/html">
<span id="el_patient_ot_surgery_register_paediatric">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_ot_surgery_register" data-field="x_paediatric" data-value-separator="<?php echo $patient_ot_surgery_register->paediatric->displayValueSeparatorAttribute() ?>" id="x_paediatric" name="x_paediatric"<?php echo $patient_ot_surgery_register->paediatric->editAttributes() ?>>
		<?php echo $patient_ot_surgery_register->paediatric->selectOptionListHtml("x_paediatric") ?>
	</select>
</div>
<?php echo $patient_ot_surgery_register->paediatric->Lookup->getParamTag("p_x_paediatric") ?>
</span>
</script>
<?php echo $patient_ot_surgery_register->paediatric->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register->ScrubNurse1->Visible) { // ScrubNurse1 ?>
	<div id="r_ScrubNurse1" class="form-group row">
		<label id="elh_patient_ot_surgery_register_ScrubNurse1" for="x_ScrubNurse1" class="<?php echo $patient_ot_surgery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_ScrubNurse1" class="patient_ot_surgery_registeradd" type="text/html"><span><?php echo $patient_ot_surgery_register->ScrubNurse1->caption() ?><?php echo ($patient_ot_surgery_register->ScrubNurse1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_surgery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_surgery_register->ScrubNurse1->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_ScrubNurse1" class="patient_ot_surgery_registeradd" type="text/html">
<span id="el_patient_ot_surgery_register_ScrubNurse1">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_ScrubNurse1" name="x_ScrubNurse1" id="x_ScrubNurse1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register->ScrubNurse1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register->ScrubNurse1->EditValue ?>"<?php echo $patient_ot_surgery_register->ScrubNurse1->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_surgery_register->ScrubNurse1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register->ScrubNurse2->Visible) { // ScrubNurse2 ?>
	<div id="r_ScrubNurse2" class="form-group row">
		<label id="elh_patient_ot_surgery_register_ScrubNurse2" for="x_ScrubNurse2" class="<?php echo $patient_ot_surgery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_ScrubNurse2" class="patient_ot_surgery_registeradd" type="text/html"><span><?php echo $patient_ot_surgery_register->ScrubNurse2->caption() ?><?php echo ($patient_ot_surgery_register->ScrubNurse2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_surgery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_surgery_register->ScrubNurse2->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_ScrubNurse2" class="patient_ot_surgery_registeradd" type="text/html">
<span id="el_patient_ot_surgery_register_ScrubNurse2">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_ScrubNurse2" name="x_ScrubNurse2" id="x_ScrubNurse2" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register->ScrubNurse2->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register->ScrubNurse2->EditValue ?>"<?php echo $patient_ot_surgery_register->ScrubNurse2->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_surgery_register->ScrubNurse2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register->FloorNurse->Visible) { // FloorNurse ?>
	<div id="r_FloorNurse" class="form-group row">
		<label id="elh_patient_ot_surgery_register_FloorNurse" for="x_FloorNurse" class="<?php echo $patient_ot_surgery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_FloorNurse" class="patient_ot_surgery_registeradd" type="text/html"><span><?php echo $patient_ot_surgery_register->FloorNurse->caption() ?><?php echo ($patient_ot_surgery_register->FloorNurse->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_surgery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_surgery_register->FloorNurse->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_FloorNurse" class="patient_ot_surgery_registeradd" type="text/html">
<span id="el_patient_ot_surgery_register_FloorNurse">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_FloorNurse" name="x_FloorNurse" id="x_FloorNurse" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register->FloorNurse->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register->FloorNurse->EditValue ?>"<?php echo $patient_ot_surgery_register->FloorNurse->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_surgery_register->FloorNurse->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register->Technician->Visible) { // Technician ?>
	<div id="r_Technician" class="form-group row">
		<label id="elh_patient_ot_surgery_register_Technician" for="x_Technician" class="<?php echo $patient_ot_surgery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_Technician" class="patient_ot_surgery_registeradd" type="text/html"><span><?php echo $patient_ot_surgery_register->Technician->caption() ?><?php echo ($patient_ot_surgery_register->Technician->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_surgery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_surgery_register->Technician->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_Technician" class="patient_ot_surgery_registeradd" type="text/html">
<span id="el_patient_ot_surgery_register_Technician">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_Technician" name="x_Technician" id="x_Technician" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register->Technician->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register->Technician->EditValue ?>"<?php echo $patient_ot_surgery_register->Technician->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_surgery_register->Technician->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register->HouseKeeping->Visible) { // HouseKeeping ?>
	<div id="r_HouseKeeping" class="form-group row">
		<label id="elh_patient_ot_surgery_register_HouseKeeping" for="x_HouseKeeping" class="<?php echo $patient_ot_surgery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_HouseKeeping" class="patient_ot_surgery_registeradd" type="text/html"><span><?php echo $patient_ot_surgery_register->HouseKeeping->caption() ?><?php echo ($patient_ot_surgery_register->HouseKeeping->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_surgery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_surgery_register->HouseKeeping->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_HouseKeeping" class="patient_ot_surgery_registeradd" type="text/html">
<span id="el_patient_ot_surgery_register_HouseKeeping">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_HouseKeeping" name="x_HouseKeeping" id="x_HouseKeeping" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register->HouseKeeping->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register->HouseKeeping->EditValue ?>"<?php echo $patient_ot_surgery_register->HouseKeeping->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_surgery_register->HouseKeeping->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register->countsCheckedMops->Visible) { // countsCheckedMops ?>
	<div id="r_countsCheckedMops" class="form-group row">
		<label id="elh_patient_ot_surgery_register_countsCheckedMops" for="x_countsCheckedMops" class="<?php echo $patient_ot_surgery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_countsCheckedMops" class="patient_ot_surgery_registeradd" type="text/html"><span><?php echo $patient_ot_surgery_register->countsCheckedMops->caption() ?><?php echo ($patient_ot_surgery_register->countsCheckedMops->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_surgery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_surgery_register->countsCheckedMops->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_countsCheckedMops" class="patient_ot_surgery_registeradd" type="text/html">
<span id="el_patient_ot_surgery_register_countsCheckedMops">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_countsCheckedMops" name="x_countsCheckedMops" id="x_countsCheckedMops" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register->countsCheckedMops->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register->countsCheckedMops->EditValue ?>"<?php echo $patient_ot_surgery_register->countsCheckedMops->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_surgery_register->countsCheckedMops->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register->gauze->Visible) { // gauze ?>
	<div id="r_gauze" class="form-group row">
		<label id="elh_patient_ot_surgery_register_gauze" for="x_gauze" class="<?php echo $patient_ot_surgery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_gauze" class="patient_ot_surgery_registeradd" type="text/html"><span><?php echo $patient_ot_surgery_register->gauze->caption() ?><?php echo ($patient_ot_surgery_register->gauze->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_surgery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_surgery_register->gauze->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_gauze" class="patient_ot_surgery_registeradd" type="text/html">
<span id="el_patient_ot_surgery_register_gauze">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_gauze" name="x_gauze" id="x_gauze" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register->gauze->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register->gauze->EditValue ?>"<?php echo $patient_ot_surgery_register->gauze->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_surgery_register->gauze->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register->needles->Visible) { // needles ?>
	<div id="r_needles" class="form-group row">
		<label id="elh_patient_ot_surgery_register_needles" for="x_needles" class="<?php echo $patient_ot_surgery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_needles" class="patient_ot_surgery_registeradd" type="text/html"><span><?php echo $patient_ot_surgery_register->needles->caption() ?><?php echo ($patient_ot_surgery_register->needles->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_surgery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_surgery_register->needles->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_needles" class="patient_ot_surgery_registeradd" type="text/html">
<span id="el_patient_ot_surgery_register_needles">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_needles" name="x_needles" id="x_needles" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register->needles->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register->needles->EditValue ?>"<?php echo $patient_ot_surgery_register->needles->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_surgery_register->needles->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register->bloodloss->Visible) { // bloodloss ?>
	<div id="r_bloodloss" class="form-group row">
		<label id="elh_patient_ot_surgery_register_bloodloss" for="x_bloodloss" class="<?php echo $patient_ot_surgery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_bloodloss" class="patient_ot_surgery_registeradd" type="text/html"><span><?php echo $patient_ot_surgery_register->bloodloss->caption() ?><?php echo ($patient_ot_surgery_register->bloodloss->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_surgery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_surgery_register->bloodloss->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_bloodloss" class="patient_ot_surgery_registeradd" type="text/html">
<span id="el_patient_ot_surgery_register_bloodloss">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_bloodloss" name="x_bloodloss" id="x_bloodloss" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register->bloodloss->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register->bloodloss->EditValue ?>"<?php echo $patient_ot_surgery_register->bloodloss->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_surgery_register->bloodloss->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register->bloodtransfusion->Visible) { // bloodtransfusion ?>
	<div id="r_bloodtransfusion" class="form-group row">
		<label id="elh_patient_ot_surgery_register_bloodtransfusion" for="x_bloodtransfusion" class="<?php echo $patient_ot_surgery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_bloodtransfusion" class="patient_ot_surgery_registeradd" type="text/html"><span><?php echo $patient_ot_surgery_register->bloodtransfusion->caption() ?><?php echo ($patient_ot_surgery_register->bloodtransfusion->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_surgery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_surgery_register->bloodtransfusion->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_bloodtransfusion" class="patient_ot_surgery_registeradd" type="text/html">
<span id="el_patient_ot_surgery_register_bloodtransfusion">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_bloodtransfusion" name="x_bloodtransfusion" id="x_bloodtransfusion" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register->bloodtransfusion->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register->bloodtransfusion->EditValue ?>"<?php echo $patient_ot_surgery_register->bloodtransfusion->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_surgery_register->bloodtransfusion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register->implantsUsed->Visible) { // implantsUsed ?>
	<div id="r_implantsUsed" class="form-group row">
		<label id="elh_patient_ot_surgery_register_implantsUsed" for="x_implantsUsed" class="<?php echo $patient_ot_surgery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_implantsUsed" class="patient_ot_surgery_registeradd" type="text/html"><span><?php echo $patient_ot_surgery_register->implantsUsed->caption() ?><?php echo ($patient_ot_surgery_register->implantsUsed->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_surgery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_surgery_register->implantsUsed->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_implantsUsed" class="patient_ot_surgery_registeradd" type="text/html">
<span id="el_patient_ot_surgery_register_implantsUsed">
<textarea data-table="patient_ot_surgery_register" data-field="x_implantsUsed" name="x_implantsUsed" id="x_implantsUsed" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register->implantsUsed->getPlaceHolder()) ?>"<?php echo $patient_ot_surgery_register->implantsUsed->editAttributes() ?>><?php echo $patient_ot_surgery_register->implantsUsed->EditValue ?></textarea>
</span>
</script>
<?php echo $patient_ot_surgery_register->implantsUsed->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register->MaterialsForHPE->Visible) { // MaterialsForHPE ?>
	<div id="r_MaterialsForHPE" class="form-group row">
		<label id="elh_patient_ot_surgery_register_MaterialsForHPE" for="x_MaterialsForHPE" class="<?php echo $patient_ot_surgery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_MaterialsForHPE" class="patient_ot_surgery_registeradd" type="text/html"><span><?php echo $patient_ot_surgery_register->MaterialsForHPE->caption() ?><?php echo ($patient_ot_surgery_register->MaterialsForHPE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_surgery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_surgery_register->MaterialsForHPE->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_MaterialsForHPE" class="patient_ot_surgery_registeradd" type="text/html">
<span id="el_patient_ot_surgery_register_MaterialsForHPE">
<textarea data-table="patient_ot_surgery_register" data-field="x_MaterialsForHPE" name="x_MaterialsForHPE" id="x_MaterialsForHPE" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register->MaterialsForHPE->getPlaceHolder()) ?>"<?php echo $patient_ot_surgery_register->MaterialsForHPE->editAttributes() ?>><?php echo $patient_ot_surgery_register->MaterialsForHPE->EditValue ?></textarea>
</span>
</script>
<?php echo $patient_ot_surgery_register->MaterialsForHPE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register->PatientSearch->Visible) { // PatientSearch ?>
	<div id="r_PatientSearch" class="form-group row">
		<label id="elh_patient_ot_surgery_register_PatientSearch" for="x_PatientSearch" class="<?php echo $patient_ot_surgery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_PatientSearch" class="patient_ot_surgery_registeradd" type="text/html"><span><?php echo $patient_ot_surgery_register->PatientSearch->caption() ?><?php echo ($patient_ot_surgery_register->PatientSearch->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_surgery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_surgery_register->PatientSearch->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_PatientSearch" class="patient_ot_surgery_registeradd" type="text/html">
<span id="el_patient_ot_surgery_register_PatientSearch">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PatientSearch"><?php echo strval($patient_ot_surgery_register->PatientSearch->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($patient_ot_surgery_register->PatientSearch->ViewValue) : $patient_ot_surgery_register->PatientSearch->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_ot_surgery_register->PatientSearch->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($patient_ot_surgery_register->PatientSearch->ReadOnly || $patient_ot_surgery_register->PatientSearch->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_PatientSearch',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_ot_surgery_register->PatientSearch->Lookup->getParamTag("p_x_PatientSearch") ?>
<input type="hidden" data-table="patient_ot_surgery_register" data-field="x_PatientSearch" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_ot_surgery_register->PatientSearch->displayValueSeparatorAttribute() ?>" name="x_PatientSearch" id="x_PatientSearch" value="<?php echo $patient_ot_surgery_register->PatientSearch->CurrentValue ?>"<?php echo $patient_ot_surgery_register->PatientSearch->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_surgery_register->PatientSearch->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_patient_ot_surgery_register_Reception" for="x_Reception" class="<?php echo $patient_ot_surgery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_Reception" class="patient_ot_surgery_registeradd" type="text/html"><span><?php echo $patient_ot_surgery_register->Reception->caption() ?><?php echo ($patient_ot_surgery_register->Reception->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_surgery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_surgery_register->Reception->cellAttributes() ?>>
<?php if ($patient_ot_surgery_register->Reception->getSessionValue() <> "") { ?>
<script id="tpx_patient_ot_surgery_register_Reception" class="patient_ot_surgery_registeradd" type="text/html">
<span id="el_patient_ot_surgery_register_Reception">
<span<?php echo $patient_ot_surgery_register->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_surgery_register->Reception->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" id="x_Reception" name="x_Reception" value="<?php echo HtmlEncode($patient_ot_surgery_register->Reception->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_patient_ot_surgery_register_Reception" class="patient_ot_surgery_registeradd" type="text/html">
<span id="el_patient_ot_surgery_register_Reception">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register->Reception->EditValue ?>"<?php echo $patient_ot_surgery_register->Reception->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php echo $patient_ot_surgery_register->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register->PatientID->Visible) { // PatientID ?>
	<div id="r_PatientID" class="form-group row">
		<label id="elh_patient_ot_surgery_register_PatientID" for="x_PatientID" class="<?php echo $patient_ot_surgery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_PatientID" class="patient_ot_surgery_registeradd" type="text/html"><span><?php echo $patient_ot_surgery_register->PatientID->caption() ?><?php echo ($patient_ot_surgery_register->PatientID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_surgery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_surgery_register->PatientID->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_PatientID" class="patient_ot_surgery_registeradd" type="text/html">
<span id="el_patient_ot_surgery_register_PatientID">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register->PatientID->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register->PatientID->EditValue ?>"<?php echo $patient_ot_surgery_register->PatientID->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_surgery_register->PatientID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register->PId->Visible) { // PId ?>
	<div id="r_PId" class="form-group row">
		<label id="elh_patient_ot_surgery_register_PId" for="x_PId" class="<?php echo $patient_ot_surgery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_PId" class="patient_ot_surgery_registeradd" type="text/html"><span><?php echo $patient_ot_surgery_register->PId->caption() ?><?php echo ($patient_ot_surgery_register->PId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_surgery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_surgery_register->PId->cellAttributes() ?>>
<?php if ($patient_ot_surgery_register->PId->getSessionValue() <> "") { ?>
<script id="tpx_patient_ot_surgery_register_PId" class="patient_ot_surgery_registeradd" type="text/html">
<span id="el_patient_ot_surgery_register_PId">
<span<?php echo $patient_ot_surgery_register->PId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_surgery_register->PId->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" id="x_PId" name="x_PId" value="<?php echo HtmlEncode($patient_ot_surgery_register->PId->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_patient_ot_surgery_register_PId" class="patient_ot_surgery_registeradd" type="text/html">
<span id="el_patient_ot_surgery_register_PId">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_PId" name="x_PId" id="x_PId" size="30" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register->PId->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register->PId->EditValue ?>"<?php echo $patient_ot_surgery_register->PId->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php echo $patient_ot_surgery_register->PId->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_patient_ot_surgery_registeradd" class="ew-custom-template"></div>
<script id="tpm_patient_ot_surgery_registeradd" type="text/html">
<div id="ct_patient_ot_surgery_register_add"><style>
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
</style>
	<?php
	$fk_id = $_GET["fk_id"] ;
	$fk_patient_id = $_GET["fk_patient_id"] ;
	$fk_mrnNo = $_GET["fk_mrnNo"] ;
	$dbhelper = &DbHelper();
	$Tid = $_GET["fk_patient_id"] ;
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$Tid."'; ";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["profilePic"] == "")
	{
		$PatientProfilePic = "hims\profile-picture.png";
	}else{
		$PatientProfilePic = $results1[0]["profilePic"];
	}
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$Tid."'; ";
	$results1 = $dbhelper->ExecuteRows($sql);
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$Tid."'; ";
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
<?php
	$Reception = $_GET["fk_id"] ;
	$PatientId = $_GET["fk_patient_id"] ;
	$mrnno = $_GET["fk_mrnNo"] ;
?>
	<input type="hidden" id="fk_id" name="fk_id" value="<?php echo $Reception; ?>">
	<input type="hidden" id="fk_patient_id" name="fk_patient_id" value="<?php echo $PatientId; ?>">
	<input type="hidden" id="fk_mrnNo" name="fk_mrnNo" value="<?php echo $mrnno; ?>">
	<input type="hidden" id="Repagehistoryview" name="Repagehistoryview" value="3487">
{{include tmpl="#tpc_patient_ot_surgery_register_PatientSearch"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_PatientSearch"/}}	
<p id="profilePic" hidden>{{include tmpl="#tpc_patient_ot_surgery_register_profilePic"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_profilePic"/}}</p>
<p id="SurfaceArea" hidden>{{include tmpl="#tpx_SurfaceArea"/}}</p>
<p id="BodyMassIndex" hidden>{{include tmpl="#tpx_BodyMassIndex"/}}</p>
<p id="idmrnnokk" hidden>{{include tmpl="#tpc_patient_ot_surgery_register_mrnno"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_mrnno"/}}</p>
<div hidden>
  <p>{{include tmpl="#tpc_patient_ot_surgery_register_Reception"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_Reception"/}}</p> 
  <p>{{include tmpl="#tpc_patient_ot_surgery_register_PatientID"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_PatientID"/}}</p> 
  <p>{{include tmpl="#tpc_patient_ot_surgery_register_PatientName"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_PatientName"/}}</p> 
  <p>{{include tmpl="#tpc_patient_ot_surgery_register_Age"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_Age"/}}</p> 
  <p>{{include tmpl="#tpc_patient_ot_surgery_register_Gender"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_Gender"/}}</p>
  <p>{{include tmpl="#tpc_patient_ot_surgery_register_PatID"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_PatID"/}}</p>
  <p>{{include tmpl="#tpc_patient_ot_surgery_register_MobileNumber"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_MobileNumber"/}}</p> 
</div>
	<div class="row">
<div id="patientdataview" class="col-md-12">
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
				<div class="col-sm-4">
					<div class="description-block">
					  <h5 id="SemPatientEmail" class="description-header">MRN No : <?php echo $fk_mrnNo; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
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
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
</div>
</div>
<div class="row">
		 <div class="col-lg-6">
			<div class="card bg-info">             
			  <div class="card-body">
				<table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_diagnosis"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_diagnosis"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_proposedSurgery"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_proposedSurgery"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_surgeryProcedure"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_surgeryProcedure"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_typeOfAnaesthesia"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_typeOfAnaesthesia"/}}</td></tr>
					</tbody>
				</table>
			  </div>
			</div>
		 </div>
		  <!-- /.col-md-6 -->
		<div class="col-lg-6">
			<div class="card bg-success">             
			  <div class="card-body">
			  <table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_RecievedTime"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_RecievedTime"/}}</td></tr>
							<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_AnaesthesiaStarted"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_AnaesthesiaStarted"/}}</td></tr>
							<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_AnaesthesiaEnded"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_AnaesthesiaEnded"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_surgeryStarted"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_surgeryStarted"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_surgeryEnded"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_surgeryEnded"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_RecoveryTime"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_RecoveryTime"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_ShiftedTime"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_ShiftedTime"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_Duration"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_Duration"/}}</td></tr>
					</tbody>
				</table>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
<div class="row">
		 <div class="col-lg-6">
			<div class="card bg-info">             
			  <div class="card-body">
				<table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_Surgeon"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_Surgeon"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_Anaesthetist"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_Anaesthetist"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_AsstSurgeon1"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_AsstSurgeon1"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_AsstSurgeon2"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_AsstSurgeon2"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_paediatric"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_paediatric"/}}</td></tr>
					</tbody>
				</table>
			  </div>
			</div>
		 </div>
		  <!-- /.col-md-6 -->
		<div class="col-lg-6">
			<div class="card bg-success">             
			  <div class="card-body">
			  <table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_ScrubNurse1"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_ScrubNurse1"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_ScrubNurse2"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_ScrubNurse2"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_FloorNurse"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_FloorNurse"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_Technician"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_Technician"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_HouseKeeping"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_HouseKeeping"/}}</td></tr>
					</tbody>
				</table>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
<div class="row">
		 <div class="col-lg-6">
			<div class="card bg-info">             
			  <div class="card-body">
				<table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_countsCheckedMops"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_countsCheckedMops"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_gauze"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_gauze"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_needles"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_needles"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_bloodloss"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_bloodloss"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_bloodtransfusion"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_bloodtransfusion"/}}</td></tr>
					</tbody>
				</table>
			  </div>
			</div>
		 </div>
		  <!-- /.col-md-6 -->
		<div class="col-lg-6">
			<div class="card bg-success">             
			  <div class="card-body">
			  <table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_implantsUsed"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_implantsUsed"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_MaterialsForHPE"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_MaterialsForHPE"/}}</td></tr>
					</tbody>
				</table>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
<?php
	$dbhelper = &DbHelper();
	$Tid = $_GET["fk_patient_id"] ;
	$Reception = $_GET["fk_id"] ;
	$PatientId = $_GET["fk_patient_id"] ;
	$mrnno = $_GET["fk_mrnNo"] ;
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_vitals where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$vitalsURL = "patient_vitalsadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$vitalsURL = "patient_vitalsedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_history where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$historyURL = "patient_historyadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$historyURL = "patient_historyedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_provisional_diagnosis where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$provisionaldiagnosisURL = "patient_provisional_diagnosisadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$provisionaldiagnosisURL = "patient_provisional_diagnosisedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_prescription where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$prescriptionURL = "patient_prescriptionlist.php?action=gridadd&showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$prescriptionURL = "patient_prescriptionlist.php?action=gridedit&showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_final_diagnosis where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$finaldiagnosisURL = "patient_final_diagnosisadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$finaldiagnosisURL = "patient_final_diagnosisedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_follow_up where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$followupURL = "patient_follow_upadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$followupURL = "patient_follow_upedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_ot_delivery_register where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$deliveryregisterURL = "patient_ot_delivery_registeradd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$deliveryregisterURL = "patient_ot_delivery_registeredit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_ot_surgery_register where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$surgeryregisterURL = "patient_ot_surgery_registeradd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$surgeryregisterURL = "patient_ot_surgery_registeredit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
?>
<table class="ew-table">
	 <tbody>
		<tr>
			<td>
				<button class="btn bg-secondary btn-lg" onClick="callSpatientvitals()">Vitals</button>
			</td>
			<td>
				<button class="btn bg-info btn-lg" onClick="callpatienthistory()">History</button>
			</td>
			<td>
				<button class="btn bg-warning btn-lg" onClick="callpatientprovisionaldiagnosis()">Provisional Diagnosis</button>
			</td>
			<td>
				<button class="btn bg-success btn-lg" onClick="callpatientprescription()">Prescription</button>
			</td>
						<td>
				<button class="btn bg-danger btn-lg" onClick="callpatientfinaldiagnosis()">Final Diagnosis</button>
			</td>
			<td>
				<button class="btn bg-orange btn-lg" onClick="callpatientfollowup()">Follow Up</button>
			</td>
						<td>
				<button class="btn bg-purple btn-lg" onClick="callpatientotdeliveryregister()">Delivery Register</button>
			</td>
			<td>
				<button class="btn bg-maroon btn-lg" onClick="callpatientotsurgeryregister()">Surgery Register</button>
			</td>
		</tr>
	</tbody>
</table>
</div>
</script>
<?php if (!$patient_ot_surgery_register_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $patient_ot_surgery_register_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_ot_surgery_register_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($patient_ot_surgery_register->Rows) ?> };
ew.applyTemplate("tpd_patient_ot_surgery_registeradd", "tpm_patient_ot_surgery_registeradd", "patient_ot_surgery_registeradd", "<?php echo $patient_ot_surgery_register->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.patient_ot_surgery_registeradd_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$patient_ot_surgery_register_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");
	function callSpatientvitals()
	{		
		document.getElementById("Repagehistoryview").value = "patientvitals";
	}

	function callpatienthistory()
	{		
		document.getElementById("Repagehistoryview").value = "patienthistory";
	}

	function callpatientprovisionaldiagnosis()
	{		
		document.getElementById("Repagehistoryview").value = "patientprovisionaldiagnosis";
	}

	function callpatientprescription()
	{		
		document.getElementById("Repagehistoryview").value = "patientprescription";
	}	

	function callpatientfinaldiagnosis()
	{		
		document.getElementById("Repagehistoryview").value = "patientfinaldiagnosis";
	}

	function callpatientfollowup()
	{		
		document.getElementById("Repagehistoryview").value = "patientfollowup";
	}

	function callpatientotdeliveryregister()
	{		
		document.getElementById("Repagehistoryview").value = "patientotdeliveryregister";
	}

	function callpatientotsurgeryregister()
	{		
		document.getElementById("Repagehistoryview").value = "patientotsurgeryregister";
	}
</script>
<?php include_once "footer.php" ?>
<?php
$patient_ot_surgery_register_add->terminate();
?>