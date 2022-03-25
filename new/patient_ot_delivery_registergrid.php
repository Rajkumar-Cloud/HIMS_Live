<?php
namespace PHPMaker2020\HIMS;

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
<?php if (!$patient_ot_delivery_register_grid->isExport()) { ?>
<script>
var fpatient_ot_delivery_registergrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fpatient_ot_delivery_registergrid = new ew.Form("fpatient_ot_delivery_registergrid", "grid");
	fpatient_ot_delivery_registergrid.formKeyCountName = '<?php echo $patient_ot_delivery_register_grid->FormKeyCountName ?>';

	// Validate form
	fpatient_ot_delivery_registergrid.validate = function() {
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
			<?php if ($patient_ot_delivery_register_grid->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->id->caption(), $patient_ot_delivery_register_grid->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_grid->PatID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->PatID->caption(), $patient_ot_delivery_register_grid->PatID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_grid->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->PatientName->caption(), $patient_ot_delivery_register_grid->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_grid->mrnno->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->mrnno->caption(), $patient_ot_delivery_register_grid->mrnno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_grid->MobileNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_MobileNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->MobileNumber->caption(), $patient_ot_delivery_register_grid->MobileNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_grid->Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->Age->caption(), $patient_ot_delivery_register_grid->Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_grid->Gender->Required) { ?>
				elm = this.getElements("x" + infix + "_Gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->Gender->caption(), $patient_ot_delivery_register_grid->Gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_grid->ObstetricsHistryFeMale->Required) { ?>
				elm = this.getElements("x" + infix + "_ObstetricsHistryFeMale");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->ObstetricsHistryFeMale->caption(), $patient_ot_delivery_register_grid->ObstetricsHistryFeMale->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_grid->Abortion->Required) { ?>
				elm = this.getElements("x" + infix + "_Abortion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->Abortion->caption(), $patient_ot_delivery_register_grid->Abortion->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_grid->ChildBirthDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ChildBirthDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->ChildBirthDate->caption(), $patient_ot_delivery_register_grid->ChildBirthDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ChildBirthDate");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register_grid->ChildBirthDate->errorMessage()) ?>");
			<?php if ($patient_ot_delivery_register_grid->ChildBirthTime->Required) { ?>
				elm = this.getElements("x" + infix + "_ChildBirthTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->ChildBirthTime->caption(), $patient_ot_delivery_register_grid->ChildBirthTime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_grid->ChildSex->Required) { ?>
				elm = this.getElements("x" + infix + "_ChildSex");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->ChildSex->caption(), $patient_ot_delivery_register_grid->ChildSex->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_grid->ChildWt->Required) { ?>
				elm = this.getElements("x" + infix + "_ChildWt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->ChildWt->caption(), $patient_ot_delivery_register_grid->ChildWt->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_grid->ChildDay->Required) { ?>
				elm = this.getElements("x" + infix + "_ChildDay");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->ChildDay->caption(), $patient_ot_delivery_register_grid->ChildDay->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_grid->ChildOE->Required) { ?>
				elm = this.getElements("x" + infix + "_ChildOE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->ChildOE->caption(), $patient_ot_delivery_register_grid->ChildOE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_grid->ChildBlGrp->Required) { ?>
				elm = this.getElements("x" + infix + "_ChildBlGrp");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->ChildBlGrp->caption(), $patient_ot_delivery_register_grid->ChildBlGrp->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_grid->ApgarScore->Required) { ?>
				elm = this.getElements("x" + infix + "_ApgarScore");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->ApgarScore->caption(), $patient_ot_delivery_register_grid->ApgarScore->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_grid->birthnotification->Required) { ?>
				elm = this.getElements("x" + infix + "_birthnotification");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->birthnotification->caption(), $patient_ot_delivery_register_grid->birthnotification->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_grid->formno->Required) { ?>
				elm = this.getElements("x" + infix + "_formno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->formno->caption(), $patient_ot_delivery_register_grid->formno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_grid->dte->Required) { ?>
				elm = this.getElements("x" + infix + "_dte");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->dte->caption(), $patient_ot_delivery_register_grid->dte->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_dte");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register_grid->dte->errorMessage()) ?>");
			<?php if ($patient_ot_delivery_register_grid->motherReligion->Required) { ?>
				elm = this.getElements("x" + infix + "_motherReligion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->motherReligion->caption(), $patient_ot_delivery_register_grid->motherReligion->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_grid->bloodgroup->Required) { ?>
				elm = this.getElements("x" + infix + "_bloodgroup");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->bloodgroup->caption(), $patient_ot_delivery_register_grid->bloodgroup->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_grid->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->status->caption(), $patient_ot_delivery_register_grid->status->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register_grid->status->errorMessage()) ?>");
			<?php if ($patient_ot_delivery_register_grid->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->createdby->caption(), $patient_ot_delivery_register_grid->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register_grid->createdby->errorMessage()) ?>");
			<?php if ($patient_ot_delivery_register_grid->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->createddatetime->caption(), $patient_ot_delivery_register_grid->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register_grid->createddatetime->errorMessage()) ?>");
			<?php if ($patient_ot_delivery_register_grid->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->modifiedby->caption(), $patient_ot_delivery_register_grid->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register_grid->modifiedby->errorMessage()) ?>");
			<?php if ($patient_ot_delivery_register_grid->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->modifieddatetime->caption(), $patient_ot_delivery_register_grid->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register_grid->modifieddatetime->errorMessage()) ?>");
			<?php if ($patient_ot_delivery_register_grid->PatientID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->PatientID->caption(), $patient_ot_delivery_register_grid->PatientID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_grid->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->HospID->caption(), $patient_ot_delivery_register_grid->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_grid->ChildBirthDate1->Required) { ?>
				elm = this.getElements("x" + infix + "_ChildBirthDate1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->ChildBirthDate1->caption(), $patient_ot_delivery_register_grid->ChildBirthDate1->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ChildBirthDate1");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register_grid->ChildBirthDate1->errorMessage()) ?>");
			<?php if ($patient_ot_delivery_register_grid->ChildBirthTime1->Required) { ?>
				elm = this.getElements("x" + infix + "_ChildBirthTime1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->ChildBirthTime1->caption(), $patient_ot_delivery_register_grid->ChildBirthTime1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_grid->ChildSex1->Required) { ?>
				elm = this.getElements("x" + infix + "_ChildSex1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->ChildSex1->caption(), $patient_ot_delivery_register_grid->ChildSex1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_grid->ChildWt1->Required) { ?>
				elm = this.getElements("x" + infix + "_ChildWt1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->ChildWt1->caption(), $patient_ot_delivery_register_grid->ChildWt1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_grid->ChildDay1->Required) { ?>
				elm = this.getElements("x" + infix + "_ChildDay1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->ChildDay1->caption(), $patient_ot_delivery_register_grid->ChildDay1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_grid->ChildOE1->Required) { ?>
				elm = this.getElements("x" + infix + "_ChildOE1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->ChildOE1->caption(), $patient_ot_delivery_register_grid->ChildOE1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_grid->ChildBlGrp1->Required) { ?>
				elm = this.getElements("x" + infix + "_ChildBlGrp1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->ChildBlGrp1->caption(), $patient_ot_delivery_register_grid->ChildBlGrp1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_grid->ApgarScore1->Required) { ?>
				elm = this.getElements("x" + infix + "_ApgarScore1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->ApgarScore1->caption(), $patient_ot_delivery_register_grid->ApgarScore1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_grid->birthnotification1->Required) { ?>
				elm = this.getElements("x" + infix + "_birthnotification1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->birthnotification1->caption(), $patient_ot_delivery_register_grid->birthnotification1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_grid->formno1->Required) { ?>
				elm = this.getElements("x" + infix + "_formno1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->formno1->caption(), $patient_ot_delivery_register_grid->formno1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_grid->RecievedTime->Required) { ?>
				elm = this.getElements("x" + infix + "_RecievedTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->RecievedTime->caption(), $patient_ot_delivery_register_grid->RecievedTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RecievedTime");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register_grid->RecievedTime->errorMessage()) ?>");
			<?php if ($patient_ot_delivery_register_grid->AnaesthesiaStarted->Required) { ?>
				elm = this.getElements("x" + infix + "_AnaesthesiaStarted");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->AnaesthesiaStarted->caption(), $patient_ot_delivery_register_grid->AnaesthesiaStarted->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AnaesthesiaStarted");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register_grid->AnaesthesiaStarted->errorMessage()) ?>");
			<?php if ($patient_ot_delivery_register_grid->AnaesthesiaEnded->Required) { ?>
				elm = this.getElements("x" + infix + "_AnaesthesiaEnded");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->AnaesthesiaEnded->caption(), $patient_ot_delivery_register_grid->AnaesthesiaEnded->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AnaesthesiaEnded");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register_grid->AnaesthesiaEnded->errorMessage()) ?>");
			<?php if ($patient_ot_delivery_register_grid->surgeryStarted->Required) { ?>
				elm = this.getElements("x" + infix + "_surgeryStarted");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->surgeryStarted->caption(), $patient_ot_delivery_register_grid->surgeryStarted->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_surgeryStarted");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register_grid->surgeryStarted->errorMessage()) ?>");
			<?php if ($patient_ot_delivery_register_grid->surgeryEnded->Required) { ?>
				elm = this.getElements("x" + infix + "_surgeryEnded");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->surgeryEnded->caption(), $patient_ot_delivery_register_grid->surgeryEnded->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_surgeryEnded");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register_grid->surgeryEnded->errorMessage()) ?>");
			<?php if ($patient_ot_delivery_register_grid->RecoveryTime->Required) { ?>
				elm = this.getElements("x" + infix + "_RecoveryTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->RecoveryTime->caption(), $patient_ot_delivery_register_grid->RecoveryTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RecoveryTime");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register_grid->RecoveryTime->errorMessage()) ?>");
			<?php if ($patient_ot_delivery_register_grid->ShiftedTime->Required) { ?>
				elm = this.getElements("x" + infix + "_ShiftedTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->ShiftedTime->caption(), $patient_ot_delivery_register_grid->ShiftedTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ShiftedTime");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register_grid->ShiftedTime->errorMessage()) ?>");
			<?php if ($patient_ot_delivery_register_grid->Duration->Required) { ?>
				elm = this.getElements("x" + infix + "_Duration");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->Duration->caption(), $patient_ot_delivery_register_grid->Duration->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_grid->Surgeon->Required) { ?>
				elm = this.getElements("x" + infix + "_Surgeon");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->Surgeon->caption(), $patient_ot_delivery_register_grid->Surgeon->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_grid->Anaesthetist->Required) { ?>
				elm = this.getElements("x" + infix + "_Anaesthetist");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->Anaesthetist->caption(), $patient_ot_delivery_register_grid->Anaesthetist->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_grid->AsstSurgeon1->Required) { ?>
				elm = this.getElements("x" + infix + "_AsstSurgeon1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->AsstSurgeon1->caption(), $patient_ot_delivery_register_grid->AsstSurgeon1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_grid->AsstSurgeon2->Required) { ?>
				elm = this.getElements("x" + infix + "_AsstSurgeon2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->AsstSurgeon2->caption(), $patient_ot_delivery_register_grid->AsstSurgeon2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_grid->paediatric->Required) { ?>
				elm = this.getElements("x" + infix + "_paediatric");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->paediatric->caption(), $patient_ot_delivery_register_grid->paediatric->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_grid->ScrubNurse1->Required) { ?>
				elm = this.getElements("x" + infix + "_ScrubNurse1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->ScrubNurse1->caption(), $patient_ot_delivery_register_grid->ScrubNurse1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_grid->ScrubNurse2->Required) { ?>
				elm = this.getElements("x" + infix + "_ScrubNurse2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->ScrubNurse2->caption(), $patient_ot_delivery_register_grid->ScrubNurse2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_grid->FloorNurse->Required) { ?>
				elm = this.getElements("x" + infix + "_FloorNurse");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->FloorNurse->caption(), $patient_ot_delivery_register_grid->FloorNurse->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_grid->Technician->Required) { ?>
				elm = this.getElements("x" + infix + "_Technician");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->Technician->caption(), $patient_ot_delivery_register_grid->Technician->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_grid->HouseKeeping->Required) { ?>
				elm = this.getElements("x" + infix + "_HouseKeeping");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->HouseKeeping->caption(), $patient_ot_delivery_register_grid->HouseKeeping->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_grid->countsCheckedMops->Required) { ?>
				elm = this.getElements("x" + infix + "_countsCheckedMops");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->countsCheckedMops->caption(), $patient_ot_delivery_register_grid->countsCheckedMops->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_grid->gauze->Required) { ?>
				elm = this.getElements("x" + infix + "_gauze");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->gauze->caption(), $patient_ot_delivery_register_grid->gauze->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_grid->needles->Required) { ?>
				elm = this.getElements("x" + infix + "_needles");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->needles->caption(), $patient_ot_delivery_register_grid->needles->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_grid->bloodloss->Required) { ?>
				elm = this.getElements("x" + infix + "_bloodloss");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->bloodloss->caption(), $patient_ot_delivery_register_grid->bloodloss->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_grid->bloodtransfusion->Required) { ?>
				elm = this.getElements("x" + infix + "_bloodtransfusion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->bloodtransfusion->caption(), $patient_ot_delivery_register_grid->bloodtransfusion->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_ot_delivery_register_grid->Reception->Required) { ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->Reception->caption(), $patient_ot_delivery_register_grid->Reception->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register_grid->Reception->errorMessage()) ?>");
			<?php if ($patient_ot_delivery_register_grid->PId->Required) { ?>
				elm = this.getElements("x" + infix + "_PId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_ot_delivery_register_grid->PId->caption(), $patient_ot_delivery_register_grid->PId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register_grid->PId->errorMessage()) ?>");

				// Call Form_CustomValidate event
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

	// Form_CustomValidate
	fpatient_ot_delivery_registergrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatient_ot_delivery_registergrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpatient_ot_delivery_registergrid.lists["x_Surgeon"] = <?php echo $patient_ot_delivery_register_grid->Surgeon->Lookup->toClientList($patient_ot_delivery_register_grid) ?>;
	fpatient_ot_delivery_registergrid.lists["x_Surgeon"].options = <?php echo JsonEncode($patient_ot_delivery_register_grid->Surgeon->lookupOptions()) ?>;
	fpatient_ot_delivery_registergrid.autoSuggests["x_Surgeon"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpatient_ot_delivery_registergrid.lists["x_Anaesthetist"] = <?php echo $patient_ot_delivery_register_grid->Anaesthetist->Lookup->toClientList($patient_ot_delivery_register_grid) ?>;
	fpatient_ot_delivery_registergrid.lists["x_Anaesthetist"].options = <?php echo JsonEncode($patient_ot_delivery_register_grid->Anaesthetist->lookupOptions()) ?>;
	fpatient_ot_delivery_registergrid.autoSuggests["x_Anaesthetist"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpatient_ot_delivery_registergrid.lists["x_AsstSurgeon1"] = <?php echo $patient_ot_delivery_register_grid->AsstSurgeon1->Lookup->toClientList($patient_ot_delivery_register_grid) ?>;
	fpatient_ot_delivery_registergrid.lists["x_AsstSurgeon1"].options = <?php echo JsonEncode($patient_ot_delivery_register_grid->AsstSurgeon1->lookupOptions()) ?>;
	fpatient_ot_delivery_registergrid.autoSuggests["x_AsstSurgeon1"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpatient_ot_delivery_registergrid.lists["x_AsstSurgeon2"] = <?php echo $patient_ot_delivery_register_grid->AsstSurgeon2->Lookup->toClientList($patient_ot_delivery_register_grid) ?>;
	fpatient_ot_delivery_registergrid.lists["x_AsstSurgeon2"].options = <?php echo JsonEncode($patient_ot_delivery_register_grid->AsstSurgeon2->lookupOptions()) ?>;
	fpatient_ot_delivery_registergrid.autoSuggests["x_AsstSurgeon2"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpatient_ot_delivery_registergrid.lists["x_paediatric"] = <?php echo $patient_ot_delivery_register_grid->paediatric->Lookup->toClientList($patient_ot_delivery_register_grid) ?>;
	fpatient_ot_delivery_registergrid.lists["x_paediatric"].options = <?php echo JsonEncode($patient_ot_delivery_register_grid->paediatric->lookupOptions()) ?>;
	fpatient_ot_delivery_registergrid.autoSuggests["x_paediatric"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fpatient_ot_delivery_registergrid");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<?php } ?>
<?php
$patient_ot_delivery_register_grid->renderOtherOptions();
?>
<?php if ($patient_ot_delivery_register_grid->TotalRecords > 0 || $patient_ot_delivery_register->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_ot_delivery_register_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_ot_delivery_register">
<?php if ($patient_ot_delivery_register_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $patient_ot_delivery_register_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpatient_ot_delivery_registergrid" class="ew-form ew-list-form form-inline">
<div id="gmp_patient_ot_delivery_register" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_patient_ot_delivery_registergrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_ot_delivery_register->RowType = ROWTYPE_HEADER;

// Render list options
$patient_ot_delivery_register_grid->renderListOptions();

// Render list options (header, left)
$patient_ot_delivery_register_grid->ListOptions->render("header", "left");
?>
<?php if ($patient_ot_delivery_register_grid->id->Visible) { // id ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_ot_delivery_register_grid->id->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_id" class="patient_ot_delivery_register_id"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_ot_delivery_register_grid->id->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_id" class="patient_ot_delivery_register_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->PatID->Visible) { // PatID ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $patient_ot_delivery_register_grid->PatID->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_PatID" class="patient_ot_delivery_register_PatID"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->PatID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $patient_ot_delivery_register_grid->PatID->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_PatID" class="patient_ot_delivery_register_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->PatID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->PatID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $patient_ot_delivery_register_grid->PatientName->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_PatientName" class="patient_ot_delivery_register_PatientName"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $patient_ot_delivery_register_grid->PatientName->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_PatientName" class="patient_ot_delivery_register_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $patient_ot_delivery_register_grid->mrnno->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_mrnno" class="patient_ot_delivery_register_mrnno"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $patient_ot_delivery_register_grid->mrnno->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_mrnno" class="patient_ot_delivery_register_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->mrnno->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->mrnno->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->mrnno->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->MobileNumber) == "") { ?>
		<th data-name="MobileNumber" class="<?php echo $patient_ot_delivery_register_grid->MobileNumber->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_MobileNumber" class="patient_ot_delivery_register_MobileNumber"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->MobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MobileNumber" class="<?php echo $patient_ot_delivery_register_grid->MobileNumber->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_MobileNumber" class="patient_ot_delivery_register_MobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->MobileNumber->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->MobileNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->MobileNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->Age->Visible) { // Age ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $patient_ot_delivery_register_grid->Age->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_Age" class="patient_ot_delivery_register_Age"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $patient_ot_delivery_register_grid->Age->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_Age" class="patient_ot_delivery_register_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->Age->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->Age->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->Age->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->Gender->Visible) { // Gender ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $patient_ot_delivery_register_grid->Gender->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_Gender" class="patient_ot_delivery_register_Gender"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $patient_ot_delivery_register_grid->Gender->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_Gender" class="patient_ot_delivery_register_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->Gender->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->Gender->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->Gender->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->ObstetricsHistryFeMale->Visible) { // ObstetricsHistryFeMale ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->ObstetricsHistryFeMale) == "") { ?>
		<th data-name="ObstetricsHistryFeMale" class="<?php echo $patient_ot_delivery_register_grid->ObstetricsHistryFeMale->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ObstetricsHistryFeMale" class="patient_ot_delivery_register_ObstetricsHistryFeMale"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->ObstetricsHistryFeMale->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ObstetricsHistryFeMale" class="<?php echo $patient_ot_delivery_register_grid->ObstetricsHistryFeMale->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_ObstetricsHistryFeMale" class="patient_ot_delivery_register_ObstetricsHistryFeMale">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->ObstetricsHistryFeMale->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->ObstetricsHistryFeMale->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->ObstetricsHistryFeMale->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->Abortion->Visible) { // Abortion ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->Abortion) == "") { ?>
		<th data-name="Abortion" class="<?php echo $patient_ot_delivery_register_grid->Abortion->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_Abortion" class="patient_ot_delivery_register_Abortion"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->Abortion->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Abortion" class="<?php echo $patient_ot_delivery_register_grid->Abortion->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_Abortion" class="patient_ot_delivery_register_Abortion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->Abortion->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->Abortion->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->Abortion->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->ChildBirthDate->Visible) { // ChildBirthDate ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->ChildBirthDate) == "") { ?>
		<th data-name="ChildBirthDate" class="<?php echo $patient_ot_delivery_register_grid->ChildBirthDate->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildBirthDate" class="patient_ot_delivery_register_ChildBirthDate"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->ChildBirthDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildBirthDate" class="<?php echo $patient_ot_delivery_register_grid->ChildBirthDate->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_ChildBirthDate" class="patient_ot_delivery_register_ChildBirthDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->ChildBirthDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->ChildBirthDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->ChildBirthDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->ChildBirthTime->Visible) { // ChildBirthTime ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->ChildBirthTime) == "") { ?>
		<th data-name="ChildBirthTime" class="<?php echo $patient_ot_delivery_register_grid->ChildBirthTime->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildBirthTime" class="patient_ot_delivery_register_ChildBirthTime"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->ChildBirthTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildBirthTime" class="<?php echo $patient_ot_delivery_register_grid->ChildBirthTime->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_ChildBirthTime" class="patient_ot_delivery_register_ChildBirthTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->ChildBirthTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->ChildBirthTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->ChildBirthTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->ChildSex->Visible) { // ChildSex ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->ChildSex) == "") { ?>
		<th data-name="ChildSex" class="<?php echo $patient_ot_delivery_register_grid->ChildSex->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildSex" class="patient_ot_delivery_register_ChildSex"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->ChildSex->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildSex" class="<?php echo $patient_ot_delivery_register_grid->ChildSex->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_ChildSex" class="patient_ot_delivery_register_ChildSex">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->ChildSex->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->ChildSex->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->ChildSex->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->ChildWt->Visible) { // ChildWt ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->ChildWt) == "") { ?>
		<th data-name="ChildWt" class="<?php echo $patient_ot_delivery_register_grid->ChildWt->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildWt" class="patient_ot_delivery_register_ChildWt"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->ChildWt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildWt" class="<?php echo $patient_ot_delivery_register_grid->ChildWt->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_ChildWt" class="patient_ot_delivery_register_ChildWt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->ChildWt->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->ChildWt->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->ChildWt->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->ChildDay->Visible) { // ChildDay ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->ChildDay) == "") { ?>
		<th data-name="ChildDay" class="<?php echo $patient_ot_delivery_register_grid->ChildDay->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildDay" class="patient_ot_delivery_register_ChildDay"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->ChildDay->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildDay" class="<?php echo $patient_ot_delivery_register_grid->ChildDay->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_ChildDay" class="patient_ot_delivery_register_ChildDay">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->ChildDay->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->ChildDay->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->ChildDay->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->ChildOE->Visible) { // ChildOE ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->ChildOE) == "") { ?>
		<th data-name="ChildOE" class="<?php echo $patient_ot_delivery_register_grid->ChildOE->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildOE" class="patient_ot_delivery_register_ChildOE"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->ChildOE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildOE" class="<?php echo $patient_ot_delivery_register_grid->ChildOE->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_ChildOE" class="patient_ot_delivery_register_ChildOE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->ChildOE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->ChildOE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->ChildOE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->ChildBlGrp->Visible) { // ChildBlGrp ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->ChildBlGrp) == "") { ?>
		<th data-name="ChildBlGrp" class="<?php echo $patient_ot_delivery_register_grid->ChildBlGrp->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildBlGrp" class="patient_ot_delivery_register_ChildBlGrp"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->ChildBlGrp->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildBlGrp" class="<?php echo $patient_ot_delivery_register_grid->ChildBlGrp->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_ChildBlGrp" class="patient_ot_delivery_register_ChildBlGrp">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->ChildBlGrp->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->ChildBlGrp->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->ChildBlGrp->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->ApgarScore->Visible) { // ApgarScore ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->ApgarScore) == "") { ?>
		<th data-name="ApgarScore" class="<?php echo $patient_ot_delivery_register_grid->ApgarScore->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ApgarScore" class="patient_ot_delivery_register_ApgarScore"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->ApgarScore->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ApgarScore" class="<?php echo $patient_ot_delivery_register_grid->ApgarScore->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_ApgarScore" class="patient_ot_delivery_register_ApgarScore">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->ApgarScore->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->ApgarScore->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->ApgarScore->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->birthnotification->Visible) { // birthnotification ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->birthnotification) == "") { ?>
		<th data-name="birthnotification" class="<?php echo $patient_ot_delivery_register_grid->birthnotification->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_birthnotification" class="patient_ot_delivery_register_birthnotification"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->birthnotification->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="birthnotification" class="<?php echo $patient_ot_delivery_register_grid->birthnotification->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_birthnotification" class="patient_ot_delivery_register_birthnotification">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->birthnotification->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->birthnotification->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->birthnotification->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->formno->Visible) { // formno ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->formno) == "") { ?>
		<th data-name="formno" class="<?php echo $patient_ot_delivery_register_grid->formno->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_formno" class="patient_ot_delivery_register_formno"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->formno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="formno" class="<?php echo $patient_ot_delivery_register_grid->formno->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_formno" class="patient_ot_delivery_register_formno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->formno->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->formno->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->formno->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->dte->Visible) { // dte ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->dte) == "") { ?>
		<th data-name="dte" class="<?php echo $patient_ot_delivery_register_grid->dte->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_dte" class="patient_ot_delivery_register_dte"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->dte->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="dte" class="<?php echo $patient_ot_delivery_register_grid->dte->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_dte" class="patient_ot_delivery_register_dte">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->dte->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->dte->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->dte->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->motherReligion->Visible) { // motherReligion ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->motherReligion) == "") { ?>
		<th data-name="motherReligion" class="<?php echo $patient_ot_delivery_register_grid->motherReligion->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_motherReligion" class="patient_ot_delivery_register_motherReligion"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->motherReligion->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="motherReligion" class="<?php echo $patient_ot_delivery_register_grid->motherReligion->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_motherReligion" class="patient_ot_delivery_register_motherReligion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->motherReligion->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->motherReligion->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->motherReligion->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->bloodgroup->Visible) { // bloodgroup ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->bloodgroup) == "") { ?>
		<th data-name="bloodgroup" class="<?php echo $patient_ot_delivery_register_grid->bloodgroup->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_bloodgroup" class="patient_ot_delivery_register_bloodgroup"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->bloodgroup->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bloodgroup" class="<?php echo $patient_ot_delivery_register_grid->bloodgroup->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_bloodgroup" class="patient_ot_delivery_register_bloodgroup">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->bloodgroup->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->bloodgroup->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->bloodgroup->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->status->Visible) { // status ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->status) == "") { ?>
		<th data-name="status" class="<?php echo $patient_ot_delivery_register_grid->status->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_status" class="patient_ot_delivery_register_status"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $patient_ot_delivery_register_grid->status->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_status" class="patient_ot_delivery_register_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->createdby->Visible) { // createdby ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $patient_ot_delivery_register_grid->createdby->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_createdby" class="patient_ot_delivery_register_createdby"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $patient_ot_delivery_register_grid->createdby->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_createdby" class="patient_ot_delivery_register_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->createddatetime->Visible) { // createddatetime ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $patient_ot_delivery_register_grid->createddatetime->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_createddatetime" class="patient_ot_delivery_register_createddatetime"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $patient_ot_delivery_register_grid->createddatetime->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_createddatetime" class="patient_ot_delivery_register_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->modifiedby->Visible) { // modifiedby ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $patient_ot_delivery_register_grid->modifiedby->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_modifiedby" class="patient_ot_delivery_register_modifiedby"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $patient_ot_delivery_register_grid->modifiedby->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_modifiedby" class="patient_ot_delivery_register_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $patient_ot_delivery_register_grid->modifieddatetime->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_modifieddatetime" class="patient_ot_delivery_register_modifieddatetime"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $patient_ot_delivery_register_grid->modifieddatetime->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_modifieddatetime" class="patient_ot_delivery_register_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->PatientID->Visible) { // PatientID ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $patient_ot_delivery_register_grid->PatientID->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_PatientID" class="patient_ot_delivery_register_PatientID"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $patient_ot_delivery_register_grid->PatientID->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_PatientID" class="patient_ot_delivery_register_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->PatientID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->PatientID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->PatientID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->HospID->Visible) { // HospID ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $patient_ot_delivery_register_grid->HospID->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_HospID" class="patient_ot_delivery_register_HospID"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $patient_ot_delivery_register_grid->HospID->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_HospID" class="patient_ot_delivery_register_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->ChildBirthDate1->Visible) { // ChildBirthDate1 ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->ChildBirthDate1) == "") { ?>
		<th data-name="ChildBirthDate1" class="<?php echo $patient_ot_delivery_register_grid->ChildBirthDate1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildBirthDate1" class="patient_ot_delivery_register_ChildBirthDate1"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->ChildBirthDate1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildBirthDate1" class="<?php echo $patient_ot_delivery_register_grid->ChildBirthDate1->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_ChildBirthDate1" class="patient_ot_delivery_register_ChildBirthDate1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->ChildBirthDate1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->ChildBirthDate1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->ChildBirthDate1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->ChildBirthTime1->Visible) { // ChildBirthTime1 ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->ChildBirthTime1) == "") { ?>
		<th data-name="ChildBirthTime1" class="<?php echo $patient_ot_delivery_register_grid->ChildBirthTime1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildBirthTime1" class="patient_ot_delivery_register_ChildBirthTime1"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->ChildBirthTime1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildBirthTime1" class="<?php echo $patient_ot_delivery_register_grid->ChildBirthTime1->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_ChildBirthTime1" class="patient_ot_delivery_register_ChildBirthTime1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->ChildBirthTime1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->ChildBirthTime1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->ChildBirthTime1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->ChildSex1->Visible) { // ChildSex1 ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->ChildSex1) == "") { ?>
		<th data-name="ChildSex1" class="<?php echo $patient_ot_delivery_register_grid->ChildSex1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildSex1" class="patient_ot_delivery_register_ChildSex1"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->ChildSex1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildSex1" class="<?php echo $patient_ot_delivery_register_grid->ChildSex1->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_ChildSex1" class="patient_ot_delivery_register_ChildSex1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->ChildSex1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->ChildSex1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->ChildSex1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->ChildWt1->Visible) { // ChildWt1 ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->ChildWt1) == "") { ?>
		<th data-name="ChildWt1" class="<?php echo $patient_ot_delivery_register_grid->ChildWt1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildWt1" class="patient_ot_delivery_register_ChildWt1"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->ChildWt1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildWt1" class="<?php echo $patient_ot_delivery_register_grid->ChildWt1->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_ChildWt1" class="patient_ot_delivery_register_ChildWt1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->ChildWt1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->ChildWt1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->ChildWt1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->ChildDay1->Visible) { // ChildDay1 ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->ChildDay1) == "") { ?>
		<th data-name="ChildDay1" class="<?php echo $patient_ot_delivery_register_grid->ChildDay1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildDay1" class="patient_ot_delivery_register_ChildDay1"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->ChildDay1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildDay1" class="<?php echo $patient_ot_delivery_register_grid->ChildDay1->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_ChildDay1" class="patient_ot_delivery_register_ChildDay1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->ChildDay1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->ChildDay1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->ChildDay1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->ChildOE1->Visible) { // ChildOE1 ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->ChildOE1) == "") { ?>
		<th data-name="ChildOE1" class="<?php echo $patient_ot_delivery_register_grid->ChildOE1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildOE1" class="patient_ot_delivery_register_ChildOE1"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->ChildOE1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildOE1" class="<?php echo $patient_ot_delivery_register_grid->ChildOE1->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_ChildOE1" class="patient_ot_delivery_register_ChildOE1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->ChildOE1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->ChildOE1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->ChildOE1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->ChildBlGrp1->Visible) { // ChildBlGrp1 ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->ChildBlGrp1) == "") { ?>
		<th data-name="ChildBlGrp1" class="<?php echo $patient_ot_delivery_register_grid->ChildBlGrp1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildBlGrp1" class="patient_ot_delivery_register_ChildBlGrp1"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->ChildBlGrp1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildBlGrp1" class="<?php echo $patient_ot_delivery_register_grid->ChildBlGrp1->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_ChildBlGrp1" class="patient_ot_delivery_register_ChildBlGrp1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->ChildBlGrp1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->ChildBlGrp1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->ChildBlGrp1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->ApgarScore1->Visible) { // ApgarScore1 ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->ApgarScore1) == "") { ?>
		<th data-name="ApgarScore1" class="<?php echo $patient_ot_delivery_register_grid->ApgarScore1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ApgarScore1" class="patient_ot_delivery_register_ApgarScore1"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->ApgarScore1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ApgarScore1" class="<?php echo $patient_ot_delivery_register_grid->ApgarScore1->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_ApgarScore1" class="patient_ot_delivery_register_ApgarScore1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->ApgarScore1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->ApgarScore1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->ApgarScore1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->birthnotification1->Visible) { // birthnotification1 ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->birthnotification1) == "") { ?>
		<th data-name="birthnotification1" class="<?php echo $patient_ot_delivery_register_grid->birthnotification1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_birthnotification1" class="patient_ot_delivery_register_birthnotification1"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->birthnotification1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="birthnotification1" class="<?php echo $patient_ot_delivery_register_grid->birthnotification1->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_birthnotification1" class="patient_ot_delivery_register_birthnotification1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->birthnotification1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->birthnotification1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->birthnotification1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->formno1->Visible) { // formno1 ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->formno1) == "") { ?>
		<th data-name="formno1" class="<?php echo $patient_ot_delivery_register_grid->formno1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_formno1" class="patient_ot_delivery_register_formno1"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->formno1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="formno1" class="<?php echo $patient_ot_delivery_register_grid->formno1->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_formno1" class="patient_ot_delivery_register_formno1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->formno1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->formno1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->formno1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->RecievedTime->Visible) { // RecievedTime ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->RecievedTime) == "") { ?>
		<th data-name="RecievedTime" class="<?php echo $patient_ot_delivery_register_grid->RecievedTime->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_RecievedTime" class="patient_ot_delivery_register_RecievedTime"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->RecievedTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RecievedTime" class="<?php echo $patient_ot_delivery_register_grid->RecievedTime->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_RecievedTime" class="patient_ot_delivery_register_RecievedTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->RecievedTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->RecievedTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->RecievedTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->AnaesthesiaStarted->Visible) { // AnaesthesiaStarted ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->AnaesthesiaStarted) == "") { ?>
		<th data-name="AnaesthesiaStarted" class="<?php echo $patient_ot_delivery_register_grid->AnaesthesiaStarted->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_AnaesthesiaStarted" class="patient_ot_delivery_register_AnaesthesiaStarted"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->AnaesthesiaStarted->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnaesthesiaStarted" class="<?php echo $patient_ot_delivery_register_grid->AnaesthesiaStarted->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_AnaesthesiaStarted" class="patient_ot_delivery_register_AnaesthesiaStarted">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->AnaesthesiaStarted->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->AnaesthesiaStarted->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->AnaesthesiaStarted->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->AnaesthesiaEnded->Visible) { // AnaesthesiaEnded ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->AnaesthesiaEnded) == "") { ?>
		<th data-name="AnaesthesiaEnded" class="<?php echo $patient_ot_delivery_register_grid->AnaesthesiaEnded->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_AnaesthesiaEnded" class="patient_ot_delivery_register_AnaesthesiaEnded"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->AnaesthesiaEnded->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnaesthesiaEnded" class="<?php echo $patient_ot_delivery_register_grid->AnaesthesiaEnded->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_AnaesthesiaEnded" class="patient_ot_delivery_register_AnaesthesiaEnded">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->AnaesthesiaEnded->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->AnaesthesiaEnded->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->AnaesthesiaEnded->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->surgeryStarted->Visible) { // surgeryStarted ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->surgeryStarted) == "") { ?>
		<th data-name="surgeryStarted" class="<?php echo $patient_ot_delivery_register_grid->surgeryStarted->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_surgeryStarted" class="patient_ot_delivery_register_surgeryStarted"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->surgeryStarted->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="surgeryStarted" class="<?php echo $patient_ot_delivery_register_grid->surgeryStarted->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_surgeryStarted" class="patient_ot_delivery_register_surgeryStarted">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->surgeryStarted->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->surgeryStarted->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->surgeryStarted->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->surgeryEnded->Visible) { // surgeryEnded ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->surgeryEnded) == "") { ?>
		<th data-name="surgeryEnded" class="<?php echo $patient_ot_delivery_register_grid->surgeryEnded->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_surgeryEnded" class="patient_ot_delivery_register_surgeryEnded"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->surgeryEnded->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="surgeryEnded" class="<?php echo $patient_ot_delivery_register_grid->surgeryEnded->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_surgeryEnded" class="patient_ot_delivery_register_surgeryEnded">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->surgeryEnded->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->surgeryEnded->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->surgeryEnded->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->RecoveryTime->Visible) { // RecoveryTime ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->RecoveryTime) == "") { ?>
		<th data-name="RecoveryTime" class="<?php echo $patient_ot_delivery_register_grid->RecoveryTime->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_RecoveryTime" class="patient_ot_delivery_register_RecoveryTime"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->RecoveryTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RecoveryTime" class="<?php echo $patient_ot_delivery_register_grid->RecoveryTime->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_RecoveryTime" class="patient_ot_delivery_register_RecoveryTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->RecoveryTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->RecoveryTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->RecoveryTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->ShiftedTime->Visible) { // ShiftedTime ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->ShiftedTime) == "") { ?>
		<th data-name="ShiftedTime" class="<?php echo $patient_ot_delivery_register_grid->ShiftedTime->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ShiftedTime" class="patient_ot_delivery_register_ShiftedTime"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->ShiftedTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ShiftedTime" class="<?php echo $patient_ot_delivery_register_grid->ShiftedTime->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_ShiftedTime" class="patient_ot_delivery_register_ShiftedTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->ShiftedTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->ShiftedTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->ShiftedTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->Duration->Visible) { // Duration ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->Duration) == "") { ?>
		<th data-name="Duration" class="<?php echo $patient_ot_delivery_register_grid->Duration->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_Duration" class="patient_ot_delivery_register_Duration"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->Duration->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Duration" class="<?php echo $patient_ot_delivery_register_grid->Duration->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_Duration" class="patient_ot_delivery_register_Duration">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->Duration->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->Duration->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->Duration->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->Surgeon->Visible) { // Surgeon ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->Surgeon) == "") { ?>
		<th data-name="Surgeon" class="<?php echo $patient_ot_delivery_register_grid->Surgeon->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_Surgeon" class="patient_ot_delivery_register_Surgeon"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->Surgeon->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Surgeon" class="<?php echo $patient_ot_delivery_register_grid->Surgeon->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_Surgeon" class="patient_ot_delivery_register_Surgeon">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->Surgeon->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->Surgeon->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->Surgeon->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->Anaesthetist->Visible) { // Anaesthetist ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->Anaesthetist) == "") { ?>
		<th data-name="Anaesthetist" class="<?php echo $patient_ot_delivery_register_grid->Anaesthetist->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_Anaesthetist" class="patient_ot_delivery_register_Anaesthetist"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->Anaesthetist->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Anaesthetist" class="<?php echo $patient_ot_delivery_register_grid->Anaesthetist->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_Anaesthetist" class="patient_ot_delivery_register_Anaesthetist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->Anaesthetist->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->Anaesthetist->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->Anaesthetist->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->AsstSurgeon1->Visible) { // AsstSurgeon1 ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->AsstSurgeon1) == "") { ?>
		<th data-name="AsstSurgeon1" class="<?php echo $patient_ot_delivery_register_grid->AsstSurgeon1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_AsstSurgeon1" class="patient_ot_delivery_register_AsstSurgeon1"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->AsstSurgeon1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AsstSurgeon1" class="<?php echo $patient_ot_delivery_register_grid->AsstSurgeon1->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_AsstSurgeon1" class="patient_ot_delivery_register_AsstSurgeon1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->AsstSurgeon1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->AsstSurgeon1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->AsstSurgeon1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->AsstSurgeon2->Visible) { // AsstSurgeon2 ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->AsstSurgeon2) == "") { ?>
		<th data-name="AsstSurgeon2" class="<?php echo $patient_ot_delivery_register_grid->AsstSurgeon2->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_AsstSurgeon2" class="patient_ot_delivery_register_AsstSurgeon2"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->AsstSurgeon2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AsstSurgeon2" class="<?php echo $patient_ot_delivery_register_grid->AsstSurgeon2->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_AsstSurgeon2" class="patient_ot_delivery_register_AsstSurgeon2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->AsstSurgeon2->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->AsstSurgeon2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->AsstSurgeon2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->paediatric->Visible) { // paediatric ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->paediatric) == "") { ?>
		<th data-name="paediatric" class="<?php echo $patient_ot_delivery_register_grid->paediatric->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_paediatric" class="patient_ot_delivery_register_paediatric"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->paediatric->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="paediatric" class="<?php echo $patient_ot_delivery_register_grid->paediatric->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_paediatric" class="patient_ot_delivery_register_paediatric">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->paediatric->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->paediatric->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->paediatric->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->ScrubNurse1->Visible) { // ScrubNurse1 ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->ScrubNurse1) == "") { ?>
		<th data-name="ScrubNurse1" class="<?php echo $patient_ot_delivery_register_grid->ScrubNurse1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ScrubNurse1" class="patient_ot_delivery_register_ScrubNurse1"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->ScrubNurse1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ScrubNurse1" class="<?php echo $patient_ot_delivery_register_grid->ScrubNurse1->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_ScrubNurse1" class="patient_ot_delivery_register_ScrubNurse1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->ScrubNurse1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->ScrubNurse1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->ScrubNurse1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->ScrubNurse2->Visible) { // ScrubNurse2 ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->ScrubNurse2) == "") { ?>
		<th data-name="ScrubNurse2" class="<?php echo $patient_ot_delivery_register_grid->ScrubNurse2->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ScrubNurse2" class="patient_ot_delivery_register_ScrubNurse2"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->ScrubNurse2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ScrubNurse2" class="<?php echo $patient_ot_delivery_register_grid->ScrubNurse2->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_ScrubNurse2" class="patient_ot_delivery_register_ScrubNurse2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->ScrubNurse2->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->ScrubNurse2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->ScrubNurse2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->FloorNurse->Visible) { // FloorNurse ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->FloorNurse) == "") { ?>
		<th data-name="FloorNurse" class="<?php echo $patient_ot_delivery_register_grid->FloorNurse->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_FloorNurse" class="patient_ot_delivery_register_FloorNurse"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->FloorNurse->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FloorNurse" class="<?php echo $patient_ot_delivery_register_grid->FloorNurse->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_FloorNurse" class="patient_ot_delivery_register_FloorNurse">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->FloorNurse->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->FloorNurse->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->FloorNurse->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->Technician->Visible) { // Technician ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->Technician) == "") { ?>
		<th data-name="Technician" class="<?php echo $patient_ot_delivery_register_grid->Technician->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_Technician" class="patient_ot_delivery_register_Technician"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->Technician->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Technician" class="<?php echo $patient_ot_delivery_register_grid->Technician->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_Technician" class="patient_ot_delivery_register_Technician">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->Technician->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->Technician->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->Technician->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->HouseKeeping->Visible) { // HouseKeeping ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->HouseKeeping) == "") { ?>
		<th data-name="HouseKeeping" class="<?php echo $patient_ot_delivery_register_grid->HouseKeeping->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_HouseKeeping" class="patient_ot_delivery_register_HouseKeeping"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->HouseKeeping->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HouseKeeping" class="<?php echo $patient_ot_delivery_register_grid->HouseKeeping->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_HouseKeeping" class="patient_ot_delivery_register_HouseKeeping">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->HouseKeeping->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->HouseKeeping->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->HouseKeeping->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->countsCheckedMops->Visible) { // countsCheckedMops ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->countsCheckedMops) == "") { ?>
		<th data-name="countsCheckedMops" class="<?php echo $patient_ot_delivery_register_grid->countsCheckedMops->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_countsCheckedMops" class="patient_ot_delivery_register_countsCheckedMops"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->countsCheckedMops->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="countsCheckedMops" class="<?php echo $patient_ot_delivery_register_grid->countsCheckedMops->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_countsCheckedMops" class="patient_ot_delivery_register_countsCheckedMops">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->countsCheckedMops->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->countsCheckedMops->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->countsCheckedMops->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->gauze->Visible) { // gauze ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->gauze) == "") { ?>
		<th data-name="gauze" class="<?php echo $patient_ot_delivery_register_grid->gauze->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_gauze" class="patient_ot_delivery_register_gauze"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->gauze->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="gauze" class="<?php echo $patient_ot_delivery_register_grid->gauze->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_gauze" class="patient_ot_delivery_register_gauze">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->gauze->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->gauze->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->gauze->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->needles->Visible) { // needles ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->needles) == "") { ?>
		<th data-name="needles" class="<?php echo $patient_ot_delivery_register_grid->needles->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_needles" class="patient_ot_delivery_register_needles"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->needles->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="needles" class="<?php echo $patient_ot_delivery_register_grid->needles->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_needles" class="patient_ot_delivery_register_needles">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->needles->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->needles->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->needles->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->bloodloss->Visible) { // bloodloss ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->bloodloss) == "") { ?>
		<th data-name="bloodloss" class="<?php echo $patient_ot_delivery_register_grid->bloodloss->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_bloodloss" class="patient_ot_delivery_register_bloodloss"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->bloodloss->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bloodloss" class="<?php echo $patient_ot_delivery_register_grid->bloodloss->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_bloodloss" class="patient_ot_delivery_register_bloodloss">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->bloodloss->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->bloodloss->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->bloodloss->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->bloodtransfusion->Visible) { // bloodtransfusion ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->bloodtransfusion) == "") { ?>
		<th data-name="bloodtransfusion" class="<?php echo $patient_ot_delivery_register_grid->bloodtransfusion->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_bloodtransfusion" class="patient_ot_delivery_register_bloodtransfusion"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->bloodtransfusion->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bloodtransfusion" class="<?php echo $patient_ot_delivery_register_grid->bloodtransfusion->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_bloodtransfusion" class="patient_ot_delivery_register_bloodtransfusion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->bloodtransfusion->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->bloodtransfusion->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->bloodtransfusion->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->Reception->Visible) { // Reception ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $patient_ot_delivery_register_grid->Reception->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_Reception" class="patient_ot_delivery_register_Reception"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $patient_ot_delivery_register_grid->Reception->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_Reception" class="patient_ot_delivery_register_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->Reception->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->Reception->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->PId->Visible) { // PId ?>
	<?php if ($patient_ot_delivery_register_grid->SortUrl($patient_ot_delivery_register_grid->PId) == "") { ?>
		<th data-name="PId" class="<?php echo $patient_ot_delivery_register_grid->PId->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_PId" class="patient_ot_delivery_register_PId"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->PId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PId" class="<?php echo $patient_ot_delivery_register_grid->PId->headerCellClass() ?>"><div><div id="elh_patient_ot_delivery_register_PId" class="patient_ot_delivery_register_PId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_grid->PId->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_grid->PId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_grid->PId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
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
$patient_ot_delivery_register_grid->StartRecord = 1;
$patient_ot_delivery_register_grid->StopRecord = $patient_ot_delivery_register_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($patient_ot_delivery_register->isConfirm() || $patient_ot_delivery_register_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($patient_ot_delivery_register_grid->FormKeyCountName) && ($patient_ot_delivery_register_grid->isGridAdd() || $patient_ot_delivery_register_grid->isGridEdit() || $patient_ot_delivery_register->isConfirm())) {
		$patient_ot_delivery_register_grid->KeyCount = $CurrentForm->getValue($patient_ot_delivery_register_grid->FormKeyCountName);
		$patient_ot_delivery_register_grid->StopRecord = $patient_ot_delivery_register_grid->StartRecord + $patient_ot_delivery_register_grid->KeyCount - 1;
	}
}
$patient_ot_delivery_register_grid->RecordCount = $patient_ot_delivery_register_grid->StartRecord - 1;
if ($patient_ot_delivery_register_grid->Recordset && !$patient_ot_delivery_register_grid->Recordset->EOF) {
	$patient_ot_delivery_register_grid->Recordset->moveFirst();
	$selectLimit = $patient_ot_delivery_register_grid->UseSelectLimit;
	if (!$selectLimit && $patient_ot_delivery_register_grid->StartRecord > 1)
		$patient_ot_delivery_register_grid->Recordset->move($patient_ot_delivery_register_grid->StartRecord - 1);
} elseif (!$patient_ot_delivery_register->AllowAddDeleteRow && $patient_ot_delivery_register_grid->StopRecord == 0) {
	$patient_ot_delivery_register_grid->StopRecord = $patient_ot_delivery_register->GridAddRowCount;
}

// Initialize aggregate
$patient_ot_delivery_register->RowType = ROWTYPE_AGGREGATEINIT;
$patient_ot_delivery_register->resetAttributes();
$patient_ot_delivery_register_grid->renderRow();
if ($patient_ot_delivery_register_grid->isGridAdd())
	$patient_ot_delivery_register_grid->RowIndex = 0;
if ($patient_ot_delivery_register_grid->isGridEdit())
	$patient_ot_delivery_register_grid->RowIndex = 0;
while ($patient_ot_delivery_register_grid->RecordCount < $patient_ot_delivery_register_grid->StopRecord) {
	$patient_ot_delivery_register_grid->RecordCount++;
	if ($patient_ot_delivery_register_grid->RecordCount >= $patient_ot_delivery_register_grid->StartRecord) {
		$patient_ot_delivery_register_grid->RowCount++;
		if ($patient_ot_delivery_register_grid->isGridAdd() || $patient_ot_delivery_register_grid->isGridEdit() || $patient_ot_delivery_register->isConfirm()) {
			$patient_ot_delivery_register_grid->RowIndex++;
			$CurrentForm->Index = $patient_ot_delivery_register_grid->RowIndex;
			if ($CurrentForm->hasValue($patient_ot_delivery_register_grid->FormActionName) && ($patient_ot_delivery_register->isConfirm() || $patient_ot_delivery_register_grid->EventCancelled))
				$patient_ot_delivery_register_grid->RowAction = strval($CurrentForm->getValue($patient_ot_delivery_register_grid->FormActionName));
			elseif ($patient_ot_delivery_register_grid->isGridAdd())
				$patient_ot_delivery_register_grid->RowAction = "insert";
			else
				$patient_ot_delivery_register_grid->RowAction = "";
		}

		// Set up key count
		$patient_ot_delivery_register_grid->KeyCount = $patient_ot_delivery_register_grid->RowIndex;

		// Init row class and style
		$patient_ot_delivery_register->resetAttributes();
		$patient_ot_delivery_register->CssClass = "";
		if ($patient_ot_delivery_register_grid->isGridAdd()) {
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
		if ($patient_ot_delivery_register_grid->isGridAdd()) // Grid add
			$patient_ot_delivery_register->RowType = ROWTYPE_ADD; // Render add
		if ($patient_ot_delivery_register_grid->isGridAdd() && $patient_ot_delivery_register->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$patient_ot_delivery_register_grid->restoreCurrentRowFormValues($patient_ot_delivery_register_grid->RowIndex); // Restore form values
		if ($patient_ot_delivery_register_grid->isGridEdit()) { // Grid edit
			if ($patient_ot_delivery_register->EventCancelled)
				$patient_ot_delivery_register_grid->restoreCurrentRowFormValues($patient_ot_delivery_register_grid->RowIndex); // Restore form values
			if ($patient_ot_delivery_register_grid->RowAction == "insert")
				$patient_ot_delivery_register->RowType = ROWTYPE_ADD; // Render add
			else
				$patient_ot_delivery_register->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($patient_ot_delivery_register_grid->isGridEdit() && ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT || $patient_ot_delivery_register->RowType == ROWTYPE_ADD) && $patient_ot_delivery_register->EventCancelled) // Update failed
			$patient_ot_delivery_register_grid->restoreCurrentRowFormValues($patient_ot_delivery_register_grid->RowIndex); // Restore form values
		if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) // Edit row
			$patient_ot_delivery_register_grid->EditRowCount++;
		if ($patient_ot_delivery_register->isConfirm()) // Confirm row
			$patient_ot_delivery_register_grid->restoreCurrentRowFormValues($patient_ot_delivery_register_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$patient_ot_delivery_register->RowAttrs->merge(["data-rowindex" => $patient_ot_delivery_register_grid->RowCount, "id" => "r" . $patient_ot_delivery_register_grid->RowCount . "_patient_ot_delivery_register", "data-rowtype" => $patient_ot_delivery_register->RowType]);

		// Render row
		$patient_ot_delivery_register_grid->renderRow();

		// Render list options
		$patient_ot_delivery_register_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($patient_ot_delivery_register_grid->RowAction != "delete" && $patient_ot_delivery_register_grid->RowAction != "insertdelete" && !($patient_ot_delivery_register_grid->RowAction == "insert" && $patient_ot_delivery_register->isConfirm() && $patient_ot_delivery_register_grid->emptyRow())) {
?>
	<tr <?php echo $patient_ot_delivery_register->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_ot_delivery_register_grid->ListOptions->render("body", "left", $patient_ot_delivery_register_grid->RowCount);
?>
	<?php if ($patient_ot_delivery_register_grid->id->Visible) { // id ?>
		<td data-name="id" <?php echo $patient_ot_delivery_register_grid->id->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_id" class="form-group"></span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_id" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_id" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_id" class="form-group">
<span<?php echo $patient_ot_delivery_register_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_id" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_id" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_id">
<span<?php echo $patient_ot_delivery_register_grid->id->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->id->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_id" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_id" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->id->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_id" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_id" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_id" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_id" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->id->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_id" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_id" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->PatID->Visible) { // PatID ?>
		<td data-name="PatID" <?php echo $patient_ot_delivery_register_grid->PatID->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_PatID" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_PatID" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatID" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->PatID->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->PatID->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatID" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatID" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->PatID->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_PatID" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_PatID" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatID" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->PatID->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->PatID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_PatID">
<span<?php echo $patient_ot_delivery_register_grid->PatID->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->PatID->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatID" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatID" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->PatID->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatID" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatID" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->PatID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatID" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatID" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->PatID->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatID" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatID" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->PatID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $patient_ot_delivery_register_grid->PatientName->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_PatientName" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_PatientName" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->PatientName->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatientName" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientName" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_PatientName" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_PatientName" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->PatientName->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->PatientName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_PatientName">
<span<?php echo $patient_ot_delivery_register_grid->PatientName->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->PatientName->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatientName" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->PatientName->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatientName" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientName" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->PatientName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatientName" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientName" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->PatientName->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatientName" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientName" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->PatientName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno" <?php echo $patient_ot_delivery_register_grid->mrnno->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_ot_delivery_register_grid->mrnno->getSessionValue() != "") { ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_mrnno" class="form-group">
<span<?php echo $patient_ot_delivery_register_grid->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->mrnno->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_mrnno" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_mrnno" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->mrnno->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_mrnno" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($patient_ot_delivery_register_grid->mrnno->getSessionValue() != "") { ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_mrnno" class="form-group">
<span<?php echo $patient_ot_delivery_register_grid->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->mrnno->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_mrnno" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_mrnno" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->mrnno->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_mrnno">
<span<?php echo $patient_ot_delivery_register_grid->mrnno->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->mrnno->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_mrnno" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->mrnno->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_mrnno" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->mrnno->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_mrnno" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->mrnno->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_mrnno" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->mrnno->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber" <?php echo $patient_ot_delivery_register_grid->MobileNumber->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_MobileNumber" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_MobileNumber" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->MobileNumber->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->MobileNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_MobileNumber" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_MobileNumber" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->MobileNumber->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_MobileNumber" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_MobileNumber" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->MobileNumber->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->MobileNumber->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_MobileNumber">
<span<?php echo $patient_ot_delivery_register_grid->MobileNumber->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->MobileNumber->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_MobileNumber" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->MobileNumber->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_MobileNumber" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_MobileNumber" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->MobileNumber->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_MobileNumber" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_MobileNumber" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->MobileNumber->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_MobileNumber" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_MobileNumber" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->MobileNumber->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->Age->Visible) { // Age ?>
		<td data-name="Age" <?php echo $patient_ot_delivery_register_grid->Age->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_Age" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_Age" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Age" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Age->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->Age->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->Age->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Age" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Age" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Age->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_Age" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_Age" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Age" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Age->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->Age->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->Age->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_Age">
<span<?php echo $patient_ot_delivery_register_grid->Age->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->Age->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Age" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Age" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Age->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Age" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Age" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Age->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Age" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Age" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Age->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Age" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Age" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Age->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->Gender->Visible) { // Gender ?>
		<td data-name="Gender" <?php echo $patient_ot_delivery_register_grid->Gender->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_Gender" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_Gender" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Gender" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->Gender->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->Gender->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Gender" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Gender" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Gender->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_Gender" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_Gender" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Gender" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->Gender->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->Gender->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_Gender">
<span<?php echo $patient_ot_delivery_register_grid->Gender->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->Gender->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Gender" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Gender" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Gender->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Gender" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Gender" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Gender->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Gender" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Gender" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Gender->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Gender" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Gender" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Gender->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->ObstetricsHistryFeMale->Visible) { // ObstetricsHistryFeMale ?>
		<td data-name="ObstetricsHistryFeMale" <?php echo $patient_ot_delivery_register_grid->ObstetricsHistryFeMale->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ObstetricsHistryFeMale" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ObstetricsHistryFeMale" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ObstetricsHistryFeMale" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ObstetricsHistryFeMale" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ObstetricsHistryFeMale->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ObstetricsHistryFeMale->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ObstetricsHistryFeMale->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ObstetricsHistryFeMale" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ObstetricsHistryFeMale" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ObstetricsHistryFeMale" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ObstetricsHistryFeMale->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ObstetricsHistryFeMale" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ObstetricsHistryFeMale" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ObstetricsHistryFeMale" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ObstetricsHistryFeMale" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ObstetricsHistryFeMale->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ObstetricsHistryFeMale->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ObstetricsHistryFeMale->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ObstetricsHistryFeMale">
<span<?php echo $patient_ot_delivery_register_grid->ObstetricsHistryFeMale->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->ObstetricsHistryFeMale->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ObstetricsHistryFeMale" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ObstetricsHistryFeMale" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ObstetricsHistryFeMale" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ObstetricsHistryFeMale->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ObstetricsHistryFeMale" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ObstetricsHistryFeMale" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ObstetricsHistryFeMale" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ObstetricsHistryFeMale->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ObstetricsHistryFeMale" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ObstetricsHistryFeMale" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ObstetricsHistryFeMale" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ObstetricsHistryFeMale->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ObstetricsHistryFeMale" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ObstetricsHistryFeMale" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ObstetricsHistryFeMale" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ObstetricsHistryFeMale->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->Abortion->Visible) { // Abortion ?>
		<td data-name="Abortion" <?php echo $patient_ot_delivery_register_grid->Abortion->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_Abortion" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_Abortion" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Abortion" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Abortion" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Abortion->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->Abortion->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->Abortion->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Abortion" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Abortion" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Abortion" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Abortion->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_Abortion" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_Abortion" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Abortion" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Abortion" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Abortion->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->Abortion->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->Abortion->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_Abortion">
<span<?php echo $patient_ot_delivery_register_grid->Abortion->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->Abortion->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Abortion" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Abortion" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Abortion" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Abortion->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Abortion" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Abortion" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Abortion" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Abortion->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Abortion" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Abortion" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Abortion" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Abortion->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Abortion" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Abortion" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Abortion" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Abortion->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->ChildBirthDate->Visible) { // ChildBirthDate ?>
		<td data-name="ChildBirthDate" <?php echo $patient_ot_delivery_register_grid->ChildBirthDate->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ChildBirthDate" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate" data-format="7" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBirthDate->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ChildBirthDate->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ChildBirthDate->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_grid->ChildBirthDate->ReadOnly && !$patient_ot_delivery_register_grid->ChildBirthDate->Disabled && !isset($patient_ot_delivery_register_grid->ChildBirthDate->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_grid->ChildBirthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBirthDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ChildBirthDate" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate" data-format="7" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBirthDate->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ChildBirthDate->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ChildBirthDate->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_grid->ChildBirthDate->ReadOnly && !$patient_ot_delivery_register_grid->ChildBirthDate->Disabled && !isset($patient_ot_delivery_register_grid->ChildBirthDate->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_grid->ChildBirthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ChildBirthDate">
<span<?php echo $patient_ot_delivery_register_grid->ChildBirthDate->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->ChildBirthDate->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBirthDate->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBirthDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBirthDate->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBirthDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->ChildBirthTime->Visible) { // ChildBirthTime ?>
		<td data-name="ChildBirthTime" <?php echo $patient_ot_delivery_register_grid->ChildBirthTime->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ChildBirthTime" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBirthTime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ChildBirthTime->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ChildBirthTime->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_grid->ChildBirthTime->ReadOnly && !$patient_ot_delivery_register_grid->ChildBirthTime->Disabled && !isset($patient_ot_delivery_register_grid->ChildBirthTime->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_grid->ChildBirthTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "timepicker"], function() {
	ew.createTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime", {"timeFormat":"h:i A","step":15});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBirthTime->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ChildBirthTime" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBirthTime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ChildBirthTime->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ChildBirthTime->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_grid->ChildBirthTime->ReadOnly && !$patient_ot_delivery_register_grid->ChildBirthTime->Disabled && !isset($patient_ot_delivery_register_grid->ChildBirthTime->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_grid->ChildBirthTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "timepicker"], function() {
	ew.createTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime", {"timeFormat":"h:i A","step":15});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ChildBirthTime">
<span<?php echo $patient_ot_delivery_register_grid->ChildBirthTime->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->ChildBirthTime->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBirthTime->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBirthTime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBirthTime->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBirthTime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->ChildSex->Visible) { // ChildSex ?>
		<td data-name="ChildSex" <?php echo $patient_ot_delivery_register_grid->ChildSex->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ChildSex" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildSex" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildSex->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ChildSex->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ChildSex->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildSex" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildSex->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ChildSex" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildSex" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildSex->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ChildSex->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ChildSex->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ChildSex">
<span<?php echo $patient_ot_delivery_register_grid->ChildSex->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->ChildSex->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildSex" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildSex->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildSex" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildSex->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildSex" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildSex->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildSex" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildSex->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->ChildWt->Visible) { // ChildWt ?>
		<td data-name="ChildWt" <?php echo $patient_ot_delivery_register_grid->ChildWt->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ChildWt" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildWt" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildWt->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ChildWt->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ChildWt->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildWt" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildWt->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ChildWt" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildWt" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildWt->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ChildWt->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ChildWt->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ChildWt">
<span<?php echo $patient_ot_delivery_register_grid->ChildWt->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->ChildWt->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildWt" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildWt->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildWt" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildWt->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildWt" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildWt->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildWt" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildWt->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->ChildDay->Visible) { // ChildDay ?>
		<td data-name="ChildDay" <?php echo $patient_ot_delivery_register_grid->ChildDay->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ChildDay" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildDay" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildDay->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ChildDay->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ChildDay->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildDay" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildDay->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ChildDay" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildDay" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildDay->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ChildDay->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ChildDay->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ChildDay">
<span<?php echo $patient_ot_delivery_register_grid->ChildDay->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->ChildDay->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildDay" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildDay->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildDay" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildDay->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildDay" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildDay->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildDay" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildDay->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->ChildOE->Visible) { // ChildOE ?>
		<td data-name="ChildOE" <?php echo $patient_ot_delivery_register_grid->ChildOE->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ChildOE" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildOE" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildOE->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ChildOE->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ChildOE->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildOE" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildOE->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ChildOE" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildOE" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildOE->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ChildOE->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ChildOE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ChildOE">
<span<?php echo $patient_ot_delivery_register_grid->ChildOE->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->ChildOE->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildOE" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildOE->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildOE" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildOE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildOE" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildOE->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildOE" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildOE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->ChildBlGrp->Visible) { // ChildBlGrp ?>
		<td data-name="ChildBlGrp" <?php echo $patient_ot_delivery_register_grid->ChildBlGrp->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ChildBlGrp" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBlGrp->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ChildBlGrp->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ChildBlGrp->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBlGrp->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ChildBlGrp" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBlGrp->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ChildBlGrp->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ChildBlGrp->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ChildBlGrp">
<span<?php echo $patient_ot_delivery_register_grid->ChildBlGrp->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->ChildBlGrp->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBlGrp->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBlGrp->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBlGrp->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBlGrp->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->ApgarScore->Visible) { // ApgarScore ?>
		<td data-name="ApgarScore" <?php echo $patient_ot_delivery_register_grid->ApgarScore->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ApgarScore" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ApgarScore" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ApgarScore->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ApgarScore->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ApgarScore->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ApgarScore" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ApgarScore->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ApgarScore" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ApgarScore" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ApgarScore->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ApgarScore->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ApgarScore->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ApgarScore">
<span<?php echo $patient_ot_delivery_register_grid->ApgarScore->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->ApgarScore->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ApgarScore" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ApgarScore->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ApgarScore" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ApgarScore->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ApgarScore" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ApgarScore->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ApgarScore" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ApgarScore->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->birthnotification->Visible) { // birthnotification ?>
		<td data-name="birthnotification" <?php echo $patient_ot_delivery_register_grid->birthnotification->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_birthnotification" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_birthnotification" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->birthnotification->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->birthnotification->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->birthnotification->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_birthnotification" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->birthnotification->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_birthnotification" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_birthnotification" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->birthnotification->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->birthnotification->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->birthnotification->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_birthnotification">
<span<?php echo $patient_ot_delivery_register_grid->birthnotification->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->birthnotification->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_birthnotification" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->birthnotification->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_birthnotification" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->birthnotification->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_birthnotification" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->birthnotification->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_birthnotification" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->birthnotification->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->formno->Visible) { // formno ?>
		<td data-name="formno" <?php echo $patient_ot_delivery_register_grid->formno->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_formno" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_formno" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->formno->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->formno->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->formno->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_formno" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->formno->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_formno" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_formno" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->formno->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->formno->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->formno->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_formno">
<span<?php echo $patient_ot_delivery_register_grid->formno->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->formno->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_formno" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->formno->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_formno" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->formno->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_formno" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->formno->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_formno" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->formno->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->dte->Visible) { // dte ?>
		<td data-name="dte" <?php echo $patient_ot_delivery_register_grid->dte->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_dte" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_dte" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_dte" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_dte" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->dte->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->dte->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->dte->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_grid->dte->ReadOnly && !$patient_ot_delivery_register_grid->dte->Disabled && !isset($patient_ot_delivery_register_grid->dte->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_grid->dte->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_dte", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_dte" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_dte" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_dte" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->dte->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_dte" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_dte" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_dte" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_dte" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->dte->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->dte->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->dte->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_grid->dte->ReadOnly && !$patient_ot_delivery_register_grid->dte->Disabled && !isset($patient_ot_delivery_register_grid->dte->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_grid->dte->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_dte", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_dte">
<span<?php echo $patient_ot_delivery_register_grid->dte->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->dte->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_dte" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_dte" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_dte" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->dte->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_dte" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_dte" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_dte" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->dte->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_dte" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_dte" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_dte" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->dte->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_dte" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_dte" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_dte" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->dte->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->motherReligion->Visible) { // motherReligion ?>
		<td data-name="motherReligion" <?php echo $patient_ot_delivery_register_grid->motherReligion->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_motherReligion" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_motherReligion" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_motherReligion" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_motherReligion" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->motherReligion->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->motherReligion->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->motherReligion->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_motherReligion" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_motherReligion" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_motherReligion" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->motherReligion->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_motherReligion" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_motherReligion" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_motherReligion" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_motherReligion" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->motherReligion->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->motherReligion->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->motherReligion->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_motherReligion">
<span<?php echo $patient_ot_delivery_register_grid->motherReligion->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->motherReligion->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_motherReligion" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_motherReligion" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_motherReligion" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->motherReligion->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_motherReligion" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_motherReligion" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_motherReligion" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->motherReligion->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_motherReligion" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_motherReligion" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_motherReligion" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->motherReligion->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_motherReligion" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_motherReligion" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_motherReligion" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->motherReligion->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->bloodgroup->Visible) { // bloodgroup ?>
		<td data-name="bloodgroup" <?php echo $patient_ot_delivery_register_grid->bloodgroup->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_bloodgroup" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_bloodgroup" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodgroup" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodgroup" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->bloodgroup->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->bloodgroup->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->bloodgroup->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodgroup" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodgroup" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodgroup" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->bloodgroup->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_bloodgroup" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_bloodgroup" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodgroup" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodgroup" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->bloodgroup->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->bloodgroup->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->bloodgroup->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_bloodgroup">
<span<?php echo $patient_ot_delivery_register_grid->bloodgroup->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->bloodgroup->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodgroup" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodgroup" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodgroup" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->bloodgroup->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodgroup" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodgroup" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodgroup" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->bloodgroup->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodgroup" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodgroup" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodgroup" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->bloodgroup->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodgroup" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodgroup" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodgroup" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->bloodgroup->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->status->Visible) { // status ?>
		<td data-name="status" <?php echo $patient_ot_delivery_register_grid->status->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_status" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_status" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_status" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->status->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->status->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->status->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_status" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_status" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->status->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_status" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_status" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_status" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->status->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->status->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->status->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_status">
<span<?php echo $patient_ot_delivery_register_grid->status->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->status->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_status" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_status" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->status->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_status" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_status" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->status->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_status" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_status" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->status->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_status" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_status" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $patient_ot_delivery_register_grid->createdby->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_createdby" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_createdby" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createdby" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createdby" size="30" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->createdby->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->createdby->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->createdby->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_createdby" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createdby" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->createdby->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_createdby" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_createdby" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createdby" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createdby" size="30" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->createdby->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->createdby->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->createdby->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_createdby">
<span<?php echo $patient_ot_delivery_register_grid->createdby->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->createdby->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_createdby" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createdby" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->createdby->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_createdby" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createdby" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->createdby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_createdby" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createdby" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->createdby->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_createdby" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createdby" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->createdby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $patient_ot_delivery_register_grid->createddatetime->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_createddatetime" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_createddatetime" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createddatetime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->createddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->createddatetime->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->createddatetime->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_grid->createddatetime->ReadOnly && !$patient_ot_delivery_register_grid->createddatetime->Disabled && !isset($patient_ot_delivery_register_grid->createddatetime->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_grid->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_createddatetime" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createddatetime" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_createddatetime" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_createddatetime" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createddatetime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->createddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->createddatetime->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->createddatetime->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_grid->createddatetime->ReadOnly && !$patient_ot_delivery_register_grid->createddatetime->Disabled && !isset($patient_ot_delivery_register_grid->createddatetime->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_grid->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_createddatetime">
<span<?php echo $patient_ot_delivery_register_grid->createddatetime->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->createddatetime->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_createddatetime" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createddatetime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->createddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_createddatetime" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createddatetime" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->createddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_createddatetime" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createddatetime" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->createddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_createddatetime" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createddatetime" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $patient_ot_delivery_register_grid->modifiedby->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_modifiedby" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_modifiedby" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifiedby" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifiedby" size="30" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->modifiedby->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->modifiedby->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->modifiedby->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_modifiedby" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifiedby" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_modifiedby" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_modifiedby" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifiedby" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifiedby" size="30" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->modifiedby->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->modifiedby->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->modifiedby->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_modifiedby">
<span<?php echo $patient_ot_delivery_register_grid->modifiedby->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->modifiedby->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_modifiedby" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifiedby" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->modifiedby->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_modifiedby" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifiedby" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->modifiedby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_modifiedby" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifiedby" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->modifiedby->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_modifiedby" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifiedby" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $patient_ot_delivery_register_grid->modifieddatetime->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_modifieddatetime" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_modifieddatetime" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifieddatetime" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->modifieddatetime->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->modifieddatetime->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_grid->modifieddatetime->ReadOnly && !$patient_ot_delivery_register_grid->modifieddatetime->Disabled && !isset($patient_ot_delivery_register_grid->modifieddatetime->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_grid->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_modifieddatetime" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_modifieddatetime" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_modifieddatetime" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifieddatetime" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->modifieddatetime->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->modifieddatetime->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_grid->modifieddatetime->ReadOnly && !$patient_ot_delivery_register_grid->modifieddatetime->Disabled && !isset($patient_ot_delivery_register_grid->modifieddatetime->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_grid->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_modifieddatetime">
<span<?php echo $patient_ot_delivery_register_grid->modifieddatetime->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->modifieddatetime->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_modifieddatetime" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_modifieddatetime" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->modifieddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_modifieddatetime" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifieddatetime" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_modifieddatetime" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifieddatetime" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID" <?php echo $patient_ot_delivery_register_grid->PatientID->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_PatientID" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_PatientID" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientID" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->PatientID->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->PatientID->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->PatientID->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatientID" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientID" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientID" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->PatientID->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_PatientID" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_PatientID" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientID" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->PatientID->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->PatientID->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->PatientID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_PatientID">
<span<?php echo $patient_ot_delivery_register_grid->PatientID->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->PatientID->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatientID" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientID" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientID" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->PatientID->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatientID" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientID" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientID" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->PatientID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatientID" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientID" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientID" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->PatientID->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatientID" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientID" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientID" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->PatientID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $patient_ot_delivery_register_grid->HospID->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_HospID" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HospID" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->HospID->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_HospID">
<span<?php echo $patient_ot_delivery_register_grid->HospID->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->HospID->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_HospID" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HospID" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->HospID->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_HospID" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HospID" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->HospID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_HospID" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HospID" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->HospID->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_HospID" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HospID" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->ChildBirthDate1->Visible) { // ChildBirthDate1 ?>
		<td data-name="ChildBirthDate1" <?php echo $patient_ot_delivery_register_grid->ChildBirthDate1->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ChildBirthDate1" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate1" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBirthDate1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ChildBirthDate1->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ChildBirthDate1->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_grid->ChildBirthDate1->ReadOnly && !$patient_ot_delivery_register_grid->ChildBirthDate1->Disabled && !isset($patient_ot_delivery_register_grid->ChildBirthDate1->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_grid->ChildBirthDate1->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate1", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBirthDate1->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ChildBirthDate1" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate1" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBirthDate1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ChildBirthDate1->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ChildBirthDate1->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_grid->ChildBirthDate1->ReadOnly && !$patient_ot_delivery_register_grid->ChildBirthDate1->Disabled && !isset($patient_ot_delivery_register_grid->ChildBirthDate1->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_grid->ChildBirthDate1->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate1", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ChildBirthDate1">
<span<?php echo $patient_ot_delivery_register_grid->ChildBirthDate1->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->ChildBirthDate1->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBirthDate1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBirthDate1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate1" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate1" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBirthDate1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate1" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate1" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBirthDate1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->ChildBirthTime1->Visible) { // ChildBirthTime1 ?>
		<td data-name="ChildBirthTime1" <?php echo $patient_ot_delivery_register_grid->ChildBirthTime1->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ChildBirthTime1" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBirthTime1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ChildBirthTime1->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ChildBirthTime1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBirthTime1->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ChildBirthTime1" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBirthTime1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ChildBirthTime1->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ChildBirthTime1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ChildBirthTime1">
<span<?php echo $patient_ot_delivery_register_grid->ChildBirthTime1->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->ChildBirthTime1->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBirthTime1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBirthTime1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime1" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime1" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBirthTime1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime1" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime1" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBirthTime1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->ChildSex1->Visible) { // ChildSex1 ?>
		<td data-name="ChildSex1" <?php echo $patient_ot_delivery_register_grid->ChildSex1->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ChildSex1" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildSex1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildSex1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ChildSex1->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ChildSex1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildSex1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildSex1->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ChildSex1" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildSex1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildSex1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ChildSex1->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ChildSex1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ChildSex1">
<span<?php echo $patient_ot_delivery_register_grid->ChildSex1->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->ChildSex1->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildSex1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildSex1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildSex1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildSex1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildSex1" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex1" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildSex1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildSex1" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex1" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildSex1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->ChildWt1->Visible) { // ChildWt1 ?>
		<td data-name="ChildWt1" <?php echo $patient_ot_delivery_register_grid->ChildWt1->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ChildWt1" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildWt1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildWt1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ChildWt1->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ChildWt1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildWt1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildWt1->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ChildWt1" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildWt1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildWt1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ChildWt1->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ChildWt1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ChildWt1">
<span<?php echo $patient_ot_delivery_register_grid->ChildWt1->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->ChildWt1->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildWt1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildWt1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildWt1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildWt1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildWt1" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt1" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildWt1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildWt1" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt1" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildWt1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->ChildDay1->Visible) { // ChildDay1 ?>
		<td data-name="ChildDay1" <?php echo $patient_ot_delivery_register_grid->ChildDay1->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ChildDay1" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildDay1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildDay1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ChildDay1->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ChildDay1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildDay1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildDay1->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ChildDay1" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildDay1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildDay1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ChildDay1->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ChildDay1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ChildDay1">
<span<?php echo $patient_ot_delivery_register_grid->ChildDay1->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->ChildDay1->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildDay1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildDay1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildDay1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildDay1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildDay1" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay1" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildDay1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildDay1" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay1" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildDay1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->ChildOE1->Visible) { // ChildOE1 ?>
		<td data-name="ChildOE1" <?php echo $patient_ot_delivery_register_grid->ChildOE1->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ChildOE1" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildOE1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildOE1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ChildOE1->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ChildOE1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildOE1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildOE1->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ChildOE1" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildOE1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildOE1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ChildOE1->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ChildOE1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ChildOE1">
<span<?php echo $patient_ot_delivery_register_grid->ChildOE1->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->ChildOE1->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildOE1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildOE1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildOE1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildOE1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildOE1" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE1" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildOE1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildOE1" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE1" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildOE1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->ChildBlGrp1->Visible) { // ChildBlGrp1 ?>
		<td data-name="ChildBlGrp1" <?php echo $patient_ot_delivery_register_grid->ChildBlGrp1->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ChildBlGrp1" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBlGrp1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ChildBlGrp1->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ChildBlGrp1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBlGrp1->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ChildBlGrp1" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBlGrp1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ChildBlGrp1->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ChildBlGrp1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ChildBlGrp1">
<span<?php echo $patient_ot_delivery_register_grid->ChildBlGrp1->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->ChildBlGrp1->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBlGrp1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBlGrp1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp1" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp1" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBlGrp1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp1" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp1" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBlGrp1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->ApgarScore1->Visible) { // ApgarScore1 ?>
		<td data-name="ApgarScore1" <?php echo $patient_ot_delivery_register_grid->ApgarScore1->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ApgarScore1" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ApgarScore1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ApgarScore1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ApgarScore1->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ApgarScore1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ApgarScore1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ApgarScore1->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ApgarScore1" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ApgarScore1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ApgarScore1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ApgarScore1->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ApgarScore1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ApgarScore1">
<span<?php echo $patient_ot_delivery_register_grid->ApgarScore1->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->ApgarScore1->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ApgarScore1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ApgarScore1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ApgarScore1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ApgarScore1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ApgarScore1" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore1" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ApgarScore1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ApgarScore1" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore1" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ApgarScore1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->birthnotification1->Visible) { // birthnotification1 ?>
		<td data-name="birthnotification1" <?php echo $patient_ot_delivery_register_grid->birthnotification1->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_birthnotification1" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_birthnotification1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->birthnotification1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->birthnotification1->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->birthnotification1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_birthnotification1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->birthnotification1->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_birthnotification1" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_birthnotification1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->birthnotification1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->birthnotification1->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->birthnotification1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_birthnotification1">
<span<?php echo $patient_ot_delivery_register_grid->birthnotification1->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->birthnotification1->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_birthnotification1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->birthnotification1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_birthnotification1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->birthnotification1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_birthnotification1" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification1" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->birthnotification1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_birthnotification1" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification1" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->birthnotification1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->formno1->Visible) { // formno1 ?>
		<td data-name="formno1" <?php echo $patient_ot_delivery_register_grid->formno1->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_formno1" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_formno1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->formno1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->formno1->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->formno1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_formno1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->formno1->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_formno1" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_formno1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->formno1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->formno1->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->formno1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_formno1">
<span<?php echo $patient_ot_delivery_register_grid->formno1->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->formno1->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_formno1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->formno1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_formno1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->formno1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_formno1" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno1" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->formno1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_formno1" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno1" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->formno1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->RecievedTime->Visible) { // RecievedTime ?>
		<td data-name="RecievedTime" <?php echo $patient_ot_delivery_register_grid->RecievedTime->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_RecievedTime" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_RecievedTime" data-format="11" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecievedTime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecievedTime" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->RecievedTime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->RecievedTime->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->RecievedTime->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_grid->RecievedTime->ReadOnly && !$patient_ot_delivery_register_grid->RecievedTime->Disabled && !isset($patient_ot_delivery_register_grid->RecievedTime->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_grid->RecievedTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecievedTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_RecievedTime" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecievedTime" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecievedTime" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->RecievedTime->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_RecievedTime" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_RecievedTime" data-format="11" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecievedTime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecievedTime" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->RecievedTime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->RecievedTime->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->RecievedTime->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_grid->RecievedTime->ReadOnly && !$patient_ot_delivery_register_grid->RecievedTime->Disabled && !isset($patient_ot_delivery_register_grid->RecievedTime->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_grid->RecievedTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecievedTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_RecievedTime">
<span<?php echo $patient_ot_delivery_register_grid->RecievedTime->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->RecievedTime->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_RecievedTime" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecievedTime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecievedTime" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->RecievedTime->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_RecievedTime" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecievedTime" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecievedTime" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->RecievedTime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_RecievedTime" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecievedTime" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecievedTime" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->RecievedTime->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_RecievedTime" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecievedTime" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecievedTime" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->RecievedTime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->AnaesthesiaStarted->Visible) { // AnaesthesiaStarted ?>
		<td data-name="AnaesthesiaStarted" <?php echo $patient_ot_delivery_register_grid->AnaesthesiaStarted->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_AnaesthesiaStarted" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaStarted" data-format="11" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaStarted" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaStarted" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AnaesthesiaStarted->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->AnaesthesiaStarted->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->AnaesthesiaStarted->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_grid->AnaesthesiaStarted->ReadOnly && !$patient_ot_delivery_register_grid->AnaesthesiaStarted->Disabled && !isset($patient_ot_delivery_register_grid->AnaesthesiaStarted->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_grid->AnaesthesiaStarted->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaStarted", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaStarted" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaStarted" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaStarted" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AnaesthesiaStarted->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_AnaesthesiaStarted" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaStarted" data-format="11" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaStarted" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaStarted" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AnaesthesiaStarted->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->AnaesthesiaStarted->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->AnaesthesiaStarted->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_grid->AnaesthesiaStarted->ReadOnly && !$patient_ot_delivery_register_grid->AnaesthesiaStarted->Disabled && !isset($patient_ot_delivery_register_grid->AnaesthesiaStarted->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_grid->AnaesthesiaStarted->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaStarted", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_AnaesthesiaStarted">
<span<?php echo $patient_ot_delivery_register_grid->AnaesthesiaStarted->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->AnaesthesiaStarted->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaStarted" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaStarted" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaStarted" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AnaesthesiaStarted->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaStarted" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaStarted" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaStarted" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AnaesthesiaStarted->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaStarted" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaStarted" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaStarted" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AnaesthesiaStarted->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaStarted" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaStarted" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaStarted" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AnaesthesiaStarted->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->AnaesthesiaEnded->Visible) { // AnaesthesiaEnded ?>
		<td data-name="AnaesthesiaEnded" <?php echo $patient_ot_delivery_register_grid->AnaesthesiaEnded->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_AnaesthesiaEnded" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaEnded" data-format="11" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaEnded" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaEnded" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AnaesthesiaEnded->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->AnaesthesiaEnded->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->AnaesthesiaEnded->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_grid->AnaesthesiaEnded->ReadOnly && !$patient_ot_delivery_register_grid->AnaesthesiaEnded->Disabled && !isset($patient_ot_delivery_register_grid->AnaesthesiaEnded->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_grid->AnaesthesiaEnded->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaEnded", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaEnded" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaEnded" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaEnded" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AnaesthesiaEnded->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_AnaesthesiaEnded" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaEnded" data-format="11" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaEnded" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaEnded" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AnaesthesiaEnded->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->AnaesthesiaEnded->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->AnaesthesiaEnded->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_grid->AnaesthesiaEnded->ReadOnly && !$patient_ot_delivery_register_grid->AnaesthesiaEnded->Disabled && !isset($patient_ot_delivery_register_grid->AnaesthesiaEnded->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_grid->AnaesthesiaEnded->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaEnded", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_AnaesthesiaEnded">
<span<?php echo $patient_ot_delivery_register_grid->AnaesthesiaEnded->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->AnaesthesiaEnded->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaEnded" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaEnded" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaEnded" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AnaesthesiaEnded->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaEnded" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaEnded" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaEnded" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AnaesthesiaEnded->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaEnded" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaEnded" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaEnded" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AnaesthesiaEnded->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaEnded" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaEnded" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaEnded" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AnaesthesiaEnded->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->surgeryStarted->Visible) { // surgeryStarted ?>
		<td data-name="surgeryStarted" <?php echo $patient_ot_delivery_register_grid->surgeryStarted->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_surgeryStarted" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_surgeryStarted" data-format="11" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryStarted" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryStarted" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->surgeryStarted->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->surgeryStarted->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->surgeryStarted->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_grid->surgeryStarted->ReadOnly && !$patient_ot_delivery_register_grid->surgeryStarted->Disabled && !isset($patient_ot_delivery_register_grid->surgeryStarted->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_grid->surgeryStarted->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryStarted", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_surgeryStarted" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryStarted" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryStarted" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->surgeryStarted->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_surgeryStarted" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_surgeryStarted" data-format="11" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryStarted" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryStarted" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->surgeryStarted->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->surgeryStarted->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->surgeryStarted->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_grid->surgeryStarted->ReadOnly && !$patient_ot_delivery_register_grid->surgeryStarted->Disabled && !isset($patient_ot_delivery_register_grid->surgeryStarted->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_grid->surgeryStarted->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryStarted", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_surgeryStarted">
<span<?php echo $patient_ot_delivery_register_grid->surgeryStarted->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->surgeryStarted->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_surgeryStarted" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryStarted" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryStarted" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->surgeryStarted->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_surgeryStarted" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryStarted" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryStarted" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->surgeryStarted->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_surgeryStarted" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryStarted" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryStarted" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->surgeryStarted->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_surgeryStarted" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryStarted" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryStarted" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->surgeryStarted->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->surgeryEnded->Visible) { // surgeryEnded ?>
		<td data-name="surgeryEnded" <?php echo $patient_ot_delivery_register_grid->surgeryEnded->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_surgeryEnded" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_surgeryEnded" data-format="11" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryEnded" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryEnded" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->surgeryEnded->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->surgeryEnded->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->surgeryEnded->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_grid->surgeryEnded->ReadOnly && !$patient_ot_delivery_register_grid->surgeryEnded->Disabled && !isset($patient_ot_delivery_register_grid->surgeryEnded->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_grid->surgeryEnded->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryEnded", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_surgeryEnded" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryEnded" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryEnded" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->surgeryEnded->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_surgeryEnded" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_surgeryEnded" data-format="11" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryEnded" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryEnded" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->surgeryEnded->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->surgeryEnded->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->surgeryEnded->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_grid->surgeryEnded->ReadOnly && !$patient_ot_delivery_register_grid->surgeryEnded->Disabled && !isset($patient_ot_delivery_register_grid->surgeryEnded->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_grid->surgeryEnded->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryEnded", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_surgeryEnded">
<span<?php echo $patient_ot_delivery_register_grid->surgeryEnded->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->surgeryEnded->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_surgeryEnded" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryEnded" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryEnded" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->surgeryEnded->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_surgeryEnded" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryEnded" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryEnded" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->surgeryEnded->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_surgeryEnded" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryEnded" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryEnded" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->surgeryEnded->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_surgeryEnded" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryEnded" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryEnded" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->surgeryEnded->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->RecoveryTime->Visible) { // RecoveryTime ?>
		<td data-name="RecoveryTime" <?php echo $patient_ot_delivery_register_grid->RecoveryTime->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_RecoveryTime" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_RecoveryTime" data-format="11" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecoveryTime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecoveryTime" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->RecoveryTime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->RecoveryTime->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->RecoveryTime->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_grid->RecoveryTime->ReadOnly && !$patient_ot_delivery_register_grid->RecoveryTime->Disabled && !isset($patient_ot_delivery_register_grid->RecoveryTime->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_grid->RecoveryTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecoveryTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_RecoveryTime" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecoveryTime" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecoveryTime" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->RecoveryTime->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_RecoveryTime" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_RecoveryTime" data-format="11" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecoveryTime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecoveryTime" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->RecoveryTime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->RecoveryTime->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->RecoveryTime->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_grid->RecoveryTime->ReadOnly && !$patient_ot_delivery_register_grid->RecoveryTime->Disabled && !isset($patient_ot_delivery_register_grid->RecoveryTime->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_grid->RecoveryTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecoveryTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_RecoveryTime">
<span<?php echo $patient_ot_delivery_register_grid->RecoveryTime->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->RecoveryTime->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_RecoveryTime" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecoveryTime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecoveryTime" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->RecoveryTime->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_RecoveryTime" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecoveryTime" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecoveryTime" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->RecoveryTime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_RecoveryTime" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecoveryTime" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecoveryTime" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->RecoveryTime->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_RecoveryTime" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecoveryTime" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecoveryTime" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->RecoveryTime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->ShiftedTime->Visible) { // ShiftedTime ?>
		<td data-name="ShiftedTime" <?php echo $patient_ot_delivery_register_grid->ShiftedTime->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ShiftedTime" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ShiftedTime" data-format="11" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ShiftedTime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ShiftedTime" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ShiftedTime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ShiftedTime->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ShiftedTime->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_grid->ShiftedTime->ReadOnly && !$patient_ot_delivery_register_grid->ShiftedTime->Disabled && !isset($patient_ot_delivery_register_grid->ShiftedTime->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_grid->ShiftedTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ShiftedTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ShiftedTime" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ShiftedTime" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ShiftedTime" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ShiftedTime->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ShiftedTime" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ShiftedTime" data-format="11" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ShiftedTime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ShiftedTime" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ShiftedTime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ShiftedTime->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ShiftedTime->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_grid->ShiftedTime->ReadOnly && !$patient_ot_delivery_register_grid->ShiftedTime->Disabled && !isset($patient_ot_delivery_register_grid->ShiftedTime->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_grid->ShiftedTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ShiftedTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ShiftedTime">
<span<?php echo $patient_ot_delivery_register_grid->ShiftedTime->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->ShiftedTime->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ShiftedTime" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ShiftedTime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ShiftedTime" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ShiftedTime->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ShiftedTime" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ShiftedTime" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ShiftedTime" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ShiftedTime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ShiftedTime" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ShiftedTime" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ShiftedTime" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ShiftedTime->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ShiftedTime" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ShiftedTime" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ShiftedTime" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ShiftedTime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->Duration->Visible) { // Duration ?>
		<td data-name="Duration" <?php echo $patient_ot_delivery_register_grid->Duration->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_Duration" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_Duration" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Duration" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Duration" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Duration->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->Duration->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->Duration->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Duration" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Duration" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Duration" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Duration->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_Duration" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_Duration" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Duration" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Duration" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Duration->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->Duration->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->Duration->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_Duration">
<span<?php echo $patient_ot_delivery_register_grid->Duration->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->Duration->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Duration" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Duration" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Duration" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Duration->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Duration" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Duration" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Duration" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Duration->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Duration" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Duration" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Duration" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Duration->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Duration" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Duration" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Duration" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Duration->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->Surgeon->Visible) { // Surgeon ?>
		<td data-name="Surgeon" <?php echo $patient_ot_delivery_register_grid->Surgeon->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_Surgeon" class="form-group">
<?php
$onchange = $patient_ot_delivery_register_grid->Surgeon->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_ot_delivery_register_grid->Surgeon->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon">
	<input type="text" class="form-control" name="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" id="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" value="<?php echo RemoveHtml($patient_ot_delivery_register_grid->Surgeon->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Surgeon->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Surgeon->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register_grid->Surgeon->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Surgeon" data-value-separator="<?php echo $patient_ot_delivery_register_grid->Surgeon->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Surgeon->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid"], function() {
	fpatient_ot_delivery_registergrid.createAutoSuggest({"id":"x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon","forceSelect":false});
});
</script>
<?php echo $patient_ot_delivery_register_grid->Surgeon->Lookup->getParamTag($patient_ot_delivery_register_grid, "p_x" . $patient_ot_delivery_register_grid->RowIndex . "_Surgeon") ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Surgeon" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Surgeon->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_Surgeon" class="form-group">
<?php
$onchange = $patient_ot_delivery_register_grid->Surgeon->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_ot_delivery_register_grid->Surgeon->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon">
	<input type="text" class="form-control" name="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" id="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" value="<?php echo RemoveHtml($patient_ot_delivery_register_grid->Surgeon->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Surgeon->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Surgeon->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register_grid->Surgeon->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Surgeon" data-value-separator="<?php echo $patient_ot_delivery_register_grid->Surgeon->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Surgeon->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid"], function() {
	fpatient_ot_delivery_registergrid.createAutoSuggest({"id":"x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon","forceSelect":false});
});
</script>
<?php echo $patient_ot_delivery_register_grid->Surgeon->Lookup->getParamTag($patient_ot_delivery_register_grid, "p_x" . $patient_ot_delivery_register_grid->RowIndex . "_Surgeon") ?>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_Surgeon">
<span<?php echo $patient_ot_delivery_register_grid->Surgeon->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->Surgeon->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Surgeon" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Surgeon->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Surgeon" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Surgeon->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Surgeon" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Surgeon->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Surgeon" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Surgeon->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->Anaesthetist->Visible) { // Anaesthetist ?>
		<td data-name="Anaesthetist" <?php echo $patient_ot_delivery_register_grid->Anaesthetist->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_Anaesthetist" class="form-group">
<?php
$onchange = $patient_ot_delivery_register_grid->Anaesthetist->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_ot_delivery_register_grid->Anaesthetist->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist">
	<input type="text" class="form-control" name="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" id="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" value="<?php echo RemoveHtml($patient_ot_delivery_register_grid->Anaesthetist->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Anaesthetist->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Anaesthetist->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register_grid->Anaesthetist->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Anaesthetist" data-value-separator="<?php echo $patient_ot_delivery_register_grid->Anaesthetist->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Anaesthetist->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid"], function() {
	fpatient_ot_delivery_registergrid.createAutoSuggest({"id":"x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist","forceSelect":false});
});
</script>
<?php echo $patient_ot_delivery_register_grid->Anaesthetist->Lookup->getParamTag($patient_ot_delivery_register_grid, "p_x" . $patient_ot_delivery_register_grid->RowIndex . "_Anaesthetist") ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Anaesthetist" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Anaesthetist->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_Anaesthetist" class="form-group">
<?php
$onchange = $patient_ot_delivery_register_grid->Anaesthetist->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_ot_delivery_register_grid->Anaesthetist->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist">
	<input type="text" class="form-control" name="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" id="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" value="<?php echo RemoveHtml($patient_ot_delivery_register_grid->Anaesthetist->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Anaesthetist->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Anaesthetist->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register_grid->Anaesthetist->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Anaesthetist" data-value-separator="<?php echo $patient_ot_delivery_register_grid->Anaesthetist->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Anaesthetist->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid"], function() {
	fpatient_ot_delivery_registergrid.createAutoSuggest({"id":"x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist","forceSelect":false});
});
</script>
<?php echo $patient_ot_delivery_register_grid->Anaesthetist->Lookup->getParamTag($patient_ot_delivery_register_grid, "p_x" . $patient_ot_delivery_register_grid->RowIndex . "_Anaesthetist") ?>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_Anaesthetist">
<span<?php echo $patient_ot_delivery_register_grid->Anaesthetist->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->Anaesthetist->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Anaesthetist" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Anaesthetist->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Anaesthetist" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Anaesthetist->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Anaesthetist" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Anaesthetist->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Anaesthetist" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Anaesthetist->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->AsstSurgeon1->Visible) { // AsstSurgeon1 ?>
		<td data-name="AsstSurgeon1" <?php echo $patient_ot_delivery_register_grid->AsstSurgeon1->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_AsstSurgeon1" class="form-group">
<?php
$onchange = $patient_ot_delivery_register_grid->AsstSurgeon1->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_ot_delivery_register_grid->AsstSurgeon1->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1">
	<input type="text" class="form-control" name="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" id="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" value="<?php echo RemoveHtml($patient_ot_delivery_register_grid->AsstSurgeon1->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AsstSurgeon1->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AsstSurgeon1->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register_grid->AsstSurgeon1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon1" data-value-separator="<?php echo $patient_ot_delivery_register_grid->AsstSurgeon1->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AsstSurgeon1->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid"], function() {
	fpatient_ot_delivery_registergrid.createAutoSuggest({"id":"x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1","forceSelect":false});
});
</script>
<?php echo $patient_ot_delivery_register_grid->AsstSurgeon1->Lookup->getParamTag($patient_ot_delivery_register_grid, "p_x" . $patient_ot_delivery_register_grid->RowIndex . "_AsstSurgeon1") ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AsstSurgeon1->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_AsstSurgeon1" class="form-group">
<?php
$onchange = $patient_ot_delivery_register_grid->AsstSurgeon1->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_ot_delivery_register_grid->AsstSurgeon1->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1">
	<input type="text" class="form-control" name="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" id="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" value="<?php echo RemoveHtml($patient_ot_delivery_register_grid->AsstSurgeon1->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AsstSurgeon1->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AsstSurgeon1->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register_grid->AsstSurgeon1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon1" data-value-separator="<?php echo $patient_ot_delivery_register_grid->AsstSurgeon1->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AsstSurgeon1->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid"], function() {
	fpatient_ot_delivery_registergrid.createAutoSuggest({"id":"x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1","forceSelect":false});
});
</script>
<?php echo $patient_ot_delivery_register_grid->AsstSurgeon1->Lookup->getParamTag($patient_ot_delivery_register_grid, "p_x" . $patient_ot_delivery_register_grid->RowIndex . "_AsstSurgeon1") ?>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_AsstSurgeon1">
<span<?php echo $patient_ot_delivery_register_grid->AsstSurgeon1->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->AsstSurgeon1->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AsstSurgeon1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AsstSurgeon1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon1" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AsstSurgeon1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon1" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AsstSurgeon1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->AsstSurgeon2->Visible) { // AsstSurgeon2 ?>
		<td data-name="AsstSurgeon2" <?php echo $patient_ot_delivery_register_grid->AsstSurgeon2->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_AsstSurgeon2" class="form-group">
<?php
$onchange = $patient_ot_delivery_register_grid->AsstSurgeon2->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_ot_delivery_register_grid->AsstSurgeon2->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2">
	<input type="text" class="form-control" name="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" id="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" value="<?php echo RemoveHtml($patient_ot_delivery_register_grid->AsstSurgeon2->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AsstSurgeon2->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AsstSurgeon2->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register_grid->AsstSurgeon2->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon2" data-value-separator="<?php echo $patient_ot_delivery_register_grid->AsstSurgeon2->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AsstSurgeon2->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid"], function() {
	fpatient_ot_delivery_registergrid.createAutoSuggest({"id":"x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2","forceSelect":false});
});
</script>
<?php echo $patient_ot_delivery_register_grid->AsstSurgeon2->Lookup->getParamTag($patient_ot_delivery_register_grid, "p_x" . $patient_ot_delivery_register_grid->RowIndex . "_AsstSurgeon2") ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon2" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AsstSurgeon2->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_AsstSurgeon2" class="form-group">
<?php
$onchange = $patient_ot_delivery_register_grid->AsstSurgeon2->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_ot_delivery_register_grid->AsstSurgeon2->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2">
	<input type="text" class="form-control" name="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" id="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" value="<?php echo RemoveHtml($patient_ot_delivery_register_grid->AsstSurgeon2->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AsstSurgeon2->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AsstSurgeon2->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register_grid->AsstSurgeon2->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon2" data-value-separator="<?php echo $patient_ot_delivery_register_grid->AsstSurgeon2->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AsstSurgeon2->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid"], function() {
	fpatient_ot_delivery_registergrid.createAutoSuggest({"id":"x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2","forceSelect":false});
});
</script>
<?php echo $patient_ot_delivery_register_grid->AsstSurgeon2->Lookup->getParamTag($patient_ot_delivery_register_grid, "p_x" . $patient_ot_delivery_register_grid->RowIndex . "_AsstSurgeon2") ?>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_AsstSurgeon2">
<span<?php echo $patient_ot_delivery_register_grid->AsstSurgeon2->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->AsstSurgeon2->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon2" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AsstSurgeon2->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon2" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AsstSurgeon2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon2" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AsstSurgeon2->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon2" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AsstSurgeon2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->paediatric->Visible) { // paediatric ?>
		<td data-name="paediatric" <?php echo $patient_ot_delivery_register_grid->paediatric->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_paediatric" class="form-group">
<?php
$onchange = $patient_ot_delivery_register_grid->paediatric->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_ot_delivery_register_grid->paediatric->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric">
	<input type="text" class="form-control" name="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" id="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" value="<?php echo RemoveHtml($patient_ot_delivery_register_grid->paediatric->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->paediatric->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->paediatric->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register_grid->paediatric->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_paediatric" data-value-separator="<?php echo $patient_ot_delivery_register_grid->paediatric->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->paediatric->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid"], function() {
	fpatient_ot_delivery_registergrid.createAutoSuggest({"id":"x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric","forceSelect":false});
});
</script>
<?php echo $patient_ot_delivery_register_grid->paediatric->Lookup->getParamTag($patient_ot_delivery_register_grid, "p_x" . $patient_ot_delivery_register_grid->RowIndex . "_paediatric") ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_paediatric" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->paediatric->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_paediatric" class="form-group">
<?php
$onchange = $patient_ot_delivery_register_grid->paediatric->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_ot_delivery_register_grid->paediatric->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric">
	<input type="text" class="form-control" name="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" id="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" value="<?php echo RemoveHtml($patient_ot_delivery_register_grid->paediatric->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->paediatric->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->paediatric->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register_grid->paediatric->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_paediatric" data-value-separator="<?php echo $patient_ot_delivery_register_grid->paediatric->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->paediatric->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid"], function() {
	fpatient_ot_delivery_registergrid.createAutoSuggest({"id":"x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric","forceSelect":false});
});
</script>
<?php echo $patient_ot_delivery_register_grid->paediatric->Lookup->getParamTag($patient_ot_delivery_register_grid, "p_x" . $patient_ot_delivery_register_grid->RowIndex . "_paediatric") ?>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_paediatric">
<span<?php echo $patient_ot_delivery_register_grid->paediatric->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->paediatric->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_paediatric" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->paediatric->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_paediatric" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->paediatric->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_paediatric" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->paediatric->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_paediatric" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->paediatric->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->ScrubNurse1->Visible) { // ScrubNurse1 ?>
		<td data-name="ScrubNurse1" <?php echo $patient_ot_delivery_register_grid->ScrubNurse1->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ScrubNurse1" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ScrubNurse1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ScrubNurse1->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ScrubNurse1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ScrubNurse1->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ScrubNurse1" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ScrubNurse1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ScrubNurse1->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ScrubNurse1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ScrubNurse1">
<span<?php echo $patient_ot_delivery_register_grid->ScrubNurse1->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->ScrubNurse1->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ScrubNurse1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ScrubNurse1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse1" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse1" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ScrubNurse1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse1" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse1" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ScrubNurse1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->ScrubNurse2->Visible) { // ScrubNurse2 ?>
		<td data-name="ScrubNurse2" <?php echo $patient_ot_delivery_register_grid->ScrubNurse2->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ScrubNurse2" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse2" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse2" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse2" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ScrubNurse2->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ScrubNurse2->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ScrubNurse2->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse2" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse2" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse2" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ScrubNurse2->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ScrubNurse2" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse2" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse2" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse2" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ScrubNurse2->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ScrubNurse2->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ScrubNurse2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_ScrubNurse2">
<span<?php echo $patient_ot_delivery_register_grid->ScrubNurse2->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->ScrubNurse2->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse2" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse2" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse2" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ScrubNurse2->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse2" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse2" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse2" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ScrubNurse2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse2" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse2" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse2" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ScrubNurse2->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse2" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse2" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse2" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ScrubNurse2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->FloorNurse->Visible) { // FloorNurse ?>
		<td data-name="FloorNurse" <?php echo $patient_ot_delivery_register_grid->FloorNurse->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_FloorNurse" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_FloorNurse" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_FloorNurse" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_FloorNurse" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->FloorNurse->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->FloorNurse->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->FloorNurse->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_FloorNurse" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_FloorNurse" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_FloorNurse" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->FloorNurse->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_FloorNurse" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_FloorNurse" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_FloorNurse" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_FloorNurse" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->FloorNurse->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->FloorNurse->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->FloorNurse->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_FloorNurse">
<span<?php echo $patient_ot_delivery_register_grid->FloorNurse->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->FloorNurse->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_FloorNurse" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_FloorNurse" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_FloorNurse" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->FloorNurse->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_FloorNurse" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_FloorNurse" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_FloorNurse" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->FloorNurse->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_FloorNurse" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_FloorNurse" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_FloorNurse" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->FloorNurse->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_FloorNurse" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_FloorNurse" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_FloorNurse" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->FloorNurse->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->Technician->Visible) { // Technician ?>
		<td data-name="Technician" <?php echo $patient_ot_delivery_register_grid->Technician->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_Technician" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_Technician" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Technician" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Technician" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Technician->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->Technician->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->Technician->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Technician" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Technician" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Technician" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Technician->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_Technician" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_Technician" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Technician" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Technician" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Technician->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->Technician->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->Technician->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_Technician">
<span<?php echo $patient_ot_delivery_register_grid->Technician->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->Technician->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Technician" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Technician" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Technician" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Technician->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Technician" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Technician" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Technician" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Technician->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Technician" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Technician" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Technician" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Technician->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Technician" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Technician" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Technician" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Technician->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->HouseKeeping->Visible) { // HouseKeeping ?>
		<td data-name="HouseKeeping" <?php echo $patient_ot_delivery_register_grid->HouseKeeping->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_HouseKeeping" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_HouseKeeping" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HouseKeeping" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HouseKeeping" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->HouseKeeping->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->HouseKeeping->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->HouseKeeping->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_HouseKeeping" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HouseKeeping" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HouseKeeping" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->HouseKeeping->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_HouseKeeping" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_HouseKeeping" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HouseKeeping" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HouseKeeping" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->HouseKeeping->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->HouseKeeping->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->HouseKeeping->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_HouseKeeping">
<span<?php echo $patient_ot_delivery_register_grid->HouseKeeping->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->HouseKeeping->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_HouseKeeping" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HouseKeeping" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HouseKeeping" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->HouseKeeping->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_HouseKeeping" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HouseKeeping" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HouseKeeping" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->HouseKeeping->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_HouseKeeping" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HouseKeeping" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HouseKeeping" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->HouseKeeping->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_HouseKeeping" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HouseKeeping" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HouseKeeping" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->HouseKeeping->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->countsCheckedMops->Visible) { // countsCheckedMops ?>
		<td data-name="countsCheckedMops" <?php echo $patient_ot_delivery_register_grid->countsCheckedMops->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_countsCheckedMops" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_countsCheckedMops" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_countsCheckedMops" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_countsCheckedMops" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->countsCheckedMops->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->countsCheckedMops->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->countsCheckedMops->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_countsCheckedMops" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_countsCheckedMops" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_countsCheckedMops" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->countsCheckedMops->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_countsCheckedMops" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_countsCheckedMops" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_countsCheckedMops" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_countsCheckedMops" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->countsCheckedMops->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->countsCheckedMops->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->countsCheckedMops->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_countsCheckedMops">
<span<?php echo $patient_ot_delivery_register_grid->countsCheckedMops->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->countsCheckedMops->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_countsCheckedMops" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_countsCheckedMops" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_countsCheckedMops" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->countsCheckedMops->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_countsCheckedMops" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_countsCheckedMops" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_countsCheckedMops" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->countsCheckedMops->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_countsCheckedMops" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_countsCheckedMops" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_countsCheckedMops" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->countsCheckedMops->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_countsCheckedMops" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_countsCheckedMops" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_countsCheckedMops" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->countsCheckedMops->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->gauze->Visible) { // gauze ?>
		<td data-name="gauze" <?php echo $patient_ot_delivery_register_grid->gauze->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_gauze" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_gauze" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_gauze" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_gauze" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->gauze->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->gauze->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->gauze->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_gauze" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_gauze" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_gauze" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->gauze->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_gauze" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_gauze" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_gauze" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_gauze" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->gauze->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->gauze->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->gauze->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_gauze">
<span<?php echo $patient_ot_delivery_register_grid->gauze->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->gauze->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_gauze" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_gauze" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_gauze" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->gauze->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_gauze" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_gauze" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_gauze" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->gauze->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_gauze" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_gauze" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_gauze" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->gauze->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_gauze" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_gauze" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_gauze" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->gauze->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->needles->Visible) { // needles ?>
		<td data-name="needles" <?php echo $patient_ot_delivery_register_grid->needles->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_needles" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_needles" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_needles" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_needles" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->needles->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->needles->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->needles->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_needles" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_needles" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_needles" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->needles->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_needles" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_needles" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_needles" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_needles" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->needles->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->needles->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->needles->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_needles">
<span<?php echo $patient_ot_delivery_register_grid->needles->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->needles->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_needles" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_needles" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_needles" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->needles->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_needles" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_needles" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_needles" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->needles->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_needles" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_needles" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_needles" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->needles->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_needles" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_needles" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_needles" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->needles->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->bloodloss->Visible) { // bloodloss ?>
		<td data-name="bloodloss" <?php echo $patient_ot_delivery_register_grid->bloodloss->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_bloodloss" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_bloodloss" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodloss" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodloss" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->bloodloss->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->bloodloss->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->bloodloss->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodloss" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodloss" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodloss" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->bloodloss->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_bloodloss" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_bloodloss" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodloss" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodloss" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->bloodloss->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->bloodloss->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->bloodloss->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_bloodloss">
<span<?php echo $patient_ot_delivery_register_grid->bloodloss->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->bloodloss->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodloss" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodloss" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodloss" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->bloodloss->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodloss" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodloss" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodloss" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->bloodloss->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodloss" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodloss" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodloss" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->bloodloss->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodloss" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodloss" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodloss" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->bloodloss->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->bloodtransfusion->Visible) { // bloodtransfusion ?>
		<td data-name="bloodtransfusion" <?php echo $patient_ot_delivery_register_grid->bloodtransfusion->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_bloodtransfusion" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_bloodtransfusion" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodtransfusion" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodtransfusion" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->bloodtransfusion->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->bloodtransfusion->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->bloodtransfusion->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodtransfusion" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodtransfusion" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodtransfusion" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->bloodtransfusion->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_bloodtransfusion" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_bloodtransfusion" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodtransfusion" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodtransfusion" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->bloodtransfusion->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->bloodtransfusion->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->bloodtransfusion->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_bloodtransfusion">
<span<?php echo $patient_ot_delivery_register_grid->bloodtransfusion->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->bloodtransfusion->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodtransfusion" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodtransfusion" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodtransfusion" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->bloodtransfusion->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodtransfusion" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodtransfusion" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodtransfusion" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->bloodtransfusion->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodtransfusion" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodtransfusion" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodtransfusion" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->bloodtransfusion->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodtransfusion" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodtransfusion" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodtransfusion" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->bloodtransfusion->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->Reception->Visible) { // Reception ?>
		<td data-name="Reception" <?php echo $patient_ot_delivery_register_grid->Reception->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_ot_delivery_register_grid->Reception->getSessionValue() != "") { ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_Reception" class="form-group">
<span<?php echo $patient_ot_delivery_register_grid->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->Reception->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Reception->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_Reception" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_Reception" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" size="30" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->Reception->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->Reception->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Reception" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Reception->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($patient_ot_delivery_register_grid->Reception->getSessionValue() != "") { ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_Reception" class="form-group">
<span<?php echo $patient_ot_delivery_register_grid->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->Reception->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Reception->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_Reception" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_Reception" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" size="30" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->Reception->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->Reception->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_Reception">
<span<?php echo $patient_ot_delivery_register_grid->Reception->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->Reception->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Reception" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Reception->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Reception" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Reception->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Reception" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Reception->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Reception" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Reception->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->PId->Visible) { // PId ?>
		<td data-name="PId" <?php echo $patient_ot_delivery_register_grid->PId->cellAttributes() ?>>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_ot_delivery_register_grid->PId->getSessionValue() != "") { ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_PId" class="form-group">
<span<?php echo $patient_ot_delivery_register_grid->PId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->PId->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->PId->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_PId" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_PId" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" size="30" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->PId->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->PId->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->PId->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PId" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->PId->OldValue) ?>">
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($patient_ot_delivery_register_grid->PId->getSessionValue() != "") { ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_PId" class="form-group">
<span<?php echo $patient_ot_delivery_register_grid->PId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->PId->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->PId->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_PId" class="form-group">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_PId" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" size="30" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->PId->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->PId->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->PId->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_ot_delivery_register_grid->RowCount ?>_patient_ot_delivery_register_PId">
<span<?php echo $patient_ot_delivery_register_grid->PId->viewAttributes() ?>><?php echo $patient_ot_delivery_register_grid->PId->getViewValue() ?></span>
</span>
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PId" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->PId->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PId" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->PId->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PId" name="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" id="fpatient_ot_delivery_registergrid$x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->PId->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PId" name="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" id="fpatient_ot_delivery_registergrid$o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->PId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_ot_delivery_register_grid->ListOptions->render("body", "right", $patient_ot_delivery_register_grid->RowCount);
?>
	</tr>
<?php if ($patient_ot_delivery_register->RowType == ROWTYPE_ADD || $patient_ot_delivery_register->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "load"], function() {
	fpatient_ot_delivery_registergrid.updateLists(<?php echo $patient_ot_delivery_register_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$patient_ot_delivery_register_grid->isGridAdd() || $patient_ot_delivery_register->CurrentMode == "copy")
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
		$patient_ot_delivery_register->RowAttrs->merge(["data-rowindex" => $patient_ot_delivery_register_grid->RowIndex, "id" => "r0_patient_ot_delivery_register", "data-rowtype" => ROWTYPE_ADD]);
		$patient_ot_delivery_register->RowAttrs->appendClass("ew-template");
		$patient_ot_delivery_register->RowType = ROWTYPE_ADD;

		// Render row
		$patient_ot_delivery_register_grid->renderRow();

		// Render list options
		$patient_ot_delivery_register_grid->renderListOptions();
		$patient_ot_delivery_register_grid->StartRowCount = 0;
?>
	<tr <?php echo $patient_ot_delivery_register->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_ot_delivery_register_grid->ListOptions->render("body", "left", $patient_ot_delivery_register_grid->RowIndex);
?>
	<?php if ($patient_ot_delivery_register_grid->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_id" class="form-group patient_ot_delivery_register_id"></span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_id" class="form-group patient_ot_delivery_register_id">
<span<?php echo $patient_ot_delivery_register_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_id" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_id" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_id" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_id" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->PatID->Visible) { // PatID ?>
		<td data-name="PatID">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_PatID" class="form-group patient_ot_delivery_register_PatID">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_PatID" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatID" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->PatID->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->PatID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_PatID" class="form-group patient_ot_delivery_register_PatID">
<span<?php echo $patient_ot_delivery_register_grid->PatID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->PatID->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatID" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatID" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->PatID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatID" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatID" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->PatID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_PatientName" class="form-group patient_ot_delivery_register_PatientName">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_PatientName" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->PatientName->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->PatientName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_PatientName" class="form-group patient_ot_delivery_register_PatientName">
<span<?php echo $patient_ot_delivery_register_grid->PatientName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->PatientName->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatientName" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->PatientName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatientName" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientName" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->PatientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<?php if ($patient_ot_delivery_register_grid->mrnno->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_ot_delivery_register_mrnno" class="form-group patient_ot_delivery_register_mrnno">
<span<?php echo $patient_ot_delivery_register_grid->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->mrnno->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_mrnno" class="form-group patient_ot_delivery_register_mrnno">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_mrnno" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->mrnno->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_mrnno" class="form-group patient_ot_delivery_register_mrnno">
<span<?php echo $patient_ot_delivery_register_grid->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->mrnno->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_mrnno" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->mrnno->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_mrnno" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->mrnno->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_MobileNumber" class="form-group patient_ot_delivery_register_MobileNumber">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_MobileNumber" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->MobileNumber->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->MobileNumber->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_MobileNumber" class="form-group patient_ot_delivery_register_MobileNumber">
<span<?php echo $patient_ot_delivery_register_grid->MobileNumber->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->MobileNumber->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_MobileNumber" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->MobileNumber->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_MobileNumber" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_MobileNumber" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->MobileNumber->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->Age->Visible) { // Age ?>
		<td data-name="Age">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Age" class="form-group patient_ot_delivery_register_Age">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_Age" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Age" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Age->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->Age->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->Age->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Age" class="form-group patient_ot_delivery_register_Age">
<span<?php echo $patient_ot_delivery_register_grid->Age->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->Age->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Age" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Age" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Age->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Age" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Age" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Age->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->Gender->Visible) { // Gender ?>
		<td data-name="Gender">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Gender" class="form-group patient_ot_delivery_register_Gender">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_Gender" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Gender" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->Gender->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->Gender->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Gender" class="form-group patient_ot_delivery_register_Gender">
<span<?php echo $patient_ot_delivery_register_grid->Gender->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->Gender->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Gender" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Gender" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Gender->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Gender" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Gender" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Gender->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->ObstetricsHistryFeMale->Visible) { // ObstetricsHistryFeMale ?>
		<td data-name="ObstetricsHistryFeMale">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ObstetricsHistryFeMale" class="form-group patient_ot_delivery_register_ObstetricsHistryFeMale">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ObstetricsHistryFeMale" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ObstetricsHistryFeMale" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ObstetricsHistryFeMale" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ObstetricsHistryFeMale->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ObstetricsHistryFeMale->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ObstetricsHistryFeMale->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ObstetricsHistryFeMale" class="form-group patient_ot_delivery_register_ObstetricsHistryFeMale">
<span<?php echo $patient_ot_delivery_register_grid->ObstetricsHistryFeMale->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->ObstetricsHistryFeMale->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ObstetricsHistryFeMale" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ObstetricsHistryFeMale" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ObstetricsHistryFeMale" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ObstetricsHistryFeMale->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ObstetricsHistryFeMale" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ObstetricsHistryFeMale" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ObstetricsHistryFeMale" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ObstetricsHistryFeMale->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->Abortion->Visible) { // Abortion ?>
		<td data-name="Abortion">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Abortion" class="form-group patient_ot_delivery_register_Abortion">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_Abortion" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Abortion" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Abortion" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Abortion->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->Abortion->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->Abortion->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Abortion" class="form-group patient_ot_delivery_register_Abortion">
<span<?php echo $patient_ot_delivery_register_grid->Abortion->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->Abortion->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Abortion" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Abortion" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Abortion" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Abortion->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Abortion" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Abortion" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Abortion" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Abortion->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->ChildBirthDate->Visible) { // ChildBirthDate ?>
		<td data-name="ChildBirthDate">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildBirthDate" class="form-group patient_ot_delivery_register_ChildBirthDate">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate" data-format="7" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBirthDate->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ChildBirthDate->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ChildBirthDate->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_grid->ChildBirthDate->ReadOnly && !$patient_ot_delivery_register_grid->ChildBirthDate->Disabled && !isset($patient_ot_delivery_register_grid->ChildBirthDate->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_grid->ChildBirthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildBirthDate" class="form-group patient_ot_delivery_register_ChildBirthDate">
<span<?php echo $patient_ot_delivery_register_grid->ChildBirthDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->ChildBirthDate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBirthDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBirthDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->ChildBirthTime->Visible) { // ChildBirthTime ?>
		<td data-name="ChildBirthTime">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildBirthTime" class="form-group patient_ot_delivery_register_ChildBirthTime">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBirthTime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ChildBirthTime->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ChildBirthTime->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_grid->ChildBirthTime->ReadOnly && !$patient_ot_delivery_register_grid->ChildBirthTime->Disabled && !isset($patient_ot_delivery_register_grid->ChildBirthTime->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_grid->ChildBirthTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "timepicker"], function() {
	ew.createTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime", {"timeFormat":"h:i A","step":15});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildBirthTime" class="form-group patient_ot_delivery_register_ChildBirthTime">
<span<?php echo $patient_ot_delivery_register_grid->ChildBirthTime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->ChildBirthTime->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBirthTime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBirthTime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->ChildSex->Visible) { // ChildSex ?>
		<td data-name="ChildSex">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildSex" class="form-group patient_ot_delivery_register_ChildSex">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildSex" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildSex->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ChildSex->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ChildSex->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildSex" class="form-group patient_ot_delivery_register_ChildSex">
<span<?php echo $patient_ot_delivery_register_grid->ChildSex->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->ChildSex->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildSex" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildSex->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildSex" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildSex->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->ChildWt->Visible) { // ChildWt ?>
		<td data-name="ChildWt">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildWt" class="form-group patient_ot_delivery_register_ChildWt">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildWt" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildWt->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ChildWt->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ChildWt->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildWt" class="form-group patient_ot_delivery_register_ChildWt">
<span<?php echo $patient_ot_delivery_register_grid->ChildWt->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->ChildWt->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildWt" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildWt->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildWt" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildWt->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->ChildDay->Visible) { // ChildDay ?>
		<td data-name="ChildDay">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildDay" class="form-group patient_ot_delivery_register_ChildDay">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildDay" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildDay->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ChildDay->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ChildDay->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildDay" class="form-group patient_ot_delivery_register_ChildDay">
<span<?php echo $patient_ot_delivery_register_grid->ChildDay->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->ChildDay->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildDay" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildDay->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildDay" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildDay->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->ChildOE->Visible) { // ChildOE ?>
		<td data-name="ChildOE">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildOE" class="form-group patient_ot_delivery_register_ChildOE">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildOE" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildOE->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ChildOE->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ChildOE->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildOE" class="form-group patient_ot_delivery_register_ChildOE">
<span<?php echo $patient_ot_delivery_register_grid->ChildOE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->ChildOE->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildOE" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildOE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildOE" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildOE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->ChildBlGrp->Visible) { // ChildBlGrp ?>
		<td data-name="ChildBlGrp">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildBlGrp" class="form-group patient_ot_delivery_register_ChildBlGrp">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBlGrp->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ChildBlGrp->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ChildBlGrp->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildBlGrp" class="form-group patient_ot_delivery_register_ChildBlGrp">
<span<?php echo $patient_ot_delivery_register_grid->ChildBlGrp->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->ChildBlGrp->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBlGrp->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBlGrp->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->ApgarScore->Visible) { // ApgarScore ?>
		<td data-name="ApgarScore">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ApgarScore" class="form-group patient_ot_delivery_register_ApgarScore">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ApgarScore" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ApgarScore->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ApgarScore->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ApgarScore->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ApgarScore" class="form-group patient_ot_delivery_register_ApgarScore">
<span<?php echo $patient_ot_delivery_register_grid->ApgarScore->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->ApgarScore->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ApgarScore" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ApgarScore->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ApgarScore" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ApgarScore->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->birthnotification->Visible) { // birthnotification ?>
		<td data-name="birthnotification">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_birthnotification" class="form-group patient_ot_delivery_register_birthnotification">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_birthnotification" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->birthnotification->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->birthnotification->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->birthnotification->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_birthnotification" class="form-group patient_ot_delivery_register_birthnotification">
<span<?php echo $patient_ot_delivery_register_grid->birthnotification->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->birthnotification->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_birthnotification" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->birthnotification->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_birthnotification" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->birthnotification->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->formno->Visible) { // formno ?>
		<td data-name="formno">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_formno" class="form-group patient_ot_delivery_register_formno">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_formno" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->formno->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->formno->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->formno->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_formno" class="form-group patient_ot_delivery_register_formno">
<span<?php echo $patient_ot_delivery_register_grid->formno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->formno->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_formno" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->formno->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_formno" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->formno->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->dte->Visible) { // dte ?>
		<td data-name="dte">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_dte" class="form-group patient_ot_delivery_register_dte">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_dte" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_dte" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_dte" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->dte->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->dte->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->dte->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_grid->dte->ReadOnly && !$patient_ot_delivery_register_grid->dte->Disabled && !isset($patient_ot_delivery_register_grid->dte->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_grid->dte->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_dte", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_dte" class="form-group patient_ot_delivery_register_dte">
<span<?php echo $patient_ot_delivery_register_grid->dte->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->dte->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_dte" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_dte" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_dte" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->dte->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_dte" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_dte" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_dte" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->dte->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->motherReligion->Visible) { // motherReligion ?>
		<td data-name="motherReligion">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_motherReligion" class="form-group patient_ot_delivery_register_motherReligion">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_motherReligion" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_motherReligion" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_motherReligion" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->motherReligion->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->motherReligion->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->motherReligion->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_motherReligion" class="form-group patient_ot_delivery_register_motherReligion">
<span<?php echo $patient_ot_delivery_register_grid->motherReligion->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->motherReligion->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_motherReligion" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_motherReligion" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_motherReligion" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->motherReligion->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_motherReligion" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_motherReligion" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_motherReligion" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->motherReligion->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->bloodgroup->Visible) { // bloodgroup ?>
		<td data-name="bloodgroup">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_bloodgroup" class="form-group patient_ot_delivery_register_bloodgroup">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_bloodgroup" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodgroup" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodgroup" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->bloodgroup->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->bloodgroup->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->bloodgroup->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_bloodgroup" class="form-group patient_ot_delivery_register_bloodgroup">
<span<?php echo $patient_ot_delivery_register_grid->bloodgroup->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->bloodgroup->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodgroup" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodgroup" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodgroup" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->bloodgroup->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodgroup" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodgroup" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodgroup" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->bloodgroup->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->status->Visible) { // status ?>
		<td data-name="status">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_status" class="form-group patient_ot_delivery_register_status">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_status" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_status" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->status->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->status->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->status->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_status" class="form-group patient_ot_delivery_register_status">
<span<?php echo $patient_ot_delivery_register_grid->status->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->status->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_status" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_status" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_status" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_status" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->createdby->Visible) { // createdby ?>
		<td data-name="createdby">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_createdby" class="form-group patient_ot_delivery_register_createdby">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_createdby" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createdby" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createdby" size="30" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->createdby->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->createdby->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->createdby->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_createdby" class="form-group patient_ot_delivery_register_createdby">
<span<?php echo $patient_ot_delivery_register_grid->createdby->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->createdby->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_createdby" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createdby" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->createdby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_createdby" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createdby" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_createddatetime" class="form-group patient_ot_delivery_register_createddatetime">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_createddatetime" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createddatetime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->createddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->createddatetime->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->createddatetime->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_grid->createddatetime->ReadOnly && !$patient_ot_delivery_register_grid->createddatetime->Disabled && !isset($patient_ot_delivery_register_grid->createddatetime->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_grid->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_createddatetime" class="form-group patient_ot_delivery_register_createddatetime">
<span<?php echo $patient_ot_delivery_register_grid->createddatetime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->createddatetime->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_createddatetime" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createddatetime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_createddatetime" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createddatetime" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_modifiedby" class="form-group patient_ot_delivery_register_modifiedby">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_modifiedby" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifiedby" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifiedby" size="30" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->modifiedby->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->modifiedby->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->modifiedby->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_modifiedby" class="form-group patient_ot_delivery_register_modifiedby">
<span<?php echo $patient_ot_delivery_register_grid->modifiedby->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->modifiedby->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_modifiedby" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifiedby" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->modifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_modifiedby" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifiedby" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->modifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_modifieddatetime" class="form-group patient_ot_delivery_register_modifieddatetime">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_modifieddatetime" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifieddatetime" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->modifieddatetime->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->modifieddatetime->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_grid->modifieddatetime->ReadOnly && !$patient_ot_delivery_register_grid->modifieddatetime->Disabled && !isset($patient_ot_delivery_register_grid->modifieddatetime->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_grid->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_modifieddatetime" class="form-group patient_ot_delivery_register_modifieddatetime">
<span<?php echo $patient_ot_delivery_register_grid->modifieddatetime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->modifieddatetime->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_modifieddatetime" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->modifieddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_modifieddatetime" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->modifieddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_PatientID" class="form-group patient_ot_delivery_register_PatientID">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_PatientID" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientID" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->PatientID->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->PatientID->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->PatientID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_PatientID" class="form-group patient_ot_delivery_register_PatientID">
<span<?php echo $patient_ot_delivery_register_grid->PatientID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->PatientID->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatientID" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientID" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientID" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->PatientID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatientID" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientID" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PatientID" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->PatientID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_HospID" class="form-group patient_ot_delivery_register_HospID">
<span<?php echo $patient_ot_delivery_register_grid->HospID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->HospID->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_HospID" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HospID" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_HospID" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HospID" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->ChildBirthDate1->Visible) { // ChildBirthDate1 ?>
		<td data-name="ChildBirthDate1">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildBirthDate1" class="form-group patient_ot_delivery_register_ChildBirthDate1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate1" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBirthDate1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ChildBirthDate1->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ChildBirthDate1->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_grid->ChildBirthDate1->ReadOnly && !$patient_ot_delivery_register_grid->ChildBirthDate1->Disabled && !isset($patient_ot_delivery_register_grid->ChildBirthDate1->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_grid->ChildBirthDate1->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate1", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildBirthDate1" class="form-group patient_ot_delivery_register_ChildBirthDate1">
<span<?php echo $patient_ot_delivery_register_grid->ChildBirthDate1->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->ChildBirthDate1->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBirthDate1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthDate1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBirthDate1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->ChildBirthTime1->Visible) { // ChildBirthTime1 ?>
		<td data-name="ChildBirthTime1">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildBirthTime1" class="form-group patient_ot_delivery_register_ChildBirthTime1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBirthTime1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ChildBirthTime1->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ChildBirthTime1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildBirthTime1" class="form-group patient_ot_delivery_register_ChildBirthTime1">
<span<?php echo $patient_ot_delivery_register_grid->ChildBirthTime1->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->ChildBirthTime1->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBirthTime1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBirthTime1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBirthTime1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->ChildSex1->Visible) { // ChildSex1 ?>
		<td data-name="ChildSex1">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildSex1" class="form-group patient_ot_delivery_register_ChildSex1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildSex1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildSex1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ChildSex1->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ChildSex1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildSex1" class="form-group patient_ot_delivery_register_ChildSex1">
<span<?php echo $patient_ot_delivery_register_grid->ChildSex1->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->ChildSex1->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildSex1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildSex1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildSex1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildSex1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildSex1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->ChildWt1->Visible) { // ChildWt1 ?>
		<td data-name="ChildWt1">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildWt1" class="form-group patient_ot_delivery_register_ChildWt1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildWt1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildWt1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ChildWt1->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ChildWt1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildWt1" class="form-group patient_ot_delivery_register_ChildWt1">
<span<?php echo $patient_ot_delivery_register_grid->ChildWt1->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->ChildWt1->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildWt1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildWt1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildWt1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildWt1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildWt1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->ChildDay1->Visible) { // ChildDay1 ?>
		<td data-name="ChildDay1">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildDay1" class="form-group patient_ot_delivery_register_ChildDay1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildDay1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildDay1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ChildDay1->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ChildDay1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildDay1" class="form-group patient_ot_delivery_register_ChildDay1">
<span<?php echo $patient_ot_delivery_register_grid->ChildDay1->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->ChildDay1->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildDay1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildDay1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildDay1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildDay1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildDay1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->ChildOE1->Visible) { // ChildOE1 ?>
		<td data-name="ChildOE1">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildOE1" class="form-group patient_ot_delivery_register_ChildOE1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildOE1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildOE1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ChildOE1->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ChildOE1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildOE1" class="form-group patient_ot_delivery_register_ChildOE1">
<span<?php echo $patient_ot_delivery_register_grid->ChildOE1->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->ChildOE1->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildOE1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildOE1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildOE1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildOE1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildOE1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->ChildBlGrp1->Visible) { // ChildBlGrp1 ?>
		<td data-name="ChildBlGrp1">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildBlGrp1" class="form-group patient_ot_delivery_register_ChildBlGrp1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBlGrp1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ChildBlGrp1->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ChildBlGrp1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildBlGrp1" class="form-group patient_ot_delivery_register_ChildBlGrp1">
<span<?php echo $patient_ot_delivery_register_grid->ChildBlGrp1->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->ChildBlGrp1->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBlGrp1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ChildBlGrp1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ChildBlGrp1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->ApgarScore1->Visible) { // ApgarScore1 ?>
		<td data-name="ApgarScore1">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ApgarScore1" class="form-group patient_ot_delivery_register_ApgarScore1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ApgarScore1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ApgarScore1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ApgarScore1->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ApgarScore1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ApgarScore1" class="form-group patient_ot_delivery_register_ApgarScore1">
<span<?php echo $patient_ot_delivery_register_grid->ApgarScore1->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->ApgarScore1->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ApgarScore1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ApgarScore1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ApgarScore1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ApgarScore1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ApgarScore1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->birthnotification1->Visible) { // birthnotification1 ?>
		<td data-name="birthnotification1">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_birthnotification1" class="form-group patient_ot_delivery_register_birthnotification1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_birthnotification1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->birthnotification1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->birthnotification1->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->birthnotification1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_birthnotification1" class="form-group patient_ot_delivery_register_birthnotification1">
<span<?php echo $patient_ot_delivery_register_grid->birthnotification1->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->birthnotification1->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_birthnotification1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->birthnotification1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_birthnotification1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_birthnotification1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->birthnotification1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->formno1->Visible) { // formno1 ?>
		<td data-name="formno1">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_formno1" class="form-group patient_ot_delivery_register_formno1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_formno1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->formno1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->formno1->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->formno1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_formno1" class="form-group patient_ot_delivery_register_formno1">
<span<?php echo $patient_ot_delivery_register_grid->formno1->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->formno1->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_formno1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->formno1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_formno1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_formno1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->formno1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->RecievedTime->Visible) { // RecievedTime ?>
		<td data-name="RecievedTime">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_RecievedTime" class="form-group patient_ot_delivery_register_RecievedTime">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_RecievedTime" data-format="11" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecievedTime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecievedTime" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->RecievedTime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->RecievedTime->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->RecievedTime->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_grid->RecievedTime->ReadOnly && !$patient_ot_delivery_register_grid->RecievedTime->Disabled && !isset($patient_ot_delivery_register_grid->RecievedTime->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_grid->RecievedTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecievedTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_RecievedTime" class="form-group patient_ot_delivery_register_RecievedTime">
<span<?php echo $patient_ot_delivery_register_grid->RecievedTime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->RecievedTime->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_RecievedTime" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecievedTime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecievedTime" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->RecievedTime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_RecievedTime" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecievedTime" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecievedTime" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->RecievedTime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->AnaesthesiaStarted->Visible) { // AnaesthesiaStarted ?>
		<td data-name="AnaesthesiaStarted">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_AnaesthesiaStarted" class="form-group patient_ot_delivery_register_AnaesthesiaStarted">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaStarted" data-format="11" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaStarted" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaStarted" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AnaesthesiaStarted->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->AnaesthesiaStarted->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->AnaesthesiaStarted->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_grid->AnaesthesiaStarted->ReadOnly && !$patient_ot_delivery_register_grid->AnaesthesiaStarted->Disabled && !isset($patient_ot_delivery_register_grid->AnaesthesiaStarted->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_grid->AnaesthesiaStarted->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaStarted", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_AnaesthesiaStarted" class="form-group patient_ot_delivery_register_AnaesthesiaStarted">
<span<?php echo $patient_ot_delivery_register_grid->AnaesthesiaStarted->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->AnaesthesiaStarted->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaStarted" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaStarted" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaStarted" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AnaesthesiaStarted->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaStarted" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaStarted" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaStarted" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AnaesthesiaStarted->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->AnaesthesiaEnded->Visible) { // AnaesthesiaEnded ?>
		<td data-name="AnaesthesiaEnded">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_AnaesthesiaEnded" class="form-group patient_ot_delivery_register_AnaesthesiaEnded">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaEnded" data-format="11" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaEnded" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaEnded" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AnaesthesiaEnded->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->AnaesthesiaEnded->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->AnaesthesiaEnded->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_grid->AnaesthesiaEnded->ReadOnly && !$patient_ot_delivery_register_grid->AnaesthesiaEnded->Disabled && !isset($patient_ot_delivery_register_grid->AnaesthesiaEnded->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_grid->AnaesthesiaEnded->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaEnded", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_AnaesthesiaEnded" class="form-group patient_ot_delivery_register_AnaesthesiaEnded">
<span<?php echo $patient_ot_delivery_register_grid->AnaesthesiaEnded->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->AnaesthesiaEnded->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaEnded" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaEnded" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaEnded" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AnaesthesiaEnded->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaEnded" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaEnded" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AnaesthesiaEnded" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AnaesthesiaEnded->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->surgeryStarted->Visible) { // surgeryStarted ?>
		<td data-name="surgeryStarted">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_surgeryStarted" class="form-group patient_ot_delivery_register_surgeryStarted">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_surgeryStarted" data-format="11" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryStarted" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryStarted" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->surgeryStarted->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->surgeryStarted->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->surgeryStarted->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_grid->surgeryStarted->ReadOnly && !$patient_ot_delivery_register_grid->surgeryStarted->Disabled && !isset($patient_ot_delivery_register_grid->surgeryStarted->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_grid->surgeryStarted->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryStarted", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_surgeryStarted" class="form-group patient_ot_delivery_register_surgeryStarted">
<span<?php echo $patient_ot_delivery_register_grid->surgeryStarted->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->surgeryStarted->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_surgeryStarted" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryStarted" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryStarted" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->surgeryStarted->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_surgeryStarted" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryStarted" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryStarted" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->surgeryStarted->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->surgeryEnded->Visible) { // surgeryEnded ?>
		<td data-name="surgeryEnded">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_surgeryEnded" class="form-group patient_ot_delivery_register_surgeryEnded">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_surgeryEnded" data-format="11" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryEnded" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryEnded" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->surgeryEnded->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->surgeryEnded->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->surgeryEnded->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_grid->surgeryEnded->ReadOnly && !$patient_ot_delivery_register_grid->surgeryEnded->Disabled && !isset($patient_ot_delivery_register_grid->surgeryEnded->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_grid->surgeryEnded->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryEnded", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_surgeryEnded" class="form-group patient_ot_delivery_register_surgeryEnded">
<span<?php echo $patient_ot_delivery_register_grid->surgeryEnded->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->surgeryEnded->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_surgeryEnded" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryEnded" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryEnded" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->surgeryEnded->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_surgeryEnded" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryEnded" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_surgeryEnded" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->surgeryEnded->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->RecoveryTime->Visible) { // RecoveryTime ?>
		<td data-name="RecoveryTime">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_RecoveryTime" class="form-group patient_ot_delivery_register_RecoveryTime">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_RecoveryTime" data-format="11" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecoveryTime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecoveryTime" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->RecoveryTime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->RecoveryTime->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->RecoveryTime->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_grid->RecoveryTime->ReadOnly && !$patient_ot_delivery_register_grid->RecoveryTime->Disabled && !isset($patient_ot_delivery_register_grid->RecoveryTime->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_grid->RecoveryTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecoveryTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_RecoveryTime" class="form-group patient_ot_delivery_register_RecoveryTime">
<span<?php echo $patient_ot_delivery_register_grid->RecoveryTime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->RecoveryTime->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_RecoveryTime" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecoveryTime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecoveryTime" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->RecoveryTime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_RecoveryTime" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecoveryTime" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_RecoveryTime" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->RecoveryTime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->ShiftedTime->Visible) { // ShiftedTime ?>
		<td data-name="ShiftedTime">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ShiftedTime" class="form-group patient_ot_delivery_register_ShiftedTime">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ShiftedTime" data-format="11" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ShiftedTime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ShiftedTime" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ShiftedTime->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ShiftedTime->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ShiftedTime->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_grid->ShiftedTime->ReadOnly && !$patient_ot_delivery_register_grid->ShiftedTime->Disabled && !isset($patient_ot_delivery_register_grid->ShiftedTime->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_grid->ShiftedTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ShiftedTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ShiftedTime" class="form-group patient_ot_delivery_register_ShiftedTime">
<span<?php echo $patient_ot_delivery_register_grid->ShiftedTime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->ShiftedTime->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ShiftedTime" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ShiftedTime" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ShiftedTime" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ShiftedTime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ShiftedTime" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ShiftedTime" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ShiftedTime" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ShiftedTime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->Duration->Visible) { // Duration ?>
		<td data-name="Duration">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Duration" class="form-group patient_ot_delivery_register_Duration">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_Duration" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Duration" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Duration" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Duration->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->Duration->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->Duration->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Duration" class="form-group patient_ot_delivery_register_Duration">
<span<?php echo $patient_ot_delivery_register_grid->Duration->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->Duration->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Duration" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Duration" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Duration" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Duration->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Duration" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Duration" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Duration" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Duration->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->Surgeon->Visible) { // Surgeon ?>
		<td data-name="Surgeon">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Surgeon" class="form-group patient_ot_delivery_register_Surgeon">
<?php
$onchange = $patient_ot_delivery_register_grid->Surgeon->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_ot_delivery_register_grid->Surgeon->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon">
	<input type="text" class="form-control" name="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" id="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" value="<?php echo RemoveHtml($patient_ot_delivery_register_grid->Surgeon->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Surgeon->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Surgeon->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register_grid->Surgeon->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Surgeon" data-value-separator="<?php echo $patient_ot_delivery_register_grid->Surgeon->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Surgeon->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid"], function() {
	fpatient_ot_delivery_registergrid.createAutoSuggest({"id":"x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon","forceSelect":false});
});
</script>
<?php echo $patient_ot_delivery_register_grid->Surgeon->Lookup->getParamTag($patient_ot_delivery_register_grid, "p_x" . $patient_ot_delivery_register_grid->RowIndex . "_Surgeon") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Surgeon" class="form-group patient_ot_delivery_register_Surgeon">
<span<?php echo $patient_ot_delivery_register_grid->Surgeon->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->Surgeon->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Surgeon" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Surgeon->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Surgeon" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Surgeon" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Surgeon->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->Anaesthetist->Visible) { // Anaesthetist ?>
		<td data-name="Anaesthetist">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Anaesthetist" class="form-group patient_ot_delivery_register_Anaesthetist">
<?php
$onchange = $patient_ot_delivery_register_grid->Anaesthetist->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_ot_delivery_register_grid->Anaesthetist->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist">
	<input type="text" class="form-control" name="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" id="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" value="<?php echo RemoveHtml($patient_ot_delivery_register_grid->Anaesthetist->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Anaesthetist->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Anaesthetist->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register_grid->Anaesthetist->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Anaesthetist" data-value-separator="<?php echo $patient_ot_delivery_register_grid->Anaesthetist->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Anaesthetist->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid"], function() {
	fpatient_ot_delivery_registergrid.createAutoSuggest({"id":"x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist","forceSelect":false});
});
</script>
<?php echo $patient_ot_delivery_register_grid->Anaesthetist->Lookup->getParamTag($patient_ot_delivery_register_grid, "p_x" . $patient_ot_delivery_register_grid->RowIndex . "_Anaesthetist") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Anaesthetist" class="form-group patient_ot_delivery_register_Anaesthetist">
<span<?php echo $patient_ot_delivery_register_grid->Anaesthetist->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->Anaesthetist->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Anaesthetist" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Anaesthetist->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Anaesthetist" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Anaesthetist" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Anaesthetist->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->AsstSurgeon1->Visible) { // AsstSurgeon1 ?>
		<td data-name="AsstSurgeon1">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_AsstSurgeon1" class="form-group patient_ot_delivery_register_AsstSurgeon1">
<?php
$onchange = $patient_ot_delivery_register_grid->AsstSurgeon1->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_ot_delivery_register_grid->AsstSurgeon1->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1">
	<input type="text" class="form-control" name="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" id="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" value="<?php echo RemoveHtml($patient_ot_delivery_register_grid->AsstSurgeon1->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AsstSurgeon1->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AsstSurgeon1->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register_grid->AsstSurgeon1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon1" data-value-separator="<?php echo $patient_ot_delivery_register_grid->AsstSurgeon1->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AsstSurgeon1->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid"], function() {
	fpatient_ot_delivery_registergrid.createAutoSuggest({"id":"x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1","forceSelect":false});
});
</script>
<?php echo $patient_ot_delivery_register_grid->AsstSurgeon1->Lookup->getParamTag($patient_ot_delivery_register_grid, "p_x" . $patient_ot_delivery_register_grid->RowIndex . "_AsstSurgeon1") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_AsstSurgeon1" class="form-group patient_ot_delivery_register_AsstSurgeon1">
<span<?php echo $patient_ot_delivery_register_grid->AsstSurgeon1->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->AsstSurgeon1->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AsstSurgeon1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AsstSurgeon1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->AsstSurgeon2->Visible) { // AsstSurgeon2 ?>
		<td data-name="AsstSurgeon2">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_AsstSurgeon2" class="form-group patient_ot_delivery_register_AsstSurgeon2">
<?php
$onchange = $patient_ot_delivery_register_grid->AsstSurgeon2->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_ot_delivery_register_grid->AsstSurgeon2->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2">
	<input type="text" class="form-control" name="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" id="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" value="<?php echo RemoveHtml($patient_ot_delivery_register_grid->AsstSurgeon2->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AsstSurgeon2->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AsstSurgeon2->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register_grid->AsstSurgeon2->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon2" data-value-separator="<?php echo $patient_ot_delivery_register_grid->AsstSurgeon2->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AsstSurgeon2->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid"], function() {
	fpatient_ot_delivery_registergrid.createAutoSuggest({"id":"x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2","forceSelect":false});
});
</script>
<?php echo $patient_ot_delivery_register_grid->AsstSurgeon2->Lookup->getParamTag($patient_ot_delivery_register_grid, "p_x" . $patient_ot_delivery_register_grid->RowIndex . "_AsstSurgeon2") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_AsstSurgeon2" class="form-group patient_ot_delivery_register_AsstSurgeon2">
<span<?php echo $patient_ot_delivery_register_grid->AsstSurgeon2->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->AsstSurgeon2->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon2" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AsstSurgeon2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon2" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_AsstSurgeon2" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->AsstSurgeon2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->paediatric->Visible) { // paediatric ?>
		<td data-name="paediatric">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_paediatric" class="form-group patient_ot_delivery_register_paediatric">
<?php
$onchange = $patient_ot_delivery_register_grid->paediatric->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_ot_delivery_register_grid->paediatric->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric">
	<input type="text" class="form-control" name="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" id="sv_x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" value="<?php echo RemoveHtml($patient_ot_delivery_register_grid->paediatric->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->paediatric->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->paediatric->getPlaceHolder()) ?>"<?php echo $patient_ot_delivery_register_grid->paediatric->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_paediatric" data-value-separator="<?php echo $patient_ot_delivery_register_grid->paediatric->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->paediatric->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid"], function() {
	fpatient_ot_delivery_registergrid.createAutoSuggest({"id":"x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric","forceSelect":false});
});
</script>
<?php echo $patient_ot_delivery_register_grid->paediatric->Lookup->getParamTag($patient_ot_delivery_register_grid, "p_x" . $patient_ot_delivery_register_grid->RowIndex . "_paediatric") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_paediatric" class="form-group patient_ot_delivery_register_paediatric">
<span<?php echo $patient_ot_delivery_register_grid->paediatric->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->paediatric->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_paediatric" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->paediatric->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_paediatric" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_paediatric" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->paediatric->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->ScrubNurse1->Visible) { // ScrubNurse1 ?>
		<td data-name="ScrubNurse1">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ScrubNurse1" class="form-group patient_ot_delivery_register_ScrubNurse1">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ScrubNurse1->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ScrubNurse1->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ScrubNurse1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ScrubNurse1" class="form-group patient_ot_delivery_register_ScrubNurse1">
<span<?php echo $patient_ot_delivery_register_grid->ScrubNurse1->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->ScrubNurse1->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse1" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse1" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ScrubNurse1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse1" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse1" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse1" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ScrubNurse1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->ScrubNurse2->Visible) { // ScrubNurse2 ?>
		<td data-name="ScrubNurse2">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ScrubNurse2" class="form-group patient_ot_delivery_register_ScrubNurse2">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse2" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse2" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse2" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ScrubNurse2->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->ScrubNurse2->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->ScrubNurse2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ScrubNurse2" class="form-group patient_ot_delivery_register_ScrubNurse2">
<span<?php echo $patient_ot_delivery_register_grid->ScrubNurse2->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->ScrubNurse2->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse2" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse2" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse2" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ScrubNurse2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse2" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse2" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_ScrubNurse2" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->ScrubNurse2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->FloorNurse->Visible) { // FloorNurse ?>
		<td data-name="FloorNurse">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_FloorNurse" class="form-group patient_ot_delivery_register_FloorNurse">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_FloorNurse" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_FloorNurse" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_FloorNurse" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->FloorNurse->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->FloorNurse->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->FloorNurse->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_FloorNurse" class="form-group patient_ot_delivery_register_FloorNurse">
<span<?php echo $patient_ot_delivery_register_grid->FloorNurse->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->FloorNurse->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_FloorNurse" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_FloorNurse" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_FloorNurse" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->FloorNurse->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_FloorNurse" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_FloorNurse" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_FloorNurse" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->FloorNurse->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->Technician->Visible) { // Technician ?>
		<td data-name="Technician">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Technician" class="form-group patient_ot_delivery_register_Technician">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_Technician" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Technician" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Technician" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Technician->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->Technician->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->Technician->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Technician" class="form-group patient_ot_delivery_register_Technician">
<span<?php echo $patient_ot_delivery_register_grid->Technician->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->Technician->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Technician" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Technician" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Technician" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Technician->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Technician" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Technician" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Technician" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Technician->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->HouseKeeping->Visible) { // HouseKeeping ?>
		<td data-name="HouseKeeping">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_HouseKeeping" class="form-group patient_ot_delivery_register_HouseKeeping">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_HouseKeeping" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HouseKeeping" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HouseKeeping" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->HouseKeeping->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->HouseKeeping->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->HouseKeeping->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_HouseKeeping" class="form-group patient_ot_delivery_register_HouseKeeping">
<span<?php echo $patient_ot_delivery_register_grid->HouseKeeping->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->HouseKeeping->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_HouseKeeping" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HouseKeeping" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HouseKeeping" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->HouseKeeping->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_HouseKeeping" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HouseKeeping" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_HouseKeeping" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->HouseKeeping->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->countsCheckedMops->Visible) { // countsCheckedMops ?>
		<td data-name="countsCheckedMops">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_countsCheckedMops" class="form-group patient_ot_delivery_register_countsCheckedMops">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_countsCheckedMops" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_countsCheckedMops" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_countsCheckedMops" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->countsCheckedMops->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->countsCheckedMops->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->countsCheckedMops->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_countsCheckedMops" class="form-group patient_ot_delivery_register_countsCheckedMops">
<span<?php echo $patient_ot_delivery_register_grid->countsCheckedMops->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->countsCheckedMops->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_countsCheckedMops" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_countsCheckedMops" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_countsCheckedMops" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->countsCheckedMops->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_countsCheckedMops" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_countsCheckedMops" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_countsCheckedMops" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->countsCheckedMops->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->gauze->Visible) { // gauze ?>
		<td data-name="gauze">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_gauze" class="form-group patient_ot_delivery_register_gauze">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_gauze" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_gauze" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_gauze" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->gauze->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->gauze->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->gauze->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_gauze" class="form-group patient_ot_delivery_register_gauze">
<span<?php echo $patient_ot_delivery_register_grid->gauze->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->gauze->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_gauze" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_gauze" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_gauze" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->gauze->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_gauze" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_gauze" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_gauze" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->gauze->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->needles->Visible) { // needles ?>
		<td data-name="needles">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_needles" class="form-group patient_ot_delivery_register_needles">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_needles" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_needles" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_needles" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->needles->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->needles->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->needles->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_needles" class="form-group patient_ot_delivery_register_needles">
<span<?php echo $patient_ot_delivery_register_grid->needles->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->needles->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_needles" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_needles" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_needles" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->needles->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_needles" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_needles" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_needles" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->needles->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->bloodloss->Visible) { // bloodloss ?>
		<td data-name="bloodloss">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_bloodloss" class="form-group patient_ot_delivery_register_bloodloss">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_bloodloss" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodloss" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodloss" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->bloodloss->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->bloodloss->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->bloodloss->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_bloodloss" class="form-group patient_ot_delivery_register_bloodloss">
<span<?php echo $patient_ot_delivery_register_grid->bloodloss->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->bloodloss->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodloss" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodloss" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodloss" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->bloodloss->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodloss" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodloss" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodloss" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->bloodloss->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->bloodtransfusion->Visible) { // bloodtransfusion ?>
		<td data-name="bloodtransfusion">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_bloodtransfusion" class="form-group patient_ot_delivery_register_bloodtransfusion">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_bloodtransfusion" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodtransfusion" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodtransfusion" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->bloodtransfusion->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->bloodtransfusion->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->bloodtransfusion->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_bloodtransfusion" class="form-group patient_ot_delivery_register_bloodtransfusion">
<span<?php echo $patient_ot_delivery_register_grid->bloodtransfusion->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->bloodtransfusion->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodtransfusion" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodtransfusion" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodtransfusion" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->bloodtransfusion->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodtransfusion" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodtransfusion" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_bloodtransfusion" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->bloodtransfusion->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->Reception->Visible) { // Reception ?>
		<td data-name="Reception">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<?php if ($patient_ot_delivery_register_grid->Reception->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Reception" class="form-group patient_ot_delivery_register_Reception">
<span<?php echo $patient_ot_delivery_register_grid->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->Reception->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Reception->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Reception" class="form-group patient_ot_delivery_register_Reception">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_Reception" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" size="30" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->Reception->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->Reception->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Reception" class="form-group patient_ot_delivery_register_Reception">
<span<?php echo $patient_ot_delivery_register_grid->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->Reception->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Reception" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Reception->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Reception" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->Reception->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_grid->PId->Visible) { // PId ?>
		<td data-name="PId">
<?php if (!$patient_ot_delivery_register->isConfirm()) { ?>
<?php if ($patient_ot_delivery_register_grid->PId->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_ot_delivery_register_PId" class="form-group patient_ot_delivery_register_PId">
<span<?php echo $patient_ot_delivery_register_grid->PId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->PId->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->PId->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_PId" class="form-group patient_ot_delivery_register_PId">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_PId" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" size="30" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_grid->PId->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_grid->PId->EditValue ?>"<?php echo $patient_ot_delivery_register_grid->PId->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_PId" class="form-group patient_ot_delivery_register_PId">
<span<?php echo $patient_ot_delivery_register_grid->PId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_ot_delivery_register_grid->PId->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PId" name="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" id="x<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->PId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PId" name="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" id="o<?php echo $patient_ot_delivery_register_grid->RowIndex ?>_PId" value="<?php echo HtmlEncode($patient_ot_delivery_register_grid->PId->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_ot_delivery_register_grid->ListOptions->render("body", "right", $patient_ot_delivery_register_grid->RowIndex);
?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "load"], function() {
	fpatient_ot_delivery_registergrid.updateLists(<?php echo $patient_ot_delivery_register_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
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
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($patient_ot_delivery_register_grid->Recordset)
	$patient_ot_delivery_register_grid->Recordset->Close();
?>
<?php if ($patient_ot_delivery_register_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $patient_ot_delivery_register_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_ot_delivery_register_grid->TotalRecords == 0 && !$patient_ot_delivery_register->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_ot_delivery_register_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$patient_ot_delivery_register_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$patient_ot_delivery_register->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_patient_ot_delivery_register",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php
$patient_ot_delivery_register_grid->terminate();
?>