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
<?php include_once "header.php"; ?>
<script>
var fpatient_ot_delivery_registeradd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fpatient_ot_delivery_registeradd = currentForm = new ew.Form("fpatient_ot_delivery_registeradd", "add");

	// Validate form
	fpatient_ot_delivery_registeradd.validate = function() {
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
			<?php if ($patient_ot_delivery_register_add->PatID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->PatID->caption(), $patient_ot_delivery_register_add->PatID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->PatientName->caption(), $patient_ot_delivery_register_add->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->mrnno->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->mrnno->caption(), $patient_ot_delivery_register_add->mrnno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->MobileNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_MobileNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->MobileNumber->caption(), $patient_ot_delivery_register_add->MobileNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->Age->caption(), $patient_ot_delivery_register_add->Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->Gender->Required) { ?>
				elm = this.getElements("x" + infix + "_Gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->Gender->caption(), $patient_ot_delivery_register_add->Gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->profilePic->Required) { ?>
				elm = this.getElements("x" + infix + "_profilePic");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->profilePic->caption(), $patient_ot_delivery_register_add->profilePic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->ObstetricsHistryFeMale->Required) { ?>
				elm = this.getElements("x" + infix + "_ObstetricsHistryFeMale");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->ObstetricsHistryFeMale->caption(), $patient_ot_delivery_register_add->ObstetricsHistryFeMale->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->Abortion->Required) { ?>
				elm = this.getElements("x" + infix + "_Abortion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->Abortion->caption(), $patient_ot_delivery_register_add->Abortion->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->ChildBirthDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ChildBirthDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->ChildBirthDate->caption(), $patient_ot_delivery_register_add->ChildBirthDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ChildBirthDate");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register_add->ChildBirthDate->errorMessage()) ?>");
			<?php if ($patient_ot_delivery_register_add->ChildBirthTime->Required) { ?>
				elm = this.getElements("x" + infix + "_ChildBirthTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->ChildBirthTime->caption(), $patient_ot_delivery_register_add->ChildBirthTime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->ChildSex->Required) { ?>
				elm = this.getElements("x" + infix + "_ChildSex");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->ChildSex->caption(), $patient_ot_delivery_register_add->ChildSex->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->ChildWt->Required) { ?>
				elm = this.getElements("x" + infix + "_ChildWt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->ChildWt->caption(), $patient_ot_delivery_register_add->ChildWt->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->ChildDay->Required) { ?>
				elm = this.getElements("x" + infix + "_ChildDay");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->ChildDay->caption(), $patient_ot_delivery_register_add->ChildDay->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->ChildOE->Required) { ?>
				elm = this.getElements("x" + infix + "_ChildOE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->ChildOE->caption(), $patient_ot_delivery_register_add->ChildOE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->TypeofDelivery->Required) { ?>
				elm = this.getElements("x" + infix + "_TypeofDelivery");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->TypeofDelivery->caption(), $patient_ot_delivery_register_add->TypeofDelivery->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->ChildBlGrp->Required) { ?>
				elm = this.getElements("x" + infix + "_ChildBlGrp");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->ChildBlGrp->caption(), $patient_ot_delivery_register_add->ChildBlGrp->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->ApgarScore->Required) { ?>
				elm = this.getElements("x" + infix + "_ApgarScore");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->ApgarScore->caption(), $patient_ot_delivery_register_add->ApgarScore->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->birthnotification->Required) { ?>
				elm = this.getElements("x" + infix + "_birthnotification");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->birthnotification->caption(), $patient_ot_delivery_register_add->birthnotification->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->formno->Required) { ?>
				elm = this.getElements("x" + infix + "_formno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->formno->caption(), $patient_ot_delivery_register_add->formno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->dte->Required) { ?>
				elm = this.getElements("x" + infix + "_dte");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->dte->caption(), $patient_ot_delivery_register_add->dte->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_dte");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register_add->dte->errorMessage()) ?>");
			<?php if ($patient_ot_delivery_register_add->motherReligion->Required) { ?>
				elm = this.getElements("x" + infix + "_motherReligion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->motherReligion->caption(), $patient_ot_delivery_register_add->motherReligion->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->bloodgroup->Required) { ?>
				elm = this.getElements("x" + infix + "_bloodgroup");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->bloodgroup->caption(), $patient_ot_delivery_register_add->bloodgroup->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->status->caption(), $patient_ot_delivery_register_add->status->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register_add->status->errorMessage()) ?>");
			<?php if ($patient_ot_delivery_register_add->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->createdby->caption(), $patient_ot_delivery_register_add->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register_add->createdby->errorMessage()) ?>");
			<?php if ($patient_ot_delivery_register_add->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->createddatetime->caption(), $patient_ot_delivery_register_add->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register_add->createddatetime->errorMessage()) ?>");
			<?php if ($patient_ot_delivery_register_add->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->modifiedby->caption(), $patient_ot_delivery_register_add->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register_add->modifiedby->errorMessage()) ?>");
			<?php if ($patient_ot_delivery_register_add->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->modifieddatetime->caption(), $patient_ot_delivery_register_add->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register_add->modifieddatetime->errorMessage()) ?>");
			<?php if ($patient_ot_delivery_register_add->PatientID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->PatientID->caption(), $patient_ot_delivery_register_add->PatientID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->HospID->caption(), $patient_ot_delivery_register_add->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->ChildBirthDate1->Required) { ?>
				elm = this.getElements("x" + infix + "_ChildBirthDate1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->ChildBirthDate1->caption(), $patient_ot_delivery_register_add->ChildBirthDate1->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ChildBirthDate1");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register_add->ChildBirthDate1->errorMessage()) ?>");
			<?php if ($patient_ot_delivery_register_add->ChildBirthTime1->Required) { ?>
				elm = this.getElements("x" + infix + "_ChildBirthTime1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->ChildBirthTime1->caption(), $patient_ot_delivery_register_add->ChildBirthTime1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->ChildSex1->Required) { ?>
				elm = this.getElements("x" + infix + "_ChildSex1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->ChildSex1->caption(), $patient_ot_delivery_register_add->ChildSex1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->ChildWt1->Required) { ?>
				elm = this.getElements("x" + infix + "_ChildWt1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->ChildWt1->caption(), $patient_ot_delivery_register_add->ChildWt1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->ChildDay1->Required) { ?>
				elm = this.getElements("x" + infix + "_ChildDay1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->ChildDay1->caption(), $patient_ot_delivery_register_add->ChildDay1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->ChildOE1->Required) { ?>
				elm = this.getElements("x" + infix + "_ChildOE1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->ChildOE1->caption(), $patient_ot_delivery_register_add->ChildOE1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->TypeofDelivery1->Required) { ?>
				elm = this.getElements("x" + infix + "_TypeofDelivery1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->TypeofDelivery1->caption(), $patient_ot_delivery_register_add->TypeofDelivery1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->ChildBlGrp1->Required) { ?>
				elm = this.getElements("x" + infix + "_ChildBlGrp1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->ChildBlGrp1->caption(), $patient_ot_delivery_register_add->ChildBlGrp1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->ApgarScore1->Required) { ?>
				elm = this.getElements("x" + infix + "_ApgarScore1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->ApgarScore1->caption(), $patient_ot_delivery_register_add->ApgarScore1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->birthnotification1->Required) { ?>
				elm = this.getElements("x" + infix + "_birthnotification1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->birthnotification1->caption(), $patient_ot_delivery_register_add->birthnotification1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->formno1->Required) { ?>
				elm = this.getElements("x" + infix + "_formno1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->formno1->caption(), $patient_ot_delivery_register_add->formno1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->proposedSurgery->Required) { ?>
				elm = this.getElements("x" + infix + "_proposedSurgery");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->proposedSurgery->caption(), $patient_ot_delivery_register_add->proposedSurgery->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->surgeryProcedure->Required) { ?>
				elm = this.getElements("x" + infix + "_surgeryProcedure");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->surgeryProcedure->caption(), $patient_ot_delivery_register_add->surgeryProcedure->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->typeOfAnaesthesia->Required) { ?>
				elm = this.getElements("x" + infix + "_typeOfAnaesthesia");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->typeOfAnaesthesia->caption(), $patient_ot_delivery_register_add->typeOfAnaesthesia->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->RecievedTime->Required) { ?>
				elm = this.getElements("x" + infix + "_RecievedTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->RecievedTime->caption(), $patient_ot_delivery_register_add->RecievedTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RecievedTime");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register_add->RecievedTime->errorMessage()) ?>");
			<?php if ($patient_ot_delivery_register_add->AnaesthesiaStarted->Required) { ?>
				elm = this.getElements("x" + infix + "_AnaesthesiaStarted");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->AnaesthesiaStarted->caption(), $patient_ot_delivery_register_add->AnaesthesiaStarted->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AnaesthesiaStarted");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register_add->AnaesthesiaStarted->errorMessage()) ?>");
			<?php if ($patient_ot_delivery_register_add->AnaesthesiaEnded->Required) { ?>
				elm = this.getElements("x" + infix + "_AnaesthesiaEnded");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->AnaesthesiaEnded->caption(), $patient_ot_delivery_register_add->AnaesthesiaEnded->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AnaesthesiaEnded");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register_add->AnaesthesiaEnded->errorMessage()) ?>");
			<?php if ($patient_ot_delivery_register_add->surgeryStarted->Required) { ?>
				elm = this.getElements("x" + infix + "_surgeryStarted");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->surgeryStarted->caption(), $patient_ot_delivery_register_add->surgeryStarted->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_surgeryStarted");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register_add->surgeryStarted->errorMessage()) ?>");
			<?php if ($patient_ot_delivery_register_add->surgeryEnded->Required) { ?>
				elm = this.getElements("x" + infix + "_surgeryEnded");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->surgeryEnded->caption(), $patient_ot_delivery_register_add->surgeryEnded->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_surgeryEnded");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register_add->surgeryEnded->errorMessage()) ?>");
			<?php if ($patient_ot_delivery_register_add->RecoveryTime->Required) { ?>
				elm = this.getElements("x" + infix + "_RecoveryTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->RecoveryTime->caption(), $patient_ot_delivery_register_add->RecoveryTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RecoveryTime");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register_add->RecoveryTime->errorMessage()) ?>");
			<?php if ($patient_ot_delivery_register_add->ShiftedTime->Required) { ?>
				elm = this.getElements("x" + infix + "_ShiftedTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->ShiftedTime->caption(), $patient_ot_delivery_register_add->ShiftedTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ShiftedTime");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register_add->ShiftedTime->errorMessage()) ?>");
			<?php if ($patient_ot_delivery_register_add->Duration->Required) { ?>
				elm = this.getElements("x" + infix + "_Duration");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->Duration->caption(), $patient_ot_delivery_register_add->Duration->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->DrVisit1->Required) { ?>
				elm = this.getElements("x" + infix + "_DrVisit1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->DrVisit1->caption(), $patient_ot_delivery_register_add->DrVisit1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->DrVisit2->Required) { ?>
				elm = this.getElements("x" + infix + "_DrVisit2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->DrVisit2->caption(), $patient_ot_delivery_register_add->DrVisit2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->DrVisit3->Required) { ?>
				elm = this.getElements("x" + infix + "_DrVisit3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->DrVisit3->caption(), $patient_ot_delivery_register_add->DrVisit3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->DrVisit4->Required) { ?>
				elm = this.getElements("x" + infix + "_DrVisit4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->DrVisit4->caption(), $patient_ot_delivery_register_add->DrVisit4->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->Surgeon->Required) { ?>
				elm = this.getElements("x" + infix + "_Surgeon");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->Surgeon->caption(), $patient_ot_delivery_register_add->Surgeon->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->Anaesthetist->Required) { ?>
				elm = this.getElements("x" + infix + "_Anaesthetist");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->Anaesthetist->caption(), $patient_ot_delivery_register_add->Anaesthetist->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->AsstSurgeon1->Required) { ?>
				elm = this.getElements("x" + infix + "_AsstSurgeon1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->AsstSurgeon1->caption(), $patient_ot_delivery_register_add->AsstSurgeon1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->AsstSurgeon2->Required) { ?>
				elm = this.getElements("x" + infix + "_AsstSurgeon2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->AsstSurgeon2->caption(), $patient_ot_delivery_register_add->AsstSurgeon2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->paediatric->Required) { ?>
				elm = this.getElements("x" + infix + "_paediatric");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->paediatric->caption(), $patient_ot_delivery_register_add->paediatric->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->ScrubNurse1->Required) { ?>
				elm = this.getElements("x" + infix + "_ScrubNurse1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->ScrubNurse1->caption(), $patient_ot_delivery_register_add->ScrubNurse1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->ScrubNurse2->Required) { ?>
				elm = this.getElements("x" + infix + "_ScrubNurse2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->ScrubNurse2->caption(), $patient_ot_delivery_register_add->ScrubNurse2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->FloorNurse->Required) { ?>
				elm = this.getElements("x" + infix + "_FloorNurse");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->FloorNurse->caption(), $patient_ot_delivery_register_add->FloorNurse->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->Technician->Required) { ?>
				elm = this.getElements("x" + infix + "_Technician");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->Technician->caption(), $patient_ot_delivery_register_add->Technician->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->HouseKeeping->Required) { ?>
				elm = this.getElements("x" + infix + "_HouseKeeping");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->HouseKeeping->caption(), $patient_ot_delivery_register_add->HouseKeeping->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->countsCheckedMops->Required) { ?>
				elm = this.getElements("x" + infix + "_countsCheckedMops");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->countsCheckedMops->caption(), $patient_ot_delivery_register_add->countsCheckedMops->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->gauze->Required) { ?>
				elm = this.getElements("x" + infix + "_gauze");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->gauze->caption(), $patient_ot_delivery_register_add->gauze->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->needles->Required) { ?>
				elm = this.getElements("x" + infix + "_needles");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->needles->caption(), $patient_ot_delivery_register_add->needles->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->bloodloss->Required) { ?>
				elm = this.getElements("x" + infix + "_bloodloss");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->bloodloss->caption(), $patient_ot_delivery_register_add->bloodloss->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->bloodtransfusion->Required) { ?>
				elm = this.getElements("x" + infix + "_bloodtransfusion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->bloodtransfusion->caption(), $patient_ot_delivery_register_add->bloodtransfusion->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->implantsUsed->Required) { ?>
				elm = this.getElements("x" + infix + "_implantsUsed");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->implantsUsed->caption(), $patient_ot_delivery_register_add->implantsUsed->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->MaterialsForHPE->Required) { ?>
				elm = this.getElements("x" + infix + "_MaterialsForHPE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->MaterialsForHPE->caption(), $patient_ot_delivery_register_add->MaterialsForHPE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_add->Reception->Required) { ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->Reception->caption(), $patient_ot_delivery_register_add->Reception->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register_add->Reception->errorMessage()) ?>");
			<?php if ($patient_ot_delivery_register_add->PId->Required) { ?>
				elm = this.getElements("x" + infix + "_PId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->PId->caption(), $patient_ot_delivery_register_add->PId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register_add->PId->errorMessage()) ?>");
			<?php if ($patient_ot_delivery_register_add->PatientSearch->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientSearch");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_add->PatientSearch->caption(), $patient_ot_delivery_register_add->PatientSearch->RequiredErrorMessage)) ?>");
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
	fpatient_ot_delivery_registeradd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatient_ot_delivery_registeradd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpatient_ot_delivery_registeradd.lists["x_DrVisit1"] = <?php echo $patient_ot_delivery_register_add->DrVisit1->Lookup->toClientList($patient_ot_delivery_register_add) ?>;
	fpatient_ot_delivery_registeradd.lists["x_DrVisit1"].options = <?php echo JsonEncode($patient_ot_delivery_register_add->DrVisit1->lookupOptions()) ?>;
	fpatient_ot_delivery_registeradd.lists["x_DrVisit2"] = <?php echo $patient_ot_delivery_register_add->DrVisit2->Lookup->toClientList($patient_ot_delivery_register_add) ?>;
	fpatient_ot_delivery_registeradd.lists["x_DrVisit2"].options = <?php echo JsonEncode($patient_ot_delivery_register_add->DrVisit2->lookupOptions()) ?>;
	fpatient_ot_delivery_registeradd.lists["x_DrVisit3"] = <?php echo $patient_ot_delivery_register_add->DrVisit3->Lookup->toClientList($patient_ot_delivery_register_add) ?>;
	fpatient_ot_delivery_registeradd.lists["x_DrVisit3"].options = <?php echo JsonEncode($patient_ot_delivery_register_add->DrVisit3->lookupOptions()) ?>;
	fpatient_ot_delivery_registeradd.lists["x_DrVisit4"] = <?php echo $patient_ot_delivery_register_add->DrVisit4->Lookup->toClientList($patient_ot_delivery_register_add) ?>;
	fpatient_ot_delivery_registeradd.lists["x_DrVisit4"].options = <?php echo JsonEncode($patient_ot_delivery_register_add->DrVisit4->lookupOptions()) ?>;
	fpatient_ot_delivery_registeradd.lists["x_Surgeon"] = <?php echo $patient_ot_delivery_register_add->Surgeon->Lookup->toClientList($patient_ot_delivery_register_add) ?>;
	fpatient_ot_delivery_registeradd.lists["x_Surgeon"].options = <?php echo JsonEncode($patient_ot_delivery_register_add->Surgeon->lookupOptions()) ?>;
	fpatient_ot_delivery_registeradd.autoSuggests["x_Surgeon"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpatient_ot_delivery_registeradd.lists["x_Anaesthetist"] = <?php echo $patient_ot_delivery_register_add->Anaesthetist->Lookup->toClientList($patient_ot_delivery_register_add) ?>;
	fpatient_ot_delivery_registeradd.lists["x_Anaesthetist"].options = <?php echo JsonEncode($patient_ot_delivery_register_add->Anaesthetist->lookupOptions()) ?>;
	fpatient_ot_delivery_registeradd.autoSuggests["x_Anaesthetist"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpatient_ot_delivery_registeradd.lists["x_AsstSurgeon1"] = <?php echo $patient_ot_delivery_register_add->AsstSurgeon1->Lookup->toClientList($patient_ot_delivery_register_add) ?>;
	fpatient_ot_delivery_registeradd.lists["x_AsstSurgeon1"].options = <?php echo JsonEncode($patient_ot_delivery_register_add->AsstSurgeon1->lookupOptions()) ?>;
	fpatient_ot_delivery_registeradd.autoSuggests["x_AsstSurgeon1"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpatient_ot_delivery_registeradd.lists["x_AsstSurgeon2"] = <?php echo $patient_ot_delivery_register_add->AsstSurgeon2->Lookup->toClientList($patient_ot_delivery_register_add) ?>;
	fpatient_ot_delivery_registeradd.lists["x_AsstSurgeon2"].options = <?php echo JsonEncode($patient_ot_delivery_register_add->AsstSurgeon2->lookupOptions()) ?>;
	fpatient_ot_delivery_registeradd.autoSuggests["x_AsstSurgeon2"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpatient_ot_delivery_registeradd.lists["x_paediatric"] = <?php echo $patient_ot_delivery_register_add->paediatric->Lookup->toClientList($patient_ot_delivery_register_add) ?>;
	fpatient_ot_delivery_registeradd.lists["x_paediatric"].options = <?php echo JsonEncode($patient_ot_delivery_register_add->paediatric->lookupOptions()) ?>;
	fpatient_ot_delivery_registeradd.autoSuggests["x_paediatric"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpatient_ot_delivery_registeradd.lists["x_PatientSearch"] = <?php echo $patient_ot_delivery_register_add->PatientSearch->Lookup->toClientList($patient_ot_delivery_register_add) ?>;
	fpatient_ot_delivery_registeradd.lists["x_PatientSearch"].options = <?php echo JsonEncode($patient_ot_delivery_register_add->PatientSearch->lookupOptions()) ?>;
	loadjs.done("fpatient_ot_delivery_registeradd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $patient_ot_delivery_register_add->showPageHeader(); ?>
<?php
$patient_ot_delivery_register_add->showMessage();
?>
<form name="fpatient_ot_delivery_registeradd" id="fpatient_ot_delivery_registeradd" class="<?php echo $patient_ot_delivery_register_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_ot_delivery_register">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$patient_ot_delivery_register_add->IsModal ?>">
<?php if ($patient_ot_delivery_register->getCurrentMasterTable() == "ip_admission") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($patient_ot_delivery_register_add->Reception->getSessionValue()) ?>">
<input type="hidden" name="fk_mrnNo" value="<?php echo HtmlEncode($patient_ot_delivery_register_add->mrnno->getSessionValue()) ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo HtmlEncode($patient_ot_delivery_register_add->PId->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($patient_ot_delivery_register_add->PatID->Visible) { // PatID ?>
	<div id="r_PatID" class="form-group row">
		<label id="elh_patient_ot_delivery_register_PatID" for="x_PatID" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_PatID" type="text/html"><?php echo $patient_ot_delivery_register_add->PatID->caption() ?><?php echo $patient_ot_delivery_register_add->PatID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->PatID->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_PatID" type="text/html"><span id="el_patient_ot_delivery_register_PatID">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->PatID->EditValue ?>"<?php echo $patient_ot_delivery_register_add->PatID->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_delivery_register_add->PatID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_patient_ot_delivery_register_PatientName" for="x_PatientName" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_PatientName" type="text/html"><?php echo $patient_ot_delivery_register_add->PatientName->caption() ?><?php echo $patient_ot_delivery_register_add->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->PatientName->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_PatientName" type="text/html"><span id="el_patient_ot_delivery_register_PatientName">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->PatientName->EditValue ?>"<?php echo $patient_ot_delivery_register_add->PatientName->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_delivery_register_add->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_patient_ot_delivery_register_mrnno" for="x_mrnno" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_mrnno" type="text/html"><?php echo $patient_ot_delivery_register_add->mrnno->caption() ?><?php echo $patient_ot_delivery_register_add->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->mrnno->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register_add->mrnno->getSessionValue() != "") { ?>
<script id="tpx_patient_ot_delivery_register_mrnno" type="text/html"><span id="el_patient_ot_delivery_register_mrnno">
<span<?php echo $patient_ot_delivery_register_add->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_add->mrnno->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x_mrnno" name="x_mrnno" value="<?php echo HtmlEncode($patient_ot_delivery_register_add->mrnno->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_patient_ot_delivery_register_mrnno" type="text/html"><span id="el_patient_ot_delivery_register_mrnno">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->mrnno->EditValue ?>"<?php echo $patient_ot_delivery_register_add->mrnno->editAttributes() ?>>
</span></script>
<?php } ?>
<?php echo $patient_ot_delivery_register_add->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->MobileNumber->Visible) { // MobileNumber ?>
	<div id="r_MobileNumber" class="form-group row">
		<label id="elh_patient_ot_delivery_register_MobileNumber" for="x_MobileNumber" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_MobileNumber" type="text/html"><?php echo $patient_ot_delivery_register_add->MobileNumber->caption() ?><?php echo $patient_ot_delivery_register_add->MobileNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->MobileNumber->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_MobileNumber" type="text/html"><span id="el_patient_ot_delivery_register_MobileNumber">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->MobileNumber->EditValue ?>"<?php echo $patient_ot_delivery_register_add->MobileNumber->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_delivery_register_add->MobileNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_patient_ot_delivery_register_Age" for="x_Age" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_Age" type="text/html"><?php echo $patient_ot_delivery_register_add->Age->caption() ?><?php echo $patient_ot_delivery_register_add->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->Age->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_Age" type="text/html"><span id="el_patient_ot_delivery_register_Age">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->Age->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->Age->EditValue ?>"<?php echo $patient_ot_delivery_register_add->Age->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_delivery_register_add->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label id="elh_patient_ot_delivery_register_Gender" for="x_Gender" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_Gender" type="text/html"><?php echo $patient_ot_delivery_register_add->Gender->caption() ?><?php echo $patient_ot_delivery_register_add->Gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->Gender->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_Gender" type="text/html"><span id="el_patient_ot_delivery_register_Gender">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->Gender->EditValue ?>"<?php echo $patient_ot_delivery_register_add->Gender->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_delivery_register_add->Gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_patient_ot_delivery_register_profilePic" for="x_profilePic" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_profilePic" type="text/html"><?php echo $patient_ot_delivery_register_add->profilePic->caption() ?><?php echo $patient_ot_delivery_register_add->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->profilePic->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_profilePic" type="text/html"><span id="el_patient_ot_delivery_register_profilePic">
<textarea data-table="patient_ot_delivery_register" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->profilePic->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register_add->profilePic->editAttributes() ?>><?php echo $patient_ot_delivery_register_add->profilePic->EditValue ?></textarea>
</span></script>
<?php echo $patient_ot_delivery_register_add->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->ObstetricsHistryFeMale->Visible) { // ObstetricsHistryFeMale ?>
	<div id="r_ObstetricsHistryFeMale" class="form-group row">
		<label id="elh_patient_ot_delivery_register_ObstetricsHistryFeMale" for="x_ObstetricsHistryFeMale" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_ObstetricsHistryFeMale" type="text/html"><?php echo $patient_ot_delivery_register_add->ObstetricsHistryFeMale->caption() ?><?php echo $patient_ot_delivery_register_add->ObstetricsHistryFeMale->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->ObstetricsHistryFeMale->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ObstetricsHistryFeMale" type="text/html"><span id="el_patient_ot_delivery_register_ObstetricsHistryFeMale">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ObstetricsHistryFeMale" name="x_ObstetricsHistryFeMale" id="x_ObstetricsHistryFeMale" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->ObstetricsHistryFeMale->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->ObstetricsHistryFeMale->EditValue ?>"<?php echo $patient_ot_delivery_register_add->ObstetricsHistryFeMale->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_delivery_register_add->ObstetricsHistryFeMale->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->Abortion->Visible) { // Abortion ?>
	<div id="r_Abortion" class="form-group row">
		<label id="elh_patient_ot_delivery_register_Abortion" for="x_Abortion" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_Abortion" type="text/html"><?php echo $patient_ot_delivery_register_add->Abortion->caption() ?><?php echo $patient_ot_delivery_register_add->Abortion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->Abortion->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_Abortion" type="text/html"><span id="el_patient_ot_delivery_register_Abortion">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_Abortion" name="x_Abortion" id="x_Abortion" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->Abortion->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->Abortion->EditValue ?>"<?php echo $patient_ot_delivery_register_add->Abortion->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_delivery_register_add->Abortion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->ChildBirthDate->Visible) { // ChildBirthDate ?>
	<div id="r_ChildBirthDate" class="form-group row">
		<label id="elh_patient_ot_delivery_register_ChildBirthDate" for="x_ChildBirthDate" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_ChildBirthDate" type="text/html"><?php echo $patient_ot_delivery_register_add->ChildBirthDate->caption() ?><?php echo $patient_ot_delivery_register_add->ChildBirthDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->ChildBirthDate->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ChildBirthDate" type="text/html"><span id="el_patient_ot_delivery_register_ChildBirthDate">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate" data-format="7" name="x_ChildBirthDate" id="x_ChildBirthDate" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->ChildBirthDate->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->ChildBirthDate->EditValue ?>"<?php echo $patient_ot_delivery_register_add->ChildBirthDate->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_add->ChildBirthDate->ReadOnly && !$patient_ot_delivery_register_add->ChildBirthDate->Disabled && !isset($patient_ot_delivery_register_add->ChildBirthDate->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_add->ChildBirthDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_ot_delivery_registeradd_js">
loadjs.ready(["fpatient_ot_delivery_registeradd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registeradd", "x_ChildBirthDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $patient_ot_delivery_register_add->ChildBirthDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->ChildBirthTime->Visible) { // ChildBirthTime ?>
	<div id="r_ChildBirthTime" class="form-group row">
		<label id="elh_patient_ot_delivery_register_ChildBirthTime" for="x_ChildBirthTime" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_ChildBirthTime" type="text/html"><?php echo $patient_ot_delivery_register_add->ChildBirthTime->caption() ?><?php echo $patient_ot_delivery_register_add->ChildBirthTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->ChildBirthTime->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ChildBirthTime" type="text/html"><span id="el_patient_ot_delivery_register_ChildBirthTime">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime" name="x_ChildBirthTime" id="x_ChildBirthTime" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->ChildBirthTime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->ChildBirthTime->EditValue ?>"<?php echo $patient_ot_delivery_register_add->ChildBirthTime->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_add->ChildBirthTime->ReadOnly && !$patient_ot_delivery_register_add->ChildBirthTime->Disabled && !isset($patient_ot_delivery_register_add->ChildBirthTime->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_add->ChildBirthTime->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_ot_delivery_registeradd_js">
loadjs.ready(["fpatient_ot_delivery_registeradd", "timepicker"], function() {
	ew.createTimePicker("fpatient_ot_delivery_registeradd", "x_ChildBirthTime", {"timeFormat":"h:i A","step":15});
});
</script>
<?php echo $patient_ot_delivery_register_add->ChildBirthTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->ChildSex->Visible) { // ChildSex ?>
	<div id="r_ChildSex" class="form-group row">
		<label id="elh_patient_ot_delivery_register_ChildSex" for="x_ChildSex" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_ChildSex" type="text/html"><?php echo $patient_ot_delivery_register_add->ChildSex->caption() ?><?php echo $patient_ot_delivery_register_add->ChildSex->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->ChildSex->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ChildSex" type="text/html"><span id="el_patient_ot_delivery_register_ChildSex">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildSex" name="x_ChildSex" id="x_ChildSex" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->ChildSex->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->ChildSex->EditValue ?>"<?php echo $patient_ot_delivery_register_add->ChildSex->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_delivery_register_add->ChildSex->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->ChildWt->Visible) { // ChildWt ?>
	<div id="r_ChildWt" class="form-group row">
		<label id="elh_patient_ot_delivery_register_ChildWt" for="x_ChildWt" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_ChildWt" type="text/html"><?php echo $patient_ot_delivery_register_add->ChildWt->caption() ?><?php echo $patient_ot_delivery_register_add->ChildWt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->ChildWt->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ChildWt" type="text/html"><span id="el_patient_ot_delivery_register_ChildWt">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildWt" name="x_ChildWt" id="x_ChildWt" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->ChildWt->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->ChildWt->EditValue ?>"<?php echo $patient_ot_delivery_register_add->ChildWt->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_delivery_register_add->ChildWt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->ChildDay->Visible) { // ChildDay ?>
	<div id="r_ChildDay" class="form-group row">
		<label id="elh_patient_ot_delivery_register_ChildDay" for="x_ChildDay" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_ChildDay" type="text/html"><?php echo $patient_ot_delivery_register_add->ChildDay->caption() ?><?php echo $patient_ot_delivery_register_add->ChildDay->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->ChildDay->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ChildDay" type="text/html"><span id="el_patient_ot_delivery_register_ChildDay">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildDay" name="x_ChildDay" id="x_ChildDay" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->ChildDay->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->ChildDay->EditValue ?>"<?php echo $patient_ot_delivery_register_add->ChildDay->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_delivery_register_add->ChildDay->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->ChildOE->Visible) { // ChildOE ?>
	<div id="r_ChildOE" class="form-group row">
		<label id="elh_patient_ot_delivery_register_ChildOE" for="x_ChildOE" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_ChildOE" type="text/html"><?php echo $patient_ot_delivery_register_add->ChildOE->caption() ?><?php echo $patient_ot_delivery_register_add->ChildOE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->ChildOE->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ChildOE" type="text/html"><span id="el_patient_ot_delivery_register_ChildOE">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildOE" name="x_ChildOE" id="x_ChildOE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->ChildOE->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->ChildOE->EditValue ?>"<?php echo $patient_ot_delivery_register_add->ChildOE->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_delivery_register_add->ChildOE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->TypeofDelivery->Visible) { // TypeofDelivery ?>
	<div id="r_TypeofDelivery" class="form-group row">
		<label id="elh_patient_ot_delivery_register_TypeofDelivery" for="x_TypeofDelivery" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_TypeofDelivery" type="text/html"><?php echo $patient_ot_delivery_register_add->TypeofDelivery->caption() ?><?php echo $patient_ot_delivery_register_add->TypeofDelivery->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->TypeofDelivery->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_TypeofDelivery" type="text/html"><span id="el_patient_ot_delivery_register_TypeofDelivery">
<textarea data-table="patient_ot_delivery_register" data-field="x_TypeofDelivery" name="x_TypeofDelivery" id="x_TypeofDelivery" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->TypeofDelivery->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register_add->TypeofDelivery->editAttributes() ?>><?php echo $patient_ot_delivery_register_add->TypeofDelivery->EditValue ?></textarea>
</span></script>
<?php echo $patient_ot_delivery_register_add->TypeofDelivery->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->ChildBlGrp->Visible) { // ChildBlGrp ?>
	<div id="r_ChildBlGrp" class="form-group row">
		<label id="elh_patient_ot_delivery_register_ChildBlGrp" for="x_ChildBlGrp" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_ChildBlGrp" type="text/html"><?php echo $patient_ot_delivery_register_add->ChildBlGrp->caption() ?><?php echo $patient_ot_delivery_register_add->ChildBlGrp->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->ChildBlGrp->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ChildBlGrp" type="text/html"><span id="el_patient_ot_delivery_register_ChildBlGrp">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp" name="x_ChildBlGrp" id="x_ChildBlGrp" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->ChildBlGrp->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->ChildBlGrp->EditValue ?>"<?php echo $patient_ot_delivery_register_add->ChildBlGrp->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_delivery_register_add->ChildBlGrp->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->ApgarScore->Visible) { // ApgarScore ?>
	<div id="r_ApgarScore" class="form-group row">
		<label id="elh_patient_ot_delivery_register_ApgarScore" for="x_ApgarScore" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_ApgarScore" type="text/html"><?php echo $patient_ot_delivery_register_add->ApgarScore->caption() ?><?php echo $patient_ot_delivery_register_add->ApgarScore->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->ApgarScore->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ApgarScore" type="text/html"><span id="el_patient_ot_delivery_register_ApgarScore">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ApgarScore" name="x_ApgarScore" id="x_ApgarScore" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->ApgarScore->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->ApgarScore->EditValue ?>"<?php echo $patient_ot_delivery_register_add->ApgarScore->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_delivery_register_add->ApgarScore->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->birthnotification->Visible) { // birthnotification ?>
	<div id="r_birthnotification" class="form-group row">
		<label id="elh_patient_ot_delivery_register_birthnotification" for="x_birthnotification" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_birthnotification" type="text/html"><?php echo $patient_ot_delivery_register_add->birthnotification->caption() ?><?php echo $patient_ot_delivery_register_add->birthnotification->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->birthnotification->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_birthnotification" type="text/html"><span id="el_patient_ot_delivery_register_birthnotification">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_birthnotification" name="x_birthnotification" id="x_birthnotification" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->birthnotification->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->birthnotification->EditValue ?>"<?php echo $patient_ot_delivery_register_add->birthnotification->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_delivery_register_add->birthnotification->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->formno->Visible) { // formno ?>
	<div id="r_formno" class="form-group row">
		<label id="elh_patient_ot_delivery_register_formno" for="x_formno" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_formno" type="text/html"><?php echo $patient_ot_delivery_register_add->formno->caption() ?><?php echo $patient_ot_delivery_register_add->formno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->formno->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_formno" type="text/html"><span id="el_patient_ot_delivery_register_formno">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_formno" name="x_formno" id="x_formno" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->formno->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->formno->EditValue ?>"<?php echo $patient_ot_delivery_register_add->formno->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_delivery_register_add->formno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->dte->Visible) { // dte ?>
	<div id="r_dte" class="form-group row">
		<label id="elh_patient_ot_delivery_register_dte" for="x_dte" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_dte" type="text/html"><?php echo $patient_ot_delivery_register_add->dte->caption() ?><?php echo $patient_ot_delivery_register_add->dte->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->dte->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_dte" type="text/html"><span id="el_patient_ot_delivery_register_dte">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_dte" name="x_dte" id="x_dte" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->dte->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->dte->EditValue ?>"<?php echo $patient_ot_delivery_register_add->dte->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_add->dte->ReadOnly && !$patient_ot_delivery_register_add->dte->Disabled && !isset($patient_ot_delivery_register_add->dte->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_add->dte->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_ot_delivery_registeradd_js">
loadjs.ready(["fpatient_ot_delivery_registeradd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registeradd", "x_dte", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $patient_ot_delivery_register_add->dte->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->motherReligion->Visible) { // motherReligion ?>
	<div id="r_motherReligion" class="form-group row">
		<label id="elh_patient_ot_delivery_register_motherReligion" for="x_motherReligion" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_motherReligion" type="text/html"><?php echo $patient_ot_delivery_register_add->motherReligion->caption() ?><?php echo $patient_ot_delivery_register_add->motherReligion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->motherReligion->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_motherReligion" type="text/html"><span id="el_patient_ot_delivery_register_motherReligion">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_motherReligion" name="x_motherReligion" id="x_motherReligion" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->motherReligion->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->motherReligion->EditValue ?>"<?php echo $patient_ot_delivery_register_add->motherReligion->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_delivery_register_add->motherReligion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->bloodgroup->Visible) { // bloodgroup ?>
	<div id="r_bloodgroup" class="form-group row">
		<label id="elh_patient_ot_delivery_register_bloodgroup" for="x_bloodgroup" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_bloodgroup" type="text/html"><?php echo $patient_ot_delivery_register_add->bloodgroup->caption() ?><?php echo $patient_ot_delivery_register_add->bloodgroup->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->bloodgroup->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_bloodgroup" type="text/html"><span id="el_patient_ot_delivery_register_bloodgroup">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_bloodgroup" name="x_bloodgroup" id="x_bloodgroup" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->bloodgroup->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->bloodgroup->EditValue ?>"<?php echo $patient_ot_delivery_register_add->bloodgroup->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_delivery_register_add->bloodgroup->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_patient_ot_delivery_register_status" for="x_status" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_status" type="text/html"><?php echo $patient_ot_delivery_register_add->status->caption() ?><?php echo $patient_ot_delivery_register_add->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->status->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_status" type="text/html"><span id="el_patient_ot_delivery_register_status">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->status->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->status->EditValue ?>"<?php echo $patient_ot_delivery_register_add->status->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_delivery_register_add->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label id="elh_patient_ot_delivery_register_createdby" for="x_createdby" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_createdby" type="text/html"><?php echo $patient_ot_delivery_register_add->createdby->caption() ?><?php echo $patient_ot_delivery_register_add->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->createdby->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_createdby" type="text/html"><span id="el_patient_ot_delivery_register_createdby">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->createdby->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->createdby->EditValue ?>"<?php echo $patient_ot_delivery_register_add->createdby->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_delivery_register_add->createdby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label id="elh_patient_ot_delivery_register_createddatetime" for="x_createddatetime" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_createddatetime" type="text/html"><?php echo $patient_ot_delivery_register_add->createddatetime->caption() ?><?php echo $patient_ot_delivery_register_add->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->createddatetime->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_createddatetime" type="text/html"><span id="el_patient_ot_delivery_register_createddatetime">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->createddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->createddatetime->EditValue ?>"<?php echo $patient_ot_delivery_register_add->createddatetime->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_add->createddatetime->ReadOnly && !$patient_ot_delivery_register_add->createddatetime->Disabled && !isset($patient_ot_delivery_register_add->createddatetime->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_add->createddatetime->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_ot_delivery_registeradd_js">
loadjs.ready(["fpatient_ot_delivery_registeradd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registeradd", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $patient_ot_delivery_register_add->createddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label id="elh_patient_ot_delivery_register_modifiedby" for="x_modifiedby" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_modifiedby" type="text/html"><?php echo $patient_ot_delivery_register_add->modifiedby->caption() ?><?php echo $patient_ot_delivery_register_add->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->modifiedby->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_modifiedby" type="text/html"><span id="el_patient_ot_delivery_register_modifiedby">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->modifiedby->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->modifiedby->EditValue ?>"<?php echo $patient_ot_delivery_register_add->modifiedby->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_delivery_register_add->modifiedby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label id="elh_patient_ot_delivery_register_modifieddatetime" for="x_modifieddatetime" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_modifieddatetime" type="text/html"><?php echo $patient_ot_delivery_register_add->modifieddatetime->caption() ?><?php echo $patient_ot_delivery_register_add->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->modifieddatetime->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_modifieddatetime" type="text/html"><span id="el_patient_ot_delivery_register_modifieddatetime">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->modifieddatetime->EditValue ?>"<?php echo $patient_ot_delivery_register_add->modifieddatetime->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_add->modifieddatetime->ReadOnly && !$patient_ot_delivery_register_add->modifieddatetime->Disabled && !isset($patient_ot_delivery_register_add->modifieddatetime->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_add->modifieddatetime->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_ot_delivery_registeradd_js">
loadjs.ready(["fpatient_ot_delivery_registeradd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registeradd", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $patient_ot_delivery_register_add->modifieddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->PatientID->Visible) { // PatientID ?>
	<div id="r_PatientID" class="form-group row">
		<label id="elh_patient_ot_delivery_register_PatientID" for="x_PatientID" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_PatientID" type="text/html"><?php echo $patient_ot_delivery_register_add->PatientID->caption() ?><?php echo $patient_ot_delivery_register_add->PatientID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->PatientID->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_PatientID" type="text/html"><span id="el_patient_ot_delivery_register_PatientID">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->PatientID->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->PatientID->EditValue ?>"<?php echo $patient_ot_delivery_register_add->PatientID->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_delivery_register_add->PatientID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->ChildBirthDate1->Visible) { // ChildBirthDate1 ?>
	<div id="r_ChildBirthDate1" class="form-group row">
		<label id="elh_patient_ot_delivery_register_ChildBirthDate1" for="x_ChildBirthDate1" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_ChildBirthDate1" type="text/html"><?php echo $patient_ot_delivery_register_add->ChildBirthDate1->caption() ?><?php echo $patient_ot_delivery_register_add->ChildBirthDate1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->ChildBirthDate1->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ChildBirthDate1" type="text/html"><span id="el_patient_ot_delivery_register_ChildBirthDate1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate1" name="x_ChildBirthDate1" id="x_ChildBirthDate1" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->ChildBirthDate1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->ChildBirthDate1->EditValue ?>"<?php echo $patient_ot_delivery_register_add->ChildBirthDate1->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_add->ChildBirthDate1->ReadOnly && !$patient_ot_delivery_register_add->ChildBirthDate1->Disabled && !isset($patient_ot_delivery_register_add->ChildBirthDate1->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_add->ChildBirthDate1->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_ot_delivery_registeradd_js">
loadjs.ready(["fpatient_ot_delivery_registeradd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registeradd", "x_ChildBirthDate1", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $patient_ot_delivery_register_add->ChildBirthDate1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->ChildBirthTime1->Visible) { // ChildBirthTime1 ?>
	<div id="r_ChildBirthTime1" class="form-group row">
		<label id="elh_patient_ot_delivery_register_ChildBirthTime1" for="x_ChildBirthTime1" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_ChildBirthTime1" type="text/html"><?php echo $patient_ot_delivery_register_add->ChildBirthTime1->caption() ?><?php echo $patient_ot_delivery_register_add->ChildBirthTime1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->ChildBirthTime1->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ChildBirthTime1" type="text/html"><span id="el_patient_ot_delivery_register_ChildBirthTime1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime1" name="x_ChildBirthTime1" id="x_ChildBirthTime1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->ChildBirthTime1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->ChildBirthTime1->EditValue ?>"<?php echo $patient_ot_delivery_register_add->ChildBirthTime1->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_delivery_register_add->ChildBirthTime1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->ChildSex1->Visible) { // ChildSex1 ?>
	<div id="r_ChildSex1" class="form-group row">
		<label id="elh_patient_ot_delivery_register_ChildSex1" for="x_ChildSex1" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_ChildSex1" type="text/html"><?php echo $patient_ot_delivery_register_add->ChildSex1->caption() ?><?php echo $patient_ot_delivery_register_add->ChildSex1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->ChildSex1->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ChildSex1" type="text/html"><span id="el_patient_ot_delivery_register_ChildSex1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildSex1" name="x_ChildSex1" id="x_ChildSex1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->ChildSex1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->ChildSex1->EditValue ?>"<?php echo $patient_ot_delivery_register_add->ChildSex1->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_delivery_register_add->ChildSex1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->ChildWt1->Visible) { // ChildWt1 ?>
	<div id="r_ChildWt1" class="form-group row">
		<label id="elh_patient_ot_delivery_register_ChildWt1" for="x_ChildWt1" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_ChildWt1" type="text/html"><?php echo $patient_ot_delivery_register_add->ChildWt1->caption() ?><?php echo $patient_ot_delivery_register_add->ChildWt1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->ChildWt1->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ChildWt1" type="text/html"><span id="el_patient_ot_delivery_register_ChildWt1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildWt1" name="x_ChildWt1" id="x_ChildWt1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->ChildWt1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->ChildWt1->EditValue ?>"<?php echo $patient_ot_delivery_register_add->ChildWt1->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_delivery_register_add->ChildWt1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->ChildDay1->Visible) { // ChildDay1 ?>
	<div id="r_ChildDay1" class="form-group row">
		<label id="elh_patient_ot_delivery_register_ChildDay1" for="x_ChildDay1" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_ChildDay1" type="text/html"><?php echo $patient_ot_delivery_register_add->ChildDay1->caption() ?><?php echo $patient_ot_delivery_register_add->ChildDay1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->ChildDay1->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ChildDay1" type="text/html"><span id="el_patient_ot_delivery_register_ChildDay1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildDay1" name="x_ChildDay1" id="x_ChildDay1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->ChildDay1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->ChildDay1->EditValue ?>"<?php echo $patient_ot_delivery_register_add->ChildDay1->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_delivery_register_add->ChildDay1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->ChildOE1->Visible) { // ChildOE1 ?>
	<div id="r_ChildOE1" class="form-group row">
		<label id="elh_patient_ot_delivery_register_ChildOE1" for="x_ChildOE1" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_ChildOE1" type="text/html"><?php echo $patient_ot_delivery_register_add->ChildOE1->caption() ?><?php echo $patient_ot_delivery_register_add->ChildOE1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->ChildOE1->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ChildOE1" type="text/html"><span id="el_patient_ot_delivery_register_ChildOE1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildOE1" name="x_ChildOE1" id="x_ChildOE1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->ChildOE1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->ChildOE1->EditValue ?>"<?php echo $patient_ot_delivery_register_add->ChildOE1->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_delivery_register_add->ChildOE1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->TypeofDelivery1->Visible) { // TypeofDelivery1 ?>
	<div id="r_TypeofDelivery1" class="form-group row">
		<label id="elh_patient_ot_delivery_register_TypeofDelivery1" for="x_TypeofDelivery1" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_TypeofDelivery1" type="text/html"><?php echo $patient_ot_delivery_register_add->TypeofDelivery1->caption() ?><?php echo $patient_ot_delivery_register_add->TypeofDelivery1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->TypeofDelivery1->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_TypeofDelivery1" type="text/html"><span id="el_patient_ot_delivery_register_TypeofDelivery1">
<textarea data-table="patient_ot_delivery_register" data-field="x_TypeofDelivery1" name="x_TypeofDelivery1" id="x_TypeofDelivery1" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->TypeofDelivery1->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register_add->TypeofDelivery1->editAttributes() ?>><?php echo $patient_ot_delivery_register_add->TypeofDelivery1->EditValue ?></textarea>
</span></script>
<?php echo $patient_ot_delivery_register_add->TypeofDelivery1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->ChildBlGrp1->Visible) { // ChildBlGrp1 ?>
	<div id="r_ChildBlGrp1" class="form-group row">
		<label id="elh_patient_ot_delivery_register_ChildBlGrp1" for="x_ChildBlGrp1" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_ChildBlGrp1" type="text/html"><?php echo $patient_ot_delivery_register_add->ChildBlGrp1->caption() ?><?php echo $patient_ot_delivery_register_add->ChildBlGrp1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->ChildBlGrp1->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ChildBlGrp1" type="text/html"><span id="el_patient_ot_delivery_register_ChildBlGrp1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp1" name="x_ChildBlGrp1" id="x_ChildBlGrp1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->ChildBlGrp1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->ChildBlGrp1->EditValue ?>"<?php echo $patient_ot_delivery_register_add->ChildBlGrp1->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_delivery_register_add->ChildBlGrp1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->ApgarScore1->Visible) { // ApgarScore1 ?>
	<div id="r_ApgarScore1" class="form-group row">
		<label id="elh_patient_ot_delivery_register_ApgarScore1" for="x_ApgarScore1" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_ApgarScore1" type="text/html"><?php echo $patient_ot_delivery_register_add->ApgarScore1->caption() ?><?php echo $patient_ot_delivery_register_add->ApgarScore1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->ApgarScore1->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ApgarScore1" type="text/html"><span id="el_patient_ot_delivery_register_ApgarScore1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ApgarScore1" name="x_ApgarScore1" id="x_ApgarScore1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->ApgarScore1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->ApgarScore1->EditValue ?>"<?php echo $patient_ot_delivery_register_add->ApgarScore1->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_delivery_register_add->ApgarScore1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->birthnotification1->Visible) { // birthnotification1 ?>
	<div id="r_birthnotification1" class="form-group row">
		<label id="elh_patient_ot_delivery_register_birthnotification1" for="x_birthnotification1" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_birthnotification1" type="text/html"><?php echo $patient_ot_delivery_register_add->birthnotification1->caption() ?><?php echo $patient_ot_delivery_register_add->birthnotification1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->birthnotification1->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_birthnotification1" type="text/html"><span id="el_patient_ot_delivery_register_birthnotification1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_birthnotification1" name="x_birthnotification1" id="x_birthnotification1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->birthnotification1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->birthnotification1->EditValue ?>"<?php echo $patient_ot_delivery_register_add->birthnotification1->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_delivery_register_add->birthnotification1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->formno1->Visible) { // formno1 ?>
	<div id="r_formno1" class="form-group row">
		<label id="elh_patient_ot_delivery_register_formno1" for="x_formno1" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_formno1" type="text/html"><?php echo $patient_ot_delivery_register_add->formno1->caption() ?><?php echo $patient_ot_delivery_register_add->formno1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->formno1->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_formno1" type="text/html"><span id="el_patient_ot_delivery_register_formno1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_formno1" name="x_formno1" id="x_formno1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->formno1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->formno1->EditValue ?>"<?php echo $patient_ot_delivery_register_add->formno1->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_delivery_register_add->formno1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->proposedSurgery->Visible) { // proposedSurgery ?>
	<div id="r_proposedSurgery" class="form-group row">
		<label id="elh_patient_ot_delivery_register_proposedSurgery" for="x_proposedSurgery" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_proposedSurgery" type="text/html"><?php echo $patient_ot_delivery_register_add->proposedSurgery->caption() ?><?php echo $patient_ot_delivery_register_add->proposedSurgery->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->proposedSurgery->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_proposedSurgery" type="text/html"><span id="el_patient_ot_delivery_register_proposedSurgery">
<textarea data-table="patient_ot_delivery_register" data-field="x_proposedSurgery" name="x_proposedSurgery" id="x_proposedSurgery" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->proposedSurgery->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register_add->proposedSurgery->editAttributes() ?>><?php echo $patient_ot_delivery_register_add->proposedSurgery->EditValue ?></textarea>
</span></script>
<?php echo $patient_ot_delivery_register_add->proposedSurgery->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->surgeryProcedure->Visible) { // surgeryProcedure ?>
	<div id="r_surgeryProcedure" class="form-group row">
		<label id="elh_patient_ot_delivery_register_surgeryProcedure" for="x_surgeryProcedure" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_surgeryProcedure" type="text/html"><?php echo $patient_ot_delivery_register_add->surgeryProcedure->caption() ?><?php echo $patient_ot_delivery_register_add->surgeryProcedure->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->surgeryProcedure->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_surgeryProcedure" type="text/html"><span id="el_patient_ot_delivery_register_surgeryProcedure">
<textarea data-table="patient_ot_delivery_register" data-field="x_surgeryProcedure" name="x_surgeryProcedure" id="x_surgeryProcedure" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->surgeryProcedure->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register_add->surgeryProcedure->editAttributes() ?>><?php echo $patient_ot_delivery_register_add->surgeryProcedure->EditValue ?></textarea>
</span></script>
<?php echo $patient_ot_delivery_register_add->surgeryProcedure->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->typeOfAnaesthesia->Visible) { // typeOfAnaesthesia ?>
	<div id="r_typeOfAnaesthesia" class="form-group row">
		<label id="elh_patient_ot_delivery_register_typeOfAnaesthesia" for="x_typeOfAnaesthesia" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_typeOfAnaesthesia" type="text/html"><?php echo $patient_ot_delivery_register_add->typeOfAnaesthesia->caption() ?><?php echo $patient_ot_delivery_register_add->typeOfAnaesthesia->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->typeOfAnaesthesia->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_typeOfAnaesthesia" type="text/html"><span id="el_patient_ot_delivery_register_typeOfAnaesthesia">
<textarea data-table="patient_ot_delivery_register" data-field="x_typeOfAnaesthesia" name="x_typeOfAnaesthesia" id="x_typeOfAnaesthesia" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->typeOfAnaesthesia->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register_add->typeOfAnaesthesia->editAttributes() ?>><?php echo $patient_ot_delivery_register_add->typeOfAnaesthesia->EditValue ?></textarea>
</span></script>
<?php echo $patient_ot_delivery_register_add->typeOfAnaesthesia->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->RecievedTime->Visible) { // RecievedTime ?>
	<div id="r_RecievedTime" class="form-group row">
		<label id="elh_patient_ot_delivery_register_RecievedTime" for="x_RecievedTime" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_RecievedTime" type="text/html"><?php echo $patient_ot_delivery_register_add->RecievedTime->caption() ?><?php echo $patient_ot_delivery_register_add->RecievedTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->RecievedTime->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_RecievedTime" type="text/html"><span id="el_patient_ot_delivery_register_RecievedTime">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_RecievedTime" data-format="11" name="x_RecievedTime" id="x_RecievedTime" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->RecievedTime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->RecievedTime->EditValue ?>"<?php echo $patient_ot_delivery_register_add->RecievedTime->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_add->RecievedTime->ReadOnly && !$patient_ot_delivery_register_add->RecievedTime->Disabled && !isset($patient_ot_delivery_register_add->RecievedTime->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_add->RecievedTime->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_ot_delivery_registeradd_js">
loadjs.ready(["fpatient_ot_delivery_registeradd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registeradd", "x_RecievedTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php echo $patient_ot_delivery_register_add->RecievedTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->AnaesthesiaStarted->Visible) { // AnaesthesiaStarted ?>
	<div id="r_AnaesthesiaStarted" class="form-group row">
		<label id="elh_patient_ot_delivery_register_AnaesthesiaStarted" for="x_AnaesthesiaStarted" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_AnaesthesiaStarted" type="text/html"><?php echo $patient_ot_delivery_register_add->AnaesthesiaStarted->caption() ?><?php echo $patient_ot_delivery_register_add->AnaesthesiaStarted->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->AnaesthesiaStarted->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_AnaesthesiaStarted" type="text/html"><span id="el_patient_ot_delivery_register_AnaesthesiaStarted">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaStarted" data-format="11" name="x_AnaesthesiaStarted" id="x_AnaesthesiaStarted" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->AnaesthesiaStarted->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->AnaesthesiaStarted->EditValue ?>"<?php echo $patient_ot_delivery_register_add->AnaesthesiaStarted->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_add->AnaesthesiaStarted->ReadOnly && !$patient_ot_delivery_register_add->AnaesthesiaStarted->Disabled && !isset($patient_ot_delivery_register_add->AnaesthesiaStarted->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_add->AnaesthesiaStarted->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_ot_delivery_registeradd_js">
loadjs.ready(["fpatient_ot_delivery_registeradd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registeradd", "x_AnaesthesiaStarted", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php echo $patient_ot_delivery_register_add->AnaesthesiaStarted->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->AnaesthesiaEnded->Visible) { // AnaesthesiaEnded ?>
	<div id="r_AnaesthesiaEnded" class="form-group row">
		<label id="elh_patient_ot_delivery_register_AnaesthesiaEnded" for="x_AnaesthesiaEnded" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_AnaesthesiaEnded" type="text/html"><?php echo $patient_ot_delivery_register_add->AnaesthesiaEnded->caption() ?><?php echo $patient_ot_delivery_register_add->AnaesthesiaEnded->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->AnaesthesiaEnded->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_AnaesthesiaEnded" type="text/html"><span id="el_patient_ot_delivery_register_AnaesthesiaEnded">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaEnded" data-format="11" name="x_AnaesthesiaEnded" id="x_AnaesthesiaEnded" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->AnaesthesiaEnded->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->AnaesthesiaEnded->EditValue ?>"<?php echo $patient_ot_delivery_register_add->AnaesthesiaEnded->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_add->AnaesthesiaEnded->ReadOnly && !$patient_ot_delivery_register_add->AnaesthesiaEnded->Disabled && !isset($patient_ot_delivery_register_add->AnaesthesiaEnded->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_add->AnaesthesiaEnded->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_ot_delivery_registeradd_js">
loadjs.ready(["fpatient_ot_delivery_registeradd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registeradd", "x_AnaesthesiaEnded", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php echo $patient_ot_delivery_register_add->AnaesthesiaEnded->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->surgeryStarted->Visible) { // surgeryStarted ?>
	<div id="r_surgeryStarted" class="form-group row">
		<label id="elh_patient_ot_delivery_register_surgeryStarted" for="x_surgeryStarted" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_surgeryStarted" type="text/html"><?php echo $patient_ot_delivery_register_add->surgeryStarted->caption() ?><?php echo $patient_ot_delivery_register_add->surgeryStarted->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->surgeryStarted->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_surgeryStarted" type="text/html"><span id="el_patient_ot_delivery_register_surgeryStarted">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_surgeryStarted" data-format="11" name="x_surgeryStarted" id="x_surgeryStarted" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->surgeryStarted->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->surgeryStarted->EditValue ?>"<?php echo $patient_ot_delivery_register_add->surgeryStarted->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_add->surgeryStarted->ReadOnly && !$patient_ot_delivery_register_add->surgeryStarted->Disabled && !isset($patient_ot_delivery_register_add->surgeryStarted->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_add->surgeryStarted->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_ot_delivery_registeradd_js">
loadjs.ready(["fpatient_ot_delivery_registeradd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registeradd", "x_surgeryStarted", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php echo $patient_ot_delivery_register_add->surgeryStarted->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->surgeryEnded->Visible) { // surgeryEnded ?>
	<div id="r_surgeryEnded" class="form-group row">
		<label id="elh_patient_ot_delivery_register_surgeryEnded" for="x_surgeryEnded" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_surgeryEnded" type="text/html"><?php echo $patient_ot_delivery_register_add->surgeryEnded->caption() ?><?php echo $patient_ot_delivery_register_add->surgeryEnded->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->surgeryEnded->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_surgeryEnded" type="text/html"><span id="el_patient_ot_delivery_register_surgeryEnded">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_surgeryEnded" data-format="11" name="x_surgeryEnded" id="x_surgeryEnded" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->surgeryEnded->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->surgeryEnded->EditValue ?>"<?php echo $patient_ot_delivery_register_add->surgeryEnded->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_add->surgeryEnded->ReadOnly && !$patient_ot_delivery_register_add->surgeryEnded->Disabled && !isset($patient_ot_delivery_register_add->surgeryEnded->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_add->surgeryEnded->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_ot_delivery_registeradd_js">
loadjs.ready(["fpatient_ot_delivery_registeradd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registeradd", "x_surgeryEnded", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php echo $patient_ot_delivery_register_add->surgeryEnded->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->RecoveryTime->Visible) { // RecoveryTime ?>
	<div id="r_RecoveryTime" class="form-group row">
		<label id="elh_patient_ot_delivery_register_RecoveryTime" for="x_RecoveryTime" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_RecoveryTime" type="text/html"><?php echo $patient_ot_delivery_register_add->RecoveryTime->caption() ?><?php echo $patient_ot_delivery_register_add->RecoveryTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->RecoveryTime->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_RecoveryTime" type="text/html"><span id="el_patient_ot_delivery_register_RecoveryTime">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_RecoveryTime" data-format="11" name="x_RecoveryTime" id="x_RecoveryTime" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->RecoveryTime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->RecoveryTime->EditValue ?>"<?php echo $patient_ot_delivery_register_add->RecoveryTime->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_add->RecoveryTime->ReadOnly && !$patient_ot_delivery_register_add->RecoveryTime->Disabled && !isset($patient_ot_delivery_register_add->RecoveryTime->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_add->RecoveryTime->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_ot_delivery_registeradd_js">
loadjs.ready(["fpatient_ot_delivery_registeradd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registeradd", "x_RecoveryTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php echo $patient_ot_delivery_register_add->RecoveryTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->ShiftedTime->Visible) { // ShiftedTime ?>
	<div id="r_ShiftedTime" class="form-group row">
		<label id="elh_patient_ot_delivery_register_ShiftedTime" for="x_ShiftedTime" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_ShiftedTime" type="text/html"><?php echo $patient_ot_delivery_register_add->ShiftedTime->caption() ?><?php echo $patient_ot_delivery_register_add->ShiftedTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->ShiftedTime->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ShiftedTime" type="text/html"><span id="el_patient_ot_delivery_register_ShiftedTime">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ShiftedTime" data-format="11" name="x_ShiftedTime" id="x_ShiftedTime" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->ShiftedTime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->ShiftedTime->EditValue ?>"<?php echo $patient_ot_delivery_register_add->ShiftedTime->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_add->ShiftedTime->ReadOnly && !$patient_ot_delivery_register_add->ShiftedTime->Disabled && !isset($patient_ot_delivery_register_add->ShiftedTime->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_add->ShiftedTime->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_ot_delivery_registeradd_js">
loadjs.ready(["fpatient_ot_delivery_registeradd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registeradd", "x_ShiftedTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php echo $patient_ot_delivery_register_add->ShiftedTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->Duration->Visible) { // Duration ?>
	<div id="r_Duration" class="form-group row">
		<label id="elh_patient_ot_delivery_register_Duration" for="x_Duration" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_Duration" type="text/html"><?php echo $patient_ot_delivery_register_add->Duration->caption() ?><?php echo $patient_ot_delivery_register_add->Duration->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->Duration->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_Duration" type="text/html"><span id="el_patient_ot_delivery_register_Duration">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_Duration" name="x_Duration" id="x_Duration" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->Duration->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->Duration->EditValue ?>"<?php echo $patient_ot_delivery_register_add->Duration->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_delivery_register_add->Duration->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->DrVisit1->Visible) { // DrVisit1 ?>
	<div id="r_DrVisit1" class="form-group row">
		<label id="elh_patient_ot_delivery_register_DrVisit1" for="x_DrVisit1" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_DrVisit1" type="text/html"><?php echo $patient_ot_delivery_register_add->DrVisit1->caption() ?><?php echo $patient_ot_delivery_register_add->DrVisit1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->DrVisit1->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_DrVisit1" type="text/html"><span id="el_patient_ot_delivery_register_DrVisit1">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_ot_delivery_register" data-field="x_DrVisit1" data-value-separator="<?php echo $patient_ot_delivery_register_add->DrVisit1->displayValueSeparatorAttribute() ?>" id="x_DrVisit1" name="x_DrVisit1"<?php echo $patient_ot_delivery_register_add->DrVisit1->editAttributes() ?>>
			<?php echo $patient_ot_delivery_register_add->DrVisit1->selectOptionListHtml("x_DrVisit1") ?>
		</select>
</div>
<?php echo $patient_ot_delivery_register_add->DrVisit1->Lookup->getParamTag($patient_ot_delivery_register_add, "p_x_DrVisit1") ?>
</span></script>
<?php echo $patient_ot_delivery_register_add->DrVisit1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->DrVisit2->Visible) { // DrVisit2 ?>
	<div id="r_DrVisit2" class="form-group row">
		<label id="elh_patient_ot_delivery_register_DrVisit2" for="x_DrVisit2" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_DrVisit2" type="text/html"><?php echo $patient_ot_delivery_register_add->DrVisit2->caption() ?><?php echo $patient_ot_delivery_register_add->DrVisit2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->DrVisit2->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_DrVisit2" type="text/html"><span id="el_patient_ot_delivery_register_DrVisit2">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_ot_delivery_register" data-field="x_DrVisit2" data-value-separator="<?php echo $patient_ot_delivery_register_add->DrVisit2->displayValueSeparatorAttribute() ?>" id="x_DrVisit2" name="x_DrVisit2"<?php echo $patient_ot_delivery_register_add->DrVisit2->editAttributes() ?>>
			<?php echo $patient_ot_delivery_register_add->DrVisit2->selectOptionListHtml("x_DrVisit2") ?>
		</select>
</div>
<?php echo $patient_ot_delivery_register_add->DrVisit2->Lookup->getParamTag($patient_ot_delivery_register_add, "p_x_DrVisit2") ?>
</span></script>
<?php echo $patient_ot_delivery_register_add->DrVisit2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->DrVisit3->Visible) { // DrVisit3 ?>
	<div id="r_DrVisit3" class="form-group row">
		<label id="elh_patient_ot_delivery_register_DrVisit3" for="x_DrVisit3" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_DrVisit3" type="text/html"><?php echo $patient_ot_delivery_register_add->DrVisit3->caption() ?><?php echo $patient_ot_delivery_register_add->DrVisit3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->DrVisit3->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_DrVisit3" type="text/html"><span id="el_patient_ot_delivery_register_DrVisit3">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_ot_delivery_register" data-field="x_DrVisit3" data-value-separator="<?php echo $patient_ot_delivery_register_add->DrVisit3->displayValueSeparatorAttribute() ?>" id="x_DrVisit3" name="x_DrVisit3"<?php echo $patient_ot_delivery_register_add->DrVisit3->editAttributes() ?>>
			<?php echo $patient_ot_delivery_register_add->DrVisit3->selectOptionListHtml("x_DrVisit3") ?>
		</select>
</div>
<?php echo $patient_ot_delivery_register_add->DrVisit3->Lookup->getParamTag($patient_ot_delivery_register_add, "p_x_DrVisit3") ?>
</span></script>
<?php echo $patient_ot_delivery_register_add->DrVisit3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->DrVisit4->Visible) { // DrVisit4 ?>
	<div id="r_DrVisit4" class="form-group row">
		<label id="elh_patient_ot_delivery_register_DrVisit4" for="x_DrVisit4" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_DrVisit4" type="text/html"><?php echo $patient_ot_delivery_register_add->DrVisit4->caption() ?><?php echo $patient_ot_delivery_register_add->DrVisit4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->DrVisit4->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_DrVisit4" type="text/html"><span id="el_patient_ot_delivery_register_DrVisit4">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_ot_delivery_register" data-field="x_DrVisit4" data-value-separator="<?php echo $patient_ot_delivery_register_add->DrVisit4->displayValueSeparatorAttribute() ?>" id="x_DrVisit4" name="x_DrVisit4"<?php echo $patient_ot_delivery_register_add->DrVisit4->editAttributes() ?>>
			<?php echo $patient_ot_delivery_register_add->DrVisit4->selectOptionListHtml("x_DrVisit4") ?>
		</select>
</div>
<?php echo $patient_ot_delivery_register_add->DrVisit4->Lookup->getParamTag($patient_ot_delivery_register_add, "p_x_DrVisit4") ?>
</span></script>
<?php echo $patient_ot_delivery_register_add->DrVisit4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->Surgeon->Visible) { // Surgeon ?>
	<div id="r_Surgeon" class="form-group row">
		<label id="elh_patient_ot_delivery_register_Surgeon" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_Surgeon" type="text/html"><?php echo $patient_ot_delivery_register_add->Surgeon->caption() ?><?php echo $patient_ot_delivery_register_add->Surgeon->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->Surgeon->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_Surgeon" type="text/html"><span id="el_patient_ot_delivery_register_Surgeon">
<?php
$onchange = $patient_ot_delivery_register_add->Surgeon->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_ot_delivery_register_add->Surgeon->EditAttrs["onchange"] = "";
?>
<span id="as_x_Surgeon">
	<input type="text" class="form-control" name="sv_x_Surgeon" id="sv_x_Surgeon" value="<?php echo RemoveHtml($patient_ot_delivery_register_add->Surgeon->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->Surgeon->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->Surgeon->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register_add->Surgeon->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Surgeon" data-value-separator="<?php echo $patient_ot_delivery_register_add->Surgeon->displayValueSeparatorAttribute() ?>" name="x_Surgeon" id="x_Surgeon" value="<?php echo HtmlEncode($patient_ot_delivery_register_add->Surgeon->CurrentValue) ?>"<?php echo $onchange ?>>
<?php echo $patient_ot_delivery_register_add->Surgeon->Lookup->getParamTag($patient_ot_delivery_register_add, "p_x_Surgeon") ?>
</span></script>
<script type="text/html" class="patient_ot_delivery_registeradd_js">
loadjs.ready(["fpatient_ot_delivery_registeradd"], function() {
	fpatient_ot_delivery_registeradd.createAutoSuggest({"id":"x_Surgeon","forceSelect":false});
});
</script>
<?php echo $patient_ot_delivery_register_add->Surgeon->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->Anaesthetist->Visible) { // Anaesthetist ?>
	<div id="r_Anaesthetist" class="form-group row">
		<label id="elh_patient_ot_delivery_register_Anaesthetist" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_Anaesthetist" type="text/html"><?php echo $patient_ot_delivery_register_add->Anaesthetist->caption() ?><?php echo $patient_ot_delivery_register_add->Anaesthetist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->Anaesthetist->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_Anaesthetist" type="text/html"><span id="el_patient_ot_delivery_register_Anaesthetist">
<?php
$onchange = $patient_ot_delivery_register_add->Anaesthetist->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_ot_delivery_register_add->Anaesthetist->EditAttrs["onchange"] = "";
?>
<span id="as_x_Anaesthetist">
	<input type="text" class="form-control" name="sv_x_Anaesthetist" id="sv_x_Anaesthetist" value="<?php echo RemoveHtml($patient_ot_delivery_register_add->Anaesthetist->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->Anaesthetist->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->Anaesthetist->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register_add->Anaesthetist->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Anaesthetist" data-value-separator="<?php echo $patient_ot_delivery_register_add->Anaesthetist->displayValueSeparatorAttribute() ?>" name="x_Anaesthetist" id="x_Anaesthetist" value="<?php echo HtmlEncode($patient_ot_delivery_register_add->Anaesthetist->CurrentValue) ?>"<?php echo $onchange ?>>
<?php echo $patient_ot_delivery_register_add->Anaesthetist->Lookup->getParamTag($patient_ot_delivery_register_add, "p_x_Anaesthetist") ?>
</span></script>
<script type="text/html" class="patient_ot_delivery_registeradd_js">
loadjs.ready(["fpatient_ot_delivery_registeradd"], function() {
	fpatient_ot_delivery_registeradd.createAutoSuggest({"id":"x_Anaesthetist","forceSelect":false});
});
</script>
<?php echo $patient_ot_delivery_register_add->Anaesthetist->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->AsstSurgeon1->Visible) { // AsstSurgeon1 ?>
	<div id="r_AsstSurgeon1" class="form-group row">
		<label id="elh_patient_ot_delivery_register_AsstSurgeon1" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_AsstSurgeon1" type="text/html"><?php echo $patient_ot_delivery_register_add->AsstSurgeon1->caption() ?><?php echo $patient_ot_delivery_register_add->AsstSurgeon1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->AsstSurgeon1->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_AsstSurgeon1" type="text/html"><span id="el_patient_ot_delivery_register_AsstSurgeon1">
<?php
$onchange = $patient_ot_delivery_register_add->AsstSurgeon1->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_ot_delivery_register_add->AsstSurgeon1->EditAttrs["onchange"] = "";
?>
<span id="as_x_AsstSurgeon1">
	<input type="text" class="form-control" name="sv_x_AsstSurgeon1" id="sv_x_AsstSurgeon1" value="<?php echo RemoveHtml($patient_ot_delivery_register_add->AsstSurgeon1->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->AsstSurgeon1->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->AsstSurgeon1->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register_add->AsstSurgeon1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon1" data-value-separator="<?php echo $patient_ot_delivery_register_add->AsstSurgeon1->displayValueSeparatorAttribute() ?>" name="x_AsstSurgeon1" id="x_AsstSurgeon1" value="<?php echo HtmlEncode($patient_ot_delivery_register_add->AsstSurgeon1->CurrentValue) ?>"<?php echo $onchange ?>>
<?php echo $patient_ot_delivery_register_add->AsstSurgeon1->Lookup->getParamTag($patient_ot_delivery_register_add, "p_x_AsstSurgeon1") ?>
</span></script>
<script type="text/html" class="patient_ot_delivery_registeradd_js">
loadjs.ready(["fpatient_ot_delivery_registeradd"], function() {
	fpatient_ot_delivery_registeradd.createAutoSuggest({"id":"x_AsstSurgeon1","forceSelect":false});
});
</script>
<?php echo $patient_ot_delivery_register_add->AsstSurgeon1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->AsstSurgeon2->Visible) { // AsstSurgeon2 ?>
	<div id="r_AsstSurgeon2" class="form-group row">
		<label id="elh_patient_ot_delivery_register_AsstSurgeon2" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_AsstSurgeon2" type="text/html"><?php echo $patient_ot_delivery_register_add->AsstSurgeon2->caption() ?><?php echo $patient_ot_delivery_register_add->AsstSurgeon2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->AsstSurgeon2->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_AsstSurgeon2" type="text/html"><span id="el_patient_ot_delivery_register_AsstSurgeon2">
<?php
$onchange = $patient_ot_delivery_register_add->AsstSurgeon2->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_ot_delivery_register_add->AsstSurgeon2->EditAttrs["onchange"] = "";
?>
<span id="as_x_AsstSurgeon2">
	<input type="text" class="form-control" name="sv_x_AsstSurgeon2" id="sv_x_AsstSurgeon2" value="<?php echo RemoveHtml($patient_ot_delivery_register_add->AsstSurgeon2->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->AsstSurgeon2->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->AsstSurgeon2->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register_add->AsstSurgeon2->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon2" data-value-separator="<?php echo $patient_ot_delivery_register_add->AsstSurgeon2->displayValueSeparatorAttribute() ?>" name="x_AsstSurgeon2" id="x_AsstSurgeon2" value="<?php echo HtmlEncode($patient_ot_delivery_register_add->AsstSurgeon2->CurrentValue) ?>"<?php echo $onchange ?>>
<?php echo $patient_ot_delivery_register_add->AsstSurgeon2->Lookup->getParamTag($patient_ot_delivery_register_add, "p_x_AsstSurgeon2") ?>
</span></script>
<script type="text/html" class="patient_ot_delivery_registeradd_js">
loadjs.ready(["fpatient_ot_delivery_registeradd"], function() {
	fpatient_ot_delivery_registeradd.createAutoSuggest({"id":"x_AsstSurgeon2","forceSelect":false});
});
</script>
<?php echo $patient_ot_delivery_register_add->AsstSurgeon2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->paediatric->Visible) { // paediatric ?>
	<div id="r_paediatric" class="form-group row">
		<label id="elh_patient_ot_delivery_register_paediatric" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_paediatric" type="text/html"><?php echo $patient_ot_delivery_register_add->paediatric->caption() ?><?php echo $patient_ot_delivery_register_add->paediatric->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->paediatric->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_paediatric" type="text/html"><span id="el_patient_ot_delivery_register_paediatric">
<?php
$onchange = $patient_ot_delivery_register_add->paediatric->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_ot_delivery_register_add->paediatric->EditAttrs["onchange"] = "";
?>
<span id="as_x_paediatric">
	<input type="text" class="form-control" name="sv_x_paediatric" id="sv_x_paediatric" value="<?php echo RemoveHtml($patient_ot_delivery_register_add->paediatric->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->paediatric->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->paediatric->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register_add->paediatric->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_paediatric" data-value-separator="<?php echo $patient_ot_delivery_register_add->paediatric->displayValueSeparatorAttribute() ?>" name="x_paediatric" id="x_paediatric" value="<?php echo HtmlEncode($patient_ot_delivery_register_add->paediatric->CurrentValue) ?>"<?php echo $onchange ?>>
<?php echo $patient_ot_delivery_register_add->paediatric->Lookup->getParamTag($patient_ot_delivery_register_add, "p_x_paediatric") ?>
</span></script>
<script type="text/html" class="patient_ot_delivery_registeradd_js">
loadjs.ready(["fpatient_ot_delivery_registeradd"], function() {
	fpatient_ot_delivery_registeradd.createAutoSuggest({"id":"x_paediatric","forceSelect":false});
});
</script>
<?php echo $patient_ot_delivery_register_add->paediatric->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->ScrubNurse1->Visible) { // ScrubNurse1 ?>
	<div id="r_ScrubNurse1" class="form-group row">
		<label id="elh_patient_ot_delivery_register_ScrubNurse1" for="x_ScrubNurse1" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_ScrubNurse1" type="text/html"><?php echo $patient_ot_delivery_register_add->ScrubNurse1->caption() ?><?php echo $patient_ot_delivery_register_add->ScrubNurse1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->ScrubNurse1->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ScrubNurse1" type="text/html"><span id="el_patient_ot_delivery_register_ScrubNurse1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse1" name="x_ScrubNurse1" id="x_ScrubNurse1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->ScrubNurse1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->ScrubNurse1->EditValue ?>"<?php echo $patient_ot_delivery_register_add->ScrubNurse1->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_delivery_register_add->ScrubNurse1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->ScrubNurse2->Visible) { // ScrubNurse2 ?>
	<div id="r_ScrubNurse2" class="form-group row">
		<label id="elh_patient_ot_delivery_register_ScrubNurse2" for="x_ScrubNurse2" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_ScrubNurse2" type="text/html"><?php echo $patient_ot_delivery_register_add->ScrubNurse2->caption() ?><?php echo $patient_ot_delivery_register_add->ScrubNurse2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->ScrubNurse2->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ScrubNurse2" type="text/html"><span id="el_patient_ot_delivery_register_ScrubNurse2">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse2" name="x_ScrubNurse2" id="x_ScrubNurse2" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->ScrubNurse2->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->ScrubNurse2->EditValue ?>"<?php echo $patient_ot_delivery_register_add->ScrubNurse2->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_delivery_register_add->ScrubNurse2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->FloorNurse->Visible) { // FloorNurse ?>
	<div id="r_FloorNurse" class="form-group row">
		<label id="elh_patient_ot_delivery_register_FloorNurse" for="x_FloorNurse" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_FloorNurse" type="text/html"><?php echo $patient_ot_delivery_register_add->FloorNurse->caption() ?><?php echo $patient_ot_delivery_register_add->FloorNurse->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->FloorNurse->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_FloorNurse" type="text/html"><span id="el_patient_ot_delivery_register_FloorNurse">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_FloorNurse" name="x_FloorNurse" id="x_FloorNurse" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->FloorNurse->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->FloorNurse->EditValue ?>"<?php echo $patient_ot_delivery_register_add->FloorNurse->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_delivery_register_add->FloorNurse->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->Technician->Visible) { // Technician ?>
	<div id="r_Technician" class="form-group row">
		<label id="elh_patient_ot_delivery_register_Technician" for="x_Technician" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_Technician" type="text/html"><?php echo $patient_ot_delivery_register_add->Technician->caption() ?><?php echo $patient_ot_delivery_register_add->Technician->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->Technician->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_Technician" type="text/html"><span id="el_patient_ot_delivery_register_Technician">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_Technician" name="x_Technician" id="x_Technician" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->Technician->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->Technician->EditValue ?>"<?php echo $patient_ot_delivery_register_add->Technician->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_delivery_register_add->Technician->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->HouseKeeping->Visible) { // HouseKeeping ?>
	<div id="r_HouseKeeping" class="form-group row">
		<label id="elh_patient_ot_delivery_register_HouseKeeping" for="x_HouseKeeping" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_HouseKeeping" type="text/html"><?php echo $patient_ot_delivery_register_add->HouseKeeping->caption() ?><?php echo $patient_ot_delivery_register_add->HouseKeeping->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->HouseKeeping->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_HouseKeeping" type="text/html"><span id="el_patient_ot_delivery_register_HouseKeeping">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_HouseKeeping" name="x_HouseKeeping" id="x_HouseKeeping" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->HouseKeeping->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->HouseKeeping->EditValue ?>"<?php echo $patient_ot_delivery_register_add->HouseKeeping->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_delivery_register_add->HouseKeeping->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->countsCheckedMops->Visible) { // countsCheckedMops ?>
	<div id="r_countsCheckedMops" class="form-group row">
		<label id="elh_patient_ot_delivery_register_countsCheckedMops" for="x_countsCheckedMops" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_countsCheckedMops" type="text/html"><?php echo $patient_ot_delivery_register_add->countsCheckedMops->caption() ?><?php echo $patient_ot_delivery_register_add->countsCheckedMops->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->countsCheckedMops->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_countsCheckedMops" type="text/html"><span id="el_patient_ot_delivery_register_countsCheckedMops">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_countsCheckedMops" name="x_countsCheckedMops" id="x_countsCheckedMops" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->countsCheckedMops->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->countsCheckedMops->EditValue ?>"<?php echo $patient_ot_delivery_register_add->countsCheckedMops->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_delivery_register_add->countsCheckedMops->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->gauze->Visible) { // gauze ?>
	<div id="r_gauze" class="form-group row">
		<label id="elh_patient_ot_delivery_register_gauze" for="x_gauze" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_gauze" type="text/html"><?php echo $patient_ot_delivery_register_add->gauze->caption() ?><?php echo $patient_ot_delivery_register_add->gauze->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->gauze->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_gauze" type="text/html"><span id="el_patient_ot_delivery_register_gauze">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_gauze" name="x_gauze" id="x_gauze" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->gauze->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->gauze->EditValue ?>"<?php echo $patient_ot_delivery_register_add->gauze->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_delivery_register_add->gauze->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->needles->Visible) { // needles ?>
	<div id="r_needles" class="form-group row">
		<label id="elh_patient_ot_delivery_register_needles" for="x_needles" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_needles" type="text/html"><?php echo $patient_ot_delivery_register_add->needles->caption() ?><?php echo $patient_ot_delivery_register_add->needles->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->needles->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_needles" type="text/html"><span id="el_patient_ot_delivery_register_needles">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_needles" name="x_needles" id="x_needles" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->needles->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->needles->EditValue ?>"<?php echo $patient_ot_delivery_register_add->needles->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_delivery_register_add->needles->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->bloodloss->Visible) { // bloodloss ?>
	<div id="r_bloodloss" class="form-group row">
		<label id="elh_patient_ot_delivery_register_bloodloss" for="x_bloodloss" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_bloodloss" type="text/html"><?php echo $patient_ot_delivery_register_add->bloodloss->caption() ?><?php echo $patient_ot_delivery_register_add->bloodloss->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->bloodloss->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_bloodloss" type="text/html"><span id="el_patient_ot_delivery_register_bloodloss">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_bloodloss" name="x_bloodloss" id="x_bloodloss" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->bloodloss->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->bloodloss->EditValue ?>"<?php echo $patient_ot_delivery_register_add->bloodloss->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_delivery_register_add->bloodloss->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->bloodtransfusion->Visible) { // bloodtransfusion ?>
	<div id="r_bloodtransfusion" class="form-group row">
		<label id="elh_patient_ot_delivery_register_bloodtransfusion" for="x_bloodtransfusion" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_bloodtransfusion" type="text/html"><?php echo $patient_ot_delivery_register_add->bloodtransfusion->caption() ?><?php echo $patient_ot_delivery_register_add->bloodtransfusion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->bloodtransfusion->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_bloodtransfusion" type="text/html"><span id="el_patient_ot_delivery_register_bloodtransfusion">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_bloodtransfusion" name="x_bloodtransfusion" id="x_bloodtransfusion" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->bloodtransfusion->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->bloodtransfusion->EditValue ?>"<?php echo $patient_ot_delivery_register_add->bloodtransfusion->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_delivery_register_add->bloodtransfusion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->implantsUsed->Visible) { // implantsUsed ?>
	<div id="r_implantsUsed" class="form-group row">
		<label id="elh_patient_ot_delivery_register_implantsUsed" for="x_implantsUsed" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_implantsUsed" type="text/html"><?php echo $patient_ot_delivery_register_add->implantsUsed->caption() ?><?php echo $patient_ot_delivery_register_add->implantsUsed->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->implantsUsed->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_implantsUsed" type="text/html"><span id="el_patient_ot_delivery_register_implantsUsed">
<textarea data-table="patient_ot_delivery_register" data-field="x_implantsUsed" name="x_implantsUsed" id="x_implantsUsed" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->implantsUsed->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register_add->implantsUsed->editAttributes() ?>><?php echo $patient_ot_delivery_register_add->implantsUsed->EditValue ?></textarea>
</span></script>
<?php echo $patient_ot_delivery_register_add->implantsUsed->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->MaterialsForHPE->Visible) { // MaterialsForHPE ?>
	<div id="r_MaterialsForHPE" class="form-group row">
		<label id="elh_patient_ot_delivery_register_MaterialsForHPE" for="x_MaterialsForHPE" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_MaterialsForHPE" type="text/html"><?php echo $patient_ot_delivery_register_add->MaterialsForHPE->caption() ?><?php echo $patient_ot_delivery_register_add->MaterialsForHPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->MaterialsForHPE->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_MaterialsForHPE" type="text/html"><span id="el_patient_ot_delivery_register_MaterialsForHPE">
<textarea data-table="patient_ot_delivery_register" data-field="x_MaterialsForHPE" name="x_MaterialsForHPE" id="x_MaterialsForHPE" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->MaterialsForHPE->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register_add->MaterialsForHPE->editAttributes() ?>><?php echo $patient_ot_delivery_register_add->MaterialsForHPE->EditValue ?></textarea>
</span></script>
<?php echo $patient_ot_delivery_register_add->MaterialsForHPE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_patient_ot_delivery_register_Reception" for="x_Reception" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_Reception" type="text/html"><?php echo $patient_ot_delivery_register_add->Reception->caption() ?><?php echo $patient_ot_delivery_register_add->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->Reception->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register_add->Reception->getSessionValue() != "") { ?>
<script id="tpx_patient_ot_delivery_register_Reception" type="text/html"><span id="el_patient_ot_delivery_register_Reception">
<span<?php echo $patient_ot_delivery_register_add->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_add->Reception->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x_Reception" name="x_Reception" value="<?php echo HtmlEncode($patient_ot_delivery_register_add->Reception->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_patient_ot_delivery_register_Reception" type="text/html"><span id="el_patient_ot_delivery_register_Reception">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->Reception->EditValue ?>"<?php echo $patient_ot_delivery_register_add->Reception->editAttributes() ?>>
</span></script>
<?php } ?>
<?php echo $patient_ot_delivery_register_add->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->PId->Visible) { // PId ?>
	<div id="r_PId" class="form-group row">
		<label id="elh_patient_ot_delivery_register_PId" for="x_PId" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_PId" type="text/html"><?php echo $patient_ot_delivery_register_add->PId->caption() ?><?php echo $patient_ot_delivery_register_add->PId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->PId->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register_add->PId->getSessionValue() != "") { ?>
<script id="tpx_patient_ot_delivery_register_PId" type="text/html"><span id="el_patient_ot_delivery_register_PId">
<span<?php echo $patient_ot_delivery_register_add->PId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_add->PId->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x_PId" name="x_PId" value="<?php echo HtmlEncode($patient_ot_delivery_register_add->PId->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_patient_ot_delivery_register_PId" type="text/html"><span id="el_patient_ot_delivery_register_PId">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_PId" name="x_PId" id="x_PId" size="30" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_add->PId->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_add->PId->EditValue ?>"<?php echo $patient_ot_delivery_register_add->PId->editAttributes() ?>>
</span></script>
<?php } ?>
<?php echo $patient_ot_delivery_register_add->PId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_add->PatientSearch->Visible) { // PatientSearch ?>
	<div id="r_PatientSearch" class="form-group row">
		<label id="elh_patient_ot_delivery_register_PatientSearch" for="x_PatientSearch" class="<?php echo $patient_ot_delivery_register_add->LeftColumnClass ?>"><script id="tpc_patient_ot_delivery_register_PatientSearch" type="text/html"><?php echo $patient_ot_delivery_register_add->PatientSearch->caption() ?><?php echo $patient_ot_delivery_register_add->PatientSearch->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_ot_delivery_register_add->RightColumnClass ?>"><div <?php echo $patient_ot_delivery_register_add->PatientSearch->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_PatientSearch" type="text/html"><span id="el_patient_ot_delivery_register_PatientSearch">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PatientSearch"><?php echo EmptyValue(strval($patient_ot_delivery_register_add->PatientSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $patient_ot_delivery_register_add->PatientSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_ot_delivery_register_add->PatientSearch->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($patient_ot_delivery_register_add->PatientSearch->ReadOnly || $patient_ot_delivery_register_add->PatientSearch->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_PatientSearch',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_ot_delivery_register_add->PatientSearch->Lookup->getParamTag($patient_ot_delivery_register_add, "p_x_PatientSearch") ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatientSearch" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_ot_delivery_register_add->PatientSearch->displayValueSeparatorAttribute() ?>" name="x_PatientSearch" id="x_PatientSearch" value="<?php echo $patient_ot_delivery_register_add->PatientSearch->CurrentValue ?>"<?php echo $patient_ot_delivery_register_add->PatientSearch->editAttributes() ?>>
</span></script>
<?php echo $patient_ot_delivery_register_add->PatientSearch->CustomMsg ?></div></div>
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
{{include tmpl="#tpc_patient_ot_delivery_register_PatientSearch"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_PatientSearch")/}}	
<p id="profilePic" hidden>{{include tmpl="#tpc_patient_ot_delivery_register_profilePic"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_profilePic")/}}</p>
<p id="SurfaceArea" hidden>{{include tmpl=~getTemplate("#tpx_SurfaceArea")/}}</p>
<p id="BodyMassIndex" hidden>{{include tmpl=~getTemplate("#tpx_BodyMassIndex")/}}</p>
<p id="idmrnnokk" hidden>{{include tmpl="#tpc_patient_ot_delivery_register_mrnno"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_mrnno")/}}</p>
<div hidden>
  <p>{{include tmpl="#tpc_patient_ot_delivery_register_Reception"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_Reception")/}}</p> 
  <p>{{include tmpl="#tpc_patient_ot_delivery_register_PatientID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_PatientID")/}}</p> 
  <p>{{include tmpl="#tpc_patient_ot_delivery_register_PatientName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_PatientName")/}}</p> 
  <p>{{include tmpl="#tpc_patient_ot_delivery_register_Age"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_Age")/}}</p> 
  <p>{{include tmpl="#tpc_patient_ot_delivery_register_Gender"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_Gender")/}}</p>
  <p>{{include tmpl="#tpc_patient_ot_delivery_register_PatID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_PatID")/}}</p>
  <p>{{include tmpl="#tpc_patient_ot_delivery_register_MobileNumber"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_MobileNumber")/}}</p> 
	<p>{{include tmpl="#tpc_patient_ot_delivery_register_PId"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_PId")/}}</p>
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
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ObstetricsHistryFeMale"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_ObstetricsHistryFeMale")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_Abortion"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_Abortion")/}}</td></tr>					
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
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_dte"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_dte")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_motherReligion"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_motherReligion")/}}</td></tr>
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
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ChildBirthDate"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_ChildBirthDate")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ChildBirthTime"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_ChildBirthTime")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ChildSex"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_ChildSex")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ChildWt"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_ChildWt")/}}</td></tr>
											<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ChildDay"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_ChildDay")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ChildOE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_ChildOE")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_TypeofDelivery"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_TypeofDelivery")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ChildBlGrp"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_ChildBlGrp")/}}</td></tr>
												<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ApgarScore"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_ApgarScore")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_birthnotification"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_birthnotification")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_formno"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_formno")/}}</td></tr>
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
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ChildBirthDate1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_ChildBirthDate1")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ChildBirthTime1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_ChildBirthTime1")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ChildSex1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_ChildSex1")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ChildWt1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_ChildWt1")/}}</td></tr>
											<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ChildDay1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_ChildDay1")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ChildOE1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_ChildOE1")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_TypeofDelivery1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_TypeofDelivery1")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ChildBlGrp1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_ChildBlGrp1")/}}</td></tr>
												<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ApgarScore1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_ApgarScore1")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_birthnotification1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_birthnotification1")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_formno1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_formno1")/}}</td></tr>
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
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_bloodgroup"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_bloodgroup")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_proposedSurgery"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_proposedSurgery")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_surgeryProcedure"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_surgeryProcedure")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_typeOfAnaesthesia"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_typeOfAnaesthesia")/}}</td></tr>
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
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_RecievedTime"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_RecievedTime")/}}</td></tr>
							<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_AnaesthesiaStarted"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_AnaesthesiaStarted")/}}</td></tr>
							<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_AnaesthesiaEnded"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_AnaesthesiaEnded")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_surgeryStarted"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_surgeryStarted")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_surgeryEnded"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_surgeryEnded")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_RecoveryTime"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_RecoveryTime")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ShiftedTime"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_ShiftedTime")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_Duration"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_Duration")/}}</td></tr>
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
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_DrVisit1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_DrVisit1")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_DrVisit2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_DrVisit2")/}}</td></tr>					
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
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_DrVisit3"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_DrVisit3")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_DrVisit4"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_DrVisit4")/}}</td></tr>
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
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_Surgeon"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_Surgeon")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_Anaesthetist"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_Anaesthetist")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_AsstSurgeon1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_AsstSurgeon1")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_AsstSurgeon2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_AsstSurgeon2")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_paediatric"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_paediatric")/}}</td></tr>
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
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ScrubNurse1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_ScrubNurse1")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ScrubNurse2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_ScrubNurse2")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_FloorNurse"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_FloorNurse")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_Technician"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_Technician")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_HouseKeeping"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_HouseKeeping")/}}</td></tr>
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
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_countsCheckedMops"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_countsCheckedMops")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_gauze"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_gauze")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_needles"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_needles")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_bloodloss"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_bloodloss")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_bloodtransfusion"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_bloodtransfusion")/}}</td></tr>
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
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_implantsUsed"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_implantsUsed")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_MaterialsForHPE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_MaterialsForHPE")/}}</td></tr>
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
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($patient_ot_delivery_register->Rows) ?> };
	ew.applyTemplate("tpd_patient_ot_delivery_registeradd", "tpm_patient_ot_delivery_registeradd", "patient_ot_delivery_registeradd", "<?php echo $patient_ot_delivery_register->CustomExport ?>", ew.templateData.rows[0]);
	$("script.patient_ot_delivery_registeradd_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$patient_ot_delivery_register_add->showPageFooter();
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
$patient_ot_delivery_register_add->terminate();
?>