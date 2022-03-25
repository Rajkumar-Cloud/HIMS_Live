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
$patient_ot_surgery_register_edit = new patient_ot_surgery_register_edit();

// Run the page
$patient_ot_surgery_register_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_ot_surgery_register_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpatient_ot_surgery_registeredit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fpatient_ot_surgery_registeredit = currentForm = new ew.Form("fpatient_ot_surgery_registeredit", "edit");

	// Validate form
	fpatient_ot_surgery_registeredit.validate = function() {
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
			<?php if ($patient_ot_surgery_register_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register_edit->id->caption(), $patient_ot_surgery_register_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_surgery_register_edit->PatID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register_edit->PatID->caption(), $patient_ot_surgery_register_edit->PatID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_surgery_register_edit->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register_edit->PatientName->caption(), $patient_ot_surgery_register_edit->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_surgery_register_edit->mrnno->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register_edit->mrnno->caption(), $patient_ot_surgery_register_edit->mrnno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_surgery_register_edit->MobileNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_MobileNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register_edit->MobileNumber->caption(), $patient_ot_surgery_register_edit->MobileNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_surgery_register_edit->Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register_edit->Age->caption(), $patient_ot_surgery_register_edit->Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_surgery_register_edit->Gender->Required) { ?>
				elm = this.getElements("x" + infix + "_Gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register_edit->Gender->caption(), $patient_ot_surgery_register_edit->Gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_surgery_register_edit->profilePic->Required) { ?>
				elm = this.getElements("x" + infix + "_profilePic");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register_edit->profilePic->caption(), $patient_ot_surgery_register_edit->profilePic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_surgery_register_edit->diagnosis->Required) { ?>
				elm = this.getElements("x" + infix + "_diagnosis");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register_edit->diagnosis->caption(), $patient_ot_surgery_register_edit->diagnosis->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_surgery_register_edit->proposedSurgery->Required) { ?>
				elm = this.getElements("x" + infix + "_proposedSurgery");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register_edit->proposedSurgery->caption(), $patient_ot_surgery_register_edit->proposedSurgery->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_surgery_register_edit->surgeryProcedure->Required) { ?>
				elm = this.getElements("x" + infix + "_surgeryProcedure");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register_edit->surgeryProcedure->caption(), $patient_ot_surgery_register_edit->surgeryProcedure->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_surgery_register_edit->typeOfAnaesthesia->Required) { ?>
				elm = this.getElements("x" + infix + "_typeOfAnaesthesia");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register_edit->typeOfAnaesthesia->caption(), $patient_ot_surgery_register_edit->typeOfAnaesthesia->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_surgery_register_edit->RecievedTime->Required) { ?>
				elm = this.getElements("x" + infix + "_RecievedTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register_edit->RecievedTime->caption(), $patient_ot_surgery_register_edit->RecievedTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RecievedTime");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_ot_surgery_register_edit->RecievedTime->errorMessage()) ?>");
			<?php if ($patient_ot_surgery_register_edit->AnaesthesiaStarted->Required) { ?>
				elm = this.getElements("x" + infix + "_AnaesthesiaStarted");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register_edit->AnaesthesiaStarted->caption(), $patient_ot_surgery_register_edit->AnaesthesiaStarted->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AnaesthesiaStarted");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_ot_surgery_register_edit->AnaesthesiaStarted->errorMessage()) ?>");
			<?php if ($patient_ot_surgery_register_edit->AnaesthesiaEnded->Required) { ?>
				elm = this.getElements("x" + infix + "_AnaesthesiaEnded");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register_edit->AnaesthesiaEnded->caption(), $patient_ot_surgery_register_edit->AnaesthesiaEnded->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AnaesthesiaEnded");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_ot_surgery_register_edit->AnaesthesiaEnded->errorMessage()) ?>");
			<?php if ($patient_ot_surgery_register_edit->surgeryStarted->Required) { ?>
				elm = this.getElements("x" + infix + "_surgeryStarted");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register_edit->surgeryStarted->caption(), $patient_ot_surgery_register_edit->surgeryStarted->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_surgeryStarted");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_ot_surgery_register_edit->surgeryStarted->errorMessage()) ?>");
			<?php if ($patient_ot_surgery_register_edit->surgeryEnded->Required) { ?>
				elm = this.getElements("x" + infix + "_surgeryEnded");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register_edit->surgeryEnded->caption(), $patient_ot_surgery_register_edit->surgeryEnded->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_surgeryEnded");
				if (elm && !ew.checkShortEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_ot_surgery_register_edit->surgeryEnded->errorMessage()) ?>");
			<?php if ($patient_ot_surgery_register_edit->RecoveryTime->Required) { ?>
				elm = this.getElements("x" + infix + "_RecoveryTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register_edit->RecoveryTime->caption(), $patient_ot_surgery_register_edit->RecoveryTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RecoveryTime");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_ot_surgery_register_edit->RecoveryTime->errorMessage()) ?>");
			<?php if ($patient_ot_surgery_register_edit->ShiftedTime->Required) { ?>
				elm = this.getElements("x" + infix + "_ShiftedTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register_edit->ShiftedTime->caption(), $patient_ot_surgery_register_edit->ShiftedTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ShiftedTime");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_ot_surgery_register_edit->ShiftedTime->errorMessage()) ?>");
			<?php if ($patient_ot_surgery_register_edit->Duration->Required) { ?>
				elm = this.getElements("x" + infix + "_Duration");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register_edit->Duration->caption(), $patient_ot_surgery_register_edit->Duration->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_surgery_register_edit->Surgeon->Required) { ?>
				elm = this.getElements("x" + infix + "_Surgeon");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register_edit->Surgeon->caption(), $patient_ot_surgery_register_edit->Surgeon->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_surgery_register_edit->Anaesthetist->Required) { ?>
				elm = this.getElements("x" + infix + "_Anaesthetist");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register_edit->Anaesthetist->caption(), $patient_ot_surgery_register_edit->Anaesthetist->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_surgery_register_edit->AsstSurgeon1->Required) { ?>
				elm = this.getElements("x" + infix + "_AsstSurgeon1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register_edit->AsstSurgeon1->caption(), $patient_ot_surgery_register_edit->AsstSurgeon1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_surgery_register_edit->AsstSurgeon2->Required) { ?>
				elm = this.getElements("x" + infix + "_AsstSurgeon2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register_edit->AsstSurgeon2->caption(), $patient_ot_surgery_register_edit->AsstSurgeon2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_surgery_register_edit->paediatric->Required) { ?>
				elm = this.getElements("x" + infix + "_paediatric");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register_edit->paediatric->caption(), $patient_ot_surgery_register_edit->paediatric->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_surgery_register_edit->ScrubNurse1->Required) { ?>
				elm = this.getElements("x" + infix + "_ScrubNurse1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register_edit->ScrubNurse1->caption(), $patient_ot_surgery_register_edit->ScrubNurse1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_surgery_register_edit->ScrubNurse2->Required) { ?>
				elm = this.getElements("x" + infix + "_ScrubNurse2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register_edit->ScrubNurse2->caption(), $patient_ot_surgery_register_edit->ScrubNurse2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_surgery_register_edit->FloorNurse->Required) { ?>
				elm = this.getElements("x" + infix + "_FloorNurse");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register_edit->FloorNurse->caption(), $patient_ot_surgery_register_edit->FloorNurse->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_surgery_register_edit->Technician->Required) { ?>
				elm = this.getElements("x" + infix + "_Technician");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register_edit->Technician->caption(), $patient_ot_surgery_register_edit->Technician->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_surgery_register_edit->HouseKeeping->Required) { ?>
				elm = this.getElements("x" + infix + "_HouseKeeping");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register_edit->HouseKeeping->caption(), $patient_ot_surgery_register_edit->HouseKeeping->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_surgery_register_edit->countsCheckedMops->Required) { ?>
				elm = this.getElements("x" + infix + "_countsCheckedMops");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register_edit->countsCheckedMops->caption(), $patient_ot_surgery_register_edit->countsCheckedMops->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_surgery_register_edit->gauze->Required) { ?>
				elm = this.getElements("x" + infix + "_gauze");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register_edit->gauze->caption(), $patient_ot_surgery_register_edit->gauze->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_surgery_register_edit->needles->Required) { ?>
				elm = this.getElements("x" + infix + "_needles");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register_edit->needles->caption(), $patient_ot_surgery_register_edit->needles->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_surgery_register_edit->bloodloss->Required) { ?>
				elm = this.getElements("x" + infix + "_bloodloss");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register_edit->bloodloss->caption(), $patient_ot_surgery_register_edit->bloodloss->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_surgery_register_edit->bloodtransfusion->Required) { ?>
				elm = this.getElements("x" + infix + "_bloodtransfusion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register_edit->bloodtransfusion->caption(), $patient_ot_surgery_register_edit->bloodtransfusion->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_surgery_register_edit->implantsUsed->Required) { ?>
				elm = this.getElements("x" + infix + "_implantsUsed");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register_edit->implantsUsed->caption(), $patient_ot_surgery_register_edit->implantsUsed->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_surgery_register_edit->MaterialsForHPE->Required) { ?>
				elm = this.getElements("x" + infix + "_MaterialsForHPE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register_edit->MaterialsForHPE->caption(), $patient_ot_surgery_register_edit->MaterialsForHPE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_surgery_register_edit->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register_edit->status->caption(), $patient_ot_surgery_register_edit->status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_surgery_register_edit->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register_edit->createdby->caption(), $patient_ot_surgery_register_edit->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_surgery_register_edit->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register_edit->createddatetime->caption(), $patient_ot_surgery_register_edit->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_surgery_register_edit->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register_edit->modifiedby->caption(), $patient_ot_surgery_register_edit->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_surgery_register_edit->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register_edit->modifieddatetime->caption(), $patient_ot_surgery_register_edit->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_surgery_register_edit->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register_edit->HospID->caption(), $patient_ot_surgery_register_edit->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_surgery_register_edit->PatientSearch->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientSearch");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register_edit->PatientSearch->caption(), $patient_ot_surgery_register_edit->PatientSearch->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_surgery_register_edit->Reception->Required) { ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register_edit->Reception->caption(), $patient_ot_surgery_register_edit->Reception->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_ot_surgery_register_edit->Reception->errorMessage()) ?>");
			<?php if ($patient_ot_surgery_register_edit->PatientID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register_edit->PatientID->caption(), $patient_ot_surgery_register_edit->PatientID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_surgery_register_edit->PId->Required) { ?>
				elm = this.getElements("x" + infix + "_PId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_surgery_register_edit->PId->caption(), $patient_ot_surgery_register_edit->PId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_ot_surgery_register_edit->PId->errorMessage()) ?>");

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
	fpatient_ot_surgery_registeredit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatient_ot_surgery_registeredit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpatient_ot_surgery_registeredit.lists["x_Surgeon"] = <?php echo $patient_ot_surgery_register_edit->Surgeon->Lookup->toClientList($patient_ot_surgery_register_edit) ?>;
	fpatient_ot_surgery_registeredit.lists["x_Surgeon"].options = <?php echo JsonEncode($patient_ot_surgery_register_edit->Surgeon->lookupOptions()) ?>;
	fpatient_ot_surgery_registeredit.lists["x_Anaesthetist"] = <?php echo $patient_ot_surgery_register_edit->Anaesthetist->Lookup->toClientList($patient_ot_surgery_register_edit) ?>;
	fpatient_ot_surgery_registeredit.lists["x_Anaesthetist"].options = <?php echo JsonEncode($patient_ot_surgery_register_edit->Anaesthetist->lookupOptions()) ?>;
	fpatient_ot_surgery_registeredit.lists["x_AsstSurgeon1"] = <?php echo $patient_ot_surgery_register_edit->AsstSurgeon1->Lookup->toClientList($patient_ot_surgery_register_edit) ?>;
	fpatient_ot_surgery_registeredit.lists["x_AsstSurgeon1"].options = <?php echo JsonEncode($patient_ot_surgery_register_edit->AsstSurgeon1->lookupOptions()) ?>;
	fpatient_ot_surgery_registeredit.lists["x_AsstSurgeon2"] = <?php echo $patient_ot_surgery_register_edit->AsstSurgeon2->Lookup->toClientList($patient_ot_surgery_register_edit) ?>;
	fpatient_ot_surgery_registeredit.lists["x_AsstSurgeon2"].options = <?php echo JsonEncode($patient_ot_surgery_register_edit->AsstSurgeon2->lookupOptions()) ?>;
	fpatient_ot_surgery_registeredit.lists["x_paediatric"] = <?php echo $patient_ot_surgery_register_edit->paediatric->Lookup->toClientList($patient_ot_surgery_register_edit) ?>;
	fpatient_ot_surgery_registeredit.lists["x_paediatric"].options = <?php echo JsonEncode($patient_ot_surgery_register_edit->paediatric->lookupOptions()) ?>;
	fpatient_ot_surgery_registeredit.lists["x_PatientSearch"] = <?php echo $patient_ot_surgery_register_edit->PatientSearch->Lookup->toClientList($patient_ot_surgery_register_edit) ?>;
	fpatient_ot_surgery_registeredit.lists["x_PatientSearch"].options = <?php echo JsonEncode($patient_ot_surgery_register_edit->PatientSearch->lookupOptions()) ?>;
	loadjs.done("fpatient_ot_surgery_registeredit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $patient_ot_surgery_register_edit->showPageHeader(); ?>
<?php
$patient_ot_surgery_register_edit->showMessage();
?>
<form name="fpatient_ot_surgery_registeredit" id="fpatient_ot_surgery_registeredit" class="<?php echo $patient_ot_surgery_register_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_ot_surgery_register">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$patient_ot_surgery_register_edit->IsModal ?>">
<?php if ($patient_ot_surgery_register->getCurrentMasterTable() == "ip_admission") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($patient_ot_surgery_register_edit->Reception->getSessionValue()) ?>">
<input type="hidden" name="fk_mrnNo" value="<?php echo HtmlEncode($patient_ot_surgery_register_edit->mrnno->getSessionValue()) ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo HtmlEncode($patient_ot_surgery_register_edit->PId->getSessionValue()) ?>">
<?php } ?>
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($patient_ot_surgery_register_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_patient_ot_surgery_register_id" class="<?php echo $patient_ot_surgery_register_edit->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_id" type="text/html"><?php echo $patient_ot_surgery_register_edit->id->caption() ?><?php echo $patient_ot_surgery_register_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_surgery_register_edit->RightColumnClass ?>"><div <?php echo $patient_ot_surgery_register_edit->id->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_id" type="text/html"><span id="el_patient_ot_surgery_register_id">
<span<?php echo $patient_ot_surgery_register_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_surgery_register_edit->id->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="patient_ot_surgery_register" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($patient_ot_surgery_register_edit->id->CurrentValue) ?>">
<?php echo $patient_ot_surgery_register_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register_edit->PatID->Visible) { // PatID ?>
	<div id="r_PatID" class="form-group row">
		<label id="elh_patient_ot_surgery_register_PatID" for="x_PatID" class="<?php echo $patient_ot_surgery_register_edit->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_PatID" type="text/html"><?php echo $patient_ot_surgery_register_edit->PatID->caption() ?><?php echo $patient_ot_surgery_register_edit->PatID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_surgery_register_edit->RightColumnClass ?>"><div <?php echo $patient_ot_surgery_register_edit->PatID->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_PatID" type="text/html"><span id="el_patient_ot_surgery_register_PatID">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register_edit->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register_edit->PatID->EditValue ?>"<?php echo $patient_ot_surgery_register_edit->PatID->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_surgery_register_edit->PatID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register_edit->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_patient_ot_surgery_register_PatientName" for="x_PatientName" class="<?php echo $patient_ot_surgery_register_edit->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_PatientName" type="text/html"><?php echo $patient_ot_surgery_register_edit->PatientName->caption() ?><?php echo $patient_ot_surgery_register_edit->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_surgery_register_edit->RightColumnClass ?>"><div <?php echo $patient_ot_surgery_register_edit->PatientName->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_PatientName" type="text/html"><span id="el_patient_ot_surgery_register_PatientName">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register_edit->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register_edit->PatientName->EditValue ?>"<?php echo $patient_ot_surgery_register_edit->PatientName->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_surgery_register_edit->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register_edit->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_patient_ot_surgery_register_mrnno" for="x_mrnno" class="<?php echo $patient_ot_surgery_register_edit->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_mrnno" type="text/html"><?php echo $patient_ot_surgery_register_edit->mrnno->caption() ?><?php echo $patient_ot_surgery_register_edit->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_surgery_register_edit->RightColumnClass ?>"><div <?php echo $patient_ot_surgery_register_edit->mrnno->cellAttributes() ?>>
<?php if ($patient_ot_surgery_register_edit->mrnno->getSessionValue() != "") { ?>
<script id="tpx_patient_ot_surgery_register_mrnno" type="text/html"><span id="el_patient_ot_surgery_register_mrnno">
<span<?php echo $patient_ot_surgery_register_edit->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_surgery_register_edit->mrnno->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x_mrnno" name="x_mrnno" value="<?php echo HtmlEncode($patient_ot_surgery_register_edit->mrnno->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_patient_ot_surgery_register_mrnno" type="text/html"><span id="el_patient_ot_surgery_register_mrnno">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register_edit->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register_edit->mrnno->EditValue ?>"<?php echo $patient_ot_surgery_register_edit->mrnno->editAttributes() ?>>
</span></script>
<?php } ?>
<?php echo $patient_ot_surgery_register_edit->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register_edit->MobileNumber->Visible) { // MobileNumber ?>
	<div id="r_MobileNumber" class="form-group row">
		<label id="elh_patient_ot_surgery_register_MobileNumber" for="x_MobileNumber" class="<?php echo $patient_ot_surgery_register_edit->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_MobileNumber" type="text/html"><?php echo $patient_ot_surgery_register_edit->MobileNumber->caption() ?><?php echo $patient_ot_surgery_register_edit->MobileNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_surgery_register_edit->RightColumnClass ?>"><div <?php echo $patient_ot_surgery_register_edit->MobileNumber->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_MobileNumber" type="text/html"><span id="el_patient_ot_surgery_register_MobileNumber">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register_edit->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register_edit->MobileNumber->EditValue ?>"<?php echo $patient_ot_surgery_register_edit->MobileNumber->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_surgery_register_edit->MobileNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register_edit->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_patient_ot_surgery_register_Age" for="x_Age" class="<?php echo $patient_ot_surgery_register_edit->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_Age" type="text/html"><?php echo $patient_ot_surgery_register_edit->Age->caption() ?><?php echo $patient_ot_surgery_register_edit->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_surgery_register_edit->RightColumnClass ?>"><div <?php echo $patient_ot_surgery_register_edit->Age->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_Age" type="text/html"><span id="el_patient_ot_surgery_register_Age">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register_edit->Age->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register_edit->Age->EditValue ?>"<?php echo $patient_ot_surgery_register_edit->Age->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_surgery_register_edit->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register_edit->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label id="elh_patient_ot_surgery_register_Gender" for="x_Gender" class="<?php echo $patient_ot_surgery_register_edit->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_Gender" type="text/html"><?php echo $patient_ot_surgery_register_edit->Gender->caption() ?><?php echo $patient_ot_surgery_register_edit->Gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_surgery_register_edit->RightColumnClass ?>"><div <?php echo $patient_ot_surgery_register_edit->Gender->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_Gender" type="text/html"><span id="el_patient_ot_surgery_register_Gender">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register_edit->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register_edit->Gender->EditValue ?>"<?php echo $patient_ot_surgery_register_edit->Gender->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_surgery_register_edit->Gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register_edit->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_patient_ot_surgery_register_profilePic" for="x_profilePic" class="<?php echo $patient_ot_surgery_register_edit->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_profilePic" type="text/html"><?php echo $patient_ot_surgery_register_edit->profilePic->caption() ?><?php echo $patient_ot_surgery_register_edit->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_surgery_register_edit->RightColumnClass ?>"><div <?php echo $patient_ot_surgery_register_edit->profilePic->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_profilePic" type="text/html"><span id="el_patient_ot_surgery_register_profilePic">
<textarea data-table="patient_ot_surgery_register" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register_edit->profilePic->getPlaceHolder()) ?>"<?php echo $patient_ot_surgery_register_edit->profilePic->editAttributes() ?>><?php echo $patient_ot_surgery_register_edit->profilePic->EditValue ?></textarea>
</span></script>
<?php echo $patient_ot_surgery_register_edit->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register_edit->diagnosis->Visible) { // diagnosis ?>
	<div id="r_diagnosis" class="form-group row">
		<label id="elh_patient_ot_surgery_register_diagnosis" for="x_diagnosis" class="<?php echo $patient_ot_surgery_register_edit->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_diagnosis" type="text/html"><?php echo $patient_ot_surgery_register_edit->diagnosis->caption() ?><?php echo $patient_ot_surgery_register_edit->diagnosis->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_surgery_register_edit->RightColumnClass ?>"><div <?php echo $patient_ot_surgery_register_edit->diagnosis->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_diagnosis" type="text/html"><span id="el_patient_ot_surgery_register_diagnosis">
<textarea data-table="patient_ot_surgery_register" data-field="x_diagnosis" name="x_diagnosis" id="x_diagnosis" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register_edit->diagnosis->getPlaceHolder()) ?>"<?php echo $patient_ot_surgery_register_edit->diagnosis->editAttributes() ?>><?php echo $patient_ot_surgery_register_edit->diagnosis->EditValue ?></textarea>
</span></script>
<?php echo $patient_ot_surgery_register_edit->diagnosis->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register_edit->proposedSurgery->Visible) { // proposedSurgery ?>
	<div id="r_proposedSurgery" class="form-group row">
		<label id="elh_patient_ot_surgery_register_proposedSurgery" for="x_proposedSurgery" class="<?php echo $patient_ot_surgery_register_edit->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_proposedSurgery" type="text/html"><?php echo $patient_ot_surgery_register_edit->proposedSurgery->caption() ?><?php echo $patient_ot_surgery_register_edit->proposedSurgery->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_surgery_register_edit->RightColumnClass ?>"><div <?php echo $patient_ot_surgery_register_edit->proposedSurgery->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_proposedSurgery" type="text/html"><span id="el_patient_ot_surgery_register_proposedSurgery">
<textarea data-table="patient_ot_surgery_register" data-field="x_proposedSurgery" name="x_proposedSurgery" id="x_proposedSurgery" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register_edit->proposedSurgery->getPlaceHolder()) ?>"<?php echo $patient_ot_surgery_register_edit->proposedSurgery->editAttributes() ?>><?php echo $patient_ot_surgery_register_edit->proposedSurgery->EditValue ?></textarea>
</span></script>
<?php echo $patient_ot_surgery_register_edit->proposedSurgery->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register_edit->surgeryProcedure->Visible) { // surgeryProcedure ?>
	<div id="r_surgeryProcedure" class="form-group row">
		<label id="elh_patient_ot_surgery_register_surgeryProcedure" for="x_surgeryProcedure" class="<?php echo $patient_ot_surgery_register_edit->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_surgeryProcedure" type="text/html"><?php echo $patient_ot_surgery_register_edit->surgeryProcedure->caption() ?><?php echo $patient_ot_surgery_register_edit->surgeryProcedure->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_surgery_register_edit->RightColumnClass ?>"><div <?php echo $patient_ot_surgery_register_edit->surgeryProcedure->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_surgeryProcedure" type="text/html"><span id="el_patient_ot_surgery_register_surgeryProcedure">
<textarea data-table="patient_ot_surgery_register" data-field="x_surgeryProcedure" name="x_surgeryProcedure" id="x_surgeryProcedure" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register_edit->surgeryProcedure->getPlaceHolder()) ?>"<?php echo $patient_ot_surgery_register_edit->surgeryProcedure->editAttributes() ?>><?php echo $patient_ot_surgery_register_edit->surgeryProcedure->EditValue ?></textarea>
</span></script>
<?php echo $patient_ot_surgery_register_edit->surgeryProcedure->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register_edit->typeOfAnaesthesia->Visible) { // typeOfAnaesthesia ?>
	<div id="r_typeOfAnaesthesia" class="form-group row">
		<label id="elh_patient_ot_surgery_register_typeOfAnaesthesia" for="x_typeOfAnaesthesia" class="<?php echo $patient_ot_surgery_register_edit->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_typeOfAnaesthesia" type="text/html"><?php echo $patient_ot_surgery_register_edit->typeOfAnaesthesia->caption() ?><?php echo $patient_ot_surgery_register_edit->typeOfAnaesthesia->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_surgery_register_edit->RightColumnClass ?>"><div <?php echo $patient_ot_surgery_register_edit->typeOfAnaesthesia->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_typeOfAnaesthesia" type="text/html"><span id="el_patient_ot_surgery_register_typeOfAnaesthesia">
<textarea data-table="patient_ot_surgery_register" data-field="x_typeOfAnaesthesia" name="x_typeOfAnaesthesia" id="x_typeOfAnaesthesia" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register_edit->typeOfAnaesthesia->getPlaceHolder()) ?>"<?php echo $patient_ot_surgery_register_edit->typeOfAnaesthesia->editAttributes() ?>><?php echo $patient_ot_surgery_register_edit->typeOfAnaesthesia->EditValue ?></textarea>
</span></script>
<?php echo $patient_ot_surgery_register_edit->typeOfAnaesthesia->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register_edit->RecievedTime->Visible) { // RecievedTime ?>
	<div id="r_RecievedTime" class="form-group row">
		<label id="elh_patient_ot_surgery_register_RecievedTime" for="x_RecievedTime" class="<?php echo $patient_ot_surgery_register_edit->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_RecievedTime" type="text/html"><?php echo $patient_ot_surgery_register_edit->RecievedTime->caption() ?><?php echo $patient_ot_surgery_register_edit->RecievedTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_surgery_register_edit->RightColumnClass ?>"><div <?php echo $patient_ot_surgery_register_edit->RecievedTime->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_RecievedTime" type="text/html"><span id="el_patient_ot_surgery_register_RecievedTime">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_RecievedTime" data-format="11" name="x_RecievedTime" id="x_RecievedTime" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register_edit->RecievedTime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register_edit->RecievedTime->EditValue ?>"<?php echo $patient_ot_surgery_register_edit->RecievedTime->editAttributes() ?>>
<?php if (!$patient_ot_surgery_register_edit->RecievedTime->ReadOnly && !$patient_ot_surgery_register_edit->RecievedTime->Disabled && !isset($patient_ot_surgery_register_edit->RecievedTime->EditAttrs["readonly"]) && !isset($patient_ot_surgery_register_edit->RecievedTime->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_ot_surgery_registeredit_js">
loadjs.ready(["fpatient_ot_surgery_registeredit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_surgery_registeredit", "x_RecievedTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php echo $patient_ot_surgery_register_edit->RecievedTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register_edit->AnaesthesiaStarted->Visible) { // AnaesthesiaStarted ?>
	<div id="r_AnaesthesiaStarted" class="form-group row">
		<label id="elh_patient_ot_surgery_register_AnaesthesiaStarted" for="x_AnaesthesiaStarted" class="<?php echo $patient_ot_surgery_register_edit->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_AnaesthesiaStarted" type="text/html"><?php echo $patient_ot_surgery_register_edit->AnaesthesiaStarted->caption() ?><?php echo $patient_ot_surgery_register_edit->AnaesthesiaStarted->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_surgery_register_edit->RightColumnClass ?>"><div <?php echo $patient_ot_surgery_register_edit->AnaesthesiaStarted->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_AnaesthesiaStarted" type="text/html"><span id="el_patient_ot_surgery_register_AnaesthesiaStarted">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_AnaesthesiaStarted" data-format="11" name="x_AnaesthesiaStarted" id="x_AnaesthesiaStarted" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register_edit->AnaesthesiaStarted->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register_edit->AnaesthesiaStarted->EditValue ?>"<?php echo $patient_ot_surgery_register_edit->AnaesthesiaStarted->editAttributes() ?>>
<?php if (!$patient_ot_surgery_register_edit->AnaesthesiaStarted->ReadOnly && !$patient_ot_surgery_register_edit->AnaesthesiaStarted->Disabled && !isset($patient_ot_surgery_register_edit->AnaesthesiaStarted->EditAttrs["readonly"]) && !isset($patient_ot_surgery_register_edit->AnaesthesiaStarted->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_ot_surgery_registeredit_js">
loadjs.ready(["fpatient_ot_surgery_registeredit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_surgery_registeredit", "x_AnaesthesiaStarted", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php echo $patient_ot_surgery_register_edit->AnaesthesiaStarted->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register_edit->AnaesthesiaEnded->Visible) { // AnaesthesiaEnded ?>
	<div id="r_AnaesthesiaEnded" class="form-group row">
		<label id="elh_patient_ot_surgery_register_AnaesthesiaEnded" for="x_AnaesthesiaEnded" class="<?php echo $patient_ot_surgery_register_edit->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_AnaesthesiaEnded" type="text/html"><?php echo $patient_ot_surgery_register_edit->AnaesthesiaEnded->caption() ?><?php echo $patient_ot_surgery_register_edit->AnaesthesiaEnded->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_surgery_register_edit->RightColumnClass ?>"><div <?php echo $patient_ot_surgery_register_edit->AnaesthesiaEnded->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_AnaesthesiaEnded" type="text/html"><span id="el_patient_ot_surgery_register_AnaesthesiaEnded">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_AnaesthesiaEnded" data-format="11" name="x_AnaesthesiaEnded" id="x_AnaesthesiaEnded" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register_edit->AnaesthesiaEnded->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register_edit->AnaesthesiaEnded->EditValue ?>"<?php echo $patient_ot_surgery_register_edit->AnaesthesiaEnded->editAttributes() ?>>
<?php if (!$patient_ot_surgery_register_edit->AnaesthesiaEnded->ReadOnly && !$patient_ot_surgery_register_edit->AnaesthesiaEnded->Disabled && !isset($patient_ot_surgery_register_edit->AnaesthesiaEnded->EditAttrs["readonly"]) && !isset($patient_ot_surgery_register_edit->AnaesthesiaEnded->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_ot_surgery_registeredit_js">
loadjs.ready(["fpatient_ot_surgery_registeredit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_surgery_registeredit", "x_AnaesthesiaEnded", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php echo $patient_ot_surgery_register_edit->AnaesthesiaEnded->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register_edit->surgeryStarted->Visible) { // surgeryStarted ?>
	<div id="r_surgeryStarted" class="form-group row">
		<label id="elh_patient_ot_surgery_register_surgeryStarted" for="x_surgeryStarted" class="<?php echo $patient_ot_surgery_register_edit->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_surgeryStarted" type="text/html"><?php echo $patient_ot_surgery_register_edit->surgeryStarted->caption() ?><?php echo $patient_ot_surgery_register_edit->surgeryStarted->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_surgery_register_edit->RightColumnClass ?>"><div <?php echo $patient_ot_surgery_register_edit->surgeryStarted->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_surgeryStarted" type="text/html"><span id="el_patient_ot_surgery_register_surgeryStarted">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_surgeryStarted" data-format="11" name="x_surgeryStarted" id="x_surgeryStarted" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register_edit->surgeryStarted->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register_edit->surgeryStarted->EditValue ?>"<?php echo $patient_ot_surgery_register_edit->surgeryStarted->editAttributes() ?>>
<?php if (!$patient_ot_surgery_register_edit->surgeryStarted->ReadOnly && !$patient_ot_surgery_register_edit->surgeryStarted->Disabled && !isset($patient_ot_surgery_register_edit->surgeryStarted->EditAttrs["readonly"]) && !isset($patient_ot_surgery_register_edit->surgeryStarted->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_ot_surgery_registeredit_js">
loadjs.ready(["fpatient_ot_surgery_registeredit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_surgery_registeredit", "x_surgeryStarted", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php echo $patient_ot_surgery_register_edit->surgeryStarted->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register_edit->surgeryEnded->Visible) { // surgeryEnded ?>
	<div id="r_surgeryEnded" class="form-group row">
		<label id="elh_patient_ot_surgery_register_surgeryEnded" for="x_surgeryEnded" class="<?php echo $patient_ot_surgery_register_edit->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_surgeryEnded" type="text/html"><?php echo $patient_ot_surgery_register_edit->surgeryEnded->caption() ?><?php echo $patient_ot_surgery_register_edit->surgeryEnded->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_surgery_register_edit->RightColumnClass ?>"><div <?php echo $patient_ot_surgery_register_edit->surgeryEnded->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_surgeryEnded" type="text/html"><span id="el_patient_ot_surgery_register_surgeryEnded">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_surgeryEnded" data-format="17" name="x_surgeryEnded" id="x_surgeryEnded" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register_edit->surgeryEnded->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register_edit->surgeryEnded->EditValue ?>"<?php echo $patient_ot_surgery_register_edit->surgeryEnded->editAttributes() ?>>
<?php if (!$patient_ot_surgery_register_edit->surgeryEnded->ReadOnly && !$patient_ot_surgery_register_edit->surgeryEnded->Disabled && !isset($patient_ot_surgery_register_edit->surgeryEnded->EditAttrs["readonly"]) && !isset($patient_ot_surgery_register_edit->surgeryEnded->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_ot_surgery_registeredit_js">
loadjs.ready(["fpatient_ot_surgery_registeredit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_surgery_registeredit", "x_surgeryEnded", {"ignoreReadonly":true,"useCurrent":false,"format":17});
});
</script>
<?php echo $patient_ot_surgery_register_edit->surgeryEnded->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register_edit->RecoveryTime->Visible) { // RecoveryTime ?>
	<div id="r_RecoveryTime" class="form-group row">
		<label id="elh_patient_ot_surgery_register_RecoveryTime" for="x_RecoveryTime" class="<?php echo $patient_ot_surgery_register_edit->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_RecoveryTime" type="text/html"><?php echo $patient_ot_surgery_register_edit->RecoveryTime->caption() ?><?php echo $patient_ot_surgery_register_edit->RecoveryTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_surgery_register_edit->RightColumnClass ?>"><div <?php echo $patient_ot_surgery_register_edit->RecoveryTime->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_RecoveryTime" type="text/html"><span id="el_patient_ot_surgery_register_RecoveryTime">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_RecoveryTime" data-format="11" name="x_RecoveryTime" id="x_RecoveryTime" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register_edit->RecoveryTime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register_edit->RecoveryTime->EditValue ?>"<?php echo $patient_ot_surgery_register_edit->RecoveryTime->editAttributes() ?>>
<?php if (!$patient_ot_surgery_register_edit->RecoveryTime->ReadOnly && !$patient_ot_surgery_register_edit->RecoveryTime->Disabled && !isset($patient_ot_surgery_register_edit->RecoveryTime->EditAttrs["readonly"]) && !isset($patient_ot_surgery_register_edit->RecoveryTime->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_ot_surgery_registeredit_js">
loadjs.ready(["fpatient_ot_surgery_registeredit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_surgery_registeredit", "x_RecoveryTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php echo $patient_ot_surgery_register_edit->RecoveryTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register_edit->ShiftedTime->Visible) { // ShiftedTime ?>
	<div id="r_ShiftedTime" class="form-group row">
		<label id="elh_patient_ot_surgery_register_ShiftedTime" for="x_ShiftedTime" class="<?php echo $patient_ot_surgery_register_edit->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_ShiftedTime" type="text/html"><?php echo $patient_ot_surgery_register_edit->ShiftedTime->caption() ?><?php echo $patient_ot_surgery_register_edit->ShiftedTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_surgery_register_edit->RightColumnClass ?>"><div <?php echo $patient_ot_surgery_register_edit->ShiftedTime->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_ShiftedTime" type="text/html"><span id="el_patient_ot_surgery_register_ShiftedTime">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_ShiftedTime" data-format="11" name="x_ShiftedTime" id="x_ShiftedTime" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register_edit->ShiftedTime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register_edit->ShiftedTime->EditValue ?>"<?php echo $patient_ot_surgery_register_edit->ShiftedTime->editAttributes() ?>>
<?php if (!$patient_ot_surgery_register_edit->ShiftedTime->ReadOnly && !$patient_ot_surgery_register_edit->ShiftedTime->Disabled && !isset($patient_ot_surgery_register_edit->ShiftedTime->EditAttrs["readonly"]) && !isset($patient_ot_surgery_register_edit->ShiftedTime->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_ot_surgery_registeredit_js">
loadjs.ready(["fpatient_ot_surgery_registeredit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_surgery_registeredit", "x_ShiftedTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php echo $patient_ot_surgery_register_edit->ShiftedTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register_edit->Duration->Visible) { // Duration ?>
	<div id="r_Duration" class="form-group row">
		<label id="elh_patient_ot_surgery_register_Duration" for="x_Duration" class="<?php echo $patient_ot_surgery_register_edit->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_Duration" type="text/html"><?php echo $patient_ot_surgery_register_edit->Duration->caption() ?><?php echo $patient_ot_surgery_register_edit->Duration->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_surgery_register_edit->RightColumnClass ?>"><div <?php echo $patient_ot_surgery_register_edit->Duration->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_Duration" type="text/html"><span id="el_patient_ot_surgery_register_Duration">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_Duration" name="x_Duration" id="x_Duration" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register_edit->Duration->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register_edit->Duration->EditValue ?>"<?php echo $patient_ot_surgery_register_edit->Duration->editAttributes() ?>>
<?php if (!$patient_ot_surgery_register_edit->Duration->ReadOnly && !$patient_ot_surgery_register_edit->Duration->Disabled && !isset($patient_ot_surgery_register_edit->Duration->EditAttrs["readonly"]) && !isset($patient_ot_surgery_register_edit->Duration->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_ot_surgery_registeredit_js">
loadjs.ready(["fpatient_ot_surgery_registeredit", "timepicker"], function() {
	ew.createTimePicker("fpatient_ot_surgery_registeredit", "x_Duration", {"timeFormat":"h:i A","step":15});
});
</script>
<?php echo $patient_ot_surgery_register_edit->Duration->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register_edit->Surgeon->Visible) { // Surgeon ?>
	<div id="r_Surgeon" class="form-group row">
		<label id="elh_patient_ot_surgery_register_Surgeon" for="x_Surgeon" class="<?php echo $patient_ot_surgery_register_edit->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_Surgeon" type="text/html"><?php echo $patient_ot_surgery_register_edit->Surgeon->caption() ?><?php echo $patient_ot_surgery_register_edit->Surgeon->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_surgery_register_edit->RightColumnClass ?>"><div <?php echo $patient_ot_surgery_register_edit->Surgeon->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_Surgeon" type="text/html"><span id="el_patient_ot_surgery_register_Surgeon">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_ot_surgery_register" data-field="x_Surgeon" data-value-separator="<?php echo $patient_ot_surgery_register_edit->Surgeon->displayValueSeparatorAttribute() ?>" id="x_Surgeon" name="x_Surgeon"<?php echo $patient_ot_surgery_register_edit->Surgeon->editAttributes() ?>>
			<?php echo $patient_ot_surgery_register_edit->Surgeon->selectOptionListHtml("x_Surgeon") ?>
		</select>
</div>
<?php echo $patient_ot_surgery_register_edit->Surgeon->Lookup->getParamTag($patient_ot_surgery_register_edit, "p_x_Surgeon") ?>
</span></script>
<?php echo $patient_ot_surgery_register_edit->Surgeon->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register_edit->Anaesthetist->Visible) { // Anaesthetist ?>
	<div id="r_Anaesthetist" class="form-group row">
		<label id="elh_patient_ot_surgery_register_Anaesthetist" for="x_Anaesthetist" class="<?php echo $patient_ot_surgery_register_edit->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_Anaesthetist" type="text/html"><?php echo $patient_ot_surgery_register_edit->Anaesthetist->caption() ?><?php echo $patient_ot_surgery_register_edit->Anaesthetist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_surgery_register_edit->RightColumnClass ?>"><div <?php echo $patient_ot_surgery_register_edit->Anaesthetist->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_Anaesthetist" type="text/html"><span id="el_patient_ot_surgery_register_Anaesthetist">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_ot_surgery_register" data-field="x_Anaesthetist" data-value-separator="<?php echo $patient_ot_surgery_register_edit->Anaesthetist->displayValueSeparatorAttribute() ?>" id="x_Anaesthetist" name="x_Anaesthetist"<?php echo $patient_ot_surgery_register_edit->Anaesthetist->editAttributes() ?>>
			<?php echo $patient_ot_surgery_register_edit->Anaesthetist->selectOptionListHtml("x_Anaesthetist") ?>
		</select>
</div>
<?php echo $patient_ot_surgery_register_edit->Anaesthetist->Lookup->getParamTag($patient_ot_surgery_register_edit, "p_x_Anaesthetist") ?>
</span></script>
<?php echo $patient_ot_surgery_register_edit->Anaesthetist->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register_edit->AsstSurgeon1->Visible) { // AsstSurgeon1 ?>
	<div id="r_AsstSurgeon1" class="form-group row">
		<label id="elh_patient_ot_surgery_register_AsstSurgeon1" for="x_AsstSurgeon1" class="<?php echo $patient_ot_surgery_register_edit->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_AsstSurgeon1" type="text/html"><?php echo $patient_ot_surgery_register_edit->AsstSurgeon1->caption() ?><?php echo $patient_ot_surgery_register_edit->AsstSurgeon1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_surgery_register_edit->RightColumnClass ?>"><div <?php echo $patient_ot_surgery_register_edit->AsstSurgeon1->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_AsstSurgeon1" type="text/html"><span id="el_patient_ot_surgery_register_AsstSurgeon1">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_ot_surgery_register" data-field="x_AsstSurgeon1" data-value-separator="<?php echo $patient_ot_surgery_register_edit->AsstSurgeon1->displayValueSeparatorAttribute() ?>" id="x_AsstSurgeon1" name="x_AsstSurgeon1"<?php echo $patient_ot_surgery_register_edit->AsstSurgeon1->editAttributes() ?>>
			<?php echo $patient_ot_surgery_register_edit->AsstSurgeon1->selectOptionListHtml("x_AsstSurgeon1") ?>
		</select>
</div>
<?php echo $patient_ot_surgery_register_edit->AsstSurgeon1->Lookup->getParamTag($patient_ot_surgery_register_edit, "p_x_AsstSurgeon1") ?>
</span></script>
<?php echo $patient_ot_surgery_register_edit->AsstSurgeon1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register_edit->AsstSurgeon2->Visible) { // AsstSurgeon2 ?>
	<div id="r_AsstSurgeon2" class="form-group row">
		<label id="elh_patient_ot_surgery_register_AsstSurgeon2" for="x_AsstSurgeon2" class="<?php echo $patient_ot_surgery_register_edit->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_AsstSurgeon2" type="text/html"><?php echo $patient_ot_surgery_register_edit->AsstSurgeon2->caption() ?><?php echo $patient_ot_surgery_register_edit->AsstSurgeon2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_surgery_register_edit->RightColumnClass ?>"><div <?php echo $patient_ot_surgery_register_edit->AsstSurgeon2->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_AsstSurgeon2" type="text/html"><span id="el_patient_ot_surgery_register_AsstSurgeon2">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_ot_surgery_register" data-field="x_AsstSurgeon2" data-value-separator="<?php echo $patient_ot_surgery_register_edit->AsstSurgeon2->displayValueSeparatorAttribute() ?>" id="x_AsstSurgeon2" name="x_AsstSurgeon2"<?php echo $patient_ot_surgery_register_edit->AsstSurgeon2->editAttributes() ?>>
			<?php echo $patient_ot_surgery_register_edit->AsstSurgeon2->selectOptionListHtml("x_AsstSurgeon2") ?>
		</select>
</div>
<?php echo $patient_ot_surgery_register_edit->AsstSurgeon2->Lookup->getParamTag($patient_ot_surgery_register_edit, "p_x_AsstSurgeon2") ?>
</span></script>
<?php echo $patient_ot_surgery_register_edit->AsstSurgeon2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register_edit->paediatric->Visible) { // paediatric ?>
	<div id="r_paediatric" class="form-group row">
		<label id="elh_patient_ot_surgery_register_paediatric" for="x_paediatric" class="<?php echo $patient_ot_surgery_register_edit->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_paediatric" type="text/html"><?php echo $patient_ot_surgery_register_edit->paediatric->caption() ?><?php echo $patient_ot_surgery_register_edit->paediatric->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_surgery_register_edit->RightColumnClass ?>"><div <?php echo $patient_ot_surgery_register_edit->paediatric->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_paediatric" type="text/html"><span id="el_patient_ot_surgery_register_paediatric">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_ot_surgery_register" data-field="x_paediatric" data-value-separator="<?php echo $patient_ot_surgery_register_edit->paediatric->displayValueSeparatorAttribute() ?>" id="x_paediatric" name="x_paediatric"<?php echo $patient_ot_surgery_register_edit->paediatric->editAttributes() ?>>
			<?php echo $patient_ot_surgery_register_edit->paediatric->selectOptionListHtml("x_paediatric") ?>
		</select>
</div>
<?php echo $patient_ot_surgery_register_edit->paediatric->Lookup->getParamTag($patient_ot_surgery_register_edit, "p_x_paediatric") ?>
</span></script>
<?php echo $patient_ot_surgery_register_edit->paediatric->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register_edit->ScrubNurse1->Visible) { // ScrubNurse1 ?>
	<div id="r_ScrubNurse1" class="form-group row">
		<label id="elh_patient_ot_surgery_register_ScrubNurse1" for="x_ScrubNurse1" class="<?php echo $patient_ot_surgery_register_edit->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_ScrubNurse1" type="text/html"><?php echo $patient_ot_surgery_register_edit->ScrubNurse1->caption() ?><?php echo $patient_ot_surgery_register_edit->ScrubNurse1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_surgery_register_edit->RightColumnClass ?>"><div <?php echo $patient_ot_surgery_register_edit->ScrubNurse1->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_ScrubNurse1" type="text/html"><span id="el_patient_ot_surgery_register_ScrubNurse1">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_ScrubNurse1" name="x_ScrubNurse1" id="x_ScrubNurse1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register_edit->ScrubNurse1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register_edit->ScrubNurse1->EditValue ?>"<?php echo $patient_ot_surgery_register_edit->ScrubNurse1->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_surgery_register_edit->ScrubNurse1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register_edit->ScrubNurse2->Visible) { // ScrubNurse2 ?>
	<div id="r_ScrubNurse2" class="form-group row">
		<label id="elh_patient_ot_surgery_register_ScrubNurse2" for="x_ScrubNurse2" class="<?php echo $patient_ot_surgery_register_edit->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_ScrubNurse2" type="text/html"><?php echo $patient_ot_surgery_register_edit->ScrubNurse2->caption() ?><?php echo $patient_ot_surgery_register_edit->ScrubNurse2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_surgery_register_edit->RightColumnClass ?>"><div <?php echo $patient_ot_surgery_register_edit->ScrubNurse2->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_ScrubNurse2" type="text/html"><span id="el_patient_ot_surgery_register_ScrubNurse2">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_ScrubNurse2" name="x_ScrubNurse2" id="x_ScrubNurse2" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register_edit->ScrubNurse2->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register_edit->ScrubNurse2->EditValue ?>"<?php echo $patient_ot_surgery_register_edit->ScrubNurse2->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_surgery_register_edit->ScrubNurse2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register_edit->FloorNurse->Visible) { // FloorNurse ?>
	<div id="r_FloorNurse" class="form-group row">
		<label id="elh_patient_ot_surgery_register_FloorNurse" for="x_FloorNurse" class="<?php echo $patient_ot_surgery_register_edit->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_FloorNurse" type="text/html"><?php echo $patient_ot_surgery_register_edit->FloorNurse->caption() ?><?php echo $patient_ot_surgery_register_edit->FloorNurse->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_surgery_register_edit->RightColumnClass ?>"><div <?php echo $patient_ot_surgery_register_edit->FloorNurse->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_FloorNurse" type="text/html"><span id="el_patient_ot_surgery_register_FloorNurse">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_FloorNurse" name="x_FloorNurse" id="x_FloorNurse" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register_edit->FloorNurse->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register_edit->FloorNurse->EditValue ?>"<?php echo $patient_ot_surgery_register_edit->FloorNurse->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_surgery_register_edit->FloorNurse->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register_edit->Technician->Visible) { // Technician ?>
	<div id="r_Technician" class="form-group row">
		<label id="elh_patient_ot_surgery_register_Technician" for="x_Technician" class="<?php echo $patient_ot_surgery_register_edit->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_Technician" type="text/html"><?php echo $patient_ot_surgery_register_edit->Technician->caption() ?><?php echo $patient_ot_surgery_register_edit->Technician->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_surgery_register_edit->RightColumnClass ?>"><div <?php echo $patient_ot_surgery_register_edit->Technician->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_Technician" type="text/html"><span id="el_patient_ot_surgery_register_Technician">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_Technician" name="x_Technician" id="x_Technician" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register_edit->Technician->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register_edit->Technician->EditValue ?>"<?php echo $patient_ot_surgery_register_edit->Technician->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_surgery_register_edit->Technician->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register_edit->HouseKeeping->Visible) { // HouseKeeping ?>
	<div id="r_HouseKeeping" class="form-group row">
		<label id="elh_patient_ot_surgery_register_HouseKeeping" for="x_HouseKeeping" class="<?php echo $patient_ot_surgery_register_edit->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_HouseKeeping" type="text/html"><?php echo $patient_ot_surgery_register_edit->HouseKeeping->caption() ?><?php echo $patient_ot_surgery_register_edit->HouseKeeping->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_surgery_register_edit->RightColumnClass ?>"><div <?php echo $patient_ot_surgery_register_edit->HouseKeeping->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_HouseKeeping" type="text/html"><span id="el_patient_ot_surgery_register_HouseKeeping">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_HouseKeeping" name="x_HouseKeeping" id="x_HouseKeeping" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register_edit->HouseKeeping->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register_edit->HouseKeeping->EditValue ?>"<?php echo $patient_ot_surgery_register_edit->HouseKeeping->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_surgery_register_edit->HouseKeeping->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register_edit->countsCheckedMops->Visible) { // countsCheckedMops ?>
	<div id="r_countsCheckedMops" class="form-group row">
		<label id="elh_patient_ot_surgery_register_countsCheckedMops" for="x_countsCheckedMops" class="<?php echo $patient_ot_surgery_register_edit->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_countsCheckedMops" type="text/html"><?php echo $patient_ot_surgery_register_edit->countsCheckedMops->caption() ?><?php echo $patient_ot_surgery_register_edit->countsCheckedMops->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_surgery_register_edit->RightColumnClass ?>"><div <?php echo $patient_ot_surgery_register_edit->countsCheckedMops->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_countsCheckedMops" type="text/html"><span id="el_patient_ot_surgery_register_countsCheckedMops">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_countsCheckedMops" name="x_countsCheckedMops" id="x_countsCheckedMops" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register_edit->countsCheckedMops->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register_edit->countsCheckedMops->EditValue ?>"<?php echo $patient_ot_surgery_register_edit->countsCheckedMops->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_surgery_register_edit->countsCheckedMops->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register_edit->gauze->Visible) { // gauze ?>
	<div id="r_gauze" class="form-group row">
		<label id="elh_patient_ot_surgery_register_gauze" for="x_gauze" class="<?php echo $patient_ot_surgery_register_edit->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_gauze" type="text/html"><?php echo $patient_ot_surgery_register_edit->gauze->caption() ?><?php echo $patient_ot_surgery_register_edit->gauze->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_surgery_register_edit->RightColumnClass ?>"><div <?php echo $patient_ot_surgery_register_edit->gauze->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_gauze" type="text/html"><span id="el_patient_ot_surgery_register_gauze">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_gauze" name="x_gauze" id="x_gauze" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register_edit->gauze->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register_edit->gauze->EditValue ?>"<?php echo $patient_ot_surgery_register_edit->gauze->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_surgery_register_edit->gauze->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register_edit->needles->Visible) { // needles ?>
	<div id="r_needles" class="form-group row">
		<label id="elh_patient_ot_surgery_register_needles" for="x_needles" class="<?php echo $patient_ot_surgery_register_edit->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_needles" type="text/html"><?php echo $patient_ot_surgery_register_edit->needles->caption() ?><?php echo $patient_ot_surgery_register_edit->needles->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_surgery_register_edit->RightColumnClass ?>"><div <?php echo $patient_ot_surgery_register_edit->needles->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_needles" type="text/html"><span id="el_patient_ot_surgery_register_needles">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_needles" name="x_needles" id="x_needles" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register_edit->needles->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register_edit->needles->EditValue ?>"<?php echo $patient_ot_surgery_register_edit->needles->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_surgery_register_edit->needles->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register_edit->bloodloss->Visible) { // bloodloss ?>
	<div id="r_bloodloss" class="form-group row">
		<label id="elh_patient_ot_surgery_register_bloodloss" for="x_bloodloss" class="<?php echo $patient_ot_surgery_register_edit->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_bloodloss" type="text/html"><?php echo $patient_ot_surgery_register_edit->bloodloss->caption() ?><?php echo $patient_ot_surgery_register_edit->bloodloss->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_surgery_register_edit->RightColumnClass ?>"><div <?php echo $patient_ot_surgery_register_edit->bloodloss->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_bloodloss" type="text/html"><span id="el_patient_ot_surgery_register_bloodloss">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_bloodloss" name="x_bloodloss" id="x_bloodloss" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register_edit->bloodloss->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register_edit->bloodloss->EditValue ?>"<?php echo $patient_ot_surgery_register_edit->bloodloss->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_surgery_register_edit->bloodloss->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register_edit->bloodtransfusion->Visible) { // bloodtransfusion ?>
	<div id="r_bloodtransfusion" class="form-group row">
		<label id="elh_patient_ot_surgery_register_bloodtransfusion" for="x_bloodtransfusion" class="<?php echo $patient_ot_surgery_register_edit->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_bloodtransfusion" type="text/html"><?php echo $patient_ot_surgery_register_edit->bloodtransfusion->caption() ?><?php echo $patient_ot_surgery_register_edit->bloodtransfusion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_surgery_register_edit->RightColumnClass ?>"><div <?php echo $patient_ot_surgery_register_edit->bloodtransfusion->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_bloodtransfusion" type="text/html"><span id="el_patient_ot_surgery_register_bloodtransfusion">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_bloodtransfusion" name="x_bloodtransfusion" id="x_bloodtransfusion" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register_edit->bloodtransfusion->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register_edit->bloodtransfusion->EditValue ?>"<?php echo $patient_ot_surgery_register_edit->bloodtransfusion->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_surgery_register_edit->bloodtransfusion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register_edit->implantsUsed->Visible) { // implantsUsed ?>
	<div id="r_implantsUsed" class="form-group row">
		<label id="elh_patient_ot_surgery_register_implantsUsed" for="x_implantsUsed" class="<?php echo $patient_ot_surgery_register_edit->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_implantsUsed" type="text/html"><?php echo $patient_ot_surgery_register_edit->implantsUsed->caption() ?><?php echo $patient_ot_surgery_register_edit->implantsUsed->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_surgery_register_edit->RightColumnClass ?>"><div <?php echo $patient_ot_surgery_register_edit->implantsUsed->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_implantsUsed" type="text/html"><span id="el_patient_ot_surgery_register_implantsUsed">
<textarea data-table="patient_ot_surgery_register" data-field="x_implantsUsed" name="x_implantsUsed" id="x_implantsUsed" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register_edit->implantsUsed->getPlaceHolder()) ?>"<?php echo $patient_ot_surgery_register_edit->implantsUsed->editAttributes() ?>><?php echo $patient_ot_surgery_register_edit->implantsUsed->EditValue ?></textarea>
</span></script>
<?php echo $patient_ot_surgery_register_edit->implantsUsed->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register_edit->MaterialsForHPE->Visible) { // MaterialsForHPE ?>
	<div id="r_MaterialsForHPE" class="form-group row">
		<label id="elh_patient_ot_surgery_register_MaterialsForHPE" for="x_MaterialsForHPE" class="<?php echo $patient_ot_surgery_register_edit->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_MaterialsForHPE" type="text/html"><?php echo $patient_ot_surgery_register_edit->MaterialsForHPE->caption() ?><?php echo $patient_ot_surgery_register_edit->MaterialsForHPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_surgery_register_edit->RightColumnClass ?>"><div <?php echo $patient_ot_surgery_register_edit->MaterialsForHPE->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_MaterialsForHPE" type="text/html"><span id="el_patient_ot_surgery_register_MaterialsForHPE">
<textarea data-table="patient_ot_surgery_register" data-field="x_MaterialsForHPE" name="x_MaterialsForHPE" id="x_MaterialsForHPE" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register_edit->MaterialsForHPE->getPlaceHolder()) ?>"<?php echo $patient_ot_surgery_register_edit->MaterialsForHPE->editAttributes() ?>><?php echo $patient_ot_surgery_register_edit->MaterialsForHPE->EditValue ?></textarea>
</span></script>
<?php echo $patient_ot_surgery_register_edit->MaterialsForHPE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register_edit->PatientSearch->Visible) { // PatientSearch ?>
	<div id="r_PatientSearch" class="form-group row">
		<label id="elh_patient_ot_surgery_register_PatientSearch" for="x_PatientSearch" class="<?php echo $patient_ot_surgery_register_edit->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_PatientSearch" type="text/html"><?php echo $patient_ot_surgery_register_edit->PatientSearch->caption() ?><?php echo $patient_ot_surgery_register_edit->PatientSearch->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_surgery_register_edit->RightColumnClass ?>"><div <?php echo $patient_ot_surgery_register_edit->PatientSearch->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_PatientSearch" type="text/html"><span id="el_patient_ot_surgery_register_PatientSearch">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PatientSearch"><?php echo EmptyValue(strval($patient_ot_surgery_register_edit->PatientSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $patient_ot_surgery_register_edit->PatientSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_ot_surgery_register_edit->PatientSearch->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($patient_ot_surgery_register_edit->PatientSearch->ReadOnly || $patient_ot_surgery_register_edit->PatientSearch->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_PatientSearch',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_ot_surgery_register_edit->PatientSearch->Lookup->getParamTag($patient_ot_surgery_register_edit, "p_x_PatientSearch") ?>
<input type="hidden" data-table="patient_ot_surgery_register" data-field="x_PatientSearch" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_ot_surgery_register_edit->PatientSearch->displayValueSeparatorAttribute() ?>" name="x_PatientSearch" id="x_PatientSearch" value="<?php echo $patient_ot_surgery_register_edit->PatientSearch->CurrentValue ?>"<?php echo $patient_ot_surgery_register_edit->PatientSearch->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_surgery_register_edit->PatientSearch->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register_edit->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_patient_ot_surgery_register_Reception" for="x_Reception" class="<?php echo $patient_ot_surgery_register_edit->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_Reception" type="text/html"><?php echo $patient_ot_surgery_register_edit->Reception->caption() ?><?php echo $patient_ot_surgery_register_edit->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_surgery_register_edit->RightColumnClass ?>"><div <?php echo $patient_ot_surgery_register_edit->Reception->cellAttributes() ?>>
<?php if ($patient_ot_surgery_register_edit->Reception->getSessionValue() != "") { ?>
<script id="tpx_patient_ot_surgery_register_Reception" type="text/html"><span id="el_patient_ot_surgery_register_Reception">
<span<?php echo $patient_ot_surgery_register_edit->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_surgery_register_edit->Reception->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x_Reception" name="x_Reception" value="<?php echo HtmlEncode($patient_ot_surgery_register_edit->Reception->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_patient_ot_surgery_register_Reception" type="text/html"><span id="el_patient_ot_surgery_register_Reception">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register_edit->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register_edit->Reception->EditValue ?>"<?php echo $patient_ot_surgery_register_edit->Reception->editAttributes() ?>>
</span></script>
<?php } ?>
<?php echo $patient_ot_surgery_register_edit->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register_edit->PatientID->Visible) { // PatientID ?>
	<div id="r_PatientID" class="form-group row">
		<label id="elh_patient_ot_surgery_register_PatientID" for="x_PatientID" class="<?php echo $patient_ot_surgery_register_edit->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_PatientID" type="text/html"><?php echo $patient_ot_surgery_register_edit->PatientID->caption() ?><?php echo $patient_ot_surgery_register_edit->PatientID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_surgery_register_edit->RightColumnClass ?>"><div <?php echo $patient_ot_surgery_register_edit->PatientID->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_PatientID" type="text/html"><span id="el_patient_ot_surgery_register_PatientID">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register_edit->PatientID->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register_edit->PatientID->EditValue ?>"<?php echo $patient_ot_surgery_register_edit->PatientID->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_surgery_register_edit->PatientID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_surgery_register_edit->PId->Visible) { // PId ?>
	<div id="r_PId" class="form-group row">
		<label id="elh_patient_ot_surgery_register_PId" for="x_PId" class="<?php echo $patient_ot_surgery_register_edit->LeftColumnClass ?>"><script id="tpc_patient_ot_surgery_register_PId" type="text/html"><?php echo $patient_ot_surgery_register_edit->PId->caption() ?><?php echo $patient_ot_surgery_register_edit->PId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_surgery_register_edit->RightColumnClass ?>"><div <?php echo $patient_ot_surgery_register_edit->PId->cellAttributes() ?>>
<?php if ($patient_ot_surgery_register_edit->PId->getSessionValue() != "") { ?>
<script id="tpx_patient_ot_surgery_register_PId" type="text/html"><span id="el_patient_ot_surgery_register_PId">
<span<?php echo $patient_ot_surgery_register_edit->PId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_surgery_register_edit->PId->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x_PId" name="x_PId" value="<?php echo HtmlEncode($patient_ot_surgery_register_edit->PId->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_patient_ot_surgery_register_PId" type="text/html"><span id="el_patient_ot_surgery_register_PId">
<input type="text" data-table="patient_ot_surgery_register" data-field="x_PId" name="x_PId" id="x_PId" size="30" placeholder="<?php echo HtmlEncode($patient_ot_surgery_register_edit->PId->getPlaceHolder()) ?>" value="<?php echo $patient_ot_surgery_register_edit->PId->EditValue ?>"<?php echo $patient_ot_surgery_register_edit->PId->editAttributes() ?>>
</span></script>
<?php } ?>
<?php echo $patient_ot_surgery_register_edit->PId->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_patient_ot_surgery_registeredit" class="ew-custom-template"></div>
<script id="tpm_patient_ot_surgery_registeredit" type="text/html">
<div id="ct_patient_ot_surgery_register_edit"><style>
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
	if($Tid == "")
	{
		$vviid = $_GET["id"] ;
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_ot_surgery_register where id='".$vviid."'; ";
		$resuVi = $dbhelper->ExecuteRows($sql);
		$Tid = $resuVi[0]["PatientID"];
		if($Tid == null)
		{
$Tid = $resuVi[0]["PId"];
		}
		$fk_mrnNo = $resuVi[0]["mrnno"];
	}
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
<div hidden>
<p id="PPatientSearch" hidden>{{include tmpl="#tpc_patient_ot_surgery_register_PatientSearch"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_surgery_register_PatientSearch")/}}</p>
</div>
<p id="profilePic" hidden>{{include tmpl="#tpc_patient_ot_surgery_register_profilePic"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_surgery_register_profilePic")/}}</p>
<p id="SurfaceArea" hidden>{{include tmpl=~getTemplate("#tpx_SurfaceArea")/}}</p>
<p id="BodyMassIndex" hidden>{{include tmpl=~getTemplate("#tpx_BodyMassIndex")/}}</p>
<p id="idmrnnokk" hidden>{{include tmpl="#tpc_patient_ot_surgery_register_mrnno"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_surgery_register_mrnno")/}}</p>
<div hidden>
  <p>{{include tmpl="#tpc_patient_ot_surgery_register_Reception"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_surgery_register_Reception")/}}</p> 
  <p>{{include tmpl="#tpc_patient_ot_surgery_register_PatientID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_surgery_register_PatientID")/}}</p> 
  <p>{{include tmpl="#tpc_patient_ot_surgery_register_PatientName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_surgery_register_PatientName")/}}</p> 
  <p>{{include tmpl="#tpc_patient_ot_surgery_register_Age"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_surgery_register_Age")/}}</p> 
  <p>{{include tmpl="#tpc_patient_ot_surgery_register_Gender"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_surgery_register_Gender")/}}</p>
  <p>{{include tmpl="#tpc_patient_ot_surgery_register_PatID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_surgery_register_PatID")/}}</p>
  <p>{{include tmpl="#tpc_patient_ot_surgery_register_MobileNumber"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_surgery_register_MobileNumber")/}}</p> 
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
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_diagnosis"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_surgery_register_diagnosis")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_proposedSurgery"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_surgery_register_proposedSurgery")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_surgeryProcedure"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_surgery_register_surgeryProcedure")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_typeOfAnaesthesia"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_surgery_register_typeOfAnaesthesia")/}}</td></tr>
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
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_RecievedTime"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_surgery_register_RecievedTime")/}}</td></tr>
							<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_AnaesthesiaStarted"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_surgery_register_AnaesthesiaStarted")/}}</td></tr>
							<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_AnaesthesiaEnded"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_surgery_register_AnaesthesiaEnded")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_surgeryStarted"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_surgery_register_surgeryStarted")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_surgeryEnded"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_surgery_register_surgeryEnded")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_RecoveryTime"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_surgery_register_RecoveryTime")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_ShiftedTime"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_surgery_register_ShiftedTime")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_Duration"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_surgery_register_Duration")/}}</td></tr>
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
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_Surgeon"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_surgery_register_Surgeon")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_Anaesthetist"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_surgery_register_Anaesthetist")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_AsstSurgeon1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_surgery_register_AsstSurgeon1")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_AsstSurgeon2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_surgery_register_AsstSurgeon2")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_paediatric"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_surgery_register_paediatric")/}}</td></tr>
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
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_ScrubNurse1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_surgery_register_ScrubNurse1")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_ScrubNurse2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_surgery_register_ScrubNurse2")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_FloorNurse"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_surgery_register_FloorNurse")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_Technician"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_surgery_register_Technician")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_HouseKeeping"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_surgery_register_HouseKeeping")/}}</td></tr>
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
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_countsCheckedMops"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_surgery_register_countsCheckedMops")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_gauze"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_surgery_register_gauze")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_needles"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_surgery_register_needles")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_bloodloss"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_surgery_register_bloodloss")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_bloodtransfusion"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_surgery_register_bloodtransfusion")/}}</td></tr>
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
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_implantsUsed"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_surgery_register_implantsUsed")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_MaterialsForHPE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_surgery_register_MaterialsForHPE")/}}</td></tr>
					</tbody>
				</table>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
</div>
</script>

<?php if (!$patient_ot_surgery_register_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $patient_ot_surgery_register_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_ot_surgery_register_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($patient_ot_surgery_register->Rows) ?> };
	ew.applyTemplate("tpd_patient_ot_surgery_registeredit", "tpm_patient_ot_surgery_registeredit", "patient_ot_surgery_registeredit", "<?php echo $patient_ot_surgery_register->CustomExport ?>", ew.templateData.rows[0]);
	$("script.patient_ot_surgery_registeredit_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$patient_ot_surgery_register_edit->showPageFooter();
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
$patient_ot_surgery_register_edit->terminate();
?>