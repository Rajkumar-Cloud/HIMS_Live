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
$patient_ot_delivery_register_add = new patient_ot_delivery_register_add();

// Run the page
$patient_ot_delivery_register_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_ot_delivery_register_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fpatient_ot_delivery_registeradd = currentForm = new ew.Form("fpatient_ot_delivery_registeradd", "add");

// Validate form
fpatient_ot_delivery_registeradd.validate = function() {
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
		<?php if ($patient_ot_delivery_register_add->PatID->Required) { ?>
			elm = this.getElements("x" + infix + "_PatID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->PatID->caption(), $patient_ot_delivery_register->PatID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->PatientName->caption(), $patient_ot_delivery_register->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->mrnno->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->mrnno->caption(), $patient_ot_delivery_register->mrnno->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->MobileNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_MobileNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->MobileNumber->caption(), $patient_ot_delivery_register->MobileNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->Age->caption(), $patient_ot_delivery_register->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->Gender->Required) { ?>
			elm = this.getElements("x" + infix + "_Gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->Gender->caption(), $patient_ot_delivery_register->Gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->profilePic->Required) { ?>
			elm = this.getElements("x" + infix + "_profilePic");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->profilePic->caption(), $patient_ot_delivery_register->profilePic->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->ObstetricsHistryFeMale->Required) { ?>
			elm = this.getElements("x" + infix + "_ObstetricsHistryFeMale");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->ObstetricsHistryFeMale->caption(), $patient_ot_delivery_register->ObstetricsHistryFeMale->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->Abortion->Required) { ?>
			elm = this.getElements("x" + infix + "_Abortion");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->Abortion->caption(), $patient_ot_delivery_register->Abortion->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->ChildBirthDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ChildBirthDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->ChildBirthDate->caption(), $patient_ot_delivery_register->ChildBirthDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ChildBirthDate");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register->ChildBirthDate->errorMessage()) ?>");
		<?php if ($patient_ot_delivery_register_add->ChildBirthTime->Required) { ?>
			elm = this.getElements("x" + infix + "_ChildBirthTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->ChildBirthTime->caption(), $patient_ot_delivery_register->ChildBirthTime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->ChildSex->Required) { ?>
			elm = this.getElements("x" + infix + "_ChildSex");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->ChildSex->caption(), $patient_ot_delivery_register->ChildSex->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->ChildWt->Required) { ?>
			elm = this.getElements("x" + infix + "_ChildWt");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->ChildWt->caption(), $patient_ot_delivery_register->ChildWt->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->ChildDay->Required) { ?>
			elm = this.getElements("x" + infix + "_ChildDay");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->ChildDay->caption(), $patient_ot_delivery_register->ChildDay->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->ChildOE->Required) { ?>
			elm = this.getElements("x" + infix + "_ChildOE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->ChildOE->caption(), $patient_ot_delivery_register->ChildOE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->TypeofDelivery->Required) { ?>
			elm = this.getElements("x" + infix + "_TypeofDelivery");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->TypeofDelivery->caption(), $patient_ot_delivery_register->TypeofDelivery->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->ChildBlGrp->Required) { ?>
			elm = this.getElements("x" + infix + "_ChildBlGrp");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->ChildBlGrp->caption(), $patient_ot_delivery_register->ChildBlGrp->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->ApgarScore->Required) { ?>
			elm = this.getElements("x" + infix + "_ApgarScore");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->ApgarScore->caption(), $patient_ot_delivery_register->ApgarScore->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->birthnotification->Required) { ?>
			elm = this.getElements("x" + infix + "_birthnotification");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->birthnotification->caption(), $patient_ot_delivery_register->birthnotification->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->formno->Required) { ?>
			elm = this.getElements("x" + infix + "_formno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->formno->caption(), $patient_ot_delivery_register->formno->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->dte->Required) { ?>
			elm = this.getElements("x" + infix + "_dte");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->dte->caption(), $patient_ot_delivery_register->dte->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_dte");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register->dte->errorMessage()) ?>");
		<?php if ($patient_ot_delivery_register_add->motherReligion->Required) { ?>
			elm = this.getElements("x" + infix + "_motherReligion");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->motherReligion->caption(), $patient_ot_delivery_register->motherReligion->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->bloodgroup->Required) { ?>
			elm = this.getElements("x" + infix + "_bloodgroup");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->bloodgroup->caption(), $patient_ot_delivery_register->bloodgroup->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->status->caption(), $patient_ot_delivery_register->status->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register->status->errorMessage()) ?>");
		<?php if ($patient_ot_delivery_register_add->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->createdby->caption(), $patient_ot_delivery_register->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register->createdby->errorMessage()) ?>");
		<?php if ($patient_ot_delivery_register_add->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->createddatetime->caption(), $patient_ot_delivery_register->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register->createddatetime->errorMessage()) ?>");
		<?php if ($patient_ot_delivery_register_add->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->modifiedby->caption(), $patient_ot_delivery_register->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register->modifiedby->errorMessage()) ?>");
		<?php if ($patient_ot_delivery_register_add->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->modifieddatetime->caption(), $patient_ot_delivery_register->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register->modifieddatetime->errorMessage()) ?>");
		<?php if ($patient_ot_delivery_register_add->PatientID->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->PatientID->caption(), $patient_ot_delivery_register->PatientID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->HospID->caption(), $patient_ot_delivery_register->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->ChildBirthDate1->Required) { ?>
			elm = this.getElements("x" + infix + "_ChildBirthDate1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->ChildBirthDate1->caption(), $patient_ot_delivery_register->ChildBirthDate1->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ChildBirthDate1");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register->ChildBirthDate1->errorMessage()) ?>");
		<?php if ($patient_ot_delivery_register_add->ChildBirthTime1->Required) { ?>
			elm = this.getElements("x" + infix + "_ChildBirthTime1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->ChildBirthTime1->caption(), $patient_ot_delivery_register->ChildBirthTime1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->ChildSex1->Required) { ?>
			elm = this.getElements("x" + infix + "_ChildSex1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->ChildSex1->caption(), $patient_ot_delivery_register->ChildSex1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->ChildWt1->Required) { ?>
			elm = this.getElements("x" + infix + "_ChildWt1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->ChildWt1->caption(), $patient_ot_delivery_register->ChildWt1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->ChildDay1->Required) { ?>
			elm = this.getElements("x" + infix + "_ChildDay1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->ChildDay1->caption(), $patient_ot_delivery_register->ChildDay1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->ChildOE1->Required) { ?>
			elm = this.getElements("x" + infix + "_ChildOE1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->ChildOE1->caption(), $patient_ot_delivery_register->ChildOE1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->TypeofDelivery1->Required) { ?>
			elm = this.getElements("x" + infix + "_TypeofDelivery1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->TypeofDelivery1->caption(), $patient_ot_delivery_register->TypeofDelivery1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->ChildBlGrp1->Required) { ?>
			elm = this.getElements("x" + infix + "_ChildBlGrp1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->ChildBlGrp1->caption(), $patient_ot_delivery_register->ChildBlGrp1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->ApgarScore1->Required) { ?>
			elm = this.getElements("x" + infix + "_ApgarScore1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->ApgarScore1->caption(), $patient_ot_delivery_register->ApgarScore1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->birthnotification1->Required) { ?>
			elm = this.getElements("x" + infix + "_birthnotification1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->birthnotification1->caption(), $patient_ot_delivery_register->birthnotification1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->formno1->Required) { ?>
			elm = this.getElements("x" + infix + "_formno1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->formno1->caption(), $patient_ot_delivery_register->formno1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->proposedSurgery->Required) { ?>
			elm = this.getElements("x" + infix + "_proposedSurgery");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->proposedSurgery->caption(), $patient_ot_delivery_register->proposedSurgery->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->surgeryProcedure->Required) { ?>
			elm = this.getElements("x" + infix + "_surgeryProcedure");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->surgeryProcedure->caption(), $patient_ot_delivery_register->surgeryProcedure->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->typeOfAnaesthesia->Required) { ?>
			elm = this.getElements("x" + infix + "_typeOfAnaesthesia");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->typeOfAnaesthesia->caption(), $patient_ot_delivery_register->typeOfAnaesthesia->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->RecievedTime->Required) { ?>
			elm = this.getElements("x" + infix + "_RecievedTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->RecievedTime->caption(), $patient_ot_delivery_register->RecievedTime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RecievedTime");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register->RecievedTime->errorMessage()) ?>");
		<?php if ($patient_ot_delivery_register_add->AnaesthesiaStarted->Required) { ?>
			elm = this.getElements("x" + infix + "_AnaesthesiaStarted");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->AnaesthesiaStarted->caption(), $patient_ot_delivery_register->AnaesthesiaStarted->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AnaesthesiaStarted");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register->AnaesthesiaStarted->errorMessage()) ?>");
		<?php if ($patient_ot_delivery_register_add->AnaesthesiaEnded->Required) { ?>
			elm = this.getElements("x" + infix + "_AnaesthesiaEnded");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->AnaesthesiaEnded->caption(), $patient_ot_delivery_register->AnaesthesiaEnded->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AnaesthesiaEnded");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register->AnaesthesiaEnded->errorMessage()) ?>");
		<?php if ($patient_ot_delivery_register_add->surgeryStarted->Required) { ?>
			elm = this.getElements("x" + infix + "_surgeryStarted");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->surgeryStarted->caption(), $patient_ot_delivery_register->surgeryStarted->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_surgeryStarted");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register->surgeryStarted->errorMessage()) ?>");
		<?php if ($patient_ot_delivery_register_add->surgeryEnded->Required) { ?>
			elm = this.getElements("x" + infix + "_surgeryEnded");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->surgeryEnded->caption(), $patient_ot_delivery_register->surgeryEnded->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_surgeryEnded");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register->surgeryEnded->errorMessage()) ?>");
		<?php if ($patient_ot_delivery_register_add->RecoveryTime->Required) { ?>
			elm = this.getElements("x" + infix + "_RecoveryTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->RecoveryTime->caption(), $patient_ot_delivery_register->RecoveryTime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RecoveryTime");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register->RecoveryTime->errorMessage()) ?>");
		<?php if ($patient_ot_delivery_register_add->ShiftedTime->Required) { ?>
			elm = this.getElements("x" + infix + "_ShiftedTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->ShiftedTime->caption(), $patient_ot_delivery_register->ShiftedTime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ShiftedTime");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register->ShiftedTime->errorMessage()) ?>");
		<?php if ($patient_ot_delivery_register_add->Duration->Required) { ?>
			elm = this.getElements("x" + infix + "_Duration");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->Duration->caption(), $patient_ot_delivery_register->Duration->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->DrVisit1->Required) { ?>
			elm = this.getElements("x" + infix + "_DrVisit1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->DrVisit1->caption(), $patient_ot_delivery_register->DrVisit1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->DrVisit2->Required) { ?>
			elm = this.getElements("x" + infix + "_DrVisit2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->DrVisit2->caption(), $patient_ot_delivery_register->DrVisit2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->DrVisit3->Required) { ?>
			elm = this.getElements("x" + infix + "_DrVisit3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->DrVisit3->caption(), $patient_ot_delivery_register->DrVisit3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->DrVisit4->Required) { ?>
			elm = this.getElements("x" + infix + "_DrVisit4");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->DrVisit4->caption(), $patient_ot_delivery_register->DrVisit4->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->Surgeon->Required) { ?>
			elm = this.getElements("x" + infix + "_Surgeon");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->Surgeon->caption(), $patient_ot_delivery_register->Surgeon->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->Anaesthetist->Required) { ?>
			elm = this.getElements("x" + infix + "_Anaesthetist");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->Anaesthetist->caption(), $patient_ot_delivery_register->Anaesthetist->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->AsstSurgeon1->Required) { ?>
			elm = this.getElements("x" + infix + "_AsstSurgeon1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->AsstSurgeon1->caption(), $patient_ot_delivery_register->AsstSurgeon1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->AsstSurgeon2->Required) { ?>
			elm = this.getElements("x" + infix + "_AsstSurgeon2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->AsstSurgeon2->caption(), $patient_ot_delivery_register->AsstSurgeon2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->paediatric->Required) { ?>
			elm = this.getElements("x" + infix + "_paediatric");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->paediatric->caption(), $patient_ot_delivery_register->paediatric->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->ScrubNurse1->Required) { ?>
			elm = this.getElements("x" + infix + "_ScrubNurse1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->ScrubNurse1->caption(), $patient_ot_delivery_register->ScrubNurse1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->ScrubNurse2->Required) { ?>
			elm = this.getElements("x" + infix + "_ScrubNurse2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->ScrubNurse2->caption(), $patient_ot_delivery_register->ScrubNurse2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->FloorNurse->Required) { ?>
			elm = this.getElements("x" + infix + "_FloorNurse");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->FloorNurse->caption(), $patient_ot_delivery_register->FloorNurse->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->Technician->Required) { ?>
			elm = this.getElements("x" + infix + "_Technician");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->Technician->caption(), $patient_ot_delivery_register->Technician->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->HouseKeeping->Required) { ?>
			elm = this.getElements("x" + infix + "_HouseKeeping");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->HouseKeeping->caption(), $patient_ot_delivery_register->HouseKeeping->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->countsCheckedMops->Required) { ?>
			elm = this.getElements("x" + infix + "_countsCheckedMops");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->countsCheckedMops->caption(), $patient_ot_delivery_register->countsCheckedMops->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->gauze->Required) { ?>
			elm = this.getElements("x" + infix + "_gauze");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->gauze->caption(), $patient_ot_delivery_register->gauze->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->needles->Required) { ?>
			elm = this.getElements("x" + infix + "_needles");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->needles->caption(), $patient_ot_delivery_register->needles->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->bloodloss->Required) { ?>
			elm = this.getElements("x" + infix + "_bloodloss");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->bloodloss->caption(), $patient_ot_delivery_register->bloodloss->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->bloodtransfusion->Required) { ?>
			elm = this.getElements("x" + infix + "_bloodtransfusion");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->bloodtransfusion->caption(), $patient_ot_delivery_register->bloodtransfusion->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->implantsUsed->Required) { ?>
			elm = this.getElements("x" + infix + "_implantsUsed");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->implantsUsed->caption(), $patient_ot_delivery_register->implantsUsed->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->MaterialsForHPE->Required) { ?>
			elm = this.getElements("x" + infix + "_MaterialsForHPE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->MaterialsForHPE->caption(), $patient_ot_delivery_register->MaterialsForHPE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_add->Reception->Required) { ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->Reception->caption(), $patient_ot_delivery_register->Reception->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register->Reception->errorMessage()) ?>");
		<?php if ($patient_ot_delivery_register_add->PId->Required) { ?>
			elm = this.getElements("x" + infix + "_PId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->PId->caption(), $patient_ot_delivery_register->PId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register->PId->errorMessage()) ?>");
		<?php if ($patient_ot_delivery_register_add->PatientSearch->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientSearch");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->PatientSearch->caption(), $patient_ot_delivery_register->PatientSearch->RequiredErrorMessage)) ?>");
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
fpatient_ot_delivery_registeradd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_ot_delivery_registeradd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_ot_delivery_registeradd.lists["x_DrVisit1"] = <?php echo $patient_ot_delivery_register_add->DrVisit1->Lookup->toClientList() ?>;
fpatient_ot_delivery_registeradd.lists["x_DrVisit1"].options = <?php echo JsonEncode($patient_ot_delivery_register_add->DrVisit1->lookupOptions()) ?>;
fpatient_ot_delivery_registeradd.lists["x_DrVisit2"] = <?php echo $patient_ot_delivery_register_add->DrVisit2->Lookup->toClientList() ?>;
fpatient_ot_delivery_registeradd.lists["x_DrVisit2"].options = <?php echo JsonEncode($patient_ot_delivery_register_add->DrVisit2->lookupOptions()) ?>;
fpatient_ot_delivery_registeradd.lists["x_DrVisit3"] = <?php echo $patient_ot_delivery_register_add->DrVisit3->Lookup->toClientList() ?>;
fpatient_ot_delivery_registeradd.lists["x_DrVisit3"].options = <?php echo JsonEncode($patient_ot_delivery_register_add->DrVisit3->lookupOptions()) ?>;
fpatient_ot_delivery_registeradd.lists["x_DrVisit4"] = <?php echo $patient_ot_delivery_register_add->DrVisit4->Lookup->toClientList() ?>;
fpatient_ot_delivery_registeradd.lists["x_DrVisit4"].options = <?php echo JsonEncode($patient_ot_delivery_register_add->DrVisit4->lookupOptions()) ?>;
fpatient_ot_delivery_registeradd.lists["x_Surgeon"] = <?php echo $patient_ot_delivery_register_add->Surgeon->Lookup->toClientList() ?>;
fpatient_ot_delivery_registeradd.lists["x_Surgeon"].options = <?php echo JsonEncode($patient_ot_delivery_register_add->Surgeon->lookupOptions()) ?>;
fpatient_ot_delivery_registeradd.autoSuggests["x_Surgeon"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_ot_delivery_registeradd.lists["x_Anaesthetist"] = <?php echo $patient_ot_delivery_register_add->Anaesthetist->Lookup->toClientList() ?>;
fpatient_ot_delivery_registeradd.lists["x_Anaesthetist"].options = <?php echo JsonEncode($patient_ot_delivery_register_add->Anaesthetist->lookupOptions()) ?>;
fpatient_ot_delivery_registeradd.autoSuggests["x_Anaesthetist"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_ot_delivery_registeradd.lists["x_AsstSurgeon1"] = <?php echo $patient_ot_delivery_register_add->AsstSurgeon1->Lookup->toClientList() ?>;
fpatient_ot_delivery_registeradd.lists["x_AsstSurgeon1"].options = <?php echo JsonEncode($patient_ot_delivery_register_add->AsstSurgeon1->lookupOptions()) ?>;
fpatient_ot_delivery_registeradd.autoSuggests["x_AsstSurgeon1"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_ot_delivery_registeradd.lists["x_AsstSurgeon2"] = <?php echo $patient_ot_delivery_register_add->AsstSurgeon2->Lookup->toClientList() ?>;
fpatient_ot_delivery_registeradd.lists["x_AsstSurgeon2"].options = <?php echo JsonEncode($patient_ot_delivery_register_add->AsstSurgeon2->lookupOptions()) ?>;
fpatient_ot_delivery_registeradd.autoSuggests["x_AsstSurgeon2"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_ot_delivery_registeradd.lists["x_paediatric"] = <?php echo $patient_ot_delivery_register_add->paediatric->Lookup->toClientList() ?>;
fpatient_ot_delivery_registeradd.lists["x_paediatric"].options = <?php echo JsonEncode($patient_ot_delivery_register_add->paediatric->lookupOptions()) ?>;
fpatient_ot_delivery_registeradd.autoSuggests["x_paediatric"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_ot_delivery_registeradd.lists["x_PatientSearch"] = <?php echo $patient_ot_delivery_register_add->PatientSearch->Lookup->toClientList() ?>;
fpatient_ot_delivery_registeradd.lists["x_PatientSearch"].options = <?php echo JsonEncode($patient_ot_delivery_register_add->PatientSearch->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $patient_ot_delivery_register_add->showPageHeader(); ?>
<?php
$patient_ot_delivery_register_add->showMessage();
?>
<form name="fpatient_ot_delivery_registeradd" id="fpatient_ot_delivery_registeradd" class="<?php echo $patient_ot_delivery_register_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_ot_delivery_register_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_ot_delivery_register_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_ot_delivery_register">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$patient_ot_delivery_register_add->IsModal ?>">
<?php if ($patient_ot_delivery_register->getCurrentMasterTable() == "ip_admission") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?php echo $patient_ot_delivery_register->Reception->getSessionValue() ?>">
<input type="hidden" name="fk_mrnNo" value="<?php echo $patient_ot_delivery_register->mrnno->getSessionValue() ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo $patient_ot_delivery_register->PId->getSessionValue() ?>">
<?php } ?>
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($patient_ot_delivery_register->PatID->Visible) { // PatID ?>
	<div id="r_PatID" class="form-group row">
		<label id="elh_patient_ot_delivery_register_PatID" for="x_PatID" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_PatID" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->PatID->caption() ?><?php echo ($patient_ot_delivery_register->PatID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->PatID->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_PatID" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_PatID">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->PatID->EditValue ?>"<?php echo $patient_ot_delivery_register->PatID->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_delivery_register->PatID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_patient_ot_delivery_register_PatientName" for="x_PatientName" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_PatientName" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->PatientName->caption() ?><?php echo ($patient_ot_delivery_register->PatientName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->PatientName->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_PatientName" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_PatientName">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->PatientName->EditValue ?>"<?php echo $patient_ot_delivery_register->PatientName->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_delivery_register->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_patient_ot_delivery_register_mrnno" for="x_mrnno" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_mrnno" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->mrnno->caption() ?><?php echo ($patient_ot_delivery_register->mrnno->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->mrnno->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->mrnno->getSessionValue() <> "") { ?>
<script id="tpx_patient_ot_delivery_register_mrnno" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_mrnno">
<span<?php echo $patient_ot_delivery_register->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->mrnno->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" id="x_mrnno" name="x_mrnno" value="<?php echo HtmlEncode($patient_ot_delivery_register->mrnno->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_patient_ot_delivery_register_mrnno" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_mrnno">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->mrnno->EditValue ?>"<?php echo $patient_ot_delivery_register->mrnno->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php echo $patient_ot_delivery_register->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->MobileNumber->Visible) { // MobileNumber ?>
	<div id="r_MobileNumber" class="form-group row">
		<label id="elh_patient_ot_delivery_register_MobileNumber" for="x_MobileNumber" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_MobileNumber" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->MobileNumber->caption() ?><?php echo ($patient_ot_delivery_register->MobileNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->MobileNumber->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_MobileNumber" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_MobileNumber">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->MobileNumber->EditValue ?>"<?php echo $patient_ot_delivery_register->MobileNumber->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_delivery_register->MobileNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_patient_ot_delivery_register_Age" for="x_Age" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_Age" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->Age->caption() ?><?php echo ($patient_ot_delivery_register->Age->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->Age->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_Age" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_Age">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->Age->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->Age->EditValue ?>"<?php echo $patient_ot_delivery_register->Age->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_delivery_register->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label id="elh_patient_ot_delivery_register_Gender" for="x_Gender" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_Gender" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->Gender->caption() ?><?php echo ($patient_ot_delivery_register->Gender->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->Gender->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_Gender" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_Gender">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->Gender->EditValue ?>"<?php echo $patient_ot_delivery_register->Gender->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_delivery_register->Gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_patient_ot_delivery_register_profilePic" for="x_profilePic" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_profilePic" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->profilePic->caption() ?><?php echo ($patient_ot_delivery_register->profilePic->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->profilePic->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_profilePic" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_profilePic">
<textarea data-table="patient_ot_delivery_register" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->profilePic->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register->profilePic->editAttributes() ?>><?php echo $patient_ot_delivery_register->profilePic->EditValue ?></textarea>
</span>
</script>
<?php echo $patient_ot_delivery_register->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->ObstetricsHistryFeMale->Visible) { // ObstetricsHistryFeMale ?>
	<div id="r_ObstetricsHistryFeMale" class="form-group row">
		<label id="elh_patient_ot_delivery_register_ObstetricsHistryFeMale" for="x_ObstetricsHistryFeMale" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_ObstetricsHistryFeMale" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->ObstetricsHistryFeMale->caption() ?><?php echo ($patient_ot_delivery_register->ObstetricsHistryFeMale->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->ObstetricsHistryFeMale->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ObstetricsHistryFeMale" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_ObstetricsHistryFeMale">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ObstetricsHistryFeMale" name="x_ObstetricsHistryFeMale" id="x_ObstetricsHistryFeMale" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ObstetricsHistryFeMale->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ObstetricsHistryFeMale->EditValue ?>"<?php echo $patient_ot_delivery_register->ObstetricsHistryFeMale->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_delivery_register->ObstetricsHistryFeMale->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->Abortion->Visible) { // Abortion ?>
	<div id="r_Abortion" class="form-group row">
		<label id="elh_patient_ot_delivery_register_Abortion" for="x_Abortion" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_Abortion" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->Abortion->caption() ?><?php echo ($patient_ot_delivery_register->Abortion->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->Abortion->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_Abortion" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_Abortion">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_Abortion" name="x_Abortion" id="x_Abortion" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->Abortion->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->Abortion->EditValue ?>"<?php echo $patient_ot_delivery_register->Abortion->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_delivery_register->Abortion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildBirthDate->Visible) { // ChildBirthDate ?>
	<div id="r_ChildBirthDate" class="form-group row">
		<label id="elh_patient_ot_delivery_register_ChildBirthDate" for="x_ChildBirthDate" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_ChildBirthDate" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->ChildBirthDate->caption() ?><?php echo ($patient_ot_delivery_register->ChildBirthDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->ChildBirthDate->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ChildBirthDate" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_ChildBirthDate">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate" data-format="7" name="x_ChildBirthDate" id="x_ChildBirthDate" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBirthDate->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildBirthDate->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildBirthDate->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->ChildBirthDate->ReadOnly && !$patient_ot_delivery_register->ChildBirthDate->Disabled && !isset($patient_ot_delivery_register->ChildBirthDate->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->ChildBirthDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_ot_delivery_registeradd_js">
ew.createDateTimePicker("fpatient_ot_delivery_registeradd", "x_ChildBirthDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php echo $patient_ot_delivery_register->ChildBirthDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildBirthTime->Visible) { // ChildBirthTime ?>
	<div id="r_ChildBirthTime" class="form-group row">
		<label id="elh_patient_ot_delivery_register_ChildBirthTime" for="x_ChildBirthTime" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_ChildBirthTime" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->ChildBirthTime->caption() ?><?php echo ($patient_ot_delivery_register->ChildBirthTime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->ChildBirthTime->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ChildBirthTime" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_ChildBirthTime">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime" name="x_ChildBirthTime" id="x_ChildBirthTime" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBirthTime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildBirthTime->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildBirthTime->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->ChildBirthTime->ReadOnly && !$patient_ot_delivery_register->ChildBirthTime->Disabled && !isset($patient_ot_delivery_register->ChildBirthTime->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->ChildBirthTime->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_ot_delivery_registeradd_js">ew.createTimePicker("fpatient_ot_delivery_registeradd", "x_ChildBirthTime", {"timeFormat":"h:i A","step":15});
</script>
<?php echo $patient_ot_delivery_register->ChildBirthTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildSex->Visible) { // ChildSex ?>
	<div id="r_ChildSex" class="form-group row">
		<label id="elh_patient_ot_delivery_register_ChildSex" for="x_ChildSex" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_ChildSex" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->ChildSex->caption() ?><?php echo ($patient_ot_delivery_register->ChildSex->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->ChildSex->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ChildSex" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_ChildSex">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildSex" name="x_ChildSex" id="x_ChildSex" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildSex->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildSex->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildSex->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_delivery_register->ChildSex->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildWt->Visible) { // ChildWt ?>
	<div id="r_ChildWt" class="form-group row">
		<label id="elh_patient_ot_delivery_register_ChildWt" for="x_ChildWt" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_ChildWt" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->ChildWt->caption() ?><?php echo ($patient_ot_delivery_register->ChildWt->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->ChildWt->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ChildWt" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_ChildWt">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildWt" name="x_ChildWt" id="x_ChildWt" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildWt->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildWt->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildWt->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_delivery_register->ChildWt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildDay->Visible) { // ChildDay ?>
	<div id="r_ChildDay" class="form-group row">
		<label id="elh_patient_ot_delivery_register_ChildDay" for="x_ChildDay" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_ChildDay" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->ChildDay->caption() ?><?php echo ($patient_ot_delivery_register->ChildDay->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->ChildDay->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ChildDay" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_ChildDay">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildDay" name="x_ChildDay" id="x_ChildDay" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildDay->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildDay->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildDay->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_delivery_register->ChildDay->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildOE->Visible) { // ChildOE ?>
	<div id="r_ChildOE" class="form-group row">
		<label id="elh_patient_ot_delivery_register_ChildOE" for="x_ChildOE" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_ChildOE" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->ChildOE->caption() ?><?php echo ($patient_ot_delivery_register->ChildOE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->ChildOE->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ChildOE" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_ChildOE">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildOE" name="x_ChildOE" id="x_ChildOE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildOE->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildOE->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildOE->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_delivery_register->ChildOE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->TypeofDelivery->Visible) { // TypeofDelivery ?>
	<div id="r_TypeofDelivery" class="form-group row">
		<label id="elh_patient_ot_delivery_register_TypeofDelivery" for="x_TypeofDelivery" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_TypeofDelivery" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->TypeofDelivery->caption() ?><?php echo ($patient_ot_delivery_register->TypeofDelivery->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->TypeofDelivery->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_TypeofDelivery" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_TypeofDelivery">
<textarea data-table="patient_ot_delivery_register" data-field="x_TypeofDelivery" name="x_TypeofDelivery" id="x_TypeofDelivery" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->TypeofDelivery->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register->TypeofDelivery->editAttributes() ?>><?php echo $patient_ot_delivery_register->TypeofDelivery->EditValue ?></textarea>
</span>
</script>
<?php echo $patient_ot_delivery_register->TypeofDelivery->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildBlGrp->Visible) { // ChildBlGrp ?>
	<div id="r_ChildBlGrp" class="form-group row">
		<label id="elh_patient_ot_delivery_register_ChildBlGrp" for="x_ChildBlGrp" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_ChildBlGrp" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->ChildBlGrp->caption() ?><?php echo ($patient_ot_delivery_register->ChildBlGrp->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->ChildBlGrp->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ChildBlGrp" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_ChildBlGrp">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp" name="x_ChildBlGrp" id="x_ChildBlGrp" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBlGrp->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildBlGrp->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildBlGrp->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_delivery_register->ChildBlGrp->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->ApgarScore->Visible) { // ApgarScore ?>
	<div id="r_ApgarScore" class="form-group row">
		<label id="elh_patient_ot_delivery_register_ApgarScore" for="x_ApgarScore" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_ApgarScore" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->ApgarScore->caption() ?><?php echo ($patient_ot_delivery_register->ApgarScore->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->ApgarScore->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ApgarScore" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_ApgarScore">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ApgarScore" name="x_ApgarScore" id="x_ApgarScore" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ApgarScore->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ApgarScore->EditValue ?>"<?php echo $patient_ot_delivery_register->ApgarScore->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_delivery_register->ApgarScore->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->birthnotification->Visible) { // birthnotification ?>
	<div id="r_birthnotification" class="form-group row">
		<label id="elh_patient_ot_delivery_register_birthnotification" for="x_birthnotification" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_birthnotification" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->birthnotification->caption() ?><?php echo ($patient_ot_delivery_register->birthnotification->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->birthnotification->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_birthnotification" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_birthnotification">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_birthnotification" name="x_birthnotification" id="x_birthnotification" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->birthnotification->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->birthnotification->EditValue ?>"<?php echo $patient_ot_delivery_register->birthnotification->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_delivery_register->birthnotification->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->formno->Visible) { // formno ?>
	<div id="r_formno" class="form-group row">
		<label id="elh_patient_ot_delivery_register_formno" for="x_formno" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_formno" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->formno->caption() ?><?php echo ($patient_ot_delivery_register->formno->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->formno->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_formno" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_formno">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_formno" name="x_formno" id="x_formno" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->formno->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->formno->EditValue ?>"<?php echo $patient_ot_delivery_register->formno->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_delivery_register->formno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->dte->Visible) { // dte ?>
	<div id="r_dte" class="form-group row">
		<label id="elh_patient_ot_delivery_register_dte" for="x_dte" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_dte" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->dte->caption() ?><?php echo ($patient_ot_delivery_register->dte->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->dte->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_dte" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_dte">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_dte" name="x_dte" id="x_dte" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->dte->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->dte->EditValue ?>"<?php echo $patient_ot_delivery_register->dte->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->dte->ReadOnly && !$patient_ot_delivery_register->dte->Disabled && !isset($patient_ot_delivery_register->dte->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->dte->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_ot_delivery_registeradd_js">
ew.createDateTimePicker("fpatient_ot_delivery_registeradd", "x_dte", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php echo $patient_ot_delivery_register->dte->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->motherReligion->Visible) { // motherReligion ?>
	<div id="r_motherReligion" class="form-group row">
		<label id="elh_patient_ot_delivery_register_motherReligion" for="x_motherReligion" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_motherReligion" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->motherReligion->caption() ?><?php echo ($patient_ot_delivery_register->motherReligion->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->motherReligion->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_motherReligion" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_motherReligion">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_motherReligion" name="x_motherReligion" id="x_motherReligion" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->motherReligion->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->motherReligion->EditValue ?>"<?php echo $patient_ot_delivery_register->motherReligion->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_delivery_register->motherReligion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->bloodgroup->Visible) { // bloodgroup ?>
	<div id="r_bloodgroup" class="form-group row">
		<label id="elh_patient_ot_delivery_register_bloodgroup" for="x_bloodgroup" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_bloodgroup" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->bloodgroup->caption() ?><?php echo ($patient_ot_delivery_register->bloodgroup->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->bloodgroup->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_bloodgroup" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_bloodgroup">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_bloodgroup" name="x_bloodgroup" id="x_bloodgroup" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->bloodgroup->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->bloodgroup->EditValue ?>"<?php echo $patient_ot_delivery_register->bloodgroup->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_delivery_register->bloodgroup->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_patient_ot_delivery_register_status" for="x_status" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_status" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->status->caption() ?><?php echo ($patient_ot_delivery_register->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->status->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_status" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_status">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->status->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->status->EditValue ?>"<?php echo $patient_ot_delivery_register->status->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_delivery_register->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label id="elh_patient_ot_delivery_register_createdby" for="x_createdby" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_createdby" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->createdby->caption() ?><?php echo ($patient_ot_delivery_register->createdby->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->createdby->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_createdby" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_createdby">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->createdby->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->createdby->EditValue ?>"<?php echo $patient_ot_delivery_register->createdby->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_delivery_register->createdby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label id="elh_patient_ot_delivery_register_createddatetime" for="x_createddatetime" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_createddatetime" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->createddatetime->caption() ?><?php echo ($patient_ot_delivery_register->createddatetime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->createddatetime->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_createddatetime" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_createddatetime">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->createddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->createddatetime->EditValue ?>"<?php echo $patient_ot_delivery_register->createddatetime->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->createddatetime->ReadOnly && !$patient_ot_delivery_register->createddatetime->Disabled && !isset($patient_ot_delivery_register->createddatetime->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->createddatetime->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_ot_delivery_registeradd_js">
ew.createDateTimePicker("fpatient_ot_delivery_registeradd", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php echo $patient_ot_delivery_register->createddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label id="elh_patient_ot_delivery_register_modifiedby" for="x_modifiedby" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_modifiedby" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->modifiedby->caption() ?><?php echo ($patient_ot_delivery_register->modifiedby->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->modifiedby->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_modifiedby" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_modifiedby">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->modifiedby->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->modifiedby->EditValue ?>"<?php echo $patient_ot_delivery_register->modifiedby->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_delivery_register->modifiedby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label id="elh_patient_ot_delivery_register_modifieddatetime" for="x_modifieddatetime" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_modifieddatetime" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->modifieddatetime->caption() ?><?php echo ($patient_ot_delivery_register->modifieddatetime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->modifieddatetime->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_modifieddatetime" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_modifieddatetime">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->modifieddatetime->EditValue ?>"<?php echo $patient_ot_delivery_register->modifieddatetime->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->modifieddatetime->ReadOnly && !$patient_ot_delivery_register->modifieddatetime->Disabled && !isset($patient_ot_delivery_register->modifieddatetime->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->modifieddatetime->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_ot_delivery_registeradd_js">
ew.createDateTimePicker("fpatient_ot_delivery_registeradd", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php echo $patient_ot_delivery_register->modifieddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->PatientID->Visible) { // PatientID ?>
	<div id="r_PatientID" class="form-group row">
		<label id="elh_patient_ot_delivery_register_PatientID" for="x_PatientID" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_PatientID" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->PatientID->caption() ?><?php echo ($patient_ot_delivery_register->PatientID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->PatientID->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_PatientID" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_PatientID">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->PatientID->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->PatientID->EditValue ?>"<?php echo $patient_ot_delivery_register->PatientID->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_delivery_register->PatientID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildBirthDate1->Visible) { // ChildBirthDate1 ?>
	<div id="r_ChildBirthDate1" class="form-group row">
		<label id="elh_patient_ot_delivery_register_ChildBirthDate1" for="x_ChildBirthDate1" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_ChildBirthDate1" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->ChildBirthDate1->caption() ?><?php echo ($patient_ot_delivery_register->ChildBirthDate1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->ChildBirthDate1->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ChildBirthDate1" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_ChildBirthDate1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate1" name="x_ChildBirthDate1" id="x_ChildBirthDate1" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBirthDate1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildBirthDate1->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildBirthDate1->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->ChildBirthDate1->ReadOnly && !$patient_ot_delivery_register->ChildBirthDate1->Disabled && !isset($patient_ot_delivery_register->ChildBirthDate1->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->ChildBirthDate1->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_ot_delivery_registeradd_js">
ew.createDateTimePicker("fpatient_ot_delivery_registeradd", "x_ChildBirthDate1", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php echo $patient_ot_delivery_register->ChildBirthDate1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildBirthTime1->Visible) { // ChildBirthTime1 ?>
	<div id="r_ChildBirthTime1" class="form-group row">
		<label id="elh_patient_ot_delivery_register_ChildBirthTime1" for="x_ChildBirthTime1" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_ChildBirthTime1" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->ChildBirthTime1->caption() ?><?php echo ($patient_ot_delivery_register->ChildBirthTime1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->ChildBirthTime1->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ChildBirthTime1" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_ChildBirthTime1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime1" name="x_ChildBirthTime1" id="x_ChildBirthTime1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBirthTime1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildBirthTime1->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildBirthTime1->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_delivery_register->ChildBirthTime1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildSex1->Visible) { // ChildSex1 ?>
	<div id="r_ChildSex1" class="form-group row">
		<label id="elh_patient_ot_delivery_register_ChildSex1" for="x_ChildSex1" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_ChildSex1" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->ChildSex1->caption() ?><?php echo ($patient_ot_delivery_register->ChildSex1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->ChildSex1->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ChildSex1" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_ChildSex1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildSex1" name="x_ChildSex1" id="x_ChildSex1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildSex1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildSex1->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildSex1->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_delivery_register->ChildSex1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildWt1->Visible) { // ChildWt1 ?>
	<div id="r_ChildWt1" class="form-group row">
		<label id="elh_patient_ot_delivery_register_ChildWt1" for="x_ChildWt1" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_ChildWt1" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->ChildWt1->caption() ?><?php echo ($patient_ot_delivery_register->ChildWt1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->ChildWt1->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ChildWt1" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_ChildWt1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildWt1" name="x_ChildWt1" id="x_ChildWt1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildWt1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildWt1->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildWt1->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_delivery_register->ChildWt1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildDay1->Visible) { // ChildDay1 ?>
	<div id="r_ChildDay1" class="form-group row">
		<label id="elh_patient_ot_delivery_register_ChildDay1" for="x_ChildDay1" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_ChildDay1" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->ChildDay1->caption() ?><?php echo ($patient_ot_delivery_register->ChildDay1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->ChildDay1->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ChildDay1" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_ChildDay1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildDay1" name="x_ChildDay1" id="x_ChildDay1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildDay1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildDay1->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildDay1->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_delivery_register->ChildDay1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildOE1->Visible) { // ChildOE1 ?>
	<div id="r_ChildOE1" class="form-group row">
		<label id="elh_patient_ot_delivery_register_ChildOE1" for="x_ChildOE1" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_ChildOE1" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->ChildOE1->caption() ?><?php echo ($patient_ot_delivery_register->ChildOE1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->ChildOE1->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ChildOE1" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_ChildOE1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildOE1" name="x_ChildOE1" id="x_ChildOE1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildOE1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildOE1->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildOE1->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_delivery_register->ChildOE1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->TypeofDelivery1->Visible) { // TypeofDelivery1 ?>
	<div id="r_TypeofDelivery1" class="form-group row">
		<label id="elh_patient_ot_delivery_register_TypeofDelivery1" for="x_TypeofDelivery1" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_TypeofDelivery1" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->TypeofDelivery1->caption() ?><?php echo ($patient_ot_delivery_register->TypeofDelivery1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->TypeofDelivery1->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_TypeofDelivery1" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_TypeofDelivery1">
<textarea data-table="patient_ot_delivery_register" data-field="x_TypeofDelivery1" name="x_TypeofDelivery1" id="x_TypeofDelivery1" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->TypeofDelivery1->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register->TypeofDelivery1->editAttributes() ?>><?php echo $patient_ot_delivery_register->TypeofDelivery1->EditValue ?></textarea>
</span>
</script>
<?php echo $patient_ot_delivery_register->TypeofDelivery1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildBlGrp1->Visible) { // ChildBlGrp1 ?>
	<div id="r_ChildBlGrp1" class="form-group row">
		<label id="elh_patient_ot_delivery_register_ChildBlGrp1" for="x_ChildBlGrp1" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_ChildBlGrp1" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->ChildBlGrp1->caption() ?><?php echo ($patient_ot_delivery_register->ChildBlGrp1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->ChildBlGrp1->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ChildBlGrp1" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_ChildBlGrp1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp1" name="x_ChildBlGrp1" id="x_ChildBlGrp1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBlGrp1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildBlGrp1->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildBlGrp1->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_delivery_register->ChildBlGrp1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->ApgarScore1->Visible) { // ApgarScore1 ?>
	<div id="r_ApgarScore1" class="form-group row">
		<label id="elh_patient_ot_delivery_register_ApgarScore1" for="x_ApgarScore1" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_ApgarScore1" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->ApgarScore1->caption() ?><?php echo ($patient_ot_delivery_register->ApgarScore1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->ApgarScore1->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ApgarScore1" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_ApgarScore1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ApgarScore1" name="x_ApgarScore1" id="x_ApgarScore1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ApgarScore1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ApgarScore1->EditValue ?>"<?php echo $patient_ot_delivery_register->ApgarScore1->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_delivery_register->ApgarScore1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->birthnotification1->Visible) { // birthnotification1 ?>
	<div id="r_birthnotification1" class="form-group row">
		<label id="elh_patient_ot_delivery_register_birthnotification1" for="x_birthnotification1" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_birthnotification1" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->birthnotification1->caption() ?><?php echo ($patient_ot_delivery_register->birthnotification1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->birthnotification1->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_birthnotification1" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_birthnotification1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_birthnotification1" name="x_birthnotification1" id="x_birthnotification1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->birthnotification1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->birthnotification1->EditValue ?>"<?php echo $patient_ot_delivery_register->birthnotification1->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_delivery_register->birthnotification1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->formno1->Visible) { // formno1 ?>
	<div id="r_formno1" class="form-group row">
		<label id="elh_patient_ot_delivery_register_formno1" for="x_formno1" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_formno1" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->formno1->caption() ?><?php echo ($patient_ot_delivery_register->formno1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->formno1->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_formno1" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_formno1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_formno1" name="x_formno1" id="x_formno1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->formno1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->formno1->EditValue ?>"<?php echo $patient_ot_delivery_register->formno1->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_delivery_register->formno1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->proposedSurgery->Visible) { // proposedSurgery ?>
	<div id="r_proposedSurgery" class="form-group row">
		<label id="elh_patient_ot_delivery_register_proposedSurgery" for="x_proposedSurgery" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_proposedSurgery" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->proposedSurgery->caption() ?><?php echo ($patient_ot_delivery_register->proposedSurgery->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->proposedSurgery->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_proposedSurgery" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_proposedSurgery">
<textarea data-table="patient_ot_delivery_register" data-field="x_proposedSurgery" name="x_proposedSurgery" id="x_proposedSurgery" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->proposedSurgery->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register->proposedSurgery->editAttributes() ?>><?php echo $patient_ot_delivery_register->proposedSurgery->EditValue ?></textarea>
</span>
</script>
<?php echo $patient_ot_delivery_register->proposedSurgery->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->surgeryProcedure->Visible) { // surgeryProcedure ?>
	<div id="r_surgeryProcedure" class="form-group row">
		<label id="elh_patient_ot_delivery_register_surgeryProcedure" for="x_surgeryProcedure" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_surgeryProcedure" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->surgeryProcedure->caption() ?><?php echo ($patient_ot_delivery_register->surgeryProcedure->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->surgeryProcedure->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_surgeryProcedure" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_surgeryProcedure">
<textarea data-table="patient_ot_delivery_register" data-field="x_surgeryProcedure" name="x_surgeryProcedure" id="x_surgeryProcedure" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->surgeryProcedure->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register->surgeryProcedure->editAttributes() ?>><?php echo $patient_ot_delivery_register->surgeryProcedure->EditValue ?></textarea>
</span>
</script>
<?php echo $patient_ot_delivery_register->surgeryProcedure->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->typeOfAnaesthesia->Visible) { // typeOfAnaesthesia ?>
	<div id="r_typeOfAnaesthesia" class="form-group row">
		<label id="elh_patient_ot_delivery_register_typeOfAnaesthesia" for="x_typeOfAnaesthesia" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_typeOfAnaesthesia" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->typeOfAnaesthesia->caption() ?><?php echo ($patient_ot_delivery_register->typeOfAnaesthesia->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->typeOfAnaesthesia->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_typeOfAnaesthesia" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_typeOfAnaesthesia">
<textarea data-table="patient_ot_delivery_register" data-field="x_typeOfAnaesthesia" name="x_typeOfAnaesthesia" id="x_typeOfAnaesthesia" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->typeOfAnaesthesia->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register->typeOfAnaesthesia->editAttributes() ?>><?php echo $patient_ot_delivery_register->typeOfAnaesthesia->EditValue ?></textarea>
</span>
</script>
<?php echo $patient_ot_delivery_register->typeOfAnaesthesia->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->RecievedTime->Visible) { // RecievedTime ?>
	<div id="r_RecievedTime" class="form-group row">
		<label id="elh_patient_ot_delivery_register_RecievedTime" for="x_RecievedTime" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_RecievedTime" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->RecievedTime->caption() ?><?php echo ($patient_ot_delivery_register->RecievedTime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->RecievedTime->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_RecievedTime" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_RecievedTime">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_RecievedTime" data-format="11" name="x_RecievedTime" id="x_RecievedTime" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->RecievedTime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->RecievedTime->EditValue ?>"<?php echo $patient_ot_delivery_register->RecievedTime->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->RecievedTime->ReadOnly && !$patient_ot_delivery_register->RecievedTime->Disabled && !isset($patient_ot_delivery_register->RecievedTime->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->RecievedTime->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_ot_delivery_registeradd_js">
ew.createDateTimePicker("fpatient_ot_delivery_registeradd", "x_RecievedTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php echo $patient_ot_delivery_register->RecievedTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->AnaesthesiaStarted->Visible) { // AnaesthesiaStarted ?>
	<div id="r_AnaesthesiaStarted" class="form-group row">
		<label id="elh_patient_ot_delivery_register_AnaesthesiaStarted" for="x_AnaesthesiaStarted" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_AnaesthesiaStarted" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->AnaesthesiaStarted->caption() ?><?php echo ($patient_ot_delivery_register->AnaesthesiaStarted->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->AnaesthesiaStarted->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_AnaesthesiaStarted" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_AnaesthesiaStarted">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaStarted" data-format="11" name="x_AnaesthesiaStarted" id="x_AnaesthesiaStarted" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->AnaesthesiaStarted->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->AnaesthesiaStarted->EditValue ?>"<?php echo $patient_ot_delivery_register->AnaesthesiaStarted->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->AnaesthesiaStarted->ReadOnly && !$patient_ot_delivery_register->AnaesthesiaStarted->Disabled && !isset($patient_ot_delivery_register->AnaesthesiaStarted->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->AnaesthesiaStarted->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_ot_delivery_registeradd_js">
ew.createDateTimePicker("fpatient_ot_delivery_registeradd", "x_AnaesthesiaStarted", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php echo $patient_ot_delivery_register->AnaesthesiaStarted->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->AnaesthesiaEnded->Visible) { // AnaesthesiaEnded ?>
	<div id="r_AnaesthesiaEnded" class="form-group row">
		<label id="elh_patient_ot_delivery_register_AnaesthesiaEnded" for="x_AnaesthesiaEnded" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_AnaesthesiaEnded" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->AnaesthesiaEnded->caption() ?><?php echo ($patient_ot_delivery_register->AnaesthesiaEnded->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->AnaesthesiaEnded->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_AnaesthesiaEnded" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_AnaesthesiaEnded">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaEnded" data-format="11" name="x_AnaesthesiaEnded" id="x_AnaesthesiaEnded" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->AnaesthesiaEnded->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->AnaesthesiaEnded->EditValue ?>"<?php echo $patient_ot_delivery_register->AnaesthesiaEnded->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->AnaesthesiaEnded->ReadOnly && !$patient_ot_delivery_register->AnaesthesiaEnded->Disabled && !isset($patient_ot_delivery_register->AnaesthesiaEnded->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->AnaesthesiaEnded->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_ot_delivery_registeradd_js">
ew.createDateTimePicker("fpatient_ot_delivery_registeradd", "x_AnaesthesiaEnded", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php echo $patient_ot_delivery_register->AnaesthesiaEnded->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->surgeryStarted->Visible) { // surgeryStarted ?>
	<div id="r_surgeryStarted" class="form-group row">
		<label id="elh_patient_ot_delivery_register_surgeryStarted" for="x_surgeryStarted" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_surgeryStarted" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->surgeryStarted->caption() ?><?php echo ($patient_ot_delivery_register->surgeryStarted->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->surgeryStarted->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_surgeryStarted" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_surgeryStarted">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_surgeryStarted" data-format="11" name="x_surgeryStarted" id="x_surgeryStarted" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->surgeryStarted->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->surgeryStarted->EditValue ?>"<?php echo $patient_ot_delivery_register->surgeryStarted->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->surgeryStarted->ReadOnly && !$patient_ot_delivery_register->surgeryStarted->Disabled && !isset($patient_ot_delivery_register->surgeryStarted->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->surgeryStarted->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_ot_delivery_registeradd_js">
ew.createDateTimePicker("fpatient_ot_delivery_registeradd", "x_surgeryStarted", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php echo $patient_ot_delivery_register->surgeryStarted->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->surgeryEnded->Visible) { // surgeryEnded ?>
	<div id="r_surgeryEnded" class="form-group row">
		<label id="elh_patient_ot_delivery_register_surgeryEnded" for="x_surgeryEnded" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_surgeryEnded" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->surgeryEnded->caption() ?><?php echo ($patient_ot_delivery_register->surgeryEnded->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->surgeryEnded->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_surgeryEnded" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_surgeryEnded">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_surgeryEnded" data-format="11" name="x_surgeryEnded" id="x_surgeryEnded" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->surgeryEnded->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->surgeryEnded->EditValue ?>"<?php echo $patient_ot_delivery_register->surgeryEnded->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->surgeryEnded->ReadOnly && !$patient_ot_delivery_register->surgeryEnded->Disabled && !isset($patient_ot_delivery_register->surgeryEnded->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->surgeryEnded->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_ot_delivery_registeradd_js">
ew.createDateTimePicker("fpatient_ot_delivery_registeradd", "x_surgeryEnded", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php echo $patient_ot_delivery_register->surgeryEnded->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->RecoveryTime->Visible) { // RecoveryTime ?>
	<div id="r_RecoveryTime" class="form-group row">
		<label id="elh_patient_ot_delivery_register_RecoveryTime" for="x_RecoveryTime" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_RecoveryTime" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->RecoveryTime->caption() ?><?php echo ($patient_ot_delivery_register->RecoveryTime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->RecoveryTime->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_RecoveryTime" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_RecoveryTime">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_RecoveryTime" data-format="11" name="x_RecoveryTime" id="x_RecoveryTime" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->RecoveryTime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->RecoveryTime->EditValue ?>"<?php echo $patient_ot_delivery_register->RecoveryTime->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->RecoveryTime->ReadOnly && !$patient_ot_delivery_register->RecoveryTime->Disabled && !isset($patient_ot_delivery_register->RecoveryTime->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->RecoveryTime->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_ot_delivery_registeradd_js">
ew.createDateTimePicker("fpatient_ot_delivery_registeradd", "x_RecoveryTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php echo $patient_ot_delivery_register->RecoveryTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->ShiftedTime->Visible) { // ShiftedTime ?>
	<div id="r_ShiftedTime" class="form-group row">
		<label id="elh_patient_ot_delivery_register_ShiftedTime" for="x_ShiftedTime" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_ShiftedTime" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->ShiftedTime->caption() ?><?php echo ($patient_ot_delivery_register->ShiftedTime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->ShiftedTime->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ShiftedTime" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_ShiftedTime">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ShiftedTime" data-format="11" name="x_ShiftedTime" id="x_ShiftedTime" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ShiftedTime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ShiftedTime->EditValue ?>"<?php echo $patient_ot_delivery_register->ShiftedTime->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->ShiftedTime->ReadOnly && !$patient_ot_delivery_register->ShiftedTime->Disabled && !isset($patient_ot_delivery_register->ShiftedTime->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->ShiftedTime->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_ot_delivery_registeradd_js">
ew.createDateTimePicker("fpatient_ot_delivery_registeradd", "x_ShiftedTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php echo $patient_ot_delivery_register->ShiftedTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->Duration->Visible) { // Duration ?>
	<div id="r_Duration" class="form-group row">
		<label id="elh_patient_ot_delivery_register_Duration" for="x_Duration" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_Duration" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->Duration->caption() ?><?php echo ($patient_ot_delivery_register->Duration->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->Duration->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_Duration" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_Duration">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_Duration" name="x_Duration" id="x_Duration" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->Duration->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->Duration->EditValue ?>"<?php echo $patient_ot_delivery_register->Duration->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_delivery_register->Duration->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->DrVisit1->Visible) { // DrVisit1 ?>
	<div id="r_DrVisit1" class="form-group row">
		<label id="elh_patient_ot_delivery_register_DrVisit1" for="x_DrVisit1" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_DrVisit1" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->DrVisit1->caption() ?><?php echo ($patient_ot_delivery_register->DrVisit1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->DrVisit1->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_DrVisit1" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_DrVisit1">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_ot_delivery_register" data-field="x_DrVisit1" data-value-separator="<?php echo $patient_ot_delivery_register->DrVisit1->displayValueSeparatorAttribute() ?>" id="x_DrVisit1" name="x_DrVisit1"<?php echo $patient_ot_delivery_register->DrVisit1->editAttributes() ?>>
		<?php echo $patient_ot_delivery_register->DrVisit1->selectOptionListHtml("x_DrVisit1") ?>
	</select>
</div>
<?php echo $patient_ot_delivery_register->DrVisit1->Lookup->getParamTag("p_x_DrVisit1") ?>
</span>
</script>
<?php echo $patient_ot_delivery_register->DrVisit1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->DrVisit2->Visible) { // DrVisit2 ?>
	<div id="r_DrVisit2" class="form-group row">
		<label id="elh_patient_ot_delivery_register_DrVisit2" for="x_DrVisit2" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_DrVisit2" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->DrVisit2->caption() ?><?php echo ($patient_ot_delivery_register->DrVisit2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->DrVisit2->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_DrVisit2" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_DrVisit2">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_ot_delivery_register" data-field="x_DrVisit2" data-value-separator="<?php echo $patient_ot_delivery_register->DrVisit2->displayValueSeparatorAttribute() ?>" id="x_DrVisit2" name="x_DrVisit2"<?php echo $patient_ot_delivery_register->DrVisit2->editAttributes() ?>>
		<?php echo $patient_ot_delivery_register->DrVisit2->selectOptionListHtml("x_DrVisit2") ?>
	</select>
</div>
<?php echo $patient_ot_delivery_register->DrVisit2->Lookup->getParamTag("p_x_DrVisit2") ?>
</span>
</script>
<?php echo $patient_ot_delivery_register->DrVisit2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->DrVisit3->Visible) { // DrVisit3 ?>
	<div id="r_DrVisit3" class="form-group row">
		<label id="elh_patient_ot_delivery_register_DrVisit3" for="x_DrVisit3" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_DrVisit3" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->DrVisit3->caption() ?><?php echo ($patient_ot_delivery_register->DrVisit3->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->DrVisit3->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_DrVisit3" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_DrVisit3">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_ot_delivery_register" data-field="x_DrVisit3" data-value-separator="<?php echo $patient_ot_delivery_register->DrVisit3->displayValueSeparatorAttribute() ?>" id="x_DrVisit3" name="x_DrVisit3"<?php echo $patient_ot_delivery_register->DrVisit3->editAttributes() ?>>
		<?php echo $patient_ot_delivery_register->DrVisit3->selectOptionListHtml("x_DrVisit3") ?>
	</select>
</div>
<?php echo $patient_ot_delivery_register->DrVisit3->Lookup->getParamTag("p_x_DrVisit3") ?>
</span>
</script>
<?php echo $patient_ot_delivery_register->DrVisit3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->DrVisit4->Visible) { // DrVisit4 ?>
	<div id="r_DrVisit4" class="form-group row">
		<label id="elh_patient_ot_delivery_register_DrVisit4" for="x_DrVisit4" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_DrVisit4" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->DrVisit4->caption() ?><?php echo ($patient_ot_delivery_register->DrVisit4->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->DrVisit4->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_DrVisit4" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_DrVisit4">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_ot_delivery_register" data-field="x_DrVisit4" data-value-separator="<?php echo $patient_ot_delivery_register->DrVisit4->displayValueSeparatorAttribute() ?>" id="x_DrVisit4" name="x_DrVisit4"<?php echo $patient_ot_delivery_register->DrVisit4->editAttributes() ?>>
		<?php echo $patient_ot_delivery_register->DrVisit4->selectOptionListHtml("x_DrVisit4") ?>
	</select>
</div>
<?php echo $patient_ot_delivery_register->DrVisit4->Lookup->getParamTag("p_x_DrVisit4") ?>
</span>
</script>
<?php echo $patient_ot_delivery_register->DrVisit4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->Surgeon->Visible) { // Surgeon ?>
	<div id="r_Surgeon" class="form-group row">
		<label id="elh_patient_ot_delivery_register_Surgeon" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_Surgeon" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->Surgeon->caption() ?><?php echo ($patient_ot_delivery_register->Surgeon->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->Surgeon->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_Surgeon" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_Surgeon">
<?php
$wrkonchange = "" . trim(@$patient_ot_delivery_register->Surgeon->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_ot_delivery_register->Surgeon->EditAttrs["onchange"] = "";
?>
<span id="as_x_Surgeon" class="text-nowrap" style="z-index: 8410">
	<input type="text" class="form-control" name="sv_x_Surgeon" id="sv_x_Surgeon" value="<?php echo RemoveHtml($patient_ot_delivery_register->Surgeon->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->Surgeon->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->Surgeon->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register->Surgeon->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Surgeon" data-value-separator="<?php echo $patient_ot_delivery_register->Surgeon->displayValueSeparatorAttribute() ?>" name="x_Surgeon" id="x_Surgeon" value="<?php echo HtmlEncode($patient_ot_delivery_register->Surgeon->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<?php echo $patient_ot_delivery_register->Surgeon->Lookup->getParamTag("p_x_Surgeon") ?>
</span>
</script>
<script type="text/html" class="patient_ot_delivery_registeradd_js">
fpatient_ot_delivery_registeradd.createAutoSuggest({"id":"x_Surgeon","forceSelect":false});
</script>
<?php echo $patient_ot_delivery_register->Surgeon->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->Anaesthetist->Visible) { // Anaesthetist ?>
	<div id="r_Anaesthetist" class="form-group row">
		<label id="elh_patient_ot_delivery_register_Anaesthetist" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_Anaesthetist" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->Anaesthetist->caption() ?><?php echo ($patient_ot_delivery_register->Anaesthetist->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->Anaesthetist->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_Anaesthetist" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_Anaesthetist">
<?php
$wrkonchange = "" . trim(@$patient_ot_delivery_register->Anaesthetist->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_ot_delivery_register->Anaesthetist->EditAttrs["onchange"] = "";
?>
<span id="as_x_Anaesthetist" class="text-nowrap" style="z-index: 8400">
	<input type="text" class="form-control" name="sv_x_Anaesthetist" id="sv_x_Anaesthetist" value="<?php echo RemoveHtml($patient_ot_delivery_register->Anaesthetist->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->Anaesthetist->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->Anaesthetist->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register->Anaesthetist->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Anaesthetist" data-value-separator="<?php echo $patient_ot_delivery_register->Anaesthetist->displayValueSeparatorAttribute() ?>" name="x_Anaesthetist" id="x_Anaesthetist" value="<?php echo HtmlEncode($patient_ot_delivery_register->Anaesthetist->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<?php echo $patient_ot_delivery_register->Anaesthetist->Lookup->getParamTag("p_x_Anaesthetist") ?>
</span>
</script>
<script type="text/html" class="patient_ot_delivery_registeradd_js">
fpatient_ot_delivery_registeradd.createAutoSuggest({"id":"x_Anaesthetist","forceSelect":false});
</script>
<?php echo $patient_ot_delivery_register->Anaesthetist->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->AsstSurgeon1->Visible) { // AsstSurgeon1 ?>
	<div id="r_AsstSurgeon1" class="form-group row">
		<label id="elh_patient_ot_delivery_register_AsstSurgeon1" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_AsstSurgeon1" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->AsstSurgeon1->caption() ?><?php echo ($patient_ot_delivery_register->AsstSurgeon1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->AsstSurgeon1->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_AsstSurgeon1" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_AsstSurgeon1">
<?php
$wrkonchange = "" . trim(@$patient_ot_delivery_register->AsstSurgeon1->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_ot_delivery_register->AsstSurgeon1->EditAttrs["onchange"] = "";
?>
<span id="as_x_AsstSurgeon1" class="text-nowrap" style="z-index: 8390">
	<input type="text" class="form-control" name="sv_x_AsstSurgeon1" id="sv_x_AsstSurgeon1" value="<?php echo RemoveHtml($patient_ot_delivery_register->AsstSurgeon1->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->AsstSurgeon1->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->AsstSurgeon1->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register->AsstSurgeon1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon1" data-value-separator="<?php echo $patient_ot_delivery_register->AsstSurgeon1->displayValueSeparatorAttribute() ?>" name="x_AsstSurgeon1" id="x_AsstSurgeon1" value="<?php echo HtmlEncode($patient_ot_delivery_register->AsstSurgeon1->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<?php echo $patient_ot_delivery_register->AsstSurgeon1->Lookup->getParamTag("p_x_AsstSurgeon1") ?>
</span>
</script>
<script type="text/html" class="patient_ot_delivery_registeradd_js">
fpatient_ot_delivery_registeradd.createAutoSuggest({"id":"x_AsstSurgeon1","forceSelect":false});
</script>
<?php echo $patient_ot_delivery_register->AsstSurgeon1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->AsstSurgeon2->Visible) { // AsstSurgeon2 ?>
	<div id="r_AsstSurgeon2" class="form-group row">
		<label id="elh_patient_ot_delivery_register_AsstSurgeon2" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_AsstSurgeon2" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->AsstSurgeon2->caption() ?><?php echo ($patient_ot_delivery_register->AsstSurgeon2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->AsstSurgeon2->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_AsstSurgeon2" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_AsstSurgeon2">
<?php
$wrkonchange = "" . trim(@$patient_ot_delivery_register->AsstSurgeon2->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_ot_delivery_register->AsstSurgeon2->EditAttrs["onchange"] = "";
?>
<span id="as_x_AsstSurgeon2" class="text-nowrap" style="z-index: 8380">
	<input type="text" class="form-control" name="sv_x_AsstSurgeon2" id="sv_x_AsstSurgeon2" value="<?php echo RemoveHtml($patient_ot_delivery_register->AsstSurgeon2->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->AsstSurgeon2->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->AsstSurgeon2->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register->AsstSurgeon2->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon2" data-value-separator="<?php echo $patient_ot_delivery_register->AsstSurgeon2->displayValueSeparatorAttribute() ?>" name="x_AsstSurgeon2" id="x_AsstSurgeon2" value="<?php echo HtmlEncode($patient_ot_delivery_register->AsstSurgeon2->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<?php echo $patient_ot_delivery_register->AsstSurgeon2->Lookup->getParamTag("p_x_AsstSurgeon2") ?>
</span>
</script>
<script type="text/html" class="patient_ot_delivery_registeradd_js">
fpatient_ot_delivery_registeradd.createAutoSuggest({"id":"x_AsstSurgeon2","forceSelect":false});
</script>
<?php echo $patient_ot_delivery_register->AsstSurgeon2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->paediatric->Visible) { // paediatric ?>
	<div id="r_paediatric" class="form-group row">
		<label id="elh_patient_ot_delivery_register_paediatric" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_paediatric" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->paediatric->caption() ?><?php echo ($patient_ot_delivery_register->paediatric->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->paediatric->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_paediatric" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_paediatric">
<?php
$wrkonchange = "" . trim(@$patient_ot_delivery_register->paediatric->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_ot_delivery_register->paediatric->EditAttrs["onchange"] = "";
?>
<span id="as_x_paediatric" class="text-nowrap" style="z-index: 8370">
	<input type="text" class="form-control" name="sv_x_paediatric" id="sv_x_paediatric" value="<?php echo RemoveHtml($patient_ot_delivery_register->paediatric->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->paediatric->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->paediatric->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register->paediatric->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_paediatric" data-value-separator="<?php echo $patient_ot_delivery_register->paediatric->displayValueSeparatorAttribute() ?>" name="x_paediatric" id="x_paediatric" value="<?php echo HtmlEncode($patient_ot_delivery_register->paediatric->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<?php echo $patient_ot_delivery_register->paediatric->Lookup->getParamTag("p_x_paediatric") ?>
</span>
</script>
<script type="text/html" class="patient_ot_delivery_registeradd_js">
fpatient_ot_delivery_registeradd.createAutoSuggest({"id":"x_paediatric","forceSelect":false});
</script>
<?php echo $patient_ot_delivery_register->paediatric->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->ScrubNurse1->Visible) { // ScrubNurse1 ?>
	<div id="r_ScrubNurse1" class="form-group row">
		<label id="elh_patient_ot_delivery_register_ScrubNurse1" for="x_ScrubNurse1" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_ScrubNurse1" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->ScrubNurse1->caption() ?><?php echo ($patient_ot_delivery_register->ScrubNurse1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->ScrubNurse1->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ScrubNurse1" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_ScrubNurse1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse1" name="x_ScrubNurse1" id="x_ScrubNurse1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ScrubNurse1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ScrubNurse1->EditValue ?>"<?php echo $patient_ot_delivery_register->ScrubNurse1->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_delivery_register->ScrubNurse1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->ScrubNurse2->Visible) { // ScrubNurse2 ?>
	<div id="r_ScrubNurse2" class="form-group row">
		<label id="elh_patient_ot_delivery_register_ScrubNurse2" for="x_ScrubNurse2" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_ScrubNurse2" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->ScrubNurse2->caption() ?><?php echo ($patient_ot_delivery_register->ScrubNurse2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->ScrubNurse2->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ScrubNurse2" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_ScrubNurse2">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse2" name="x_ScrubNurse2" id="x_ScrubNurse2" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ScrubNurse2->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ScrubNurse2->EditValue ?>"<?php echo $patient_ot_delivery_register->ScrubNurse2->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_delivery_register->ScrubNurse2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->FloorNurse->Visible) { // FloorNurse ?>
	<div id="r_FloorNurse" class="form-group row">
		<label id="elh_patient_ot_delivery_register_FloorNurse" for="x_FloorNurse" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_FloorNurse" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->FloorNurse->caption() ?><?php echo ($patient_ot_delivery_register->FloorNurse->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->FloorNurse->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_FloorNurse" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_FloorNurse">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_FloorNurse" name="x_FloorNurse" id="x_FloorNurse" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->FloorNurse->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->FloorNurse->EditValue ?>"<?php echo $patient_ot_delivery_register->FloorNurse->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_delivery_register->FloorNurse->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->Technician->Visible) { // Technician ?>
	<div id="r_Technician" class="form-group row">
		<label id="elh_patient_ot_delivery_register_Technician" for="x_Technician" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_Technician" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->Technician->caption() ?><?php echo ($patient_ot_delivery_register->Technician->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->Technician->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_Technician" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_Technician">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_Technician" name="x_Technician" id="x_Technician" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->Technician->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->Technician->EditValue ?>"<?php echo $patient_ot_delivery_register->Technician->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_delivery_register->Technician->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->HouseKeeping->Visible) { // HouseKeeping ?>
	<div id="r_HouseKeeping" class="form-group row">
		<label id="elh_patient_ot_delivery_register_HouseKeeping" for="x_HouseKeeping" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_HouseKeeping" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->HouseKeeping->caption() ?><?php echo ($patient_ot_delivery_register->HouseKeeping->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->HouseKeeping->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_HouseKeeping" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_HouseKeeping">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_HouseKeeping" name="x_HouseKeeping" id="x_HouseKeeping" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->HouseKeeping->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->HouseKeeping->EditValue ?>"<?php echo $patient_ot_delivery_register->HouseKeeping->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_delivery_register->HouseKeeping->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->countsCheckedMops->Visible) { // countsCheckedMops ?>
	<div id="r_countsCheckedMops" class="form-group row">
		<label id="elh_patient_ot_delivery_register_countsCheckedMops" for="x_countsCheckedMops" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_countsCheckedMops" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->countsCheckedMops->caption() ?><?php echo ($patient_ot_delivery_register->countsCheckedMops->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->countsCheckedMops->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_countsCheckedMops" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_countsCheckedMops">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_countsCheckedMops" name="x_countsCheckedMops" id="x_countsCheckedMops" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->countsCheckedMops->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->countsCheckedMops->EditValue ?>"<?php echo $patient_ot_delivery_register->countsCheckedMops->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_delivery_register->countsCheckedMops->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->gauze->Visible) { // gauze ?>
	<div id="r_gauze" class="form-group row">
		<label id="elh_patient_ot_delivery_register_gauze" for="x_gauze" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_gauze" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->gauze->caption() ?><?php echo ($patient_ot_delivery_register->gauze->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->gauze->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_gauze" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_gauze">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_gauze" name="x_gauze" id="x_gauze" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->gauze->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->gauze->EditValue ?>"<?php echo $patient_ot_delivery_register->gauze->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_delivery_register->gauze->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->needles->Visible) { // needles ?>
	<div id="r_needles" class="form-group row">
		<label id="elh_patient_ot_delivery_register_needles" for="x_needles" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_needles" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->needles->caption() ?><?php echo ($patient_ot_delivery_register->needles->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->needles->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_needles" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_needles">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_needles" name="x_needles" id="x_needles" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->needles->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->needles->EditValue ?>"<?php echo $patient_ot_delivery_register->needles->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_delivery_register->needles->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->bloodloss->Visible) { // bloodloss ?>
	<div id="r_bloodloss" class="form-group row">
		<label id="elh_patient_ot_delivery_register_bloodloss" for="x_bloodloss" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_bloodloss" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->bloodloss->caption() ?><?php echo ($patient_ot_delivery_register->bloodloss->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->bloodloss->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_bloodloss" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_bloodloss">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_bloodloss" name="x_bloodloss" id="x_bloodloss" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->bloodloss->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->bloodloss->EditValue ?>"<?php echo $patient_ot_delivery_register->bloodloss->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_delivery_register->bloodloss->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->bloodtransfusion->Visible) { // bloodtransfusion ?>
	<div id="r_bloodtransfusion" class="form-group row">
		<label id="elh_patient_ot_delivery_register_bloodtransfusion" for="x_bloodtransfusion" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_bloodtransfusion" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->bloodtransfusion->caption() ?><?php echo ($patient_ot_delivery_register->bloodtransfusion->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->bloodtransfusion->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_bloodtransfusion" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_bloodtransfusion">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_bloodtransfusion" name="x_bloodtransfusion" id="x_bloodtransfusion" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->bloodtransfusion->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->bloodtransfusion->EditValue ?>"<?php echo $patient_ot_delivery_register->bloodtransfusion->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_delivery_register->bloodtransfusion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->implantsUsed->Visible) { // implantsUsed ?>
	<div id="r_implantsUsed" class="form-group row">
		<label id="elh_patient_ot_delivery_register_implantsUsed" for="x_implantsUsed" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_implantsUsed" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->implantsUsed->caption() ?><?php echo ($patient_ot_delivery_register->implantsUsed->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->implantsUsed->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_implantsUsed" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_implantsUsed">
<textarea data-table="patient_ot_delivery_register" data-field="x_implantsUsed" name="x_implantsUsed" id="x_implantsUsed" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->implantsUsed->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register->implantsUsed->editAttributes() ?>><?php echo $patient_ot_delivery_register->implantsUsed->EditValue ?></textarea>
</span>
</script>
<?php echo $patient_ot_delivery_register->implantsUsed->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->MaterialsForHPE->Visible) { // MaterialsForHPE ?>
	<div id="r_MaterialsForHPE" class="form-group row">
		<label id="elh_patient_ot_delivery_register_MaterialsForHPE" for="x_MaterialsForHPE" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_MaterialsForHPE" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->MaterialsForHPE->caption() ?><?php echo ($patient_ot_delivery_register->MaterialsForHPE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->MaterialsForHPE->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_MaterialsForHPE" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_MaterialsForHPE">
<textarea data-table="patient_ot_delivery_register" data-field="x_MaterialsForHPE" name="x_MaterialsForHPE" id="x_MaterialsForHPE" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->MaterialsForHPE->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register->MaterialsForHPE->editAttributes() ?>><?php echo $patient_ot_delivery_register->MaterialsForHPE->EditValue ?></textarea>
</span>
</script>
<?php echo $patient_ot_delivery_register->MaterialsForHPE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_patient_ot_delivery_register_Reception" for="x_Reception" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_Reception" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->Reception->caption() ?><?php echo ($patient_ot_delivery_register->Reception->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->Reception->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->Reception->getSessionValue() <> "") { ?>
<script id="tpx_patient_ot_delivery_register_Reception" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_Reception">
<span<?php echo $patient_ot_delivery_register->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->Reception->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" id="x_Reception" name="x_Reception" value="<?php echo HtmlEncode($patient_ot_delivery_register->Reception->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_patient_ot_delivery_register_Reception" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_Reception">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->Reception->EditValue ?>"<?php echo $patient_ot_delivery_register->Reception->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php echo $patient_ot_delivery_register->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->PId->Visible) { // PId ?>
	<div id="r_PId" class="form-group row">
		<label id="elh_patient_ot_delivery_register_PId" for="x_PId" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_PId" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->PId->caption() ?><?php echo ($patient_ot_delivery_register->PId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->PId->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->PId->getSessionValue() <> "") { ?>
<script id="tpx_patient_ot_delivery_register_PId" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_PId">
<span<?php echo $patient_ot_delivery_register->PId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->PId->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" id="x_PId" name="x_PId" value="<?php echo HtmlEncode($patient_ot_delivery_register->PId->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_patient_ot_delivery_register_PId" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_PId">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_PId" name="x_PId" id="x_PId" size="30" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->PId->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->PId->EditValue ?>"<?php echo $patient_ot_delivery_register->PId->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php echo $patient_ot_delivery_register->PId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register->PatientSearch->Visible) { // PatientSearch ?>
	<div id="r_PatientSearch" class="form-group row">
		<label id="elh_patient_ot_delivery_register_PatientSearch" for="x_PatientSearch" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_PatientSearch" class="patient_ot_delivery_registeradd" type="text/html"><span><?php echo $patient_ot_delivery_register->PatientSearch->caption() ?><?php echo ($patient_ot_delivery_register->PatientSearch->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div<?php echo $patient_ot_delivery_register->PatientSearch->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_PatientSearch" class="patient_ot_delivery_registeradd" type="text/html">
<span id="el_patient_ot_delivery_register_PatientSearch">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PatientSearch"><?php echo strval($patient_ot_delivery_register->PatientSearch->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($patient_ot_delivery_register->PatientSearch->ViewValue) : $patient_ot_delivery_register->PatientSearch->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_ot_delivery_register->PatientSearch->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($patient_ot_delivery_register->PatientSearch->ReadOnly || $patient_ot_delivery_register->PatientSearch->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_PatientSearch',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_ot_delivery_register->PatientSearch->Lookup->getParamTag("p_x_PatientSearch") ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatientSearch" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_ot_delivery_register->PatientSearch->displayValueSeparatorAttribute() ?>" name="x_PatientSearch" id="x_PatientSearch" value="<?php echo $patient_ot_delivery_register->PatientSearch->CurrentValue ?>"<?php echo $patient_ot_delivery_register->PatientSearch->editAttributes() ?>>
</span>
</script>
<?php echo $patient_ot_delivery_register->PatientSearch->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_patient_ot_delivery_registeradd" class="ew-custom-template"></div>
<script id="tpm_patient_ot_delivery_registeradd" type="text/html">
<div id="ct_patient_ot_delivery_register_add"><style>
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
{{include tmpl="#tpc_patient_ot_delivery_register_PatientSearch"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_PatientSearch"/}}	
<p id="profilePic" hidden>{{include tmpl="#tpc_patient_ot_delivery_register_profilePic"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_profilePic"/}}</p>
<p id="SurfaceArea" hidden>{{include tmpl="#tpx_SurfaceArea"/}}</p>
<p id="BodyMassIndex" hidden>{{include tmpl="#tpx_BodyMassIndex"/}}</p>
<p id="idmrnnokk" hidden>{{include tmpl="#tpc_patient_ot_delivery_register_mrnno"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_mrnno"/}}</p>
<div hidden>
  <p>{{include tmpl="#tpc_patient_ot_delivery_register_Reception"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_Reception"/}}</p> 
  <p>{{include tmpl="#tpc_patient_ot_delivery_register_PatientID"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_PatientID"/}}</p> 
  <p>{{include tmpl="#tpc_patient_ot_delivery_register_PatientName"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_PatientName"/}}</p> 
  <p>{{include tmpl="#tpc_patient_ot_delivery_register_Age"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_Age"/}}</p> 
  <p>{{include tmpl="#tpc_patient_ot_delivery_register_Gender"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_Gender"/}}</p>
  <p>{{include tmpl="#tpc_patient_ot_delivery_register_PatID"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_PatID"/}}</p>
  <p>{{include tmpl="#tpc_patient_ot_delivery_register_MobileNumber"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_MobileNumber"/}}</p> 
	<p>{{include tmpl="#tpc_patient_ot_delivery_register_PId"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_PId"/}}</p>
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
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ObstetricsHistryFeMale"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_ObstetricsHistryFeMale"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_Abortion"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_Abortion"/}}</td></tr>					
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
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_dte"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_dte"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_motherReligion"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_motherReligion"/}}</td></tr>
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
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ChildBirthDate"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_ChildBirthDate"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ChildBirthTime"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_ChildBirthTime"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ChildSex"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_ChildSex"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ChildWt"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_ChildWt"/}}</td></tr>
											<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ChildDay"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_ChildDay"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ChildOE"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_ChildOE"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_TypeofDelivery"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_TypeofDelivery"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ChildBlGrp"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_ChildBlGrp"/}}</td></tr>
												<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ApgarScore"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_ApgarScore"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_birthnotification"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_birthnotification"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_formno"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_formno"/}}</td></tr>
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
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ChildBirthDate1"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_ChildBirthDate1"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ChildBirthTime1"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_ChildBirthTime1"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ChildSex1"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_ChildSex1"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ChildWt1"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_ChildWt1"/}}</td></tr>
											<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ChildDay1"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_ChildDay1"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ChildOE1"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_ChildOE1"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_TypeofDelivery1"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_TypeofDelivery1"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ChildBlGrp1"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_ChildBlGrp1"/}}</td></tr>
												<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ApgarScore1"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_ApgarScore1"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_birthnotification1"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_birthnotification1"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_formno1"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_formno1"/}}</td></tr>
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
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_bloodgroup"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_bloodgroup"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_proposedSurgery"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_proposedSurgery"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_surgeryProcedure"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_surgeryProcedure"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_typeOfAnaesthesia"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_typeOfAnaesthesia"/}}</td></tr>
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
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_RecievedTime"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_RecievedTime"/}}</td></tr>
							<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_AnaesthesiaStarted"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_AnaesthesiaStarted"/}}</td></tr>
							<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_AnaesthesiaEnded"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_AnaesthesiaEnded"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_surgeryStarted"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_surgeryStarted"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_surgeryEnded"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_surgeryEnded"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_RecoveryTime"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_RecoveryTime"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ShiftedTime"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_ShiftedTime"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_Duration"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_Duration"/}}</td></tr>
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
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_DrVisit1"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_DrVisit1"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_DrVisit2"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_DrVisit2"/}}</td></tr>					
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
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_DrVisit3"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_DrVisit3"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_DrVisit4"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_DrVisit4"/}}</td></tr>
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
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_Surgeon"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_Surgeon"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_Anaesthetist"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_Anaesthetist"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_AsstSurgeon1"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_AsstSurgeon1"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_AsstSurgeon2"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_AsstSurgeon2"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_paediatric"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_paediatric"/}}</td></tr>
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
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ScrubNurse1"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_ScrubNurse1"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ScrubNurse2"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_ScrubNurse2"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_FloorNurse"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_FloorNurse"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_Technician"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_Technician"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_HouseKeeping"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_HouseKeeping"/}}</td></tr>
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
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_countsCheckedMops"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_countsCheckedMops"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_gauze"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_gauze"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_needles"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_needles"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_bloodloss"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_bloodloss"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_bloodtransfusion"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_bloodtransfusion"/}}</td></tr>
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
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_implantsUsed"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_implantsUsed"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_MaterialsForHPE"/}}&nbsp;{{include tmpl="#tpx_patient_ot_delivery_register_MaterialsForHPE"/}}</td></tr>
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
<?php if (!$patient_ot_delivery_register_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $patient_ot_delivery_register_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_ot_delivery_register_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($patient_ot_delivery_register->Rows) ?> };
ew.applyTemplate("tpd_patient_ot_delivery_registeradd", "tpm_patient_ot_delivery_registeradd", "patient_ot_delivery_registeradd", "<?php echo $patient_ot_delivery_register->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.patient_ot_delivery_registeradd_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$patient_ot_delivery_register_add->showPageFooter();
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
$patient_ot_delivery_register_add->terminate();
?>