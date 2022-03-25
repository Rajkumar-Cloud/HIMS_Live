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
$ivf_vitals_history_add = new ivf_vitals_history_add();

// Run the page
$ivf_vitals_history_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_vitals_history_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fivf_vitals_historyadd = currentForm = new ew.Form("fivf_vitals_historyadd", "add");

// Validate form
fivf_vitals_historyadd.validate = function() {
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
		<?php if ($ivf_vitals_history_add->RIDNO->Required) { ?>
			elm = this.getElements("x" + infix + "_RIDNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->RIDNO->caption(), $ivf_vitals_history->RIDNO->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RIDNO");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_vitals_history->RIDNO->errorMessage()) ?>");
		<?php if ($ivf_vitals_history_add->Name->Required) { ?>
			elm = this.getElements("x" + infix + "_Name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->Name->caption(), $ivf_vitals_history->Name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->Age->caption(), $ivf_vitals_history->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->SEX->Required) { ?>
			elm = this.getElements("x" + infix + "_SEX");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->SEX->caption(), $ivf_vitals_history->SEX->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->Religion->Required) { ?>
			elm = this.getElements("x" + infix + "_Religion");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->Religion->caption(), $ivf_vitals_history->Religion->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->Address->Required) { ?>
			elm = this.getElements("x" + infix + "_Address");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->Address->caption(), $ivf_vitals_history->Address->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->IdentificationMark->Required) { ?>
			elm = this.getElements("x" + infix + "_IdentificationMark");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->IdentificationMark->caption(), $ivf_vitals_history->IdentificationMark->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->DoublewitnessName1->Required) { ?>
			elm = this.getElements("x" + infix + "_DoublewitnessName1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->DoublewitnessName1->caption(), $ivf_vitals_history->DoublewitnessName1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->DoublewitnessName2->Required) { ?>
			elm = this.getElements("x" + infix + "_DoublewitnessName2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->DoublewitnessName2->caption(), $ivf_vitals_history->DoublewitnessName2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->Chiefcomplaints->Required) { ?>
			elm = this.getElements("x" + infix + "_Chiefcomplaints");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->Chiefcomplaints->caption(), $ivf_vitals_history->Chiefcomplaints->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->MenstrualHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_MenstrualHistory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->MenstrualHistory->caption(), $ivf_vitals_history->MenstrualHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->ObstetricHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_ObstetricHistory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->ObstetricHistory->caption(), $ivf_vitals_history->ObstetricHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->MedicalHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_MedicalHistory[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->MedicalHistory->caption(), $ivf_vitals_history->MedicalHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->SurgicalHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_SurgicalHistory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->SurgicalHistory->caption(), $ivf_vitals_history->SurgicalHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->Generalexaminationpallor->Required) { ?>
			elm = this.getElements("x" + infix + "_Generalexaminationpallor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->Generalexaminationpallor->caption(), $ivf_vitals_history->Generalexaminationpallor->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->PR->Required) { ?>
			elm = this.getElements("x" + infix + "_PR");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->PR->caption(), $ivf_vitals_history->PR->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->CVS->Required) { ?>
			elm = this.getElements("x" + infix + "_CVS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->CVS->caption(), $ivf_vitals_history->CVS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->PA->Required) { ?>
			elm = this.getElements("x" + infix + "_PA");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->PA->caption(), $ivf_vitals_history->PA->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->PROVISIONALDIAGNOSIS->Required) { ?>
			elm = this.getElements("x" + infix + "_PROVISIONALDIAGNOSIS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->PROVISIONALDIAGNOSIS->caption(), $ivf_vitals_history->PROVISIONALDIAGNOSIS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->Investigations->Required) { ?>
			elm = this.getElements("x" + infix + "_Investigations");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->Investigations->caption(), $ivf_vitals_history->Investigations->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->Fheight->Required) { ?>
			elm = this.getElements("x" + infix + "_Fheight");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->Fheight->caption(), $ivf_vitals_history->Fheight->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->Fweight->Required) { ?>
			elm = this.getElements("x" + infix + "_Fweight");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->Fweight->caption(), $ivf_vitals_history->Fweight->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->FBMI->Required) { ?>
			elm = this.getElements("x" + infix + "_FBMI");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->FBMI->caption(), $ivf_vitals_history->FBMI->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->FBloodgroup->Required) { ?>
			elm = this.getElements("x" + infix + "_FBloodgroup");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->FBloodgroup->caption(), $ivf_vitals_history->FBloodgroup->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->Mheight->Required) { ?>
			elm = this.getElements("x" + infix + "_Mheight");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->Mheight->caption(), $ivf_vitals_history->Mheight->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->Mweight->Required) { ?>
			elm = this.getElements("x" + infix + "_Mweight");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->Mweight->caption(), $ivf_vitals_history->Mweight->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->MBMI->Required) { ?>
			elm = this.getElements("x" + infix + "_MBMI");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->MBMI->caption(), $ivf_vitals_history->MBMI->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->MBloodgroup->Required) { ?>
			elm = this.getElements("x" + infix + "_MBloodgroup");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->MBloodgroup->caption(), $ivf_vitals_history->MBloodgroup->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->FBuild->Required) { ?>
			elm = this.getElements("x" + infix + "_FBuild");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->FBuild->caption(), $ivf_vitals_history->FBuild->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->MBuild->Required) { ?>
			elm = this.getElements("x" + infix + "_MBuild");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->MBuild->caption(), $ivf_vitals_history->MBuild->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->FSkinColor->Required) { ?>
			elm = this.getElements("x" + infix + "_FSkinColor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->FSkinColor->caption(), $ivf_vitals_history->FSkinColor->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->MSkinColor->Required) { ?>
			elm = this.getElements("x" + infix + "_MSkinColor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->MSkinColor->caption(), $ivf_vitals_history->MSkinColor->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->FEyesColor->Required) { ?>
			elm = this.getElements("x" + infix + "_FEyesColor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->FEyesColor->caption(), $ivf_vitals_history->FEyesColor->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->MEyesColor->Required) { ?>
			elm = this.getElements("x" + infix + "_MEyesColor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->MEyesColor->caption(), $ivf_vitals_history->MEyesColor->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->FHairColor->Required) { ?>
			elm = this.getElements("x" + infix + "_FHairColor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->FHairColor->caption(), $ivf_vitals_history->FHairColor->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->MhairColor->Required) { ?>
			elm = this.getElements("x" + infix + "_MhairColor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->MhairColor->caption(), $ivf_vitals_history->MhairColor->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->FhairTexture->Required) { ?>
			elm = this.getElements("x" + infix + "_FhairTexture");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->FhairTexture->caption(), $ivf_vitals_history->FhairTexture->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->MHairTexture->Required) { ?>
			elm = this.getElements("x" + infix + "_MHairTexture");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->MHairTexture->caption(), $ivf_vitals_history->MHairTexture->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->Fothers->Required) { ?>
			elm = this.getElements("x" + infix + "_Fothers");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->Fothers->caption(), $ivf_vitals_history->Fothers->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->Mothers->Required) { ?>
			elm = this.getElements("x" + infix + "_Mothers");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->Mothers->caption(), $ivf_vitals_history->Mothers->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->PGE->Required) { ?>
			elm = this.getElements("x" + infix + "_PGE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->PGE->caption(), $ivf_vitals_history->PGE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->PPR->Required) { ?>
			elm = this.getElements("x" + infix + "_PPR");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->PPR->caption(), $ivf_vitals_history->PPR->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->PBP->Required) { ?>
			elm = this.getElements("x" + infix + "_PBP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->PBP->caption(), $ivf_vitals_history->PBP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->Breast->Required) { ?>
			elm = this.getElements("x" + infix + "_Breast");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->Breast->caption(), $ivf_vitals_history->Breast->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->PPA->Required) { ?>
			elm = this.getElements("x" + infix + "_PPA");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->PPA->caption(), $ivf_vitals_history->PPA->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->PPSV->Required) { ?>
			elm = this.getElements("x" + infix + "_PPSV");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->PPSV->caption(), $ivf_vitals_history->PPSV->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->PPAPSMEAR->Required) { ?>
			elm = this.getElements("x" + infix + "_PPAPSMEAR");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->PPAPSMEAR->caption(), $ivf_vitals_history->PPAPSMEAR->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->PTHYROID->Required) { ?>
			elm = this.getElements("x" + infix + "_PTHYROID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->PTHYROID->caption(), $ivf_vitals_history->PTHYROID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->MTHYROID->Required) { ?>
			elm = this.getElements("x" + infix + "_MTHYROID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->MTHYROID->caption(), $ivf_vitals_history->MTHYROID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->SecSexCharacters->Required) { ?>
			elm = this.getElements("x" + infix + "_SecSexCharacters");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->SecSexCharacters->caption(), $ivf_vitals_history->SecSexCharacters->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->PenisUM->Required) { ?>
			elm = this.getElements("x" + infix + "_PenisUM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->PenisUM->caption(), $ivf_vitals_history->PenisUM->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->VAS->Required) { ?>
			elm = this.getElements("x" + infix + "_VAS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->VAS->caption(), $ivf_vitals_history->VAS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->EPIDIDYMIS->Required) { ?>
			elm = this.getElements("x" + infix + "_EPIDIDYMIS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->EPIDIDYMIS->caption(), $ivf_vitals_history->EPIDIDYMIS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->Varicocele->Required) { ?>
			elm = this.getElements("x" + infix + "_Varicocele");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->Varicocele->caption(), $ivf_vitals_history->Varicocele->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->FertilityTreatmentHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_FertilityTreatmentHistory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->FertilityTreatmentHistory->caption(), $ivf_vitals_history->FertilityTreatmentHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->SurgeryHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_SurgeryHistory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->SurgeryHistory->caption(), $ivf_vitals_history->SurgeryHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->FamilyHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_FamilyHistory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->FamilyHistory->caption(), $ivf_vitals_history->FamilyHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->PInvestigations->Required) { ?>
			elm = this.getElements("x" + infix + "_PInvestigations");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->PInvestigations->caption(), $ivf_vitals_history->PInvestigations->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->Addictions->Required) { ?>
			elm = this.getElements("x" + infix + "_Addictions[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->Addictions->caption(), $ivf_vitals_history->Addictions->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->Medications->Required) { ?>
			elm = this.getElements("x" + infix + "_Medications");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->Medications->caption(), $ivf_vitals_history->Medications->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->Medical->Required) { ?>
			elm = this.getElements("x" + infix + "_Medical");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->Medical->caption(), $ivf_vitals_history->Medical->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->Surgical->Required) { ?>
			elm = this.getElements("x" + infix + "_Surgical");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->Surgical->caption(), $ivf_vitals_history->Surgical->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->CoitalHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_CoitalHistory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->CoitalHistory->caption(), $ivf_vitals_history->CoitalHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->SemenAnalysis->Required) { ?>
			elm = this.getElements("x" + infix + "_SemenAnalysis");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->SemenAnalysis->caption(), $ivf_vitals_history->SemenAnalysis->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->MInsvestications->Required) { ?>
			elm = this.getElements("x" + infix + "_MInsvestications");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->MInsvestications->caption(), $ivf_vitals_history->MInsvestications->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->PImpression->Required) { ?>
			elm = this.getElements("x" + infix + "_PImpression");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->PImpression->caption(), $ivf_vitals_history->PImpression->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->MIMpression->Required) { ?>
			elm = this.getElements("x" + infix + "_MIMpression");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->MIMpression->caption(), $ivf_vitals_history->MIMpression->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->PPlanOfManagement->Required) { ?>
			elm = this.getElements("x" + infix + "_PPlanOfManagement");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->PPlanOfManagement->caption(), $ivf_vitals_history->PPlanOfManagement->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->MPlanOfManagement->Required) { ?>
			elm = this.getElements("x" + infix + "_MPlanOfManagement");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->MPlanOfManagement->caption(), $ivf_vitals_history->MPlanOfManagement->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->PReadMore->Required) { ?>
			elm = this.getElements("x" + infix + "_PReadMore");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->PReadMore->caption(), $ivf_vitals_history->PReadMore->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->MReadMore->Required) { ?>
			elm = this.getElements("x" + infix + "_MReadMore");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->MReadMore->caption(), $ivf_vitals_history->MReadMore->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->MariedFor->Required) { ?>
			elm = this.getElements("x" + infix + "_MariedFor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->MariedFor->caption(), $ivf_vitals_history->MariedFor->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->CMNCM->Required) { ?>
			elm = this.getElements("x" + infix + "_CMNCM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->CMNCM->caption(), $ivf_vitals_history->CMNCM->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->TemplateMenstrualHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_TemplateMenstrualHistory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->TemplateMenstrualHistory->caption(), $ivf_vitals_history->TemplateMenstrualHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->TemplateObstetricHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_TemplateObstetricHistory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->TemplateObstetricHistory->caption(), $ivf_vitals_history->TemplateObstetricHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->TemplateFertilityTreatmentHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_TemplateFertilityTreatmentHistory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->TemplateFertilityTreatmentHistory->caption(), $ivf_vitals_history->TemplateFertilityTreatmentHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->TemplateSurgeryHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_TemplateSurgeryHistory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->TemplateSurgeryHistory->caption(), $ivf_vitals_history->TemplateSurgeryHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->TemplateFInvestigations->Required) { ?>
			elm = this.getElements("x" + infix + "_TemplateFInvestigations");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->TemplateFInvestigations->caption(), $ivf_vitals_history->TemplateFInvestigations->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->TemplatePlanOfManagement->Required) { ?>
			elm = this.getElements("x" + infix + "_TemplatePlanOfManagement");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->TemplatePlanOfManagement->caption(), $ivf_vitals_history->TemplatePlanOfManagement->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->TemplatePImpression->Required) { ?>
			elm = this.getElements("x" + infix + "_TemplatePImpression");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->TemplatePImpression->caption(), $ivf_vitals_history->TemplatePImpression->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->TemplateMedications->Required) { ?>
			elm = this.getElements("x" + infix + "_TemplateMedications");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->TemplateMedications->caption(), $ivf_vitals_history->TemplateMedications->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->TemplateSemenAnalysis->Required) { ?>
			elm = this.getElements("x" + infix + "_TemplateSemenAnalysis");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->TemplateSemenAnalysis->caption(), $ivf_vitals_history->TemplateSemenAnalysis->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->MaleInsvestications->Required) { ?>
			elm = this.getElements("x" + infix + "_MaleInsvestications");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->MaleInsvestications->caption(), $ivf_vitals_history->MaleInsvestications->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->TemplateMIMpression->Required) { ?>
			elm = this.getElements("x" + infix + "_TemplateMIMpression");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->TemplateMIMpression->caption(), $ivf_vitals_history->TemplateMIMpression->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->TemplateMalePlanOfManagement->Required) { ?>
			elm = this.getElements("x" + infix + "_TemplateMalePlanOfManagement");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->TemplateMalePlanOfManagement->caption(), $ivf_vitals_history->TemplateMalePlanOfManagement->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->TidNo->Required) { ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->TidNo->caption(), $ivf_vitals_history->TidNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_vitals_history->TidNo->errorMessage()) ?>");
		<?php if ($ivf_vitals_history_add->pFamilyHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_pFamilyHistory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->pFamilyHistory->caption(), $ivf_vitals_history->pFamilyHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->pTemplateMedications->Required) { ?>
			elm = this.getElements("x" + infix + "_pTemplateMedications");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->pTemplateMedications->caption(), $ivf_vitals_history->pTemplateMedications->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->AntiTPO->Required) { ?>
			elm = this.getElements("x" + infix + "_AntiTPO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->AntiTPO->caption(), $ivf_vitals_history->AntiTPO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitals_history_add->AntiTG->Required) { ?>
			elm = this.getElements("x" + infix + "_AntiTG");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history->AntiTG->caption(), $ivf_vitals_history->AntiTG->RequiredErrorMessage)) ?>");
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
fivf_vitals_historyadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_vitals_historyadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_vitals_historyadd.lists["x_MedicalHistory[]"] = <?php echo $ivf_vitals_history_add->MedicalHistory->Lookup->toClientList() ?>;
fivf_vitals_historyadd.lists["x_MedicalHistory[]"].options = <?php echo JsonEncode($ivf_vitals_history_add->MedicalHistory->options(FALSE, TRUE)) ?>;
fivf_vitals_historyadd.lists["x_FBloodgroup"] = <?php echo $ivf_vitals_history_add->FBloodgroup->Lookup->toClientList() ?>;
fivf_vitals_historyadd.lists["x_FBloodgroup"].options = <?php echo JsonEncode($ivf_vitals_history_add->FBloodgroup->lookupOptions()) ?>;
fivf_vitals_historyadd.lists["x_MBloodgroup"] = <?php echo $ivf_vitals_history_add->MBloodgroup->Lookup->toClientList() ?>;
fivf_vitals_historyadd.lists["x_MBloodgroup"].options = <?php echo JsonEncode($ivf_vitals_history_add->MBloodgroup->lookupOptions()) ?>;
fivf_vitals_historyadd.lists["x_FBuild"] = <?php echo $ivf_vitals_history_add->FBuild->Lookup->toClientList() ?>;
fivf_vitals_historyadd.lists["x_FBuild"].options = <?php echo JsonEncode($ivf_vitals_history_add->FBuild->options(FALSE, TRUE)) ?>;
fivf_vitals_historyadd.lists["x_MBuild"] = <?php echo $ivf_vitals_history_add->MBuild->Lookup->toClientList() ?>;
fivf_vitals_historyadd.lists["x_MBuild"].options = <?php echo JsonEncode($ivf_vitals_history_add->MBuild->options(FALSE, TRUE)) ?>;
fivf_vitals_historyadd.lists["x_FSkinColor"] = <?php echo $ivf_vitals_history_add->FSkinColor->Lookup->toClientList() ?>;
fivf_vitals_historyadd.lists["x_FSkinColor"].options = <?php echo JsonEncode($ivf_vitals_history_add->FSkinColor->options(FALSE, TRUE)) ?>;
fivf_vitals_historyadd.lists["x_MSkinColor"] = <?php echo $ivf_vitals_history_add->MSkinColor->Lookup->toClientList() ?>;
fivf_vitals_historyadd.lists["x_MSkinColor"].options = <?php echo JsonEncode($ivf_vitals_history_add->MSkinColor->options(FALSE, TRUE)) ?>;
fivf_vitals_historyadd.lists["x_FEyesColor"] = <?php echo $ivf_vitals_history_add->FEyesColor->Lookup->toClientList() ?>;
fivf_vitals_historyadd.lists["x_FEyesColor"].options = <?php echo JsonEncode($ivf_vitals_history_add->FEyesColor->options(FALSE, TRUE)) ?>;
fivf_vitals_historyadd.lists["x_MEyesColor"] = <?php echo $ivf_vitals_history_add->MEyesColor->Lookup->toClientList() ?>;
fivf_vitals_historyadd.lists["x_MEyesColor"].options = <?php echo JsonEncode($ivf_vitals_history_add->MEyesColor->options(FALSE, TRUE)) ?>;
fivf_vitals_historyadd.lists["x_FHairColor"] = <?php echo $ivf_vitals_history_add->FHairColor->Lookup->toClientList() ?>;
fivf_vitals_historyadd.lists["x_FHairColor"].options = <?php echo JsonEncode($ivf_vitals_history_add->FHairColor->options(FALSE, TRUE)) ?>;
fivf_vitals_historyadd.lists["x_MhairColor"] = <?php echo $ivf_vitals_history_add->MhairColor->Lookup->toClientList() ?>;
fivf_vitals_historyadd.lists["x_MhairColor"].options = <?php echo JsonEncode($ivf_vitals_history_add->MhairColor->options(FALSE, TRUE)) ?>;
fivf_vitals_historyadd.lists["x_FhairTexture"] = <?php echo $ivf_vitals_history_add->FhairTexture->Lookup->toClientList() ?>;
fivf_vitals_historyadd.lists["x_FhairTexture"].options = <?php echo JsonEncode($ivf_vitals_history_add->FhairTexture->options(FALSE, TRUE)) ?>;
fivf_vitals_historyadd.lists["x_MHairTexture"] = <?php echo $ivf_vitals_history_add->MHairTexture->Lookup->toClientList() ?>;
fivf_vitals_historyadd.lists["x_MHairTexture"].options = <?php echo JsonEncode($ivf_vitals_history_add->MHairTexture->options(FALSE, TRUE)) ?>;
fivf_vitals_historyadd.lists["x_FamilyHistory"] = <?php echo $ivf_vitals_history_add->FamilyHistory->Lookup->toClientList() ?>;
fivf_vitals_historyadd.lists["x_FamilyHistory"].options = <?php echo JsonEncode($ivf_vitals_history_add->FamilyHistory->lookupOptions()) ?>;
fivf_vitals_historyadd.autoSuggests["x_FamilyHistory"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fivf_vitals_historyadd.lists["x_Addictions[]"] = <?php echo $ivf_vitals_history_add->Addictions->Lookup->toClientList() ?>;
fivf_vitals_historyadd.lists["x_Addictions[]"].options = <?php echo JsonEncode($ivf_vitals_history_add->Addictions->options(FALSE, TRUE)) ?>;
fivf_vitals_historyadd.lists["x_Medical"] = <?php echo $ivf_vitals_history_add->Medical->Lookup->toClientList() ?>;
fivf_vitals_historyadd.lists["x_Medical"].options = <?php echo JsonEncode($ivf_vitals_history_add->Medical->options(FALSE, TRUE)) ?>;
fivf_vitals_historyadd.lists["x_Surgical"] = <?php echo $ivf_vitals_history_add->Surgical->Lookup->toClientList() ?>;
fivf_vitals_historyadd.lists["x_Surgical"].options = <?php echo JsonEncode($ivf_vitals_history_add->Surgical->lookupOptions()) ?>;
fivf_vitals_historyadd.autoSuggests["x_Surgical"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fivf_vitals_historyadd.lists["x_CoitalHistory"] = <?php echo $ivf_vitals_history_add->CoitalHistory->Lookup->toClientList() ?>;
fivf_vitals_historyadd.lists["x_CoitalHistory"].options = <?php echo JsonEncode($ivf_vitals_history_add->CoitalHistory->lookupOptions()) ?>;
fivf_vitals_historyadd.autoSuggests["x_CoitalHistory"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fivf_vitals_historyadd.lists["x_TemplateMenstrualHistory"] = <?php echo $ivf_vitals_history_add->TemplateMenstrualHistory->Lookup->toClientList() ?>;
fivf_vitals_historyadd.lists["x_TemplateMenstrualHistory"].options = <?php echo JsonEncode($ivf_vitals_history_add->TemplateMenstrualHistory->lookupOptions()) ?>;
fivf_vitals_historyadd.lists["x_TemplateObstetricHistory"] = <?php echo $ivf_vitals_history_add->TemplateObstetricHistory->Lookup->toClientList() ?>;
fivf_vitals_historyadd.lists["x_TemplateObstetricHistory"].options = <?php echo JsonEncode($ivf_vitals_history_add->TemplateObstetricHistory->lookupOptions()) ?>;
fivf_vitals_historyadd.lists["x_TemplateFertilityTreatmentHistory"] = <?php echo $ivf_vitals_history_add->TemplateFertilityTreatmentHistory->Lookup->toClientList() ?>;
fivf_vitals_historyadd.lists["x_TemplateFertilityTreatmentHistory"].options = <?php echo JsonEncode($ivf_vitals_history_add->TemplateFertilityTreatmentHistory->lookupOptions()) ?>;
fivf_vitals_historyadd.lists["x_TemplateSurgeryHistory"] = <?php echo $ivf_vitals_history_add->TemplateSurgeryHistory->Lookup->toClientList() ?>;
fivf_vitals_historyadd.lists["x_TemplateSurgeryHistory"].options = <?php echo JsonEncode($ivf_vitals_history_add->TemplateSurgeryHistory->lookupOptions()) ?>;
fivf_vitals_historyadd.lists["x_TemplateFInvestigations"] = <?php echo $ivf_vitals_history_add->TemplateFInvestigations->Lookup->toClientList() ?>;
fivf_vitals_historyadd.lists["x_TemplateFInvestigations"].options = <?php echo JsonEncode($ivf_vitals_history_add->TemplateFInvestigations->lookupOptions()) ?>;
fivf_vitals_historyadd.lists["x_TemplatePlanOfManagement"] = <?php echo $ivf_vitals_history_add->TemplatePlanOfManagement->Lookup->toClientList() ?>;
fivf_vitals_historyadd.lists["x_TemplatePlanOfManagement"].options = <?php echo JsonEncode($ivf_vitals_history_add->TemplatePlanOfManagement->lookupOptions()) ?>;
fivf_vitals_historyadd.lists["x_TemplatePImpression"] = <?php echo $ivf_vitals_history_add->TemplatePImpression->Lookup->toClientList() ?>;
fivf_vitals_historyadd.lists["x_TemplatePImpression"].options = <?php echo JsonEncode($ivf_vitals_history_add->TemplatePImpression->lookupOptions()) ?>;
fivf_vitals_historyadd.lists["x_TemplateMedications"] = <?php echo $ivf_vitals_history_add->TemplateMedications->Lookup->toClientList() ?>;
fivf_vitals_historyadd.lists["x_TemplateMedications"].options = <?php echo JsonEncode($ivf_vitals_history_add->TemplateMedications->lookupOptions()) ?>;
fivf_vitals_historyadd.lists["x_TemplateSemenAnalysis"] = <?php echo $ivf_vitals_history_add->TemplateSemenAnalysis->Lookup->toClientList() ?>;
fivf_vitals_historyadd.lists["x_TemplateSemenAnalysis"].options = <?php echo JsonEncode($ivf_vitals_history_add->TemplateSemenAnalysis->lookupOptions()) ?>;
fivf_vitals_historyadd.lists["x_MaleInsvestications"] = <?php echo $ivf_vitals_history_add->MaleInsvestications->Lookup->toClientList() ?>;
fivf_vitals_historyadd.lists["x_MaleInsvestications"].options = <?php echo JsonEncode($ivf_vitals_history_add->MaleInsvestications->lookupOptions()) ?>;
fivf_vitals_historyadd.lists["x_TemplateMIMpression"] = <?php echo $ivf_vitals_history_add->TemplateMIMpression->Lookup->toClientList() ?>;
fivf_vitals_historyadd.lists["x_TemplateMIMpression"].options = <?php echo JsonEncode($ivf_vitals_history_add->TemplateMIMpression->lookupOptions()) ?>;
fivf_vitals_historyadd.lists["x_TemplateMalePlanOfManagement"] = <?php echo $ivf_vitals_history_add->TemplateMalePlanOfManagement->Lookup->toClientList() ?>;
fivf_vitals_historyadd.lists["x_TemplateMalePlanOfManagement"].options = <?php echo JsonEncode($ivf_vitals_history_add->TemplateMalePlanOfManagement->lookupOptions()) ?>;
fivf_vitals_historyadd.lists["x_pFamilyHistory"] = <?php echo $ivf_vitals_history_add->pFamilyHistory->Lookup->toClientList() ?>;
fivf_vitals_historyadd.lists["x_pFamilyHistory"].options = <?php echo JsonEncode($ivf_vitals_history_add->pFamilyHistory->lookupOptions()) ?>;
fivf_vitals_historyadd.autoSuggests["x_pFamilyHistory"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $ivf_vitals_history_add->showPageHeader(); ?>
<?php
$ivf_vitals_history_add->showMessage();
?>
<form name="fivf_vitals_historyadd" id="fivf_vitals_historyadd" class="<?php echo $ivf_vitals_history_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_vitals_history_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_vitals_history_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_vitals_history">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_vitals_history_add->IsModal ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($ivf_vitals_history->RIDNO->Visible) { // RIDNO ?>
	<div id="r_RIDNO" class="form-group row">
		<label id="elh_ivf_vitals_history_RIDNO" for="x_RIDNO" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_RIDNO" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->RIDNO->caption() ?><?php echo ($ivf_vitals_history->RIDNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->RIDNO->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_RIDNO" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_RIDNO">
<input type="text" data-table="ivf_vitals_history" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" size="30" placeholder="<?php echo HtmlEncode($ivf_vitals_history->RIDNO->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->RIDNO->EditValue ?>"<?php echo $ivf_vitals_history->RIDNO->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_vitals_history->RIDNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->Name->Visible) { // Name ?>
	<div id="r_Name" class="form-group row">
		<label id="elh_ivf_vitals_history_Name" for="x_Name" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_Name" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->Name->caption() ?><?php echo ($ivf_vitals_history->Name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->Name->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Name" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_Name">
<input type="text" data-table="ivf_vitals_history" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Name->EditValue ?>"<?php echo $ivf_vitals_history->Name->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_vitals_history->Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_ivf_vitals_history_Age" for="x_Age" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_Age" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->Age->caption() ?><?php echo ($ivf_vitals_history->Age->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->Age->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Age" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_Age">
<input type="text" data-table="ivf_vitals_history" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Age->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Age->EditValue ?>"<?php echo $ivf_vitals_history->Age->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_vitals_history->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->SEX->Visible) { // SEX ?>
	<div id="r_SEX" class="form-group row">
		<label id="elh_ivf_vitals_history_SEX" for="x_SEX" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_SEX" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->SEX->caption() ?><?php echo ($ivf_vitals_history->SEX->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->SEX->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_SEX" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_SEX">
<input type="text" data-table="ivf_vitals_history" data-field="x_SEX" name="x_SEX" id="x_SEX" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->SEX->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->SEX->EditValue ?>"<?php echo $ivf_vitals_history->SEX->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_vitals_history->SEX->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->Religion->Visible) { // Religion ?>
	<div id="r_Religion" class="form-group row">
		<label id="elh_ivf_vitals_history_Religion" for="x_Religion" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_Religion" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->Religion->caption() ?><?php echo ($ivf_vitals_history->Religion->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->Religion->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Religion" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_Religion">
<input type="text" data-table="ivf_vitals_history" data-field="x_Religion" name="x_Religion" id="x_Religion" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Religion->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Religion->EditValue ?>"<?php echo $ivf_vitals_history->Religion->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_vitals_history->Religion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->Address->Visible) { // Address ?>
	<div id="r_Address" class="form-group row">
		<label id="elh_ivf_vitals_history_Address" for="x_Address" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_Address" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->Address->caption() ?><?php echo ($ivf_vitals_history->Address->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->Address->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Address" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_Address">
<input type="text" data-table="ivf_vitals_history" data-field="x_Address" name="x_Address" id="x_Address" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Address->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Address->EditValue ?>"<?php echo $ivf_vitals_history->Address->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_vitals_history->Address->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->IdentificationMark->Visible) { // IdentificationMark ?>
	<div id="r_IdentificationMark" class="form-group row">
		<label id="elh_ivf_vitals_history_IdentificationMark" for="x_IdentificationMark" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_IdentificationMark" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->IdentificationMark->caption() ?><?php echo ($ivf_vitals_history->IdentificationMark->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->IdentificationMark->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_IdentificationMark" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_IdentificationMark">
<input type="text" data-table="ivf_vitals_history" data-field="x_IdentificationMark" name="x_IdentificationMark" id="x_IdentificationMark" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->IdentificationMark->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->IdentificationMark->EditValue ?>"<?php echo $ivf_vitals_history->IdentificationMark->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_vitals_history->IdentificationMark->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->DoublewitnessName1->Visible) { // DoublewitnessName1 ?>
	<div id="r_DoublewitnessName1" class="form-group row">
		<label id="elh_ivf_vitals_history_DoublewitnessName1" for="x_DoublewitnessName1" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_DoublewitnessName1" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->DoublewitnessName1->caption() ?><?php echo ($ivf_vitals_history->DoublewitnessName1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->DoublewitnessName1->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_DoublewitnessName1" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_DoublewitnessName1">
<textarea data-table="ivf_vitals_history" data-field="x_DoublewitnessName1" name="x_DoublewitnessName1" id="x_DoublewitnessName1" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history->DoublewitnessName1->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history->DoublewitnessName1->editAttributes() ?>><?php echo $ivf_vitals_history->DoublewitnessName1->EditValue ?></textarea>
</span>
</script>
<?php echo $ivf_vitals_history->DoublewitnessName1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->DoublewitnessName2->Visible) { // DoublewitnessName2 ?>
	<div id="r_DoublewitnessName2" class="form-group row">
		<label id="elh_ivf_vitals_history_DoublewitnessName2" for="x_DoublewitnessName2" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_DoublewitnessName2" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->DoublewitnessName2->caption() ?><?php echo ($ivf_vitals_history->DoublewitnessName2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->DoublewitnessName2->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_DoublewitnessName2" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_DoublewitnessName2">
<textarea data-table="ivf_vitals_history" data-field="x_DoublewitnessName2" name="x_DoublewitnessName2" id="x_DoublewitnessName2" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history->DoublewitnessName2->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history->DoublewitnessName2->editAttributes() ?>><?php echo $ivf_vitals_history->DoublewitnessName2->EditValue ?></textarea>
</span>
</script>
<?php echo $ivf_vitals_history->DoublewitnessName2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
	<div id="r_Chiefcomplaints" class="form-group row">
		<label id="elh_ivf_vitals_history_Chiefcomplaints" for="x_Chiefcomplaints" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_Chiefcomplaints" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->Chiefcomplaints->caption() ?><?php echo ($ivf_vitals_history->Chiefcomplaints->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->Chiefcomplaints->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Chiefcomplaints" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_Chiefcomplaints">
<textarea data-table="ivf_vitals_history" data-field="x_Chiefcomplaints" name="x_Chiefcomplaints" id="x_Chiefcomplaints" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Chiefcomplaints->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history->Chiefcomplaints->editAttributes() ?>><?php echo $ivf_vitals_history->Chiefcomplaints->EditValue ?></textarea>
</span>
</script>
<?php echo $ivf_vitals_history->Chiefcomplaints->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->MenstrualHistory->Visible) { // MenstrualHistory ?>
	<div id="r_MenstrualHistory" class="form-group row">
		<label id="elh_ivf_vitals_history_MenstrualHistory" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_MenstrualHistory" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->MenstrualHistory->caption() ?><?php echo ($ivf_vitals_history->MenstrualHistory->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->MenstrualHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MenstrualHistory" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_MenstrualHistory">
<?php AppendClass($ivf_vitals_history->MenstrualHistory->EditAttrs["class"], "editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_MenstrualHistory" name="x_MenstrualHistory" id="x_MenstrualHistory" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history->MenstrualHistory->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history->MenstrualHistory->editAttributes() ?>><?php echo $ivf_vitals_history->MenstrualHistory->EditValue ?></textarea>
</span>
</script>
<script type="text/html" class="ivf_vitals_historyadd_js">
ew.createEditor("fivf_vitals_historyadd", "x_MenstrualHistory", 0, 0, <?php echo ($ivf_vitals_history->MenstrualHistory->ReadOnly || FALSE) ? "true" : "false" ?>);
</script>
<?php echo $ivf_vitals_history->MenstrualHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->ObstetricHistory->Visible) { // ObstetricHistory ?>
	<div id="r_ObstetricHistory" class="form-group row">
		<label id="elh_ivf_vitals_history_ObstetricHistory" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_ObstetricHistory" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->ObstetricHistory->caption() ?><?php echo ($ivf_vitals_history->ObstetricHistory->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->ObstetricHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_ObstetricHistory" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_ObstetricHistory">
<?php AppendClass($ivf_vitals_history->ObstetricHistory->EditAttrs["class"], "editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_ObstetricHistory" name="x_ObstetricHistory" id="x_ObstetricHistory" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history->ObstetricHistory->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history->ObstetricHistory->editAttributes() ?>><?php echo $ivf_vitals_history->ObstetricHistory->EditValue ?></textarea>
</span>
</script>
<script type="text/html" class="ivf_vitals_historyadd_js">
ew.createEditor("fivf_vitals_historyadd", "x_ObstetricHistory", 0, 0, <?php echo ($ivf_vitals_history->ObstetricHistory->ReadOnly || FALSE) ? "true" : "false" ?>);
</script>
<?php echo $ivf_vitals_history->ObstetricHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->MedicalHistory->Visible) { // MedicalHistory ?>
	<div id="r_MedicalHistory" class="form-group row">
		<label id="elh_ivf_vitals_history_MedicalHistory" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_MedicalHistory" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->MedicalHistory->caption() ?><?php echo ($ivf_vitals_history->MedicalHistory->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->MedicalHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MedicalHistory" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_MedicalHistory">
<div class="btn-group ew-dropdown-list" role="group">
	<div class="btn-group" role="group">
		<button type="button" class="btn form-control dropdown-toggle ew-dropdown-toggle" aria-haspopup="true" aria-expanded="false"<?php if ($ivf_vitals_history->MedicalHistory->ReadOnly) { ?> readonly<?php } else { ?>data-toggle="dropdown"<?php } ?>><?php echo $ivf_vitals_history->MedicalHistory->ViewValue ?></button>
		<div id="dsl_x_MedicalHistory" data-repeatcolumn="5" class="dropdown-menu">
			<div class="ew-items" style="overflow-x: hidden;">
<?php echo $ivf_vitals_history->MedicalHistory->checkBoxListHtml(TRUE, "x_MedicalHistory[]") ?>
			</div><!-- /.ew-items ##-->
		</div><!-- /.dropdown-menu ##-->
		<div id="tp_x_MedicalHistory" class="ew-template"><input type="checkbox" class="form-check-input" data-table="ivf_vitals_history" data-field="x_MedicalHistory" data-value-separator="<?php echo $ivf_vitals_history->MedicalHistory->displayValueSeparatorAttribute() ?>" name="x_MedicalHistory[]" id="x_MedicalHistory[]" value="{value}"<?php echo $ivf_vitals_history->MedicalHistory->editAttributes() ?>></div>
	</div><!-- /.btn-group ##-->
	<?php if (!$ivf_vitals_history->MedicalHistory->ReadOnly) { ?>
	<button type="button" class="btn btn-default ew-dropdown-clear" disabled>
		<i class="fa fa-times ew-icon"></i>
	</button>
	<?php } ?>
</div><!-- /.ew-dropdown-list ##-->
</span>
</script>
<?php echo $ivf_vitals_history->MedicalHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->SurgicalHistory->Visible) { // SurgicalHistory ?>
	<div id="r_SurgicalHistory" class="form-group row">
		<label id="elh_ivf_vitals_history_SurgicalHistory" for="x_SurgicalHistory" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_SurgicalHistory" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->SurgicalHistory->caption() ?><?php echo ($ivf_vitals_history->SurgicalHistory->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->SurgicalHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_SurgicalHistory" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_SurgicalHistory">
<input type="text" data-table="ivf_vitals_history" data-field="x_SurgicalHistory" name="x_SurgicalHistory" id="x_SurgicalHistory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->SurgicalHistory->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->SurgicalHistory->EditValue ?>"<?php echo $ivf_vitals_history->SurgicalHistory->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_vitals_history->SurgicalHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->Generalexaminationpallor->Visible) { // Generalexaminationpallor ?>
	<div id="r_Generalexaminationpallor" class="form-group row">
		<label id="elh_ivf_vitals_history_Generalexaminationpallor" for="x_Generalexaminationpallor" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_Generalexaminationpallor" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->Generalexaminationpallor->caption() ?><?php echo ($ivf_vitals_history->Generalexaminationpallor->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->Generalexaminationpallor->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Generalexaminationpallor" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_Generalexaminationpallor">
<input type="text" data-table="ivf_vitals_history" data-field="x_Generalexaminationpallor" name="x_Generalexaminationpallor" id="x_Generalexaminationpallor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Generalexaminationpallor->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Generalexaminationpallor->EditValue ?>"<?php echo $ivf_vitals_history->Generalexaminationpallor->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_vitals_history->Generalexaminationpallor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->PR->Visible) { // PR ?>
	<div id="r_PR" class="form-group row">
		<label id="elh_ivf_vitals_history_PR" for="x_PR" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_PR" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->PR->caption() ?><?php echo ($ivf_vitals_history->PR->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->PR->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PR" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_PR">
<input type="text" data-table="ivf_vitals_history" data-field="x_PR" name="x_PR" id="x_PR" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->PR->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->PR->EditValue ?>"<?php echo $ivf_vitals_history->PR->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_vitals_history->PR->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->CVS->Visible) { // CVS ?>
	<div id="r_CVS" class="form-group row">
		<label id="elh_ivf_vitals_history_CVS" for="x_CVS" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_CVS" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->CVS->caption() ?><?php echo ($ivf_vitals_history->CVS->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->CVS->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_CVS" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_CVS">
<input type="text" data-table="ivf_vitals_history" data-field="x_CVS" name="x_CVS" id="x_CVS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->CVS->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->CVS->EditValue ?>"<?php echo $ivf_vitals_history->CVS->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_vitals_history->CVS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->PA->Visible) { // PA ?>
	<div id="r_PA" class="form-group row">
		<label id="elh_ivf_vitals_history_PA" for="x_PA" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_PA" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->PA->caption() ?><?php echo ($ivf_vitals_history->PA->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->PA->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PA" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_PA">
<input type="text" data-table="ivf_vitals_history" data-field="x_PA" name="x_PA" id="x_PA" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->PA->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->PA->EditValue ?>"<?php echo $ivf_vitals_history->PA->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_vitals_history->PA->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
	<div id="r_PROVISIONALDIAGNOSIS" class="form-group row">
		<label id="elh_ivf_vitals_history_PROVISIONALDIAGNOSIS" for="x_PROVISIONALDIAGNOSIS" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_PROVISIONALDIAGNOSIS" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->PROVISIONALDIAGNOSIS->caption() ?><?php echo ($ivf_vitals_history->PROVISIONALDIAGNOSIS->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->PROVISIONALDIAGNOSIS->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PROVISIONALDIAGNOSIS" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_PROVISIONALDIAGNOSIS">
<input type="text" data-table="ivf_vitals_history" data-field="x_PROVISIONALDIAGNOSIS" name="x_PROVISIONALDIAGNOSIS" id="x_PROVISIONALDIAGNOSIS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->PROVISIONALDIAGNOSIS->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->PROVISIONALDIAGNOSIS->EditValue ?>"<?php echo $ivf_vitals_history->PROVISIONALDIAGNOSIS->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_vitals_history->PROVISIONALDIAGNOSIS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->Investigations->Visible) { // Investigations ?>
	<div id="r_Investigations" class="form-group row">
		<label id="elh_ivf_vitals_history_Investigations" for="x_Investigations" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_Investigations" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->Investigations->caption() ?><?php echo ($ivf_vitals_history->Investigations->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->Investigations->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Investigations" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_Investigations">
<input type="text" data-table="ivf_vitals_history" data-field="x_Investigations" name="x_Investigations" id="x_Investigations" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Investigations->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Investigations->EditValue ?>"<?php echo $ivf_vitals_history->Investigations->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_vitals_history->Investigations->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->Fheight->Visible) { // Fheight ?>
	<div id="r_Fheight" class="form-group row">
		<label id="elh_ivf_vitals_history_Fheight" for="x_Fheight" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_Fheight" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->Fheight->caption() ?><?php echo ($ivf_vitals_history->Fheight->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->Fheight->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Fheight" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_Fheight">
<input type="text" data-table="ivf_vitals_history" data-field="x_Fheight" name="x_Fheight" id="x_Fheight" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Fheight->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Fheight->EditValue ?>"<?php echo $ivf_vitals_history->Fheight->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_vitals_history->Fheight->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->Fweight->Visible) { // Fweight ?>
	<div id="r_Fweight" class="form-group row">
		<label id="elh_ivf_vitals_history_Fweight" for="x_Fweight" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_Fweight" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->Fweight->caption() ?><?php echo ($ivf_vitals_history->Fweight->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->Fweight->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Fweight" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_Fweight">
<input type="text" data-table="ivf_vitals_history" data-field="x_Fweight" name="x_Fweight" id="x_Fweight" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Fweight->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Fweight->EditValue ?>"<?php echo $ivf_vitals_history->Fweight->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_vitals_history->Fweight->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->FBMI->Visible) { // FBMI ?>
	<div id="r_FBMI" class="form-group row">
		<label id="elh_ivf_vitals_history_FBMI" for="x_FBMI" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_FBMI" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->FBMI->caption() ?><?php echo ($ivf_vitals_history->FBMI->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->FBMI->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_FBMI" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_FBMI">
<input type="text" data-table="ivf_vitals_history" data-field="x_FBMI" name="x_FBMI" id="x_FBMI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->FBMI->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->FBMI->EditValue ?>"<?php echo $ivf_vitals_history->FBMI->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_vitals_history->FBMI->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->FBloodgroup->Visible) { // FBloodgroup ?>
	<div id="r_FBloodgroup" class="form-group row">
		<label id="elh_ivf_vitals_history_FBloodgroup" for="x_FBloodgroup" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_FBloodgroup" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->FBloodgroup->caption() ?><?php echo ($ivf_vitals_history->FBloodgroup->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->FBloodgroup->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_FBloodgroup" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_FBloodgroup">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_FBloodgroup" data-value-separator="<?php echo $ivf_vitals_history->FBloodgroup->displayValueSeparatorAttribute() ?>" id="x_FBloodgroup" name="x_FBloodgroup"<?php echo $ivf_vitals_history->FBloodgroup->editAttributes() ?>>
		<?php echo $ivf_vitals_history->FBloodgroup->selectOptionListHtml("x_FBloodgroup") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_bloodgroup") && !$ivf_vitals_history->FBloodgroup->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_FBloodgroup" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_vitals_history->FBloodgroup->caption() ?>" data-title="<?php echo $ivf_vitals_history->FBloodgroup->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_FBloodgroup',url:'mas_bloodgroupaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $ivf_vitals_history->FBloodgroup->Lookup->getParamTag("p_x_FBloodgroup") ?>
</span>
</script>
<?php echo $ivf_vitals_history->FBloodgroup->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->Mheight->Visible) { // Mheight ?>
	<div id="r_Mheight" class="form-group row">
		<label id="elh_ivf_vitals_history_Mheight" for="x_Mheight" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_Mheight" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->Mheight->caption() ?><?php echo ($ivf_vitals_history->Mheight->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->Mheight->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Mheight" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_Mheight">
<input type="text" data-table="ivf_vitals_history" data-field="x_Mheight" name="x_Mheight" id="x_Mheight" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Mheight->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Mheight->EditValue ?>"<?php echo $ivf_vitals_history->Mheight->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_vitals_history->Mheight->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->Mweight->Visible) { // Mweight ?>
	<div id="r_Mweight" class="form-group row">
		<label id="elh_ivf_vitals_history_Mweight" for="x_Mweight" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_Mweight" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->Mweight->caption() ?><?php echo ($ivf_vitals_history->Mweight->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->Mweight->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Mweight" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_Mweight">
<input type="text" data-table="ivf_vitals_history" data-field="x_Mweight" name="x_Mweight" id="x_Mweight" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Mweight->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Mweight->EditValue ?>"<?php echo $ivf_vitals_history->Mweight->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_vitals_history->Mweight->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->MBMI->Visible) { // MBMI ?>
	<div id="r_MBMI" class="form-group row">
		<label id="elh_ivf_vitals_history_MBMI" for="x_MBMI" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_MBMI" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->MBMI->caption() ?><?php echo ($ivf_vitals_history->MBMI->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->MBMI->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MBMI" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_MBMI">
<input type="text" data-table="ivf_vitals_history" data-field="x_MBMI" name="x_MBMI" id="x_MBMI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->MBMI->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->MBMI->EditValue ?>"<?php echo $ivf_vitals_history->MBMI->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_vitals_history->MBMI->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->MBloodgroup->Visible) { // MBloodgroup ?>
	<div id="r_MBloodgroup" class="form-group row">
		<label id="elh_ivf_vitals_history_MBloodgroup" for="x_MBloodgroup" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_MBloodgroup" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->MBloodgroup->caption() ?><?php echo ($ivf_vitals_history->MBloodgroup->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->MBloodgroup->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MBloodgroup" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_MBloodgroup">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_MBloodgroup" data-value-separator="<?php echo $ivf_vitals_history->MBloodgroup->displayValueSeparatorAttribute() ?>" id="x_MBloodgroup" name="x_MBloodgroup"<?php echo $ivf_vitals_history->MBloodgroup->editAttributes() ?>>
		<?php echo $ivf_vitals_history->MBloodgroup->selectOptionListHtml("x_MBloodgroup") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_bloodgroup") && !$ivf_vitals_history->MBloodgroup->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_MBloodgroup" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_vitals_history->MBloodgroup->caption() ?>" data-title="<?php echo $ivf_vitals_history->MBloodgroup->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_MBloodgroup',url:'mas_bloodgroupaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $ivf_vitals_history->MBloodgroup->Lookup->getParamTag("p_x_MBloodgroup") ?>
</span>
</script>
<?php echo $ivf_vitals_history->MBloodgroup->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->FBuild->Visible) { // FBuild ?>
	<div id="r_FBuild" class="form-group row">
		<label id="elh_ivf_vitals_history_FBuild" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_FBuild" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->FBuild->caption() ?><?php echo ($ivf_vitals_history->FBuild->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->FBuild->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_FBuild" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_FBuild">
<div id="tp_x_FBuild" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_vitals_history" data-field="x_FBuild" data-value-separator="<?php echo $ivf_vitals_history->FBuild->displayValueSeparatorAttribute() ?>" name="x_FBuild" id="x_FBuild" value="{value}"<?php echo $ivf_vitals_history->FBuild->editAttributes() ?>></div>
<div id="dsl_x_FBuild" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history->FBuild->radioButtonListHtml(FALSE, "x_FBuild") ?>
</div></div>
</span>
</script>
<?php echo $ivf_vitals_history->FBuild->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->MBuild->Visible) { // MBuild ?>
	<div id="r_MBuild" class="form-group row">
		<label id="elh_ivf_vitals_history_MBuild" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_MBuild" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->MBuild->caption() ?><?php echo ($ivf_vitals_history->MBuild->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->MBuild->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MBuild" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_MBuild">
<div id="tp_x_MBuild" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_vitals_history" data-field="x_MBuild" data-value-separator="<?php echo $ivf_vitals_history->MBuild->displayValueSeparatorAttribute() ?>" name="x_MBuild" id="x_MBuild" value="{value}"<?php echo $ivf_vitals_history->MBuild->editAttributes() ?>></div>
<div id="dsl_x_MBuild" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history->MBuild->radioButtonListHtml(FALSE, "x_MBuild") ?>
</div></div>
</span>
</script>
<?php echo $ivf_vitals_history->MBuild->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->FSkinColor->Visible) { // FSkinColor ?>
	<div id="r_FSkinColor" class="form-group row">
		<label id="elh_ivf_vitals_history_FSkinColor" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_FSkinColor" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->FSkinColor->caption() ?><?php echo ($ivf_vitals_history->FSkinColor->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->FSkinColor->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_FSkinColor" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_FSkinColor">
<div id="tp_x_FSkinColor" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_vitals_history" data-field="x_FSkinColor" data-value-separator="<?php echo $ivf_vitals_history->FSkinColor->displayValueSeparatorAttribute() ?>" name="x_FSkinColor" id="x_FSkinColor" value="{value}"<?php echo $ivf_vitals_history->FSkinColor->editAttributes() ?>></div>
<div id="dsl_x_FSkinColor" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history->FSkinColor->radioButtonListHtml(FALSE, "x_FSkinColor") ?>
</div></div>
</span>
</script>
<?php echo $ivf_vitals_history->FSkinColor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->MSkinColor->Visible) { // MSkinColor ?>
	<div id="r_MSkinColor" class="form-group row">
		<label id="elh_ivf_vitals_history_MSkinColor" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_MSkinColor" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->MSkinColor->caption() ?><?php echo ($ivf_vitals_history->MSkinColor->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->MSkinColor->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MSkinColor" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_MSkinColor">
<div id="tp_x_MSkinColor" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_vitals_history" data-field="x_MSkinColor" data-value-separator="<?php echo $ivf_vitals_history->MSkinColor->displayValueSeparatorAttribute() ?>" name="x_MSkinColor" id="x_MSkinColor" value="{value}"<?php echo $ivf_vitals_history->MSkinColor->editAttributes() ?>></div>
<div id="dsl_x_MSkinColor" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history->MSkinColor->radioButtonListHtml(FALSE, "x_MSkinColor") ?>
</div></div>
</span>
</script>
<?php echo $ivf_vitals_history->MSkinColor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->FEyesColor->Visible) { // FEyesColor ?>
	<div id="r_FEyesColor" class="form-group row">
		<label id="elh_ivf_vitals_history_FEyesColor" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_FEyesColor" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->FEyesColor->caption() ?><?php echo ($ivf_vitals_history->FEyesColor->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->FEyesColor->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_FEyesColor" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_FEyesColor">
<div id="tp_x_FEyesColor" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_vitals_history" data-field="x_FEyesColor" data-value-separator="<?php echo $ivf_vitals_history->FEyesColor->displayValueSeparatorAttribute() ?>" name="x_FEyesColor" id="x_FEyesColor" value="{value}"<?php echo $ivf_vitals_history->FEyesColor->editAttributes() ?>></div>
<div id="dsl_x_FEyesColor" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history->FEyesColor->radioButtonListHtml(FALSE, "x_FEyesColor") ?>
</div></div>
</span>
</script>
<?php echo $ivf_vitals_history->FEyesColor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->MEyesColor->Visible) { // MEyesColor ?>
	<div id="r_MEyesColor" class="form-group row">
		<label id="elh_ivf_vitals_history_MEyesColor" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_MEyesColor" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->MEyesColor->caption() ?><?php echo ($ivf_vitals_history->MEyesColor->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->MEyesColor->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MEyesColor" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_MEyesColor">
<div id="tp_x_MEyesColor" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_vitals_history" data-field="x_MEyesColor" data-value-separator="<?php echo $ivf_vitals_history->MEyesColor->displayValueSeparatorAttribute() ?>" name="x_MEyesColor" id="x_MEyesColor" value="{value}"<?php echo $ivf_vitals_history->MEyesColor->editAttributes() ?>></div>
<div id="dsl_x_MEyesColor" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history->MEyesColor->radioButtonListHtml(FALSE, "x_MEyesColor") ?>
</div></div>
</span>
</script>
<?php echo $ivf_vitals_history->MEyesColor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->FHairColor->Visible) { // FHairColor ?>
	<div id="r_FHairColor" class="form-group row">
		<label id="elh_ivf_vitals_history_FHairColor" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_FHairColor" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->FHairColor->caption() ?><?php echo ($ivf_vitals_history->FHairColor->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->FHairColor->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_FHairColor" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_FHairColor">
<div id="tp_x_FHairColor" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_vitals_history" data-field="x_FHairColor" data-value-separator="<?php echo $ivf_vitals_history->FHairColor->displayValueSeparatorAttribute() ?>" name="x_FHairColor" id="x_FHairColor" value="{value}"<?php echo $ivf_vitals_history->FHairColor->editAttributes() ?>></div>
<div id="dsl_x_FHairColor" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history->FHairColor->radioButtonListHtml(FALSE, "x_FHairColor") ?>
</div></div>
</span>
</script>
<?php echo $ivf_vitals_history->FHairColor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->MhairColor->Visible) { // MhairColor ?>
	<div id="r_MhairColor" class="form-group row">
		<label id="elh_ivf_vitals_history_MhairColor" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_MhairColor" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->MhairColor->caption() ?><?php echo ($ivf_vitals_history->MhairColor->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->MhairColor->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MhairColor" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_MhairColor">
<div id="tp_x_MhairColor" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_vitals_history" data-field="x_MhairColor" data-value-separator="<?php echo $ivf_vitals_history->MhairColor->displayValueSeparatorAttribute() ?>" name="x_MhairColor" id="x_MhairColor" value="{value}"<?php echo $ivf_vitals_history->MhairColor->editAttributes() ?>></div>
<div id="dsl_x_MhairColor" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history->MhairColor->radioButtonListHtml(FALSE, "x_MhairColor") ?>
</div></div>
</span>
</script>
<?php echo $ivf_vitals_history->MhairColor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->FhairTexture->Visible) { // FhairTexture ?>
	<div id="r_FhairTexture" class="form-group row">
		<label id="elh_ivf_vitals_history_FhairTexture" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_FhairTexture" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->FhairTexture->caption() ?><?php echo ($ivf_vitals_history->FhairTexture->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->FhairTexture->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_FhairTexture" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_FhairTexture">
<div id="tp_x_FhairTexture" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_vitals_history" data-field="x_FhairTexture" data-value-separator="<?php echo $ivf_vitals_history->FhairTexture->displayValueSeparatorAttribute() ?>" name="x_FhairTexture" id="x_FhairTexture" value="{value}"<?php echo $ivf_vitals_history->FhairTexture->editAttributes() ?>></div>
<div id="dsl_x_FhairTexture" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history->FhairTexture->radioButtonListHtml(FALSE, "x_FhairTexture") ?>
</div></div>
</span>
</script>
<?php echo $ivf_vitals_history->FhairTexture->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->MHairTexture->Visible) { // MHairTexture ?>
	<div id="r_MHairTexture" class="form-group row">
		<label id="elh_ivf_vitals_history_MHairTexture" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_MHairTexture" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->MHairTexture->caption() ?><?php echo ($ivf_vitals_history->MHairTexture->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->MHairTexture->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MHairTexture" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_MHairTexture">
<div id="tp_x_MHairTexture" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_vitals_history" data-field="x_MHairTexture" data-value-separator="<?php echo $ivf_vitals_history->MHairTexture->displayValueSeparatorAttribute() ?>" name="x_MHairTexture" id="x_MHairTexture" value="{value}"<?php echo $ivf_vitals_history->MHairTexture->editAttributes() ?>></div>
<div id="dsl_x_MHairTexture" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history->MHairTexture->radioButtonListHtml(FALSE, "x_MHairTexture") ?>
</div></div>
</span>
</script>
<?php echo $ivf_vitals_history->MHairTexture->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->Fothers->Visible) { // Fothers ?>
	<div id="r_Fothers" class="form-group row">
		<label id="elh_ivf_vitals_history_Fothers" for="x_Fothers" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_Fothers" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->Fothers->caption() ?><?php echo ($ivf_vitals_history->Fothers->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->Fothers->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Fothers" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_Fothers">
<input type="text" data-table="ivf_vitals_history" data-field="x_Fothers" name="x_Fothers" id="x_Fothers" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Fothers->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Fothers->EditValue ?>"<?php echo $ivf_vitals_history->Fothers->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_vitals_history->Fothers->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->Mothers->Visible) { // Mothers ?>
	<div id="r_Mothers" class="form-group row">
		<label id="elh_ivf_vitals_history_Mothers" for="x_Mothers" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_Mothers" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->Mothers->caption() ?><?php echo ($ivf_vitals_history->Mothers->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->Mothers->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Mothers" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_Mothers">
<input type="text" data-table="ivf_vitals_history" data-field="x_Mothers" name="x_Mothers" id="x_Mothers" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Mothers->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Mothers->EditValue ?>"<?php echo $ivf_vitals_history->Mothers->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_vitals_history->Mothers->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->PGE->Visible) { // PGE ?>
	<div id="r_PGE" class="form-group row">
		<label id="elh_ivf_vitals_history_PGE" for="x_PGE" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_PGE" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->PGE->caption() ?><?php echo ($ivf_vitals_history->PGE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->PGE->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PGE" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_PGE">
<input type="text" data-table="ivf_vitals_history" data-field="x_PGE" name="x_PGE" id="x_PGE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->PGE->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->PGE->EditValue ?>"<?php echo $ivf_vitals_history->PGE->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_vitals_history->PGE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->PPR->Visible) { // PPR ?>
	<div id="r_PPR" class="form-group row">
		<label id="elh_ivf_vitals_history_PPR" for="x_PPR" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_PPR" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->PPR->caption() ?><?php echo ($ivf_vitals_history->PPR->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->PPR->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PPR" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_PPR">
<input type="text" data-table="ivf_vitals_history" data-field="x_PPR" name="x_PPR" id="x_PPR" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->PPR->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->PPR->EditValue ?>"<?php echo $ivf_vitals_history->PPR->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_vitals_history->PPR->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->PBP->Visible) { // PBP ?>
	<div id="r_PBP" class="form-group row">
		<label id="elh_ivf_vitals_history_PBP" for="x_PBP" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_PBP" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->PBP->caption() ?><?php echo ($ivf_vitals_history->PBP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->PBP->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PBP" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_PBP">
<input type="text" data-table="ivf_vitals_history" data-field="x_PBP" name="x_PBP" id="x_PBP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->PBP->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->PBP->EditValue ?>"<?php echo $ivf_vitals_history->PBP->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_vitals_history->PBP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->Breast->Visible) { // Breast ?>
	<div id="r_Breast" class="form-group row">
		<label id="elh_ivf_vitals_history_Breast" for="x_Breast" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_Breast" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->Breast->caption() ?><?php echo ($ivf_vitals_history->Breast->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->Breast->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Breast" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_Breast">
<input type="text" data-table="ivf_vitals_history" data-field="x_Breast" name="x_Breast" id="x_Breast" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Breast->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Breast->EditValue ?>"<?php echo $ivf_vitals_history->Breast->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_vitals_history->Breast->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->PPA->Visible) { // PPA ?>
	<div id="r_PPA" class="form-group row">
		<label id="elh_ivf_vitals_history_PPA" for="x_PPA" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_PPA" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->PPA->caption() ?><?php echo ($ivf_vitals_history->PPA->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->PPA->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PPA" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_PPA">
<input type="text" data-table="ivf_vitals_history" data-field="x_PPA" name="x_PPA" id="x_PPA" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->PPA->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->PPA->EditValue ?>"<?php echo $ivf_vitals_history->PPA->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_vitals_history->PPA->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->PPSV->Visible) { // PPSV ?>
	<div id="r_PPSV" class="form-group row">
		<label id="elh_ivf_vitals_history_PPSV" for="x_PPSV" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_PPSV" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->PPSV->caption() ?><?php echo ($ivf_vitals_history->PPSV->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->PPSV->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PPSV" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_PPSV">
<input type="text" data-table="ivf_vitals_history" data-field="x_PPSV" name="x_PPSV" id="x_PPSV" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->PPSV->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->PPSV->EditValue ?>"<?php echo $ivf_vitals_history->PPSV->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_vitals_history->PPSV->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->PPAPSMEAR->Visible) { // PPAPSMEAR ?>
	<div id="r_PPAPSMEAR" class="form-group row">
		<label id="elh_ivf_vitals_history_PPAPSMEAR" for="x_PPAPSMEAR" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_PPAPSMEAR" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->PPAPSMEAR->caption() ?><?php echo ($ivf_vitals_history->PPAPSMEAR->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->PPAPSMEAR->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PPAPSMEAR" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_PPAPSMEAR">
<input type="text" data-table="ivf_vitals_history" data-field="x_PPAPSMEAR" name="x_PPAPSMEAR" id="x_PPAPSMEAR" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->PPAPSMEAR->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->PPAPSMEAR->EditValue ?>"<?php echo $ivf_vitals_history->PPAPSMEAR->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_vitals_history->PPAPSMEAR->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->PTHYROID->Visible) { // PTHYROID ?>
	<div id="r_PTHYROID" class="form-group row">
		<label id="elh_ivf_vitals_history_PTHYROID" for="x_PTHYROID" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_PTHYROID" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->PTHYROID->caption() ?><?php echo ($ivf_vitals_history->PTHYROID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->PTHYROID->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PTHYROID" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_PTHYROID">
<input type="text" data-table="ivf_vitals_history" data-field="x_PTHYROID" name="x_PTHYROID" id="x_PTHYROID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->PTHYROID->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->PTHYROID->EditValue ?>"<?php echo $ivf_vitals_history->PTHYROID->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_vitals_history->PTHYROID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->MTHYROID->Visible) { // MTHYROID ?>
	<div id="r_MTHYROID" class="form-group row">
		<label id="elh_ivf_vitals_history_MTHYROID" for="x_MTHYROID" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_MTHYROID" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->MTHYROID->caption() ?><?php echo ($ivf_vitals_history->MTHYROID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->MTHYROID->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MTHYROID" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_MTHYROID">
<input type="text" data-table="ivf_vitals_history" data-field="x_MTHYROID" name="x_MTHYROID" id="x_MTHYROID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->MTHYROID->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->MTHYROID->EditValue ?>"<?php echo $ivf_vitals_history->MTHYROID->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_vitals_history->MTHYROID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->SecSexCharacters->Visible) { // SecSexCharacters ?>
	<div id="r_SecSexCharacters" class="form-group row">
		<label id="elh_ivf_vitals_history_SecSexCharacters" for="x_SecSexCharacters" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_SecSexCharacters" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->SecSexCharacters->caption() ?><?php echo ($ivf_vitals_history->SecSexCharacters->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->SecSexCharacters->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_SecSexCharacters" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_SecSexCharacters">
<input type="text" data-table="ivf_vitals_history" data-field="x_SecSexCharacters" name="x_SecSexCharacters" id="x_SecSexCharacters" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->SecSexCharacters->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->SecSexCharacters->EditValue ?>"<?php echo $ivf_vitals_history->SecSexCharacters->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_vitals_history->SecSexCharacters->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->PenisUM->Visible) { // PenisUM ?>
	<div id="r_PenisUM" class="form-group row">
		<label id="elh_ivf_vitals_history_PenisUM" for="x_PenisUM" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_PenisUM" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->PenisUM->caption() ?><?php echo ($ivf_vitals_history->PenisUM->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->PenisUM->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PenisUM" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_PenisUM">
<input type="text" data-table="ivf_vitals_history" data-field="x_PenisUM" name="x_PenisUM" id="x_PenisUM" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->PenisUM->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->PenisUM->EditValue ?>"<?php echo $ivf_vitals_history->PenisUM->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_vitals_history->PenisUM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->VAS->Visible) { // VAS ?>
	<div id="r_VAS" class="form-group row">
		<label id="elh_ivf_vitals_history_VAS" for="x_VAS" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_VAS" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->VAS->caption() ?><?php echo ($ivf_vitals_history->VAS->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->VAS->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_VAS" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_VAS">
<input type="text" data-table="ivf_vitals_history" data-field="x_VAS" name="x_VAS" id="x_VAS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->VAS->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->VAS->EditValue ?>"<?php echo $ivf_vitals_history->VAS->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_vitals_history->VAS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->EPIDIDYMIS->Visible) { // EPIDIDYMIS ?>
	<div id="r_EPIDIDYMIS" class="form-group row">
		<label id="elh_ivf_vitals_history_EPIDIDYMIS" for="x_EPIDIDYMIS" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_EPIDIDYMIS" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->EPIDIDYMIS->caption() ?><?php echo ($ivf_vitals_history->EPIDIDYMIS->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->EPIDIDYMIS->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_EPIDIDYMIS" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_EPIDIDYMIS">
<input type="text" data-table="ivf_vitals_history" data-field="x_EPIDIDYMIS" name="x_EPIDIDYMIS" id="x_EPIDIDYMIS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->EPIDIDYMIS->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->EPIDIDYMIS->EditValue ?>"<?php echo $ivf_vitals_history->EPIDIDYMIS->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_vitals_history->EPIDIDYMIS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->Varicocele->Visible) { // Varicocele ?>
	<div id="r_Varicocele" class="form-group row">
		<label id="elh_ivf_vitals_history_Varicocele" for="x_Varicocele" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_Varicocele" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->Varicocele->caption() ?><?php echo ($ivf_vitals_history->Varicocele->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->Varicocele->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Varicocele" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_Varicocele">
<input type="text" data-table="ivf_vitals_history" data-field="x_Varicocele" name="x_Varicocele" id="x_Varicocele" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Varicocele->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->Varicocele->EditValue ?>"<?php echo $ivf_vitals_history->Varicocele->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_vitals_history->Varicocele->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->FertilityTreatmentHistory->Visible) { // FertilityTreatmentHistory ?>
	<div id="r_FertilityTreatmentHistory" class="form-group row">
		<label id="elh_ivf_vitals_history_FertilityTreatmentHistory" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_FertilityTreatmentHistory" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->FertilityTreatmentHistory->caption() ?><?php echo ($ivf_vitals_history->FertilityTreatmentHistory->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->FertilityTreatmentHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_FertilityTreatmentHistory" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_FertilityTreatmentHistory">
<?php AppendClass($ivf_vitals_history->FertilityTreatmentHistory->EditAttrs["class"], "editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_FertilityTreatmentHistory" name="x_FertilityTreatmentHistory" id="x_FertilityTreatmentHistory" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history->FertilityTreatmentHistory->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history->FertilityTreatmentHistory->editAttributes() ?>><?php echo $ivf_vitals_history->FertilityTreatmentHistory->EditValue ?></textarea>
</span>
</script>
<script type="text/html" class="ivf_vitals_historyadd_js">
ew.createEditor("fivf_vitals_historyadd", "x_FertilityTreatmentHistory", 35, 4, <?php echo ($ivf_vitals_history->FertilityTreatmentHistory->ReadOnly || FALSE) ? "true" : "false" ?>);
</script>
<?php echo $ivf_vitals_history->FertilityTreatmentHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->SurgeryHistory->Visible) { // SurgeryHistory ?>
	<div id="r_SurgeryHistory" class="form-group row">
		<label id="elh_ivf_vitals_history_SurgeryHistory" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_SurgeryHistory" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->SurgeryHistory->caption() ?><?php echo ($ivf_vitals_history->SurgeryHistory->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->SurgeryHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_SurgeryHistory" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_SurgeryHistory">
<?php AppendClass($ivf_vitals_history->SurgeryHistory->EditAttrs["class"], "editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_SurgeryHistory" name="x_SurgeryHistory" id="x_SurgeryHistory" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history->SurgeryHistory->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history->SurgeryHistory->editAttributes() ?>><?php echo $ivf_vitals_history->SurgeryHistory->EditValue ?></textarea>
</span>
</script>
<script type="text/html" class="ivf_vitals_historyadd_js">
ew.createEditor("fivf_vitals_historyadd", "x_SurgeryHistory", 35, 4, <?php echo ($ivf_vitals_history->SurgeryHistory->ReadOnly || FALSE) ? "true" : "false" ?>);
</script>
<?php echo $ivf_vitals_history->SurgeryHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->FamilyHistory->Visible) { // FamilyHistory ?>
	<div id="r_FamilyHistory" class="form-group row">
		<label id="elh_ivf_vitals_history_FamilyHistory" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_FamilyHistory" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->FamilyHistory->caption() ?><?php echo ($ivf_vitals_history->FamilyHistory->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->FamilyHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_FamilyHistory" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_FamilyHistory">
<?php
$wrkonchange = "" . trim(@$ivf_vitals_history->FamilyHistory->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$ivf_vitals_history->FamilyHistory->EditAttrs["onchange"] = "";
?>
<span id="as_x_FamilyHistory" class="text-nowrap" style="z-index: 8420">
	<input type="text" class="form-control" name="sv_x_FamilyHistory" id="sv_x_FamilyHistory" value="<?php echo RemoveHtml($ivf_vitals_history->FamilyHistory->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->FamilyHistory->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($ivf_vitals_history->FamilyHistory->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history->FamilyHistory->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FamilyHistory" data-value-separator="<?php echo $ivf_vitals_history->FamilyHistory->displayValueSeparatorAttribute() ?>" name="x_FamilyHistory" id="x_FamilyHistory" value="<?php echo HtmlEncode($ivf_vitals_history->FamilyHistory->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<?php echo $ivf_vitals_history->FamilyHistory->Lookup->getParamTag("p_x_FamilyHistory") ?>
</span>
</script>
<script type="text/html" class="ivf_vitals_historyadd_js">
fivf_vitals_historyadd.createAutoSuggest({"id":"x_FamilyHistory","forceSelect":false});
</script>
<?php echo $ivf_vitals_history->FamilyHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->PInvestigations->Visible) { // PInvestigations ?>
	<div id="r_PInvestigations" class="form-group row">
		<label id="elh_ivf_vitals_history_PInvestigations" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_PInvestigations" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->PInvestigations->caption() ?><?php echo ($ivf_vitals_history->PInvestigations->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->PInvestigations->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PInvestigations" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_PInvestigations">
<?php AppendClass($ivf_vitals_history->PInvestigations->EditAttrs["class"], "editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_PInvestigations" name="x_PInvestigations" id="x_PInvestigations" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history->PInvestigations->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history->PInvestigations->editAttributes() ?>><?php echo $ivf_vitals_history->PInvestigations->EditValue ?></textarea>
</span>
</script>
<script type="text/html" class="ivf_vitals_historyadd_js">
ew.createEditor("fivf_vitals_historyadd", "x_PInvestigations", 35, 4, <?php echo ($ivf_vitals_history->PInvestigations->ReadOnly || FALSE) ? "true" : "false" ?>);
</script>
<?php echo $ivf_vitals_history->PInvestigations->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->Addictions->Visible) { // Addictions ?>
	<div id="r_Addictions" class="form-group row">
		<label id="elh_ivf_vitals_history_Addictions" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_Addictions" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->Addictions->caption() ?><?php echo ($ivf_vitals_history->Addictions->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->Addictions->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Addictions" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_Addictions">
<div id="tp_x_Addictions" class="ew-template"><input type="checkbox" class="form-check-input" data-table="ivf_vitals_history" data-field="x_Addictions" data-value-separator="<?php echo $ivf_vitals_history->Addictions->displayValueSeparatorAttribute() ?>" name="x_Addictions[]" id="x_Addictions[]" value="{value}"<?php echo $ivf_vitals_history->Addictions->editAttributes() ?>></div>
<div id="dsl_x_Addictions" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history->Addictions->checkBoxListHtml(FALSE, "x_Addictions[]") ?>
</div></div>
</span>
</script>
<?php echo $ivf_vitals_history->Addictions->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->Medications->Visible) { // Medications ?>
	<div id="r_Medications" class="form-group row">
		<label id="elh_ivf_vitals_history_Medications" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_Medications" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->Medications->caption() ?><?php echo ($ivf_vitals_history->Medications->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->Medications->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Medications" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_Medications">
<?php AppendClass($ivf_vitals_history->Medications->EditAttrs["class"], "editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_Medications" name="x_Medications" id="x_Medications" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Medications->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history->Medications->editAttributes() ?>><?php echo $ivf_vitals_history->Medications->EditValue ?></textarea>
</span>
</script>
<script type="text/html" class="ivf_vitals_historyadd_js">
ew.createEditor("fivf_vitals_historyadd", "x_Medications", 35, 4, <?php echo ($ivf_vitals_history->Medications->ReadOnly || FALSE) ? "true" : "false" ?>);
</script>
<?php echo $ivf_vitals_history->Medications->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->Medical->Visible) { // Medical ?>
	<div id="r_Medical" class="form-group row">
		<label id="elh_ivf_vitals_history_Medical" for="x_Medical" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_Medical" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->Medical->caption() ?><?php echo ($ivf_vitals_history->Medical->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->Medical->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Medical" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_Medical">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_Medical" data-value-separator="<?php echo $ivf_vitals_history->Medical->displayValueSeparatorAttribute() ?>" id="x_Medical" name="x_Medical"<?php echo $ivf_vitals_history->Medical->editAttributes() ?>>
		<?php echo $ivf_vitals_history->Medical->selectOptionListHtml("x_Medical") ?>
	</select>
</div>
</span>
</script>
<?php echo $ivf_vitals_history->Medical->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->Surgical->Visible) { // Surgical ?>
	<div id="r_Surgical" class="form-group row">
		<label id="elh_ivf_vitals_history_Surgical" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_Surgical" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->Surgical->caption() ?><?php echo ($ivf_vitals_history->Surgical->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->Surgical->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Surgical" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_Surgical">
<?php
$wrkonchange = "" . trim(@$ivf_vitals_history->Surgical->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$ivf_vitals_history->Surgical->EditAttrs["onchange"] = "";
?>
<span id="as_x_Surgical" class="text-nowrap" style="z-index: 8370">
	<input type="text" class="form-control" name="sv_x_Surgical" id="sv_x_Surgical" value="<?php echo RemoveHtml($ivf_vitals_history->Surgical->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($ivf_vitals_history->Surgical->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($ivf_vitals_history->Surgical->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history->Surgical->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Surgical" data-value-separator="<?php echo $ivf_vitals_history->Surgical->displayValueSeparatorAttribute() ?>" name="x_Surgical" id="x_Surgical" value="<?php echo HtmlEncode($ivf_vitals_history->Surgical->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<?php echo $ivf_vitals_history->Surgical->Lookup->getParamTag("p_x_Surgical") ?>
</span>
</script>
<script type="text/html" class="ivf_vitals_historyadd_js">
fivf_vitals_historyadd.createAutoSuggest({"id":"x_Surgical","forceSelect":false});
</script>
<?php echo $ivf_vitals_history->Surgical->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->CoitalHistory->Visible) { // CoitalHistory ?>
	<div id="r_CoitalHistory" class="form-group row">
		<label id="elh_ivf_vitals_history_CoitalHistory" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_CoitalHistory" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->CoitalHistory->caption() ?><?php echo ($ivf_vitals_history->CoitalHistory->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->CoitalHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_CoitalHistory" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_CoitalHistory">
<?php
$wrkonchange = "" . trim(@$ivf_vitals_history->CoitalHistory->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$ivf_vitals_history->CoitalHistory->EditAttrs["onchange"] = "";
?>
<span id="as_x_CoitalHistory" class="text-nowrap" style="z-index: 8360">
	<input type="text" class="form-control" name="sv_x_CoitalHistory" id="sv_x_CoitalHistory" value="<?php echo RemoveHtml($ivf_vitals_history->CoitalHistory->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->CoitalHistory->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($ivf_vitals_history->CoitalHistory->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history->CoitalHistory->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_CoitalHistory" data-value-separator="<?php echo $ivf_vitals_history->CoitalHistory->displayValueSeparatorAttribute() ?>" name="x_CoitalHistory" id="x_CoitalHistory" value="<?php echo HtmlEncode($ivf_vitals_history->CoitalHistory->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<?php echo $ivf_vitals_history->CoitalHistory->Lookup->getParamTag("p_x_CoitalHistory") ?>
</span>
</script>
<script type="text/html" class="ivf_vitals_historyadd_js">
fivf_vitals_historyadd.createAutoSuggest({"id":"x_CoitalHistory","forceSelect":false});
</script>
<?php echo $ivf_vitals_history->CoitalHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->SemenAnalysis->Visible) { // SemenAnalysis ?>
	<div id="r_SemenAnalysis" class="form-group row">
		<label id="elh_ivf_vitals_history_SemenAnalysis" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_SemenAnalysis" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->SemenAnalysis->caption() ?><?php echo ($ivf_vitals_history->SemenAnalysis->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->SemenAnalysis->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_SemenAnalysis" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_SemenAnalysis">
<?php AppendClass($ivf_vitals_history->SemenAnalysis->EditAttrs["class"], "editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_SemenAnalysis" name="x_SemenAnalysis" id="x_SemenAnalysis" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history->SemenAnalysis->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history->SemenAnalysis->editAttributes() ?>><?php echo $ivf_vitals_history->SemenAnalysis->EditValue ?></textarea>
</span>
</script>
<script type="text/html" class="ivf_vitals_historyadd_js">
ew.createEditor("fivf_vitals_historyadd", "x_SemenAnalysis", 35, 4, <?php echo ($ivf_vitals_history->SemenAnalysis->ReadOnly || FALSE) ? "true" : "false" ?>);
</script>
<?php echo $ivf_vitals_history->SemenAnalysis->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->MInsvestications->Visible) { // MInsvestications ?>
	<div id="r_MInsvestications" class="form-group row">
		<label id="elh_ivf_vitals_history_MInsvestications" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_MInsvestications" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->MInsvestications->caption() ?><?php echo ($ivf_vitals_history->MInsvestications->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->MInsvestications->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MInsvestications" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_MInsvestications">
<?php AppendClass($ivf_vitals_history->MInsvestications->EditAttrs["class"], "editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_MInsvestications" name="x_MInsvestications" id="x_MInsvestications" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history->MInsvestications->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history->MInsvestications->editAttributes() ?>><?php echo $ivf_vitals_history->MInsvestications->EditValue ?></textarea>
</span>
</script>
<script type="text/html" class="ivf_vitals_historyadd_js">
ew.createEditor("fivf_vitals_historyadd", "x_MInsvestications", 35, 4, <?php echo ($ivf_vitals_history->MInsvestications->ReadOnly || FALSE) ? "true" : "false" ?>);
</script>
<?php echo $ivf_vitals_history->MInsvestications->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->PImpression->Visible) { // PImpression ?>
	<div id="r_PImpression" class="form-group row">
		<label id="elh_ivf_vitals_history_PImpression" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_PImpression" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->PImpression->caption() ?><?php echo ($ivf_vitals_history->PImpression->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->PImpression->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PImpression" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_PImpression">
<?php AppendClass($ivf_vitals_history->PImpression->EditAttrs["class"], "editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_PImpression" name="x_PImpression" id="x_PImpression" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history->PImpression->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history->PImpression->editAttributes() ?>><?php echo $ivf_vitals_history->PImpression->EditValue ?></textarea>
</span>
</script>
<script type="text/html" class="ivf_vitals_historyadd_js">
ew.createEditor("fivf_vitals_historyadd", "x_PImpression", 35, 4, <?php echo ($ivf_vitals_history->PImpression->ReadOnly || FALSE) ? "true" : "false" ?>);
</script>
<?php echo $ivf_vitals_history->PImpression->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->MIMpression->Visible) { // MIMpression ?>
	<div id="r_MIMpression" class="form-group row">
		<label id="elh_ivf_vitals_history_MIMpression" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_MIMpression" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->MIMpression->caption() ?><?php echo ($ivf_vitals_history->MIMpression->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->MIMpression->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MIMpression" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_MIMpression">
<?php AppendClass($ivf_vitals_history->MIMpression->EditAttrs["class"], "editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_MIMpression" name="x_MIMpression" id="x_MIMpression" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history->MIMpression->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history->MIMpression->editAttributes() ?>><?php echo $ivf_vitals_history->MIMpression->EditValue ?></textarea>
</span>
</script>
<script type="text/html" class="ivf_vitals_historyadd_js">
ew.createEditor("fivf_vitals_historyadd", "x_MIMpression", 35, 4, <?php echo ($ivf_vitals_history->MIMpression->ReadOnly || FALSE) ? "true" : "false" ?>);
</script>
<?php echo $ivf_vitals_history->MIMpression->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->PPlanOfManagement->Visible) { // PPlanOfManagement ?>
	<div id="r_PPlanOfManagement" class="form-group row">
		<label id="elh_ivf_vitals_history_PPlanOfManagement" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_PPlanOfManagement" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->PPlanOfManagement->caption() ?><?php echo ($ivf_vitals_history->PPlanOfManagement->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->PPlanOfManagement->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PPlanOfManagement" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_PPlanOfManagement">
<?php AppendClass($ivf_vitals_history->PPlanOfManagement->EditAttrs["class"], "editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_PPlanOfManagement" name="x_PPlanOfManagement" id="x_PPlanOfManagement" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history->PPlanOfManagement->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history->PPlanOfManagement->editAttributes() ?>><?php echo $ivf_vitals_history->PPlanOfManagement->EditValue ?></textarea>
</span>
</script>
<script type="text/html" class="ivf_vitals_historyadd_js">
ew.createEditor("fivf_vitals_historyadd", "x_PPlanOfManagement", 35, 4, <?php echo ($ivf_vitals_history->PPlanOfManagement->ReadOnly || FALSE) ? "true" : "false" ?>);
</script>
<?php echo $ivf_vitals_history->PPlanOfManagement->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->MPlanOfManagement->Visible) { // MPlanOfManagement ?>
	<div id="r_MPlanOfManagement" class="form-group row">
		<label id="elh_ivf_vitals_history_MPlanOfManagement" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_MPlanOfManagement" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->MPlanOfManagement->caption() ?><?php echo ($ivf_vitals_history->MPlanOfManagement->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->MPlanOfManagement->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MPlanOfManagement" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_MPlanOfManagement">
<?php AppendClass($ivf_vitals_history->MPlanOfManagement->EditAttrs["class"], "editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_MPlanOfManagement" name="x_MPlanOfManagement" id="x_MPlanOfManagement" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history->MPlanOfManagement->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history->MPlanOfManagement->editAttributes() ?>><?php echo $ivf_vitals_history->MPlanOfManagement->EditValue ?></textarea>
</span>
</script>
<script type="text/html" class="ivf_vitals_historyadd_js">
ew.createEditor("fivf_vitals_historyadd", "x_MPlanOfManagement", 35, 4, <?php echo ($ivf_vitals_history->MPlanOfManagement->ReadOnly || FALSE) ? "true" : "false" ?>);
</script>
<?php echo $ivf_vitals_history->MPlanOfManagement->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->PReadMore->Visible) { // PReadMore ?>
	<div id="r_PReadMore" class="form-group row">
		<label id="elh_ivf_vitals_history_PReadMore" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_PReadMore" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->PReadMore->caption() ?><?php echo ($ivf_vitals_history->PReadMore->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->PReadMore->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PReadMore" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_PReadMore">
<?php AppendClass($ivf_vitals_history->PReadMore->EditAttrs["class"], "editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_PReadMore" name="x_PReadMore" id="x_PReadMore" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history->PReadMore->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history->PReadMore->editAttributes() ?>><?php echo $ivf_vitals_history->PReadMore->EditValue ?></textarea>
</span>
</script>
<script type="text/html" class="ivf_vitals_historyadd_js">
ew.createEditor("fivf_vitals_historyadd", "x_PReadMore", 35, 4, <?php echo ($ivf_vitals_history->PReadMore->ReadOnly || FALSE) ? "true" : "false" ?>);
</script>
<?php echo $ivf_vitals_history->PReadMore->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->MReadMore->Visible) { // MReadMore ?>
	<div id="r_MReadMore" class="form-group row">
		<label id="elh_ivf_vitals_history_MReadMore" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_MReadMore" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->MReadMore->caption() ?><?php echo ($ivf_vitals_history->MReadMore->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->MReadMore->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MReadMore" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_MReadMore">
<?php AppendClass($ivf_vitals_history->MReadMore->EditAttrs["class"], "editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_MReadMore" name="x_MReadMore" id="x_MReadMore" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history->MReadMore->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history->MReadMore->editAttributes() ?>><?php echo $ivf_vitals_history->MReadMore->EditValue ?></textarea>
</span>
</script>
<script type="text/html" class="ivf_vitals_historyadd_js">
ew.createEditor("fivf_vitals_historyadd", "x_MReadMore", 35, 4, <?php echo ($ivf_vitals_history->MReadMore->ReadOnly || FALSE) ? "true" : "false" ?>);
</script>
<?php echo $ivf_vitals_history->MReadMore->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->MariedFor->Visible) { // MariedFor ?>
	<div id="r_MariedFor" class="form-group row">
		<label id="elh_ivf_vitals_history_MariedFor" for="x_MariedFor" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_MariedFor" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->MariedFor->caption() ?><?php echo ($ivf_vitals_history->MariedFor->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->MariedFor->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MariedFor" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_MariedFor">
<input type="text" data-table="ivf_vitals_history" data-field="x_MariedFor" name="x_MariedFor" id="x_MariedFor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->MariedFor->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->MariedFor->EditValue ?>"<?php echo $ivf_vitals_history->MariedFor->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_vitals_history->MariedFor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->CMNCM->Visible) { // CMNCM ?>
	<div id="r_CMNCM" class="form-group row">
		<label id="elh_ivf_vitals_history_CMNCM" for="x_CMNCM" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_CMNCM" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->CMNCM->caption() ?><?php echo ($ivf_vitals_history->CMNCM->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->CMNCM->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_CMNCM" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_CMNCM">
<input type="text" data-table="ivf_vitals_history" data-field="x_CMNCM" name="x_CMNCM" id="x_CMNCM" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->CMNCM->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->CMNCM->EditValue ?>"<?php echo $ivf_vitals_history->CMNCM->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_vitals_history->CMNCM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->TemplateMenstrualHistory->Visible) { // TemplateMenstrualHistory ?>
	<div id="r_TemplateMenstrualHistory" class="form-group row">
		<label id="elh_ivf_vitals_history_TemplateMenstrualHistory" for="x_TemplateMenstrualHistory" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_TemplateMenstrualHistory" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->TemplateMenstrualHistory->caption() ?><?php echo ($ivf_vitals_history->TemplateMenstrualHistory->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->TemplateMenstrualHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_TemplateMenstrualHistory" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_TemplateMenstrualHistory">
<?php $ivf_vitals_history->TemplateMenstrualHistory->EditAttrs["onchange"] = "ew.autoFill(this);" . @$ivf_vitals_history->TemplateMenstrualHistory->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_TemplateMenstrualHistory" data-value-separator="<?php echo $ivf_vitals_history->TemplateMenstrualHistory->displayValueSeparatorAttribute() ?>" id="x_TemplateMenstrualHistory" name="x_TemplateMenstrualHistory"<?php echo $ivf_vitals_history->TemplateMenstrualHistory->editAttributes() ?>>
		<?php echo $ivf_vitals_history->TemplateMenstrualHistory->selectOptionListHtml("x_TemplateMenstrualHistory") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_vitals_history->TemplateMenstrualHistory->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateMenstrualHistory" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_vitals_history->TemplateMenstrualHistory->caption() ?>" data-title="<?php echo $ivf_vitals_history->TemplateMenstrualHistory->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateMenstrualHistory',url:'ivf_mas_user_templateaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $ivf_vitals_history->TemplateMenstrualHistory->Lookup->getParamTag("p_x_TemplateMenstrualHistory") ?>
</span>
</script>
<?php echo $ivf_vitals_history->TemplateMenstrualHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->TemplateObstetricHistory->Visible) { // TemplateObstetricHistory ?>
	<div id="r_TemplateObstetricHistory" class="form-group row">
		<label id="elh_ivf_vitals_history_TemplateObstetricHistory" for="x_TemplateObstetricHistory" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_TemplateObstetricHistory" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->TemplateObstetricHistory->caption() ?><?php echo ($ivf_vitals_history->TemplateObstetricHistory->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->TemplateObstetricHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_TemplateObstetricHistory" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_TemplateObstetricHistory">
<?php $ivf_vitals_history->TemplateObstetricHistory->EditAttrs["onchange"] = "ew.autoFill(this);" . @$ivf_vitals_history->TemplateObstetricHistory->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_TemplateObstetricHistory" data-value-separator="<?php echo $ivf_vitals_history->TemplateObstetricHistory->displayValueSeparatorAttribute() ?>" id="x_TemplateObstetricHistory" name="x_TemplateObstetricHistory"<?php echo $ivf_vitals_history->TemplateObstetricHistory->editAttributes() ?>>
		<?php echo $ivf_vitals_history->TemplateObstetricHistory->selectOptionListHtml("x_TemplateObstetricHistory") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_vitals_history->TemplateObstetricHistory->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateObstetricHistory" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_vitals_history->TemplateObstetricHistory->caption() ?>" data-title="<?php echo $ivf_vitals_history->TemplateObstetricHistory->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateObstetricHistory',url:'ivf_mas_user_templateaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $ivf_vitals_history->TemplateObstetricHistory->Lookup->getParamTag("p_x_TemplateObstetricHistory") ?>
</span>
</script>
<?php echo $ivf_vitals_history->TemplateObstetricHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->TemplateFertilityTreatmentHistory->Visible) { // TemplateFertilityTreatmentHistory ?>
	<div id="r_TemplateFertilityTreatmentHistory" class="form-group row">
		<label id="elh_ivf_vitals_history_TemplateFertilityTreatmentHistory" for="x_TemplateFertilityTreatmentHistory" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_TemplateFertilityTreatmentHistory" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->TemplateFertilityTreatmentHistory->caption() ?><?php echo ($ivf_vitals_history->TemplateFertilityTreatmentHistory->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->TemplateFertilityTreatmentHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_TemplateFertilityTreatmentHistory" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_TemplateFertilityTreatmentHistory">
<?php $ivf_vitals_history->TemplateFertilityTreatmentHistory->EditAttrs["onchange"] = "ew.autoFill(this);" . @$ivf_vitals_history->TemplateFertilityTreatmentHistory->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_TemplateFertilityTreatmentHistory" data-value-separator="<?php echo $ivf_vitals_history->TemplateFertilityTreatmentHistory->displayValueSeparatorAttribute() ?>" id="x_TemplateFertilityTreatmentHistory" name="x_TemplateFertilityTreatmentHistory"<?php echo $ivf_vitals_history->TemplateFertilityTreatmentHistory->editAttributes() ?>>
		<?php echo $ivf_vitals_history->TemplateFertilityTreatmentHistory->selectOptionListHtml("x_TemplateFertilityTreatmentHistory") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_vitals_history->TemplateFertilityTreatmentHistory->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateFertilityTreatmentHistory" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_vitals_history->TemplateFertilityTreatmentHistory->caption() ?>" data-title="<?php echo $ivf_vitals_history->TemplateFertilityTreatmentHistory->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateFertilityTreatmentHistory',url:'ivf_mas_user_templateaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $ivf_vitals_history->TemplateFertilityTreatmentHistory->Lookup->getParamTag("p_x_TemplateFertilityTreatmentHistory") ?>
</span>
</script>
<?php echo $ivf_vitals_history->TemplateFertilityTreatmentHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->TemplateSurgeryHistory->Visible) { // TemplateSurgeryHistory ?>
	<div id="r_TemplateSurgeryHistory" class="form-group row">
		<label id="elh_ivf_vitals_history_TemplateSurgeryHistory" for="x_TemplateSurgeryHistory" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_TemplateSurgeryHistory" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->TemplateSurgeryHistory->caption() ?><?php echo ($ivf_vitals_history->TemplateSurgeryHistory->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->TemplateSurgeryHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_TemplateSurgeryHistory" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_TemplateSurgeryHistory">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_TemplateSurgeryHistory" data-value-separator="<?php echo $ivf_vitals_history->TemplateSurgeryHistory->displayValueSeparatorAttribute() ?>" id="x_TemplateSurgeryHistory" name="x_TemplateSurgeryHistory"<?php echo $ivf_vitals_history->TemplateSurgeryHistory->editAttributes() ?>>
		<?php echo $ivf_vitals_history->TemplateSurgeryHistory->selectOptionListHtml("x_TemplateSurgeryHistory") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_vitals_history->TemplateSurgeryHistory->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateSurgeryHistory" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_vitals_history->TemplateSurgeryHistory->caption() ?>" data-title="<?php echo $ivf_vitals_history->TemplateSurgeryHistory->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateSurgeryHistory',url:'ivf_mas_user_templateaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $ivf_vitals_history->TemplateSurgeryHistory->Lookup->getParamTag("p_x_TemplateSurgeryHistory") ?>
</span>
</script>
<?php echo $ivf_vitals_history->TemplateSurgeryHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->TemplateFInvestigations->Visible) { // TemplateFInvestigations ?>
	<div id="r_TemplateFInvestigations" class="form-group row">
		<label id="elh_ivf_vitals_history_TemplateFInvestigations" for="x_TemplateFInvestigations" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_TemplateFInvestigations" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->TemplateFInvestigations->caption() ?><?php echo ($ivf_vitals_history->TemplateFInvestigations->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->TemplateFInvestigations->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_TemplateFInvestigations" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_TemplateFInvestigations">
<?php $ivf_vitals_history->TemplateFInvestigations->EditAttrs["onchange"] = "ew.autoFill(this);" . @$ivf_vitals_history->TemplateFInvestigations->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_TemplateFInvestigations" data-value-separator="<?php echo $ivf_vitals_history->TemplateFInvestigations->displayValueSeparatorAttribute() ?>" id="x_TemplateFInvestigations" name="x_TemplateFInvestigations"<?php echo $ivf_vitals_history->TemplateFInvestigations->editAttributes() ?>>
		<?php echo $ivf_vitals_history->TemplateFInvestigations->selectOptionListHtml("x_TemplateFInvestigations") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_vitals_history->TemplateFInvestigations->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateFInvestigations" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_vitals_history->TemplateFInvestigations->caption() ?>" data-title="<?php echo $ivf_vitals_history->TemplateFInvestigations->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateFInvestigations',url:'ivf_mas_user_templateaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $ivf_vitals_history->TemplateFInvestigations->Lookup->getParamTag("p_x_TemplateFInvestigations") ?>
</span>
</script>
<?php echo $ivf_vitals_history->TemplateFInvestigations->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->TemplatePlanOfManagement->Visible) { // TemplatePlanOfManagement ?>
	<div id="r_TemplatePlanOfManagement" class="form-group row">
		<label id="elh_ivf_vitals_history_TemplatePlanOfManagement" for="x_TemplatePlanOfManagement" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_TemplatePlanOfManagement" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->TemplatePlanOfManagement->caption() ?><?php echo ($ivf_vitals_history->TemplatePlanOfManagement->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->TemplatePlanOfManagement->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_TemplatePlanOfManagement" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_TemplatePlanOfManagement">
<?php $ivf_vitals_history->TemplatePlanOfManagement->EditAttrs["onchange"] = "ew.autoFill(this);" . @$ivf_vitals_history->TemplatePlanOfManagement->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_TemplatePlanOfManagement" data-value-separator="<?php echo $ivf_vitals_history->TemplatePlanOfManagement->displayValueSeparatorAttribute() ?>" id="x_TemplatePlanOfManagement" name="x_TemplatePlanOfManagement"<?php echo $ivf_vitals_history->TemplatePlanOfManagement->editAttributes() ?>>
		<?php echo $ivf_vitals_history->TemplatePlanOfManagement->selectOptionListHtml("x_TemplatePlanOfManagement") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_vitals_history->TemplatePlanOfManagement->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplatePlanOfManagement" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_vitals_history->TemplatePlanOfManagement->caption() ?>" data-title="<?php echo $ivf_vitals_history->TemplatePlanOfManagement->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplatePlanOfManagement',url:'ivf_mas_user_templateaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $ivf_vitals_history->TemplatePlanOfManagement->Lookup->getParamTag("p_x_TemplatePlanOfManagement") ?>
</span>
</script>
<?php echo $ivf_vitals_history->TemplatePlanOfManagement->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->TemplatePImpression->Visible) { // TemplatePImpression ?>
	<div id="r_TemplatePImpression" class="form-group row">
		<label id="elh_ivf_vitals_history_TemplatePImpression" for="x_TemplatePImpression" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_TemplatePImpression" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->TemplatePImpression->caption() ?><?php echo ($ivf_vitals_history->TemplatePImpression->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->TemplatePImpression->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_TemplatePImpression" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_TemplatePImpression">
<?php $ivf_vitals_history->TemplatePImpression->EditAttrs["onchange"] = "ew.autoFill(this);" . @$ivf_vitals_history->TemplatePImpression->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_TemplatePImpression" data-value-separator="<?php echo $ivf_vitals_history->TemplatePImpression->displayValueSeparatorAttribute() ?>" id="x_TemplatePImpression" name="x_TemplatePImpression"<?php echo $ivf_vitals_history->TemplatePImpression->editAttributes() ?>>
		<?php echo $ivf_vitals_history->TemplatePImpression->selectOptionListHtml("x_TemplatePImpression") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_vitals_history->TemplatePImpression->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplatePImpression" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_vitals_history->TemplatePImpression->caption() ?>" data-title="<?php echo $ivf_vitals_history->TemplatePImpression->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplatePImpression',url:'ivf_mas_user_templateaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $ivf_vitals_history->TemplatePImpression->Lookup->getParamTag("p_x_TemplatePImpression") ?>
</span>
</script>
<?php echo $ivf_vitals_history->TemplatePImpression->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->TemplateMedications->Visible) { // TemplateMedications ?>
	<div id="r_TemplateMedications" class="form-group row">
		<label id="elh_ivf_vitals_history_TemplateMedications" for="x_TemplateMedications" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_TemplateMedications" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->TemplateMedications->caption() ?><?php echo ($ivf_vitals_history->TemplateMedications->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->TemplateMedications->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_TemplateMedications" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_TemplateMedications">
<?php $ivf_vitals_history->TemplateMedications->EditAttrs["onchange"] = "ew.autoFill(this);" . @$ivf_vitals_history->TemplateMedications->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_TemplateMedications" data-value-separator="<?php echo $ivf_vitals_history->TemplateMedications->displayValueSeparatorAttribute() ?>" id="x_TemplateMedications" name="x_TemplateMedications"<?php echo $ivf_vitals_history->TemplateMedications->editAttributes() ?>>
		<?php echo $ivf_vitals_history->TemplateMedications->selectOptionListHtml("x_TemplateMedications") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_vitals_history->TemplateMedications->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateMedications" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_vitals_history->TemplateMedications->caption() ?>" data-title="<?php echo $ivf_vitals_history->TemplateMedications->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateMedications',url:'ivf_mas_user_templateaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $ivf_vitals_history->TemplateMedications->Lookup->getParamTag("p_x_TemplateMedications") ?>
</span>
</script>
<?php echo $ivf_vitals_history->TemplateMedications->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->TemplateSemenAnalysis->Visible) { // TemplateSemenAnalysis ?>
	<div id="r_TemplateSemenAnalysis" class="form-group row">
		<label id="elh_ivf_vitals_history_TemplateSemenAnalysis" for="x_TemplateSemenAnalysis" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_TemplateSemenAnalysis" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->TemplateSemenAnalysis->caption() ?><?php echo ($ivf_vitals_history->TemplateSemenAnalysis->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->TemplateSemenAnalysis->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_TemplateSemenAnalysis" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_TemplateSemenAnalysis">
<?php $ivf_vitals_history->TemplateSemenAnalysis->EditAttrs["onchange"] = "ew.autoFill(this);" . @$ivf_vitals_history->TemplateSemenAnalysis->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_TemplateSemenAnalysis" data-value-separator="<?php echo $ivf_vitals_history->TemplateSemenAnalysis->displayValueSeparatorAttribute() ?>" id="x_TemplateSemenAnalysis" name="x_TemplateSemenAnalysis"<?php echo $ivf_vitals_history->TemplateSemenAnalysis->editAttributes() ?>>
		<?php echo $ivf_vitals_history->TemplateSemenAnalysis->selectOptionListHtml("x_TemplateSemenAnalysis") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_vitals_history->TemplateSemenAnalysis->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateSemenAnalysis" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_vitals_history->TemplateSemenAnalysis->caption() ?>" data-title="<?php echo $ivf_vitals_history->TemplateSemenAnalysis->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateSemenAnalysis',url:'ivf_mas_user_templateaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $ivf_vitals_history->TemplateSemenAnalysis->Lookup->getParamTag("p_x_TemplateSemenAnalysis") ?>
</span>
</script>
<?php echo $ivf_vitals_history->TemplateSemenAnalysis->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->MaleInsvestications->Visible) { // MaleInsvestications ?>
	<div id="r_MaleInsvestications" class="form-group row">
		<label id="elh_ivf_vitals_history_MaleInsvestications" for="x_MaleInsvestications" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_MaleInsvestications" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->MaleInsvestications->caption() ?><?php echo ($ivf_vitals_history->MaleInsvestications->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->MaleInsvestications->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MaleInsvestications" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_MaleInsvestications">
<?php $ivf_vitals_history->MaleInsvestications->EditAttrs["onchange"] = "ew.autoFill(this);" . @$ivf_vitals_history->MaleInsvestications->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_MaleInsvestications" data-value-separator="<?php echo $ivf_vitals_history->MaleInsvestications->displayValueSeparatorAttribute() ?>" id="x_MaleInsvestications" name="x_MaleInsvestications"<?php echo $ivf_vitals_history->MaleInsvestications->editAttributes() ?>>
		<?php echo $ivf_vitals_history->MaleInsvestications->selectOptionListHtml("x_MaleInsvestications") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_vitals_history->MaleInsvestications->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_MaleInsvestications" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_vitals_history->MaleInsvestications->caption() ?>" data-title="<?php echo $ivf_vitals_history->MaleInsvestications->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_MaleInsvestications',url:'ivf_mas_user_templateaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $ivf_vitals_history->MaleInsvestications->Lookup->getParamTag("p_x_MaleInsvestications") ?>
</span>
</script>
<?php echo $ivf_vitals_history->MaleInsvestications->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->TemplateMIMpression->Visible) { // TemplateMIMpression ?>
	<div id="r_TemplateMIMpression" class="form-group row">
		<label id="elh_ivf_vitals_history_TemplateMIMpression" for="x_TemplateMIMpression" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_TemplateMIMpression" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->TemplateMIMpression->caption() ?><?php echo ($ivf_vitals_history->TemplateMIMpression->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->TemplateMIMpression->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_TemplateMIMpression" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_TemplateMIMpression">
<?php $ivf_vitals_history->TemplateMIMpression->EditAttrs["onchange"] = "ew.autoFill(this);" . @$ivf_vitals_history->TemplateMIMpression->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_TemplateMIMpression" data-value-separator="<?php echo $ivf_vitals_history->TemplateMIMpression->displayValueSeparatorAttribute() ?>" id="x_TemplateMIMpression" name="x_TemplateMIMpression"<?php echo $ivf_vitals_history->TemplateMIMpression->editAttributes() ?>>
		<?php echo $ivf_vitals_history->TemplateMIMpression->selectOptionListHtml("x_TemplateMIMpression") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_vitals_history->TemplateMIMpression->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateMIMpression" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_vitals_history->TemplateMIMpression->caption() ?>" data-title="<?php echo $ivf_vitals_history->TemplateMIMpression->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateMIMpression',url:'ivf_mas_user_templateaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $ivf_vitals_history->TemplateMIMpression->Lookup->getParamTag("p_x_TemplateMIMpression") ?>
</span>
</script>
<?php echo $ivf_vitals_history->TemplateMIMpression->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->TemplateMalePlanOfManagement->Visible) { // TemplateMalePlanOfManagement ?>
	<div id="r_TemplateMalePlanOfManagement" class="form-group row">
		<label id="elh_ivf_vitals_history_TemplateMalePlanOfManagement" for="x_TemplateMalePlanOfManagement" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_TemplateMalePlanOfManagement" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->TemplateMalePlanOfManagement->caption() ?><?php echo ($ivf_vitals_history->TemplateMalePlanOfManagement->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->TemplateMalePlanOfManagement->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_TemplateMalePlanOfManagement" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_TemplateMalePlanOfManagement">
<?php $ivf_vitals_history->TemplateMalePlanOfManagement->EditAttrs["onchange"] = "ew.autoFill(this);" . @$ivf_vitals_history->TemplateMalePlanOfManagement->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_TemplateMalePlanOfManagement" data-value-separator="<?php echo $ivf_vitals_history->TemplateMalePlanOfManagement->displayValueSeparatorAttribute() ?>" id="x_TemplateMalePlanOfManagement" name="x_TemplateMalePlanOfManagement"<?php echo $ivf_vitals_history->TemplateMalePlanOfManagement->editAttributes() ?>>
		<?php echo $ivf_vitals_history->TemplateMalePlanOfManagement->selectOptionListHtml("x_TemplateMalePlanOfManagement") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_vitals_history->TemplateMalePlanOfManagement->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateMalePlanOfManagement" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_vitals_history->TemplateMalePlanOfManagement->caption() ?>" data-title="<?php echo $ivf_vitals_history->TemplateMalePlanOfManagement->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateMalePlanOfManagement',url:'ivf_mas_user_templateaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $ivf_vitals_history->TemplateMalePlanOfManagement->Lookup->getParamTag("p_x_TemplateMalePlanOfManagement") ?>
</span>
</script>
<?php echo $ivf_vitals_history->TemplateMalePlanOfManagement->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label id="elh_ivf_vitals_history_TidNo" for="x_TidNo" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_TidNo" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->TidNo->caption() ?><?php echo ($ivf_vitals_history->TidNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->TidNo->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_TidNo" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_TidNo">
<input type="text" data-table="ivf_vitals_history" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_vitals_history->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->TidNo->EditValue ?>"<?php echo $ivf_vitals_history->TidNo->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_vitals_history->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->pFamilyHistory->Visible) { // pFamilyHistory ?>
	<div id="r_pFamilyHistory" class="form-group row">
		<label id="elh_ivf_vitals_history_pFamilyHistory" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_pFamilyHistory" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->pFamilyHistory->caption() ?><?php echo ($ivf_vitals_history->pFamilyHistory->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->pFamilyHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_pFamilyHistory" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_pFamilyHistory">
<?php
$wrkonchange = "" . trim(@$ivf_vitals_history->pFamilyHistory->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$ivf_vitals_history->pFamilyHistory->EditAttrs["onchange"] = "";
?>
<span id="as_x_pFamilyHistory" class="text-nowrap" style="z-index: 8120">
	<input type="text" class="form-control" name="sv_x_pFamilyHistory" id="sv_x_pFamilyHistory" value="<?php echo RemoveHtml($ivf_vitals_history->pFamilyHistory->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->pFamilyHistory->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($ivf_vitals_history->pFamilyHistory->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history->pFamilyHistory->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_pFamilyHistory" data-value-separator="<?php echo $ivf_vitals_history->pFamilyHistory->displayValueSeparatorAttribute() ?>" name="x_pFamilyHistory" id="x_pFamilyHistory" value="<?php echo HtmlEncode($ivf_vitals_history->pFamilyHistory->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<?php echo $ivf_vitals_history->pFamilyHistory->Lookup->getParamTag("p_x_pFamilyHistory") ?>
</span>
</script>
<script type="text/html" class="ivf_vitals_historyadd_js">
fivf_vitals_historyadd.createAutoSuggest({"id":"x_pFamilyHistory","forceSelect":false});
</script>
<?php echo $ivf_vitals_history->pFamilyHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->pTemplateMedications->Visible) { // pTemplateMedications ?>
	<div id="r_pTemplateMedications" class="form-group row">
		<label id="elh_ivf_vitals_history_pTemplateMedications" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_pTemplateMedications" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->pTemplateMedications->caption() ?><?php echo ($ivf_vitals_history->pTemplateMedications->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->pTemplateMedications->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_pTemplateMedications" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_pTemplateMedications">
<?php AppendClass($ivf_vitals_history->pTemplateMedications->EditAttrs["class"], "editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_pTemplateMedications" name="x_pTemplateMedications" id="x_pTemplateMedications" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history->pTemplateMedications->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history->pTemplateMedications->editAttributes() ?>><?php echo $ivf_vitals_history->pTemplateMedications->EditValue ?></textarea>
</span>
</script>
<script type="text/html" class="ivf_vitals_historyadd_js">
ew.createEditor("fivf_vitals_historyadd", "x_pTemplateMedications", 35, 4, <?php echo ($ivf_vitals_history->pTemplateMedications->ReadOnly || FALSE) ? "true" : "false" ?>);
</script>
<?php echo $ivf_vitals_history->pTemplateMedications->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->AntiTPO->Visible) { // AntiTPO ?>
	<div id="r_AntiTPO" class="form-group row">
		<label id="elh_ivf_vitals_history_AntiTPO" for="x_AntiTPO" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_AntiTPO" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->AntiTPO->caption() ?><?php echo ($ivf_vitals_history->AntiTPO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->AntiTPO->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_AntiTPO" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_AntiTPO">
<input type="text" data-table="ivf_vitals_history" data-field="x_AntiTPO" name="x_AntiTPO" id="x_AntiTPO" size="20" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->AntiTPO->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->AntiTPO->EditValue ?>"<?php echo $ivf_vitals_history->AntiTPO->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_vitals_history->AntiTPO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history->AntiTG->Visible) { // AntiTG ?>
	<div id="r_AntiTG" class="form-group row">
		<label id="elh_ivf_vitals_history_AntiTG" for="x_AntiTG" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_AntiTG" class="ivf_vitals_historyadd" type="text/html"><span><?php echo $ivf_vitals_history->AntiTG->caption() ?><?php echo ($ivf_vitals_history->AntiTG->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div<?php echo $ivf_vitals_history->AntiTG->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_AntiTG" class="ivf_vitals_historyadd" type="text/html">
<span id="el_ivf_vitals_history_AntiTG">
<input type="text" data-table="ivf_vitals_history" data-field="x_AntiTG" name="x_AntiTG" id="x_AntiTG" size="20" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history->AntiTG->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history->AntiTG->EditValue ?>"<?php echo $ivf_vitals_history->AntiTG->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_vitals_history->AntiTG->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_ivf_vitals_historyadd" class="ew-custom-template"></div>
<script id="tpm_ivf_vitals_historyadd" type="text/html">
<div id="ct_ivf_vitals_history_add"><style>
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
.form-control:not(textarea) {
	width: -webkit-fill-available;
}
.ew-row .ew-cell {
	margin-right: unset;
}
.ew-row .ew-cellA {
	margin-right: unset;
	flex: unset;
	display: flex;
	padding: 5px 5px 5px 5px;
}
</style>
<?php
$cid = $_GET["fk_id"] ;
$IVFid = $_GET["fk_RIDNO"] ;
$Iid = $_GET["id"] ;
$dbhelper = &DbHelper();
if($IVFid == null)
{
	$sqla = "SELECT * FROM ganeshkumar_bjhims.ivf_vitals_history where id='".$Iid."'";
	$resultsa = $dbhelper->ExecuteRows($sqla);
	$IVFid = $resultsa[0]["RIDNO"];
	$cid = $resultsa[0]["Name"];
}
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$IVFid."'; ";
$results = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Male"]."'; ";
$results1 = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Female"]."'; ";
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
<div id="divCheckbox" style="display: none;">
{{include tmpl="#tpc_ivf_vitals_history_RIDNO"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_RIDNO"/}}
{{include tmpl="#tpc_ivf_vitals_history_Name"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_Name"/}}
</div>
<input type="hidden" id="ivfRIDNO" name="ivfRIDNO" value="<?php echo $IVFid; ?>">
<input type="hidden" id="ivfName" name="ivfName" value="<?php echo $results[0]["Female"]; ?>">
 <?php  if($results[0]["Male"]== '0')
{ echo "Donor ID : ".$results[0]["CoupleID"]; }
else{ echo "Couple ID : ".$results[0]["CoupleID"]; }
  ?>
<div class="row">
<div class="col-md-6">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span class="ew-cell">Patient Id : <?php echo $results2[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span class="ew-cell">Patient Name : <?php echo $results2[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span class="ew-cell">Gender : <?php echo $results2[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span class="ew-cell">Blood Group : <?php echo $results2[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$PatientProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span class="ew-cell">Age : <?php echo AgeCalculationb($results2[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header">Mobile : <?php echo $results2[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4">
					<div class="description-block">
					  <h5 class="description-header">Email : <?php echo $results2[0]["PEmail"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
</div>
<div class="col-md-6">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span class="ew-cell">Partner Id : <?php echo $results1[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span class="ew-cell">Partner Name :<?php echo $results1[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span class="ew-cell">Gender : <?php echo $results1[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span class="ew-cell">Blood Group : <?php echo $results1[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$PartnerProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span class="ew-cell">Age : <?php echo AgeCalculationb($results1[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header">Mobile : <?php echo $results1[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4">
					<div class="description-block">
					  <h5 class="description-header">Email : <?php echo $results1[0]["PEmail"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
</div>
</div>
<?php
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_vitals_history where RIDNO='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$VitalsHistory = $dbhelper->ExecuteRows($sql);
	$VitalsHistoryRowCount = count($VitalsHistory);
	if($VitalsHistoryRowCount > 0)
	{
		if($cid == $VitalsHistory[$VitalsHistoryRowCount-1]["TidNo"])
		{
			$VitalsHistoryUrl = "ivf_vitals_historyview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$VitalsHistory[$VitalsHistoryRowCount-1]["id"]."";  // ---- view
		}else{
			$kk = 0;
			for ($x = 0; $x < $VitalsHistoryRowCount; $x++) {
				if($cid == $VitalsHistory[$x]["TidNo"])
				{
					$kk = 1;
					$VitalsHistoryUrl = "ivf_vitals_historyview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$VitalsHistory[$x]["id"]."";  // ---- view
				}
			}
			if($kk == 0)
			{
				$VitalsHistoryUrl = "ivf_vitals_historyadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$VitalsHistory[$VitalsHistoryRowCount-1]["id"]."";
			}
		}
	}else{
		$VitalsHistoryUrl = "ivf_vitals_historyadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}
	$opurl = "view_opd_follow_upadd.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_et_chart where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivf_et_chart = $dbhelper->ExecuteRows($sql);
	$Vivf_et_chartRowCount = count($ivf_et_chart);
	if($ivf_et_chart == false)
	{
		$Etcountwarn = "";
		$ivf_et_chartUrl = "ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($Vivf_et_chartRowCount > 0)
		{
			$Etcountwarn ='<span class="badge bg-warning">'.$Vivf_et_chartRowCount.'</span>';
			if($cid == $ivf_et_chart[$Vivf_et_chartRowCount-1]["TidNo"])
			{
				$ivf_et_chartUrl = "ivf_et_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivf_et_chart[$Vivf_et_chartRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $Vivf_et_chartRowCount; $x++) {
					if($cid == $ivf_et_chart[$x]["TidNo"])
					{
						$kk = 1;
						$ivf_et_chartUrl = "ivf_et_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivf_et_chart[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivf_et_chartUrl = "ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivf_et_chart[$Vivf_et_chartRowCount-1]["id"]."";
				}
			}
		}else{
			$ivf_et_chartUrl = "ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}

	//http://localhost:1445/ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_art_summary where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfartsummary = $dbhelper->ExecuteRows($sql);
	$ivfartsummaryRowCount = count($ivfartsummary);
	if($ivfartsummary == false)
	{
		$ivfartsummarycountwarn = "";
		$ivfartsummaryUrl = "ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfartsummaryRowCount > 0)
		{
			$ivfartsummarycountwarn ='<span class="badge bg-warning">'.$ivfartsummaryRowCount.'</span>';
			if($cid == $ivfartsummary[$ivfartsummaryRowCount-1]["TidNo"])
			{
				$ivfartsummaryUrl = "ivf_art_summaryview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfartsummary[$ivfartsummaryRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfartsummaryRowCount; $x++) {
					if($cid == $ivfartsummary[$x]["TidNo"])
					{
						$kk = 1;
						$ivfartsummaryUrl = "ivf_art_summaryview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfartsummary[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfartsummaryUrl = "ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfartsummary[$ivfartsummaryRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfartsummaryUrl = "ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}

  //  http://localhost:1445/ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=1&fk_Name=597&fk_RIDNO=11
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_stimulation_chart where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfstimulationchart = $dbhelper->ExecuteRows($sql);
	$ivfstimulationchartRowCount = count($ivfstimulationchart);
	if($ivfstimulationchart == false)
	{
		$ivfstimulationchartwarn = "";
		$ivfstimulationchartUrl = "ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($VitalsHistoryRowCount > 0)
		{
			$ivfstimulationchartwarn ='<span class="badge bg-warning">'.$VitalsHistoryRowCount.'</span>';
			if($cid == $ivfstimulationchart[$ivfstimulationchartRowCount-1]["TidNo"])
			{
				$ivfstimulationchartUrl = "ivf_stimulation_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfstimulationchart[$ivfstimulationchartRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfstimulationchartRowCount; $x++) {
					if($cid == $ivfstimulationchart[$x]["TidNo"])
					{
						$kk = 1;
						$ivfstimulationchartUrl = "ivf_stimulation_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfstimulationchart[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfstimulationchartUrl = "ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfstimulationchart[$ivfstimulationchartRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfstimulationchartUrl = "ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}

  //  http://localhost:1445/ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_semenanalysisreport where RIDNo='".$IVFid."' and PatientName='".$results2[0]["id"]."' ;";
	$ivfsemenanalysisreport = $dbhelper->ExecuteRows($sql);
	$ivfsemenanalysisreportRowCount = count($ivfsemenanalysisreport);
	if($ivfsemenanalysisreport == false)
	{
		$ivfsemenanalysisreportwarn = "";
		$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfsemenanalysisreportRowCount > 0)
		{
			$ivfsemenanalysisreportwarn ='<span class="badge bg-warning">'.$ivfsemenanalysisreportRowCount.'</span>';
			if($cid == $ivfsemenanalysisreport[$ivfsemenanalysisreportRowCount-1]["TidNo"])
			{
				$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfsemenanalysisreport[$ivfsemenanalysisreportRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfsemenanalysisreportRowCount; $x++) {
					if($cid == $ivfsemenanalysisreport[$x]["TidNo"])
					{
						$kk = 1;
						$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfsemenanalysisreport[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfsemenanalysisreport[$ivfsemenanalysisreportRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}

  //  http://localhost:1445/ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_ovum_pick_up_chart where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfovumpickupchart = $dbhelper->ExecuteRows($sql);
	$ivfovumpickupchartRowCount = count($ivfovumpickupchart);
	if($ivfovumpickupchart == false)
	{
		$ivfovumpickupchartwarn = "";
		$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfovumpickupchartRowCount > 0)
		{
			$ivfovumpickupchartwarn ='<span class="badge bg-warning">'.$ivfovumpickupchartRowCount.'</span>';
			if($cid == $ivfovumpickupchart[$ivfovumpickupchartRowCount-1]["TidNo"])
			{
				$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfovumpickupchart[$ivfovumpickupchartRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfovumpickupchartRowCount; $x++) {
					if($cid == $ivfovumpickupchart[$x]["TidNo"])
					{
						$kk = 1;
						$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfovumpickupchart[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfovumpickupchart[$ivfovumpickupchartRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}

   // http://localhost:1445/ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_otherprocedure where RIDNO='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfotherprocedure = $dbhelper->ExecuteRows($sql);
	$ivfotherprocedureRowCount = count($ivfotherprocedure);
	if($ivfotherprocedure == false)
	{
		$ivfotherprocedurewarn = "";
		$ivfotherprocedureUrl = "ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfotherprocedureRowCount > 0)
		{
			$ivfotherprocedurewarn ='<span class="badge bg-warning">'.$ivfotherprocedureRowCount.'</span>';
			if($cid == $ivfotherprocedure[$ivfotherprocedureRowCount-1]["TidNo"])
			{
				$ivfotherprocedureUrl = "ivf_otherprocedureview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfotherprocedure[$ivfotherprocedureRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfotherprocedureRowCount; $x++) {
					if($cid == $ivfotherprocedure[$x]["TidNo"])
					{
						$kk = 1;
						$ivfotherprocedureUrl = "ivf_otherprocedureview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfotherprocedure[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfotherprocedureUrl = "ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfotherprocedure[$ivfotherprocedureRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfotherprocedureUrl = "ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}

  //  http://localhost:1445/ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$ivfembryologychartlistUrl = "ivf_embryology_chartlist.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add

	//http://localhost:1445/ivf_embryology_chartlist.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$patientserviceslistUrl = "patient_serviceslist.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";

	//http://localhost:1445/patient_serviceslist.php?showmaster=ivf_treatment_plan&fk_Name=597&fk_RIDNO=11&fk_id=1
	$followupurl = "ivf_follow_up_trackingadd.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";

	//http://localhost:1445/ivf_follow_up_trackingadd.php?showmaster=ivf_treatment_plan&fk_id=1&fk_RIDNO=11&fk_Name=597
	$followupurl = "ivf_follow_up_trackingadd.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";
	$TrPlanurl = "ivf_treatment_planview.php?showdetail=&id=".$cid."&showmaster=ivf&fk_id=".$IVFid."&fk_Female=".$results2[0]["id"]."";

	//http://localhost:1445/ivf_treatment_planview.php?showdetail=&id=1&showmaster=ivf&fk_id=11&fk_Female=597
	$SaveUrl = "";
	$ViewUrl = "";
	$NextUrl = "";
?>
	<div class="card">
			  <div class="card-header">
				<h3 class="card-title">Application Buttons</h3>
			  </div>
			  <div class="card-body">
				<a class="btn btn-app"  href="javascript:history.back()">
				  <i class="fas fa-undo"></i> Back
				</a>	  
			  </div>
			  <!-- /.card-body -->
		</div>
</br>
<div class="row">
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Patient</h3>
			</div>
			<div class="card-body">
				 <div class="ew-row">
				 	<table  style="width: 100%;"  class="ew-table">
			  			<tbody>
			  				<tr><td>{{include tmpl="#tpc_ivf_vitals_history_Fheight"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_Fheight"/}} Cm.</td><td>{{include tmpl="#tpc_ivf_vitals_history_Fweight"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_Fweight"/}} Kg.</td></tr>
			  			</tbody>
			  		</table>
					<span class="ew-cell col-6">{{include tmpl="#tpc_ivf_vitals_history_FBMI"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_FBMI"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_IdentificationMark"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_IdentificationMark"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_FBuild"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_FBuild"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_FSkinColor"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_FSkinColor"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_FEyesColor"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_FEyesColor"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_FHairColor"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_FHairColor"/}}</span>
				  </div>
				<div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_MHairTexture"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_MHairTexture"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_Mothers"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_Mothers"/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Partner</h3>
			</div>
			<div class="card-body">
				<div class="ew-row">
					<table  style="width: 100%;"  class="ew-table">
			  			<tbody>
			  				<tr><td>{{include tmpl="#tpc_ivf_vitals_history_Mheight"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_Mheight"/}} Cm.</td><td>{{include tmpl="#tpc_ivf_vitals_history_Mweight"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_Mweight"/}} Kg.</td></tr>
			  			</tbody>
			  		</table>
					<span class="ew-cell col-6">{{include tmpl="#tpc_ivf_vitals_history_MBMI"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_MBMI"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_Address"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_Address"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_MBuild"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_MBuild"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_MSkinColor"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_MSkinColor"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_MEyesColor"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_MEyesColor"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_MhairColor"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_MhairColor"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_FhairTexture"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_FhairTexture"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_Fothers"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_Fothers"/}}</span>
				  </div>
				  			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
<input type="hidden" id="Repagehistoryview" name="Repagehistoryview" value="3487">
<table class="ew-table">
	 <tbody>
		<tr>
			<td>
				<button class="btn bg-secondary btn-lg" onClick="callHomeFunction()">Home</button>
			</td>
			<td>
				<button class="btn bg-info btn-lg" onClick="callSaveFunction()">Save</button>
			</td>
			<td>
				<button class="btn bg-warning btn-lg" onClick="callViewFunction()">View</button>
			</td>
			<td>
				<button class="btn bg-success btn-lg" onClick="callNextFunction()">Next</button>
			</td>
		</tr>
	</tbody>
</table>
  				 <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_MariedFor"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_MariedFor"/}}</span>
				  </div>
				  				 <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_CMNCM"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_CMNCM"/}}</span>
				  </div>
{{include tmpl="#tpc_ivf_vitals_history_Chiefcomplaints"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_Chiefcomplaints"/}}
  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_CoitalHistory"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_CoitalHistory"/}}</span>
				  </div>
				  				 <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_FertilityTreatmentHistory"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_FertilityTreatmentHistory"/}}</span>
				  </div>
<table class="ew-table">
	 <tbody>
		<tr>
			<td>
				<button class="btn bg-secondary btn-lg" onClick="callHomeFunction()">Home</button>
			</td>
			<td>
				<button class="btn bg-info btn-lg" onClick="callSaveFunction()">Save</button>
			</td>
			<td>
				<button class="btn bg-warning btn-lg" onClick="callViewFunction()">View</button>
			</td>
			<td>
				<button class="btn bg-success btn-lg" onClick="callNextFunction()">Next</button>
			</td>
		</tr>
	</tbody>
</table>
<div class="row">
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Patient</h3>
			</div>
			<div class="card-body">
			 		<div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_MenstrualHistory"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_MenstrualHistory"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_ObstetricHistory"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_ObstetricHistory"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_MedicalHistory"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_MedicalHistory"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_SurgeryHistory"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_SurgeryHistory"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_FamilyHistory"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_FamilyHistory"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_PInvestigations"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_PInvestigations"/}}</span>
				  </div>
					<div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_pTemplateMedications"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_pTemplateMedications"/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Partner</h3>
			</div>
			<div class="card-body">
				<div class="ew-row">
						<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_Addictions"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_Addictions"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_Medical"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_Medical"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_Surgical"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_Surgical"/}}</span>
				  </div>
				<div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_pFamilyHistory"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_pFamilyHistory"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_SemenAnalysis"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_SemenAnalysis"/}}</span>
				  </div>
				    <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_MInsvestications"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_MInsvestications"/}}</span>
				  </div>
				   <div class="ew-row">
				  		<table class="ew-table">
				  			<tbody>
				  				<tr>
				  					<td>
				  						<button class="btn bg-secondary btn-lg" onClick="callHomeFunction()">Home</button>
				  					</td>		
				  					<td>
										<button class="btn bg-info btn-lg" onClick="callSaveFunction()">Save</button>
									</td>
									<td>
										<button class="btn bg-warning btn-lg" onClick="callViewFunction()">View</button>
									</td>
									<td>
										<button class="btn bg-success btn-lg" onClick="callNextFunction()">Next</button>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_Medications"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_Medications"/}}</span>
				  </div>
				  			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
<table class="ew-table">
	 <tbody>
		<tr>
			<td>
				<button class="btn bg-secondary btn-lg" onClick="callHomeFunction()">Home</button>
			</td>
			<td>
				<button class="btn bg-info btn-lg" onClick="callSaveFunction()">Save</button>
			</td>
			<td>
				<button class="btn bg-warning btn-lg" onClick="callViewFunction()">View</button>
			</td>
			<td>
				<button class="btn bg-success btn-lg" onClick="callNextFunction()">Next</button>
			</td>
		</tr>
	</tbody>
</table>
<div class="row">
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Patient</h3>
			</div>
			<div class="card-body">
				 <div class="ew-row">
				 	<span class="ew-cellA col-6">{{include tmpl="#tpc_ivf_vitals_history_PGE"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_PGE"/}}</span>
					<span class="ew-cellA col-6">{{include tmpl="#tpc_ivf_vitals_history_PPR"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_PPR"/}}</span>
				 	<div class="row">
				 		<span class="ew-cellA col-6">{{include tmpl="#tpc_ivf_vitals_history_PBP"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_PBP"/}}</span>
				 		<span class="ew-cellA col-6">mm of Hg</span>
				 	</div>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_Breast"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_Breast"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_PPA"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_PPA"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_PPSV"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_PPSV"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_PPAPSMEAR"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_PPAPSMEAR"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_PTHYROID"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_PTHYROID"/}}</span>
				  </div>
				  	<div class="row">
				 		<span class="ew-cellA col-9">{{include tmpl="#tpc_ivf_vitals_history_AntiTPO"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_AntiTPO"/}}</span>
				 		<span class="ew-cellA col-3">IU/mL</span>
				 	</div>
				 	<div class="row">
				 		<span class="ew-cellA col-9">{{include tmpl="#tpc_ivf_vitals_history_AntiTG"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_AntiTG"/}}</span>
				 		<span class="ew-cellA col-3">IU/mL</span>
				 	</div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Partner</h3>
			</div>
			<div class="card-body">
				<div class="ew-row">
						<span class="ew-cell col-6">{{include tmpl="#tpc_ivf_vitals_history_MTHYROID"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_MTHYROID"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_SecSexCharacters"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_SecSexCharacters"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_PenisUM"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_PenisUM"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_VAS"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_VAS"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_EPIDIDYMIS"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_EPIDIDYMIS"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_Varicocele"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_Varicocele"/}}</span>
				  </div>
				  			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
<table class="ew-table">
	 <tbody>
		<tr>
			<td>
				<button class="btn bg-secondary btn-lg" onClick="callHomeFunction()">Home</button>
			</td>
			<td>
				<button class="btn bg-info btn-lg" onClick="callSaveFunction()">Save</button>
			</td>
			<td>
				<button class="btn bg-warning btn-lg" onClick="callViewFunction()">View</button>
			</td>
			<td>
				<button class="btn bg-success btn-lg" onClick="callNextFunction()">Next</button>
			</td>
		</tr>
	</tbody>
</table>
<div class="row">
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Patient</h3>
			</div>
			<div class="card-body">
			 		<div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_PImpression"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_PImpression"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_PPlanOfManagement"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_PPlanOfManagement"/}}</span>
				  </div>
				 <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_PReadMore"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_PReadMore"/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Partner</h3>
			</div>
			<div class="card-body">
				<div class="ew-row">
						<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_MIMpression"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_MIMpression"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_MPlanOfManagement"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_MPlanOfManagement"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_MReadMore"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_MReadMore"/}}</span>
				  </div>
				  			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
<table class="ew-table">
	 <tbody>
		<tr>
			<td>
				<button class="btn bg-secondary btn-lg" onClick="callHomeFunction()">Home</button>
			</td>
			<td>
				<button class="btn bg-info btn-lg" onClick="callSaveFunction()">Save</button>
			</td>
			<td>
				<button class="btn bg-warning btn-lg" onClick="callViewFunction()">View</button>
			</td>
			<td>
				<button class="btn bg-success btn-lg" onClick="callNextFunction()">Next</button>
			</td>
		</tr>
	</tbody>
</table>
</div>
</script>
<?php if (!$ivf_vitals_history_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $ivf_vitals_history_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_vitals_history_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($ivf_vitals_history->Rows) ?> };
ew.applyTemplate("tpd_ivf_vitals_historyadd", "tpm_ivf_vitals_historyadd", "ivf_vitals_historyadd", "<?php echo $ivf_vitals_history->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.ivf_vitals_historyadd_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$ivf_vitals_history_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

 document.getElementById("x_Fweight").style.width = "80px";
 document.getElementById("x_Fheight").style.width = "80px";
 document.getElementById("x_Mweight").style.width = "80px";
 document.getElementById("x_Mheight").style.width = "80px";
   $("#x_Fweight").change(function(){
		calculateBmi();
	});
	$("#x_Fheight").change(function(){
		calculateBmi();
	});

	function calculateBmi() {
		var weight = document.getElementById("x_Fweight").value
		var height = document.getElementById("x_Fheight").value
		if(weight > 0 && height > 0){	
			var finalBmi = weight / (height / 100 * height / 100)            
			finalBmi = Math.round(finalBmi * 1000) / 1000;
			if(finalBmi < 18.5){
				finalBmi = finalBmi + " Too Thin";

			   // document.bmiForm.meaning.value = "That you are too thin."
			}
			if(finalBmi > 18.5 && finalBmi < 25){

			   // document.bmiForm.meaning.value = "That you are healthy."
			   finalBmi = finalBmi + " Healthy";
			}
			if(finalBmi > 25){

			   // document.bmiForm.meaning.value = "That you have overweight."
			   finalBmi = finalBmi + " Over Weight";
			}

			//document.getElementById("BodyMassIndexValue").innerText = finalBmi;
			document.getElementById("x_FBMI").value = finalBmi;
		}
		else{

			//alert("Please Fill in everything correctly")
		}
	}
	   $("#x_Mweight").change(function(){
		calculateBmiM();
	});
	$("#x_Mheight").change(function(){
		calculateBmiM();
	});

	function calculateBmiM() {
		var weight = document.getElementById("x_Mweight").value
		var height = document.getElementById("x_Mheight").value
		if(weight > 0 && height > 0){	
			var finalBmi = weight / (height / 100 * height / 100)            
			finalBmi = Math.round(finalBmi * 1000) / 1000;
			if(finalBmi < 18.5){
				finalBmi = finalBmi + " Too Thin";

			   // document.bmiForm.meaning.value = "That you are too thin."
			}
			if(finalBmi > 18.5 && finalBmi < 25){

			   // document.bmiForm.meaning.value = "That you are healthy."
			   finalBmi = finalBmi + " Healthy";
			}
			if(finalBmi > 25){

			   // document.bmiForm.meaning.value = "That you have overweight."
			   finalBmi = finalBmi + " Over Weight";
			}

			//document.getElementById("BodyMassIndexValue").innerText = finalBmi;
			document.getElementById("x_MBMI").value = finalBmi;
		}
		else{

			//alert("Please Fill in everything correctly")
		}
	}

	function callSaveFunction()
	{		
		document.getElementById("Repagehistoryview").value = "EditFunction";
	}

	function callViewFunction()
	{		
		document.getElementById("Repagehistoryview").value = "ViewFunction";
	}

	function callNextFunction()
	{		
		document.getElementById("Repagehistoryview").value = "NextFunction";
	}

	function callHomeFunction()
	{		
		document.getElementById("Repagehistoryview").value = "HomeFunction";
	}
</script>
<?php include_once "footer.php" ?>
<?php
$ivf_vitals_history_add->terminate();
?>