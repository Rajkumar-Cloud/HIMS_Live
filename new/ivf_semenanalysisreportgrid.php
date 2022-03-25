<?php
namespace PHPMaker2020\HIMS;

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
<?php if (!$ivf_semenanalysisreport_grid->isExport()) { ?>
<script>
var fivf_semenanalysisreportgrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fivf_semenanalysisreportgrid = new ew.Form("fivf_semenanalysisreportgrid", "grid");
	fivf_semenanalysisreportgrid.formKeyCountName = '<?php echo $ivf_semenanalysisreport_grid->FormKeyCountName ?>';

	// Validate form
	fivf_semenanalysisreportgrid.validate = function() {
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
			<?php if ($ivf_semenanalysisreport_grid->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->id->caption(), $ivf_semenanalysisreport_grid->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->RIDNo->Required) { ?>
				elm = this.getElements("x" + infix + "_RIDNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->RIDNo->caption(), $ivf_semenanalysisreport_grid->RIDNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RIDNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_semenanalysisreport_grid->RIDNo->errorMessage()) ?>");
			<?php if ($ivf_semenanalysisreport_grid->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->PatientName->caption(), $ivf_semenanalysisreport_grid->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->HusbandName->Required) { ?>
				elm = this.getElements("x" + infix + "_HusbandName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->HusbandName->caption(), $ivf_semenanalysisreport_grid->HusbandName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->RequestDr->Required) { ?>
				elm = this.getElements("x" + infix + "_RequestDr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->RequestDr->caption(), $ivf_semenanalysisreport_grid->RequestDr->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->CollectionDate->Required) { ?>
				elm = this.getElements("x" + infix + "_CollectionDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->CollectionDate->caption(), $ivf_semenanalysisreport_grid->CollectionDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CollectionDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_semenanalysisreport_grid->CollectionDate->errorMessage()) ?>");
			<?php if ($ivf_semenanalysisreport_grid->ResultDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ResultDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->ResultDate->caption(), $ivf_semenanalysisreport_grid->ResultDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ResultDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_semenanalysisreport_grid->ResultDate->errorMessage()) ?>");
			<?php if ($ivf_semenanalysisreport_grid->RequestSample->Required) { ?>
				elm = this.getElements("x" + infix + "_RequestSample");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->RequestSample->caption(), $ivf_semenanalysisreport_grid->RequestSample->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->CollectionType->Required) { ?>
				elm = this.getElements("x" + infix + "_CollectionType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->CollectionType->caption(), $ivf_semenanalysisreport_grid->CollectionType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->CollectionMethod->Required) { ?>
				elm = this.getElements("x" + infix + "_CollectionMethod");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->CollectionMethod->caption(), $ivf_semenanalysisreport_grid->CollectionMethod->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->Medicationused->Required) { ?>
				elm = this.getElements("x" + infix + "_Medicationused");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->Medicationused->caption(), $ivf_semenanalysisreport_grid->Medicationused->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->DifficultiesinCollection->Required) { ?>
				elm = this.getElements("x" + infix + "_DifficultiesinCollection");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->DifficultiesinCollection->caption(), $ivf_semenanalysisreport_grid->DifficultiesinCollection->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->pH->Required) { ?>
				elm = this.getElements("x" + infix + "_pH");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->pH->caption(), $ivf_semenanalysisreport_grid->pH->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->Timeofcollection->Required) { ?>
				elm = this.getElements("x" + infix + "_Timeofcollection");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->Timeofcollection->caption(), $ivf_semenanalysisreport_grid->Timeofcollection->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->Timeofexamination->Required) { ?>
				elm = this.getElements("x" + infix + "_Timeofexamination");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->Timeofexamination->caption(), $ivf_semenanalysisreport_grid->Timeofexamination->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->Volume->Required) { ?>
				elm = this.getElements("x" + infix + "_Volume");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->Volume->caption(), $ivf_semenanalysisreport_grid->Volume->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->Concentration->Required) { ?>
				elm = this.getElements("x" + infix + "_Concentration");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->Concentration->caption(), $ivf_semenanalysisreport_grid->Concentration->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->Total->Required) { ?>
				elm = this.getElements("x" + infix + "_Total");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->Total->caption(), $ivf_semenanalysisreport_grid->Total->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->ProgressiveMotility->Required) { ?>
				elm = this.getElements("x" + infix + "_ProgressiveMotility");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->ProgressiveMotility->caption(), $ivf_semenanalysisreport_grid->ProgressiveMotility->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->NonProgrssiveMotile->Required) { ?>
				elm = this.getElements("x" + infix + "_NonProgrssiveMotile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->NonProgrssiveMotile->caption(), $ivf_semenanalysisreport_grid->NonProgrssiveMotile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->Immotile->Required) { ?>
				elm = this.getElements("x" + infix + "_Immotile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->Immotile->caption(), $ivf_semenanalysisreport_grid->Immotile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->TotalProgrssiveMotile->Required) { ?>
				elm = this.getElements("x" + infix + "_TotalProgrssiveMotile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->TotalProgrssiveMotile->caption(), $ivf_semenanalysisreport_grid->TotalProgrssiveMotile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->Appearance->Required) { ?>
				elm = this.getElements("x" + infix + "_Appearance");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->Appearance->caption(), $ivf_semenanalysisreport_grid->Appearance->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->Homogenosity->Required) { ?>
				elm = this.getElements("x" + infix + "_Homogenosity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->Homogenosity->caption(), $ivf_semenanalysisreport_grid->Homogenosity->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->CompleteSample->Required) { ?>
				elm = this.getElements("x" + infix + "_CompleteSample");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->CompleteSample->caption(), $ivf_semenanalysisreport_grid->CompleteSample->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->Liquefactiontime->Required) { ?>
				elm = this.getElements("x" + infix + "_Liquefactiontime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->Liquefactiontime->caption(), $ivf_semenanalysisreport_grid->Liquefactiontime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->Normal->Required) { ?>
				elm = this.getElements("x" + infix + "_Normal");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->Normal->caption(), $ivf_semenanalysisreport_grid->Normal->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->Abnormal->Required) { ?>
				elm = this.getElements("x" + infix + "_Abnormal");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->Abnormal->caption(), $ivf_semenanalysisreport_grid->Abnormal->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->Headdefects->Required) { ?>
				elm = this.getElements("x" + infix + "_Headdefects");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->Headdefects->caption(), $ivf_semenanalysisreport_grid->Headdefects->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->MidpieceDefects->Required) { ?>
				elm = this.getElements("x" + infix + "_MidpieceDefects");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->MidpieceDefects->caption(), $ivf_semenanalysisreport_grid->MidpieceDefects->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->TailDefects->Required) { ?>
				elm = this.getElements("x" + infix + "_TailDefects");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->TailDefects->caption(), $ivf_semenanalysisreport_grid->TailDefects->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->NormalProgMotile->Required) { ?>
				elm = this.getElements("x" + infix + "_NormalProgMotile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->NormalProgMotile->caption(), $ivf_semenanalysisreport_grid->NormalProgMotile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->ImmatureForms->Required) { ?>
				elm = this.getElements("x" + infix + "_ImmatureForms");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->ImmatureForms->caption(), $ivf_semenanalysisreport_grid->ImmatureForms->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->Leucocytes->Required) { ?>
				elm = this.getElements("x" + infix + "_Leucocytes");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->Leucocytes->caption(), $ivf_semenanalysisreport_grid->Leucocytes->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->Agglutination->Required) { ?>
				elm = this.getElements("x" + infix + "_Agglutination");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->Agglutination->caption(), $ivf_semenanalysisreport_grid->Agglutination->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->Debris->Required) { ?>
				elm = this.getElements("x" + infix + "_Debris");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->Debris->caption(), $ivf_semenanalysisreport_grid->Debris->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->Diagnosis->Required) { ?>
				elm = this.getElements("x" + infix + "_Diagnosis");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->Diagnosis->caption(), $ivf_semenanalysisreport_grid->Diagnosis->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->Observations->Required) { ?>
				elm = this.getElements("x" + infix + "_Observations");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->Observations->caption(), $ivf_semenanalysisreport_grid->Observations->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->Signature->Required) { ?>
				elm = this.getElements("x" + infix + "_Signature");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->Signature->caption(), $ivf_semenanalysisreport_grid->Signature->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->SemenOrgin->Required) { ?>
				elm = this.getElements("x" + infix + "_SemenOrgin");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->SemenOrgin->caption(), $ivf_semenanalysisreport_grid->SemenOrgin->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->Donor->Required) { ?>
				elm = this.getElements("x" + infix + "_Donor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->Donor->caption(), $ivf_semenanalysisreport_grid->Donor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->DonorBloodgroup->Required) { ?>
				elm = this.getElements("x" + infix + "_DonorBloodgroup");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->DonorBloodgroup->caption(), $ivf_semenanalysisreport_grid->DonorBloodgroup->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->Tank->Required) { ?>
				elm = this.getElements("x" + infix + "_Tank");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->Tank->caption(), $ivf_semenanalysisreport_grid->Tank->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->Location->Required) { ?>
				elm = this.getElements("x" + infix + "_Location");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->Location->caption(), $ivf_semenanalysisreport_grid->Location->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->Volume1->Required) { ?>
				elm = this.getElements("x" + infix + "_Volume1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->Volume1->caption(), $ivf_semenanalysisreport_grid->Volume1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->Concentration1->Required) { ?>
				elm = this.getElements("x" + infix + "_Concentration1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->Concentration1->caption(), $ivf_semenanalysisreport_grid->Concentration1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->Total1->Required) { ?>
				elm = this.getElements("x" + infix + "_Total1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->Total1->caption(), $ivf_semenanalysisreport_grid->Total1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->ProgressiveMotility1->Required) { ?>
				elm = this.getElements("x" + infix + "_ProgressiveMotility1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->ProgressiveMotility1->caption(), $ivf_semenanalysisreport_grid->ProgressiveMotility1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->NonProgrssiveMotile1->Required) { ?>
				elm = this.getElements("x" + infix + "_NonProgrssiveMotile1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->NonProgrssiveMotile1->caption(), $ivf_semenanalysisreport_grid->NonProgrssiveMotile1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->Immotile1->Required) { ?>
				elm = this.getElements("x" + infix + "_Immotile1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->Immotile1->caption(), $ivf_semenanalysisreport_grid->Immotile1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->TotalProgrssiveMotile1->Required) { ?>
				elm = this.getElements("x" + infix + "_TotalProgrssiveMotile1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->TotalProgrssiveMotile1->caption(), $ivf_semenanalysisreport_grid->TotalProgrssiveMotile1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->TidNo->Required) { ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->TidNo->caption(), $ivf_semenanalysisreport_grid->TidNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_semenanalysisreport_grid->TidNo->errorMessage()) ?>");
			<?php if ($ivf_semenanalysisreport_grid->Color->Required) { ?>
				elm = this.getElements("x" + infix + "_Color");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->Color->caption(), $ivf_semenanalysisreport_grid->Color->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->DoneBy->Required) { ?>
				elm = this.getElements("x" + infix + "_DoneBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->DoneBy->caption(), $ivf_semenanalysisreport_grid->DoneBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->Method->Required) { ?>
				elm = this.getElements("x" + infix + "_Method");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->Method->caption(), $ivf_semenanalysisreport_grid->Method->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->Abstinence->Required) { ?>
				elm = this.getElements("x" + infix + "_Abstinence");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->Abstinence->caption(), $ivf_semenanalysisreport_grid->Abstinence->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->ProcessedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_ProcessedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->ProcessedBy->caption(), $ivf_semenanalysisreport_grid->ProcessedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->InseminationTime->Required) { ?>
				elm = this.getElements("x" + infix + "_InseminationTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->InseminationTime->caption(), $ivf_semenanalysisreport_grid->InseminationTime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->InseminationBy->Required) { ?>
				elm = this.getElements("x" + infix + "_InseminationBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->InseminationBy->caption(), $ivf_semenanalysisreport_grid->InseminationBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->Big->Required) { ?>
				elm = this.getElements("x" + infix + "_Big");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->Big->caption(), $ivf_semenanalysisreport_grid->Big->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->Medium->Required) { ?>
				elm = this.getElements("x" + infix + "_Medium");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->Medium->caption(), $ivf_semenanalysisreport_grid->Medium->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->Small->Required) { ?>
				elm = this.getElements("x" + infix + "_Small");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->Small->caption(), $ivf_semenanalysisreport_grid->Small->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->NoHalo->Required) { ?>
				elm = this.getElements("x" + infix + "_NoHalo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->NoHalo->caption(), $ivf_semenanalysisreport_grid->NoHalo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->Fragmented->Required) { ?>
				elm = this.getElements("x" + infix + "_Fragmented");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->Fragmented->caption(), $ivf_semenanalysisreport_grid->Fragmented->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->NonFragmented->Required) { ?>
				elm = this.getElements("x" + infix + "_NonFragmented");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->NonFragmented->caption(), $ivf_semenanalysisreport_grid->NonFragmented->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->DFI->Required) { ?>
				elm = this.getElements("x" + infix + "_DFI");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->DFI->caption(), $ivf_semenanalysisreport_grid->DFI->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->IsueBy->Required) { ?>
				elm = this.getElements("x" + infix + "_IsueBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->IsueBy->caption(), $ivf_semenanalysisreport_grid->IsueBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->Volume2->Required) { ?>
				elm = this.getElements("x" + infix + "_Volume2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->Volume2->caption(), $ivf_semenanalysisreport_grid->Volume2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->Concentration2->Required) { ?>
				elm = this.getElements("x" + infix + "_Concentration2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->Concentration2->caption(), $ivf_semenanalysisreport_grid->Concentration2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->Total2->Required) { ?>
				elm = this.getElements("x" + infix + "_Total2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->Total2->caption(), $ivf_semenanalysisreport_grid->Total2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->ProgressiveMotility2->Required) { ?>
				elm = this.getElements("x" + infix + "_ProgressiveMotility2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->ProgressiveMotility2->caption(), $ivf_semenanalysisreport_grid->ProgressiveMotility2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->NonProgrssiveMotile2->Required) { ?>
				elm = this.getElements("x" + infix + "_NonProgrssiveMotile2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->NonProgrssiveMotile2->caption(), $ivf_semenanalysisreport_grid->NonProgrssiveMotile2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->Immotile2->Required) { ?>
				elm = this.getElements("x" + infix + "_Immotile2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->Immotile2->caption(), $ivf_semenanalysisreport_grid->Immotile2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->TotalProgrssiveMotile2->Required) { ?>
				elm = this.getElements("x" + infix + "_TotalProgrssiveMotile2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->TotalProgrssiveMotile2->caption(), $ivf_semenanalysisreport_grid->TotalProgrssiveMotile2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->IssuedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_IssuedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->IssuedBy->caption(), $ivf_semenanalysisreport_grid->IssuedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->IssuedTo->Required) { ?>
				elm = this.getElements("x" + infix + "_IssuedTo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->IssuedTo->caption(), $ivf_semenanalysisreport_grid->IssuedTo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->PaID->Required) { ?>
				elm = this.getElements("x" + infix + "_PaID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->PaID->caption(), $ivf_semenanalysisreport_grid->PaID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->PaName->Required) { ?>
				elm = this.getElements("x" + infix + "_PaName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->PaName->caption(), $ivf_semenanalysisreport_grid->PaName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->PaMobile->Required) { ?>
				elm = this.getElements("x" + infix + "_PaMobile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->PaMobile->caption(), $ivf_semenanalysisreport_grid->PaMobile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->PartnerID->Required) { ?>
				elm = this.getElements("x" + infix + "_PartnerID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->PartnerID->caption(), $ivf_semenanalysisreport_grid->PartnerID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->PartnerName->Required) { ?>
				elm = this.getElements("x" + infix + "_PartnerName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->PartnerName->caption(), $ivf_semenanalysisreport_grid->PartnerName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->PartnerMobile->Required) { ?>
				elm = this.getElements("x" + infix + "_PartnerMobile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->PartnerMobile->caption(), $ivf_semenanalysisreport_grid->PartnerMobile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->PREG_TEST_DATE->Required) { ?>
				elm = this.getElements("x" + infix + "_PREG_TEST_DATE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->PREG_TEST_DATE->caption(), $ivf_semenanalysisreport_grid->PREG_TEST_DATE->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PREG_TEST_DATE");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_semenanalysisreport_grid->PREG_TEST_DATE->errorMessage()) ?>");
			<?php if ($ivf_semenanalysisreport_grid->SPECIFIC_PROBLEMS->Required) { ?>
				elm = this.getElements("x" + infix + "_SPECIFIC_PROBLEMS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->SPECIFIC_PROBLEMS->caption(), $ivf_semenanalysisreport_grid->SPECIFIC_PROBLEMS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->IMSC_1->Required) { ?>
				elm = this.getElements("x" + infix + "_IMSC_1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->IMSC_1->caption(), $ivf_semenanalysisreport_grid->IMSC_1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->IMSC_2->Required) { ?>
				elm = this.getElements("x" + infix + "_IMSC_2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->IMSC_2->caption(), $ivf_semenanalysisreport_grid->IMSC_2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->LIQUIFACTION_STORAGE->Required) { ?>
				elm = this.getElements("x" + infix + "_LIQUIFACTION_STORAGE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->LIQUIFACTION_STORAGE->caption(), $ivf_semenanalysisreport_grid->LIQUIFACTION_STORAGE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->IUI_PREP_METHOD->Required) { ?>
				elm = this.getElements("x" + infix + "_IUI_PREP_METHOD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->IUI_PREP_METHOD->caption(), $ivf_semenanalysisreport_grid->IUI_PREP_METHOD->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->TIME_FROM_TRIGGER->Required) { ?>
				elm = this.getElements("x" + infix + "_TIME_FROM_TRIGGER");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->TIME_FROM_TRIGGER->caption(), $ivf_semenanalysisreport_grid->TIME_FROM_TRIGGER->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->COLLECTION_TO_PREPARATION->Required) { ?>
				elm = this.getElements("x" + infix + "_COLLECTION_TO_PREPARATION");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->COLLECTION_TO_PREPARATION->caption(), $ivf_semenanalysisreport_grid->COLLECTION_TO_PREPARATION->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_grid->TIME_FROM_PREP_TO_INSEM->Required) { ?>
				elm = this.getElements("x" + infix + "_TIME_FROM_PREP_TO_INSEM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_grid->TIME_FROM_PREP_TO_INSEM->caption(), $ivf_semenanalysisreport_grid->TIME_FROM_PREP_TO_INSEM->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
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

	// Form_CustomValidate
	fivf_semenanalysisreportgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fivf_semenanalysisreportgrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fivf_semenanalysisreportgrid.lists["x_RequestSample"] = <?php echo $ivf_semenanalysisreport_grid->RequestSample->Lookup->toClientList($ivf_semenanalysisreport_grid) ?>;
	fivf_semenanalysisreportgrid.lists["x_RequestSample"].options = <?php echo JsonEncode($ivf_semenanalysisreport_grid->RequestSample->options(FALSE, TRUE)) ?>;
	fivf_semenanalysisreportgrid.lists["x_CollectionType"] = <?php echo $ivf_semenanalysisreport_grid->CollectionType->Lookup->toClientList($ivf_semenanalysisreport_grid) ?>;
	fivf_semenanalysisreportgrid.lists["x_CollectionType"].options = <?php echo JsonEncode($ivf_semenanalysisreport_grid->CollectionType->options(FALSE, TRUE)) ?>;
	fivf_semenanalysisreportgrid.lists["x_CollectionMethod"] = <?php echo $ivf_semenanalysisreport_grid->CollectionMethod->Lookup->toClientList($ivf_semenanalysisreport_grid) ?>;
	fivf_semenanalysisreportgrid.lists["x_CollectionMethod"].options = <?php echo JsonEncode($ivf_semenanalysisreport_grid->CollectionMethod->options(FALSE, TRUE)) ?>;
	fivf_semenanalysisreportgrid.lists["x_Medicationused"] = <?php echo $ivf_semenanalysisreport_grid->Medicationused->Lookup->toClientList($ivf_semenanalysisreport_grid) ?>;
	fivf_semenanalysisreportgrid.lists["x_Medicationused"].options = <?php echo JsonEncode($ivf_semenanalysisreport_grid->Medicationused->options(FALSE, TRUE)) ?>;
	fivf_semenanalysisreportgrid.lists["x_DifficultiesinCollection"] = <?php echo $ivf_semenanalysisreport_grid->DifficultiesinCollection->Lookup->toClientList($ivf_semenanalysisreport_grid) ?>;
	fivf_semenanalysisreportgrid.lists["x_DifficultiesinCollection"].options = <?php echo JsonEncode($ivf_semenanalysisreport_grid->DifficultiesinCollection->options(FALSE, TRUE)) ?>;
	fivf_semenanalysisreportgrid.lists["x_Homogenosity"] = <?php echo $ivf_semenanalysisreport_grid->Homogenosity->Lookup->toClientList($ivf_semenanalysisreport_grid) ?>;
	fivf_semenanalysisreportgrid.lists["x_Homogenosity"].options = <?php echo JsonEncode($ivf_semenanalysisreport_grid->Homogenosity->options(FALSE, TRUE)) ?>;
	fivf_semenanalysisreportgrid.lists["x_CompleteSample"] = <?php echo $ivf_semenanalysisreport_grid->CompleteSample->Lookup->toClientList($ivf_semenanalysisreport_grid) ?>;
	fivf_semenanalysisreportgrid.lists["x_CompleteSample"].options = <?php echo JsonEncode($ivf_semenanalysisreport_grid->CompleteSample->options(FALSE, TRUE)) ?>;
	fivf_semenanalysisreportgrid.lists["x_SemenOrgin"] = <?php echo $ivf_semenanalysisreport_grid->SemenOrgin->Lookup->toClientList($ivf_semenanalysisreport_grid) ?>;
	fivf_semenanalysisreportgrid.lists["x_SemenOrgin"].options = <?php echo JsonEncode($ivf_semenanalysisreport_grid->SemenOrgin->options(FALSE, TRUE)) ?>;
	fivf_semenanalysisreportgrid.lists["x_Donor"] = <?php echo $ivf_semenanalysisreport_grid->Donor->Lookup->toClientList($ivf_semenanalysisreport_grid) ?>;
	fivf_semenanalysisreportgrid.lists["x_Donor"].options = <?php echo JsonEncode($ivf_semenanalysisreport_grid->Donor->lookupOptions()) ?>;
	fivf_semenanalysisreportgrid.lists["x_SPECIFIC_PROBLEMS"] = <?php echo $ivf_semenanalysisreport_grid->SPECIFIC_PROBLEMS->Lookup->toClientList($ivf_semenanalysisreport_grid) ?>;
	fivf_semenanalysisreportgrid.lists["x_SPECIFIC_PROBLEMS"].options = <?php echo JsonEncode($ivf_semenanalysisreport_grid->SPECIFIC_PROBLEMS->options(FALSE, TRUE)) ?>;
	fivf_semenanalysisreportgrid.lists["x_LIQUIFACTION_STORAGE"] = <?php echo $ivf_semenanalysisreport_grid->LIQUIFACTION_STORAGE->Lookup->toClientList($ivf_semenanalysisreport_grid) ?>;
	fivf_semenanalysisreportgrid.lists["x_LIQUIFACTION_STORAGE"].options = <?php echo JsonEncode($ivf_semenanalysisreport_grid->LIQUIFACTION_STORAGE->options(FALSE, TRUE)) ?>;
	fivf_semenanalysisreportgrid.lists["x_IUI_PREP_METHOD"] = <?php echo $ivf_semenanalysisreport_grid->IUI_PREP_METHOD->Lookup->toClientList($ivf_semenanalysisreport_grid) ?>;
	fivf_semenanalysisreportgrid.lists["x_IUI_PREP_METHOD"].options = <?php echo JsonEncode($ivf_semenanalysisreport_grid->IUI_PREP_METHOD->options(FALSE, TRUE)) ?>;
	fivf_semenanalysisreportgrid.lists["x_TIME_FROM_TRIGGER"] = <?php echo $ivf_semenanalysisreport_grid->TIME_FROM_TRIGGER->Lookup->toClientList($ivf_semenanalysisreport_grid) ?>;
	fivf_semenanalysisreportgrid.lists["x_TIME_FROM_TRIGGER"].options = <?php echo JsonEncode($ivf_semenanalysisreport_grid->TIME_FROM_TRIGGER->options(FALSE, TRUE)) ?>;
	fivf_semenanalysisreportgrid.lists["x_COLLECTION_TO_PREPARATION"] = <?php echo $ivf_semenanalysisreport_grid->COLLECTION_TO_PREPARATION->Lookup->toClientList($ivf_semenanalysisreport_grid) ?>;
	fivf_semenanalysisreportgrid.lists["x_COLLECTION_TO_PREPARATION"].options = <?php echo JsonEncode($ivf_semenanalysisreport_grid->COLLECTION_TO_PREPARATION->options(FALSE, TRUE)) ?>;
	loadjs.done("fivf_semenanalysisreportgrid");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<?php } ?>
<?php
$ivf_semenanalysisreport_grid->renderOtherOptions();
?>
<?php if ($ivf_semenanalysisreport_grid->TotalRecords > 0 || $ivf_semenanalysisreport->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_semenanalysisreport_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_semenanalysisreport">
<?php if ($ivf_semenanalysisreport_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $ivf_semenanalysisreport_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fivf_semenanalysisreportgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_ivf_semenanalysisreport" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_ivf_semenanalysisreportgrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_semenanalysisreport->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_semenanalysisreport_grid->renderListOptions();

// Render list options (header, left)
$ivf_semenanalysisreport_grid->ListOptions->render("header", "left");
?>
<?php if ($ivf_semenanalysisreport_grid->id->Visible) { // id ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->id) == "") { ?>
		<th data-name="id" class="<?php echo $ivf_semenanalysisreport_grid->id->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_id" class="ivf_semenanalysisreport_id"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $ivf_semenanalysisreport_grid->id->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_id" class="ivf_semenanalysisreport_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->RIDNo->Visible) { // RIDNo ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->RIDNo) == "") { ?>
		<th data-name="RIDNo" class="<?php echo $ivf_semenanalysisreport_grid->RIDNo->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_RIDNo" class="ivf_semenanalysisreport_RIDNo"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->RIDNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNo" class="<?php echo $ivf_semenanalysisreport_grid->RIDNo->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_RIDNo" class="ivf_semenanalysisreport_RIDNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->RIDNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->RIDNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->RIDNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->PatientName->Visible) { // PatientName ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $ivf_semenanalysisreport_grid->PatientName->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_PatientName" class="ivf_semenanalysisreport_PatientName"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $ivf_semenanalysisreport_grid->PatientName->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_PatientName" class="ivf_semenanalysisreport_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->HusbandName->Visible) { // HusbandName ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->HusbandName) == "") { ?>
		<th data-name="HusbandName" class="<?php echo $ivf_semenanalysisreport_grid->HusbandName->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_HusbandName" class="ivf_semenanalysisreport_HusbandName"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->HusbandName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HusbandName" class="<?php echo $ivf_semenanalysisreport_grid->HusbandName->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_HusbandName" class="ivf_semenanalysisreport_HusbandName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->HusbandName->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->HusbandName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->HusbandName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->RequestDr->Visible) { // RequestDr ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->RequestDr) == "") { ?>
		<th data-name="RequestDr" class="<?php echo $ivf_semenanalysisreport_grid->RequestDr->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_RequestDr" class="ivf_semenanalysisreport_RequestDr"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->RequestDr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RequestDr" class="<?php echo $ivf_semenanalysisreport_grid->RequestDr->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_RequestDr" class="ivf_semenanalysisreport_RequestDr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->RequestDr->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->RequestDr->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->RequestDr->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->CollectionDate->Visible) { // CollectionDate ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->CollectionDate) == "") { ?>
		<th data-name="CollectionDate" class="<?php echo $ivf_semenanalysisreport_grid->CollectionDate->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_CollectionDate" class="ivf_semenanalysisreport_CollectionDate"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->CollectionDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CollectionDate" class="<?php echo $ivf_semenanalysisreport_grid->CollectionDate->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_CollectionDate" class="ivf_semenanalysisreport_CollectionDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->CollectionDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->CollectionDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->CollectionDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->ResultDate->Visible) { // ResultDate ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->ResultDate) == "") { ?>
		<th data-name="ResultDate" class="<?php echo $ivf_semenanalysisreport_grid->ResultDate->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_ResultDate" class="ivf_semenanalysisreport_ResultDate"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->ResultDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultDate" class="<?php echo $ivf_semenanalysisreport_grid->ResultDate->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_ResultDate" class="ivf_semenanalysisreport_ResultDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->ResultDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->ResultDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->ResultDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->RequestSample->Visible) { // RequestSample ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->RequestSample) == "") { ?>
		<th data-name="RequestSample" class="<?php echo $ivf_semenanalysisreport_grid->RequestSample->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_RequestSample" class="ivf_semenanalysisreport_RequestSample"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->RequestSample->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RequestSample" class="<?php echo $ivf_semenanalysisreport_grid->RequestSample->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_RequestSample" class="ivf_semenanalysisreport_RequestSample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->RequestSample->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->RequestSample->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->RequestSample->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->CollectionType->Visible) { // CollectionType ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->CollectionType) == "") { ?>
		<th data-name="CollectionType" class="<?php echo $ivf_semenanalysisreport_grid->CollectionType->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_CollectionType" class="ivf_semenanalysisreport_CollectionType"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->CollectionType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CollectionType" class="<?php echo $ivf_semenanalysisreport_grid->CollectionType->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_CollectionType" class="ivf_semenanalysisreport_CollectionType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->CollectionType->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->CollectionType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->CollectionType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->CollectionMethod->Visible) { // CollectionMethod ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->CollectionMethod) == "") { ?>
		<th data-name="CollectionMethod" class="<?php echo $ivf_semenanalysisreport_grid->CollectionMethod->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_CollectionMethod" class="ivf_semenanalysisreport_CollectionMethod"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->CollectionMethod->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CollectionMethod" class="<?php echo $ivf_semenanalysisreport_grid->CollectionMethod->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_CollectionMethod" class="ivf_semenanalysisreport_CollectionMethod">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->CollectionMethod->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->CollectionMethod->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->CollectionMethod->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->Medicationused->Visible) { // Medicationused ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->Medicationused) == "") { ?>
		<th data-name="Medicationused" class="<?php echo $ivf_semenanalysisreport_grid->Medicationused->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Medicationused" class="ivf_semenanalysisreport_Medicationused"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Medicationused->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Medicationused" class="<?php echo $ivf_semenanalysisreport_grid->Medicationused->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Medicationused" class="ivf_semenanalysisreport_Medicationused">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Medicationused->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->Medicationused->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->Medicationused->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->DifficultiesinCollection->Visible) { // DifficultiesinCollection ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->DifficultiesinCollection) == "") { ?>
		<th data-name="DifficultiesinCollection" class="<?php echo $ivf_semenanalysisreport_grid->DifficultiesinCollection->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_DifficultiesinCollection" class="ivf_semenanalysisreport_DifficultiesinCollection"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->DifficultiesinCollection->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DifficultiesinCollection" class="<?php echo $ivf_semenanalysisreport_grid->DifficultiesinCollection->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_DifficultiesinCollection" class="ivf_semenanalysisreport_DifficultiesinCollection">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->DifficultiesinCollection->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->DifficultiesinCollection->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->DifficultiesinCollection->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->pH->Visible) { // pH ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->pH) == "") { ?>
		<th data-name="pH" class="<?php echo $ivf_semenanalysisreport_grid->pH->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_pH" class="ivf_semenanalysisreport_pH"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->pH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pH" class="<?php echo $ivf_semenanalysisreport_grid->pH->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_pH" class="ivf_semenanalysisreport_pH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->pH->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->pH->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->pH->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->Timeofcollection->Visible) { // Timeofcollection ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->Timeofcollection) == "") { ?>
		<th data-name="Timeofcollection" class="<?php echo $ivf_semenanalysisreport_grid->Timeofcollection->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Timeofcollection" class="ivf_semenanalysisreport_Timeofcollection"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Timeofcollection->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Timeofcollection" class="<?php echo $ivf_semenanalysisreport_grid->Timeofcollection->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Timeofcollection" class="ivf_semenanalysisreport_Timeofcollection">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Timeofcollection->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->Timeofcollection->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->Timeofcollection->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->Timeofexamination->Visible) { // Timeofexamination ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->Timeofexamination) == "") { ?>
		<th data-name="Timeofexamination" class="<?php echo $ivf_semenanalysisreport_grid->Timeofexamination->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Timeofexamination" class="ivf_semenanalysisreport_Timeofexamination"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Timeofexamination->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Timeofexamination" class="<?php echo $ivf_semenanalysisreport_grid->Timeofexamination->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Timeofexamination" class="ivf_semenanalysisreport_Timeofexamination">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Timeofexamination->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->Timeofexamination->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->Timeofexamination->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->Volume->Visible) { // Volume ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->Volume) == "") { ?>
		<th data-name="Volume" class="<?php echo $ivf_semenanalysisreport_grid->Volume->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Volume" class="ivf_semenanalysisreport_Volume"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Volume->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Volume" class="<?php echo $ivf_semenanalysisreport_grid->Volume->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Volume" class="ivf_semenanalysisreport_Volume">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Volume->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->Volume->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->Volume->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->Concentration->Visible) { // Concentration ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->Concentration) == "") { ?>
		<th data-name="Concentration" class="<?php echo $ivf_semenanalysisreport_grid->Concentration->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Concentration" class="ivf_semenanalysisreport_Concentration"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Concentration->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Concentration" class="<?php echo $ivf_semenanalysisreport_grid->Concentration->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Concentration" class="ivf_semenanalysisreport_Concentration">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Concentration->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->Concentration->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->Concentration->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->Total->Visible) { // Total ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->Total) == "") { ?>
		<th data-name="Total" class="<?php echo $ivf_semenanalysisreport_grid->Total->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Total" class="ivf_semenanalysisreport_Total"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Total->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Total" class="<?php echo $ivf_semenanalysisreport_grid->Total->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Total" class="ivf_semenanalysisreport_Total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Total->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->Total->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->Total->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->ProgressiveMotility->Visible) { // ProgressiveMotility ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->ProgressiveMotility) == "") { ?>
		<th data-name="ProgressiveMotility" class="<?php echo $ivf_semenanalysisreport_grid->ProgressiveMotility->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_ProgressiveMotility" class="ivf_semenanalysisreport_ProgressiveMotility"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->ProgressiveMotility->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProgressiveMotility" class="<?php echo $ivf_semenanalysisreport_grid->ProgressiveMotility->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_ProgressiveMotility" class="ivf_semenanalysisreport_ProgressiveMotility">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->ProgressiveMotility->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->ProgressiveMotility->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->ProgressiveMotility->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->NonProgrssiveMotile->Visible) { // NonProgrssiveMotile ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->NonProgrssiveMotile) == "") { ?>
		<th data-name="NonProgrssiveMotile" class="<?php echo $ivf_semenanalysisreport_grid->NonProgrssiveMotile->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_NonProgrssiveMotile" class="ivf_semenanalysisreport_NonProgrssiveMotile"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->NonProgrssiveMotile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NonProgrssiveMotile" class="<?php echo $ivf_semenanalysisreport_grid->NonProgrssiveMotile->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_NonProgrssiveMotile" class="ivf_semenanalysisreport_NonProgrssiveMotile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->NonProgrssiveMotile->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->NonProgrssiveMotile->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->NonProgrssiveMotile->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->Immotile->Visible) { // Immotile ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->Immotile) == "") { ?>
		<th data-name="Immotile" class="<?php echo $ivf_semenanalysisreport_grid->Immotile->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Immotile" class="ivf_semenanalysisreport_Immotile"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Immotile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Immotile" class="<?php echo $ivf_semenanalysisreport_grid->Immotile->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Immotile" class="ivf_semenanalysisreport_Immotile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Immotile->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->Immotile->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->Immotile->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->TotalProgrssiveMotile->Visible) { // TotalProgrssiveMotile ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->TotalProgrssiveMotile) == "") { ?>
		<th data-name="TotalProgrssiveMotile" class="<?php echo $ivf_semenanalysisreport_grid->TotalProgrssiveMotile->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile" class="ivf_semenanalysisreport_TotalProgrssiveMotile"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->TotalProgrssiveMotile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TotalProgrssiveMotile" class="<?php echo $ivf_semenanalysisreport_grid->TotalProgrssiveMotile->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile" class="ivf_semenanalysisreport_TotalProgrssiveMotile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->TotalProgrssiveMotile->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->TotalProgrssiveMotile->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->TotalProgrssiveMotile->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->Appearance->Visible) { // Appearance ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->Appearance) == "") { ?>
		<th data-name="Appearance" class="<?php echo $ivf_semenanalysisreport_grid->Appearance->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Appearance" class="ivf_semenanalysisreport_Appearance"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Appearance->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Appearance" class="<?php echo $ivf_semenanalysisreport_grid->Appearance->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Appearance" class="ivf_semenanalysisreport_Appearance">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Appearance->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->Appearance->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->Appearance->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->Homogenosity->Visible) { // Homogenosity ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->Homogenosity) == "") { ?>
		<th data-name="Homogenosity" class="<?php echo $ivf_semenanalysisreport_grid->Homogenosity->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Homogenosity" class="ivf_semenanalysisreport_Homogenosity"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Homogenosity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Homogenosity" class="<?php echo $ivf_semenanalysisreport_grid->Homogenosity->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Homogenosity" class="ivf_semenanalysisreport_Homogenosity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Homogenosity->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->Homogenosity->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->Homogenosity->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->CompleteSample->Visible) { // CompleteSample ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->CompleteSample) == "") { ?>
		<th data-name="CompleteSample" class="<?php echo $ivf_semenanalysisreport_grid->CompleteSample->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_CompleteSample" class="ivf_semenanalysisreport_CompleteSample"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->CompleteSample->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CompleteSample" class="<?php echo $ivf_semenanalysisreport_grid->CompleteSample->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_CompleteSample" class="ivf_semenanalysisreport_CompleteSample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->CompleteSample->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->CompleteSample->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->CompleteSample->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->Liquefactiontime->Visible) { // Liquefactiontime ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->Liquefactiontime) == "") { ?>
		<th data-name="Liquefactiontime" class="<?php echo $ivf_semenanalysisreport_grid->Liquefactiontime->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Liquefactiontime" class="ivf_semenanalysisreport_Liquefactiontime"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Liquefactiontime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Liquefactiontime" class="<?php echo $ivf_semenanalysisreport_grid->Liquefactiontime->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Liquefactiontime" class="ivf_semenanalysisreport_Liquefactiontime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Liquefactiontime->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->Liquefactiontime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->Liquefactiontime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->Normal->Visible) { // Normal ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->Normal) == "") { ?>
		<th data-name="Normal" class="<?php echo $ivf_semenanalysisreport_grid->Normal->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Normal" class="ivf_semenanalysisreport_Normal"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Normal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Normal" class="<?php echo $ivf_semenanalysisreport_grid->Normal->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Normal" class="ivf_semenanalysisreport_Normal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Normal->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->Normal->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->Normal->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->Abnormal->Visible) { // Abnormal ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->Abnormal) == "") { ?>
		<th data-name="Abnormal" class="<?php echo $ivf_semenanalysisreport_grid->Abnormal->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Abnormal" class="ivf_semenanalysisreport_Abnormal"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Abnormal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Abnormal" class="<?php echo $ivf_semenanalysisreport_grid->Abnormal->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Abnormal" class="ivf_semenanalysisreport_Abnormal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Abnormal->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->Abnormal->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->Abnormal->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->Headdefects->Visible) { // Headdefects ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->Headdefects) == "") { ?>
		<th data-name="Headdefects" class="<?php echo $ivf_semenanalysisreport_grid->Headdefects->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Headdefects" class="ivf_semenanalysisreport_Headdefects"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Headdefects->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Headdefects" class="<?php echo $ivf_semenanalysisreport_grid->Headdefects->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Headdefects" class="ivf_semenanalysisreport_Headdefects">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Headdefects->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->Headdefects->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->Headdefects->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->MidpieceDefects->Visible) { // MidpieceDefects ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->MidpieceDefects) == "") { ?>
		<th data-name="MidpieceDefects" class="<?php echo $ivf_semenanalysisreport_grid->MidpieceDefects->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_MidpieceDefects" class="ivf_semenanalysisreport_MidpieceDefects"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->MidpieceDefects->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MidpieceDefects" class="<?php echo $ivf_semenanalysisreport_grid->MidpieceDefects->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_MidpieceDefects" class="ivf_semenanalysisreport_MidpieceDefects">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->MidpieceDefects->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->MidpieceDefects->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->MidpieceDefects->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->TailDefects->Visible) { // TailDefects ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->TailDefects) == "") { ?>
		<th data-name="TailDefects" class="<?php echo $ivf_semenanalysisreport_grid->TailDefects->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_TailDefects" class="ivf_semenanalysisreport_TailDefects"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->TailDefects->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TailDefects" class="<?php echo $ivf_semenanalysisreport_grid->TailDefects->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_TailDefects" class="ivf_semenanalysisreport_TailDefects">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->TailDefects->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->TailDefects->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->TailDefects->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->NormalProgMotile->Visible) { // NormalProgMotile ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->NormalProgMotile) == "") { ?>
		<th data-name="NormalProgMotile" class="<?php echo $ivf_semenanalysisreport_grid->NormalProgMotile->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_NormalProgMotile" class="ivf_semenanalysisreport_NormalProgMotile"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->NormalProgMotile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NormalProgMotile" class="<?php echo $ivf_semenanalysisreport_grid->NormalProgMotile->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_NormalProgMotile" class="ivf_semenanalysisreport_NormalProgMotile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->NormalProgMotile->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->NormalProgMotile->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->NormalProgMotile->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->ImmatureForms->Visible) { // ImmatureForms ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->ImmatureForms) == "") { ?>
		<th data-name="ImmatureForms" class="<?php echo $ivf_semenanalysisreport_grid->ImmatureForms->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_ImmatureForms" class="ivf_semenanalysisreport_ImmatureForms"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->ImmatureForms->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ImmatureForms" class="<?php echo $ivf_semenanalysisreport_grid->ImmatureForms->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_ImmatureForms" class="ivf_semenanalysisreport_ImmatureForms">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->ImmatureForms->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->ImmatureForms->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->ImmatureForms->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->Leucocytes->Visible) { // Leucocytes ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->Leucocytes) == "") { ?>
		<th data-name="Leucocytes" class="<?php echo $ivf_semenanalysisreport_grid->Leucocytes->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Leucocytes" class="ivf_semenanalysisreport_Leucocytes"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Leucocytes->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Leucocytes" class="<?php echo $ivf_semenanalysisreport_grid->Leucocytes->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Leucocytes" class="ivf_semenanalysisreport_Leucocytes">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Leucocytes->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->Leucocytes->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->Leucocytes->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->Agglutination->Visible) { // Agglutination ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->Agglutination) == "") { ?>
		<th data-name="Agglutination" class="<?php echo $ivf_semenanalysisreport_grid->Agglutination->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Agglutination" class="ivf_semenanalysisreport_Agglutination"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Agglutination->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Agglutination" class="<?php echo $ivf_semenanalysisreport_grid->Agglutination->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Agglutination" class="ivf_semenanalysisreport_Agglutination">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Agglutination->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->Agglutination->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->Agglutination->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->Debris->Visible) { // Debris ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->Debris) == "") { ?>
		<th data-name="Debris" class="<?php echo $ivf_semenanalysisreport_grid->Debris->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Debris" class="ivf_semenanalysisreport_Debris"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Debris->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Debris" class="<?php echo $ivf_semenanalysisreport_grid->Debris->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Debris" class="ivf_semenanalysisreport_Debris">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Debris->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->Debris->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->Debris->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->Diagnosis->Visible) { // Diagnosis ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->Diagnosis) == "") { ?>
		<th data-name="Diagnosis" class="<?php echo $ivf_semenanalysisreport_grid->Diagnosis->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Diagnosis" class="ivf_semenanalysisreport_Diagnosis"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Diagnosis->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Diagnosis" class="<?php echo $ivf_semenanalysisreport_grid->Diagnosis->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Diagnosis" class="ivf_semenanalysisreport_Diagnosis">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Diagnosis->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->Diagnosis->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->Diagnosis->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->Observations->Visible) { // Observations ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->Observations) == "") { ?>
		<th data-name="Observations" class="<?php echo $ivf_semenanalysisreport_grid->Observations->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Observations" class="ivf_semenanalysisreport_Observations"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Observations->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Observations" class="<?php echo $ivf_semenanalysisreport_grid->Observations->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Observations" class="ivf_semenanalysisreport_Observations">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Observations->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->Observations->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->Observations->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->Signature->Visible) { // Signature ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->Signature) == "") { ?>
		<th data-name="Signature" class="<?php echo $ivf_semenanalysisreport_grid->Signature->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Signature" class="ivf_semenanalysisreport_Signature"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Signature->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Signature" class="<?php echo $ivf_semenanalysisreport_grid->Signature->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Signature" class="ivf_semenanalysisreport_Signature">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Signature->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->Signature->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->Signature->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->SemenOrgin->Visible) { // SemenOrgin ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->SemenOrgin) == "") { ?>
		<th data-name="SemenOrgin" class="<?php echo $ivf_semenanalysisreport_grid->SemenOrgin->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_SemenOrgin" class="ivf_semenanalysisreport_SemenOrgin"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->SemenOrgin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SemenOrgin" class="<?php echo $ivf_semenanalysisreport_grid->SemenOrgin->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_SemenOrgin" class="ivf_semenanalysisreport_SemenOrgin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->SemenOrgin->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->SemenOrgin->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->SemenOrgin->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->Donor->Visible) { // Donor ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->Donor) == "") { ?>
		<th data-name="Donor" class="<?php echo $ivf_semenanalysisreport_grid->Donor->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Donor" class="ivf_semenanalysisreport_Donor"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Donor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Donor" class="<?php echo $ivf_semenanalysisreport_grid->Donor->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Donor" class="ivf_semenanalysisreport_Donor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Donor->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->Donor->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->Donor->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->DonorBloodgroup->Visible) { // DonorBloodgroup ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->DonorBloodgroup) == "") { ?>
		<th data-name="DonorBloodgroup" class="<?php echo $ivf_semenanalysisreport_grid->DonorBloodgroup->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_DonorBloodgroup" class="ivf_semenanalysisreport_DonorBloodgroup"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->DonorBloodgroup->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DonorBloodgroup" class="<?php echo $ivf_semenanalysisreport_grid->DonorBloodgroup->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_DonorBloodgroup" class="ivf_semenanalysisreport_DonorBloodgroup">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->DonorBloodgroup->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->DonorBloodgroup->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->DonorBloodgroup->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->Tank->Visible) { // Tank ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->Tank) == "") { ?>
		<th data-name="Tank" class="<?php echo $ivf_semenanalysisreport_grid->Tank->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Tank" class="ivf_semenanalysisreport_Tank"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Tank->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tank" class="<?php echo $ivf_semenanalysisreport_grid->Tank->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Tank" class="ivf_semenanalysisreport_Tank">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Tank->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->Tank->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->Tank->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->Location->Visible) { // Location ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->Location) == "") { ?>
		<th data-name="Location" class="<?php echo $ivf_semenanalysisreport_grid->Location->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Location" class="ivf_semenanalysisreport_Location"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Location->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Location" class="<?php echo $ivf_semenanalysisreport_grid->Location->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Location" class="ivf_semenanalysisreport_Location">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Location->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->Location->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->Location->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->Volume1->Visible) { // Volume1 ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->Volume1) == "") { ?>
		<th data-name="Volume1" class="<?php echo $ivf_semenanalysisreport_grid->Volume1->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Volume1" class="ivf_semenanalysisreport_Volume1"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Volume1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Volume1" class="<?php echo $ivf_semenanalysisreport_grid->Volume1->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Volume1" class="ivf_semenanalysisreport_Volume1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Volume1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->Volume1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->Volume1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->Concentration1->Visible) { // Concentration1 ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->Concentration1) == "") { ?>
		<th data-name="Concentration1" class="<?php echo $ivf_semenanalysisreport_grid->Concentration1->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Concentration1" class="ivf_semenanalysisreport_Concentration1"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Concentration1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Concentration1" class="<?php echo $ivf_semenanalysisreport_grid->Concentration1->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Concentration1" class="ivf_semenanalysisreport_Concentration1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Concentration1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->Concentration1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->Concentration1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->Total1->Visible) { // Total1 ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->Total1) == "") { ?>
		<th data-name="Total1" class="<?php echo $ivf_semenanalysisreport_grid->Total1->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Total1" class="ivf_semenanalysisreport_Total1"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Total1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Total1" class="<?php echo $ivf_semenanalysisreport_grid->Total1->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Total1" class="ivf_semenanalysisreport_Total1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Total1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->Total1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->Total1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->ProgressiveMotility1->Visible) { // ProgressiveMotility1 ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->ProgressiveMotility1) == "") { ?>
		<th data-name="ProgressiveMotility1" class="<?php echo $ivf_semenanalysisreport_grid->ProgressiveMotility1->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_ProgressiveMotility1" class="ivf_semenanalysisreport_ProgressiveMotility1"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->ProgressiveMotility1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProgressiveMotility1" class="<?php echo $ivf_semenanalysisreport_grid->ProgressiveMotility1->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_ProgressiveMotility1" class="ivf_semenanalysisreport_ProgressiveMotility1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->ProgressiveMotility1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->ProgressiveMotility1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->ProgressiveMotility1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->NonProgrssiveMotile1->Visible) { // NonProgrssiveMotile1 ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->NonProgrssiveMotile1) == "") { ?>
		<th data-name="NonProgrssiveMotile1" class="<?php echo $ivf_semenanalysisreport_grid->NonProgrssiveMotile1->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_NonProgrssiveMotile1" class="ivf_semenanalysisreport_NonProgrssiveMotile1"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->NonProgrssiveMotile1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NonProgrssiveMotile1" class="<?php echo $ivf_semenanalysisreport_grid->NonProgrssiveMotile1->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_NonProgrssiveMotile1" class="ivf_semenanalysisreport_NonProgrssiveMotile1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->NonProgrssiveMotile1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->NonProgrssiveMotile1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->NonProgrssiveMotile1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->Immotile1->Visible) { // Immotile1 ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->Immotile1) == "") { ?>
		<th data-name="Immotile1" class="<?php echo $ivf_semenanalysisreport_grid->Immotile1->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Immotile1" class="ivf_semenanalysisreport_Immotile1"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Immotile1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Immotile1" class="<?php echo $ivf_semenanalysisreport_grid->Immotile1->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Immotile1" class="ivf_semenanalysisreport_Immotile1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Immotile1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->Immotile1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->Immotile1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->TotalProgrssiveMotile1->Visible) { // TotalProgrssiveMotile1 ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->TotalProgrssiveMotile1) == "") { ?>
		<th data-name="TotalProgrssiveMotile1" class="<?php echo $ivf_semenanalysisreport_grid->TotalProgrssiveMotile1->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile1" class="ivf_semenanalysisreport_TotalProgrssiveMotile1"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->TotalProgrssiveMotile1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TotalProgrssiveMotile1" class="<?php echo $ivf_semenanalysisreport_grid->TotalProgrssiveMotile1->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile1" class="ivf_semenanalysisreport_TotalProgrssiveMotile1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->TotalProgrssiveMotile1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->TotalProgrssiveMotile1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->TotalProgrssiveMotile1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->TidNo->Visible) { // TidNo ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $ivf_semenanalysisreport_grid->TidNo->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_TidNo" class="ivf_semenanalysisreport_TidNo"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $ivf_semenanalysisreport_grid->TidNo->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_TidNo" class="ivf_semenanalysisreport_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->TidNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->TidNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->Color->Visible) { // Color ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->Color) == "") { ?>
		<th data-name="Color" class="<?php echo $ivf_semenanalysisreport_grid->Color->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Color" class="ivf_semenanalysisreport_Color"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Color->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Color" class="<?php echo $ivf_semenanalysisreport_grid->Color->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Color" class="ivf_semenanalysisreport_Color">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Color->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->Color->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->Color->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->DoneBy->Visible) { // DoneBy ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->DoneBy) == "") { ?>
		<th data-name="DoneBy" class="<?php echo $ivf_semenanalysisreport_grid->DoneBy->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_DoneBy" class="ivf_semenanalysisreport_DoneBy"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->DoneBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DoneBy" class="<?php echo $ivf_semenanalysisreport_grid->DoneBy->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_DoneBy" class="ivf_semenanalysisreport_DoneBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->DoneBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->DoneBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->DoneBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->Method->Visible) { // Method ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->Method) == "") { ?>
		<th data-name="Method" class="<?php echo $ivf_semenanalysisreport_grid->Method->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Method" class="ivf_semenanalysisreport_Method"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Method->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Method" class="<?php echo $ivf_semenanalysisreport_grid->Method->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Method" class="ivf_semenanalysisreport_Method">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Method->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->Method->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->Method->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->Abstinence->Visible) { // Abstinence ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->Abstinence) == "") { ?>
		<th data-name="Abstinence" class="<?php echo $ivf_semenanalysisreport_grid->Abstinence->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Abstinence" class="ivf_semenanalysisreport_Abstinence"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Abstinence->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Abstinence" class="<?php echo $ivf_semenanalysisreport_grid->Abstinence->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Abstinence" class="ivf_semenanalysisreport_Abstinence">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Abstinence->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->Abstinence->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->Abstinence->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->ProcessedBy->Visible) { // ProcessedBy ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->ProcessedBy) == "") { ?>
		<th data-name="ProcessedBy" class="<?php echo $ivf_semenanalysisreport_grid->ProcessedBy->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_ProcessedBy" class="ivf_semenanalysisreport_ProcessedBy"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->ProcessedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProcessedBy" class="<?php echo $ivf_semenanalysisreport_grid->ProcessedBy->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_ProcessedBy" class="ivf_semenanalysisreport_ProcessedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->ProcessedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->ProcessedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->ProcessedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->InseminationTime->Visible) { // InseminationTime ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->InseminationTime) == "") { ?>
		<th data-name="InseminationTime" class="<?php echo $ivf_semenanalysisreport_grid->InseminationTime->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_InseminationTime" class="ivf_semenanalysisreport_InseminationTime"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->InseminationTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="InseminationTime" class="<?php echo $ivf_semenanalysisreport_grid->InseminationTime->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_InseminationTime" class="ivf_semenanalysisreport_InseminationTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->InseminationTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->InseminationTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->InseminationTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->InseminationBy->Visible) { // InseminationBy ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->InseminationBy) == "") { ?>
		<th data-name="InseminationBy" class="<?php echo $ivf_semenanalysisreport_grid->InseminationBy->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_InseminationBy" class="ivf_semenanalysisreport_InseminationBy"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->InseminationBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="InseminationBy" class="<?php echo $ivf_semenanalysisreport_grid->InseminationBy->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_InseminationBy" class="ivf_semenanalysisreport_InseminationBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->InseminationBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->InseminationBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->InseminationBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->Big->Visible) { // Big ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->Big) == "") { ?>
		<th data-name="Big" class="<?php echo $ivf_semenanalysisreport_grid->Big->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Big" class="ivf_semenanalysisreport_Big"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Big->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Big" class="<?php echo $ivf_semenanalysisreport_grid->Big->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Big" class="ivf_semenanalysisreport_Big">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Big->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->Big->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->Big->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->Medium->Visible) { // Medium ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->Medium) == "") { ?>
		<th data-name="Medium" class="<?php echo $ivf_semenanalysisreport_grid->Medium->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Medium" class="ivf_semenanalysisreport_Medium"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Medium->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Medium" class="<?php echo $ivf_semenanalysisreport_grid->Medium->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Medium" class="ivf_semenanalysisreport_Medium">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Medium->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->Medium->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->Medium->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->Small->Visible) { // Small ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->Small) == "") { ?>
		<th data-name="Small" class="<?php echo $ivf_semenanalysisreport_grid->Small->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Small" class="ivf_semenanalysisreport_Small"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Small->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Small" class="<?php echo $ivf_semenanalysisreport_grid->Small->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Small" class="ivf_semenanalysisreport_Small">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Small->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->Small->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->Small->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->NoHalo->Visible) { // NoHalo ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->NoHalo) == "") { ?>
		<th data-name="NoHalo" class="<?php echo $ivf_semenanalysisreport_grid->NoHalo->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_NoHalo" class="ivf_semenanalysisreport_NoHalo"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->NoHalo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoHalo" class="<?php echo $ivf_semenanalysisreport_grid->NoHalo->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_NoHalo" class="ivf_semenanalysisreport_NoHalo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->NoHalo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->NoHalo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->NoHalo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->Fragmented->Visible) { // Fragmented ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->Fragmented) == "") { ?>
		<th data-name="Fragmented" class="<?php echo $ivf_semenanalysisreport_grid->Fragmented->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Fragmented" class="ivf_semenanalysisreport_Fragmented"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Fragmented->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Fragmented" class="<?php echo $ivf_semenanalysisreport_grid->Fragmented->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Fragmented" class="ivf_semenanalysisreport_Fragmented">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Fragmented->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->Fragmented->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->Fragmented->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->NonFragmented->Visible) { // NonFragmented ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->NonFragmented) == "") { ?>
		<th data-name="NonFragmented" class="<?php echo $ivf_semenanalysisreport_grid->NonFragmented->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_NonFragmented" class="ivf_semenanalysisreport_NonFragmented"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->NonFragmented->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NonFragmented" class="<?php echo $ivf_semenanalysisreport_grid->NonFragmented->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_NonFragmented" class="ivf_semenanalysisreport_NonFragmented">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->NonFragmented->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->NonFragmented->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->NonFragmented->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->DFI->Visible) { // DFI ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->DFI) == "") { ?>
		<th data-name="DFI" class="<?php echo $ivf_semenanalysisreport_grid->DFI->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_DFI" class="ivf_semenanalysisreport_DFI"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->DFI->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DFI" class="<?php echo $ivf_semenanalysisreport_grid->DFI->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_DFI" class="ivf_semenanalysisreport_DFI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->DFI->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->DFI->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->DFI->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->IsueBy->Visible) { // IsueBy ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->IsueBy) == "") { ?>
		<th data-name="IsueBy" class="<?php echo $ivf_semenanalysisreport_grid->IsueBy->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_IsueBy" class="ivf_semenanalysisreport_IsueBy"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->IsueBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IsueBy" class="<?php echo $ivf_semenanalysisreport_grid->IsueBy->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_IsueBy" class="ivf_semenanalysisreport_IsueBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->IsueBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->IsueBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->IsueBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->Volume2->Visible) { // Volume2 ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->Volume2) == "") { ?>
		<th data-name="Volume2" class="<?php echo $ivf_semenanalysisreport_grid->Volume2->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Volume2" class="ivf_semenanalysisreport_Volume2"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Volume2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Volume2" class="<?php echo $ivf_semenanalysisreport_grid->Volume2->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Volume2" class="ivf_semenanalysisreport_Volume2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Volume2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->Volume2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->Volume2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->Concentration2->Visible) { // Concentration2 ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->Concentration2) == "") { ?>
		<th data-name="Concentration2" class="<?php echo $ivf_semenanalysisreport_grid->Concentration2->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Concentration2" class="ivf_semenanalysisreport_Concentration2"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Concentration2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Concentration2" class="<?php echo $ivf_semenanalysisreport_grid->Concentration2->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Concentration2" class="ivf_semenanalysisreport_Concentration2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Concentration2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->Concentration2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->Concentration2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->Total2->Visible) { // Total2 ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->Total2) == "") { ?>
		<th data-name="Total2" class="<?php echo $ivf_semenanalysisreport_grid->Total2->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Total2" class="ivf_semenanalysisreport_Total2"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Total2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Total2" class="<?php echo $ivf_semenanalysisreport_grid->Total2->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Total2" class="ivf_semenanalysisreport_Total2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Total2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->Total2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->Total2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->ProgressiveMotility2->Visible) { // ProgressiveMotility2 ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->ProgressiveMotility2) == "") { ?>
		<th data-name="ProgressiveMotility2" class="<?php echo $ivf_semenanalysisreport_grid->ProgressiveMotility2->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_ProgressiveMotility2" class="ivf_semenanalysisreport_ProgressiveMotility2"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->ProgressiveMotility2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProgressiveMotility2" class="<?php echo $ivf_semenanalysisreport_grid->ProgressiveMotility2->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_ProgressiveMotility2" class="ivf_semenanalysisreport_ProgressiveMotility2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->ProgressiveMotility2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->ProgressiveMotility2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->ProgressiveMotility2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->NonProgrssiveMotile2->Visible) { // NonProgrssiveMotile2 ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->NonProgrssiveMotile2) == "") { ?>
		<th data-name="NonProgrssiveMotile2" class="<?php echo $ivf_semenanalysisreport_grid->NonProgrssiveMotile2->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_NonProgrssiveMotile2" class="ivf_semenanalysisreport_NonProgrssiveMotile2"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->NonProgrssiveMotile2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NonProgrssiveMotile2" class="<?php echo $ivf_semenanalysisreport_grid->NonProgrssiveMotile2->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_NonProgrssiveMotile2" class="ivf_semenanalysisreport_NonProgrssiveMotile2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->NonProgrssiveMotile2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->NonProgrssiveMotile2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->NonProgrssiveMotile2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->Immotile2->Visible) { // Immotile2 ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->Immotile2) == "") { ?>
		<th data-name="Immotile2" class="<?php echo $ivf_semenanalysisreport_grid->Immotile2->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Immotile2" class="ivf_semenanalysisreport_Immotile2"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Immotile2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Immotile2" class="<?php echo $ivf_semenanalysisreport_grid->Immotile2->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_Immotile2" class="ivf_semenanalysisreport_Immotile2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->Immotile2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->Immotile2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->Immotile2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->TotalProgrssiveMotile2->Visible) { // TotalProgrssiveMotile2 ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->TotalProgrssiveMotile2) == "") { ?>
		<th data-name="TotalProgrssiveMotile2" class="<?php echo $ivf_semenanalysisreport_grid->TotalProgrssiveMotile2->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile2" class="ivf_semenanalysisreport_TotalProgrssiveMotile2"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->TotalProgrssiveMotile2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TotalProgrssiveMotile2" class="<?php echo $ivf_semenanalysisreport_grid->TotalProgrssiveMotile2->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile2" class="ivf_semenanalysisreport_TotalProgrssiveMotile2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->TotalProgrssiveMotile2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->TotalProgrssiveMotile2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->TotalProgrssiveMotile2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->IssuedBy->Visible) { // IssuedBy ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->IssuedBy) == "") { ?>
		<th data-name="IssuedBy" class="<?php echo $ivf_semenanalysisreport_grid->IssuedBy->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_IssuedBy" class="ivf_semenanalysisreport_IssuedBy"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->IssuedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IssuedBy" class="<?php echo $ivf_semenanalysisreport_grid->IssuedBy->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_IssuedBy" class="ivf_semenanalysisreport_IssuedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->IssuedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->IssuedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->IssuedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->IssuedTo->Visible) { // IssuedTo ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->IssuedTo) == "") { ?>
		<th data-name="IssuedTo" class="<?php echo $ivf_semenanalysisreport_grid->IssuedTo->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_IssuedTo" class="ivf_semenanalysisreport_IssuedTo"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->IssuedTo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IssuedTo" class="<?php echo $ivf_semenanalysisreport_grid->IssuedTo->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_IssuedTo" class="ivf_semenanalysisreport_IssuedTo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->IssuedTo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->IssuedTo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->IssuedTo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->PaID->Visible) { // PaID ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->PaID) == "") { ?>
		<th data-name="PaID" class="<?php echo $ivf_semenanalysisreport_grid->PaID->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_PaID" class="ivf_semenanalysisreport_PaID"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->PaID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaID" class="<?php echo $ivf_semenanalysisreport_grid->PaID->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_PaID" class="ivf_semenanalysisreport_PaID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->PaID->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->PaID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->PaID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->PaName->Visible) { // PaName ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->PaName) == "") { ?>
		<th data-name="PaName" class="<?php echo $ivf_semenanalysisreport_grid->PaName->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_PaName" class="ivf_semenanalysisreport_PaName"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->PaName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaName" class="<?php echo $ivf_semenanalysisreport_grid->PaName->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_PaName" class="ivf_semenanalysisreport_PaName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->PaName->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->PaName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->PaName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->PaMobile->Visible) { // PaMobile ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->PaMobile) == "") { ?>
		<th data-name="PaMobile" class="<?php echo $ivf_semenanalysisreport_grid->PaMobile->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_PaMobile" class="ivf_semenanalysisreport_PaMobile"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->PaMobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaMobile" class="<?php echo $ivf_semenanalysisreport_grid->PaMobile->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_PaMobile" class="ivf_semenanalysisreport_PaMobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->PaMobile->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->PaMobile->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->PaMobile->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->PartnerID->Visible) { // PartnerID ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->PartnerID) == "") { ?>
		<th data-name="PartnerID" class="<?php echo $ivf_semenanalysisreport_grid->PartnerID->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_PartnerID" class="ivf_semenanalysisreport_PartnerID"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->PartnerID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerID" class="<?php echo $ivf_semenanalysisreport_grid->PartnerID->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_PartnerID" class="ivf_semenanalysisreport_PartnerID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->PartnerID->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->PartnerID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->PartnerID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->PartnerName->Visible) { // PartnerName ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->PartnerName) == "") { ?>
		<th data-name="PartnerName" class="<?php echo $ivf_semenanalysisreport_grid->PartnerName->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_PartnerName" class="ivf_semenanalysisreport_PartnerName"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->PartnerName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerName" class="<?php echo $ivf_semenanalysisreport_grid->PartnerName->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_PartnerName" class="ivf_semenanalysisreport_PartnerName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->PartnerName->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->PartnerName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->PartnerName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->PartnerMobile->Visible) { // PartnerMobile ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->PartnerMobile) == "") { ?>
		<th data-name="PartnerMobile" class="<?php echo $ivf_semenanalysisreport_grid->PartnerMobile->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_PartnerMobile" class="ivf_semenanalysisreport_PartnerMobile"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->PartnerMobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerMobile" class="<?php echo $ivf_semenanalysisreport_grid->PartnerMobile->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_PartnerMobile" class="ivf_semenanalysisreport_PartnerMobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->PartnerMobile->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->PartnerMobile->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->PartnerMobile->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->PREG_TEST_DATE) == "") { ?>
		<th data-name="PREG_TEST_DATE" class="<?php echo $ivf_semenanalysisreport_grid->PREG_TEST_DATE->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_PREG_TEST_DATE" class="ivf_semenanalysisreport_PREG_TEST_DATE"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->PREG_TEST_DATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PREG_TEST_DATE" class="<?php echo $ivf_semenanalysisreport_grid->PREG_TEST_DATE->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_PREG_TEST_DATE" class="ivf_semenanalysisreport_PREG_TEST_DATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->PREG_TEST_DATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->PREG_TEST_DATE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->PREG_TEST_DATE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->SPECIFIC_PROBLEMS->Visible) { // SPECIFIC_PROBLEMS ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->SPECIFIC_PROBLEMS) == "") { ?>
		<th data-name="SPECIFIC_PROBLEMS" class="<?php echo $ivf_semenanalysisreport_grid->SPECIFIC_PROBLEMS->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_SPECIFIC_PROBLEMS" class="ivf_semenanalysisreport_SPECIFIC_PROBLEMS"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->SPECIFIC_PROBLEMS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SPECIFIC_PROBLEMS" class="<?php echo $ivf_semenanalysisreport_grid->SPECIFIC_PROBLEMS->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_SPECIFIC_PROBLEMS" class="ivf_semenanalysisreport_SPECIFIC_PROBLEMS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->SPECIFIC_PROBLEMS->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->SPECIFIC_PROBLEMS->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->SPECIFIC_PROBLEMS->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->IMSC_1->Visible) { // IMSC_1 ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->IMSC_1) == "") { ?>
		<th data-name="IMSC_1" class="<?php echo $ivf_semenanalysisreport_grid->IMSC_1->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_IMSC_1" class="ivf_semenanalysisreport_IMSC_1"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->IMSC_1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IMSC_1" class="<?php echo $ivf_semenanalysisreport_grid->IMSC_1->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_IMSC_1" class="ivf_semenanalysisreport_IMSC_1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->IMSC_1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->IMSC_1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->IMSC_1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->IMSC_2->Visible) { // IMSC_2 ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->IMSC_2) == "") { ?>
		<th data-name="IMSC_2" class="<?php echo $ivf_semenanalysisreport_grid->IMSC_2->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_IMSC_2" class="ivf_semenanalysisreport_IMSC_2"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->IMSC_2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IMSC_2" class="<?php echo $ivf_semenanalysisreport_grid->IMSC_2->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_IMSC_2" class="ivf_semenanalysisreport_IMSC_2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->IMSC_2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->IMSC_2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->IMSC_2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->LIQUIFACTION_STORAGE->Visible) { // LIQUIFACTION_STORAGE ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->LIQUIFACTION_STORAGE) == "") { ?>
		<th data-name="LIQUIFACTION_STORAGE" class="<?php echo $ivf_semenanalysisreport_grid->LIQUIFACTION_STORAGE->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_LIQUIFACTION_STORAGE" class="ivf_semenanalysisreport_LIQUIFACTION_STORAGE"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->LIQUIFACTION_STORAGE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LIQUIFACTION_STORAGE" class="<?php echo $ivf_semenanalysisreport_grid->LIQUIFACTION_STORAGE->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_LIQUIFACTION_STORAGE" class="ivf_semenanalysisreport_LIQUIFACTION_STORAGE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->LIQUIFACTION_STORAGE->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->LIQUIFACTION_STORAGE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->LIQUIFACTION_STORAGE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->IUI_PREP_METHOD->Visible) { // IUI_PREP_METHOD ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->IUI_PREP_METHOD) == "") { ?>
		<th data-name="IUI_PREP_METHOD" class="<?php echo $ivf_semenanalysisreport_grid->IUI_PREP_METHOD->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_IUI_PREP_METHOD" class="ivf_semenanalysisreport_IUI_PREP_METHOD"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->IUI_PREP_METHOD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IUI_PREP_METHOD" class="<?php echo $ivf_semenanalysisreport_grid->IUI_PREP_METHOD->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_IUI_PREP_METHOD" class="ivf_semenanalysisreport_IUI_PREP_METHOD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->IUI_PREP_METHOD->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->IUI_PREP_METHOD->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->IUI_PREP_METHOD->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->TIME_FROM_TRIGGER->Visible) { // TIME_FROM_TRIGGER ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->TIME_FROM_TRIGGER) == "") { ?>
		<th data-name="TIME_FROM_TRIGGER" class="<?php echo $ivf_semenanalysisreport_grid->TIME_FROM_TRIGGER->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_TIME_FROM_TRIGGER" class="ivf_semenanalysisreport_TIME_FROM_TRIGGER"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->TIME_FROM_TRIGGER->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TIME_FROM_TRIGGER" class="<?php echo $ivf_semenanalysisreport_grid->TIME_FROM_TRIGGER->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_TIME_FROM_TRIGGER" class="ivf_semenanalysisreport_TIME_FROM_TRIGGER">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->TIME_FROM_TRIGGER->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->TIME_FROM_TRIGGER->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->TIME_FROM_TRIGGER->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->COLLECTION_TO_PREPARATION->Visible) { // COLLECTION_TO_PREPARATION ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->COLLECTION_TO_PREPARATION) == "") { ?>
		<th data-name="COLLECTION_TO_PREPARATION" class="<?php echo $ivf_semenanalysisreport_grid->COLLECTION_TO_PREPARATION->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION" class="ivf_semenanalysisreport_COLLECTION_TO_PREPARATION"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->COLLECTION_TO_PREPARATION->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="COLLECTION_TO_PREPARATION" class="<?php echo $ivf_semenanalysisreport_grid->COLLECTION_TO_PREPARATION->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION" class="ivf_semenanalysisreport_COLLECTION_TO_PREPARATION">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->COLLECTION_TO_PREPARATION->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->COLLECTION_TO_PREPARATION->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->COLLECTION_TO_PREPARATION->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->TIME_FROM_PREP_TO_INSEM->Visible) { // TIME_FROM_PREP_TO_INSEM ?>
	<?php if ($ivf_semenanalysisreport_grid->SortUrl($ivf_semenanalysisreport_grid->TIME_FROM_PREP_TO_INSEM) == "") { ?>
		<th data-name="TIME_FROM_PREP_TO_INSEM" class="<?php echo $ivf_semenanalysisreport_grid->TIME_FROM_PREP_TO_INSEM->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM" class="ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->TIME_FROM_PREP_TO_INSEM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TIME_FROM_PREP_TO_INSEM" class="<?php echo $ivf_semenanalysisreport_grid->TIME_FROM_PREP_TO_INSEM->headerCellClass() ?>"><div><div id="elh_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM" class="ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_grid->TIME_FROM_PREP_TO_INSEM->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_grid->TIME_FROM_PREP_TO_INSEM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_grid->TIME_FROM_PREP_TO_INSEM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
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
$ivf_semenanalysisreport_grid->StartRecord = 1;
$ivf_semenanalysisreport_grid->StopRecord = $ivf_semenanalysisreport_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($ivf_semenanalysisreport->isConfirm() || $ivf_semenanalysisreport_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($ivf_semenanalysisreport_grid->FormKeyCountName) && ($ivf_semenanalysisreport_grid->isGridAdd() || $ivf_semenanalysisreport_grid->isGridEdit() || $ivf_semenanalysisreport->isConfirm())) {
		$ivf_semenanalysisreport_grid->KeyCount = $CurrentForm->getValue($ivf_semenanalysisreport_grid->FormKeyCountName);
		$ivf_semenanalysisreport_grid->StopRecord = $ivf_semenanalysisreport_grid->StartRecord + $ivf_semenanalysisreport_grid->KeyCount - 1;
	}
}
$ivf_semenanalysisreport_grid->RecordCount = $ivf_semenanalysisreport_grid->StartRecord - 1;
if ($ivf_semenanalysisreport_grid->Recordset && !$ivf_semenanalysisreport_grid->Recordset->EOF) {
	$ivf_semenanalysisreport_grid->Recordset->moveFirst();
	$selectLimit = $ivf_semenanalysisreport_grid->UseSelectLimit;
	if (!$selectLimit && $ivf_semenanalysisreport_grid->StartRecord > 1)
		$ivf_semenanalysisreport_grid->Recordset->move($ivf_semenanalysisreport_grid->StartRecord - 1);
} elseif (!$ivf_semenanalysisreport->AllowAddDeleteRow && $ivf_semenanalysisreport_grid->StopRecord == 0) {
	$ivf_semenanalysisreport_grid->StopRecord = $ivf_semenanalysisreport->GridAddRowCount;
}

// Initialize aggregate
$ivf_semenanalysisreport->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_semenanalysisreport->resetAttributes();
$ivf_semenanalysisreport_grid->renderRow();
if ($ivf_semenanalysisreport_grid->isGridAdd())
	$ivf_semenanalysisreport_grid->RowIndex = 0;
if ($ivf_semenanalysisreport_grid->isGridEdit())
	$ivf_semenanalysisreport_grid->RowIndex = 0;
while ($ivf_semenanalysisreport_grid->RecordCount < $ivf_semenanalysisreport_grid->StopRecord) {
	$ivf_semenanalysisreport_grid->RecordCount++;
	if ($ivf_semenanalysisreport_grid->RecordCount >= $ivf_semenanalysisreport_grid->StartRecord) {
		$ivf_semenanalysisreport_grid->RowCount++;
		if ($ivf_semenanalysisreport_grid->isGridAdd() || $ivf_semenanalysisreport_grid->isGridEdit() || $ivf_semenanalysisreport->isConfirm()) {
			$ivf_semenanalysisreport_grid->RowIndex++;
			$CurrentForm->Index = $ivf_semenanalysisreport_grid->RowIndex;
			if ($CurrentForm->hasValue($ivf_semenanalysisreport_grid->FormActionName) && ($ivf_semenanalysisreport->isConfirm() || $ivf_semenanalysisreport_grid->EventCancelled))
				$ivf_semenanalysisreport_grid->RowAction = strval($CurrentForm->getValue($ivf_semenanalysisreport_grid->FormActionName));
			elseif ($ivf_semenanalysisreport_grid->isGridAdd())
				$ivf_semenanalysisreport_grid->RowAction = "insert";
			else
				$ivf_semenanalysisreport_grid->RowAction = "";
		}

		// Set up key count
		$ivf_semenanalysisreport_grid->KeyCount = $ivf_semenanalysisreport_grid->RowIndex;

		// Init row class and style
		$ivf_semenanalysisreport->resetAttributes();
		$ivf_semenanalysisreport->CssClass = "";
		if ($ivf_semenanalysisreport_grid->isGridAdd()) {
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
		if ($ivf_semenanalysisreport_grid->isGridAdd()) // Grid add
			$ivf_semenanalysisreport->RowType = ROWTYPE_ADD; // Render add
		if ($ivf_semenanalysisreport_grid->isGridAdd() && $ivf_semenanalysisreport->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$ivf_semenanalysisreport_grid->restoreCurrentRowFormValues($ivf_semenanalysisreport_grid->RowIndex); // Restore form values
		if ($ivf_semenanalysisreport_grid->isGridEdit()) { // Grid edit
			if ($ivf_semenanalysisreport->EventCancelled)
				$ivf_semenanalysisreport_grid->restoreCurrentRowFormValues($ivf_semenanalysisreport_grid->RowIndex); // Restore form values
			if ($ivf_semenanalysisreport_grid->RowAction == "insert")
				$ivf_semenanalysisreport->RowType = ROWTYPE_ADD; // Render add
			else
				$ivf_semenanalysisreport->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($ivf_semenanalysisreport_grid->isGridEdit() && ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT || $ivf_semenanalysisreport->RowType == ROWTYPE_ADD) && $ivf_semenanalysisreport->EventCancelled) // Update failed
			$ivf_semenanalysisreport_grid->restoreCurrentRowFormValues($ivf_semenanalysisreport_grid->RowIndex); // Restore form values
		if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) // Edit row
			$ivf_semenanalysisreport_grid->EditRowCount++;
		if ($ivf_semenanalysisreport->isConfirm()) // Confirm row
			$ivf_semenanalysisreport_grid->restoreCurrentRowFormValues($ivf_semenanalysisreport_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$ivf_semenanalysisreport->RowAttrs->merge(["data-rowindex" => $ivf_semenanalysisreport_grid->RowCount, "id" => "r" . $ivf_semenanalysisreport_grid->RowCount . "_ivf_semenanalysisreport", "data-rowtype" => $ivf_semenanalysisreport->RowType]);

		// Render row
		$ivf_semenanalysisreport_grid->renderRow();

		// Render list options
		$ivf_semenanalysisreport_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($ivf_semenanalysisreport_grid->RowAction != "delete" && $ivf_semenanalysisreport_grid->RowAction != "insertdelete" && !($ivf_semenanalysisreport_grid->RowAction == "insert" && $ivf_semenanalysisreport->isConfirm() && $ivf_semenanalysisreport_grid->emptyRow())) {
?>
	<tr <?php echo $ivf_semenanalysisreport->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_semenanalysisreport_grid->ListOptions->render("body", "left", $ivf_semenanalysisreport_grid->RowCount);
?>
	<?php if ($ivf_semenanalysisreport_grid->id->Visible) { // id ?>
		<td data-name="id" <?php echo $ivf_semenanalysisreport_grid->id->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_id" class="form-group"></span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_id" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_id" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_id" class="form-group">
<span<?php echo $ivf_semenanalysisreport_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_id" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_id" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_id">
<span<?php echo $ivf_semenanalysisreport_grid->id->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->id->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_id" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_id" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->id->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_id" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_id" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_id" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_id" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->id->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_id" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_id" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->RIDNo->Visible) { // RIDNo ?>
		<td data-name="RIDNo" <?php echo $ivf_semenanalysisreport_grid->RIDNo->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($ivf_semenanalysisreport_grid->RIDNo->getSessionValue() != "") { ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_RIDNo" class="form-group">
<span<?php echo $ivf_semenanalysisreport_grid->RIDNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->RIDNo->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->RIDNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_RIDNo" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_RIDNo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" size="30" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->RIDNo->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->RIDNo->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->RIDNo->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RIDNo" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->RIDNo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($ivf_semenanalysisreport_grid->RIDNo->getSessionValue() != "") { ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_RIDNo" class="form-group">
<span<?php echo $ivf_semenanalysisreport_grid->RIDNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->RIDNo->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->RIDNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_RIDNo" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_RIDNo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" size="30" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->RIDNo->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->RIDNo->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->RIDNo->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_RIDNo">
<span<?php echo $ivf_semenanalysisreport_grid->RIDNo->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->RIDNo->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RIDNo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->RIDNo->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RIDNo" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->RIDNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RIDNo" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->RIDNo->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RIDNo" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->RIDNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $ivf_semenanalysisreport_grid->PatientName->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($ivf_semenanalysisreport_grid->PatientName->getSessionValue() != "") { ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_PatientName" class="form-group">
<span<?php echo $ivf_semenanalysisreport_grid->PatientName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->PatientName->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PatientName->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_PatientName" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PatientName" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PatientName->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->PatientName->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->PatientName->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PatientName" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($ivf_semenanalysisreport_grid->PatientName->getSessionValue() != "") { ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_PatientName" class="form-group">
<span<?php echo $ivf_semenanalysisreport_grid->PatientName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->PatientName->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PatientName->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_PatientName" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PatientName" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PatientName->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->PatientName->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->PatientName->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_PatientName">
<span<?php echo $ivf_semenanalysisreport_grid->PatientName->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->PatientName->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PatientName" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PatientName->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PatientName" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PatientName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PatientName" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PatientName->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PatientName" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PatientName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->HusbandName->Visible) { // HusbandName ?>
		<td data-name="HusbandName" <?php echo $ivf_semenanalysisreport_grid->HusbandName->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_HusbandName" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_HusbandName" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_HusbandName" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_HusbandName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->HusbandName->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->HusbandName->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->HusbandName->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_HusbandName" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_HusbandName" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_HusbandName" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->HusbandName->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_HusbandName" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_HusbandName" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_HusbandName" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_HusbandName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->HusbandName->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->HusbandName->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->HusbandName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_HusbandName">
<span<?php echo $ivf_semenanalysisreport_grid->HusbandName->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->HusbandName->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_HusbandName" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_HusbandName" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_HusbandName" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->HusbandName->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_HusbandName" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_HusbandName" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_HusbandName" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->HusbandName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_HusbandName" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_HusbandName" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_HusbandName" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->HusbandName->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_HusbandName" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_HusbandName" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_HusbandName" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->HusbandName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->RequestDr->Visible) { // RequestDr ?>
		<td data-name="RequestDr" <?php echo $ivf_semenanalysisreport_grid->RequestDr->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_RequestDr" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_RequestDr" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestDr" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestDr" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->RequestDr->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->RequestDr->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->RequestDr->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RequestDr" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestDr" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestDr" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->RequestDr->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_RequestDr" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_RequestDr" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestDr" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestDr" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->RequestDr->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->RequestDr->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->RequestDr->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_RequestDr">
<span<?php echo $ivf_semenanalysisreport_grid->RequestDr->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->RequestDr->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RequestDr" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestDr" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestDr" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->RequestDr->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RequestDr" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestDr" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestDr" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->RequestDr->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RequestDr" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestDr" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestDr" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->RequestDr->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RequestDr" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestDr" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestDr" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->RequestDr->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->CollectionDate->Visible) { // CollectionDate ?>
		<td data-name="CollectionDate" <?php echo $ivf_semenanalysisreport_grid->CollectionDate->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_CollectionDate" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_CollectionDate" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionDate" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionDate" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->CollectionDate->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->CollectionDate->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->CollectionDate->editAttributes() ?>>
<?php if (!$ivf_semenanalysisreport_grid->CollectionDate->ReadOnly && !$ivf_semenanalysisreport_grid->CollectionDate->Disabled && !isset($ivf_semenanalysisreport_grid->CollectionDate->EditAttrs["readonly"]) && !isset($ivf_semenanalysisreport_grid->CollectionDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_semenanalysisreportgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_semenanalysisreportgrid", "x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionDate" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionDate" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionDate" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->CollectionDate->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_CollectionDate" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_CollectionDate" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionDate" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionDate" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->CollectionDate->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->CollectionDate->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->CollectionDate->editAttributes() ?>>
<?php if (!$ivf_semenanalysisreport_grid->CollectionDate->ReadOnly && !$ivf_semenanalysisreport_grid->CollectionDate->Disabled && !isset($ivf_semenanalysisreport_grid->CollectionDate->EditAttrs["readonly"]) && !isset($ivf_semenanalysisreport_grid->CollectionDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_semenanalysisreportgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_semenanalysisreportgrid", "x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_CollectionDate">
<span<?php echo $ivf_semenanalysisreport_grid->CollectionDate->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->CollectionDate->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionDate" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionDate" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionDate" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->CollectionDate->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionDate" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionDate" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionDate" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->CollectionDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionDate" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionDate" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionDate" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->CollectionDate->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionDate" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionDate" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionDate" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->CollectionDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate" <?php echo $ivf_semenanalysisreport_grid->ResultDate->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_ResultDate" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_ResultDate" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ResultDate" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ResultDate" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ResultDate->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->ResultDate->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->ResultDate->editAttributes() ?>>
<?php if (!$ivf_semenanalysisreport_grid->ResultDate->ReadOnly && !$ivf_semenanalysisreport_grid->ResultDate->Disabled && !isset($ivf_semenanalysisreport_grid->ResultDate->EditAttrs["readonly"]) && !isset($ivf_semenanalysisreport_grid->ResultDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_semenanalysisreportgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_semenanalysisreportgrid", "x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ResultDate" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ResultDate" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ResultDate->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_ResultDate" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_ResultDate" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ResultDate" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ResultDate" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ResultDate->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->ResultDate->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->ResultDate->editAttributes() ?>>
<?php if (!$ivf_semenanalysisreport_grid->ResultDate->ReadOnly && !$ivf_semenanalysisreport_grid->ResultDate->Disabled && !isset($ivf_semenanalysisreport_grid->ResultDate->EditAttrs["readonly"]) && !isset($ivf_semenanalysisreport_grid->ResultDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_semenanalysisreportgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_semenanalysisreportgrid", "x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_ResultDate">
<span<?php echo $ivf_semenanalysisreport_grid->ResultDate->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->ResultDate->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ResultDate" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ResultDate" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ResultDate->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ResultDate" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ResultDate" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ResultDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ResultDate" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ResultDate" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ResultDate->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ResultDate" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ResultDate" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ResultDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->RequestSample->Visible) { // RequestSample ?>
		<td data-name="RequestSample" <?php echo $ivf_semenanalysisreport_grid->RequestSample->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_RequestSample" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_RequestSample" data-value-separator="<?php echo $ivf_semenanalysisreport_grid->RequestSample->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestSample" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestSample"<?php echo $ivf_semenanalysisreport_grid->RequestSample->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_grid->RequestSample->selectOptionListHtml("x{$ivf_semenanalysisreport_grid->RowIndex}_RequestSample") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RequestSample" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestSample" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestSample" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->RequestSample->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_RequestSample" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_RequestSample" data-value-separator="<?php echo $ivf_semenanalysisreport_grid->RequestSample->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestSample" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestSample"<?php echo $ivf_semenanalysisreport_grid->RequestSample->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_grid->RequestSample->selectOptionListHtml("x{$ivf_semenanalysisreport_grid->RowIndex}_RequestSample") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_RequestSample">
<span<?php echo $ivf_semenanalysisreport_grid->RequestSample->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->RequestSample->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RequestSample" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestSample" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestSample" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->RequestSample->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RequestSample" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestSample" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestSample" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->RequestSample->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RequestSample" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestSample" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestSample" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->RequestSample->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RequestSample" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestSample" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestSample" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->RequestSample->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->CollectionType->Visible) { // CollectionType ?>
		<td data-name="CollectionType" <?php echo $ivf_semenanalysisreport_grid->CollectionType->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_CollectionType" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_CollectionType" data-value-separator="<?php echo $ivf_semenanalysisreport_grid->CollectionType->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionType" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionType"<?php echo $ivf_semenanalysisreport_grid->CollectionType->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_grid->CollectionType->selectOptionListHtml("x{$ivf_semenanalysisreport_grid->RowIndex}_CollectionType") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionType" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionType" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionType" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->CollectionType->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_CollectionType" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_CollectionType" data-value-separator="<?php echo $ivf_semenanalysisreport_grid->CollectionType->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionType" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionType"<?php echo $ivf_semenanalysisreport_grid->CollectionType->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_grid->CollectionType->selectOptionListHtml("x{$ivf_semenanalysisreport_grid->RowIndex}_CollectionType") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_CollectionType">
<span<?php echo $ivf_semenanalysisreport_grid->CollectionType->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->CollectionType->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionType" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionType" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionType" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->CollectionType->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionType" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionType" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionType" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->CollectionType->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionType" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionType" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionType" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->CollectionType->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionType" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionType" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionType" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->CollectionType->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->CollectionMethod->Visible) { // CollectionMethod ?>
		<td data-name="CollectionMethod" <?php echo $ivf_semenanalysisreport_grid->CollectionMethod->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_CollectionMethod" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_CollectionMethod" data-value-separator="<?php echo $ivf_semenanalysisreport_grid->CollectionMethod->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionMethod" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionMethod"<?php echo $ivf_semenanalysisreport_grid->CollectionMethod->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_grid->CollectionMethod->selectOptionListHtml("x{$ivf_semenanalysisreport_grid->RowIndex}_CollectionMethod") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionMethod" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionMethod" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionMethod" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->CollectionMethod->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_CollectionMethod" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_CollectionMethod" data-value-separator="<?php echo $ivf_semenanalysisreport_grid->CollectionMethod->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionMethod" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionMethod"<?php echo $ivf_semenanalysisreport_grid->CollectionMethod->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_grid->CollectionMethod->selectOptionListHtml("x{$ivf_semenanalysisreport_grid->RowIndex}_CollectionMethod") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_CollectionMethod">
<span<?php echo $ivf_semenanalysisreport_grid->CollectionMethod->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->CollectionMethod->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionMethod" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionMethod" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionMethod" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->CollectionMethod->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionMethod" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionMethod" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionMethod" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->CollectionMethod->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionMethod" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionMethod" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionMethod" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->CollectionMethod->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionMethod" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionMethod" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionMethod" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->CollectionMethod->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Medicationused->Visible) { // Medicationused ?>
		<td data-name="Medicationused" <?php echo $ivf_semenanalysisreport_grid->Medicationused->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Medicationused" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_Medicationused" data-value-separator="<?php echo $ivf_semenanalysisreport_grid->Medicationused->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medicationused" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medicationused"<?php echo $ivf_semenanalysisreport_grid->Medicationused->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_grid->Medicationused->selectOptionListHtml("x{$ivf_semenanalysisreport_grid->RowIndex}_Medicationused") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Medicationused" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medicationused" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medicationused" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Medicationused->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Medicationused" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_Medicationused" data-value-separator="<?php echo $ivf_semenanalysisreport_grid->Medicationused->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medicationused" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medicationused"<?php echo $ivf_semenanalysisreport_grid->Medicationused->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_grid->Medicationused->selectOptionListHtml("x{$ivf_semenanalysisreport_grid->RowIndex}_Medicationused") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Medicationused">
<span<?php echo $ivf_semenanalysisreport_grid->Medicationused->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->Medicationused->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Medicationused" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medicationused" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medicationused" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Medicationused->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Medicationused" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medicationused" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medicationused" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Medicationused->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Medicationused" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medicationused" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medicationused" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Medicationused->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Medicationused" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medicationused" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medicationused" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Medicationused->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->DifficultiesinCollection->Visible) { // DifficultiesinCollection ?>
		<td data-name="DifficultiesinCollection" <?php echo $ivf_semenanalysisreport_grid->DifficultiesinCollection->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_DifficultiesinCollection" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_DifficultiesinCollection" data-value-separator="<?php echo $ivf_semenanalysisreport_grid->DifficultiesinCollection->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DifficultiesinCollection" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DifficultiesinCollection"<?php echo $ivf_semenanalysisreport_grid->DifficultiesinCollection->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_grid->DifficultiesinCollection->selectOptionListHtml("x{$ivf_semenanalysisreport_grid->RowIndex}_DifficultiesinCollection") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DifficultiesinCollection" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DifficultiesinCollection" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DifficultiesinCollection" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->DifficultiesinCollection->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_DifficultiesinCollection" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_DifficultiesinCollection" data-value-separator="<?php echo $ivf_semenanalysisreport_grid->DifficultiesinCollection->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DifficultiesinCollection" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DifficultiesinCollection"<?php echo $ivf_semenanalysisreport_grid->DifficultiesinCollection->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_grid->DifficultiesinCollection->selectOptionListHtml("x{$ivf_semenanalysisreport_grid->RowIndex}_DifficultiesinCollection") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_DifficultiesinCollection">
<span<?php echo $ivf_semenanalysisreport_grid->DifficultiesinCollection->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->DifficultiesinCollection->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DifficultiesinCollection" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DifficultiesinCollection" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DifficultiesinCollection" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->DifficultiesinCollection->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DifficultiesinCollection" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DifficultiesinCollection" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DifficultiesinCollection" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->DifficultiesinCollection->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DifficultiesinCollection" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DifficultiesinCollection" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DifficultiesinCollection" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->DifficultiesinCollection->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DifficultiesinCollection" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DifficultiesinCollection" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DifficultiesinCollection" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->DifficultiesinCollection->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->pH->Visible) { // pH ?>
		<td data-name="pH" <?php echo $ivf_semenanalysisreport_grid->pH->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_pH" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_pH" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_pH" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_pH" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->pH->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->pH->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->pH->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_pH" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_pH" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_pH" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->pH->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_pH" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_pH" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_pH" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_pH" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->pH->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->pH->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->pH->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_pH">
<span<?php echo $ivf_semenanalysisreport_grid->pH->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->pH->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_pH" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_pH" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_pH" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->pH->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_pH" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_pH" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_pH" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->pH->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_pH" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_pH" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_pH" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->pH->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_pH" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_pH" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_pH" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->pH->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Timeofcollection->Visible) { // Timeofcollection ?>
		<td data-name="Timeofcollection" <?php echo $ivf_semenanalysisreport_grid->Timeofcollection->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Timeofcollection" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Timeofcollection" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofcollection" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofcollection" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Timeofcollection->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Timeofcollection->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Timeofcollection->editAttributes() ?>>
<?php if (!$ivf_semenanalysisreport_grid->Timeofcollection->ReadOnly && !$ivf_semenanalysisreport_grid->Timeofcollection->Disabled && !isset($ivf_semenanalysisreport_grid->Timeofcollection->EditAttrs["readonly"]) && !isset($ivf_semenanalysisreport_grid->Timeofcollection->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_semenanalysisreportgrid", "timepicker"], function() {
	ew.createTimePicker("fivf_semenanalysisreportgrid", "x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofcollection", {"timeFormat":"h:i A","step":15});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Timeofcollection" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofcollection" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofcollection" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Timeofcollection->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Timeofcollection" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Timeofcollection" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofcollection" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofcollection" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Timeofcollection->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Timeofcollection->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Timeofcollection->editAttributes() ?>>
<?php if (!$ivf_semenanalysisreport_grid->Timeofcollection->ReadOnly && !$ivf_semenanalysisreport_grid->Timeofcollection->Disabled && !isset($ivf_semenanalysisreport_grid->Timeofcollection->EditAttrs["readonly"]) && !isset($ivf_semenanalysisreport_grid->Timeofcollection->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_semenanalysisreportgrid", "timepicker"], function() {
	ew.createTimePicker("fivf_semenanalysisreportgrid", "x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofcollection", {"timeFormat":"h:i A","step":15});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Timeofcollection">
<span<?php echo $ivf_semenanalysisreport_grid->Timeofcollection->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->Timeofcollection->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Timeofcollection" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofcollection" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofcollection" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Timeofcollection->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Timeofcollection" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofcollection" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofcollection" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Timeofcollection->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Timeofcollection" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofcollection" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofcollection" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Timeofcollection->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Timeofcollection" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofcollection" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofcollection" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Timeofcollection->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Timeofexamination->Visible) { // Timeofexamination ?>
		<td data-name="Timeofexamination" <?php echo $ivf_semenanalysisreport_grid->Timeofexamination->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Timeofexamination" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Timeofexamination" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofexamination" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofexamination" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Timeofexamination->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Timeofexamination->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Timeofexamination->editAttributes() ?>>
<?php if (!$ivf_semenanalysisreport_grid->Timeofexamination->ReadOnly && !$ivf_semenanalysisreport_grid->Timeofexamination->Disabled && !isset($ivf_semenanalysisreport_grid->Timeofexamination->EditAttrs["readonly"]) && !isset($ivf_semenanalysisreport_grid->Timeofexamination->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_semenanalysisreportgrid", "timepicker"], function() {
	ew.createTimePicker("fivf_semenanalysisreportgrid", "x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofexamination", {"timeFormat":"h:i A","step":15});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Timeofexamination" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofexamination" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofexamination" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Timeofexamination->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Timeofexamination" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Timeofexamination" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofexamination" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofexamination" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Timeofexamination->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Timeofexamination->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Timeofexamination->editAttributes() ?>>
<?php if (!$ivf_semenanalysisreport_grid->Timeofexamination->ReadOnly && !$ivf_semenanalysisreport_grid->Timeofexamination->Disabled && !isset($ivf_semenanalysisreport_grid->Timeofexamination->EditAttrs["readonly"]) && !isset($ivf_semenanalysisreport_grid->Timeofexamination->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_semenanalysisreportgrid", "timepicker"], function() {
	ew.createTimePicker("fivf_semenanalysisreportgrid", "x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofexamination", {"timeFormat":"h:i A","step":15});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Timeofexamination">
<span<?php echo $ivf_semenanalysisreport_grid->Timeofexamination->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->Timeofexamination->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Timeofexamination" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofexamination" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofexamination" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Timeofexamination->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Timeofexamination" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofexamination" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofexamination" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Timeofexamination->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Timeofexamination" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofexamination" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofexamination" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Timeofexamination->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Timeofexamination" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofexamination" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofexamination" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Timeofexamination->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Volume->Visible) { // Volume ?>
		<td data-name="Volume" <?php echo $ivf_semenanalysisreport_grid->Volume->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Volume" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Volume" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Volume->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Volume->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Volume->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Volume->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Volume" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Volume" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Volume->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Volume->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Volume->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Volume">
<span<?php echo $ivf_semenanalysisreport_grid->Volume->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->Volume->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Volume->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Volume->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Volume->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Volume->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Concentration->Visible) { // Concentration ?>
		<td data-name="Concentration" <?php echo $ivf_semenanalysisreport_grid->Concentration->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Concentration" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Concentration" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Concentration->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Concentration->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Concentration->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Concentration->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Concentration" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Concentration" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Concentration->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Concentration->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Concentration->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Concentration">
<span<?php echo $ivf_semenanalysisreport_grid->Concentration->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->Concentration->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Concentration->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Concentration->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Concentration->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Concentration->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Total->Visible) { // Total ?>
		<td data-name="Total" <?php echo $ivf_semenanalysisreport_grid->Total->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Total" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Total" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Total->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Total->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Total->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Total->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Total" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Total" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Total->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Total->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Total->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Total">
<span<?php echo $ivf_semenanalysisreport_grid->Total->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->Total->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Total->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Total->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Total->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Total->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->ProgressiveMotility->Visible) { // ProgressiveMotility ?>
		<td data-name="ProgressiveMotility" <?php echo $ivf_semenanalysisreport_grid->ProgressiveMotility->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_ProgressiveMotility" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ProgressiveMotility->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->ProgressiveMotility->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->ProgressiveMotility->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ProgressiveMotility->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_ProgressiveMotility" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ProgressiveMotility->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->ProgressiveMotility->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->ProgressiveMotility->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_ProgressiveMotility">
<span<?php echo $ivf_semenanalysisreport_grid->ProgressiveMotility->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->ProgressiveMotility->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ProgressiveMotility->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ProgressiveMotility->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ProgressiveMotility->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ProgressiveMotility->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->NonProgrssiveMotile->Visible) { // NonProgrssiveMotile ?>
		<td data-name="NonProgrssiveMotile" <?php echo $ivf_semenanalysisreport_grid->NonProgrssiveMotile->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_NonProgrssiveMotile" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NonProgrssiveMotile->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->NonProgrssiveMotile->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->NonProgrssiveMotile->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NonProgrssiveMotile->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_NonProgrssiveMotile" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NonProgrssiveMotile->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->NonProgrssiveMotile->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->NonProgrssiveMotile->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_NonProgrssiveMotile">
<span<?php echo $ivf_semenanalysisreport_grid->NonProgrssiveMotile->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->NonProgrssiveMotile->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NonProgrssiveMotile->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NonProgrssiveMotile->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NonProgrssiveMotile->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NonProgrssiveMotile->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Immotile->Visible) { // Immotile ?>
		<td data-name="Immotile" <?php echo $ivf_semenanalysisreport_grid->Immotile->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Immotile" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Immotile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Immotile->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Immotile->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Immotile->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Immotile->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Immotile" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Immotile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Immotile->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Immotile->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Immotile->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Immotile">
<span<?php echo $ivf_semenanalysisreport_grid->Immotile->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->Immotile->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Immotile->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Immotile->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Immotile->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Immotile->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->TotalProgrssiveMotile->Visible) { // TotalProgrssiveMotile ?>
		<td data-name="TotalProgrssiveMotile" <?php echo $ivf_semenanalysisreport_grid->TotalProgrssiveMotile->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_TotalProgrssiveMotile" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TotalProgrssiveMotile->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->TotalProgrssiveMotile->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->TotalProgrssiveMotile->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TotalProgrssiveMotile->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_TotalProgrssiveMotile" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TotalProgrssiveMotile->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->TotalProgrssiveMotile->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->TotalProgrssiveMotile->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_TotalProgrssiveMotile">
<span<?php echo $ivf_semenanalysisreport_grid->TotalProgrssiveMotile->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->TotalProgrssiveMotile->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TotalProgrssiveMotile->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TotalProgrssiveMotile->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TotalProgrssiveMotile->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TotalProgrssiveMotile->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Appearance->Visible) { // Appearance ?>
		<td data-name="Appearance" <?php echo $ivf_semenanalysisreport_grid->Appearance->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Appearance" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Appearance" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Appearance" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Appearance" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Appearance->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Appearance->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Appearance->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Appearance" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Appearance" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Appearance" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Appearance->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Appearance" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Appearance" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Appearance" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Appearance" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Appearance->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Appearance->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Appearance->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Appearance">
<span<?php echo $ivf_semenanalysisreport_grid->Appearance->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->Appearance->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Appearance" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Appearance" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Appearance" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Appearance->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Appearance" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Appearance" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Appearance" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Appearance->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Appearance" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Appearance" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Appearance" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Appearance->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Appearance" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Appearance" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Appearance" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Appearance->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Homogenosity->Visible) { // Homogenosity ?>
		<td data-name="Homogenosity" <?php echo $ivf_semenanalysisreport_grid->Homogenosity->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Homogenosity" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_Homogenosity" data-value-separator="<?php echo $ivf_semenanalysisreport_grid->Homogenosity->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Homogenosity" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Homogenosity"<?php echo $ivf_semenanalysisreport_grid->Homogenosity->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_grid->Homogenosity->selectOptionListHtml("x{$ivf_semenanalysisreport_grid->RowIndex}_Homogenosity") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Homogenosity" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Homogenosity" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Homogenosity" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Homogenosity->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Homogenosity" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_Homogenosity" data-value-separator="<?php echo $ivf_semenanalysisreport_grid->Homogenosity->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Homogenosity" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Homogenosity"<?php echo $ivf_semenanalysisreport_grid->Homogenosity->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_grid->Homogenosity->selectOptionListHtml("x{$ivf_semenanalysisreport_grid->RowIndex}_Homogenosity") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Homogenosity">
<span<?php echo $ivf_semenanalysisreport_grid->Homogenosity->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->Homogenosity->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Homogenosity" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Homogenosity" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Homogenosity" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Homogenosity->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Homogenosity" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Homogenosity" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Homogenosity" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Homogenosity->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Homogenosity" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Homogenosity" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Homogenosity" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Homogenosity->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Homogenosity" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Homogenosity" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Homogenosity" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Homogenosity->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->CompleteSample->Visible) { // CompleteSample ?>
		<td data-name="CompleteSample" <?php echo $ivf_semenanalysisreport_grid->CompleteSample->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_CompleteSample" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_CompleteSample" data-value-separator="<?php echo $ivf_semenanalysisreport_grid->CompleteSample->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CompleteSample" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CompleteSample"<?php echo $ivf_semenanalysisreport_grid->CompleteSample->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_grid->CompleteSample->selectOptionListHtml("x{$ivf_semenanalysisreport_grid->RowIndex}_CompleteSample") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CompleteSample" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CompleteSample" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CompleteSample" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->CompleteSample->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_CompleteSample" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_CompleteSample" data-value-separator="<?php echo $ivf_semenanalysisreport_grid->CompleteSample->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CompleteSample" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CompleteSample"<?php echo $ivf_semenanalysisreport_grid->CompleteSample->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_grid->CompleteSample->selectOptionListHtml("x{$ivf_semenanalysisreport_grid->RowIndex}_CompleteSample") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_CompleteSample">
<span<?php echo $ivf_semenanalysisreport_grid->CompleteSample->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->CompleteSample->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CompleteSample" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CompleteSample" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CompleteSample" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->CompleteSample->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CompleteSample" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CompleteSample" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CompleteSample" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->CompleteSample->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CompleteSample" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CompleteSample" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CompleteSample" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->CompleteSample->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CompleteSample" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CompleteSample" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CompleteSample" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->CompleteSample->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Liquefactiontime->Visible) { // Liquefactiontime ?>
		<td data-name="Liquefactiontime" <?php echo $ivf_semenanalysisreport_grid->Liquefactiontime->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Liquefactiontime" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Liquefactiontime" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Liquefactiontime" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Liquefactiontime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Liquefactiontime->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Liquefactiontime->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Liquefactiontime->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Liquefactiontime" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Liquefactiontime" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Liquefactiontime" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Liquefactiontime->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Liquefactiontime" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Liquefactiontime" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Liquefactiontime" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Liquefactiontime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Liquefactiontime->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Liquefactiontime->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Liquefactiontime->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Liquefactiontime">
<span<?php echo $ivf_semenanalysisreport_grid->Liquefactiontime->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->Liquefactiontime->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Liquefactiontime" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Liquefactiontime" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Liquefactiontime" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Liquefactiontime->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Liquefactiontime" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Liquefactiontime" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Liquefactiontime" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Liquefactiontime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Liquefactiontime" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Liquefactiontime" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Liquefactiontime" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Liquefactiontime->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Liquefactiontime" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Liquefactiontime" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Liquefactiontime" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Liquefactiontime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Normal->Visible) { // Normal ?>
		<td data-name="Normal" <?php echo $ivf_semenanalysisreport_grid->Normal->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Normal" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Normal" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Normal" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Normal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Normal->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Normal->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Normal->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Normal" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Normal" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Normal" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Normal->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Normal" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Normal" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Normal" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Normal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Normal->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Normal->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Normal->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Normal">
<span<?php echo $ivf_semenanalysisreport_grid->Normal->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->Normal->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Normal" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Normal" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Normal" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Normal->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Normal" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Normal" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Normal" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Normal->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Normal" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Normal" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Normal" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Normal->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Normal" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Normal" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Normal" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Normal->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Abnormal->Visible) { // Abnormal ?>
		<td data-name="Abnormal" <?php echo $ivf_semenanalysisreport_grid->Abnormal->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Abnormal" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Abnormal" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abnormal" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abnormal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Abnormal->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Abnormal->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Abnormal->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Abnormal" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abnormal" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Abnormal->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Abnormal" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Abnormal" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abnormal" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abnormal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Abnormal->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Abnormal->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Abnormal->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Abnormal">
<span<?php echo $ivf_semenanalysisreport_grid->Abnormal->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->Abnormal->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Abnormal" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abnormal" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Abnormal->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Abnormal" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abnormal" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Abnormal->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Abnormal" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abnormal" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Abnormal->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Abnormal" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abnormal" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Abnormal->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Headdefects->Visible) { // Headdefects ?>
		<td data-name="Headdefects" <?php echo $ivf_semenanalysisreport_grid->Headdefects->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Headdefects" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Headdefects" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Headdefects" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Headdefects" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Headdefects->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Headdefects->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Headdefects->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Headdefects" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Headdefects" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Headdefects" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Headdefects->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Headdefects" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Headdefects" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Headdefects" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Headdefects" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Headdefects->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Headdefects->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Headdefects->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Headdefects">
<span<?php echo $ivf_semenanalysisreport_grid->Headdefects->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->Headdefects->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Headdefects" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Headdefects" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Headdefects" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Headdefects->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Headdefects" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Headdefects" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Headdefects" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Headdefects->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Headdefects" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Headdefects" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Headdefects" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Headdefects->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Headdefects" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Headdefects" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Headdefects" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Headdefects->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->MidpieceDefects->Visible) { // MidpieceDefects ?>
		<td data-name="MidpieceDefects" <?php echo $ivf_semenanalysisreport_grid->MidpieceDefects->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_MidpieceDefects" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_MidpieceDefects" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_MidpieceDefects" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_MidpieceDefects" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->MidpieceDefects->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->MidpieceDefects->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->MidpieceDefects->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_MidpieceDefects" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_MidpieceDefects" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_MidpieceDefects" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->MidpieceDefects->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_MidpieceDefects" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_MidpieceDefects" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_MidpieceDefects" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_MidpieceDefects" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->MidpieceDefects->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->MidpieceDefects->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->MidpieceDefects->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_MidpieceDefects">
<span<?php echo $ivf_semenanalysisreport_grid->MidpieceDefects->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->MidpieceDefects->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_MidpieceDefects" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_MidpieceDefects" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_MidpieceDefects" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->MidpieceDefects->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_MidpieceDefects" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_MidpieceDefects" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_MidpieceDefects" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->MidpieceDefects->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_MidpieceDefects" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_MidpieceDefects" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_MidpieceDefects" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->MidpieceDefects->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_MidpieceDefects" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_MidpieceDefects" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_MidpieceDefects" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->MidpieceDefects->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->TailDefects->Visible) { // TailDefects ?>
		<td data-name="TailDefects" <?php echo $ivf_semenanalysisreport_grid->TailDefects->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_TailDefects" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_TailDefects" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TailDefects" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TailDefects" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TailDefects->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->TailDefects->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->TailDefects->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TailDefects" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TailDefects" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TailDefects" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TailDefects->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_TailDefects" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_TailDefects" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TailDefects" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TailDefects" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TailDefects->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->TailDefects->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->TailDefects->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_TailDefects">
<span<?php echo $ivf_semenanalysisreport_grid->TailDefects->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->TailDefects->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TailDefects" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TailDefects" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TailDefects" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TailDefects->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TailDefects" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TailDefects" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TailDefects" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TailDefects->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TailDefects" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TailDefects" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TailDefects" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TailDefects->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TailDefects" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TailDefects" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TailDefects" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TailDefects->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->NormalProgMotile->Visible) { // NormalProgMotile ?>
		<td data-name="NormalProgMotile" <?php echo $ivf_semenanalysisreport_grid->NormalProgMotile->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_NormalProgMotile" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_NormalProgMotile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NormalProgMotile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NormalProgMotile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NormalProgMotile->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->NormalProgMotile->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->NormalProgMotile->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NormalProgMotile" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NormalProgMotile" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NormalProgMotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NormalProgMotile->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_NormalProgMotile" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_NormalProgMotile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NormalProgMotile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NormalProgMotile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NormalProgMotile->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->NormalProgMotile->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->NormalProgMotile->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_NormalProgMotile">
<span<?php echo $ivf_semenanalysisreport_grid->NormalProgMotile->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->NormalProgMotile->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NormalProgMotile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NormalProgMotile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NormalProgMotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NormalProgMotile->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NormalProgMotile" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NormalProgMotile" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NormalProgMotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NormalProgMotile->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NormalProgMotile" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NormalProgMotile" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NormalProgMotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NormalProgMotile->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NormalProgMotile" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NormalProgMotile" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NormalProgMotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NormalProgMotile->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->ImmatureForms->Visible) { // ImmatureForms ?>
		<td data-name="ImmatureForms" <?php echo $ivf_semenanalysisreport_grid->ImmatureForms->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_ImmatureForms" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_ImmatureForms" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ImmatureForms" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ImmatureForms" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ImmatureForms->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->ImmatureForms->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->ImmatureForms->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ImmatureForms" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ImmatureForms" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ImmatureForms" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ImmatureForms->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_ImmatureForms" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_ImmatureForms" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ImmatureForms" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ImmatureForms" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ImmatureForms->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->ImmatureForms->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->ImmatureForms->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_ImmatureForms">
<span<?php echo $ivf_semenanalysisreport_grid->ImmatureForms->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->ImmatureForms->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ImmatureForms" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ImmatureForms" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ImmatureForms" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ImmatureForms->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ImmatureForms" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ImmatureForms" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ImmatureForms" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ImmatureForms->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ImmatureForms" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ImmatureForms" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ImmatureForms" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ImmatureForms->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ImmatureForms" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ImmatureForms" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ImmatureForms" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ImmatureForms->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Leucocytes->Visible) { // Leucocytes ?>
		<td data-name="Leucocytes" <?php echo $ivf_semenanalysisreport_grid->Leucocytes->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Leucocytes" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Leucocytes" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Leucocytes" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Leucocytes" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Leucocytes->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Leucocytes->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Leucocytes->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Leucocytes" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Leucocytes" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Leucocytes" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Leucocytes->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Leucocytes" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Leucocytes" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Leucocytes" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Leucocytes" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Leucocytes->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Leucocytes->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Leucocytes->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Leucocytes">
<span<?php echo $ivf_semenanalysisreport_grid->Leucocytes->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->Leucocytes->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Leucocytes" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Leucocytes" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Leucocytes" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Leucocytes->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Leucocytes" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Leucocytes" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Leucocytes" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Leucocytes->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Leucocytes" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Leucocytes" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Leucocytes" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Leucocytes->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Leucocytes" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Leucocytes" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Leucocytes" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Leucocytes->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Agglutination->Visible) { // Agglutination ?>
		<td data-name="Agglutination" <?php echo $ivf_semenanalysisreport_grid->Agglutination->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Agglutination" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Agglutination" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Agglutination" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Agglutination" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Agglutination->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Agglutination->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Agglutination->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Agglutination" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Agglutination" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Agglutination" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Agglutination->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Agglutination" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Agglutination" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Agglutination" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Agglutination" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Agglutination->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Agglutination->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Agglutination->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Agglutination">
<span<?php echo $ivf_semenanalysisreport_grid->Agglutination->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->Agglutination->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Agglutination" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Agglutination" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Agglutination" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Agglutination->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Agglutination" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Agglutination" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Agglutination" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Agglutination->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Agglutination" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Agglutination" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Agglutination" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Agglutination->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Agglutination" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Agglutination" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Agglutination" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Agglutination->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Debris->Visible) { // Debris ?>
		<td data-name="Debris" <?php echo $ivf_semenanalysisreport_grid->Debris->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Debris" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Debris" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Debris" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Debris" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Debris->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Debris->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Debris->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Debris" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Debris" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Debris" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Debris->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Debris" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Debris" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Debris" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Debris" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Debris->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Debris->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Debris->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Debris">
<span<?php echo $ivf_semenanalysisreport_grid->Debris->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->Debris->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Debris" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Debris" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Debris" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Debris->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Debris" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Debris" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Debris" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Debris->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Debris" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Debris" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Debris" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Debris->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Debris" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Debris" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Debris" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Debris->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Diagnosis->Visible) { // Diagnosis ?>
		<td data-name="Diagnosis" <?php echo $ivf_semenanalysisreport_grid->Diagnosis->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Diagnosis" class="form-group">
<textarea data-table="ivf_semenanalysisreport" data-field="x_Diagnosis" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Diagnosis" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Diagnosis" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Diagnosis->getPlaceHolder()) ?>"<?php echo $ivf_semenanalysisreport_grid->Diagnosis->editAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->Diagnosis->EditValue ?></textarea>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Diagnosis" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Diagnosis" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Diagnosis" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Diagnosis->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Diagnosis" class="form-group">
<textarea data-table="ivf_semenanalysisreport" data-field="x_Diagnosis" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Diagnosis" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Diagnosis" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Diagnosis->getPlaceHolder()) ?>"<?php echo $ivf_semenanalysisreport_grid->Diagnosis->editAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->Diagnosis->EditValue ?></textarea>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Diagnosis">
<span<?php echo $ivf_semenanalysisreport_grid->Diagnosis->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->Diagnosis->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Diagnosis" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Diagnosis" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Diagnosis" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Diagnosis->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Diagnosis" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Diagnosis" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Diagnosis" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Diagnosis->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Diagnosis" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Diagnosis" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Diagnosis" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Diagnosis->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Diagnosis" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Diagnosis" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Diagnosis" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Diagnosis->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Observations->Visible) { // Observations ?>
		<td data-name="Observations" <?php echo $ivf_semenanalysisreport_grid->Observations->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Observations" class="form-group">
<textarea data-table="ivf_semenanalysisreport" data-field="x_Observations" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Observations" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Observations" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Observations->getPlaceHolder()) ?>"<?php echo $ivf_semenanalysisreport_grid->Observations->editAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->Observations->EditValue ?></textarea>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Observations" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Observations" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Observations" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Observations->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Observations" class="form-group">
<textarea data-table="ivf_semenanalysisreport" data-field="x_Observations" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Observations" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Observations" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Observations->getPlaceHolder()) ?>"<?php echo $ivf_semenanalysisreport_grid->Observations->editAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->Observations->EditValue ?></textarea>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Observations">
<span<?php echo $ivf_semenanalysisreport_grid->Observations->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->Observations->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Observations" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Observations" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Observations" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Observations->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Observations" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Observations" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Observations" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Observations->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Observations" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Observations" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Observations" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Observations->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Observations" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Observations" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Observations" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Observations->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Signature->Visible) { // Signature ?>
		<td data-name="Signature" <?php echo $ivf_semenanalysisreport_grid->Signature->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Signature" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Signature" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Signature" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Signature" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Signature->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Signature->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Signature->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Signature" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Signature" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Signature" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Signature->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Signature" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Signature" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Signature" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Signature" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Signature->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Signature->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Signature->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Signature">
<span<?php echo $ivf_semenanalysisreport_grid->Signature->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->Signature->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Signature" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Signature" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Signature" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Signature->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Signature" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Signature" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Signature" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Signature->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Signature" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Signature" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Signature" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Signature->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Signature" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Signature" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Signature" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Signature->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->SemenOrgin->Visible) { // SemenOrgin ?>
		<td data-name="SemenOrgin" <?php echo $ivf_semenanalysisreport_grid->SemenOrgin->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_SemenOrgin" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_SemenOrgin" data-value-separator="<?php echo $ivf_semenanalysisreport_grid->SemenOrgin->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SemenOrgin" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SemenOrgin"<?php echo $ivf_semenanalysisreport_grid->SemenOrgin->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_grid->SemenOrgin->selectOptionListHtml("x{$ivf_semenanalysisreport_grid->RowIndex}_SemenOrgin") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_SemenOrgin" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SemenOrgin" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SemenOrgin" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->SemenOrgin->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_SemenOrgin" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_SemenOrgin" data-value-separator="<?php echo $ivf_semenanalysisreport_grid->SemenOrgin->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SemenOrgin" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SemenOrgin"<?php echo $ivf_semenanalysisreport_grid->SemenOrgin->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_grid->SemenOrgin->selectOptionListHtml("x{$ivf_semenanalysisreport_grid->RowIndex}_SemenOrgin") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_SemenOrgin">
<span<?php echo $ivf_semenanalysisreport_grid->SemenOrgin->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->SemenOrgin->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_SemenOrgin" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SemenOrgin" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SemenOrgin" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->SemenOrgin->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_SemenOrgin" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SemenOrgin" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SemenOrgin" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->SemenOrgin->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_SemenOrgin" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SemenOrgin" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SemenOrgin" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->SemenOrgin->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_SemenOrgin" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SemenOrgin" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SemenOrgin" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->SemenOrgin->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Donor->Visible) { // Donor ?>
		<td data-name="Donor" <?php echo $ivf_semenanalysisreport_grid->Donor->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Donor" class="form-group">
<?php $ivf_semenanalysisreport_grid->Donor->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor"><?php echo EmptyValue(strval($ivf_semenanalysisreport_grid->Donor->ViewValue)) ? $Language->phrase("PleaseSelect") : $ivf_semenanalysisreport_grid->Donor->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf_semenanalysisreport_grid->Donor->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($ivf_semenanalysisreport_grid->Donor->ReadOnly || $ivf_semenanalysisreport_grid->Donor->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf_semenanalysisreport_grid->Donor->Lookup->getParamTag($ivf_semenanalysisreport_grid, "p_x" . $ivf_semenanalysisreport_grid->RowIndex . "_Donor") ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Donor" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf_semenanalysisreport_grid->Donor->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor" value="<?php echo $ivf_semenanalysisreport_grid->Donor->CurrentValue ?>"<?php echo $ivf_semenanalysisreport_grid->Donor->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Donor" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Donor->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Donor" class="form-group">
<?php $ivf_semenanalysisreport_grid->Donor->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor"><?php echo EmptyValue(strval($ivf_semenanalysisreport_grid->Donor->ViewValue)) ? $Language->phrase("PleaseSelect") : $ivf_semenanalysisreport_grid->Donor->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf_semenanalysisreport_grid->Donor->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($ivf_semenanalysisreport_grid->Donor->ReadOnly || $ivf_semenanalysisreport_grid->Donor->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf_semenanalysisreport_grid->Donor->Lookup->getParamTag($ivf_semenanalysisreport_grid, "p_x" . $ivf_semenanalysisreport_grid->RowIndex . "_Donor") ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Donor" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf_semenanalysisreport_grid->Donor->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor" value="<?php echo $ivf_semenanalysisreport_grid->Donor->CurrentValue ?>"<?php echo $ivf_semenanalysisreport_grid->Donor->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Donor">
<span<?php echo $ivf_semenanalysisreport_grid->Donor->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->Donor->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Donor" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Donor->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Donor" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Donor->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Donor" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Donor->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Donor" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Donor->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->DonorBloodgroup->Visible) { // DonorBloodgroup ?>
		<td data-name="DonorBloodgroup" <?php echo $ivf_semenanalysisreport_grid->DonorBloodgroup->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_DonorBloodgroup" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_DonorBloodgroup" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DonorBloodgroup" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DonorBloodgroup" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->DonorBloodgroup->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->DonorBloodgroup->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->DonorBloodgroup->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DonorBloodgroup" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DonorBloodgroup" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DonorBloodgroup" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->DonorBloodgroup->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_DonorBloodgroup" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_DonorBloodgroup" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DonorBloodgroup" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DonorBloodgroup" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->DonorBloodgroup->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->DonorBloodgroup->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->DonorBloodgroup->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_DonorBloodgroup">
<span<?php echo $ivf_semenanalysisreport_grid->DonorBloodgroup->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->DonorBloodgroup->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DonorBloodgroup" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DonorBloodgroup" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DonorBloodgroup" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->DonorBloodgroup->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DonorBloodgroup" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DonorBloodgroup" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DonorBloodgroup" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->DonorBloodgroup->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DonorBloodgroup" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DonorBloodgroup" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DonorBloodgroup" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->DonorBloodgroup->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DonorBloodgroup" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DonorBloodgroup" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DonorBloodgroup" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->DonorBloodgroup->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Tank->Visible) { // Tank ?>
		<td data-name="Tank" <?php echo $ivf_semenanalysisreport_grid->Tank->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Tank" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Tank" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Tank" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Tank" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Tank->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Tank->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Tank->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Tank" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Tank" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Tank" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Tank->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Tank" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Tank" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Tank" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Tank" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Tank->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Tank->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Tank->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Tank">
<span<?php echo $ivf_semenanalysisreport_grid->Tank->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->Tank->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Tank" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Tank" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Tank" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Tank->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Tank" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Tank" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Tank" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Tank->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Tank" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Tank" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Tank" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Tank->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Tank" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Tank" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Tank" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Tank->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Location->Visible) { // Location ?>
		<td data-name="Location" <?php echo $ivf_semenanalysisreport_grid->Location->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Location" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Location" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Location" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Location" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Location->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Location->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Location->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Location" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Location" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Location" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Location->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Location" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Location" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Location" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Location" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Location->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Location->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Location->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Location">
<span<?php echo $ivf_semenanalysisreport_grid->Location->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->Location->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Location" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Location" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Location" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Location->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Location" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Location" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Location" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Location->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Location" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Location" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Location" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Location->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Location" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Location" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Location" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Location->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Volume1->Visible) { // Volume1 ?>
		<td data-name="Volume1" <?php echo $ivf_semenanalysisreport_grid->Volume1->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Volume1" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Volume1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Volume1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Volume1->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Volume1->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume1" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume1" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Volume1->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Volume1" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Volume1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Volume1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Volume1->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Volume1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Volume1">
<span<?php echo $ivf_semenanalysisreport_grid->Volume1->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->Volume1->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Volume1->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume1" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume1" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Volume1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume1" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume1" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Volume1->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume1" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume1" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Volume1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Concentration1->Visible) { // Concentration1 ?>
		<td data-name="Concentration1" <?php echo $ivf_semenanalysisreport_grid->Concentration1->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Concentration1" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Concentration1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Concentration1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Concentration1->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Concentration1->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration1" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration1" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Concentration1->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Concentration1" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Concentration1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Concentration1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Concentration1->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Concentration1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Concentration1">
<span<?php echo $ivf_semenanalysisreport_grid->Concentration1->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->Concentration1->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Concentration1->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration1" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration1" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Concentration1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration1" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration1" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Concentration1->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration1" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration1" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Concentration1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Total1->Visible) { // Total1 ?>
		<td data-name="Total1" <?php echo $ivf_semenanalysisreport_grid->Total1->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Total1" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Total1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Total1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Total1->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Total1->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total1" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total1" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Total1->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Total1" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Total1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Total1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Total1->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Total1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Total1">
<span<?php echo $ivf_semenanalysisreport_grid->Total1->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->Total1->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Total1->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total1" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total1" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Total1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total1" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total1" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Total1->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total1" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total1" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Total1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->ProgressiveMotility1->Visible) { // ProgressiveMotility1 ?>
		<td data-name="ProgressiveMotility1" <?php echo $ivf_semenanalysisreport_grid->ProgressiveMotility1->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_ProgressiveMotility1" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ProgressiveMotility1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->ProgressiveMotility1->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->ProgressiveMotility1->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility1" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility1" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ProgressiveMotility1->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_ProgressiveMotility1" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ProgressiveMotility1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->ProgressiveMotility1->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->ProgressiveMotility1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_ProgressiveMotility1">
<span<?php echo $ivf_semenanalysisreport_grid->ProgressiveMotility1->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->ProgressiveMotility1->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ProgressiveMotility1->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility1" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility1" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ProgressiveMotility1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility1" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility1" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ProgressiveMotility1->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility1" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility1" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ProgressiveMotility1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->NonProgrssiveMotile1->Visible) { // NonProgrssiveMotile1 ?>
		<td data-name="NonProgrssiveMotile1" <?php echo $ivf_semenanalysisreport_grid->NonProgrssiveMotile1->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_NonProgrssiveMotile1" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NonProgrssiveMotile1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->NonProgrssiveMotile1->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->NonProgrssiveMotile1->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile1" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile1" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NonProgrssiveMotile1->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_NonProgrssiveMotile1" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NonProgrssiveMotile1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->NonProgrssiveMotile1->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->NonProgrssiveMotile1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_NonProgrssiveMotile1">
<span<?php echo $ivf_semenanalysisreport_grid->NonProgrssiveMotile1->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->NonProgrssiveMotile1->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NonProgrssiveMotile1->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile1" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile1" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NonProgrssiveMotile1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile1" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile1" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NonProgrssiveMotile1->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile1" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile1" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NonProgrssiveMotile1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Immotile1->Visible) { // Immotile1 ?>
		<td data-name="Immotile1" <?php echo $ivf_semenanalysisreport_grid->Immotile1->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Immotile1" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Immotile1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Immotile1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Immotile1->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Immotile1->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile1" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile1" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Immotile1->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Immotile1" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Immotile1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Immotile1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Immotile1->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Immotile1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Immotile1">
<span<?php echo $ivf_semenanalysisreport_grid->Immotile1->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->Immotile1->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Immotile1->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile1" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile1" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Immotile1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile1" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile1" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Immotile1->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile1" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile1" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Immotile1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->TotalProgrssiveMotile1->Visible) { // TotalProgrssiveMotile1 ?>
		<td data-name="TotalProgrssiveMotile1" <?php echo $ivf_semenanalysisreport_grid->TotalProgrssiveMotile1->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_TotalProgrssiveMotile1" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TotalProgrssiveMotile1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->TotalProgrssiveMotile1->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->TotalProgrssiveMotile1->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile1" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile1" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TotalProgrssiveMotile1->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_TotalProgrssiveMotile1" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TotalProgrssiveMotile1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->TotalProgrssiveMotile1->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->TotalProgrssiveMotile1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_TotalProgrssiveMotile1">
<span<?php echo $ivf_semenanalysisreport_grid->TotalProgrssiveMotile1->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->TotalProgrssiveMotile1->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TotalProgrssiveMotile1->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile1" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile1" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TotalProgrssiveMotile1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile1" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile1" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TotalProgrssiveMotile1->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile1" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile1" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TotalProgrssiveMotile1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo" <?php echo $ivf_semenanalysisreport_grid->TidNo->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($ivf_semenanalysisreport_grid->TidNo->getSessionValue() != "") { ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_TidNo" class="form-group">
<span<?php echo $ivf_semenanalysisreport_grid->TidNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->TidNo->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TidNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_TidNo" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_TidNo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->TidNo->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->TidNo->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TidNo" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TidNo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($ivf_semenanalysisreport_grid->TidNo->getSessionValue() != "") { ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_TidNo" class="form-group">
<span<?php echo $ivf_semenanalysisreport_grid->TidNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->TidNo->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TidNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_TidNo" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_TidNo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->TidNo->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->TidNo->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_TidNo">
<span<?php echo $ivf_semenanalysisreport_grid->TidNo->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->TidNo->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TidNo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TidNo->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TidNo" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TidNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TidNo" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TidNo->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TidNo" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TidNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Color->Visible) { // Color ?>
		<td data-name="Color" <?php echo $ivf_semenanalysisreport_grid->Color->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Color" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Color" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Color" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Color" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Color->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Color->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Color->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Color" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Color" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Color" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Color->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Color" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Color" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Color" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Color" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Color->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Color->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Color->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Color">
<span<?php echo $ivf_semenanalysisreport_grid->Color->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->Color->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Color" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Color" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Color" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Color->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Color" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Color" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Color" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Color->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Color" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Color" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Color" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Color->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Color" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Color" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Color" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Color->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->DoneBy->Visible) { // DoneBy ?>
		<td data-name="DoneBy" <?php echo $ivf_semenanalysisreport_grid->DoneBy->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_DoneBy" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_DoneBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DoneBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DoneBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->DoneBy->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->DoneBy->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->DoneBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DoneBy" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DoneBy" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DoneBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->DoneBy->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_DoneBy" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_DoneBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DoneBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DoneBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->DoneBy->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->DoneBy->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->DoneBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_DoneBy">
<span<?php echo $ivf_semenanalysisreport_grid->DoneBy->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->DoneBy->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DoneBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DoneBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DoneBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->DoneBy->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DoneBy" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DoneBy" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DoneBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->DoneBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DoneBy" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DoneBy" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DoneBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->DoneBy->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DoneBy" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DoneBy" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DoneBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->DoneBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Method->Visible) { // Method ?>
		<td data-name="Method" <?php echo $ivf_semenanalysisreport_grid->Method->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Method" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Method" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Method" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Method->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Method->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Method->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Method" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Method" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Method->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Method" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Method" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Method" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Method->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Method->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Method->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Method">
<span<?php echo $ivf_semenanalysisreport_grid->Method->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->Method->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Method" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Method" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Method->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Method" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Method" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Method->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Method" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Method" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Method->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Method" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Method" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Method->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Abstinence->Visible) { // Abstinence ?>
		<td data-name="Abstinence" <?php echo $ivf_semenanalysisreport_grid->Abstinence->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Abstinence" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Abstinence" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abstinence" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abstinence" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Abstinence->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Abstinence->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Abstinence->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Abstinence" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abstinence" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abstinence" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Abstinence->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Abstinence" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Abstinence" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abstinence" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abstinence" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Abstinence->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Abstinence->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Abstinence->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Abstinence">
<span<?php echo $ivf_semenanalysisreport_grid->Abstinence->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->Abstinence->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Abstinence" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abstinence" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abstinence" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Abstinence->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Abstinence" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abstinence" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abstinence" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Abstinence->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Abstinence" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abstinence" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abstinence" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Abstinence->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Abstinence" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abstinence" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abstinence" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Abstinence->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->ProcessedBy->Visible) { // ProcessedBy ?>
		<td data-name="ProcessedBy" <?php echo $ivf_semenanalysisreport_grid->ProcessedBy->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_ProcessedBy" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_ProcessedBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProcessedBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProcessedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ProcessedBy->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->ProcessedBy->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->ProcessedBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProcessedBy" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProcessedBy" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProcessedBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ProcessedBy->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_ProcessedBy" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_ProcessedBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProcessedBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProcessedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ProcessedBy->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->ProcessedBy->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->ProcessedBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_ProcessedBy">
<span<?php echo $ivf_semenanalysisreport_grid->ProcessedBy->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->ProcessedBy->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProcessedBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProcessedBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProcessedBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ProcessedBy->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProcessedBy" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProcessedBy" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProcessedBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ProcessedBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProcessedBy" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProcessedBy" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProcessedBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ProcessedBy->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProcessedBy" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProcessedBy" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProcessedBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ProcessedBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->InseminationTime->Visible) { // InseminationTime ?>
		<td data-name="InseminationTime" <?php echo $ivf_semenanalysisreport_grid->InseminationTime->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_InseminationTime" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_InseminationTime" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationTime" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->InseminationTime->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->InseminationTime->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->InseminationTime->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_InseminationTime" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationTime" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationTime" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->InseminationTime->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_InseminationTime" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_InseminationTime" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationTime" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->InseminationTime->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->InseminationTime->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->InseminationTime->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_InseminationTime">
<span<?php echo $ivf_semenanalysisreport_grid->InseminationTime->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->InseminationTime->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_InseminationTime" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationTime" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationTime" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->InseminationTime->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_InseminationTime" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationTime" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationTime" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->InseminationTime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_InseminationTime" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationTime" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationTime" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->InseminationTime->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_InseminationTime" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationTime" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationTime" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->InseminationTime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->InseminationBy->Visible) { // InseminationBy ?>
		<td data-name="InseminationBy" <?php echo $ivf_semenanalysisreport_grid->InseminationBy->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_InseminationBy" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_InseminationBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->InseminationBy->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->InseminationBy->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->InseminationBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_InseminationBy" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationBy" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->InseminationBy->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_InseminationBy" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_InseminationBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->InseminationBy->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->InseminationBy->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->InseminationBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_InseminationBy">
<span<?php echo $ivf_semenanalysisreport_grid->InseminationBy->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->InseminationBy->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_InseminationBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->InseminationBy->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_InseminationBy" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationBy" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->InseminationBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_InseminationBy" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationBy" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->InseminationBy->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_InseminationBy" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationBy" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->InseminationBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Big->Visible) { // Big ?>
		<td data-name="Big" <?php echo $ivf_semenanalysisreport_grid->Big->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Big" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Big" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Big" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Big" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Big->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Big->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Big->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Big" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Big" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Big" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Big->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Big" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Big" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Big" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Big" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Big->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Big->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Big->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Big">
<span<?php echo $ivf_semenanalysisreport_grid->Big->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->Big->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Big" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Big" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Big" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Big->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Big" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Big" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Big" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Big->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Big" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Big" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Big" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Big->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Big" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Big" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Big" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Big->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Medium->Visible) { // Medium ?>
		<td data-name="Medium" <?php echo $ivf_semenanalysisreport_grid->Medium->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Medium" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Medium" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medium" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medium" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Medium->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Medium->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Medium->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Medium" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medium" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medium" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Medium->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Medium" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Medium" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medium" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medium" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Medium->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Medium->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Medium->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Medium">
<span<?php echo $ivf_semenanalysisreport_grid->Medium->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->Medium->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Medium" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medium" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medium" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Medium->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Medium" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medium" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medium" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Medium->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Medium" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medium" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medium" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Medium->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Medium" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medium" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medium" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Medium->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Small->Visible) { // Small ?>
		<td data-name="Small" <?php echo $ivf_semenanalysisreport_grid->Small->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Small" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Small" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Small" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Small" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Small->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Small->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Small->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Small" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Small" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Small" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Small->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Small" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Small" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Small" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Small" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Small->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Small->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Small->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Small">
<span<?php echo $ivf_semenanalysisreport_grid->Small->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->Small->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Small" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Small" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Small" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Small->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Small" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Small" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Small" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Small->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Small" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Small" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Small" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Small->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Small" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Small" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Small" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Small->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->NoHalo->Visible) { // NoHalo ?>
		<td data-name="NoHalo" <?php echo $ivf_semenanalysisreport_grid->NoHalo->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_NoHalo" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_NoHalo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NoHalo" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NoHalo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NoHalo->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->NoHalo->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->NoHalo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NoHalo" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NoHalo" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NoHalo" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NoHalo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_NoHalo" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_NoHalo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NoHalo" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NoHalo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NoHalo->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->NoHalo->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->NoHalo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_NoHalo">
<span<?php echo $ivf_semenanalysisreport_grid->NoHalo->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->NoHalo->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NoHalo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NoHalo" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NoHalo" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NoHalo->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NoHalo" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NoHalo" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NoHalo" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NoHalo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NoHalo" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NoHalo" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NoHalo" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NoHalo->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NoHalo" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NoHalo" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NoHalo" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NoHalo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Fragmented->Visible) { // Fragmented ?>
		<td data-name="Fragmented" <?php echo $ivf_semenanalysisreport_grid->Fragmented->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Fragmented" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Fragmented" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Fragmented" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Fragmented" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Fragmented->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Fragmented->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Fragmented->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Fragmented" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Fragmented" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Fragmented" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Fragmented->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Fragmented" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Fragmented" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Fragmented" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Fragmented" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Fragmented->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Fragmented->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Fragmented->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Fragmented">
<span<?php echo $ivf_semenanalysisreport_grid->Fragmented->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->Fragmented->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Fragmented" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Fragmented" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Fragmented" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Fragmented->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Fragmented" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Fragmented" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Fragmented" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Fragmented->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Fragmented" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Fragmented" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Fragmented" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Fragmented->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Fragmented" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Fragmented" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Fragmented" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Fragmented->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->NonFragmented->Visible) { // NonFragmented ?>
		<td data-name="NonFragmented" <?php echo $ivf_semenanalysisreport_grid->NonFragmented->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_NonFragmented" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_NonFragmented" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonFragmented" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonFragmented" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NonFragmented->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->NonFragmented->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->NonFragmented->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonFragmented" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonFragmented" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonFragmented" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NonFragmented->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_NonFragmented" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_NonFragmented" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonFragmented" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonFragmented" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NonFragmented->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->NonFragmented->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->NonFragmented->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_NonFragmented">
<span<?php echo $ivf_semenanalysisreport_grid->NonFragmented->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->NonFragmented->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonFragmented" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonFragmented" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonFragmented" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NonFragmented->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonFragmented" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonFragmented" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonFragmented" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NonFragmented->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonFragmented" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonFragmented" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonFragmented" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NonFragmented->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonFragmented" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonFragmented" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonFragmented" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NonFragmented->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->DFI->Visible) { // DFI ?>
		<td data-name="DFI" <?php echo $ivf_semenanalysisreport_grid->DFI->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_DFI" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_DFI" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DFI" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DFI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->DFI->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->DFI->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->DFI->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DFI" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DFI" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DFI" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->DFI->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_DFI" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_DFI" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DFI" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DFI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->DFI->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->DFI->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->DFI->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_DFI">
<span<?php echo $ivf_semenanalysisreport_grid->DFI->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->DFI->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DFI" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DFI" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DFI" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->DFI->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DFI" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DFI" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DFI" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->DFI->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DFI" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DFI" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DFI" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->DFI->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DFI" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DFI" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DFI" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->DFI->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->IsueBy->Visible) { // IsueBy ?>
		<td data-name="IsueBy" <?php echo $ivf_semenanalysisreport_grid->IsueBy->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_IsueBy" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_IsueBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IsueBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IsueBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IsueBy->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->IsueBy->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->IsueBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IsueBy" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IsueBy" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IsueBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IsueBy->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_IsueBy" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_IsueBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IsueBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IsueBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IsueBy->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->IsueBy->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->IsueBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_IsueBy">
<span<?php echo $ivf_semenanalysisreport_grid->IsueBy->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->IsueBy->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IsueBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IsueBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IsueBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IsueBy->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IsueBy" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IsueBy" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IsueBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IsueBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IsueBy" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IsueBy" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IsueBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IsueBy->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IsueBy" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IsueBy" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IsueBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IsueBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Volume2->Visible) { // Volume2 ?>
		<td data-name="Volume2" <?php echo $ivf_semenanalysisreport_grid->Volume2->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Volume2" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Volume2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Volume2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Volume2->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Volume2->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume2" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume2" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Volume2->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Volume2" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Volume2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Volume2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Volume2->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Volume2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Volume2">
<span<?php echo $ivf_semenanalysisreport_grid->Volume2->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->Volume2->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Volume2->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume2" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume2" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Volume2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume2" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume2" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Volume2->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume2" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume2" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Volume2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Concentration2->Visible) { // Concentration2 ?>
		<td data-name="Concentration2" <?php echo $ivf_semenanalysisreport_grid->Concentration2->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Concentration2" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Concentration2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Concentration2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Concentration2->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Concentration2->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration2" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration2" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Concentration2->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Concentration2" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Concentration2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Concentration2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Concentration2->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Concentration2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Concentration2">
<span<?php echo $ivf_semenanalysisreport_grid->Concentration2->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->Concentration2->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Concentration2->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration2" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration2" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Concentration2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration2" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration2" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Concentration2->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration2" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration2" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Concentration2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Total2->Visible) { // Total2 ?>
		<td data-name="Total2" <?php echo $ivf_semenanalysisreport_grid->Total2->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Total2" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Total2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Total2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Total2->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Total2->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total2" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total2" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Total2->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Total2" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Total2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Total2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Total2->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Total2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Total2">
<span<?php echo $ivf_semenanalysisreport_grid->Total2->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->Total2->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Total2->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total2" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total2" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Total2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total2" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total2" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Total2->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total2" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total2" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Total2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->ProgressiveMotility2->Visible) { // ProgressiveMotility2 ?>
		<td data-name="ProgressiveMotility2" <?php echo $ivf_semenanalysisreport_grid->ProgressiveMotility2->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_ProgressiveMotility2" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ProgressiveMotility2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->ProgressiveMotility2->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->ProgressiveMotility2->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility2" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility2" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ProgressiveMotility2->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_ProgressiveMotility2" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ProgressiveMotility2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->ProgressiveMotility2->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->ProgressiveMotility2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_ProgressiveMotility2">
<span<?php echo $ivf_semenanalysisreport_grid->ProgressiveMotility2->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->ProgressiveMotility2->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ProgressiveMotility2->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility2" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility2" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ProgressiveMotility2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility2" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility2" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ProgressiveMotility2->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility2" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility2" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ProgressiveMotility2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->NonProgrssiveMotile2->Visible) { // NonProgrssiveMotile2 ?>
		<td data-name="NonProgrssiveMotile2" <?php echo $ivf_semenanalysisreport_grid->NonProgrssiveMotile2->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_NonProgrssiveMotile2" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NonProgrssiveMotile2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->NonProgrssiveMotile2->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->NonProgrssiveMotile2->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile2" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile2" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NonProgrssiveMotile2->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_NonProgrssiveMotile2" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NonProgrssiveMotile2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->NonProgrssiveMotile2->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->NonProgrssiveMotile2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_NonProgrssiveMotile2">
<span<?php echo $ivf_semenanalysisreport_grid->NonProgrssiveMotile2->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->NonProgrssiveMotile2->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NonProgrssiveMotile2->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile2" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile2" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NonProgrssiveMotile2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile2" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile2" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NonProgrssiveMotile2->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile2" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile2" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NonProgrssiveMotile2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Immotile2->Visible) { // Immotile2 ?>
		<td data-name="Immotile2" <?php echo $ivf_semenanalysisreport_grid->Immotile2->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Immotile2" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Immotile2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Immotile2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Immotile2->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Immotile2->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile2" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile2" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Immotile2->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Immotile2" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Immotile2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Immotile2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Immotile2->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Immotile2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_Immotile2">
<span<?php echo $ivf_semenanalysisreport_grid->Immotile2->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->Immotile2->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Immotile2->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile2" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile2" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Immotile2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile2" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile2" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Immotile2->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile2" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile2" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Immotile2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->TotalProgrssiveMotile2->Visible) { // TotalProgrssiveMotile2 ?>
		<td data-name="TotalProgrssiveMotile2" <?php echo $ivf_semenanalysisreport_grid->TotalProgrssiveMotile2->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_TotalProgrssiveMotile2" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TotalProgrssiveMotile2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->TotalProgrssiveMotile2->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->TotalProgrssiveMotile2->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile2" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile2" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TotalProgrssiveMotile2->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_TotalProgrssiveMotile2" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TotalProgrssiveMotile2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->TotalProgrssiveMotile2->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->TotalProgrssiveMotile2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_TotalProgrssiveMotile2">
<span<?php echo $ivf_semenanalysisreport_grid->TotalProgrssiveMotile2->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->TotalProgrssiveMotile2->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TotalProgrssiveMotile2->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile2" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile2" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TotalProgrssiveMotile2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile2" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile2" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TotalProgrssiveMotile2->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile2" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile2" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TotalProgrssiveMotile2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->IssuedBy->Visible) { // IssuedBy ?>
		<td data-name="IssuedBy" <?php echo $ivf_semenanalysisreport_grid->IssuedBy->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_IssuedBy" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_IssuedBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IssuedBy->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->IssuedBy->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->IssuedBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IssuedBy" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedBy" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IssuedBy->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_IssuedBy" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_IssuedBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IssuedBy->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->IssuedBy->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->IssuedBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_IssuedBy">
<span<?php echo $ivf_semenanalysisreport_grid->IssuedBy->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->IssuedBy->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IssuedBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IssuedBy->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IssuedBy" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedBy" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IssuedBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IssuedBy" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedBy" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IssuedBy->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IssuedBy" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedBy" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IssuedBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->IssuedTo->Visible) { // IssuedTo ?>
		<td data-name="IssuedTo" <?php echo $ivf_semenanalysisreport_grid->IssuedTo->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_IssuedTo" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_IssuedTo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedTo" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedTo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IssuedTo->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->IssuedTo->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->IssuedTo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IssuedTo" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedTo" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedTo" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IssuedTo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_IssuedTo" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_IssuedTo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedTo" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedTo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IssuedTo->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->IssuedTo->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->IssuedTo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_IssuedTo">
<span<?php echo $ivf_semenanalysisreport_grid->IssuedTo->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->IssuedTo->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IssuedTo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedTo" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedTo" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IssuedTo->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IssuedTo" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedTo" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedTo" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IssuedTo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IssuedTo" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedTo" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedTo" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IssuedTo->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IssuedTo" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedTo" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedTo" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IssuedTo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->PaID->Visible) { // PaID ?>
		<td data-name="PaID" <?php echo $ivf_semenanalysisreport_grid->PaID->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_PaID" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PaID" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaID" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PaID->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->PaID->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->PaID->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaID" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaID" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaID" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PaID->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_PaID" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PaID" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaID" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PaID->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->PaID->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->PaID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_PaID">
<span<?php echo $ivf_semenanalysisreport_grid->PaID->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->PaID->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaID" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaID" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaID" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PaID->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaID" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaID" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaID" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PaID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaID" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaID" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaID" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PaID->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaID" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaID" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaID" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PaID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->PaName->Visible) { // PaName ?>
		<td data-name="PaName" <?php echo $ivf_semenanalysisreport_grid->PaName->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_PaName" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PaName" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaName" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PaName->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->PaName->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->PaName->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaName" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaName" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaName" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PaName->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_PaName" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PaName" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaName" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PaName->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->PaName->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->PaName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_PaName">
<span<?php echo $ivf_semenanalysisreport_grid->PaName->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->PaName->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaName" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaName" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaName" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PaName->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaName" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaName" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaName" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PaName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaName" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaName" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaName" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PaName->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaName" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaName" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaName" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PaName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->PaMobile->Visible) { // PaMobile ?>
		<td data-name="PaMobile" <?php echo $ivf_semenanalysisreport_grid->PaMobile->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_PaMobile" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PaMobile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaMobile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaMobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PaMobile->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->PaMobile->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->PaMobile->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaMobile" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaMobile" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaMobile" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PaMobile->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_PaMobile" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PaMobile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaMobile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaMobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PaMobile->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->PaMobile->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->PaMobile->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_PaMobile">
<span<?php echo $ivf_semenanalysisreport_grid->PaMobile->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->PaMobile->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaMobile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaMobile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaMobile" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PaMobile->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaMobile" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaMobile" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaMobile" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PaMobile->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaMobile" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaMobile" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaMobile" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PaMobile->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaMobile" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaMobile" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaMobile" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PaMobile->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->PartnerID->Visible) { // PartnerID ?>
		<td data-name="PartnerID" <?php echo $ivf_semenanalysisreport_grid->PartnerID->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_PartnerID" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PartnerID" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerID" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PartnerID->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->PartnerID->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->PartnerID->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerID" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerID" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerID" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PartnerID->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_PartnerID" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PartnerID" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerID" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PartnerID->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->PartnerID->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->PartnerID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_PartnerID">
<span<?php echo $ivf_semenanalysisreport_grid->PartnerID->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->PartnerID->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerID" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerID" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerID" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PartnerID->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerID" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerID" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerID" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PartnerID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerID" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerID" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerID" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PartnerID->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerID" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerID" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerID" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PartnerID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->PartnerName->Visible) { // PartnerName ?>
		<td data-name="PartnerName" <?php echo $ivf_semenanalysisreport_grid->PartnerName->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_PartnerName" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PartnerName" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerName" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PartnerName->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->PartnerName->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->PartnerName->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerName" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerName" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerName" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PartnerName->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_PartnerName" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PartnerName" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerName" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PartnerName->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->PartnerName->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->PartnerName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_PartnerName">
<span<?php echo $ivf_semenanalysisreport_grid->PartnerName->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->PartnerName->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerName" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerName" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerName" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PartnerName->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerName" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerName" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerName" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PartnerName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerName" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerName" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerName" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PartnerName->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerName" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerName" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerName" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PartnerName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->PartnerMobile->Visible) { // PartnerMobile ?>
		<td data-name="PartnerMobile" <?php echo $ivf_semenanalysisreport_grid->PartnerMobile->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_PartnerMobile" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PartnerMobile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerMobile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerMobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PartnerMobile->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->PartnerMobile->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->PartnerMobile->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerMobile" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerMobile" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerMobile" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PartnerMobile->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_PartnerMobile" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PartnerMobile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerMobile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerMobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PartnerMobile->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->PartnerMobile->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->PartnerMobile->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_PartnerMobile">
<span<?php echo $ivf_semenanalysisreport_grid->PartnerMobile->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->PartnerMobile->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerMobile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerMobile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerMobile" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PartnerMobile->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerMobile" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerMobile" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerMobile" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PartnerMobile->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerMobile" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerMobile" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerMobile" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PartnerMobile->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerMobile" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerMobile" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerMobile" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PartnerMobile->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
		<td data-name="PREG_TEST_DATE" <?php echo $ivf_semenanalysisreport_grid->PREG_TEST_DATE->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_PREG_TEST_DATE" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PREG_TEST_DATE" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PREG_TEST_DATE" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PREG_TEST_DATE" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PREG_TEST_DATE->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->PREG_TEST_DATE->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->PREG_TEST_DATE->editAttributes() ?>>
<?php if (!$ivf_semenanalysisreport_grid->PREG_TEST_DATE->ReadOnly && !$ivf_semenanalysisreport_grid->PREG_TEST_DATE->Disabled && !isset($ivf_semenanalysisreport_grid->PREG_TEST_DATE->EditAttrs["readonly"]) && !isset($ivf_semenanalysisreport_grid->PREG_TEST_DATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_semenanalysisreportgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_semenanalysisreportgrid", "x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PREG_TEST_DATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PREG_TEST_DATE" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PREG_TEST_DATE" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PREG_TEST_DATE" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PREG_TEST_DATE->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_PREG_TEST_DATE" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PREG_TEST_DATE" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PREG_TEST_DATE" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PREG_TEST_DATE" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PREG_TEST_DATE->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->PREG_TEST_DATE->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->PREG_TEST_DATE->editAttributes() ?>>
<?php if (!$ivf_semenanalysisreport_grid->PREG_TEST_DATE->ReadOnly && !$ivf_semenanalysisreport_grid->PREG_TEST_DATE->Disabled && !isset($ivf_semenanalysisreport_grid->PREG_TEST_DATE->EditAttrs["readonly"]) && !isset($ivf_semenanalysisreport_grid->PREG_TEST_DATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_semenanalysisreportgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_semenanalysisreportgrid", "x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PREG_TEST_DATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_PREG_TEST_DATE">
<span<?php echo $ivf_semenanalysisreport_grid->PREG_TEST_DATE->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->PREG_TEST_DATE->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PREG_TEST_DATE" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PREG_TEST_DATE" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PREG_TEST_DATE" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PREG_TEST_DATE->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PREG_TEST_DATE" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PREG_TEST_DATE" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PREG_TEST_DATE" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PREG_TEST_DATE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PREG_TEST_DATE" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PREG_TEST_DATE" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PREG_TEST_DATE" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PREG_TEST_DATE->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PREG_TEST_DATE" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PREG_TEST_DATE" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PREG_TEST_DATE" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PREG_TEST_DATE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->SPECIFIC_PROBLEMS->Visible) { // SPECIFIC_PROBLEMS ?>
		<td data-name="SPECIFIC_PROBLEMS" <?php echo $ivf_semenanalysisreport_grid->SPECIFIC_PROBLEMS->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_SPECIFIC_PROBLEMS" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_SPECIFIC_PROBLEMS" data-value-separator="<?php echo $ivf_semenanalysisreport_grid->SPECIFIC_PROBLEMS->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SPECIFIC_PROBLEMS" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SPECIFIC_PROBLEMS"<?php echo $ivf_semenanalysisreport_grid->SPECIFIC_PROBLEMS->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_grid->SPECIFIC_PROBLEMS->selectOptionListHtml("x{$ivf_semenanalysisreport_grid->RowIndex}_SPECIFIC_PROBLEMS") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_SPECIFIC_PROBLEMS" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SPECIFIC_PROBLEMS" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SPECIFIC_PROBLEMS" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->SPECIFIC_PROBLEMS->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_SPECIFIC_PROBLEMS" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_SPECIFIC_PROBLEMS" data-value-separator="<?php echo $ivf_semenanalysisreport_grid->SPECIFIC_PROBLEMS->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SPECIFIC_PROBLEMS" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SPECIFIC_PROBLEMS"<?php echo $ivf_semenanalysisreport_grid->SPECIFIC_PROBLEMS->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_grid->SPECIFIC_PROBLEMS->selectOptionListHtml("x{$ivf_semenanalysisreport_grid->RowIndex}_SPECIFIC_PROBLEMS") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_SPECIFIC_PROBLEMS">
<span<?php echo $ivf_semenanalysisreport_grid->SPECIFIC_PROBLEMS->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->SPECIFIC_PROBLEMS->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_SPECIFIC_PROBLEMS" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SPECIFIC_PROBLEMS" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SPECIFIC_PROBLEMS" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->SPECIFIC_PROBLEMS->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_SPECIFIC_PROBLEMS" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SPECIFIC_PROBLEMS" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SPECIFIC_PROBLEMS" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->SPECIFIC_PROBLEMS->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_SPECIFIC_PROBLEMS" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SPECIFIC_PROBLEMS" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SPECIFIC_PROBLEMS" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->SPECIFIC_PROBLEMS->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_SPECIFIC_PROBLEMS" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SPECIFIC_PROBLEMS" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SPECIFIC_PROBLEMS" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->SPECIFIC_PROBLEMS->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->IMSC_1->Visible) { // IMSC_1 ?>
		<td data-name="IMSC_1" <?php echo $ivf_semenanalysisreport_grid->IMSC_1->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_IMSC_1" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_IMSC_1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IMSC_1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->IMSC_1->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->IMSC_1->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IMSC_1" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_1" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IMSC_1->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_IMSC_1" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_IMSC_1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IMSC_1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->IMSC_1->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->IMSC_1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_IMSC_1">
<span<?php echo $ivf_semenanalysisreport_grid->IMSC_1->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->IMSC_1->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IMSC_1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IMSC_1->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IMSC_1" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_1" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IMSC_1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IMSC_1" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_1" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IMSC_1->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IMSC_1" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_1" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IMSC_1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->IMSC_2->Visible) { // IMSC_2 ?>
		<td data-name="IMSC_2" <?php echo $ivf_semenanalysisreport_grid->IMSC_2->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_IMSC_2" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_IMSC_2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IMSC_2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->IMSC_2->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->IMSC_2->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IMSC_2" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_2" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IMSC_2->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_IMSC_2" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_IMSC_2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IMSC_2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->IMSC_2->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->IMSC_2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_IMSC_2">
<span<?php echo $ivf_semenanalysisreport_grid->IMSC_2->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->IMSC_2->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IMSC_2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IMSC_2->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IMSC_2" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_2" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IMSC_2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IMSC_2" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_2" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IMSC_2->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IMSC_2" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_2" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IMSC_2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->LIQUIFACTION_STORAGE->Visible) { // LIQUIFACTION_STORAGE ?>
		<td data-name="LIQUIFACTION_STORAGE" <?php echo $ivf_semenanalysisreport_grid->LIQUIFACTION_STORAGE->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_LIQUIFACTION_STORAGE" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_LIQUIFACTION_STORAGE" data-value-separator="<?php echo $ivf_semenanalysisreport_grid->LIQUIFACTION_STORAGE->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_LIQUIFACTION_STORAGE" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_LIQUIFACTION_STORAGE"<?php echo $ivf_semenanalysisreport_grid->LIQUIFACTION_STORAGE->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_grid->LIQUIFACTION_STORAGE->selectOptionListHtml("x{$ivf_semenanalysisreport_grid->RowIndex}_LIQUIFACTION_STORAGE") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_LIQUIFACTION_STORAGE" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_LIQUIFACTION_STORAGE" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_LIQUIFACTION_STORAGE" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->LIQUIFACTION_STORAGE->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_LIQUIFACTION_STORAGE" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_LIQUIFACTION_STORAGE" data-value-separator="<?php echo $ivf_semenanalysisreport_grid->LIQUIFACTION_STORAGE->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_LIQUIFACTION_STORAGE" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_LIQUIFACTION_STORAGE"<?php echo $ivf_semenanalysisreport_grid->LIQUIFACTION_STORAGE->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_grid->LIQUIFACTION_STORAGE->selectOptionListHtml("x{$ivf_semenanalysisreport_grid->RowIndex}_LIQUIFACTION_STORAGE") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_LIQUIFACTION_STORAGE">
<span<?php echo $ivf_semenanalysisreport_grid->LIQUIFACTION_STORAGE->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->LIQUIFACTION_STORAGE->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_LIQUIFACTION_STORAGE" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_LIQUIFACTION_STORAGE" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_LIQUIFACTION_STORAGE" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->LIQUIFACTION_STORAGE->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_LIQUIFACTION_STORAGE" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_LIQUIFACTION_STORAGE" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_LIQUIFACTION_STORAGE" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->LIQUIFACTION_STORAGE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_LIQUIFACTION_STORAGE" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_LIQUIFACTION_STORAGE" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_LIQUIFACTION_STORAGE" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->LIQUIFACTION_STORAGE->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_LIQUIFACTION_STORAGE" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_LIQUIFACTION_STORAGE" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_LIQUIFACTION_STORAGE" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->LIQUIFACTION_STORAGE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->IUI_PREP_METHOD->Visible) { // IUI_PREP_METHOD ?>
		<td data-name="IUI_PREP_METHOD" <?php echo $ivf_semenanalysisreport_grid->IUI_PREP_METHOD->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_IUI_PREP_METHOD" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_IUI_PREP_METHOD" data-value-separator="<?php echo $ivf_semenanalysisreport_grid->IUI_PREP_METHOD->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IUI_PREP_METHOD" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IUI_PREP_METHOD"<?php echo $ivf_semenanalysisreport_grid->IUI_PREP_METHOD->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_grid->IUI_PREP_METHOD->selectOptionListHtml("x{$ivf_semenanalysisreport_grid->RowIndex}_IUI_PREP_METHOD") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IUI_PREP_METHOD" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IUI_PREP_METHOD" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IUI_PREP_METHOD" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IUI_PREP_METHOD->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_IUI_PREP_METHOD" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_IUI_PREP_METHOD" data-value-separator="<?php echo $ivf_semenanalysisreport_grid->IUI_PREP_METHOD->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IUI_PREP_METHOD" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IUI_PREP_METHOD"<?php echo $ivf_semenanalysisreport_grid->IUI_PREP_METHOD->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_grid->IUI_PREP_METHOD->selectOptionListHtml("x{$ivf_semenanalysisreport_grid->RowIndex}_IUI_PREP_METHOD") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_IUI_PREP_METHOD">
<span<?php echo $ivf_semenanalysisreport_grid->IUI_PREP_METHOD->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->IUI_PREP_METHOD->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IUI_PREP_METHOD" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IUI_PREP_METHOD" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IUI_PREP_METHOD" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IUI_PREP_METHOD->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IUI_PREP_METHOD" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IUI_PREP_METHOD" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IUI_PREP_METHOD" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IUI_PREP_METHOD->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IUI_PREP_METHOD" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IUI_PREP_METHOD" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IUI_PREP_METHOD" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IUI_PREP_METHOD->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IUI_PREP_METHOD" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IUI_PREP_METHOD" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IUI_PREP_METHOD" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IUI_PREP_METHOD->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->TIME_FROM_TRIGGER->Visible) { // TIME_FROM_TRIGGER ?>
		<td data-name="TIME_FROM_TRIGGER" <?php echo $ivf_semenanalysisreport_grid->TIME_FROM_TRIGGER->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_TIME_FROM_TRIGGER" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_TRIGGER" data-value-separator="<?php echo $ivf_semenanalysisreport_grid->TIME_FROM_TRIGGER->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_TRIGGER" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_TRIGGER"<?php echo $ivf_semenanalysisreport_grid->TIME_FROM_TRIGGER->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_grid->TIME_FROM_TRIGGER->selectOptionListHtml("x{$ivf_semenanalysisreport_grid->RowIndex}_TIME_FROM_TRIGGER") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_TRIGGER" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_TRIGGER" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_TRIGGER" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TIME_FROM_TRIGGER->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_TIME_FROM_TRIGGER" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_TRIGGER" data-value-separator="<?php echo $ivf_semenanalysisreport_grid->TIME_FROM_TRIGGER->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_TRIGGER" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_TRIGGER"<?php echo $ivf_semenanalysisreport_grid->TIME_FROM_TRIGGER->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_grid->TIME_FROM_TRIGGER->selectOptionListHtml("x{$ivf_semenanalysisreport_grid->RowIndex}_TIME_FROM_TRIGGER") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_TIME_FROM_TRIGGER">
<span<?php echo $ivf_semenanalysisreport_grid->TIME_FROM_TRIGGER->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->TIME_FROM_TRIGGER->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_TRIGGER" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_TRIGGER" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_TRIGGER" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TIME_FROM_TRIGGER->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_TRIGGER" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_TRIGGER" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_TRIGGER" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TIME_FROM_TRIGGER->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_TRIGGER" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_TRIGGER" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_TRIGGER" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TIME_FROM_TRIGGER->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_TRIGGER" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_TRIGGER" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_TRIGGER" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TIME_FROM_TRIGGER->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->COLLECTION_TO_PREPARATION->Visible) { // COLLECTION_TO_PREPARATION ?>
		<td data-name="COLLECTION_TO_PREPARATION" <?php echo $ivf_semenanalysisreport_grid->COLLECTION_TO_PREPARATION->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_COLLECTION_TO_PREPARATION" data-value-separator="<?php echo $ivf_semenanalysisreport_grid->COLLECTION_TO_PREPARATION->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_COLLECTION_TO_PREPARATION" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_COLLECTION_TO_PREPARATION"<?php echo $ivf_semenanalysisreport_grid->COLLECTION_TO_PREPARATION->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_grid->COLLECTION_TO_PREPARATION->selectOptionListHtml("x{$ivf_semenanalysisreport_grid->RowIndex}_COLLECTION_TO_PREPARATION") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_COLLECTION_TO_PREPARATION" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_COLLECTION_TO_PREPARATION" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_COLLECTION_TO_PREPARATION" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->COLLECTION_TO_PREPARATION->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_COLLECTION_TO_PREPARATION" data-value-separator="<?php echo $ivf_semenanalysisreport_grid->COLLECTION_TO_PREPARATION->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_COLLECTION_TO_PREPARATION" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_COLLECTION_TO_PREPARATION"<?php echo $ivf_semenanalysisreport_grid->COLLECTION_TO_PREPARATION->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_grid->COLLECTION_TO_PREPARATION->selectOptionListHtml("x{$ivf_semenanalysisreport_grid->RowIndex}_COLLECTION_TO_PREPARATION") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION">
<span<?php echo $ivf_semenanalysisreport_grid->COLLECTION_TO_PREPARATION->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->COLLECTION_TO_PREPARATION->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_COLLECTION_TO_PREPARATION" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_COLLECTION_TO_PREPARATION" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_COLLECTION_TO_PREPARATION" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->COLLECTION_TO_PREPARATION->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_COLLECTION_TO_PREPARATION" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_COLLECTION_TO_PREPARATION" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_COLLECTION_TO_PREPARATION" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->COLLECTION_TO_PREPARATION->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_COLLECTION_TO_PREPARATION" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_COLLECTION_TO_PREPARATION" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_COLLECTION_TO_PREPARATION" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->COLLECTION_TO_PREPARATION->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_COLLECTION_TO_PREPARATION" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_COLLECTION_TO_PREPARATION" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_COLLECTION_TO_PREPARATION" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->COLLECTION_TO_PREPARATION->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->TIME_FROM_PREP_TO_INSEM->Visible) { // TIME_FROM_PREP_TO_INSEM ?>
		<td data-name="TIME_FROM_PREP_TO_INSEM" <?php echo $ivf_semenanalysisreport_grid->TIME_FROM_PREP_TO_INSEM->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_PREP_TO_INSEM" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TIME_FROM_PREP_TO_INSEM->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->TIME_FROM_PREP_TO_INSEM->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->TIME_FROM_PREP_TO_INSEM->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_PREP_TO_INSEM" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TIME_FROM_PREP_TO_INSEM->OldValue) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM" class="form-group">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_PREP_TO_INSEM" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TIME_FROM_PREP_TO_INSEM->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->TIME_FROM_PREP_TO_INSEM->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->TIME_FROM_PREP_TO_INSEM->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_semenanalysisreport_grid->RowCount ?>_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM">
<span<?php echo $ivf_semenanalysisreport_grid->TIME_FROM_PREP_TO_INSEM->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->TIME_FROM_PREP_TO_INSEM->getViewValue() ?></span>
</span>
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_PREP_TO_INSEM" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TIME_FROM_PREP_TO_INSEM->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_PREP_TO_INSEM" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TIME_FROM_PREP_TO_INSEM->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_PREP_TO_INSEM" name="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" id="fivf_semenanalysisreportgrid$x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TIME_FROM_PREP_TO_INSEM->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_PREP_TO_INSEM" name="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" id="fivf_semenanalysisreportgrid$o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TIME_FROM_PREP_TO_INSEM->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_semenanalysisreport_grid->ListOptions->render("body", "right", $ivf_semenanalysisreport_grid->RowCount);
?>
	</tr>
<?php if ($ivf_semenanalysisreport->RowType == ROWTYPE_ADD || $ivf_semenanalysisreport->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fivf_semenanalysisreportgrid", "load"], function() {
	fivf_semenanalysisreportgrid.updateLists(<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$ivf_semenanalysisreport_grid->isGridAdd() || $ivf_semenanalysisreport->CurrentMode == "copy")
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
		$ivf_semenanalysisreport->RowAttrs->merge(["data-rowindex" => $ivf_semenanalysisreport_grid->RowIndex, "id" => "r0_ivf_semenanalysisreport", "data-rowtype" => ROWTYPE_ADD]);
		$ivf_semenanalysisreport->RowAttrs->appendClass("ew-template");
		$ivf_semenanalysisreport->RowType = ROWTYPE_ADD;

		// Render row
		$ivf_semenanalysisreport_grid->renderRow();

		// Render list options
		$ivf_semenanalysisreport_grid->renderListOptions();
		$ivf_semenanalysisreport_grid->StartRowCount = 0;
?>
	<tr <?php echo $ivf_semenanalysisreport->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_semenanalysisreport_grid->ListOptions->render("body", "left", $ivf_semenanalysisreport_grid->RowIndex);
?>
	<?php if ($ivf_semenanalysisreport_grid->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_id" class="form-group ivf_semenanalysisreport_id"></span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_id" class="form-group ivf_semenanalysisreport_id">
<span<?php echo $ivf_semenanalysisreport_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_id" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_id" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_id" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_id" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->RIDNo->Visible) { // RIDNo ?>
		<td data-name="RIDNo">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<?php if ($ivf_semenanalysisreport_grid->RIDNo->getSessionValue() != "") { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_RIDNo" class="form-group ivf_semenanalysisreport_RIDNo">
<span<?php echo $ivf_semenanalysisreport_grid->RIDNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->RIDNo->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->RIDNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_RIDNo" class="form-group ivf_semenanalysisreport_RIDNo">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_RIDNo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" size="30" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->RIDNo->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->RIDNo->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->RIDNo->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_RIDNo" class="form-group ivf_semenanalysisreport_RIDNo">
<span<?php echo $ivf_semenanalysisreport_grid->RIDNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->RIDNo->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RIDNo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->RIDNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RIDNo" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->RIDNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<?php if ($ivf_semenanalysisreport_grid->PatientName->getSessionValue() != "") { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PatientName" class="form-group ivf_semenanalysisreport_PatientName">
<span<?php echo $ivf_semenanalysisreport_grid->PatientName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->PatientName->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PatientName->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PatientName" class="form-group ivf_semenanalysisreport_PatientName">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PatientName" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PatientName->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->PatientName->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->PatientName->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PatientName" class="form-group ivf_semenanalysisreport_PatientName">
<span<?php echo $ivf_semenanalysisreport_grid->PatientName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->PatientName->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PatientName" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PatientName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PatientName" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PatientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->HusbandName->Visible) { // HusbandName ?>
		<td data-name="HusbandName">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_HusbandName" class="form-group ivf_semenanalysisreport_HusbandName">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_HusbandName" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_HusbandName" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_HusbandName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->HusbandName->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->HusbandName->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->HusbandName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_HusbandName" class="form-group ivf_semenanalysisreport_HusbandName">
<span<?php echo $ivf_semenanalysisreport_grid->HusbandName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->HusbandName->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_HusbandName" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_HusbandName" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_HusbandName" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->HusbandName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_HusbandName" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_HusbandName" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_HusbandName" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->HusbandName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->RequestDr->Visible) { // RequestDr ?>
		<td data-name="RequestDr">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_RequestDr" class="form-group ivf_semenanalysisreport_RequestDr">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_RequestDr" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestDr" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestDr" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->RequestDr->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->RequestDr->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->RequestDr->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_RequestDr" class="form-group ivf_semenanalysisreport_RequestDr">
<span<?php echo $ivf_semenanalysisreport_grid->RequestDr->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->RequestDr->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RequestDr" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestDr" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestDr" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->RequestDr->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RequestDr" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestDr" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestDr" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->RequestDr->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->CollectionDate->Visible) { // CollectionDate ?>
		<td data-name="CollectionDate">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_CollectionDate" class="form-group ivf_semenanalysisreport_CollectionDate">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_CollectionDate" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionDate" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionDate" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->CollectionDate->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->CollectionDate->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->CollectionDate->editAttributes() ?>>
<?php if (!$ivf_semenanalysisreport_grid->CollectionDate->ReadOnly && !$ivf_semenanalysisreport_grid->CollectionDate->Disabled && !isset($ivf_semenanalysisreport_grid->CollectionDate->EditAttrs["readonly"]) && !isset($ivf_semenanalysisreport_grid->CollectionDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_semenanalysisreportgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_semenanalysisreportgrid", "x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_CollectionDate" class="form-group ivf_semenanalysisreport_CollectionDate">
<span<?php echo $ivf_semenanalysisreport_grid->CollectionDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->CollectionDate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionDate" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionDate" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionDate" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->CollectionDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionDate" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionDate" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionDate" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->CollectionDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_ResultDate" class="form-group ivf_semenanalysisreport_ResultDate">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_ResultDate" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ResultDate" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ResultDate" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ResultDate->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->ResultDate->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->ResultDate->editAttributes() ?>>
<?php if (!$ivf_semenanalysisreport_grid->ResultDate->ReadOnly && !$ivf_semenanalysisreport_grid->ResultDate->Disabled && !isset($ivf_semenanalysisreport_grid->ResultDate->EditAttrs["readonly"]) && !isset($ivf_semenanalysisreport_grid->ResultDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_semenanalysisreportgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_semenanalysisreportgrid", "x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_ResultDate" class="form-group ivf_semenanalysisreport_ResultDate">
<span<?php echo $ivf_semenanalysisreport_grid->ResultDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->ResultDate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ResultDate" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ResultDate" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ResultDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ResultDate" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ResultDate" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ResultDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->RequestSample->Visible) { // RequestSample ?>
		<td data-name="RequestSample">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_RequestSample" class="form-group ivf_semenanalysisreport_RequestSample">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_RequestSample" data-value-separator="<?php echo $ivf_semenanalysisreport_grid->RequestSample->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestSample" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestSample"<?php echo $ivf_semenanalysisreport_grid->RequestSample->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_grid->RequestSample->selectOptionListHtml("x{$ivf_semenanalysisreport_grid->RowIndex}_RequestSample") ?>
		</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_RequestSample" class="form-group ivf_semenanalysisreport_RequestSample">
<span<?php echo $ivf_semenanalysisreport_grid->RequestSample->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->RequestSample->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RequestSample" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestSample" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestSample" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->RequestSample->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RequestSample" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestSample" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_RequestSample" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->RequestSample->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->CollectionType->Visible) { // CollectionType ?>
		<td data-name="CollectionType">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_CollectionType" class="form-group ivf_semenanalysisreport_CollectionType">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_CollectionType" data-value-separator="<?php echo $ivf_semenanalysisreport_grid->CollectionType->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionType" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionType"<?php echo $ivf_semenanalysisreport_grid->CollectionType->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_grid->CollectionType->selectOptionListHtml("x{$ivf_semenanalysisreport_grid->RowIndex}_CollectionType") ?>
		</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_CollectionType" class="form-group ivf_semenanalysisreport_CollectionType">
<span<?php echo $ivf_semenanalysisreport_grid->CollectionType->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->CollectionType->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionType" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionType" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionType" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->CollectionType->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionType" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionType" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionType" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->CollectionType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->CollectionMethod->Visible) { // CollectionMethod ?>
		<td data-name="CollectionMethod">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_CollectionMethod" class="form-group ivf_semenanalysisreport_CollectionMethod">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_CollectionMethod" data-value-separator="<?php echo $ivf_semenanalysisreport_grid->CollectionMethod->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionMethod" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionMethod"<?php echo $ivf_semenanalysisreport_grid->CollectionMethod->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_grid->CollectionMethod->selectOptionListHtml("x{$ivf_semenanalysisreport_grid->RowIndex}_CollectionMethod") ?>
		</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_CollectionMethod" class="form-group ivf_semenanalysisreport_CollectionMethod">
<span<?php echo $ivf_semenanalysisreport_grid->CollectionMethod->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->CollectionMethod->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionMethod" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionMethod" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionMethod" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->CollectionMethod->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionMethod" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionMethod" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CollectionMethod" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->CollectionMethod->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Medicationused->Visible) { // Medicationused ?>
		<td data-name="Medicationused">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Medicationused" class="form-group ivf_semenanalysisreport_Medicationused">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_Medicationused" data-value-separator="<?php echo $ivf_semenanalysisreport_grid->Medicationused->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medicationused" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medicationused"<?php echo $ivf_semenanalysisreport_grid->Medicationused->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_grid->Medicationused->selectOptionListHtml("x{$ivf_semenanalysisreport_grid->RowIndex}_Medicationused") ?>
		</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Medicationused" class="form-group ivf_semenanalysisreport_Medicationused">
<span<?php echo $ivf_semenanalysisreport_grid->Medicationused->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->Medicationused->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Medicationused" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medicationused" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medicationused" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Medicationused->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Medicationused" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medicationused" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medicationused" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Medicationused->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->DifficultiesinCollection->Visible) { // DifficultiesinCollection ?>
		<td data-name="DifficultiesinCollection">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_DifficultiesinCollection" class="form-group ivf_semenanalysisreport_DifficultiesinCollection">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_DifficultiesinCollection" data-value-separator="<?php echo $ivf_semenanalysisreport_grid->DifficultiesinCollection->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DifficultiesinCollection" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DifficultiesinCollection"<?php echo $ivf_semenanalysisreport_grid->DifficultiesinCollection->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_grid->DifficultiesinCollection->selectOptionListHtml("x{$ivf_semenanalysisreport_grid->RowIndex}_DifficultiesinCollection") ?>
		</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_DifficultiesinCollection" class="form-group ivf_semenanalysisreport_DifficultiesinCollection">
<span<?php echo $ivf_semenanalysisreport_grid->DifficultiesinCollection->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->DifficultiesinCollection->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DifficultiesinCollection" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DifficultiesinCollection" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DifficultiesinCollection" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->DifficultiesinCollection->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DifficultiesinCollection" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DifficultiesinCollection" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DifficultiesinCollection" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->DifficultiesinCollection->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->pH->Visible) { // pH ?>
		<td data-name="pH">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_pH" class="form-group ivf_semenanalysisreport_pH">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_pH" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_pH" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_pH" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->pH->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->pH->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->pH->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_pH" class="form-group ivf_semenanalysisreport_pH">
<span<?php echo $ivf_semenanalysisreport_grid->pH->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->pH->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_pH" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_pH" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_pH" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->pH->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_pH" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_pH" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_pH" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->pH->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Timeofcollection->Visible) { // Timeofcollection ?>
		<td data-name="Timeofcollection">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Timeofcollection" class="form-group ivf_semenanalysisreport_Timeofcollection">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Timeofcollection" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofcollection" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofcollection" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Timeofcollection->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Timeofcollection->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Timeofcollection->editAttributes() ?>>
<?php if (!$ivf_semenanalysisreport_grid->Timeofcollection->ReadOnly && !$ivf_semenanalysisreport_grid->Timeofcollection->Disabled && !isset($ivf_semenanalysisreport_grid->Timeofcollection->EditAttrs["readonly"]) && !isset($ivf_semenanalysisreport_grid->Timeofcollection->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_semenanalysisreportgrid", "timepicker"], function() {
	ew.createTimePicker("fivf_semenanalysisreportgrid", "x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofcollection", {"timeFormat":"h:i A","step":15});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Timeofcollection" class="form-group ivf_semenanalysisreport_Timeofcollection">
<span<?php echo $ivf_semenanalysisreport_grid->Timeofcollection->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->Timeofcollection->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Timeofcollection" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofcollection" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofcollection" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Timeofcollection->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Timeofcollection" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofcollection" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofcollection" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Timeofcollection->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Timeofexamination->Visible) { // Timeofexamination ?>
		<td data-name="Timeofexamination">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Timeofexamination" class="form-group ivf_semenanalysisreport_Timeofexamination">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Timeofexamination" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofexamination" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofexamination" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Timeofexamination->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Timeofexamination->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Timeofexamination->editAttributes() ?>>
<?php if (!$ivf_semenanalysisreport_grid->Timeofexamination->ReadOnly && !$ivf_semenanalysisreport_grid->Timeofexamination->Disabled && !isset($ivf_semenanalysisreport_grid->Timeofexamination->EditAttrs["readonly"]) && !isset($ivf_semenanalysisreport_grid->Timeofexamination->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_semenanalysisreportgrid", "timepicker"], function() {
	ew.createTimePicker("fivf_semenanalysisreportgrid", "x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofexamination", {"timeFormat":"h:i A","step":15});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Timeofexamination" class="form-group ivf_semenanalysisreport_Timeofexamination">
<span<?php echo $ivf_semenanalysisreport_grid->Timeofexamination->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->Timeofexamination->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Timeofexamination" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofexamination" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofexamination" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Timeofexamination->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Timeofexamination" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofexamination" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Timeofexamination" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Timeofexamination->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Volume->Visible) { // Volume ?>
		<td data-name="Volume">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Volume" class="form-group ivf_semenanalysisreport_Volume">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Volume" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Volume->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Volume->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Volume->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Volume" class="form-group ivf_semenanalysisreport_Volume">
<span<?php echo $ivf_semenanalysisreport_grid->Volume->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->Volume->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Volume->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Volume->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Concentration->Visible) { // Concentration ?>
		<td data-name="Concentration">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Concentration" class="form-group ivf_semenanalysisreport_Concentration">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Concentration" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Concentration->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Concentration->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Concentration->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Concentration" class="form-group ivf_semenanalysisreport_Concentration">
<span<?php echo $ivf_semenanalysisreport_grid->Concentration->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->Concentration->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Concentration->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Concentration->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Total->Visible) { // Total ?>
		<td data-name="Total">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Total" class="form-group ivf_semenanalysisreport_Total">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Total" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Total->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Total->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Total->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Total" class="form-group ivf_semenanalysisreport_Total">
<span<?php echo $ivf_semenanalysisreport_grid->Total->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->Total->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Total->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Total->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->ProgressiveMotility->Visible) { // ProgressiveMotility ?>
		<td data-name="ProgressiveMotility">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_ProgressiveMotility" class="form-group ivf_semenanalysisreport_ProgressiveMotility">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ProgressiveMotility->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->ProgressiveMotility->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->ProgressiveMotility->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_ProgressiveMotility" class="form-group ivf_semenanalysisreport_ProgressiveMotility">
<span<?php echo $ivf_semenanalysisreport_grid->ProgressiveMotility->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->ProgressiveMotility->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ProgressiveMotility->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ProgressiveMotility->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->NonProgrssiveMotile->Visible) { // NonProgrssiveMotile ?>
		<td data-name="NonProgrssiveMotile">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_NonProgrssiveMotile" class="form-group ivf_semenanalysisreport_NonProgrssiveMotile">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NonProgrssiveMotile->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->NonProgrssiveMotile->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->NonProgrssiveMotile->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_NonProgrssiveMotile" class="form-group ivf_semenanalysisreport_NonProgrssiveMotile">
<span<?php echo $ivf_semenanalysisreport_grid->NonProgrssiveMotile->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->NonProgrssiveMotile->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NonProgrssiveMotile->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NonProgrssiveMotile->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Immotile->Visible) { // Immotile ?>
		<td data-name="Immotile">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Immotile" class="form-group ivf_semenanalysisreport_Immotile">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Immotile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Immotile->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Immotile->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Immotile->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Immotile" class="form-group ivf_semenanalysisreport_Immotile">
<span<?php echo $ivf_semenanalysisreport_grid->Immotile->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->Immotile->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Immotile->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Immotile->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->TotalProgrssiveMotile->Visible) { // TotalProgrssiveMotile ?>
		<td data-name="TotalProgrssiveMotile">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_TotalProgrssiveMotile" class="form-group ivf_semenanalysisreport_TotalProgrssiveMotile">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TotalProgrssiveMotile->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->TotalProgrssiveMotile->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->TotalProgrssiveMotile->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_TotalProgrssiveMotile" class="form-group ivf_semenanalysisreport_TotalProgrssiveMotile">
<span<?php echo $ivf_semenanalysisreport_grid->TotalProgrssiveMotile->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->TotalProgrssiveMotile->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TotalProgrssiveMotile->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TotalProgrssiveMotile->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Appearance->Visible) { // Appearance ?>
		<td data-name="Appearance">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Appearance" class="form-group ivf_semenanalysisreport_Appearance">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Appearance" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Appearance" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Appearance" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Appearance->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Appearance->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Appearance->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Appearance" class="form-group ivf_semenanalysisreport_Appearance">
<span<?php echo $ivf_semenanalysisreport_grid->Appearance->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->Appearance->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Appearance" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Appearance" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Appearance" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Appearance->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Appearance" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Appearance" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Appearance" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Appearance->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Homogenosity->Visible) { // Homogenosity ?>
		<td data-name="Homogenosity">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Homogenosity" class="form-group ivf_semenanalysisreport_Homogenosity">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_Homogenosity" data-value-separator="<?php echo $ivf_semenanalysisreport_grid->Homogenosity->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Homogenosity" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Homogenosity"<?php echo $ivf_semenanalysisreport_grid->Homogenosity->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_grid->Homogenosity->selectOptionListHtml("x{$ivf_semenanalysisreport_grid->RowIndex}_Homogenosity") ?>
		</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Homogenosity" class="form-group ivf_semenanalysisreport_Homogenosity">
<span<?php echo $ivf_semenanalysisreport_grid->Homogenosity->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->Homogenosity->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Homogenosity" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Homogenosity" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Homogenosity" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Homogenosity->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Homogenosity" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Homogenosity" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Homogenosity" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Homogenosity->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->CompleteSample->Visible) { // CompleteSample ?>
		<td data-name="CompleteSample">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_CompleteSample" class="form-group ivf_semenanalysisreport_CompleteSample">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_CompleteSample" data-value-separator="<?php echo $ivf_semenanalysisreport_grid->CompleteSample->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CompleteSample" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CompleteSample"<?php echo $ivf_semenanalysisreport_grid->CompleteSample->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_grid->CompleteSample->selectOptionListHtml("x{$ivf_semenanalysisreport_grid->RowIndex}_CompleteSample") ?>
		</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_CompleteSample" class="form-group ivf_semenanalysisreport_CompleteSample">
<span<?php echo $ivf_semenanalysisreport_grid->CompleteSample->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->CompleteSample->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CompleteSample" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CompleteSample" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CompleteSample" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->CompleteSample->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CompleteSample" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CompleteSample" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_CompleteSample" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->CompleteSample->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Liquefactiontime->Visible) { // Liquefactiontime ?>
		<td data-name="Liquefactiontime">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Liquefactiontime" class="form-group ivf_semenanalysisreport_Liquefactiontime">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Liquefactiontime" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Liquefactiontime" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Liquefactiontime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Liquefactiontime->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Liquefactiontime->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Liquefactiontime->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Liquefactiontime" class="form-group ivf_semenanalysisreport_Liquefactiontime">
<span<?php echo $ivf_semenanalysisreport_grid->Liquefactiontime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->Liquefactiontime->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Liquefactiontime" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Liquefactiontime" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Liquefactiontime" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Liquefactiontime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Liquefactiontime" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Liquefactiontime" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Liquefactiontime" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Liquefactiontime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Normal->Visible) { // Normal ?>
		<td data-name="Normal">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Normal" class="form-group ivf_semenanalysisreport_Normal">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Normal" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Normal" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Normal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Normal->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Normal->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Normal->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Normal" class="form-group ivf_semenanalysisreport_Normal">
<span<?php echo $ivf_semenanalysisreport_grid->Normal->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->Normal->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Normal" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Normal" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Normal" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Normal->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Normal" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Normal" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Normal" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Normal->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Abnormal->Visible) { // Abnormal ?>
		<td data-name="Abnormal">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Abnormal" class="form-group ivf_semenanalysisreport_Abnormal">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Abnormal" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abnormal" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abnormal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Abnormal->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Abnormal->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Abnormal->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Abnormal" class="form-group ivf_semenanalysisreport_Abnormal">
<span<?php echo $ivf_semenanalysisreport_grid->Abnormal->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->Abnormal->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Abnormal" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abnormal" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Abnormal->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Abnormal" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abnormal" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Abnormal->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Headdefects->Visible) { // Headdefects ?>
		<td data-name="Headdefects">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Headdefects" class="form-group ivf_semenanalysisreport_Headdefects">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Headdefects" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Headdefects" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Headdefects" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Headdefects->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Headdefects->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Headdefects->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Headdefects" class="form-group ivf_semenanalysisreport_Headdefects">
<span<?php echo $ivf_semenanalysisreport_grid->Headdefects->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->Headdefects->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Headdefects" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Headdefects" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Headdefects" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Headdefects->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Headdefects" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Headdefects" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Headdefects" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Headdefects->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->MidpieceDefects->Visible) { // MidpieceDefects ?>
		<td data-name="MidpieceDefects">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_MidpieceDefects" class="form-group ivf_semenanalysisreport_MidpieceDefects">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_MidpieceDefects" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_MidpieceDefects" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_MidpieceDefects" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->MidpieceDefects->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->MidpieceDefects->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->MidpieceDefects->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_MidpieceDefects" class="form-group ivf_semenanalysisreport_MidpieceDefects">
<span<?php echo $ivf_semenanalysisreport_grid->MidpieceDefects->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->MidpieceDefects->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_MidpieceDefects" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_MidpieceDefects" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_MidpieceDefects" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->MidpieceDefects->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_MidpieceDefects" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_MidpieceDefects" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_MidpieceDefects" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->MidpieceDefects->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->TailDefects->Visible) { // TailDefects ?>
		<td data-name="TailDefects">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_TailDefects" class="form-group ivf_semenanalysisreport_TailDefects">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_TailDefects" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TailDefects" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TailDefects" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TailDefects->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->TailDefects->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->TailDefects->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_TailDefects" class="form-group ivf_semenanalysisreport_TailDefects">
<span<?php echo $ivf_semenanalysisreport_grid->TailDefects->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->TailDefects->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TailDefects" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TailDefects" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TailDefects" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TailDefects->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TailDefects" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TailDefects" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TailDefects" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TailDefects->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->NormalProgMotile->Visible) { // NormalProgMotile ?>
		<td data-name="NormalProgMotile">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_NormalProgMotile" class="form-group ivf_semenanalysisreport_NormalProgMotile">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_NormalProgMotile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NormalProgMotile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NormalProgMotile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NormalProgMotile->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->NormalProgMotile->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->NormalProgMotile->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_NormalProgMotile" class="form-group ivf_semenanalysisreport_NormalProgMotile">
<span<?php echo $ivf_semenanalysisreport_grid->NormalProgMotile->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->NormalProgMotile->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NormalProgMotile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NormalProgMotile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NormalProgMotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NormalProgMotile->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NormalProgMotile" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NormalProgMotile" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NormalProgMotile" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NormalProgMotile->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->ImmatureForms->Visible) { // ImmatureForms ?>
		<td data-name="ImmatureForms">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_ImmatureForms" class="form-group ivf_semenanalysisreport_ImmatureForms">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_ImmatureForms" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ImmatureForms" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ImmatureForms" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ImmatureForms->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->ImmatureForms->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->ImmatureForms->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_ImmatureForms" class="form-group ivf_semenanalysisreport_ImmatureForms">
<span<?php echo $ivf_semenanalysisreport_grid->ImmatureForms->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->ImmatureForms->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ImmatureForms" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ImmatureForms" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ImmatureForms" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ImmatureForms->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ImmatureForms" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ImmatureForms" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ImmatureForms" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ImmatureForms->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Leucocytes->Visible) { // Leucocytes ?>
		<td data-name="Leucocytes">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Leucocytes" class="form-group ivf_semenanalysisreport_Leucocytes">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Leucocytes" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Leucocytes" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Leucocytes" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Leucocytes->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Leucocytes->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Leucocytes->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Leucocytes" class="form-group ivf_semenanalysisreport_Leucocytes">
<span<?php echo $ivf_semenanalysisreport_grid->Leucocytes->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->Leucocytes->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Leucocytes" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Leucocytes" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Leucocytes" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Leucocytes->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Leucocytes" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Leucocytes" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Leucocytes" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Leucocytes->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Agglutination->Visible) { // Agglutination ?>
		<td data-name="Agglutination">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Agglutination" class="form-group ivf_semenanalysisreport_Agglutination">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Agglutination" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Agglutination" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Agglutination" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Agglutination->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Agglutination->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Agglutination->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Agglutination" class="form-group ivf_semenanalysisreport_Agglutination">
<span<?php echo $ivf_semenanalysisreport_grid->Agglutination->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->Agglutination->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Agglutination" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Agglutination" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Agglutination" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Agglutination->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Agglutination" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Agglutination" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Agglutination" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Agglutination->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Debris->Visible) { // Debris ?>
		<td data-name="Debris">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Debris" class="form-group ivf_semenanalysisreport_Debris">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Debris" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Debris" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Debris" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Debris->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Debris->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Debris->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Debris" class="form-group ivf_semenanalysisreport_Debris">
<span<?php echo $ivf_semenanalysisreport_grid->Debris->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->Debris->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Debris" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Debris" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Debris" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Debris->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Debris" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Debris" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Debris" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Debris->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Diagnosis->Visible) { // Diagnosis ?>
		<td data-name="Diagnosis">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Diagnosis" class="form-group ivf_semenanalysisreport_Diagnosis">
<textarea data-table="ivf_semenanalysisreport" data-field="x_Diagnosis" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Diagnosis" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Diagnosis" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Diagnosis->getPlaceHolder()) ?>"<?php echo $ivf_semenanalysisreport_grid->Diagnosis->editAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->Diagnosis->EditValue ?></textarea>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Diagnosis" class="form-group ivf_semenanalysisreport_Diagnosis">
<span<?php echo $ivf_semenanalysisreport_grid->Diagnosis->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->Diagnosis->ViewValue ?></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Diagnosis" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Diagnosis" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Diagnosis" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Diagnosis->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Diagnosis" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Diagnosis" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Diagnosis" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Diagnosis->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Observations->Visible) { // Observations ?>
		<td data-name="Observations">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Observations" class="form-group ivf_semenanalysisreport_Observations">
<textarea data-table="ivf_semenanalysisreport" data-field="x_Observations" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Observations" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Observations" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Observations->getPlaceHolder()) ?>"<?php echo $ivf_semenanalysisreport_grid->Observations->editAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->Observations->EditValue ?></textarea>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Observations" class="form-group ivf_semenanalysisreport_Observations">
<span<?php echo $ivf_semenanalysisreport_grid->Observations->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_grid->Observations->ViewValue ?></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Observations" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Observations" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Observations" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Observations->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Observations" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Observations" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Observations" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Observations->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Signature->Visible) { // Signature ?>
		<td data-name="Signature">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Signature" class="form-group ivf_semenanalysisreport_Signature">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Signature" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Signature" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Signature" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Signature->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Signature->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Signature->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Signature" class="form-group ivf_semenanalysisreport_Signature">
<span<?php echo $ivf_semenanalysisreport_grid->Signature->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->Signature->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Signature" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Signature" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Signature" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Signature->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Signature" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Signature" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Signature" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Signature->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->SemenOrgin->Visible) { // SemenOrgin ?>
		<td data-name="SemenOrgin">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_SemenOrgin" class="form-group ivf_semenanalysisreport_SemenOrgin">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_SemenOrgin" data-value-separator="<?php echo $ivf_semenanalysisreport_grid->SemenOrgin->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SemenOrgin" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SemenOrgin"<?php echo $ivf_semenanalysisreport_grid->SemenOrgin->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_grid->SemenOrgin->selectOptionListHtml("x{$ivf_semenanalysisreport_grid->RowIndex}_SemenOrgin") ?>
		</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_SemenOrgin" class="form-group ivf_semenanalysisreport_SemenOrgin">
<span<?php echo $ivf_semenanalysisreport_grid->SemenOrgin->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->SemenOrgin->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_SemenOrgin" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SemenOrgin" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SemenOrgin" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->SemenOrgin->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_SemenOrgin" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SemenOrgin" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SemenOrgin" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->SemenOrgin->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Donor->Visible) { // Donor ?>
		<td data-name="Donor">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Donor" class="form-group ivf_semenanalysisreport_Donor">
<?php $ivf_semenanalysisreport_grid->Donor->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor"><?php echo EmptyValue(strval($ivf_semenanalysisreport_grid->Donor->ViewValue)) ? $Language->phrase("PleaseSelect") : $ivf_semenanalysisreport_grid->Donor->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf_semenanalysisreport_grid->Donor->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($ivf_semenanalysisreport_grid->Donor->ReadOnly || $ivf_semenanalysisreport_grid->Donor->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf_semenanalysisreport_grid->Donor->Lookup->getParamTag($ivf_semenanalysisreport_grid, "p_x" . $ivf_semenanalysisreport_grid->RowIndex . "_Donor") ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Donor" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf_semenanalysisreport_grid->Donor->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor" value="<?php echo $ivf_semenanalysisreport_grid->Donor->CurrentValue ?>"<?php echo $ivf_semenanalysisreport_grid->Donor->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Donor" class="form-group ivf_semenanalysisreport_Donor">
<span<?php echo $ivf_semenanalysisreport_grid->Donor->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->Donor->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Donor" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Donor->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Donor" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Donor" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Donor->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->DonorBloodgroup->Visible) { // DonorBloodgroup ?>
		<td data-name="DonorBloodgroup">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_DonorBloodgroup" class="form-group ivf_semenanalysisreport_DonorBloodgroup">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_DonorBloodgroup" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DonorBloodgroup" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DonorBloodgroup" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->DonorBloodgroup->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->DonorBloodgroup->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->DonorBloodgroup->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_DonorBloodgroup" class="form-group ivf_semenanalysisreport_DonorBloodgroup">
<span<?php echo $ivf_semenanalysisreport_grid->DonorBloodgroup->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->DonorBloodgroup->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DonorBloodgroup" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DonorBloodgroup" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DonorBloodgroup" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->DonorBloodgroup->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DonorBloodgroup" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DonorBloodgroup" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DonorBloodgroup" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->DonorBloodgroup->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Tank->Visible) { // Tank ?>
		<td data-name="Tank">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Tank" class="form-group ivf_semenanalysisreport_Tank">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Tank" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Tank" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Tank" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Tank->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Tank->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Tank->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Tank" class="form-group ivf_semenanalysisreport_Tank">
<span<?php echo $ivf_semenanalysisreport_grid->Tank->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->Tank->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Tank" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Tank" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Tank" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Tank->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Tank" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Tank" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Tank" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Tank->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Location->Visible) { // Location ?>
		<td data-name="Location">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Location" class="form-group ivf_semenanalysisreport_Location">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Location" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Location" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Location" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Location->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Location->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Location->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Location" class="form-group ivf_semenanalysisreport_Location">
<span<?php echo $ivf_semenanalysisreport_grid->Location->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->Location->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Location" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Location" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Location" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Location->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Location" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Location" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Location" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Location->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Volume1->Visible) { // Volume1 ?>
		<td data-name="Volume1">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Volume1" class="form-group ivf_semenanalysisreport_Volume1">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Volume1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Volume1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Volume1->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Volume1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Volume1" class="form-group ivf_semenanalysisreport_Volume1">
<span<?php echo $ivf_semenanalysisreport_grid->Volume1->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->Volume1->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Volume1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume1" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume1" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Volume1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Concentration1->Visible) { // Concentration1 ?>
		<td data-name="Concentration1">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Concentration1" class="form-group ivf_semenanalysisreport_Concentration1">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Concentration1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Concentration1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Concentration1->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Concentration1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Concentration1" class="form-group ivf_semenanalysisreport_Concentration1">
<span<?php echo $ivf_semenanalysisreport_grid->Concentration1->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->Concentration1->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Concentration1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration1" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration1" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Concentration1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Total1->Visible) { // Total1 ?>
		<td data-name="Total1">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Total1" class="form-group ivf_semenanalysisreport_Total1">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Total1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Total1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Total1->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Total1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Total1" class="form-group ivf_semenanalysisreport_Total1">
<span<?php echo $ivf_semenanalysisreport_grid->Total1->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->Total1->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Total1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total1" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total1" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Total1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->ProgressiveMotility1->Visible) { // ProgressiveMotility1 ?>
		<td data-name="ProgressiveMotility1">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_ProgressiveMotility1" class="form-group ivf_semenanalysisreport_ProgressiveMotility1">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ProgressiveMotility1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->ProgressiveMotility1->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->ProgressiveMotility1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_ProgressiveMotility1" class="form-group ivf_semenanalysisreport_ProgressiveMotility1">
<span<?php echo $ivf_semenanalysisreport_grid->ProgressiveMotility1->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->ProgressiveMotility1->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ProgressiveMotility1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility1" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility1" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ProgressiveMotility1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->NonProgrssiveMotile1->Visible) { // NonProgrssiveMotile1 ?>
		<td data-name="NonProgrssiveMotile1">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_NonProgrssiveMotile1" class="form-group ivf_semenanalysisreport_NonProgrssiveMotile1">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NonProgrssiveMotile1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->NonProgrssiveMotile1->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->NonProgrssiveMotile1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_NonProgrssiveMotile1" class="form-group ivf_semenanalysisreport_NonProgrssiveMotile1">
<span<?php echo $ivf_semenanalysisreport_grid->NonProgrssiveMotile1->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->NonProgrssiveMotile1->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NonProgrssiveMotile1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile1" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile1" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NonProgrssiveMotile1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Immotile1->Visible) { // Immotile1 ?>
		<td data-name="Immotile1">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Immotile1" class="form-group ivf_semenanalysisreport_Immotile1">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Immotile1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Immotile1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Immotile1->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Immotile1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Immotile1" class="form-group ivf_semenanalysisreport_Immotile1">
<span<?php echo $ivf_semenanalysisreport_grid->Immotile1->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->Immotile1->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Immotile1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile1" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile1" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Immotile1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->TotalProgrssiveMotile1->Visible) { // TotalProgrssiveMotile1 ?>
		<td data-name="TotalProgrssiveMotile1">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_TotalProgrssiveMotile1" class="form-group ivf_semenanalysisreport_TotalProgrssiveMotile1">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TotalProgrssiveMotile1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->TotalProgrssiveMotile1->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->TotalProgrssiveMotile1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_TotalProgrssiveMotile1" class="form-group ivf_semenanalysisreport_TotalProgrssiveMotile1">
<span<?php echo $ivf_semenanalysisreport_grid->TotalProgrssiveMotile1->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->TotalProgrssiveMotile1->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TotalProgrssiveMotile1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile1" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile1" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TotalProgrssiveMotile1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<?php if ($ivf_semenanalysisreport_grid->TidNo->getSessionValue() != "") { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_TidNo" class="form-group ivf_semenanalysisreport_TidNo">
<span<?php echo $ivf_semenanalysisreport_grid->TidNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->TidNo->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TidNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_TidNo" class="form-group ivf_semenanalysisreport_TidNo">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_TidNo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->TidNo->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->TidNo->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_TidNo" class="form-group ivf_semenanalysisreport_TidNo">
<span<?php echo $ivf_semenanalysisreport_grid->TidNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->TidNo->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TidNo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TidNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TidNo" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TidNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Color->Visible) { // Color ?>
		<td data-name="Color">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Color" class="form-group ivf_semenanalysisreport_Color">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Color" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Color" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Color" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Color->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Color->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Color->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Color" class="form-group ivf_semenanalysisreport_Color">
<span<?php echo $ivf_semenanalysisreport_grid->Color->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->Color->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Color" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Color" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Color" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Color->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Color" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Color" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Color" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Color->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->DoneBy->Visible) { // DoneBy ?>
		<td data-name="DoneBy">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_DoneBy" class="form-group ivf_semenanalysisreport_DoneBy">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_DoneBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DoneBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DoneBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->DoneBy->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->DoneBy->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->DoneBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_DoneBy" class="form-group ivf_semenanalysisreport_DoneBy">
<span<?php echo $ivf_semenanalysisreport_grid->DoneBy->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->DoneBy->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DoneBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DoneBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DoneBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->DoneBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DoneBy" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DoneBy" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DoneBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->DoneBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Method->Visible) { // Method ?>
		<td data-name="Method">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Method" class="form-group ivf_semenanalysisreport_Method">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Method" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Method" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Method->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Method->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Method->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Method" class="form-group ivf_semenanalysisreport_Method">
<span<?php echo $ivf_semenanalysisreport_grid->Method->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->Method->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Method" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Method" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Method->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Method" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Method" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Method->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Abstinence->Visible) { // Abstinence ?>
		<td data-name="Abstinence">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Abstinence" class="form-group ivf_semenanalysisreport_Abstinence">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Abstinence" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abstinence" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abstinence" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Abstinence->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Abstinence->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Abstinence->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Abstinence" class="form-group ivf_semenanalysisreport_Abstinence">
<span<?php echo $ivf_semenanalysisreport_grid->Abstinence->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->Abstinence->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Abstinence" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abstinence" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abstinence" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Abstinence->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Abstinence" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abstinence" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Abstinence" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Abstinence->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->ProcessedBy->Visible) { // ProcessedBy ?>
		<td data-name="ProcessedBy">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_ProcessedBy" class="form-group ivf_semenanalysisreport_ProcessedBy">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_ProcessedBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProcessedBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProcessedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ProcessedBy->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->ProcessedBy->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->ProcessedBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_ProcessedBy" class="form-group ivf_semenanalysisreport_ProcessedBy">
<span<?php echo $ivf_semenanalysisreport_grid->ProcessedBy->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->ProcessedBy->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProcessedBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProcessedBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProcessedBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ProcessedBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProcessedBy" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProcessedBy" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProcessedBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ProcessedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->InseminationTime->Visible) { // InseminationTime ?>
		<td data-name="InseminationTime">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_InseminationTime" class="form-group ivf_semenanalysisreport_InseminationTime">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_InseminationTime" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationTime" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->InseminationTime->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->InseminationTime->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->InseminationTime->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_InseminationTime" class="form-group ivf_semenanalysisreport_InseminationTime">
<span<?php echo $ivf_semenanalysisreport_grid->InseminationTime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->InseminationTime->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_InseminationTime" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationTime" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationTime" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->InseminationTime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_InseminationTime" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationTime" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationTime" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->InseminationTime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->InseminationBy->Visible) { // InseminationBy ?>
		<td data-name="InseminationBy">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_InseminationBy" class="form-group ivf_semenanalysisreport_InseminationBy">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_InseminationBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->InseminationBy->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->InseminationBy->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->InseminationBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_InseminationBy" class="form-group ivf_semenanalysisreport_InseminationBy">
<span<?php echo $ivf_semenanalysisreport_grid->InseminationBy->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->InseminationBy->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_InseminationBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->InseminationBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_InseminationBy" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationBy" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_InseminationBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->InseminationBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Big->Visible) { // Big ?>
		<td data-name="Big">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Big" class="form-group ivf_semenanalysisreport_Big">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Big" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Big" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Big" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Big->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Big->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Big->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Big" class="form-group ivf_semenanalysisreport_Big">
<span<?php echo $ivf_semenanalysisreport_grid->Big->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->Big->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Big" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Big" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Big" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Big->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Big" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Big" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Big" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Big->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Medium->Visible) { // Medium ?>
		<td data-name="Medium">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Medium" class="form-group ivf_semenanalysisreport_Medium">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Medium" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medium" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medium" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Medium->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Medium->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Medium->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Medium" class="form-group ivf_semenanalysisreport_Medium">
<span<?php echo $ivf_semenanalysisreport_grid->Medium->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->Medium->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Medium" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medium" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medium" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Medium->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Medium" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medium" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Medium" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Medium->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Small->Visible) { // Small ?>
		<td data-name="Small">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Small" class="form-group ivf_semenanalysisreport_Small">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Small" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Small" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Small" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Small->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Small->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Small->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Small" class="form-group ivf_semenanalysisreport_Small">
<span<?php echo $ivf_semenanalysisreport_grid->Small->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->Small->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Small" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Small" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Small" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Small->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Small" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Small" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Small" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Small->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->NoHalo->Visible) { // NoHalo ?>
		<td data-name="NoHalo">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_NoHalo" class="form-group ivf_semenanalysisreport_NoHalo">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_NoHalo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NoHalo" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NoHalo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NoHalo->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->NoHalo->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->NoHalo->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_NoHalo" class="form-group ivf_semenanalysisreport_NoHalo">
<span<?php echo $ivf_semenanalysisreport_grid->NoHalo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->NoHalo->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NoHalo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NoHalo" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NoHalo" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NoHalo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NoHalo" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NoHalo" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NoHalo" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NoHalo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Fragmented->Visible) { // Fragmented ?>
		<td data-name="Fragmented">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Fragmented" class="form-group ivf_semenanalysisreport_Fragmented">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Fragmented" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Fragmented" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Fragmented" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Fragmented->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Fragmented->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Fragmented->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Fragmented" class="form-group ivf_semenanalysisreport_Fragmented">
<span<?php echo $ivf_semenanalysisreport_grid->Fragmented->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->Fragmented->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Fragmented" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Fragmented" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Fragmented" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Fragmented->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Fragmented" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Fragmented" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Fragmented" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Fragmented->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->NonFragmented->Visible) { // NonFragmented ?>
		<td data-name="NonFragmented">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_NonFragmented" class="form-group ivf_semenanalysisreport_NonFragmented">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_NonFragmented" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonFragmented" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonFragmented" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NonFragmented->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->NonFragmented->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->NonFragmented->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_NonFragmented" class="form-group ivf_semenanalysisreport_NonFragmented">
<span<?php echo $ivf_semenanalysisreport_grid->NonFragmented->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->NonFragmented->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonFragmented" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonFragmented" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonFragmented" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NonFragmented->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonFragmented" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonFragmented" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonFragmented" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NonFragmented->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->DFI->Visible) { // DFI ?>
		<td data-name="DFI">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_DFI" class="form-group ivf_semenanalysisreport_DFI">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_DFI" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DFI" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DFI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->DFI->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->DFI->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->DFI->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_DFI" class="form-group ivf_semenanalysisreport_DFI">
<span<?php echo $ivf_semenanalysisreport_grid->DFI->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->DFI->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DFI" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DFI" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DFI" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->DFI->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DFI" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DFI" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_DFI" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->DFI->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->IsueBy->Visible) { // IsueBy ?>
		<td data-name="IsueBy">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_IsueBy" class="form-group ivf_semenanalysisreport_IsueBy">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_IsueBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IsueBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IsueBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IsueBy->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->IsueBy->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->IsueBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_IsueBy" class="form-group ivf_semenanalysisreport_IsueBy">
<span<?php echo $ivf_semenanalysisreport_grid->IsueBy->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->IsueBy->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IsueBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IsueBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IsueBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IsueBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IsueBy" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IsueBy" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IsueBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IsueBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Volume2->Visible) { // Volume2 ?>
		<td data-name="Volume2">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Volume2" class="form-group ivf_semenanalysisreport_Volume2">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Volume2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Volume2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Volume2->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Volume2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Volume2" class="form-group ivf_semenanalysisreport_Volume2">
<span<?php echo $ivf_semenanalysisreport_grid->Volume2->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->Volume2->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Volume2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume2" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume2" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Volume2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Volume2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Concentration2->Visible) { // Concentration2 ?>
		<td data-name="Concentration2">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Concentration2" class="form-group ivf_semenanalysisreport_Concentration2">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Concentration2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Concentration2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Concentration2->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Concentration2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Concentration2" class="form-group ivf_semenanalysisreport_Concentration2">
<span<?php echo $ivf_semenanalysisreport_grid->Concentration2->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->Concentration2->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Concentration2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration2" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration2" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Concentration2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Concentration2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Total2->Visible) { // Total2 ?>
		<td data-name="Total2">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Total2" class="form-group ivf_semenanalysisreport_Total2">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Total2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Total2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Total2->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Total2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Total2" class="form-group ivf_semenanalysisreport_Total2">
<span<?php echo $ivf_semenanalysisreport_grid->Total2->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->Total2->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Total2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total2" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total2" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Total2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Total2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->ProgressiveMotility2->Visible) { // ProgressiveMotility2 ?>
		<td data-name="ProgressiveMotility2">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_ProgressiveMotility2" class="form-group ivf_semenanalysisreport_ProgressiveMotility2">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ProgressiveMotility2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->ProgressiveMotility2->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->ProgressiveMotility2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_ProgressiveMotility2" class="form-group ivf_semenanalysisreport_ProgressiveMotility2">
<span<?php echo $ivf_semenanalysisreport_grid->ProgressiveMotility2->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->ProgressiveMotility2->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ProgressiveMotility2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility2" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility2" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_ProgressiveMotility2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->ProgressiveMotility2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->NonProgrssiveMotile2->Visible) { // NonProgrssiveMotile2 ?>
		<td data-name="NonProgrssiveMotile2">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_NonProgrssiveMotile2" class="form-group ivf_semenanalysisreport_NonProgrssiveMotile2">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NonProgrssiveMotile2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->NonProgrssiveMotile2->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->NonProgrssiveMotile2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_NonProgrssiveMotile2" class="form-group ivf_semenanalysisreport_NonProgrssiveMotile2">
<span<?php echo $ivf_semenanalysisreport_grid->NonProgrssiveMotile2->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->NonProgrssiveMotile2->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NonProgrssiveMotile2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile2" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile2" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_NonProgrssiveMotile2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->NonProgrssiveMotile2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->Immotile2->Visible) { // Immotile2 ?>
		<td data-name="Immotile2">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Immotile2" class="form-group ivf_semenanalysisreport_Immotile2">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Immotile2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Immotile2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->Immotile2->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->Immotile2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Immotile2" class="form-group ivf_semenanalysisreport_Immotile2">
<span<?php echo $ivf_semenanalysisreport_grid->Immotile2->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->Immotile2->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Immotile2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile2" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile2" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_Immotile2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->Immotile2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->TotalProgrssiveMotile2->Visible) { // TotalProgrssiveMotile2 ?>
		<td data-name="TotalProgrssiveMotile2">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_TotalProgrssiveMotile2" class="form-group ivf_semenanalysisreport_TotalProgrssiveMotile2">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TotalProgrssiveMotile2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->TotalProgrssiveMotile2->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->TotalProgrssiveMotile2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_TotalProgrssiveMotile2" class="form-group ivf_semenanalysisreport_TotalProgrssiveMotile2">
<span<?php echo $ivf_semenanalysisreport_grid->TotalProgrssiveMotile2->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->TotalProgrssiveMotile2->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TotalProgrssiveMotile2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile2" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile2" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TotalProgrssiveMotile2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TotalProgrssiveMotile2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->IssuedBy->Visible) { // IssuedBy ?>
		<td data-name="IssuedBy">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_IssuedBy" class="form-group ivf_semenanalysisreport_IssuedBy">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_IssuedBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IssuedBy->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->IssuedBy->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->IssuedBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_IssuedBy" class="form-group ivf_semenanalysisreport_IssuedBy">
<span<?php echo $ivf_semenanalysisreport_grid->IssuedBy->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->IssuedBy->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IssuedBy" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedBy" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IssuedBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IssuedBy" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedBy" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedBy" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IssuedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->IssuedTo->Visible) { // IssuedTo ?>
		<td data-name="IssuedTo">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_IssuedTo" class="form-group ivf_semenanalysisreport_IssuedTo">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_IssuedTo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedTo" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedTo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IssuedTo->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->IssuedTo->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->IssuedTo->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_IssuedTo" class="form-group ivf_semenanalysisreport_IssuedTo">
<span<?php echo $ivf_semenanalysisreport_grid->IssuedTo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->IssuedTo->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IssuedTo" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedTo" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedTo" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IssuedTo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IssuedTo" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedTo" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IssuedTo" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IssuedTo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->PaID->Visible) { // PaID ?>
		<td data-name="PaID">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PaID" class="form-group ivf_semenanalysisreport_PaID">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PaID" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaID" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PaID->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->PaID->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->PaID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PaID" class="form-group ivf_semenanalysisreport_PaID">
<span<?php echo $ivf_semenanalysisreport_grid->PaID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->PaID->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaID" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaID" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaID" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PaID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaID" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaID" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaID" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PaID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->PaName->Visible) { // PaName ?>
		<td data-name="PaName">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PaName" class="form-group ivf_semenanalysisreport_PaName">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PaName" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaName" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PaName->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->PaName->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->PaName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PaName" class="form-group ivf_semenanalysisreport_PaName">
<span<?php echo $ivf_semenanalysisreport_grid->PaName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->PaName->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaName" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaName" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaName" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PaName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaName" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaName" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaName" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PaName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->PaMobile->Visible) { // PaMobile ?>
		<td data-name="PaMobile">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PaMobile" class="form-group ivf_semenanalysisreport_PaMobile">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PaMobile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaMobile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaMobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PaMobile->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->PaMobile->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->PaMobile->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PaMobile" class="form-group ivf_semenanalysisreport_PaMobile">
<span<?php echo $ivf_semenanalysisreport_grid->PaMobile->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->PaMobile->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaMobile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaMobile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaMobile" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PaMobile->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaMobile" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaMobile" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PaMobile" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PaMobile->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->PartnerID->Visible) { // PartnerID ?>
		<td data-name="PartnerID">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PartnerID" class="form-group ivf_semenanalysisreport_PartnerID">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PartnerID" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerID" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PartnerID->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->PartnerID->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->PartnerID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PartnerID" class="form-group ivf_semenanalysisreport_PartnerID">
<span<?php echo $ivf_semenanalysisreport_grid->PartnerID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->PartnerID->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerID" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerID" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerID" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PartnerID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerID" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerID" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerID" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PartnerID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->PartnerName->Visible) { // PartnerName ?>
		<td data-name="PartnerName">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PartnerName" class="form-group ivf_semenanalysisreport_PartnerName">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PartnerName" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerName" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PartnerName->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->PartnerName->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->PartnerName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PartnerName" class="form-group ivf_semenanalysisreport_PartnerName">
<span<?php echo $ivf_semenanalysisreport_grid->PartnerName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->PartnerName->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerName" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerName" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerName" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PartnerName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerName" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerName" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerName" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PartnerName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->PartnerMobile->Visible) { // PartnerMobile ?>
		<td data-name="PartnerMobile">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PartnerMobile" class="form-group ivf_semenanalysisreport_PartnerMobile">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PartnerMobile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerMobile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerMobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PartnerMobile->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->PartnerMobile->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->PartnerMobile->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PartnerMobile" class="form-group ivf_semenanalysisreport_PartnerMobile">
<span<?php echo $ivf_semenanalysisreport_grid->PartnerMobile->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->PartnerMobile->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerMobile" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerMobile" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerMobile" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PartnerMobile->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerMobile" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerMobile" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PartnerMobile" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PartnerMobile->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
		<td data-name="PREG_TEST_DATE">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PREG_TEST_DATE" class="form-group ivf_semenanalysisreport_PREG_TEST_DATE">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PREG_TEST_DATE" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PREG_TEST_DATE" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PREG_TEST_DATE" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PREG_TEST_DATE->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->PREG_TEST_DATE->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->PREG_TEST_DATE->editAttributes() ?>>
<?php if (!$ivf_semenanalysisreport_grid->PREG_TEST_DATE->ReadOnly && !$ivf_semenanalysisreport_grid->PREG_TEST_DATE->Disabled && !isset($ivf_semenanalysisreport_grid->PREG_TEST_DATE->EditAttrs["readonly"]) && !isset($ivf_semenanalysisreport_grid->PREG_TEST_DATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_semenanalysisreportgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_semenanalysisreportgrid", "x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PREG_TEST_DATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PREG_TEST_DATE" class="form-group ivf_semenanalysisreport_PREG_TEST_DATE">
<span<?php echo $ivf_semenanalysisreport_grid->PREG_TEST_DATE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->PREG_TEST_DATE->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PREG_TEST_DATE" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PREG_TEST_DATE" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PREG_TEST_DATE" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PREG_TEST_DATE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PREG_TEST_DATE" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PREG_TEST_DATE" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_PREG_TEST_DATE" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->PREG_TEST_DATE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->SPECIFIC_PROBLEMS->Visible) { // SPECIFIC_PROBLEMS ?>
		<td data-name="SPECIFIC_PROBLEMS">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_SPECIFIC_PROBLEMS" class="form-group ivf_semenanalysisreport_SPECIFIC_PROBLEMS">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_SPECIFIC_PROBLEMS" data-value-separator="<?php echo $ivf_semenanalysisreport_grid->SPECIFIC_PROBLEMS->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SPECIFIC_PROBLEMS" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SPECIFIC_PROBLEMS"<?php echo $ivf_semenanalysisreport_grid->SPECIFIC_PROBLEMS->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_grid->SPECIFIC_PROBLEMS->selectOptionListHtml("x{$ivf_semenanalysisreport_grid->RowIndex}_SPECIFIC_PROBLEMS") ?>
		</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_SPECIFIC_PROBLEMS" class="form-group ivf_semenanalysisreport_SPECIFIC_PROBLEMS">
<span<?php echo $ivf_semenanalysisreport_grid->SPECIFIC_PROBLEMS->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->SPECIFIC_PROBLEMS->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_SPECIFIC_PROBLEMS" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SPECIFIC_PROBLEMS" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SPECIFIC_PROBLEMS" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->SPECIFIC_PROBLEMS->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_SPECIFIC_PROBLEMS" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SPECIFIC_PROBLEMS" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_SPECIFIC_PROBLEMS" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->SPECIFIC_PROBLEMS->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->IMSC_1->Visible) { // IMSC_1 ?>
		<td data-name="IMSC_1">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_IMSC_1" class="form-group ivf_semenanalysisreport_IMSC_1">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_IMSC_1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IMSC_1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->IMSC_1->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->IMSC_1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_IMSC_1" class="form-group ivf_semenanalysisreport_IMSC_1">
<span<?php echo $ivf_semenanalysisreport_grid->IMSC_1->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->IMSC_1->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IMSC_1" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_1" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IMSC_1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IMSC_1" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_1" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_1" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IMSC_1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->IMSC_2->Visible) { // IMSC_2 ?>
		<td data-name="IMSC_2">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_IMSC_2" class="form-group ivf_semenanalysisreport_IMSC_2">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_IMSC_2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IMSC_2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->IMSC_2->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->IMSC_2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_IMSC_2" class="form-group ivf_semenanalysisreport_IMSC_2">
<span<?php echo $ivf_semenanalysisreport_grid->IMSC_2->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->IMSC_2->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IMSC_2" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_2" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IMSC_2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IMSC_2" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_2" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IMSC_2" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IMSC_2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->LIQUIFACTION_STORAGE->Visible) { // LIQUIFACTION_STORAGE ?>
		<td data-name="LIQUIFACTION_STORAGE">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_LIQUIFACTION_STORAGE" class="form-group ivf_semenanalysisreport_LIQUIFACTION_STORAGE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_LIQUIFACTION_STORAGE" data-value-separator="<?php echo $ivf_semenanalysisreport_grid->LIQUIFACTION_STORAGE->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_LIQUIFACTION_STORAGE" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_LIQUIFACTION_STORAGE"<?php echo $ivf_semenanalysisreport_grid->LIQUIFACTION_STORAGE->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_grid->LIQUIFACTION_STORAGE->selectOptionListHtml("x{$ivf_semenanalysisreport_grid->RowIndex}_LIQUIFACTION_STORAGE") ?>
		</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_LIQUIFACTION_STORAGE" class="form-group ivf_semenanalysisreport_LIQUIFACTION_STORAGE">
<span<?php echo $ivf_semenanalysisreport_grid->LIQUIFACTION_STORAGE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->LIQUIFACTION_STORAGE->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_LIQUIFACTION_STORAGE" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_LIQUIFACTION_STORAGE" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_LIQUIFACTION_STORAGE" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->LIQUIFACTION_STORAGE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_LIQUIFACTION_STORAGE" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_LIQUIFACTION_STORAGE" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_LIQUIFACTION_STORAGE" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->LIQUIFACTION_STORAGE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->IUI_PREP_METHOD->Visible) { // IUI_PREP_METHOD ?>
		<td data-name="IUI_PREP_METHOD">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_IUI_PREP_METHOD" class="form-group ivf_semenanalysisreport_IUI_PREP_METHOD">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_IUI_PREP_METHOD" data-value-separator="<?php echo $ivf_semenanalysisreport_grid->IUI_PREP_METHOD->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IUI_PREP_METHOD" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IUI_PREP_METHOD"<?php echo $ivf_semenanalysisreport_grid->IUI_PREP_METHOD->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_grid->IUI_PREP_METHOD->selectOptionListHtml("x{$ivf_semenanalysisreport_grid->RowIndex}_IUI_PREP_METHOD") ?>
		</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_IUI_PREP_METHOD" class="form-group ivf_semenanalysisreport_IUI_PREP_METHOD">
<span<?php echo $ivf_semenanalysisreport_grid->IUI_PREP_METHOD->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->IUI_PREP_METHOD->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IUI_PREP_METHOD" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IUI_PREP_METHOD" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IUI_PREP_METHOD" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IUI_PREP_METHOD->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IUI_PREP_METHOD" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IUI_PREP_METHOD" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_IUI_PREP_METHOD" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->IUI_PREP_METHOD->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->TIME_FROM_TRIGGER->Visible) { // TIME_FROM_TRIGGER ?>
		<td data-name="TIME_FROM_TRIGGER">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_TIME_FROM_TRIGGER" class="form-group ivf_semenanalysisreport_TIME_FROM_TRIGGER">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_TRIGGER" data-value-separator="<?php echo $ivf_semenanalysisreport_grid->TIME_FROM_TRIGGER->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_TRIGGER" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_TRIGGER"<?php echo $ivf_semenanalysisreport_grid->TIME_FROM_TRIGGER->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_grid->TIME_FROM_TRIGGER->selectOptionListHtml("x{$ivf_semenanalysisreport_grid->RowIndex}_TIME_FROM_TRIGGER") ?>
		</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_TIME_FROM_TRIGGER" class="form-group ivf_semenanalysisreport_TIME_FROM_TRIGGER">
<span<?php echo $ivf_semenanalysisreport_grid->TIME_FROM_TRIGGER->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->TIME_FROM_TRIGGER->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_TRIGGER" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_TRIGGER" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_TRIGGER" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TIME_FROM_TRIGGER->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_TRIGGER" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_TRIGGER" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_TRIGGER" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TIME_FROM_TRIGGER->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->COLLECTION_TO_PREPARATION->Visible) { // COLLECTION_TO_PREPARATION ?>
		<td data-name="COLLECTION_TO_PREPARATION">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION" class="form-group ivf_semenanalysisreport_COLLECTION_TO_PREPARATION">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_COLLECTION_TO_PREPARATION" data-value-separator="<?php echo $ivf_semenanalysisreport_grid->COLLECTION_TO_PREPARATION->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_COLLECTION_TO_PREPARATION" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_COLLECTION_TO_PREPARATION"<?php echo $ivf_semenanalysisreport_grid->COLLECTION_TO_PREPARATION->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_grid->COLLECTION_TO_PREPARATION->selectOptionListHtml("x{$ivf_semenanalysisreport_grid->RowIndex}_COLLECTION_TO_PREPARATION") ?>
		</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION" class="form-group ivf_semenanalysisreport_COLLECTION_TO_PREPARATION">
<span<?php echo $ivf_semenanalysisreport_grid->COLLECTION_TO_PREPARATION->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->COLLECTION_TO_PREPARATION->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_COLLECTION_TO_PREPARATION" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_COLLECTION_TO_PREPARATION" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_COLLECTION_TO_PREPARATION" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->COLLECTION_TO_PREPARATION->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_COLLECTION_TO_PREPARATION" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_COLLECTION_TO_PREPARATION" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_COLLECTION_TO_PREPARATION" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->COLLECTION_TO_PREPARATION->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_grid->TIME_FROM_PREP_TO_INSEM->Visible) { // TIME_FROM_PREP_TO_INSEM ?>
		<td data-name="TIME_FROM_PREP_TO_INSEM">
<?php if (!$ivf_semenanalysisreport->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM" class="form-group ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_PREP_TO_INSEM" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TIME_FROM_PREP_TO_INSEM->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_grid->TIME_FROM_PREP_TO_INSEM->EditValue ?>"<?php echo $ivf_semenanalysisreport_grid->TIME_FROM_PREP_TO_INSEM->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM" class="form-group ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM">
<span<?php echo $ivf_semenanalysisreport_grid->TIME_FROM_PREP_TO_INSEM->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_grid->TIME_FROM_PREP_TO_INSEM->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_PREP_TO_INSEM" name="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" id="x<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TIME_FROM_PREP_TO_INSEM->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_PREP_TO_INSEM" name="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" id="o<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" value="<?php echo HtmlEncode($ivf_semenanalysisreport_grid->TIME_FROM_PREP_TO_INSEM->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_semenanalysisreport_grid->ListOptions->render("body", "right", $ivf_semenanalysisreport_grid->RowIndex);
?>
<script>
loadjs.ready(["fivf_semenanalysisreportgrid", "load"], function() {
	fivf_semenanalysisreportgrid.updateLists(<?php echo $ivf_semenanalysisreport_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
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
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($ivf_semenanalysisreport_grid->Recordset)
	$ivf_semenanalysisreport_grid->Recordset->Close();
?>
<?php if ($ivf_semenanalysisreport_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $ivf_semenanalysisreport_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_semenanalysisreport_grid->TotalRecords == 0 && !$ivf_semenanalysisreport->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_semenanalysisreport_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$ivf_semenanalysisreport_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$ivf_semenanalysisreport->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_ivf_semenanalysisreport",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php
$ivf_semenanalysisreport_grid->terminate();
?>