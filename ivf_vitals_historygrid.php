<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($ivf_vitals_history_grid))
	$ivf_vitals_history_grid = new ivf_vitals_history_grid();

// Run the page
$ivf_vitals_history_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_vitals_history_grid->Page_Render();
?>
<?php if (!$ivf_vitals_history->isExport()) { ?>
<script>

// Form object
var fivf_vitals_historygrid = new ew.Form("fivf_vitals_historygrid", "grid");
fivf_vitals_historygrid.formKeyCountName = '<?php echo $ivf_vitals_history_grid->FormKeyCountName ?>';

// Validate form
fivf_vitals_historygrid.validate = function() {
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
		<?php if ($ivf_vitals_history_grid->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->id->caption(), $ivf_vitals_history->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->RIDNO->Required) { ?>
			elm = this.getElements("x" + infix + "_RIDNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->RIDNO->caption(), $ivf_vitals_history->RIDNO->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RIDNO");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_vitals_history->RIDNO->errorMessage()) ?>");
		<?php if ($ivf_vitals_history_grid->Name->Required) { ?>
			elm = this.getElements("x" + infix + "_Name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->Name->caption(), $ivf_vitals_history->Name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->Age->caption(), $ivf_vitals_history->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->SEX->Required) { ?>
			elm = this.getElements("x" + infix + "_SEX");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->SEX->caption(), $ivf_vitals_history->SEX->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->Religion->Required) { ?>
			elm = this.getElements("x" + infix + "_Religion");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->Religion->caption(), $ivf_vitals_history->Religion->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->Address->Required) { ?>
			elm = this.getElements("x" + infix + "_Address");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->Address->caption(), $ivf_vitals_history->Address->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->IdentificationMark->Required) { ?>
			elm = this.getElements("x" + infix + "_IdentificationMark");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->IdentificationMark->caption(), $ivf_vitals_history->IdentificationMark->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->DoublewitnessName1->Required) { ?>
			elm = this.getElements("x" + infix + "_DoublewitnessName1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->DoublewitnessName1->caption(), $ivf_vitals_history->DoublewitnessName1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->DoublewitnessName2->Required) { ?>
			elm = this.getElements("x" + infix + "_DoublewitnessName2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->DoublewitnessName2->caption(), $ivf_vitals_history->DoublewitnessName2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->Chiefcomplaints->Required) { ?>
			elm = this.getElements("x" + infix + "_Chiefcomplaints");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->Chiefcomplaints->caption(), $ivf_vitals_history->Chiefcomplaints->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->MenstrualHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_MenstrualHistory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->MenstrualHistory->caption(), $ivf_vitals_history->MenstrualHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->ObstetricHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_ObstetricHistory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->ObstetricHistory->caption(), $ivf_vitals_history->ObstetricHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->MedicalHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_MedicalHistory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->MedicalHistory->caption(), $ivf_vitals_history->MedicalHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->SurgicalHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_SurgicalHistory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->SurgicalHistory->caption(), $ivf_vitals_history->SurgicalHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->Generalexaminationpallor->Required) { ?>
			elm = this.getElements("x" + infix + "_Generalexaminationpallor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->Generalexaminationpallor->caption(), $ivf_vitals_history->Generalexaminationpallor->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->PR->Required) { ?>
			elm = this.getElements("x" + infix + "_PR");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->PR->caption(), $ivf_vitals_history->PR->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->CVS->Required) { ?>
			elm = this.getElements("x" + infix + "_CVS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->CVS->caption(), $ivf_vitals_history->CVS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->PA->Required) { ?>
			elm = this.getElements("x" + infix + "_PA");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->PA->caption(), $ivf_vitals_history->PA->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->PROVISIONALDIAGNOSIS->Required) { ?>
			elm = this.getElements("x" + infix + "_PROVISIONALDIAGNOSIS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->PROVISIONALDIAGNOSIS->caption(), $ivf_vitals_history->PROVISIONALDIAGNOSIS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->Investigations->Required) { ?>
			elm = this.getElements("x" + infix + "_Investigations");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->Investigations->caption(), $ivf_vitals_history->Investigations->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->Fheight->Required) { ?>
			elm = this.getElements("x" + infix + "_Fheight");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->Fheight->caption(), $ivf_vitals_history->Fheight->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->Fweight->Required) { ?>
			elm = this.getElements("x" + infix + "_Fweight");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->Fweight->caption(), $ivf_vitals_history->Fweight->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->FBMI->Required) { ?>
			elm = this.getElements("x" + infix + "_FBMI");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->FBMI->caption(), $ivf_vitals_history->FBMI->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->FBloodgroup->Required) { ?>
			elm = this.getElements("x" + infix + "_FBloodgroup");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->FBloodgroup->caption(), $ivf_vitals_history->FBloodgroup->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->Mheight->Required) { ?>
			elm = this.getElements("x" + infix + "_Mheight");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->Mheight->caption(), $ivf_vitals_history->Mheight->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->Mweight->Required) { ?>
			elm = this.getElements("x" + infix + "_Mweight");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->Mweight->caption(), $ivf_vitals_history->Mweight->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->MBMI->Required) { ?>
			elm = this.getElements("x" + infix + "_MBMI");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->MBMI->caption(), $ivf_vitals_history->MBMI->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->MBloodgroup->Required) { ?>
			elm = this.getElements("x" + infix + "_MBloodgroup");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->MBloodgroup->caption(), $ivf_vitals_history->MBloodgroup->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->FBuild->Required) { ?>
			elm = this.getElements("x" + infix + "_FBuild");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->FBuild->caption(), $ivf_vitals_history->FBuild->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->MBuild->Required) { ?>
			elm = this.getElements("x" + infix + "_MBuild");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->MBuild->caption(), $ivf_vitals_history->MBuild->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->FSkinColor->Required) { ?>
			elm = this.getElements("x" + infix + "_FSkinColor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->FSkinColor->caption(), $ivf_vitals_history->FSkinColor->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->MSkinColor->Required) { ?>
			elm = this.getElements("x" + infix + "_MSkinColor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->MSkinColor->caption(), $ivf_vitals_history->MSkinColor->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->FEyesColor->Required) { ?>
			elm = this.getElements("x" + infix + "_FEyesColor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->FEyesColor->caption(), $ivf_vitals_history->FEyesColor->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->MEyesColor->Required) { ?>
			elm = this.getElements("x" + infix + "_MEyesColor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->MEyesColor->caption(), $ivf_vitals_history->MEyesColor->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->FHairColor->Required) { ?>
			elm = this.getElements("x" + infix + "_FHairColor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->FHairColor->caption(), $ivf_vitals_history->FHairColor->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->MhairColor->Required) { ?>
			elm = this.getElements("x" + infix + "_MhairColor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->MhairColor->caption(), $ivf_vitals_history->MhairColor->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->FhairTexture->Required) { ?>
			elm = this.getElements("x" + infix + "_FhairTexture");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->FhairTexture->caption(), $ivf_vitals_history->FhairTexture->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->MHairTexture->Required) { ?>
			elm = this.getElements("x" + infix + "_MHairTexture");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->MHairTexture->caption(), $ivf_vitals_history->MHairTexture->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->Fothers->Required) { ?>
			elm = this.getElements("x" + infix + "_Fothers");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->Fothers->caption(), $ivf_vitals_history->Fothers->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->Mothers->Required) { ?>
			elm = this.getElements("x" + infix + "_Mothers");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->Mothers->caption(), $ivf_vitals_history->Mothers->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->PGE->Required) { ?>
			elm = this.getElements("x" + infix + "_PGE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->PGE->caption(), $ivf_vitals_history->PGE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->PPR->Required) { ?>
			elm = this.getElements("x" + infix + "_PPR");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->PPR->caption(), $ivf_vitals_history->PPR->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->PBP->Required) { ?>
			elm = this.getElements("x" + infix + "_PBP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->PBP->caption(), $ivf_vitals_history->PBP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->Breast->Required) { ?>
			elm = this.getElements("x" + infix + "_Breast");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->Breast->caption(), $ivf_vitals_history->Breast->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->PPA->Required) { ?>
			elm = this.getElements("x" + infix + "_PPA");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->PPA->caption(), $ivf_vitals_history->PPA->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->PPSV->Required) { ?>
			elm = this.getElements("x" + infix + "_PPSV");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->PPSV->caption(), $ivf_vitals_history->PPSV->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->PPAPSMEAR->Required) { ?>
			elm = this.getElements("x" + infix + "_PPAPSMEAR");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->PPAPSMEAR->caption(), $ivf_vitals_history->PPAPSMEAR->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->PTHYROID->Required) { ?>
			elm = this.getElements("x" + infix + "_PTHYROID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->PTHYROID->caption(), $ivf_vitals_history->PTHYROID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->MTHYROID->Required) { ?>
			elm = this.getElements("x" + infix + "_MTHYROID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->MTHYROID->caption(), $ivf_vitals_history->MTHYROID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->SecSexCharacters->Required) { ?>
			elm = this.getElements("x" + infix + "_SecSexCharacters");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->SecSexCharacters->caption(), $ivf_vitals_history->SecSexCharacters->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->PenisUM->Required) { ?>
			elm = this.getElements("x" + infix + "_PenisUM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->PenisUM->caption(), $ivf_vitals_history->PenisUM->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->VAS->Required) { ?>
			elm = this.getElements("x" + infix + "_VAS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->VAS->caption(), $ivf_vitals_history->VAS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->EPIDIDYMIS->Required) { ?>
			elm = this.getElements("x" + infix + "_EPIDIDYMIS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->EPIDIDYMIS->caption(), $ivf_vitals_history->EPIDIDYMIS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->Varicocele->Required) { ?>
			elm = this.getElements("x" + infix + "_Varicocele");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->Varicocele->caption(), $ivf_vitals_history->Varicocele->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->FamilyHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_FamilyHistory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->FamilyHistory->caption(), $ivf_vitals_history->FamilyHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->Addictions->Required) { ?>
			elm = this.getElements("x" + infix + "_Addictions");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->Addictions->caption(), $ivf_vitals_history->Addictions->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->Medical->Required) { ?>
			elm = this.getElements("x" + infix + "_Medical");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->Medical->caption(), $ivf_vitals_history->Medical->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->Surgical->Required) { ?>
			elm = this.getElements("x" + infix + "_Surgical");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->Surgical->caption(), $ivf_vitals_history->Surgical->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->CoitalHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_CoitalHistory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->CoitalHistory->caption(), $ivf_vitals_history->CoitalHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->MariedFor->Required) { ?>
			elm = this.getElements("x" + infix + "_MariedFor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->MariedFor->caption(), $ivf_vitals_history->MariedFor->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->CMNCM->Required) { ?>
			elm = this.getElements("x" + infix + "_CMNCM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->CMNCM->caption(), $ivf_vitals_history->CMNCM->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_grid->TidNo->Required) { ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->TidNo->caption(), $ivf_vitals_history->TidNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_vitals_history->TidNo->errorMessage()) ?>");
		<?php if ($ivf_vitals_history_grid->pFamilyHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_pFamilyHistory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->pFamilyHistory->caption(), $ivf_vitals_history->pFamilyHistory->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
fivf_vitals_historygrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "RIDNO", false)) return false;
	if (ew.valueChanged(fobj, infix, "Name", false)) return false;
	if (ew.valueChanged(fobj, infix, "Age", false)) return false;
	if (ew.valueChanged(fobj, infix, "SEX", false)) return false;
	if (ew.valueChanged(fobj, infix, "Religion", false)) return false;
	if (ew.valueChanged(fobj, infix, "Address", false)) return false;
	if (ew.valueChanged(fobj, infix, "IdentificationMark", false)) return false;
	if (ew.valueChanged(fobj, infix, "DoublewitnessName1", false)) return false;
	if (ew.valueChanged(fobj, infix, "DoublewitnessName2", false)) return false;
	if (ew.valueChanged(fobj, infix, "Chiefcomplaints", false)) return false;
	if (ew.valueChanged(fobj, infix, "MenstrualHistory", false)) return false;
	if (ew.valueChanged(fobj, infix, "ObstetricHistory", false)) return false;
	if (ew.valueChanged(fobj, infix, "MedicalHistory", false)) return false;
	if (ew.valueChanged(fobj, infix, "SurgicalHistory", false)) return false;
	if (ew.valueChanged(fobj, infix, "Generalexaminationpallor", false)) return false;
	if (ew.valueChanged(fobj, infix, "PR", false)) return false;
	if (ew.valueChanged(fobj, infix, "CVS", false)) return false;
	if (ew.valueChanged(fobj, infix, "PA", false)) return false;
	if (ew.valueChanged(fobj, infix, "PROVISIONALDIAGNOSIS", false)) return false;
	if (ew.valueChanged(fobj, infix, "Investigations", false)) return false;
	if (ew.valueChanged(fobj, infix, "Fheight", false)) return false;
	if (ew.valueChanged(fobj, infix, "Fweight", false)) return false;
	if (ew.valueChanged(fobj, infix, "FBMI", false)) return false;
	if (ew.valueChanged(fobj, infix, "FBloodgroup", false)) return false;
	if (ew.valueChanged(fobj, infix, "Mheight", false)) return false;
	if (ew.valueChanged(fobj, infix, "Mweight", false)) return false;
	if (ew.valueChanged(fobj, infix, "MBMI", false)) return false;
	if (ew.valueChanged(fobj, infix, "MBloodgroup", false)) return false;
	if (ew.valueChanged(fobj, infix, "FBuild", false)) return false;
	if (ew.valueChanged(fobj, infix, "MBuild", false)) return false;
	if (ew.valueChanged(fobj, infix, "FSkinColor", false)) return false;
	if (ew.valueChanged(fobj, infix, "MSkinColor", false)) return false;
	if (ew.valueChanged(fobj, infix, "FEyesColor", false)) return false;
	if (ew.valueChanged(fobj, infix, "MEyesColor", false)) return false;
	if (ew.valueChanged(fobj, infix, "FHairColor", false)) return false;
	if (ew.valueChanged(fobj, infix, "MhairColor", false)) return false;
	if (ew.valueChanged(fobj, infix, "FhairTexture", false)) return false;
	if (ew.valueChanged(fobj, infix, "MHairTexture", false)) return false;
	if (ew.valueChanged(fobj, infix, "Fothers", false)) return false;
	if (ew.valueChanged(fobj, infix, "Mothers", false)) return false;
	if (ew.valueChanged(fobj, infix, "PGE", false)) return false;
	if (ew.valueChanged(fobj, infix, "PPR", false)) return false;
	if (ew.valueChanged(fobj, infix, "PBP", false)) return false;
	if (ew.valueChanged(fobj, infix, "Breast", false)) return false;
	if (ew.valueChanged(fobj, infix, "PPA", false)) return false;
	if (ew.valueChanged(fobj, infix, "PPSV", false)) return false;
	if (ew.valueChanged(fobj, infix, "PPAPSMEAR", false)) return false;
	if (ew.valueChanged(fobj, infix, "PTHYROID", false)) return false;
	if (ew.valueChanged(fobj, infix, "MTHYROID", false)) return false;
	if (ew.valueChanged(fobj, infix, "SecSexCharacters", false)) return false;
	if (ew.valueChanged(fobj, infix, "PenisUM", false)) return false;
	if (ew.valueChanged(fobj, infix, "VAS", false)) return false;
	if (ew.valueChanged(fobj, infix, "EPIDIDYMIS", false)) return false;
	if (ew.valueChanged(fobj, infix, "Varicocele", false)) return false;
	if (ew.valueChanged(fobj, infix, "FamilyHistory", false)) return false;
	if (ew.valueChanged(fobj, infix, "Addictions", false)) return false;
	if (ew.valueChanged(fobj, infix, "Medical", false)) return false;
	if (ew.valueChanged(fobj, infix, "Surgical", false)) return false;
	if (ew.valueChanged(fobj, infix, "CoitalHistory", false)) return false;
	if (ew.valueChanged(fobj, infix, "MariedFor", false)) return false;
	if (ew.valueChanged(fobj, infix, "CMNCM", false)) return false;
	if (ew.valueChanged(fobj, infix, "TidNo", false)) return false;
	if (ew.valueChanged(fobj, infix, "pFamilyHistory", false)) return false;
	return true;
}

// Form_CustomValidate event
fivf_vitals_historygrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_vitals_historygrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_vitals_historygrid.lists["x_MedicalHistory"] = <?php echo $ivf_vitals_history_grid->MedicalHistory->Lookup->toClientList() ?>;
fivf_vitals_historygrid.lists["x_MedicalHistory"].options = <?php echo JsonEncode($ivf_vitals_history_grid->MedicalHistory->options(FALSE, TRUE)) ?>;
fivf_vitals_historygrid.lists["x_FBloodgroup"] = <?php echo $ivf_vitals_history_grid->FBloodgroup->Lookup->toClientList() ?>;
fivf_vitals_historygrid.lists["x_FBloodgroup"].options = <?php echo JsonEncode($ivf_vitals_history_grid->FBloodgroup->lookupOptions()) ?>;
fivf_vitals_historygrid.lists["x_MBloodgroup"] = <?php echo $ivf_vitals_history_grid->MBloodgroup->Lookup->toClientList() ?>;
fivf_vitals_historygrid.lists["x_MBloodgroup"].options = <?php echo JsonEncode($ivf_vitals_history_grid->MBloodgroup->lookupOptions()) ?>;
fivf_vitals_historygrid.lists["x_FBuild"] = <?php echo $ivf_vitals_history_grid->FBuild->Lookup->toClientList() ?>;
fivf_vitals_historygrid.lists["x_FBuild"].options = <?php echo JsonEncode($ivf_vitals_history_grid->FBuild->options(FALSE, TRUE)) ?>;
fivf_vitals_historygrid.lists["x_MBuild"] = <?php echo $ivf_vitals_history_grid->MBuild->Lookup->toClientList() ?>;
fivf_vitals_historygrid.lists["x_MBuild"].options = <?php echo JsonEncode($ivf_vitals_history_grid->MBuild->options(FALSE, TRUE)) ?>;
fivf_vitals_historygrid.lists["x_FSkinColor"] = <?php echo $ivf_vitals_history_grid->FSkinColor->Lookup->toClientList() ?>;
fivf_vitals_historygrid.lists["x_FSkinColor"].options = <?php echo JsonEncode($ivf_vitals_history_grid->FSkinColor->options(FALSE, TRUE)) ?>;
fivf_vitals_historygrid.lists["x_MSkinColor"] = <?php echo $ivf_vitals_history_grid->MSkinColor->Lookup->toClientList() ?>;
fivf_vitals_historygrid.lists["x_MSkinColor"].options = <?php echo JsonEncode($ivf_vitals_history_grid->MSkinColor->options(FALSE, TRUE)) ?>;
fivf_vitals_historygrid.lists["x_FEyesColor"] = <?php echo $ivf_vitals_history_grid->FEyesColor->Lookup->toClientList() ?>;
fivf_vitals_historygrid.lists["x_FEyesColor"].options = <?php echo JsonEncode($ivf_vitals_history_grid->FEyesColor->options(FALSE, TRUE)) ?>;
fivf_vitals_historygrid.lists["x_MEyesColor"] = <?php echo $ivf_vitals_history_grid->MEyesColor->Lookup->toClientList() ?>;
fivf_vitals_historygrid.lists["x_MEyesColor"].options = <?php echo JsonEncode($ivf_vitals_history_grid->MEyesColor->options(FALSE, TRUE)) ?>;
fivf_vitals_historygrid.lists["x_FHairColor"] = <?php echo $ivf_vitals_history_grid->FHairColor->Lookup->toClientList() ?>;
fivf_vitals_historygrid.lists["x_FHairColor"].options = <?php echo JsonEncode($ivf_vitals_history_grid->FHairColor->options(FALSE, TRUE)) ?>;
fivf_vitals_historygrid.lists["x_MhairColor"] = <?php echo $ivf_vitals_history_grid->MhairColor->Lookup->toClientList() ?>;
fivf_vitals_historygrid.lists["x_MhairColor"].options = <?php echo JsonEncode($ivf_vitals_history_grid->MhairColor->options(FALSE, TRUE)) ?>;
fivf_vitals_historygrid.lists["x_FhairTexture"] = <?php echo $ivf_vitals_history_grid->FhairTexture->Lookup->toClientList() ?>;
fivf_vitals_historygrid.lists["x_FhairTexture"].options = <?php echo JsonEncode($ivf_vitals_history_grid->FhairTexture->options(FALSE, TRUE)) ?>;
fivf_vitals_historygrid.lists["x_MHairTexture"] = <?php echo $ivf_vitals_history_grid->MHairTexture->Lookup->toClientList() ?>;
fivf_vitals_historygrid.lists["x_MHairTexture"].options = <?php echo JsonEncode($ivf_vitals_history_grid->MHairTexture->options(FALSE, TRUE)) ?>;
fivf_vitals_historygrid.lists["x_FamilyHistory"] = <?php echo $ivf_vitals_history_grid->FamilyHistory->Lookup->toClientList() ?>;
fivf_vitals_historygrid.lists["x_FamilyHistory"].options = <?php echo JsonEncode($ivf_vitals_history_grid->FamilyHistory->options(FALSE, TRUE)) ?>;
fivf_vitals_historygrid.lists["x_Addictions"] = <?php echo $ivf_vitals_history_grid->Addictions->Lookup->toClientList() ?>;
fivf_vitals_historygrid.lists["x_Addictions"].options = <?php echo JsonEncode($ivf_vitals_history_grid->Addictions->options(FALSE, TRUE)) ?>;
fivf_vitals_historygrid.lists["x_Medical"] = <?php echo $ivf_vitals_history_grid->Medical->Lookup->toClientList() ?>;
fivf_vitals_historygrid.lists["x_Medical"].options = <?php echo JsonEncode($ivf_vitals_history_grid->Medical->options(FALSE, TRUE)) ?>;
fivf_vitals_historygrid.lists["x_Surgical"] = <?php echo $ivf_vitals_history_grid->Surgical->Lookup->toClientList() ?>;
fivf_vitals_historygrid.lists["x_Surgical"].options = <?php echo JsonEncode($ivf_vitals_history_grid->Surgical->options(FALSE, TRUE)) ?>;
fivf_vitals_historygrid.lists["x_CoitalHistory"] = <?php echo $ivf_vitals_history_grid->CoitalHistory->Lookup->toClientList() ?>;
fivf_vitals_historygrid.lists["x_CoitalHistory"].options = <?php echo JsonEncode($ivf_vitals_history_grid->CoitalHistory->options(FALSE, TRUE)) ?>;
fivf_vitals_historygrid.lists["x_pFamilyHistory"] = <?php echo $ivf_vitals_history_grid->pFamilyHistory->Lookup->toClientList() ?>;
fivf_vitals_historygrid.lists["x_pFamilyHistory"].options = <?php echo JsonEncode($ivf_vitals_history_grid->pFamilyHistory->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$ivf_vitals_history_grid->renderOtherOptions();
?>
<?php $ivf_vitals_history_grid->showPageHeader(); ?>
<?php
$ivf_vitals_history_grid->showMessage();
?>
<?php if ($ivf_vitals_history_grid->TotalRecs > 0 || $ivf_vitals_history->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_vitals_history_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_vitals_history">
<?php if ($ivf_vitals_history_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $ivf_vitals_history_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fivf_vitals_historygrid" class="ew-form ew-list-form form-inline">
<div id="gmp_ivf_vitals_history" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_ivf_vitals_historygrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_vitals_history_grid->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_vitals_history_grid->renderListOptions();

// Render list options (header, left)
$ivf_vitals_history_grid->ListOptions->render("header", "left");
?>
<?php if ($ivf_vitals_history->id->Visible) { // id ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->id) == "") { ?>
		<th data-name="id" class="<?php echo $ivf_vitals_history->id->headerCellClass() ?>"><div id="elh_ivf_vitals_history_id" class="ivf_vitals_history_id"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $ivf_vitals_history->id->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_id" class="ivf_vitals_history_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->RIDNO->Visible) { // RIDNO ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->RIDNO) == "") { ?>
		<th data-name="RIDNO" class="<?php echo $ivf_vitals_history->RIDNO->headerCellClass() ?>"><div id="elh_ivf_vitals_history_RIDNO" class="ivf_vitals_history_RIDNO"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->RIDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNO" class="<?php echo $ivf_vitals_history->RIDNO->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_RIDNO" class="ivf_vitals_history_RIDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->RIDNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->RIDNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->Name->Visible) { // Name ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $ivf_vitals_history->Name->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Name" class="ivf_vitals_history_Name"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $ivf_vitals_history->Name->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_Name" class="ivf_vitals_history_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->Name->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->Name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->Name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->Age->Visible) { // Age ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $ivf_vitals_history->Age->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Age" class="ivf_vitals_history_Age"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $ivf_vitals_history->Age->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_Age" class="ivf_vitals_history_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->Age->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->SEX->Visible) { // SEX ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->SEX) == "") { ?>
		<th data-name="SEX" class="<?php echo $ivf_vitals_history->SEX->headerCellClass() ?>"><div id="elh_ivf_vitals_history_SEX" class="ivf_vitals_history_SEX"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->SEX->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SEX" class="<?php echo $ivf_vitals_history->SEX->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_SEX" class="ivf_vitals_history_SEX">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->SEX->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->SEX->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->SEX->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->Religion->Visible) { // Religion ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->Religion) == "") { ?>
		<th data-name="Religion" class="<?php echo $ivf_vitals_history->Religion->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Religion" class="ivf_vitals_history_Religion"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->Religion->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Religion" class="<?php echo $ivf_vitals_history->Religion->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_Religion" class="ivf_vitals_history_Religion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->Religion->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->Religion->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->Religion->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->Address->Visible) { // Address ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->Address) == "") { ?>
		<th data-name="Address" class="<?php echo $ivf_vitals_history->Address->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Address" class="ivf_vitals_history_Address"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->Address->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Address" class="<?php echo $ivf_vitals_history->Address->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_Address" class="ivf_vitals_history_Address">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->Address->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->Address->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->Address->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->IdentificationMark->Visible) { // IdentificationMark ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->IdentificationMark) == "") { ?>
		<th data-name="IdentificationMark" class="<?php echo $ivf_vitals_history->IdentificationMark->headerCellClass() ?>"><div id="elh_ivf_vitals_history_IdentificationMark" class="ivf_vitals_history_IdentificationMark"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->IdentificationMark->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IdentificationMark" class="<?php echo $ivf_vitals_history->IdentificationMark->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_IdentificationMark" class="ivf_vitals_history_IdentificationMark">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->IdentificationMark->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->IdentificationMark->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->IdentificationMark->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->DoublewitnessName1->Visible) { // DoublewitnessName1 ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->DoublewitnessName1) == "") { ?>
		<th data-name="DoublewitnessName1" class="<?php echo $ivf_vitals_history->DoublewitnessName1->headerCellClass() ?>"><div id="elh_ivf_vitals_history_DoublewitnessName1" class="ivf_vitals_history_DoublewitnessName1"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->DoublewitnessName1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DoublewitnessName1" class="<?php echo $ivf_vitals_history->DoublewitnessName1->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_DoublewitnessName1" class="ivf_vitals_history_DoublewitnessName1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->DoublewitnessName1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->DoublewitnessName1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->DoublewitnessName1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->DoublewitnessName2->Visible) { // DoublewitnessName2 ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->DoublewitnessName2) == "") { ?>
		<th data-name="DoublewitnessName2" class="<?php echo $ivf_vitals_history->DoublewitnessName2->headerCellClass() ?>"><div id="elh_ivf_vitals_history_DoublewitnessName2" class="ivf_vitals_history_DoublewitnessName2"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->DoublewitnessName2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DoublewitnessName2" class="<?php echo $ivf_vitals_history->DoublewitnessName2->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_DoublewitnessName2" class="ivf_vitals_history_DoublewitnessName2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->DoublewitnessName2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->DoublewitnessName2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->DoublewitnessName2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->Chiefcomplaints) == "") { ?>
		<th data-name="Chiefcomplaints" class="<?php echo $ivf_vitals_history->Chiefcomplaints->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Chiefcomplaints" class="ivf_vitals_history_Chiefcomplaints"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->Chiefcomplaints->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Chiefcomplaints" class="<?php echo $ivf_vitals_history->Chiefcomplaints->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_Chiefcomplaints" class="ivf_vitals_history_Chiefcomplaints">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->Chiefcomplaints->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->Chiefcomplaints->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->Chiefcomplaints->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->MenstrualHistory->Visible) { // MenstrualHistory ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->MenstrualHistory) == "") { ?>
		<th data-name="MenstrualHistory" class="<?php echo $ivf_vitals_history->MenstrualHistory->headerCellClass() ?>"><div id="elh_ivf_vitals_history_MenstrualHistory" class="ivf_vitals_history_MenstrualHistory"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->MenstrualHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MenstrualHistory" class="<?php echo $ivf_vitals_history->MenstrualHistory->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_MenstrualHistory" class="ivf_vitals_history_MenstrualHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->MenstrualHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->MenstrualHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->MenstrualHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->ObstetricHistory->Visible) { // ObstetricHistory ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->ObstetricHistory) == "") { ?>
		<th data-name="ObstetricHistory" class="<?php echo $ivf_vitals_history->ObstetricHistory->headerCellClass() ?>"><div id="elh_ivf_vitals_history_ObstetricHistory" class="ivf_vitals_history_ObstetricHistory"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->ObstetricHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ObstetricHistory" class="<?php echo $ivf_vitals_history->ObstetricHistory->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_ObstetricHistory" class="ivf_vitals_history_ObstetricHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->ObstetricHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->ObstetricHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->ObstetricHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->MedicalHistory->Visible) { // MedicalHistory ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->MedicalHistory) == "") { ?>
		<th data-name="MedicalHistory" class="<?php echo $ivf_vitals_history->MedicalHistory->headerCellClass() ?>"><div id="elh_ivf_vitals_history_MedicalHistory" class="ivf_vitals_history_MedicalHistory"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->MedicalHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MedicalHistory" class="<?php echo $ivf_vitals_history->MedicalHistory->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_MedicalHistory" class="ivf_vitals_history_MedicalHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->MedicalHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->MedicalHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->MedicalHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->SurgicalHistory->Visible) { // SurgicalHistory ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->SurgicalHistory) == "") { ?>
		<th data-name="SurgicalHistory" class="<?php echo $ivf_vitals_history->SurgicalHistory->headerCellClass() ?>"><div id="elh_ivf_vitals_history_SurgicalHistory" class="ivf_vitals_history_SurgicalHistory"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->SurgicalHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SurgicalHistory" class="<?php echo $ivf_vitals_history->SurgicalHistory->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_SurgicalHistory" class="ivf_vitals_history_SurgicalHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->SurgicalHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->SurgicalHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->SurgicalHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->Generalexaminationpallor->Visible) { // Generalexaminationpallor ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->Generalexaminationpallor) == "") { ?>
		<th data-name="Generalexaminationpallor" class="<?php echo $ivf_vitals_history->Generalexaminationpallor->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Generalexaminationpallor" class="ivf_vitals_history_Generalexaminationpallor"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->Generalexaminationpallor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Generalexaminationpallor" class="<?php echo $ivf_vitals_history->Generalexaminationpallor->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_Generalexaminationpallor" class="ivf_vitals_history_Generalexaminationpallor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->Generalexaminationpallor->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->Generalexaminationpallor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->Generalexaminationpallor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->PR->Visible) { // PR ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->PR) == "") { ?>
		<th data-name="PR" class="<?php echo $ivf_vitals_history->PR->headerCellClass() ?>"><div id="elh_ivf_vitals_history_PR" class="ivf_vitals_history_PR"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->PR->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PR" class="<?php echo $ivf_vitals_history->PR->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_PR" class="ivf_vitals_history_PR">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->PR->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->PR->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->PR->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->CVS->Visible) { // CVS ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->CVS) == "") { ?>
		<th data-name="CVS" class="<?php echo $ivf_vitals_history->CVS->headerCellClass() ?>"><div id="elh_ivf_vitals_history_CVS" class="ivf_vitals_history_CVS"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->CVS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CVS" class="<?php echo $ivf_vitals_history->CVS->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_CVS" class="ivf_vitals_history_CVS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->CVS->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->CVS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->CVS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->PA->Visible) { // PA ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->PA) == "") { ?>
		<th data-name="PA" class="<?php echo $ivf_vitals_history->PA->headerCellClass() ?>"><div id="elh_ivf_vitals_history_PA" class="ivf_vitals_history_PA"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->PA->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PA" class="<?php echo $ivf_vitals_history->PA->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_PA" class="ivf_vitals_history_PA">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->PA->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->PA->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->PA->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->PROVISIONALDIAGNOSIS) == "") { ?>
		<th data-name="PROVISIONALDIAGNOSIS" class="<?php echo $ivf_vitals_history->PROVISIONALDIAGNOSIS->headerCellClass() ?>"><div id="elh_ivf_vitals_history_PROVISIONALDIAGNOSIS" class="ivf_vitals_history_PROVISIONALDIAGNOSIS"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->PROVISIONALDIAGNOSIS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PROVISIONALDIAGNOSIS" class="<?php echo $ivf_vitals_history->PROVISIONALDIAGNOSIS->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_PROVISIONALDIAGNOSIS" class="ivf_vitals_history_PROVISIONALDIAGNOSIS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->PROVISIONALDIAGNOSIS->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->PROVISIONALDIAGNOSIS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->PROVISIONALDIAGNOSIS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->Investigations->Visible) { // Investigations ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->Investigations) == "") { ?>
		<th data-name="Investigations" class="<?php echo $ivf_vitals_history->Investigations->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Investigations" class="ivf_vitals_history_Investigations"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->Investigations->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Investigations" class="<?php echo $ivf_vitals_history->Investigations->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_Investigations" class="ivf_vitals_history_Investigations">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->Investigations->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->Investigations->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->Investigations->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->Fheight->Visible) { // Fheight ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->Fheight) == "") { ?>
		<th data-name="Fheight" class="<?php echo $ivf_vitals_history->Fheight->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Fheight" class="ivf_vitals_history_Fheight"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->Fheight->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Fheight" class="<?php echo $ivf_vitals_history->Fheight->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_Fheight" class="ivf_vitals_history_Fheight">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->Fheight->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->Fheight->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->Fheight->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->Fweight->Visible) { // Fweight ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->Fweight) == "") { ?>
		<th data-name="Fweight" class="<?php echo $ivf_vitals_history->Fweight->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Fweight" class="ivf_vitals_history_Fweight"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->Fweight->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Fweight" class="<?php echo $ivf_vitals_history->Fweight->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_Fweight" class="ivf_vitals_history_Fweight">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->Fweight->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->Fweight->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->Fweight->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->FBMI->Visible) { // FBMI ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->FBMI) == "") { ?>
		<th data-name="FBMI" class="<?php echo $ivf_vitals_history->FBMI->headerCellClass() ?>"><div id="elh_ivf_vitals_history_FBMI" class="ivf_vitals_history_FBMI"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->FBMI->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FBMI" class="<?php echo $ivf_vitals_history->FBMI->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_FBMI" class="ivf_vitals_history_FBMI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->FBMI->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->FBMI->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->FBMI->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->FBloodgroup->Visible) { // FBloodgroup ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->FBloodgroup) == "") { ?>
		<th data-name="FBloodgroup" class="<?php echo $ivf_vitals_history->FBloodgroup->headerCellClass() ?>"><div id="elh_ivf_vitals_history_FBloodgroup" class="ivf_vitals_history_FBloodgroup"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->FBloodgroup->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FBloodgroup" class="<?php echo $ivf_vitals_history->FBloodgroup->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_FBloodgroup" class="ivf_vitals_history_FBloodgroup">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->FBloodgroup->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->FBloodgroup->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->FBloodgroup->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->Mheight->Visible) { // Mheight ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->Mheight) == "") { ?>
		<th data-name="Mheight" class="<?php echo $ivf_vitals_history->Mheight->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Mheight" class="ivf_vitals_history_Mheight"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->Mheight->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mheight" class="<?php echo $ivf_vitals_history->Mheight->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_Mheight" class="ivf_vitals_history_Mheight">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->Mheight->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->Mheight->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->Mheight->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->Mweight->Visible) { // Mweight ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->Mweight) == "") { ?>
		<th data-name="Mweight" class="<?php echo $ivf_vitals_history->Mweight->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Mweight" class="ivf_vitals_history_Mweight"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->Mweight->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mweight" class="<?php echo $ivf_vitals_history->Mweight->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_Mweight" class="ivf_vitals_history_Mweight">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->Mweight->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->Mweight->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->Mweight->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->MBMI->Visible) { // MBMI ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->MBMI) == "") { ?>
		<th data-name="MBMI" class="<?php echo $ivf_vitals_history->MBMI->headerCellClass() ?>"><div id="elh_ivf_vitals_history_MBMI" class="ivf_vitals_history_MBMI"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->MBMI->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MBMI" class="<?php echo $ivf_vitals_history->MBMI->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_MBMI" class="ivf_vitals_history_MBMI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->MBMI->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->MBMI->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->MBMI->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->MBloodgroup->Visible) { // MBloodgroup ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->MBloodgroup) == "") { ?>
		<th data-name="MBloodgroup" class="<?php echo $ivf_vitals_history->MBloodgroup->headerCellClass() ?>"><div id="elh_ivf_vitals_history_MBloodgroup" class="ivf_vitals_history_MBloodgroup"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->MBloodgroup->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MBloodgroup" class="<?php echo $ivf_vitals_history->MBloodgroup->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_MBloodgroup" class="ivf_vitals_history_MBloodgroup">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->MBloodgroup->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->MBloodgroup->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->MBloodgroup->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->FBuild->Visible) { // FBuild ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->FBuild) == "") { ?>
		<th data-name="FBuild" class="<?php echo $ivf_vitals_history->FBuild->headerCellClass() ?>"><div id="elh_ivf_vitals_history_FBuild" class="ivf_vitals_history_FBuild"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->FBuild->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FBuild" class="<?php echo $ivf_vitals_history->FBuild->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_FBuild" class="ivf_vitals_history_FBuild">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->FBuild->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->FBuild->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->FBuild->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->MBuild->Visible) { // MBuild ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->MBuild) == "") { ?>
		<th data-name="MBuild" class="<?php echo $ivf_vitals_history->MBuild->headerCellClass() ?>"><div id="elh_ivf_vitals_history_MBuild" class="ivf_vitals_history_MBuild"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->MBuild->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MBuild" class="<?php echo $ivf_vitals_history->MBuild->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_MBuild" class="ivf_vitals_history_MBuild">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->MBuild->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->MBuild->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->MBuild->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->FSkinColor->Visible) { // FSkinColor ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->FSkinColor) == "") { ?>
		<th data-name="FSkinColor" class="<?php echo $ivf_vitals_history->FSkinColor->headerCellClass() ?>"><div id="elh_ivf_vitals_history_FSkinColor" class="ivf_vitals_history_FSkinColor"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->FSkinColor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FSkinColor" class="<?php echo $ivf_vitals_history->FSkinColor->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_FSkinColor" class="ivf_vitals_history_FSkinColor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->FSkinColor->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->FSkinColor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->FSkinColor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->MSkinColor->Visible) { // MSkinColor ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->MSkinColor) == "") { ?>
		<th data-name="MSkinColor" class="<?php echo $ivf_vitals_history->MSkinColor->headerCellClass() ?>"><div id="elh_ivf_vitals_history_MSkinColor" class="ivf_vitals_history_MSkinColor"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->MSkinColor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MSkinColor" class="<?php echo $ivf_vitals_history->MSkinColor->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_MSkinColor" class="ivf_vitals_history_MSkinColor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->MSkinColor->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->MSkinColor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->MSkinColor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->FEyesColor->Visible) { // FEyesColor ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->FEyesColor) == "") { ?>
		<th data-name="FEyesColor" class="<?php echo $ivf_vitals_history->FEyesColor->headerCellClass() ?>"><div id="elh_ivf_vitals_history_FEyesColor" class="ivf_vitals_history_FEyesColor"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->FEyesColor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FEyesColor" class="<?php echo $ivf_vitals_history->FEyesColor->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_FEyesColor" class="ivf_vitals_history_FEyesColor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->FEyesColor->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->FEyesColor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->FEyesColor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->MEyesColor->Visible) { // MEyesColor ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->MEyesColor) == "") { ?>
		<th data-name="MEyesColor" class="<?php echo $ivf_vitals_history->MEyesColor->headerCellClass() ?>"><div id="elh_ivf_vitals_history_MEyesColor" class="ivf_vitals_history_MEyesColor"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->MEyesColor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MEyesColor" class="<?php echo $ivf_vitals_history->MEyesColor->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_MEyesColor" class="ivf_vitals_history_MEyesColor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->MEyesColor->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->MEyesColor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->MEyesColor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->FHairColor->Visible) { // FHairColor ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->FHairColor) == "") { ?>
		<th data-name="FHairColor" class="<?php echo $ivf_vitals_history->FHairColor->headerCellClass() ?>"><div id="elh_ivf_vitals_history_FHairColor" class="ivf_vitals_history_FHairColor"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->FHairColor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FHairColor" class="<?php echo $ivf_vitals_history->FHairColor->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_FHairColor" class="ivf_vitals_history_FHairColor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->FHairColor->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->FHairColor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->FHairColor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->MhairColor->Visible) { // MhairColor ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->MhairColor) == "") { ?>
		<th data-name="MhairColor" class="<?php echo $ivf_vitals_history->MhairColor->headerCellClass() ?>"><div id="elh_ivf_vitals_history_MhairColor" class="ivf_vitals_history_MhairColor"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->MhairColor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MhairColor" class="<?php echo $ivf_vitals_history->MhairColor->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_MhairColor" class="ivf_vitals_history_MhairColor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->MhairColor->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->MhairColor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->MhairColor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->FhairTexture->Visible) { // FhairTexture ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->FhairTexture) == "") { ?>
		<th data-name="FhairTexture" class="<?php echo $ivf_vitals_history->FhairTexture->headerCellClass() ?>"><div id="elh_ivf_vitals_history_FhairTexture" class="ivf_vitals_history_FhairTexture"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->FhairTexture->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FhairTexture" class="<?php echo $ivf_vitals_history->FhairTexture->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_FhairTexture" class="ivf_vitals_history_FhairTexture">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->FhairTexture->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->FhairTexture->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->FhairTexture->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->MHairTexture->Visible) { // MHairTexture ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->MHairTexture) == "") { ?>
		<th data-name="MHairTexture" class="<?php echo $ivf_vitals_history->MHairTexture->headerCellClass() ?>"><div id="elh_ivf_vitals_history_MHairTexture" class="ivf_vitals_history_MHairTexture"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->MHairTexture->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MHairTexture" class="<?php echo $ivf_vitals_history->MHairTexture->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_MHairTexture" class="ivf_vitals_history_MHairTexture">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->MHairTexture->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->MHairTexture->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->MHairTexture->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->Fothers->Visible) { // Fothers ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->Fothers) == "") { ?>
		<th data-name="Fothers" class="<?php echo $ivf_vitals_history->Fothers->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Fothers" class="ivf_vitals_history_Fothers"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->Fothers->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Fothers" class="<?php echo $ivf_vitals_history->Fothers->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_Fothers" class="ivf_vitals_history_Fothers">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->Fothers->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->Fothers->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->Fothers->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->Mothers->Visible) { // Mothers ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->Mothers) == "") { ?>
		<th data-name="Mothers" class="<?php echo $ivf_vitals_history->Mothers->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Mothers" class="ivf_vitals_history_Mothers"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->Mothers->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mothers" class="<?php echo $ivf_vitals_history->Mothers->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_Mothers" class="ivf_vitals_history_Mothers">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->Mothers->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->Mothers->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->Mothers->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->PGE->Visible) { // PGE ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->PGE) == "") { ?>
		<th data-name="PGE" class="<?php echo $ivf_vitals_history->PGE->headerCellClass() ?>"><div id="elh_ivf_vitals_history_PGE" class="ivf_vitals_history_PGE"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->PGE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PGE" class="<?php echo $ivf_vitals_history->PGE->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_PGE" class="ivf_vitals_history_PGE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->PGE->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->PGE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->PGE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->PPR->Visible) { // PPR ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->PPR) == "") { ?>
		<th data-name="PPR" class="<?php echo $ivf_vitals_history->PPR->headerCellClass() ?>"><div id="elh_ivf_vitals_history_PPR" class="ivf_vitals_history_PPR"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->PPR->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PPR" class="<?php echo $ivf_vitals_history->PPR->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_PPR" class="ivf_vitals_history_PPR">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->PPR->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->PPR->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->PPR->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->PBP->Visible) { // PBP ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->PBP) == "") { ?>
		<th data-name="PBP" class="<?php echo $ivf_vitals_history->PBP->headerCellClass() ?>"><div id="elh_ivf_vitals_history_PBP" class="ivf_vitals_history_PBP"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->PBP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PBP" class="<?php echo $ivf_vitals_history->PBP->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_PBP" class="ivf_vitals_history_PBP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->PBP->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->PBP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->PBP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->Breast->Visible) { // Breast ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->Breast) == "") { ?>
		<th data-name="Breast" class="<?php echo $ivf_vitals_history->Breast->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Breast" class="ivf_vitals_history_Breast"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->Breast->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Breast" class="<?php echo $ivf_vitals_history->Breast->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_Breast" class="ivf_vitals_history_Breast">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->Breast->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->Breast->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->Breast->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->PPA->Visible) { // PPA ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->PPA) == "") { ?>
		<th data-name="PPA" class="<?php echo $ivf_vitals_history->PPA->headerCellClass() ?>"><div id="elh_ivf_vitals_history_PPA" class="ivf_vitals_history_PPA"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->PPA->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PPA" class="<?php echo $ivf_vitals_history->PPA->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_PPA" class="ivf_vitals_history_PPA">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->PPA->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->PPA->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->PPA->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->PPSV->Visible) { // PPSV ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->PPSV) == "") { ?>
		<th data-name="PPSV" class="<?php echo $ivf_vitals_history->PPSV->headerCellClass() ?>"><div id="elh_ivf_vitals_history_PPSV" class="ivf_vitals_history_PPSV"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->PPSV->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PPSV" class="<?php echo $ivf_vitals_history->PPSV->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_PPSV" class="ivf_vitals_history_PPSV">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->PPSV->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->PPSV->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->PPSV->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->PPAPSMEAR->Visible) { // PPAPSMEAR ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->PPAPSMEAR) == "") { ?>
		<th data-name="PPAPSMEAR" class="<?php echo $ivf_vitals_history->PPAPSMEAR->headerCellClass() ?>"><div id="elh_ivf_vitals_history_PPAPSMEAR" class="ivf_vitals_history_PPAPSMEAR"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->PPAPSMEAR->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PPAPSMEAR" class="<?php echo $ivf_vitals_history->PPAPSMEAR->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_PPAPSMEAR" class="ivf_vitals_history_PPAPSMEAR">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->PPAPSMEAR->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->PPAPSMEAR->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->PPAPSMEAR->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->PTHYROID->Visible) { // PTHYROID ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->PTHYROID) == "") { ?>
		<th data-name="PTHYROID" class="<?php echo $ivf_vitals_history->PTHYROID->headerCellClass() ?>"><div id="elh_ivf_vitals_history_PTHYROID" class="ivf_vitals_history_PTHYROID"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->PTHYROID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PTHYROID" class="<?php echo $ivf_vitals_history->PTHYROID->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_PTHYROID" class="ivf_vitals_history_PTHYROID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->PTHYROID->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->PTHYROID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->PTHYROID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->MTHYROID->Visible) { // MTHYROID ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->MTHYROID) == "") { ?>
		<th data-name="MTHYROID" class="<?php echo $ivf_vitals_history->MTHYROID->headerCellClass() ?>"><div id="elh_ivf_vitals_history_MTHYROID" class="ivf_vitals_history_MTHYROID"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->MTHYROID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MTHYROID" class="<?php echo $ivf_vitals_history->MTHYROID->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_MTHYROID" class="ivf_vitals_history_MTHYROID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->MTHYROID->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->MTHYROID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->MTHYROID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->SecSexCharacters->Visible) { // SecSexCharacters ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->SecSexCharacters) == "") { ?>
		<th data-name="SecSexCharacters" class="<?php echo $ivf_vitals_history->SecSexCharacters->headerCellClass() ?>"><div id="elh_ivf_vitals_history_SecSexCharacters" class="ivf_vitals_history_SecSexCharacters"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->SecSexCharacters->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SecSexCharacters" class="<?php echo $ivf_vitals_history->SecSexCharacters->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_SecSexCharacters" class="ivf_vitals_history_SecSexCharacters">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->SecSexCharacters->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->SecSexCharacters->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->SecSexCharacters->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->PenisUM->Visible) { // PenisUM ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->PenisUM) == "") { ?>
		<th data-name="PenisUM" class="<?php echo $ivf_vitals_history->PenisUM->headerCellClass() ?>"><div id="elh_ivf_vitals_history_PenisUM" class="ivf_vitals_history_PenisUM"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->PenisUM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PenisUM" class="<?php echo $ivf_vitals_history->PenisUM->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_PenisUM" class="ivf_vitals_history_PenisUM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->PenisUM->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->PenisUM->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->PenisUM->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->VAS->Visible) { // VAS ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->VAS) == "") { ?>
		<th data-name="VAS" class="<?php echo $ivf_vitals_history->VAS->headerCellClass() ?>"><div id="elh_ivf_vitals_history_VAS" class="ivf_vitals_history_VAS"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->VAS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VAS" class="<?php echo $ivf_vitals_history->VAS->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_VAS" class="ivf_vitals_history_VAS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->VAS->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->VAS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->VAS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->EPIDIDYMIS->Visible) { // EPIDIDYMIS ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->EPIDIDYMIS) == "") { ?>
		<th data-name="EPIDIDYMIS" class="<?php echo $ivf_vitals_history->EPIDIDYMIS->headerCellClass() ?>"><div id="elh_ivf_vitals_history_EPIDIDYMIS" class="ivf_vitals_history_EPIDIDYMIS"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->EPIDIDYMIS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EPIDIDYMIS" class="<?php echo $ivf_vitals_history->EPIDIDYMIS->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_EPIDIDYMIS" class="ivf_vitals_history_EPIDIDYMIS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->EPIDIDYMIS->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->EPIDIDYMIS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->EPIDIDYMIS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->Varicocele->Visible) { // Varicocele ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->Varicocele) == "") { ?>
		<th data-name="Varicocele" class="<?php echo $ivf_vitals_history->Varicocele->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Varicocele" class="ivf_vitals_history_Varicocele"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->Varicocele->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Varicocele" class="<?php echo $ivf_vitals_history->Varicocele->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_Varicocele" class="ivf_vitals_history_Varicocele">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->Varicocele->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->Varicocele->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->Varicocele->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->FamilyHistory->Visible) { // FamilyHistory ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->FamilyHistory) == "") { ?>
		<th data-name="FamilyHistory" class="<?php echo $ivf_vitals_history->FamilyHistory->headerCellClass() ?>"><div id="elh_ivf_vitals_history_FamilyHistory" class="ivf_vitals_history_FamilyHistory"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->FamilyHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FamilyHistory" class="<?php echo $ivf_vitals_history->FamilyHistory->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_FamilyHistory" class="ivf_vitals_history_FamilyHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->FamilyHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->FamilyHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->FamilyHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->Addictions->Visible) { // Addictions ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->Addictions) == "") { ?>
		<th data-name="Addictions" class="<?php echo $ivf_vitals_history->Addictions->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Addictions" class="ivf_vitals_history_Addictions"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->Addictions->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Addictions" class="<?php echo $ivf_vitals_history->Addictions->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_Addictions" class="ivf_vitals_history_Addictions">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->Addictions->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->Addictions->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->Addictions->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->Medical->Visible) { // Medical ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->Medical) == "") { ?>
		<th data-name="Medical" class="<?php echo $ivf_vitals_history->Medical->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Medical" class="ivf_vitals_history_Medical"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->Medical->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Medical" class="<?php echo $ivf_vitals_history->Medical->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_Medical" class="ivf_vitals_history_Medical">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->Medical->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->Medical->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->Medical->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->Surgical->Visible) { // Surgical ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->Surgical) == "") { ?>
		<th data-name="Surgical" class="<?php echo $ivf_vitals_history->Surgical->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Surgical" class="ivf_vitals_history_Surgical"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->Surgical->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Surgical" class="<?php echo $ivf_vitals_history->Surgical->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_Surgical" class="ivf_vitals_history_Surgical">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->Surgical->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->Surgical->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->Surgical->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->CoitalHistory->Visible) { // CoitalHistory ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->CoitalHistory) == "") { ?>
		<th data-name="CoitalHistory" class="<?php echo $ivf_vitals_history->CoitalHistory->headerCellClass() ?>"><div id="elh_ivf_vitals_history_CoitalHistory" class="ivf_vitals_history_CoitalHistory"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->CoitalHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CoitalHistory" class="<?php echo $ivf_vitals_history->CoitalHistory->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_CoitalHistory" class="ivf_vitals_history_CoitalHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->CoitalHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->CoitalHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->CoitalHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->MariedFor->Visible) { // MariedFor ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->MariedFor) == "") { ?>
		<th data-name="MariedFor" class="<?php echo $ivf_vitals_history->MariedFor->headerCellClass() ?>"><div id="elh_ivf_vitals_history_MariedFor" class="ivf_vitals_history_MariedFor"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->MariedFor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MariedFor" class="<?php echo $ivf_vitals_history->MariedFor->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_MariedFor" class="ivf_vitals_history_MariedFor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->MariedFor->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->MariedFor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->MariedFor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->CMNCM->Visible) { // CMNCM ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->CMNCM) == "") { ?>
		<th data-name="CMNCM" class="<?php echo $ivf_vitals_history->CMNCM->headerCellClass() ?>"><div id="elh_ivf_vitals_history_CMNCM" class="ivf_vitals_history_CMNCM"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->CMNCM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CMNCM" class="<?php echo $ivf_vitals_history->CMNCM->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_CMNCM" class="ivf_vitals_history_CMNCM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->CMNCM->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->CMNCM->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->CMNCM->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->TidNo->Visible) { // TidNo ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $ivf_vitals_history->TidNo->headerCellClass() ?>"><div id="elh_ivf_vitals_history_TidNo" class="ivf_vitals_history_TidNo"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $ivf_vitals_history->TidNo->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_TidNo" class="ivf_vitals_history_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->TidNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->TidNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->pFamilyHistory->Visible) { // pFamilyHistory ?>
	<?php if ($ivf_vitals_history->sortUrl($ivf_vitals_history->pFamilyHistory) == "") { ?>
		<th data-name="pFamilyHistory" class="<?php echo $ivf_vitals_history->pFamilyHistory->headerCellClass() ?>"><div id="elh_ivf_vitals_history_pFamilyHistory" class="ivf_vitals_history_pFamilyHistory"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history->pFamilyHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pFamilyHistory" class="<?php echo $ivf_vitals_history->pFamilyHistory->headerCellClass() ?>"><div><div id="elh_ivf_vitals_history_pFamilyHistory" class="ivf_vitals_history_pFamilyHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history->pFamilyHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history->pFamilyHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitals_history->pFamilyHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_vitals_history_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$ivf_vitals_history_grid->StartRec = 1;
$ivf_vitals_history_grid->StopRec = $ivf_vitals_history_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $ivf_vitals_history_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($ivf_vitals_history_grid->FormKeyCountName) && ($ivf_vitals_history->isGridAdd() || $ivf_vitals_history->isGridEdit() || $ivf_vitals_history->isConfirm())) {
		$ivf_vitals_history_grid->KeyCount = $CurrentForm->getValue($ivf_vitals_history_grid->FormKeyCountName);
		$ivf_vitals_history_grid->StopRec = $ivf_vitals_history_grid->StartRec + $ivf_vitals_history_grid->KeyCount - 1;
	}
}
$ivf_vitals_history_grid->RecCnt = $ivf_vitals_history_grid->StartRec - 1;
if ($ivf_vitals_history_grid->Recordset && !$ivf_vitals_history_grid->Recordset->EOF) {
	$ivf_vitals_history_grid->Recordset->moveFirst();
	$selectLimit = $ivf_vitals_history_grid->UseSelectLimit;
	if (!$selectLimit && $ivf_vitals_history_grid->StartRec > 1)
		$ivf_vitals_history_grid->Recordset->move($ivf_vitals_history_grid->StartRec - 1);
} elseif (!$ivf_vitals_history->AllowAddDeleteRow && $ivf_vitals_history_grid->StopRec == 0) {
	$ivf_vitals_history_grid->StopRec = $ivf_vitals_history->GridAddRowCount;
}

// Initialize aggregate
$ivf_vitals_history->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_vitals_history->resetAttributes();
$ivf_vitals_history_grid->renderRow();
if ($ivf_vitals_history->isGridAdd())
	$ivf_vitals_history_grid->RowIndex = 0;
if ($ivf_vitals_history->isGridEdit())
	$ivf_vitals_history_grid->RowIndex = 0;
while ($ivf_vitals_history_grid->RecCnt < $ivf_vitals_history_grid->StopRec) {
	$ivf_vitals_history_grid->RecCnt++;
	if ($ivf_vitals_history_grid->RecCnt >= $ivf_vitals_history_grid->StartRec) {
		$ivf_vitals_history_grid->RowCnt++;
		if ($ivf_vitals_history->isGridAdd() || $ivf_vitals_history->isGridEdit() || $ivf_vitals_history->isConfirm()) {
			$ivf_vitals_history_grid->RowIndex++;
			$CurrentForm->Index = $ivf_vitals_history_grid->RowIndex;
			if ($CurrentForm->hasValue($ivf_vitals_history_grid->FormActionName) && $ivf_vitals_history_grid->EventCancelled)
				$ivf_vitals_history_grid->RowAction = strval($CurrentForm->getValue($ivf_vitals_history_grid->FormActionName));
			elseif ($ivf_vitals_history->isGridAdd())
				$ivf_vitals_history_grid->RowAction = "insert";
			else
				$ivf_vitals_history_grid->RowAction = "";
		}

		// Set up key count
		$ivf_vitals_history_grid->KeyCount = $ivf_vitals_history_grid->RowIndex;

		// Init row class and style
		$ivf_vitals_history->resetAttributes();
		$ivf_vitals_history->CssClass = "";
		if ($ivf_vitals_history->isGridAdd()) {
			if ($ivf_vitals_history->CurrentMode == "copy") {
				$ivf_vitals_history_grid->loadRowValues($ivf_vitals_history_grid->Recordset); // Load row values
				$ivf_vitals_history_grid->setRecordKey($ivf_vitals_history_grid->RowOldKey, $ivf_vitals_history_grid->Recordset); // Set old record key
			} else {
				$ivf_vitals_history_grid->loadRowValues(); // Load default values
				$ivf_vitals_history_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$ivf_vitals_history_grid->loadRowValues($ivf_vitals_history_grid->Recordset); // Load row values
		}
		$ivf_vitals_history->RowType = ROWTYPE_VIEW; // Render view
		if ($ivf_vitals_history->isGridAdd()) // Grid add
			$ivf_vitals_history->RowType = ROWTYPE_ADD; // Render add
		if ($ivf_vitals_history->isGridAdd() && $ivf_vitals_history->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$ivf_vitals_history_grid->restoreCurrentRowFormValues($ivf_vitals_history_grid->RowIndex); // Restore form values
		if ($ivf_vitals_history->isGridEdit()) { // Grid edit
			if ($ivf_vitals_history->EventCancelled)
				$ivf_vitals_history_grid->restoreCurrentRowFormValues($ivf_vitals_history_grid->RowIndex); // Restore form values
			if ($ivf_vitals_history_grid->RowAction == "insert")
				$ivf_vitals_history->RowType = ROWTYPE_ADD; // Render add
			else
				$ivf_vitals_history->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($ivf_vitals_history->isGridEdit() && ($ivf_vitals_history->RowType == ROWTYPE_EDIT || $ivf_vitals_history->RowType == ROWTYPE_ADD) && $ivf_vitals_history->EventCancelled) // Update failed
			$ivf_vitals_history_grid->restoreCurrentRowFormValues($ivf_vitals_history_grid->RowIndex); // Restore form values
		if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) // Edit row
			$ivf_vitals_history_grid->EditRowCnt++;
		if ($ivf_vitals_history->isConfirm()) // Confirm row
			$ivf_vitals_history_grid->restoreCurrentRowFormValues($ivf_vitals_history_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$ivf_vitals_history->RowAttrs = array_merge($ivf_vitals_history->RowAttrs, array('data-rowindex'=>$ivf_vitals_history_grid->RowCnt, 'id'=>'r' . $ivf_vitals_history_grid->RowCnt . '_ivf_vitals_history', 'data-rowtype'=>$ivf_vitals_history->RowType));

		// Render row
		$ivf_vitals_history_grid->renderRow();

		// Render list options
		$ivf_vitals_history_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($ivf_vitals_history_grid->RowAction <> "delete" && $ivf_vitals_history_grid->RowAction <> "insertdelete" && !($ivf_vitals_history_grid->RowAction == "insert" && $ivf_vitals_history->isConfirm() && $ivf_vitals_history_grid->emptyRow())) {
?>
	<tr<?php echo $ivf_vitals_history->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_vitals_history_grid->ListOptions->render("body", "left", $ivf_vitals_history_grid->RowCnt);
?>
	<?php if ($ivf_vitals_history->id->Visible) { // id ?>
		<td data-name="id"<?php echo $ivf_vitals_history->id->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_id" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_id" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_vitals_history->id->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_id" class="form-group ivf_vitals_history_id">
<span<?php echo $ivf_vitals_history->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_id" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_id" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_vitals_history->id->CurrentValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_id" class="ivf_vitals_history_id">
<span<?php echo $ivf_vitals_history->id->viewAttributes() ?>>
<?php echo $ivf_vitals_history->id->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_id" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_id" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_vitals_history->id->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_id" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_id" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_vitals_history->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_id" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_id" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_vitals_history->id->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_id" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_id" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_vitals_history->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO"<?php echo $ivf_vitals_history->RIDNO->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($ivf_vitals_history->RIDNO->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_RIDNO" class="form-group ivf_vitals_history_RIDNO">
<span<?php echo $ivf_vitals_history->RIDNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->RIDNO->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_RIDNO" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_vitals_history->RIDNO->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_RIDNO" class="form-group ivf_vitals_history_RIDNO">
<input type="text" data-table="ivf_vitals_history" data-field="x_RIDNO" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_RIDNO" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_RIDNO" size="30" placeholder="<?php echo HtmlEncode($ivf_vitals_history->RIDNO->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->RIDNO->EditValue ?>"<?php echo $ivf_vitals_history->RIDNO->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_RIDNO" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_RIDNO" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_vitals_history->RIDNO->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($ivf_vitals_history->RIDNO->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_RIDNO" class="form-group ivf_vitals_history_RIDNO">
<span<?php echo $ivf_vitals_history->RIDNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->RIDNO->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_RIDNO" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_vitals_history->RIDNO->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_RIDNO" class="form-group ivf_vitals_history_RIDNO">
<input type="text" data-table="ivf_vitals_history" data-field="x_RIDNO" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_RIDNO" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_RIDNO" size="30" placeholder="<?php echo HtmlEncode($ivf_vitals_history->RIDNO->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->RIDNO->EditValue ?>"<?php echo $ivf_vitals_history->RIDNO->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_RIDNO" class="ivf_vitals_history_RIDNO">
<span<?php echo $ivf_vitals_history->RIDNO->viewAttributes() ?>>
<?php echo $ivf_vitals_history->RIDNO->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_RIDNO" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_RIDNO" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_vitals_history->RIDNO->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_RIDNO" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_RIDNO" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_vitals_history->RIDNO->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_RIDNO" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_RIDNO" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_vitals_history->RIDNO->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_RIDNO" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_RIDNO" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_vitals_history->RIDNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->Name->Visible) { // Name ?>
		<td data-name="Name"<?php echo $ivf_vitals_history->Name->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($ivf_vitals_history->Name->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Name" class="form-group ivf_vitals_history_Name">
<span<?php echo $ivf_vitals_history->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->Name->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Name" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_vitals_history->Name->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Name" class="form-group ivf_vitals_history_Name">
<input type="text" data-table="ivf_vitals_history" data-field="x_Name" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Name" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Name->EditValue ?>"<?php echo $ivf_vitals_history->Name->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Name" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Name" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_vitals_history->Name->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($ivf_vitals_history->Name->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Name" class="form-group ivf_vitals_history_Name">
<span<?php echo $ivf_vitals_history->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->Name->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Name" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_vitals_history->Name->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Name" class="form-group ivf_vitals_history_Name">
<input type="text" data-table="ivf_vitals_history" data-field="x_Name" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Name" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Name->EditValue ?>"<?php echo $ivf_vitals_history->Name->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Name" class="ivf_vitals_history_Name">
<span<?php echo $ivf_vitals_history->Name->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Name->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Name" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Name" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_vitals_history->Name->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Name" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Name" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_vitals_history->Name->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Name" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Name" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_vitals_history->Name->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Name" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Name" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_vitals_history->Name->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->Age->Visible) { // Age ?>
		<td data-name="Age"<?php echo $ivf_vitals_history->Age->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Age" class="form-group ivf_vitals_history_Age">
<input type="text" data-table="ivf_vitals_history" data-field="x_Age" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Age" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Age->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Age->EditValue ?>"<?php echo $ivf_vitals_history->Age->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Age" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Age" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($ivf_vitals_history->Age->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Age" class="form-group ivf_vitals_history_Age">
<input type="text" data-table="ivf_vitals_history" data-field="x_Age" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Age" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Age->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Age->EditValue ?>"<?php echo $ivf_vitals_history->Age->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Age" class="ivf_vitals_history_Age">
<span<?php echo $ivf_vitals_history->Age->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Age->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Age" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Age" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($ivf_vitals_history->Age->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Age" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Age" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($ivf_vitals_history->Age->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Age" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Age" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($ivf_vitals_history->Age->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Age" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Age" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($ivf_vitals_history->Age->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->SEX->Visible) { // SEX ?>
		<td data-name="SEX"<?php echo $ivf_vitals_history->SEX->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_SEX" class="form-group ivf_vitals_history_SEX">
<input type="text" data-table="ivf_vitals_history" data-field="x_SEX" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_SEX" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_SEX" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->SEX->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->SEX->EditValue ?>"<?php echo $ivf_vitals_history->SEX->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_SEX" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_SEX" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_SEX" value="<?php echo HtmlEncode($ivf_vitals_history->SEX->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_SEX" class="form-group ivf_vitals_history_SEX">
<input type="text" data-table="ivf_vitals_history" data-field="x_SEX" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_SEX" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_SEX" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->SEX->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->SEX->EditValue ?>"<?php echo $ivf_vitals_history->SEX->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_SEX" class="ivf_vitals_history_SEX">
<span<?php echo $ivf_vitals_history->SEX->viewAttributes() ?>>
<?php echo $ivf_vitals_history->SEX->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_SEX" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_SEX" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_SEX" value="<?php echo HtmlEncode($ivf_vitals_history->SEX->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_SEX" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_SEX" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_SEX" value="<?php echo HtmlEncode($ivf_vitals_history->SEX->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_SEX" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_SEX" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_SEX" value="<?php echo HtmlEncode($ivf_vitals_history->SEX->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_SEX" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_SEX" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_SEX" value="<?php echo HtmlEncode($ivf_vitals_history->SEX->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->Religion->Visible) { // Religion ?>
		<td data-name="Religion"<?php echo $ivf_vitals_history->Religion->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Religion" class="form-group ivf_vitals_history_Religion">
<input type="text" data-table="ivf_vitals_history" data-field="x_Religion" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Religion" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Religion" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Religion->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Religion->EditValue ?>"<?php echo $ivf_vitals_history->Religion->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Religion" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Religion" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Religion" value="<?php echo HtmlEncode($ivf_vitals_history->Religion->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Religion" class="form-group ivf_vitals_history_Religion">
<input type="text" data-table="ivf_vitals_history" data-field="x_Religion" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Religion" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Religion" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Religion->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Religion->EditValue ?>"<?php echo $ivf_vitals_history->Religion->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Religion" class="ivf_vitals_history_Religion">
<span<?php echo $ivf_vitals_history->Religion->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Religion->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Religion" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Religion" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Religion" value="<?php echo HtmlEncode($ivf_vitals_history->Religion->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Religion" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Religion" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Religion" value="<?php echo HtmlEncode($ivf_vitals_history->Religion->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Religion" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Religion" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Religion" value="<?php echo HtmlEncode($ivf_vitals_history->Religion->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Religion" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Religion" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Religion" value="<?php echo HtmlEncode($ivf_vitals_history->Religion->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->Address->Visible) { // Address ?>
		<td data-name="Address"<?php echo $ivf_vitals_history->Address->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Address" class="form-group ivf_vitals_history_Address">
<input type="text" data-table="ivf_vitals_history" data-field="x_Address" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Address" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Address" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Address->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Address->EditValue ?>"<?php echo $ivf_vitals_history->Address->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Address" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Address" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Address" value="<?php echo HtmlEncode($ivf_vitals_history->Address->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Address" class="form-group ivf_vitals_history_Address">
<input type="text" data-table="ivf_vitals_history" data-field="x_Address" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Address" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Address" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Address->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Address->EditValue ?>"<?php echo $ivf_vitals_history->Address->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Address" class="ivf_vitals_history_Address">
<span<?php echo $ivf_vitals_history->Address->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Address->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Address" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Address" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Address" value="<?php echo HtmlEncode($ivf_vitals_history->Address->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Address" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Address" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Address" value="<?php echo HtmlEncode($ivf_vitals_history->Address->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Address" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Address" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Address" value="<?php echo HtmlEncode($ivf_vitals_history->Address->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Address" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Address" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Address" value="<?php echo HtmlEncode($ivf_vitals_history->Address->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->IdentificationMark->Visible) { // IdentificationMark ?>
		<td data-name="IdentificationMark"<?php echo $ivf_vitals_history->IdentificationMark->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_IdentificationMark" class="form-group ivf_vitals_history_IdentificationMark">
<input type="text" data-table="ivf_vitals_history" data-field="x_IdentificationMark" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_IdentificationMark" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_IdentificationMark" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->IdentificationMark->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->IdentificationMark->EditValue ?>"<?php echo $ivf_vitals_history->IdentificationMark->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_IdentificationMark" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_IdentificationMark" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_IdentificationMark" value="<?php echo HtmlEncode($ivf_vitals_history->IdentificationMark->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_IdentificationMark" class="form-group ivf_vitals_history_IdentificationMark">
<input type="text" data-table="ivf_vitals_history" data-field="x_IdentificationMark" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_IdentificationMark" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_IdentificationMark" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->IdentificationMark->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->IdentificationMark->EditValue ?>"<?php echo $ivf_vitals_history->IdentificationMark->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_IdentificationMark" class="ivf_vitals_history_IdentificationMark">
<span<?php echo $ivf_vitals_history->IdentificationMark->viewAttributes() ?>>
<?php echo $ivf_vitals_history->IdentificationMark->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_IdentificationMark" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_IdentificationMark" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_IdentificationMark" value="<?php echo HtmlEncode($ivf_vitals_history->IdentificationMark->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_IdentificationMark" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_IdentificationMark" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_IdentificationMark" value="<?php echo HtmlEncode($ivf_vitals_history->IdentificationMark->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_IdentificationMark" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_IdentificationMark" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_IdentificationMark" value="<?php echo HtmlEncode($ivf_vitals_history->IdentificationMark->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_IdentificationMark" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_IdentificationMark" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_IdentificationMark" value="<?php echo HtmlEncode($ivf_vitals_history->IdentificationMark->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->DoublewitnessName1->Visible) { // DoublewitnessName1 ?>
		<td data-name="DoublewitnessName1"<?php echo $ivf_vitals_history->DoublewitnessName1->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_DoublewitnessName1" class="form-group ivf_vitals_history_DoublewitnessName1">
<textarea data-table="ivf_vitals_history" data-field="x_DoublewitnessName1" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_DoublewitnessName1" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_DoublewitnessName1" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history->DoublewitnessName1->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history->DoublewitnessName1->editAttributes() ?>><?php echo $ivf_vitals_history->DoublewitnessName1->EditValue ?></textarea>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_DoublewitnessName1" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_DoublewitnessName1" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_DoublewitnessName1" value="<?php echo HtmlEncode($ivf_vitals_history->DoublewitnessName1->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_DoublewitnessName1" class="form-group ivf_vitals_history_DoublewitnessName1">
<textarea data-table="ivf_vitals_history" data-field="x_DoublewitnessName1" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_DoublewitnessName1" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_DoublewitnessName1" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history->DoublewitnessName1->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history->DoublewitnessName1->editAttributes() ?>><?php echo $ivf_vitals_history->DoublewitnessName1->EditValue ?></textarea>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_DoublewitnessName1" class="ivf_vitals_history_DoublewitnessName1">
<span<?php echo $ivf_vitals_history->DoublewitnessName1->viewAttributes() ?>>
<?php echo $ivf_vitals_history->DoublewitnessName1->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_DoublewitnessName1" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_DoublewitnessName1" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_DoublewitnessName1" value="<?php echo HtmlEncode($ivf_vitals_history->DoublewitnessName1->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_DoublewitnessName1" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_DoublewitnessName1" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_DoublewitnessName1" value="<?php echo HtmlEncode($ivf_vitals_history->DoublewitnessName1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_DoublewitnessName1" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_DoublewitnessName1" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_DoublewitnessName1" value="<?php echo HtmlEncode($ivf_vitals_history->DoublewitnessName1->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_DoublewitnessName1" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_DoublewitnessName1" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_DoublewitnessName1" value="<?php echo HtmlEncode($ivf_vitals_history->DoublewitnessName1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->DoublewitnessName2->Visible) { // DoublewitnessName2 ?>
		<td data-name="DoublewitnessName2"<?php echo $ivf_vitals_history->DoublewitnessName2->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_DoublewitnessName2" class="form-group ivf_vitals_history_DoublewitnessName2">
<textarea data-table="ivf_vitals_history" data-field="x_DoublewitnessName2" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_DoublewitnessName2" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_DoublewitnessName2" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history->DoublewitnessName2->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history->DoublewitnessName2->editAttributes() ?>><?php echo $ivf_vitals_history->DoublewitnessName2->EditValue ?></textarea>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_DoublewitnessName2" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_DoublewitnessName2" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_DoublewitnessName2" value="<?php echo HtmlEncode($ivf_vitals_history->DoublewitnessName2->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_DoublewitnessName2" class="form-group ivf_vitals_history_DoublewitnessName2">
<textarea data-table="ivf_vitals_history" data-field="x_DoublewitnessName2" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_DoublewitnessName2" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_DoublewitnessName2" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history->DoublewitnessName2->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history->DoublewitnessName2->editAttributes() ?>><?php echo $ivf_vitals_history->DoublewitnessName2->EditValue ?></textarea>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_DoublewitnessName2" class="ivf_vitals_history_DoublewitnessName2">
<span<?php echo $ivf_vitals_history->DoublewitnessName2->viewAttributes() ?>>
<?php echo $ivf_vitals_history->DoublewitnessName2->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_DoublewitnessName2" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_DoublewitnessName2" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_DoublewitnessName2" value="<?php echo HtmlEncode($ivf_vitals_history->DoublewitnessName2->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_DoublewitnessName2" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_DoublewitnessName2" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_DoublewitnessName2" value="<?php echo HtmlEncode($ivf_vitals_history->DoublewitnessName2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_DoublewitnessName2" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_DoublewitnessName2" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_DoublewitnessName2" value="<?php echo HtmlEncode($ivf_vitals_history->DoublewitnessName2->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_DoublewitnessName2" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_DoublewitnessName2" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_DoublewitnessName2" value="<?php echo HtmlEncode($ivf_vitals_history->DoublewitnessName2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
		<td data-name="Chiefcomplaints"<?php echo $ivf_vitals_history->Chiefcomplaints->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Chiefcomplaints" class="form-group ivf_vitals_history_Chiefcomplaints">
<textarea data-table="ivf_vitals_history" data-field="x_Chiefcomplaints" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Chiefcomplaints" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Chiefcomplaints" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Chiefcomplaints->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history->Chiefcomplaints->editAttributes() ?>><?php echo $ivf_vitals_history->Chiefcomplaints->EditValue ?></textarea>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Chiefcomplaints" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Chiefcomplaints" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Chiefcomplaints" value="<?php echo HtmlEncode($ivf_vitals_history->Chiefcomplaints->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Chiefcomplaints" class="form-group ivf_vitals_history_Chiefcomplaints">
<textarea data-table="ivf_vitals_history" data-field="x_Chiefcomplaints" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Chiefcomplaints" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Chiefcomplaints" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Chiefcomplaints->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history->Chiefcomplaints->editAttributes() ?>><?php echo $ivf_vitals_history->Chiefcomplaints->EditValue ?></textarea>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Chiefcomplaints" class="ivf_vitals_history_Chiefcomplaints">
<span<?php echo $ivf_vitals_history->Chiefcomplaints->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Chiefcomplaints->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Chiefcomplaints" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Chiefcomplaints" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Chiefcomplaints" value="<?php echo HtmlEncode($ivf_vitals_history->Chiefcomplaints->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Chiefcomplaints" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Chiefcomplaints" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Chiefcomplaints" value="<?php echo HtmlEncode($ivf_vitals_history->Chiefcomplaints->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Chiefcomplaints" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Chiefcomplaints" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Chiefcomplaints" value="<?php echo HtmlEncode($ivf_vitals_history->Chiefcomplaints->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Chiefcomplaints" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Chiefcomplaints" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Chiefcomplaints" value="<?php echo HtmlEncode($ivf_vitals_history->Chiefcomplaints->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->MenstrualHistory->Visible) { // MenstrualHistory ?>
		<td data-name="MenstrualHistory"<?php echo $ivf_vitals_history->MenstrualHistory->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_MenstrualHistory" class="form-group ivf_vitals_history_MenstrualHistory">
<?php AppendClass($ivf_vitals_history->MenstrualHistory->EditAttrs["class"], "editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_MenstrualHistory" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MenstrualHistory" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MenstrualHistory" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history->MenstrualHistory->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history->MenstrualHistory->editAttributes() ?>><?php echo $ivf_vitals_history->MenstrualHistory->EditValue ?></textarea>
<script>
ew.createEditor("fivf_vitals_historygrid", "x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MenstrualHistory", 0, 0, <?php echo ($ivf_vitals_history->MenstrualHistory->ReadOnly || FALSE) ? "true" : "false" ?>);
</script>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MenstrualHistory" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MenstrualHistory" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MenstrualHistory" value="<?php echo HtmlEncode($ivf_vitals_history->MenstrualHistory->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_MenstrualHistory" class="form-group ivf_vitals_history_MenstrualHistory">
<?php AppendClass($ivf_vitals_history->MenstrualHistory->EditAttrs["class"], "editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_MenstrualHistory" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MenstrualHistory" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MenstrualHistory" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history->MenstrualHistory->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history->MenstrualHistory->editAttributes() ?>><?php echo $ivf_vitals_history->MenstrualHistory->EditValue ?></textarea>
<script>
ew.createEditor("fivf_vitals_historygrid", "x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MenstrualHistory", 0, 0, <?php echo ($ivf_vitals_history->MenstrualHistory->ReadOnly || FALSE) ? "true" : "false" ?>);
</script>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_MenstrualHistory" class="ivf_vitals_history_MenstrualHistory">
<span<?php echo $ivf_vitals_history->MenstrualHistory->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MenstrualHistory->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MenstrualHistory" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MenstrualHistory" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MenstrualHistory" value="<?php echo HtmlEncode($ivf_vitals_history->MenstrualHistory->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MenstrualHistory" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MenstrualHistory" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MenstrualHistory" value="<?php echo HtmlEncode($ivf_vitals_history->MenstrualHistory->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MenstrualHistory" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MenstrualHistory" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MenstrualHistory" value="<?php echo HtmlEncode($ivf_vitals_history->MenstrualHistory->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MenstrualHistory" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MenstrualHistory" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MenstrualHistory" value="<?php echo HtmlEncode($ivf_vitals_history->MenstrualHistory->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->ObstetricHistory->Visible) { // ObstetricHistory ?>
		<td data-name="ObstetricHistory"<?php echo $ivf_vitals_history->ObstetricHistory->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_ObstetricHistory" class="form-group ivf_vitals_history_ObstetricHistory">
<?php AppendClass($ivf_vitals_history->ObstetricHistory->EditAttrs["class"], "editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_ObstetricHistory" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_ObstetricHistory" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_ObstetricHistory" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history->ObstetricHistory->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history->ObstetricHistory->editAttributes() ?>><?php echo $ivf_vitals_history->ObstetricHistory->EditValue ?></textarea>
<script>
ew.createEditor("fivf_vitals_historygrid", "x<?php echo $ivf_vitals_history_grid->RowIndex ?>_ObstetricHistory", 0, 0, <?php echo ($ivf_vitals_history->ObstetricHistory->ReadOnly || FALSE) ? "true" : "false" ?>);
</script>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_ObstetricHistory" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_ObstetricHistory" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_ObstetricHistory" value="<?php echo HtmlEncode($ivf_vitals_history->ObstetricHistory->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_ObstetricHistory" class="form-group ivf_vitals_history_ObstetricHistory">
<?php AppendClass($ivf_vitals_history->ObstetricHistory->EditAttrs["class"], "editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_ObstetricHistory" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_ObstetricHistory" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_ObstetricHistory" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history->ObstetricHistory->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history->ObstetricHistory->editAttributes() ?>><?php echo $ivf_vitals_history->ObstetricHistory->EditValue ?></textarea>
<script>
ew.createEditor("fivf_vitals_historygrid", "x<?php echo $ivf_vitals_history_grid->RowIndex ?>_ObstetricHistory", 0, 0, <?php echo ($ivf_vitals_history->ObstetricHistory->ReadOnly || FALSE) ? "true" : "false" ?>);
</script>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_ObstetricHistory" class="ivf_vitals_history_ObstetricHistory">
<span<?php echo $ivf_vitals_history->ObstetricHistory->viewAttributes() ?>>
<?php echo $ivf_vitals_history->ObstetricHistory->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_ObstetricHistory" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_ObstetricHistory" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_ObstetricHistory" value="<?php echo HtmlEncode($ivf_vitals_history->ObstetricHistory->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_ObstetricHistory" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_ObstetricHistory" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_ObstetricHistory" value="<?php echo HtmlEncode($ivf_vitals_history->ObstetricHistory->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_ObstetricHistory" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_ObstetricHistory" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_ObstetricHistory" value="<?php echo HtmlEncode($ivf_vitals_history->ObstetricHistory->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_ObstetricHistory" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_ObstetricHistory" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_ObstetricHistory" value="<?php echo HtmlEncode($ivf_vitals_history->ObstetricHistory->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->MedicalHistory->Visible) { // MedicalHistory ?>
		<td data-name="MedicalHistory"<?php echo $ivf_vitals_history->MedicalHistory->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_MedicalHistory" class="form-group ivf_vitals_history_MedicalHistory">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_MedicalHistory" data-value-separator="<?php echo $ivf_vitals_history->MedicalHistory->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MedicalHistory" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MedicalHistory"<?php echo $ivf_vitals_history->MedicalHistory->editAttributes() ?>>
		<?php echo $ivf_vitals_history->MedicalHistory->selectOptionListHtml("x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MedicalHistory") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MedicalHistory" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MedicalHistory" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MedicalHistory" value="<?php echo HtmlEncode($ivf_vitals_history->MedicalHistory->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_MedicalHistory" class="form-group ivf_vitals_history_MedicalHistory">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_MedicalHistory" data-value-separator="<?php echo $ivf_vitals_history->MedicalHistory->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MedicalHistory" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MedicalHistory"<?php echo $ivf_vitals_history->MedicalHistory->editAttributes() ?>>
		<?php echo $ivf_vitals_history->MedicalHistory->selectOptionListHtml("x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MedicalHistory") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_MedicalHistory" class="ivf_vitals_history_MedicalHistory">
<span<?php echo $ivf_vitals_history->MedicalHistory->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MedicalHistory->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MedicalHistory" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MedicalHistory" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MedicalHistory" value="<?php echo HtmlEncode($ivf_vitals_history->MedicalHistory->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MedicalHistory" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MedicalHistory" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MedicalHistory" value="<?php echo HtmlEncode($ivf_vitals_history->MedicalHistory->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MedicalHistory" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MedicalHistory" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MedicalHistory" value="<?php echo HtmlEncode($ivf_vitals_history->MedicalHistory->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MedicalHistory" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MedicalHistory" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MedicalHistory" value="<?php echo HtmlEncode($ivf_vitals_history->MedicalHistory->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->SurgicalHistory->Visible) { // SurgicalHistory ?>
		<td data-name="SurgicalHistory"<?php echo $ivf_vitals_history->SurgicalHistory->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_SurgicalHistory" class="form-group ivf_vitals_history_SurgicalHistory">
<input type="text" data-table="ivf_vitals_history" data-field="x_SurgicalHistory" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_SurgicalHistory" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_SurgicalHistory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->SurgicalHistory->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->SurgicalHistory->EditValue ?>"<?php echo $ivf_vitals_history->SurgicalHistory->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_SurgicalHistory" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_SurgicalHistory" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_SurgicalHistory" value="<?php echo HtmlEncode($ivf_vitals_history->SurgicalHistory->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_SurgicalHistory" class="form-group ivf_vitals_history_SurgicalHistory">
<input type="text" data-table="ivf_vitals_history" data-field="x_SurgicalHistory" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_SurgicalHistory" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_SurgicalHistory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->SurgicalHistory->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->SurgicalHistory->EditValue ?>"<?php echo $ivf_vitals_history->SurgicalHistory->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_SurgicalHistory" class="ivf_vitals_history_SurgicalHistory">
<span<?php echo $ivf_vitals_history->SurgicalHistory->viewAttributes() ?>>
<?php echo $ivf_vitals_history->SurgicalHistory->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_SurgicalHistory" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_SurgicalHistory" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_SurgicalHistory" value="<?php echo HtmlEncode($ivf_vitals_history->SurgicalHistory->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_SurgicalHistory" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_SurgicalHistory" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_SurgicalHistory" value="<?php echo HtmlEncode($ivf_vitals_history->SurgicalHistory->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_SurgicalHistory" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_SurgicalHistory" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_SurgicalHistory" value="<?php echo HtmlEncode($ivf_vitals_history->SurgicalHistory->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_SurgicalHistory" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_SurgicalHistory" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_SurgicalHistory" value="<?php echo HtmlEncode($ivf_vitals_history->SurgicalHistory->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->Generalexaminationpallor->Visible) { // Generalexaminationpallor ?>
		<td data-name="Generalexaminationpallor"<?php echo $ivf_vitals_history->Generalexaminationpallor->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Generalexaminationpallor" class="form-group ivf_vitals_history_Generalexaminationpallor">
<input type="text" data-table="ivf_vitals_history" data-field="x_Generalexaminationpallor" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Generalexaminationpallor" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Generalexaminationpallor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Generalexaminationpallor->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Generalexaminationpallor->EditValue ?>"<?php echo $ivf_vitals_history->Generalexaminationpallor->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Generalexaminationpallor" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Generalexaminationpallor" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Generalexaminationpallor" value="<?php echo HtmlEncode($ivf_vitals_history->Generalexaminationpallor->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Generalexaminationpallor" class="form-group ivf_vitals_history_Generalexaminationpallor">
<input type="text" data-table="ivf_vitals_history" data-field="x_Generalexaminationpallor" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Generalexaminationpallor" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Generalexaminationpallor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Generalexaminationpallor->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Generalexaminationpallor->EditValue ?>"<?php echo $ivf_vitals_history->Generalexaminationpallor->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Generalexaminationpallor" class="ivf_vitals_history_Generalexaminationpallor">
<span<?php echo $ivf_vitals_history->Generalexaminationpallor->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Generalexaminationpallor->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Generalexaminationpallor" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Generalexaminationpallor" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Generalexaminationpallor" value="<?php echo HtmlEncode($ivf_vitals_history->Generalexaminationpallor->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Generalexaminationpallor" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Generalexaminationpallor" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Generalexaminationpallor" value="<?php echo HtmlEncode($ivf_vitals_history->Generalexaminationpallor->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Generalexaminationpallor" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Generalexaminationpallor" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Generalexaminationpallor" value="<?php echo HtmlEncode($ivf_vitals_history->Generalexaminationpallor->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Generalexaminationpallor" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Generalexaminationpallor" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Generalexaminationpallor" value="<?php echo HtmlEncode($ivf_vitals_history->Generalexaminationpallor->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->PR->Visible) { // PR ?>
		<td data-name="PR"<?php echo $ivf_vitals_history->PR->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_PR" class="form-group ivf_vitals_history_PR">
<input type="text" data-table="ivf_vitals_history" data-field="x_PR" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PR" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PR" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->PR->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->PR->EditValue ?>"<?php echo $ivf_vitals_history->PR->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PR" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PR" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PR" value="<?php echo HtmlEncode($ivf_vitals_history->PR->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_PR" class="form-group ivf_vitals_history_PR">
<input type="text" data-table="ivf_vitals_history" data-field="x_PR" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PR" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PR" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->PR->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->PR->EditValue ?>"<?php echo $ivf_vitals_history->PR->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_PR" class="ivf_vitals_history_PR">
<span<?php echo $ivf_vitals_history->PR->viewAttributes() ?>>
<?php echo $ivf_vitals_history->PR->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PR" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PR" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PR" value="<?php echo HtmlEncode($ivf_vitals_history->PR->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PR" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PR" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PR" value="<?php echo HtmlEncode($ivf_vitals_history->PR->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PR" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PR" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PR" value="<?php echo HtmlEncode($ivf_vitals_history->PR->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PR" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PR" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PR" value="<?php echo HtmlEncode($ivf_vitals_history->PR->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->CVS->Visible) { // CVS ?>
		<td data-name="CVS"<?php echo $ivf_vitals_history->CVS->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_CVS" class="form-group ivf_vitals_history_CVS">
<input type="text" data-table="ivf_vitals_history" data-field="x_CVS" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_CVS" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_CVS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->CVS->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->CVS->EditValue ?>"<?php echo $ivf_vitals_history->CVS->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_CVS" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_CVS" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_CVS" value="<?php echo HtmlEncode($ivf_vitals_history->CVS->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_CVS" class="form-group ivf_vitals_history_CVS">
<input type="text" data-table="ivf_vitals_history" data-field="x_CVS" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_CVS" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_CVS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->CVS->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->CVS->EditValue ?>"<?php echo $ivf_vitals_history->CVS->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_CVS" class="ivf_vitals_history_CVS">
<span<?php echo $ivf_vitals_history->CVS->viewAttributes() ?>>
<?php echo $ivf_vitals_history->CVS->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_CVS" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_CVS" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_CVS" value="<?php echo HtmlEncode($ivf_vitals_history->CVS->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_CVS" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_CVS" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_CVS" value="<?php echo HtmlEncode($ivf_vitals_history->CVS->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_CVS" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_CVS" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_CVS" value="<?php echo HtmlEncode($ivf_vitals_history->CVS->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_CVS" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_CVS" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_CVS" value="<?php echo HtmlEncode($ivf_vitals_history->CVS->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->PA->Visible) { // PA ?>
		<td data-name="PA"<?php echo $ivf_vitals_history->PA->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_PA" class="form-group ivf_vitals_history_PA">
<input type="text" data-table="ivf_vitals_history" data-field="x_PA" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PA" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PA" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->PA->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->PA->EditValue ?>"<?php echo $ivf_vitals_history->PA->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PA" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PA" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PA" value="<?php echo HtmlEncode($ivf_vitals_history->PA->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_PA" class="form-group ivf_vitals_history_PA">
<input type="text" data-table="ivf_vitals_history" data-field="x_PA" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PA" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PA" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->PA->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->PA->EditValue ?>"<?php echo $ivf_vitals_history->PA->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_PA" class="ivf_vitals_history_PA">
<span<?php echo $ivf_vitals_history->PA->viewAttributes() ?>>
<?php echo $ivf_vitals_history->PA->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PA" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PA" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PA" value="<?php echo HtmlEncode($ivf_vitals_history->PA->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PA" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PA" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PA" value="<?php echo HtmlEncode($ivf_vitals_history->PA->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PA" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PA" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PA" value="<?php echo HtmlEncode($ivf_vitals_history->PA->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PA" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PA" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PA" value="<?php echo HtmlEncode($ivf_vitals_history->PA->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
		<td data-name="PROVISIONALDIAGNOSIS"<?php echo $ivf_vitals_history->PROVISIONALDIAGNOSIS->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_PROVISIONALDIAGNOSIS" class="form-group ivf_vitals_history_PROVISIONALDIAGNOSIS">
<input type="text" data-table="ivf_vitals_history" data-field="x_PROVISIONALDIAGNOSIS" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PROVISIONALDIAGNOSIS" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PROVISIONALDIAGNOSIS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->PROVISIONALDIAGNOSIS->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->PROVISIONALDIAGNOSIS->EditValue ?>"<?php echo $ivf_vitals_history->PROVISIONALDIAGNOSIS->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PROVISIONALDIAGNOSIS" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PROVISIONALDIAGNOSIS" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PROVISIONALDIAGNOSIS" value="<?php echo HtmlEncode($ivf_vitals_history->PROVISIONALDIAGNOSIS->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_PROVISIONALDIAGNOSIS" class="form-group ivf_vitals_history_PROVISIONALDIAGNOSIS">
<input type="text" data-table="ivf_vitals_history" data-field="x_PROVISIONALDIAGNOSIS" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PROVISIONALDIAGNOSIS" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PROVISIONALDIAGNOSIS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->PROVISIONALDIAGNOSIS->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->PROVISIONALDIAGNOSIS->EditValue ?>"<?php echo $ivf_vitals_history->PROVISIONALDIAGNOSIS->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_PROVISIONALDIAGNOSIS" class="ivf_vitals_history_PROVISIONALDIAGNOSIS">
<span<?php echo $ivf_vitals_history->PROVISIONALDIAGNOSIS->viewAttributes() ?>>
<?php echo $ivf_vitals_history->PROVISIONALDIAGNOSIS->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PROVISIONALDIAGNOSIS" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PROVISIONALDIAGNOSIS" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PROVISIONALDIAGNOSIS" value="<?php echo HtmlEncode($ivf_vitals_history->PROVISIONALDIAGNOSIS->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PROVISIONALDIAGNOSIS" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PROVISIONALDIAGNOSIS" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PROVISIONALDIAGNOSIS" value="<?php echo HtmlEncode($ivf_vitals_history->PROVISIONALDIAGNOSIS->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PROVISIONALDIAGNOSIS" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PROVISIONALDIAGNOSIS" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PROVISIONALDIAGNOSIS" value="<?php echo HtmlEncode($ivf_vitals_history->PROVISIONALDIAGNOSIS->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PROVISIONALDIAGNOSIS" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PROVISIONALDIAGNOSIS" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PROVISIONALDIAGNOSIS" value="<?php echo HtmlEncode($ivf_vitals_history->PROVISIONALDIAGNOSIS->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->Investigations->Visible) { // Investigations ?>
		<td data-name="Investigations"<?php echo $ivf_vitals_history->Investigations->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Investigations" class="form-group ivf_vitals_history_Investigations">
<input type="text" data-table="ivf_vitals_history" data-field="x_Investigations" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Investigations" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Investigations" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Investigations->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Investigations->EditValue ?>"<?php echo $ivf_vitals_history->Investigations->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Investigations" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Investigations" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Investigations" value="<?php echo HtmlEncode($ivf_vitals_history->Investigations->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Investigations" class="form-group ivf_vitals_history_Investigations">
<input type="text" data-table="ivf_vitals_history" data-field="x_Investigations" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Investigations" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Investigations" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Investigations->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Investigations->EditValue ?>"<?php echo $ivf_vitals_history->Investigations->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Investigations" class="ivf_vitals_history_Investigations">
<span<?php echo $ivf_vitals_history->Investigations->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Investigations->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Investigations" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Investigations" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Investigations" value="<?php echo HtmlEncode($ivf_vitals_history->Investigations->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Investigations" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Investigations" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Investigations" value="<?php echo HtmlEncode($ivf_vitals_history->Investigations->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Investigations" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Investigations" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Investigations" value="<?php echo HtmlEncode($ivf_vitals_history->Investigations->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Investigations" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Investigations" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Investigations" value="<?php echo HtmlEncode($ivf_vitals_history->Investigations->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->Fheight->Visible) { // Fheight ?>
		<td data-name="Fheight"<?php echo $ivf_vitals_history->Fheight->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Fheight" class="form-group ivf_vitals_history_Fheight">
<input type="text" data-table="ivf_vitals_history" data-field="x_Fheight" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fheight" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fheight" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Fheight->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Fheight->EditValue ?>"<?php echo $ivf_vitals_history->Fheight->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Fheight" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fheight" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fheight" value="<?php echo HtmlEncode($ivf_vitals_history->Fheight->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Fheight" class="form-group ivf_vitals_history_Fheight">
<input type="text" data-table="ivf_vitals_history" data-field="x_Fheight" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fheight" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fheight" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Fheight->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Fheight->EditValue ?>"<?php echo $ivf_vitals_history->Fheight->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Fheight" class="ivf_vitals_history_Fheight">
<span<?php echo $ivf_vitals_history->Fheight->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Fheight->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Fheight" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fheight" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fheight" value="<?php echo HtmlEncode($ivf_vitals_history->Fheight->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Fheight" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fheight" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fheight" value="<?php echo HtmlEncode($ivf_vitals_history->Fheight->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Fheight" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fheight" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fheight" value="<?php echo HtmlEncode($ivf_vitals_history->Fheight->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Fheight" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fheight" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fheight" value="<?php echo HtmlEncode($ivf_vitals_history->Fheight->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->Fweight->Visible) { // Fweight ?>
		<td data-name="Fweight"<?php echo $ivf_vitals_history->Fweight->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Fweight" class="form-group ivf_vitals_history_Fweight">
<input type="text" data-table="ivf_vitals_history" data-field="x_Fweight" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fweight" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fweight" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Fweight->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Fweight->EditValue ?>"<?php echo $ivf_vitals_history->Fweight->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Fweight" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fweight" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fweight" value="<?php echo HtmlEncode($ivf_vitals_history->Fweight->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Fweight" class="form-group ivf_vitals_history_Fweight">
<input type="text" data-table="ivf_vitals_history" data-field="x_Fweight" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fweight" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fweight" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Fweight->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Fweight->EditValue ?>"<?php echo $ivf_vitals_history->Fweight->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Fweight" class="ivf_vitals_history_Fweight">
<span<?php echo $ivf_vitals_history->Fweight->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Fweight->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Fweight" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fweight" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fweight" value="<?php echo HtmlEncode($ivf_vitals_history->Fweight->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Fweight" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fweight" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fweight" value="<?php echo HtmlEncode($ivf_vitals_history->Fweight->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Fweight" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fweight" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fweight" value="<?php echo HtmlEncode($ivf_vitals_history->Fweight->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Fweight" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fweight" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fweight" value="<?php echo HtmlEncode($ivf_vitals_history->Fweight->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->FBMI->Visible) { // FBMI ?>
		<td data-name="FBMI"<?php echo $ivf_vitals_history->FBMI->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_FBMI" class="form-group ivf_vitals_history_FBMI">
<input type="text" data-table="ivf_vitals_history" data-field="x_FBMI" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBMI" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBMI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->FBMI->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->FBMI->EditValue ?>"<?php echo $ivf_vitals_history->FBMI->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FBMI" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBMI" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBMI" value="<?php echo HtmlEncode($ivf_vitals_history->FBMI->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_FBMI" class="form-group ivf_vitals_history_FBMI">
<input type="text" data-table="ivf_vitals_history" data-field="x_FBMI" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBMI" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBMI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->FBMI->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->FBMI->EditValue ?>"<?php echo $ivf_vitals_history->FBMI->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_FBMI" class="ivf_vitals_history_FBMI">
<span<?php echo $ivf_vitals_history->FBMI->viewAttributes() ?>>
<?php echo $ivf_vitals_history->FBMI->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FBMI" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBMI" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBMI" value="<?php echo HtmlEncode($ivf_vitals_history->FBMI->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FBMI" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBMI" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBMI" value="<?php echo HtmlEncode($ivf_vitals_history->FBMI->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FBMI" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBMI" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBMI" value="<?php echo HtmlEncode($ivf_vitals_history->FBMI->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FBMI" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBMI" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBMI" value="<?php echo HtmlEncode($ivf_vitals_history->FBMI->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->FBloodgroup->Visible) { // FBloodgroup ?>
		<td data-name="FBloodgroup"<?php echo $ivf_vitals_history->FBloodgroup->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_FBloodgroup" class="form-group ivf_vitals_history_FBloodgroup">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_FBloodgroup" data-value-separator="<?php echo $ivf_vitals_history->FBloodgroup->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBloodgroup" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBloodgroup"<?php echo $ivf_vitals_history->FBloodgroup->editAttributes() ?>>
		<?php echo $ivf_vitals_history->FBloodgroup->selectOptionListHtml("x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBloodgroup") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_bloodgroup") && !$ivf_vitals_history->FBloodgroup->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBloodgroup" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_vitals_history->FBloodgroup->caption() ?>" data-title="<?php echo $ivf_vitals_history->FBloodgroup->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBloodgroup',url:'mas_bloodgroupaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $ivf_vitals_history->FBloodgroup->Lookup->getParamTag("p_x" . $ivf_vitals_history_grid->RowIndex . "_FBloodgroup") ?>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FBloodgroup" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBloodgroup" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBloodgroup" value="<?php echo HtmlEncode($ivf_vitals_history->FBloodgroup->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_FBloodgroup" class="form-group ivf_vitals_history_FBloodgroup">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_FBloodgroup" data-value-separator="<?php echo $ivf_vitals_history->FBloodgroup->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBloodgroup" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBloodgroup"<?php echo $ivf_vitals_history->FBloodgroup->editAttributes() ?>>
		<?php echo $ivf_vitals_history->FBloodgroup->selectOptionListHtml("x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBloodgroup") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_bloodgroup") && !$ivf_vitals_history->FBloodgroup->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBloodgroup" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_vitals_history->FBloodgroup->caption() ?>" data-title="<?php echo $ivf_vitals_history->FBloodgroup->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBloodgroup',url:'mas_bloodgroupaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $ivf_vitals_history->FBloodgroup->Lookup->getParamTag("p_x" . $ivf_vitals_history_grid->RowIndex . "_FBloodgroup") ?>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_FBloodgroup" class="ivf_vitals_history_FBloodgroup">
<span<?php echo $ivf_vitals_history->FBloodgroup->viewAttributes() ?>>
<?php echo $ivf_vitals_history->FBloodgroup->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FBloodgroup" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBloodgroup" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBloodgroup" value="<?php echo HtmlEncode($ivf_vitals_history->FBloodgroup->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FBloodgroup" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBloodgroup" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBloodgroup" value="<?php echo HtmlEncode($ivf_vitals_history->FBloodgroup->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FBloodgroup" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBloodgroup" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBloodgroup" value="<?php echo HtmlEncode($ivf_vitals_history->FBloodgroup->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FBloodgroup" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBloodgroup" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBloodgroup" value="<?php echo HtmlEncode($ivf_vitals_history->FBloodgroup->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->Mheight->Visible) { // Mheight ?>
		<td data-name="Mheight"<?php echo $ivf_vitals_history->Mheight->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Mheight" class="form-group ivf_vitals_history_Mheight">
<input type="text" data-table="ivf_vitals_history" data-field="x_Mheight" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mheight" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mheight" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Mheight->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Mheight->EditValue ?>"<?php echo $ivf_vitals_history->Mheight->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Mheight" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mheight" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mheight" value="<?php echo HtmlEncode($ivf_vitals_history->Mheight->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Mheight" class="form-group ivf_vitals_history_Mheight">
<input type="text" data-table="ivf_vitals_history" data-field="x_Mheight" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mheight" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mheight" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Mheight->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Mheight->EditValue ?>"<?php echo $ivf_vitals_history->Mheight->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Mheight" class="ivf_vitals_history_Mheight">
<span<?php echo $ivf_vitals_history->Mheight->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Mheight->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Mheight" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mheight" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mheight" value="<?php echo HtmlEncode($ivf_vitals_history->Mheight->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Mheight" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mheight" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mheight" value="<?php echo HtmlEncode($ivf_vitals_history->Mheight->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Mheight" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mheight" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mheight" value="<?php echo HtmlEncode($ivf_vitals_history->Mheight->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Mheight" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mheight" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mheight" value="<?php echo HtmlEncode($ivf_vitals_history->Mheight->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->Mweight->Visible) { // Mweight ?>
		<td data-name="Mweight"<?php echo $ivf_vitals_history->Mweight->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Mweight" class="form-group ivf_vitals_history_Mweight">
<input type="text" data-table="ivf_vitals_history" data-field="x_Mweight" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mweight" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mweight" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Mweight->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Mweight->EditValue ?>"<?php echo $ivf_vitals_history->Mweight->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Mweight" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mweight" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mweight" value="<?php echo HtmlEncode($ivf_vitals_history->Mweight->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Mweight" class="form-group ivf_vitals_history_Mweight">
<input type="text" data-table="ivf_vitals_history" data-field="x_Mweight" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mweight" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mweight" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Mweight->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Mweight->EditValue ?>"<?php echo $ivf_vitals_history->Mweight->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Mweight" class="ivf_vitals_history_Mweight">
<span<?php echo $ivf_vitals_history->Mweight->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Mweight->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Mweight" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mweight" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mweight" value="<?php echo HtmlEncode($ivf_vitals_history->Mweight->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Mweight" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mweight" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mweight" value="<?php echo HtmlEncode($ivf_vitals_history->Mweight->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Mweight" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mweight" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mweight" value="<?php echo HtmlEncode($ivf_vitals_history->Mweight->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Mweight" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mweight" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mweight" value="<?php echo HtmlEncode($ivf_vitals_history->Mweight->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->MBMI->Visible) { // MBMI ?>
		<td data-name="MBMI"<?php echo $ivf_vitals_history->MBMI->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_MBMI" class="form-group ivf_vitals_history_MBMI">
<input type="text" data-table="ivf_vitals_history" data-field="x_MBMI" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBMI" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBMI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->MBMI->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->MBMI->EditValue ?>"<?php echo $ivf_vitals_history->MBMI->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MBMI" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBMI" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBMI" value="<?php echo HtmlEncode($ivf_vitals_history->MBMI->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_MBMI" class="form-group ivf_vitals_history_MBMI">
<input type="text" data-table="ivf_vitals_history" data-field="x_MBMI" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBMI" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBMI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->MBMI->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->MBMI->EditValue ?>"<?php echo $ivf_vitals_history->MBMI->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_MBMI" class="ivf_vitals_history_MBMI">
<span<?php echo $ivf_vitals_history->MBMI->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MBMI->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MBMI" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBMI" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBMI" value="<?php echo HtmlEncode($ivf_vitals_history->MBMI->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MBMI" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBMI" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBMI" value="<?php echo HtmlEncode($ivf_vitals_history->MBMI->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MBMI" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBMI" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBMI" value="<?php echo HtmlEncode($ivf_vitals_history->MBMI->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MBMI" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBMI" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBMI" value="<?php echo HtmlEncode($ivf_vitals_history->MBMI->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->MBloodgroup->Visible) { // MBloodgroup ?>
		<td data-name="MBloodgroup"<?php echo $ivf_vitals_history->MBloodgroup->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_MBloodgroup" class="form-group ivf_vitals_history_MBloodgroup">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_MBloodgroup" data-value-separator="<?php echo $ivf_vitals_history->MBloodgroup->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBloodgroup" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBloodgroup"<?php echo $ivf_vitals_history->MBloodgroup->editAttributes() ?>>
		<?php echo $ivf_vitals_history->MBloodgroup->selectOptionListHtml("x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBloodgroup") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_bloodgroup") && !$ivf_vitals_history->MBloodgroup->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBloodgroup" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_vitals_history->MBloodgroup->caption() ?>" data-title="<?php echo $ivf_vitals_history->MBloodgroup->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBloodgroup',url:'mas_bloodgroupaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $ivf_vitals_history->MBloodgroup->Lookup->getParamTag("p_x" . $ivf_vitals_history_grid->RowIndex . "_MBloodgroup") ?>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MBloodgroup" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBloodgroup" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBloodgroup" value="<?php echo HtmlEncode($ivf_vitals_history->MBloodgroup->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_MBloodgroup" class="form-group ivf_vitals_history_MBloodgroup">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_MBloodgroup" data-value-separator="<?php echo $ivf_vitals_history->MBloodgroup->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBloodgroup" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBloodgroup"<?php echo $ivf_vitals_history->MBloodgroup->editAttributes() ?>>
		<?php echo $ivf_vitals_history->MBloodgroup->selectOptionListHtml("x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBloodgroup") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_bloodgroup") && !$ivf_vitals_history->MBloodgroup->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBloodgroup" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_vitals_history->MBloodgroup->caption() ?>" data-title="<?php echo $ivf_vitals_history->MBloodgroup->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBloodgroup',url:'mas_bloodgroupaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $ivf_vitals_history->MBloodgroup->Lookup->getParamTag("p_x" . $ivf_vitals_history_grid->RowIndex . "_MBloodgroup") ?>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_MBloodgroup" class="ivf_vitals_history_MBloodgroup">
<span<?php echo $ivf_vitals_history->MBloodgroup->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MBloodgroup->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MBloodgroup" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBloodgroup" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBloodgroup" value="<?php echo HtmlEncode($ivf_vitals_history->MBloodgroup->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MBloodgroup" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBloodgroup" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBloodgroup" value="<?php echo HtmlEncode($ivf_vitals_history->MBloodgroup->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MBloodgroup" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBloodgroup" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBloodgroup" value="<?php echo HtmlEncode($ivf_vitals_history->MBloodgroup->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MBloodgroup" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBloodgroup" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBloodgroup" value="<?php echo HtmlEncode($ivf_vitals_history->MBloodgroup->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->FBuild->Visible) { // FBuild ?>
		<td data-name="FBuild"<?php echo $ivf_vitals_history->FBuild->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_FBuild" class="form-group ivf_vitals_history_FBuild">
<div id="tp_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBuild" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_vitals_history" data-field="x_FBuild" data-value-separator="<?php echo $ivf_vitals_history->FBuild->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBuild" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBuild" value="{value}"<?php echo $ivf_vitals_history->FBuild->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBuild" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history->FBuild->radioButtonListHtml(FALSE, "x{$ivf_vitals_history_grid->RowIndex}_FBuild") ?>
</div></div>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FBuild" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBuild" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBuild" value="<?php echo HtmlEncode($ivf_vitals_history->FBuild->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_FBuild" class="form-group ivf_vitals_history_FBuild">
<div id="tp_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBuild" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_vitals_history" data-field="x_FBuild" data-value-separator="<?php echo $ivf_vitals_history->FBuild->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBuild" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBuild" value="{value}"<?php echo $ivf_vitals_history->FBuild->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBuild" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history->FBuild->radioButtonListHtml(FALSE, "x{$ivf_vitals_history_grid->RowIndex}_FBuild") ?>
</div></div>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_FBuild" class="ivf_vitals_history_FBuild">
<span<?php echo $ivf_vitals_history->FBuild->viewAttributes() ?>>
<?php echo $ivf_vitals_history->FBuild->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FBuild" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBuild" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBuild" value="<?php echo HtmlEncode($ivf_vitals_history->FBuild->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FBuild" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBuild" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBuild" value="<?php echo HtmlEncode($ivf_vitals_history->FBuild->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FBuild" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBuild" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBuild" value="<?php echo HtmlEncode($ivf_vitals_history->FBuild->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FBuild" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBuild" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBuild" value="<?php echo HtmlEncode($ivf_vitals_history->FBuild->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->MBuild->Visible) { // MBuild ?>
		<td data-name="MBuild"<?php echo $ivf_vitals_history->MBuild->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_MBuild" class="form-group ivf_vitals_history_MBuild">
<div id="tp_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBuild" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_vitals_history" data-field="x_MBuild" data-value-separator="<?php echo $ivf_vitals_history->MBuild->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBuild" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBuild" value="{value}"<?php echo $ivf_vitals_history->MBuild->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBuild" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history->MBuild->radioButtonListHtml(FALSE, "x{$ivf_vitals_history_grid->RowIndex}_MBuild") ?>
</div></div>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MBuild" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBuild" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBuild" value="<?php echo HtmlEncode($ivf_vitals_history->MBuild->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_MBuild" class="form-group ivf_vitals_history_MBuild">
<div id="tp_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBuild" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_vitals_history" data-field="x_MBuild" data-value-separator="<?php echo $ivf_vitals_history->MBuild->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBuild" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBuild" value="{value}"<?php echo $ivf_vitals_history->MBuild->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBuild" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history->MBuild->radioButtonListHtml(FALSE, "x{$ivf_vitals_history_grid->RowIndex}_MBuild") ?>
</div></div>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_MBuild" class="ivf_vitals_history_MBuild">
<span<?php echo $ivf_vitals_history->MBuild->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MBuild->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MBuild" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBuild" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBuild" value="<?php echo HtmlEncode($ivf_vitals_history->MBuild->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MBuild" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBuild" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBuild" value="<?php echo HtmlEncode($ivf_vitals_history->MBuild->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MBuild" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBuild" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBuild" value="<?php echo HtmlEncode($ivf_vitals_history->MBuild->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MBuild" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBuild" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBuild" value="<?php echo HtmlEncode($ivf_vitals_history->MBuild->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->FSkinColor->Visible) { // FSkinColor ?>
		<td data-name="FSkinColor"<?php echo $ivf_vitals_history->FSkinColor->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_FSkinColor" class="form-group ivf_vitals_history_FSkinColor">
<div id="tp_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FSkinColor" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_vitals_history" data-field="x_FSkinColor" data-value-separator="<?php echo $ivf_vitals_history->FSkinColor->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FSkinColor" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FSkinColor" value="{value}"<?php echo $ivf_vitals_history->FSkinColor->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FSkinColor" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history->FSkinColor->radioButtonListHtml(FALSE, "x{$ivf_vitals_history_grid->RowIndex}_FSkinColor") ?>
</div></div>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FSkinColor" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FSkinColor" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FSkinColor" value="<?php echo HtmlEncode($ivf_vitals_history->FSkinColor->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_FSkinColor" class="form-group ivf_vitals_history_FSkinColor">
<div id="tp_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FSkinColor" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_vitals_history" data-field="x_FSkinColor" data-value-separator="<?php echo $ivf_vitals_history->FSkinColor->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FSkinColor" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FSkinColor" value="{value}"<?php echo $ivf_vitals_history->FSkinColor->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FSkinColor" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history->FSkinColor->radioButtonListHtml(FALSE, "x{$ivf_vitals_history_grid->RowIndex}_FSkinColor") ?>
</div></div>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_FSkinColor" class="ivf_vitals_history_FSkinColor">
<span<?php echo $ivf_vitals_history->FSkinColor->viewAttributes() ?>>
<?php echo $ivf_vitals_history->FSkinColor->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FSkinColor" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FSkinColor" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FSkinColor" value="<?php echo HtmlEncode($ivf_vitals_history->FSkinColor->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FSkinColor" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FSkinColor" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FSkinColor" value="<?php echo HtmlEncode($ivf_vitals_history->FSkinColor->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FSkinColor" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FSkinColor" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FSkinColor" value="<?php echo HtmlEncode($ivf_vitals_history->FSkinColor->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FSkinColor" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FSkinColor" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FSkinColor" value="<?php echo HtmlEncode($ivf_vitals_history->FSkinColor->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->MSkinColor->Visible) { // MSkinColor ?>
		<td data-name="MSkinColor"<?php echo $ivf_vitals_history->MSkinColor->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_MSkinColor" class="form-group ivf_vitals_history_MSkinColor">
<div id="tp_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MSkinColor" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_vitals_history" data-field="x_MSkinColor" data-value-separator="<?php echo $ivf_vitals_history->MSkinColor->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MSkinColor" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MSkinColor" value="{value}"<?php echo $ivf_vitals_history->MSkinColor->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MSkinColor" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history->MSkinColor->radioButtonListHtml(FALSE, "x{$ivf_vitals_history_grid->RowIndex}_MSkinColor") ?>
</div></div>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MSkinColor" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MSkinColor" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MSkinColor" value="<?php echo HtmlEncode($ivf_vitals_history->MSkinColor->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_MSkinColor" class="form-group ivf_vitals_history_MSkinColor">
<div id="tp_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MSkinColor" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_vitals_history" data-field="x_MSkinColor" data-value-separator="<?php echo $ivf_vitals_history->MSkinColor->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MSkinColor" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MSkinColor" value="{value}"<?php echo $ivf_vitals_history->MSkinColor->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MSkinColor" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history->MSkinColor->radioButtonListHtml(FALSE, "x{$ivf_vitals_history_grid->RowIndex}_MSkinColor") ?>
</div></div>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_MSkinColor" class="ivf_vitals_history_MSkinColor">
<span<?php echo $ivf_vitals_history->MSkinColor->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MSkinColor->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MSkinColor" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MSkinColor" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MSkinColor" value="<?php echo HtmlEncode($ivf_vitals_history->MSkinColor->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MSkinColor" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MSkinColor" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MSkinColor" value="<?php echo HtmlEncode($ivf_vitals_history->MSkinColor->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MSkinColor" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MSkinColor" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MSkinColor" value="<?php echo HtmlEncode($ivf_vitals_history->MSkinColor->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MSkinColor" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MSkinColor" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MSkinColor" value="<?php echo HtmlEncode($ivf_vitals_history->MSkinColor->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->FEyesColor->Visible) { // FEyesColor ?>
		<td data-name="FEyesColor"<?php echo $ivf_vitals_history->FEyesColor->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_FEyesColor" class="form-group ivf_vitals_history_FEyesColor">
<div id="tp_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FEyesColor" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_vitals_history" data-field="x_FEyesColor" data-value-separator="<?php echo $ivf_vitals_history->FEyesColor->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FEyesColor" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FEyesColor" value="{value}"<?php echo $ivf_vitals_history->FEyesColor->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FEyesColor" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history->FEyesColor->radioButtonListHtml(FALSE, "x{$ivf_vitals_history_grid->RowIndex}_FEyesColor") ?>
</div></div>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FEyesColor" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FEyesColor" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FEyesColor" value="<?php echo HtmlEncode($ivf_vitals_history->FEyesColor->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_FEyesColor" class="form-group ivf_vitals_history_FEyesColor">
<div id="tp_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FEyesColor" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_vitals_history" data-field="x_FEyesColor" data-value-separator="<?php echo $ivf_vitals_history->FEyesColor->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FEyesColor" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FEyesColor" value="{value}"<?php echo $ivf_vitals_history->FEyesColor->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FEyesColor" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history->FEyesColor->radioButtonListHtml(FALSE, "x{$ivf_vitals_history_grid->RowIndex}_FEyesColor") ?>
</div></div>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_FEyesColor" class="ivf_vitals_history_FEyesColor">
<span<?php echo $ivf_vitals_history->FEyesColor->viewAttributes() ?>>
<?php echo $ivf_vitals_history->FEyesColor->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FEyesColor" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FEyesColor" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FEyesColor" value="<?php echo HtmlEncode($ivf_vitals_history->FEyesColor->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FEyesColor" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FEyesColor" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FEyesColor" value="<?php echo HtmlEncode($ivf_vitals_history->FEyesColor->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FEyesColor" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FEyesColor" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FEyesColor" value="<?php echo HtmlEncode($ivf_vitals_history->FEyesColor->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FEyesColor" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FEyesColor" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FEyesColor" value="<?php echo HtmlEncode($ivf_vitals_history->FEyesColor->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->MEyesColor->Visible) { // MEyesColor ?>
		<td data-name="MEyesColor"<?php echo $ivf_vitals_history->MEyesColor->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_MEyesColor" class="form-group ivf_vitals_history_MEyesColor">
<div id="tp_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MEyesColor" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_vitals_history" data-field="x_MEyesColor" data-value-separator="<?php echo $ivf_vitals_history->MEyesColor->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MEyesColor" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MEyesColor" value="{value}"<?php echo $ivf_vitals_history->MEyesColor->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MEyesColor" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history->MEyesColor->radioButtonListHtml(FALSE, "x{$ivf_vitals_history_grid->RowIndex}_MEyesColor") ?>
</div></div>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MEyesColor" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MEyesColor" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MEyesColor" value="<?php echo HtmlEncode($ivf_vitals_history->MEyesColor->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_MEyesColor" class="form-group ivf_vitals_history_MEyesColor">
<div id="tp_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MEyesColor" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_vitals_history" data-field="x_MEyesColor" data-value-separator="<?php echo $ivf_vitals_history->MEyesColor->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MEyesColor" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MEyesColor" value="{value}"<?php echo $ivf_vitals_history->MEyesColor->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MEyesColor" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history->MEyesColor->radioButtonListHtml(FALSE, "x{$ivf_vitals_history_grid->RowIndex}_MEyesColor") ?>
</div></div>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_MEyesColor" class="ivf_vitals_history_MEyesColor">
<span<?php echo $ivf_vitals_history->MEyesColor->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MEyesColor->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MEyesColor" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MEyesColor" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MEyesColor" value="<?php echo HtmlEncode($ivf_vitals_history->MEyesColor->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MEyesColor" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MEyesColor" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MEyesColor" value="<?php echo HtmlEncode($ivf_vitals_history->MEyesColor->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MEyesColor" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MEyesColor" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MEyesColor" value="<?php echo HtmlEncode($ivf_vitals_history->MEyesColor->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MEyesColor" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MEyesColor" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MEyesColor" value="<?php echo HtmlEncode($ivf_vitals_history->MEyesColor->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->FHairColor->Visible) { // FHairColor ?>
		<td data-name="FHairColor"<?php echo $ivf_vitals_history->FHairColor->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_FHairColor" class="form-group ivf_vitals_history_FHairColor">
<div id="tp_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FHairColor" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_vitals_history" data-field="x_FHairColor" data-value-separator="<?php echo $ivf_vitals_history->FHairColor->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FHairColor" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FHairColor" value="{value}"<?php echo $ivf_vitals_history->FHairColor->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FHairColor" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history->FHairColor->radioButtonListHtml(FALSE, "x{$ivf_vitals_history_grid->RowIndex}_FHairColor") ?>
</div></div>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FHairColor" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FHairColor" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FHairColor" value="<?php echo HtmlEncode($ivf_vitals_history->FHairColor->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_FHairColor" class="form-group ivf_vitals_history_FHairColor">
<div id="tp_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FHairColor" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_vitals_history" data-field="x_FHairColor" data-value-separator="<?php echo $ivf_vitals_history->FHairColor->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FHairColor" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FHairColor" value="{value}"<?php echo $ivf_vitals_history->FHairColor->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FHairColor" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history->FHairColor->radioButtonListHtml(FALSE, "x{$ivf_vitals_history_grid->RowIndex}_FHairColor") ?>
</div></div>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_FHairColor" class="ivf_vitals_history_FHairColor">
<span<?php echo $ivf_vitals_history->FHairColor->viewAttributes() ?>>
<?php echo $ivf_vitals_history->FHairColor->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FHairColor" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FHairColor" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FHairColor" value="<?php echo HtmlEncode($ivf_vitals_history->FHairColor->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FHairColor" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FHairColor" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FHairColor" value="<?php echo HtmlEncode($ivf_vitals_history->FHairColor->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FHairColor" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FHairColor" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FHairColor" value="<?php echo HtmlEncode($ivf_vitals_history->FHairColor->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FHairColor" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FHairColor" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FHairColor" value="<?php echo HtmlEncode($ivf_vitals_history->FHairColor->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->MhairColor->Visible) { // MhairColor ?>
		<td data-name="MhairColor"<?php echo $ivf_vitals_history->MhairColor->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_MhairColor" class="form-group ivf_vitals_history_MhairColor">
<div id="tp_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MhairColor" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_vitals_history" data-field="x_MhairColor" data-value-separator="<?php echo $ivf_vitals_history->MhairColor->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MhairColor" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MhairColor" value="{value}"<?php echo $ivf_vitals_history->MhairColor->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MhairColor" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history->MhairColor->radioButtonListHtml(FALSE, "x{$ivf_vitals_history_grid->RowIndex}_MhairColor") ?>
</div></div>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MhairColor" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MhairColor" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MhairColor" value="<?php echo HtmlEncode($ivf_vitals_history->MhairColor->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_MhairColor" class="form-group ivf_vitals_history_MhairColor">
<div id="tp_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MhairColor" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_vitals_history" data-field="x_MhairColor" data-value-separator="<?php echo $ivf_vitals_history->MhairColor->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MhairColor" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MhairColor" value="{value}"<?php echo $ivf_vitals_history->MhairColor->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MhairColor" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history->MhairColor->radioButtonListHtml(FALSE, "x{$ivf_vitals_history_grid->RowIndex}_MhairColor") ?>
</div></div>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_MhairColor" class="ivf_vitals_history_MhairColor">
<span<?php echo $ivf_vitals_history->MhairColor->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MhairColor->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MhairColor" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MhairColor" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MhairColor" value="<?php echo HtmlEncode($ivf_vitals_history->MhairColor->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MhairColor" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MhairColor" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MhairColor" value="<?php echo HtmlEncode($ivf_vitals_history->MhairColor->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MhairColor" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MhairColor" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MhairColor" value="<?php echo HtmlEncode($ivf_vitals_history->MhairColor->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MhairColor" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MhairColor" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MhairColor" value="<?php echo HtmlEncode($ivf_vitals_history->MhairColor->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->FhairTexture->Visible) { // FhairTexture ?>
		<td data-name="FhairTexture"<?php echo $ivf_vitals_history->FhairTexture->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_FhairTexture" class="form-group ivf_vitals_history_FhairTexture">
<div id="tp_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FhairTexture" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_vitals_history" data-field="x_FhairTexture" data-value-separator="<?php echo $ivf_vitals_history->FhairTexture->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FhairTexture" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FhairTexture" value="{value}"<?php echo $ivf_vitals_history->FhairTexture->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FhairTexture" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history->FhairTexture->radioButtonListHtml(FALSE, "x{$ivf_vitals_history_grid->RowIndex}_FhairTexture") ?>
</div></div>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FhairTexture" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FhairTexture" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FhairTexture" value="<?php echo HtmlEncode($ivf_vitals_history->FhairTexture->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_FhairTexture" class="form-group ivf_vitals_history_FhairTexture">
<div id="tp_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FhairTexture" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_vitals_history" data-field="x_FhairTexture" data-value-separator="<?php echo $ivf_vitals_history->FhairTexture->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FhairTexture" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FhairTexture" value="{value}"<?php echo $ivf_vitals_history->FhairTexture->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FhairTexture" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history->FhairTexture->radioButtonListHtml(FALSE, "x{$ivf_vitals_history_grid->RowIndex}_FhairTexture") ?>
</div></div>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_FhairTexture" class="ivf_vitals_history_FhairTexture">
<span<?php echo $ivf_vitals_history->FhairTexture->viewAttributes() ?>>
<?php echo $ivf_vitals_history->FhairTexture->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FhairTexture" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FhairTexture" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FhairTexture" value="<?php echo HtmlEncode($ivf_vitals_history->FhairTexture->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FhairTexture" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FhairTexture" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FhairTexture" value="<?php echo HtmlEncode($ivf_vitals_history->FhairTexture->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FhairTexture" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FhairTexture" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FhairTexture" value="<?php echo HtmlEncode($ivf_vitals_history->FhairTexture->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FhairTexture" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FhairTexture" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FhairTexture" value="<?php echo HtmlEncode($ivf_vitals_history->FhairTexture->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->MHairTexture->Visible) { // MHairTexture ?>
		<td data-name="MHairTexture"<?php echo $ivf_vitals_history->MHairTexture->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_MHairTexture" class="form-group ivf_vitals_history_MHairTexture">
<div id="tp_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MHairTexture" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_vitals_history" data-field="x_MHairTexture" data-value-separator="<?php echo $ivf_vitals_history->MHairTexture->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MHairTexture" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MHairTexture" value="{value}"<?php echo $ivf_vitals_history->MHairTexture->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MHairTexture" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history->MHairTexture->radioButtonListHtml(FALSE, "x{$ivf_vitals_history_grid->RowIndex}_MHairTexture") ?>
</div></div>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MHairTexture" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MHairTexture" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MHairTexture" value="<?php echo HtmlEncode($ivf_vitals_history->MHairTexture->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_MHairTexture" class="form-group ivf_vitals_history_MHairTexture">
<div id="tp_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MHairTexture" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_vitals_history" data-field="x_MHairTexture" data-value-separator="<?php echo $ivf_vitals_history->MHairTexture->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MHairTexture" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MHairTexture" value="{value}"<?php echo $ivf_vitals_history->MHairTexture->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MHairTexture" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history->MHairTexture->radioButtonListHtml(FALSE, "x{$ivf_vitals_history_grid->RowIndex}_MHairTexture") ?>
</div></div>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_MHairTexture" class="ivf_vitals_history_MHairTexture">
<span<?php echo $ivf_vitals_history->MHairTexture->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MHairTexture->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MHairTexture" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MHairTexture" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MHairTexture" value="<?php echo HtmlEncode($ivf_vitals_history->MHairTexture->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MHairTexture" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MHairTexture" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MHairTexture" value="<?php echo HtmlEncode($ivf_vitals_history->MHairTexture->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MHairTexture" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MHairTexture" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MHairTexture" value="<?php echo HtmlEncode($ivf_vitals_history->MHairTexture->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MHairTexture" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MHairTexture" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MHairTexture" value="<?php echo HtmlEncode($ivf_vitals_history->MHairTexture->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->Fothers->Visible) { // Fothers ?>
		<td data-name="Fothers"<?php echo $ivf_vitals_history->Fothers->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Fothers" class="form-group ivf_vitals_history_Fothers">
<input type="text" data-table="ivf_vitals_history" data-field="x_Fothers" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fothers" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fothers" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Fothers->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Fothers->EditValue ?>"<?php echo $ivf_vitals_history->Fothers->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Fothers" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fothers" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fothers" value="<?php echo HtmlEncode($ivf_vitals_history->Fothers->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Fothers" class="form-group ivf_vitals_history_Fothers">
<input type="text" data-table="ivf_vitals_history" data-field="x_Fothers" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fothers" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fothers" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Fothers->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Fothers->EditValue ?>"<?php echo $ivf_vitals_history->Fothers->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Fothers" class="ivf_vitals_history_Fothers">
<span<?php echo $ivf_vitals_history->Fothers->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Fothers->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Fothers" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fothers" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fothers" value="<?php echo HtmlEncode($ivf_vitals_history->Fothers->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Fothers" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fothers" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fothers" value="<?php echo HtmlEncode($ivf_vitals_history->Fothers->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Fothers" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fothers" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fothers" value="<?php echo HtmlEncode($ivf_vitals_history->Fothers->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Fothers" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fothers" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fothers" value="<?php echo HtmlEncode($ivf_vitals_history->Fothers->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->Mothers->Visible) { // Mothers ?>
		<td data-name="Mothers"<?php echo $ivf_vitals_history->Mothers->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Mothers" class="form-group ivf_vitals_history_Mothers">
<input type="text" data-table="ivf_vitals_history" data-field="x_Mothers" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mothers" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mothers" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Mothers->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Mothers->EditValue ?>"<?php echo $ivf_vitals_history->Mothers->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Mothers" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mothers" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mothers" value="<?php echo HtmlEncode($ivf_vitals_history->Mothers->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Mothers" class="form-group ivf_vitals_history_Mothers">
<input type="text" data-table="ivf_vitals_history" data-field="x_Mothers" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mothers" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mothers" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Mothers->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Mothers->EditValue ?>"<?php echo $ivf_vitals_history->Mothers->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Mothers" class="ivf_vitals_history_Mothers">
<span<?php echo $ivf_vitals_history->Mothers->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Mothers->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Mothers" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mothers" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mothers" value="<?php echo HtmlEncode($ivf_vitals_history->Mothers->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Mothers" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mothers" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mothers" value="<?php echo HtmlEncode($ivf_vitals_history->Mothers->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Mothers" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mothers" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mothers" value="<?php echo HtmlEncode($ivf_vitals_history->Mothers->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Mothers" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mothers" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mothers" value="<?php echo HtmlEncode($ivf_vitals_history->Mothers->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->PGE->Visible) { // PGE ?>
		<td data-name="PGE"<?php echo $ivf_vitals_history->PGE->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_PGE" class="form-group ivf_vitals_history_PGE">
<input type="text" data-table="ivf_vitals_history" data-field="x_PGE" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PGE" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PGE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->PGE->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->PGE->EditValue ?>"<?php echo $ivf_vitals_history->PGE->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PGE" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PGE" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PGE" value="<?php echo HtmlEncode($ivf_vitals_history->PGE->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_PGE" class="form-group ivf_vitals_history_PGE">
<input type="text" data-table="ivf_vitals_history" data-field="x_PGE" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PGE" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PGE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->PGE->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->PGE->EditValue ?>"<?php echo $ivf_vitals_history->PGE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_PGE" class="ivf_vitals_history_PGE">
<span<?php echo $ivf_vitals_history->PGE->viewAttributes() ?>>
<?php echo $ivf_vitals_history->PGE->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PGE" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PGE" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PGE" value="<?php echo HtmlEncode($ivf_vitals_history->PGE->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PGE" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PGE" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PGE" value="<?php echo HtmlEncode($ivf_vitals_history->PGE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PGE" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PGE" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PGE" value="<?php echo HtmlEncode($ivf_vitals_history->PGE->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PGE" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PGE" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PGE" value="<?php echo HtmlEncode($ivf_vitals_history->PGE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->PPR->Visible) { // PPR ?>
		<td data-name="PPR"<?php echo $ivf_vitals_history->PPR->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_PPR" class="form-group ivf_vitals_history_PPR">
<input type="text" data-table="ivf_vitals_history" data-field="x_PPR" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPR" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPR" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->PPR->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->PPR->EditValue ?>"<?php echo $ivf_vitals_history->PPR->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PPR" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPR" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPR" value="<?php echo HtmlEncode($ivf_vitals_history->PPR->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_PPR" class="form-group ivf_vitals_history_PPR">
<input type="text" data-table="ivf_vitals_history" data-field="x_PPR" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPR" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPR" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->PPR->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->PPR->EditValue ?>"<?php echo $ivf_vitals_history->PPR->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_PPR" class="ivf_vitals_history_PPR">
<span<?php echo $ivf_vitals_history->PPR->viewAttributes() ?>>
<?php echo $ivf_vitals_history->PPR->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PPR" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPR" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPR" value="<?php echo HtmlEncode($ivf_vitals_history->PPR->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PPR" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPR" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPR" value="<?php echo HtmlEncode($ivf_vitals_history->PPR->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PPR" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPR" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPR" value="<?php echo HtmlEncode($ivf_vitals_history->PPR->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PPR" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPR" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPR" value="<?php echo HtmlEncode($ivf_vitals_history->PPR->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->PBP->Visible) { // PBP ?>
		<td data-name="PBP"<?php echo $ivf_vitals_history->PBP->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_PBP" class="form-group ivf_vitals_history_PBP">
<input type="text" data-table="ivf_vitals_history" data-field="x_PBP" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PBP" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PBP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->PBP->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->PBP->EditValue ?>"<?php echo $ivf_vitals_history->PBP->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PBP" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PBP" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PBP" value="<?php echo HtmlEncode($ivf_vitals_history->PBP->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_PBP" class="form-group ivf_vitals_history_PBP">
<input type="text" data-table="ivf_vitals_history" data-field="x_PBP" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PBP" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PBP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->PBP->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->PBP->EditValue ?>"<?php echo $ivf_vitals_history->PBP->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_PBP" class="ivf_vitals_history_PBP">
<span<?php echo $ivf_vitals_history->PBP->viewAttributes() ?>>
<?php echo $ivf_vitals_history->PBP->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PBP" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PBP" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PBP" value="<?php echo HtmlEncode($ivf_vitals_history->PBP->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PBP" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PBP" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PBP" value="<?php echo HtmlEncode($ivf_vitals_history->PBP->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PBP" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PBP" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PBP" value="<?php echo HtmlEncode($ivf_vitals_history->PBP->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PBP" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PBP" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PBP" value="<?php echo HtmlEncode($ivf_vitals_history->PBP->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->Breast->Visible) { // Breast ?>
		<td data-name="Breast"<?php echo $ivf_vitals_history->Breast->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Breast" class="form-group ivf_vitals_history_Breast">
<input type="text" data-table="ivf_vitals_history" data-field="x_Breast" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Breast" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Breast" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Breast->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Breast->EditValue ?>"<?php echo $ivf_vitals_history->Breast->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Breast" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Breast" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Breast" value="<?php echo HtmlEncode($ivf_vitals_history->Breast->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Breast" class="form-group ivf_vitals_history_Breast">
<input type="text" data-table="ivf_vitals_history" data-field="x_Breast" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Breast" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Breast" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Breast->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Breast->EditValue ?>"<?php echo $ivf_vitals_history->Breast->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Breast" class="ivf_vitals_history_Breast">
<span<?php echo $ivf_vitals_history->Breast->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Breast->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Breast" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Breast" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Breast" value="<?php echo HtmlEncode($ivf_vitals_history->Breast->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Breast" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Breast" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Breast" value="<?php echo HtmlEncode($ivf_vitals_history->Breast->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Breast" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Breast" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Breast" value="<?php echo HtmlEncode($ivf_vitals_history->Breast->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Breast" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Breast" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Breast" value="<?php echo HtmlEncode($ivf_vitals_history->Breast->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->PPA->Visible) { // PPA ?>
		<td data-name="PPA"<?php echo $ivf_vitals_history->PPA->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_PPA" class="form-group ivf_vitals_history_PPA">
<input type="text" data-table="ivf_vitals_history" data-field="x_PPA" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPA" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPA" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->PPA->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->PPA->EditValue ?>"<?php echo $ivf_vitals_history->PPA->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PPA" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPA" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPA" value="<?php echo HtmlEncode($ivf_vitals_history->PPA->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_PPA" class="form-group ivf_vitals_history_PPA">
<input type="text" data-table="ivf_vitals_history" data-field="x_PPA" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPA" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPA" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->PPA->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->PPA->EditValue ?>"<?php echo $ivf_vitals_history->PPA->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_PPA" class="ivf_vitals_history_PPA">
<span<?php echo $ivf_vitals_history->PPA->viewAttributes() ?>>
<?php echo $ivf_vitals_history->PPA->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PPA" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPA" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPA" value="<?php echo HtmlEncode($ivf_vitals_history->PPA->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PPA" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPA" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPA" value="<?php echo HtmlEncode($ivf_vitals_history->PPA->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PPA" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPA" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPA" value="<?php echo HtmlEncode($ivf_vitals_history->PPA->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PPA" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPA" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPA" value="<?php echo HtmlEncode($ivf_vitals_history->PPA->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->PPSV->Visible) { // PPSV ?>
		<td data-name="PPSV"<?php echo $ivf_vitals_history->PPSV->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_PPSV" class="form-group ivf_vitals_history_PPSV">
<input type="text" data-table="ivf_vitals_history" data-field="x_PPSV" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPSV" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPSV" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->PPSV->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->PPSV->EditValue ?>"<?php echo $ivf_vitals_history->PPSV->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PPSV" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPSV" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPSV" value="<?php echo HtmlEncode($ivf_vitals_history->PPSV->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_PPSV" class="form-group ivf_vitals_history_PPSV">
<input type="text" data-table="ivf_vitals_history" data-field="x_PPSV" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPSV" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPSV" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->PPSV->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->PPSV->EditValue ?>"<?php echo $ivf_vitals_history->PPSV->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_PPSV" class="ivf_vitals_history_PPSV">
<span<?php echo $ivf_vitals_history->PPSV->viewAttributes() ?>>
<?php echo $ivf_vitals_history->PPSV->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PPSV" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPSV" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPSV" value="<?php echo HtmlEncode($ivf_vitals_history->PPSV->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PPSV" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPSV" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPSV" value="<?php echo HtmlEncode($ivf_vitals_history->PPSV->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PPSV" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPSV" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPSV" value="<?php echo HtmlEncode($ivf_vitals_history->PPSV->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PPSV" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPSV" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPSV" value="<?php echo HtmlEncode($ivf_vitals_history->PPSV->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->PPAPSMEAR->Visible) { // PPAPSMEAR ?>
		<td data-name="PPAPSMEAR"<?php echo $ivf_vitals_history->PPAPSMEAR->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_PPAPSMEAR" class="form-group ivf_vitals_history_PPAPSMEAR">
<input type="text" data-table="ivf_vitals_history" data-field="x_PPAPSMEAR" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPAPSMEAR" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPAPSMEAR" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->PPAPSMEAR->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->PPAPSMEAR->EditValue ?>"<?php echo $ivf_vitals_history->PPAPSMEAR->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PPAPSMEAR" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPAPSMEAR" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPAPSMEAR" value="<?php echo HtmlEncode($ivf_vitals_history->PPAPSMEAR->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_PPAPSMEAR" class="form-group ivf_vitals_history_PPAPSMEAR">
<input type="text" data-table="ivf_vitals_history" data-field="x_PPAPSMEAR" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPAPSMEAR" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPAPSMEAR" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->PPAPSMEAR->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->PPAPSMEAR->EditValue ?>"<?php echo $ivf_vitals_history->PPAPSMEAR->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_PPAPSMEAR" class="ivf_vitals_history_PPAPSMEAR">
<span<?php echo $ivf_vitals_history->PPAPSMEAR->viewAttributes() ?>>
<?php echo $ivf_vitals_history->PPAPSMEAR->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PPAPSMEAR" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPAPSMEAR" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPAPSMEAR" value="<?php echo HtmlEncode($ivf_vitals_history->PPAPSMEAR->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PPAPSMEAR" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPAPSMEAR" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPAPSMEAR" value="<?php echo HtmlEncode($ivf_vitals_history->PPAPSMEAR->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PPAPSMEAR" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPAPSMEAR" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPAPSMEAR" value="<?php echo HtmlEncode($ivf_vitals_history->PPAPSMEAR->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PPAPSMEAR" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPAPSMEAR" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPAPSMEAR" value="<?php echo HtmlEncode($ivf_vitals_history->PPAPSMEAR->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->PTHYROID->Visible) { // PTHYROID ?>
		<td data-name="PTHYROID"<?php echo $ivf_vitals_history->PTHYROID->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_PTHYROID" class="form-group ivf_vitals_history_PTHYROID">
<input type="text" data-table="ivf_vitals_history" data-field="x_PTHYROID" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PTHYROID" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PTHYROID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->PTHYROID->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->PTHYROID->EditValue ?>"<?php echo $ivf_vitals_history->PTHYROID->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PTHYROID" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PTHYROID" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PTHYROID" value="<?php echo HtmlEncode($ivf_vitals_history->PTHYROID->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_PTHYROID" class="form-group ivf_vitals_history_PTHYROID">
<input type="text" data-table="ivf_vitals_history" data-field="x_PTHYROID" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PTHYROID" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PTHYROID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->PTHYROID->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->PTHYROID->EditValue ?>"<?php echo $ivf_vitals_history->PTHYROID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_PTHYROID" class="ivf_vitals_history_PTHYROID">
<span<?php echo $ivf_vitals_history->PTHYROID->viewAttributes() ?>>
<?php echo $ivf_vitals_history->PTHYROID->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PTHYROID" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PTHYROID" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PTHYROID" value="<?php echo HtmlEncode($ivf_vitals_history->PTHYROID->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PTHYROID" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PTHYROID" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PTHYROID" value="<?php echo HtmlEncode($ivf_vitals_history->PTHYROID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PTHYROID" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PTHYROID" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PTHYROID" value="<?php echo HtmlEncode($ivf_vitals_history->PTHYROID->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PTHYROID" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PTHYROID" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PTHYROID" value="<?php echo HtmlEncode($ivf_vitals_history->PTHYROID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->MTHYROID->Visible) { // MTHYROID ?>
		<td data-name="MTHYROID"<?php echo $ivf_vitals_history->MTHYROID->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_MTHYROID" class="form-group ivf_vitals_history_MTHYROID">
<input type="text" data-table="ivf_vitals_history" data-field="x_MTHYROID" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MTHYROID" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MTHYROID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->MTHYROID->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->MTHYROID->EditValue ?>"<?php echo $ivf_vitals_history->MTHYROID->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MTHYROID" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MTHYROID" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MTHYROID" value="<?php echo HtmlEncode($ivf_vitals_history->MTHYROID->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_MTHYROID" class="form-group ivf_vitals_history_MTHYROID">
<input type="text" data-table="ivf_vitals_history" data-field="x_MTHYROID" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MTHYROID" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MTHYROID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->MTHYROID->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->MTHYROID->EditValue ?>"<?php echo $ivf_vitals_history->MTHYROID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_MTHYROID" class="ivf_vitals_history_MTHYROID">
<span<?php echo $ivf_vitals_history->MTHYROID->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MTHYROID->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MTHYROID" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MTHYROID" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MTHYROID" value="<?php echo HtmlEncode($ivf_vitals_history->MTHYROID->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MTHYROID" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MTHYROID" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MTHYROID" value="<?php echo HtmlEncode($ivf_vitals_history->MTHYROID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MTHYROID" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MTHYROID" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MTHYROID" value="<?php echo HtmlEncode($ivf_vitals_history->MTHYROID->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MTHYROID" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MTHYROID" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MTHYROID" value="<?php echo HtmlEncode($ivf_vitals_history->MTHYROID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->SecSexCharacters->Visible) { // SecSexCharacters ?>
		<td data-name="SecSexCharacters"<?php echo $ivf_vitals_history->SecSexCharacters->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_SecSexCharacters" class="form-group ivf_vitals_history_SecSexCharacters">
<input type="text" data-table="ivf_vitals_history" data-field="x_SecSexCharacters" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_SecSexCharacters" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_SecSexCharacters" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->SecSexCharacters->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->SecSexCharacters->EditValue ?>"<?php echo $ivf_vitals_history->SecSexCharacters->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_SecSexCharacters" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_SecSexCharacters" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_SecSexCharacters" value="<?php echo HtmlEncode($ivf_vitals_history->SecSexCharacters->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_SecSexCharacters" class="form-group ivf_vitals_history_SecSexCharacters">
<input type="text" data-table="ivf_vitals_history" data-field="x_SecSexCharacters" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_SecSexCharacters" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_SecSexCharacters" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->SecSexCharacters->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->SecSexCharacters->EditValue ?>"<?php echo $ivf_vitals_history->SecSexCharacters->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_SecSexCharacters" class="ivf_vitals_history_SecSexCharacters">
<span<?php echo $ivf_vitals_history->SecSexCharacters->viewAttributes() ?>>
<?php echo $ivf_vitals_history->SecSexCharacters->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_SecSexCharacters" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_SecSexCharacters" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_SecSexCharacters" value="<?php echo HtmlEncode($ivf_vitals_history->SecSexCharacters->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_SecSexCharacters" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_SecSexCharacters" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_SecSexCharacters" value="<?php echo HtmlEncode($ivf_vitals_history->SecSexCharacters->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_SecSexCharacters" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_SecSexCharacters" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_SecSexCharacters" value="<?php echo HtmlEncode($ivf_vitals_history->SecSexCharacters->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_SecSexCharacters" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_SecSexCharacters" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_SecSexCharacters" value="<?php echo HtmlEncode($ivf_vitals_history->SecSexCharacters->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->PenisUM->Visible) { // PenisUM ?>
		<td data-name="PenisUM"<?php echo $ivf_vitals_history->PenisUM->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_PenisUM" class="form-group ivf_vitals_history_PenisUM">
<input type="text" data-table="ivf_vitals_history" data-field="x_PenisUM" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PenisUM" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PenisUM" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->PenisUM->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->PenisUM->EditValue ?>"<?php echo $ivf_vitals_history->PenisUM->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PenisUM" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PenisUM" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PenisUM" value="<?php echo HtmlEncode($ivf_vitals_history->PenisUM->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_PenisUM" class="form-group ivf_vitals_history_PenisUM">
<input type="text" data-table="ivf_vitals_history" data-field="x_PenisUM" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PenisUM" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PenisUM" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->PenisUM->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->PenisUM->EditValue ?>"<?php echo $ivf_vitals_history->PenisUM->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_PenisUM" class="ivf_vitals_history_PenisUM">
<span<?php echo $ivf_vitals_history->PenisUM->viewAttributes() ?>>
<?php echo $ivf_vitals_history->PenisUM->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PenisUM" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PenisUM" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PenisUM" value="<?php echo HtmlEncode($ivf_vitals_history->PenisUM->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PenisUM" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PenisUM" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PenisUM" value="<?php echo HtmlEncode($ivf_vitals_history->PenisUM->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PenisUM" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PenisUM" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PenisUM" value="<?php echo HtmlEncode($ivf_vitals_history->PenisUM->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PenisUM" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PenisUM" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PenisUM" value="<?php echo HtmlEncode($ivf_vitals_history->PenisUM->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->VAS->Visible) { // VAS ?>
		<td data-name="VAS"<?php echo $ivf_vitals_history->VAS->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_VAS" class="form-group ivf_vitals_history_VAS">
<input type="text" data-table="ivf_vitals_history" data-field="x_VAS" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_VAS" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_VAS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->VAS->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->VAS->EditValue ?>"<?php echo $ivf_vitals_history->VAS->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_VAS" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_VAS" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_VAS" value="<?php echo HtmlEncode($ivf_vitals_history->VAS->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_VAS" class="form-group ivf_vitals_history_VAS">
<input type="text" data-table="ivf_vitals_history" data-field="x_VAS" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_VAS" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_VAS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->VAS->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->VAS->EditValue ?>"<?php echo $ivf_vitals_history->VAS->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_VAS" class="ivf_vitals_history_VAS">
<span<?php echo $ivf_vitals_history->VAS->viewAttributes() ?>>
<?php echo $ivf_vitals_history->VAS->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_VAS" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_VAS" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_VAS" value="<?php echo HtmlEncode($ivf_vitals_history->VAS->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_VAS" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_VAS" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_VAS" value="<?php echo HtmlEncode($ivf_vitals_history->VAS->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_VAS" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_VAS" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_VAS" value="<?php echo HtmlEncode($ivf_vitals_history->VAS->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_VAS" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_VAS" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_VAS" value="<?php echo HtmlEncode($ivf_vitals_history->VAS->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->EPIDIDYMIS->Visible) { // EPIDIDYMIS ?>
		<td data-name="EPIDIDYMIS"<?php echo $ivf_vitals_history->EPIDIDYMIS->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_EPIDIDYMIS" class="form-group ivf_vitals_history_EPIDIDYMIS">
<input type="text" data-table="ivf_vitals_history" data-field="x_EPIDIDYMIS" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_EPIDIDYMIS" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_EPIDIDYMIS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->EPIDIDYMIS->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->EPIDIDYMIS->EditValue ?>"<?php echo $ivf_vitals_history->EPIDIDYMIS->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_EPIDIDYMIS" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_EPIDIDYMIS" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_EPIDIDYMIS" value="<?php echo HtmlEncode($ivf_vitals_history->EPIDIDYMIS->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_EPIDIDYMIS" class="form-group ivf_vitals_history_EPIDIDYMIS">
<input type="text" data-table="ivf_vitals_history" data-field="x_EPIDIDYMIS" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_EPIDIDYMIS" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_EPIDIDYMIS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->EPIDIDYMIS->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->EPIDIDYMIS->EditValue ?>"<?php echo $ivf_vitals_history->EPIDIDYMIS->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_EPIDIDYMIS" class="ivf_vitals_history_EPIDIDYMIS">
<span<?php echo $ivf_vitals_history->EPIDIDYMIS->viewAttributes() ?>>
<?php echo $ivf_vitals_history->EPIDIDYMIS->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_EPIDIDYMIS" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_EPIDIDYMIS" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_EPIDIDYMIS" value="<?php echo HtmlEncode($ivf_vitals_history->EPIDIDYMIS->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_EPIDIDYMIS" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_EPIDIDYMIS" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_EPIDIDYMIS" value="<?php echo HtmlEncode($ivf_vitals_history->EPIDIDYMIS->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_EPIDIDYMIS" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_EPIDIDYMIS" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_EPIDIDYMIS" value="<?php echo HtmlEncode($ivf_vitals_history->EPIDIDYMIS->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_EPIDIDYMIS" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_EPIDIDYMIS" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_EPIDIDYMIS" value="<?php echo HtmlEncode($ivf_vitals_history->EPIDIDYMIS->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->Varicocele->Visible) { // Varicocele ?>
		<td data-name="Varicocele"<?php echo $ivf_vitals_history->Varicocele->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Varicocele" class="form-group ivf_vitals_history_Varicocele">
<input type="text" data-table="ivf_vitals_history" data-field="x_Varicocele" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Varicocele" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Varicocele" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Varicocele->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Varicocele->EditValue ?>"<?php echo $ivf_vitals_history->Varicocele->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Varicocele" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Varicocele" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Varicocele" value="<?php echo HtmlEncode($ivf_vitals_history->Varicocele->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Varicocele" class="form-group ivf_vitals_history_Varicocele">
<input type="text" data-table="ivf_vitals_history" data-field="x_Varicocele" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Varicocele" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Varicocele" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Varicocele->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Varicocele->EditValue ?>"<?php echo $ivf_vitals_history->Varicocele->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Varicocele" class="ivf_vitals_history_Varicocele">
<span<?php echo $ivf_vitals_history->Varicocele->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Varicocele->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Varicocele" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Varicocele" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Varicocele" value="<?php echo HtmlEncode($ivf_vitals_history->Varicocele->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Varicocele" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Varicocele" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Varicocele" value="<?php echo HtmlEncode($ivf_vitals_history->Varicocele->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Varicocele" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Varicocele" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Varicocele" value="<?php echo HtmlEncode($ivf_vitals_history->Varicocele->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Varicocele" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Varicocele" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Varicocele" value="<?php echo HtmlEncode($ivf_vitals_history->Varicocele->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->FamilyHistory->Visible) { // FamilyHistory ?>
		<td data-name="FamilyHistory"<?php echo $ivf_vitals_history->FamilyHistory->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_FamilyHistory" class="form-group ivf_vitals_history_FamilyHistory">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_FamilyHistory" data-value-separator="<?php echo $ivf_vitals_history->FamilyHistory->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FamilyHistory" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FamilyHistory"<?php echo $ivf_vitals_history->FamilyHistory->editAttributes() ?>>
		<?php echo $ivf_vitals_history->FamilyHistory->selectOptionListHtml("x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FamilyHistory") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FamilyHistory" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FamilyHistory" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FamilyHistory" value="<?php echo HtmlEncode($ivf_vitals_history->FamilyHistory->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_FamilyHistory" class="form-group ivf_vitals_history_FamilyHistory">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_FamilyHistory" data-value-separator="<?php echo $ivf_vitals_history->FamilyHistory->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FamilyHistory" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FamilyHistory"<?php echo $ivf_vitals_history->FamilyHistory->editAttributes() ?>>
		<?php echo $ivf_vitals_history->FamilyHistory->selectOptionListHtml("x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FamilyHistory") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_FamilyHistory" class="ivf_vitals_history_FamilyHistory">
<span<?php echo $ivf_vitals_history->FamilyHistory->viewAttributes() ?>>
<?php echo $ivf_vitals_history->FamilyHistory->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FamilyHistory" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FamilyHistory" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FamilyHistory" value="<?php echo HtmlEncode($ivf_vitals_history->FamilyHistory->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FamilyHistory" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FamilyHistory" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FamilyHistory" value="<?php echo HtmlEncode($ivf_vitals_history->FamilyHistory->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FamilyHistory" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FamilyHistory" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FamilyHistory" value="<?php echo HtmlEncode($ivf_vitals_history->FamilyHistory->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FamilyHistory" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FamilyHistory" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FamilyHistory" value="<?php echo HtmlEncode($ivf_vitals_history->FamilyHistory->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->Addictions->Visible) { // Addictions ?>
		<td data-name="Addictions"<?php echo $ivf_vitals_history->Addictions->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Addictions" class="form-group ivf_vitals_history_Addictions">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_Addictions" data-value-separator="<?php echo $ivf_vitals_history->Addictions->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Addictions" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Addictions"<?php echo $ivf_vitals_history->Addictions->editAttributes() ?>>
		<?php echo $ivf_vitals_history->Addictions->selectOptionListHtml("x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Addictions") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Addictions" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Addictions" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Addictions" value="<?php echo HtmlEncode($ivf_vitals_history->Addictions->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Addictions" class="form-group ivf_vitals_history_Addictions">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_Addictions" data-value-separator="<?php echo $ivf_vitals_history->Addictions->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Addictions" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Addictions"<?php echo $ivf_vitals_history->Addictions->editAttributes() ?>>
		<?php echo $ivf_vitals_history->Addictions->selectOptionListHtml("x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Addictions") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Addictions" class="ivf_vitals_history_Addictions">
<span<?php echo $ivf_vitals_history->Addictions->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Addictions->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Addictions" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Addictions" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Addictions" value="<?php echo HtmlEncode($ivf_vitals_history->Addictions->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Addictions" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Addictions" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Addictions" value="<?php echo HtmlEncode($ivf_vitals_history->Addictions->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Addictions" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Addictions" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Addictions" value="<?php echo HtmlEncode($ivf_vitals_history->Addictions->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Addictions" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Addictions" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Addictions" value="<?php echo HtmlEncode($ivf_vitals_history->Addictions->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->Medical->Visible) { // Medical ?>
		<td data-name="Medical"<?php echo $ivf_vitals_history->Medical->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Medical" class="form-group ivf_vitals_history_Medical">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_Medical" data-value-separator="<?php echo $ivf_vitals_history->Medical->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Medical" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Medical"<?php echo $ivf_vitals_history->Medical->editAttributes() ?>>
		<?php echo $ivf_vitals_history->Medical->selectOptionListHtml("x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Medical") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Medical" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Medical" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Medical" value="<?php echo HtmlEncode($ivf_vitals_history->Medical->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Medical" class="form-group ivf_vitals_history_Medical">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_Medical" data-value-separator="<?php echo $ivf_vitals_history->Medical->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Medical" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Medical"<?php echo $ivf_vitals_history->Medical->editAttributes() ?>>
		<?php echo $ivf_vitals_history->Medical->selectOptionListHtml("x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Medical") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Medical" class="ivf_vitals_history_Medical">
<span<?php echo $ivf_vitals_history->Medical->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Medical->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Medical" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Medical" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Medical" value="<?php echo HtmlEncode($ivf_vitals_history->Medical->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Medical" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Medical" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Medical" value="<?php echo HtmlEncode($ivf_vitals_history->Medical->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Medical" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Medical" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Medical" value="<?php echo HtmlEncode($ivf_vitals_history->Medical->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Medical" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Medical" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Medical" value="<?php echo HtmlEncode($ivf_vitals_history->Medical->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->Surgical->Visible) { // Surgical ?>
		<td data-name="Surgical"<?php echo $ivf_vitals_history->Surgical->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Surgical" class="form-group ivf_vitals_history_Surgical">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_Surgical" data-value-separator="<?php echo $ivf_vitals_history->Surgical->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Surgical" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Surgical"<?php echo $ivf_vitals_history->Surgical->editAttributes() ?>>
		<?php echo $ivf_vitals_history->Surgical->selectOptionListHtml("x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Surgical") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Surgical" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Surgical" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Surgical" value="<?php echo HtmlEncode($ivf_vitals_history->Surgical->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Surgical" class="form-group ivf_vitals_history_Surgical">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_Surgical" data-value-separator="<?php echo $ivf_vitals_history->Surgical->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Surgical" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Surgical"<?php echo $ivf_vitals_history->Surgical->editAttributes() ?>>
		<?php echo $ivf_vitals_history->Surgical->selectOptionListHtml("x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Surgical") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_Surgical" class="ivf_vitals_history_Surgical">
<span<?php echo $ivf_vitals_history->Surgical->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Surgical->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Surgical" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Surgical" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Surgical" value="<?php echo HtmlEncode($ivf_vitals_history->Surgical->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Surgical" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Surgical" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Surgical" value="<?php echo HtmlEncode($ivf_vitals_history->Surgical->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Surgical" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Surgical" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Surgical" value="<?php echo HtmlEncode($ivf_vitals_history->Surgical->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Surgical" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Surgical" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Surgical" value="<?php echo HtmlEncode($ivf_vitals_history->Surgical->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->CoitalHistory->Visible) { // CoitalHistory ?>
		<td data-name="CoitalHistory"<?php echo $ivf_vitals_history->CoitalHistory->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_CoitalHistory" class="form-group ivf_vitals_history_CoitalHistory">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_CoitalHistory" data-value-separator="<?php echo $ivf_vitals_history->CoitalHistory->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_CoitalHistory" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_CoitalHistory"<?php echo $ivf_vitals_history->CoitalHistory->editAttributes() ?>>
		<?php echo $ivf_vitals_history->CoitalHistory->selectOptionListHtml("x<?php echo $ivf_vitals_history_grid->RowIndex ?>_CoitalHistory") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_CoitalHistory" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_CoitalHistory" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_CoitalHistory" value="<?php echo HtmlEncode($ivf_vitals_history->CoitalHistory->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_CoitalHistory" class="form-group ivf_vitals_history_CoitalHistory">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_CoitalHistory" data-value-separator="<?php echo $ivf_vitals_history->CoitalHistory->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_CoitalHistory" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_CoitalHistory"<?php echo $ivf_vitals_history->CoitalHistory->editAttributes() ?>>
		<?php echo $ivf_vitals_history->CoitalHistory->selectOptionListHtml("x<?php echo $ivf_vitals_history_grid->RowIndex ?>_CoitalHistory") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_CoitalHistory" class="ivf_vitals_history_CoitalHistory">
<span<?php echo $ivf_vitals_history->CoitalHistory->viewAttributes() ?>>
<?php echo $ivf_vitals_history->CoitalHistory->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_CoitalHistory" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_CoitalHistory" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_CoitalHistory" value="<?php echo HtmlEncode($ivf_vitals_history->CoitalHistory->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_CoitalHistory" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_CoitalHistory" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_CoitalHistory" value="<?php echo HtmlEncode($ivf_vitals_history->CoitalHistory->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_CoitalHistory" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_CoitalHistory" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_CoitalHistory" value="<?php echo HtmlEncode($ivf_vitals_history->CoitalHistory->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_CoitalHistory" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_CoitalHistory" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_CoitalHistory" value="<?php echo HtmlEncode($ivf_vitals_history->CoitalHistory->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->MariedFor->Visible) { // MariedFor ?>
		<td data-name="MariedFor"<?php echo $ivf_vitals_history->MariedFor->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_MariedFor" class="form-group ivf_vitals_history_MariedFor">
<input type="text" data-table="ivf_vitals_history" data-field="x_MariedFor" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MariedFor" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MariedFor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->MariedFor->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->MariedFor->EditValue ?>"<?php echo $ivf_vitals_history->MariedFor->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MariedFor" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MariedFor" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MariedFor" value="<?php echo HtmlEncode($ivf_vitals_history->MariedFor->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_MariedFor" class="form-group ivf_vitals_history_MariedFor">
<input type="text" data-table="ivf_vitals_history" data-field="x_MariedFor" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MariedFor" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MariedFor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->MariedFor->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->MariedFor->EditValue ?>"<?php echo $ivf_vitals_history->MariedFor->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_MariedFor" class="ivf_vitals_history_MariedFor">
<span<?php echo $ivf_vitals_history->MariedFor->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MariedFor->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MariedFor" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MariedFor" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MariedFor" value="<?php echo HtmlEncode($ivf_vitals_history->MariedFor->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MariedFor" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MariedFor" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MariedFor" value="<?php echo HtmlEncode($ivf_vitals_history->MariedFor->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MariedFor" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MariedFor" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MariedFor" value="<?php echo HtmlEncode($ivf_vitals_history->MariedFor->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MariedFor" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MariedFor" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MariedFor" value="<?php echo HtmlEncode($ivf_vitals_history->MariedFor->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->CMNCM->Visible) { // CMNCM ?>
		<td data-name="CMNCM"<?php echo $ivf_vitals_history->CMNCM->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_CMNCM" class="form-group ivf_vitals_history_CMNCM">
<input type="text" data-table="ivf_vitals_history" data-field="x_CMNCM" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_CMNCM" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_CMNCM" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->CMNCM->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->CMNCM->EditValue ?>"<?php echo $ivf_vitals_history->CMNCM->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_CMNCM" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_CMNCM" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_CMNCM" value="<?php echo HtmlEncode($ivf_vitals_history->CMNCM->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_CMNCM" class="form-group ivf_vitals_history_CMNCM">
<input type="text" data-table="ivf_vitals_history" data-field="x_CMNCM" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_CMNCM" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_CMNCM" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->CMNCM->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->CMNCM->EditValue ?>"<?php echo $ivf_vitals_history->CMNCM->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_CMNCM" class="ivf_vitals_history_CMNCM">
<span<?php echo $ivf_vitals_history->CMNCM->viewAttributes() ?>>
<?php echo $ivf_vitals_history->CMNCM->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_CMNCM" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_CMNCM" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_CMNCM" value="<?php echo HtmlEncode($ivf_vitals_history->CMNCM->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_CMNCM" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_CMNCM" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_CMNCM" value="<?php echo HtmlEncode($ivf_vitals_history->CMNCM->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_CMNCM" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_CMNCM" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_CMNCM" value="<?php echo HtmlEncode($ivf_vitals_history->CMNCM->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_CMNCM" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_CMNCM" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_CMNCM" value="<?php echo HtmlEncode($ivf_vitals_history->CMNCM->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo"<?php echo $ivf_vitals_history->TidNo->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($ivf_vitals_history->TidNo->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_TidNo" class="form-group ivf_vitals_history_TidNo">
<span<?php echo $ivf_vitals_history->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->TidNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_TidNo" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_vitals_history->TidNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_TidNo" class="form-group ivf_vitals_history_TidNo">
<input type="text" data-table="ivf_vitals_history" data-field="x_TidNo" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_vitals_history->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->TidNo->EditValue ?>"<?php echo $ivf_vitals_history->TidNo->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_TidNo" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_TidNo" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_vitals_history->TidNo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($ivf_vitals_history->TidNo->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_TidNo" class="form-group ivf_vitals_history_TidNo">
<span<?php echo $ivf_vitals_history->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->TidNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_TidNo" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_vitals_history->TidNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_TidNo" class="form-group ivf_vitals_history_TidNo">
<input type="text" data-table="ivf_vitals_history" data-field="x_TidNo" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_vitals_history->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->TidNo->EditValue ?>"<?php echo $ivf_vitals_history->TidNo->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_TidNo" class="ivf_vitals_history_TidNo">
<span<?php echo $ivf_vitals_history->TidNo->viewAttributes() ?>>
<?php echo $ivf_vitals_history->TidNo->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_TidNo" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_vitals_history->TidNo->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_TidNo" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_TidNo" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_vitals_history->TidNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_TidNo" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_TidNo" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_vitals_history->TidNo->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_TidNo" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_TidNo" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_vitals_history->TidNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->pFamilyHistory->Visible) { // pFamilyHistory ?>
		<td data-name="pFamilyHistory"<?php echo $ivf_vitals_history->pFamilyHistory->cellAttributes() ?>>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_pFamilyHistory" class="form-group ivf_vitals_history_pFamilyHistory">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_pFamilyHistory" data-value-separator="<?php echo $ivf_vitals_history->pFamilyHistory->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_pFamilyHistory" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_pFamilyHistory"<?php echo $ivf_vitals_history->pFamilyHistory->editAttributes() ?>>
		<?php echo $ivf_vitals_history->pFamilyHistory->selectOptionListHtml("x<?php echo $ivf_vitals_history_grid->RowIndex ?>_pFamilyHistory") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_pFamilyHistory" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_pFamilyHistory" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_pFamilyHistory" value="<?php echo HtmlEncode($ivf_vitals_history->pFamilyHistory->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_pFamilyHistory" class="form-group ivf_vitals_history_pFamilyHistory">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_pFamilyHistory" data-value-separator="<?php echo $ivf_vitals_history->pFamilyHistory->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_pFamilyHistory" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_pFamilyHistory"<?php echo $ivf_vitals_history->pFamilyHistory->editAttributes() ?>>
		<?php echo $ivf_vitals_history->pFamilyHistory->selectOptionListHtml("x<?php echo $ivf_vitals_history_grid->RowIndex ?>_pFamilyHistory") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitals_history_grid->RowCnt ?>_ivf_vitals_history_pFamilyHistory" class="ivf_vitals_history_pFamilyHistory">
<span<?php echo $ivf_vitals_history->pFamilyHistory->viewAttributes() ?>>
<?php echo $ivf_vitals_history->pFamilyHistory->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_pFamilyHistory" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_pFamilyHistory" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_pFamilyHistory" value="<?php echo HtmlEncode($ivf_vitals_history->pFamilyHistory->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_pFamilyHistory" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_pFamilyHistory" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_pFamilyHistory" value="<?php echo HtmlEncode($ivf_vitals_history->pFamilyHistory->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_pFamilyHistory" name="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_pFamilyHistory" id="fivf_vitals_historygrid$x<?php echo $ivf_vitals_history_grid->RowIndex ?>_pFamilyHistory" value="<?php echo HtmlEncode($ivf_vitals_history->pFamilyHistory->FormValue) ?>">
<input type="hidden" data-table="ivf_vitals_history" data-field="x_pFamilyHistory" name="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_pFamilyHistory" id="fivf_vitals_historygrid$o<?php echo $ivf_vitals_history_grid->RowIndex ?>_pFamilyHistory" value="<?php echo HtmlEncode($ivf_vitals_history->pFamilyHistory->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_vitals_history_grid->ListOptions->render("body", "right", $ivf_vitals_history_grid->RowCnt);
?>
	</tr>
<?php if ($ivf_vitals_history->RowType == ROWTYPE_ADD || $ivf_vitals_history->RowType == ROWTYPE_EDIT) { ?>
<script>
fivf_vitals_historygrid.updateLists(<?php echo $ivf_vitals_history_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$ivf_vitals_history->isGridAdd() || $ivf_vitals_history->CurrentMode == "copy")
		if (!$ivf_vitals_history_grid->Recordset->EOF)
			$ivf_vitals_history_grid->Recordset->moveNext();
}
?>
<?php
	if ($ivf_vitals_history->CurrentMode == "add" || $ivf_vitals_history->CurrentMode == "copy" || $ivf_vitals_history->CurrentMode == "edit") {
		$ivf_vitals_history_grid->RowIndex = '$rowindex$';
		$ivf_vitals_history_grid->loadRowValues();

		// Set row properties
		$ivf_vitals_history->resetAttributes();
		$ivf_vitals_history->RowAttrs = array_merge($ivf_vitals_history->RowAttrs, array('data-rowindex'=>$ivf_vitals_history_grid->RowIndex, 'id'=>'r0_ivf_vitals_history', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($ivf_vitals_history->RowAttrs["class"], "ew-template");
		$ivf_vitals_history->RowType = ROWTYPE_ADD;

		// Render row
		$ivf_vitals_history_grid->renderRow();

		// Render list options
		$ivf_vitals_history_grid->renderListOptions();
		$ivf_vitals_history_grid->StartRowCnt = 0;
?>
	<tr<?php echo $ivf_vitals_history->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_vitals_history_grid->ListOptions->render("body", "left", $ivf_vitals_history_grid->RowIndex);
?>
	<?php if ($ivf_vitals_history->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_id" class="form-group ivf_vitals_history_id">
<span<?php echo $ivf_vitals_history->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_id" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_id" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_vitals_history->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_id" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_id" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_vitals_history->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<?php if ($ivf_vitals_history->RIDNO->getSessionValue() <> "") { ?>
<span id="el$rowindex$_ivf_vitals_history_RIDNO" class="form-group ivf_vitals_history_RIDNO">
<span<?php echo $ivf_vitals_history->RIDNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->RIDNO->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_RIDNO" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_vitals_history->RIDNO->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_RIDNO" class="form-group ivf_vitals_history_RIDNO">
<input type="text" data-table="ivf_vitals_history" data-field="x_RIDNO" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_RIDNO" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_RIDNO" size="30" placeholder="<?php echo HtmlEncode($ivf_vitals_history->RIDNO->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->RIDNO->EditValue ?>"<?php echo $ivf_vitals_history->RIDNO->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_RIDNO" class="form-group ivf_vitals_history_RIDNO">
<span<?php echo $ivf_vitals_history->RIDNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->RIDNO->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_RIDNO" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_RIDNO" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_vitals_history->RIDNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_RIDNO" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_RIDNO" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_vitals_history->RIDNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->Name->Visible) { // Name ?>
		<td data-name="Name">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<?php if ($ivf_vitals_history->Name->getSessionValue() <> "") { ?>
<span id="el$rowindex$_ivf_vitals_history_Name" class="form-group ivf_vitals_history_Name">
<span<?php echo $ivf_vitals_history->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->Name->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Name" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_vitals_history->Name->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_Name" class="form-group ivf_vitals_history_Name">
<input type="text" data-table="ivf_vitals_history" data-field="x_Name" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Name" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Name->EditValue ?>"<?php echo $ivf_vitals_history->Name->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_Name" class="form-group ivf_vitals_history_Name">
<span<?php echo $ivf_vitals_history->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->Name->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Name" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Name" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_vitals_history->Name->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Name" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Name" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_vitals_history->Name->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->Age->Visible) { // Age ?>
		<td data-name="Age">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_Age" class="form-group ivf_vitals_history_Age">
<input type="text" data-table="ivf_vitals_history" data-field="x_Age" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Age" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Age->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Age->EditValue ?>"<?php echo $ivf_vitals_history->Age->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_Age" class="form-group ivf_vitals_history_Age">
<span<?php echo $ivf_vitals_history->Age->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->Age->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Age" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Age" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($ivf_vitals_history->Age->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Age" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Age" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($ivf_vitals_history->Age->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->SEX->Visible) { // SEX ?>
		<td data-name="SEX">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_SEX" class="form-group ivf_vitals_history_SEX">
<input type="text" data-table="ivf_vitals_history" data-field="x_SEX" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_SEX" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_SEX" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->SEX->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->SEX->EditValue ?>"<?php echo $ivf_vitals_history->SEX->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_SEX" class="form-group ivf_vitals_history_SEX">
<span<?php echo $ivf_vitals_history->SEX->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->SEX->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_SEX" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_SEX" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_SEX" value="<?php echo HtmlEncode($ivf_vitals_history->SEX->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_SEX" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_SEX" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_SEX" value="<?php echo HtmlEncode($ivf_vitals_history->SEX->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->Religion->Visible) { // Religion ?>
		<td data-name="Religion">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_Religion" class="form-group ivf_vitals_history_Religion">
<input type="text" data-table="ivf_vitals_history" data-field="x_Religion" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Religion" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Religion" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Religion->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Religion->EditValue ?>"<?php echo $ivf_vitals_history->Religion->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_Religion" class="form-group ivf_vitals_history_Religion">
<span<?php echo $ivf_vitals_history->Religion->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->Religion->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Religion" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Religion" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Religion" value="<?php echo HtmlEncode($ivf_vitals_history->Religion->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Religion" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Religion" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Religion" value="<?php echo HtmlEncode($ivf_vitals_history->Religion->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->Address->Visible) { // Address ?>
		<td data-name="Address">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_Address" class="form-group ivf_vitals_history_Address">
<input type="text" data-table="ivf_vitals_history" data-field="x_Address" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Address" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Address" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Address->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Address->EditValue ?>"<?php echo $ivf_vitals_history->Address->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_Address" class="form-group ivf_vitals_history_Address">
<span<?php echo $ivf_vitals_history->Address->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->Address->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Address" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Address" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Address" value="<?php echo HtmlEncode($ivf_vitals_history->Address->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Address" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Address" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Address" value="<?php echo HtmlEncode($ivf_vitals_history->Address->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->IdentificationMark->Visible) { // IdentificationMark ?>
		<td data-name="IdentificationMark">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_IdentificationMark" class="form-group ivf_vitals_history_IdentificationMark">
<input type="text" data-table="ivf_vitals_history" data-field="x_IdentificationMark" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_IdentificationMark" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_IdentificationMark" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->IdentificationMark->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->IdentificationMark->EditValue ?>"<?php echo $ivf_vitals_history->IdentificationMark->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_IdentificationMark" class="form-group ivf_vitals_history_IdentificationMark">
<span<?php echo $ivf_vitals_history->IdentificationMark->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->IdentificationMark->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_IdentificationMark" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_IdentificationMark" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_IdentificationMark" value="<?php echo HtmlEncode($ivf_vitals_history->IdentificationMark->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_IdentificationMark" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_IdentificationMark" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_IdentificationMark" value="<?php echo HtmlEncode($ivf_vitals_history->IdentificationMark->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->DoublewitnessName1->Visible) { // DoublewitnessName1 ?>
		<td data-name="DoublewitnessName1">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_DoublewitnessName1" class="form-group ivf_vitals_history_DoublewitnessName1">
<textarea data-table="ivf_vitals_history" data-field="x_DoublewitnessName1" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_DoublewitnessName1" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_DoublewitnessName1" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history->DoublewitnessName1->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history->DoublewitnessName1->editAttributes() ?>><?php echo $ivf_vitals_history->DoublewitnessName1->EditValue ?></textarea>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_DoublewitnessName1" class="form-group ivf_vitals_history_DoublewitnessName1">
<span<?php echo $ivf_vitals_history->DoublewitnessName1->viewAttributes() ?>>
<?php echo $ivf_vitals_history->DoublewitnessName1->ViewValue ?></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_DoublewitnessName1" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_DoublewitnessName1" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_DoublewitnessName1" value="<?php echo HtmlEncode($ivf_vitals_history->DoublewitnessName1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_DoublewitnessName1" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_DoublewitnessName1" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_DoublewitnessName1" value="<?php echo HtmlEncode($ivf_vitals_history->DoublewitnessName1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->DoublewitnessName2->Visible) { // DoublewitnessName2 ?>
		<td data-name="DoublewitnessName2">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_DoublewitnessName2" class="form-group ivf_vitals_history_DoublewitnessName2">
<textarea data-table="ivf_vitals_history" data-field="x_DoublewitnessName2" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_DoublewitnessName2" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_DoublewitnessName2" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history->DoublewitnessName2->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history->DoublewitnessName2->editAttributes() ?>><?php echo $ivf_vitals_history->DoublewitnessName2->EditValue ?></textarea>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_DoublewitnessName2" class="form-group ivf_vitals_history_DoublewitnessName2">
<span<?php echo $ivf_vitals_history->DoublewitnessName2->viewAttributes() ?>>
<?php echo $ivf_vitals_history->DoublewitnessName2->ViewValue ?></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_DoublewitnessName2" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_DoublewitnessName2" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_DoublewitnessName2" value="<?php echo HtmlEncode($ivf_vitals_history->DoublewitnessName2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_DoublewitnessName2" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_DoublewitnessName2" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_DoublewitnessName2" value="<?php echo HtmlEncode($ivf_vitals_history->DoublewitnessName2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
		<td data-name="Chiefcomplaints">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_Chiefcomplaints" class="form-group ivf_vitals_history_Chiefcomplaints">
<textarea data-table="ivf_vitals_history" data-field="x_Chiefcomplaints" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Chiefcomplaints" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Chiefcomplaints" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Chiefcomplaints->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history->Chiefcomplaints->editAttributes() ?>><?php echo $ivf_vitals_history->Chiefcomplaints->EditValue ?></textarea>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_Chiefcomplaints" class="form-group ivf_vitals_history_Chiefcomplaints">
<span<?php echo $ivf_vitals_history->Chiefcomplaints->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Chiefcomplaints->ViewValue ?></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Chiefcomplaints" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Chiefcomplaints" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Chiefcomplaints" value="<?php echo HtmlEncode($ivf_vitals_history->Chiefcomplaints->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Chiefcomplaints" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Chiefcomplaints" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Chiefcomplaints" value="<?php echo HtmlEncode($ivf_vitals_history->Chiefcomplaints->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->MenstrualHistory->Visible) { // MenstrualHistory ?>
		<td data-name="MenstrualHistory">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_MenstrualHistory" class="form-group ivf_vitals_history_MenstrualHistory">
<?php AppendClass($ivf_vitals_history->MenstrualHistory->EditAttrs["class"], "editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_MenstrualHistory" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MenstrualHistory" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MenstrualHistory" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history->MenstrualHistory->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history->MenstrualHistory->editAttributes() ?>><?php echo $ivf_vitals_history->MenstrualHistory->EditValue ?></textarea>
<script>
ew.createEditor("fivf_vitals_historygrid", "x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MenstrualHistory", 0, 0, <?php echo ($ivf_vitals_history->MenstrualHistory->ReadOnly || FALSE) ? "true" : "false" ?>);
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_MenstrualHistory" class="form-group ivf_vitals_history_MenstrualHistory">
<span<?php echo $ivf_vitals_history->MenstrualHistory->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MenstrualHistory->ViewValue ?></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MenstrualHistory" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MenstrualHistory" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MenstrualHistory" value="<?php echo HtmlEncode($ivf_vitals_history->MenstrualHistory->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MenstrualHistory" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MenstrualHistory" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MenstrualHistory" value="<?php echo HtmlEncode($ivf_vitals_history->MenstrualHistory->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->ObstetricHistory->Visible) { // ObstetricHistory ?>
		<td data-name="ObstetricHistory">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_ObstetricHistory" class="form-group ivf_vitals_history_ObstetricHistory">
<?php AppendClass($ivf_vitals_history->ObstetricHistory->EditAttrs["class"], "editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_ObstetricHistory" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_ObstetricHistory" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_ObstetricHistory" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history->ObstetricHistory->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history->ObstetricHistory->editAttributes() ?>><?php echo $ivf_vitals_history->ObstetricHistory->EditValue ?></textarea>
<script>
ew.createEditor("fivf_vitals_historygrid", "x<?php echo $ivf_vitals_history_grid->RowIndex ?>_ObstetricHistory", 0, 0, <?php echo ($ivf_vitals_history->ObstetricHistory->ReadOnly || FALSE) ? "true" : "false" ?>);
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_ObstetricHistory" class="form-group ivf_vitals_history_ObstetricHistory">
<span<?php echo $ivf_vitals_history->ObstetricHistory->viewAttributes() ?>>
<?php echo $ivf_vitals_history->ObstetricHistory->ViewValue ?></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_ObstetricHistory" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_ObstetricHistory" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_ObstetricHistory" value="<?php echo HtmlEncode($ivf_vitals_history->ObstetricHistory->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_ObstetricHistory" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_ObstetricHistory" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_ObstetricHistory" value="<?php echo HtmlEncode($ivf_vitals_history->ObstetricHistory->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->MedicalHistory->Visible) { // MedicalHistory ?>
		<td data-name="MedicalHistory">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_MedicalHistory" class="form-group ivf_vitals_history_MedicalHistory">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_MedicalHistory" data-value-separator="<?php echo $ivf_vitals_history->MedicalHistory->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MedicalHistory" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MedicalHistory"<?php echo $ivf_vitals_history->MedicalHistory->editAttributes() ?>>
		<?php echo $ivf_vitals_history->MedicalHistory->selectOptionListHtml("x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MedicalHistory") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_MedicalHistory" class="form-group ivf_vitals_history_MedicalHistory">
<span<?php echo $ivf_vitals_history->MedicalHistory->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->MedicalHistory->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MedicalHistory" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MedicalHistory" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MedicalHistory" value="<?php echo HtmlEncode($ivf_vitals_history->MedicalHistory->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MedicalHistory" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MedicalHistory" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MedicalHistory" value="<?php echo HtmlEncode($ivf_vitals_history->MedicalHistory->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->SurgicalHistory->Visible) { // SurgicalHistory ?>
		<td data-name="SurgicalHistory">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_SurgicalHistory" class="form-group ivf_vitals_history_SurgicalHistory">
<input type="text" data-table="ivf_vitals_history" data-field="x_SurgicalHistory" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_SurgicalHistory" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_SurgicalHistory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->SurgicalHistory->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->SurgicalHistory->EditValue ?>"<?php echo $ivf_vitals_history->SurgicalHistory->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_SurgicalHistory" class="form-group ivf_vitals_history_SurgicalHistory">
<span<?php echo $ivf_vitals_history->SurgicalHistory->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->SurgicalHistory->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_SurgicalHistory" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_SurgicalHistory" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_SurgicalHistory" value="<?php echo HtmlEncode($ivf_vitals_history->SurgicalHistory->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_SurgicalHistory" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_SurgicalHistory" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_SurgicalHistory" value="<?php echo HtmlEncode($ivf_vitals_history->SurgicalHistory->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->Generalexaminationpallor->Visible) { // Generalexaminationpallor ?>
		<td data-name="Generalexaminationpallor">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_Generalexaminationpallor" class="form-group ivf_vitals_history_Generalexaminationpallor">
<input type="text" data-table="ivf_vitals_history" data-field="x_Generalexaminationpallor" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Generalexaminationpallor" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Generalexaminationpallor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Generalexaminationpallor->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Generalexaminationpallor->EditValue ?>"<?php echo $ivf_vitals_history->Generalexaminationpallor->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_Generalexaminationpallor" class="form-group ivf_vitals_history_Generalexaminationpallor">
<span<?php echo $ivf_vitals_history->Generalexaminationpallor->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->Generalexaminationpallor->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Generalexaminationpallor" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Generalexaminationpallor" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Generalexaminationpallor" value="<?php echo HtmlEncode($ivf_vitals_history->Generalexaminationpallor->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Generalexaminationpallor" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Generalexaminationpallor" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Generalexaminationpallor" value="<?php echo HtmlEncode($ivf_vitals_history->Generalexaminationpallor->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->PR->Visible) { // PR ?>
		<td data-name="PR">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_PR" class="form-group ivf_vitals_history_PR">
<input type="text" data-table="ivf_vitals_history" data-field="x_PR" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PR" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PR" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->PR->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->PR->EditValue ?>"<?php echo $ivf_vitals_history->PR->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_PR" class="form-group ivf_vitals_history_PR">
<span<?php echo $ivf_vitals_history->PR->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->PR->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PR" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PR" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PR" value="<?php echo HtmlEncode($ivf_vitals_history->PR->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PR" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PR" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PR" value="<?php echo HtmlEncode($ivf_vitals_history->PR->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->CVS->Visible) { // CVS ?>
		<td data-name="CVS">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_CVS" class="form-group ivf_vitals_history_CVS">
<input type="text" data-table="ivf_vitals_history" data-field="x_CVS" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_CVS" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_CVS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->CVS->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->CVS->EditValue ?>"<?php echo $ivf_vitals_history->CVS->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_CVS" class="form-group ivf_vitals_history_CVS">
<span<?php echo $ivf_vitals_history->CVS->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->CVS->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_CVS" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_CVS" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_CVS" value="<?php echo HtmlEncode($ivf_vitals_history->CVS->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_CVS" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_CVS" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_CVS" value="<?php echo HtmlEncode($ivf_vitals_history->CVS->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->PA->Visible) { // PA ?>
		<td data-name="PA">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_PA" class="form-group ivf_vitals_history_PA">
<input type="text" data-table="ivf_vitals_history" data-field="x_PA" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PA" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PA" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->PA->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->PA->EditValue ?>"<?php echo $ivf_vitals_history->PA->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_PA" class="form-group ivf_vitals_history_PA">
<span<?php echo $ivf_vitals_history->PA->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->PA->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PA" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PA" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PA" value="<?php echo HtmlEncode($ivf_vitals_history->PA->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PA" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PA" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PA" value="<?php echo HtmlEncode($ivf_vitals_history->PA->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
		<td data-name="PROVISIONALDIAGNOSIS">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_PROVISIONALDIAGNOSIS" class="form-group ivf_vitals_history_PROVISIONALDIAGNOSIS">
<input type="text" data-table="ivf_vitals_history" data-field="x_PROVISIONALDIAGNOSIS" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PROVISIONALDIAGNOSIS" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PROVISIONALDIAGNOSIS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->PROVISIONALDIAGNOSIS->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->PROVISIONALDIAGNOSIS->EditValue ?>"<?php echo $ivf_vitals_history->PROVISIONALDIAGNOSIS->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_PROVISIONALDIAGNOSIS" class="form-group ivf_vitals_history_PROVISIONALDIAGNOSIS">
<span<?php echo $ivf_vitals_history->PROVISIONALDIAGNOSIS->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->PROVISIONALDIAGNOSIS->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PROVISIONALDIAGNOSIS" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PROVISIONALDIAGNOSIS" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PROVISIONALDIAGNOSIS" value="<?php echo HtmlEncode($ivf_vitals_history->PROVISIONALDIAGNOSIS->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PROVISIONALDIAGNOSIS" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PROVISIONALDIAGNOSIS" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PROVISIONALDIAGNOSIS" value="<?php echo HtmlEncode($ivf_vitals_history->PROVISIONALDIAGNOSIS->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->Investigations->Visible) { // Investigations ?>
		<td data-name="Investigations">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_Investigations" class="form-group ivf_vitals_history_Investigations">
<input type="text" data-table="ivf_vitals_history" data-field="x_Investigations" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Investigations" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Investigations" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Investigations->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Investigations->EditValue ?>"<?php echo $ivf_vitals_history->Investigations->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_Investigations" class="form-group ivf_vitals_history_Investigations">
<span<?php echo $ivf_vitals_history->Investigations->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->Investigations->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Investigations" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Investigations" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Investigations" value="<?php echo HtmlEncode($ivf_vitals_history->Investigations->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Investigations" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Investigations" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Investigations" value="<?php echo HtmlEncode($ivf_vitals_history->Investigations->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->Fheight->Visible) { // Fheight ?>
		<td data-name="Fheight">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_Fheight" class="form-group ivf_vitals_history_Fheight">
<input type="text" data-table="ivf_vitals_history" data-field="x_Fheight" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fheight" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fheight" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Fheight->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Fheight->EditValue ?>"<?php echo $ivf_vitals_history->Fheight->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_Fheight" class="form-group ivf_vitals_history_Fheight">
<span<?php echo $ivf_vitals_history->Fheight->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->Fheight->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Fheight" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fheight" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fheight" value="<?php echo HtmlEncode($ivf_vitals_history->Fheight->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Fheight" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fheight" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fheight" value="<?php echo HtmlEncode($ivf_vitals_history->Fheight->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->Fweight->Visible) { // Fweight ?>
		<td data-name="Fweight">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_Fweight" class="form-group ivf_vitals_history_Fweight">
<input type="text" data-table="ivf_vitals_history" data-field="x_Fweight" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fweight" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fweight" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Fweight->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Fweight->EditValue ?>"<?php echo $ivf_vitals_history->Fweight->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_Fweight" class="form-group ivf_vitals_history_Fweight">
<span<?php echo $ivf_vitals_history->Fweight->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->Fweight->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Fweight" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fweight" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fweight" value="<?php echo HtmlEncode($ivf_vitals_history->Fweight->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Fweight" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fweight" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fweight" value="<?php echo HtmlEncode($ivf_vitals_history->Fweight->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->FBMI->Visible) { // FBMI ?>
		<td data-name="FBMI">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_FBMI" class="form-group ivf_vitals_history_FBMI">
<input type="text" data-table="ivf_vitals_history" data-field="x_FBMI" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBMI" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBMI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->FBMI->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->FBMI->EditValue ?>"<?php echo $ivf_vitals_history->FBMI->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_FBMI" class="form-group ivf_vitals_history_FBMI">
<span<?php echo $ivf_vitals_history->FBMI->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->FBMI->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FBMI" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBMI" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBMI" value="<?php echo HtmlEncode($ivf_vitals_history->FBMI->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FBMI" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBMI" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBMI" value="<?php echo HtmlEncode($ivf_vitals_history->FBMI->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->FBloodgroup->Visible) { // FBloodgroup ?>
		<td data-name="FBloodgroup">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_FBloodgroup" class="form-group ivf_vitals_history_FBloodgroup">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_FBloodgroup" data-value-separator="<?php echo $ivf_vitals_history->FBloodgroup->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBloodgroup" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBloodgroup"<?php echo $ivf_vitals_history->FBloodgroup->editAttributes() ?>>
		<?php echo $ivf_vitals_history->FBloodgroup->selectOptionListHtml("x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBloodgroup") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_bloodgroup") && !$ivf_vitals_history->FBloodgroup->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBloodgroup" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_vitals_history->FBloodgroup->caption() ?>" data-title="<?php echo $ivf_vitals_history->FBloodgroup->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBloodgroup',url:'mas_bloodgroupaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $ivf_vitals_history->FBloodgroup->Lookup->getParamTag("p_x" . $ivf_vitals_history_grid->RowIndex . "_FBloodgroup") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_FBloodgroup" class="form-group ivf_vitals_history_FBloodgroup">
<span<?php echo $ivf_vitals_history->FBloodgroup->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->FBloodgroup->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FBloodgroup" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBloodgroup" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBloodgroup" value="<?php echo HtmlEncode($ivf_vitals_history->FBloodgroup->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FBloodgroup" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBloodgroup" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBloodgroup" value="<?php echo HtmlEncode($ivf_vitals_history->FBloodgroup->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->Mheight->Visible) { // Mheight ?>
		<td data-name="Mheight">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_Mheight" class="form-group ivf_vitals_history_Mheight">
<input type="text" data-table="ivf_vitals_history" data-field="x_Mheight" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mheight" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mheight" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Mheight->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Mheight->EditValue ?>"<?php echo $ivf_vitals_history->Mheight->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_Mheight" class="form-group ivf_vitals_history_Mheight">
<span<?php echo $ivf_vitals_history->Mheight->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->Mheight->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Mheight" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mheight" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mheight" value="<?php echo HtmlEncode($ivf_vitals_history->Mheight->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Mheight" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mheight" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mheight" value="<?php echo HtmlEncode($ivf_vitals_history->Mheight->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->Mweight->Visible) { // Mweight ?>
		<td data-name="Mweight">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_Mweight" class="form-group ivf_vitals_history_Mweight">
<input type="text" data-table="ivf_vitals_history" data-field="x_Mweight" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mweight" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mweight" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Mweight->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Mweight->EditValue ?>"<?php echo $ivf_vitals_history->Mweight->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_Mweight" class="form-group ivf_vitals_history_Mweight">
<span<?php echo $ivf_vitals_history->Mweight->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->Mweight->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Mweight" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mweight" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mweight" value="<?php echo HtmlEncode($ivf_vitals_history->Mweight->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Mweight" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mweight" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mweight" value="<?php echo HtmlEncode($ivf_vitals_history->Mweight->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->MBMI->Visible) { // MBMI ?>
		<td data-name="MBMI">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_MBMI" class="form-group ivf_vitals_history_MBMI">
<input type="text" data-table="ivf_vitals_history" data-field="x_MBMI" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBMI" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBMI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->MBMI->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->MBMI->EditValue ?>"<?php echo $ivf_vitals_history->MBMI->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_MBMI" class="form-group ivf_vitals_history_MBMI">
<span<?php echo $ivf_vitals_history->MBMI->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->MBMI->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MBMI" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBMI" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBMI" value="<?php echo HtmlEncode($ivf_vitals_history->MBMI->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MBMI" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBMI" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBMI" value="<?php echo HtmlEncode($ivf_vitals_history->MBMI->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->MBloodgroup->Visible) { // MBloodgroup ?>
		<td data-name="MBloodgroup">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_MBloodgroup" class="form-group ivf_vitals_history_MBloodgroup">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_MBloodgroup" data-value-separator="<?php echo $ivf_vitals_history->MBloodgroup->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBloodgroup" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBloodgroup"<?php echo $ivf_vitals_history->MBloodgroup->editAttributes() ?>>
		<?php echo $ivf_vitals_history->MBloodgroup->selectOptionListHtml("x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBloodgroup") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_bloodgroup") && !$ivf_vitals_history->MBloodgroup->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBloodgroup" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_vitals_history->MBloodgroup->caption() ?>" data-title="<?php echo $ivf_vitals_history->MBloodgroup->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBloodgroup',url:'mas_bloodgroupaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $ivf_vitals_history->MBloodgroup->Lookup->getParamTag("p_x" . $ivf_vitals_history_grid->RowIndex . "_MBloodgroup") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_MBloodgroup" class="form-group ivf_vitals_history_MBloodgroup">
<span<?php echo $ivf_vitals_history->MBloodgroup->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->MBloodgroup->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MBloodgroup" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBloodgroup" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBloodgroup" value="<?php echo HtmlEncode($ivf_vitals_history->MBloodgroup->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MBloodgroup" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBloodgroup" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBloodgroup" value="<?php echo HtmlEncode($ivf_vitals_history->MBloodgroup->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->FBuild->Visible) { // FBuild ?>
		<td data-name="FBuild">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_FBuild" class="form-group ivf_vitals_history_FBuild">
<div id="tp_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBuild" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_vitals_history" data-field="x_FBuild" data-value-separator="<?php echo $ivf_vitals_history->FBuild->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBuild" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBuild" value="{value}"<?php echo $ivf_vitals_history->FBuild->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBuild" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history->FBuild->radioButtonListHtml(FALSE, "x{$ivf_vitals_history_grid->RowIndex}_FBuild") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_FBuild" class="form-group ivf_vitals_history_FBuild">
<span<?php echo $ivf_vitals_history->FBuild->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->FBuild->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FBuild" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBuild" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBuild" value="<?php echo HtmlEncode($ivf_vitals_history->FBuild->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FBuild" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBuild" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FBuild" value="<?php echo HtmlEncode($ivf_vitals_history->FBuild->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->MBuild->Visible) { // MBuild ?>
		<td data-name="MBuild">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_MBuild" class="form-group ivf_vitals_history_MBuild">
<div id="tp_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBuild" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_vitals_history" data-field="x_MBuild" data-value-separator="<?php echo $ivf_vitals_history->MBuild->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBuild" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBuild" value="{value}"<?php echo $ivf_vitals_history->MBuild->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBuild" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history->MBuild->radioButtonListHtml(FALSE, "x{$ivf_vitals_history_grid->RowIndex}_MBuild") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_MBuild" class="form-group ivf_vitals_history_MBuild">
<span<?php echo $ivf_vitals_history->MBuild->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->MBuild->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MBuild" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBuild" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBuild" value="<?php echo HtmlEncode($ivf_vitals_history->MBuild->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MBuild" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBuild" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MBuild" value="<?php echo HtmlEncode($ivf_vitals_history->MBuild->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->FSkinColor->Visible) { // FSkinColor ?>
		<td data-name="FSkinColor">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_FSkinColor" class="form-group ivf_vitals_history_FSkinColor">
<div id="tp_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FSkinColor" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_vitals_history" data-field="x_FSkinColor" data-value-separator="<?php echo $ivf_vitals_history->FSkinColor->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FSkinColor" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FSkinColor" value="{value}"<?php echo $ivf_vitals_history->FSkinColor->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FSkinColor" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history->FSkinColor->radioButtonListHtml(FALSE, "x{$ivf_vitals_history_grid->RowIndex}_FSkinColor") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_FSkinColor" class="form-group ivf_vitals_history_FSkinColor">
<span<?php echo $ivf_vitals_history->FSkinColor->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->FSkinColor->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FSkinColor" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FSkinColor" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FSkinColor" value="<?php echo HtmlEncode($ivf_vitals_history->FSkinColor->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FSkinColor" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FSkinColor" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FSkinColor" value="<?php echo HtmlEncode($ivf_vitals_history->FSkinColor->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->MSkinColor->Visible) { // MSkinColor ?>
		<td data-name="MSkinColor">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_MSkinColor" class="form-group ivf_vitals_history_MSkinColor">
<div id="tp_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MSkinColor" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_vitals_history" data-field="x_MSkinColor" data-value-separator="<?php echo $ivf_vitals_history->MSkinColor->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MSkinColor" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MSkinColor" value="{value}"<?php echo $ivf_vitals_history->MSkinColor->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MSkinColor" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history->MSkinColor->radioButtonListHtml(FALSE, "x{$ivf_vitals_history_grid->RowIndex}_MSkinColor") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_MSkinColor" class="form-group ivf_vitals_history_MSkinColor">
<span<?php echo $ivf_vitals_history->MSkinColor->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->MSkinColor->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MSkinColor" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MSkinColor" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MSkinColor" value="<?php echo HtmlEncode($ivf_vitals_history->MSkinColor->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MSkinColor" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MSkinColor" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MSkinColor" value="<?php echo HtmlEncode($ivf_vitals_history->MSkinColor->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->FEyesColor->Visible) { // FEyesColor ?>
		<td data-name="FEyesColor">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_FEyesColor" class="form-group ivf_vitals_history_FEyesColor">
<div id="tp_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FEyesColor" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_vitals_history" data-field="x_FEyesColor" data-value-separator="<?php echo $ivf_vitals_history->FEyesColor->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FEyesColor" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FEyesColor" value="{value}"<?php echo $ivf_vitals_history->FEyesColor->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FEyesColor" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history->FEyesColor->radioButtonListHtml(FALSE, "x{$ivf_vitals_history_grid->RowIndex}_FEyesColor") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_FEyesColor" class="form-group ivf_vitals_history_FEyesColor">
<span<?php echo $ivf_vitals_history->FEyesColor->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->FEyesColor->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FEyesColor" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FEyesColor" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FEyesColor" value="<?php echo HtmlEncode($ivf_vitals_history->FEyesColor->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FEyesColor" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FEyesColor" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FEyesColor" value="<?php echo HtmlEncode($ivf_vitals_history->FEyesColor->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->MEyesColor->Visible) { // MEyesColor ?>
		<td data-name="MEyesColor">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_MEyesColor" class="form-group ivf_vitals_history_MEyesColor">
<div id="tp_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MEyesColor" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_vitals_history" data-field="x_MEyesColor" data-value-separator="<?php echo $ivf_vitals_history->MEyesColor->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MEyesColor" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MEyesColor" value="{value}"<?php echo $ivf_vitals_history->MEyesColor->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MEyesColor" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history->MEyesColor->radioButtonListHtml(FALSE, "x{$ivf_vitals_history_grid->RowIndex}_MEyesColor") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_MEyesColor" class="form-group ivf_vitals_history_MEyesColor">
<span<?php echo $ivf_vitals_history->MEyesColor->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->MEyesColor->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MEyesColor" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MEyesColor" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MEyesColor" value="<?php echo HtmlEncode($ivf_vitals_history->MEyesColor->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MEyesColor" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MEyesColor" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MEyesColor" value="<?php echo HtmlEncode($ivf_vitals_history->MEyesColor->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->FHairColor->Visible) { // FHairColor ?>
		<td data-name="FHairColor">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_FHairColor" class="form-group ivf_vitals_history_FHairColor">
<div id="tp_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FHairColor" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_vitals_history" data-field="x_FHairColor" data-value-separator="<?php echo $ivf_vitals_history->FHairColor->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FHairColor" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FHairColor" value="{value}"<?php echo $ivf_vitals_history->FHairColor->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FHairColor" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history->FHairColor->radioButtonListHtml(FALSE, "x{$ivf_vitals_history_grid->RowIndex}_FHairColor") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_FHairColor" class="form-group ivf_vitals_history_FHairColor">
<span<?php echo $ivf_vitals_history->FHairColor->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->FHairColor->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FHairColor" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FHairColor" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FHairColor" value="<?php echo HtmlEncode($ivf_vitals_history->FHairColor->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FHairColor" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FHairColor" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FHairColor" value="<?php echo HtmlEncode($ivf_vitals_history->FHairColor->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->MhairColor->Visible) { // MhairColor ?>
		<td data-name="MhairColor">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_MhairColor" class="form-group ivf_vitals_history_MhairColor">
<div id="tp_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MhairColor" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_vitals_history" data-field="x_MhairColor" data-value-separator="<?php echo $ivf_vitals_history->MhairColor->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MhairColor" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MhairColor" value="{value}"<?php echo $ivf_vitals_history->MhairColor->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MhairColor" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history->MhairColor->radioButtonListHtml(FALSE, "x{$ivf_vitals_history_grid->RowIndex}_MhairColor") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_MhairColor" class="form-group ivf_vitals_history_MhairColor">
<span<?php echo $ivf_vitals_history->MhairColor->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->MhairColor->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MhairColor" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MhairColor" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MhairColor" value="<?php echo HtmlEncode($ivf_vitals_history->MhairColor->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MhairColor" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MhairColor" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MhairColor" value="<?php echo HtmlEncode($ivf_vitals_history->MhairColor->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->FhairTexture->Visible) { // FhairTexture ?>
		<td data-name="FhairTexture">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_FhairTexture" class="form-group ivf_vitals_history_FhairTexture">
<div id="tp_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FhairTexture" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_vitals_history" data-field="x_FhairTexture" data-value-separator="<?php echo $ivf_vitals_history->FhairTexture->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FhairTexture" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FhairTexture" value="{value}"<?php echo $ivf_vitals_history->FhairTexture->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FhairTexture" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history->FhairTexture->radioButtonListHtml(FALSE, "x{$ivf_vitals_history_grid->RowIndex}_FhairTexture") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_FhairTexture" class="form-group ivf_vitals_history_FhairTexture">
<span<?php echo $ivf_vitals_history->FhairTexture->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->FhairTexture->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FhairTexture" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FhairTexture" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FhairTexture" value="<?php echo HtmlEncode($ivf_vitals_history->FhairTexture->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FhairTexture" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FhairTexture" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FhairTexture" value="<?php echo HtmlEncode($ivf_vitals_history->FhairTexture->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->MHairTexture->Visible) { // MHairTexture ?>
		<td data-name="MHairTexture">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_MHairTexture" class="form-group ivf_vitals_history_MHairTexture">
<div id="tp_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MHairTexture" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_vitals_history" data-field="x_MHairTexture" data-value-separator="<?php echo $ivf_vitals_history->MHairTexture->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MHairTexture" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MHairTexture" value="{value}"<?php echo $ivf_vitals_history->MHairTexture->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MHairTexture" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history->MHairTexture->radioButtonListHtml(FALSE, "x{$ivf_vitals_history_grid->RowIndex}_MHairTexture") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_MHairTexture" class="form-group ivf_vitals_history_MHairTexture">
<span<?php echo $ivf_vitals_history->MHairTexture->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->MHairTexture->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MHairTexture" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MHairTexture" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MHairTexture" value="<?php echo HtmlEncode($ivf_vitals_history->MHairTexture->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MHairTexture" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MHairTexture" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MHairTexture" value="<?php echo HtmlEncode($ivf_vitals_history->MHairTexture->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->Fothers->Visible) { // Fothers ?>
		<td data-name="Fothers">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_Fothers" class="form-group ivf_vitals_history_Fothers">
<input type="text" data-table="ivf_vitals_history" data-field="x_Fothers" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fothers" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fothers" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Fothers->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Fothers->EditValue ?>"<?php echo $ivf_vitals_history->Fothers->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_Fothers" class="form-group ivf_vitals_history_Fothers">
<span<?php echo $ivf_vitals_history->Fothers->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->Fothers->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Fothers" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fothers" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fothers" value="<?php echo HtmlEncode($ivf_vitals_history->Fothers->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Fothers" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fothers" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Fothers" value="<?php echo HtmlEncode($ivf_vitals_history->Fothers->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->Mothers->Visible) { // Mothers ?>
		<td data-name="Mothers">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_Mothers" class="form-group ivf_vitals_history_Mothers">
<input type="text" data-table="ivf_vitals_history" data-field="x_Mothers" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mothers" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mothers" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Mothers->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Mothers->EditValue ?>"<?php echo $ivf_vitals_history->Mothers->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_Mothers" class="form-group ivf_vitals_history_Mothers">
<span<?php echo $ivf_vitals_history->Mothers->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->Mothers->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Mothers" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mothers" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mothers" value="<?php echo HtmlEncode($ivf_vitals_history->Mothers->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Mothers" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mothers" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Mothers" value="<?php echo HtmlEncode($ivf_vitals_history->Mothers->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->PGE->Visible) { // PGE ?>
		<td data-name="PGE">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_PGE" class="form-group ivf_vitals_history_PGE">
<input type="text" data-table="ivf_vitals_history" data-field="x_PGE" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PGE" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PGE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->PGE->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->PGE->EditValue ?>"<?php echo $ivf_vitals_history->PGE->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_PGE" class="form-group ivf_vitals_history_PGE">
<span<?php echo $ivf_vitals_history->PGE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->PGE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PGE" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PGE" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PGE" value="<?php echo HtmlEncode($ivf_vitals_history->PGE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PGE" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PGE" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PGE" value="<?php echo HtmlEncode($ivf_vitals_history->PGE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->PPR->Visible) { // PPR ?>
		<td data-name="PPR">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_PPR" class="form-group ivf_vitals_history_PPR">
<input type="text" data-table="ivf_vitals_history" data-field="x_PPR" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPR" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPR" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->PPR->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->PPR->EditValue ?>"<?php echo $ivf_vitals_history->PPR->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_PPR" class="form-group ivf_vitals_history_PPR">
<span<?php echo $ivf_vitals_history->PPR->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->PPR->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PPR" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPR" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPR" value="<?php echo HtmlEncode($ivf_vitals_history->PPR->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PPR" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPR" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPR" value="<?php echo HtmlEncode($ivf_vitals_history->PPR->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->PBP->Visible) { // PBP ?>
		<td data-name="PBP">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_PBP" class="form-group ivf_vitals_history_PBP">
<input type="text" data-table="ivf_vitals_history" data-field="x_PBP" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PBP" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PBP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->PBP->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->PBP->EditValue ?>"<?php echo $ivf_vitals_history->PBP->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_PBP" class="form-group ivf_vitals_history_PBP">
<span<?php echo $ivf_vitals_history->PBP->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->PBP->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PBP" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PBP" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PBP" value="<?php echo HtmlEncode($ivf_vitals_history->PBP->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PBP" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PBP" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PBP" value="<?php echo HtmlEncode($ivf_vitals_history->PBP->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->Breast->Visible) { // Breast ?>
		<td data-name="Breast">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_Breast" class="form-group ivf_vitals_history_Breast">
<input type="text" data-table="ivf_vitals_history" data-field="x_Breast" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Breast" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Breast" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Breast->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Breast->EditValue ?>"<?php echo $ivf_vitals_history->Breast->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_Breast" class="form-group ivf_vitals_history_Breast">
<span<?php echo $ivf_vitals_history->Breast->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->Breast->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Breast" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Breast" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Breast" value="<?php echo HtmlEncode($ivf_vitals_history->Breast->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Breast" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Breast" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Breast" value="<?php echo HtmlEncode($ivf_vitals_history->Breast->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->PPA->Visible) { // PPA ?>
		<td data-name="PPA">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_PPA" class="form-group ivf_vitals_history_PPA">
<input type="text" data-table="ivf_vitals_history" data-field="x_PPA" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPA" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPA" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->PPA->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->PPA->EditValue ?>"<?php echo $ivf_vitals_history->PPA->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_PPA" class="form-group ivf_vitals_history_PPA">
<span<?php echo $ivf_vitals_history->PPA->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->PPA->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PPA" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPA" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPA" value="<?php echo HtmlEncode($ivf_vitals_history->PPA->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PPA" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPA" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPA" value="<?php echo HtmlEncode($ivf_vitals_history->PPA->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->PPSV->Visible) { // PPSV ?>
		<td data-name="PPSV">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_PPSV" class="form-group ivf_vitals_history_PPSV">
<input type="text" data-table="ivf_vitals_history" data-field="x_PPSV" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPSV" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPSV" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->PPSV->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->PPSV->EditValue ?>"<?php echo $ivf_vitals_history->PPSV->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_PPSV" class="form-group ivf_vitals_history_PPSV">
<span<?php echo $ivf_vitals_history->PPSV->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->PPSV->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PPSV" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPSV" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPSV" value="<?php echo HtmlEncode($ivf_vitals_history->PPSV->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PPSV" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPSV" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPSV" value="<?php echo HtmlEncode($ivf_vitals_history->PPSV->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->PPAPSMEAR->Visible) { // PPAPSMEAR ?>
		<td data-name="PPAPSMEAR">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_PPAPSMEAR" class="form-group ivf_vitals_history_PPAPSMEAR">
<input type="text" data-table="ivf_vitals_history" data-field="x_PPAPSMEAR" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPAPSMEAR" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPAPSMEAR" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->PPAPSMEAR->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->PPAPSMEAR->EditValue ?>"<?php echo $ivf_vitals_history->PPAPSMEAR->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_PPAPSMEAR" class="form-group ivf_vitals_history_PPAPSMEAR">
<span<?php echo $ivf_vitals_history->PPAPSMEAR->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->PPAPSMEAR->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PPAPSMEAR" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPAPSMEAR" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPAPSMEAR" value="<?php echo HtmlEncode($ivf_vitals_history->PPAPSMEAR->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PPAPSMEAR" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPAPSMEAR" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PPAPSMEAR" value="<?php echo HtmlEncode($ivf_vitals_history->PPAPSMEAR->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->PTHYROID->Visible) { // PTHYROID ?>
		<td data-name="PTHYROID">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_PTHYROID" class="form-group ivf_vitals_history_PTHYROID">
<input type="text" data-table="ivf_vitals_history" data-field="x_PTHYROID" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PTHYROID" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PTHYROID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->PTHYROID->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->PTHYROID->EditValue ?>"<?php echo $ivf_vitals_history->PTHYROID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_PTHYROID" class="form-group ivf_vitals_history_PTHYROID">
<span<?php echo $ivf_vitals_history->PTHYROID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->PTHYROID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PTHYROID" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PTHYROID" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PTHYROID" value="<?php echo HtmlEncode($ivf_vitals_history->PTHYROID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PTHYROID" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PTHYROID" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PTHYROID" value="<?php echo HtmlEncode($ivf_vitals_history->PTHYROID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->MTHYROID->Visible) { // MTHYROID ?>
		<td data-name="MTHYROID">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_MTHYROID" class="form-group ivf_vitals_history_MTHYROID">
<input type="text" data-table="ivf_vitals_history" data-field="x_MTHYROID" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MTHYROID" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MTHYROID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->MTHYROID->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->MTHYROID->EditValue ?>"<?php echo $ivf_vitals_history->MTHYROID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_MTHYROID" class="form-group ivf_vitals_history_MTHYROID">
<span<?php echo $ivf_vitals_history->MTHYROID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->MTHYROID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MTHYROID" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MTHYROID" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MTHYROID" value="<?php echo HtmlEncode($ivf_vitals_history->MTHYROID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MTHYROID" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MTHYROID" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MTHYROID" value="<?php echo HtmlEncode($ivf_vitals_history->MTHYROID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->SecSexCharacters->Visible) { // SecSexCharacters ?>
		<td data-name="SecSexCharacters">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_SecSexCharacters" class="form-group ivf_vitals_history_SecSexCharacters">
<input type="text" data-table="ivf_vitals_history" data-field="x_SecSexCharacters" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_SecSexCharacters" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_SecSexCharacters" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->SecSexCharacters->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->SecSexCharacters->EditValue ?>"<?php echo $ivf_vitals_history->SecSexCharacters->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_SecSexCharacters" class="form-group ivf_vitals_history_SecSexCharacters">
<span<?php echo $ivf_vitals_history->SecSexCharacters->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->SecSexCharacters->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_SecSexCharacters" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_SecSexCharacters" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_SecSexCharacters" value="<?php echo HtmlEncode($ivf_vitals_history->SecSexCharacters->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_SecSexCharacters" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_SecSexCharacters" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_SecSexCharacters" value="<?php echo HtmlEncode($ivf_vitals_history->SecSexCharacters->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->PenisUM->Visible) { // PenisUM ?>
		<td data-name="PenisUM">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_PenisUM" class="form-group ivf_vitals_history_PenisUM">
<input type="text" data-table="ivf_vitals_history" data-field="x_PenisUM" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PenisUM" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PenisUM" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->PenisUM->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->PenisUM->EditValue ?>"<?php echo $ivf_vitals_history->PenisUM->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_PenisUM" class="form-group ivf_vitals_history_PenisUM">
<span<?php echo $ivf_vitals_history->PenisUM->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->PenisUM->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PenisUM" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PenisUM" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_PenisUM" value="<?php echo HtmlEncode($ivf_vitals_history->PenisUM->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_PenisUM" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PenisUM" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_PenisUM" value="<?php echo HtmlEncode($ivf_vitals_history->PenisUM->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->VAS->Visible) { // VAS ?>
		<td data-name="VAS">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_VAS" class="form-group ivf_vitals_history_VAS">
<input type="text" data-table="ivf_vitals_history" data-field="x_VAS" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_VAS" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_VAS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->VAS->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->VAS->EditValue ?>"<?php echo $ivf_vitals_history->VAS->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_VAS" class="form-group ivf_vitals_history_VAS">
<span<?php echo $ivf_vitals_history->VAS->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->VAS->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_VAS" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_VAS" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_VAS" value="<?php echo HtmlEncode($ivf_vitals_history->VAS->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_VAS" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_VAS" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_VAS" value="<?php echo HtmlEncode($ivf_vitals_history->VAS->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->EPIDIDYMIS->Visible) { // EPIDIDYMIS ?>
		<td data-name="EPIDIDYMIS">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_EPIDIDYMIS" class="form-group ivf_vitals_history_EPIDIDYMIS">
<input type="text" data-table="ivf_vitals_history" data-field="x_EPIDIDYMIS" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_EPIDIDYMIS" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_EPIDIDYMIS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->EPIDIDYMIS->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->EPIDIDYMIS->EditValue ?>"<?php echo $ivf_vitals_history->EPIDIDYMIS->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_EPIDIDYMIS" class="form-group ivf_vitals_history_EPIDIDYMIS">
<span<?php echo $ivf_vitals_history->EPIDIDYMIS->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->EPIDIDYMIS->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_EPIDIDYMIS" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_EPIDIDYMIS" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_EPIDIDYMIS" value="<?php echo HtmlEncode($ivf_vitals_history->EPIDIDYMIS->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_EPIDIDYMIS" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_EPIDIDYMIS" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_EPIDIDYMIS" value="<?php echo HtmlEncode($ivf_vitals_history->EPIDIDYMIS->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->Varicocele->Visible) { // Varicocele ?>
		<td data-name="Varicocele">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_Varicocele" class="form-group ivf_vitals_history_Varicocele">
<input type="text" data-table="ivf_vitals_history" data-field="x_Varicocele" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Varicocele" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Varicocele" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Varicocele->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Varicocele->EditValue ?>"<?php echo $ivf_vitals_history->Varicocele->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_Varicocele" class="form-group ivf_vitals_history_Varicocele">
<span<?php echo $ivf_vitals_history->Varicocele->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->Varicocele->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Varicocele" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Varicocele" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Varicocele" value="<?php echo HtmlEncode($ivf_vitals_history->Varicocele->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Varicocele" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Varicocele" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Varicocele" value="<?php echo HtmlEncode($ivf_vitals_history->Varicocele->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->FamilyHistory->Visible) { // FamilyHistory ?>
		<td data-name="FamilyHistory">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_FamilyHistory" class="form-group ivf_vitals_history_FamilyHistory">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_FamilyHistory" data-value-separator="<?php echo $ivf_vitals_history->FamilyHistory->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FamilyHistory" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FamilyHistory"<?php echo $ivf_vitals_history->FamilyHistory->editAttributes() ?>>
		<?php echo $ivf_vitals_history->FamilyHistory->selectOptionListHtml("x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FamilyHistory") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_FamilyHistory" class="form-group ivf_vitals_history_FamilyHistory">
<span<?php echo $ivf_vitals_history->FamilyHistory->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->FamilyHistory->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FamilyHistory" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FamilyHistory" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_FamilyHistory" value="<?php echo HtmlEncode($ivf_vitals_history->FamilyHistory->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FamilyHistory" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FamilyHistory" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_FamilyHistory" value="<?php echo HtmlEncode($ivf_vitals_history->FamilyHistory->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->Addictions->Visible) { // Addictions ?>
		<td data-name="Addictions">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_Addictions" class="form-group ivf_vitals_history_Addictions">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_Addictions" data-value-separator="<?php echo $ivf_vitals_history->Addictions->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Addictions" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Addictions"<?php echo $ivf_vitals_history->Addictions->editAttributes() ?>>
		<?php echo $ivf_vitals_history->Addictions->selectOptionListHtml("x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Addictions") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_Addictions" class="form-group ivf_vitals_history_Addictions">
<span<?php echo $ivf_vitals_history->Addictions->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->Addictions->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Addictions" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Addictions" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Addictions" value="<?php echo HtmlEncode($ivf_vitals_history->Addictions->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Addictions" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Addictions" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Addictions" value="<?php echo HtmlEncode($ivf_vitals_history->Addictions->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->Medical->Visible) { // Medical ?>
		<td data-name="Medical">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_Medical" class="form-group ivf_vitals_history_Medical">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_Medical" data-value-separator="<?php echo $ivf_vitals_history->Medical->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Medical" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Medical"<?php echo $ivf_vitals_history->Medical->editAttributes() ?>>
		<?php echo $ivf_vitals_history->Medical->selectOptionListHtml("x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Medical") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_Medical" class="form-group ivf_vitals_history_Medical">
<span<?php echo $ivf_vitals_history->Medical->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->Medical->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Medical" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Medical" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Medical" value="<?php echo HtmlEncode($ivf_vitals_history->Medical->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Medical" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Medical" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Medical" value="<?php echo HtmlEncode($ivf_vitals_history->Medical->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->Surgical->Visible) { // Surgical ?>
		<td data-name="Surgical">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_Surgical" class="form-group ivf_vitals_history_Surgical">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_Surgical" data-value-separator="<?php echo $ivf_vitals_history->Surgical->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Surgical" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Surgical"<?php echo $ivf_vitals_history->Surgical->editAttributes() ?>>
		<?php echo $ivf_vitals_history->Surgical->selectOptionListHtml("x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Surgical") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_Surgical" class="form-group ivf_vitals_history_Surgical">
<span<?php echo $ivf_vitals_history->Surgical->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->Surgical->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Surgical" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Surgical" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_Surgical" value="<?php echo HtmlEncode($ivf_vitals_history->Surgical->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Surgical" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Surgical" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_Surgical" value="<?php echo HtmlEncode($ivf_vitals_history->Surgical->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->CoitalHistory->Visible) { // CoitalHistory ?>
		<td data-name="CoitalHistory">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_CoitalHistory" class="form-group ivf_vitals_history_CoitalHistory">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_CoitalHistory" data-value-separator="<?php echo $ivf_vitals_history->CoitalHistory->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_CoitalHistory" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_CoitalHistory"<?php echo $ivf_vitals_history->CoitalHistory->editAttributes() ?>>
		<?php echo $ivf_vitals_history->CoitalHistory->selectOptionListHtml("x<?php echo $ivf_vitals_history_grid->RowIndex ?>_CoitalHistory") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_CoitalHistory" class="form-group ivf_vitals_history_CoitalHistory">
<span<?php echo $ivf_vitals_history->CoitalHistory->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->CoitalHistory->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_CoitalHistory" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_CoitalHistory" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_CoitalHistory" value="<?php echo HtmlEncode($ivf_vitals_history->CoitalHistory->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_CoitalHistory" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_CoitalHistory" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_CoitalHistory" value="<?php echo HtmlEncode($ivf_vitals_history->CoitalHistory->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->MariedFor->Visible) { // MariedFor ?>
		<td data-name="MariedFor">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_MariedFor" class="form-group ivf_vitals_history_MariedFor">
<input type="text" data-table="ivf_vitals_history" data-field="x_MariedFor" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MariedFor" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MariedFor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->MariedFor->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->MariedFor->EditValue ?>"<?php echo $ivf_vitals_history->MariedFor->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_MariedFor" class="form-group ivf_vitals_history_MariedFor">
<span<?php echo $ivf_vitals_history->MariedFor->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->MariedFor->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MariedFor" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MariedFor" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_MariedFor" value="<?php echo HtmlEncode($ivf_vitals_history->MariedFor->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_MariedFor" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MariedFor" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_MariedFor" value="<?php echo HtmlEncode($ivf_vitals_history->MariedFor->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->CMNCM->Visible) { // CMNCM ?>
		<td data-name="CMNCM">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_CMNCM" class="form-group ivf_vitals_history_CMNCM">
<input type="text" data-table="ivf_vitals_history" data-field="x_CMNCM" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_CMNCM" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_CMNCM" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->CMNCM->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->CMNCM->EditValue ?>"<?php echo $ivf_vitals_history->CMNCM->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_CMNCM" class="form-group ivf_vitals_history_CMNCM">
<span<?php echo $ivf_vitals_history->CMNCM->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->CMNCM->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_CMNCM" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_CMNCM" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_CMNCM" value="<?php echo HtmlEncode($ivf_vitals_history->CMNCM->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_CMNCM" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_CMNCM" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_CMNCM" value="<?php echo HtmlEncode($ivf_vitals_history->CMNCM->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<?php if ($ivf_vitals_history->TidNo->getSessionValue() <> "") { ?>
<span id="el$rowindex$_ivf_vitals_history_TidNo" class="form-group ivf_vitals_history_TidNo">
<span<?php echo $ivf_vitals_history->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->TidNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_TidNo" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_vitals_history->TidNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_TidNo" class="form-group ivf_vitals_history_TidNo">
<input type="text" data-table="ivf_vitals_history" data-field="x_TidNo" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_vitals_history->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->TidNo->EditValue ?>"<?php echo $ivf_vitals_history->TidNo->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_TidNo" class="form-group ivf_vitals_history_TidNo">
<span<?php echo $ivf_vitals_history->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->TidNo->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_TidNo" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_vitals_history->TidNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_TidNo" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_TidNo" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_vitals_history->TidNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history->pFamilyHistory->Visible) { // pFamilyHistory ?>
		<td data-name="pFamilyHistory">
<?php if (!$ivf_vitals_history->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitals_history_pFamilyHistory" class="form-group ivf_vitals_history_pFamilyHistory">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_pFamilyHistory" data-value-separator="<?php echo $ivf_vitals_history->pFamilyHistory->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_pFamilyHistory" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_pFamilyHistory"<?php echo $ivf_vitals_history->pFamilyHistory->editAttributes() ?>>
		<?php echo $ivf_vitals_history->pFamilyHistory->selectOptionListHtml("x<?php echo $ivf_vitals_history_grid->RowIndex ?>_pFamilyHistory") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitals_history_pFamilyHistory" class="form-group ivf_vitals_history_pFamilyHistory">
<span<?php echo $ivf_vitals_history->pFamilyHistory->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitals_history->pFamilyHistory->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_pFamilyHistory" name="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_pFamilyHistory" id="x<?php echo $ivf_vitals_history_grid->RowIndex ?>_pFamilyHistory" value="<?php echo HtmlEncode($ivf_vitals_history->pFamilyHistory->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_pFamilyHistory" name="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_pFamilyHistory" id="o<?php echo $ivf_vitals_history_grid->RowIndex ?>_pFamilyHistory" value="<?php echo HtmlEncode($ivf_vitals_history->pFamilyHistory->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_vitals_history_grid->ListOptions->render("body", "right", $ivf_vitals_history_grid->RowIndex);
?>
<script>
fivf_vitals_historygrid.updateLists(<?php echo $ivf_vitals_history_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($ivf_vitals_history->CurrentMode == "add" || $ivf_vitals_history->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $ivf_vitals_history_grid->FormKeyCountName ?>" id="<?php echo $ivf_vitals_history_grid->FormKeyCountName ?>" value="<?php echo $ivf_vitals_history_grid->KeyCount ?>">
<?php echo $ivf_vitals_history_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($ivf_vitals_history->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $ivf_vitals_history_grid->FormKeyCountName ?>" id="<?php echo $ivf_vitals_history_grid->FormKeyCountName ?>" value="<?php echo $ivf_vitals_history_grid->KeyCount ?>">
<?php echo $ivf_vitals_history_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($ivf_vitals_history->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fivf_vitals_historygrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($ivf_vitals_history_grid->Recordset)
	$ivf_vitals_history_grid->Recordset->Close();
?>
</div>
<?php if ($ivf_vitals_history_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $ivf_vitals_history_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_vitals_history_grid->TotalRecs == 0 && !$ivf_vitals_history->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_vitals_history_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ivf_vitals_history_grid->terminate();
?>
<?php if (!$ivf_vitals_history->isExport()) { ?>
<script>
ew.scrollableTable("gmp_ivf_vitals_history", "95%", "");
</script>
<?php } ?>