<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($patient_ot_delivery_register_grid))
	$patient_ot_delivery_register_grid = new patient_ot_delivery_register_grid();

// Run the page
$patient_ot_delivery_register_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_ot_delivery_register_grid->Page_Render();
?>
<?php if (!$patient_ot_delivery_register->isExport()) { ?>
<script>

// Form object
var fpatient_ot_delivery_registergrid = new ew.Form("fpatient_ot_delivery_registergrid", "grid");
fpatient_ot_delivery_registergrid.formKeyCountName = '<?php echo $patient_ot_delivery_register_grid->FormKeyCountName ?>';

// Validate form
fpatient_ot_delivery_registergrid.validate = function() {
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
		<?php if ($patient_ot_delivery_register_grid->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->id->caption(), $patient_ot_delivery_register->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_grid->PatID->Required) { ?>
			elm = this.getElements("x" + infix + "_PatID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->PatID->caption(), $patient_ot_delivery_register->PatID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_grid->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->PatientName->caption(), $patient_ot_delivery_register->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_grid->mrnno->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->mrnno->caption(), $patient_ot_delivery_register->mrnno->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_grid->MobileNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_MobileNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->MobileNumber->caption(), $patient_ot_delivery_register->MobileNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_grid->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->Age->caption(), $patient_ot_delivery_register->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_grid->Gender->Required) { ?>
			elm = this.getElements("x" + infix + "_Gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->Gender->caption(), $patient_ot_delivery_register->Gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_grid->ObstetricsHistryFeMale->Required) { ?>
			elm = this.getElements("x" + infix + "_ObstetricsHistryFeMale");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->ObstetricsHistryFeMale->caption(), $patient_ot_delivery_register->ObstetricsHistryFeMale->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_grid->Abortion->Required) { ?>
			elm = this.getElements("x" + infix + "_Abortion");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->Abortion->caption(), $patient_ot_delivery_register->Abortion->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_grid->ChildBirthDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ChildBirthDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->ChildBirthDate->caption(), $patient_ot_delivery_register->ChildBirthDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ChildBirthDate");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register->ChildBirthDate->errorMessage()) ?>");
		<?php if ($patient_ot_delivery_register_grid->ChildBirthTime->Required) { ?>
			elm = this.getElements("x" + infix + "_ChildBirthTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->ChildBirthTime->caption(), $patient_ot_delivery_register->ChildBirthTime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_grid->ChildSex->Required) { ?>
			elm = this.getElements("x" + infix + "_ChildSex");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->ChildSex->caption(), $patient_ot_delivery_register->ChildSex->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_grid->ChildWt->Required) { ?>
			elm = this.getElements("x" + infix + "_ChildWt");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->ChildWt->caption(), $patient_ot_delivery_register->ChildWt->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_grid->ChildDay->Required) { ?>
			elm = this.getElements("x" + infix + "_ChildDay");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->ChildDay->caption(), $patient_ot_delivery_register->ChildDay->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_grid->ChildOE->Required) { ?>
			elm = this.getElements("x" + infix + "_ChildOE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->ChildOE->caption(), $patient_ot_delivery_register->ChildOE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_grid->ChildBlGrp->Required) { ?>
			elm = this.getElements("x" + infix + "_ChildBlGrp");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->ChildBlGrp->caption(), $patient_ot_delivery_register->ChildBlGrp->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_grid->ApgarScore->Required) { ?>
			elm = this.getElements("x" + infix + "_ApgarScore");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->ApgarScore->caption(), $patient_ot_delivery_register->ApgarScore->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_grid->birthnotification->Required) { ?>
			elm = this.getElements("x" + infix + "_birthnotification");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->birthnotification->caption(), $patient_ot_delivery_register->birthnotification->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_grid->formno->Required) { ?>
			elm = this.getElements("x" + infix + "_formno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->formno->caption(), $patient_ot_delivery_register->formno->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_grid->dte->Required) { ?>
			elm = this.getElements("x" + infix + "_dte");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->dte->caption(), $patient_ot_delivery_register->dte->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_dte");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register->dte->errorMessage()) ?>");
		<?php if ($patient_ot_delivery_register_grid->motherReligion->Required) { ?>
			elm = this.getElements("x" + infix + "_motherReligion");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->motherReligion->caption(), $patient_ot_delivery_register->motherReligion->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_grid->bloodgroup->Required) { ?>
			elm = this.getElements("x" + infix + "_bloodgroup");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->bloodgroup->caption(), $patient_ot_delivery_register->bloodgroup->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_grid->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->status->caption(), $patient_ot_delivery_register->status->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register->status->errorMessage()) ?>");
		<?php if ($patient_ot_delivery_register_grid->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->createdby->caption(), $patient_ot_delivery_register->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register->createdby->errorMessage()) ?>");
		<?php if ($patient_ot_delivery_register_grid->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->createddatetime->caption(), $patient_ot_delivery_register->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register->createddatetime->errorMessage()) ?>");
		<?php if ($patient_ot_delivery_register_grid->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->modifiedby->caption(), $patient_ot_delivery_register->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register->modifiedby->errorMessage()) ?>");
		<?php if ($patient_ot_delivery_register_grid->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->modifieddatetime->caption(), $patient_ot_delivery_register->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register->modifieddatetime->errorMessage()) ?>");
		<?php if ($patient_ot_delivery_register_grid->PatientID->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->PatientID->caption(), $patient_ot_delivery_register->PatientID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_grid->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->HospID->caption(), $patient_ot_delivery_register->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_grid->ChildBirthDate1->Required) { ?>
			elm = this.getElements("x" + infix + "_ChildBirthDate1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->ChildBirthDate1->caption(), $patient_ot_delivery_register->ChildBirthDate1->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ChildBirthDate1");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register->ChildBirthDate1->errorMessage()) ?>");
		<?php if ($patient_ot_delivery_register_grid->ChildBirthTime1->Required) { ?>
			elm = this.getElements("x" + infix + "_ChildBirthTime1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->ChildBirthTime1->caption(), $patient_ot_delivery_register->ChildBirthTime1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_grid->ChildSex1->Required) { ?>
			elm = this.getElements("x" + infix + "_ChildSex1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->ChildSex1->caption(), $patient_ot_delivery_register->ChildSex1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_grid->ChildWt1->Required) { ?>
			elm = this.getElements("x" + infix + "_ChildWt1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->ChildWt1->caption(), $patient_ot_delivery_register->ChildWt1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_grid->ChildDay1->Required) { ?>
			elm = this.getElements("x" + infix + "_ChildDay1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->ChildDay1->caption(), $patient_ot_delivery_register->ChildDay1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_grid->ChildOE1->Required) { ?>
			elm = this.getElements("x" + infix + "_ChildOE1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->ChildOE1->caption(), $patient_ot_delivery_register->ChildOE1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_grid->ChildBlGrp1->Required) { ?>
			elm = this.getElements("x" + infix + "_ChildBlGrp1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->ChildBlGrp1->caption(), $patient_ot_delivery_register->ChildBlGrp1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_grid->ApgarScore1->Required) { ?>
			elm = this.getElements("x" + infix + "_ApgarScore1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->ApgarScore1->caption(), $patient_ot_delivery_register->ApgarScore1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_grid->birthnotification1->Required) { ?>
			elm = this.getElements("x" + infix + "_birthnotification1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->birthnotification1->caption(), $patient_ot_delivery_register->birthnotification1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_grid->formno1->Required) { ?>
			elm = this.getElements("x" + infix + "_formno1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->formno1->caption(), $patient_ot_delivery_register->formno1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_grid->RecievedTime->Required) { ?>
			elm = this.getElements("x" + infix + "_RecievedTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->RecievedTime->caption(), $patient_ot_delivery_register->RecievedTime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RecievedTime");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register->RecievedTime->errorMessage()) ?>");
		<?php if ($patient_ot_delivery_register_grid->AnaesthesiaStarted->Required) { ?>
			elm = this.getElements("x" + infix + "_AnaesthesiaStarted");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->AnaesthesiaStarted->caption(), $patient_ot_delivery_register->AnaesthesiaStarted->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AnaesthesiaStarted");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register->AnaesthesiaStarted->errorMessage()) ?>");
		<?php if ($patient_ot_delivery_register_grid->AnaesthesiaEnded->Required) { ?>
			elm = this.getElements("x" + infix + "_AnaesthesiaEnded");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->AnaesthesiaEnded->caption(), $patient_ot_delivery_register->AnaesthesiaEnded->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AnaesthesiaEnded");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register->AnaesthesiaEnded->errorMessage()) ?>");
		<?php if ($patient_ot_delivery_register_grid->surgeryStarted->Required) { ?>
			elm = this.getElements("x" + infix + "_surgeryStarted");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->surgeryStarted->caption(), $patient_ot_delivery_register->surgeryStarted->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_surgeryStarted");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register->surgeryStarted->errorMessage()) ?>");
		<?php if ($patient_ot_delivery_register_grid->surgeryEnded->Required) { ?>
			elm = this.getElements("x" + infix + "_surgeryEnded");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->surgeryEnded->caption(), $patient_ot_delivery_register->surgeryEnded->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_surgeryEnded");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register->surgeryEnded->errorMessage()) ?>");
		<?php if ($patient_ot_delivery_register_grid->RecoveryTime->Required) { ?>
			elm = this.getElements("x" + infix + "_RecoveryTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->RecoveryTime->caption(), $patient_ot_delivery_register->RecoveryTime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RecoveryTime");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register->RecoveryTime->errorMessage()) ?>");
		<?php if ($patient_ot_delivery_register_grid->ShiftedTime->Required) { ?>
			elm = this.getElements("x" + infix + "_ShiftedTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->ShiftedTime->caption(), $patient_ot_delivery_register->ShiftedTime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ShiftedTime");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register->ShiftedTime->errorMessage()) ?>");
		<?php if ($patient_ot_delivery_register_grid->Duration->Required) { ?>
			elm = this.getElements("x" + infix + "_Duration");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->Duration->caption(), $patient_ot_delivery_register->Duration->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_grid->Surgeon->Required) { ?>
			elm = this.getElements("x" + infix + "_Surgeon");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->Surgeon->caption(), $patient_ot_delivery_register->Surgeon->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_grid->Anaesthetist->Required) { ?>
			elm = this.getElements("x" + infix + "_Anaesthetist");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->Anaesthetist->caption(), $patient_ot_delivery_register->Anaesthetist->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_grid->AsstSurgeon1->Required) { ?>
			elm = this.getElements("x" + infix + "_AsstSurgeon1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->AsstSurgeon1->caption(), $patient_ot_delivery_register->AsstSurgeon1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_grid->AsstSurgeon2->Required) { ?>
			elm = this.getElements("x" + infix + "_AsstSurgeon2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->AsstSurgeon2->caption(), $patient_ot_delivery_register->AsstSurgeon2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_grid->paediatric->Required) { ?>
			elm = this.getElements("x" + infix + "_paediatric");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->paediatric->caption(), $patient_ot_delivery_register->paediatric->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_grid->ScrubNurse1->Required) { ?>
			elm = this.getElements("x" + infix + "_ScrubNurse1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->ScrubNurse1->caption(), $patient_ot_delivery_register->ScrubNurse1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_grid->ScrubNurse2->Required) { ?>
			elm = this.getElements("x" + infix + "_ScrubNurse2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->ScrubNurse2->caption(), $patient_ot_delivery_register->ScrubNurse2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_grid->FloorNurse->Required) { ?>
			elm = this.getElements("x" + infix + "_FloorNurse");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->FloorNurse->caption(), $patient_ot_delivery_register->FloorNurse->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_grid->Technician->Required) { ?>
			elm = this.getElements("x" + infix + "_Technician");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->Technician->caption(), $patient_ot_delivery_register->Technician->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_grid->HouseKeeping->Required) { ?>
			elm = this.getElements("x" + infix + "_HouseKeeping");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->HouseKeeping->caption(), $patient_ot_delivery_register->HouseKeeping->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_grid->countsCheckedMops->Required) { ?>
			elm = this.getElements("x" + infix + "_countsCheckedMops");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->countsCheckedMops->caption(), $patient_ot_delivery_register->countsCheckedMops->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_grid->gauze->Required) { ?>
			elm = this.getElements("x" + infix + "_gauze");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->gauze->caption(), $patient_ot_delivery_register->gauze->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_grid->needles->Required) { ?>
			elm = this.getElements("x" + infix + "_needles");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->needles->caption(), $patient_ot_delivery_register->needles->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_grid->bloodloss->Required) { ?>
			elm = this.getElements("x" + infix + "_bloodloss");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->bloodloss->caption(), $patient_ot_delivery_register->bloodloss->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_grid->bloodtransfusion->Required) { ?>
			elm = this.getElements("x" + infix + "_bloodtransfusion");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->bloodtransfusion->caption(), $patient_ot_delivery_register->bloodtransfusion->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_ot_delivery_register_grid->Reception->Required) { ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->Reception->caption(), $patient_ot_delivery_register->Reception->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register->Reception->errorMessage()) ?>");
		<?php if ($patient_ot_delivery_register_grid->PId->Required) { ?>
			elm = this.getElements("x" + infix + "_PId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register->PId->caption(), $patient_ot_delivery_register->PId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register->PId->errorMessage()) ?>");

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
fpatient_ot_delivery_registergrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "PatID", false)) return false;
	if (ew.valueChanged(fobj, infix, "PatientName", false)) return false;
	if (ew.valueChanged(fobj, infix, "mrnno", false)) return false;
	if (ew.valueChanged(fobj, infix, "MobileNumber", false)) return false;
	if (ew.valueChanged(fobj, infix, "Age", false)) return false;
	if (ew.valueChanged(fobj, infix, "Gender", false)) return false;
	if (ew.valueChanged(fobj, infix, "ObstetricsHistryFeMale", false)) return false;
	if (ew.valueChanged(fobj, infix, "Abortion", false)) return false;
	if (ew.valueChanged(fobj, infix, "ChildBirthDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "ChildBirthTime", false)) return false;
	if (ew.valueChanged(fobj, infix, "ChildSex", false)) return false;
	if (ew.valueChanged(fobj, infix, "ChildWt", false)) return false;
	if (ew.valueChanged(fobj, infix, "ChildDay", false)) return false;
	if (ew.valueChanged(fobj, infix, "ChildOE", false)) return false;
	if (ew.valueChanged(fobj, infix, "ChildBlGrp", false)) return false;
	if (ew.valueChanged(fobj, infix, "ApgarScore", false)) return false;
	if (ew.valueChanged(fobj, infix, "birthnotification", false)) return false;
	if (ew.valueChanged(fobj, infix, "formno", false)) return false;
	if (ew.valueChanged(fobj, infix, "dte", false)) return false;
	if (ew.valueChanged(fobj, infix, "motherReligion", false)) return false;
	if (ew.valueChanged(fobj, infix, "bloodgroup", false)) return false;
	if (ew.valueChanged(fobj, infix, "status", false)) return false;
	if (ew.valueChanged(fobj, infix, "createdby", false)) return false;
	if (ew.valueChanged(fobj, infix, "createddatetime", false)) return false;
	if (ew.valueChanged(fobj, infix, "modifiedby", false)) return false;
	if (ew.valueChanged(fobj, infix, "modifieddatetime", false)) return false;
	if (ew.valueChanged(fobj, infix, "PatientID", false)) return false;
	if (ew.valueChanged(fobj, infix, "ChildBirthDate1", false)) return false;
	if (ew.valueChanged(fobj, infix, "ChildBirthTime1", false)) return false;
	if (ew.valueChanged(fobj, infix, "ChildSex1", false)) return false;
	if (ew.valueChanged(fobj, infix, "ChildWt1", false)) return false;
	if (ew.valueChanged(fobj, infix, "ChildDay1", false)) return false;
	if (ew.valueChanged(fobj, infix, "ChildOE1", false)) return false;
	if (ew.valueChanged(fobj, infix, "ChildBlGrp1", false)) return false;
	if (ew.valueChanged(fobj, infix, "ApgarScore1", false)) return false;
	if (ew.valueChanged(fobj, infix, "birthnotification1", false)) return false;
	if (ew.valueChanged(fobj, infix, "formno1", false)) return false;
	if (ew.valueChanged(fobj, infix, "RecievedTime", false)) return false;
	if (ew.valueChanged(fobj, infix, "AnaesthesiaStarted", false)) return false;
	if (ew.valueChanged(fobj, infix, "AnaesthesiaEnded", false)) return false;
	if (ew.valueChanged(fobj, infix, "surgeryStarted", false)) return false;
	if (ew.valueChanged(fobj, infix, "surgeryEnded", false)) return false;
	if (ew.valueChanged(fobj, infix, "RecoveryTime", false)) return false;
	if (ew.valueChanged(fobj, infix, "ShiftedTime", false)) return false;
	if (ew.valueChanged(fobj, infix, "Duration", false)) return false;
	if (ew.valueChanged(fobj, infix, "Surgeon", false)) return false;
	if (ew.valueChanged(fobj, infix, "Anaesthetist", false)) return false;
	if (ew.valueChanged(fobj, infix, "AsstSurgeon1", false)) return false;
	if (ew.valueChanged(fobj, infix, "AsstSurgeon2", false)) return false;
	if (ew.valueChanged(fobj, infix, "paediatric", false)) return false;
	if (ew.valueChanged(fobj, infix, "ScrubNurse1", false)) return false;
	if (ew.valueChanged(fobj, infix, "ScrubNurse2", false)) return false;
	if (ew.valueChanged(fobj, infix, "FloorNurse", false)) return false;
	if (ew.valueChanged(fobj, infix, "Technician", false)) return false;
	if (ew.valueChanged(fobj, infix, "HouseKeeping", false)) return false;
	if (ew.valueChanged(fobj, infix, "countsCheckedMops", false)) return false;
	if (ew.valueChanged(fobj, infix, "gauze", false)) return false;
	if (ew.valueChanged(fobj, infix, "needles", false)) return false;
	if (ew.valueChanged(fobj, infix, "bloodloss", false)) return false;
	if (ew.valueChanged(fobj, infix, "bloodtransfusion", false)) return false;
	if (ew.valueChanged(fobj, infix, "Reception", false)) return false;
	if (ew.valueChanged(fobj, infix, "PId", false)) return false;
	return true;
}

// Form_CustomValidate event
fpatient_ot_delivery_registergrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_ot_delivery_registergrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_ot_delivery_registergrid.lists["x_Surgeon"] = <?php echo $patient_ot_delivery_register_grid->Surgeon->Lookup->toClientList() ?>;
fpatient_ot_delivery_registergrid.lists["x_Surgeon"].options = <?php echo JsonEncode($patient_ot_delivery_register_grid->Surgeon->lookupOptions()) ?>;
fpatient_ot_delivery_registergrid.autoSuggests["x_Surgeon"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_ot_delivery_registergrid.lists["x_Anaesthetist"] = <?php echo $patient_ot_delivery_register_grid->Anaesthetist->Lookup->toClientList() ?>;
fpatient_ot_delivery_registergrid.lists["x_Anaesthetist"].options = <?php echo JsonEncode($patient_ot_delivery_register_grid->Anaesthetist->lookupOptions()) ?>;
fpatient_ot_delivery_registergrid.autoSuggests["x_Anaesthetist"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_ot_delivery_registergrid.lists["x_AsstSurgeon1"] = <?php echo $patient_ot_delivery_register_grid->AsstSurgeon1->Lookup->toClientList() ?>;
fpatient_ot_delivery_registergrid.lists["x_AsstSurgeon1"].options = <?php echo JsonEncode($patient_ot_delivery_register_grid->AsstSurgeon1->lookupOptions()) ?>;
fpatient_ot_delivery_registergrid.autoSuggests["x_AsstSurgeon1"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_ot_delivery_registergrid.lists["x_AsstSurgeon2"] = <?php echo $patient_ot_delivery_register_grid->AsstSurgeon2->Lookup->toClientList() ?>;
fpatient_ot_delivery_registergrid.lists["x_AsstSurgeon2"].options = <?php echo JsonEncode($patient_ot_delivery_register_grid->AsstSurgeon2->lookupOptions()) ?>;
fpatient_ot_delivery_registergrid.autoSuggests["x_AsstSurgeon2"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_ot_delivery_registergrid.lists["x_paediatric"] = <?php echo $patient_ot_delivery_register_grid->paediatric->Lookup->toClientList() ?>;
fpatient_ot_delivery_registergrid.lists["x_paediatric"].options = <?php echo JsonEncode($patient_ot_delivery_register_grid->paediatric->lookupOptions()) ?>;
fpatient_ot_delivery_registergrid.autoSuggests["x_paediatric"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$patient_ot_delivery_register_grid->renderOtherOptions();
?>
<?php $patient_ot_delivery_register_grid->showPageHeader(); ?>
<?php
$patient_ot_delivery_register_grid->showMessage();
?>
<?php if ($patient_ot_delivery_register_grid->TotalRecs > 0 || $patient_ot_delivery_register->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_ot_delivery_register_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_ot_delivery_register">
<?php if ($patient_ot_delivery_register_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $patient_ot_delivery_register_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpatient_ot_delivery_registergrid" class="ew-form ew-list-form form-inline">
<div id="gmp_patient_ot_delivery_register" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_patient_ot_delivery_registergrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_ot_delivery_register_grid->RowType = ROWTYPE_HEADER;

// Render list options
$patient_ot_delivery_register_grid->renderListOptions();

// Render list options (header, left)
$patient_ot_delivery_register_grid->ListOptions->render("header", "left");
?>
<?php if ($patient_ot_delivery_register->id->Visible) { // id ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_ot_delivery_register->id->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_id" class="patient_ot_delivery_register_id"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_ot_delivery_register->id->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_id" class="patient_ot_delivery_register_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->PatID->Visible) { // PatID ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $patient_ot_delivery_register->PatID->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_PatID" class="patient_ot_delivery_register_PatID"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->PatID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $patient_ot_delivery_register->PatID->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_PatID" class="patient_ot_delivery_register_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->PatID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->PatID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $patient_ot_delivery_register->PatientName->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_PatientName" class="patient_ot_delivery_register_PatientName"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $patient_ot_delivery_register->PatientName->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_PatientName" class="patient_ot_delivery_register_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $patient_ot_delivery_register->mrnno->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_mrnno" class="patient_ot_delivery_register_mrnno"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $patient_ot_delivery_register->mrnno->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_mrnno" class="patient_ot_delivery_register_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->mrnno->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->mrnno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->mrnno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->MobileNumber) == "") { ?>
		<th data-name="MobileNumber" class="<?php echo $patient_ot_delivery_register->MobileNumber->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_MobileNumber" class="patient_ot_delivery_register_MobileNumber"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->MobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MobileNumber" class="<?php echo $patient_ot_delivery_register->MobileNumber->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_MobileNumber" class="patient_ot_delivery_register_MobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->MobileNumber->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->MobileNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->MobileNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->Age->Visible) { // Age ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $patient_ot_delivery_register->Age->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_Age" class="patient_ot_delivery_register_Age"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $patient_ot_delivery_register->Age->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_Age" class="patient_ot_delivery_register_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->Age->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->Gender->Visible) { // Gender ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $patient_ot_delivery_register->Gender->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_Gender" class="patient_ot_delivery_register_Gender"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $patient_ot_delivery_register->Gender->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_Gender" class="patient_ot_delivery_register_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->Gender->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->Gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->Gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ObstetricsHistryFeMale->Visible) { // ObstetricsHistryFeMale ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->ObstetricsHistryFeMale) == "") { ?>
		<th data-name="ObstetricsHistryFeMale" class="<?php echo $patient_ot_delivery_register->ObstetricsHistryFeMale->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ObstetricsHistryFeMale" class="patient_ot_delivery_register_ObstetricsHistryFeMale"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ObstetricsHistryFeMale->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ObstetricsHistryFeMale" class="<?php echo $patient_ot_delivery_register->ObstetricsHistryFeMale->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_ObstetricsHistryFeMale" class="patient_ot_delivery_register_ObstetricsHistryFeMale">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ObstetricsHistryFeMale->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->ObstetricsHistryFeMale->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->ObstetricsHistryFeMale->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->Abortion->Visible) { // Abortion ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->Abortion) == "") { ?>
		<th data-name="Abortion" class="<?php echo $patient_ot_delivery_register->Abortion->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_Abortion" class="patient_ot_delivery_register_Abortion"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->Abortion->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Abortion" class="<?php echo $patient_ot_delivery_register->Abortion->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_Abortion" class="patient_ot_delivery_register_Abortion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->Abortion->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->Abortion->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->Abortion->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildBirthDate->Visible) { // ChildBirthDate ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->ChildBirthDate) == "") { ?>
		<th data-name="ChildBirthDate" class="<?php echo $patient_ot_delivery_register->ChildBirthDate->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildBirthDate" class="patient_ot_delivery_register_ChildBirthDate"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildBirthDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildBirthDate" class="<?php echo $patient_ot_delivery_register->ChildBirthDate->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_ChildBirthDate" class="patient_ot_delivery_register_ChildBirthDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildBirthDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->ChildBirthDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->ChildBirthDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildBirthTime->Visible) { // ChildBirthTime ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->ChildBirthTime) == "") { ?>
		<th data-name="ChildBirthTime" class="<?php echo $patient_ot_delivery_register->ChildBirthTime->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildBirthTime" class="patient_ot_delivery_register_ChildBirthTime"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildBirthTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildBirthTime" class="<?php echo $patient_ot_delivery_register->ChildBirthTime->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_ChildBirthTime" class="patient_ot_delivery_register_ChildBirthTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildBirthTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->ChildBirthTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->ChildBirthTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildSex->Visible) { // ChildSex ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->ChildSex) == "") { ?>
		<th data-name="ChildSex" class="<?php echo $patient_ot_delivery_register->ChildSex->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildSex" class="patient_ot_delivery_register_ChildSex"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildSex->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildSex" class="<?php echo $patient_ot_delivery_register->ChildSex->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_ChildSex" class="patient_ot_delivery_register_ChildSex">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildSex->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->ChildSex->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->ChildSex->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildWt->Visible) { // ChildWt ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->ChildWt) == "") { ?>
		<th data-name="ChildWt" class="<?php echo $patient_ot_delivery_register->ChildWt->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildWt" class="patient_ot_delivery_register_ChildWt"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildWt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildWt" class="<?php echo $patient_ot_delivery_register->ChildWt->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_ChildWt" class="patient_ot_delivery_register_ChildWt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildWt->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->ChildWt->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->ChildWt->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildDay->Visible) { // ChildDay ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->ChildDay) == "") { ?>
		<th data-name="ChildDay" class="<?php echo $patient_ot_delivery_register->ChildDay->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildDay" class="patient_ot_delivery_register_ChildDay"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildDay->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildDay" class="<?php echo $patient_ot_delivery_register->ChildDay->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_ChildDay" class="patient_ot_delivery_register_ChildDay">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildDay->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->ChildDay->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->ChildDay->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildOE->Visible) { // ChildOE ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->ChildOE) == "") { ?>
		<th data-name="ChildOE" class="<?php echo $patient_ot_delivery_register->ChildOE->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildOE" class="patient_ot_delivery_register_ChildOE"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildOE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildOE" class="<?php echo $patient_ot_delivery_register->ChildOE->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_ChildOE" class="patient_ot_delivery_register_ChildOE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildOE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->ChildOE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->ChildOE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildBlGrp->Visible) { // ChildBlGrp ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->ChildBlGrp) == "") { ?>
		<th data-name="ChildBlGrp" class="<?php echo $patient_ot_delivery_register->ChildBlGrp->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildBlGrp" class="patient_ot_delivery_register_ChildBlGrp"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildBlGrp->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildBlGrp" class="<?php echo $patient_ot_delivery_register->ChildBlGrp->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_ChildBlGrp" class="patient_ot_delivery_register_ChildBlGrp">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildBlGrp->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->ChildBlGrp->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->ChildBlGrp->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ApgarScore->Visible) { // ApgarScore ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->ApgarScore) == "") { ?>
		<th data-name="ApgarScore" class="<?php echo $patient_ot_delivery_register->ApgarScore->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ApgarScore" class="patient_ot_delivery_register_ApgarScore"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ApgarScore->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ApgarScore" class="<?php echo $patient_ot_delivery_register->ApgarScore->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_ApgarScore" class="patient_ot_delivery_register_ApgarScore">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ApgarScore->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->ApgarScore->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->ApgarScore->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->birthnotification->Visible) { // birthnotification ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->birthnotification) == "") { ?>
		<th data-name="birthnotification" class="<?php echo $patient_ot_delivery_register->birthnotification->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_birthnotification" class="patient_ot_delivery_register_birthnotification"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->birthnotification->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="birthnotification" class="<?php echo $patient_ot_delivery_register->birthnotification->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_birthnotification" class="patient_ot_delivery_register_birthnotification">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->birthnotification->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->birthnotification->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->birthnotification->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->formno->Visible) { // formno ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->formno) == "") { ?>
		<th data-name="formno" class="<?php echo $patient_ot_delivery_register->formno->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_formno" class="patient_ot_delivery_register_formno"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->formno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="formno" class="<?php echo $patient_ot_delivery_register->formno->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_formno" class="patient_ot_delivery_register_formno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->formno->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->formno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->formno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->dte->Visible) { // dte ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->dte) == "") { ?>
		<th data-name="dte" class="<?php echo $patient_ot_delivery_register->dte->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_dte" class="patient_ot_delivery_register_dte"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->dte->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="dte" class="<?php echo $patient_ot_delivery_register->dte->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_dte" class="patient_ot_delivery_register_dte">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->dte->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->dte->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->dte->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->motherReligion->Visible) { // motherReligion ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->motherReligion) == "") { ?>
		<th data-name="motherReligion" class="<?php echo $patient_ot_delivery_register->motherReligion->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_motherReligion" class="patient_ot_delivery_register_motherReligion"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->motherReligion->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="motherReligion" class="<?php echo $patient_ot_delivery_register->motherReligion->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_motherReligion" class="patient_ot_delivery_register_motherReligion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->motherReligion->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->motherReligion->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->motherReligion->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->bloodgroup->Visible) { // bloodgroup ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->bloodgroup) == "") { ?>
		<th data-name="bloodgroup" class="<?php echo $patient_ot_delivery_register->bloodgroup->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_bloodgroup" class="patient_ot_delivery_register_bloodgroup"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->bloodgroup->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bloodgroup" class="<?php echo $patient_ot_delivery_register->bloodgroup->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_bloodgroup" class="patient_ot_delivery_register_bloodgroup">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->bloodgroup->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->bloodgroup->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->bloodgroup->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->status->Visible) { // status ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->status) == "") { ?>
		<th data-name="status" class="<?php echo $patient_ot_delivery_register->status->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_status" class="patient_ot_delivery_register_status"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $patient_ot_delivery_register->status->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_status" class="patient_ot_delivery_register_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->createdby->Visible) { // createdby ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $patient_ot_delivery_register->createdby->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_createdby" class="patient_ot_delivery_register_createdby"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $patient_ot_delivery_register->createdby->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_createdby" class="patient_ot_delivery_register_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->createddatetime->Visible) { // createddatetime ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $patient_ot_delivery_register->createddatetime->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_createddatetime" class="patient_ot_delivery_register_createddatetime"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $patient_ot_delivery_register->createddatetime->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_createddatetime" class="patient_ot_delivery_register_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->modifiedby->Visible) { // modifiedby ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $patient_ot_delivery_register->modifiedby->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_modifiedby" class="patient_ot_delivery_register_modifiedby"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $patient_ot_delivery_register->modifiedby->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_modifiedby" class="patient_ot_delivery_register_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $patient_ot_delivery_register->modifieddatetime->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_modifieddatetime" class="patient_ot_delivery_register_modifieddatetime"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $patient_ot_delivery_register->modifieddatetime->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_modifieddatetime" class="patient_ot_delivery_register_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->PatientID->Visible) { // PatientID ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $patient_ot_delivery_register->PatientID->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_PatientID" class="patient_ot_delivery_register_PatientID"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $patient_ot_delivery_register->PatientID->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_PatientID" class="patient_ot_delivery_register_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->PatientID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->PatientID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->PatientID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->HospID->Visible) { // HospID ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $patient_ot_delivery_register->HospID->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_HospID" class="patient_ot_delivery_register_HospID"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $patient_ot_delivery_register->HospID->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_HospID" class="patient_ot_delivery_register_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildBirthDate1->Visible) { // ChildBirthDate1 ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->ChildBirthDate1) == "") { ?>
		<th data-name="ChildBirthDate1" class="<?php echo $patient_ot_delivery_register->ChildBirthDate1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildBirthDate1" class="patient_ot_delivery_register_ChildBirthDate1"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildBirthDate1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildBirthDate1" class="<?php echo $patient_ot_delivery_register->ChildBirthDate1->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_ChildBirthDate1" class="patient_ot_delivery_register_ChildBirthDate1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildBirthDate1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->ChildBirthDate1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->ChildBirthDate1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildBirthTime1->Visible) { // ChildBirthTime1 ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->ChildBirthTime1) == "") { ?>
		<th data-name="ChildBirthTime1" class="<?php echo $patient_ot_delivery_register->ChildBirthTime1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildBirthTime1" class="patient_ot_delivery_register_ChildBirthTime1"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildBirthTime1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildBirthTime1" class="<?php echo $patient_ot_delivery_register->ChildBirthTime1->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_ChildBirthTime1" class="patient_ot_delivery_register_ChildBirthTime1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildBirthTime1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->ChildBirthTime1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->ChildBirthTime1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildSex1->Visible) { // ChildSex1 ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->ChildSex1) == "") { ?>
		<th data-name="ChildSex1" class="<?php echo $patient_ot_delivery_register->ChildSex1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildSex1" class="patient_ot_delivery_register_ChildSex1"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildSex1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildSex1" class="<?php echo $patient_ot_delivery_register->ChildSex1->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_ChildSex1" class="patient_ot_delivery_register_ChildSex1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildSex1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->ChildSex1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->ChildSex1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildWt1->Visible) { // ChildWt1 ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->ChildWt1) == "") { ?>
		<th data-name="ChildWt1" class="<?php echo $patient_ot_delivery_register->ChildWt1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildWt1" class="patient_ot_delivery_register_ChildWt1"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildWt1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildWt1" class="<?php echo $patient_ot_delivery_register->ChildWt1->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_ChildWt1" class="patient_ot_delivery_register_ChildWt1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildWt1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->ChildWt1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->ChildWt1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildDay1->Visible) { // ChildDay1 ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->ChildDay1) == "") { ?>
		<th data-name="ChildDay1" class="<?php echo $patient_ot_delivery_register->ChildDay1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildDay1" class="patient_ot_delivery_register_ChildDay1"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildDay1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildDay1" class="<?php echo $patient_ot_delivery_register->ChildDay1->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_ChildDay1" class="patient_ot_delivery_register_ChildDay1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildDay1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->ChildDay1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->ChildDay1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildOE1->Visible) { // ChildOE1 ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->ChildOE1) == "") { ?>
		<th data-name="ChildOE1" class="<?php echo $patient_ot_delivery_register->ChildOE1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildOE1" class="patient_ot_delivery_register_ChildOE1"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildOE1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildOE1" class="<?php echo $patient_ot_delivery_register->ChildOE1->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_ChildOE1" class="patient_ot_delivery_register_ChildOE1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildOE1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->ChildOE1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->ChildOE1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildBlGrp1->Visible) { // ChildBlGrp1 ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->ChildBlGrp1) == "") { ?>
		<th data-name="ChildBlGrp1" class="<?php echo $patient_ot_delivery_register->ChildBlGrp1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildBlGrp1" class="patient_ot_delivery_register_ChildBlGrp1"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildBlGrp1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildBlGrp1" class="<?php echo $patient_ot_delivery_register->ChildBlGrp1->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_ChildBlGrp1" class="patient_ot_delivery_register_ChildBlGrp1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildBlGrp1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->ChildBlGrp1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->ChildBlGrp1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ApgarScore1->Visible) { // ApgarScore1 ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->ApgarScore1) == "") { ?>
		<th data-name="ApgarScore1" class="<?php echo $patient_ot_delivery_register->ApgarScore1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ApgarScore1" class="patient_ot_delivery_register_ApgarScore1"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ApgarScore1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ApgarScore1" class="<?php echo $patient_ot_delivery_register->ApgarScore1->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_ApgarScore1" class="patient_ot_delivery_register_ApgarScore1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ApgarScore1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->ApgarScore1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->ApgarScore1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->birthnotification1->Visible) { // birthnotification1 ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->birthnotification1) == "") { ?>
		<th data-name="birthnotification1" class="<?php echo $patient_ot_delivery_register->birthnotification1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_birthnotification1" class="patient_ot_delivery_register_birthnotification1"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->birthnotification1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="birthnotification1" class="<?php echo $patient_ot_delivery_register->birthnotification1->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_birthnotification1" class="patient_ot_delivery_register_birthnotification1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->birthnotification1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->birthnotification1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->birthnotification1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->formno1->Visible) { // formno1 ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->formno1) == "") { ?>
		<th data-name="formno1" class="<?php echo $patient_ot_delivery_register->formno1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_formno1" class="patient_ot_delivery_register_formno1"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->formno1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="formno1" class="<?php echo $patient_ot_delivery_register->formno1->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_formno1" class="patient_ot_delivery_register_formno1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->formno1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->formno1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->formno1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->RecievedTime->Visible) { // RecievedTime ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->RecievedTime) == "") { ?>
		<th data-name="RecievedTime" class="<?php echo $patient_ot_delivery_register->RecievedTime->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_RecievedTime" class="patient_ot_delivery_register_RecievedTime"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->RecievedTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RecievedTime" class="<?php echo $patient_ot_delivery_register->RecievedTime->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_RecievedTime" class="patient_ot_delivery_register_RecievedTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->RecievedTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->RecievedTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->RecievedTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->AnaesthesiaStarted->Visible) { // AnaesthesiaStarted ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->AnaesthesiaStarted) == "") { ?>
		<th data-name="AnaesthesiaStarted" class="<?php echo $patient_ot_delivery_register->AnaesthesiaStarted->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_AnaesthesiaStarted" class="patient_ot_delivery_register_AnaesthesiaStarted"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->AnaesthesiaStarted->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnaesthesiaStarted" class="<?php echo $patient_ot_delivery_register->AnaesthesiaStarted->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_AnaesthesiaStarted" class="patient_ot_delivery_register_AnaesthesiaStarted">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->AnaesthesiaStarted->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->AnaesthesiaStarted->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->AnaesthesiaStarted->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->AnaesthesiaEnded->Visible) { // AnaesthesiaEnded ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->AnaesthesiaEnded) == "") { ?>
		<th data-name="AnaesthesiaEnded" class="<?php echo $patient_ot_delivery_register->AnaesthesiaEnded->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_AnaesthesiaEnded" class="patient_ot_delivery_register_AnaesthesiaEnded"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->AnaesthesiaEnded->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnaesthesiaEnded" class="<?php echo $patient_ot_delivery_register->AnaesthesiaEnded->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_AnaesthesiaEnded" class="patient_ot_delivery_register_AnaesthesiaEnded">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->AnaesthesiaEnded->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->AnaesthesiaEnded->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->AnaesthesiaEnded->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->surgeryStarted->Visible) { // surgeryStarted ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->surgeryStarted) == "") { ?>
		<th data-name="surgeryStarted" class="<?php echo $patient_ot_delivery_register->surgeryStarted->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_surgeryStarted" class="patient_ot_delivery_register_surgeryStarted"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->surgeryStarted->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="surgeryStarted" class="<?php echo $patient_ot_delivery_register->surgeryStarted->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_surgeryStarted" class="patient_ot_delivery_register_surgeryStarted">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->surgeryStarted->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->surgeryStarted->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->surgeryStarted->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->surgeryEnded->Visible) { // surgeryEnded ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->surgeryEnded) == "") { ?>
		<th data-name="surgeryEnded" class="<?php echo $patient_ot_delivery_register->surgeryEnded->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_surgeryEnded" class="patient_ot_delivery_register_surgeryEnded"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->surgeryEnded->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="surgeryEnded" class="<?php echo $patient_ot_delivery_register->surgeryEnded->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_surgeryEnded" class="patient_ot_delivery_register_surgeryEnded">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->surgeryEnded->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->surgeryEnded->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->surgeryEnded->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->RecoveryTime->Visible) { // RecoveryTime ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->RecoveryTime) == "") { ?>
		<th data-name="RecoveryTime" class="<?php echo $patient_ot_delivery_register->RecoveryTime->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_RecoveryTime" class="patient_ot_delivery_register_RecoveryTime"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->RecoveryTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RecoveryTime" class="<?php echo $patient_ot_delivery_register->RecoveryTime->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_RecoveryTime" class="patient_ot_delivery_register_RecoveryTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->RecoveryTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->RecoveryTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->RecoveryTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ShiftedTime->Visible) { // ShiftedTime ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->ShiftedTime) == "") { ?>
		<th data-name="ShiftedTime" class="<?php echo $patient_ot_delivery_register->ShiftedTime->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ShiftedTime" class="patient_ot_delivery_register_ShiftedTime"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ShiftedTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ShiftedTime" class="<?php echo $patient_ot_delivery_register->ShiftedTime->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_ShiftedTime" class="patient_ot_delivery_register_ShiftedTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ShiftedTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->ShiftedTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->ShiftedTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->Duration->Visible) { // Duration ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->Duration) == "") { ?>
		<th data-name="Duration" class="<?php echo $patient_ot_delivery_register->Duration->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_Duration" class="patient_ot_delivery_register_Duration"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->Duration->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Duration" class="<?php echo $patient_ot_delivery_register->Duration->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_Duration" class="patient_ot_delivery_register_Duration">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->Duration->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->Duration->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->Duration->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->Surgeon->Visible) { // Surgeon ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->Surgeon) == "") { ?>
		<th data-name="Surgeon" class="<?php echo $patient_ot_delivery_register->Surgeon->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_Surgeon" class="patient_ot_delivery_register_Surgeon"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->Surgeon->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Surgeon" class="<?php echo $patient_ot_delivery_register->Surgeon->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_Surgeon" class="patient_ot_delivery_register_Surgeon">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->Surgeon->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->Surgeon->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->Surgeon->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->Anaesthetist->Visible) { // Anaesthetist ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->Anaesthetist) == "") { ?>
		<th data-name="Anaesthetist" class="<?php echo $patient_ot_delivery_register->Anaesthetist->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_Anaesthetist" class="patient_ot_delivery_register_Anaesthetist"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->Anaesthetist->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Anaesthetist" class="<?php echo $patient_ot_delivery_register->Anaesthetist->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_Anaesthetist" class="patient_ot_delivery_register_Anaesthetist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->Anaesthetist->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->Anaesthetist->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->Anaesthetist->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->AsstSurgeon1->Visible) { // AsstSurgeon1 ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->AsstSurgeon1) == "") { ?>
		<th data-name="AsstSurgeon1" class="<?php echo $patient_ot_delivery_register->AsstSurgeon1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_AsstSurgeon1" class="patient_ot_delivery_register_AsstSurgeon1"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->AsstSurgeon1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AsstSurgeon1" class="<?php echo $patient_ot_delivery_register->AsstSurgeon1->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_AsstSurgeon1" class="patient_ot_delivery_register_AsstSurgeon1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->AsstSurgeon1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->AsstSurgeon1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->AsstSurgeon1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->AsstSurgeon2->Visible) { // AsstSurgeon2 ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->AsstSurgeon2) == "") { ?>
		<th data-name="AsstSurgeon2" class="<?php echo $patient_ot_delivery_register->AsstSurgeon2->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_AsstSurgeon2" class="patient_ot_delivery_register_AsstSurgeon2"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->AsstSurgeon2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AsstSurgeon2" class="<?php echo $patient_ot_delivery_register->AsstSurgeon2->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_AsstSurgeon2" class="patient_ot_delivery_register_AsstSurgeon2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->AsstSurgeon2->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->AsstSurgeon2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->AsstSurgeon2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->paediatric->Visible) { // paediatric ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->paediatric) == "") { ?>
		<th data-name="paediatric" class="<?php echo $patient_ot_delivery_register->paediatric->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_paediatric" class="patient_ot_delivery_register_paediatric"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->paediatric->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="paediatric" class="<?php echo $patient_ot_delivery_register->paediatric->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_paediatric" class="patient_ot_delivery_register_paediatric">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->paediatric->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->paediatric->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->paediatric->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ScrubNurse1->Visible) { // ScrubNurse1 ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->ScrubNurse1) == "") { ?>
		<th data-name="ScrubNurse1" class="<?php echo $patient_ot_delivery_register->ScrubNurse1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ScrubNurse1" class="patient_ot_delivery_register_ScrubNurse1"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ScrubNurse1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ScrubNurse1" class="<?php echo $patient_ot_delivery_register->ScrubNurse1->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_ScrubNurse1" class="patient_ot_delivery_register_ScrubNurse1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ScrubNurse1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->ScrubNurse1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->ScrubNurse1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ScrubNurse2->Visible) { // ScrubNurse2 ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->ScrubNurse2) == "") { ?>
		<th data-name="ScrubNurse2" class="<?php echo $patient_ot_delivery_register->ScrubNurse2->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ScrubNurse2" class="patient_ot_delivery_register_ScrubNurse2"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ScrubNurse2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ScrubNurse2" class="<?php echo $patient_ot_delivery_register->ScrubNurse2->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_ScrubNurse2" class="patient_ot_delivery_register_ScrubNurse2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ScrubNurse2->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->ScrubNurse2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->ScrubNurse2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->FloorNurse->Visible) { // FloorNurse ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->FloorNurse) == "") { ?>
		<th data-name="FloorNurse" class="<?php echo $patient_ot_delivery_register->FloorNurse->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_FloorNurse" class="patient_ot_delivery_register_FloorNurse"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->FloorNurse->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FloorNurse" class="<?php echo $patient_ot_delivery_register->FloorNurse->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_FloorNurse" class="patient_ot_delivery_register_FloorNurse">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->FloorNurse->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->FloorNurse->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->FloorNurse->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->Technician->Visible) { // Technician ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->Technician) == "") { ?>
		<th data-name="Technician" class="<?php echo $patient_ot_delivery_register->Technician->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_Technician" class="patient_ot_delivery_register_Technician"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->Technician->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Technician" class="<?php echo $patient_ot_delivery_register->Technician->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_Technician" class="patient_ot_delivery_register_Technician">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->Technician->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->Technician->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->Technician->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->HouseKeeping->Visible) { // HouseKeeping ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->HouseKeeping) == "") { ?>
		<th data-name="HouseKeeping" class="<?php echo $patient_ot_delivery_register->HouseKeeping->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_HouseKeeping" class="patient_ot_delivery_register_HouseKeeping"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->HouseKeeping->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HouseKeeping" class="<?php echo $patient_ot_delivery_register->HouseKeeping->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_HouseKeeping" class="patient_ot_delivery_register_HouseKeeping">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->HouseKeeping->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->HouseKeeping->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->HouseKeeping->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->countsCheckedMops->Visible) { // countsCheckedMops ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->countsCheckedMops) == "") { ?>
		<th data-name="countsCheckedMops" class="<?php echo $patient_ot_delivery_register->countsCheckedMops->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_countsCheckedMops" class="patient_ot_delivery_register_countsCheckedMops"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->countsCheckedMops->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="countsCheckedMops" class="<?php echo $patient_ot_delivery_register->countsCheckedMops->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_countsCheckedMops" class="patient_ot_delivery_register_countsCheckedMops">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->countsCheckedMops->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->countsCheckedMops->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->countsCheckedMops->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->gauze->Visible) { // gauze ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->gauze) == "") { ?>
		<th data-name="gauze" class="<?php echo $patient_ot_delivery_register->gauze->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_gauze" class="patient_ot_delivery_register_gauze"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->gauze->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="gauze" class="<?php echo $patient_ot_delivery_register->gauze->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_gauze" class="patient_ot_delivery_register_gauze">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->gauze->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->gauze->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->gauze->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->needles->Visible) { // needles ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->needles) == "") { ?>
		<th data-name="needles" class="<?php echo $patient_ot_delivery_register->needles->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_needles" class="patient_ot_delivery_register_needles"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->needles->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="needles" class="<?php echo $patient_ot_delivery_register->needles->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_needles" class="patient_ot_delivery_register_needles">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->needles->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->needles->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->needles->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->bloodloss->Visible) { // bloodloss ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->bloodloss) == "") { ?>
		<th data-name="bloodloss" class="<?php echo $patient_ot_delivery_register->bloodloss->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_bloodloss" class="patient_ot_delivery_register_bloodloss"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->bloodloss->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bloodloss" class="<?php echo $patient_ot_delivery_register->bloodloss->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_bloodloss" class="patient_ot_delivery_register_bloodloss">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->bloodloss->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->bloodloss->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->bloodloss->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->bloodtransfusion->Visible) { // bloodtransfusion ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->bloodtransfusion) == "") { ?>
		<th data-name="bloodtransfusion" class="<?php echo $patient_ot_delivery_register->bloodtransfusion->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_bloodtransfusion" class="patient_ot_delivery_register_bloodtransfusion"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->bloodtransfusion->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bloodtransfusion" class="<?php echo $patient_ot_delivery_register->bloodtransfusion->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_bloodtransfusion" class="patient_ot_delivery_register_bloodtransfusion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->bloodtransfusion->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->bloodtransfusion->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->bloodtransfusion->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->Reception->Visible) { // Reception ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $patient_ot_delivery_register->Reception->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_Reception" class="patient_ot_delivery_register_Reception"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $patient_ot_delivery_register->Reception->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_Reception" class="patient_ot_delivery_register_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->Reception->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->Reception->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->PId->Visible) { // PId ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->PId) == "") { ?>
		<th data-name="PId" class="<?php echo $patient_ot_delivery_register->PId->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_PId" class="patient_ot_delivery_register_PId"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->PId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PId" class="<?php echo $patient_ot_delivery_register->PId->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_PId" class="patient_ot_delivery_register_PId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->PId->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->PId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->PId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_ot_delivery_register_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$patient_ot_delivery_register_grid->StartRec = 1;
$patient_ot_delivery_register_grid->StopRec = $patient_ot_delivery_register_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $patient_ot_delivery_register_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($patient_ot_delivery_register_grid->FormKeyCountName) && ($patient_ot_delivery_register->isGridAdd() || $patient_ot_delivery_register->isGridEdit() || $patient_ot_delivery_register->isConfirm())) {
		$patient_ot_delivery_register_grid->KeyCount = $CurrentForm->getValue($patient_ot_delivery_register_grid->FormKeyCountName);
		$patient_ot_delivery_register_grid->StopRec = $patient_ot_delivery_register_grid->StartRec + $patient_ot_delivery_register_grid->KeyCount - 1;
	}
}
$patient_ot_delivery_register_grid->RecCnt = $patient_ot_delivery_register_grid->StartRec - 1;
if ($patient_ot_delivery_register_grid->Recordset && !$patient_ot_delivery_register_grid->Recordset->EOF) {
	$patient_ot_delivery_register_grid->Recordset->moveFirst();
	$selectLimit = $patient_ot_delivery_register_grid->UseSelectLimit;
	if (!$selectLimit && $patient_ot_delivery_register_grid->StartRec > 1)
		$patient_ot_delivery_register_grid->Recordset->move($patient_ot_delivery_register_grid->StartRec - 1);
} elseif (!$patient_ot_delivery_register->AllowAddDeleteRow && $patient_ot_delivery_register_grid->StopRec == 0) {
	$patient_ot_delivery_register_grid->StopRec = $patient_ot_delivery_register->GridAddRowCount;
}

// Initialize aggregate
$patient_ot_delivery_register->RowType = ROWTYPE_AGGREGATEINIT;
$patient_ot_delivery_register->resetAttributes();
$patient_ot_delivery_register_grid->renderRow();
if ($patient_ot_delivery_register->isGridAdd())
	$patient_ot_delivery_register_grid->RowIndex = 0;
if ($patient_ot_delivery_register->isGridEdit())
	$patient_ot_delivery_register_grid->RowIndex = 0;
while ($patient_ot_delivery_register_grid->RecCnt < $patient_ot_delivery_register_grid->StopRec) {
	$patient_ot_delivery_register_grid->RecCnt++;
	if ($patient_ot_delivery_register_grid->RecCnt >= $patient_ot_delivery_register_grid->StartRec) {
		$patient_ot_delivery_register_grid->RowCnt++;
		if ($patient_ot_delivery_register->isGridAdd() || $patient_ot_delivery_register->isGridEdit() || $patient_ot_delivery_register->isConfirm()) {
			$patient_ot_delivery_register_grid->RowIndex++;
			$CurrentForm->Index = $patient_ot_delivery_register_grid->RowIndex;
			if ($CurrentForm->hasValue($patient_ot_delivery_register_grid->FormActionName) && $patient_ot_delivery_register_grid->EventCancelled)
				$patient_ot_delivery_register_grid->RowAction = strval($CurrentForm->getValue($patient_ot_delivery_register_grid->FormActionName));
			elseif ($patient_ot_delivery_register->isGridAdd())
				$patient_ot_delivery_register_grid->RowAction = "insert";
			else
				$patient_ot_delivery_register_grid->RowAction = "";
		}

		// Set up key count
		$patient_ot_delivery_register_grid->KeyCount = $patient_ot_delivery_register_grid->RowIndex;

		// Init row class and style
		$patient_ot_delivery_register->resetAttributes();
		$patient_ot_delivery_register->CssClass = "";
		if ($patient_ot_delivery_register->isGridAdd()) {
			if ($patient_ot_delivery_register->CurrentMode == "copy") {
				$patient_ot_delivery_register_grid->loadRowValues($patient_ot_delivery_register_grid->Recordset); // Load row values
				$patient_ot_delivery_register_grid->setRecordKey($patient_ot_delivery_register_grid->RowOldKey, $patient_ot_delivery_register_grid->Recordset); // Set old record key
			} else {
				$patient_ot_delivery_register_grid->loadRowValues(); // Load default values
				$patient_ot_delivery_register_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$patient_ot_delivery_register_grid->loadRowValues($patient_ot_delivery_register_grid->Recordset); // Load row values
		}
		$patient_ot_delivery_register->RowType = ROWTYPE_VIEW; // Render view
		if ($patient_ot_delivery_register->isGridAdd()) // Grid add
			$patient_ot_delivery_register->RowType = ROWTYPE_ADD; // Render add
		if ($patient_ot_delivery_register->isGridAdd() && $patient_ot_delivery_register->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$patient_ot_delivery_register_grid->restoreCurrentRowFormValues($patient_ot_delivery_register_grid->RowIndex); // Restore form values
		if ($patient_ot_delivery_register->isGridEdit()) { // Grid edit
			if ($patient_ot_delivery_register->EventCancelled)
				$patient_ot_delivery_register_grid->restoreCurrentRowFormValues($patient_ot_delivery_register_grid->RowIndex); // Restore form values
			if ($patient_ot_delivery_register_grid->RowAction == "insert")
				$patient_ot_delivery_register->RowType = ROWTYPE_ADD; // Render add
			else
				$patient_ot_delivery_register->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($patient_ot_delivery_register->isGridEdit() && ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT || $patient_ot_delivery_register->RowType == ROWTYPE_ADD) && $patient_ot_delivery_register->EventCancelled) // Update failed
			$patient_ot_delivery_register_grid->restoreCurrentRowFormValues($patient_ot_delivery_register_grid->RowIndex); // Restore form values
		if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) // Edit row
			$patient_ot_delivery_register_grid->EditRowCnt++;
		if ($patient_ot_delivery_register->isConfirm()) // Confirm row
			$patient_ot_delivery_register_grid->restoreCurrentRowFormValues($patient_ot_delivery_register_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$patient_ot_delivery_register->RowAttrs = array_merge($patient_ot_delivery_register->RowAttrs, array('data-rowindex'=>$patient_ot_delivery_register_grid->RowCnt, 'id'=>'r' . $patient_ot_delivery_register_grid->RowCnt . '_patient_ot_delivery_register', 'data-rowtype'=>$patient_ot_delivery_register->RowType));

		// Render row
		$patient_ot_delivery_register_grid->renderRow();

		// Render list options
		$patient_ot_delivery_register_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($patient_ot_delivery_register_grid->RowAction <> "delete" && $patient_ot_delivery_register_grid->RowAction <> "insertdelete" && !($patient_ot_delivery_register_grid->RowAction == "insert" && $patient_ot_delivery_register->isConfirm() && $patient_ot_delivery_register_grid->emptyRow())) {
?>
	<tr<?php echo $patient_ot_delivery_register->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_ot_delivery_register_grid->ListOptions->render("body", "left", $patient_ot_delivery_register_grid->RowCnt);
?>
	<?php if ($patient_ot_delivery_register->id->Visible) { // id ?>
		<td data-name="id"<?php echo $patient_ot_delivery_register->id->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_id" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_id" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_ot_delivery_register->id->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_id" class="form-group patient_ot_delivery_register_id">
<span<?php echo $patient_ot_delivery_register->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_id" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_id" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_ot_delivery_register->id->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_id" class="patient_ot_delivery_register_id">
<span<?php echo $patient_ot_delivery_register->id->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->id->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_id" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_id" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_ot_delivery_register->id->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_id" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_id" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_ot_delivery_register->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_id" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_id" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_ot_delivery_register->id->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_id" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_id" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_ot_delivery_register->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->PatID->Visible) { // PatID ?>
		<td data-name="PatID"<?php echo $patient_ot_delivery_register->PatID->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_PatID" class="form-group patient_ot_delivery_register_PatID">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_PatID" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatID" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->PatID->EditValue ?>"<?php echo $patient_ot_delivery_register->PatID->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatID" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatID" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_ot_delivery_register->PatID->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_PatID" class="form-group patient_ot_delivery_register_PatID">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_PatID" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatID" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->PatID->EditValue ?>"<?php echo $patient_ot_delivery_register->PatID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_PatID" class="patient_ot_delivery_register_PatID">
<span<?php echo $patient_ot_delivery_register->PatID->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->PatID->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatID" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatID" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_ot_delivery_register->PatID->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatID" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatID" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_ot_delivery_register->PatID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatID" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatID" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_ot_delivery_register->PatID->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatID" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatID" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_ot_delivery_register->PatID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $patient_ot_delivery_register->PatientName->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_PatientName" class="form-group patient_ot_delivery_register_PatientName">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_PatientName" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->PatientName->EditValue ?>"<?php echo $patient_ot_delivery_register->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatientName" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientName" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_ot_delivery_register->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_PatientName" class="form-group patient_ot_delivery_register_PatientName">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_PatientName" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->PatientName->EditValue ?>"<?php echo $patient_ot_delivery_register->PatientName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_PatientName" class="patient_ot_delivery_register_PatientName">
<span<?php echo $patient_ot_delivery_register->PatientName->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->PatientName->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatientName" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_ot_delivery_register->PatientName->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatientName" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientName" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_ot_delivery_register->PatientName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatientName" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientName" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_ot_delivery_register->PatientName->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatientName" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientName" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_ot_delivery_register->PatientName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno"<?php echo $patient_ot_delivery_register->mrnno->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_ot_delivery_register->mrnno->getSessionValue() <> "") { ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_mrnno" class="form-group patient_ot_delivery_register_mrnno">
<span<?php echo $patient_ot_delivery_register->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->mrnno->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_ot_delivery_register->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_mrnno" class="form-group patient_ot_delivery_register_mrnno">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_mrnno" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->mrnno->EditValue ?>"<?php echo $patient_ot_delivery_register->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_mrnno" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_ot_delivery_register->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($patient_ot_delivery_register->mrnno->getSessionValue() <> "") { ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_mrnno" class="form-group patient_ot_delivery_register_mrnno">
<span<?php echo $patient_ot_delivery_register->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->mrnno->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_ot_delivery_register->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_mrnno" class="form-group patient_ot_delivery_register_mrnno">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_mrnno" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->mrnno->EditValue ?>"<?php echo $patient_ot_delivery_register->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_mrnno" class="patient_ot_delivery_register_mrnno">
<span<?php echo $patient_ot_delivery_register->mrnno->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->mrnno->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_mrnno" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_ot_delivery_register->mrnno->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_mrnno" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_ot_delivery_register->mrnno->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_mrnno" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_ot_delivery_register->mrnno->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_mrnno" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_ot_delivery_register->mrnno->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber"<?php echo $patient_ot_delivery_register->MobileNumber->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_MobileNumber" class="form-group patient_ot_delivery_register_MobileNumber">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_MobileNumber" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->MobileNumber->EditValue ?>"<?php echo $patient_ot_delivery_register->MobileNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_MobileNumber" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_MobileNumber" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_ot_delivery_register->MobileNumber->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_MobileNumber" class="form-group patient_ot_delivery_register_MobileNumber">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_MobileNumber" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->MobileNumber->EditValue ?>"<?php echo $patient_ot_delivery_register->MobileNumber->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_MobileNumber" class="patient_ot_delivery_register_MobileNumber">
<span<?php echo $patient_ot_delivery_register->MobileNumber->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->MobileNumber->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_MobileNumber" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_ot_delivery_register->MobileNumber->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_MobileNumber" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_MobileNumber" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_ot_delivery_register->MobileNumber->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_MobileNumber" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_MobileNumber" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_ot_delivery_register->MobileNumber->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_MobileNumber" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_MobileNumber" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_ot_delivery_register->MobileNumber->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->Age->Visible) { // Age ?>
		<td data-name="Age"<?php echo $patient_ot_delivery_register->Age->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_Age" class="form-group patient_ot_delivery_register_Age">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_Age" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Age" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->Age->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->Age->EditValue ?>"<?php echo $patient_ot_delivery_register->Age->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Age" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Age" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_ot_delivery_register->Age->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_Age" class="form-group patient_ot_delivery_register_Age">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_Age" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Age" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->Age->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->Age->EditValue ?>"<?php echo $patient_ot_delivery_register->Age->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_Age" class="patient_ot_delivery_register_Age">
<span<?php echo $patient_ot_delivery_register->Age->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->Age->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Age" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Age" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_ot_delivery_register->Age->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Age" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Age" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_ot_delivery_register->Age->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Age" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Age" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_ot_delivery_register->Age->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Age" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Age" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_ot_delivery_register->Age->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->Gender->Visible) { // Gender ?>
		<td data-name="Gender"<?php echo $patient_ot_delivery_register->Gender->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_Gender" class="form-group patient_ot_delivery_register_Gender">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_Gender" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Gender" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->Gender->EditValue ?>"<?php echo $patient_ot_delivery_register->Gender->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Gender" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Gender" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_ot_delivery_register->Gender->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_Gender" class="form-group patient_ot_delivery_register_Gender">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_Gender" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Gender" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->Gender->EditValue ?>"<?php echo $patient_ot_delivery_register->Gender->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_Gender" class="patient_ot_delivery_register_Gender">
<span<?php echo $patient_ot_delivery_register->Gender->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->Gender->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Gender" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Gender" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_ot_delivery_register->Gender->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Gender" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Gender" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_ot_delivery_register->Gender->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Gender" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Gender" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_ot_delivery_register->Gender->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Gender" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Gender" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_ot_delivery_register->Gender->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ObstetricsHistryFeMale->Visible) { // ObstetricsHistryFeMale ?>
		<td data-name="ObstetricsHistryFeMale"<?php echo $patient_ot_delivery_register->ObstetricsHistryFeMale->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ObstetricsHistryFeMale" class="form-group patient_ot_delivery_register_ObstetricsHistryFeMale">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ObstetricsHistryFeMale" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ObstetricsHistryFeMale" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ObstetricsHistryFeMale" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ObstetricsHistryFeMale->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ObstetricsHistryFeMale->EditValue ?>"<?php echo $patient_ot_delivery_register->ObstetricsHistryFeMale->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ObstetricsHistryFeMale" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ObstetricsHistryFeMale" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ObstetricsHistryFeMale" value="<?php echo HtmlEncode($patient_ot_delivery_register->ObstetricsHistryFeMale->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ObstetricsHistryFeMale" class="form-group patient_ot_delivery_register_ObstetricsHistryFeMale">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ObstetricsHistryFeMale" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ObstetricsHistryFeMale" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ObstetricsHistryFeMale" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ObstetricsHistryFeMale->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ObstetricsHistryFeMale->EditValue ?>"<?php echo $patient_ot_delivery_register->ObstetricsHistryFeMale->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ObstetricsHistryFeMale" class="patient_ot_delivery_register_ObstetricsHistryFeMale">
<span<?php echo $patient_ot_delivery_register->ObstetricsHistryFeMale->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ObstetricsHistryFeMale->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ObstetricsHistryFeMale" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ObstetricsHistryFeMale" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ObstetricsHistryFeMale" value="<?php echo HtmlEncode($patient_ot_delivery_register->ObstetricsHistryFeMale->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ObstetricsHistryFeMale" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ObstetricsHistryFeMale" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ObstetricsHistryFeMale" value="<?php echo HtmlEncode($patient_ot_delivery_register->ObstetricsHistryFeMale->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ObstetricsHistryFeMale" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ObstetricsHistryFeMale" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ObstetricsHistryFeMale" value="<?php echo HtmlEncode($patient_ot_delivery_register->ObstetricsHistryFeMale->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ObstetricsHistryFeMale" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ObstetricsHistryFeMale" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ObstetricsHistryFeMale" value="<?php echo HtmlEncode($patient_ot_delivery_register->ObstetricsHistryFeMale->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->Abortion->Visible) { // Abortion ?>
		<td data-name="Abortion"<?php echo $patient_ot_delivery_register->Abortion->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_Abortion" class="form-group patient_ot_delivery_register_Abortion">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_Abortion" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Abortion" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Abortion" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->Abortion->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->Abortion->EditValue ?>"<?php echo $patient_ot_delivery_register->Abortion->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Abortion" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Abortion" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Abortion" value="<?php echo HtmlEncode($patient_ot_delivery_register->Abortion->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_Abortion" class="form-group patient_ot_delivery_register_Abortion">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_Abortion" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Abortion" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Abortion" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->Abortion->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->Abortion->EditValue ?>"<?php echo $patient_ot_delivery_register->Abortion->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_Abortion" class="patient_ot_delivery_register_Abortion">
<span<?php echo $patient_ot_delivery_register->Abortion->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->Abortion->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Abortion" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Abortion" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Abortion" value="<?php echo HtmlEncode($patient_ot_delivery_register->Abortion->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Abortion" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Abortion" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Abortion" value="<?php echo HtmlEncode($patient_ot_delivery_register->Abortion->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Abortion" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Abortion" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Abortion" value="<?php echo HtmlEncode($patient_ot_delivery_register->Abortion->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Abortion" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Abortion" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Abortion" value="<?php echo HtmlEncode($patient_ot_delivery_register->Abortion->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ChildBirthDate->Visible) { // ChildBirthDate ?>
		<td data-name="ChildBirthDate"<?php echo $patient_ot_delivery_register->ChildBirthDate->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ChildBirthDate" class="form-group patient_ot_delivery_register_ChildBirthDate">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate" data-format="7" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBirthDate->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildBirthDate->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildBirthDate->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->ChildBirthDate->ReadOnly && !$patient_ot_delivery_register->ChildBirthDate->Disabled && !isset($patient_ot_delivery_register->ChildBirthDate->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->ChildBirthDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBirthDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ChildBirthDate" class="form-group patient_ot_delivery_register_ChildBirthDate">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate" data-format="7" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBirthDate->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildBirthDate->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildBirthDate->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->ChildBirthDate->ReadOnly && !$patient_ot_delivery_register->ChildBirthDate->Disabled && !isset($patient_ot_delivery_register->ChildBirthDate->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->ChildBirthDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ChildBirthDate" class="patient_ot_delivery_register_ChildBirthDate">
<span<?php echo $patient_ot_delivery_register->ChildBirthDate->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildBirthDate->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBirthDate->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBirthDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBirthDate->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBirthDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ChildBirthTime->Visible) { // ChildBirthTime ?>
		<td data-name="ChildBirthTime"<?php echo $patient_ot_delivery_register->ChildBirthTime->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ChildBirthTime" class="form-group patient_ot_delivery_register_ChildBirthTime">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBirthTime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildBirthTime->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildBirthTime->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->ChildBirthTime->ReadOnly && !$patient_ot_delivery_register->ChildBirthTime->Disabled && !isset($patient_ot_delivery_register->ChildBirthTime->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->ChildBirthTime->EditAttrs["disabled"])) { ?>
<script>ew.createTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime", {"timeFormat":"h:i A","step":15});</script><?php } ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBirthTime->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ChildBirthTime" class="form-group patient_ot_delivery_register_ChildBirthTime">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBirthTime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildBirthTime->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildBirthTime->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->ChildBirthTime->ReadOnly && !$patient_ot_delivery_register->ChildBirthTime->Disabled && !isset($patient_ot_delivery_register->ChildBirthTime->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->ChildBirthTime->EditAttrs["disabled"])) { ?>
<script>ew.createTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime", {"timeFormat":"h:i A","step":15});</script><?php } ?>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ChildBirthTime" class="patient_ot_delivery_register_ChildBirthTime">
<span<?php echo $patient_ot_delivery_register->ChildBirthTime->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildBirthTime->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBirthTime->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBirthTime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBirthTime->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBirthTime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ChildSex->Visible) { // ChildSex ?>
		<td data-name="ChildSex"<?php echo $patient_ot_delivery_register->ChildSex->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ChildSex" class="form-group patient_ot_delivery_register_ChildSex">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildSex" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildSex->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildSex->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildSex->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildSex" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildSex->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ChildSex" class="form-group patient_ot_delivery_register_ChildSex">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildSex" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildSex->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildSex->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildSex->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ChildSex" class="patient_ot_delivery_register_ChildSex">
<span<?php echo $patient_ot_delivery_register->ChildSex->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildSex->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildSex" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildSex->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildSex" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildSex->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildSex" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildSex->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildSex" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildSex->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ChildWt->Visible) { // ChildWt ?>
		<td data-name="ChildWt"<?php echo $patient_ot_delivery_register->ChildWt->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ChildWt" class="form-group patient_ot_delivery_register_ChildWt">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildWt" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildWt->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildWt->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildWt->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildWt" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildWt->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ChildWt" class="form-group patient_ot_delivery_register_ChildWt">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildWt" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildWt->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildWt->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildWt->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ChildWt" class="patient_ot_delivery_register_ChildWt">
<span<?php echo $patient_ot_delivery_register->ChildWt->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildWt->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildWt" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildWt->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildWt" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildWt->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildWt" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildWt->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildWt" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildWt->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ChildDay->Visible) { // ChildDay ?>
		<td data-name="ChildDay"<?php echo $patient_ot_delivery_register->ChildDay->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ChildDay" class="form-group patient_ot_delivery_register_ChildDay">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildDay" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildDay->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildDay->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildDay->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildDay" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildDay->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ChildDay" class="form-group patient_ot_delivery_register_ChildDay">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildDay" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildDay->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildDay->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildDay->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ChildDay" class="patient_ot_delivery_register_ChildDay">
<span<?php echo $patient_ot_delivery_register->ChildDay->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildDay->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildDay" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildDay->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildDay" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildDay->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildDay" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildDay->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildDay" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildDay->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ChildOE->Visible) { // ChildOE ?>
		<td data-name="ChildOE"<?php echo $patient_ot_delivery_register->ChildOE->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ChildOE" class="form-group patient_ot_delivery_register_ChildOE">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildOE" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildOE->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildOE->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildOE->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildOE" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildOE->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ChildOE" class="form-group patient_ot_delivery_register_ChildOE">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildOE" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildOE->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildOE->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildOE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ChildOE" class="patient_ot_delivery_register_ChildOE">
<span<?php echo $patient_ot_delivery_register->ChildOE->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildOE->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildOE" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildOE->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildOE" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildOE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildOE" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildOE->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildOE" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildOE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ChildBlGrp->Visible) { // ChildBlGrp ?>
		<td data-name="ChildBlGrp"<?php echo $patient_ot_delivery_register->ChildBlGrp->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ChildBlGrp" class="form-group patient_ot_delivery_register_ChildBlGrp">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBlGrp->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildBlGrp->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildBlGrp->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBlGrp->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ChildBlGrp" class="form-group patient_ot_delivery_register_ChildBlGrp">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBlGrp->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildBlGrp->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildBlGrp->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ChildBlGrp" class="patient_ot_delivery_register_ChildBlGrp">
<span<?php echo $patient_ot_delivery_register->ChildBlGrp->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildBlGrp->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBlGrp->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBlGrp->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBlGrp->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBlGrp->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ApgarScore->Visible) { // ApgarScore ?>
		<td data-name="ApgarScore"<?php echo $patient_ot_delivery_register->ApgarScore->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ApgarScore" class="form-group patient_ot_delivery_register_ApgarScore">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ApgarScore" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ApgarScore->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ApgarScore->EditValue ?>"<?php echo $patient_ot_delivery_register->ApgarScore->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ApgarScore" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore" value="<?php echo HtmlEncode($patient_ot_delivery_register->ApgarScore->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ApgarScore" class="form-group patient_ot_delivery_register_ApgarScore">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ApgarScore" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ApgarScore->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ApgarScore->EditValue ?>"<?php echo $patient_ot_delivery_register->ApgarScore->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ApgarScore" class="patient_ot_delivery_register_ApgarScore">
<span<?php echo $patient_ot_delivery_register->ApgarScore->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ApgarScore->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ApgarScore" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore" value="<?php echo HtmlEncode($patient_ot_delivery_register->ApgarScore->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ApgarScore" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore" value="<?php echo HtmlEncode($patient_ot_delivery_register->ApgarScore->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ApgarScore" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore" value="<?php echo HtmlEncode($patient_ot_delivery_register->ApgarScore->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ApgarScore" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore" value="<?php echo HtmlEncode($patient_ot_delivery_register->ApgarScore->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->birthnotification->Visible) { // birthnotification ?>
		<td data-name="birthnotification"<?php echo $patient_ot_delivery_register->birthnotification->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_birthnotification" class="form-group patient_ot_delivery_register_birthnotification">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_birthnotification" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->birthnotification->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->birthnotification->EditValue ?>"<?php echo $patient_ot_delivery_register->birthnotification->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_birthnotification" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification" value="<?php echo HtmlEncode($patient_ot_delivery_register->birthnotification->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_birthnotification" class="form-group patient_ot_delivery_register_birthnotification">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_birthnotification" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->birthnotification->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->birthnotification->EditValue ?>"<?php echo $patient_ot_delivery_register->birthnotification->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_birthnotification" class="patient_ot_delivery_register_birthnotification">
<span<?php echo $patient_ot_delivery_register->birthnotification->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->birthnotification->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_birthnotification" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification" value="<?php echo HtmlEncode($patient_ot_delivery_register->birthnotification->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_birthnotification" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification" value="<?php echo HtmlEncode($patient_ot_delivery_register->birthnotification->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_birthnotification" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification" value="<?php echo HtmlEncode($patient_ot_delivery_register->birthnotification->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_birthnotification" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification" value="<?php echo HtmlEncode($patient_ot_delivery_register->birthnotification->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->formno->Visible) { // formno ?>
		<td data-name="formno"<?php echo $patient_ot_delivery_register->formno->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_formno" class="form-group patient_ot_delivery_register_formno">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_formno" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->formno->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->formno->EditValue ?>"<?php echo $patient_ot_delivery_register->formno->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_formno" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno" value="<?php echo HtmlEncode($patient_ot_delivery_register->formno->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_formno" class="form-group patient_ot_delivery_register_formno">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_formno" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->formno->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->formno->EditValue ?>"<?php echo $patient_ot_delivery_register->formno->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_formno" class="patient_ot_delivery_register_formno">
<span<?php echo $patient_ot_delivery_register->formno->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->formno->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_formno" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno" value="<?php echo HtmlEncode($patient_ot_delivery_register->formno->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_formno" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno" value="<?php echo HtmlEncode($patient_ot_delivery_register->formno->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_formno" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno" value="<?php echo HtmlEncode($patient_ot_delivery_register->formno->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_formno" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno" value="<?php echo HtmlEncode($patient_ot_delivery_register->formno->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->dte->Visible) { // dte ?>
		<td data-name="dte"<?php echo $patient_ot_delivery_register->dte->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_dte" class="form-group patient_ot_delivery_register_dte">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_dte" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_dte" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_dte" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->dte->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->dte->EditValue ?>"<?php echo $patient_ot_delivery_register->dte->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->dte->ReadOnly && !$patient_ot_delivery_register->dte->Disabled && !isset($patient_ot_delivery_register->dte->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->dte->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_dte", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_dte" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_dte" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_dte" value="<?php echo HtmlEncode($patient_ot_delivery_register->dte->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_dte" class="form-group patient_ot_delivery_register_dte">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_dte" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_dte" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_dte" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->dte->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->dte->EditValue ?>"<?php echo $patient_ot_delivery_register->dte->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->dte->ReadOnly && !$patient_ot_delivery_register->dte->Disabled && !isset($patient_ot_delivery_register->dte->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->dte->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_dte", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_dte" class="patient_ot_delivery_register_dte">
<span<?php echo $patient_ot_delivery_register->dte->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->dte->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_dte" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_dte" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_dte" value="<?php echo HtmlEncode($patient_ot_delivery_register->dte->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_dte" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_dte" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_dte" value="<?php echo HtmlEncode($patient_ot_delivery_register->dte->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_dte" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_dte" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_dte" value="<?php echo HtmlEncode($patient_ot_delivery_register->dte->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_dte" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_dte" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_dte" value="<?php echo HtmlEncode($patient_ot_delivery_register->dte->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->motherReligion->Visible) { // motherReligion ?>
		<td data-name="motherReligion"<?php echo $patient_ot_delivery_register->motherReligion->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_motherReligion" class="form-group patient_ot_delivery_register_motherReligion">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_motherReligion" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_motherReligion" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_motherReligion" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->motherReligion->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->motherReligion->EditValue ?>"<?php echo $patient_ot_delivery_register->motherReligion->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_motherReligion" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_motherReligion" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_motherReligion" value="<?php echo HtmlEncode($patient_ot_delivery_register->motherReligion->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_motherReligion" class="form-group patient_ot_delivery_register_motherReligion">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_motherReligion" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_motherReligion" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_motherReligion" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->motherReligion->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->motherReligion->EditValue ?>"<?php echo $patient_ot_delivery_register->motherReligion->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_motherReligion" class="patient_ot_delivery_register_motherReligion">
<span<?php echo $patient_ot_delivery_register->motherReligion->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->motherReligion->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_motherReligion" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_motherReligion" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_motherReligion" value="<?php echo HtmlEncode($patient_ot_delivery_register->motherReligion->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_motherReligion" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_motherReligion" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_motherReligion" value="<?php echo HtmlEncode($patient_ot_delivery_register->motherReligion->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_motherReligion" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_motherReligion" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_motherReligion" value="<?php echo HtmlEncode($patient_ot_delivery_register->motherReligion->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_motherReligion" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_motherReligion" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_motherReligion" value="<?php echo HtmlEncode($patient_ot_delivery_register->motherReligion->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->bloodgroup->Visible) { // bloodgroup ?>
		<td data-name="bloodgroup"<?php echo $patient_ot_delivery_register->bloodgroup->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_bloodgroup" class="form-group patient_ot_delivery_register_bloodgroup">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_bloodgroup" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodgroup" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodgroup" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->bloodgroup->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->bloodgroup->EditValue ?>"<?php echo $patient_ot_delivery_register->bloodgroup->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodgroup" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodgroup" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodgroup" value="<?php echo HtmlEncode($patient_ot_delivery_register->bloodgroup->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_bloodgroup" class="form-group patient_ot_delivery_register_bloodgroup">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_bloodgroup" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodgroup" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodgroup" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->bloodgroup->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->bloodgroup->EditValue ?>"<?php echo $patient_ot_delivery_register->bloodgroup->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_bloodgroup" class="patient_ot_delivery_register_bloodgroup">
<span<?php echo $patient_ot_delivery_register->bloodgroup->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->bloodgroup->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodgroup" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodgroup" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodgroup" value="<?php echo HtmlEncode($patient_ot_delivery_register->bloodgroup->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodgroup" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodgroup" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodgroup" value="<?php echo HtmlEncode($patient_ot_delivery_register->bloodgroup->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodgroup" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodgroup" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodgroup" value="<?php echo HtmlEncode($patient_ot_delivery_register->bloodgroup->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodgroup" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodgroup" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodgroup" value="<?php echo HtmlEncode($patient_ot_delivery_register->bloodgroup->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->status->Visible) { // status ?>
		<td data-name="status"<?php echo $patient_ot_delivery_register->status->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_status" class="form-group patient_ot_delivery_register_status">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_status" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_status" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->status->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->status->EditValue ?>"<?php echo $patient_ot_delivery_register->status->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_status" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_status" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_ot_delivery_register->status->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_status" class="form-group patient_ot_delivery_register_status">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_status" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_status" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->status->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->status->EditValue ?>"<?php echo $patient_ot_delivery_register->status->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_status" class="patient_ot_delivery_register_status">
<span<?php echo $patient_ot_delivery_register->status->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->status->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_status" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_status" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_ot_delivery_register->status->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_status" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_status" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_ot_delivery_register->status->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_status" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_status" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_ot_delivery_register->status->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_status" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_status" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_ot_delivery_register->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $patient_ot_delivery_register->createdby->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_createdby" class="form-group patient_ot_delivery_register_createdby">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_createdby" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createdby" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createdby" size="30" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->createdby->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->createdby->EditValue ?>"<?php echo $patient_ot_delivery_register->createdby->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_createdby" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createdby" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_ot_delivery_register->createdby->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_createdby" class="form-group patient_ot_delivery_register_createdby">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_createdby" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createdby" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createdby" size="30" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->createdby->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->createdby->EditValue ?>"<?php echo $patient_ot_delivery_register->createdby->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_createdby" class="patient_ot_delivery_register_createdby">
<span<?php echo $patient_ot_delivery_register->createdby->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->createdby->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_createdby" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createdby" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_ot_delivery_register->createdby->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_createdby" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createdby" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_ot_delivery_register->createdby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_createdby" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createdby" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_ot_delivery_register->createdby->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_createdby" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createdby" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_ot_delivery_register->createdby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $patient_ot_delivery_register->createddatetime->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_createddatetime" class="form-group patient_ot_delivery_register_createddatetime">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_createddatetime" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createddatetime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->createddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->createddatetime->EditValue ?>"<?php echo $patient_ot_delivery_register->createddatetime->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->createddatetime->ReadOnly && !$patient_ot_delivery_register->createddatetime->Disabled && !isset($patient_ot_delivery_register->createddatetime->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_createddatetime" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createddatetime" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_ot_delivery_register->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_createddatetime" class="form-group patient_ot_delivery_register_createddatetime">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_createddatetime" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createddatetime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->createddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->createddatetime->EditValue ?>"<?php echo $patient_ot_delivery_register->createddatetime->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->createddatetime->ReadOnly && !$patient_ot_delivery_register->createddatetime->Disabled && !isset($patient_ot_delivery_register->createddatetime->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_createddatetime" class="patient_ot_delivery_register_createddatetime">
<span<?php echo $patient_ot_delivery_register->createddatetime->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->createddatetime->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_createddatetime" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createddatetime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_ot_delivery_register->createddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_createddatetime" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createddatetime" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_ot_delivery_register->createddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_createddatetime" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createddatetime" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_ot_delivery_register->createddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_createddatetime" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createddatetime" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_ot_delivery_register->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $patient_ot_delivery_register->modifiedby->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_modifiedby" class="form-group patient_ot_delivery_register_modifiedby">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_modifiedby" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifiedby" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifiedby" size="30" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->modifiedby->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->modifiedby->EditValue ?>"<?php echo $patient_ot_delivery_register->modifiedby->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_modifiedby" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifiedby" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_ot_delivery_register->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_modifiedby" class="form-group patient_ot_delivery_register_modifiedby">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_modifiedby" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifiedby" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifiedby" size="30" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->modifiedby->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->modifiedby->EditValue ?>"<?php echo $patient_ot_delivery_register->modifiedby->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_modifiedby" class="patient_ot_delivery_register_modifiedby">
<span<?php echo $patient_ot_delivery_register->modifiedby->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->modifiedby->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_modifiedby" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifiedby" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_ot_delivery_register->modifiedby->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_modifiedby" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifiedby" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_ot_delivery_register->modifiedby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_modifiedby" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifiedby" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_ot_delivery_register->modifiedby->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_modifiedby" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifiedby" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_ot_delivery_register->modifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $patient_ot_delivery_register->modifieddatetime->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_modifieddatetime" class="form-group patient_ot_delivery_register_modifieddatetime">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_modifieddatetime" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifieddatetime" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->modifieddatetime->EditValue ?>"<?php echo $patient_ot_delivery_register->modifieddatetime->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->modifieddatetime->ReadOnly && !$patient_ot_delivery_register->modifieddatetime->Disabled && !isset($patient_ot_delivery_register->modifieddatetime->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_modifieddatetime" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_ot_delivery_register->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_modifieddatetime" class="form-group patient_ot_delivery_register_modifieddatetime">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_modifieddatetime" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifieddatetime" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->modifieddatetime->EditValue ?>"<?php echo $patient_ot_delivery_register->modifieddatetime->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->modifieddatetime->ReadOnly && !$patient_ot_delivery_register->modifieddatetime->Disabled && !isset($patient_ot_delivery_register->modifieddatetime->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_modifieddatetime" class="patient_ot_delivery_register_modifieddatetime">
<span<?php echo $patient_ot_delivery_register->modifieddatetime->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->modifieddatetime->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_modifieddatetime" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_ot_delivery_register->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_modifieddatetime" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_ot_delivery_register->modifieddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_modifieddatetime" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifieddatetime" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_ot_delivery_register->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_modifieddatetime" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifieddatetime" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_ot_delivery_register->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID"<?php echo $patient_ot_delivery_register->PatientID->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_PatientID" class="form-group patient_ot_delivery_register_PatientID">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_PatientID" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientID" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->PatientID->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->PatientID->EditValue ?>"<?php echo $patient_ot_delivery_register->PatientID->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatientID" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientID" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientID" value="<?php echo HtmlEncode($patient_ot_delivery_register->PatientID->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_PatientID" class="form-group patient_ot_delivery_register_PatientID">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_PatientID" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientID" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->PatientID->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->PatientID->EditValue ?>"<?php echo $patient_ot_delivery_register->PatientID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_PatientID" class="patient_ot_delivery_register_PatientID">
<span<?php echo $patient_ot_delivery_register->PatientID->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->PatientID->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatientID" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientID" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientID" value="<?php echo HtmlEncode($patient_ot_delivery_register->PatientID->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatientID" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientID" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientID" value="<?php echo HtmlEncode($patient_ot_delivery_register->PatientID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatientID" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientID" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientID" value="<?php echo HtmlEncode($patient_ot_delivery_register->PatientID->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatientID" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientID" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientID" value="<?php echo HtmlEncode($patient_ot_delivery_register->PatientID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $patient_ot_delivery_register->HospID->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_HospID" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HospID" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_ot_delivery_register->HospID->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_HospID" class="patient_ot_delivery_register_HospID">
<span<?php echo $patient_ot_delivery_register->HospID->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->HospID->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_HospID" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HospID" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_ot_delivery_register->HospID->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_HospID" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HospID" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_ot_delivery_register->HospID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_HospID" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HospID" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_ot_delivery_register->HospID->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_HospID" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HospID" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_ot_delivery_register->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ChildBirthDate1->Visible) { // ChildBirthDate1 ?>
		<td data-name="ChildBirthDate1"<?php echo $patient_ot_delivery_register->ChildBirthDate1->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ChildBirthDate1" class="form-group patient_ot_delivery_register_ChildBirthDate1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate1" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBirthDate1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildBirthDate1->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildBirthDate1->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->ChildBirthDate1->ReadOnly && !$patient_ot_delivery_register->ChildBirthDate1->Disabled && !isset($patient_ot_delivery_register->ChildBirthDate1->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->ChildBirthDate1->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate1", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBirthDate1->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ChildBirthDate1" class="form-group patient_ot_delivery_register_ChildBirthDate1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate1" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBirthDate1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildBirthDate1->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildBirthDate1->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->ChildBirthDate1->ReadOnly && !$patient_ot_delivery_register->ChildBirthDate1->Disabled && !isset($patient_ot_delivery_register->ChildBirthDate1->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->ChildBirthDate1->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate1", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ChildBirthDate1" class="patient_ot_delivery_register_ChildBirthDate1">
<span<?php echo $patient_ot_delivery_register->ChildBirthDate1->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildBirthDate1->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBirthDate1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBirthDate1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate1" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate1" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBirthDate1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate1" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate1" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBirthDate1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ChildBirthTime1->Visible) { // ChildBirthTime1 ?>
		<td data-name="ChildBirthTime1"<?php echo $patient_ot_delivery_register->ChildBirthTime1->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ChildBirthTime1" class="form-group patient_ot_delivery_register_ChildBirthTime1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBirthTime1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildBirthTime1->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildBirthTime1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBirthTime1->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ChildBirthTime1" class="form-group patient_ot_delivery_register_ChildBirthTime1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBirthTime1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildBirthTime1->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildBirthTime1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ChildBirthTime1" class="patient_ot_delivery_register_ChildBirthTime1">
<span<?php echo $patient_ot_delivery_register->ChildBirthTime1->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildBirthTime1->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBirthTime1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBirthTime1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime1" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime1" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBirthTime1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime1" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime1" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBirthTime1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ChildSex1->Visible) { // ChildSex1 ?>
		<td data-name="ChildSex1"<?php echo $patient_ot_delivery_register->ChildSex1->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ChildSex1" class="form-group patient_ot_delivery_register_ChildSex1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildSex1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildSex1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildSex1->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildSex1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildSex1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildSex1->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ChildSex1" class="form-group patient_ot_delivery_register_ChildSex1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildSex1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildSex1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildSex1->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildSex1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ChildSex1" class="patient_ot_delivery_register_ChildSex1">
<span<?php echo $patient_ot_delivery_register->ChildSex1->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildSex1->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildSex1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildSex1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildSex1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildSex1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildSex1" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex1" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildSex1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildSex1" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex1" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildSex1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ChildWt1->Visible) { // ChildWt1 ?>
		<td data-name="ChildWt1"<?php echo $patient_ot_delivery_register->ChildWt1->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ChildWt1" class="form-group patient_ot_delivery_register_ChildWt1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildWt1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildWt1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildWt1->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildWt1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildWt1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildWt1->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ChildWt1" class="form-group patient_ot_delivery_register_ChildWt1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildWt1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildWt1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildWt1->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildWt1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ChildWt1" class="patient_ot_delivery_register_ChildWt1">
<span<?php echo $patient_ot_delivery_register->ChildWt1->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildWt1->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildWt1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildWt1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildWt1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildWt1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildWt1" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt1" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildWt1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildWt1" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt1" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildWt1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ChildDay1->Visible) { // ChildDay1 ?>
		<td data-name="ChildDay1"<?php echo $patient_ot_delivery_register->ChildDay1->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ChildDay1" class="form-group patient_ot_delivery_register_ChildDay1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildDay1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildDay1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildDay1->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildDay1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildDay1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildDay1->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ChildDay1" class="form-group patient_ot_delivery_register_ChildDay1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildDay1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildDay1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildDay1->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildDay1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ChildDay1" class="patient_ot_delivery_register_ChildDay1">
<span<?php echo $patient_ot_delivery_register->ChildDay1->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildDay1->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildDay1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildDay1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildDay1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildDay1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildDay1" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay1" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildDay1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildDay1" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay1" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildDay1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ChildOE1->Visible) { // ChildOE1 ?>
		<td data-name="ChildOE1"<?php echo $patient_ot_delivery_register->ChildOE1->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ChildOE1" class="form-group patient_ot_delivery_register_ChildOE1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildOE1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildOE1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildOE1->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildOE1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildOE1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildOE1->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ChildOE1" class="form-group patient_ot_delivery_register_ChildOE1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildOE1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildOE1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildOE1->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildOE1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ChildOE1" class="patient_ot_delivery_register_ChildOE1">
<span<?php echo $patient_ot_delivery_register->ChildOE1->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildOE1->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildOE1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildOE1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildOE1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildOE1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildOE1" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE1" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildOE1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildOE1" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE1" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildOE1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ChildBlGrp1->Visible) { // ChildBlGrp1 ?>
		<td data-name="ChildBlGrp1"<?php echo $patient_ot_delivery_register->ChildBlGrp1->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ChildBlGrp1" class="form-group patient_ot_delivery_register_ChildBlGrp1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBlGrp1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildBlGrp1->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildBlGrp1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBlGrp1->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ChildBlGrp1" class="form-group patient_ot_delivery_register_ChildBlGrp1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBlGrp1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildBlGrp1->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildBlGrp1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ChildBlGrp1" class="patient_ot_delivery_register_ChildBlGrp1">
<span<?php echo $patient_ot_delivery_register->ChildBlGrp1->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildBlGrp1->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBlGrp1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBlGrp1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp1" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp1" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBlGrp1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp1" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp1" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBlGrp1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ApgarScore1->Visible) { // ApgarScore1 ?>
		<td data-name="ApgarScore1"<?php echo $patient_ot_delivery_register->ApgarScore1->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ApgarScore1" class="form-group patient_ot_delivery_register_ApgarScore1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ApgarScore1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ApgarScore1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ApgarScore1->EditValue ?>"<?php echo $patient_ot_delivery_register->ApgarScore1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ApgarScore1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ApgarScore1->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ApgarScore1" class="form-group patient_ot_delivery_register_ApgarScore1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ApgarScore1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ApgarScore1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ApgarScore1->EditValue ?>"<?php echo $patient_ot_delivery_register->ApgarScore1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ApgarScore1" class="patient_ot_delivery_register_ApgarScore1">
<span<?php echo $patient_ot_delivery_register->ApgarScore1->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ApgarScore1->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ApgarScore1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ApgarScore1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ApgarScore1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ApgarScore1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ApgarScore1" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore1" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ApgarScore1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ApgarScore1" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore1" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ApgarScore1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->birthnotification1->Visible) { // birthnotification1 ?>
		<td data-name="birthnotification1"<?php echo $patient_ot_delivery_register->birthnotification1->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_birthnotification1" class="form-group patient_ot_delivery_register_birthnotification1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_birthnotification1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->birthnotification1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->birthnotification1->EditValue ?>"<?php echo $patient_ot_delivery_register->birthnotification1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_birthnotification1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification1" value="<?php echo HtmlEncode($patient_ot_delivery_register->birthnotification1->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_birthnotification1" class="form-group patient_ot_delivery_register_birthnotification1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_birthnotification1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->birthnotification1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->birthnotification1->EditValue ?>"<?php echo $patient_ot_delivery_register->birthnotification1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_birthnotification1" class="patient_ot_delivery_register_birthnotification1">
<span<?php echo $patient_ot_delivery_register->birthnotification1->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->birthnotification1->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_birthnotification1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification1" value="<?php echo HtmlEncode($patient_ot_delivery_register->birthnotification1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_birthnotification1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification1" value="<?php echo HtmlEncode($patient_ot_delivery_register->birthnotification1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_birthnotification1" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification1" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification1" value="<?php echo HtmlEncode($patient_ot_delivery_register->birthnotification1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_birthnotification1" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification1" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification1" value="<?php echo HtmlEncode($patient_ot_delivery_register->birthnotification1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->formno1->Visible) { // formno1 ?>
		<td data-name="formno1"<?php echo $patient_ot_delivery_register->formno1->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_formno1" class="form-group patient_ot_delivery_register_formno1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_formno1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->formno1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->formno1->EditValue ?>"<?php echo $patient_ot_delivery_register->formno1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_formno1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno1" value="<?php echo HtmlEncode($patient_ot_delivery_register->formno1->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_formno1" class="form-group patient_ot_delivery_register_formno1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_formno1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->formno1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->formno1->EditValue ?>"<?php echo $patient_ot_delivery_register->formno1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_formno1" class="patient_ot_delivery_register_formno1">
<span<?php echo $patient_ot_delivery_register->formno1->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->formno1->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_formno1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno1" value="<?php echo HtmlEncode($patient_ot_delivery_register->formno1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_formno1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno1" value="<?php echo HtmlEncode($patient_ot_delivery_register->formno1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_formno1" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno1" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno1" value="<?php echo HtmlEncode($patient_ot_delivery_register->formno1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_formno1" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno1" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno1" value="<?php echo HtmlEncode($patient_ot_delivery_register->formno1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->RecievedTime->Visible) { // RecievedTime ?>
		<td data-name="RecievedTime"<?php echo $patient_ot_delivery_register->RecievedTime->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_RecievedTime" class="form-group patient_ot_delivery_register_RecievedTime">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_RecievedTime" data-format="11" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecievedTime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecievedTime" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->RecievedTime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->RecievedTime->EditValue ?>"<?php echo $patient_ot_delivery_register->RecievedTime->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->RecievedTime->ReadOnly && !$patient_ot_delivery_register->RecievedTime->Disabled && !isset($patient_ot_delivery_register->RecievedTime->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->RecievedTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecievedTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_RecievedTime" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecievedTime" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecievedTime" value="<?php echo HtmlEncode($patient_ot_delivery_register->RecievedTime->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_RecievedTime" class="form-group patient_ot_delivery_register_RecievedTime">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_RecievedTime" data-format="11" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecievedTime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecievedTime" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->RecievedTime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->RecievedTime->EditValue ?>"<?php echo $patient_ot_delivery_register->RecievedTime->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->RecievedTime->ReadOnly && !$patient_ot_delivery_register->RecievedTime->Disabled && !isset($patient_ot_delivery_register->RecievedTime->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->RecievedTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecievedTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_RecievedTime" class="patient_ot_delivery_register_RecievedTime">
<span<?php echo $patient_ot_delivery_register->RecievedTime->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->RecievedTime->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_RecievedTime" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecievedTime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecievedTime" value="<?php echo HtmlEncode($patient_ot_delivery_register->RecievedTime->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_RecievedTime" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecievedTime" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecievedTime" value="<?php echo HtmlEncode($patient_ot_delivery_register->RecievedTime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_RecievedTime" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecievedTime" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecievedTime" value="<?php echo HtmlEncode($patient_ot_delivery_register->RecievedTime->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_RecievedTime" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecievedTime" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecievedTime" value="<?php echo HtmlEncode($patient_ot_delivery_register->RecievedTime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->AnaesthesiaStarted->Visible) { // AnaesthesiaStarted ?>
		<td data-name="AnaesthesiaStarted"<?php echo $patient_ot_delivery_register->AnaesthesiaStarted->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_AnaesthesiaStarted" class="form-group patient_ot_delivery_register_AnaesthesiaStarted">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaStarted" data-format="11" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaStarted" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaStarted" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->AnaesthesiaStarted->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->AnaesthesiaStarted->EditValue ?>"<?php echo $patient_ot_delivery_register->AnaesthesiaStarted->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->AnaesthesiaStarted->ReadOnly && !$patient_ot_delivery_register->AnaesthesiaStarted->Disabled && !isset($patient_ot_delivery_register->AnaesthesiaStarted->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->AnaesthesiaStarted->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaStarted", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaStarted" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaStarted" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaStarted" value="<?php echo HtmlEncode($patient_ot_delivery_register->AnaesthesiaStarted->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_AnaesthesiaStarted" class="form-group patient_ot_delivery_register_AnaesthesiaStarted">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaStarted" data-format="11" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaStarted" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaStarted" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->AnaesthesiaStarted->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->AnaesthesiaStarted->EditValue ?>"<?php echo $patient_ot_delivery_register->AnaesthesiaStarted->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->AnaesthesiaStarted->ReadOnly && !$patient_ot_delivery_register->AnaesthesiaStarted->Disabled && !isset($patient_ot_delivery_register->AnaesthesiaStarted->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->AnaesthesiaStarted->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaStarted", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_AnaesthesiaStarted" class="patient_ot_delivery_register_AnaesthesiaStarted">
<span<?php echo $patient_ot_delivery_register->AnaesthesiaStarted->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->AnaesthesiaStarted->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaStarted" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaStarted" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaStarted" value="<?php echo HtmlEncode($patient_ot_delivery_register->AnaesthesiaStarted->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaStarted" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaStarted" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaStarted" value="<?php echo HtmlEncode($patient_ot_delivery_register->AnaesthesiaStarted->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaStarted" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaStarted" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaStarted" value="<?php echo HtmlEncode($patient_ot_delivery_register->AnaesthesiaStarted->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaStarted" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaStarted" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaStarted" value="<?php echo HtmlEncode($patient_ot_delivery_register->AnaesthesiaStarted->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->AnaesthesiaEnded->Visible) { // AnaesthesiaEnded ?>
		<td data-name="AnaesthesiaEnded"<?php echo $patient_ot_delivery_register->AnaesthesiaEnded->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_AnaesthesiaEnded" class="form-group patient_ot_delivery_register_AnaesthesiaEnded">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaEnded" data-format="11" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaEnded" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaEnded" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->AnaesthesiaEnded->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->AnaesthesiaEnded->EditValue ?>"<?php echo $patient_ot_delivery_register->AnaesthesiaEnded->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->AnaesthesiaEnded->ReadOnly && !$patient_ot_delivery_register->AnaesthesiaEnded->Disabled && !isset($patient_ot_delivery_register->AnaesthesiaEnded->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->AnaesthesiaEnded->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaEnded", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaEnded" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaEnded" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaEnded" value="<?php echo HtmlEncode($patient_ot_delivery_register->AnaesthesiaEnded->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_AnaesthesiaEnded" class="form-group patient_ot_delivery_register_AnaesthesiaEnded">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaEnded" data-format="11" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaEnded" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaEnded" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->AnaesthesiaEnded->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->AnaesthesiaEnded->EditValue ?>"<?php echo $patient_ot_delivery_register->AnaesthesiaEnded->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->AnaesthesiaEnded->ReadOnly && !$patient_ot_delivery_register->AnaesthesiaEnded->Disabled && !isset($patient_ot_delivery_register->AnaesthesiaEnded->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->AnaesthesiaEnded->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaEnded", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_AnaesthesiaEnded" class="patient_ot_delivery_register_AnaesthesiaEnded">
<span<?php echo $patient_ot_delivery_register->AnaesthesiaEnded->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->AnaesthesiaEnded->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaEnded" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaEnded" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaEnded" value="<?php echo HtmlEncode($patient_ot_delivery_register->AnaesthesiaEnded->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaEnded" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaEnded" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaEnded" value="<?php echo HtmlEncode($patient_ot_delivery_register->AnaesthesiaEnded->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaEnded" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaEnded" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaEnded" value="<?php echo HtmlEncode($patient_ot_delivery_register->AnaesthesiaEnded->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaEnded" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaEnded" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaEnded" value="<?php echo HtmlEncode($patient_ot_delivery_register->AnaesthesiaEnded->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->surgeryStarted->Visible) { // surgeryStarted ?>
		<td data-name="surgeryStarted"<?php echo $patient_ot_delivery_register->surgeryStarted->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_surgeryStarted" class="form-group patient_ot_delivery_register_surgeryStarted">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_surgeryStarted" data-format="11" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryStarted" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryStarted" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->surgeryStarted->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->surgeryStarted->EditValue ?>"<?php echo $patient_ot_delivery_register->surgeryStarted->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->surgeryStarted->ReadOnly && !$patient_ot_delivery_register->surgeryStarted->Disabled && !isset($patient_ot_delivery_register->surgeryStarted->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->surgeryStarted->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryStarted", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_surgeryStarted" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryStarted" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryStarted" value="<?php echo HtmlEncode($patient_ot_delivery_register->surgeryStarted->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_surgeryStarted" class="form-group patient_ot_delivery_register_surgeryStarted">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_surgeryStarted" data-format="11" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryStarted" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryStarted" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->surgeryStarted->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->surgeryStarted->EditValue ?>"<?php echo $patient_ot_delivery_register->surgeryStarted->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->surgeryStarted->ReadOnly && !$patient_ot_delivery_register->surgeryStarted->Disabled && !isset($patient_ot_delivery_register->surgeryStarted->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->surgeryStarted->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryStarted", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_surgeryStarted" class="patient_ot_delivery_register_surgeryStarted">
<span<?php echo $patient_ot_delivery_register->surgeryStarted->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->surgeryStarted->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_surgeryStarted" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryStarted" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryStarted" value="<?php echo HtmlEncode($patient_ot_delivery_register->surgeryStarted->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_surgeryStarted" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryStarted" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryStarted" value="<?php echo HtmlEncode($patient_ot_delivery_register->surgeryStarted->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_surgeryStarted" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryStarted" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryStarted" value="<?php echo HtmlEncode($patient_ot_delivery_register->surgeryStarted->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_surgeryStarted" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryStarted" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryStarted" value="<?php echo HtmlEncode($patient_ot_delivery_register->surgeryStarted->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->surgeryEnded->Visible) { // surgeryEnded ?>
		<td data-name="surgeryEnded"<?php echo $patient_ot_delivery_register->surgeryEnded->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_surgeryEnded" class="form-group patient_ot_delivery_register_surgeryEnded">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_surgeryEnded" data-format="11" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryEnded" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryEnded" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->surgeryEnded->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->surgeryEnded->EditValue ?>"<?php echo $patient_ot_delivery_register->surgeryEnded->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->surgeryEnded->ReadOnly && !$patient_ot_delivery_register->surgeryEnded->Disabled && !isset($patient_ot_delivery_register->surgeryEnded->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->surgeryEnded->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryEnded", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_surgeryEnded" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryEnded" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryEnded" value="<?php echo HtmlEncode($patient_ot_delivery_register->surgeryEnded->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_surgeryEnded" class="form-group patient_ot_delivery_register_surgeryEnded">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_surgeryEnded" data-format="11" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryEnded" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryEnded" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->surgeryEnded->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->surgeryEnded->EditValue ?>"<?php echo $patient_ot_delivery_register->surgeryEnded->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->surgeryEnded->ReadOnly && !$patient_ot_delivery_register->surgeryEnded->Disabled && !isset($patient_ot_delivery_register->surgeryEnded->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->surgeryEnded->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryEnded", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_surgeryEnded" class="patient_ot_delivery_register_surgeryEnded">
<span<?php echo $patient_ot_delivery_register->surgeryEnded->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->surgeryEnded->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_surgeryEnded" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryEnded" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryEnded" value="<?php echo HtmlEncode($patient_ot_delivery_register->surgeryEnded->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_surgeryEnded" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryEnded" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryEnded" value="<?php echo HtmlEncode($patient_ot_delivery_register->surgeryEnded->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_surgeryEnded" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryEnded" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryEnded" value="<?php echo HtmlEncode($patient_ot_delivery_register->surgeryEnded->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_surgeryEnded" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryEnded" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryEnded" value="<?php echo HtmlEncode($patient_ot_delivery_register->surgeryEnded->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->RecoveryTime->Visible) { // RecoveryTime ?>
		<td data-name="RecoveryTime"<?php echo $patient_ot_delivery_register->RecoveryTime->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_RecoveryTime" class="form-group patient_ot_delivery_register_RecoveryTime">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_RecoveryTime" data-format="11" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecoveryTime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecoveryTime" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->RecoveryTime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->RecoveryTime->EditValue ?>"<?php echo $patient_ot_delivery_register->RecoveryTime->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->RecoveryTime->ReadOnly && !$patient_ot_delivery_register->RecoveryTime->Disabled && !isset($patient_ot_delivery_register->RecoveryTime->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->RecoveryTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecoveryTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_RecoveryTime" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecoveryTime" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecoveryTime" value="<?php echo HtmlEncode($patient_ot_delivery_register->RecoveryTime->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_RecoveryTime" class="form-group patient_ot_delivery_register_RecoveryTime">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_RecoveryTime" data-format="11" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecoveryTime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecoveryTime" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->RecoveryTime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->RecoveryTime->EditValue ?>"<?php echo $patient_ot_delivery_register->RecoveryTime->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->RecoveryTime->ReadOnly && !$patient_ot_delivery_register->RecoveryTime->Disabled && !isset($patient_ot_delivery_register->RecoveryTime->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->RecoveryTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecoveryTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_RecoveryTime" class="patient_ot_delivery_register_RecoveryTime">
<span<?php echo $patient_ot_delivery_register->RecoveryTime->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->RecoveryTime->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_RecoveryTime" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecoveryTime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecoveryTime" value="<?php echo HtmlEncode($patient_ot_delivery_register->RecoveryTime->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_RecoveryTime" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecoveryTime" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecoveryTime" value="<?php echo HtmlEncode($patient_ot_delivery_register->RecoveryTime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_RecoveryTime" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecoveryTime" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecoveryTime" value="<?php echo HtmlEncode($patient_ot_delivery_register->RecoveryTime->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_RecoveryTime" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecoveryTime" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecoveryTime" value="<?php echo HtmlEncode($patient_ot_delivery_register->RecoveryTime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ShiftedTime->Visible) { // ShiftedTime ?>
		<td data-name="ShiftedTime"<?php echo $patient_ot_delivery_register->ShiftedTime->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ShiftedTime" class="form-group patient_ot_delivery_register_ShiftedTime">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ShiftedTime" data-format="11" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ShiftedTime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ShiftedTime" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ShiftedTime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ShiftedTime->EditValue ?>"<?php echo $patient_ot_delivery_register->ShiftedTime->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->ShiftedTime->ReadOnly && !$patient_ot_delivery_register->ShiftedTime->Disabled && !isset($patient_ot_delivery_register->ShiftedTime->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->ShiftedTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ShiftedTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ShiftedTime" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ShiftedTime" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ShiftedTime" value="<?php echo HtmlEncode($patient_ot_delivery_register->ShiftedTime->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ShiftedTime" class="form-group patient_ot_delivery_register_ShiftedTime">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ShiftedTime" data-format="11" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ShiftedTime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ShiftedTime" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ShiftedTime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ShiftedTime->EditValue ?>"<?php echo $patient_ot_delivery_register->ShiftedTime->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->ShiftedTime->ReadOnly && !$patient_ot_delivery_register->ShiftedTime->Disabled && !isset($patient_ot_delivery_register->ShiftedTime->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->ShiftedTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ShiftedTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ShiftedTime" class="patient_ot_delivery_register_ShiftedTime">
<span<?php echo $patient_ot_delivery_register->ShiftedTime->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ShiftedTime->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ShiftedTime" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ShiftedTime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ShiftedTime" value="<?php echo HtmlEncode($patient_ot_delivery_register->ShiftedTime->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ShiftedTime" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ShiftedTime" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ShiftedTime" value="<?php echo HtmlEncode($patient_ot_delivery_register->ShiftedTime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ShiftedTime" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ShiftedTime" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ShiftedTime" value="<?php echo HtmlEncode($patient_ot_delivery_register->ShiftedTime->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ShiftedTime" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ShiftedTime" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ShiftedTime" value="<?php echo HtmlEncode($patient_ot_delivery_register->ShiftedTime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->Duration->Visible) { // Duration ?>
		<td data-name="Duration"<?php echo $patient_ot_delivery_register->Duration->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_Duration" class="form-group patient_ot_delivery_register_Duration">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_Duration" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Duration" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Duration" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->Duration->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->Duration->EditValue ?>"<?php echo $patient_ot_delivery_register->Duration->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Duration" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Duration" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Duration" value="<?php echo HtmlEncode($patient_ot_delivery_register->Duration->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_Duration" class="form-group patient_ot_delivery_register_Duration">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_Duration" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Duration" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Duration" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->Duration->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->Duration->EditValue ?>"<?php echo $patient_ot_delivery_register->Duration->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_Duration" class="patient_ot_delivery_register_Duration">
<span<?php echo $patient_ot_delivery_register->Duration->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->Duration->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Duration" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Duration" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Duration" value="<?php echo HtmlEncode($patient_ot_delivery_register->Duration->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Duration" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Duration" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Duration" value="<?php echo HtmlEncode($patient_ot_delivery_register->Duration->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Duration" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Duration" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Duration" value="<?php echo HtmlEncode($patient_ot_delivery_register->Duration->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Duration" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Duration" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Duration" value="<?php echo HtmlEncode($patient_ot_delivery_register->Duration->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->Surgeon->Visible) { // Surgeon ?>
		<td data-name="Surgeon"<?php echo $patient_ot_delivery_register->Surgeon->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_Surgeon" class="form-group patient_ot_delivery_register_Surgeon">
<?php
$wrkonchange = "" . trim(@$patient_ot_delivery_register->Surgeon->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_ot_delivery_register->Surgeon->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" class="text-nowrap" style="z-index: <?php echo (9000 - $patient_ot_delivery_register_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" id="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" value="<?php echo RemoveHtml($patient_ot_delivery_register->Surgeon->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->Surgeon->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->Surgeon->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register->Surgeon->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Surgeon" data-value-separator="<?php echo $patient_ot_delivery_register->Surgeon->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" value="<?php echo HtmlEncode($patient_ot_delivery_register->Surgeon->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpatient_ot_delivery_registergrid.createAutoSuggest({"id":"x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon","forceSelect":false});
</script>
<?php echo $patient_ot_delivery_register->Surgeon->Lookup->getParamTag("p_x" . $patient_ot_delivery_register_grid->RowIndex . "_Surgeon") ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Surgeon" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" value="<?php echo HtmlEncode($patient_ot_delivery_register->Surgeon->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_Surgeon" class="form-group patient_ot_delivery_register_Surgeon">
<?php
$wrkonchange = "" . trim(@$patient_ot_delivery_register->Surgeon->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_ot_delivery_register->Surgeon->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" class="text-nowrap" style="z-index: <?php echo (9000 - $patient_ot_delivery_register_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" id="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" value="<?php echo RemoveHtml($patient_ot_delivery_register->Surgeon->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->Surgeon->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->Surgeon->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register->Surgeon->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Surgeon" data-value-separator="<?php echo $patient_ot_delivery_register->Surgeon->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" value="<?php echo HtmlEncode($patient_ot_delivery_register->Surgeon->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpatient_ot_delivery_registergrid.createAutoSuggest({"id":"x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon","forceSelect":false});
</script>
<?php echo $patient_ot_delivery_register->Surgeon->Lookup->getParamTag("p_x" . $patient_ot_delivery_register_grid->RowIndex . "_Surgeon") ?>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_Surgeon" class="patient_ot_delivery_register_Surgeon">
<span<?php echo $patient_ot_delivery_register->Surgeon->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->Surgeon->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Surgeon" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" value="<?php echo HtmlEncode($patient_ot_delivery_register->Surgeon->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Surgeon" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" value="<?php echo HtmlEncode($patient_ot_delivery_register->Surgeon->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Surgeon" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" value="<?php echo HtmlEncode($patient_ot_delivery_register->Surgeon->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Surgeon" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" value="<?php echo HtmlEncode($patient_ot_delivery_register->Surgeon->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->Anaesthetist->Visible) { // Anaesthetist ?>
		<td data-name="Anaesthetist"<?php echo $patient_ot_delivery_register->Anaesthetist->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_Anaesthetist" class="form-group patient_ot_delivery_register_Anaesthetist">
<?php
$wrkonchange = "" . trim(@$patient_ot_delivery_register->Anaesthetist->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_ot_delivery_register->Anaesthetist->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" class="text-nowrap" style="z-index: <?php echo (9000 - $patient_ot_delivery_register_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" id="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" value="<?php echo RemoveHtml($patient_ot_delivery_register->Anaesthetist->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->Anaesthetist->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->Anaesthetist->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register->Anaesthetist->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Anaesthetist" data-value-separator="<?php echo $patient_ot_delivery_register->Anaesthetist->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" value="<?php echo HtmlEncode($patient_ot_delivery_register->Anaesthetist->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpatient_ot_delivery_registergrid.createAutoSuggest({"id":"x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist","forceSelect":false});
</script>
<?php echo $patient_ot_delivery_register->Anaesthetist->Lookup->getParamTag("p_x" . $patient_ot_delivery_register_grid->RowIndex . "_Anaesthetist") ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Anaesthetist" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" value="<?php echo HtmlEncode($patient_ot_delivery_register->Anaesthetist->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_Anaesthetist" class="form-group patient_ot_delivery_register_Anaesthetist">
<?php
$wrkonchange = "" . trim(@$patient_ot_delivery_register->Anaesthetist->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_ot_delivery_register->Anaesthetist->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" class="text-nowrap" style="z-index: <?php echo (9000 - $patient_ot_delivery_register_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" id="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" value="<?php echo RemoveHtml($patient_ot_delivery_register->Anaesthetist->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->Anaesthetist->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->Anaesthetist->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register->Anaesthetist->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Anaesthetist" data-value-separator="<?php echo $patient_ot_delivery_register->Anaesthetist->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" value="<?php echo HtmlEncode($patient_ot_delivery_register->Anaesthetist->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpatient_ot_delivery_registergrid.createAutoSuggest({"id":"x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist","forceSelect":false});
</script>
<?php echo $patient_ot_delivery_register->Anaesthetist->Lookup->getParamTag("p_x" . $patient_ot_delivery_register_grid->RowIndex . "_Anaesthetist") ?>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_Anaesthetist" class="patient_ot_delivery_register_Anaesthetist">
<span<?php echo $patient_ot_delivery_register->Anaesthetist->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->Anaesthetist->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Anaesthetist" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" value="<?php echo HtmlEncode($patient_ot_delivery_register->Anaesthetist->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Anaesthetist" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" value="<?php echo HtmlEncode($patient_ot_delivery_register->Anaesthetist->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Anaesthetist" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" value="<?php echo HtmlEncode($patient_ot_delivery_register->Anaesthetist->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Anaesthetist" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" value="<?php echo HtmlEncode($patient_ot_delivery_register->Anaesthetist->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->AsstSurgeon1->Visible) { // AsstSurgeon1 ?>
		<td data-name="AsstSurgeon1"<?php echo $patient_ot_delivery_register->AsstSurgeon1->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_AsstSurgeon1" class="form-group patient_ot_delivery_register_AsstSurgeon1">
<?php
$wrkonchange = "" . trim(@$patient_ot_delivery_register->AsstSurgeon1->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_ot_delivery_register->AsstSurgeon1->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" class="text-nowrap" style="z-index: <?php echo (9000 - $patient_ot_delivery_register_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" id="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" value="<?php echo RemoveHtml($patient_ot_delivery_register->AsstSurgeon1->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->AsstSurgeon1->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->AsstSurgeon1->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register->AsstSurgeon1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon1" data-value-separator="<?php echo $patient_ot_delivery_register->AsstSurgeon1->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" value="<?php echo HtmlEncode($patient_ot_delivery_register->AsstSurgeon1->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpatient_ot_delivery_registergrid.createAutoSuggest({"id":"x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1","forceSelect":false});
</script>
<?php echo $patient_ot_delivery_register->AsstSurgeon1->Lookup->getParamTag("p_x" . $patient_ot_delivery_register_grid->RowIndex . "_AsstSurgeon1") ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" value="<?php echo HtmlEncode($patient_ot_delivery_register->AsstSurgeon1->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_AsstSurgeon1" class="form-group patient_ot_delivery_register_AsstSurgeon1">
<?php
$wrkonchange = "" . trim(@$patient_ot_delivery_register->AsstSurgeon1->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_ot_delivery_register->AsstSurgeon1->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" class="text-nowrap" style="z-index: <?php echo (9000 - $patient_ot_delivery_register_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" id="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" value="<?php echo RemoveHtml($patient_ot_delivery_register->AsstSurgeon1->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->AsstSurgeon1->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->AsstSurgeon1->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register->AsstSurgeon1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon1" data-value-separator="<?php echo $patient_ot_delivery_register->AsstSurgeon1->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" value="<?php echo HtmlEncode($patient_ot_delivery_register->AsstSurgeon1->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpatient_ot_delivery_registergrid.createAutoSuggest({"id":"x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1","forceSelect":false});
</script>
<?php echo $patient_ot_delivery_register->AsstSurgeon1->Lookup->getParamTag("p_x" . $patient_ot_delivery_register_grid->RowIndex . "_AsstSurgeon1") ?>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_AsstSurgeon1" class="patient_ot_delivery_register_AsstSurgeon1">
<span<?php echo $patient_ot_delivery_register->AsstSurgeon1->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->AsstSurgeon1->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" value="<?php echo HtmlEncode($patient_ot_delivery_register->AsstSurgeon1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" value="<?php echo HtmlEncode($patient_ot_delivery_register->AsstSurgeon1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon1" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" value="<?php echo HtmlEncode($patient_ot_delivery_register->AsstSurgeon1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon1" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" value="<?php echo HtmlEncode($patient_ot_delivery_register->AsstSurgeon1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->AsstSurgeon2->Visible) { // AsstSurgeon2 ?>
		<td data-name="AsstSurgeon2"<?php echo $patient_ot_delivery_register->AsstSurgeon2->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_AsstSurgeon2" class="form-group patient_ot_delivery_register_AsstSurgeon2">
<?php
$wrkonchange = "" . trim(@$patient_ot_delivery_register->AsstSurgeon2->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_ot_delivery_register->AsstSurgeon2->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" class="text-nowrap" style="z-index: <?php echo (9000 - $patient_ot_delivery_register_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" id="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" value="<?php echo RemoveHtml($patient_ot_delivery_register->AsstSurgeon2->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->AsstSurgeon2->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->AsstSurgeon2->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register->AsstSurgeon2->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon2" data-value-separator="<?php echo $patient_ot_delivery_register->AsstSurgeon2->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" value="<?php echo HtmlEncode($patient_ot_delivery_register->AsstSurgeon2->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpatient_ot_delivery_registergrid.createAutoSuggest({"id":"x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2","forceSelect":false});
</script>
<?php echo $patient_ot_delivery_register->AsstSurgeon2->Lookup->getParamTag("p_x" . $patient_ot_delivery_register_grid->RowIndex . "_AsstSurgeon2") ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon2" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" value="<?php echo HtmlEncode($patient_ot_delivery_register->AsstSurgeon2->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_AsstSurgeon2" class="form-group patient_ot_delivery_register_AsstSurgeon2">
<?php
$wrkonchange = "" . trim(@$patient_ot_delivery_register->AsstSurgeon2->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_ot_delivery_register->AsstSurgeon2->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" class="text-nowrap" style="z-index: <?php echo (9000 - $patient_ot_delivery_register_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" id="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" value="<?php echo RemoveHtml($patient_ot_delivery_register->AsstSurgeon2->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->AsstSurgeon2->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->AsstSurgeon2->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register->AsstSurgeon2->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon2" data-value-separator="<?php echo $patient_ot_delivery_register->AsstSurgeon2->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" value="<?php echo HtmlEncode($patient_ot_delivery_register->AsstSurgeon2->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpatient_ot_delivery_registergrid.createAutoSuggest({"id":"x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2","forceSelect":false});
</script>
<?php echo $patient_ot_delivery_register->AsstSurgeon2->Lookup->getParamTag("p_x" . $patient_ot_delivery_register_grid->RowIndex . "_AsstSurgeon2") ?>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_AsstSurgeon2" class="patient_ot_delivery_register_AsstSurgeon2">
<span<?php echo $patient_ot_delivery_register->AsstSurgeon2->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->AsstSurgeon2->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon2" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" value="<?php echo HtmlEncode($patient_ot_delivery_register->AsstSurgeon2->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon2" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" value="<?php echo HtmlEncode($patient_ot_delivery_register->AsstSurgeon2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon2" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" value="<?php echo HtmlEncode($patient_ot_delivery_register->AsstSurgeon2->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon2" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" value="<?php echo HtmlEncode($patient_ot_delivery_register->AsstSurgeon2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->paediatric->Visible) { // paediatric ?>
		<td data-name="paediatric"<?php echo $patient_ot_delivery_register->paediatric->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_paediatric" class="form-group patient_ot_delivery_register_paediatric">
<?php
$wrkonchange = "" . trim(@$patient_ot_delivery_register->paediatric->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_ot_delivery_register->paediatric->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" class="text-nowrap" style="z-index: <?php echo (9000 - $patient_ot_delivery_register_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" id="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" value="<?php echo RemoveHtml($patient_ot_delivery_register->paediatric->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->paediatric->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->paediatric->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register->paediatric->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_paediatric" data-value-separator="<?php echo $patient_ot_delivery_register->paediatric->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" value="<?php echo HtmlEncode($patient_ot_delivery_register->paediatric->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpatient_ot_delivery_registergrid.createAutoSuggest({"id":"x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric","forceSelect":false});
</script>
<?php echo $patient_ot_delivery_register->paediatric->Lookup->getParamTag("p_x" . $patient_ot_delivery_register_grid->RowIndex . "_paediatric") ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_paediatric" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" value="<?php echo HtmlEncode($patient_ot_delivery_register->paediatric->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_paediatric" class="form-group patient_ot_delivery_register_paediatric">
<?php
$wrkonchange = "" . trim(@$patient_ot_delivery_register->paediatric->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_ot_delivery_register->paediatric->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" class="text-nowrap" style="z-index: <?php echo (9000 - $patient_ot_delivery_register_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" id="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" value="<?php echo RemoveHtml($patient_ot_delivery_register->paediatric->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->paediatric->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->paediatric->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register->paediatric->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_paediatric" data-value-separator="<?php echo $patient_ot_delivery_register->paediatric->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" value="<?php echo HtmlEncode($patient_ot_delivery_register->paediatric->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpatient_ot_delivery_registergrid.createAutoSuggest({"id":"x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric","forceSelect":false});
</script>
<?php echo $patient_ot_delivery_register->paediatric->Lookup->getParamTag("p_x" . $patient_ot_delivery_register_grid->RowIndex . "_paediatric") ?>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_paediatric" class="patient_ot_delivery_register_paediatric">
<span<?php echo $patient_ot_delivery_register->paediatric->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->paediatric->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_paediatric" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" value="<?php echo HtmlEncode($patient_ot_delivery_register->paediatric->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_paediatric" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" value="<?php echo HtmlEncode($patient_ot_delivery_register->paediatric->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_paediatric" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" value="<?php echo HtmlEncode($patient_ot_delivery_register->paediatric->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_paediatric" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" value="<?php echo HtmlEncode($patient_ot_delivery_register->paediatric->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ScrubNurse1->Visible) { // ScrubNurse1 ?>
		<td data-name="ScrubNurse1"<?php echo $patient_ot_delivery_register->ScrubNurse1->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ScrubNurse1" class="form-group patient_ot_delivery_register_ScrubNurse1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ScrubNurse1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ScrubNurse1->EditValue ?>"<?php echo $patient_ot_delivery_register->ScrubNurse1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ScrubNurse1->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ScrubNurse1" class="form-group patient_ot_delivery_register_ScrubNurse1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ScrubNurse1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ScrubNurse1->EditValue ?>"<?php echo $patient_ot_delivery_register->ScrubNurse1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ScrubNurse1" class="patient_ot_delivery_register_ScrubNurse1">
<span<?php echo $patient_ot_delivery_register->ScrubNurse1->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ScrubNurse1->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ScrubNurse1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ScrubNurse1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse1" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse1" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ScrubNurse1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse1" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse1" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ScrubNurse1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ScrubNurse2->Visible) { // ScrubNurse2 ?>
		<td data-name="ScrubNurse2"<?php echo $patient_ot_delivery_register->ScrubNurse2->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ScrubNurse2" class="form-group patient_ot_delivery_register_ScrubNurse2">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse2" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse2" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse2" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ScrubNurse2->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ScrubNurse2->EditValue ?>"<?php echo $patient_ot_delivery_register->ScrubNurse2->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse2" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse2" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse2" value="<?php echo HtmlEncode($patient_ot_delivery_register->ScrubNurse2->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ScrubNurse2" class="form-group patient_ot_delivery_register_ScrubNurse2">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse2" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse2" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse2" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ScrubNurse2->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ScrubNurse2->EditValue ?>"<?php echo $patient_ot_delivery_register->ScrubNurse2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_ScrubNurse2" class="patient_ot_delivery_register_ScrubNurse2">
<span<?php echo $patient_ot_delivery_register->ScrubNurse2->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ScrubNurse2->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse2" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse2" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse2" value="<?php echo HtmlEncode($patient_ot_delivery_register->ScrubNurse2->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse2" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse2" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse2" value="<?php echo HtmlEncode($patient_ot_delivery_register->ScrubNurse2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse2" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse2" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse2" value="<?php echo HtmlEncode($patient_ot_delivery_register->ScrubNurse2->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse2" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse2" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse2" value="<?php echo HtmlEncode($patient_ot_delivery_register->ScrubNurse2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->FloorNurse->Visible) { // FloorNurse ?>
		<td data-name="FloorNurse"<?php echo $patient_ot_delivery_register->FloorNurse->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_FloorNurse" class="form-group patient_ot_delivery_register_FloorNurse">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_FloorNurse" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_FloorNurse" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_FloorNurse" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->FloorNurse->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->FloorNurse->EditValue ?>"<?php echo $patient_ot_delivery_register->FloorNurse->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_FloorNurse" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_FloorNurse" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_FloorNurse" value="<?php echo HtmlEncode($patient_ot_delivery_register->FloorNurse->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_FloorNurse" class="form-group patient_ot_delivery_register_FloorNurse">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_FloorNurse" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_FloorNurse" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_FloorNurse" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->FloorNurse->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->FloorNurse->EditValue ?>"<?php echo $patient_ot_delivery_register->FloorNurse->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_FloorNurse" class="patient_ot_delivery_register_FloorNurse">
<span<?php echo $patient_ot_delivery_register->FloorNurse->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->FloorNurse->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_FloorNurse" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_FloorNurse" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_FloorNurse" value="<?php echo HtmlEncode($patient_ot_delivery_register->FloorNurse->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_FloorNurse" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_FloorNurse" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_FloorNurse" value="<?php echo HtmlEncode($patient_ot_delivery_register->FloorNurse->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_FloorNurse" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_FloorNurse" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_FloorNurse" value="<?php echo HtmlEncode($patient_ot_delivery_register->FloorNurse->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_FloorNurse" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_FloorNurse" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_FloorNurse" value="<?php echo HtmlEncode($patient_ot_delivery_register->FloorNurse->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->Technician->Visible) { // Technician ?>
		<td data-name="Technician"<?php echo $patient_ot_delivery_register->Technician->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_Technician" class="form-group patient_ot_delivery_register_Technician">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_Technician" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Technician" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Technician" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->Technician->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->Technician->EditValue ?>"<?php echo $patient_ot_delivery_register->Technician->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Technician" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Technician" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Technician" value="<?php echo HtmlEncode($patient_ot_delivery_register->Technician->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_Technician" class="form-group patient_ot_delivery_register_Technician">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_Technician" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Technician" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Technician" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->Technician->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->Technician->EditValue ?>"<?php echo $patient_ot_delivery_register->Technician->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_Technician" class="patient_ot_delivery_register_Technician">
<span<?php echo $patient_ot_delivery_register->Technician->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->Technician->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Technician" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Technician" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Technician" value="<?php echo HtmlEncode($patient_ot_delivery_register->Technician->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Technician" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Technician" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Technician" value="<?php echo HtmlEncode($patient_ot_delivery_register->Technician->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Technician" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Technician" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Technician" value="<?php echo HtmlEncode($patient_ot_delivery_register->Technician->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Technician" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Technician" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Technician" value="<?php echo HtmlEncode($patient_ot_delivery_register->Technician->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->HouseKeeping->Visible) { // HouseKeeping ?>
		<td data-name="HouseKeeping"<?php echo $patient_ot_delivery_register->HouseKeeping->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_HouseKeeping" class="form-group patient_ot_delivery_register_HouseKeeping">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_HouseKeeping" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HouseKeeping" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HouseKeeping" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->HouseKeeping->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->HouseKeeping->EditValue ?>"<?php echo $patient_ot_delivery_register->HouseKeeping->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_HouseKeeping" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HouseKeeping" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HouseKeeping" value="<?php echo HtmlEncode($patient_ot_delivery_register->HouseKeeping->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_HouseKeeping" class="form-group patient_ot_delivery_register_HouseKeeping">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_HouseKeeping" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HouseKeeping" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HouseKeeping" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->HouseKeeping->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->HouseKeeping->EditValue ?>"<?php echo $patient_ot_delivery_register->HouseKeeping->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_HouseKeeping" class="patient_ot_delivery_register_HouseKeeping">
<span<?php echo $patient_ot_delivery_register->HouseKeeping->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->HouseKeeping->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_HouseKeeping" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HouseKeeping" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HouseKeeping" value="<?php echo HtmlEncode($patient_ot_delivery_register->HouseKeeping->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_HouseKeeping" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HouseKeeping" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HouseKeeping" value="<?php echo HtmlEncode($patient_ot_delivery_register->HouseKeeping->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_HouseKeeping" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HouseKeeping" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HouseKeeping" value="<?php echo HtmlEncode($patient_ot_delivery_register->HouseKeeping->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_HouseKeeping" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HouseKeeping" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HouseKeeping" value="<?php echo HtmlEncode($patient_ot_delivery_register->HouseKeeping->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->countsCheckedMops->Visible) { // countsCheckedMops ?>
		<td data-name="countsCheckedMops"<?php echo $patient_ot_delivery_register->countsCheckedMops->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_countsCheckedMops" class="form-group patient_ot_delivery_register_countsCheckedMops">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_countsCheckedMops" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_countsCheckedMops" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_countsCheckedMops" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->countsCheckedMops->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->countsCheckedMops->EditValue ?>"<?php echo $patient_ot_delivery_register->countsCheckedMops->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_countsCheckedMops" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_countsCheckedMops" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_countsCheckedMops" value="<?php echo HtmlEncode($patient_ot_delivery_register->countsCheckedMops->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_countsCheckedMops" class="form-group patient_ot_delivery_register_countsCheckedMops">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_countsCheckedMops" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_countsCheckedMops" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_countsCheckedMops" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->countsCheckedMops->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->countsCheckedMops->EditValue ?>"<?php echo $patient_ot_delivery_register->countsCheckedMops->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_countsCheckedMops" class="patient_ot_delivery_register_countsCheckedMops">
<span<?php echo $patient_ot_delivery_register->countsCheckedMops->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->countsCheckedMops->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_countsCheckedMops" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_countsCheckedMops" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_countsCheckedMops" value="<?php echo HtmlEncode($patient_ot_delivery_register->countsCheckedMops->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_countsCheckedMops" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_countsCheckedMops" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_countsCheckedMops" value="<?php echo HtmlEncode($patient_ot_delivery_register->countsCheckedMops->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_countsCheckedMops" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_countsCheckedMops" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_countsCheckedMops" value="<?php echo HtmlEncode($patient_ot_delivery_register->countsCheckedMops->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_countsCheckedMops" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_countsCheckedMops" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_countsCheckedMops" value="<?php echo HtmlEncode($patient_ot_delivery_register->countsCheckedMops->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->gauze->Visible) { // gauze ?>
		<td data-name="gauze"<?php echo $patient_ot_delivery_register->gauze->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_gauze" class="form-group patient_ot_delivery_register_gauze">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_gauze" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_gauze" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_gauze" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->gauze->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->gauze->EditValue ?>"<?php echo $patient_ot_delivery_register->gauze->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_gauze" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_gauze" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_gauze" value="<?php echo HtmlEncode($patient_ot_delivery_register->gauze->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_gauze" class="form-group patient_ot_delivery_register_gauze">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_gauze" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_gauze" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_gauze" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->gauze->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->gauze->EditValue ?>"<?php echo $patient_ot_delivery_register->gauze->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_gauze" class="patient_ot_delivery_register_gauze">
<span<?php echo $patient_ot_delivery_register->gauze->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->gauze->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_gauze" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_gauze" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_gauze" value="<?php echo HtmlEncode($patient_ot_delivery_register->gauze->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_gauze" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_gauze" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_gauze" value="<?php echo HtmlEncode($patient_ot_delivery_register->gauze->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_gauze" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_gauze" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_gauze" value="<?php echo HtmlEncode($patient_ot_delivery_register->gauze->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_gauze" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_gauze" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_gauze" value="<?php echo HtmlEncode($patient_ot_delivery_register->gauze->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->needles->Visible) { // needles ?>
		<td data-name="needles"<?php echo $patient_ot_delivery_register->needles->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_needles" class="form-group patient_ot_delivery_register_needles">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_needles" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_needles" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_needles" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->needles->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->needles->EditValue ?>"<?php echo $patient_ot_delivery_register->needles->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_needles" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_needles" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_needles" value="<?php echo HtmlEncode($patient_ot_delivery_register->needles->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_needles" class="form-group patient_ot_delivery_register_needles">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_needles" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_needles" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_needles" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->needles->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->needles->EditValue ?>"<?php echo $patient_ot_delivery_register->needles->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_needles" class="patient_ot_delivery_register_needles">
<span<?php echo $patient_ot_delivery_register->needles->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->needles->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_needles" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_needles" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_needles" value="<?php echo HtmlEncode($patient_ot_delivery_register->needles->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_needles" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_needles" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_needles" value="<?php echo HtmlEncode($patient_ot_delivery_register->needles->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_needles" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_needles" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_needles" value="<?php echo HtmlEncode($patient_ot_delivery_register->needles->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_needles" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_needles" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_needles" value="<?php echo HtmlEncode($patient_ot_delivery_register->needles->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->bloodloss->Visible) { // bloodloss ?>
		<td data-name="bloodloss"<?php echo $patient_ot_delivery_register->bloodloss->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_bloodloss" class="form-group patient_ot_delivery_register_bloodloss">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_bloodloss" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodloss" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodloss" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->bloodloss->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->bloodloss->EditValue ?>"<?php echo $patient_ot_delivery_register->bloodloss->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodloss" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodloss" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodloss" value="<?php echo HtmlEncode($patient_ot_delivery_register->bloodloss->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_bloodloss" class="form-group patient_ot_delivery_register_bloodloss">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_bloodloss" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodloss" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodloss" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->bloodloss->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->bloodloss->EditValue ?>"<?php echo $patient_ot_delivery_register->bloodloss->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_bloodloss" class="patient_ot_delivery_register_bloodloss">
<span<?php echo $patient_ot_delivery_register->bloodloss->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->bloodloss->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodloss" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodloss" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodloss" value="<?php echo HtmlEncode($patient_ot_delivery_register->bloodloss->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodloss" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodloss" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodloss" value="<?php echo HtmlEncode($patient_ot_delivery_register->bloodloss->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodloss" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodloss" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodloss" value="<?php echo HtmlEncode($patient_ot_delivery_register->bloodloss->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodloss" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodloss" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodloss" value="<?php echo HtmlEncode($patient_ot_delivery_register->bloodloss->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->bloodtransfusion->Visible) { // bloodtransfusion ?>
		<td data-name="bloodtransfusion"<?php echo $patient_ot_delivery_register->bloodtransfusion->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_bloodtransfusion" class="form-group patient_ot_delivery_register_bloodtransfusion">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_bloodtransfusion" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodtransfusion" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodtransfusion" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->bloodtransfusion->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->bloodtransfusion->EditValue ?>"<?php echo $patient_ot_delivery_register->bloodtransfusion->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodtransfusion" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodtransfusion" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodtransfusion" value="<?php echo HtmlEncode($patient_ot_delivery_register->bloodtransfusion->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_bloodtransfusion" class="form-group patient_ot_delivery_register_bloodtransfusion">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_bloodtransfusion" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodtransfusion" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodtransfusion" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->bloodtransfusion->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->bloodtransfusion->EditValue ?>"<?php echo $patient_ot_delivery_register->bloodtransfusion->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_bloodtransfusion" class="patient_ot_delivery_register_bloodtransfusion">
<span<?php echo $patient_ot_delivery_register->bloodtransfusion->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->bloodtransfusion->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodtransfusion" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodtransfusion" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodtransfusion" value="<?php echo HtmlEncode($patient_ot_delivery_register->bloodtransfusion->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodtransfusion" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodtransfusion" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodtransfusion" value="<?php echo HtmlEncode($patient_ot_delivery_register->bloodtransfusion->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodtransfusion" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodtransfusion" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodtransfusion" value="<?php echo HtmlEncode($patient_ot_delivery_register->bloodtransfusion->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodtransfusion" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodtransfusion" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodtransfusion" value="<?php echo HtmlEncode($patient_ot_delivery_register->bloodtransfusion->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->Reception->Visible) { // Reception ?>
		<td data-name="Reception"<?php echo $patient_ot_delivery_register->Reception->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_ot_delivery_register->Reception->getSessionValue() <> "") { ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_Reception" class="form-group patient_ot_delivery_register_Reception">
<span<?php echo $patient_ot_delivery_register->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->Reception->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_ot_delivery_register->Reception->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_Reception" class="form-group patient_ot_delivery_register_Reception">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_Reception" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" size="30" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->Reception->EditValue ?>"<?php echo $patient_ot_delivery_register->Reception->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Reception" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_ot_delivery_register->Reception->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($patient_ot_delivery_register->Reception->getSessionValue() <> "") { ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_Reception" class="form-group patient_ot_delivery_register_Reception">
<span<?php echo $patient_ot_delivery_register->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->Reception->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_ot_delivery_register->Reception->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_Reception" class="form-group patient_ot_delivery_register_Reception">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_Reception" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" size="30" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->Reception->EditValue ?>"<?php echo $patient_ot_delivery_register->Reception->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_Reception" class="patient_ot_delivery_register_Reception">
<span<?php echo $patient_ot_delivery_register->Reception->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->Reception->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Reception" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_ot_delivery_register->Reception->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Reception" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_ot_delivery_register->Reception->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Reception" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_ot_delivery_register->Reception->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Reception" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_ot_delivery_register->Reception->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->PId->Visible) { // PId ?>
		<td data-name="PId"<?php echo $patient_ot_delivery_register->PId->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_ot_delivery_register->PId->getSessionValue() <> "") { ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_PId" class="form-group patient_ot_delivery_register_PId">
<span<?php echo $patient_ot_delivery_register->PId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->PId->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" value="<?php echo HtmlEncode($patient_ot_delivery_register->PId->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_PId" class="form-group patient_ot_delivery_register_PId">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_PId" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" size="30" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->PId->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->PId->EditValue ?>"<?php echo $patient_ot_delivery_register->PId->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PId" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" value="<?php echo HtmlEncode($patient_ot_delivery_register->PId->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($patient_ot_delivery_register->PId->getSessionValue() <> "") { ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_PId" class="form-group patient_ot_delivery_register_PId">
<span<?php echo $patient_ot_delivery_register->PId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->PId->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" value="<?php echo HtmlEncode($patient_ot_delivery_register->PId->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_PId" class="form-group patient_ot_delivery_register_PId">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_PId" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" size="30" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->PId->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->PId->EditValue ?>"<?php echo $patient_ot_delivery_register->PId->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCnt ?>_patient_ot_delivery_register_PId" class="patient_ot_delivery_register_PId">
<span<?php echo $patient_ot_delivery_register->PId->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->PId->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PId" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" value="<?php echo HtmlEncode($patient_ot_delivery_register->PId->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PId" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" value="<?php echo HtmlEncode($patient_ot_delivery_register->PId->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PId" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" value="<?php echo HtmlEncode($patient_ot_delivery_register->PId->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PId" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" value="<?php echo HtmlEncode($patient_ot_delivery_register->PId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_ot_delivery_register_grid->ListOptions->render("body", "right", $patient_ot_delivery_register_grid->RowCnt);
?>
	</tr>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD || $patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { ?>
<script>
fpatient_ot_delivery_registergrid.updateLists(<?php echo $patient_ot_delivery_register_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$patient_ot_delivery_register->isGridAdd() || $patient_ot_delivery_register->CurrentMode == "copy")
		if (!$patient_ot_delivery_register_grid->Recordset->EOF)
			$patient_ot_delivery_register_grid->Recordset->moveNext();
}
?>
<?php
	if ($patient_ot_delivery_register->CurrentMode == "add" || $patient_ot_delivery_register->CurrentMode == "copy" || $patient_ot_delivery_register->CurrentMode == "edit") {
		$patient_ot_delivery_register_grid->RowIndex = '$rowindex$';
		$patient_ot_delivery_register_grid->loadRowValues();

		// Set row properties
		$patient_ot_delivery_register->resetAttributes();
		$patient_ot_delivery_register->RowAttrs = array_merge($patient_ot_delivery_register->RowAttrs, array('data-rowindex'=>$patient_ot_delivery_register_grid->RowIndex, 'id'=>'r0_patient_ot_delivery_register', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($patient_ot_delivery_register->RowAttrs["class"], "ew-template");
		$patient_ot_delivery_register->RowType = ROWTYPE_ADD;

		// Render row
		$patient_ot_delivery_register_grid->renderRow();

		// Render list options
		$patient_ot_delivery_register_grid->renderListOptions();
		$patient_ot_delivery_register_grid->StartRowCnt = 0;
?>
	<tr<?php echo $patient_ot_delivery_register->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_ot_delivery_register_grid->ListOptions->render("body", "left", $patient_ot_delivery_register_grid->RowIndex);
?>
	<?php if ($patient_ot_delivery_register->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_id" class="form-group patient_ot_delivery_register_id">
<span<?php echo $patient_ot_delivery_register->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_id" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_id" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_ot_delivery_register->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_id" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_id" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_ot_delivery_register->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->PatID->Visible) { // PatID ?>
		<td data-name="PatID">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_PatID" class="form-group patient_ot_delivery_register_PatID">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_PatID" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatID" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->PatID->EditValue ?>"<?php echo $patient_ot_delivery_register->PatID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_PatID" class="form-group patient_ot_delivery_register_PatID">
<span<?php echo $patient_ot_delivery_register->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->PatID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatID" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatID" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_ot_delivery_register->PatID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatID" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatID" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_ot_delivery_register->PatID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_PatientName" class="form-group patient_ot_delivery_register_PatientName">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_PatientName" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->PatientName->EditValue ?>"<?php echo $patient_ot_delivery_register->PatientName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_PatientName" class="form-group patient_ot_delivery_register_PatientName">
<span<?php echo $patient_ot_delivery_register->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->PatientName->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatientName" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_ot_delivery_register->PatientName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatientName" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientName" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_ot_delivery_register->PatientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<?php if ($patient_ot_delivery_register->mrnno->getSessionValue() <> "") { ?>
<span id="el$rowindex$_patient_ot_delivery_register_mrnno" class="form-group patient_ot_delivery_register_mrnno">
<span<?php echo $patient_ot_delivery_register->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->mrnno->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_ot_delivery_register->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_mrnno" class="form-group patient_ot_delivery_register_mrnno">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_mrnno" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->mrnno->EditValue ?>"<?php echo $patient_ot_delivery_register->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_mrnno" class="form-group patient_ot_delivery_register_mrnno">
<span<?php echo $patient_ot_delivery_register->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->mrnno->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_mrnno" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_ot_delivery_register->mrnno->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_mrnno" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_ot_delivery_register->mrnno->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_MobileNumber" class="form-group patient_ot_delivery_register_MobileNumber">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_MobileNumber" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->MobileNumber->EditValue ?>"<?php echo $patient_ot_delivery_register->MobileNumber->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_MobileNumber" class="form-group patient_ot_delivery_register_MobileNumber">
<span<?php echo $patient_ot_delivery_register->MobileNumber->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->MobileNumber->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_MobileNumber" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_ot_delivery_register->MobileNumber->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_MobileNumber" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_MobileNumber" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_ot_delivery_register->MobileNumber->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->Age->Visible) { // Age ?>
		<td data-name="Age">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Age" class="form-group patient_ot_delivery_register_Age">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_Age" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Age" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->Age->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->Age->EditValue ?>"<?php echo $patient_ot_delivery_register->Age->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Age" class="form-group patient_ot_delivery_register_Age">
<span<?php echo $patient_ot_delivery_register->Age->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->Age->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Age" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Age" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_ot_delivery_register->Age->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Age" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Age" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_ot_delivery_register->Age->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->Gender->Visible) { // Gender ?>
		<td data-name="Gender">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Gender" class="form-group patient_ot_delivery_register_Gender">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_Gender" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Gender" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->Gender->EditValue ?>"<?php echo $patient_ot_delivery_register->Gender->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Gender" class="form-group patient_ot_delivery_register_Gender">
<span<?php echo $patient_ot_delivery_register->Gender->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->Gender->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Gender" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Gender" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_ot_delivery_register->Gender->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Gender" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Gender" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_ot_delivery_register->Gender->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ObstetricsHistryFeMale->Visible) { // ObstetricsHistryFeMale ?>
		<td data-name="ObstetricsHistryFeMale">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ObstetricsHistryFeMale" class="form-group patient_ot_delivery_register_ObstetricsHistryFeMale">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ObstetricsHistryFeMale" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ObstetricsHistryFeMale" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ObstetricsHistryFeMale" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ObstetricsHistryFeMale->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ObstetricsHistryFeMale->EditValue ?>"<?php echo $patient_ot_delivery_register->ObstetricsHistryFeMale->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ObstetricsHistryFeMale" class="form-group patient_ot_delivery_register_ObstetricsHistryFeMale">
<span<?php echo $patient_ot_delivery_register->ObstetricsHistryFeMale->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->ObstetricsHistryFeMale->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ObstetricsHistryFeMale" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ObstetricsHistryFeMale" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ObstetricsHistryFeMale" value="<?php echo HtmlEncode($patient_ot_delivery_register->ObstetricsHistryFeMale->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ObstetricsHistryFeMale" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ObstetricsHistryFeMale" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ObstetricsHistryFeMale" value="<?php echo HtmlEncode($patient_ot_delivery_register->ObstetricsHistryFeMale->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->Abortion->Visible) { // Abortion ?>
		<td data-name="Abortion">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Abortion" class="form-group patient_ot_delivery_register_Abortion">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_Abortion" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Abortion" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Abortion" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->Abortion->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->Abortion->EditValue ?>"<?php echo $patient_ot_delivery_register->Abortion->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Abortion" class="form-group patient_ot_delivery_register_Abortion">
<span<?php echo $patient_ot_delivery_register->Abortion->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->Abortion->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Abortion" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Abortion" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Abortion" value="<?php echo HtmlEncode($patient_ot_delivery_register->Abortion->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Abortion" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Abortion" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Abortion" value="<?php echo HtmlEncode($patient_ot_delivery_register->Abortion->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ChildBirthDate->Visible) { // ChildBirthDate ?>
		<td data-name="ChildBirthDate">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildBirthDate" class="form-group patient_ot_delivery_register_ChildBirthDate">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate" data-format="7" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBirthDate->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildBirthDate->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildBirthDate->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->ChildBirthDate->ReadOnly && !$patient_ot_delivery_register->ChildBirthDate->Disabled && !isset($patient_ot_delivery_register->ChildBirthDate->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->ChildBirthDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildBirthDate" class="form-group patient_ot_delivery_register_ChildBirthDate">
<span<?php echo $patient_ot_delivery_register->ChildBirthDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->ChildBirthDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBirthDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBirthDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ChildBirthTime->Visible) { // ChildBirthTime ?>
		<td data-name="ChildBirthTime">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildBirthTime" class="form-group patient_ot_delivery_register_ChildBirthTime">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBirthTime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildBirthTime->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildBirthTime->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->ChildBirthTime->ReadOnly && !$patient_ot_delivery_register->ChildBirthTime->Disabled && !isset($patient_ot_delivery_register->ChildBirthTime->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->ChildBirthTime->EditAttrs["disabled"])) { ?>
<script>ew.createTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime", {"timeFormat":"h:i A","step":15});</script><?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildBirthTime" class="form-group patient_ot_delivery_register_ChildBirthTime">
<span<?php echo $patient_ot_delivery_register->ChildBirthTime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->ChildBirthTime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBirthTime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBirthTime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ChildSex->Visible) { // ChildSex ?>
		<td data-name="ChildSex">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildSex" class="form-group patient_ot_delivery_register_ChildSex">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildSex" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildSex->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildSex->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildSex->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildSex" class="form-group patient_ot_delivery_register_ChildSex">
<span<?php echo $patient_ot_delivery_register->ChildSex->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->ChildSex->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildSex" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildSex->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildSex" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildSex->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ChildWt->Visible) { // ChildWt ?>
		<td data-name="ChildWt">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildWt" class="form-group patient_ot_delivery_register_ChildWt">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildWt" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildWt->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildWt->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildWt->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildWt" class="form-group patient_ot_delivery_register_ChildWt">
<span<?php echo $patient_ot_delivery_register->ChildWt->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->ChildWt->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildWt" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildWt->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildWt" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildWt->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ChildDay->Visible) { // ChildDay ?>
		<td data-name="ChildDay">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildDay" class="form-group patient_ot_delivery_register_ChildDay">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildDay" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildDay->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildDay->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildDay->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildDay" class="form-group patient_ot_delivery_register_ChildDay">
<span<?php echo $patient_ot_delivery_register->ChildDay->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->ChildDay->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildDay" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildDay->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildDay" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildDay->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ChildOE->Visible) { // ChildOE ?>
		<td data-name="ChildOE">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildOE" class="form-group patient_ot_delivery_register_ChildOE">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildOE" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildOE->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildOE->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildOE->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildOE" class="form-group patient_ot_delivery_register_ChildOE">
<span<?php echo $patient_ot_delivery_register->ChildOE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->ChildOE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildOE" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildOE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildOE" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildOE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ChildBlGrp->Visible) { // ChildBlGrp ?>
		<td data-name="ChildBlGrp">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildBlGrp" class="form-group patient_ot_delivery_register_ChildBlGrp">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBlGrp->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildBlGrp->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildBlGrp->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildBlGrp" class="form-group patient_ot_delivery_register_ChildBlGrp">
<span<?php echo $patient_ot_delivery_register->ChildBlGrp->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->ChildBlGrp->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBlGrp->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBlGrp->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ApgarScore->Visible) { // ApgarScore ?>
		<td data-name="ApgarScore">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ApgarScore" class="form-group patient_ot_delivery_register_ApgarScore">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ApgarScore" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ApgarScore->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ApgarScore->EditValue ?>"<?php echo $patient_ot_delivery_register->ApgarScore->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ApgarScore" class="form-group patient_ot_delivery_register_ApgarScore">
<span<?php echo $patient_ot_delivery_register->ApgarScore->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->ApgarScore->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ApgarScore" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore" value="<?php echo HtmlEncode($patient_ot_delivery_register->ApgarScore->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ApgarScore" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore" value="<?php echo HtmlEncode($patient_ot_delivery_register->ApgarScore->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->birthnotification->Visible) { // birthnotification ?>
		<td data-name="birthnotification">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_birthnotification" class="form-group patient_ot_delivery_register_birthnotification">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_birthnotification" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->birthnotification->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->birthnotification->EditValue ?>"<?php echo $patient_ot_delivery_register->birthnotification->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_birthnotification" class="form-group patient_ot_delivery_register_birthnotification">
<span<?php echo $patient_ot_delivery_register->birthnotification->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->birthnotification->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_birthnotification" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification" value="<?php echo HtmlEncode($patient_ot_delivery_register->birthnotification->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_birthnotification" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification" value="<?php echo HtmlEncode($patient_ot_delivery_register->birthnotification->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->formno->Visible) { // formno ?>
		<td data-name="formno">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_formno" class="form-group patient_ot_delivery_register_formno">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_formno" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->formno->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->formno->EditValue ?>"<?php echo $patient_ot_delivery_register->formno->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_formno" class="form-group patient_ot_delivery_register_formno">
<span<?php echo $patient_ot_delivery_register->formno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->formno->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_formno" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno" value="<?php echo HtmlEncode($patient_ot_delivery_register->formno->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_formno" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno" value="<?php echo HtmlEncode($patient_ot_delivery_register->formno->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->dte->Visible) { // dte ?>
		<td data-name="dte">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_dte" class="form-group patient_ot_delivery_register_dte">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_dte" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_dte" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_dte" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->dte->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->dte->EditValue ?>"<?php echo $patient_ot_delivery_register->dte->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->dte->ReadOnly && !$patient_ot_delivery_register->dte->Disabled && !isset($patient_ot_delivery_register->dte->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->dte->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_dte", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_dte" class="form-group patient_ot_delivery_register_dte">
<span<?php echo $patient_ot_delivery_register->dte->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->dte->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_dte" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_dte" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_dte" value="<?php echo HtmlEncode($patient_ot_delivery_register->dte->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_dte" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_dte" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_dte" value="<?php echo HtmlEncode($patient_ot_delivery_register->dte->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->motherReligion->Visible) { // motherReligion ?>
		<td data-name="motherReligion">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_motherReligion" class="form-group patient_ot_delivery_register_motherReligion">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_motherReligion" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_motherReligion" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_motherReligion" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->motherReligion->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->motherReligion->EditValue ?>"<?php echo $patient_ot_delivery_register->motherReligion->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_motherReligion" class="form-group patient_ot_delivery_register_motherReligion">
<span<?php echo $patient_ot_delivery_register->motherReligion->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->motherReligion->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_motherReligion" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_motherReligion" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_motherReligion" value="<?php echo HtmlEncode($patient_ot_delivery_register->motherReligion->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_motherReligion" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_motherReligion" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_motherReligion" value="<?php echo HtmlEncode($patient_ot_delivery_register->motherReligion->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->bloodgroup->Visible) { // bloodgroup ?>
		<td data-name="bloodgroup">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_bloodgroup" class="form-group patient_ot_delivery_register_bloodgroup">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_bloodgroup" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodgroup" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodgroup" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->bloodgroup->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->bloodgroup->EditValue ?>"<?php echo $patient_ot_delivery_register->bloodgroup->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_bloodgroup" class="form-group patient_ot_delivery_register_bloodgroup">
<span<?php echo $patient_ot_delivery_register->bloodgroup->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->bloodgroup->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodgroup" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodgroup" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodgroup" value="<?php echo HtmlEncode($patient_ot_delivery_register->bloodgroup->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodgroup" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodgroup" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodgroup" value="<?php echo HtmlEncode($patient_ot_delivery_register->bloodgroup->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->status->Visible) { // status ?>
		<td data-name="status">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_status" class="form-group patient_ot_delivery_register_status">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_status" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_status" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->status->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->status->EditValue ?>"<?php echo $patient_ot_delivery_register->status->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_status" class="form-group patient_ot_delivery_register_status">
<span<?php echo $patient_ot_delivery_register->status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->status->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_status" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_status" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_ot_delivery_register->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_status" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_status" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_ot_delivery_register->status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->createdby->Visible) { // createdby ?>
		<td data-name="createdby">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_createdby" class="form-group patient_ot_delivery_register_createdby">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_createdby" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createdby" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createdby" size="30" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->createdby->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->createdby->EditValue ?>"<?php echo $patient_ot_delivery_register->createdby->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_createdby" class="form-group patient_ot_delivery_register_createdby">
<span<?php echo $patient_ot_delivery_register->createdby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->createdby->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_createdby" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createdby" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_ot_delivery_register->createdby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_createdby" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createdby" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_ot_delivery_register->createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_createddatetime" class="form-group patient_ot_delivery_register_createddatetime">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_createddatetime" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createddatetime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->createddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->createddatetime->EditValue ?>"<?php echo $patient_ot_delivery_register->createddatetime->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->createddatetime->ReadOnly && !$patient_ot_delivery_register->createddatetime->Disabled && !isset($patient_ot_delivery_register->createddatetime->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_createddatetime" class="form-group patient_ot_delivery_register_createddatetime">
<span<?php echo $patient_ot_delivery_register->createddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->createddatetime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_createddatetime" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createddatetime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_ot_delivery_register->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_createddatetime" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createddatetime" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_ot_delivery_register->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_modifiedby" class="form-group patient_ot_delivery_register_modifiedby">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_modifiedby" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifiedby" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifiedby" size="30" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->modifiedby->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->modifiedby->EditValue ?>"<?php echo $patient_ot_delivery_register->modifiedby->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_modifiedby" class="form-group patient_ot_delivery_register_modifiedby">
<span<?php echo $patient_ot_delivery_register->modifiedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->modifiedby->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_modifiedby" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifiedby" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_ot_delivery_register->modifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_modifiedby" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifiedby" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_ot_delivery_register->modifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_modifieddatetime" class="form-group patient_ot_delivery_register_modifieddatetime">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_modifieddatetime" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifieddatetime" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->modifieddatetime->EditValue ?>"<?php echo $patient_ot_delivery_register->modifieddatetime->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->modifieddatetime->ReadOnly && !$patient_ot_delivery_register->modifieddatetime->Disabled && !isset($patient_ot_delivery_register->modifieddatetime->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_modifieddatetime" class="form-group patient_ot_delivery_register_modifieddatetime">
<span<?php echo $patient_ot_delivery_register->modifieddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->modifieddatetime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_modifieddatetime" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_ot_delivery_register->modifieddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_modifieddatetime" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_ot_delivery_register->modifieddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_PatientID" class="form-group patient_ot_delivery_register_PatientID">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_PatientID" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientID" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->PatientID->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->PatientID->EditValue ?>"<?php echo $patient_ot_delivery_register->PatientID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_PatientID" class="form-group patient_ot_delivery_register_PatientID">
<span<?php echo $patient_ot_delivery_register->PatientID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->PatientID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatientID" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientID" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientID" value="<?php echo HtmlEncode($patient_ot_delivery_register->PatientID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatientID" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientID" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientID" value="<?php echo HtmlEncode($patient_ot_delivery_register->PatientID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_HospID" class="form-group patient_ot_delivery_register_HospID">
<span<?php echo $patient_ot_delivery_register->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->HospID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_HospID" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HospID" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_ot_delivery_register->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_HospID" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HospID" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_ot_delivery_register->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ChildBirthDate1->Visible) { // ChildBirthDate1 ?>
		<td data-name="ChildBirthDate1">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildBirthDate1" class="form-group patient_ot_delivery_register_ChildBirthDate1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate1" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBirthDate1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildBirthDate1->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildBirthDate1->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->ChildBirthDate1->ReadOnly && !$patient_ot_delivery_register->ChildBirthDate1->Disabled && !isset($patient_ot_delivery_register->ChildBirthDate1->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->ChildBirthDate1->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate1", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildBirthDate1" class="form-group patient_ot_delivery_register_ChildBirthDate1">
<span<?php echo $patient_ot_delivery_register->ChildBirthDate1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->ChildBirthDate1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBirthDate1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBirthDate1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ChildBirthTime1->Visible) { // ChildBirthTime1 ?>
		<td data-name="ChildBirthTime1">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildBirthTime1" class="form-group patient_ot_delivery_register_ChildBirthTime1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBirthTime1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildBirthTime1->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildBirthTime1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildBirthTime1" class="form-group patient_ot_delivery_register_ChildBirthTime1">
<span<?php echo $patient_ot_delivery_register->ChildBirthTime1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->ChildBirthTime1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBirthTime1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBirthTime1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ChildSex1->Visible) { // ChildSex1 ?>
		<td data-name="ChildSex1">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildSex1" class="form-group patient_ot_delivery_register_ChildSex1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildSex1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildSex1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildSex1->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildSex1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildSex1" class="form-group patient_ot_delivery_register_ChildSex1">
<span<?php echo $patient_ot_delivery_register->ChildSex1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->ChildSex1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildSex1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildSex1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildSex1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildSex1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ChildWt1->Visible) { // ChildWt1 ?>
		<td data-name="ChildWt1">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildWt1" class="form-group patient_ot_delivery_register_ChildWt1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildWt1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildWt1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildWt1->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildWt1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildWt1" class="form-group patient_ot_delivery_register_ChildWt1">
<span<?php echo $patient_ot_delivery_register->ChildWt1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->ChildWt1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildWt1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildWt1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildWt1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildWt1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ChildDay1->Visible) { // ChildDay1 ?>
		<td data-name="ChildDay1">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildDay1" class="form-group patient_ot_delivery_register_ChildDay1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildDay1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildDay1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildDay1->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildDay1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildDay1" class="form-group patient_ot_delivery_register_ChildDay1">
<span<?php echo $patient_ot_delivery_register->ChildDay1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->ChildDay1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildDay1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildDay1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildDay1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildDay1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ChildOE1->Visible) { // ChildOE1 ?>
		<td data-name="ChildOE1">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildOE1" class="form-group patient_ot_delivery_register_ChildOE1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildOE1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildOE1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildOE1->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildOE1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildOE1" class="form-group patient_ot_delivery_register_ChildOE1">
<span<?php echo $patient_ot_delivery_register->ChildOE1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->ChildOE1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildOE1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildOE1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildOE1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildOE1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ChildBlGrp1->Visible) { // ChildBlGrp1 ?>
		<td data-name="ChildBlGrp1">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildBlGrp1" class="form-group patient_ot_delivery_register_ChildBlGrp1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBlGrp1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ChildBlGrp1->EditValue ?>"<?php echo $patient_ot_delivery_register->ChildBlGrp1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildBlGrp1" class="form-group patient_ot_delivery_register_ChildBlGrp1">
<span<?php echo $patient_ot_delivery_register->ChildBlGrp1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->ChildBlGrp1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBlGrp1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ChildBlGrp1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ApgarScore1->Visible) { // ApgarScore1 ?>
		<td data-name="ApgarScore1">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ApgarScore1" class="form-group patient_ot_delivery_register_ApgarScore1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ApgarScore1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ApgarScore1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ApgarScore1->EditValue ?>"<?php echo $patient_ot_delivery_register->ApgarScore1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ApgarScore1" class="form-group patient_ot_delivery_register_ApgarScore1">
<span<?php echo $patient_ot_delivery_register->ApgarScore1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->ApgarScore1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ApgarScore1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ApgarScore1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ApgarScore1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ApgarScore1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->birthnotification1->Visible) { // birthnotification1 ?>
		<td data-name="birthnotification1">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_birthnotification1" class="form-group patient_ot_delivery_register_birthnotification1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_birthnotification1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->birthnotification1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->birthnotification1->EditValue ?>"<?php echo $patient_ot_delivery_register->birthnotification1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_birthnotification1" class="form-group patient_ot_delivery_register_birthnotification1">
<span<?php echo $patient_ot_delivery_register->birthnotification1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->birthnotification1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_birthnotification1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification1" value="<?php echo HtmlEncode($patient_ot_delivery_register->birthnotification1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_birthnotification1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification1" value="<?php echo HtmlEncode($patient_ot_delivery_register->birthnotification1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->formno1->Visible) { // formno1 ?>
		<td data-name="formno1">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_formno1" class="form-group patient_ot_delivery_register_formno1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_formno1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->formno1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->formno1->EditValue ?>"<?php echo $patient_ot_delivery_register->formno1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_formno1" class="form-group patient_ot_delivery_register_formno1">
<span<?php echo $patient_ot_delivery_register->formno1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->formno1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_formno1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno1" value="<?php echo HtmlEncode($patient_ot_delivery_register->formno1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_formno1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno1" value="<?php echo HtmlEncode($patient_ot_delivery_register->formno1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->RecievedTime->Visible) { // RecievedTime ?>
		<td data-name="RecievedTime">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_RecievedTime" class="form-group patient_ot_delivery_register_RecievedTime">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_RecievedTime" data-format="11" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecievedTime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecievedTime" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->RecievedTime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->RecievedTime->EditValue ?>"<?php echo $patient_ot_delivery_register->RecievedTime->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->RecievedTime->ReadOnly && !$patient_ot_delivery_register->RecievedTime->Disabled && !isset($patient_ot_delivery_register->RecievedTime->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->RecievedTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecievedTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_RecievedTime" class="form-group patient_ot_delivery_register_RecievedTime">
<span<?php echo $patient_ot_delivery_register->RecievedTime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->RecievedTime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_RecievedTime" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecievedTime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecievedTime" value="<?php echo HtmlEncode($patient_ot_delivery_register->RecievedTime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_RecievedTime" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecievedTime" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecievedTime" value="<?php echo HtmlEncode($patient_ot_delivery_register->RecievedTime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->AnaesthesiaStarted->Visible) { // AnaesthesiaStarted ?>
		<td data-name="AnaesthesiaStarted">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_AnaesthesiaStarted" class="form-group patient_ot_delivery_register_AnaesthesiaStarted">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaStarted" data-format="11" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaStarted" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaStarted" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->AnaesthesiaStarted->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->AnaesthesiaStarted->EditValue ?>"<?php echo $patient_ot_delivery_register->AnaesthesiaStarted->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->AnaesthesiaStarted->ReadOnly && !$patient_ot_delivery_register->AnaesthesiaStarted->Disabled && !isset($patient_ot_delivery_register->AnaesthesiaStarted->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->AnaesthesiaStarted->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaStarted", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_AnaesthesiaStarted" class="form-group patient_ot_delivery_register_AnaesthesiaStarted">
<span<?php echo $patient_ot_delivery_register->AnaesthesiaStarted->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->AnaesthesiaStarted->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaStarted" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaStarted" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaStarted" value="<?php echo HtmlEncode($patient_ot_delivery_register->AnaesthesiaStarted->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaStarted" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaStarted" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaStarted" value="<?php echo HtmlEncode($patient_ot_delivery_register->AnaesthesiaStarted->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->AnaesthesiaEnded->Visible) { // AnaesthesiaEnded ?>
		<td data-name="AnaesthesiaEnded">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_AnaesthesiaEnded" class="form-group patient_ot_delivery_register_AnaesthesiaEnded">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaEnded" data-format="11" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaEnded" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaEnded" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->AnaesthesiaEnded->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->AnaesthesiaEnded->EditValue ?>"<?php echo $patient_ot_delivery_register->AnaesthesiaEnded->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->AnaesthesiaEnded->ReadOnly && !$patient_ot_delivery_register->AnaesthesiaEnded->Disabled && !isset($patient_ot_delivery_register->AnaesthesiaEnded->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->AnaesthesiaEnded->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaEnded", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_AnaesthesiaEnded" class="form-group patient_ot_delivery_register_AnaesthesiaEnded">
<span<?php echo $patient_ot_delivery_register->AnaesthesiaEnded->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->AnaesthesiaEnded->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaEnded" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaEnded" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaEnded" value="<?php echo HtmlEncode($patient_ot_delivery_register->AnaesthesiaEnded->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaEnded" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaEnded" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaEnded" value="<?php echo HtmlEncode($patient_ot_delivery_register->AnaesthesiaEnded->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->surgeryStarted->Visible) { // surgeryStarted ?>
		<td data-name="surgeryStarted">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_surgeryStarted" class="form-group patient_ot_delivery_register_surgeryStarted">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_surgeryStarted" data-format="11" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryStarted" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryStarted" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->surgeryStarted->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->surgeryStarted->EditValue ?>"<?php echo $patient_ot_delivery_register->surgeryStarted->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->surgeryStarted->ReadOnly && !$patient_ot_delivery_register->surgeryStarted->Disabled && !isset($patient_ot_delivery_register->surgeryStarted->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->surgeryStarted->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryStarted", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_surgeryStarted" class="form-group patient_ot_delivery_register_surgeryStarted">
<span<?php echo $patient_ot_delivery_register->surgeryStarted->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->surgeryStarted->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_surgeryStarted" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryStarted" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryStarted" value="<?php echo HtmlEncode($patient_ot_delivery_register->surgeryStarted->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_surgeryStarted" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryStarted" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryStarted" value="<?php echo HtmlEncode($patient_ot_delivery_register->surgeryStarted->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->surgeryEnded->Visible) { // surgeryEnded ?>
		<td data-name="surgeryEnded">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_surgeryEnded" class="form-group patient_ot_delivery_register_surgeryEnded">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_surgeryEnded" data-format="11" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryEnded" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryEnded" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->surgeryEnded->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->surgeryEnded->EditValue ?>"<?php echo $patient_ot_delivery_register->surgeryEnded->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->surgeryEnded->ReadOnly && !$patient_ot_delivery_register->surgeryEnded->Disabled && !isset($patient_ot_delivery_register->surgeryEnded->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->surgeryEnded->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryEnded", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_surgeryEnded" class="form-group patient_ot_delivery_register_surgeryEnded">
<span<?php echo $patient_ot_delivery_register->surgeryEnded->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->surgeryEnded->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_surgeryEnded" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryEnded" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryEnded" value="<?php echo HtmlEncode($patient_ot_delivery_register->surgeryEnded->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_surgeryEnded" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryEnded" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryEnded" value="<?php echo HtmlEncode($patient_ot_delivery_register->surgeryEnded->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->RecoveryTime->Visible) { // RecoveryTime ?>
		<td data-name="RecoveryTime">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_RecoveryTime" class="form-group patient_ot_delivery_register_RecoveryTime">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_RecoveryTime" data-format="11" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecoveryTime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecoveryTime" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->RecoveryTime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->RecoveryTime->EditValue ?>"<?php echo $patient_ot_delivery_register->RecoveryTime->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->RecoveryTime->ReadOnly && !$patient_ot_delivery_register->RecoveryTime->Disabled && !isset($patient_ot_delivery_register->RecoveryTime->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->RecoveryTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecoveryTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_RecoveryTime" class="form-group patient_ot_delivery_register_RecoveryTime">
<span<?php echo $patient_ot_delivery_register->RecoveryTime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->RecoveryTime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_RecoveryTime" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecoveryTime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecoveryTime" value="<?php echo HtmlEncode($patient_ot_delivery_register->RecoveryTime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_RecoveryTime" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecoveryTime" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecoveryTime" value="<?php echo HtmlEncode($patient_ot_delivery_register->RecoveryTime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ShiftedTime->Visible) { // ShiftedTime ?>
		<td data-name="ShiftedTime">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ShiftedTime" class="form-group patient_ot_delivery_register_ShiftedTime">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ShiftedTime" data-format="11" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ShiftedTime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ShiftedTime" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ShiftedTime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ShiftedTime->EditValue ?>"<?php echo $patient_ot_delivery_register->ShiftedTime->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->ShiftedTime->ReadOnly && !$patient_ot_delivery_register->ShiftedTime->Disabled && !isset($patient_ot_delivery_register->ShiftedTime->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->ShiftedTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ShiftedTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ShiftedTime" class="form-group patient_ot_delivery_register_ShiftedTime">
<span<?php echo $patient_ot_delivery_register->ShiftedTime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->ShiftedTime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ShiftedTime" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ShiftedTime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ShiftedTime" value="<?php echo HtmlEncode($patient_ot_delivery_register->ShiftedTime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ShiftedTime" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ShiftedTime" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ShiftedTime" value="<?php echo HtmlEncode($patient_ot_delivery_register->ShiftedTime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->Duration->Visible) { // Duration ?>
		<td data-name="Duration">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Duration" class="form-group patient_ot_delivery_register_Duration">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_Duration" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Duration" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Duration" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->Duration->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->Duration->EditValue ?>"<?php echo $patient_ot_delivery_register->Duration->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Duration" class="form-group patient_ot_delivery_register_Duration">
<span<?php echo $patient_ot_delivery_register->Duration->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->Duration->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Duration" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Duration" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Duration" value="<?php echo HtmlEncode($patient_ot_delivery_register->Duration->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Duration" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Duration" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Duration" value="<?php echo HtmlEncode($patient_ot_delivery_register->Duration->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->Surgeon->Visible) { // Surgeon ?>
		<td data-name="Surgeon">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Surgeon" class="form-group patient_ot_delivery_register_Surgeon">
<?php
$wrkonchange = "" . trim(@$patient_ot_delivery_register->Surgeon->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_ot_delivery_register->Surgeon->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" class="text-nowrap" style="z-index: <?php echo (9000 - $patient_ot_delivery_register_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" id="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" value="<?php echo RemoveHtml($patient_ot_delivery_register->Surgeon->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->Surgeon->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->Surgeon->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register->Surgeon->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Surgeon" data-value-separator="<?php echo $patient_ot_delivery_register->Surgeon->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" value="<?php echo HtmlEncode($patient_ot_delivery_register->Surgeon->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpatient_ot_delivery_registergrid.createAutoSuggest({"id":"x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon","forceSelect":false});
</script>
<?php echo $patient_ot_delivery_register->Surgeon->Lookup->getParamTag("p_x" . $patient_ot_delivery_register_grid->RowIndex . "_Surgeon") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Surgeon" class="form-group patient_ot_delivery_register_Surgeon">
<span<?php echo $patient_ot_delivery_register->Surgeon->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->Surgeon->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Surgeon" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" value="<?php echo HtmlEncode($patient_ot_delivery_register->Surgeon->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Surgeon" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" value="<?php echo HtmlEncode($patient_ot_delivery_register->Surgeon->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->Anaesthetist->Visible) { // Anaesthetist ?>
		<td data-name="Anaesthetist">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Anaesthetist" class="form-group patient_ot_delivery_register_Anaesthetist">
<?php
$wrkonchange = "" . trim(@$patient_ot_delivery_register->Anaesthetist->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_ot_delivery_register->Anaesthetist->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" class="text-nowrap" style="z-index: <?php echo (9000 - $patient_ot_delivery_register_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" id="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" value="<?php echo RemoveHtml($patient_ot_delivery_register->Anaesthetist->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->Anaesthetist->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->Anaesthetist->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register->Anaesthetist->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Anaesthetist" data-value-separator="<?php echo $patient_ot_delivery_register->Anaesthetist->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" value="<?php echo HtmlEncode($patient_ot_delivery_register->Anaesthetist->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpatient_ot_delivery_registergrid.createAutoSuggest({"id":"x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist","forceSelect":false});
</script>
<?php echo $patient_ot_delivery_register->Anaesthetist->Lookup->getParamTag("p_x" . $patient_ot_delivery_register_grid->RowIndex . "_Anaesthetist") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Anaesthetist" class="form-group patient_ot_delivery_register_Anaesthetist">
<span<?php echo $patient_ot_delivery_register->Anaesthetist->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->Anaesthetist->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Anaesthetist" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" value="<?php echo HtmlEncode($patient_ot_delivery_register->Anaesthetist->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Anaesthetist" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" value="<?php echo HtmlEncode($patient_ot_delivery_register->Anaesthetist->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->AsstSurgeon1->Visible) { // AsstSurgeon1 ?>
		<td data-name="AsstSurgeon1">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_AsstSurgeon1" class="form-group patient_ot_delivery_register_AsstSurgeon1">
<?php
$wrkonchange = "" . trim(@$patient_ot_delivery_register->AsstSurgeon1->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_ot_delivery_register->AsstSurgeon1->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" class="text-nowrap" style="z-index: <?php echo (9000 - $patient_ot_delivery_register_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" id="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" value="<?php echo RemoveHtml($patient_ot_delivery_register->AsstSurgeon1->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->AsstSurgeon1->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->AsstSurgeon1->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register->AsstSurgeon1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon1" data-value-separator="<?php echo $patient_ot_delivery_register->AsstSurgeon1->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" value="<?php echo HtmlEncode($patient_ot_delivery_register->AsstSurgeon1->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpatient_ot_delivery_registergrid.createAutoSuggest({"id":"x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1","forceSelect":false});
</script>
<?php echo $patient_ot_delivery_register->AsstSurgeon1->Lookup->getParamTag("p_x" . $patient_ot_delivery_register_grid->RowIndex . "_AsstSurgeon1") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_AsstSurgeon1" class="form-group patient_ot_delivery_register_AsstSurgeon1">
<span<?php echo $patient_ot_delivery_register->AsstSurgeon1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->AsstSurgeon1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" value="<?php echo HtmlEncode($patient_ot_delivery_register->AsstSurgeon1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" value="<?php echo HtmlEncode($patient_ot_delivery_register->AsstSurgeon1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->AsstSurgeon2->Visible) { // AsstSurgeon2 ?>
		<td data-name="AsstSurgeon2">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_AsstSurgeon2" class="form-group patient_ot_delivery_register_AsstSurgeon2">
<?php
$wrkonchange = "" . trim(@$patient_ot_delivery_register->AsstSurgeon2->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_ot_delivery_register->AsstSurgeon2->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" class="text-nowrap" style="z-index: <?php echo (9000 - $patient_ot_delivery_register_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" id="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" value="<?php echo RemoveHtml($patient_ot_delivery_register->AsstSurgeon2->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->AsstSurgeon2->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->AsstSurgeon2->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register->AsstSurgeon2->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon2" data-value-separator="<?php echo $patient_ot_delivery_register->AsstSurgeon2->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" value="<?php echo HtmlEncode($patient_ot_delivery_register->AsstSurgeon2->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpatient_ot_delivery_registergrid.createAutoSuggest({"id":"x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2","forceSelect":false});
</script>
<?php echo $patient_ot_delivery_register->AsstSurgeon2->Lookup->getParamTag("p_x" . $patient_ot_delivery_register_grid->RowIndex . "_AsstSurgeon2") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_AsstSurgeon2" class="form-group patient_ot_delivery_register_AsstSurgeon2">
<span<?php echo $patient_ot_delivery_register->AsstSurgeon2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->AsstSurgeon2->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon2" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" value="<?php echo HtmlEncode($patient_ot_delivery_register->AsstSurgeon2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon2" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" value="<?php echo HtmlEncode($patient_ot_delivery_register->AsstSurgeon2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->paediatric->Visible) { // paediatric ?>
		<td data-name="paediatric">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_paediatric" class="form-group patient_ot_delivery_register_paediatric">
<?php
$wrkonchange = "" . trim(@$patient_ot_delivery_register->paediatric->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_ot_delivery_register->paediatric->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" class="text-nowrap" style="z-index: <?php echo (9000 - $patient_ot_delivery_register_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" id="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" value="<?php echo RemoveHtml($patient_ot_delivery_register->paediatric->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->paediatric->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->paediatric->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register->paediatric->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_paediatric" data-value-separator="<?php echo $patient_ot_delivery_register->paediatric->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" value="<?php echo HtmlEncode($patient_ot_delivery_register->paediatric->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpatient_ot_delivery_registergrid.createAutoSuggest({"id":"x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric","forceSelect":false});
</script>
<?php echo $patient_ot_delivery_register->paediatric->Lookup->getParamTag("p_x" . $patient_ot_delivery_register_grid->RowIndex . "_paediatric") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_paediatric" class="form-group patient_ot_delivery_register_paediatric">
<span<?php echo $patient_ot_delivery_register->paediatric->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->paediatric->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_paediatric" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" value="<?php echo HtmlEncode($patient_ot_delivery_register->paediatric->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_paediatric" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" value="<?php echo HtmlEncode($patient_ot_delivery_register->paediatric->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ScrubNurse1->Visible) { // ScrubNurse1 ?>
		<td data-name="ScrubNurse1">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ScrubNurse1" class="form-group patient_ot_delivery_register_ScrubNurse1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ScrubNurse1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ScrubNurse1->EditValue ?>"<?php echo $patient_ot_delivery_register->ScrubNurse1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ScrubNurse1" class="form-group patient_ot_delivery_register_ScrubNurse1">
<span<?php echo $patient_ot_delivery_register->ScrubNurse1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->ScrubNurse1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ScrubNurse1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse1" value="<?php echo HtmlEncode($patient_ot_delivery_register->ScrubNurse1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ScrubNurse2->Visible) { // ScrubNurse2 ?>
		<td data-name="ScrubNurse2">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ScrubNurse2" class="form-group patient_ot_delivery_register_ScrubNurse2">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse2" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse2" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse2" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->ScrubNurse2->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->ScrubNurse2->EditValue ?>"<?php echo $patient_ot_delivery_register->ScrubNurse2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ScrubNurse2" class="form-group patient_ot_delivery_register_ScrubNurse2">
<span<?php echo $patient_ot_delivery_register->ScrubNurse2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->ScrubNurse2->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse2" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse2" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse2" value="<?php echo HtmlEncode($patient_ot_delivery_register->ScrubNurse2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse2" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse2" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse2" value="<?php echo HtmlEncode($patient_ot_delivery_register->ScrubNurse2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->FloorNurse->Visible) { // FloorNurse ?>
		<td data-name="FloorNurse">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_FloorNurse" class="form-group patient_ot_delivery_register_FloorNurse">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_FloorNurse" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_FloorNurse" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_FloorNurse" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->FloorNurse->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->FloorNurse->EditValue ?>"<?php echo $patient_ot_delivery_register->FloorNurse->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_FloorNurse" class="form-group patient_ot_delivery_register_FloorNurse">
<span<?php echo $patient_ot_delivery_register->FloorNurse->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->FloorNurse->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_FloorNurse" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_FloorNurse" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_FloorNurse" value="<?php echo HtmlEncode($patient_ot_delivery_register->FloorNurse->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_FloorNurse" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_FloorNurse" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_FloorNurse" value="<?php echo HtmlEncode($patient_ot_delivery_register->FloorNurse->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->Technician->Visible) { // Technician ?>
		<td data-name="Technician">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Technician" class="form-group patient_ot_delivery_register_Technician">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_Technician" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Technician" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Technician" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->Technician->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->Technician->EditValue ?>"<?php echo $patient_ot_delivery_register->Technician->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Technician" class="form-group patient_ot_delivery_register_Technician">
<span<?php echo $patient_ot_delivery_register->Technician->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->Technician->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Technician" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Technician" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Technician" value="<?php echo HtmlEncode($patient_ot_delivery_register->Technician->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Technician" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Technician" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Technician" value="<?php echo HtmlEncode($patient_ot_delivery_register->Technician->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->HouseKeeping->Visible) { // HouseKeeping ?>
		<td data-name="HouseKeeping">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_HouseKeeping" class="form-group patient_ot_delivery_register_HouseKeeping">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_HouseKeeping" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HouseKeeping" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HouseKeeping" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->HouseKeeping->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->HouseKeeping->EditValue ?>"<?php echo $patient_ot_delivery_register->HouseKeeping->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_HouseKeeping" class="form-group patient_ot_delivery_register_HouseKeeping">
<span<?php echo $patient_ot_delivery_register->HouseKeeping->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->HouseKeeping->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_HouseKeeping" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HouseKeeping" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HouseKeeping" value="<?php echo HtmlEncode($patient_ot_delivery_register->HouseKeeping->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_HouseKeeping" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HouseKeeping" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HouseKeeping" value="<?php echo HtmlEncode($patient_ot_delivery_register->HouseKeeping->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->countsCheckedMops->Visible) { // countsCheckedMops ?>
		<td data-name="countsCheckedMops">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_countsCheckedMops" class="form-group patient_ot_delivery_register_countsCheckedMops">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_countsCheckedMops" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_countsCheckedMops" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_countsCheckedMops" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->countsCheckedMops->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->countsCheckedMops->EditValue ?>"<?php echo $patient_ot_delivery_register->countsCheckedMops->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_countsCheckedMops" class="form-group patient_ot_delivery_register_countsCheckedMops">
<span<?php echo $patient_ot_delivery_register->countsCheckedMops->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->countsCheckedMops->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_countsCheckedMops" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_countsCheckedMops" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_countsCheckedMops" value="<?php echo HtmlEncode($patient_ot_delivery_register->countsCheckedMops->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_countsCheckedMops" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_countsCheckedMops" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_countsCheckedMops" value="<?php echo HtmlEncode($patient_ot_delivery_register->countsCheckedMops->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->gauze->Visible) { // gauze ?>
		<td data-name="gauze">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_gauze" class="form-group patient_ot_delivery_register_gauze">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_gauze" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_gauze" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_gauze" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->gauze->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->gauze->EditValue ?>"<?php echo $patient_ot_delivery_register->gauze->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_gauze" class="form-group patient_ot_delivery_register_gauze">
<span<?php echo $patient_ot_delivery_register->gauze->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->gauze->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_gauze" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_gauze" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_gauze" value="<?php echo HtmlEncode($patient_ot_delivery_register->gauze->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_gauze" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_gauze" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_gauze" value="<?php echo HtmlEncode($patient_ot_delivery_register->gauze->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->needles->Visible) { // needles ?>
		<td data-name="needles">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_needles" class="form-group patient_ot_delivery_register_needles">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_needles" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_needles" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_needles" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->needles->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->needles->EditValue ?>"<?php echo $patient_ot_delivery_register->needles->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_needles" class="form-group patient_ot_delivery_register_needles">
<span<?php echo $patient_ot_delivery_register->needles->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->needles->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_needles" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_needles" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_needles" value="<?php echo HtmlEncode($patient_ot_delivery_register->needles->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_needles" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_needles" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_needles" value="<?php echo HtmlEncode($patient_ot_delivery_register->needles->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->bloodloss->Visible) { // bloodloss ?>
		<td data-name="bloodloss">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_bloodloss" class="form-group patient_ot_delivery_register_bloodloss">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_bloodloss" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodloss" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodloss" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->bloodloss->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->bloodloss->EditValue ?>"<?php echo $patient_ot_delivery_register->bloodloss->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_bloodloss" class="form-group patient_ot_delivery_register_bloodloss">
<span<?php echo $patient_ot_delivery_register->bloodloss->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->bloodloss->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodloss" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodloss" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodloss" value="<?php echo HtmlEncode($patient_ot_delivery_register->bloodloss->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodloss" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodloss" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodloss" value="<?php echo HtmlEncode($patient_ot_delivery_register->bloodloss->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->bloodtransfusion->Visible) { // bloodtransfusion ?>
		<td data-name="bloodtransfusion">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_bloodtransfusion" class="form-group patient_ot_delivery_register_bloodtransfusion">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_bloodtransfusion" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodtransfusion" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodtransfusion" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->bloodtransfusion->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->bloodtransfusion->EditValue ?>"<?php echo $patient_ot_delivery_register->bloodtransfusion->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_bloodtransfusion" class="form-group patient_ot_delivery_register_bloodtransfusion">
<span<?php echo $patient_ot_delivery_register->bloodtransfusion->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->bloodtransfusion->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodtransfusion" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodtransfusion" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodtransfusion" value="<?php echo HtmlEncode($patient_ot_delivery_register->bloodtransfusion->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodtransfusion" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodtransfusion" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodtransfusion" value="<?php echo HtmlEncode($patient_ot_delivery_register->bloodtransfusion->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->Reception->Visible) { // Reception ?>
		<td data-name="Reception">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<?php if ($patient_ot_delivery_register->Reception->getSessionValue() <> "") { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Reception" class="form-group patient_ot_delivery_register_Reception">
<span<?php echo $patient_ot_delivery_register->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->Reception->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_ot_delivery_register->Reception->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Reception" class="form-group patient_ot_delivery_register_Reception">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_Reception" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" size="30" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->Reception->EditValue ?>"<?php echo $patient_ot_delivery_register->Reception->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Reception" class="form-group patient_ot_delivery_register_Reception">
<span<?php echo $patient_ot_delivery_register->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->Reception->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Reception" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_ot_delivery_register->Reception->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Reception" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_ot_delivery_register->Reception->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->PId->Visible) { // PId ?>
		<td data-name="PId">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<?php if ($patient_ot_delivery_register->PId->getSessionValue() <> "") { ?>
<span id="el$rowindex$_patient_ot_delivery_register_PId" class="form-group patient_ot_delivery_register_PId">
<span<?php echo $patient_ot_delivery_register->PId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->PId->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" value="<?php echo HtmlEncode($patient_ot_delivery_register->PId->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_PId" class="form-group patient_ot_delivery_register_PId">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_PId" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" size="30" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->PId->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->PId->EditValue ?>"<?php echo $patient_ot_delivery_register->PId->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_PId" class="form-group patient_ot_delivery_register_PId">
<span<?php echo $patient_ot_delivery_register->PId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_ot_delivery_register->PId->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PId" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" value="<?php echo HtmlEncode($patient_ot_delivery_register->PId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PId" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" value="<?php echo HtmlEncode($patient_ot_delivery_register->PId->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_ot_delivery_register_grid->ListOptions->render("body", "right", $patient_ot_delivery_register_grid->RowIndex);
?>
<script>
fpatient_ot_delivery_registergrid.updateLists(<?php echo $patient_ot_delivery_register_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($patient_ot_delivery_register->CurrentMode == "add" || $patient_ot_delivery_register->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $patient_ot_delivery_register_grid->FormKeyCountName ?>" id="<?php echo $patient_ot_delivery_register_grid->FormKeyCountName ?>" value="<?php echo $patient_ot_delivery_register_grid->KeyCount ?>">
<?php echo $patient_ot_delivery_register_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $patient_ot_delivery_register_grid->FormKeyCountName ?>" id="<?php echo $patient_ot_delivery_register_grid->FormKeyCountName ?>" value="<?php echo $patient_ot_delivery_register_grid->KeyCount ?>">
<?php echo $patient_ot_delivery_register_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fpatient_ot_delivery_registergrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($patient_ot_delivery_register_grid->Recordset)
	$patient_ot_delivery_register_grid->Recordset->Close();
?>
</div>
<?php if ($patient_ot_delivery_register_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $patient_ot_delivery_register_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->TotalRecs == 0 && !$patient_ot_delivery_register->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_ot_delivery_register_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$patient_ot_delivery_register_grid->terminate();
?>
<?php if (!$patient_ot_delivery_register->isExport()) { ?>
<script>
ew.scrollableTable("gmp_patient_ot_delivery_register", "95%", "");
</script>
<?php } ?>