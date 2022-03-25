<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($ivf_semenanalysisreport_grid))
	$ivf_semenanalysisreport_grid = new ivf_semenanalysisreport_grid();

// Run the page
$ivf_semenanalysisreport_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_semenanalysisreport_grid->Page_Render();
?>
<?php if (!$ivf_semenanalysisreport->isExport()) { ?>
<script>

// Form object
var fivf_semenanalysisreportgrid = new ew.Form("fivf_semenanalysisreportgrid", "grid");
fivf_semenanalysisreportgrid.formKeyCountName = '<?php echo $ivf_semenanalysisreport_grid->FormKeyCountName ?>';

// Validate form
fivf_semenanalysisreportgrid.validate = function() {
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
		<?php if ($ivf_semenanalysisreport_grid->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->id->caption(), $ivf_semenanalysisreport->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->RIDNo->Required) { ?>
			elm = this.getElements("x" + infix + "_RIDNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->RIDNo->caption(), $ivf_semenanalysisreport->RIDNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RIDNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_semenanalysisreport->RIDNo->errorMessage()) ?>");
		<?php if ($ivf_semenanalysisreport_grid->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->PatientName->caption(), $ivf_semenanalysisreport->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->HusbandName->Required) { ?>
			elm = this.getElements("x" + infix + "_HusbandName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->HusbandName->caption(), $ivf_semenanalysisreport->HusbandName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->RequestDr->Required) { ?>
			elm = this.getElements("x" + infix + "_RequestDr");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->RequestDr->caption(), $ivf_semenanalysisreport->RequestDr->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->CollectionDate->Required) { ?>
			elm = this.getElements("x" + infix + "_CollectionDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->CollectionDate->caption(), $ivf_semenanalysisreport->CollectionDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CollectionDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_semenanalysisreport->CollectionDate->errorMessage()) ?>");
		<?php if ($ivf_semenanalysisreport_grid->ResultDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ResultDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->ResultDate->caption(), $ivf_semenanalysisreport->ResultDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ResultDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_semenanalysisreport->ResultDate->errorMessage()) ?>");
		<?php if ($ivf_semenanalysisreport_grid->RequestSample->Required) { ?>
			elm = this.getElements("x" + infix + "_RequestSample");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->RequestSample->caption(), $ivf_semenanalysisreport->RequestSample->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->CollectionType->Required) { ?>
			elm = this.getElements("x" + infix + "_CollectionType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->CollectionType->caption(), $ivf_semenanalysisreport->CollectionType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->CollectionMethod->Required) { ?>
			elm = this.getElements("x" + infix + "_CollectionMethod");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->CollectionMethod->caption(), $ivf_semenanalysisreport->CollectionMethod->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->Medicationused->Required) { ?>
			elm = this.getElements("x" + infix + "_Medicationused");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->Medicationused->caption(), $ivf_semenanalysisreport->Medicationused->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->DifficultiesinCollection->Required) { ?>
			elm = this.getElements("x" + infix + "_DifficultiesinCollection");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->DifficultiesinCollection->caption(), $ivf_semenanalysisreport->DifficultiesinCollection->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->pH->Required) { ?>
			elm = this.getElements("x" + infix + "_pH");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->pH->caption(), $ivf_semenanalysisreport->pH->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->Timeofcollection->Required) { ?>
			elm = this.getElements("x" + infix + "_Timeofcollection");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->Timeofcollection->caption(), $ivf_semenanalysisreport->Timeofcollection->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->Timeofexamination->Required) { ?>
			elm = this.getElements("x" + infix + "_Timeofexamination");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->Timeofexamination->caption(), $ivf_semenanalysisreport->Timeofexamination->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->Volume->Required) { ?>
			elm = this.getElements("x" + infix + "_Volume");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->Volume->caption(), $ivf_semenanalysisreport->Volume->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->Concentration->Required) { ?>
			elm = this.getElements("x" + infix + "_Concentration");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->Concentration->caption(), $ivf_semenanalysisreport->Concentration->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->Total->Required) { ?>
			elm = this.getElements("x" + infix + "_Total");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->Total->caption(), $ivf_semenanalysisreport->Total->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->ProgressiveMotility->Required) { ?>
			elm = this.getElements("x" + infix + "_ProgressiveMotility");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->ProgressiveMotility->caption(), $ivf_semenanalysisreport->ProgressiveMotility->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->NonProgrssiveMotile->Required) { ?>
			elm = this.getElements("x" + infix + "_NonProgrssiveMotile");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->NonProgrssiveMotile->caption(), $ivf_semenanalysisreport->NonProgrssiveMotile->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->Immotile->Required) { ?>
			elm = this.getElements("x" + infix + "_Immotile");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->Immotile->caption(), $ivf_semenanalysisreport->Immotile->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->TotalProgrssiveMotile->Required) { ?>
			elm = this.getElements("x" + infix + "_TotalProgrssiveMotile");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->TotalProgrssiveMotile->caption(), $ivf_semenanalysisreport->TotalProgrssiveMotile->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->Appearance->Required) { ?>
			elm = this.getElements("x" + infix + "_Appearance");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->Appearance->caption(), $ivf_semenanalysisreport->Appearance->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->Homogenosity->Required) { ?>
			elm = this.getElements("x" + infix + "_Homogenosity");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->Homogenosity->caption(), $ivf_semenanalysisreport->Homogenosity->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->CompleteSample->Required) { ?>
			elm = this.getElements("x" + infix + "_CompleteSample");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->CompleteSample->caption(), $ivf_semenanalysisreport->CompleteSample->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->Liquefactiontime->Required) { ?>
			elm = this.getElements("x" + infix + "_Liquefactiontime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->Liquefactiontime->caption(), $ivf_semenanalysisreport->Liquefactiontime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->Normal->Required) { ?>
			elm = this.getElements("x" + infix + "_Normal");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->Normal->caption(), $ivf_semenanalysisreport->Normal->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->Abnormal->Required) { ?>
			elm = this.getElements("x" + infix + "_Abnormal");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->Abnormal->caption(), $ivf_semenanalysisreport->Abnormal->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->Headdefects->Required) { ?>
			elm = this.getElements("x" + infix + "_Headdefects");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->Headdefects->caption(), $ivf_semenanalysisreport->Headdefects->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->MidpieceDefects->Required) { ?>
			elm = this.getElements("x" + infix + "_MidpieceDefects");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->MidpieceDefects->caption(), $ivf_semenanalysisreport->MidpieceDefects->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->TailDefects->Required) { ?>
			elm = this.getElements("x" + infix + "_TailDefects");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->TailDefects->caption(), $ivf_semenanalysisreport->TailDefects->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->NormalProgMotile->Required) { ?>
			elm = this.getElements("x" + infix + "_NormalProgMotile");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->NormalProgMotile->caption(), $ivf_semenanalysisreport->NormalProgMotile->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->ImmatureForms->Required) { ?>
			elm = this.getElements("x" + infix + "_ImmatureForms");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->ImmatureForms->caption(), $ivf_semenanalysisreport->ImmatureForms->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->Leucocytes->Required) { ?>
			elm = this.getElements("x" + infix + "_Leucocytes");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->Leucocytes->caption(), $ivf_semenanalysisreport->Leucocytes->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->Agglutination->Required) { ?>
			elm = this.getElements("x" + infix + "_Agglutination");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->Agglutination->caption(), $ivf_semenanalysisreport->Agglutination->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->Debris->Required) { ?>
			elm = this.getElements("x" + infix + "_Debris");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->Debris->caption(), $ivf_semenanalysisreport->Debris->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->Diagnosis->Required) { ?>
			elm = this.getElements("x" + infix + "_Diagnosis");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->Diagnosis->caption(), $ivf_semenanalysisreport->Diagnosis->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->Observations->Required) { ?>
			elm = this.getElements("x" + infix + "_Observations");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->Observations->caption(), $ivf_semenanalysisreport->Observations->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->Signature->Required) { ?>
			elm = this.getElements("x" + infix + "_Signature");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->Signature->caption(), $ivf_semenanalysisreport->Signature->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->SemenOrgin->Required) { ?>
			elm = this.getElements("x" + infix + "_SemenOrgin");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->SemenOrgin->caption(), $ivf_semenanalysisreport->SemenOrgin->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->Donor->Required) { ?>
			elm = this.getElements("x" + infix + "_Donor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->Donor->caption(), $ivf_semenanalysisreport->Donor->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->DonorBloodgroup->Required) { ?>
			elm = this.getElements("x" + infix + "_DonorBloodgroup");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->DonorBloodgroup->caption(), $ivf_semenanalysisreport->DonorBloodgroup->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->Tank->Required) { ?>
			elm = this.getElements("x" + infix + "_Tank");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->Tank->caption(), $ivf_semenanalysisreport->Tank->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->Location->Required) { ?>
			elm = this.getElements("x" + infix + "_Location");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->Location->caption(), $ivf_semenanalysisreport->Location->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->Volume1->Required) { ?>
			elm = this.getElements("x" + infix + "_Volume1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->Volume1->caption(), $ivf_semenanalysisreport->Volume1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->Concentration1->Required) { ?>
			elm = this.getElements("x" + infix + "_Concentration1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->Concentration1->caption(), $ivf_semenanalysisreport->Concentration1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->Total1->Required) { ?>
			elm = this.getElements("x" + infix + "_Total1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->Total1->caption(), $ivf_semenanalysisreport->Total1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->ProgressiveMotility1->Required) { ?>
			elm = this.getElements("x" + infix + "_ProgressiveMotility1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->ProgressiveMotility1->caption(), $ivf_semenanalysisreport->ProgressiveMotility1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->NonProgrssiveMotile1->Required) { ?>
			elm = this.getElements("x" + infix + "_NonProgrssiveMotile1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->NonProgrssiveMotile1->caption(), $ivf_semenanalysisreport->NonProgrssiveMotile1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->Immotile1->Required) { ?>
			elm = this.getElements("x" + infix + "_Immotile1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->Immotile1->caption(), $ivf_semenanalysisreport->Immotile1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->TotalProgrssiveMotile1->Required) { ?>
			elm = this.getElements("x" + infix + "_TotalProgrssiveMotile1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->TotalProgrssiveMotile1->caption(), $ivf_semenanalysisreport->TotalProgrssiveMotile1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->TidNo->Required) { ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->TidNo->caption(), $ivf_semenanalysisreport->TidNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_semenanalysisreport->TidNo->errorMessage()) ?>");
		<?php if ($ivf_semenanalysisreport_grid->Color->Required) { ?>
			elm = this.getElements("x" + infix + "_Color");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->Color->caption(), $ivf_semenanalysisreport->Color->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->DoneBy->Required) { ?>
			elm = this.getElements("x" + infix + "_DoneBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->DoneBy->caption(), $ivf_semenanalysisreport->DoneBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->Method->Required) { ?>
			elm = this.getElements("x" + infix + "_Method");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->Method->caption(), $ivf_semenanalysisreport->Method->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->Abstinence->Required) { ?>
			elm = this.getElements("x" + infix + "_Abstinence");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->Abstinence->caption(), $ivf_semenanalysisreport->Abstinence->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->ProcessedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_ProcessedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->ProcessedBy->caption(), $ivf_semenanalysisreport->ProcessedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->InseminationTime->Required) { ?>
			elm = this.getElements("x" + infix + "_InseminationTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->InseminationTime->caption(), $ivf_semenanalysisreport->InseminationTime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->InseminationBy->Required) { ?>
			elm = this.getElements("x" + infix + "_InseminationBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->InseminationBy->caption(), $ivf_semenanalysisreport->InseminationBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->Big->Required) { ?>
			elm = this.getElements("x" + infix + "_Big");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->Big->caption(), $ivf_semenanalysisreport->Big->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->Medium->Required) { ?>
			elm = this.getElements("x" + infix + "_Medium");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->Medium->caption(), $ivf_semenanalysisreport->Medium->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->Small->Required) { ?>
			elm = this.getElements("x" + infix + "_Small");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->Small->caption(), $ivf_semenanalysisreport->Small->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->NoHalo->Required) { ?>
			elm = this.getElements("x" + infix + "_NoHalo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->NoHalo->caption(), $ivf_semenanalysisreport->NoHalo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->Fragmented->Required) { ?>
			elm = this.getElements("x" + infix + "_Fragmented");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->Fragmented->caption(), $ivf_semenanalysisreport->Fragmented->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->NonFragmented->Required) { ?>
			elm = this.getElements("x" + infix + "_NonFragmented");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->NonFragmented->caption(), $ivf_semenanalysisreport->NonFragmented->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->DFI->Required) { ?>
			elm = this.getElements("x" + infix + "_DFI");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->DFI->caption(), $ivf_semenanalysisreport->DFI->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->IsueBy->Required) { ?>
			elm = this.getElements("x" + infix + "_IsueBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->IsueBy->caption(), $ivf_semenanalysisreport->IsueBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->Volume2->Required) { ?>
			elm = this.getElements("x" + infix + "_Volume2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->Volume2->caption(), $ivf_semenanalysisreport->Volume2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->Concentration2->Required) { ?>
			elm = this.getElements("x" + infix + "_Concentration2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->Concentration2->caption(), $ivf_semenanalysisreport->Concentration2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->Total2->Required) { ?>
			elm = this.getElements("x" + infix + "_Total2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->Total2->caption(), $ivf_semenanalysisreport->Total2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->ProgressiveMotility2->Required) { ?>
			elm = this.getElements("x" + infix + "_ProgressiveMotility2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->ProgressiveMotility2->caption(), $ivf_semenanalysisreport->ProgressiveMotility2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->NonProgrssiveMotile2->Required) { ?>
			elm = this.getElements("x" + infix + "_NonProgrssiveMotile2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->NonProgrssiveMotile2->caption(), $ivf_semenanalysisreport->NonProgrssiveMotile2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->Immotile2->Required) { ?>
			elm = this.getElements("x" + infix + "_Immotile2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->Immotile2->caption(), $ivf_semenanalysisreport->Immotile2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->TotalProgrssiveMotile2->Required) { ?>
			elm = this.getElements("x" + infix + "_TotalProgrssiveMotile2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->TotalProgrssiveMotile2->caption(), $ivf_semenanalysisreport->TotalProgrssiveMotile2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->IssuedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_IssuedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->IssuedBy->caption(), $ivf_semenanalysisreport->IssuedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->IssuedTo->Required) { ?>
			elm = this.getElements("x" + infix + "_IssuedTo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->IssuedTo->caption(), $ivf_semenanalysisreport->IssuedTo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->PaID->Required) { ?>
			elm = this.getElements("x" + infix + "_PaID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->PaID->caption(), $ivf_semenanalysisreport->PaID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->PaName->Required) { ?>
			elm = this.getElements("x" + infix + "_PaName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->PaName->caption(), $ivf_semenanalysisreport->PaName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->PaMobile->Required) { ?>
			elm = this.getElements("x" + infix + "_PaMobile");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->PaMobile->caption(), $ivf_semenanalysisreport->PaMobile->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->PartnerID->Required) { ?>
			elm = this.getElements("x" + infix + "_PartnerID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->PartnerID->caption(), $ivf_semenanalysisreport->PartnerID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->PartnerName->Required) { ?>
			elm = this.getElements("x" + infix + "_PartnerName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->PartnerName->caption(), $ivf_semenanalysisreport->PartnerName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->PartnerMobile->Required) { ?>
			elm = this.getElements("x" + infix + "_PartnerMobile");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->PartnerMobile->caption(), $ivf_semenanalysisreport->PartnerMobile->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->PREG_TEST_DATE->Required) { ?>
			elm = this.getElements("x" + infix + "_PREG_TEST_DATE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->PREG_TEST_DATE->caption(), $ivf_semenanalysisreport->PREG_TEST_DATE->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PREG_TEST_DATE");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_semenanalysisreport->PREG_TEST_DATE->errorMessage()) ?>");
		<?php if ($ivf_semenanalysisreport_grid->SPECIFIC_PROBLEMS->Required) { ?>
			elm = this.getElements("x" + infix + "_SPECIFIC_PROBLEMS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->SPECIFIC_PROBLEMS->caption(), $ivf_semenanalysisreport->SPECIFIC_PROBLEMS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->IMSC_1->Required) { ?>
			elm = this.getElements("x" + infix + "_IMSC_1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->IMSC_1->caption(), $ivf_semenanalysisreport->IMSC_1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->IMSC_2->Required) { ?>
			elm = this.getElements("x" + infix + "_IMSC_2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->IMSC_2->caption(), $ivf_semenanalysisreport->IMSC_2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->LIQUIFACTION_STORAGE->Required) { ?>
			elm = this.getElements("x" + infix + "_LIQUIFACTION_STORAGE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->LIQUIFACTION_STORAGE->caption(), $ivf_semenanalysisreport->LIQUIFACTION_STORAGE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->IUI_PREP_METHOD->Required) { ?>
			elm = this.getElements("x" + infix + "_IUI_PREP_METHOD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->IUI_PREP_METHOD->caption(), $ivf_semenanalysisreport->IUI_PREP_METHOD->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->TIME_FROM_TRIGGER->Required) { ?>
			elm = this.getElements("x" + infix + "_TIME_FROM_TRIGGER");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->TIME_FROM_TRIGGER->caption(), $ivf_semenanalysisreport->TIME_FROM_TRIGGER->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->COLLECTION_TO_PREPARATION->Required) { ?>
			elm = this.getElements("x" + infix + "_COLLECTION_TO_PREPARATION");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->caption(), $ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenanalysisreport_grid->TIME_FROM_PREP_TO_INSEM->Required) { ?>
			elm = this.getElements("x" + infix + "_TIME_FROM_PREP_TO_INSEM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->caption(), $ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
fivf_semenanalysisreportgrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "RIDNo", false)) return false;
	if (ew.valueChanged(fobj, infix, "PatientName", false)) return false;
	if (ew.valueChanged(fobj, infix, "HusbandName", false)) return false;
	if (ew.valueChanged(fobj, infix, "RequestDr", false)) return false;
	if (ew.valueChanged(fobj, infix, "CollectionDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "ResultDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "RequestSample", false)) return false;
	if (ew.valueChanged(fobj, infix, "CollectionType", false)) return false;
	if (ew.valueChanged(fobj, infix, "CollectionMethod", false)) return false;
	if (ew.valueChanged(fobj, infix, "Medicationused", false)) return false;
	if (ew.valueChanged(fobj, infix, "DifficultiesinCollection", false)) return false;
	if (ew.valueChanged(fobj, infix, "pH", false)) return false;
	if (ew.valueChanged(fobj, infix, "Timeofcollection", false)) return false;
	if (ew.valueChanged(fobj, infix, "Timeofexamination", false)) return false;
	if (ew.valueChanged(fobj, infix, "Volume", false)) return false;
	if (ew.valueChanged(fobj, infix, "Concentration", false)) return false;
	if (ew.valueChanged(fobj, infix, "Total", false)) return false;
	if (ew.valueChanged(fobj, infix, "ProgressiveMotility", false)) return false;
	if (ew.valueChanged(fobj, infix, "NonProgrssiveMotile", false)) return false;
	if (ew.valueChanged(fobj, infix, "Immotile", false)) return false;
	if (ew.valueChanged(fobj, infix, "TotalProgrssiveMotile", false)) return false;
	if (ew.valueChanged(fobj, infix, "Appearance", false)) return false;
	if (ew.valueChanged(fobj, infix, "Homogenosity", false)) return false;
	if (ew.valueChanged(fobj, infix, "CompleteSample", false)) return false;
	if (ew.valueChanged(fobj, infix, "Liquefactiontime", false)) return false;
	if (ew.valueChanged(fobj, infix, "Normal", false)) return false;
	if (ew.valueChanged(fobj, infix, "Abnormal", false)) return false;
	if (ew.valueChanged(fobj, infix, "Headdefects", false)) return false;
	if (ew.valueChanged(fobj, infix, "MidpieceDefects", false)) return false;
	if (ew.valueChanged(fobj, infix, "TailDefects", false)) return false;
	if (ew.valueChanged(fobj, infix, "NormalProgMotile", false)) return false;
	if (ew.valueChanged(fobj, infix, "ImmatureForms", false)) return false;
	if (ew.valueChanged(fobj, infix, "Leucocytes", false)) return false;
	if (ew.valueChanged(fobj, infix, "Agglutination", false)) return false;
	if (ew.valueChanged(fobj, infix, "Debris", false)) return false;
	if (ew.valueChanged(fobj, infix, "Diagnosis", false)) return false;
	if (ew.valueChanged(fobj, infix, "Observations", false)) return false;
	if (ew.valueChanged(fobj, infix, "Signature", false)) return false;
	if (ew.valueChanged(fobj, infix, "SemenOrgin", false)) return false;
	if (ew.valueChanged(fobj, infix, "Donor", false)) return false;
	if (ew.valueChanged(fobj, infix, "DonorBloodgroup", false)) return false;
	if (ew.valueChanged(fobj, infix, "Tank", false)) return false;
	if (ew.valueChanged(fobj, infix, "Location", false)) return false;
	if (ew.valueChanged(fobj, infix, "Volume1", false)) return false;
	if (ew.valueChanged(fobj, infix, "Concentration1", false)) return false;
	if (ew.valueChanged(fobj, infix, "Total1", false)) return false;
	if (ew.valueChanged(fobj, infix, "ProgressiveMotility1", false)) return false;
	if (ew.valueChanged(fobj, infix, "NonProgrssiveMotile1", false)) return false;
	if (ew.valueChanged(fobj, infix, "Immotile1", false)) return false;
	if (ew.valueChanged(fobj, infix, "TotalProgrssiveMotile1", false)) return false;
	if (ew.valueChanged(fobj, infix, "TidNo", false)) return false;
	if (ew.valueChanged(fobj, infix, "Color", false)) return false;
	if (ew.valueChanged(fobj, infix, "DoneBy", false)) return false;
	if (ew.valueChanged(fobj, infix, "Method", false)) return false;
	if (ew.valueChanged(fobj, infix, "Abstinence", false)) return false;
	if (ew.valueChanged(fobj, infix, "ProcessedBy", false)) return false;
	if (ew.valueChanged(fobj, infix, "InseminationTime", false)) return false;
	if (ew.valueChanged(fobj, infix, "InseminationBy", false)) return false;
	if (ew.valueChanged(fobj, infix, "Big", false)) return false;
	if (ew.valueChanged(fobj, infix, "Medium", false)) return false;
	if (ew.valueChanged(fobj, infix, "Small", false)) return false;
	if (ew.valueChanged(fobj, infix, "NoHalo", false)) return false;
	if (ew.valueChanged(fobj, infix, "Fragmented", false)) return false;
	if (ew.valueChanged(fobj, infix, "NonFragmented", false)) return false;
	if (ew.valueChanged(fobj, infix, "DFI", false)) return false;
	if (ew.valueChanged(fobj, infix, "IsueBy", false)) return false;
	if (ew.valueChanged(fobj, infix, "Volume2", false)) return false;
	if (ew.valueChanged(fobj, infix, "Concentration2", false)) return false;
	if (ew.valueChanged(fobj, infix, "Total2", false)) return false;
	if (ew.valueChanged(fobj, infix, "ProgressiveMotility2", false)) return false;
	if (ew.valueChanged(fobj, infix, "NonProgrssiveMotile2", false)) return false;
	if (ew.valueChanged(fobj, infix, "Immotile2", false)) return false;
	if (ew.valueChanged(fobj, infix, "TotalProgrssiveMotile2", false)) return false;
	if (ew.valueChanged(fobj, infix, "IssuedBy", false)) return false;
	if (ew.valueChanged(fobj, infix, "IssuedTo", false)) return false;
	if (ew.valueChanged(fobj, infix, "PaID", false)) return false;
	if (ew.valueChanged(fobj, infix, "PaName", false)) return false;
	if (ew.valueChanged(fobj, infix, "PaMobile", false)) return false;
	if (ew.valueChanged(fobj, infix, "PartnerID", false)) return false;
	if (ew.valueChanged(fobj, infix, "PartnerName", false)) return false;
	if (ew.valueChanged(fobj, infix, "PartnerMobile", false)) return false;
	if (ew.valueChanged(fobj, infix, "PREG_TEST_DATE", false)) return false;
	if (ew.valueChanged(fobj, infix, "SPECIFIC_PROBLEMS", false)) return false;
	if (ew.valueChanged(fobj, infix, "IMSC_1", false)) return false;
	if (ew.valueChanged(fobj, infix, "IMSC_2", false)) return false;
	if (ew.valueChanged(fobj, infix, "LIQUIFACTION_STORAGE", false)) return false;
	if (ew.valueChanged(fobj, infix, "IUI_PREP_METHOD", false)) return false;
	if (ew.valueChanged(fobj, infix, "TIME_FROM_TRIGGER", false)) return false;
	if (ew.valueChanged(fobj, infix, "COLLECTION_TO_PREPARATION", false)) return false;
	if (ew.valueChanged(fobj, infix, "TIME_FROM_PREP_TO_INSEM", false)) return false;
	return true;
}

// Form_CustomValidate event
fivf_semenanalysisreportgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_semenanalysisreportgrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_semenanalysisreportgrid.lists["x_RequestSample"] = <?php echo $ivf_semenanalysisreport_grid->RequestSample->Lookup->toClientList() ?>;
fivf_semenanalysisreportgrid.lists["x_RequestSample"].options = <?php echo JsonEncode($ivf_semenanalysisreport_grid->RequestSample->options(FALSE, TRUE)) ?>;
fivf_semenanalysisreportgrid.lists["x_CollectionType"] = <?php echo $ivf_semenanalysisreport_grid->CollectionType->Lookup->toClientList() ?>;
fivf_semenanalysisreportgrid.lists["x_CollectionType"].options = <?php echo JsonEncode($ivf_semenanalysisreport_grid->CollectionType->options(FALSE, TRUE)) ?>;
fivf_semenanalysisreportgrid.lists["x_CollectionMethod"] = <?php echo $ivf_semenanalysisreport_grid->CollectionMethod->Lookup->toClientList() ?>;
fivf_semenanalysisreportgrid.lists["x_CollectionMethod"].options = <?php echo JsonEncode($ivf_semenanalysisreport_grid->CollectionMethod->options(FALSE, TRUE)) ?>;
fivf_semenanalysisreportgrid.lists["x_Medicationused"] = <?php echo $ivf_semenanalysisreport_grid->Medicationused->Lookup->toClientList() ?>;
fivf_semenanalysisreportgrid.lists["x_Medicationused"].options = <?php echo JsonEncode($ivf_semenanalysisreport_grid->Medicationused->options(FALSE, TRUE)) ?>;
fivf_semenanalysisreportgrid.lists["x_DifficultiesinCollection"] = <?php echo $ivf_semenanalysisreport_grid->DifficultiesinCollection->Lookup->toClientList() ?>;
fivf_semenanalysisreportgrid.lists["x_DifficultiesinCollection"].options = <?php echo JsonEncode($ivf_semenanalysisreport_grid->DifficultiesinCollection->options(FALSE, TRUE)) ?>;
fivf_semenanalysisreportgrid.lists["x_Homogenosity"] = <?php echo $ivf_semenanalysisreport_grid->Homogenosity->Lookup->toClientList() ?>;
fivf_semenanalysisreportgrid.lists["x_Homogenosity"].options = <?php echo JsonEncode($ivf_semenanalysisreport_grid->Homogenosity->options(FALSE, TRUE)) ?>;
fivf_semenanalysisreportgrid.lists["x_CompleteSample"] = <?php echo $ivf_semenanalysisreport_grid->CompleteSample->Lookup->toClientList() ?>;
fivf_semenanalysisreportgrid.lists["x_CompleteSample"].options = <?php echo JsonEncode($ivf_semenanalysisreport_grid->CompleteSample->options(FALSE, TRUE)) ?>;
fivf_semenanalysisreportgrid.lists["x_SemenOrgin"] = <?php echo $ivf_semenanalysisreport_grid->SemenOrgin->Lookup->toClientList() ?>;
fivf_semenanalysisreportgrid.lists["x_SemenOrgin"].options = <?php echo JsonEncode($ivf_semenanalysisreport_grid->SemenOrgin->options(FALSE, TRUE)) ?>;
fivf_semenanalysisreportgrid.lists["x_Donor"] = <?php echo $ivf_semenanalysisreport_grid->Donor->Lookup->toClientList() ?>;
fivf_semenanalysisreportgrid.lists["x_Donor"].options = <?php echo JsonEncode($ivf_semenanalysisreport_grid->Donor->lookupOptions()) ?>;
fivf_semenanalysisreportgrid.lists["x_SPECIFIC_PROBLEMS"] = <?php echo $ivf_semenanalysisreport_grid->SPECIFIC_PROBLEMS->Lookup->toClientList() ?>;
fivf_semenanalysisreportgrid.lists["x_SPECIFIC_PROBLEMS"].options = <?php echo JsonEncode($ivf_semenanalysisreport_grid->SPECIFIC_PROBLEMS->options(FALSE, TRUE)) ?>;
fivf_semenanalysisreportgrid.lists["x_LIQUIFACTION_STORAGE"] = <?php echo $ivf_semenanalysisreport_grid->LIQUIFACTION_STORAGE->Lookup->toClientList() ?>;
fivf_semenanalysisreportgrid.lists["x_LIQUIFACTION_STORAGE"].options = <?php echo JsonEncode($ivf_semenanalysisreport_grid->LIQUIFACTION_STORAGE->options(FALSE, TRUE)) ?>;
fivf_semenanalysisreportgrid.lists["x_IUI_PREP_METHOD"] = <?php echo $ivf_semenanalysisreport_grid->IUI_PREP_METHOD->Lookup->toClientList() ?>;
fivf_semenanalysisreportgrid.lists["x_IUI_PREP_METHOD"].options = <?php echo JsonEncode($ivf_semenanalysisreport_grid->IUI_PREP_METHOD->options(FALSE, TRUE)) ?>;
fivf_semenanalysisreportgrid.lists["x_TIME_FROM_TRIGGER"] = <?php echo $ivf_semenanalysisreport_grid->TIME_FROM_TRIGGER->Lookup->toClientList() ?>;
fivf_semenanalysisreportgrid.lists["x_TIME_FROM_TRIGGER"].options = <?php echo JsonEncode($ivf_semenanalysisreport_grid->TIME_FROM_TRIGGER->options(FALSE, TRUE)) ?>;
fivf_semenanalysisreportgrid.lists["x_COLLECTION_TO_PREPARATION"] = <?php echo $ivf_semenanalysisreport_grid->COLLECTION_TO_PREPARATION->Lookup->toClientList() ?>;
fivf_semenanalysisreportgrid.lists["x_COLLECTION_TO_PREPARATION"].options = <?php echo JsonEncode($ivf_semenanalysisreport_grid->COLLECTION_TO_PREPARATION->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$ivf_semenanalysisreport_grid->renderOtherOptions();
?>
<?php $ivf_semenanalysisreport_grid->showPageHeader(); ?>
<?php
$ivf_semenanalysisreport_grid->showMessage();
?>
<?php if ($ivf_semenanalysisreport_grid->TotalRecs > 0 || $ivf_semenanalysisreport->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_semenanalysisreport_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_semenanalysisreport">
<?php if ($ivf_semenanalysisreport_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $ivf_semenanalysisreport_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fivf_semenanalysisreportgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_ivf_semenanalysisreport" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_ivf_semenanalysisreportgrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_semenanalysisreport_grid->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_semenanalysisreport_grid->renderListOptions();

// Render list options (header, left)
$ivf_semenanalysisreport_grid->ListOptions->render("header", "left");
?>
<?php if ($ivf_semenanalysisreport->id->Visible) { // id ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->id) == "") { ?>
		<th data-name="id" class="<?php echo $ivf_semenanalysisreport->id->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_id" class="ivf_semenanalysisreport_id"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $ivf_semenanalysisreport->id->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_id" class="ivf_semenanalysisreport_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RIDNo->Visible) { // RIDNo ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->RIDNo) == "") { ?>
		<th data-name="RIDNo" class="<?php echo $ivf_semenanalysisreport->RIDNo->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_RIDNo" class="ivf_semenanalysisreport_RIDNo"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->RIDNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNo" class="<?php echo $ivf_semenanalysisreport->RIDNo->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_RIDNo" class="ivf_semenanalysisreport_RIDNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->RIDNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->RIDNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->RIDNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->PatientName->Visible) { // PatientName ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $ivf_semenanalysisreport->PatientName->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_PatientName" class="ivf_semenanalysisreport_PatientName"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $ivf_semenanalysisreport->PatientName->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_PatientName" class="ivf_semenanalysisreport_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->HusbandName->Visible) { // HusbandName ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->HusbandName) == "") { ?>
		<th data-name="HusbandName" class="<?php echo $ivf_semenanalysisreport->HusbandName->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_HusbandName" class="ivf_semenanalysisreport_HusbandName"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->HusbandName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HusbandName" class="<?php echo $ivf_semenanalysisreport->HusbandName->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_HusbandName" class="ivf_semenanalysisreport_HusbandName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->HusbandName->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->HusbandName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->HusbandName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RequestDr->Visible) { // RequestDr ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->RequestDr) == "") { ?>
		<th data-name="RequestDr" class="<?php echo $ivf_semenanalysisreport->RequestDr->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_RequestDr" class="ivf_semenanalysisreport_RequestDr"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->RequestDr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RequestDr" class="<?php echo $ivf_semenanalysisreport->RequestDr->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_RequestDr" class="ivf_semenanalysisreport_RequestDr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->RequestDr->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->RequestDr->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->RequestDr->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->CollectionDate->Visible) { // CollectionDate ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->CollectionDate) == "") { ?>
		<th data-name="CollectionDate" class="<?php echo $ivf_semenanalysisreport->CollectionDate->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_CollectionDate" class="ivf_semenanalysisreport_CollectionDate"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->CollectionDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CollectionDate" class="<?php echo $ivf_semenanalysisreport->CollectionDate->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_CollectionDate" class="ivf_semenanalysisreport_CollectionDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->CollectionDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->CollectionDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->CollectionDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->ResultDate->Visible) { // ResultDate ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->ResultDate) == "") { ?>
		<th data-name="ResultDate" class="<?php echo $ivf_semenanalysisreport->ResultDate->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_ResultDate" class="ivf_semenanalysisreport_ResultDate"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->ResultDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultDate" class="<?php echo $ivf_semenanalysisreport->ResultDate->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_ResultDate" class="ivf_semenanalysisreport_ResultDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->ResultDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->ResultDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->ResultDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RequestSample->Visible) { // RequestSample ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->RequestSample) == "") { ?>
		<th data-name="RequestSample" class="<?php echo $ivf_semenanalysisreport->RequestSample->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_RequestSample" class="ivf_semenanalysisreport_RequestSample"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->RequestSample->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RequestSample" class="<?php echo $ivf_semenanalysisreport->RequestSample->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_RequestSample" class="ivf_semenanalysisreport_RequestSample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->RequestSample->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->RequestSample->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->RequestSample->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->CollectionType->Visible) { // CollectionType ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->CollectionType) == "") { ?>
		<th data-name="CollectionType" class="<?php echo $ivf_semenanalysisreport->CollectionType->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_CollectionType" class="ivf_semenanalysisreport_CollectionType"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->CollectionType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CollectionType" class="<?php echo $ivf_semenanalysisreport->CollectionType->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_CollectionType" class="ivf_semenanalysisreport_CollectionType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->CollectionType->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->CollectionType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->CollectionType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->CollectionMethod->Visible) { // CollectionMethod ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->CollectionMethod) == "") { ?>
		<th data-name="CollectionMethod" class="<?php echo $ivf_semenanalysisreport->CollectionMethod->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_CollectionMethod" class="ivf_semenanalysisreport_CollectionMethod"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->CollectionMethod->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CollectionMethod" class="<?php echo $ivf_semenanalysisreport->CollectionMethod->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_CollectionMethod" class="ivf_semenanalysisreport_CollectionMethod">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->CollectionMethod->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->CollectionMethod->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->CollectionMethod->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Medicationused->Visible) { // Medicationused ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Medicationused) == "") { ?>
		<th data-name="Medicationused" class="<?php echo $ivf_semenanalysisreport->Medicationused->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Medicationused" class="ivf_semenanalysisreport_Medicationused"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Medicationused->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Medicationused" class="<?php echo $ivf_semenanalysisreport->Medicationused->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Medicationused" class="ivf_semenanalysisreport_Medicationused">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Medicationused->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Medicationused->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Medicationused->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->DifficultiesinCollection->Visible) { // DifficultiesinCollection ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->DifficultiesinCollection) == "") { ?>
		<th data-name="DifficultiesinCollection" class="<?php echo $ivf_semenanalysisreport->DifficultiesinCollection->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_DifficultiesinCollection" class="ivf_semenanalysisreport_DifficultiesinCollection"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->DifficultiesinCollection->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DifficultiesinCollection" class="<?php echo $ivf_semenanalysisreport->DifficultiesinCollection->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_DifficultiesinCollection" class="ivf_semenanalysisreport_DifficultiesinCollection">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->DifficultiesinCollection->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->DifficultiesinCollection->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->DifficultiesinCollection->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->pH->Visible) { // pH ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->pH) == "") { ?>
		<th data-name="pH" class="<?php echo $ivf_semenanalysisreport->pH->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_pH" class="ivf_semenanalysisreport_pH"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->pH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pH" class="<?php echo $ivf_semenanalysisreport->pH->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_pH" class="ivf_semenanalysisreport_pH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->pH->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->pH->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->pH->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Timeofcollection->Visible) { // Timeofcollection ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Timeofcollection) == "") { ?>
		<th data-name="Timeofcollection" class="<?php echo $ivf_semenanalysisreport->Timeofcollection->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Timeofcollection" class="ivf_semenanalysisreport_Timeofcollection"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Timeofcollection->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Timeofcollection" class="<?php echo $ivf_semenanalysisreport->Timeofcollection->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Timeofcollection" class="ivf_semenanalysisreport_Timeofcollection">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Timeofcollection->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Timeofcollection->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Timeofcollection->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Timeofexamination->Visible) { // Timeofexamination ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Timeofexamination) == "") { ?>
		<th data-name="Timeofexamination" class="<?php echo $ivf_semenanalysisreport->Timeofexamination->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Timeofexamination" class="ivf_semenanalysisreport_Timeofexamination"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Timeofexamination->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Timeofexamination" class="<?php echo $ivf_semenanalysisreport->Timeofexamination->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Timeofexamination" class="ivf_semenanalysisreport_Timeofexamination">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Timeofexamination->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Timeofexamination->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Timeofexamination->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Volume->Visible) { // Volume ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Volume) == "") { ?>
		<th data-name="Volume" class="<?php echo $ivf_semenanalysisreport->Volume->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Volume" class="ivf_semenanalysisreport_Volume"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Volume->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Volume" class="<?php echo $ivf_semenanalysisreport->Volume->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Volume" class="ivf_semenanalysisreport_Volume">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Volume->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Volume->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Volume->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Concentration->Visible) { // Concentration ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Concentration) == "") { ?>
		<th data-name="Concentration" class="<?php echo $ivf_semenanalysisreport->Concentration->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Concentration" class="ivf_semenanalysisreport_Concentration"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Concentration->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Concentration" class="<?php echo $ivf_semenanalysisreport->Concentration->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Concentration" class="ivf_semenanalysisreport_Concentration">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Concentration->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Concentration->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Concentration->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Total->Visible) { // Total ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Total) == "") { ?>
		<th data-name="Total" class="<?php echo $ivf_semenanalysisreport->Total->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Total" class="ivf_semenanalysisreport_Total"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Total->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Total" class="<?php echo $ivf_semenanalysisreport->Total->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Total" class="ivf_semenanalysisreport_Total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Total->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Total->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Total->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->ProgressiveMotility->Visible) { // ProgressiveMotility ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->ProgressiveMotility) == "") { ?>
		<th data-name="ProgressiveMotility" class="<?php echo $ivf_semenanalysisreport->ProgressiveMotility->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_ProgressiveMotility" class="ivf_semenanalysisreport_ProgressiveMotility"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->ProgressiveMotility->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProgressiveMotility" class="<?php echo $ivf_semenanalysisreport->ProgressiveMotility->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_ProgressiveMotility" class="ivf_semenanalysisreport_ProgressiveMotility">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->ProgressiveMotility->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->ProgressiveMotility->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->ProgressiveMotility->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->NonProgrssiveMotile->Visible) { // NonProgrssiveMotile ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->NonProgrssiveMotile) == "") { ?>
		<th data-name="NonProgrssiveMotile" class="<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_NonProgrssiveMotile" class="ivf_semenanalysisreport_NonProgrssiveMotile"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->NonProgrssiveMotile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NonProgrssiveMotile" class="<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_NonProgrssiveMotile" class="ivf_semenanalysisreport_NonProgrssiveMotile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->NonProgrssiveMotile->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->NonProgrssiveMotile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->NonProgrssiveMotile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Immotile->Visible) { // Immotile ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Immotile) == "") { ?>
		<th data-name="Immotile" class="<?php echo $ivf_semenanalysisreport->Immotile->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Immotile" class="ivf_semenanalysisreport_Immotile"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Immotile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Immotile" class="<?php echo $ivf_semenanalysisreport->Immotile->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Immotile" class="ivf_semenanalysisreport_Immotile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Immotile->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Immotile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Immotile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->TotalProgrssiveMotile->Visible) { // TotalProgrssiveMotile ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->TotalProgrssiveMotile) == "") { ?>
		<th data-name="TotalProgrssiveMotile" class="<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile" class="ivf_semenanalysisreport_TotalProgrssiveMotile"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TotalProgrssiveMotile" class="<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile" class="ivf_semenanalysisreport_TotalProgrssiveMotile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->TotalProgrssiveMotile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->TotalProgrssiveMotile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Appearance->Visible) { // Appearance ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Appearance) == "") { ?>
		<th data-name="Appearance" class="<?php echo $ivf_semenanalysisreport->Appearance->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Appearance" class="ivf_semenanalysisreport_Appearance"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Appearance->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Appearance" class="<?php echo $ivf_semenanalysisreport->Appearance->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Appearance" class="ivf_semenanalysisreport_Appearance">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Appearance->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Appearance->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Appearance->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Homogenosity->Visible) { // Homogenosity ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Homogenosity) == "") { ?>
		<th data-name="Homogenosity" class="<?php echo $ivf_semenanalysisreport->Homogenosity->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Homogenosity" class="ivf_semenanalysisreport_Homogenosity"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Homogenosity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Homogenosity" class="<?php echo $ivf_semenanalysisreport->Homogenosity->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Homogenosity" class="ivf_semenanalysisreport_Homogenosity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Homogenosity->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Homogenosity->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Homogenosity->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->CompleteSample->Visible) { // CompleteSample ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->CompleteSample) == "") { ?>
		<th data-name="CompleteSample" class="<?php echo $ivf_semenanalysisreport->CompleteSample->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_CompleteSample" class="ivf_semenanalysisreport_CompleteSample"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->CompleteSample->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CompleteSample" class="<?php echo $ivf_semenanalysisreport->CompleteSample->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_CompleteSample" class="ivf_semenanalysisreport_CompleteSample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->CompleteSample->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->CompleteSample->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->CompleteSample->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Liquefactiontime->Visible) { // Liquefactiontime ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Liquefactiontime) == "") { ?>
		<th data-name="Liquefactiontime" class="<?php echo $ivf_semenanalysisreport->Liquefactiontime->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Liquefactiontime" class="ivf_semenanalysisreport_Liquefactiontime"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Liquefactiontime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Liquefactiontime" class="<?php echo $ivf_semenanalysisreport->Liquefactiontime->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Liquefactiontime" class="ivf_semenanalysisreport_Liquefactiontime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Liquefactiontime->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Liquefactiontime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Liquefactiontime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Normal->Visible) { // Normal ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Normal) == "") { ?>
		<th data-name="Normal" class="<?php echo $ivf_semenanalysisreport->Normal->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Normal" class="ivf_semenanalysisreport_Normal"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Normal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Normal" class="<?php echo $ivf_semenanalysisreport->Normal->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Normal" class="ivf_semenanalysisreport_Normal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Normal->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Normal->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Normal->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Abnormal->Visible) { // Abnormal ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Abnormal) == "") { ?>
		<th data-name="Abnormal" class="<?php echo $ivf_semenanalysisreport->Abnormal->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Abnormal" class="ivf_semenanalysisreport_Abnormal"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Abnormal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Abnormal" class="<?php echo $ivf_semenanalysisreport->Abnormal->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Abnormal" class="ivf_semenanalysisreport_Abnormal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Abnormal->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Abnormal->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Abnormal->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Headdefects->Visible) { // Headdefects ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Headdefects) == "") { ?>
		<th data-name="Headdefects" class="<?php echo $ivf_semenanalysisreport->Headdefects->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Headdefects" class="ivf_semenanalysisreport_Headdefects"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Headdefects->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Headdefects" class="<?php echo $ivf_semenanalysisreport->Headdefects->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Headdefects" class="ivf_semenanalysisreport_Headdefects">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Headdefects->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Headdefects->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Headdefects->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->MidpieceDefects->Visible) { // MidpieceDefects ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->MidpieceDefects) == "") { ?>
		<th data-name="MidpieceDefects" class="<?php echo $ivf_semenanalysisreport->MidpieceDefects->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_MidpieceDefects" class="ivf_semenanalysisreport_MidpieceDefects"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->MidpieceDefects->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MidpieceDefects" class="<?php echo $ivf_semenanalysisreport->MidpieceDefects->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_MidpieceDefects" class="ivf_semenanalysisreport_MidpieceDefects">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->MidpieceDefects->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->MidpieceDefects->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->MidpieceDefects->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->TailDefects->Visible) { // TailDefects ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->TailDefects) == "") { ?>
		<th data-name="TailDefects" class="<?php echo $ivf_semenanalysisreport->TailDefects->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_TailDefects" class="ivf_semenanalysisreport_TailDefects"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->TailDefects->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TailDefects" class="<?php echo $ivf_semenanalysisreport->TailDefects->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_TailDefects" class="ivf_semenanalysisreport_TailDefects">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->TailDefects->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->TailDefects->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->TailDefects->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->NormalProgMotile->Visible) { // NormalProgMotile ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->NormalProgMotile) == "") { ?>
		<th data-name="NormalProgMotile" class="<?php echo $ivf_semenanalysisreport->NormalProgMotile->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_NormalProgMotile" class="ivf_semenanalysisreport_NormalProgMotile"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->NormalProgMotile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NormalProgMotile" class="<?php echo $ivf_semenanalysisreport->NormalProgMotile->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_NormalProgMotile" class="ivf_semenanalysisreport_NormalProgMotile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->NormalProgMotile->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->NormalProgMotile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->NormalProgMotile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->ImmatureForms->Visible) { // ImmatureForms ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->ImmatureForms) == "") { ?>
		<th data-name="ImmatureForms" class="<?php echo $ivf_semenanalysisreport->ImmatureForms->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_ImmatureForms" class="ivf_semenanalysisreport_ImmatureForms"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->ImmatureForms->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ImmatureForms" class="<?php echo $ivf_semenanalysisreport->ImmatureForms->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_ImmatureForms" class="ivf_semenanalysisreport_ImmatureForms">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->ImmatureForms->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->ImmatureForms->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->ImmatureForms->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Leucocytes->Visible) { // Leucocytes ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Leucocytes) == "") { ?>
		<th data-name="Leucocytes" class="<?php echo $ivf_semenanalysisreport->Leucocytes->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Leucocytes" class="ivf_semenanalysisreport_Leucocytes"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Leucocytes->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Leucocytes" class="<?php echo $ivf_semenanalysisreport->Leucocytes->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Leucocytes" class="ivf_semenanalysisreport_Leucocytes">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Leucocytes->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Leucocytes->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Leucocytes->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Agglutination->Visible) { // Agglutination ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Agglutination) == "") { ?>
		<th data-name="Agglutination" class="<?php echo $ivf_semenanalysisreport->Agglutination->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Agglutination" class="ivf_semenanalysisreport_Agglutination"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Agglutination->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Agglutination" class="<?php echo $ivf_semenanalysisreport->Agglutination->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Agglutination" class="ivf_semenanalysisreport_Agglutination">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Agglutination->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Agglutination->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Agglutination->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Debris->Visible) { // Debris ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Debris) == "") { ?>
		<th data-name="Debris" class="<?php echo $ivf_semenanalysisreport->Debris->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Debris" class="ivf_semenanalysisreport_Debris"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Debris->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Debris" class="<?php echo $ivf_semenanalysisreport->Debris->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Debris" class="ivf_semenanalysisreport_Debris">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Debris->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Debris->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Debris->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Diagnosis->Visible) { // Diagnosis ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Diagnosis) == "") { ?>
		<th data-name="Diagnosis" class="<?php echo $ivf_semenanalysisreport->Diagnosis->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Diagnosis" class="ivf_semenanalysisreport_Diagnosis"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Diagnosis->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Diagnosis" class="<?php echo $ivf_semenanalysisreport->Diagnosis->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Diagnosis" class="ivf_semenanalysisreport_Diagnosis">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Diagnosis->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Diagnosis->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Diagnosis->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Observations->Visible) { // Observations ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Observations) == "") { ?>
		<th data-name="Observations" class="<?php echo $ivf_semenanalysisreport->Observations->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Observations" class="ivf_semenanalysisreport_Observations"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Observations->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Observations" class="<?php echo $ivf_semenanalysisreport->Observations->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Observations" class="ivf_semenanalysisreport_Observations">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Observations->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Observations->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Observations->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Signature->Visible) { // Signature ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Signature) == "") { ?>
		<th data-name="Signature" class="<?php echo $ivf_semenanalysisreport->Signature->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Signature" class="ivf_semenanalysisreport_Signature"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Signature->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Signature" class="<?php echo $ivf_semenanalysisreport->Signature->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Signature" class="ivf_semenanalysisreport_Signature">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Signature->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Signature->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Signature->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->SemenOrgin->Visible) { // SemenOrgin ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->SemenOrgin) == "") { ?>
		<th data-name="SemenOrgin" class="<?php echo $ivf_semenanalysisreport->SemenOrgin->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_SemenOrgin" class="ivf_semenanalysisreport_SemenOrgin"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->SemenOrgin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SemenOrgin" class="<?php echo $ivf_semenanalysisreport->SemenOrgin->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_SemenOrgin" class="ivf_semenanalysisreport_SemenOrgin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->SemenOrgin->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->SemenOrgin->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->SemenOrgin->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Donor->Visible) { // Donor ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Donor) == "") { ?>
		<th data-name="Donor" class="<?php echo $ivf_semenanalysisreport->Donor->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Donor" class="ivf_semenanalysisreport_Donor"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Donor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Donor" class="<?php echo $ivf_semenanalysisreport->Donor->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Donor" class="ivf_semenanalysisreport_Donor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Donor->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Donor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Donor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->DonorBloodgroup->Visible) { // DonorBloodgroup ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->DonorBloodgroup) == "") { ?>
		<th data-name="DonorBloodgroup" class="<?php echo $ivf_semenanalysisreport->DonorBloodgroup->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_DonorBloodgroup" class="ivf_semenanalysisreport_DonorBloodgroup"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->DonorBloodgroup->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DonorBloodgroup" class="<?php echo $ivf_semenanalysisreport->DonorBloodgroup->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_DonorBloodgroup" class="ivf_semenanalysisreport_DonorBloodgroup">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->DonorBloodgroup->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->DonorBloodgroup->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->DonorBloodgroup->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Tank->Visible) { // Tank ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Tank) == "") { ?>
		<th data-name="Tank" class="<?php echo $ivf_semenanalysisreport->Tank->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Tank" class="ivf_semenanalysisreport_Tank"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Tank->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tank" class="<?php echo $ivf_semenanalysisreport->Tank->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Tank" class="ivf_semenanalysisreport_Tank">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Tank->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Tank->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Tank->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Location->Visible) { // Location ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Location) == "") { ?>
		<th data-name="Location" class="<?php echo $ivf_semenanalysisreport->Location->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Location" class="ivf_semenanalysisreport_Location"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Location->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Location" class="<?php echo $ivf_semenanalysisreport->Location->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Location" class="ivf_semenanalysisreport_Location">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Location->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Location->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Location->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Volume1->Visible) { // Volume1 ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Volume1) == "") { ?>
		<th data-name="Volume1" class="<?php echo $ivf_semenanalysisreport->Volume1->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Volume1" class="ivf_semenanalysisreport_Volume1"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Volume1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Volume1" class="<?php echo $ivf_semenanalysisreport->Volume1->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Volume1" class="ivf_semenanalysisreport_Volume1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Volume1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Volume1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Volume1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Concentration1->Visible) { // Concentration1 ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Concentration1) == "") { ?>
		<th data-name="Concentration1" class="<?php echo $ivf_semenanalysisreport->Concentration1->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Concentration1" class="ivf_semenanalysisreport_Concentration1"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Concentration1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Concentration1" class="<?php echo $ivf_semenanalysisreport->Concentration1->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Concentration1" class="ivf_semenanalysisreport_Concentration1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Concentration1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Concentration1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Concentration1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Total1->Visible) { // Total1 ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Total1) == "") { ?>
		<th data-name="Total1" class="<?php echo $ivf_semenanalysisreport->Total1->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Total1" class="ivf_semenanalysisreport_Total1"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Total1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Total1" class="<?php echo $ivf_semenanalysisreport->Total1->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Total1" class="ivf_semenanalysisreport_Total1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Total1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Total1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Total1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->ProgressiveMotility1->Visible) { // ProgressiveMotility1 ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->ProgressiveMotility1) == "") { ?>
		<th data-name="ProgressiveMotility1" class="<?php echo $ivf_semenanalysisreport->ProgressiveMotility1->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_ProgressiveMotility1" class="ivf_semenanalysisreport_ProgressiveMotility1"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->ProgressiveMotility1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProgressiveMotility1" class="<?php echo $ivf_semenanalysisreport->ProgressiveMotility1->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_ProgressiveMotility1" class="ivf_semenanalysisreport_ProgressiveMotility1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->ProgressiveMotility1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->ProgressiveMotility1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->ProgressiveMotility1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->NonProgrssiveMotile1->Visible) { // NonProgrssiveMotile1 ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->NonProgrssiveMotile1) == "") { ?>
		<th data-name="NonProgrssiveMotile1" class="<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile1->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_NonProgrssiveMotile1" class="ivf_semenanalysisreport_NonProgrssiveMotile1"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->NonProgrssiveMotile1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NonProgrssiveMotile1" class="<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile1->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_NonProgrssiveMotile1" class="ivf_semenanalysisreport_NonProgrssiveMotile1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->NonProgrssiveMotile1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->NonProgrssiveMotile1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->NonProgrssiveMotile1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Immotile1->Visible) { // Immotile1 ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Immotile1) == "") { ?>
		<th data-name="Immotile1" class="<?php echo $ivf_semenanalysisreport->Immotile1->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Immotile1" class="ivf_semenanalysisreport_Immotile1"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Immotile1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Immotile1" class="<?php echo $ivf_semenanalysisreport->Immotile1->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Immotile1" class="ivf_semenanalysisreport_Immotile1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Immotile1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Immotile1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Immotile1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->TotalProgrssiveMotile1->Visible) { // TotalProgrssiveMotile1 ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->TotalProgrssiveMotile1) == "") { ?>
		<th data-name="TotalProgrssiveMotile1" class="<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile1->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile1" class="ivf_semenanalysisreport_TotalProgrssiveMotile1"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TotalProgrssiveMotile1" class="<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile1->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile1" class="ivf_semenanalysisreport_TotalProgrssiveMotile1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->TotalProgrssiveMotile1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->TotalProgrssiveMotile1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->TidNo->Visible) { // TidNo ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $ivf_semenanalysisreport->TidNo->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_TidNo" class="ivf_semenanalysisreport_TidNo"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $ivf_semenanalysisreport->TidNo->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_TidNo" class="ivf_semenanalysisreport_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->TidNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->TidNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Color->Visible) { // Color ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Color) == "") { ?>
		<th data-name="Color" class="<?php echo $ivf_semenanalysisreport->Color->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Color" class="ivf_semenanalysisreport_Color"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Color->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Color" class="<?php echo $ivf_semenanalysisreport->Color->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Color" class="ivf_semenanalysisreport_Color">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Color->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Color->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Color->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->DoneBy->Visible) { // DoneBy ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->DoneBy) == "") { ?>
		<th data-name="DoneBy" class="<?php echo $ivf_semenanalysisreport->DoneBy->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_DoneBy" class="ivf_semenanalysisreport_DoneBy"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->DoneBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DoneBy" class="<?php echo $ivf_semenanalysisreport->DoneBy->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_DoneBy" class="ivf_semenanalysisreport_DoneBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->DoneBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->DoneBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->DoneBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Method->Visible) { // Method ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Method) == "") { ?>
		<th data-name="Method" class="<?php echo $ivf_semenanalysisreport->Method->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Method" class="ivf_semenanalysisreport_Method"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Method->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Method" class="<?php echo $ivf_semenanalysisreport->Method->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Method" class="ivf_semenanalysisreport_Method">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Method->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Method->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Method->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Abstinence->Visible) { // Abstinence ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Abstinence) == "") { ?>
		<th data-name="Abstinence" class="<?php echo $ivf_semenanalysisreport->Abstinence->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Abstinence" class="ivf_semenanalysisreport_Abstinence"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Abstinence->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Abstinence" class="<?php echo $ivf_semenanalysisreport->Abstinence->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Abstinence" class="ivf_semenanalysisreport_Abstinence">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Abstinence->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Abstinence->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Abstinence->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->ProcessedBy->Visible) { // ProcessedBy ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->ProcessedBy) == "") { ?>
		<th data-name="ProcessedBy" class="<?php echo $ivf_semenanalysisreport->ProcessedBy->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_ProcessedBy" class="ivf_semenanalysisreport_ProcessedBy"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->ProcessedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProcessedBy" class="<?php echo $ivf_semenanalysisreport->ProcessedBy->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_ProcessedBy" class="ivf_semenanalysisreport_ProcessedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->ProcessedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->ProcessedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->ProcessedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->InseminationTime->Visible) { // InseminationTime ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->InseminationTime) == "") { ?>
		<th data-name="InseminationTime" class="<?php echo $ivf_semenanalysisreport->InseminationTime->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_InseminationTime" class="ivf_semenanalysisreport_InseminationTime"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->InseminationTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="InseminationTime" class="<?php echo $ivf_semenanalysisreport->InseminationTime->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_InseminationTime" class="ivf_semenanalysisreport_InseminationTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->InseminationTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->InseminationTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->InseminationTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->InseminationBy->Visible) { // InseminationBy ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->InseminationBy) == "") { ?>
		<th data-name="InseminationBy" class="<?php echo $ivf_semenanalysisreport->InseminationBy->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_InseminationBy" class="ivf_semenanalysisreport_InseminationBy"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->InseminationBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="InseminationBy" class="<?php echo $ivf_semenanalysisreport->InseminationBy->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_InseminationBy" class="ivf_semenanalysisreport_InseminationBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->InseminationBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->InseminationBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->InseminationBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Big->Visible) { // Big ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Big) == "") { ?>
		<th data-name="Big" class="<?php echo $ivf_semenanalysisreport->Big->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Big" class="ivf_semenanalysisreport_Big"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Big->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Big" class="<?php echo $ivf_semenanalysisreport->Big->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Big" class="ivf_semenanalysisreport_Big">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Big->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Big->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Big->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Medium->Visible) { // Medium ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Medium) == "") { ?>
		<th data-name="Medium" class="<?php echo $ivf_semenanalysisreport->Medium->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Medium" class="ivf_semenanalysisreport_Medium"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Medium->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Medium" class="<?php echo $ivf_semenanalysisreport->Medium->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Medium" class="ivf_semenanalysisreport_Medium">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Medium->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Medium->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Medium->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Small->Visible) { // Small ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Small) == "") { ?>
		<th data-name="Small" class="<?php echo $ivf_semenanalysisreport->Small->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Small" class="ivf_semenanalysisreport_Small"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Small->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Small" class="<?php echo $ivf_semenanalysisreport->Small->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Small" class="ivf_semenanalysisreport_Small">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Small->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Small->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Small->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->NoHalo->Visible) { // NoHalo ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->NoHalo) == "") { ?>
		<th data-name="NoHalo" class="<?php echo $ivf_semenanalysisreport->NoHalo->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_NoHalo" class="ivf_semenanalysisreport_NoHalo"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->NoHalo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoHalo" class="<?php echo $ivf_semenanalysisreport->NoHalo->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_NoHalo" class="ivf_semenanalysisreport_NoHalo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->NoHalo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->NoHalo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->NoHalo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Fragmented->Visible) { // Fragmented ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Fragmented) == "") { ?>
		<th data-name="Fragmented" class="<?php echo $ivf_semenanalysisreport->Fragmented->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Fragmented" class="ivf_semenanalysisreport_Fragmented"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Fragmented->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Fragmented" class="<?php echo $ivf_semenanalysisreport->Fragmented->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Fragmented" class="ivf_semenanalysisreport_Fragmented">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Fragmented->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Fragmented->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Fragmented->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->NonFragmented->Visible) { // NonFragmented ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->NonFragmented) == "") { ?>
		<th data-name="NonFragmented" class="<?php echo $ivf_semenanalysisreport->NonFragmented->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_NonFragmented" class="ivf_semenanalysisreport_NonFragmented"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->NonFragmented->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NonFragmented" class="<?php echo $ivf_semenanalysisreport->NonFragmented->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_NonFragmented" class="ivf_semenanalysisreport_NonFragmented">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->NonFragmented->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->NonFragmented->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->NonFragmented->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->DFI->Visible) { // DFI ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->DFI) == "") { ?>
		<th data-name="DFI" class="<?php echo $ivf_semenanalysisreport->DFI->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_DFI" class="ivf_semenanalysisreport_DFI"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->DFI->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DFI" class="<?php echo $ivf_semenanalysisreport->DFI->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_DFI" class="ivf_semenanalysisreport_DFI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->DFI->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->DFI->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->DFI->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->IsueBy->Visible) { // IsueBy ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->IsueBy) == "") { ?>
		<th data-name="IsueBy" class="<?php echo $ivf_semenanalysisreport->IsueBy->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_IsueBy" class="ivf_semenanalysisreport_IsueBy"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->IsueBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IsueBy" class="<?php echo $ivf_semenanalysisreport->IsueBy->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_IsueBy" class="ivf_semenanalysisreport_IsueBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->IsueBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->IsueBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->IsueBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Volume2->Visible) { // Volume2 ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Volume2) == "") { ?>
		<th data-name="Volume2" class="<?php echo $ivf_semenanalysisreport->Volume2->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Volume2" class="ivf_semenanalysisreport_Volume2"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Volume2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Volume2" class="<?php echo $ivf_semenanalysisreport->Volume2->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Volume2" class="ivf_semenanalysisreport_Volume2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Volume2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Volume2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Volume2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Concentration2->Visible) { // Concentration2 ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Concentration2) == "") { ?>
		<th data-name="Concentration2" class="<?php echo $ivf_semenanalysisreport->Concentration2->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Concentration2" class="ivf_semenanalysisreport_Concentration2"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Concentration2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Concentration2" class="<?php echo $ivf_semenanalysisreport->Concentration2->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Concentration2" class="ivf_semenanalysisreport_Concentration2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Concentration2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Concentration2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Concentration2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Total2->Visible) { // Total2 ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Total2) == "") { ?>
		<th data-name="Total2" class="<?php echo $ivf_semenanalysisreport->Total2->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Total2" class="ivf_semenanalysisreport_Total2"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Total2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Total2" class="<?php echo $ivf_semenanalysisreport->Total2->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Total2" class="ivf_semenanalysisreport_Total2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Total2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Total2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Total2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->ProgressiveMotility2->Visible) { // ProgressiveMotility2 ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->ProgressiveMotility2) == "") { ?>
		<th data-name="ProgressiveMotility2" class="<?php echo $ivf_semenanalysisreport->ProgressiveMotility2->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_ProgressiveMotility2" class="ivf_semenanalysisreport_ProgressiveMotility2"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->ProgressiveMotility2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProgressiveMotility2" class="<?php echo $ivf_semenanalysisreport->ProgressiveMotility2->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_ProgressiveMotility2" class="ivf_semenanalysisreport_ProgressiveMotility2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->ProgressiveMotility2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->ProgressiveMotility2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->ProgressiveMotility2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->NonProgrssiveMotile2->Visible) { // NonProgrssiveMotile2 ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->NonProgrssiveMotile2) == "") { ?>
		<th data-name="NonProgrssiveMotile2" class="<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile2->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_NonProgrssiveMotile2" class="ivf_semenanalysisreport_NonProgrssiveMotile2"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->NonProgrssiveMotile2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NonProgrssiveMotile2" class="<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile2->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_NonProgrssiveMotile2" class="ivf_semenanalysisreport_NonProgrssiveMotile2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->NonProgrssiveMotile2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->NonProgrssiveMotile2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->NonProgrssiveMotile2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Immotile2->Visible) { // Immotile2 ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Immotile2) == "") { ?>
		<th data-name="Immotile2" class="<?php echo $ivf_semenanalysisreport->Immotile2->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Immotile2" class="ivf_semenanalysisreport_Immotile2"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Immotile2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Immotile2" class="<?php echo $ivf_semenanalysisreport->Immotile2->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Immotile2" class="ivf_semenanalysisreport_Immotile2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Immotile2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Immotile2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Immotile2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->TotalProgrssiveMotile2->Visible) { // TotalProgrssiveMotile2 ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->TotalProgrssiveMotile2) == "") { ?>
		<th data-name="TotalProgrssiveMotile2" class="<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile2->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile2" class="ivf_semenanalysisreport_TotalProgrssiveMotile2"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TotalProgrssiveMotile2" class="<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile2->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile2" class="ivf_semenanalysisreport_TotalProgrssiveMotile2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->TotalProgrssiveMotile2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->TotalProgrssiveMotile2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->IssuedBy->Visible) { // IssuedBy ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->IssuedBy) == "") { ?>
		<th data-name="IssuedBy" class="<?php echo $ivf_semenanalysisreport->IssuedBy->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_IssuedBy" class="ivf_semenanalysisreport_IssuedBy"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->IssuedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IssuedBy" class="<?php echo $ivf_semenanalysisreport->IssuedBy->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_IssuedBy" class="ivf_semenanalysisreport_IssuedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->IssuedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->IssuedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->IssuedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->IssuedTo->Visible) { // IssuedTo ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->IssuedTo) == "") { ?>
		<th data-name="IssuedTo" class="<?php echo $ivf_semenanalysisreport->IssuedTo->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_IssuedTo" class="ivf_semenanalysisreport_IssuedTo"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->IssuedTo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IssuedTo" class="<?php echo $ivf_semenanalysisreport->IssuedTo->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_IssuedTo" class="ivf_semenanalysisreport_IssuedTo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->IssuedTo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->IssuedTo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->IssuedTo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->PaID->Visible) { // PaID ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->PaID) == "") { ?>
		<th data-name="PaID" class="<?php echo $ivf_semenanalysisreport->PaID->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_PaID" class="ivf_semenanalysisreport_PaID"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->PaID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaID" class="<?php echo $ivf_semenanalysisreport->PaID->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_PaID" class="ivf_semenanalysisreport_PaID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->PaID->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->PaID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->PaID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->PaName->Visible) { // PaName ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->PaName) == "") { ?>
		<th data-name="PaName" class="<?php echo $ivf_semenanalysisreport->PaName->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_PaName" class="ivf_semenanalysisreport_PaName"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->PaName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaName" class="<?php echo $ivf_semenanalysisreport->PaName->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_PaName" class="ivf_semenanalysisreport_PaName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->PaName->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->PaName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->PaName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->PaMobile->Visible) { // PaMobile ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->PaMobile) == "") { ?>
		<th data-name="PaMobile" class="<?php echo $ivf_semenanalysisreport->PaMobile->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_PaMobile" class="ivf_semenanalysisreport_PaMobile"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->PaMobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaMobile" class="<?php echo $ivf_semenanalysisreport->PaMobile->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_PaMobile" class="ivf_semenanalysisreport_PaMobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->PaMobile->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->PaMobile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->PaMobile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->PartnerID->Visible) { // PartnerID ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->PartnerID) == "") { ?>
		<th data-name="PartnerID" class="<?php echo $ivf_semenanalysisreport->PartnerID->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_PartnerID" class="ivf_semenanalysisreport_PartnerID"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->PartnerID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerID" class="<?php echo $ivf_semenanalysisreport->PartnerID->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_PartnerID" class="ivf_semenanalysisreport_PartnerID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->PartnerID->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->PartnerID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->PartnerID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->PartnerName->Visible) { // PartnerName ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->PartnerName) == "") { ?>
		<th data-name="PartnerName" class="<?php echo $ivf_semenanalysisreport->PartnerName->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_PartnerName" class="ivf_semenanalysisreport_PartnerName"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->PartnerName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerName" class="<?php echo $ivf_semenanalysisreport->PartnerName->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_PartnerName" class="ivf_semenanalysisreport_PartnerName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->PartnerName->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->PartnerName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->PartnerName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->PartnerMobile->Visible) { // PartnerMobile ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->PartnerMobile) == "") { ?>
		<th data-name="PartnerMobile" class="<?php echo $ivf_semenanalysisreport->PartnerMobile->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_PartnerMobile" class="ivf_semenanalysisreport_PartnerMobile"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->PartnerMobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerMobile" class="<?php echo $ivf_semenanalysisreport->PartnerMobile->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_PartnerMobile" class="ivf_semenanalysisreport_PartnerMobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->PartnerMobile->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->PartnerMobile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->PartnerMobile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->PREG_TEST_DATE) == "") { ?>
		<th data-name="PREG_TEST_DATE" class="<?php echo $ivf_semenanalysisreport->PREG_TEST_DATE->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_PREG_TEST_DATE" class="ivf_semenanalysisreport_PREG_TEST_DATE"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->PREG_TEST_DATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PREG_TEST_DATE" class="<?php echo $ivf_semenanalysisreport->PREG_TEST_DATE->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_PREG_TEST_DATE" class="ivf_semenanalysisreport_PREG_TEST_DATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->PREG_TEST_DATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->PREG_TEST_DATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->PREG_TEST_DATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->SPECIFIC_PROBLEMS->Visible) { // SPECIFIC_PROBLEMS ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->SPECIFIC_PROBLEMS) == "") { ?>
		<th data-name="SPECIFIC_PROBLEMS" class="<?php echo $ivf_semenanalysisreport->SPECIFIC_PROBLEMS->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_SPECIFIC_PROBLEMS" class="ivf_semenanalysisreport_SPECIFIC_PROBLEMS"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->SPECIFIC_PROBLEMS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SPECIFIC_PROBLEMS" class="<?php echo $ivf_semenanalysisreport->SPECIFIC_PROBLEMS->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_SPECIFIC_PROBLEMS" class="ivf_semenanalysisreport_SPECIFIC_PROBLEMS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->SPECIFIC_PROBLEMS->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->SPECIFIC_PROBLEMS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->SPECIFIC_PROBLEMS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->IMSC_1->Visible) { // IMSC_1 ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->IMSC_1) == "") { ?>
		<th data-name="IMSC_1" class="<?php echo $ivf_semenanalysisreport->IMSC_1->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_IMSC_1" class="ivf_semenanalysisreport_IMSC_1"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->IMSC_1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IMSC_1" class="<?php echo $ivf_semenanalysisreport->IMSC_1->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_IMSC_1" class="ivf_semenanalysisreport_IMSC_1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->IMSC_1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->IMSC_1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->IMSC_1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->IMSC_2->Visible) { // IMSC_2 ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->IMSC_2) == "") { ?>
		<th data-name="IMSC_2" class="<?php echo $ivf_semenanalysisreport->IMSC_2->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_IMSC_2" class="ivf_semenanalysisreport_IMSC_2"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->IMSC_2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IMSC_2" class="<?php echo $ivf_semenanalysisreport->IMSC_2->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_IMSC_2" class="ivf_semenanalysisreport_IMSC_2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->IMSC_2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->IMSC_2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->IMSC_2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->LIQUIFACTION_STORAGE->Visible) { // LIQUIFACTION_STORAGE ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->LIQUIFACTION_STORAGE) == "") { ?>
		<th data-name="LIQUIFACTION_STORAGE" class="<?php echo $ivf_semenanalysisreport->LIQUIFACTION_STORAGE->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_LIQUIFACTION_STORAGE" class="ivf_semenanalysisreport_LIQUIFACTION_STORAGE"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->LIQUIFACTION_STORAGE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LIQUIFACTION_STORAGE" class="<?php echo $ivf_semenanalysisreport->LIQUIFACTION_STORAGE->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_LIQUIFACTION_STORAGE" class="ivf_semenanalysisreport_LIQUIFACTION_STORAGE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->LIQUIFACTION_STORAGE->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->LIQUIFACTION_STORAGE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->LIQUIFACTION_STORAGE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->IUI_PREP_METHOD->Visible) { // IUI_PREP_METHOD ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->IUI_PREP_METHOD) == "") { ?>
		<th data-name="IUI_PREP_METHOD" class="<?php echo $ivf_semenanalysisreport->IUI_PREP_METHOD->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_IUI_PREP_METHOD" class="ivf_semenanalysisreport_IUI_PREP_METHOD"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->IUI_PREP_METHOD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IUI_PREP_METHOD" class="<?php echo $ivf_semenanalysisreport->IUI_PREP_METHOD->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_IUI_PREP_METHOD" class="ivf_semenanalysisreport_IUI_PREP_METHOD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->IUI_PREP_METHOD->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->IUI_PREP_METHOD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->IUI_PREP_METHOD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->TIME_FROM_TRIGGER->Visible) { // TIME_FROM_TRIGGER ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->TIME_FROM_TRIGGER) == "") { ?>
		<th data-name="TIME_FROM_TRIGGER" class="<?php echo $ivf_semenanalysisreport->TIME_FROM_TRIGGER->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_TIME_FROM_TRIGGER" class="ivf_semenanalysisreport_TIME_FROM_TRIGGER"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->TIME_FROM_TRIGGER->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TIME_FROM_TRIGGER" class="<?php echo $ivf_semenanalysisreport->TIME_FROM_TRIGGER->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_TIME_FROM_TRIGGER" class="ivf_semenanalysisreport_TIME_FROM_TRIGGER">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->TIME_FROM_TRIGGER->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->TIME_FROM_TRIGGER->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->TIME_FROM_TRIGGER->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->Visible) { // COLLECTION_TO_PREPARATION ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->COLLECTION_TO_PREPARATION) == "") { ?>
		<th data-name="COLLECTION_TO_PREPARATION" class="<?php echo $ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION" class="ivf_semenanalysisreport_COLLECTION_TO_PREPARATION"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="COLLECTION_TO_PREPARATION" class="<?php echo $ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION" class="ivf_semenanalysisreport_COLLECTION_TO_PREPARATION">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->Visible) { // TIME_FROM_PREP_TO_INSEM ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM) == "") { ?>
		<th data-name="TIME_FROM_PREP_TO_INSEM" class="<?php echo $ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM" class="ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TIME_FROM_PREP_TO_INSEM" class="<?php echo $ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM" class="ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_semenanalysisreport_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$ivf_semenanalysisreport_grid->StartRec = 1;
$ivf_semenanalysisreport_grid->StopRec = $ivf_semenanalysisreport_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $ivf_semenanalysisreport_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($ivf_semenanalysisreport_grid->FormKeyCountName) && ($ivf_semenanalysisreport->isGridAdd() || $ivf_semenanalysisreport->isGridEdit() || $ivf_semenanalysisreport->isConfirm())) {
		$ivf_semenanalysisreport_grid->KeyCount = $CurrentForm->getValue($ivf_semenanalysisreport_grid->FormKeyCountName);
		$ivf_semenanalysisreport_grid->StopRec = $ivf_semenanalysisreport_grid->StartRec + $ivf_semenanalysisreport_grid->KeyCount - 1;
	}
}
$ivf_semenanalysisreport_grid->RecCnt = $ivf_semenanalysisreport_grid->StartRec - 1;
if ($ivf_semenanalysisreport_grid->Recordset && !$ivf_semenanalysisreport_grid->Recordset->EOF) {
	$ivf_semenanalysisreport_grid->Recordset->moveFirst();
	$selectLimit = $ivf_semenanalysisreport_grid->UseSelectLimit;
	if (!$selectLimit && $ivf_semenanalysisreport_grid->StartRec > 1)
		$ivf_semenanalysisreport_grid->Recordset->move($ivf_semenanalysisreport_grid->StartRec - 1);
} elseif (!$ivf_semenanalysisreport->AllowAddDeleteRow && $ivf_semenanalysisreport_grid->StopRec == 0) {
	$ivf_semenanalysisreport_grid->StopRec = $ivf_semenanalysisreport->GridAddRowCount;
}

// Initialize aggregate
$ivf_semenanalysisreport->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_semenanalysisreport->resetAttributes();
$ivf_semenanalysisreport_grid->renderRow();
if ($ivf_semenanalysisreport->isGridAdd())
	$ivf_semenanalysisreport_grid->RowIndex = 0;
if ($ivf_semenanalysisreport->isGridEdit())
	$ivf_semenanalysisreport_grid->RowIndex = 0;
while ($ivf_semenanalysisreport_grid->RecCnt < $ivf_semenanalysisreport_grid->StopRec) {
	$ivf_semenanalysisreport_grid->RecCnt++;
	if ($ivf_semenanalysisreport_grid->RecCnt >= $ivf_semenanalysisreport_grid->StartRec) {
		$ivf_semenanalysisreport_grid->RowCnt++;
		if ($ivf_semenanalysisreport->isGridAdd() || $ivf_semenanalysisreport->isGridEdit() || $ivf_semenanalysisreport->isConfirm()) {
			$ivf_semenanalysisreport_grid->RowIndex++;
			$CurrentForm->Index = $ivf_semenanalysisreport_grid->RowIndex;
			if ($CurrentForm->hasValue($ivf_semenanalysisreport_grid->FormActionName) && $ivf_semenanalysisreport_grid->EventCancelled)
				$ivf_semenanalysisreport_grid->RowAction = strval($CurrentForm->getValue($ivf_semenanalysisreport_grid->FormActionName));
			elseif ($ivf_semenanalysisreport->isGridAdd())
				$ivf_semenanalysisreport_grid->RowAction = "insert";
			else
				$ivf_semenanalysisreport_grid->RowAction = "";
		}

		// Set up key count
		$ivf_semenanalysisreport_grid->KeyCount = $ivf_semenanalysisreport_grid->RowIndex;

		// Init row class and style
		$ivf_semenanalysisreport->resetAttributes();
		$ivf_semenanalysisreport->CssClass = "";
		if ($ivf_semenanalysisreport->isGridAdd()) {
			if ($ivf_semenanalysisreport->CurrentMode == "copy") {
				$ivf_semenanalysisreport_grid->loadRowValues($ivf_semenanalysisreport_grid->Recordset); // Load row values
				$ivf_semenanalysisreport_grid->setRecordKey($ivf_semenanalysisreport_grid->RowOldKey, $ivf_semenanalysisreport_grid->Recordset); // Set old record key
			} else {
				$ivf_semenanalysisreport_grid->loadRowValues(); // Load default values
				$ivf_semenanalysisreport_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$ivf_semenanalysisreport_grid->loadRowValues($ivf_semenanalysisreport_grid->Recordset); // Load row values
		}
		$ivf_semenanalysisreport->RowType = ROWTYPE_VIEW; // Render view
		if ($ivf_semenanalysisreport->isGridAdd()) // Grid add
			$ivf_semenanalysisreport->RowType = ROWTYPE_ADD; // Render add
		if ($ivf_semenanalysisreport->isGridAdd() && $ivf_semenanalysisreport->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$ivf_semenanalysisreport_grid->restoreCurrentRowFormValues($ivf_semenanalysisreport_grid->RowIndex); // Restore form values
		if ($ivf_semenanalysisreport->isGridEdit()) { // Grid edit
			if ($ivf_semenanalysisreport->EventCancelled)
				$ivf_semenanalysisreport_grid->restoreCurrentRowFormValues($ivf_semenanalysisreport_grid->RowIndex); // Restore form values
			if ($ivf_semenanalysisreport_grid->RowAction == "insert")
				$ivf_semenanalysisreport->RowType = ROWTYPE_ADD; // Render add
			else
				$ivf_semenanalysisreport->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($ivf_semenanalysisreport->isGridEdit() && ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT || $ivf_semenanalysisreport->RowType == ROWTYPE_ADD) && $ivf_semenanalysisreport->EventCancelled) // Update failed
			$ivf_semenanalysisreport_grid->restoreCurrentRowFormValues($ivf_semenanalysisreport_grid->RowIndex); // Restore form values
		if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) // Edit row
			$ivf_semenanalysisreport_grid->EditRowCnt++;
		if ($ivf_semenanalysisreport->isConfirm()) // Confirm row
			$ivf_semenanalysisreport_grid->restoreCurrentRowFormValues($ivf_semenanalysisreport_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$ivf_semenanalysisreport->RowAttrs = array_merge($ivf_semenanalysisreport->RowAttrs, array('data-rowindex'=>$ivf_semenanalysisreport_grid->RowCnt, 'id'=>'r' . $ivf_semenanalysisreport_grid->RowCnt . '_ivf_semenanalysisreport', 'data-rowtype'=>$ivf_semenanalysisreport->RowType));

		// Render row
		$ivf_semenanalysisreport_grid->renderRow();

		// Render list options
		$ivf_semenanalysisreport_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($ivf_semenanalysisreport_grid->RowAction <> "delete" && $ivf_semenanalysisreport_grid->RowAction <> "insertdelete" && !($ivf_semenanalysisreport_grid->RowAction == "insert" && $ivf_semenanalysisreport->isConfirm() && $ivf_semenanalysisreport_grid->emptyRow())) {
?>
	<tr<?php echo $ivf_semenanalysisreport->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_semenanalysisreport_grid->ListOptions->render("body", "left", $ivf_semenanalysisreport_grid->RowCnt);
?>
	<?php if ($ivf_semenanalysisreport->id->Visible) { // id ?>
		<td data-name="id"<?php echo $ivf_semenanalysisreport->id->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_id" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_id" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_semenanalysisreport->id->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_id" class="form-group ivf_semenanalysisreport_id">
<span<?php echo $ivf_semenanalysisreport->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_id" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_id" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_semenanalysisreport->id->CurrentValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_id" class="ivf_semenanalysisreport_id">
<span<?php echo $ivf_semenanalysisreport->id->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->id->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_id" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_id" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_semenanalysisreport->id->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_id" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_id" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_semenanalysisreport->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_id" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_id" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_semenanalysisreport->id->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_id" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_id" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_semenanalysisreport->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->RIDNo->Visible) { // RIDNo ?>
		<td data-name="RIDNo"<?php echo $ivf_semenanalysisreport->RIDNo->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($ivf_semenanalysisreport->RIDNo->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_RIDNo" class="form-group ivf_semenanalysisreport_RIDNo">
<span<?php echo $ivf_semenanalysisreport->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->RIDNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_semenanalysisreport->RIDNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_RIDNo" class="form-group ivf_semenanalysisreport_RIDNo">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_RIDNo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" size="30" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->RIDNo->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->RIDNo->EditValue ?>"<?php echo $ivf_semenanalysisreport->RIDNo->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RIDNo" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_semenanalysisreport->RIDNo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($ivf_semenanalysisreport->RIDNo->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_RIDNo" class="form-group ivf_semenanalysisreport_RIDNo">
<span<?php echo $ivf_semenanalysisreport->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->RIDNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_semenanalysisreport->RIDNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_RIDNo" class="form-group ivf_semenanalysisreport_RIDNo">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_RIDNo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" size="30" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->RIDNo->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->RIDNo->EditValue ?>"<?php echo $ivf_semenanalysisreport->RIDNo->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_RIDNo" class="ivf_semenanalysisreport_RIDNo">
<span<?php echo $ivf_semenanalysisreport->RIDNo->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->RIDNo->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RIDNo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_semenanalysisreport->RIDNo->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RIDNo" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_semenanalysisreport->RIDNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RIDNo" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_semenanalysisreport->RIDNo->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RIDNo" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_semenanalysisreport->RIDNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $ivf_semenanalysisreport->PatientName->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($ivf_semenanalysisreport->PatientName->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_PatientName" class="form-group ivf_semenanalysisreport_PatientName">
<span<?php echo $ivf_semenanalysisreport->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->PatientName->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PatientName->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_PatientName" class="form-group ivf_semenanalysisreport_PatientName">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PatientName" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->PatientName->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->PatientName->EditValue ?>"<?php echo $ivf_semenanalysisreport->PatientName->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PatientName" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($ivf_semenanalysisreport->PatientName->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_PatientName" class="form-group ivf_semenanalysisreport_PatientName">
<span<?php echo $ivf_semenanalysisreport->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->PatientName->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PatientName->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_PatientName" class="form-group ivf_semenanalysisreport_PatientName">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PatientName" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->PatientName->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->PatientName->EditValue ?>"<?php echo $ivf_semenanalysisreport->PatientName->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_PatientName" class="ivf_semenanalysisreport_PatientName">
<span<?php echo $ivf_semenanalysisreport->PatientName->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->PatientName->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PatientName" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PatientName->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PatientName" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PatientName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PatientName" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PatientName->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PatientName" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PatientName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->HusbandName->Visible) { // HusbandName ?>
		<td data-name="HusbandName"<?php echo $ivf_semenanalysisreport->HusbandName->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_HusbandName" class="form-group ivf_semenanalysisreport_HusbandName">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_HusbandName" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_HusbandName" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_HusbandName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->HusbandName->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->HusbandName->EditValue ?>"<?php echo $ivf_semenanalysisreport->HusbandName->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_HusbandName" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_HusbandName" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_HusbandName" value="<?php echo HtmlEncode($ivf_semenanalysisreport->HusbandName->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_HusbandName" class="form-group ivf_semenanalysisreport_HusbandName">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_HusbandName" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_HusbandName" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_HusbandName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->HusbandName->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->HusbandName->EditValue ?>"<?php echo $ivf_semenanalysisreport->HusbandName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_HusbandName" class="ivf_semenanalysisreport_HusbandName">
<span<?php echo $ivf_semenanalysisreport->HusbandName->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->HusbandName->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_HusbandName" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_HusbandName" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_HusbandName" value="<?php echo HtmlEncode($ivf_semenanalysisreport->HusbandName->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_HusbandName" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_HusbandName" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_HusbandName" value="<?php echo HtmlEncode($ivf_semenanalysisreport->HusbandName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_HusbandName" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_HusbandName" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_HusbandName" value="<?php echo HtmlEncode($ivf_semenanalysisreport->HusbandName->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_HusbandName" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_HusbandName" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_HusbandName" value="<?php echo HtmlEncode($ivf_semenanalysisreport->HusbandName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->RequestDr->Visible) { // RequestDr ?>
		<td data-name="RequestDr"<?php echo $ivf_semenanalysisreport->RequestDr->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_RequestDr" class="form-group ivf_semenanalysisreport_RequestDr">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_RequestDr" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestDr" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestDr" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->RequestDr->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->RequestDr->EditValue ?>"<?php echo $ivf_semenanalysisreport->RequestDr->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RequestDr" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestDr" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestDr" value="<?php echo HtmlEncode($ivf_semenanalysisreport->RequestDr->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_RequestDr" class="form-group ivf_semenanalysisreport_RequestDr">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_RequestDr" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestDr" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestDr" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->RequestDr->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->RequestDr->EditValue ?>"<?php echo $ivf_semenanalysisreport->RequestDr->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_RequestDr" class="ivf_semenanalysisreport_RequestDr">
<span<?php echo $ivf_semenanalysisreport->RequestDr->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->RequestDr->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RequestDr" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestDr" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestDr" value="<?php echo HtmlEncode($ivf_semenanalysisreport->RequestDr->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RequestDr" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestDr" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestDr" value="<?php echo HtmlEncode($ivf_semenanalysisreport->RequestDr->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RequestDr" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestDr" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestDr" value="<?php echo HtmlEncode($ivf_semenanalysisreport->RequestDr->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RequestDr" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestDr" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestDr" value="<?php echo HtmlEncode($ivf_semenanalysisreport->RequestDr->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->CollectionDate->Visible) { // CollectionDate ?>
		<td data-name="CollectionDate"<?php echo $ivf_semenanalysisreport->CollectionDate->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_CollectionDate" class="form-group ivf_semenanalysisreport_CollectionDate">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_CollectionDate" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionDate" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionDate" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->CollectionDate->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->CollectionDate->EditValue ?>"<?php echo $ivf_semenanalysisreport->CollectionDate->editAttributes() ?>>
<?php if (!$ivf_semenanalysisreport->CollectionDate->ReadOnly && !$ivf_semenanalysisreport->CollectionDate->Disabled && !isset($ivf_semenanalysisreport->CollectionDate->EditAttrs["readonly"]) && !isset($ivf_semenanalysisreport->CollectionDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_semenanalysisreportgrid", "x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionDate" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionDate" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionDate" value="<?php echo HtmlEncode($ivf_semenanalysisreport->CollectionDate->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_CollectionDate" class="form-group ivf_semenanalysisreport_CollectionDate">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_CollectionDate" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionDate" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionDate" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->CollectionDate->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->CollectionDate->EditValue ?>"<?php echo $ivf_semenanalysisreport->CollectionDate->editAttributes() ?>>
<?php if (!$ivf_semenanalysisreport->CollectionDate->ReadOnly && !$ivf_semenanalysisreport->CollectionDate->Disabled && !isset($ivf_semenanalysisreport->CollectionDate->EditAttrs["readonly"]) && !isset($ivf_semenanalysisreport->CollectionDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_semenanalysisreportgrid", "x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_CollectionDate" class="ivf_semenanalysisreport_CollectionDate">
<span<?php echo $ivf_semenanalysisreport->CollectionDate->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->CollectionDate->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionDate" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionDate" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionDate" value="<?php echo HtmlEncode($ivf_semenanalysisreport->CollectionDate->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionDate" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionDate" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionDate" value="<?php echo HtmlEncode($ivf_semenanalysisreport->CollectionDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionDate" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionDate" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionDate" value="<?php echo HtmlEncode($ivf_semenanalysisreport->CollectionDate->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionDate" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionDate" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionDate" value="<?php echo HtmlEncode($ivf_semenanalysisreport->CollectionDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate"<?php echo $ivf_semenanalysisreport->ResultDate->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_ResultDate" class="form-group ivf_semenanalysisreport_ResultDate">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_ResultDate" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ResultDate" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ResultDate" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->ResultDate->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->ResultDate->EditValue ?>"<?php echo $ivf_semenanalysisreport->ResultDate->editAttributes() ?>>
<?php if (!$ivf_semenanalysisreport->ResultDate->ReadOnly && !$ivf_semenanalysisreport->ResultDate->Disabled && !isset($ivf_semenanalysisreport->ResultDate->EditAttrs["readonly"]) && !isset($ivf_semenanalysisreport->ResultDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_semenanalysisreportgrid", "x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ResultDate" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ResultDate" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($ivf_semenanalysisreport->ResultDate->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_ResultDate" class="form-group ivf_semenanalysisreport_ResultDate">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_ResultDate" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ResultDate" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ResultDate" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->ResultDate->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->ResultDate->EditValue ?>"<?php echo $ivf_semenanalysisreport->ResultDate->editAttributes() ?>>
<?php if (!$ivf_semenanalysisreport->ResultDate->ReadOnly && !$ivf_semenanalysisreport->ResultDate->Disabled && !isset($ivf_semenanalysisreport->ResultDate->EditAttrs["readonly"]) && !isset($ivf_semenanalysisreport->ResultDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_semenanalysisreportgrid", "x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_ResultDate" class="ivf_semenanalysisreport_ResultDate">
<span<?php echo $ivf_semenanalysisreport->ResultDate->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->ResultDate->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ResultDate" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ResultDate" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($ivf_semenanalysisreport->ResultDate->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ResultDate" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ResultDate" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($ivf_semenanalysisreport->ResultDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ResultDate" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ResultDate" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($ivf_semenanalysisreport->ResultDate->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ResultDate" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ResultDate" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($ivf_semenanalysisreport->ResultDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->RequestSample->Visible) { // RequestSample ?>
		<td data-name="RequestSample"<?php echo $ivf_semenanalysisreport->RequestSample->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_RequestSample" class="form-group ivf_semenanalysisreport_RequestSample">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_RequestSample" data-value-separator="<?php echo $ivf_semenanalysisreport->RequestSample->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestSample" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestSample"<?php echo $ivf_semenanalysisreport->RequestSample->editAttributes() ?>>
		<?php echo $ivf_semenanalysisreport->RequestSample->selectOptionListHtml("x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestSample") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RequestSample" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestSample" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestSample" value="<?php echo HtmlEncode($ivf_semenanalysisreport->RequestSample->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_RequestSample" class="form-group ivf_semenanalysisreport_RequestSample">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_RequestSample" data-value-separator="<?php echo $ivf_semenanalysisreport->RequestSample->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestSample" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestSample"<?php echo $ivf_semenanalysisreport->RequestSample->editAttributes() ?>>
		<?php echo $ivf_semenanalysisreport->RequestSample->selectOptionListHtml("x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestSample") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_RequestSample" class="ivf_semenanalysisreport_RequestSample">
<span<?php echo $ivf_semenanalysisreport->RequestSample->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->RequestSample->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RequestSample" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestSample" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestSample" value="<?php echo HtmlEncode($ivf_semenanalysisreport->RequestSample->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RequestSample" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestSample" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestSample" value="<?php echo HtmlEncode($ivf_semenanalysisreport->RequestSample->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RequestSample" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestSample" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestSample" value="<?php echo HtmlEncode($ivf_semenanalysisreport->RequestSample->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RequestSample" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestSample" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestSample" value="<?php echo HtmlEncode($ivf_semenanalysisreport->RequestSample->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->CollectionType->Visible) { // CollectionType ?>
		<td data-name="CollectionType"<?php echo $ivf_semenanalysisreport->CollectionType->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_CollectionType" class="form-group ivf_semenanalysisreport_CollectionType">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_CollectionType" data-value-separator="<?php echo $ivf_semenanalysisreport->CollectionType->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionType" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionType"<?php echo $ivf_semenanalysisreport->CollectionType->editAttributes() ?>>
		<?php echo $ivf_semenanalysisreport->CollectionType->selectOptionListHtml("x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionType") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionType" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionType" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionType" value="<?php echo HtmlEncode($ivf_semenanalysisreport->CollectionType->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_CollectionType" class="form-group ivf_semenanalysisreport_CollectionType">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_CollectionType" data-value-separator="<?php echo $ivf_semenanalysisreport->CollectionType->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionType" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionType"<?php echo $ivf_semenanalysisreport->CollectionType->editAttributes() ?>>
		<?php echo $ivf_semenanalysisreport->CollectionType->selectOptionListHtml("x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionType") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_CollectionType" class="ivf_semenanalysisreport_CollectionType">
<span<?php echo $ivf_semenanalysisreport->CollectionType->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->CollectionType->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionType" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionType" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionType" value="<?php echo HtmlEncode($ivf_semenanalysisreport->CollectionType->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionType" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionType" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionType" value="<?php echo HtmlEncode($ivf_semenanalysisreport->CollectionType->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionType" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionType" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionType" value="<?php echo HtmlEncode($ivf_semenanalysisreport->CollectionType->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionType" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionType" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionType" value="<?php echo HtmlEncode($ivf_semenanalysisreport->CollectionType->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->CollectionMethod->Visible) { // CollectionMethod ?>
		<td data-name="CollectionMethod"<?php echo $ivf_semenanalysisreport->CollectionMethod->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_CollectionMethod" class="form-group ivf_semenanalysisreport_CollectionMethod">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_CollectionMethod" data-value-separator="<?php echo $ivf_semenanalysisreport->CollectionMethod->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionMethod" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionMethod"<?php echo $ivf_semenanalysisreport->CollectionMethod->editAttributes() ?>>
		<?php echo $ivf_semenanalysisreport->CollectionMethod->selectOptionListHtml("x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionMethod") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionMethod" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionMethod" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionMethod" value="<?php echo HtmlEncode($ivf_semenanalysisreport->CollectionMethod->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_CollectionMethod" class="form-group ivf_semenanalysisreport_CollectionMethod">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_CollectionMethod" data-value-separator="<?php echo $ivf_semenanalysisreport->CollectionMethod->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionMethod" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionMethod"<?php echo $ivf_semenanalysisreport->CollectionMethod->editAttributes() ?>>
		<?php echo $ivf_semenanalysisreport->CollectionMethod->selectOptionListHtml("x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionMethod") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_CollectionMethod" class="ivf_semenanalysisreport_CollectionMethod">
<span<?php echo $ivf_semenanalysisreport->CollectionMethod->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->CollectionMethod->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionMethod" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionMethod" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionMethod" value="<?php echo HtmlEncode($ivf_semenanalysisreport->CollectionMethod->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionMethod" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionMethod" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionMethod" value="<?php echo HtmlEncode($ivf_semenanalysisreport->CollectionMethod->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionMethod" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionMethod" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionMethod" value="<?php echo HtmlEncode($ivf_semenanalysisreport->CollectionMethod->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionMethod" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionMethod" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionMethod" value="<?php echo HtmlEncode($ivf_semenanalysisreport->CollectionMethod->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Medicationused->Visible) { // Medicationused ?>
		<td data-name="Medicationused"<?php echo $ivf_semenanalysisreport->Medicationused->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Medicationused" class="form-group ivf_semenanalysisreport_Medicationused">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_Medicationused" data-value-separator="<?php echo $ivf_semenanalysisreport->Medicationused->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medicationused" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medicationused"<?php echo $ivf_semenanalysisreport->Medicationused->editAttributes() ?>>
		<?php echo $ivf_semenanalysisreport->Medicationused->selectOptionListHtml("x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medicationused") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Medicationused" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medicationused" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medicationused" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Medicationused->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Medicationused" class="form-group ivf_semenanalysisreport_Medicationused">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_Medicationused" data-value-separator="<?php echo $ivf_semenanalysisreport->Medicationused->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medicationused" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medicationused"<?php echo $ivf_semenanalysisreport->Medicationused->editAttributes() ?>>
		<?php echo $ivf_semenanalysisreport->Medicationused->selectOptionListHtml("x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medicationused") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Medicationused" class="ivf_semenanalysisreport_Medicationused">
<span<?php echo $ivf_semenanalysisreport->Medicationused->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Medicationused->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Medicationused" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medicationused" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medicationused" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Medicationused->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Medicationused" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medicationused" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medicationused" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Medicationused->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Medicationused" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medicationused" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medicationused" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Medicationused->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Medicationused" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medicationused" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medicationused" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Medicationused->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->DifficultiesinCollection->Visible) { // DifficultiesinCollection ?>
		<td data-name="DifficultiesinCollection"<?php echo $ivf_semenanalysisreport->DifficultiesinCollection->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_DifficultiesinCollection" class="form-group ivf_semenanalysisreport_DifficultiesinCollection">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_DifficultiesinCollection" data-value-separator="<?php echo $ivf_semenanalysisreport->DifficultiesinCollection->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DifficultiesinCollection" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DifficultiesinCollection"<?php echo $ivf_semenanalysisreport->DifficultiesinCollection->editAttributes() ?>>
		<?php echo $ivf_semenanalysisreport->DifficultiesinCollection->selectOptionListHtml("x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DifficultiesinCollection") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DifficultiesinCollection" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DifficultiesinCollection" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DifficultiesinCollection" value="<?php echo HtmlEncode($ivf_semenanalysisreport->DifficultiesinCollection->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_DifficultiesinCollection" class="form-group ivf_semenanalysisreport_DifficultiesinCollection">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_DifficultiesinCollection" data-value-separator="<?php echo $ivf_semenanalysisreport->DifficultiesinCollection->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DifficultiesinCollection" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DifficultiesinCollection"<?php echo $ivf_semenanalysisreport->DifficultiesinCollection->editAttributes() ?>>
		<?php echo $ivf_semenanalysisreport->DifficultiesinCollection->selectOptionListHtml("x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DifficultiesinCollection") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_DifficultiesinCollection" class="ivf_semenanalysisreport_DifficultiesinCollection">
<span<?php echo $ivf_semenanalysisreport->DifficultiesinCollection->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->DifficultiesinCollection->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DifficultiesinCollection" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DifficultiesinCollection" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DifficultiesinCollection" value="<?php echo HtmlEncode($ivf_semenanalysisreport->DifficultiesinCollection->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DifficultiesinCollection" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DifficultiesinCollection" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DifficultiesinCollection" value="<?php echo HtmlEncode($ivf_semenanalysisreport->DifficultiesinCollection->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DifficultiesinCollection" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DifficultiesinCollection" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DifficultiesinCollection" value="<?php echo HtmlEncode($ivf_semenanalysisreport->DifficultiesinCollection->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DifficultiesinCollection" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DifficultiesinCollection" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DifficultiesinCollection" value="<?php echo HtmlEncode($ivf_semenanalysisreport->DifficultiesinCollection->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->pH->Visible) { // pH ?>
		<td data-name="pH"<?php echo $ivf_semenanalysisreport->pH->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_pH" class="form-group ivf_semenanalysisreport_pH">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_pH" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_pH" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_pH" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->pH->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->pH->EditValue ?>"<?php echo $ivf_semenanalysisreport->pH->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_pH" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_pH" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_pH" value="<?php echo HtmlEncode($ivf_semenanalysisreport->pH->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_pH" class="form-group ivf_semenanalysisreport_pH">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_pH" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_pH" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_pH" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->pH->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->pH->EditValue ?>"<?php echo $ivf_semenanalysisreport->pH->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_pH" class="ivf_semenanalysisreport_pH">
<span<?php echo $ivf_semenanalysisreport->pH->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->pH->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_pH" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_pH" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_pH" value="<?php echo HtmlEncode($ivf_semenanalysisreport->pH->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_pH" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_pH" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_pH" value="<?php echo HtmlEncode($ivf_semenanalysisreport->pH->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_pH" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_pH" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_pH" value="<?php echo HtmlEncode($ivf_semenanalysisreport->pH->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_pH" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_pH" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_pH" value="<?php echo HtmlEncode($ivf_semenanalysisreport->pH->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Timeofcollection->Visible) { // Timeofcollection ?>
		<td data-name="Timeofcollection"<?php echo $ivf_semenanalysisreport->Timeofcollection->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Timeofcollection" class="form-group ivf_semenanalysisreport_Timeofcollection">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Timeofcollection" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofcollection" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofcollection" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Timeofcollection->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Timeofcollection->EditValue ?>"<?php echo $ivf_semenanalysisreport->Timeofcollection->editAttributes() ?>>
<?php if (!$ivf_semenanalysisreport->Timeofcollection->ReadOnly && !$ivf_semenanalysisreport->Timeofcollection->Disabled && !isset($ivf_semenanalysisreport->Timeofcollection->EditAttrs["readonly"]) && !isset($ivf_semenanalysisreport->Timeofcollection->EditAttrs["disabled"])) { ?>
<script>ew.createTimePicker("fivf_semenanalysisreportgrid", "x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofcollection", {"timeFormat":"h:i A","step":15});</script><?php } ?>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Timeofcollection" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofcollection" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofcollection" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Timeofcollection->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Timeofcollection" class="form-group ivf_semenanalysisreport_Timeofcollection">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Timeofcollection" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofcollection" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofcollection" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Timeofcollection->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Timeofcollection->EditValue ?>"<?php echo $ivf_semenanalysisreport->Timeofcollection->editAttributes() ?>>
<?php if (!$ivf_semenanalysisreport->Timeofcollection->ReadOnly && !$ivf_semenanalysisreport->Timeofcollection->Disabled && !isset($ivf_semenanalysisreport->Timeofcollection->EditAttrs["readonly"]) && !isset($ivf_semenanalysisreport->Timeofcollection->EditAttrs["disabled"])) { ?>
<script>ew.createTimePicker("fivf_semenanalysisreportgrid", "x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofcollection", {"timeFormat":"h:i A","step":15});</script><?php } ?>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Timeofcollection" class="ivf_semenanalysisreport_Timeofcollection">
<span<?php echo $ivf_semenanalysisreport->Timeofcollection->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Timeofcollection->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Timeofcollection" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofcollection" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofcollection" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Timeofcollection->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Timeofcollection" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofcollection" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofcollection" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Timeofcollection->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Timeofcollection" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofcollection" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofcollection" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Timeofcollection->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Timeofcollection" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofcollection" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofcollection" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Timeofcollection->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Timeofexamination->Visible) { // Timeofexamination ?>
		<td data-name="Timeofexamination"<?php echo $ivf_semenanalysisreport->Timeofexamination->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Timeofexamination" class="form-group ivf_semenanalysisreport_Timeofexamination">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Timeofexamination" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofexamination" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofexamination" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Timeofexamination->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Timeofexamination->EditValue ?>"<?php echo $ivf_semenanalysisreport->Timeofexamination->editAttributes() ?>>
<?php if (!$ivf_semenanalysisreport->Timeofexamination->ReadOnly && !$ivf_semenanalysisreport->Timeofexamination->Disabled && !isset($ivf_semenanalysisreport->Timeofexamination->EditAttrs["readonly"]) && !isset($ivf_semenanalysisreport->Timeofexamination->EditAttrs["disabled"])) { ?>
<script>ew.createTimePicker("fivf_semenanalysisreportgrid", "x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofexamination", {"timeFormat":"h:i A","step":15});</script><?php } ?>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Timeofexamination" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofexamination" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofexamination" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Timeofexamination->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Timeofexamination" class="form-group ivf_semenanalysisreport_Timeofexamination">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Timeofexamination" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofexamination" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofexamination" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Timeofexamination->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Timeofexamination->EditValue ?>"<?php echo $ivf_semenanalysisreport->Timeofexamination->editAttributes() ?>>
<?php if (!$ivf_semenanalysisreport->Timeofexamination->ReadOnly && !$ivf_semenanalysisreport->Timeofexamination->Disabled && !isset($ivf_semenanalysisreport->Timeofexamination->EditAttrs["readonly"]) && !isset($ivf_semenanalysisreport->Timeofexamination->EditAttrs["disabled"])) { ?>
<script>ew.createTimePicker("fivf_semenanalysisreportgrid", "x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofexamination", {"timeFormat":"h:i A","step":15});</script><?php } ?>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Timeofexamination" class="ivf_semenanalysisreport_Timeofexamination">
<span<?php echo $ivf_semenanalysisreport->Timeofexamination->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Timeofexamination->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Timeofexamination" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofexamination" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofexamination" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Timeofexamination->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Timeofexamination" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofexamination" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofexamination" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Timeofexamination->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Timeofexamination" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofexamination" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofexamination" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Timeofexamination->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Timeofexamination" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofexamination" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofexamination" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Timeofexamination->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Volume->Visible) { // Volume ?>
		<td data-name="Volume"<?php echo $ivf_semenanalysisreport->Volume->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Volume" class="form-group ivf_semenanalysisreport_Volume">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Volume" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Volume->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Volume->EditValue ?>"<?php echo $ivf_semenanalysisreport->Volume->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Volume->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Volume" class="form-group ivf_semenanalysisreport_Volume">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Volume" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Volume->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Volume->EditValue ?>"<?php echo $ivf_semenanalysisreport->Volume->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Volume" class="ivf_semenanalysisreport_Volume">
<span<?php echo $ivf_semenanalysisreport->Volume->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Volume->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Volume->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Volume->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Volume->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Volume->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Concentration->Visible) { // Concentration ?>
		<td data-name="Concentration"<?php echo $ivf_semenanalysisreport->Concentration->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Concentration" class="form-group ivf_semenanalysisreport_Concentration">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Concentration" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Concentration->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Concentration->EditValue ?>"<?php echo $ivf_semenanalysisreport->Concentration->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Concentration->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Concentration" class="form-group ivf_semenanalysisreport_Concentration">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Concentration" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Concentration->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Concentration->EditValue ?>"<?php echo $ivf_semenanalysisreport->Concentration->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Concentration" class="ivf_semenanalysisreport_Concentration">
<span<?php echo $ivf_semenanalysisreport->Concentration->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Concentration->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Concentration->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Concentration->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Concentration->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Concentration->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Total->Visible) { // Total ?>
		<td data-name="Total"<?php echo $ivf_semenanalysisreport->Total->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Total" class="form-group ivf_semenanalysisreport_Total">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Total" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Total->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Total->EditValue ?>"<?php echo $ivf_semenanalysisreport->Total->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Total->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Total" class="form-group ivf_semenanalysisreport_Total">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Total" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Total->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Total->EditValue ?>"<?php echo $ivf_semenanalysisreport->Total->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Total" class="ivf_semenanalysisreport_Total">
<span<?php echo $ivf_semenanalysisreport->Total->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Total->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Total->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Total->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Total->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Total->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->ProgressiveMotility->Visible) { // ProgressiveMotility ?>
		<td data-name="ProgressiveMotility"<?php echo $ivf_semenanalysisreport->ProgressiveMotility->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_ProgressiveMotility" class="form-group ivf_semenanalysisreport_ProgressiveMotility">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->ProgressiveMotility->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->ProgressiveMotility->EditValue ?>"<?php echo $ivf_semenanalysisreport->ProgressiveMotility->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility" value="<?php echo HtmlEncode($ivf_semenanalysisreport->ProgressiveMotility->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_ProgressiveMotility" class="form-group ivf_semenanalysisreport_ProgressiveMotility">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->ProgressiveMotility->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->ProgressiveMotility->EditValue ?>"<?php echo $ivf_semenanalysisreport->ProgressiveMotility->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_ProgressiveMotility" class="ivf_semenanalysisreport_ProgressiveMotility">
<span<?php echo $ivf_semenanalysisreport->ProgressiveMotility->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->ProgressiveMotility->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility" value="<?php echo HtmlEncode($ivf_semenanalysisreport->ProgressiveMotility->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility" value="<?php echo HtmlEncode($ivf_semenanalysisreport->ProgressiveMotility->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility" value="<?php echo HtmlEncode($ivf_semenanalysisreport->ProgressiveMotility->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility" value="<?php echo HtmlEncode($ivf_semenanalysisreport->ProgressiveMotility->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->NonProgrssiveMotile->Visible) { // NonProgrssiveMotile ?>
		<td data-name="NonProgrssiveMotile"<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_NonProgrssiveMotile" class="form-group ivf_semenanalysisreport_NonProgrssiveMotile">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->NonProgrssiveMotile->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile->EditValue ?>"<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport->NonProgrssiveMotile->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_NonProgrssiveMotile" class="form-group ivf_semenanalysisreport_NonProgrssiveMotile">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->NonProgrssiveMotile->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile->EditValue ?>"<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_NonProgrssiveMotile" class="ivf_semenanalysisreport_NonProgrssiveMotile">
<span<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport->NonProgrssiveMotile->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport->NonProgrssiveMotile->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport->NonProgrssiveMotile->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport->NonProgrssiveMotile->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Immotile->Visible) { // Immotile ?>
		<td data-name="Immotile"<?php echo $ivf_semenanalysisreport->Immotile->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Immotile" class="form-group ivf_semenanalysisreport_Immotile">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Immotile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Immotile->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Immotile->EditValue ?>"<?php echo $ivf_semenanalysisreport->Immotile->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Immotile->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Immotile" class="form-group ivf_semenanalysisreport_Immotile">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Immotile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Immotile->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Immotile->EditValue ?>"<?php echo $ivf_semenanalysisreport->Immotile->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Immotile" class="ivf_semenanalysisreport_Immotile">
<span<?php echo $ivf_semenanalysisreport->Immotile->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Immotile->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Immotile->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Immotile->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Immotile->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Immotile->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->TotalProgrssiveMotile->Visible) { // TotalProgrssiveMotile ?>
		<td data-name="TotalProgrssiveMotile"<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_TotalProgrssiveMotile" class="form-group ivf_semenanalysisreport_TotalProgrssiveMotile">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->TotalProgrssiveMotile->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile->EditValue ?>"<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TotalProgrssiveMotile->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_TotalProgrssiveMotile" class="form-group ivf_semenanalysisreport_TotalProgrssiveMotile">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->TotalProgrssiveMotile->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile->EditValue ?>"<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_TotalProgrssiveMotile" class="ivf_semenanalysisreport_TotalProgrssiveMotile">
<span<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TotalProgrssiveMotile->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TotalProgrssiveMotile->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TotalProgrssiveMotile->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TotalProgrssiveMotile->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Appearance->Visible) { // Appearance ?>
		<td data-name="Appearance"<?php echo $ivf_semenanalysisreport->Appearance->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Appearance" class="form-group ivf_semenanalysisreport_Appearance">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Appearance" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Appearance" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Appearance" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Appearance->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Appearance->EditValue ?>"<?php echo $ivf_semenanalysisreport->Appearance->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Appearance" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Appearance" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Appearance" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Appearance->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Appearance" class="form-group ivf_semenanalysisreport_Appearance">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Appearance" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Appearance" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Appearance" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Appearance->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Appearance->EditValue ?>"<?php echo $ivf_semenanalysisreport->Appearance->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Appearance" class="ivf_semenanalysisreport_Appearance">
<span<?php echo $ivf_semenanalysisreport->Appearance->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Appearance->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Appearance" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Appearance" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Appearance" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Appearance->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Appearance" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Appearance" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Appearance" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Appearance->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Appearance" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Appearance" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Appearance" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Appearance->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Appearance" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Appearance" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Appearance" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Appearance->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Homogenosity->Visible) { // Homogenosity ?>
		<td data-name="Homogenosity"<?php echo $ivf_semenanalysisreport->Homogenosity->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Homogenosity" class="form-group ivf_semenanalysisreport_Homogenosity">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_Homogenosity" data-value-separator="<?php echo $ivf_semenanalysisreport->Homogenosity->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Homogenosity" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Homogenosity"<?php echo $ivf_semenanalysisreport->Homogenosity->editAttributes() ?>>
		<?php echo $ivf_semenanalysisreport->Homogenosity->selectOptionListHtml("x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Homogenosity") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Homogenosity" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Homogenosity" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Homogenosity" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Homogenosity->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Homogenosity" class="form-group ivf_semenanalysisreport_Homogenosity">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_Homogenosity" data-value-separator="<?php echo $ivf_semenanalysisreport->Homogenosity->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Homogenosity" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Homogenosity"<?php echo $ivf_semenanalysisreport->Homogenosity->editAttributes() ?>>
		<?php echo $ivf_semenanalysisreport->Homogenosity->selectOptionListHtml("x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Homogenosity") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Homogenosity" class="ivf_semenanalysisreport_Homogenosity">
<span<?php echo $ivf_semenanalysisreport->Homogenosity->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Homogenosity->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Homogenosity" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Homogenosity" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Homogenosity" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Homogenosity->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Homogenosity" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Homogenosity" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Homogenosity" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Homogenosity->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Homogenosity" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Homogenosity" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Homogenosity" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Homogenosity->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Homogenosity" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Homogenosity" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Homogenosity" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Homogenosity->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->CompleteSample->Visible) { // CompleteSample ?>
		<td data-name="CompleteSample"<?php echo $ivf_semenanalysisreport->CompleteSample->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_CompleteSample" class="form-group ivf_semenanalysisreport_CompleteSample">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_CompleteSample" data-value-separator="<?php echo $ivf_semenanalysisreport->CompleteSample->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CompleteSample" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CompleteSample"<?php echo $ivf_semenanalysisreport->CompleteSample->editAttributes() ?>>
		<?php echo $ivf_semenanalysisreport->CompleteSample->selectOptionListHtml("x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CompleteSample") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CompleteSample" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CompleteSample" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CompleteSample" value="<?php echo HtmlEncode($ivf_semenanalysisreport->CompleteSample->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_CompleteSample" class="form-group ivf_semenanalysisreport_CompleteSample">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_CompleteSample" data-value-separator="<?php echo $ivf_semenanalysisreport->CompleteSample->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CompleteSample" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CompleteSample"<?php echo $ivf_semenanalysisreport->CompleteSample->editAttributes() ?>>
		<?php echo $ivf_semenanalysisreport->CompleteSample->selectOptionListHtml("x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CompleteSample") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_CompleteSample" class="ivf_semenanalysisreport_CompleteSample">
<span<?php echo $ivf_semenanalysisreport->CompleteSample->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->CompleteSample->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CompleteSample" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CompleteSample" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CompleteSample" value="<?php echo HtmlEncode($ivf_semenanalysisreport->CompleteSample->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CompleteSample" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CompleteSample" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CompleteSample" value="<?php echo HtmlEncode($ivf_semenanalysisreport->CompleteSample->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CompleteSample" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CompleteSample" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CompleteSample" value="<?php echo HtmlEncode($ivf_semenanalysisreport->CompleteSample->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CompleteSample" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CompleteSample" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CompleteSample" value="<?php echo HtmlEncode($ivf_semenanalysisreport->CompleteSample->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Liquefactiontime->Visible) { // Liquefactiontime ?>
		<td data-name="Liquefactiontime"<?php echo $ivf_semenanalysisreport->Liquefactiontime->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Liquefactiontime" class="form-group ivf_semenanalysisreport_Liquefactiontime">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Liquefactiontime" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Liquefactiontime" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Liquefactiontime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Liquefactiontime->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Liquefactiontime->EditValue ?>"<?php echo $ivf_semenanalysisreport->Liquefactiontime->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Liquefactiontime" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Liquefactiontime" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Liquefactiontime" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Liquefactiontime->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Liquefactiontime" class="form-group ivf_semenanalysisreport_Liquefactiontime">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Liquefactiontime" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Liquefactiontime" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Liquefactiontime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Liquefactiontime->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Liquefactiontime->EditValue ?>"<?php echo $ivf_semenanalysisreport->Liquefactiontime->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Liquefactiontime" class="ivf_semenanalysisreport_Liquefactiontime">
<span<?php echo $ivf_semenanalysisreport->Liquefactiontime->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Liquefactiontime->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Liquefactiontime" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Liquefactiontime" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Liquefactiontime" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Liquefactiontime->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Liquefactiontime" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Liquefactiontime" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Liquefactiontime" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Liquefactiontime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Liquefactiontime" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Liquefactiontime" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Liquefactiontime" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Liquefactiontime->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Liquefactiontime" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Liquefactiontime" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Liquefactiontime" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Liquefactiontime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Normal->Visible) { // Normal ?>
		<td data-name="Normal"<?php echo $ivf_semenanalysisreport->Normal->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Normal" class="form-group ivf_semenanalysisreport_Normal">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Normal" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Normal" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Normal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Normal->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Normal->EditValue ?>"<?php echo $ivf_semenanalysisreport->Normal->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Normal" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Normal" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Normal" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Normal->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Normal" class="form-group ivf_semenanalysisreport_Normal">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Normal" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Normal" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Normal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Normal->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Normal->EditValue ?>"<?php echo $ivf_semenanalysisreport->Normal->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Normal" class="ivf_semenanalysisreport_Normal">
<span<?php echo $ivf_semenanalysisreport->Normal->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Normal->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Normal" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Normal" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Normal" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Normal->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Normal" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Normal" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Normal" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Normal->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Normal" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Normal" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Normal" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Normal->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Normal" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Normal" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Normal" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Normal->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Abnormal->Visible) { // Abnormal ?>
		<td data-name="Abnormal"<?php echo $ivf_semenanalysisreport->Abnormal->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Abnormal" class="form-group ivf_semenanalysisreport_Abnormal">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Abnormal" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abnormal" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abnormal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Abnormal->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Abnormal->EditValue ?>"<?php echo $ivf_semenanalysisreport->Abnormal->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Abnormal" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abnormal" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Abnormal->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Abnormal" class="form-group ivf_semenanalysisreport_Abnormal">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Abnormal" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abnormal" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abnormal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Abnormal->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Abnormal->EditValue ?>"<?php echo $ivf_semenanalysisreport->Abnormal->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Abnormal" class="ivf_semenanalysisreport_Abnormal">
<span<?php echo $ivf_semenanalysisreport->Abnormal->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Abnormal->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Abnormal" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abnormal" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Abnormal->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Abnormal" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abnormal" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Abnormal->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Abnormal" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abnormal" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Abnormal->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Abnormal" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abnormal" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Abnormal->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Headdefects->Visible) { // Headdefects ?>
		<td data-name="Headdefects"<?php echo $ivf_semenanalysisreport->Headdefects->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Headdefects" class="form-group ivf_semenanalysisreport_Headdefects">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Headdefects" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Headdefects" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Headdefects" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Headdefects->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Headdefects->EditValue ?>"<?php echo $ivf_semenanalysisreport->Headdefects->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Headdefects" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Headdefects" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Headdefects" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Headdefects->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Headdefects" class="form-group ivf_semenanalysisreport_Headdefects">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Headdefects" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Headdefects" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Headdefects" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Headdefects->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Headdefects->EditValue ?>"<?php echo $ivf_semenanalysisreport->Headdefects->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Headdefects" class="ivf_semenanalysisreport_Headdefects">
<span<?php echo $ivf_semenanalysisreport->Headdefects->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Headdefects->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Headdefects" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Headdefects" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Headdefects" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Headdefects->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Headdefects" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Headdefects" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Headdefects" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Headdefects->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Headdefects" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Headdefects" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Headdefects" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Headdefects->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Headdefects" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Headdefects" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Headdefects" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Headdefects->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->MidpieceDefects->Visible) { // MidpieceDefects ?>
		<td data-name="MidpieceDefects"<?php echo $ivf_semenanalysisreport->MidpieceDefects->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_MidpieceDefects" class="form-group ivf_semenanalysisreport_MidpieceDefects">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_MidpieceDefects" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_MidpieceDefects" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_MidpieceDefects" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->MidpieceDefects->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->MidpieceDefects->EditValue ?>"<?php echo $ivf_semenanalysisreport->MidpieceDefects->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_MidpieceDefects" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_MidpieceDefects" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_MidpieceDefects" value="<?php echo HtmlEncode($ivf_semenanalysisreport->MidpieceDefects->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_MidpieceDefects" class="form-group ivf_semenanalysisreport_MidpieceDefects">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_MidpieceDefects" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_MidpieceDefects" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_MidpieceDefects" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->MidpieceDefects->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->MidpieceDefects->EditValue ?>"<?php echo $ivf_semenanalysisreport->MidpieceDefects->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_MidpieceDefects" class="ivf_semenanalysisreport_MidpieceDefects">
<span<?php echo $ivf_semenanalysisreport->MidpieceDefects->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->MidpieceDefects->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_MidpieceDefects" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_MidpieceDefects" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_MidpieceDefects" value="<?php echo HtmlEncode($ivf_semenanalysisreport->MidpieceDefects->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_MidpieceDefects" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_MidpieceDefects" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_MidpieceDefects" value="<?php echo HtmlEncode($ivf_semenanalysisreport->MidpieceDefects->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_MidpieceDefects" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_MidpieceDefects" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_MidpieceDefects" value="<?php echo HtmlEncode($ivf_semenanalysisreport->MidpieceDefects->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_MidpieceDefects" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_MidpieceDefects" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_MidpieceDefects" value="<?php echo HtmlEncode($ivf_semenanalysisreport->MidpieceDefects->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->TailDefects->Visible) { // TailDefects ?>
		<td data-name="TailDefects"<?php echo $ivf_semenanalysisreport->TailDefects->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_TailDefects" class="form-group ivf_semenanalysisreport_TailDefects">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_TailDefects" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TailDefects" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TailDefects" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->TailDefects->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->TailDefects->EditValue ?>"<?php echo $ivf_semenanalysisreport->TailDefects->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TailDefects" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TailDefects" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TailDefects" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TailDefects->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_TailDefects" class="form-group ivf_semenanalysisreport_TailDefects">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_TailDefects" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TailDefects" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TailDefects" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->TailDefects->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->TailDefects->EditValue ?>"<?php echo $ivf_semenanalysisreport->TailDefects->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_TailDefects" class="ivf_semenanalysisreport_TailDefects">
<span<?php echo $ivf_semenanalysisreport->TailDefects->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->TailDefects->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TailDefects" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TailDefects" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TailDefects" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TailDefects->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TailDefects" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TailDefects" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TailDefects" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TailDefects->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TailDefects" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TailDefects" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TailDefects" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TailDefects->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TailDefects" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TailDefects" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TailDefects" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TailDefects->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->NormalProgMotile->Visible) { // NormalProgMotile ?>
		<td data-name="NormalProgMotile"<?php echo $ivf_semenanalysisreport->NormalProgMotile->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_NormalProgMotile" class="form-group ivf_semenanalysisreport_NormalProgMotile">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_NormalProgMotile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NormalProgMotile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NormalProgMotile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->NormalProgMotile->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->NormalProgMotile->EditValue ?>"<?php echo $ivf_semenanalysisreport->NormalProgMotile->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NormalProgMotile" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NormalProgMotile" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NormalProgMotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport->NormalProgMotile->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_NormalProgMotile" class="form-group ivf_semenanalysisreport_NormalProgMotile">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_NormalProgMotile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NormalProgMotile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NormalProgMotile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->NormalProgMotile->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->NormalProgMotile->EditValue ?>"<?php echo $ivf_semenanalysisreport->NormalProgMotile->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_NormalProgMotile" class="ivf_semenanalysisreport_NormalProgMotile">
<span<?php echo $ivf_semenanalysisreport->NormalProgMotile->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->NormalProgMotile->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NormalProgMotile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NormalProgMotile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NormalProgMotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport->NormalProgMotile->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NormalProgMotile" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NormalProgMotile" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NormalProgMotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport->NormalProgMotile->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NormalProgMotile" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NormalProgMotile" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NormalProgMotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport->NormalProgMotile->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NormalProgMotile" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NormalProgMotile" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NormalProgMotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport->NormalProgMotile->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->ImmatureForms->Visible) { // ImmatureForms ?>
		<td data-name="ImmatureForms"<?php echo $ivf_semenanalysisreport->ImmatureForms->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_ImmatureForms" class="form-group ivf_semenanalysisreport_ImmatureForms">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_ImmatureForms" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ImmatureForms" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ImmatureForms" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->ImmatureForms->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->ImmatureForms->EditValue ?>"<?php echo $ivf_semenanalysisreport->ImmatureForms->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ImmatureForms" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ImmatureForms" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ImmatureForms" value="<?php echo HtmlEncode($ivf_semenanalysisreport->ImmatureForms->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_ImmatureForms" class="form-group ivf_semenanalysisreport_ImmatureForms">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_ImmatureForms" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ImmatureForms" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ImmatureForms" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->ImmatureForms->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->ImmatureForms->EditValue ?>"<?php echo $ivf_semenanalysisreport->ImmatureForms->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_ImmatureForms" class="ivf_semenanalysisreport_ImmatureForms">
<span<?php echo $ivf_semenanalysisreport->ImmatureForms->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->ImmatureForms->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ImmatureForms" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ImmatureForms" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ImmatureForms" value="<?php echo HtmlEncode($ivf_semenanalysisreport->ImmatureForms->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ImmatureForms" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ImmatureForms" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ImmatureForms" value="<?php echo HtmlEncode($ivf_semenanalysisreport->ImmatureForms->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ImmatureForms" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ImmatureForms" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ImmatureForms" value="<?php echo HtmlEncode($ivf_semenanalysisreport->ImmatureForms->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ImmatureForms" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ImmatureForms" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ImmatureForms" value="<?php echo HtmlEncode($ivf_semenanalysisreport->ImmatureForms->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Leucocytes->Visible) { // Leucocytes ?>
		<td data-name="Leucocytes"<?php echo $ivf_semenanalysisreport->Leucocytes->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Leucocytes" class="form-group ivf_semenanalysisreport_Leucocytes">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Leucocytes" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Leucocytes" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Leucocytes" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Leucocytes->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Leucocytes->EditValue ?>"<?php echo $ivf_semenanalysisreport->Leucocytes->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Leucocytes" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Leucocytes" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Leucocytes" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Leucocytes->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Leucocytes" class="form-group ivf_semenanalysisreport_Leucocytes">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Leucocytes" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Leucocytes" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Leucocytes" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Leucocytes->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Leucocytes->EditValue ?>"<?php echo $ivf_semenanalysisreport->Leucocytes->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Leucocytes" class="ivf_semenanalysisreport_Leucocytes">
<span<?php echo $ivf_semenanalysisreport->Leucocytes->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Leucocytes->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Leucocytes" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Leucocytes" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Leucocytes" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Leucocytes->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Leucocytes" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Leucocytes" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Leucocytes" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Leucocytes->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Leucocytes" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Leucocytes" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Leucocytes" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Leucocytes->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Leucocytes" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Leucocytes" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Leucocytes" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Leucocytes->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Agglutination->Visible) { // Agglutination ?>
		<td data-name="Agglutination"<?php echo $ivf_semenanalysisreport->Agglutination->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Agglutination" class="form-group ivf_semenanalysisreport_Agglutination">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Agglutination" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Agglutination" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Agglutination" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Agglutination->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Agglutination->EditValue ?>"<?php echo $ivf_semenanalysisreport->Agglutination->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Agglutination" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Agglutination" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Agglutination" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Agglutination->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Agglutination" class="form-group ivf_semenanalysisreport_Agglutination">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Agglutination" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Agglutination" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Agglutination" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Agglutination->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Agglutination->EditValue ?>"<?php echo $ivf_semenanalysisreport->Agglutination->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Agglutination" class="ivf_semenanalysisreport_Agglutination">
<span<?php echo $ivf_semenanalysisreport->Agglutination->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Agglutination->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Agglutination" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Agglutination" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Agglutination" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Agglutination->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Agglutination" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Agglutination" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Agglutination" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Agglutination->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Agglutination" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Agglutination" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Agglutination" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Agglutination->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Agglutination" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Agglutination" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Agglutination" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Agglutination->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Debris->Visible) { // Debris ?>
		<td data-name="Debris"<?php echo $ivf_semenanalysisreport->Debris->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Debris" class="form-group ivf_semenanalysisreport_Debris">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Debris" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Debris" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Debris" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Debris->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Debris->EditValue ?>"<?php echo $ivf_semenanalysisreport->Debris->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Debris" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Debris" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Debris" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Debris->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Debris" class="form-group ivf_semenanalysisreport_Debris">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Debris" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Debris" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Debris" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Debris->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Debris->EditValue ?>"<?php echo $ivf_semenanalysisreport->Debris->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Debris" class="ivf_semenanalysisreport_Debris">
<span<?php echo $ivf_semenanalysisreport->Debris->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Debris->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Debris" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Debris" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Debris" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Debris->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Debris" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Debris" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Debris" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Debris->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Debris" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Debris" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Debris" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Debris->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Debris" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Debris" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Debris" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Debris->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Diagnosis->Visible) { // Diagnosis ?>
		<td data-name="Diagnosis"<?php echo $ivf_semenanalysisreport->Diagnosis->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Diagnosis" class="form-group ivf_semenanalysisreport_Diagnosis">
<textarea data-table="ivf_semenanalysisreport" data-field="x_Diagnosis" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Diagnosis" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Diagnosis" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Diagnosis->getPlaceHolder()) ?>"<?php echo $ivf_semenanalysisreport->Diagnosis->editAttributes() ?>><?php echo $ivf_semenanalysisreport->Diagnosis->EditValue ?></textarea>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Diagnosis" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Diagnosis" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Diagnosis" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Diagnosis->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Diagnosis" class="form-group ivf_semenanalysisreport_Diagnosis">
<textarea data-table="ivf_semenanalysisreport" data-field="x_Diagnosis" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Diagnosis" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Diagnosis" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Diagnosis->getPlaceHolder()) ?>"<?php echo $ivf_semenanalysisreport->Diagnosis->editAttributes() ?>><?php echo $ivf_semenanalysisreport->Diagnosis->EditValue ?></textarea>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Diagnosis" class="ivf_semenanalysisreport_Diagnosis">
<span<?php echo $ivf_semenanalysisreport->Diagnosis->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Diagnosis->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Diagnosis" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Diagnosis" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Diagnosis" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Diagnosis->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Diagnosis" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Diagnosis" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Diagnosis" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Diagnosis->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Diagnosis" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Diagnosis" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Diagnosis" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Diagnosis->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Diagnosis" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Diagnosis" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Diagnosis" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Diagnosis->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Observations->Visible) { // Observations ?>
		<td data-name="Observations"<?php echo $ivf_semenanalysisreport->Observations->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Observations" class="form-group ivf_semenanalysisreport_Observations">
<textarea data-table="ivf_semenanalysisreport" data-field="x_Observations" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Observations" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Observations" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Observations->getPlaceHolder()) ?>"<?php echo $ivf_semenanalysisreport->Observations->editAttributes() ?>><?php echo $ivf_semenanalysisreport->Observations->EditValue ?></textarea>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Observations" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Observations" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Observations" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Observations->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Observations" class="form-group ivf_semenanalysisreport_Observations">
<textarea data-table="ivf_semenanalysisreport" data-field="x_Observations" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Observations" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Observations" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Observations->getPlaceHolder()) ?>"<?php echo $ivf_semenanalysisreport->Observations->editAttributes() ?>><?php echo $ivf_semenanalysisreport->Observations->EditValue ?></textarea>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Observations" class="ivf_semenanalysisreport_Observations">
<span<?php echo $ivf_semenanalysisreport->Observations->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Observations->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Observations" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Observations" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Observations" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Observations->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Observations" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Observations" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Observations" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Observations->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Observations" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Observations" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Observations" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Observations->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Observations" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Observations" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Observations" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Observations->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Signature->Visible) { // Signature ?>
		<td data-name="Signature"<?php echo $ivf_semenanalysisreport->Signature->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Signature" class="form-group ivf_semenanalysisreport_Signature">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Signature" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Signature" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Signature" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Signature->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Signature->EditValue ?>"<?php echo $ivf_semenanalysisreport->Signature->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Signature" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Signature" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Signature" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Signature->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Signature" class="form-group ivf_semenanalysisreport_Signature">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Signature" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Signature" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Signature" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Signature->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Signature->EditValue ?>"<?php echo $ivf_semenanalysisreport->Signature->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Signature" class="ivf_semenanalysisreport_Signature">
<span<?php echo $ivf_semenanalysisreport->Signature->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Signature->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Signature" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Signature" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Signature" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Signature->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Signature" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Signature" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Signature" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Signature->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Signature" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Signature" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Signature" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Signature->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Signature" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Signature" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Signature" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Signature->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->SemenOrgin->Visible) { // SemenOrgin ?>
		<td data-name="SemenOrgin"<?php echo $ivf_semenanalysisreport->SemenOrgin->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_SemenOrgin" class="form-group ivf_semenanalysisreport_SemenOrgin">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_SemenOrgin" data-value-separator="<?php echo $ivf_semenanalysisreport->SemenOrgin->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SemenOrgin" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SemenOrgin"<?php echo $ivf_semenanalysisreport->SemenOrgin->editAttributes() ?>>
		<?php echo $ivf_semenanalysisreport->SemenOrgin->selectOptionListHtml("x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SemenOrgin") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_SemenOrgin" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SemenOrgin" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SemenOrgin" value="<?php echo HtmlEncode($ivf_semenanalysisreport->SemenOrgin->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_SemenOrgin" class="form-group ivf_semenanalysisreport_SemenOrgin">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_SemenOrgin" data-value-separator="<?php echo $ivf_semenanalysisreport->SemenOrgin->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SemenOrgin" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SemenOrgin"<?php echo $ivf_semenanalysisreport->SemenOrgin->editAttributes() ?>>
		<?php echo $ivf_semenanalysisreport->SemenOrgin->selectOptionListHtml("x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SemenOrgin") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_SemenOrgin" class="ivf_semenanalysisreport_SemenOrgin">
<span<?php echo $ivf_semenanalysisreport->SemenOrgin->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->SemenOrgin->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_SemenOrgin" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SemenOrgin" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SemenOrgin" value="<?php echo HtmlEncode($ivf_semenanalysisreport->SemenOrgin->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_SemenOrgin" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SemenOrgin" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SemenOrgin" value="<?php echo HtmlEncode($ivf_semenanalysisreport->SemenOrgin->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_SemenOrgin" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SemenOrgin" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SemenOrgin" value="<?php echo HtmlEncode($ivf_semenanalysisreport->SemenOrgin->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_SemenOrgin" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SemenOrgin" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SemenOrgin" value="<?php echo HtmlEncode($ivf_semenanalysisreport->SemenOrgin->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Donor->Visible) { // Donor ?>
		<td data-name="Donor"<?php echo $ivf_semenanalysisreport->Donor->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Donor" class="form-group ivf_semenanalysisreport_Donor">
<?php $ivf_semenanalysisreport->Donor->EditAttrs["onchange"] = "ew.autoFill(this);" . @$ivf_semenanalysisreport->Donor->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor"><?php echo strval($ivf_semenanalysisreport->Donor->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($ivf_semenanalysisreport->Donor->ViewValue) : $ivf_semenanalysisreport->Donor->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf_semenanalysisreport->Donor->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($ivf_semenanalysisreport->Donor->ReadOnly || $ivf_semenanalysisreport->Donor->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf_semenanalysisreport->Donor->Lookup->getParamTag("p_x" . $ivf_semenanalysisreport_grid->RowIndex . "_Donor") ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Donor" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf_semenanalysisreport->Donor->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor" value="<?php echo $ivf_semenanalysisreport->Donor->CurrentValue ?>"<?php echo $ivf_semenanalysisreport->Donor->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Donor" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Donor->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Donor" class="form-group ivf_semenanalysisreport_Donor">
<?php $ivf_semenanalysisreport->Donor->EditAttrs["onchange"] = "ew.autoFill(this);" . @$ivf_semenanalysisreport->Donor->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor"><?php echo strval($ivf_semenanalysisreport->Donor->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($ivf_semenanalysisreport->Donor->ViewValue) : $ivf_semenanalysisreport->Donor->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf_semenanalysisreport->Donor->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($ivf_semenanalysisreport->Donor->ReadOnly || $ivf_semenanalysisreport->Donor->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf_semenanalysisreport->Donor->Lookup->getParamTag("p_x" . $ivf_semenanalysisreport_grid->RowIndex . "_Donor") ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Donor" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf_semenanalysisreport->Donor->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor" value="<?php echo $ivf_semenanalysisreport->Donor->CurrentValue ?>"<?php echo $ivf_semenanalysisreport->Donor->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Donor" class="ivf_semenanalysisreport_Donor">
<span<?php echo $ivf_semenanalysisreport->Donor->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Donor->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Donor" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Donor->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Donor" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Donor->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Donor" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Donor->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Donor" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Donor->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->DonorBloodgroup->Visible) { // DonorBloodgroup ?>
		<td data-name="DonorBloodgroup"<?php echo $ivf_semenanalysisreport->DonorBloodgroup->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_DonorBloodgroup" class="form-group ivf_semenanalysisreport_DonorBloodgroup">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_DonorBloodgroup" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DonorBloodgroup" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DonorBloodgroup" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->DonorBloodgroup->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->DonorBloodgroup->EditValue ?>"<?php echo $ivf_semenanalysisreport->DonorBloodgroup->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DonorBloodgroup" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DonorBloodgroup" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DonorBloodgroup" value="<?php echo HtmlEncode($ivf_semenanalysisreport->DonorBloodgroup->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_DonorBloodgroup" class="form-group ivf_semenanalysisreport_DonorBloodgroup">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_DonorBloodgroup" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DonorBloodgroup" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DonorBloodgroup" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->DonorBloodgroup->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->DonorBloodgroup->EditValue ?>"<?php echo $ivf_semenanalysisreport->DonorBloodgroup->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_DonorBloodgroup" class="ivf_semenanalysisreport_DonorBloodgroup">
<span<?php echo $ivf_semenanalysisreport->DonorBloodgroup->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->DonorBloodgroup->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DonorBloodgroup" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DonorBloodgroup" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DonorBloodgroup" value="<?php echo HtmlEncode($ivf_semenanalysisreport->DonorBloodgroup->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DonorBloodgroup" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DonorBloodgroup" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DonorBloodgroup" value="<?php echo HtmlEncode($ivf_semenanalysisreport->DonorBloodgroup->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DonorBloodgroup" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DonorBloodgroup" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DonorBloodgroup" value="<?php echo HtmlEncode($ivf_semenanalysisreport->DonorBloodgroup->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DonorBloodgroup" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DonorBloodgroup" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DonorBloodgroup" value="<?php echo HtmlEncode($ivf_semenanalysisreport->DonorBloodgroup->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Tank->Visible) { // Tank ?>
		<td data-name="Tank"<?php echo $ivf_semenanalysisreport->Tank->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Tank" class="form-group ivf_semenanalysisreport_Tank">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Tank" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Tank" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Tank" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Tank->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Tank->EditValue ?>"<?php echo $ivf_semenanalysisreport->Tank->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Tank" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Tank" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Tank" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Tank->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Tank" class="form-group ivf_semenanalysisreport_Tank">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Tank" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Tank" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Tank" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Tank->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Tank->EditValue ?>"<?php echo $ivf_semenanalysisreport->Tank->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Tank" class="ivf_semenanalysisreport_Tank">
<span<?php echo $ivf_semenanalysisreport->Tank->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Tank->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Tank" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Tank" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Tank" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Tank->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Tank" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Tank" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Tank" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Tank->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Tank" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Tank" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Tank" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Tank->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Tank" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Tank" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Tank" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Tank->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Location->Visible) { // Location ?>
		<td data-name="Location"<?php echo $ivf_semenanalysisreport->Location->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Location" class="form-group ivf_semenanalysisreport_Location">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Location" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Location" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Location" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Location->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Location->EditValue ?>"<?php echo $ivf_semenanalysisreport->Location->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Location" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Location" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Location" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Location->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Location" class="form-group ivf_semenanalysisreport_Location">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Location" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Location" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Location" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Location->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Location->EditValue ?>"<?php echo $ivf_semenanalysisreport->Location->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Location" class="ivf_semenanalysisreport_Location">
<span<?php echo $ivf_semenanalysisreport->Location->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Location->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Location" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Location" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Location" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Location->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Location" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Location" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Location" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Location->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Location" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Location" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Location" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Location->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Location" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Location" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Location" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Location->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Volume1->Visible) { // Volume1 ?>
		<td data-name="Volume1"<?php echo $ivf_semenanalysisreport->Volume1->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Volume1" class="form-group ivf_semenanalysisreport_Volume1">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Volume1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Volume1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Volume1->EditValue ?>"<?php echo $ivf_semenanalysisreport->Volume1->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume1" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume1" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Volume1->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Volume1" class="form-group ivf_semenanalysisreport_Volume1">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Volume1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Volume1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Volume1->EditValue ?>"<?php echo $ivf_semenanalysisreport->Volume1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Volume1" class="ivf_semenanalysisreport_Volume1">
<span<?php echo $ivf_semenanalysisreport->Volume1->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Volume1->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Volume1->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume1" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume1" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Volume1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume1" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume1" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Volume1->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume1" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume1" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Volume1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Concentration1->Visible) { // Concentration1 ?>
		<td data-name="Concentration1"<?php echo $ivf_semenanalysisreport->Concentration1->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Concentration1" class="form-group ivf_semenanalysisreport_Concentration1">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Concentration1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Concentration1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Concentration1->EditValue ?>"<?php echo $ivf_semenanalysisreport->Concentration1->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration1" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration1" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Concentration1->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Concentration1" class="form-group ivf_semenanalysisreport_Concentration1">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Concentration1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Concentration1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Concentration1->EditValue ?>"<?php echo $ivf_semenanalysisreport->Concentration1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Concentration1" class="ivf_semenanalysisreport_Concentration1">
<span<?php echo $ivf_semenanalysisreport->Concentration1->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Concentration1->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Concentration1->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration1" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration1" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Concentration1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration1" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration1" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Concentration1->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration1" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration1" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Concentration1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Total1->Visible) { // Total1 ?>
		<td data-name="Total1"<?php echo $ivf_semenanalysisreport->Total1->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Total1" class="form-group ivf_semenanalysisreport_Total1">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Total1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Total1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Total1->EditValue ?>"<?php echo $ivf_semenanalysisreport->Total1->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total1" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total1" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Total1->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Total1" class="form-group ivf_semenanalysisreport_Total1">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Total1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Total1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Total1->EditValue ?>"<?php echo $ivf_semenanalysisreport->Total1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Total1" class="ivf_semenanalysisreport_Total1">
<span<?php echo $ivf_semenanalysisreport->Total1->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Total1->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Total1->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total1" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total1" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Total1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total1" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total1" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Total1->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total1" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total1" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Total1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->ProgressiveMotility1->Visible) { // ProgressiveMotility1 ?>
		<td data-name="ProgressiveMotility1"<?php echo $ivf_semenanalysisreport->ProgressiveMotility1->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_ProgressiveMotility1" class="form-group ivf_semenanalysisreport_ProgressiveMotility1">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->ProgressiveMotility1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->ProgressiveMotility1->EditValue ?>"<?php echo $ivf_semenanalysisreport->ProgressiveMotility1->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility1" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility1" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->ProgressiveMotility1->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_ProgressiveMotility1" class="form-group ivf_semenanalysisreport_ProgressiveMotility1">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->ProgressiveMotility1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->ProgressiveMotility1->EditValue ?>"<?php echo $ivf_semenanalysisreport->ProgressiveMotility1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_ProgressiveMotility1" class="ivf_semenanalysisreport_ProgressiveMotility1">
<span<?php echo $ivf_semenanalysisreport->ProgressiveMotility1->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->ProgressiveMotility1->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->ProgressiveMotility1->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility1" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility1" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->ProgressiveMotility1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility1" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility1" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->ProgressiveMotility1->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility1" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility1" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->ProgressiveMotility1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->NonProgrssiveMotile1->Visible) { // NonProgrssiveMotile1 ?>
		<td data-name="NonProgrssiveMotile1"<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile1->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_NonProgrssiveMotile1" class="form-group ivf_semenanalysisreport_NonProgrssiveMotile1">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->NonProgrssiveMotile1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile1->EditValue ?>"<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile1->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile1" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile1" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->NonProgrssiveMotile1->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_NonProgrssiveMotile1" class="form-group ivf_semenanalysisreport_NonProgrssiveMotile1">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->NonProgrssiveMotile1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile1->EditValue ?>"<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_NonProgrssiveMotile1" class="ivf_semenanalysisreport_NonProgrssiveMotile1">
<span<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile1->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile1->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->NonProgrssiveMotile1->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile1" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile1" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->NonProgrssiveMotile1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile1" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile1" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->NonProgrssiveMotile1->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile1" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile1" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->NonProgrssiveMotile1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Immotile1->Visible) { // Immotile1 ?>
		<td data-name="Immotile1"<?php echo $ivf_semenanalysisreport->Immotile1->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Immotile1" class="form-group ivf_semenanalysisreport_Immotile1">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Immotile1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Immotile1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Immotile1->EditValue ?>"<?php echo $ivf_semenanalysisreport->Immotile1->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile1" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile1" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Immotile1->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Immotile1" class="form-group ivf_semenanalysisreport_Immotile1">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Immotile1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Immotile1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Immotile1->EditValue ?>"<?php echo $ivf_semenanalysisreport->Immotile1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Immotile1" class="ivf_semenanalysisreport_Immotile1">
<span<?php echo $ivf_semenanalysisreport->Immotile1->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Immotile1->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Immotile1->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile1" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile1" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Immotile1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile1" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile1" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Immotile1->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile1" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile1" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Immotile1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->TotalProgrssiveMotile1->Visible) { // TotalProgrssiveMotile1 ?>
		<td data-name="TotalProgrssiveMotile1"<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile1->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_TotalProgrssiveMotile1" class="form-group ivf_semenanalysisreport_TotalProgrssiveMotile1">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->TotalProgrssiveMotile1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile1->EditValue ?>"<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile1->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile1" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile1" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TotalProgrssiveMotile1->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_TotalProgrssiveMotile1" class="form-group ivf_semenanalysisreport_TotalProgrssiveMotile1">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->TotalProgrssiveMotile1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile1->EditValue ?>"<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_TotalProgrssiveMotile1" class="ivf_semenanalysisreport_TotalProgrssiveMotile1">
<span<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile1->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile1->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TotalProgrssiveMotile1->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile1" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile1" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TotalProgrssiveMotile1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile1" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile1" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TotalProgrssiveMotile1->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile1" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile1" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TotalProgrssiveMotile1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo"<?php echo $ivf_semenanalysisreport->TidNo->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($ivf_semenanalysisreport->TidNo->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_TidNo" class="form-group ivf_semenanalysisreport_TidNo">
<span<?php echo $ivf_semenanalysisreport->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->TidNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TidNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_TidNo" class="form-group ivf_semenanalysisreport_TidNo">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_TidNo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->TidNo->EditValue ?>"<?php echo $ivf_semenanalysisreport->TidNo->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TidNo" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TidNo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($ivf_semenanalysisreport->TidNo->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_TidNo" class="form-group ivf_semenanalysisreport_TidNo">
<span<?php echo $ivf_semenanalysisreport->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->TidNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TidNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_TidNo" class="form-group ivf_semenanalysisreport_TidNo">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_TidNo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->TidNo->EditValue ?>"<?php echo $ivf_semenanalysisreport->TidNo->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_TidNo" class="ivf_semenanalysisreport_TidNo">
<span<?php echo $ivf_semenanalysisreport->TidNo->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->TidNo->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TidNo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TidNo->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TidNo" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TidNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TidNo" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TidNo->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TidNo" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TidNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Color->Visible) { // Color ?>
		<td data-name="Color"<?php echo $ivf_semenanalysisreport->Color->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Color" class="form-group ivf_semenanalysisreport_Color">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Color" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Color" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Color" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Color->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Color->EditValue ?>"<?php echo $ivf_semenanalysisreport->Color->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Color" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Color" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Color" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Color->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Color" class="form-group ivf_semenanalysisreport_Color">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Color" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Color" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Color" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Color->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Color->EditValue ?>"<?php echo $ivf_semenanalysisreport->Color->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Color" class="ivf_semenanalysisreport_Color">
<span<?php echo $ivf_semenanalysisreport->Color->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Color->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Color" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Color" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Color" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Color->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Color" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Color" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Color" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Color->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Color" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Color" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Color" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Color->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Color" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Color" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Color" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Color->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->DoneBy->Visible) { // DoneBy ?>
		<td data-name="DoneBy"<?php echo $ivf_semenanalysisreport->DoneBy->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_DoneBy" class="form-group ivf_semenanalysisreport_DoneBy">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_DoneBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DoneBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DoneBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->DoneBy->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->DoneBy->EditValue ?>"<?php echo $ivf_semenanalysisreport->DoneBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DoneBy" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DoneBy" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DoneBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport->DoneBy->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_DoneBy" class="form-group ivf_semenanalysisreport_DoneBy">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_DoneBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DoneBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DoneBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->DoneBy->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->DoneBy->EditValue ?>"<?php echo $ivf_semenanalysisreport->DoneBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_DoneBy" class="ivf_semenanalysisreport_DoneBy">
<span<?php echo $ivf_semenanalysisreport->DoneBy->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->DoneBy->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DoneBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DoneBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DoneBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport->DoneBy->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DoneBy" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DoneBy" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DoneBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport->DoneBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DoneBy" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DoneBy" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DoneBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport->DoneBy->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DoneBy" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DoneBy" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DoneBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport->DoneBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Method->Visible) { // Method ?>
		<td data-name="Method"<?php echo $ivf_semenanalysisreport->Method->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Method" class="form-group ivf_semenanalysisreport_Method">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Method" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Method" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Method->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Method->EditValue ?>"<?php echo $ivf_semenanalysisreport->Method->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Method" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Method" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Method->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Method" class="form-group ivf_semenanalysisreport_Method">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Method" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Method" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Method->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Method->EditValue ?>"<?php echo $ivf_semenanalysisreport->Method->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Method" class="ivf_semenanalysisreport_Method">
<span<?php echo $ivf_semenanalysisreport->Method->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Method->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Method" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Method" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Method->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Method" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Method" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Method->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Method" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Method" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Method->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Method" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Method" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Method->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Abstinence->Visible) { // Abstinence ?>
		<td data-name="Abstinence"<?php echo $ivf_semenanalysisreport->Abstinence->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Abstinence" class="form-group ivf_semenanalysisreport_Abstinence">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Abstinence" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abstinence" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abstinence" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Abstinence->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Abstinence->EditValue ?>"<?php echo $ivf_semenanalysisreport->Abstinence->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Abstinence" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abstinence" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abstinence" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Abstinence->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Abstinence" class="form-group ivf_semenanalysisreport_Abstinence">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Abstinence" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abstinence" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abstinence" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Abstinence->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Abstinence->EditValue ?>"<?php echo $ivf_semenanalysisreport->Abstinence->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Abstinence" class="ivf_semenanalysisreport_Abstinence">
<span<?php echo $ivf_semenanalysisreport->Abstinence->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Abstinence->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Abstinence" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abstinence" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abstinence" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Abstinence->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Abstinence" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abstinence" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abstinence" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Abstinence->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Abstinence" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abstinence" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abstinence" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Abstinence->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Abstinence" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abstinence" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abstinence" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Abstinence->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->ProcessedBy->Visible) { // ProcessedBy ?>
		<td data-name="ProcessedBy"<?php echo $ivf_semenanalysisreport->ProcessedBy->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_ProcessedBy" class="form-group ivf_semenanalysisreport_ProcessedBy">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_ProcessedBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProcessedBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProcessedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->ProcessedBy->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->ProcessedBy->EditValue ?>"<?php echo $ivf_semenanalysisreport->ProcessedBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProcessedBy" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProcessedBy" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProcessedBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport->ProcessedBy->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_ProcessedBy" class="form-group ivf_semenanalysisreport_ProcessedBy">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_ProcessedBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProcessedBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProcessedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->ProcessedBy->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->ProcessedBy->EditValue ?>"<?php echo $ivf_semenanalysisreport->ProcessedBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_ProcessedBy" class="ivf_semenanalysisreport_ProcessedBy">
<span<?php echo $ivf_semenanalysisreport->ProcessedBy->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->ProcessedBy->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProcessedBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProcessedBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProcessedBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport->ProcessedBy->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProcessedBy" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProcessedBy" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProcessedBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport->ProcessedBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProcessedBy" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProcessedBy" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProcessedBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport->ProcessedBy->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProcessedBy" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProcessedBy" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProcessedBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport->ProcessedBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->InseminationTime->Visible) { // InseminationTime ?>
		<td data-name="InseminationTime"<?php echo $ivf_semenanalysisreport->InseminationTime->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_InseminationTime" class="form-group ivf_semenanalysisreport_InseminationTime">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_InseminationTime" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationTime" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->InseminationTime->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->InseminationTime->EditValue ?>"<?php echo $ivf_semenanalysisreport->InseminationTime->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_InseminationTime" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationTime" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationTime" value="<?php echo HtmlEncode($ivf_semenanalysisreport->InseminationTime->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_InseminationTime" class="form-group ivf_semenanalysisreport_InseminationTime">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_InseminationTime" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationTime" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->InseminationTime->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->InseminationTime->EditValue ?>"<?php echo $ivf_semenanalysisreport->InseminationTime->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_InseminationTime" class="ivf_semenanalysisreport_InseminationTime">
<span<?php echo $ivf_semenanalysisreport->InseminationTime->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->InseminationTime->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_InseminationTime" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationTime" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationTime" value="<?php echo HtmlEncode($ivf_semenanalysisreport->InseminationTime->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_InseminationTime" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationTime" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationTime" value="<?php echo HtmlEncode($ivf_semenanalysisreport->InseminationTime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_InseminationTime" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationTime" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationTime" value="<?php echo HtmlEncode($ivf_semenanalysisreport->InseminationTime->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_InseminationTime" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationTime" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationTime" value="<?php echo HtmlEncode($ivf_semenanalysisreport->InseminationTime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->InseminationBy->Visible) { // InseminationBy ?>
		<td data-name="InseminationBy"<?php echo $ivf_semenanalysisreport->InseminationBy->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_InseminationBy" class="form-group ivf_semenanalysisreport_InseminationBy">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_InseminationBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->InseminationBy->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->InseminationBy->EditValue ?>"<?php echo $ivf_semenanalysisreport->InseminationBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_InseminationBy" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationBy" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport->InseminationBy->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_InseminationBy" class="form-group ivf_semenanalysisreport_InseminationBy">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_InseminationBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->InseminationBy->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->InseminationBy->EditValue ?>"<?php echo $ivf_semenanalysisreport->InseminationBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_InseminationBy" class="ivf_semenanalysisreport_InseminationBy">
<span<?php echo $ivf_semenanalysisreport->InseminationBy->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->InseminationBy->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_InseminationBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport->InseminationBy->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_InseminationBy" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationBy" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport->InseminationBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_InseminationBy" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationBy" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport->InseminationBy->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_InseminationBy" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationBy" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport->InseminationBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Big->Visible) { // Big ?>
		<td data-name="Big"<?php echo $ivf_semenanalysisreport->Big->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Big" class="form-group ivf_semenanalysisreport_Big">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Big" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Big" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Big" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Big->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Big->EditValue ?>"<?php echo $ivf_semenanalysisreport->Big->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Big" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Big" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Big" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Big->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Big" class="form-group ivf_semenanalysisreport_Big">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Big" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Big" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Big" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Big->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Big->EditValue ?>"<?php echo $ivf_semenanalysisreport->Big->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Big" class="ivf_semenanalysisreport_Big">
<span<?php echo $ivf_semenanalysisreport->Big->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Big->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Big" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Big" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Big" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Big->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Big" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Big" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Big" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Big->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Big" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Big" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Big" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Big->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Big" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Big" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Big" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Big->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Medium->Visible) { // Medium ?>
		<td data-name="Medium"<?php echo $ivf_semenanalysisreport->Medium->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Medium" class="form-group ivf_semenanalysisreport_Medium">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Medium" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medium" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medium" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Medium->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Medium->EditValue ?>"<?php echo $ivf_semenanalysisreport->Medium->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Medium" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medium" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medium" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Medium->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Medium" class="form-group ivf_semenanalysisreport_Medium">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Medium" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medium" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medium" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Medium->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Medium->EditValue ?>"<?php echo $ivf_semenanalysisreport->Medium->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Medium" class="ivf_semenanalysisreport_Medium">
<span<?php echo $ivf_semenanalysisreport->Medium->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Medium->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Medium" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medium" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medium" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Medium->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Medium" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medium" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medium" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Medium->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Medium" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medium" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medium" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Medium->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Medium" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medium" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medium" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Medium->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Small->Visible) { // Small ?>
		<td data-name="Small"<?php echo $ivf_semenanalysisreport->Small->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Small" class="form-group ivf_semenanalysisreport_Small">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Small" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Small" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Small" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Small->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Small->EditValue ?>"<?php echo $ivf_semenanalysisreport->Small->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Small" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Small" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Small" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Small->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Small" class="form-group ivf_semenanalysisreport_Small">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Small" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Small" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Small" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Small->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Small->EditValue ?>"<?php echo $ivf_semenanalysisreport->Small->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Small" class="ivf_semenanalysisreport_Small">
<span<?php echo $ivf_semenanalysisreport->Small->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Small->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Small" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Small" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Small" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Small->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Small" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Small" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Small" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Small->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Small" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Small" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Small" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Small->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Small" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Small" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Small" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Small->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->NoHalo->Visible) { // NoHalo ?>
		<td data-name="NoHalo"<?php echo $ivf_semenanalysisreport->NoHalo->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_NoHalo" class="form-group ivf_semenanalysisreport_NoHalo">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_NoHalo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NoHalo" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NoHalo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->NoHalo->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->NoHalo->EditValue ?>"<?php echo $ivf_semenanalysisreport->NoHalo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NoHalo" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NoHalo" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NoHalo" value="<?php echo HtmlEncode($ivf_semenanalysisreport->NoHalo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_NoHalo" class="form-group ivf_semenanalysisreport_NoHalo">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_NoHalo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NoHalo" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NoHalo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->NoHalo->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->NoHalo->EditValue ?>"<?php echo $ivf_semenanalysisreport->NoHalo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_NoHalo" class="ivf_semenanalysisreport_NoHalo">
<span<?php echo $ivf_semenanalysisreport->NoHalo->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->NoHalo->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NoHalo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NoHalo" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NoHalo" value="<?php echo HtmlEncode($ivf_semenanalysisreport->NoHalo->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NoHalo" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NoHalo" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NoHalo" value="<?php echo HtmlEncode($ivf_semenanalysisreport->NoHalo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NoHalo" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NoHalo" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NoHalo" value="<?php echo HtmlEncode($ivf_semenanalysisreport->NoHalo->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NoHalo" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NoHalo" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NoHalo" value="<?php echo HtmlEncode($ivf_semenanalysisreport->NoHalo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Fragmented->Visible) { // Fragmented ?>
		<td data-name="Fragmented"<?php echo $ivf_semenanalysisreport->Fragmented->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Fragmented" class="form-group ivf_semenanalysisreport_Fragmented">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Fragmented" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Fragmented" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Fragmented" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Fragmented->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Fragmented->EditValue ?>"<?php echo $ivf_semenanalysisreport->Fragmented->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Fragmented" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Fragmented" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Fragmented" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Fragmented->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Fragmented" class="form-group ivf_semenanalysisreport_Fragmented">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Fragmented" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Fragmented" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Fragmented" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Fragmented->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Fragmented->EditValue ?>"<?php echo $ivf_semenanalysisreport->Fragmented->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Fragmented" class="ivf_semenanalysisreport_Fragmented">
<span<?php echo $ivf_semenanalysisreport->Fragmented->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Fragmented->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Fragmented" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Fragmented" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Fragmented" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Fragmented->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Fragmented" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Fragmented" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Fragmented" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Fragmented->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Fragmented" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Fragmented" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Fragmented" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Fragmented->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Fragmented" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Fragmented" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Fragmented" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Fragmented->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->NonFragmented->Visible) { // NonFragmented ?>
		<td data-name="NonFragmented"<?php echo $ivf_semenanalysisreport->NonFragmented->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_NonFragmented" class="form-group ivf_semenanalysisreport_NonFragmented">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_NonFragmented" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonFragmented" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonFragmented" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->NonFragmented->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->NonFragmented->EditValue ?>"<?php echo $ivf_semenanalysisreport->NonFragmented->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonFragmented" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonFragmented" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonFragmented" value="<?php echo HtmlEncode($ivf_semenanalysisreport->NonFragmented->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_NonFragmented" class="form-group ivf_semenanalysisreport_NonFragmented">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_NonFragmented" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonFragmented" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonFragmented" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->NonFragmented->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->NonFragmented->EditValue ?>"<?php echo $ivf_semenanalysisreport->NonFragmented->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_NonFragmented" class="ivf_semenanalysisreport_NonFragmented">
<span<?php echo $ivf_semenanalysisreport->NonFragmented->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->NonFragmented->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonFragmented" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonFragmented" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonFragmented" value="<?php echo HtmlEncode($ivf_semenanalysisreport->NonFragmented->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonFragmented" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonFragmented" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonFragmented" value="<?php echo HtmlEncode($ivf_semenanalysisreport->NonFragmented->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonFragmented" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonFragmented" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonFragmented" value="<?php echo HtmlEncode($ivf_semenanalysisreport->NonFragmented->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonFragmented" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonFragmented" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonFragmented" value="<?php echo HtmlEncode($ivf_semenanalysisreport->NonFragmented->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->DFI->Visible) { // DFI ?>
		<td data-name="DFI"<?php echo $ivf_semenanalysisreport->DFI->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_DFI" class="form-group ivf_semenanalysisreport_DFI">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_DFI" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DFI" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DFI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->DFI->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->DFI->EditValue ?>"<?php echo $ivf_semenanalysisreport->DFI->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DFI" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DFI" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DFI" value="<?php echo HtmlEncode($ivf_semenanalysisreport->DFI->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_DFI" class="form-group ivf_semenanalysisreport_DFI">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_DFI" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DFI" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DFI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->DFI->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->DFI->EditValue ?>"<?php echo $ivf_semenanalysisreport->DFI->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_DFI" class="ivf_semenanalysisreport_DFI">
<span<?php echo $ivf_semenanalysisreport->DFI->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->DFI->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DFI" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DFI" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DFI" value="<?php echo HtmlEncode($ivf_semenanalysisreport->DFI->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DFI" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DFI" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DFI" value="<?php echo HtmlEncode($ivf_semenanalysisreport->DFI->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DFI" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DFI" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DFI" value="<?php echo HtmlEncode($ivf_semenanalysisreport->DFI->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DFI" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DFI" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DFI" value="<?php echo HtmlEncode($ivf_semenanalysisreport->DFI->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->IsueBy->Visible) { // IsueBy ?>
		<td data-name="IsueBy"<?php echo $ivf_semenanalysisreport->IsueBy->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_IsueBy" class="form-group ivf_semenanalysisreport_IsueBy">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_IsueBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IsueBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IsueBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->IsueBy->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->IsueBy->EditValue ?>"<?php echo $ivf_semenanalysisreport->IsueBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IsueBy" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IsueBy" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IsueBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport->IsueBy->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_IsueBy" class="form-group ivf_semenanalysisreport_IsueBy">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_IsueBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IsueBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IsueBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->IsueBy->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->IsueBy->EditValue ?>"<?php echo $ivf_semenanalysisreport->IsueBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_IsueBy" class="ivf_semenanalysisreport_IsueBy">
<span<?php echo $ivf_semenanalysisreport->IsueBy->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->IsueBy->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IsueBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IsueBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IsueBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport->IsueBy->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IsueBy" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IsueBy" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IsueBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport->IsueBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IsueBy" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IsueBy" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IsueBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport->IsueBy->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IsueBy" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IsueBy" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IsueBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport->IsueBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Volume2->Visible) { // Volume2 ?>
		<td data-name="Volume2"<?php echo $ivf_semenanalysisreport->Volume2->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Volume2" class="form-group ivf_semenanalysisreport_Volume2">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Volume2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Volume2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Volume2->EditValue ?>"<?php echo $ivf_semenanalysisreport->Volume2->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume2" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume2" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Volume2->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Volume2" class="form-group ivf_semenanalysisreport_Volume2">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Volume2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Volume2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Volume2->EditValue ?>"<?php echo $ivf_semenanalysisreport->Volume2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Volume2" class="ivf_semenanalysisreport_Volume2">
<span<?php echo $ivf_semenanalysisreport->Volume2->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Volume2->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Volume2->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume2" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume2" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Volume2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume2" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume2" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Volume2->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume2" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume2" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Volume2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Concentration2->Visible) { // Concentration2 ?>
		<td data-name="Concentration2"<?php echo $ivf_semenanalysisreport->Concentration2->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Concentration2" class="form-group ivf_semenanalysisreport_Concentration2">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Concentration2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Concentration2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Concentration2->EditValue ?>"<?php echo $ivf_semenanalysisreport->Concentration2->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration2" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration2" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Concentration2->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Concentration2" class="form-group ivf_semenanalysisreport_Concentration2">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Concentration2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Concentration2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Concentration2->EditValue ?>"<?php echo $ivf_semenanalysisreport->Concentration2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Concentration2" class="ivf_semenanalysisreport_Concentration2">
<span<?php echo $ivf_semenanalysisreport->Concentration2->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Concentration2->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Concentration2->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration2" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration2" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Concentration2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration2" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration2" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Concentration2->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration2" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration2" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Concentration2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Total2->Visible) { // Total2 ?>
		<td data-name="Total2"<?php echo $ivf_semenanalysisreport->Total2->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Total2" class="form-group ivf_semenanalysisreport_Total2">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Total2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Total2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Total2->EditValue ?>"<?php echo $ivf_semenanalysisreport->Total2->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total2" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total2" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Total2->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Total2" class="form-group ivf_semenanalysisreport_Total2">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Total2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Total2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Total2->EditValue ?>"<?php echo $ivf_semenanalysisreport->Total2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Total2" class="ivf_semenanalysisreport_Total2">
<span<?php echo $ivf_semenanalysisreport->Total2->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Total2->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Total2->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total2" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total2" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Total2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total2" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total2" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Total2->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total2" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total2" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Total2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->ProgressiveMotility2->Visible) { // ProgressiveMotility2 ?>
		<td data-name="ProgressiveMotility2"<?php echo $ivf_semenanalysisreport->ProgressiveMotility2->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_ProgressiveMotility2" class="form-group ivf_semenanalysisreport_ProgressiveMotility2">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->ProgressiveMotility2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->ProgressiveMotility2->EditValue ?>"<?php echo $ivf_semenanalysisreport->ProgressiveMotility2->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility2" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility2" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->ProgressiveMotility2->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_ProgressiveMotility2" class="form-group ivf_semenanalysisreport_ProgressiveMotility2">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->ProgressiveMotility2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->ProgressiveMotility2->EditValue ?>"<?php echo $ivf_semenanalysisreport->ProgressiveMotility2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_ProgressiveMotility2" class="ivf_semenanalysisreport_ProgressiveMotility2">
<span<?php echo $ivf_semenanalysisreport->ProgressiveMotility2->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->ProgressiveMotility2->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->ProgressiveMotility2->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility2" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility2" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->ProgressiveMotility2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility2" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility2" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->ProgressiveMotility2->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility2" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility2" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->ProgressiveMotility2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->NonProgrssiveMotile2->Visible) { // NonProgrssiveMotile2 ?>
		<td data-name="NonProgrssiveMotile2"<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile2->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_NonProgrssiveMotile2" class="form-group ivf_semenanalysisreport_NonProgrssiveMotile2">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->NonProgrssiveMotile2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile2->EditValue ?>"<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile2->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile2" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile2" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->NonProgrssiveMotile2->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_NonProgrssiveMotile2" class="form-group ivf_semenanalysisreport_NonProgrssiveMotile2">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->NonProgrssiveMotile2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile2->EditValue ?>"<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_NonProgrssiveMotile2" class="ivf_semenanalysisreport_NonProgrssiveMotile2">
<span<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile2->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile2->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->NonProgrssiveMotile2->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile2" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile2" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->NonProgrssiveMotile2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile2" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile2" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->NonProgrssiveMotile2->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile2" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile2" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->NonProgrssiveMotile2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Immotile2->Visible) { // Immotile2 ?>
		<td data-name="Immotile2"<?php echo $ivf_semenanalysisreport->Immotile2->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Immotile2" class="form-group ivf_semenanalysisreport_Immotile2">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Immotile2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Immotile2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Immotile2->EditValue ?>"<?php echo $ivf_semenanalysisreport->Immotile2->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile2" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile2" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Immotile2->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Immotile2" class="form-group ivf_semenanalysisreport_Immotile2">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Immotile2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Immotile2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Immotile2->EditValue ?>"<?php echo $ivf_semenanalysisreport->Immotile2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_Immotile2" class="ivf_semenanalysisreport_Immotile2">
<span<?php echo $ivf_semenanalysisreport->Immotile2->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Immotile2->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Immotile2->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile2" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile2" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Immotile2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile2" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile2" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Immotile2->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile2" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile2" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Immotile2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->TotalProgrssiveMotile2->Visible) { // TotalProgrssiveMotile2 ?>
		<td data-name="TotalProgrssiveMotile2"<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile2->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_TotalProgrssiveMotile2" class="form-group ivf_semenanalysisreport_TotalProgrssiveMotile2">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->TotalProgrssiveMotile2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile2->EditValue ?>"<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile2->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile2" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile2" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TotalProgrssiveMotile2->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_TotalProgrssiveMotile2" class="form-group ivf_semenanalysisreport_TotalProgrssiveMotile2">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->TotalProgrssiveMotile2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile2->EditValue ?>"<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_TotalProgrssiveMotile2" class="ivf_semenanalysisreport_TotalProgrssiveMotile2">
<span<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile2->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile2->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TotalProgrssiveMotile2->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile2" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile2" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TotalProgrssiveMotile2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile2" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile2" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TotalProgrssiveMotile2->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile2" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile2" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TotalProgrssiveMotile2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->IssuedBy->Visible) { // IssuedBy ?>
		<td data-name="IssuedBy"<?php echo $ivf_semenanalysisreport->IssuedBy->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_IssuedBy" class="form-group ivf_semenanalysisreport_IssuedBy">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_IssuedBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->IssuedBy->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->IssuedBy->EditValue ?>"<?php echo $ivf_semenanalysisreport->IssuedBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IssuedBy" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedBy" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport->IssuedBy->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_IssuedBy" class="form-group ivf_semenanalysisreport_IssuedBy">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_IssuedBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->IssuedBy->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->IssuedBy->EditValue ?>"<?php echo $ivf_semenanalysisreport->IssuedBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_IssuedBy" class="ivf_semenanalysisreport_IssuedBy">
<span<?php echo $ivf_semenanalysisreport->IssuedBy->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->IssuedBy->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IssuedBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport->IssuedBy->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IssuedBy" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedBy" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport->IssuedBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IssuedBy" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedBy" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport->IssuedBy->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IssuedBy" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedBy" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport->IssuedBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->IssuedTo->Visible) { // IssuedTo ?>
		<td data-name="IssuedTo"<?php echo $ivf_semenanalysisreport->IssuedTo->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_IssuedTo" class="form-group ivf_semenanalysisreport_IssuedTo">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_IssuedTo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedTo" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedTo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->IssuedTo->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->IssuedTo->EditValue ?>"<?php echo $ivf_semenanalysisreport->IssuedTo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IssuedTo" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedTo" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedTo" value="<?php echo HtmlEncode($ivf_semenanalysisreport->IssuedTo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_IssuedTo" class="form-group ivf_semenanalysisreport_IssuedTo">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_IssuedTo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedTo" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedTo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->IssuedTo->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->IssuedTo->EditValue ?>"<?php echo $ivf_semenanalysisreport->IssuedTo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_IssuedTo" class="ivf_semenanalysisreport_IssuedTo">
<span<?php echo $ivf_semenanalysisreport->IssuedTo->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->IssuedTo->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IssuedTo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedTo" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedTo" value="<?php echo HtmlEncode($ivf_semenanalysisreport->IssuedTo->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IssuedTo" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedTo" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedTo" value="<?php echo HtmlEncode($ivf_semenanalysisreport->IssuedTo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IssuedTo" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedTo" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedTo" value="<?php echo HtmlEncode($ivf_semenanalysisreport->IssuedTo->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IssuedTo" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedTo" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedTo" value="<?php echo HtmlEncode($ivf_semenanalysisreport->IssuedTo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->PaID->Visible) { // PaID ?>
		<td data-name="PaID"<?php echo $ivf_semenanalysisreport->PaID->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_PaID" class="form-group ivf_semenanalysisreport_PaID">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PaID" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaID" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->PaID->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->PaID->EditValue ?>"<?php echo $ivf_semenanalysisreport->PaID->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaID" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaID" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaID" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PaID->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_PaID" class="form-group ivf_semenanalysisreport_PaID">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PaID" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaID" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->PaID->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->PaID->EditValue ?>"<?php echo $ivf_semenanalysisreport->PaID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_PaID" class="ivf_semenanalysisreport_PaID">
<span<?php echo $ivf_semenanalysisreport->PaID->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->PaID->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaID" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaID" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaID" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PaID->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaID" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaID" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaID" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PaID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaID" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaID" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaID" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PaID->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaID" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaID" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaID" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PaID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->PaName->Visible) { // PaName ?>
		<td data-name="PaName"<?php echo $ivf_semenanalysisreport->PaName->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_PaName" class="form-group ivf_semenanalysisreport_PaName">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PaName" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaName" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->PaName->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->PaName->EditValue ?>"<?php echo $ivf_semenanalysisreport->PaName->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaName" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaName" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaName" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PaName->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_PaName" class="form-group ivf_semenanalysisreport_PaName">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PaName" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaName" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->PaName->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->PaName->EditValue ?>"<?php echo $ivf_semenanalysisreport->PaName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_PaName" class="ivf_semenanalysisreport_PaName">
<span<?php echo $ivf_semenanalysisreport->PaName->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->PaName->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaName" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaName" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaName" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PaName->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaName" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaName" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaName" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PaName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaName" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaName" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaName" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PaName->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaName" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaName" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaName" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PaName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->PaMobile->Visible) { // PaMobile ?>
		<td data-name="PaMobile"<?php echo $ivf_semenanalysisreport->PaMobile->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_PaMobile" class="form-group ivf_semenanalysisreport_PaMobile">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PaMobile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaMobile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaMobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->PaMobile->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->PaMobile->EditValue ?>"<?php echo $ivf_semenanalysisreport->PaMobile->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaMobile" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaMobile" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaMobile" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PaMobile->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_PaMobile" class="form-group ivf_semenanalysisreport_PaMobile">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PaMobile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaMobile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaMobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->PaMobile->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->PaMobile->EditValue ?>"<?php echo $ivf_semenanalysisreport->PaMobile->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_PaMobile" class="ivf_semenanalysisreport_PaMobile">
<span<?php echo $ivf_semenanalysisreport->PaMobile->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->PaMobile->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaMobile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaMobile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaMobile" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PaMobile->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaMobile" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaMobile" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaMobile" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PaMobile->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaMobile" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaMobile" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaMobile" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PaMobile->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaMobile" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaMobile" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaMobile" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PaMobile->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->PartnerID->Visible) { // PartnerID ?>
		<td data-name="PartnerID"<?php echo $ivf_semenanalysisreport->PartnerID->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_PartnerID" class="form-group ivf_semenanalysisreport_PartnerID">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PartnerID" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerID" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->PartnerID->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->PartnerID->EditValue ?>"<?php echo $ivf_semenanalysisreport->PartnerID->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerID" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerID" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerID" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PartnerID->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_PartnerID" class="form-group ivf_semenanalysisreport_PartnerID">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PartnerID" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerID" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->PartnerID->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->PartnerID->EditValue ?>"<?php echo $ivf_semenanalysisreport->PartnerID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_PartnerID" class="ivf_semenanalysisreport_PartnerID">
<span<?php echo $ivf_semenanalysisreport->PartnerID->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->PartnerID->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerID" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerID" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerID" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PartnerID->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerID" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerID" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerID" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PartnerID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerID" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerID" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerID" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PartnerID->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerID" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerID" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerID" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PartnerID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->PartnerName->Visible) { // PartnerName ?>
		<td data-name="PartnerName"<?php echo $ivf_semenanalysisreport->PartnerName->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_PartnerName" class="form-group ivf_semenanalysisreport_PartnerName">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PartnerName" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerName" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->PartnerName->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->PartnerName->EditValue ?>"<?php echo $ivf_semenanalysisreport->PartnerName->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerName" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerName" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerName" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PartnerName->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_PartnerName" class="form-group ivf_semenanalysisreport_PartnerName">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PartnerName" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerName" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->PartnerName->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->PartnerName->EditValue ?>"<?php echo $ivf_semenanalysisreport->PartnerName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_PartnerName" class="ivf_semenanalysisreport_PartnerName">
<span<?php echo $ivf_semenanalysisreport->PartnerName->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->PartnerName->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerName" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerName" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerName" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PartnerName->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerName" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerName" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerName" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PartnerName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerName" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerName" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerName" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PartnerName->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerName" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerName" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerName" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PartnerName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->PartnerMobile->Visible) { // PartnerMobile ?>
		<td data-name="PartnerMobile"<?php echo $ivf_semenanalysisreport->PartnerMobile->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_PartnerMobile" class="form-group ivf_semenanalysisreport_PartnerMobile">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PartnerMobile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerMobile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerMobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->PartnerMobile->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->PartnerMobile->EditValue ?>"<?php echo $ivf_semenanalysisreport->PartnerMobile->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerMobile" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerMobile" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerMobile" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PartnerMobile->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_PartnerMobile" class="form-group ivf_semenanalysisreport_PartnerMobile">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PartnerMobile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerMobile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerMobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->PartnerMobile->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->PartnerMobile->EditValue ?>"<?php echo $ivf_semenanalysisreport->PartnerMobile->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_PartnerMobile" class="ivf_semenanalysisreport_PartnerMobile">
<span<?php echo $ivf_semenanalysisreport->PartnerMobile->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->PartnerMobile->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerMobile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerMobile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerMobile" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PartnerMobile->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerMobile" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerMobile" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerMobile" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PartnerMobile->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerMobile" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerMobile" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerMobile" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PartnerMobile->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerMobile" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerMobile" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerMobile" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PartnerMobile->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
		<td data-name="PREG_TEST_DATE"<?php echo $ivf_semenanalysisreport->PREG_TEST_DATE->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_PREG_TEST_DATE" class="form-group ivf_semenanalysisreport_PREG_TEST_DATE">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PREG_TEST_DATE" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PREG_TEST_DATE" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PREG_TEST_DATE" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->PREG_TEST_DATE->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->PREG_TEST_DATE->EditValue ?>"<?php echo $ivf_semenanalysisreport->PREG_TEST_DATE->editAttributes() ?>>
<?php if (!$ivf_semenanalysisreport->PREG_TEST_DATE->ReadOnly && !$ivf_semenanalysisreport->PREG_TEST_DATE->Disabled && !isset($ivf_semenanalysisreport->PREG_TEST_DATE->EditAttrs["readonly"]) && !isset($ivf_semenanalysisreport->PREG_TEST_DATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_semenanalysisreportgrid", "x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PREG_TEST_DATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PREG_TEST_DATE" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PREG_TEST_DATE" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PREG_TEST_DATE" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PREG_TEST_DATE->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_PREG_TEST_DATE" class="form-group ivf_semenanalysisreport_PREG_TEST_DATE">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PREG_TEST_DATE" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PREG_TEST_DATE" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PREG_TEST_DATE" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->PREG_TEST_DATE->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->PREG_TEST_DATE->EditValue ?>"<?php echo $ivf_semenanalysisreport->PREG_TEST_DATE->editAttributes() ?>>
<?php if (!$ivf_semenanalysisreport->PREG_TEST_DATE->ReadOnly && !$ivf_semenanalysisreport->PREG_TEST_DATE->Disabled && !isset($ivf_semenanalysisreport->PREG_TEST_DATE->EditAttrs["readonly"]) && !isset($ivf_semenanalysisreport->PREG_TEST_DATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_semenanalysisreportgrid", "x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PREG_TEST_DATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_PREG_TEST_DATE" class="ivf_semenanalysisreport_PREG_TEST_DATE">
<span<?php echo $ivf_semenanalysisreport->PREG_TEST_DATE->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->PREG_TEST_DATE->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PREG_TEST_DATE" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PREG_TEST_DATE" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PREG_TEST_DATE" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PREG_TEST_DATE->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PREG_TEST_DATE" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PREG_TEST_DATE" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PREG_TEST_DATE" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PREG_TEST_DATE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PREG_TEST_DATE" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PREG_TEST_DATE" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PREG_TEST_DATE" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PREG_TEST_DATE->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PREG_TEST_DATE" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PREG_TEST_DATE" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PREG_TEST_DATE" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PREG_TEST_DATE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->SPECIFIC_PROBLEMS->Visible) { // SPECIFIC_PROBLEMS ?>
		<td data-name="SPECIFIC_PROBLEMS"<?php echo $ivf_semenanalysisreport->SPECIFIC_PROBLEMS->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_SPECIFIC_PROBLEMS" class="form-group ivf_semenanalysisreport_SPECIFIC_PROBLEMS">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_SPECIFIC_PROBLEMS" data-value-separator="<?php echo $ivf_semenanalysisreport->SPECIFIC_PROBLEMS->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SPECIFIC_PROBLEMS" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SPECIFIC_PROBLEMS"<?php echo $ivf_semenanalysisreport->SPECIFIC_PROBLEMS->editAttributes() ?>>
		<?php echo $ivf_semenanalysisreport->SPECIFIC_PROBLEMS->selectOptionListHtml("x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SPECIFIC_PROBLEMS") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_SPECIFIC_PROBLEMS" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SPECIFIC_PROBLEMS" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SPECIFIC_PROBLEMS" value="<?php echo HtmlEncode($ivf_semenanalysisreport->SPECIFIC_PROBLEMS->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_SPECIFIC_PROBLEMS" class="form-group ivf_semenanalysisreport_SPECIFIC_PROBLEMS">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_SPECIFIC_PROBLEMS" data-value-separator="<?php echo $ivf_semenanalysisreport->SPECIFIC_PROBLEMS->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SPECIFIC_PROBLEMS" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SPECIFIC_PROBLEMS"<?php echo $ivf_semenanalysisreport->SPECIFIC_PROBLEMS->editAttributes() ?>>
		<?php echo $ivf_semenanalysisreport->SPECIFIC_PROBLEMS->selectOptionListHtml("x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SPECIFIC_PROBLEMS") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_SPECIFIC_PROBLEMS" class="ivf_semenanalysisreport_SPECIFIC_PROBLEMS">
<span<?php echo $ivf_semenanalysisreport->SPECIFIC_PROBLEMS->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->SPECIFIC_PROBLEMS->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_SPECIFIC_PROBLEMS" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SPECIFIC_PROBLEMS" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SPECIFIC_PROBLEMS" value="<?php echo HtmlEncode($ivf_semenanalysisreport->SPECIFIC_PROBLEMS->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_SPECIFIC_PROBLEMS" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SPECIFIC_PROBLEMS" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SPECIFIC_PROBLEMS" value="<?php echo HtmlEncode($ivf_semenanalysisreport->SPECIFIC_PROBLEMS->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_SPECIFIC_PROBLEMS" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SPECIFIC_PROBLEMS" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SPECIFIC_PROBLEMS" value="<?php echo HtmlEncode($ivf_semenanalysisreport->SPECIFIC_PROBLEMS->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_SPECIFIC_PROBLEMS" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SPECIFIC_PROBLEMS" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SPECIFIC_PROBLEMS" value="<?php echo HtmlEncode($ivf_semenanalysisreport->SPECIFIC_PROBLEMS->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->IMSC_1->Visible) { // IMSC_1 ?>
		<td data-name="IMSC_1"<?php echo $ivf_semenanalysisreport->IMSC_1->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_IMSC_1" class="form-group ivf_semenanalysisreport_IMSC_1">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_IMSC_1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->IMSC_1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->IMSC_1->EditValue ?>"<?php echo $ivf_semenanalysisreport->IMSC_1->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IMSC_1" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_1" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->IMSC_1->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_IMSC_1" class="form-group ivf_semenanalysisreport_IMSC_1">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_IMSC_1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->IMSC_1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->IMSC_1->EditValue ?>"<?php echo $ivf_semenanalysisreport->IMSC_1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_IMSC_1" class="ivf_semenanalysisreport_IMSC_1">
<span<?php echo $ivf_semenanalysisreport->IMSC_1->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->IMSC_1->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IMSC_1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->IMSC_1->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IMSC_1" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_1" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->IMSC_1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IMSC_1" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_1" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->IMSC_1->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IMSC_1" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_1" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->IMSC_1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->IMSC_2->Visible) { // IMSC_2 ?>
		<td data-name="IMSC_2"<?php echo $ivf_semenanalysisreport->IMSC_2->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_IMSC_2" class="form-group ivf_semenanalysisreport_IMSC_2">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_IMSC_2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->IMSC_2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->IMSC_2->EditValue ?>"<?php echo $ivf_semenanalysisreport->IMSC_2->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IMSC_2" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_2" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->IMSC_2->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_IMSC_2" class="form-group ivf_semenanalysisreport_IMSC_2">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_IMSC_2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->IMSC_2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->IMSC_2->EditValue ?>"<?php echo $ivf_semenanalysisreport->IMSC_2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_IMSC_2" class="ivf_semenanalysisreport_IMSC_2">
<span<?php echo $ivf_semenanalysisreport->IMSC_2->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->IMSC_2->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IMSC_2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->IMSC_2->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IMSC_2" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_2" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->IMSC_2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IMSC_2" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_2" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->IMSC_2->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IMSC_2" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_2" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->IMSC_2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->LIQUIFACTION_STORAGE->Visible) { // LIQUIFACTION_STORAGE ?>
		<td data-name="LIQUIFACTION_STORAGE"<?php echo $ivf_semenanalysisreport->LIQUIFACTION_STORAGE->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_LIQUIFACTION_STORAGE" class="form-group ivf_semenanalysisreport_LIQUIFACTION_STORAGE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_LIQUIFACTION_STORAGE" data-value-separator="<?php echo $ivf_semenanalysisreport->LIQUIFACTION_STORAGE->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_LIQUIFACTION_STORAGE" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_LIQUIFACTION_STORAGE"<?php echo $ivf_semenanalysisreport->LIQUIFACTION_STORAGE->editAttributes() ?>>
		<?php echo $ivf_semenanalysisreport->LIQUIFACTION_STORAGE->selectOptionListHtml("x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_LIQUIFACTION_STORAGE") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_LIQUIFACTION_STORAGE" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_LIQUIFACTION_STORAGE" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_LIQUIFACTION_STORAGE" value="<?php echo HtmlEncode($ivf_semenanalysisreport->LIQUIFACTION_STORAGE->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_LIQUIFACTION_STORAGE" class="form-group ivf_semenanalysisreport_LIQUIFACTION_STORAGE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_LIQUIFACTION_STORAGE" data-value-separator="<?php echo $ivf_semenanalysisreport->LIQUIFACTION_STORAGE->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_LIQUIFACTION_STORAGE" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_LIQUIFACTION_STORAGE"<?php echo $ivf_semenanalysisreport->LIQUIFACTION_STORAGE->editAttributes() ?>>
		<?php echo $ivf_semenanalysisreport->LIQUIFACTION_STORAGE->selectOptionListHtml("x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_LIQUIFACTION_STORAGE") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_LIQUIFACTION_STORAGE" class="ivf_semenanalysisreport_LIQUIFACTION_STORAGE">
<span<?php echo $ivf_semenanalysisreport->LIQUIFACTION_STORAGE->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->LIQUIFACTION_STORAGE->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_LIQUIFACTION_STORAGE" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_LIQUIFACTION_STORAGE" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_LIQUIFACTION_STORAGE" value="<?php echo HtmlEncode($ivf_semenanalysisreport->LIQUIFACTION_STORAGE->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_LIQUIFACTION_STORAGE" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_LIQUIFACTION_STORAGE" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_LIQUIFACTION_STORAGE" value="<?php echo HtmlEncode($ivf_semenanalysisreport->LIQUIFACTION_STORAGE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_LIQUIFACTION_STORAGE" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_LIQUIFACTION_STORAGE" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_LIQUIFACTION_STORAGE" value="<?php echo HtmlEncode($ivf_semenanalysisreport->LIQUIFACTION_STORAGE->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_LIQUIFACTION_STORAGE" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_LIQUIFACTION_STORAGE" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_LIQUIFACTION_STORAGE" value="<?php echo HtmlEncode($ivf_semenanalysisreport->LIQUIFACTION_STORAGE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->IUI_PREP_METHOD->Visible) { // IUI_PREP_METHOD ?>
		<td data-name="IUI_PREP_METHOD"<?php echo $ivf_semenanalysisreport->IUI_PREP_METHOD->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_IUI_PREP_METHOD" class="form-group ivf_semenanalysisreport_IUI_PREP_METHOD">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_IUI_PREP_METHOD" data-value-separator="<?php echo $ivf_semenanalysisreport->IUI_PREP_METHOD->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IUI_PREP_METHOD" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IUI_PREP_METHOD"<?php echo $ivf_semenanalysisreport->IUI_PREP_METHOD->editAttributes() ?>>
		<?php echo $ivf_semenanalysisreport->IUI_PREP_METHOD->selectOptionListHtml("x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IUI_PREP_METHOD") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IUI_PREP_METHOD" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IUI_PREP_METHOD" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IUI_PREP_METHOD" value="<?php echo HtmlEncode($ivf_semenanalysisreport->IUI_PREP_METHOD->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_IUI_PREP_METHOD" class="form-group ivf_semenanalysisreport_IUI_PREP_METHOD">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_IUI_PREP_METHOD" data-value-separator="<?php echo $ivf_semenanalysisreport->IUI_PREP_METHOD->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IUI_PREP_METHOD" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IUI_PREP_METHOD"<?php echo $ivf_semenanalysisreport->IUI_PREP_METHOD->editAttributes() ?>>
		<?php echo $ivf_semenanalysisreport->IUI_PREP_METHOD->selectOptionListHtml("x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IUI_PREP_METHOD") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_IUI_PREP_METHOD" class="ivf_semenanalysisreport_IUI_PREP_METHOD">
<span<?php echo $ivf_semenanalysisreport->IUI_PREP_METHOD->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->IUI_PREP_METHOD->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IUI_PREP_METHOD" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IUI_PREP_METHOD" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IUI_PREP_METHOD" value="<?php echo HtmlEncode($ivf_semenanalysisreport->IUI_PREP_METHOD->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IUI_PREP_METHOD" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IUI_PREP_METHOD" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IUI_PREP_METHOD" value="<?php echo HtmlEncode($ivf_semenanalysisreport->IUI_PREP_METHOD->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IUI_PREP_METHOD" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IUI_PREP_METHOD" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IUI_PREP_METHOD" value="<?php echo HtmlEncode($ivf_semenanalysisreport->IUI_PREP_METHOD->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IUI_PREP_METHOD" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IUI_PREP_METHOD" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IUI_PREP_METHOD" value="<?php echo HtmlEncode($ivf_semenanalysisreport->IUI_PREP_METHOD->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->TIME_FROM_TRIGGER->Visible) { // TIME_FROM_TRIGGER ?>
		<td data-name="TIME_FROM_TRIGGER"<?php echo $ivf_semenanalysisreport->TIME_FROM_TRIGGER->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_TIME_FROM_TRIGGER" class="form-group ivf_semenanalysisreport_TIME_FROM_TRIGGER">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_TRIGGER" data-value-separator="<?php echo $ivf_semenanalysisreport->TIME_FROM_TRIGGER->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_TRIGGER" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_TRIGGER"<?php echo $ivf_semenanalysisreport->TIME_FROM_TRIGGER->editAttributes() ?>>
		<?php echo $ivf_semenanalysisreport->TIME_FROM_TRIGGER->selectOptionListHtml("x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_TRIGGER") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_TRIGGER" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_TRIGGER" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_TRIGGER" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TIME_FROM_TRIGGER->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_TIME_FROM_TRIGGER" class="form-group ivf_semenanalysisreport_TIME_FROM_TRIGGER">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_TRIGGER" data-value-separator="<?php echo $ivf_semenanalysisreport->TIME_FROM_TRIGGER->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_TRIGGER" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_TRIGGER"<?php echo $ivf_semenanalysisreport->TIME_FROM_TRIGGER->editAttributes() ?>>
		<?php echo $ivf_semenanalysisreport->TIME_FROM_TRIGGER->selectOptionListHtml("x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_TRIGGER") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_TIME_FROM_TRIGGER" class="ivf_semenanalysisreport_TIME_FROM_TRIGGER">
<span<?php echo $ivf_semenanalysisreport->TIME_FROM_TRIGGER->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->TIME_FROM_TRIGGER->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_TRIGGER" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_TRIGGER" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_TRIGGER" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TIME_FROM_TRIGGER->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_TRIGGER" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_TRIGGER" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_TRIGGER" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TIME_FROM_TRIGGER->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_TRIGGER" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_TRIGGER" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_TRIGGER" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TIME_FROM_TRIGGER->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_TRIGGER" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_TRIGGER" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_TRIGGER" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TIME_FROM_TRIGGER->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->Visible) { // COLLECTION_TO_PREPARATION ?>
		<td data-name="COLLECTION_TO_PREPARATION"<?php echo $ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION" class="form-group ivf_semenanalysisreport_COLLECTION_TO_PREPARATION">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_COLLECTION_TO_PREPARATION" data-value-separator="<?php echo $ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_COLLECTION_TO_PREPARATION" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_COLLECTION_TO_PREPARATION"<?php echo $ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->editAttributes() ?>>
		<?php echo $ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->selectOptionListHtml("x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_COLLECTION_TO_PREPARATION") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_COLLECTION_TO_PREPARATION" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_COLLECTION_TO_PREPARATION" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_COLLECTION_TO_PREPARATION" value="<?php echo HtmlEncode($ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION" class="form-group ivf_semenanalysisreport_COLLECTION_TO_PREPARATION">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_COLLECTION_TO_PREPARATION" data-value-separator="<?php echo $ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_COLLECTION_TO_PREPARATION" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_COLLECTION_TO_PREPARATION"<?php echo $ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->editAttributes() ?>>
		<?php echo $ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->selectOptionListHtml("x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_COLLECTION_TO_PREPARATION") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION" class="ivf_semenanalysisreport_COLLECTION_TO_PREPARATION">
<span<?php echo $ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_COLLECTION_TO_PREPARATION" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_COLLECTION_TO_PREPARATION" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_COLLECTION_TO_PREPARATION" value="<?php echo HtmlEncode($ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_COLLECTION_TO_PREPARATION" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_COLLECTION_TO_PREPARATION" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_COLLECTION_TO_PREPARATION" value="<?php echo HtmlEncode($ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_COLLECTION_TO_PREPARATION" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_COLLECTION_TO_PREPARATION" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_COLLECTION_TO_PREPARATION" value="<?php echo HtmlEncode($ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_COLLECTION_TO_PREPARATION" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_COLLECTION_TO_PREPARATION" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_COLLECTION_TO_PREPARATION" value="<?php echo HtmlEncode($ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->Visible) { // TIME_FROM_PREP_TO_INSEM ?>
		<td data-name="TIME_FROM_PREP_TO_INSEM"<?php echo $ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM" class="form-group ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_PREP_TO_INSEM" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->EditValue ?>"<?php echo $ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_PREP_TO_INSEM" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM" class="form-group ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_PREP_TO_INSEM" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->EditValue ?>"<?php echo $ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCnt ?>_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM" class="ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM">
<span<?php echo $ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_PREP_TO_INSEM" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_PREP_TO_INSEM" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_PREP_TO_INSEM" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_PREP_TO_INSEM" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_semenanalysisreport_grid->ListOptions->render("body", "right", $ivf_semenanalysisreport_grid->RowCnt);
?>
	</tr>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD || $ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { ?>
<script>
fivf_semenanalysisreportgrid.updateLists(<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$ivf_semenanalysisreport->isGridAdd() || $ivf_semenanalysisreport->CurrentMode == "copy")
		if (!$ivf_semenanalysisreport_grid->Recordset->EOF)
			$ivf_semenanalysisreport_grid->Recordset->moveNext();
}
?>
<?php
	if ($ivf_semenanalysisreport->CurrentMode == "add" || $ivf_semenanalysisreport->CurrentMode == "copy" || $ivf_semenanalysisreport->CurrentMode == "edit") {
		$ivf_semenanalysisreport_grid->RowIndex = '$rowindex$';
		$ivf_semenanalysisreport_grid->loadRowValues();

		// Set row properties
		$ivf_semenanalysisreport->resetAttributes();
		$ivf_semenanalysisreport->RowAttrs = array_merge($ivf_semenanalysisreport->RowAttrs, array('data-rowindex'=>$ivf_semenanalysisreport_grid->RowIndex, 'id'=>'r0_ivf_semenanalysisreport', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($ivf_semenanalysisreport->RowAttrs["class"], "ew-template");
		$ivf_semenanalysisreport->RowType = ROWTYPE_ADD;

		// Render row
		$ivf_semenanalysisreport_grid->renderRow();

		// Render list options
		$ivf_semenanalysisreport_grid->renderListOptions();
		$ivf_semenanalysisreport_grid->StartRowCnt = 0;
?>
	<tr<?php echo $ivf_semenanalysisreport->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_semenanalysisreport_grid->ListOptions->render("body", "left", $ivf_semenanalysisreport_grid->RowIndex);
?>
	<?php if ($ivf_semenanalysisreport->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_id" class="form-group ivf_semenanalysisreport_id">
<span<?php echo $ivf_semenanalysisreport->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_id" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_id" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_semenanalysisreport->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_id" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_id" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_semenanalysisreport->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->RIDNo->Visible) { // RIDNo ?>
		<td data-name="RIDNo">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<?php if ($ivf_semenanalysisreport->RIDNo->getSessionValue() <> "") { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_RIDNo" class="form-group ivf_semenanalysisreport_RIDNo">
<span<?php echo $ivf_semenanalysisreport->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->RIDNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_semenanalysisreport->RIDNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_RIDNo" class="form-group ivf_semenanalysisreport_RIDNo">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_RIDNo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" size="30" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->RIDNo->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->RIDNo->EditValue ?>"<?php echo $ivf_semenanalysisreport->RIDNo->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_RIDNo" class="form-group ivf_semenanalysisreport_RIDNo">
<span<?php echo $ivf_semenanalysisreport->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->RIDNo->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RIDNo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_semenanalysisreport->RIDNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RIDNo" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_semenanalysisreport->RIDNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<?php if ($ivf_semenanalysisreport->PatientName->getSessionValue() <> "") { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PatientName" class="form-group ivf_semenanalysisreport_PatientName">
<span<?php echo $ivf_semenanalysisreport->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->PatientName->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PatientName->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PatientName" class="form-group ivf_semenanalysisreport_PatientName">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PatientName" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->PatientName->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->PatientName->EditValue ?>"<?php echo $ivf_semenanalysisreport->PatientName->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PatientName" class="form-group ivf_semenanalysisreport_PatientName">
<span<?php echo $ivf_semenanalysisreport->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->PatientName->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PatientName" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PatientName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PatientName" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PatientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->HusbandName->Visible) { // HusbandName ?>
		<td data-name="HusbandName">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_HusbandName" class="form-group ivf_semenanalysisreport_HusbandName">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_HusbandName" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_HusbandName" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_HusbandName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->HusbandName->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->HusbandName->EditValue ?>"<?php echo $ivf_semenanalysisreport->HusbandName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_HusbandName" class="form-group ivf_semenanalysisreport_HusbandName">
<span<?php echo $ivf_semenanalysisreport->HusbandName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->HusbandName->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_HusbandName" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_HusbandName" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_HusbandName" value="<?php echo HtmlEncode($ivf_semenanalysisreport->HusbandName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_HusbandName" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_HusbandName" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_HusbandName" value="<?php echo HtmlEncode($ivf_semenanalysisreport->HusbandName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->RequestDr->Visible) { // RequestDr ?>
		<td data-name="RequestDr">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_RequestDr" class="form-group ivf_semenanalysisreport_RequestDr">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_RequestDr" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestDr" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestDr" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->RequestDr->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->RequestDr->EditValue ?>"<?php echo $ivf_semenanalysisreport->RequestDr->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_RequestDr" class="form-group ivf_semenanalysisreport_RequestDr">
<span<?php echo $ivf_semenanalysisreport->RequestDr->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->RequestDr->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RequestDr" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestDr" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestDr" value="<?php echo HtmlEncode($ivf_semenanalysisreport->RequestDr->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RequestDr" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestDr" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestDr" value="<?php echo HtmlEncode($ivf_semenanalysisreport->RequestDr->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->CollectionDate->Visible) { // CollectionDate ?>
		<td data-name="CollectionDate">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_CollectionDate" class="form-group ivf_semenanalysisreport_CollectionDate">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_CollectionDate" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionDate" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionDate" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->CollectionDate->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->CollectionDate->EditValue ?>"<?php echo $ivf_semenanalysisreport->CollectionDate->editAttributes() ?>>
<?php if (!$ivf_semenanalysisreport->CollectionDate->ReadOnly && !$ivf_semenanalysisreport->CollectionDate->Disabled && !isset($ivf_semenanalysisreport->CollectionDate->EditAttrs["readonly"]) && !isset($ivf_semenanalysisreport->CollectionDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_semenanalysisreportgrid", "x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_CollectionDate" class="form-group ivf_semenanalysisreport_CollectionDate">
<span<?php echo $ivf_semenanalysisreport->CollectionDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->CollectionDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionDate" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionDate" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionDate" value="<?php echo HtmlEncode($ivf_semenanalysisreport->CollectionDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionDate" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionDate" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionDate" value="<?php echo HtmlEncode($ivf_semenanalysisreport->CollectionDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_ResultDate" class="form-group ivf_semenanalysisreport_ResultDate">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_ResultDate" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ResultDate" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ResultDate" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->ResultDate->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->ResultDate->EditValue ?>"<?php echo $ivf_semenanalysisreport->ResultDate->editAttributes() ?>>
<?php if (!$ivf_semenanalysisreport->ResultDate->ReadOnly && !$ivf_semenanalysisreport->ResultDate->Disabled && !isset($ivf_semenanalysisreport->ResultDate->EditAttrs["readonly"]) && !isset($ivf_semenanalysisreport->ResultDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_semenanalysisreportgrid", "x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_ResultDate" class="form-group ivf_semenanalysisreport_ResultDate">
<span<?php echo $ivf_semenanalysisreport->ResultDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->ResultDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ResultDate" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ResultDate" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($ivf_semenanalysisreport->ResultDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ResultDate" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ResultDate" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($ivf_semenanalysisreport->ResultDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->RequestSample->Visible) { // RequestSample ?>
		<td data-name="RequestSample">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_RequestSample" class="form-group ivf_semenanalysisreport_RequestSample">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_RequestSample" data-value-separator="<?php echo $ivf_semenanalysisreport->RequestSample->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestSample" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestSample"<?php echo $ivf_semenanalysisreport->RequestSample->editAttributes() ?>>
		<?php echo $ivf_semenanalysisreport->RequestSample->selectOptionListHtml("x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestSample") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_RequestSample" class="form-group ivf_semenanalysisreport_RequestSample">
<span<?php echo $ivf_semenanalysisreport->RequestSample->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->RequestSample->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RequestSample" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestSample" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestSample" value="<?php echo HtmlEncode($ivf_semenanalysisreport->RequestSample->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RequestSample" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestSample" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestSample" value="<?php echo HtmlEncode($ivf_semenanalysisreport->RequestSample->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->CollectionType->Visible) { // CollectionType ?>
		<td data-name="CollectionType">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_CollectionType" class="form-group ivf_semenanalysisreport_CollectionType">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_CollectionType" data-value-separator="<?php echo $ivf_semenanalysisreport->CollectionType->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionType" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionType"<?php echo $ivf_semenanalysisreport->CollectionType->editAttributes() ?>>
		<?php echo $ivf_semenanalysisreport->CollectionType->selectOptionListHtml("x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionType") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_CollectionType" class="form-group ivf_semenanalysisreport_CollectionType">
<span<?php echo $ivf_semenanalysisreport->CollectionType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->CollectionType->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionType" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionType" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionType" value="<?php echo HtmlEncode($ivf_semenanalysisreport->CollectionType->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionType" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionType" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionType" value="<?php echo HtmlEncode($ivf_semenanalysisreport->CollectionType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->CollectionMethod->Visible) { // CollectionMethod ?>
		<td data-name="CollectionMethod">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_CollectionMethod" class="form-group ivf_semenanalysisreport_CollectionMethod">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_CollectionMethod" data-value-separator="<?php echo $ivf_semenanalysisreport->CollectionMethod->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionMethod" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionMethod"<?php echo $ivf_semenanalysisreport->CollectionMethod->editAttributes() ?>>
		<?php echo $ivf_semenanalysisreport->CollectionMethod->selectOptionListHtml("x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionMethod") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_CollectionMethod" class="form-group ivf_semenanalysisreport_CollectionMethod">
<span<?php echo $ivf_semenanalysisreport->CollectionMethod->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->CollectionMethod->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionMethod" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionMethod" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionMethod" value="<?php echo HtmlEncode($ivf_semenanalysisreport->CollectionMethod->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionMethod" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionMethod" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionMethod" value="<?php echo HtmlEncode($ivf_semenanalysisreport->CollectionMethod->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Medicationused->Visible) { // Medicationused ?>
		<td data-name="Medicationused">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Medicationused" class="form-group ivf_semenanalysisreport_Medicationused">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_Medicationused" data-value-separator="<?php echo $ivf_semenanalysisreport->Medicationused->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medicationused" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medicationused"<?php echo $ivf_semenanalysisreport->Medicationused->editAttributes() ?>>
		<?php echo $ivf_semenanalysisreport->Medicationused->selectOptionListHtml("x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medicationused") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Medicationused" class="form-group ivf_semenanalysisreport_Medicationused">
<span<?php echo $ivf_semenanalysisreport->Medicationused->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->Medicationused->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Medicationused" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medicationused" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medicationused" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Medicationused->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Medicationused" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medicationused" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medicationused" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Medicationused->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->DifficultiesinCollection->Visible) { // DifficultiesinCollection ?>
		<td data-name="DifficultiesinCollection">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_DifficultiesinCollection" class="form-group ivf_semenanalysisreport_DifficultiesinCollection">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_DifficultiesinCollection" data-value-separator="<?php echo $ivf_semenanalysisreport->DifficultiesinCollection->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DifficultiesinCollection" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DifficultiesinCollection"<?php echo $ivf_semenanalysisreport->DifficultiesinCollection->editAttributes() ?>>
		<?php echo $ivf_semenanalysisreport->DifficultiesinCollection->selectOptionListHtml("x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DifficultiesinCollection") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_DifficultiesinCollection" class="form-group ivf_semenanalysisreport_DifficultiesinCollection">
<span<?php echo $ivf_semenanalysisreport->DifficultiesinCollection->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->DifficultiesinCollection->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DifficultiesinCollection" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DifficultiesinCollection" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DifficultiesinCollection" value="<?php echo HtmlEncode($ivf_semenanalysisreport->DifficultiesinCollection->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DifficultiesinCollection" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DifficultiesinCollection" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DifficultiesinCollection" value="<?php echo HtmlEncode($ivf_semenanalysisreport->DifficultiesinCollection->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->pH->Visible) { // pH ?>
		<td data-name="pH">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_pH" class="form-group ivf_semenanalysisreport_pH">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_pH" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_pH" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_pH" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->pH->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->pH->EditValue ?>"<?php echo $ivf_semenanalysisreport->pH->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_pH" class="form-group ivf_semenanalysisreport_pH">
<span<?php echo $ivf_semenanalysisreport->pH->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->pH->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_pH" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_pH" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_pH" value="<?php echo HtmlEncode($ivf_semenanalysisreport->pH->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_pH" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_pH" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_pH" value="<?php echo HtmlEncode($ivf_semenanalysisreport->pH->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Timeofcollection->Visible) { // Timeofcollection ?>
		<td data-name="Timeofcollection">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Timeofcollection" class="form-group ivf_semenanalysisreport_Timeofcollection">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Timeofcollection" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofcollection" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofcollection" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Timeofcollection->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Timeofcollection->EditValue ?>"<?php echo $ivf_semenanalysisreport->Timeofcollection->editAttributes() ?>>
<?php if (!$ivf_semenanalysisreport->Timeofcollection->ReadOnly && !$ivf_semenanalysisreport->Timeofcollection->Disabled && !isset($ivf_semenanalysisreport->Timeofcollection->EditAttrs["readonly"]) && !isset($ivf_semenanalysisreport->Timeofcollection->EditAttrs["disabled"])) { ?>
<script>ew.createTimePicker("fivf_semenanalysisreportgrid", "x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofcollection", {"timeFormat":"h:i A","step":15});</script><?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Timeofcollection" class="form-group ivf_semenanalysisreport_Timeofcollection">
<span<?php echo $ivf_semenanalysisreport->Timeofcollection->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->Timeofcollection->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Timeofcollection" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofcollection" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofcollection" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Timeofcollection->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Timeofcollection" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofcollection" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofcollection" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Timeofcollection->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Timeofexamination->Visible) { // Timeofexamination ?>
		<td data-name="Timeofexamination">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Timeofexamination" class="form-group ivf_semenanalysisreport_Timeofexamination">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Timeofexamination" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofexamination" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofexamination" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Timeofexamination->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Timeofexamination->EditValue ?>"<?php echo $ivf_semenanalysisreport->Timeofexamination->editAttributes() ?>>
<?php if (!$ivf_semenanalysisreport->Timeofexamination->ReadOnly && !$ivf_semenanalysisreport->Timeofexamination->Disabled && !isset($ivf_semenanalysisreport->Timeofexamination->EditAttrs["readonly"]) && !isset($ivf_semenanalysisreport->Timeofexamination->EditAttrs["disabled"])) { ?>
<script>ew.createTimePicker("fivf_semenanalysisreportgrid", "x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofexamination", {"timeFormat":"h:i A","step":15});</script><?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Timeofexamination" class="form-group ivf_semenanalysisreport_Timeofexamination">
<span<?php echo $ivf_semenanalysisreport->Timeofexamination->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->Timeofexamination->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Timeofexamination" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofexamination" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofexamination" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Timeofexamination->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Timeofexamination" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofexamination" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofexamination" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Timeofexamination->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Volume->Visible) { // Volume ?>
		<td data-name="Volume">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Volume" class="form-group ivf_semenanalysisreport_Volume">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Volume" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Volume->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Volume->EditValue ?>"<?php echo $ivf_semenanalysisreport->Volume->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Volume" class="form-group ivf_semenanalysisreport_Volume">
<span<?php echo $ivf_semenanalysisreport->Volume->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->Volume->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Volume->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Volume->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Concentration->Visible) { // Concentration ?>
		<td data-name="Concentration">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Concentration" class="form-group ivf_semenanalysisreport_Concentration">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Concentration" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Concentration->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Concentration->EditValue ?>"<?php echo $ivf_semenanalysisreport->Concentration->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Concentration" class="form-group ivf_semenanalysisreport_Concentration">
<span<?php echo $ivf_semenanalysisreport->Concentration->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->Concentration->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Concentration->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Concentration->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Total->Visible) { // Total ?>
		<td data-name="Total">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Total" class="form-group ivf_semenanalysisreport_Total">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Total" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Total->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Total->EditValue ?>"<?php echo $ivf_semenanalysisreport->Total->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Total" class="form-group ivf_semenanalysisreport_Total">
<span<?php echo $ivf_semenanalysisreport->Total->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->Total->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Total->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Total->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->ProgressiveMotility->Visible) { // ProgressiveMotility ?>
		<td data-name="ProgressiveMotility">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_ProgressiveMotility" class="form-group ivf_semenanalysisreport_ProgressiveMotility">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->ProgressiveMotility->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->ProgressiveMotility->EditValue ?>"<?php echo $ivf_semenanalysisreport->ProgressiveMotility->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_ProgressiveMotility" class="form-group ivf_semenanalysisreport_ProgressiveMotility">
<span<?php echo $ivf_semenanalysisreport->ProgressiveMotility->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->ProgressiveMotility->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility" value="<?php echo HtmlEncode($ivf_semenanalysisreport->ProgressiveMotility->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility" value="<?php echo HtmlEncode($ivf_semenanalysisreport->ProgressiveMotility->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->NonProgrssiveMotile->Visible) { // NonProgrssiveMotile ?>
		<td data-name="NonProgrssiveMotile">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_NonProgrssiveMotile" class="form-group ivf_semenanalysisreport_NonProgrssiveMotile">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->NonProgrssiveMotile->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile->EditValue ?>"<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_NonProgrssiveMotile" class="form-group ivf_semenanalysisreport_NonProgrssiveMotile">
<span<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->NonProgrssiveMotile->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport->NonProgrssiveMotile->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport->NonProgrssiveMotile->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Immotile->Visible) { // Immotile ?>
		<td data-name="Immotile">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Immotile" class="form-group ivf_semenanalysisreport_Immotile">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Immotile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Immotile->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Immotile->EditValue ?>"<?php echo $ivf_semenanalysisreport->Immotile->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Immotile" class="form-group ivf_semenanalysisreport_Immotile">
<span<?php echo $ivf_semenanalysisreport->Immotile->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->Immotile->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Immotile->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Immotile->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->TotalProgrssiveMotile->Visible) { // TotalProgrssiveMotile ?>
		<td data-name="TotalProgrssiveMotile">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_TotalProgrssiveMotile" class="form-group ivf_semenanalysisreport_TotalProgrssiveMotile">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->TotalProgrssiveMotile->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile->EditValue ?>"<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_TotalProgrssiveMotile" class="form-group ivf_semenanalysisreport_TotalProgrssiveMotile">
<span<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->TotalProgrssiveMotile->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TotalProgrssiveMotile->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TotalProgrssiveMotile->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Appearance->Visible) { // Appearance ?>
		<td data-name="Appearance">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Appearance" class="form-group ivf_semenanalysisreport_Appearance">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Appearance" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Appearance" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Appearance" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Appearance->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Appearance->EditValue ?>"<?php echo $ivf_semenanalysisreport->Appearance->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Appearance" class="form-group ivf_semenanalysisreport_Appearance">
<span<?php echo $ivf_semenanalysisreport->Appearance->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->Appearance->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Appearance" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Appearance" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Appearance" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Appearance->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Appearance" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Appearance" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Appearance" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Appearance->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Homogenosity->Visible) { // Homogenosity ?>
		<td data-name="Homogenosity">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Homogenosity" class="form-group ivf_semenanalysisreport_Homogenosity">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_Homogenosity" data-value-separator="<?php echo $ivf_semenanalysisreport->Homogenosity->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Homogenosity" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Homogenosity"<?php echo $ivf_semenanalysisreport->Homogenosity->editAttributes() ?>>
		<?php echo $ivf_semenanalysisreport->Homogenosity->selectOptionListHtml("x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Homogenosity") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Homogenosity" class="form-group ivf_semenanalysisreport_Homogenosity">
<span<?php echo $ivf_semenanalysisreport->Homogenosity->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->Homogenosity->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Homogenosity" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Homogenosity" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Homogenosity" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Homogenosity->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Homogenosity" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Homogenosity" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Homogenosity" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Homogenosity->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->CompleteSample->Visible) { // CompleteSample ?>
		<td data-name="CompleteSample">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_CompleteSample" class="form-group ivf_semenanalysisreport_CompleteSample">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_CompleteSample" data-value-separator="<?php echo $ivf_semenanalysisreport->CompleteSample->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CompleteSample" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CompleteSample"<?php echo $ivf_semenanalysisreport->CompleteSample->editAttributes() ?>>
		<?php echo $ivf_semenanalysisreport->CompleteSample->selectOptionListHtml("x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CompleteSample") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_CompleteSample" class="form-group ivf_semenanalysisreport_CompleteSample">
<span<?php echo $ivf_semenanalysisreport->CompleteSample->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->CompleteSample->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CompleteSample" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CompleteSample" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CompleteSample" value="<?php echo HtmlEncode($ivf_semenanalysisreport->CompleteSample->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CompleteSample" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CompleteSample" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CompleteSample" value="<?php echo HtmlEncode($ivf_semenanalysisreport->CompleteSample->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Liquefactiontime->Visible) { // Liquefactiontime ?>
		<td data-name="Liquefactiontime">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Liquefactiontime" class="form-group ivf_semenanalysisreport_Liquefactiontime">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Liquefactiontime" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Liquefactiontime" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Liquefactiontime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Liquefactiontime->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Liquefactiontime->EditValue ?>"<?php echo $ivf_semenanalysisreport->Liquefactiontime->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Liquefactiontime" class="form-group ivf_semenanalysisreport_Liquefactiontime">
<span<?php echo $ivf_semenanalysisreport->Liquefactiontime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->Liquefactiontime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Liquefactiontime" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Liquefactiontime" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Liquefactiontime" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Liquefactiontime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Liquefactiontime" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Liquefactiontime" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Liquefactiontime" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Liquefactiontime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Normal->Visible) { // Normal ?>
		<td data-name="Normal">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Normal" class="form-group ivf_semenanalysisreport_Normal">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Normal" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Normal" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Normal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Normal->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Normal->EditValue ?>"<?php echo $ivf_semenanalysisreport->Normal->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Normal" class="form-group ivf_semenanalysisreport_Normal">
<span<?php echo $ivf_semenanalysisreport->Normal->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->Normal->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Normal" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Normal" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Normal" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Normal->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Normal" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Normal" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Normal" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Normal->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Abnormal->Visible) { // Abnormal ?>
		<td data-name="Abnormal">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Abnormal" class="form-group ivf_semenanalysisreport_Abnormal">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Abnormal" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abnormal" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abnormal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Abnormal->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Abnormal->EditValue ?>"<?php echo $ivf_semenanalysisreport->Abnormal->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Abnormal" class="form-group ivf_semenanalysisreport_Abnormal">
<span<?php echo $ivf_semenanalysisreport->Abnormal->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->Abnormal->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Abnormal" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abnormal" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Abnormal->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Abnormal" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abnormal" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Abnormal->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Headdefects->Visible) { // Headdefects ?>
		<td data-name="Headdefects">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Headdefects" class="form-group ivf_semenanalysisreport_Headdefects">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Headdefects" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Headdefects" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Headdefects" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Headdefects->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Headdefects->EditValue ?>"<?php echo $ivf_semenanalysisreport->Headdefects->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Headdefects" class="form-group ivf_semenanalysisreport_Headdefects">
<span<?php echo $ivf_semenanalysisreport->Headdefects->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->Headdefects->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Headdefects" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Headdefects" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Headdefects" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Headdefects->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Headdefects" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Headdefects" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Headdefects" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Headdefects->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->MidpieceDefects->Visible) { // MidpieceDefects ?>
		<td data-name="MidpieceDefects">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_MidpieceDefects" class="form-group ivf_semenanalysisreport_MidpieceDefects">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_MidpieceDefects" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_MidpieceDefects" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_MidpieceDefects" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->MidpieceDefects->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->MidpieceDefects->EditValue ?>"<?php echo $ivf_semenanalysisreport->MidpieceDefects->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_MidpieceDefects" class="form-group ivf_semenanalysisreport_MidpieceDefects">
<span<?php echo $ivf_semenanalysisreport->MidpieceDefects->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->MidpieceDefects->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_MidpieceDefects" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_MidpieceDefects" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_MidpieceDefects" value="<?php echo HtmlEncode($ivf_semenanalysisreport->MidpieceDefects->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_MidpieceDefects" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_MidpieceDefects" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_MidpieceDefects" value="<?php echo HtmlEncode($ivf_semenanalysisreport->MidpieceDefects->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->TailDefects->Visible) { // TailDefects ?>
		<td data-name="TailDefects">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_TailDefects" class="form-group ivf_semenanalysisreport_TailDefects">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_TailDefects" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TailDefects" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TailDefects" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->TailDefects->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->TailDefects->EditValue ?>"<?php echo $ivf_semenanalysisreport->TailDefects->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_TailDefects" class="form-group ivf_semenanalysisreport_TailDefects">
<span<?php echo $ivf_semenanalysisreport->TailDefects->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->TailDefects->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TailDefects" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TailDefects" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TailDefects" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TailDefects->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TailDefects" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TailDefects" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TailDefects" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TailDefects->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->NormalProgMotile->Visible) { // NormalProgMotile ?>
		<td data-name="NormalProgMotile">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_NormalProgMotile" class="form-group ivf_semenanalysisreport_NormalProgMotile">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_NormalProgMotile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NormalProgMotile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NormalProgMotile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->NormalProgMotile->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->NormalProgMotile->EditValue ?>"<?php echo $ivf_semenanalysisreport->NormalProgMotile->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_NormalProgMotile" class="form-group ivf_semenanalysisreport_NormalProgMotile">
<span<?php echo $ivf_semenanalysisreport->NormalProgMotile->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->NormalProgMotile->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NormalProgMotile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NormalProgMotile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NormalProgMotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport->NormalProgMotile->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NormalProgMotile" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NormalProgMotile" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NormalProgMotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport->NormalProgMotile->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->ImmatureForms->Visible) { // ImmatureForms ?>
		<td data-name="ImmatureForms">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_ImmatureForms" class="form-group ivf_semenanalysisreport_ImmatureForms">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_ImmatureForms" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ImmatureForms" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ImmatureForms" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->ImmatureForms->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->ImmatureForms->EditValue ?>"<?php echo $ivf_semenanalysisreport->ImmatureForms->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_ImmatureForms" class="form-group ivf_semenanalysisreport_ImmatureForms">
<span<?php echo $ivf_semenanalysisreport->ImmatureForms->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->ImmatureForms->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ImmatureForms" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ImmatureForms" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ImmatureForms" value="<?php echo HtmlEncode($ivf_semenanalysisreport->ImmatureForms->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ImmatureForms" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ImmatureForms" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ImmatureForms" value="<?php echo HtmlEncode($ivf_semenanalysisreport->ImmatureForms->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Leucocytes->Visible) { // Leucocytes ?>
		<td data-name="Leucocytes">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Leucocytes" class="form-group ivf_semenanalysisreport_Leucocytes">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Leucocytes" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Leucocytes" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Leucocytes" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Leucocytes->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Leucocytes->EditValue ?>"<?php echo $ivf_semenanalysisreport->Leucocytes->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Leucocytes" class="form-group ivf_semenanalysisreport_Leucocytes">
<span<?php echo $ivf_semenanalysisreport->Leucocytes->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->Leucocytes->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Leucocytes" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Leucocytes" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Leucocytes" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Leucocytes->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Leucocytes" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Leucocytes" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Leucocytes" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Leucocytes->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Agglutination->Visible) { // Agglutination ?>
		<td data-name="Agglutination">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Agglutination" class="form-group ivf_semenanalysisreport_Agglutination">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Agglutination" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Agglutination" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Agglutination" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Agglutination->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Agglutination->EditValue ?>"<?php echo $ivf_semenanalysisreport->Agglutination->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Agglutination" class="form-group ivf_semenanalysisreport_Agglutination">
<span<?php echo $ivf_semenanalysisreport->Agglutination->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->Agglutination->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Agglutination" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Agglutination" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Agglutination" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Agglutination->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Agglutination" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Agglutination" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Agglutination" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Agglutination->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Debris->Visible) { // Debris ?>
		<td data-name="Debris">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Debris" class="form-group ivf_semenanalysisreport_Debris">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Debris" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Debris" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Debris" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Debris->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Debris->EditValue ?>"<?php echo $ivf_semenanalysisreport->Debris->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Debris" class="form-group ivf_semenanalysisreport_Debris">
<span<?php echo $ivf_semenanalysisreport->Debris->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->Debris->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Debris" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Debris" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Debris" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Debris->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Debris" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Debris" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Debris" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Debris->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Diagnosis->Visible) { // Diagnosis ?>
		<td data-name="Diagnosis">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Diagnosis" class="form-group ivf_semenanalysisreport_Diagnosis">
<textarea data-table="ivf_semenanalysisreport" data-field="x_Diagnosis" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Diagnosis" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Diagnosis" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Diagnosis->getPlaceHolder()) ?>"<?php echo $ivf_semenanalysisreport->Diagnosis->editAttributes() ?>><?php echo $ivf_semenanalysisreport->Diagnosis->EditValue ?></textarea>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Diagnosis" class="form-group ivf_semenanalysisreport_Diagnosis">
<span<?php echo $ivf_semenanalysisreport->Diagnosis->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Diagnosis->ViewValue ?></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Diagnosis" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Diagnosis" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Diagnosis" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Diagnosis->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Diagnosis" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Diagnosis" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Diagnosis" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Diagnosis->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Observations->Visible) { // Observations ?>
		<td data-name="Observations">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Observations" class="form-group ivf_semenanalysisreport_Observations">
<textarea data-table="ivf_semenanalysisreport" data-field="x_Observations" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Observations" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Observations" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Observations->getPlaceHolder()) ?>"<?php echo $ivf_semenanalysisreport->Observations->editAttributes() ?>><?php echo $ivf_semenanalysisreport->Observations->EditValue ?></textarea>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Observations" class="form-group ivf_semenanalysisreport_Observations">
<span<?php echo $ivf_semenanalysisreport->Observations->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Observations->ViewValue ?></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Observations" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Observations" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Observations" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Observations->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Observations" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Observations" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Observations" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Observations->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Signature->Visible) { // Signature ?>
		<td data-name="Signature">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Signature" class="form-group ivf_semenanalysisreport_Signature">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Signature" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Signature" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Signature" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Signature->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Signature->EditValue ?>"<?php echo $ivf_semenanalysisreport->Signature->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Signature" class="form-group ivf_semenanalysisreport_Signature">
<span<?php echo $ivf_semenanalysisreport->Signature->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->Signature->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Signature" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Signature" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Signature" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Signature->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Signature" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Signature" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Signature" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Signature->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->SemenOrgin->Visible) { // SemenOrgin ?>
		<td data-name="SemenOrgin">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_SemenOrgin" class="form-group ivf_semenanalysisreport_SemenOrgin">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_SemenOrgin" data-value-separator="<?php echo $ivf_semenanalysisreport->SemenOrgin->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SemenOrgin" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SemenOrgin"<?php echo $ivf_semenanalysisreport->SemenOrgin->editAttributes() ?>>
		<?php echo $ivf_semenanalysisreport->SemenOrgin->selectOptionListHtml("x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SemenOrgin") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_SemenOrgin" class="form-group ivf_semenanalysisreport_SemenOrgin">
<span<?php echo $ivf_semenanalysisreport->SemenOrgin->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->SemenOrgin->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_SemenOrgin" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SemenOrgin" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SemenOrgin" value="<?php echo HtmlEncode($ivf_semenanalysisreport->SemenOrgin->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_SemenOrgin" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SemenOrgin" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SemenOrgin" value="<?php echo HtmlEncode($ivf_semenanalysisreport->SemenOrgin->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Donor->Visible) { // Donor ?>
		<td data-name="Donor">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Donor" class="form-group ivf_semenanalysisreport_Donor">
<?php $ivf_semenanalysisreport->Donor->EditAttrs["onchange"] = "ew.autoFill(this);" . @$ivf_semenanalysisreport->Donor->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor"><?php echo strval($ivf_semenanalysisreport->Donor->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($ivf_semenanalysisreport->Donor->ViewValue) : $ivf_semenanalysisreport->Donor->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf_semenanalysisreport->Donor->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($ivf_semenanalysisreport->Donor->ReadOnly || $ivf_semenanalysisreport->Donor->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf_semenanalysisreport->Donor->Lookup->getParamTag("p_x" . $ivf_semenanalysisreport_grid->RowIndex . "_Donor") ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Donor" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf_semenanalysisreport->Donor->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor" value="<?php echo $ivf_semenanalysisreport->Donor->CurrentValue ?>"<?php echo $ivf_semenanalysisreport->Donor->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Donor" class="form-group ivf_semenanalysisreport_Donor">
<span<?php echo $ivf_semenanalysisreport->Donor->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->Donor->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Donor" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Donor->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Donor" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Donor->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->DonorBloodgroup->Visible) { // DonorBloodgroup ?>
		<td data-name="DonorBloodgroup">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_DonorBloodgroup" class="form-group ivf_semenanalysisreport_DonorBloodgroup">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_DonorBloodgroup" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DonorBloodgroup" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DonorBloodgroup" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->DonorBloodgroup->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->DonorBloodgroup->EditValue ?>"<?php echo $ivf_semenanalysisreport->DonorBloodgroup->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_DonorBloodgroup" class="form-group ivf_semenanalysisreport_DonorBloodgroup">
<span<?php echo $ivf_semenanalysisreport->DonorBloodgroup->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->DonorBloodgroup->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DonorBloodgroup" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DonorBloodgroup" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DonorBloodgroup" value="<?php echo HtmlEncode($ivf_semenanalysisreport->DonorBloodgroup->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DonorBloodgroup" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DonorBloodgroup" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DonorBloodgroup" value="<?php echo HtmlEncode($ivf_semenanalysisreport->DonorBloodgroup->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Tank->Visible) { // Tank ?>
		<td data-name="Tank">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Tank" class="form-group ivf_semenanalysisreport_Tank">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Tank" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Tank" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Tank" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Tank->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Tank->EditValue ?>"<?php echo $ivf_semenanalysisreport->Tank->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Tank" class="form-group ivf_semenanalysisreport_Tank">
<span<?php echo $ivf_semenanalysisreport->Tank->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->Tank->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Tank" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Tank" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Tank" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Tank->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Tank" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Tank" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Tank" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Tank->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Location->Visible) { // Location ?>
		<td data-name="Location">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Location" class="form-group ivf_semenanalysisreport_Location">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Location" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Location" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Location" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Location->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Location->EditValue ?>"<?php echo $ivf_semenanalysisreport->Location->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Location" class="form-group ivf_semenanalysisreport_Location">
<span<?php echo $ivf_semenanalysisreport->Location->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->Location->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Location" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Location" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Location" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Location->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Location" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Location" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Location" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Location->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Volume1->Visible) { // Volume1 ?>
		<td data-name="Volume1">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Volume1" class="form-group ivf_semenanalysisreport_Volume1">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Volume1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Volume1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Volume1->EditValue ?>"<?php echo $ivf_semenanalysisreport->Volume1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Volume1" class="form-group ivf_semenanalysisreport_Volume1">
<span<?php echo $ivf_semenanalysisreport->Volume1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->Volume1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Volume1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume1" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume1" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Volume1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Concentration1->Visible) { // Concentration1 ?>
		<td data-name="Concentration1">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Concentration1" class="form-group ivf_semenanalysisreport_Concentration1">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Concentration1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Concentration1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Concentration1->EditValue ?>"<?php echo $ivf_semenanalysisreport->Concentration1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Concentration1" class="form-group ivf_semenanalysisreport_Concentration1">
<span<?php echo $ivf_semenanalysisreport->Concentration1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->Concentration1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Concentration1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration1" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration1" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Concentration1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Total1->Visible) { // Total1 ?>
		<td data-name="Total1">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Total1" class="form-group ivf_semenanalysisreport_Total1">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Total1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Total1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Total1->EditValue ?>"<?php echo $ivf_semenanalysisreport->Total1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Total1" class="form-group ivf_semenanalysisreport_Total1">
<span<?php echo $ivf_semenanalysisreport->Total1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->Total1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Total1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total1" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total1" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Total1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->ProgressiveMotility1->Visible) { // ProgressiveMotility1 ?>
		<td data-name="ProgressiveMotility1">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_ProgressiveMotility1" class="form-group ivf_semenanalysisreport_ProgressiveMotility1">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->ProgressiveMotility1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->ProgressiveMotility1->EditValue ?>"<?php echo $ivf_semenanalysisreport->ProgressiveMotility1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_ProgressiveMotility1" class="form-group ivf_semenanalysisreport_ProgressiveMotility1">
<span<?php echo $ivf_semenanalysisreport->ProgressiveMotility1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->ProgressiveMotility1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->ProgressiveMotility1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility1" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility1" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->ProgressiveMotility1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->NonProgrssiveMotile1->Visible) { // NonProgrssiveMotile1 ?>
		<td data-name="NonProgrssiveMotile1">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_NonProgrssiveMotile1" class="form-group ivf_semenanalysisreport_NonProgrssiveMotile1">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->NonProgrssiveMotile1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile1->EditValue ?>"<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_NonProgrssiveMotile1" class="form-group ivf_semenanalysisreport_NonProgrssiveMotile1">
<span<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->NonProgrssiveMotile1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->NonProgrssiveMotile1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile1" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile1" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->NonProgrssiveMotile1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Immotile1->Visible) { // Immotile1 ?>
		<td data-name="Immotile1">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Immotile1" class="form-group ivf_semenanalysisreport_Immotile1">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Immotile1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Immotile1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Immotile1->EditValue ?>"<?php echo $ivf_semenanalysisreport->Immotile1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Immotile1" class="form-group ivf_semenanalysisreport_Immotile1">
<span<?php echo $ivf_semenanalysisreport->Immotile1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->Immotile1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Immotile1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile1" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile1" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Immotile1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->TotalProgrssiveMotile1->Visible) { // TotalProgrssiveMotile1 ?>
		<td data-name="TotalProgrssiveMotile1">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_TotalProgrssiveMotile1" class="form-group ivf_semenanalysisreport_TotalProgrssiveMotile1">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->TotalProgrssiveMotile1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile1->EditValue ?>"<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_TotalProgrssiveMotile1" class="form-group ivf_semenanalysisreport_TotalProgrssiveMotile1">
<span<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->TotalProgrssiveMotile1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TotalProgrssiveMotile1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile1" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile1" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TotalProgrssiveMotile1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<?php if ($ivf_semenanalysisreport->TidNo->getSessionValue() <> "") { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_TidNo" class="form-group ivf_semenanalysisreport_TidNo">
<span<?php echo $ivf_semenanalysisreport->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->TidNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TidNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_TidNo" class="form-group ivf_semenanalysisreport_TidNo">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_TidNo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->TidNo->EditValue ?>"<?php echo $ivf_semenanalysisreport->TidNo->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_TidNo" class="form-group ivf_semenanalysisreport_TidNo">
<span<?php echo $ivf_semenanalysisreport->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->TidNo->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TidNo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TidNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TidNo" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TidNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Color->Visible) { // Color ?>
		<td data-name="Color">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Color" class="form-group ivf_semenanalysisreport_Color">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Color" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Color" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Color" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Color->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Color->EditValue ?>"<?php echo $ivf_semenanalysisreport->Color->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Color" class="form-group ivf_semenanalysisreport_Color">
<span<?php echo $ivf_semenanalysisreport->Color->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->Color->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Color" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Color" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Color" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Color->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Color" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Color" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Color" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Color->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->DoneBy->Visible) { // DoneBy ?>
		<td data-name="DoneBy">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_DoneBy" class="form-group ivf_semenanalysisreport_DoneBy">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_DoneBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DoneBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DoneBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->DoneBy->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->DoneBy->EditValue ?>"<?php echo $ivf_semenanalysisreport->DoneBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_DoneBy" class="form-group ivf_semenanalysisreport_DoneBy">
<span<?php echo $ivf_semenanalysisreport->DoneBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->DoneBy->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DoneBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DoneBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DoneBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport->DoneBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DoneBy" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DoneBy" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DoneBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport->DoneBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Method->Visible) { // Method ?>
		<td data-name="Method">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Method" class="form-group ivf_semenanalysisreport_Method">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Method" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Method" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Method->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Method->EditValue ?>"<?php echo $ivf_semenanalysisreport->Method->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Method" class="form-group ivf_semenanalysisreport_Method">
<span<?php echo $ivf_semenanalysisreport->Method->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->Method->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Method" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Method" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Method->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Method" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Method" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Method->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Abstinence->Visible) { // Abstinence ?>
		<td data-name="Abstinence">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Abstinence" class="form-group ivf_semenanalysisreport_Abstinence">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Abstinence" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abstinence" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abstinence" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Abstinence->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Abstinence->EditValue ?>"<?php echo $ivf_semenanalysisreport->Abstinence->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Abstinence" class="form-group ivf_semenanalysisreport_Abstinence">
<span<?php echo $ivf_semenanalysisreport->Abstinence->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->Abstinence->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Abstinence" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abstinence" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abstinence" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Abstinence->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Abstinence" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abstinence" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abstinence" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Abstinence->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->ProcessedBy->Visible) { // ProcessedBy ?>
		<td data-name="ProcessedBy">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_ProcessedBy" class="form-group ivf_semenanalysisreport_ProcessedBy">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_ProcessedBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProcessedBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProcessedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->ProcessedBy->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->ProcessedBy->EditValue ?>"<?php echo $ivf_semenanalysisreport->ProcessedBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_ProcessedBy" class="form-group ivf_semenanalysisreport_ProcessedBy">
<span<?php echo $ivf_semenanalysisreport->ProcessedBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->ProcessedBy->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProcessedBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProcessedBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProcessedBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport->ProcessedBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProcessedBy" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProcessedBy" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProcessedBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport->ProcessedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->InseminationTime->Visible) { // InseminationTime ?>
		<td data-name="InseminationTime">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_InseminationTime" class="form-group ivf_semenanalysisreport_InseminationTime">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_InseminationTime" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationTime" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->InseminationTime->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->InseminationTime->EditValue ?>"<?php echo $ivf_semenanalysisreport->InseminationTime->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_InseminationTime" class="form-group ivf_semenanalysisreport_InseminationTime">
<span<?php echo $ivf_semenanalysisreport->InseminationTime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->InseminationTime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_InseminationTime" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationTime" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationTime" value="<?php echo HtmlEncode($ivf_semenanalysisreport->InseminationTime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_InseminationTime" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationTime" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationTime" value="<?php echo HtmlEncode($ivf_semenanalysisreport->InseminationTime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->InseminationBy->Visible) { // InseminationBy ?>
		<td data-name="InseminationBy">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_InseminationBy" class="form-group ivf_semenanalysisreport_InseminationBy">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_InseminationBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->InseminationBy->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->InseminationBy->EditValue ?>"<?php echo $ivf_semenanalysisreport->InseminationBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_InseminationBy" class="form-group ivf_semenanalysisreport_InseminationBy">
<span<?php echo $ivf_semenanalysisreport->InseminationBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->InseminationBy->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_InseminationBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport->InseminationBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_InseminationBy" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationBy" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport->InseminationBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Big->Visible) { // Big ?>
		<td data-name="Big">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Big" class="form-group ivf_semenanalysisreport_Big">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Big" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Big" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Big" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Big->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Big->EditValue ?>"<?php echo $ivf_semenanalysisreport->Big->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Big" class="form-group ivf_semenanalysisreport_Big">
<span<?php echo $ivf_semenanalysisreport->Big->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->Big->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Big" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Big" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Big" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Big->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Big" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Big" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Big" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Big->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Medium->Visible) { // Medium ?>
		<td data-name="Medium">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Medium" class="form-group ivf_semenanalysisreport_Medium">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Medium" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medium" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medium" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Medium->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Medium->EditValue ?>"<?php echo $ivf_semenanalysisreport->Medium->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Medium" class="form-group ivf_semenanalysisreport_Medium">
<span<?php echo $ivf_semenanalysisreport->Medium->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->Medium->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Medium" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medium" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medium" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Medium->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Medium" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medium" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medium" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Medium->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Small->Visible) { // Small ?>
		<td data-name="Small">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Small" class="form-group ivf_semenanalysisreport_Small">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Small" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Small" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Small" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Small->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Small->EditValue ?>"<?php echo $ivf_semenanalysisreport->Small->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Small" class="form-group ivf_semenanalysisreport_Small">
<span<?php echo $ivf_semenanalysisreport->Small->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->Small->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Small" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Small" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Small" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Small->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Small" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Small" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Small" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Small->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->NoHalo->Visible) { // NoHalo ?>
		<td data-name="NoHalo">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_NoHalo" class="form-group ivf_semenanalysisreport_NoHalo">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_NoHalo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NoHalo" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NoHalo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->NoHalo->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->NoHalo->EditValue ?>"<?php echo $ivf_semenanalysisreport->NoHalo->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_NoHalo" class="form-group ivf_semenanalysisreport_NoHalo">
<span<?php echo $ivf_semenanalysisreport->NoHalo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->NoHalo->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NoHalo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NoHalo" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NoHalo" value="<?php echo HtmlEncode($ivf_semenanalysisreport->NoHalo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NoHalo" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NoHalo" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NoHalo" value="<?php echo HtmlEncode($ivf_semenanalysisreport->NoHalo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Fragmented->Visible) { // Fragmented ?>
		<td data-name="Fragmented">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Fragmented" class="form-group ivf_semenanalysisreport_Fragmented">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Fragmented" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Fragmented" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Fragmented" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Fragmented->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Fragmented->EditValue ?>"<?php echo $ivf_semenanalysisreport->Fragmented->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Fragmented" class="form-group ivf_semenanalysisreport_Fragmented">
<span<?php echo $ivf_semenanalysisreport->Fragmented->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->Fragmented->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Fragmented" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Fragmented" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Fragmented" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Fragmented->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Fragmented" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Fragmented" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Fragmented" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Fragmented->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->NonFragmented->Visible) { // NonFragmented ?>
		<td data-name="NonFragmented">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_NonFragmented" class="form-group ivf_semenanalysisreport_NonFragmented">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_NonFragmented" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonFragmented" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonFragmented" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->NonFragmented->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->NonFragmented->EditValue ?>"<?php echo $ivf_semenanalysisreport->NonFragmented->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_NonFragmented" class="form-group ivf_semenanalysisreport_NonFragmented">
<span<?php echo $ivf_semenanalysisreport->NonFragmented->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->NonFragmented->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonFragmented" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonFragmented" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonFragmented" value="<?php echo HtmlEncode($ivf_semenanalysisreport->NonFragmented->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonFragmented" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonFragmented" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonFragmented" value="<?php echo HtmlEncode($ivf_semenanalysisreport->NonFragmented->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->DFI->Visible) { // DFI ?>
		<td data-name="DFI">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_DFI" class="form-group ivf_semenanalysisreport_DFI">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_DFI" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DFI" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DFI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->DFI->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->DFI->EditValue ?>"<?php echo $ivf_semenanalysisreport->DFI->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_DFI" class="form-group ivf_semenanalysisreport_DFI">
<span<?php echo $ivf_semenanalysisreport->DFI->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->DFI->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DFI" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DFI" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DFI" value="<?php echo HtmlEncode($ivf_semenanalysisreport->DFI->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DFI" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DFI" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DFI" value="<?php echo HtmlEncode($ivf_semenanalysisreport->DFI->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->IsueBy->Visible) { // IsueBy ?>
		<td data-name="IsueBy">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_IsueBy" class="form-group ivf_semenanalysisreport_IsueBy">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_IsueBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IsueBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IsueBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->IsueBy->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->IsueBy->EditValue ?>"<?php echo $ivf_semenanalysisreport->IsueBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_IsueBy" class="form-group ivf_semenanalysisreport_IsueBy">
<span<?php echo $ivf_semenanalysisreport->IsueBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->IsueBy->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IsueBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IsueBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IsueBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport->IsueBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IsueBy" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IsueBy" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IsueBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport->IsueBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Volume2->Visible) { // Volume2 ?>
		<td data-name="Volume2">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Volume2" class="form-group ivf_semenanalysisreport_Volume2">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Volume2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Volume2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Volume2->EditValue ?>"<?php echo $ivf_semenanalysisreport->Volume2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Volume2" class="form-group ivf_semenanalysisreport_Volume2">
<span<?php echo $ivf_semenanalysisreport->Volume2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->Volume2->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Volume2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume2" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume2" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Volume2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Concentration2->Visible) { // Concentration2 ?>
		<td data-name="Concentration2">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Concentration2" class="form-group ivf_semenanalysisreport_Concentration2">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Concentration2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Concentration2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Concentration2->EditValue ?>"<?php echo $ivf_semenanalysisreport->Concentration2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Concentration2" class="form-group ivf_semenanalysisreport_Concentration2">
<span<?php echo $ivf_semenanalysisreport->Concentration2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->Concentration2->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Concentration2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration2" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration2" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Concentration2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Total2->Visible) { // Total2 ?>
		<td data-name="Total2">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Total2" class="form-group ivf_semenanalysisreport_Total2">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Total2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Total2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Total2->EditValue ?>"<?php echo $ivf_semenanalysisreport->Total2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Total2" class="form-group ivf_semenanalysisreport_Total2">
<span<?php echo $ivf_semenanalysisreport->Total2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->Total2->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Total2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total2" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total2" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Total2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->ProgressiveMotility2->Visible) { // ProgressiveMotility2 ?>
		<td data-name="ProgressiveMotility2">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_ProgressiveMotility2" class="form-group ivf_semenanalysisreport_ProgressiveMotility2">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->ProgressiveMotility2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->ProgressiveMotility2->EditValue ?>"<?php echo $ivf_semenanalysisreport->ProgressiveMotility2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_ProgressiveMotility2" class="form-group ivf_semenanalysisreport_ProgressiveMotility2">
<span<?php echo $ivf_semenanalysisreport->ProgressiveMotility2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->ProgressiveMotility2->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->ProgressiveMotility2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility2" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility2" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->ProgressiveMotility2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->NonProgrssiveMotile2->Visible) { // NonProgrssiveMotile2 ?>
		<td data-name="NonProgrssiveMotile2">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_NonProgrssiveMotile2" class="form-group ivf_semenanalysisreport_NonProgrssiveMotile2">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->NonProgrssiveMotile2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile2->EditValue ?>"<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_NonProgrssiveMotile2" class="form-group ivf_semenanalysisreport_NonProgrssiveMotile2">
<span<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->NonProgrssiveMotile2->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->NonProgrssiveMotile2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile2" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile2" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->NonProgrssiveMotile2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Immotile2->Visible) { // Immotile2 ?>
		<td data-name="Immotile2">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Immotile2" class="form-group ivf_semenanalysisreport_Immotile2">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Immotile2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->Immotile2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->Immotile2->EditValue ?>"<?php echo $ivf_semenanalysisreport->Immotile2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Immotile2" class="form-group ivf_semenanalysisreport_Immotile2">
<span<?php echo $ivf_semenanalysisreport->Immotile2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->Immotile2->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Immotile2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile2" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile2" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->Immotile2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->TotalProgrssiveMotile2->Visible) { // TotalProgrssiveMotile2 ?>
		<td data-name="TotalProgrssiveMotile2">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_TotalProgrssiveMotile2" class="form-group ivf_semenanalysisreport_TotalProgrssiveMotile2">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->TotalProgrssiveMotile2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile2->EditValue ?>"<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_TotalProgrssiveMotile2" class="form-group ivf_semenanalysisreport_TotalProgrssiveMotile2">
<span<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->TotalProgrssiveMotile2->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TotalProgrssiveMotile2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile2" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile2" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TotalProgrssiveMotile2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->IssuedBy->Visible) { // IssuedBy ?>
		<td data-name="IssuedBy">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_IssuedBy" class="form-group ivf_semenanalysisreport_IssuedBy">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_IssuedBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->IssuedBy->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->IssuedBy->EditValue ?>"<?php echo $ivf_semenanalysisreport->IssuedBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_IssuedBy" class="form-group ivf_semenanalysisreport_IssuedBy">
<span<?php echo $ivf_semenanalysisreport->IssuedBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->IssuedBy->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IssuedBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport->IssuedBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IssuedBy" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedBy" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport->IssuedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->IssuedTo->Visible) { // IssuedTo ?>
		<td data-name="IssuedTo">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_IssuedTo" class="form-group ivf_semenanalysisreport_IssuedTo">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_IssuedTo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedTo" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedTo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->IssuedTo->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->IssuedTo->EditValue ?>"<?php echo $ivf_semenanalysisreport->IssuedTo->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_IssuedTo" class="form-group ivf_semenanalysisreport_IssuedTo">
<span<?php echo $ivf_semenanalysisreport->IssuedTo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->IssuedTo->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IssuedTo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedTo" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedTo" value="<?php echo HtmlEncode($ivf_semenanalysisreport->IssuedTo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IssuedTo" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedTo" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedTo" value="<?php echo HtmlEncode($ivf_semenanalysisreport->IssuedTo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->PaID->Visible) { // PaID ?>
		<td data-name="PaID">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PaID" class="form-group ivf_semenanalysisreport_PaID">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PaID" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaID" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->PaID->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->PaID->EditValue ?>"<?php echo $ivf_semenanalysisreport->PaID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PaID" class="form-group ivf_semenanalysisreport_PaID">
<span<?php echo $ivf_semenanalysisreport->PaID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->PaID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaID" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaID" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaID" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PaID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaID" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaID" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaID" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PaID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->PaName->Visible) { // PaName ?>
		<td data-name="PaName">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PaName" class="form-group ivf_semenanalysisreport_PaName">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PaName" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaName" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->PaName->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->PaName->EditValue ?>"<?php echo $ivf_semenanalysisreport->PaName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PaName" class="form-group ivf_semenanalysisreport_PaName">
<span<?php echo $ivf_semenanalysisreport->PaName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->PaName->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaName" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaName" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaName" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PaName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaName" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaName" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaName" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PaName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->PaMobile->Visible) { // PaMobile ?>
		<td data-name="PaMobile">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PaMobile" class="form-group ivf_semenanalysisreport_PaMobile">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PaMobile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaMobile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaMobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->PaMobile->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->PaMobile->EditValue ?>"<?php echo $ivf_semenanalysisreport->PaMobile->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PaMobile" class="form-group ivf_semenanalysisreport_PaMobile">
<span<?php echo $ivf_semenanalysisreport->PaMobile->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->PaMobile->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaMobile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaMobile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaMobile" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PaMobile->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaMobile" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaMobile" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaMobile" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PaMobile->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->PartnerID->Visible) { // PartnerID ?>
		<td data-name="PartnerID">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PartnerID" class="form-group ivf_semenanalysisreport_PartnerID">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PartnerID" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerID" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->PartnerID->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->PartnerID->EditValue ?>"<?php echo $ivf_semenanalysisreport->PartnerID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PartnerID" class="form-group ivf_semenanalysisreport_PartnerID">
<span<?php echo $ivf_semenanalysisreport->PartnerID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->PartnerID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerID" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerID" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerID" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PartnerID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerID" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerID" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerID" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PartnerID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->PartnerName->Visible) { // PartnerName ?>
		<td data-name="PartnerName">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PartnerName" class="form-group ivf_semenanalysisreport_PartnerName">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PartnerName" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerName" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->PartnerName->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->PartnerName->EditValue ?>"<?php echo $ivf_semenanalysisreport->PartnerName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PartnerName" class="form-group ivf_semenanalysisreport_PartnerName">
<span<?php echo $ivf_semenanalysisreport->PartnerName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->PartnerName->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerName" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerName" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerName" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PartnerName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerName" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerName" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerName" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PartnerName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->PartnerMobile->Visible) { // PartnerMobile ?>
		<td data-name="PartnerMobile">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PartnerMobile" class="form-group ivf_semenanalysisreport_PartnerMobile">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PartnerMobile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerMobile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerMobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->PartnerMobile->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->PartnerMobile->EditValue ?>"<?php echo $ivf_semenanalysisreport->PartnerMobile->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PartnerMobile" class="form-group ivf_semenanalysisreport_PartnerMobile">
<span<?php echo $ivf_semenanalysisreport->PartnerMobile->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->PartnerMobile->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerMobile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerMobile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerMobile" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PartnerMobile->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerMobile" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerMobile" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerMobile" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PartnerMobile->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
		<td data-name="PREG_TEST_DATE">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PREG_TEST_DATE" class="form-group ivf_semenanalysisreport_PREG_TEST_DATE">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PREG_TEST_DATE" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PREG_TEST_DATE" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PREG_TEST_DATE" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->PREG_TEST_DATE->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->PREG_TEST_DATE->EditValue ?>"<?php echo $ivf_semenanalysisreport->PREG_TEST_DATE->editAttributes() ?>>
<?php if (!$ivf_semenanalysisreport->PREG_TEST_DATE->ReadOnly && !$ivf_semenanalysisreport->PREG_TEST_DATE->Disabled && !isset($ivf_semenanalysisreport->PREG_TEST_DATE->EditAttrs["readonly"]) && !isset($ivf_semenanalysisreport->PREG_TEST_DATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_semenanalysisreportgrid", "x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PREG_TEST_DATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PREG_TEST_DATE" class="form-group ivf_semenanalysisreport_PREG_TEST_DATE">
<span<?php echo $ivf_semenanalysisreport->PREG_TEST_DATE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->PREG_TEST_DATE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PREG_TEST_DATE" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PREG_TEST_DATE" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PREG_TEST_DATE" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PREG_TEST_DATE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PREG_TEST_DATE" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PREG_TEST_DATE" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PREG_TEST_DATE" value="<?php echo HtmlEncode($ivf_semenanalysisreport->PREG_TEST_DATE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->SPECIFIC_PROBLEMS->Visible) { // SPECIFIC_PROBLEMS ?>
		<td data-name="SPECIFIC_PROBLEMS">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_SPECIFIC_PROBLEMS" class="form-group ivf_semenanalysisreport_SPECIFIC_PROBLEMS">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_SPECIFIC_PROBLEMS" data-value-separator="<?php echo $ivf_semenanalysisreport->SPECIFIC_PROBLEMS->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SPECIFIC_PROBLEMS" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SPECIFIC_PROBLEMS"<?php echo $ivf_semenanalysisreport->SPECIFIC_PROBLEMS->editAttributes() ?>>
		<?php echo $ivf_semenanalysisreport->SPECIFIC_PROBLEMS->selectOptionListHtml("x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SPECIFIC_PROBLEMS") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_SPECIFIC_PROBLEMS" class="form-group ivf_semenanalysisreport_SPECIFIC_PROBLEMS">
<span<?php echo $ivf_semenanalysisreport->SPECIFIC_PROBLEMS->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->SPECIFIC_PROBLEMS->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_SPECIFIC_PROBLEMS" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SPECIFIC_PROBLEMS" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SPECIFIC_PROBLEMS" value="<?php echo HtmlEncode($ivf_semenanalysisreport->SPECIFIC_PROBLEMS->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_SPECIFIC_PROBLEMS" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SPECIFIC_PROBLEMS" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SPECIFIC_PROBLEMS" value="<?php echo HtmlEncode($ivf_semenanalysisreport->SPECIFIC_PROBLEMS->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->IMSC_1->Visible) { // IMSC_1 ?>
		<td data-name="IMSC_1">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_IMSC_1" class="form-group ivf_semenanalysisreport_IMSC_1">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_IMSC_1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->IMSC_1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->IMSC_1->EditValue ?>"<?php echo $ivf_semenanalysisreport->IMSC_1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_IMSC_1" class="form-group ivf_semenanalysisreport_IMSC_1">
<span<?php echo $ivf_semenanalysisreport->IMSC_1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->IMSC_1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IMSC_1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->IMSC_1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IMSC_1" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_1" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_1" value="<?php echo HtmlEncode($ivf_semenanalysisreport->IMSC_1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->IMSC_2->Visible) { // IMSC_2 ?>
		<td data-name="IMSC_2">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_IMSC_2" class="form-group ivf_semenanalysisreport_IMSC_2">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_IMSC_2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->IMSC_2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->IMSC_2->EditValue ?>"<?php echo $ivf_semenanalysisreport->IMSC_2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_IMSC_2" class="form-group ivf_semenanalysisreport_IMSC_2">
<span<?php echo $ivf_semenanalysisreport->IMSC_2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->IMSC_2->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IMSC_2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->IMSC_2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IMSC_2" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_2" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_2" value="<?php echo HtmlEncode($ivf_semenanalysisreport->IMSC_2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->LIQUIFACTION_STORAGE->Visible) { // LIQUIFACTION_STORAGE ?>
		<td data-name="LIQUIFACTION_STORAGE">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_LIQUIFACTION_STORAGE" class="form-group ivf_semenanalysisreport_LIQUIFACTION_STORAGE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_LIQUIFACTION_STORAGE" data-value-separator="<?php echo $ivf_semenanalysisreport->LIQUIFACTION_STORAGE->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_LIQUIFACTION_STORAGE" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_LIQUIFACTION_STORAGE"<?php echo $ivf_semenanalysisreport->LIQUIFACTION_STORAGE->editAttributes() ?>>
		<?php echo $ivf_semenanalysisreport->LIQUIFACTION_STORAGE->selectOptionListHtml("x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_LIQUIFACTION_STORAGE") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_LIQUIFACTION_STORAGE" class="form-group ivf_semenanalysisreport_LIQUIFACTION_STORAGE">
<span<?php echo $ivf_semenanalysisreport->LIQUIFACTION_STORAGE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->LIQUIFACTION_STORAGE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_LIQUIFACTION_STORAGE" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_LIQUIFACTION_STORAGE" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_LIQUIFACTION_STORAGE" value="<?php echo HtmlEncode($ivf_semenanalysisreport->LIQUIFACTION_STORAGE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_LIQUIFACTION_STORAGE" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_LIQUIFACTION_STORAGE" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_LIQUIFACTION_STORAGE" value="<?php echo HtmlEncode($ivf_semenanalysisreport->LIQUIFACTION_STORAGE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->IUI_PREP_METHOD->Visible) { // IUI_PREP_METHOD ?>
		<td data-name="IUI_PREP_METHOD">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_IUI_PREP_METHOD" class="form-group ivf_semenanalysisreport_IUI_PREP_METHOD">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_IUI_PREP_METHOD" data-value-separator="<?php echo $ivf_semenanalysisreport->IUI_PREP_METHOD->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IUI_PREP_METHOD" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IUI_PREP_METHOD"<?php echo $ivf_semenanalysisreport->IUI_PREP_METHOD->editAttributes() ?>>
		<?php echo $ivf_semenanalysisreport->IUI_PREP_METHOD->selectOptionListHtml("x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IUI_PREP_METHOD") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_IUI_PREP_METHOD" class="form-group ivf_semenanalysisreport_IUI_PREP_METHOD">
<span<?php echo $ivf_semenanalysisreport->IUI_PREP_METHOD->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->IUI_PREP_METHOD->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IUI_PREP_METHOD" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IUI_PREP_METHOD" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IUI_PREP_METHOD" value="<?php echo HtmlEncode($ivf_semenanalysisreport->IUI_PREP_METHOD->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IUI_PREP_METHOD" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IUI_PREP_METHOD" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IUI_PREP_METHOD" value="<?php echo HtmlEncode($ivf_semenanalysisreport->IUI_PREP_METHOD->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->TIME_FROM_TRIGGER->Visible) { // TIME_FROM_TRIGGER ?>
		<td data-name="TIME_FROM_TRIGGER">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_TIME_FROM_TRIGGER" class="form-group ivf_semenanalysisreport_TIME_FROM_TRIGGER">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_TRIGGER" data-value-separator="<?php echo $ivf_semenanalysisreport->TIME_FROM_TRIGGER->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_TRIGGER" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_TRIGGER"<?php echo $ivf_semenanalysisreport->TIME_FROM_TRIGGER->editAttributes() ?>>
		<?php echo $ivf_semenanalysisreport->TIME_FROM_TRIGGER->selectOptionListHtml("x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_TRIGGER") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_TIME_FROM_TRIGGER" class="form-group ivf_semenanalysisreport_TIME_FROM_TRIGGER">
<span<?php echo $ivf_semenanalysisreport->TIME_FROM_TRIGGER->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->TIME_FROM_TRIGGER->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_TRIGGER" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_TRIGGER" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_TRIGGER" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TIME_FROM_TRIGGER->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_TRIGGER" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_TRIGGER" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_TRIGGER" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TIME_FROM_TRIGGER->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->Visible) { // COLLECTION_TO_PREPARATION ?>
		<td data-name="COLLECTION_TO_PREPARATION">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION" class="form-group ivf_semenanalysisreport_COLLECTION_TO_PREPARATION">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_COLLECTION_TO_PREPARATION" data-value-separator="<?php echo $ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_COLLECTION_TO_PREPARATION" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_COLLECTION_TO_PREPARATION"<?php echo $ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->editAttributes() ?>>
		<?php echo $ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->selectOptionListHtml("x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_COLLECTION_TO_PREPARATION") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION" class="form-group ivf_semenanalysisreport_COLLECTION_TO_PREPARATION">
<span<?php echo $ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_COLLECTION_TO_PREPARATION" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_COLLECTION_TO_PREPARATION" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_COLLECTION_TO_PREPARATION" value="<?php echo HtmlEncode($ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_COLLECTION_TO_PREPARATION" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_COLLECTION_TO_PREPARATION" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_COLLECTION_TO_PREPARATION" value="<?php echo HtmlEncode($ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->Visible) { // TIME_FROM_PREP_TO_INSEM ?>
		<td data-name="TIME_FROM_PREP_TO_INSEM">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM" class="form-group ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_PREP_TO_INSEM" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->EditValue ?>"<?php echo $ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM" class="form-group ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM">
<span<?php echo $ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_PREP_TO_INSEM" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_PREP_TO_INSEM" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" value="<?php echo HtmlEncode($ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_semenanalysisreport_grid->ListOptions->render("body", "right", $ivf_semenanalysisreport_grid->RowIndex);
?>
<script>
fivf_semenanalysisreportgrid.updateLists(<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($ivf_semenanalysisreport->CurrentMode == "add" || $ivf_semenanalysisreport->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $ivf_semenanalysisreport_grid->FormKeyCountName ?>" id="<?php echo $ivf_semenanalysisreport_grid->FormKeyCountName ?>" value="<?php echo $ivf_semenanalysisreport_grid->KeyCount ?>">
<?php echo $ivf_semenanalysisreport_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $ivf_semenanalysisreport_grid->FormKeyCountName ?>" id="<?php echo $ivf_semenanalysisreport_grid->FormKeyCountName ?>" value="<?php echo $ivf_semenanalysisreport_grid->KeyCount ?>">
<?php echo $ivf_semenanalysisreport_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fivf_semenanalysisreportgrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($ivf_semenanalysisreport_grid->Recordset)
	$ivf_semenanalysisreport_grid->Recordset->Close();
?>
</div>
<?php if ($ivf_semenanalysisreport_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $ivf_semenanalysisreport_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->TotalRecs == 0 && !$ivf_semenanalysisreport->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_semenanalysisreport_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ivf_semenanalysisreport_grid->terminate();
?>
<?php if (!$ivf_semenanalysisreport->isExport()) { ?>
<script>
ew.scrollableTable("gmp_ivf_semenanalysisreport", "95%", "");
</script>
<?php } ?>