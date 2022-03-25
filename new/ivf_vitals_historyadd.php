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
<?php include_once "header.php"; ?>
<script>
var fivf_vitals_historyadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fivf_vitals_historyadd = currentForm = new ew.Form("fivf_vitals_historyadd", "add");

	// Validate form
	fivf_vitals_historyadd.validate = function() {
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
			<?php if ($ivf_vitals_history_add->RIDNO->Required) { ?>
				elm = this.getElements("x" + infix + "_RIDNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->RIDNO->caption(), $ivf_vitals_history_add->RIDNO->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RIDNO");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_vitals_history_add->RIDNO->errorMessage()) ?>");
			<?php if ($ivf_vitals_history_add->Name->Required) { ?>
				elm = this.getElements("x" + infix + "_Name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->Name->caption(), $ivf_vitals_history_add->Name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->Age->caption(), $ivf_vitals_history_add->Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->SEX->Required) { ?>
				elm = this.getElements("x" + infix + "_SEX");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->SEX->caption(), $ivf_vitals_history_add->SEX->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->Religion->Required) { ?>
				elm = this.getElements("x" + infix + "_Religion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->Religion->caption(), $ivf_vitals_history_add->Religion->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->Address->Required) { ?>
				elm = this.getElements("x" + infix + "_Address");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->Address->caption(), $ivf_vitals_history_add->Address->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->IdentificationMark->Required) { ?>
				elm = this.getElements("x" + infix + "_IdentificationMark");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->IdentificationMark->caption(), $ivf_vitals_history_add->IdentificationMark->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->DoublewitnessName1->Required) { ?>
				elm = this.getElements("x" + infix + "_DoublewitnessName1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->DoublewitnessName1->caption(), $ivf_vitals_history_add->DoublewitnessName1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->DoublewitnessName2->Required) { ?>
				elm = this.getElements("x" + infix + "_DoublewitnessName2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->DoublewitnessName2->caption(), $ivf_vitals_history_add->DoublewitnessName2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->Chiefcomplaints->Required) { ?>
				elm = this.getElements("x" + infix + "_Chiefcomplaints");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->Chiefcomplaints->caption(), $ivf_vitals_history_add->Chiefcomplaints->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->MenstrualHistory->Required) { ?>
				elm = this.getElements("x" + infix + "_MenstrualHistory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->MenstrualHistory->caption(), $ivf_vitals_history_add->MenstrualHistory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->ObstetricHistory->Required) { ?>
				elm = this.getElements("x" + infix + "_ObstetricHistory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->ObstetricHistory->caption(), $ivf_vitals_history_add->ObstetricHistory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->MedicalHistory->Required) { ?>
				elm = this.getElements("x" + infix + "_MedicalHistory[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->MedicalHistory->caption(), $ivf_vitals_history_add->MedicalHistory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->SurgicalHistory->Required) { ?>
				elm = this.getElements("x" + infix + "_SurgicalHistory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->SurgicalHistory->caption(), $ivf_vitals_history_add->SurgicalHistory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->Generalexaminationpallor->Required) { ?>
				elm = this.getElements("x" + infix + "_Generalexaminationpallor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->Generalexaminationpallor->caption(), $ivf_vitals_history_add->Generalexaminationpallor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->PR->Required) { ?>
				elm = this.getElements("x" + infix + "_PR");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->PR->caption(), $ivf_vitals_history_add->PR->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->CVS->Required) { ?>
				elm = this.getElements("x" + infix + "_CVS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->CVS->caption(), $ivf_vitals_history_add->CVS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->PA->Required) { ?>
				elm = this.getElements("x" + infix + "_PA");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->PA->caption(), $ivf_vitals_history_add->PA->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->PROVISIONALDIAGNOSIS->Required) { ?>
				elm = this.getElements("x" + infix + "_PROVISIONALDIAGNOSIS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->PROVISIONALDIAGNOSIS->caption(), $ivf_vitals_history_add->PROVISIONALDIAGNOSIS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->Investigations->Required) { ?>
				elm = this.getElements("x" + infix + "_Investigations");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->Investigations->caption(), $ivf_vitals_history_add->Investigations->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->Fheight->Required) { ?>
				elm = this.getElements("x" + infix + "_Fheight");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->Fheight->caption(), $ivf_vitals_history_add->Fheight->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->Fweight->Required) { ?>
				elm = this.getElements("x" + infix + "_Fweight");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->Fweight->caption(), $ivf_vitals_history_add->Fweight->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->FBMI->Required) { ?>
				elm = this.getElements("x" + infix + "_FBMI");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->FBMI->caption(), $ivf_vitals_history_add->FBMI->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->FBloodgroup->Required) { ?>
				elm = this.getElements("x" + infix + "_FBloodgroup");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->FBloodgroup->caption(), $ivf_vitals_history_add->FBloodgroup->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->Mheight->Required) { ?>
				elm = this.getElements("x" + infix + "_Mheight");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->Mheight->caption(), $ivf_vitals_history_add->Mheight->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->Mweight->Required) { ?>
				elm = this.getElements("x" + infix + "_Mweight");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->Mweight->caption(), $ivf_vitals_history_add->Mweight->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->MBMI->Required) { ?>
				elm = this.getElements("x" + infix + "_MBMI");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->MBMI->caption(), $ivf_vitals_history_add->MBMI->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->MBloodgroup->Required) { ?>
				elm = this.getElements("x" + infix + "_MBloodgroup");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->MBloodgroup->caption(), $ivf_vitals_history_add->MBloodgroup->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->FBuild->Required) { ?>
				elm = this.getElements("x" + infix + "_FBuild");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->FBuild->caption(), $ivf_vitals_history_add->FBuild->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->MBuild->Required) { ?>
				elm = this.getElements("x" + infix + "_MBuild");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->MBuild->caption(), $ivf_vitals_history_add->MBuild->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->FSkinColor->Required) { ?>
				elm = this.getElements("x" + infix + "_FSkinColor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->FSkinColor->caption(), $ivf_vitals_history_add->FSkinColor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->MSkinColor->Required) { ?>
				elm = this.getElements("x" + infix + "_MSkinColor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->MSkinColor->caption(), $ivf_vitals_history_add->MSkinColor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->FEyesColor->Required) { ?>
				elm = this.getElements("x" + infix + "_FEyesColor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->FEyesColor->caption(), $ivf_vitals_history_add->FEyesColor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->MEyesColor->Required) { ?>
				elm = this.getElements("x" + infix + "_MEyesColor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->MEyesColor->caption(), $ivf_vitals_history_add->MEyesColor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->FHairColor->Required) { ?>
				elm = this.getElements("x" + infix + "_FHairColor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->FHairColor->caption(), $ivf_vitals_history_add->FHairColor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->MhairColor->Required) { ?>
				elm = this.getElements("x" + infix + "_MhairColor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->MhairColor->caption(), $ivf_vitals_history_add->MhairColor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->FhairTexture->Required) { ?>
				elm = this.getElements("x" + infix + "_FhairTexture");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->FhairTexture->caption(), $ivf_vitals_history_add->FhairTexture->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->MHairTexture->Required) { ?>
				elm = this.getElements("x" + infix + "_MHairTexture");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->MHairTexture->caption(), $ivf_vitals_history_add->MHairTexture->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->Fothers->Required) { ?>
				elm = this.getElements("x" + infix + "_Fothers");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->Fothers->caption(), $ivf_vitals_history_add->Fothers->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->Mothers->Required) { ?>
				elm = this.getElements("x" + infix + "_Mothers");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->Mothers->caption(), $ivf_vitals_history_add->Mothers->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->PGE->Required) { ?>
				elm = this.getElements("x" + infix + "_PGE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->PGE->caption(), $ivf_vitals_history_add->PGE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->PPR->Required) { ?>
				elm = this.getElements("x" + infix + "_PPR");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->PPR->caption(), $ivf_vitals_history_add->PPR->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->PBP->Required) { ?>
				elm = this.getElements("x" + infix + "_PBP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->PBP->caption(), $ivf_vitals_history_add->PBP->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->Breast->Required) { ?>
				elm = this.getElements("x" + infix + "_Breast");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->Breast->caption(), $ivf_vitals_history_add->Breast->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->PPA->Required) { ?>
				elm = this.getElements("x" + infix + "_PPA");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->PPA->caption(), $ivf_vitals_history_add->PPA->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->PPSV->Required) { ?>
				elm = this.getElements("x" + infix + "_PPSV");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->PPSV->caption(), $ivf_vitals_history_add->PPSV->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->PPAPSMEAR->Required) { ?>
				elm = this.getElements("x" + infix + "_PPAPSMEAR");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->PPAPSMEAR->caption(), $ivf_vitals_history_add->PPAPSMEAR->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->PTHYROID->Required) { ?>
				elm = this.getElements("x" + infix + "_PTHYROID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->PTHYROID->caption(), $ivf_vitals_history_add->PTHYROID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->MTHYROID->Required) { ?>
				elm = this.getElements("x" + infix + "_MTHYROID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->MTHYROID->caption(), $ivf_vitals_history_add->MTHYROID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->SecSexCharacters->Required) { ?>
				elm = this.getElements("x" + infix + "_SecSexCharacters");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->SecSexCharacters->caption(), $ivf_vitals_history_add->SecSexCharacters->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->PenisUM->Required) { ?>
				elm = this.getElements("x" + infix + "_PenisUM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->PenisUM->caption(), $ivf_vitals_history_add->PenisUM->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->VAS->Required) { ?>
				elm = this.getElements("x" + infix + "_VAS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->VAS->caption(), $ivf_vitals_history_add->VAS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->EPIDIDYMIS->Required) { ?>
				elm = this.getElements("x" + infix + "_EPIDIDYMIS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->EPIDIDYMIS->caption(), $ivf_vitals_history_add->EPIDIDYMIS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->Varicocele->Required) { ?>
				elm = this.getElements("x" + infix + "_Varicocele");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->Varicocele->caption(), $ivf_vitals_history_add->Varicocele->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->FertilityTreatmentHistory->Required) { ?>
				elm = this.getElements("x" + infix + "_FertilityTreatmentHistory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->FertilityTreatmentHistory->caption(), $ivf_vitals_history_add->FertilityTreatmentHistory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->SurgeryHistory->Required) { ?>
				elm = this.getElements("x" + infix + "_SurgeryHistory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->SurgeryHistory->caption(), $ivf_vitals_history_add->SurgeryHistory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->FamilyHistory->Required) { ?>
				elm = this.getElements("x" + infix + "_FamilyHistory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->FamilyHistory->caption(), $ivf_vitals_history_add->FamilyHistory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->PInvestigations->Required) { ?>
				elm = this.getElements("x" + infix + "_PInvestigations");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->PInvestigations->caption(), $ivf_vitals_history_add->PInvestigations->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->Addictions->Required) { ?>
				elm = this.getElements("x" + infix + "_Addictions[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->Addictions->caption(), $ivf_vitals_history_add->Addictions->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->Medications->Required) { ?>
				elm = this.getElements("x" + infix + "_Medications");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->Medications->caption(), $ivf_vitals_history_add->Medications->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->Medical->Required) { ?>
				elm = this.getElements("x" + infix + "_Medical");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->Medical->caption(), $ivf_vitals_history_add->Medical->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->Surgical->Required) { ?>
				elm = this.getElements("x" + infix + "_Surgical");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->Surgical->caption(), $ivf_vitals_history_add->Surgical->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->CoitalHistory->Required) { ?>
				elm = this.getElements("x" + infix + "_CoitalHistory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->CoitalHistory->caption(), $ivf_vitals_history_add->CoitalHistory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->SemenAnalysis->Required) { ?>
				elm = this.getElements("x" + infix + "_SemenAnalysis");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->SemenAnalysis->caption(), $ivf_vitals_history_add->SemenAnalysis->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->MInsvestications->Required) { ?>
				elm = this.getElements("x" + infix + "_MInsvestications");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->MInsvestications->caption(), $ivf_vitals_history_add->MInsvestications->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->PImpression->Required) { ?>
				elm = this.getElements("x" + infix + "_PImpression");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->PImpression->caption(), $ivf_vitals_history_add->PImpression->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->MIMpression->Required) { ?>
				elm = this.getElements("x" + infix + "_MIMpression");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->MIMpression->caption(), $ivf_vitals_history_add->MIMpression->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->PPlanOfManagement->Required) { ?>
				elm = this.getElements("x" + infix + "_PPlanOfManagement");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->PPlanOfManagement->caption(), $ivf_vitals_history_add->PPlanOfManagement->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->MPlanOfManagement->Required) { ?>
				elm = this.getElements("x" + infix + "_MPlanOfManagement");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->MPlanOfManagement->caption(), $ivf_vitals_history_add->MPlanOfManagement->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->PReadMore->Required) { ?>
				elm = this.getElements("x" + infix + "_PReadMore");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->PReadMore->caption(), $ivf_vitals_history_add->PReadMore->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->MReadMore->Required) { ?>
				elm = this.getElements("x" + infix + "_MReadMore");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->MReadMore->caption(), $ivf_vitals_history_add->MReadMore->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->MariedFor->Required) { ?>
				elm = this.getElements("x" + infix + "_MariedFor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->MariedFor->caption(), $ivf_vitals_history_add->MariedFor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->CMNCM->Required) { ?>
				elm = this.getElements("x" + infix + "_CMNCM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->CMNCM->caption(), $ivf_vitals_history_add->CMNCM->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->TemplateMenstrualHistory->Required) { ?>
				elm = this.getElements("x" + infix + "_TemplateMenstrualHistory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->TemplateMenstrualHistory->caption(), $ivf_vitals_history_add->TemplateMenstrualHistory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->TemplateObstetricHistory->Required) { ?>
				elm = this.getElements("x" + infix + "_TemplateObstetricHistory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->TemplateObstetricHistory->caption(), $ivf_vitals_history_add->TemplateObstetricHistory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->TemplateFertilityTreatmentHistory->Required) { ?>
				elm = this.getElements("x" + infix + "_TemplateFertilityTreatmentHistory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->TemplateFertilityTreatmentHistory->caption(), $ivf_vitals_history_add->TemplateFertilityTreatmentHistory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->TemplateSurgeryHistory->Required) { ?>
				elm = this.getElements("x" + infix + "_TemplateSurgeryHistory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->TemplateSurgeryHistory->caption(), $ivf_vitals_history_add->TemplateSurgeryHistory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->TemplateFInvestigations->Required) { ?>
				elm = this.getElements("x" + infix + "_TemplateFInvestigations");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->TemplateFInvestigations->caption(), $ivf_vitals_history_add->TemplateFInvestigations->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->TemplatePlanOfManagement->Required) { ?>
				elm = this.getElements("x" + infix + "_TemplatePlanOfManagement");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->TemplatePlanOfManagement->caption(), $ivf_vitals_history_add->TemplatePlanOfManagement->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->TemplatePImpression->Required) { ?>
				elm = this.getElements("x" + infix + "_TemplatePImpression");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->TemplatePImpression->caption(), $ivf_vitals_history_add->TemplatePImpression->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->TemplateMedications->Required) { ?>
				elm = this.getElements("x" + infix + "_TemplateMedications");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->TemplateMedications->caption(), $ivf_vitals_history_add->TemplateMedications->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->TemplateSemenAnalysis->Required) { ?>
				elm = this.getElements("x" + infix + "_TemplateSemenAnalysis");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->TemplateSemenAnalysis->caption(), $ivf_vitals_history_add->TemplateSemenAnalysis->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->MaleInsvestications->Required) { ?>
				elm = this.getElements("x" + infix + "_MaleInsvestications");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->MaleInsvestications->caption(), $ivf_vitals_history_add->MaleInsvestications->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->TemplateMIMpression->Required) { ?>
				elm = this.getElements("x" + infix + "_TemplateMIMpression");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->TemplateMIMpression->caption(), $ivf_vitals_history_add->TemplateMIMpression->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->TemplateMalePlanOfManagement->Required) { ?>
				elm = this.getElements("x" + infix + "_TemplateMalePlanOfManagement");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->TemplateMalePlanOfManagement->caption(), $ivf_vitals_history_add->TemplateMalePlanOfManagement->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->TidNo->Required) { ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->TidNo->caption(), $ivf_vitals_history_add->TidNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_vitals_history_add->TidNo->errorMessage()) ?>");
			<?php if ($ivf_vitals_history_add->pFamilyHistory->Required) { ?>
				elm = this.getElements("x" + infix + "_pFamilyHistory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->pFamilyHistory->caption(), $ivf_vitals_history_add->pFamilyHistory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitals_history_add->pTemplateMedications->Required) { ?>
				elm = this.getElements("x" + infix + "_pTemplateMedications");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitals_history_add->pTemplateMedications->caption(), $ivf_vitals_history_add->pTemplateMedications->RequiredErrorMessage)) ?>");
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
	fivf_vitals_historyadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fivf_vitals_historyadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fivf_vitals_historyadd.lists["x_MedicalHistory[]"] = <?php echo $ivf_vitals_history_add->MedicalHistory->Lookup->toClientList($ivf_vitals_history_add) ?>;
	fivf_vitals_historyadd.lists["x_MedicalHistory[]"].options = <?php echo JsonEncode($ivf_vitals_history_add->MedicalHistory->options(FALSE, TRUE)) ?>;
	fivf_vitals_historyadd.lists["x_FBloodgroup"] = <?php echo $ivf_vitals_history_add->FBloodgroup->Lookup->toClientList($ivf_vitals_history_add) ?>;
	fivf_vitals_historyadd.lists["x_FBloodgroup"].options = <?php echo JsonEncode($ivf_vitals_history_add->FBloodgroup->lookupOptions()) ?>;
	fivf_vitals_historyadd.lists["x_MBloodgroup"] = <?php echo $ivf_vitals_history_add->MBloodgroup->Lookup->toClientList($ivf_vitals_history_add) ?>;
	fivf_vitals_historyadd.lists["x_MBloodgroup"].options = <?php echo JsonEncode($ivf_vitals_history_add->MBloodgroup->lookupOptions()) ?>;
	fivf_vitals_historyadd.lists["x_FBuild"] = <?php echo $ivf_vitals_history_add->FBuild->Lookup->toClientList($ivf_vitals_history_add) ?>;
	fivf_vitals_historyadd.lists["x_FBuild"].options = <?php echo JsonEncode($ivf_vitals_history_add->FBuild->options(FALSE, TRUE)) ?>;
	fivf_vitals_historyadd.lists["x_MBuild"] = <?php echo $ivf_vitals_history_add->MBuild->Lookup->toClientList($ivf_vitals_history_add) ?>;
	fivf_vitals_historyadd.lists["x_MBuild"].options = <?php echo JsonEncode($ivf_vitals_history_add->MBuild->options(FALSE, TRUE)) ?>;
	fivf_vitals_historyadd.lists["x_FSkinColor"] = <?php echo $ivf_vitals_history_add->FSkinColor->Lookup->toClientList($ivf_vitals_history_add) ?>;
	fivf_vitals_historyadd.lists["x_FSkinColor"].options = <?php echo JsonEncode($ivf_vitals_history_add->FSkinColor->options(FALSE, TRUE)) ?>;
	fivf_vitals_historyadd.lists["x_MSkinColor"] = <?php echo $ivf_vitals_history_add->MSkinColor->Lookup->toClientList($ivf_vitals_history_add) ?>;
	fivf_vitals_historyadd.lists["x_MSkinColor"].options = <?php echo JsonEncode($ivf_vitals_history_add->MSkinColor->options(FALSE, TRUE)) ?>;
	fivf_vitals_historyadd.lists["x_FEyesColor"] = <?php echo $ivf_vitals_history_add->FEyesColor->Lookup->toClientList($ivf_vitals_history_add) ?>;
	fivf_vitals_historyadd.lists["x_FEyesColor"].options = <?php echo JsonEncode($ivf_vitals_history_add->FEyesColor->options(FALSE, TRUE)) ?>;
	fivf_vitals_historyadd.lists["x_MEyesColor"] = <?php echo $ivf_vitals_history_add->MEyesColor->Lookup->toClientList($ivf_vitals_history_add) ?>;
	fivf_vitals_historyadd.lists["x_MEyesColor"].options = <?php echo JsonEncode($ivf_vitals_history_add->MEyesColor->options(FALSE, TRUE)) ?>;
	fivf_vitals_historyadd.lists["x_FHairColor"] = <?php echo $ivf_vitals_history_add->FHairColor->Lookup->toClientList($ivf_vitals_history_add) ?>;
	fivf_vitals_historyadd.lists["x_FHairColor"].options = <?php echo JsonEncode($ivf_vitals_history_add->FHairColor->options(FALSE, TRUE)) ?>;
	fivf_vitals_historyadd.lists["x_MhairColor"] = <?php echo $ivf_vitals_history_add->MhairColor->Lookup->toClientList($ivf_vitals_history_add) ?>;
	fivf_vitals_historyadd.lists["x_MhairColor"].options = <?php echo JsonEncode($ivf_vitals_history_add->MhairColor->options(FALSE, TRUE)) ?>;
	fivf_vitals_historyadd.lists["x_FhairTexture"] = <?php echo $ivf_vitals_history_add->FhairTexture->Lookup->toClientList($ivf_vitals_history_add) ?>;
	fivf_vitals_historyadd.lists["x_FhairTexture"].options = <?php echo JsonEncode($ivf_vitals_history_add->FhairTexture->options(FALSE, TRUE)) ?>;
	fivf_vitals_historyadd.lists["x_MHairTexture"] = <?php echo $ivf_vitals_history_add->MHairTexture->Lookup->toClientList($ivf_vitals_history_add) ?>;
	fivf_vitals_historyadd.lists["x_MHairTexture"].options = <?php echo JsonEncode($ivf_vitals_history_add->MHairTexture->options(FALSE, TRUE)) ?>;
	fivf_vitals_historyadd.lists["x_FamilyHistory"] = <?php echo $ivf_vitals_history_add->FamilyHistory->Lookup->toClientList($ivf_vitals_history_add) ?>;
	fivf_vitals_historyadd.lists["x_FamilyHistory"].options = <?php echo JsonEncode($ivf_vitals_history_add->FamilyHistory->lookupOptions()) ?>;
	fivf_vitals_historyadd.autoSuggests["x_FamilyHistory"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fivf_vitals_historyadd.lists["x_Addictions[]"] = <?php echo $ivf_vitals_history_add->Addictions->Lookup->toClientList($ivf_vitals_history_add) ?>;
	fivf_vitals_historyadd.lists["x_Addictions[]"].options = <?php echo JsonEncode($ivf_vitals_history_add->Addictions->options(FALSE, TRUE)) ?>;
	fivf_vitals_historyadd.lists["x_Medical"] = <?php echo $ivf_vitals_history_add->Medical->Lookup->toClientList($ivf_vitals_history_add) ?>;
	fivf_vitals_historyadd.lists["x_Medical"].options = <?php echo JsonEncode($ivf_vitals_history_add->Medical->options(FALSE, TRUE)) ?>;
	fivf_vitals_historyadd.lists["x_Surgical"] = <?php echo $ivf_vitals_history_add->Surgical->Lookup->toClientList($ivf_vitals_history_add) ?>;
	fivf_vitals_historyadd.lists["x_Surgical"].options = <?php echo JsonEncode($ivf_vitals_history_add->Surgical->lookupOptions()) ?>;
	fivf_vitals_historyadd.autoSuggests["x_Surgical"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fivf_vitals_historyadd.lists["x_CoitalHistory"] = <?php echo $ivf_vitals_history_add->CoitalHistory->Lookup->toClientList($ivf_vitals_history_add) ?>;
	fivf_vitals_historyadd.lists["x_CoitalHistory"].options = <?php echo JsonEncode($ivf_vitals_history_add->CoitalHistory->lookupOptions()) ?>;
	fivf_vitals_historyadd.autoSuggests["x_CoitalHistory"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fivf_vitals_historyadd.lists["x_TemplateMenstrualHistory"] = <?php echo $ivf_vitals_history_add->TemplateMenstrualHistory->Lookup->toClientList($ivf_vitals_history_add) ?>;
	fivf_vitals_historyadd.lists["x_TemplateMenstrualHistory"].options = <?php echo JsonEncode($ivf_vitals_history_add->TemplateMenstrualHistory->lookupOptions()) ?>;
	fivf_vitals_historyadd.lists["x_TemplateObstetricHistory"] = <?php echo $ivf_vitals_history_add->TemplateObstetricHistory->Lookup->toClientList($ivf_vitals_history_add) ?>;
	fivf_vitals_historyadd.lists["x_TemplateObstetricHistory"].options = <?php echo JsonEncode($ivf_vitals_history_add->TemplateObstetricHistory->lookupOptions()) ?>;
	fivf_vitals_historyadd.lists["x_TemplateFertilityTreatmentHistory"] = <?php echo $ivf_vitals_history_add->TemplateFertilityTreatmentHistory->Lookup->toClientList($ivf_vitals_history_add) ?>;
	fivf_vitals_historyadd.lists["x_TemplateFertilityTreatmentHistory"].options = <?php echo JsonEncode($ivf_vitals_history_add->TemplateFertilityTreatmentHistory->lookupOptions()) ?>;
	fivf_vitals_historyadd.lists["x_TemplateSurgeryHistory"] = <?php echo $ivf_vitals_history_add->TemplateSurgeryHistory->Lookup->toClientList($ivf_vitals_history_add) ?>;
	fivf_vitals_historyadd.lists["x_TemplateSurgeryHistory"].options = <?php echo JsonEncode($ivf_vitals_history_add->TemplateSurgeryHistory->lookupOptions()) ?>;
	fivf_vitals_historyadd.lists["x_TemplateFInvestigations"] = <?php echo $ivf_vitals_history_add->TemplateFInvestigations->Lookup->toClientList($ivf_vitals_history_add) ?>;
	fivf_vitals_historyadd.lists["x_TemplateFInvestigations"].options = <?php echo JsonEncode($ivf_vitals_history_add->TemplateFInvestigations->lookupOptions()) ?>;
	fivf_vitals_historyadd.lists["x_TemplatePlanOfManagement"] = <?php echo $ivf_vitals_history_add->TemplatePlanOfManagement->Lookup->toClientList($ivf_vitals_history_add) ?>;
	fivf_vitals_historyadd.lists["x_TemplatePlanOfManagement"].options = <?php echo JsonEncode($ivf_vitals_history_add->TemplatePlanOfManagement->lookupOptions()) ?>;
	fivf_vitals_historyadd.lists["x_TemplatePImpression"] = <?php echo $ivf_vitals_history_add->TemplatePImpression->Lookup->toClientList($ivf_vitals_history_add) ?>;
	fivf_vitals_historyadd.lists["x_TemplatePImpression"].options = <?php echo JsonEncode($ivf_vitals_history_add->TemplatePImpression->lookupOptions()) ?>;
	fivf_vitals_historyadd.lists["x_TemplateMedications"] = <?php echo $ivf_vitals_history_add->TemplateMedications->Lookup->toClientList($ivf_vitals_history_add) ?>;
	fivf_vitals_historyadd.lists["x_TemplateMedications"].options = <?php echo JsonEncode($ivf_vitals_history_add->TemplateMedications->lookupOptions()) ?>;
	fivf_vitals_historyadd.lists["x_TemplateSemenAnalysis"] = <?php echo $ivf_vitals_history_add->TemplateSemenAnalysis->Lookup->toClientList($ivf_vitals_history_add) ?>;
	fivf_vitals_historyadd.lists["x_TemplateSemenAnalysis"].options = <?php echo JsonEncode($ivf_vitals_history_add->TemplateSemenAnalysis->lookupOptions()) ?>;
	fivf_vitals_historyadd.lists["x_MaleInsvestications"] = <?php echo $ivf_vitals_history_add->MaleInsvestications->Lookup->toClientList($ivf_vitals_history_add) ?>;
	fivf_vitals_historyadd.lists["x_MaleInsvestications"].options = <?php echo JsonEncode($ivf_vitals_history_add->MaleInsvestications->lookupOptions()) ?>;
	fivf_vitals_historyadd.lists["x_TemplateMIMpression"] = <?php echo $ivf_vitals_history_add->TemplateMIMpression->Lookup->toClientList($ivf_vitals_history_add) ?>;
	fivf_vitals_historyadd.lists["x_TemplateMIMpression"].options = <?php echo JsonEncode($ivf_vitals_history_add->TemplateMIMpression->lookupOptions()) ?>;
	fivf_vitals_historyadd.lists["x_TemplateMalePlanOfManagement"] = <?php echo $ivf_vitals_history_add->TemplateMalePlanOfManagement->Lookup->toClientList($ivf_vitals_history_add) ?>;
	fivf_vitals_historyadd.lists["x_TemplateMalePlanOfManagement"].options = <?php echo JsonEncode($ivf_vitals_history_add->TemplateMalePlanOfManagement->lookupOptions()) ?>;
	fivf_vitals_historyadd.lists["x_pFamilyHistory"] = <?php echo $ivf_vitals_history_add->pFamilyHistory->Lookup->toClientList($ivf_vitals_history_add) ?>;
	fivf_vitals_historyadd.lists["x_pFamilyHistory"].options = <?php echo JsonEncode($ivf_vitals_history_add->pFamilyHistory->lookupOptions()) ?>;
	fivf_vitals_historyadd.autoSuggests["x_pFamilyHistory"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fivf_vitals_historyadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ivf_vitals_history_add->showPageHeader(); ?>
<?php
$ivf_vitals_history_add->showMessage();
?>
<form name="fivf_vitals_historyadd" id="fivf_vitals_historyadd" class="<?php echo $ivf_vitals_history_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_vitals_history">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_vitals_history_add->IsModal ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($ivf_vitals_history_add->RIDNO->Visible) { // RIDNO ?>
	<div id="r_RIDNO" class="form-group row">
		<label id="elh_ivf_vitals_history_RIDNO" for="x_RIDNO" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_RIDNO" type="text/html"><?php echo $ivf_vitals_history_add->RIDNO->caption() ?><?php echo $ivf_vitals_history_add->RIDNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->RIDNO->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_RIDNO" type="text/html"><span id="el_ivf_vitals_history_RIDNO">
<input type="text" data-table="ivf_vitals_history" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" size="30" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->RIDNO->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history_add->RIDNO->EditValue ?>"<?php echo $ivf_vitals_history_add->RIDNO->editAttributes() ?>>
</span></script>
<?php echo $ivf_vitals_history_add->RIDNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->Name->Visible) { // Name ?>
	<div id="r_Name" class="form-group row">
		<label id="elh_ivf_vitals_history_Name" for="x_Name" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_Name" type="text/html"><?php echo $ivf_vitals_history_add->Name->caption() ?><?php echo $ivf_vitals_history_add->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->Name->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Name" type="text/html"><span id="el_ivf_vitals_history_Name">
<input type="text" data-table="ivf_vitals_history" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history_add->Name->EditValue ?>"<?php echo $ivf_vitals_history_add->Name->editAttributes() ?>>
</span></script>
<?php echo $ivf_vitals_history_add->Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_ivf_vitals_history_Age" for="x_Age" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_Age" type="text/html"><?php echo $ivf_vitals_history_add->Age->caption() ?><?php echo $ivf_vitals_history_add->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->Age->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Age" type="text/html"><span id="el_ivf_vitals_history_Age">
<input type="text" data-table="ivf_vitals_history" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->Age->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history_add->Age->EditValue ?>"<?php echo $ivf_vitals_history_add->Age->editAttributes() ?>>
</span></script>
<?php echo $ivf_vitals_history_add->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->SEX->Visible) { // SEX ?>
	<div id="r_SEX" class="form-group row">
		<label id="elh_ivf_vitals_history_SEX" for="x_SEX" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_SEX" type="text/html"><?php echo $ivf_vitals_history_add->SEX->caption() ?><?php echo $ivf_vitals_history_add->SEX->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->SEX->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_SEX" type="text/html"><span id="el_ivf_vitals_history_SEX">
<input type="text" data-table="ivf_vitals_history" data-field="x_SEX" name="x_SEX" id="x_SEX" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->SEX->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history_add->SEX->EditValue ?>"<?php echo $ivf_vitals_history_add->SEX->editAttributes() ?>>
</span></script>
<?php echo $ivf_vitals_history_add->SEX->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->Religion->Visible) { // Religion ?>
	<div id="r_Religion" class="form-group row">
		<label id="elh_ivf_vitals_history_Religion" for="x_Religion" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_Religion" type="text/html"><?php echo $ivf_vitals_history_add->Religion->caption() ?><?php echo $ivf_vitals_history_add->Religion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->Religion->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Religion" type="text/html"><span id="el_ivf_vitals_history_Religion">
<input type="text" data-table="ivf_vitals_history" data-field="x_Religion" name="x_Religion" id="x_Religion" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->Religion->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history_add->Religion->EditValue ?>"<?php echo $ivf_vitals_history_add->Religion->editAttributes() ?>>
</span></script>
<?php echo $ivf_vitals_history_add->Religion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->Address->Visible) { // Address ?>
	<div id="r_Address" class="form-group row">
		<label id="elh_ivf_vitals_history_Address" for="x_Address" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_Address" type="text/html"><?php echo $ivf_vitals_history_add->Address->caption() ?><?php echo $ivf_vitals_history_add->Address->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->Address->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Address" type="text/html"><span id="el_ivf_vitals_history_Address">
<input type="text" data-table="ivf_vitals_history" data-field="x_Address" name="x_Address" id="x_Address" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->Address->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history_add->Address->EditValue ?>"<?php echo $ivf_vitals_history_add->Address->editAttributes() ?>>
</span></script>
<?php echo $ivf_vitals_history_add->Address->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->IdentificationMark->Visible) { // IdentificationMark ?>
	<div id="r_IdentificationMark" class="form-group row">
		<label id="elh_ivf_vitals_history_IdentificationMark" for="x_IdentificationMark" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_IdentificationMark" type="text/html"><?php echo $ivf_vitals_history_add->IdentificationMark->caption() ?><?php echo $ivf_vitals_history_add->IdentificationMark->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->IdentificationMark->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_IdentificationMark" type="text/html"><span id="el_ivf_vitals_history_IdentificationMark">
<input type="text" data-table="ivf_vitals_history" data-field="x_IdentificationMark" name="x_IdentificationMark" id="x_IdentificationMark" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->IdentificationMark->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history_add->IdentificationMark->EditValue ?>"<?php echo $ivf_vitals_history_add->IdentificationMark->editAttributes() ?>>
</span></script>
<?php echo $ivf_vitals_history_add->IdentificationMark->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->DoublewitnessName1->Visible) { // DoublewitnessName1 ?>
	<div id="r_DoublewitnessName1" class="form-group row">
		<label id="elh_ivf_vitals_history_DoublewitnessName1" for="x_DoublewitnessName1" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_DoublewitnessName1" type="text/html"><?php echo $ivf_vitals_history_add->DoublewitnessName1->caption() ?><?php echo $ivf_vitals_history_add->DoublewitnessName1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->DoublewitnessName1->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_DoublewitnessName1" type="text/html"><span id="el_ivf_vitals_history_DoublewitnessName1">
<textarea data-table="ivf_vitals_history" data-field="x_DoublewitnessName1" name="x_DoublewitnessName1" id="x_DoublewitnessName1" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->DoublewitnessName1->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history_add->DoublewitnessName1->editAttributes() ?>><?php echo $ivf_vitals_history_add->DoublewitnessName1->EditValue ?></textarea>
</span></script>
<?php echo $ivf_vitals_history_add->DoublewitnessName1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->DoublewitnessName2->Visible) { // DoublewitnessName2 ?>
	<div id="r_DoublewitnessName2" class="form-group row">
		<label id="elh_ivf_vitals_history_DoublewitnessName2" for="x_DoublewitnessName2" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_DoublewitnessName2" type="text/html"><?php echo $ivf_vitals_history_add->DoublewitnessName2->caption() ?><?php echo $ivf_vitals_history_add->DoublewitnessName2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->DoublewitnessName2->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_DoublewitnessName2" type="text/html"><span id="el_ivf_vitals_history_DoublewitnessName2">
<textarea data-table="ivf_vitals_history" data-field="x_DoublewitnessName2" name="x_DoublewitnessName2" id="x_DoublewitnessName2" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->DoublewitnessName2->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history_add->DoublewitnessName2->editAttributes() ?>><?php echo $ivf_vitals_history_add->DoublewitnessName2->EditValue ?></textarea>
</span></script>
<?php echo $ivf_vitals_history_add->DoublewitnessName2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
	<div id="r_Chiefcomplaints" class="form-group row">
		<label id="elh_ivf_vitals_history_Chiefcomplaints" for="x_Chiefcomplaints" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_Chiefcomplaints" type="text/html"><?php echo $ivf_vitals_history_add->Chiefcomplaints->caption() ?><?php echo $ivf_vitals_history_add->Chiefcomplaints->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->Chiefcomplaints->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Chiefcomplaints" type="text/html"><span id="el_ivf_vitals_history_Chiefcomplaints">
<textarea data-table="ivf_vitals_history" data-field="x_Chiefcomplaints" name="x_Chiefcomplaints" id="x_Chiefcomplaints" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->Chiefcomplaints->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history_add->Chiefcomplaints->editAttributes() ?>><?php echo $ivf_vitals_history_add->Chiefcomplaints->EditValue ?></textarea>
</span></script>
<?php echo $ivf_vitals_history_add->Chiefcomplaints->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->MenstrualHistory->Visible) { // MenstrualHistory ?>
	<div id="r_MenstrualHistory" class="form-group row">
		<label id="elh_ivf_vitals_history_MenstrualHistory" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_MenstrualHistory" type="text/html"><?php echo $ivf_vitals_history_add->MenstrualHistory->caption() ?><?php echo $ivf_vitals_history_add->MenstrualHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->MenstrualHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MenstrualHistory" type="text/html"><span id="el_ivf_vitals_history_MenstrualHistory">
<?php $ivf_vitals_history_add->MenstrualHistory->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_MenstrualHistory" name="x_MenstrualHistory" id="x_MenstrualHistory" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->MenstrualHistory->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history_add->MenstrualHistory->editAttributes() ?>><?php echo $ivf_vitals_history_add->MenstrualHistory->EditValue ?></textarea>
</span></script>
<script type="text/html" class="ivf_vitals_historyadd_js">
loadjs.ready(["fivf_vitals_historyadd", "editor"], function() {
	ew.createEditor("fivf_vitals_historyadd", "x_MenstrualHistory", 0, 0, <?php echo $ivf_vitals_history_add->MenstrualHistory->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
<?php echo $ivf_vitals_history_add->MenstrualHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->ObstetricHistory->Visible) { // ObstetricHistory ?>
	<div id="r_ObstetricHistory" class="form-group row">
		<label id="elh_ivf_vitals_history_ObstetricHistory" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_ObstetricHistory" type="text/html"><?php echo $ivf_vitals_history_add->ObstetricHistory->caption() ?><?php echo $ivf_vitals_history_add->ObstetricHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->ObstetricHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_ObstetricHistory" type="text/html"><span id="el_ivf_vitals_history_ObstetricHistory">
<?php $ivf_vitals_history_add->ObstetricHistory->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_ObstetricHistory" name="x_ObstetricHistory" id="x_ObstetricHistory" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->ObstetricHistory->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history_add->ObstetricHistory->editAttributes() ?>><?php echo $ivf_vitals_history_add->ObstetricHistory->EditValue ?></textarea>
</span></script>
<script type="text/html" class="ivf_vitals_historyadd_js">
loadjs.ready(["fivf_vitals_historyadd", "editor"], function() {
	ew.createEditor("fivf_vitals_historyadd", "x_ObstetricHistory", 0, 0, <?php echo $ivf_vitals_history_add->ObstetricHistory->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
<?php echo $ivf_vitals_history_add->ObstetricHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->MedicalHistory->Visible) { // MedicalHistory ?>
	<div id="r_MedicalHistory" class="form-group row">
		<label id="elh_ivf_vitals_history_MedicalHistory" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_MedicalHistory" type="text/html"><?php echo $ivf_vitals_history_add->MedicalHistory->caption() ?><?php echo $ivf_vitals_history_add->MedicalHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->MedicalHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MedicalHistory" type="text/html"><span id="el_ivf_vitals_history_MedicalHistory">
<div class="btn-group ew-dropdown-list" role="group">
	<div class="btn-group" role="group">
		<button type="button" class="btn form-control dropdown-toggle ew-dropdown-toggle" aria-haspopup="true" aria-expanded="false"<?php if ($ivf_vitals_history_add->MedicalHistory->ReadOnly) { ?> readonly<?php } else { ?>data-toggle="dropdown"<?php } ?>><?php echo $ivf_vitals_history_add->MedicalHistory->ViewValue ?></button>
		<div id="dsl_x_MedicalHistory" data-repeatcolumn="5" class="dropdown-menu">
			<div class="ew-items" style="overflow-x: hidden;">
<?php echo $ivf_vitals_history_add->MedicalHistory->checkBoxListHtml(TRUE, "x_MedicalHistory[]") ?>
			</div><!-- /.ew-items -->
		</div><!-- /.dropdown-menu -->
		<div id="tp_x_MedicalHistory" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="ivf_vitals_history" data-field="x_MedicalHistory" data-value-separator="<?php echo $ivf_vitals_history_add->MedicalHistory->displayValueSeparatorAttribute() ?>" name="x_MedicalHistory[]" id="x_MedicalHistory[]" value="{value}"<?php echo $ivf_vitals_history_add->MedicalHistory->editAttributes() ?>></div>
	</div><!-- /.btn-group -->
	<?php if (!$ivf_vitals_history_add->MedicalHistory->ReadOnly) { ?>
	<button type="button" class="btn btn-default ew-dropdown-clear" disabled>
		<i class="fas fa-times ew-icon"></i>
	</button>
	<?php } ?>
</div><!-- /.ew-dropdown-list -->
</span></script>
<?php echo $ivf_vitals_history_add->MedicalHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->SurgicalHistory->Visible) { // SurgicalHistory ?>
	<div id="r_SurgicalHistory" class="form-group row">
		<label id="elh_ivf_vitals_history_SurgicalHistory" for="x_SurgicalHistory" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_SurgicalHistory" type="text/html"><?php echo $ivf_vitals_history_add->SurgicalHistory->caption() ?><?php echo $ivf_vitals_history_add->SurgicalHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->SurgicalHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_SurgicalHistory" type="text/html"><span id="el_ivf_vitals_history_SurgicalHistory">
<input type="text" data-table="ivf_vitals_history" data-field="x_SurgicalHistory" name="x_SurgicalHistory" id="x_SurgicalHistory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->SurgicalHistory->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history_add->SurgicalHistory->EditValue ?>"<?php echo $ivf_vitals_history_add->SurgicalHistory->editAttributes() ?>>
</span></script>
<?php echo $ivf_vitals_history_add->SurgicalHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->Generalexaminationpallor->Visible) { // Generalexaminationpallor ?>
	<div id="r_Generalexaminationpallor" class="form-group row">
		<label id="elh_ivf_vitals_history_Generalexaminationpallor" for="x_Generalexaminationpallor" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_Generalexaminationpallor" type="text/html"><?php echo $ivf_vitals_history_add->Generalexaminationpallor->caption() ?><?php echo $ivf_vitals_history_add->Generalexaminationpallor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->Generalexaminationpallor->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Generalexaminationpallor" type="text/html"><span id="el_ivf_vitals_history_Generalexaminationpallor">
<input type="text" data-table="ivf_vitals_history" data-field="x_Generalexaminationpallor" name="x_Generalexaminationpallor" id="x_Generalexaminationpallor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->Generalexaminationpallor->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history_add->Generalexaminationpallor->EditValue ?>"<?php echo $ivf_vitals_history_add->Generalexaminationpallor->editAttributes() ?>>
</span></script>
<?php echo $ivf_vitals_history_add->Generalexaminationpallor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->PR->Visible) { // PR ?>
	<div id="r_PR" class="form-group row">
		<label id="elh_ivf_vitals_history_PR" for="x_PR" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_PR" type="text/html"><?php echo $ivf_vitals_history_add->PR->caption() ?><?php echo $ivf_vitals_history_add->PR->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->PR->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PR" type="text/html"><span id="el_ivf_vitals_history_PR">
<input type="text" data-table="ivf_vitals_history" data-field="x_PR" name="x_PR" id="x_PR" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->PR->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history_add->PR->EditValue ?>"<?php echo $ivf_vitals_history_add->PR->editAttributes() ?>>
</span></script>
<?php echo $ivf_vitals_history_add->PR->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->CVS->Visible) { // CVS ?>
	<div id="r_CVS" class="form-group row">
		<label id="elh_ivf_vitals_history_CVS" for="x_CVS" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_CVS" type="text/html"><?php echo $ivf_vitals_history_add->CVS->caption() ?><?php echo $ivf_vitals_history_add->CVS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->CVS->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_CVS" type="text/html"><span id="el_ivf_vitals_history_CVS">
<input type="text" data-table="ivf_vitals_history" data-field="x_CVS" name="x_CVS" id="x_CVS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->CVS->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history_add->CVS->EditValue ?>"<?php echo $ivf_vitals_history_add->CVS->editAttributes() ?>>
</span></script>
<?php echo $ivf_vitals_history_add->CVS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->PA->Visible) { // PA ?>
	<div id="r_PA" class="form-group row">
		<label id="elh_ivf_vitals_history_PA" for="x_PA" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_PA" type="text/html"><?php echo $ivf_vitals_history_add->PA->caption() ?><?php echo $ivf_vitals_history_add->PA->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->PA->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PA" type="text/html"><span id="el_ivf_vitals_history_PA">
<input type="text" data-table="ivf_vitals_history" data-field="x_PA" name="x_PA" id="x_PA" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->PA->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history_add->PA->EditValue ?>"<?php echo $ivf_vitals_history_add->PA->editAttributes() ?>>
</span></script>
<?php echo $ivf_vitals_history_add->PA->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
	<div id="r_PROVISIONALDIAGNOSIS" class="form-group row">
		<label id="elh_ivf_vitals_history_PROVISIONALDIAGNOSIS" for="x_PROVISIONALDIAGNOSIS" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_PROVISIONALDIAGNOSIS" type="text/html"><?php echo $ivf_vitals_history_add->PROVISIONALDIAGNOSIS->caption() ?><?php echo $ivf_vitals_history_add->PROVISIONALDIAGNOSIS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->PROVISIONALDIAGNOSIS->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PROVISIONALDIAGNOSIS" type="text/html"><span id="el_ivf_vitals_history_PROVISIONALDIAGNOSIS">
<input type="text" data-table="ivf_vitals_history" data-field="x_PROVISIONALDIAGNOSIS" name="x_PROVISIONALDIAGNOSIS" id="x_PROVISIONALDIAGNOSIS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->PROVISIONALDIAGNOSIS->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history_add->PROVISIONALDIAGNOSIS->EditValue ?>"<?php echo $ivf_vitals_history_add->PROVISIONALDIAGNOSIS->editAttributes() ?>>
</span></script>
<?php echo $ivf_vitals_history_add->PROVISIONALDIAGNOSIS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->Investigations->Visible) { // Investigations ?>
	<div id="r_Investigations" class="form-group row">
		<label id="elh_ivf_vitals_history_Investigations" for="x_Investigations" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_Investigations" type="text/html"><?php echo $ivf_vitals_history_add->Investigations->caption() ?><?php echo $ivf_vitals_history_add->Investigations->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->Investigations->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Investigations" type="text/html"><span id="el_ivf_vitals_history_Investigations">
<input type="text" data-table="ivf_vitals_history" data-field="x_Investigations" name="x_Investigations" id="x_Investigations" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->Investigations->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history_add->Investigations->EditValue ?>"<?php echo $ivf_vitals_history_add->Investigations->editAttributes() ?>>
</span></script>
<?php echo $ivf_vitals_history_add->Investigations->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->Fheight->Visible) { // Fheight ?>
	<div id="r_Fheight" class="form-group row">
		<label id="elh_ivf_vitals_history_Fheight" for="x_Fheight" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_Fheight" type="text/html"><?php echo $ivf_vitals_history_add->Fheight->caption() ?><?php echo $ivf_vitals_history_add->Fheight->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->Fheight->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Fheight" type="text/html"><span id="el_ivf_vitals_history_Fheight">
<input type="text" data-table="ivf_vitals_history" data-field="x_Fheight" name="x_Fheight" id="x_Fheight" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->Fheight->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history_add->Fheight->EditValue ?>"<?php echo $ivf_vitals_history_add->Fheight->editAttributes() ?>>
</span></script>
<?php echo $ivf_vitals_history_add->Fheight->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->Fweight->Visible) { // Fweight ?>
	<div id="r_Fweight" class="form-group row">
		<label id="elh_ivf_vitals_history_Fweight" for="x_Fweight" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_Fweight" type="text/html"><?php echo $ivf_vitals_history_add->Fweight->caption() ?><?php echo $ivf_vitals_history_add->Fweight->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->Fweight->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Fweight" type="text/html"><span id="el_ivf_vitals_history_Fweight">
<input type="text" data-table="ivf_vitals_history" data-field="x_Fweight" name="x_Fweight" id="x_Fweight" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->Fweight->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history_add->Fweight->EditValue ?>"<?php echo $ivf_vitals_history_add->Fweight->editAttributes() ?>>
</span></script>
<?php echo $ivf_vitals_history_add->Fweight->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->FBMI->Visible) { // FBMI ?>
	<div id="r_FBMI" class="form-group row">
		<label id="elh_ivf_vitals_history_FBMI" for="x_FBMI" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_FBMI" type="text/html"><?php echo $ivf_vitals_history_add->FBMI->caption() ?><?php echo $ivf_vitals_history_add->FBMI->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->FBMI->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_FBMI" type="text/html"><span id="el_ivf_vitals_history_FBMI">
<input type="text" data-table="ivf_vitals_history" data-field="x_FBMI" name="x_FBMI" id="x_FBMI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->FBMI->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history_add->FBMI->EditValue ?>"<?php echo $ivf_vitals_history_add->FBMI->editAttributes() ?>>
</span></script>
<?php echo $ivf_vitals_history_add->FBMI->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->FBloodgroup->Visible) { // FBloodgroup ?>
	<div id="r_FBloodgroup" class="form-group row">
		<label id="elh_ivf_vitals_history_FBloodgroup" for="x_FBloodgroup" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_FBloodgroup" type="text/html"><?php echo $ivf_vitals_history_add->FBloodgroup->caption() ?><?php echo $ivf_vitals_history_add->FBloodgroup->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->FBloodgroup->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_FBloodgroup" type="text/html"><span id="el_ivf_vitals_history_FBloodgroup">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_FBloodgroup" data-value-separator="<?php echo $ivf_vitals_history_add->FBloodgroup->displayValueSeparatorAttribute() ?>" id="x_FBloodgroup" name="x_FBloodgroup"<?php echo $ivf_vitals_history_add->FBloodgroup->editAttributes() ?>>
			<?php echo $ivf_vitals_history_add->FBloodgroup->selectOptionListHtml("x_FBloodgroup") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "mas_bloodgroup") && !$ivf_vitals_history_add->FBloodgroup->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_FBloodgroup" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_vitals_history_add->FBloodgroup->caption() ?>" data-title="<?php echo $ivf_vitals_history_add->FBloodgroup->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_FBloodgroup',url:'mas_bloodgroupaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ivf_vitals_history_add->FBloodgroup->Lookup->getParamTag($ivf_vitals_history_add, "p_x_FBloodgroup") ?>
</span></script>
<?php echo $ivf_vitals_history_add->FBloodgroup->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->Mheight->Visible) { // Mheight ?>
	<div id="r_Mheight" class="form-group row">
		<label id="elh_ivf_vitals_history_Mheight" for="x_Mheight" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_Mheight" type="text/html"><?php echo $ivf_vitals_history_add->Mheight->caption() ?><?php echo $ivf_vitals_history_add->Mheight->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->Mheight->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Mheight" type="text/html"><span id="el_ivf_vitals_history_Mheight">
<input type="text" data-table="ivf_vitals_history" data-field="x_Mheight" name="x_Mheight" id="x_Mheight" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->Mheight->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history_add->Mheight->EditValue ?>"<?php echo $ivf_vitals_history_add->Mheight->editAttributes() ?>>
</span></script>
<?php echo $ivf_vitals_history_add->Mheight->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->Mweight->Visible) { // Mweight ?>
	<div id="r_Mweight" class="form-group row">
		<label id="elh_ivf_vitals_history_Mweight" for="x_Mweight" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_Mweight" type="text/html"><?php echo $ivf_vitals_history_add->Mweight->caption() ?><?php echo $ivf_vitals_history_add->Mweight->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->Mweight->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Mweight" type="text/html"><span id="el_ivf_vitals_history_Mweight">
<input type="text" data-table="ivf_vitals_history" data-field="x_Mweight" name="x_Mweight" id="x_Mweight" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->Mweight->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history_add->Mweight->EditValue ?>"<?php echo $ivf_vitals_history_add->Mweight->editAttributes() ?>>
</span></script>
<?php echo $ivf_vitals_history_add->Mweight->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->MBMI->Visible) { // MBMI ?>
	<div id="r_MBMI" class="form-group row">
		<label id="elh_ivf_vitals_history_MBMI" for="x_MBMI" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_MBMI" type="text/html"><?php echo $ivf_vitals_history_add->MBMI->caption() ?><?php echo $ivf_vitals_history_add->MBMI->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->MBMI->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MBMI" type="text/html"><span id="el_ivf_vitals_history_MBMI">
<input type="text" data-table="ivf_vitals_history" data-field="x_MBMI" name="x_MBMI" id="x_MBMI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->MBMI->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history_add->MBMI->EditValue ?>"<?php echo $ivf_vitals_history_add->MBMI->editAttributes() ?>>
</span></script>
<?php echo $ivf_vitals_history_add->MBMI->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->MBloodgroup->Visible) { // MBloodgroup ?>
	<div id="r_MBloodgroup" class="form-group row">
		<label id="elh_ivf_vitals_history_MBloodgroup" for="x_MBloodgroup" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_MBloodgroup" type="text/html"><?php echo $ivf_vitals_history_add->MBloodgroup->caption() ?><?php echo $ivf_vitals_history_add->MBloodgroup->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->MBloodgroup->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MBloodgroup" type="text/html"><span id="el_ivf_vitals_history_MBloodgroup">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_MBloodgroup" data-value-separator="<?php echo $ivf_vitals_history_add->MBloodgroup->displayValueSeparatorAttribute() ?>" id="x_MBloodgroup" name="x_MBloodgroup"<?php echo $ivf_vitals_history_add->MBloodgroup->editAttributes() ?>>
			<?php echo $ivf_vitals_history_add->MBloodgroup->selectOptionListHtml("x_MBloodgroup") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "mas_bloodgroup") && !$ivf_vitals_history_add->MBloodgroup->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_MBloodgroup" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_vitals_history_add->MBloodgroup->caption() ?>" data-title="<?php echo $ivf_vitals_history_add->MBloodgroup->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_MBloodgroup',url:'mas_bloodgroupaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ivf_vitals_history_add->MBloodgroup->Lookup->getParamTag($ivf_vitals_history_add, "p_x_MBloodgroup") ?>
</span></script>
<?php echo $ivf_vitals_history_add->MBloodgroup->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->FBuild->Visible) { // FBuild ?>
	<div id="r_FBuild" class="form-group row">
		<label id="elh_ivf_vitals_history_FBuild" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_FBuild" type="text/html"><?php echo $ivf_vitals_history_add->FBuild->caption() ?><?php echo $ivf_vitals_history_add->FBuild->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->FBuild->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_FBuild" type="text/html"><span id="el_ivf_vitals_history_FBuild">
<div id="tp_x_FBuild" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_vitals_history" data-field="x_FBuild" data-value-separator="<?php echo $ivf_vitals_history_add->FBuild->displayValueSeparatorAttribute() ?>" name="x_FBuild" id="x_FBuild" value="{value}"<?php echo $ivf_vitals_history_add->FBuild->editAttributes() ?>></div>
<div id="dsl_x_FBuild" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history_add->FBuild->radioButtonListHtml(FALSE, "x_FBuild") ?>
</div></div>
</span></script>
<?php echo $ivf_vitals_history_add->FBuild->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->MBuild->Visible) { // MBuild ?>
	<div id="r_MBuild" class="form-group row">
		<label id="elh_ivf_vitals_history_MBuild" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_MBuild" type="text/html"><?php echo $ivf_vitals_history_add->MBuild->caption() ?><?php echo $ivf_vitals_history_add->MBuild->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->MBuild->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MBuild" type="text/html"><span id="el_ivf_vitals_history_MBuild">
<div id="tp_x_MBuild" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_vitals_history" data-field="x_MBuild" data-value-separator="<?php echo $ivf_vitals_history_add->MBuild->displayValueSeparatorAttribute() ?>" name="x_MBuild" id="x_MBuild" value="{value}"<?php echo $ivf_vitals_history_add->MBuild->editAttributes() ?>></div>
<div id="dsl_x_MBuild" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history_add->MBuild->radioButtonListHtml(FALSE, "x_MBuild") ?>
</div></div>
</span></script>
<?php echo $ivf_vitals_history_add->MBuild->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->FSkinColor->Visible) { // FSkinColor ?>
	<div id="r_FSkinColor" class="form-group row">
		<label id="elh_ivf_vitals_history_FSkinColor" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_FSkinColor" type="text/html"><?php echo $ivf_vitals_history_add->FSkinColor->caption() ?><?php echo $ivf_vitals_history_add->FSkinColor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->FSkinColor->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_FSkinColor" type="text/html"><span id="el_ivf_vitals_history_FSkinColor">
<div id="tp_x_FSkinColor" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_vitals_history" data-field="x_FSkinColor" data-value-separator="<?php echo $ivf_vitals_history_add->FSkinColor->displayValueSeparatorAttribute() ?>" name="x_FSkinColor" id="x_FSkinColor" value="{value}"<?php echo $ivf_vitals_history_add->FSkinColor->editAttributes() ?>></div>
<div id="dsl_x_FSkinColor" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history_add->FSkinColor->radioButtonListHtml(FALSE, "x_FSkinColor") ?>
</div></div>
</span></script>
<?php echo $ivf_vitals_history_add->FSkinColor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->MSkinColor->Visible) { // MSkinColor ?>
	<div id="r_MSkinColor" class="form-group row">
		<label id="elh_ivf_vitals_history_MSkinColor" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_MSkinColor" type="text/html"><?php echo $ivf_vitals_history_add->MSkinColor->caption() ?><?php echo $ivf_vitals_history_add->MSkinColor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->MSkinColor->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MSkinColor" type="text/html"><span id="el_ivf_vitals_history_MSkinColor">
<div id="tp_x_MSkinColor" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_vitals_history" data-field="x_MSkinColor" data-value-separator="<?php echo $ivf_vitals_history_add->MSkinColor->displayValueSeparatorAttribute() ?>" name="x_MSkinColor" id="x_MSkinColor" value="{value}"<?php echo $ivf_vitals_history_add->MSkinColor->editAttributes() ?>></div>
<div id="dsl_x_MSkinColor" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history_add->MSkinColor->radioButtonListHtml(FALSE, "x_MSkinColor") ?>
</div></div>
</span></script>
<?php echo $ivf_vitals_history_add->MSkinColor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->FEyesColor->Visible) { // FEyesColor ?>
	<div id="r_FEyesColor" class="form-group row">
		<label id="elh_ivf_vitals_history_FEyesColor" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_FEyesColor" type="text/html"><?php echo $ivf_vitals_history_add->FEyesColor->caption() ?><?php echo $ivf_vitals_history_add->FEyesColor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->FEyesColor->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_FEyesColor" type="text/html"><span id="el_ivf_vitals_history_FEyesColor">
<div id="tp_x_FEyesColor" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_vitals_history" data-field="x_FEyesColor" data-value-separator="<?php echo $ivf_vitals_history_add->FEyesColor->displayValueSeparatorAttribute() ?>" name="x_FEyesColor" id="x_FEyesColor" value="{value}"<?php echo $ivf_vitals_history_add->FEyesColor->editAttributes() ?>></div>
<div id="dsl_x_FEyesColor" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history_add->FEyesColor->radioButtonListHtml(FALSE, "x_FEyesColor") ?>
</div></div>
</span></script>
<?php echo $ivf_vitals_history_add->FEyesColor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->MEyesColor->Visible) { // MEyesColor ?>
	<div id="r_MEyesColor" class="form-group row">
		<label id="elh_ivf_vitals_history_MEyesColor" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_MEyesColor" type="text/html"><?php echo $ivf_vitals_history_add->MEyesColor->caption() ?><?php echo $ivf_vitals_history_add->MEyesColor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->MEyesColor->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MEyesColor" type="text/html"><span id="el_ivf_vitals_history_MEyesColor">
<div id="tp_x_MEyesColor" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_vitals_history" data-field="x_MEyesColor" data-value-separator="<?php echo $ivf_vitals_history_add->MEyesColor->displayValueSeparatorAttribute() ?>" name="x_MEyesColor" id="x_MEyesColor" value="{value}"<?php echo $ivf_vitals_history_add->MEyesColor->editAttributes() ?>></div>
<div id="dsl_x_MEyesColor" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history_add->MEyesColor->radioButtonListHtml(FALSE, "x_MEyesColor") ?>
</div></div>
</span></script>
<?php echo $ivf_vitals_history_add->MEyesColor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->FHairColor->Visible) { // FHairColor ?>
	<div id="r_FHairColor" class="form-group row">
		<label id="elh_ivf_vitals_history_FHairColor" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_FHairColor" type="text/html"><?php echo $ivf_vitals_history_add->FHairColor->caption() ?><?php echo $ivf_vitals_history_add->FHairColor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->FHairColor->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_FHairColor" type="text/html"><span id="el_ivf_vitals_history_FHairColor">
<div id="tp_x_FHairColor" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_vitals_history" data-field="x_FHairColor" data-value-separator="<?php echo $ivf_vitals_history_add->FHairColor->displayValueSeparatorAttribute() ?>" name="x_FHairColor" id="x_FHairColor" value="{value}"<?php echo $ivf_vitals_history_add->FHairColor->editAttributes() ?>></div>
<div id="dsl_x_FHairColor" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history_add->FHairColor->radioButtonListHtml(FALSE, "x_FHairColor") ?>
</div></div>
</span></script>
<?php echo $ivf_vitals_history_add->FHairColor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->MhairColor->Visible) { // MhairColor ?>
	<div id="r_MhairColor" class="form-group row">
		<label id="elh_ivf_vitals_history_MhairColor" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_MhairColor" type="text/html"><?php echo $ivf_vitals_history_add->MhairColor->caption() ?><?php echo $ivf_vitals_history_add->MhairColor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->MhairColor->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MhairColor" type="text/html"><span id="el_ivf_vitals_history_MhairColor">
<div id="tp_x_MhairColor" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_vitals_history" data-field="x_MhairColor" data-value-separator="<?php echo $ivf_vitals_history_add->MhairColor->displayValueSeparatorAttribute() ?>" name="x_MhairColor" id="x_MhairColor" value="{value}"<?php echo $ivf_vitals_history_add->MhairColor->editAttributes() ?>></div>
<div id="dsl_x_MhairColor" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history_add->MhairColor->radioButtonListHtml(FALSE, "x_MhairColor") ?>
</div></div>
</span></script>
<?php echo $ivf_vitals_history_add->MhairColor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->FhairTexture->Visible) { // FhairTexture ?>
	<div id="r_FhairTexture" class="form-group row">
		<label id="elh_ivf_vitals_history_FhairTexture" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_FhairTexture" type="text/html"><?php echo $ivf_vitals_history_add->FhairTexture->caption() ?><?php echo $ivf_vitals_history_add->FhairTexture->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->FhairTexture->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_FhairTexture" type="text/html"><span id="el_ivf_vitals_history_FhairTexture">
<div id="tp_x_FhairTexture" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_vitals_history" data-field="x_FhairTexture" data-value-separator="<?php echo $ivf_vitals_history_add->FhairTexture->displayValueSeparatorAttribute() ?>" name="x_FhairTexture" id="x_FhairTexture" value="{value}"<?php echo $ivf_vitals_history_add->FhairTexture->editAttributes() ?>></div>
<div id="dsl_x_FhairTexture" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history_add->FhairTexture->radioButtonListHtml(FALSE, "x_FhairTexture") ?>
</div></div>
</span></script>
<?php echo $ivf_vitals_history_add->FhairTexture->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->MHairTexture->Visible) { // MHairTexture ?>
	<div id="r_MHairTexture" class="form-group row">
		<label id="elh_ivf_vitals_history_MHairTexture" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_MHairTexture" type="text/html"><?php echo $ivf_vitals_history_add->MHairTexture->caption() ?><?php echo $ivf_vitals_history_add->MHairTexture->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->MHairTexture->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MHairTexture" type="text/html"><span id="el_ivf_vitals_history_MHairTexture">
<div id="tp_x_MHairTexture" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_vitals_history" data-field="x_MHairTexture" data-value-separator="<?php echo $ivf_vitals_history_add->MHairTexture->displayValueSeparatorAttribute() ?>" name="x_MHairTexture" id="x_MHairTexture" value="{value}"<?php echo $ivf_vitals_history_add->MHairTexture->editAttributes() ?>></div>
<div id="dsl_x_MHairTexture" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history_add->MHairTexture->radioButtonListHtml(FALSE, "x_MHairTexture") ?>
</div></div>
</span></script>
<?php echo $ivf_vitals_history_add->MHairTexture->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->Fothers->Visible) { // Fothers ?>
	<div id="r_Fothers" class="form-group row">
		<label id="elh_ivf_vitals_history_Fothers" for="x_Fothers" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_Fothers" type="text/html"><?php echo $ivf_vitals_history_add->Fothers->caption() ?><?php echo $ivf_vitals_history_add->Fothers->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->Fothers->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Fothers" type="text/html"><span id="el_ivf_vitals_history_Fothers">
<input type="text" data-table="ivf_vitals_history" data-field="x_Fothers" name="x_Fothers" id="x_Fothers" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->Fothers->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history_add->Fothers->EditValue ?>"<?php echo $ivf_vitals_history_add->Fothers->editAttributes() ?>>
</span></script>
<?php echo $ivf_vitals_history_add->Fothers->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->Mothers->Visible) { // Mothers ?>
	<div id="r_Mothers" class="form-group row">
		<label id="elh_ivf_vitals_history_Mothers" for="x_Mothers" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_Mothers" type="text/html"><?php echo $ivf_vitals_history_add->Mothers->caption() ?><?php echo $ivf_vitals_history_add->Mothers->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->Mothers->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Mothers" type="text/html"><span id="el_ivf_vitals_history_Mothers">
<input type="text" data-table="ivf_vitals_history" data-field="x_Mothers" name="x_Mothers" id="x_Mothers" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->Mothers->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history_add->Mothers->EditValue ?>"<?php echo $ivf_vitals_history_add->Mothers->editAttributes() ?>>
</span></script>
<?php echo $ivf_vitals_history_add->Mothers->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->PGE->Visible) { // PGE ?>
	<div id="r_PGE" class="form-group row">
		<label id="elh_ivf_vitals_history_PGE" for="x_PGE" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_PGE" type="text/html"><?php echo $ivf_vitals_history_add->PGE->caption() ?><?php echo $ivf_vitals_history_add->PGE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->PGE->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PGE" type="text/html"><span id="el_ivf_vitals_history_PGE">
<input type="text" data-table="ivf_vitals_history" data-field="x_PGE" name="x_PGE" id="x_PGE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->PGE->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history_add->PGE->EditValue ?>"<?php echo $ivf_vitals_history_add->PGE->editAttributes() ?>>
</span></script>
<?php echo $ivf_vitals_history_add->PGE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->PPR->Visible) { // PPR ?>
	<div id="r_PPR" class="form-group row">
		<label id="elh_ivf_vitals_history_PPR" for="x_PPR" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_PPR" type="text/html"><?php echo $ivf_vitals_history_add->PPR->caption() ?><?php echo $ivf_vitals_history_add->PPR->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->PPR->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PPR" type="text/html"><span id="el_ivf_vitals_history_PPR">
<input type="text" data-table="ivf_vitals_history" data-field="x_PPR" name="x_PPR" id="x_PPR" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->PPR->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history_add->PPR->EditValue ?>"<?php echo $ivf_vitals_history_add->PPR->editAttributes() ?>>
</span></script>
<?php echo $ivf_vitals_history_add->PPR->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->PBP->Visible) { // PBP ?>
	<div id="r_PBP" class="form-group row">
		<label id="elh_ivf_vitals_history_PBP" for="x_PBP" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_PBP" type="text/html"><?php echo $ivf_vitals_history_add->PBP->caption() ?><?php echo $ivf_vitals_history_add->PBP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->PBP->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PBP" type="text/html"><span id="el_ivf_vitals_history_PBP">
<input type="text" data-table="ivf_vitals_history" data-field="x_PBP" name="x_PBP" id="x_PBP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->PBP->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history_add->PBP->EditValue ?>"<?php echo $ivf_vitals_history_add->PBP->editAttributes() ?>>
</span></script>
<?php echo $ivf_vitals_history_add->PBP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->Breast->Visible) { // Breast ?>
	<div id="r_Breast" class="form-group row">
		<label id="elh_ivf_vitals_history_Breast" for="x_Breast" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_Breast" type="text/html"><?php echo $ivf_vitals_history_add->Breast->caption() ?><?php echo $ivf_vitals_history_add->Breast->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->Breast->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Breast" type="text/html"><span id="el_ivf_vitals_history_Breast">
<input type="text" data-table="ivf_vitals_history" data-field="x_Breast" name="x_Breast" id="x_Breast" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->Breast->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history_add->Breast->EditValue ?>"<?php echo $ivf_vitals_history_add->Breast->editAttributes() ?>>
</span></script>
<?php echo $ivf_vitals_history_add->Breast->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->PPA->Visible) { // PPA ?>
	<div id="r_PPA" class="form-group row">
		<label id="elh_ivf_vitals_history_PPA" for="x_PPA" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_PPA" type="text/html"><?php echo $ivf_vitals_history_add->PPA->caption() ?><?php echo $ivf_vitals_history_add->PPA->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->PPA->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PPA" type="text/html"><span id="el_ivf_vitals_history_PPA">
<input type="text" data-table="ivf_vitals_history" data-field="x_PPA" name="x_PPA" id="x_PPA" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->PPA->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history_add->PPA->EditValue ?>"<?php echo $ivf_vitals_history_add->PPA->editAttributes() ?>>
</span></script>
<?php echo $ivf_vitals_history_add->PPA->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->PPSV->Visible) { // PPSV ?>
	<div id="r_PPSV" class="form-group row">
		<label id="elh_ivf_vitals_history_PPSV" for="x_PPSV" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_PPSV" type="text/html"><?php echo $ivf_vitals_history_add->PPSV->caption() ?><?php echo $ivf_vitals_history_add->PPSV->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->PPSV->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PPSV" type="text/html"><span id="el_ivf_vitals_history_PPSV">
<input type="text" data-table="ivf_vitals_history" data-field="x_PPSV" name="x_PPSV" id="x_PPSV" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->PPSV->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history_add->PPSV->EditValue ?>"<?php echo $ivf_vitals_history_add->PPSV->editAttributes() ?>>
</span></script>
<?php echo $ivf_vitals_history_add->PPSV->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->PPAPSMEAR->Visible) { // PPAPSMEAR ?>
	<div id="r_PPAPSMEAR" class="form-group row">
		<label id="elh_ivf_vitals_history_PPAPSMEAR" for="x_PPAPSMEAR" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_PPAPSMEAR" type="text/html"><?php echo $ivf_vitals_history_add->PPAPSMEAR->caption() ?><?php echo $ivf_vitals_history_add->PPAPSMEAR->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->PPAPSMEAR->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PPAPSMEAR" type="text/html"><span id="el_ivf_vitals_history_PPAPSMEAR">
<input type="text" data-table="ivf_vitals_history" data-field="x_PPAPSMEAR" name="x_PPAPSMEAR" id="x_PPAPSMEAR" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->PPAPSMEAR->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history_add->PPAPSMEAR->EditValue ?>"<?php echo $ivf_vitals_history_add->PPAPSMEAR->editAttributes() ?>>
</span></script>
<?php echo $ivf_vitals_history_add->PPAPSMEAR->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->PTHYROID->Visible) { // PTHYROID ?>
	<div id="r_PTHYROID" class="form-group row">
		<label id="elh_ivf_vitals_history_PTHYROID" for="x_PTHYROID" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_PTHYROID" type="text/html"><?php echo $ivf_vitals_history_add->PTHYROID->caption() ?><?php echo $ivf_vitals_history_add->PTHYROID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->PTHYROID->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PTHYROID" type="text/html"><span id="el_ivf_vitals_history_PTHYROID">
<input type="text" data-table="ivf_vitals_history" data-field="x_PTHYROID" name="x_PTHYROID" id="x_PTHYROID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->PTHYROID->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history_add->PTHYROID->EditValue ?>"<?php echo $ivf_vitals_history_add->PTHYROID->editAttributes() ?>>
</span></script>
<?php echo $ivf_vitals_history_add->PTHYROID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->MTHYROID->Visible) { // MTHYROID ?>
	<div id="r_MTHYROID" class="form-group row">
		<label id="elh_ivf_vitals_history_MTHYROID" for="x_MTHYROID" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_MTHYROID" type="text/html"><?php echo $ivf_vitals_history_add->MTHYROID->caption() ?><?php echo $ivf_vitals_history_add->MTHYROID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->MTHYROID->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MTHYROID" type="text/html"><span id="el_ivf_vitals_history_MTHYROID">
<input type="text" data-table="ivf_vitals_history" data-field="x_MTHYROID" name="x_MTHYROID" id="x_MTHYROID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->MTHYROID->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history_add->MTHYROID->EditValue ?>"<?php echo $ivf_vitals_history_add->MTHYROID->editAttributes() ?>>
</span></script>
<?php echo $ivf_vitals_history_add->MTHYROID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->SecSexCharacters->Visible) { // SecSexCharacters ?>
	<div id="r_SecSexCharacters" class="form-group row">
		<label id="elh_ivf_vitals_history_SecSexCharacters" for="x_SecSexCharacters" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_SecSexCharacters" type="text/html"><?php echo $ivf_vitals_history_add->SecSexCharacters->caption() ?><?php echo $ivf_vitals_history_add->SecSexCharacters->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->SecSexCharacters->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_SecSexCharacters" type="text/html"><span id="el_ivf_vitals_history_SecSexCharacters">
<input type="text" data-table="ivf_vitals_history" data-field="x_SecSexCharacters" name="x_SecSexCharacters" id="x_SecSexCharacters" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->SecSexCharacters->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history_add->SecSexCharacters->EditValue ?>"<?php echo $ivf_vitals_history_add->SecSexCharacters->editAttributes() ?>>
</span></script>
<?php echo $ivf_vitals_history_add->SecSexCharacters->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->PenisUM->Visible) { // PenisUM ?>
	<div id="r_PenisUM" class="form-group row">
		<label id="elh_ivf_vitals_history_PenisUM" for="x_PenisUM" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_PenisUM" type="text/html"><?php echo $ivf_vitals_history_add->PenisUM->caption() ?><?php echo $ivf_vitals_history_add->PenisUM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->PenisUM->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PenisUM" type="text/html"><span id="el_ivf_vitals_history_PenisUM">
<input type="text" data-table="ivf_vitals_history" data-field="x_PenisUM" name="x_PenisUM" id="x_PenisUM" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->PenisUM->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history_add->PenisUM->EditValue ?>"<?php echo $ivf_vitals_history_add->PenisUM->editAttributes() ?>>
</span></script>
<?php echo $ivf_vitals_history_add->PenisUM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->VAS->Visible) { // VAS ?>
	<div id="r_VAS" class="form-group row">
		<label id="elh_ivf_vitals_history_VAS" for="x_VAS" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_VAS" type="text/html"><?php echo $ivf_vitals_history_add->VAS->caption() ?><?php echo $ivf_vitals_history_add->VAS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->VAS->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_VAS" type="text/html"><span id="el_ivf_vitals_history_VAS">
<input type="text" data-table="ivf_vitals_history" data-field="x_VAS" name="x_VAS" id="x_VAS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->VAS->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history_add->VAS->EditValue ?>"<?php echo $ivf_vitals_history_add->VAS->editAttributes() ?>>
</span></script>
<?php echo $ivf_vitals_history_add->VAS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->EPIDIDYMIS->Visible) { // EPIDIDYMIS ?>
	<div id="r_EPIDIDYMIS" class="form-group row">
		<label id="elh_ivf_vitals_history_EPIDIDYMIS" for="x_EPIDIDYMIS" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_EPIDIDYMIS" type="text/html"><?php echo $ivf_vitals_history_add->EPIDIDYMIS->caption() ?><?php echo $ivf_vitals_history_add->EPIDIDYMIS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->EPIDIDYMIS->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_EPIDIDYMIS" type="text/html"><span id="el_ivf_vitals_history_EPIDIDYMIS">
<input type="text" data-table="ivf_vitals_history" data-field="x_EPIDIDYMIS" name="x_EPIDIDYMIS" id="x_EPIDIDYMIS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->EPIDIDYMIS->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history_add->EPIDIDYMIS->EditValue ?>"<?php echo $ivf_vitals_history_add->EPIDIDYMIS->editAttributes() ?>>
</span></script>
<?php echo $ivf_vitals_history_add->EPIDIDYMIS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->Varicocele->Visible) { // Varicocele ?>
	<div id="r_Varicocele" class="form-group row">
		<label id="elh_ivf_vitals_history_Varicocele" for="x_Varicocele" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_Varicocele" type="text/html"><?php echo $ivf_vitals_history_add->Varicocele->caption() ?><?php echo $ivf_vitals_history_add->Varicocele->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->Varicocele->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Varicocele" type="text/html"><span id="el_ivf_vitals_history_Varicocele">
<input type="text" data-table="ivf_vitals_history" data-field="x_Varicocele" name="x_Varicocele" id="x_Varicocele" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->Varicocele->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history_add->Varicocele->EditValue ?>"<?php echo $ivf_vitals_history_add->Varicocele->editAttributes() ?>>
</span></script>
<?php echo $ivf_vitals_history_add->Varicocele->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->FertilityTreatmentHistory->Visible) { // FertilityTreatmentHistory ?>
	<div id="r_FertilityTreatmentHistory" class="form-group row">
		<label id="elh_ivf_vitals_history_FertilityTreatmentHistory" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_FertilityTreatmentHistory" type="text/html"><?php echo $ivf_vitals_history_add->FertilityTreatmentHistory->caption() ?><?php echo $ivf_vitals_history_add->FertilityTreatmentHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->FertilityTreatmentHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_FertilityTreatmentHistory" type="text/html"><span id="el_ivf_vitals_history_FertilityTreatmentHistory">
<?php $ivf_vitals_history_add->FertilityTreatmentHistory->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_FertilityTreatmentHistory" name="x_FertilityTreatmentHistory" id="x_FertilityTreatmentHistory" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->FertilityTreatmentHistory->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history_add->FertilityTreatmentHistory->editAttributes() ?>><?php echo $ivf_vitals_history_add->FertilityTreatmentHistory->EditValue ?></textarea>
</span></script>
<script type="text/html" class="ivf_vitals_historyadd_js">
loadjs.ready(["fivf_vitals_historyadd", "editor"], function() {
	ew.createEditor("fivf_vitals_historyadd", "x_FertilityTreatmentHistory", 35, 4, <?php echo $ivf_vitals_history_add->FertilityTreatmentHistory->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
<?php echo $ivf_vitals_history_add->FertilityTreatmentHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->SurgeryHistory->Visible) { // SurgeryHistory ?>
	<div id="r_SurgeryHistory" class="form-group row">
		<label id="elh_ivf_vitals_history_SurgeryHistory" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_SurgeryHistory" type="text/html"><?php echo $ivf_vitals_history_add->SurgeryHistory->caption() ?><?php echo $ivf_vitals_history_add->SurgeryHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->SurgeryHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_SurgeryHistory" type="text/html"><span id="el_ivf_vitals_history_SurgeryHistory">
<?php $ivf_vitals_history_add->SurgeryHistory->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_SurgeryHistory" name="x_SurgeryHistory" id="x_SurgeryHistory" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->SurgeryHistory->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history_add->SurgeryHistory->editAttributes() ?>><?php echo $ivf_vitals_history_add->SurgeryHistory->EditValue ?></textarea>
</span></script>
<script type="text/html" class="ivf_vitals_historyadd_js">
loadjs.ready(["fivf_vitals_historyadd", "editor"], function() {
	ew.createEditor("fivf_vitals_historyadd", "x_SurgeryHistory", 35, 4, <?php echo $ivf_vitals_history_add->SurgeryHistory->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
<?php echo $ivf_vitals_history_add->SurgeryHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->FamilyHistory->Visible) { // FamilyHistory ?>
	<div id="r_FamilyHistory" class="form-group row">
		<label id="elh_ivf_vitals_history_FamilyHistory" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_FamilyHistory" type="text/html"><?php echo $ivf_vitals_history_add->FamilyHistory->caption() ?><?php echo $ivf_vitals_history_add->FamilyHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->FamilyHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_FamilyHistory" type="text/html"><span id="el_ivf_vitals_history_FamilyHistory">
<?php
$onchange = $ivf_vitals_history_add->FamilyHistory->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$ivf_vitals_history_add->FamilyHistory->EditAttrs["onchange"] = "";
?>
<span id="as_x_FamilyHistory">
	<input type="text" class="form-control" name="sv_x_FamilyHistory" id="sv_x_FamilyHistory" value="<?php echo RemoveHtml($ivf_vitals_history_add->FamilyHistory->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->FamilyHistory->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->FamilyHistory->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history_add->FamilyHistory->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_FamilyHistory" data-value-separator="<?php echo $ivf_vitals_history_add->FamilyHistory->displayValueSeparatorAttribute() ?>" name="x_FamilyHistory" id="x_FamilyHistory" value="<?php echo HtmlEncode($ivf_vitals_history_add->FamilyHistory->CurrentValue) ?>"<?php echo $onchange ?>>
<?php echo $ivf_vitals_history_add->FamilyHistory->Lookup->getParamTag($ivf_vitals_history_add, "p_x_FamilyHistory") ?>
</span></script>
<script type="text/html" class="ivf_vitals_historyadd_js">
loadjs.ready(["fivf_vitals_historyadd"], function() {
	fivf_vitals_historyadd.createAutoSuggest({"id":"x_FamilyHistory","forceSelect":false});
});
</script>
<?php echo $ivf_vitals_history_add->FamilyHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->PInvestigations->Visible) { // PInvestigations ?>
	<div id="r_PInvestigations" class="form-group row">
		<label id="elh_ivf_vitals_history_PInvestigations" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_PInvestigations" type="text/html"><?php echo $ivf_vitals_history_add->PInvestigations->caption() ?><?php echo $ivf_vitals_history_add->PInvestigations->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->PInvestigations->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PInvestigations" type="text/html"><span id="el_ivf_vitals_history_PInvestigations">
<?php $ivf_vitals_history_add->PInvestigations->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_PInvestigations" name="x_PInvestigations" id="x_PInvestigations" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->PInvestigations->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history_add->PInvestigations->editAttributes() ?>><?php echo $ivf_vitals_history_add->PInvestigations->EditValue ?></textarea>
</span></script>
<script type="text/html" class="ivf_vitals_historyadd_js">
loadjs.ready(["fivf_vitals_historyadd", "editor"], function() {
	ew.createEditor("fivf_vitals_historyadd", "x_PInvestigations", 35, 4, <?php echo $ivf_vitals_history_add->PInvestigations->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
<?php echo $ivf_vitals_history_add->PInvestigations->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->Addictions->Visible) { // Addictions ?>
	<div id="r_Addictions" class="form-group row">
		<label id="elh_ivf_vitals_history_Addictions" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_Addictions" type="text/html"><?php echo $ivf_vitals_history_add->Addictions->caption() ?><?php echo $ivf_vitals_history_add->Addictions->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->Addictions->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Addictions" type="text/html"><span id="el_ivf_vitals_history_Addictions">
<div id="tp_x_Addictions" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="ivf_vitals_history" data-field="x_Addictions" data-value-separator="<?php echo $ivf_vitals_history_add->Addictions->displayValueSeparatorAttribute() ?>" name="x_Addictions[]" id="x_Addictions[]" value="{value}"<?php echo $ivf_vitals_history_add->Addictions->editAttributes() ?>></div>
<div id="dsl_x_Addictions" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_vitals_history_add->Addictions->checkBoxListHtml(FALSE, "x_Addictions[]") ?>
</div></div>
</span></script>
<?php echo $ivf_vitals_history_add->Addictions->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->Medications->Visible) { // Medications ?>
	<div id="r_Medications" class="form-group row">
		<label id="elh_ivf_vitals_history_Medications" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_Medications" type="text/html"><?php echo $ivf_vitals_history_add->Medications->caption() ?><?php echo $ivf_vitals_history_add->Medications->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->Medications->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Medications" type="text/html"><span id="el_ivf_vitals_history_Medications">
<?php $ivf_vitals_history_add->Medications->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_Medications" name="x_Medications" id="x_Medications" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->Medications->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history_add->Medications->editAttributes() ?>><?php echo $ivf_vitals_history_add->Medications->EditValue ?></textarea>
</span></script>
<script type="text/html" class="ivf_vitals_historyadd_js">
loadjs.ready(["fivf_vitals_historyadd", "editor"], function() {
	ew.createEditor("fivf_vitals_historyadd", "x_Medications", 35, 4, <?php echo $ivf_vitals_history_add->Medications->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
<?php echo $ivf_vitals_history_add->Medications->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->Medical->Visible) { // Medical ?>
	<div id="r_Medical" class="form-group row">
		<label id="elh_ivf_vitals_history_Medical" for="x_Medical" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_Medical" type="text/html"><?php echo $ivf_vitals_history_add->Medical->caption() ?><?php echo $ivf_vitals_history_add->Medical->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->Medical->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Medical" type="text/html"><span id="el_ivf_vitals_history_Medical">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_Medical" data-value-separator="<?php echo $ivf_vitals_history_add->Medical->displayValueSeparatorAttribute() ?>" id="x_Medical" name="x_Medical"<?php echo $ivf_vitals_history_add->Medical->editAttributes() ?>>
			<?php echo $ivf_vitals_history_add->Medical->selectOptionListHtml("x_Medical") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_vitals_history_add->Medical->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->Surgical->Visible) { // Surgical ?>
	<div id="r_Surgical" class="form-group row">
		<label id="elh_ivf_vitals_history_Surgical" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_Surgical" type="text/html"><?php echo $ivf_vitals_history_add->Surgical->caption() ?><?php echo $ivf_vitals_history_add->Surgical->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->Surgical->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Surgical" type="text/html"><span id="el_ivf_vitals_history_Surgical">
<?php
$onchange = $ivf_vitals_history_add->Surgical->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$ivf_vitals_history_add->Surgical->EditAttrs["onchange"] = "";
?>
<span id="as_x_Surgical">
	<input type="text" class="form-control" name="sv_x_Surgical" id="sv_x_Surgical" value="<?php echo RemoveHtml($ivf_vitals_history_add->Surgical->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->Surgical->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->Surgical->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history_add->Surgical->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_Surgical" data-value-separator="<?php echo $ivf_vitals_history_add->Surgical->displayValueSeparatorAttribute() ?>" name="x_Surgical" id="x_Surgical" value="<?php echo HtmlEncode($ivf_vitals_history_add->Surgical->CurrentValue) ?>"<?php echo $onchange ?>>
<?php echo $ivf_vitals_history_add->Surgical->Lookup->getParamTag($ivf_vitals_history_add, "p_x_Surgical") ?>
</span></script>
<script type="text/html" class="ivf_vitals_historyadd_js">
loadjs.ready(["fivf_vitals_historyadd"], function() {
	fivf_vitals_historyadd.createAutoSuggest({"id":"x_Surgical","forceSelect":false});
});
</script>
<?php echo $ivf_vitals_history_add->Surgical->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->CoitalHistory->Visible) { // CoitalHistory ?>
	<div id="r_CoitalHistory" class="form-group row">
		<label id="elh_ivf_vitals_history_CoitalHistory" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_CoitalHistory" type="text/html"><?php echo $ivf_vitals_history_add->CoitalHistory->caption() ?><?php echo $ivf_vitals_history_add->CoitalHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->CoitalHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_CoitalHistory" type="text/html"><span id="el_ivf_vitals_history_CoitalHistory">
<?php
$onchange = $ivf_vitals_history_add->CoitalHistory->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$ivf_vitals_history_add->CoitalHistory->EditAttrs["onchange"] = "";
?>
<span id="as_x_CoitalHistory">
	<input type="text" class="form-control" name="sv_x_CoitalHistory" id="sv_x_CoitalHistory" value="<?php echo RemoveHtml($ivf_vitals_history_add->CoitalHistory->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->CoitalHistory->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->CoitalHistory->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history_add->CoitalHistory->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_CoitalHistory" data-value-separator="<?php echo $ivf_vitals_history_add->CoitalHistory->displayValueSeparatorAttribute() ?>" name="x_CoitalHistory" id="x_CoitalHistory" value="<?php echo HtmlEncode($ivf_vitals_history_add->CoitalHistory->CurrentValue) ?>"<?php echo $onchange ?>>
<?php echo $ivf_vitals_history_add->CoitalHistory->Lookup->getParamTag($ivf_vitals_history_add, "p_x_CoitalHistory") ?>
</span></script>
<script type="text/html" class="ivf_vitals_historyadd_js">
loadjs.ready(["fivf_vitals_historyadd"], function() {
	fivf_vitals_historyadd.createAutoSuggest({"id":"x_CoitalHistory","forceSelect":false});
});
</script>
<?php echo $ivf_vitals_history_add->CoitalHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->SemenAnalysis->Visible) { // SemenAnalysis ?>
	<div id="r_SemenAnalysis" class="form-group row">
		<label id="elh_ivf_vitals_history_SemenAnalysis" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_SemenAnalysis" type="text/html"><?php echo $ivf_vitals_history_add->SemenAnalysis->caption() ?><?php echo $ivf_vitals_history_add->SemenAnalysis->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->SemenAnalysis->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_SemenAnalysis" type="text/html"><span id="el_ivf_vitals_history_SemenAnalysis">
<?php $ivf_vitals_history_add->SemenAnalysis->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_SemenAnalysis" name="x_SemenAnalysis" id="x_SemenAnalysis" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->SemenAnalysis->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history_add->SemenAnalysis->editAttributes() ?>><?php echo $ivf_vitals_history_add->SemenAnalysis->EditValue ?></textarea>
</span></script>
<script type="text/html" class="ivf_vitals_historyadd_js">
loadjs.ready(["fivf_vitals_historyadd", "editor"], function() {
	ew.createEditor("fivf_vitals_historyadd", "x_SemenAnalysis", 35, 4, <?php echo $ivf_vitals_history_add->SemenAnalysis->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
<?php echo $ivf_vitals_history_add->SemenAnalysis->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->MInsvestications->Visible) { // MInsvestications ?>
	<div id="r_MInsvestications" class="form-group row">
		<label id="elh_ivf_vitals_history_MInsvestications" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_MInsvestications" type="text/html"><?php echo $ivf_vitals_history_add->MInsvestications->caption() ?><?php echo $ivf_vitals_history_add->MInsvestications->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->MInsvestications->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MInsvestications" type="text/html"><span id="el_ivf_vitals_history_MInsvestications">
<?php $ivf_vitals_history_add->MInsvestications->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_MInsvestications" name="x_MInsvestications" id="x_MInsvestications" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->MInsvestications->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history_add->MInsvestications->editAttributes() ?>><?php echo $ivf_vitals_history_add->MInsvestications->EditValue ?></textarea>
</span></script>
<script type="text/html" class="ivf_vitals_historyadd_js">
loadjs.ready(["fivf_vitals_historyadd", "editor"], function() {
	ew.createEditor("fivf_vitals_historyadd", "x_MInsvestications", 35, 4, <?php echo $ivf_vitals_history_add->MInsvestications->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
<?php echo $ivf_vitals_history_add->MInsvestications->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->PImpression->Visible) { // PImpression ?>
	<div id="r_PImpression" class="form-group row">
		<label id="elh_ivf_vitals_history_PImpression" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_PImpression" type="text/html"><?php echo $ivf_vitals_history_add->PImpression->caption() ?><?php echo $ivf_vitals_history_add->PImpression->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->PImpression->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PImpression" type="text/html"><span id="el_ivf_vitals_history_PImpression">
<?php $ivf_vitals_history_add->PImpression->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_PImpression" name="x_PImpression" id="x_PImpression" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->PImpression->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history_add->PImpression->editAttributes() ?>><?php echo $ivf_vitals_history_add->PImpression->EditValue ?></textarea>
</span></script>
<script type="text/html" class="ivf_vitals_historyadd_js">
loadjs.ready(["fivf_vitals_historyadd", "editor"], function() {
	ew.createEditor("fivf_vitals_historyadd", "x_PImpression", 35, 4, <?php echo $ivf_vitals_history_add->PImpression->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
<?php echo $ivf_vitals_history_add->PImpression->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->MIMpression->Visible) { // MIMpression ?>
	<div id="r_MIMpression" class="form-group row">
		<label id="elh_ivf_vitals_history_MIMpression" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_MIMpression" type="text/html"><?php echo $ivf_vitals_history_add->MIMpression->caption() ?><?php echo $ivf_vitals_history_add->MIMpression->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->MIMpression->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MIMpression" type="text/html"><span id="el_ivf_vitals_history_MIMpression">
<?php $ivf_vitals_history_add->MIMpression->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_MIMpression" name="x_MIMpression" id="x_MIMpression" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->MIMpression->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history_add->MIMpression->editAttributes() ?>><?php echo $ivf_vitals_history_add->MIMpression->EditValue ?></textarea>
</span></script>
<script type="text/html" class="ivf_vitals_historyadd_js">
loadjs.ready(["fivf_vitals_historyadd", "editor"], function() {
	ew.createEditor("fivf_vitals_historyadd", "x_MIMpression", 35, 4, <?php echo $ivf_vitals_history_add->MIMpression->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
<?php echo $ivf_vitals_history_add->MIMpression->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->PPlanOfManagement->Visible) { // PPlanOfManagement ?>
	<div id="r_PPlanOfManagement" class="form-group row">
		<label id="elh_ivf_vitals_history_PPlanOfManagement" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_PPlanOfManagement" type="text/html"><?php echo $ivf_vitals_history_add->PPlanOfManagement->caption() ?><?php echo $ivf_vitals_history_add->PPlanOfManagement->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->PPlanOfManagement->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PPlanOfManagement" type="text/html"><span id="el_ivf_vitals_history_PPlanOfManagement">
<?php $ivf_vitals_history_add->PPlanOfManagement->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_PPlanOfManagement" name="x_PPlanOfManagement" id="x_PPlanOfManagement" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->PPlanOfManagement->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history_add->PPlanOfManagement->editAttributes() ?>><?php echo $ivf_vitals_history_add->PPlanOfManagement->EditValue ?></textarea>
</span></script>
<script type="text/html" class="ivf_vitals_historyadd_js">
loadjs.ready(["fivf_vitals_historyadd", "editor"], function() {
	ew.createEditor("fivf_vitals_historyadd", "x_PPlanOfManagement", 35, 4, <?php echo $ivf_vitals_history_add->PPlanOfManagement->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
<?php echo $ivf_vitals_history_add->PPlanOfManagement->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->MPlanOfManagement->Visible) { // MPlanOfManagement ?>
	<div id="r_MPlanOfManagement" class="form-group row">
		<label id="elh_ivf_vitals_history_MPlanOfManagement" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_MPlanOfManagement" type="text/html"><?php echo $ivf_vitals_history_add->MPlanOfManagement->caption() ?><?php echo $ivf_vitals_history_add->MPlanOfManagement->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->MPlanOfManagement->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MPlanOfManagement" type="text/html"><span id="el_ivf_vitals_history_MPlanOfManagement">
<?php $ivf_vitals_history_add->MPlanOfManagement->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_MPlanOfManagement" name="x_MPlanOfManagement" id="x_MPlanOfManagement" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->MPlanOfManagement->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history_add->MPlanOfManagement->editAttributes() ?>><?php echo $ivf_vitals_history_add->MPlanOfManagement->EditValue ?></textarea>
</span></script>
<script type="text/html" class="ivf_vitals_historyadd_js">
loadjs.ready(["fivf_vitals_historyadd", "editor"], function() {
	ew.createEditor("fivf_vitals_historyadd", "x_MPlanOfManagement", 35, 4, <?php echo $ivf_vitals_history_add->MPlanOfManagement->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
<?php echo $ivf_vitals_history_add->MPlanOfManagement->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->PReadMore->Visible) { // PReadMore ?>
	<div id="r_PReadMore" class="form-group row">
		<label id="elh_ivf_vitals_history_PReadMore" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_PReadMore" type="text/html"><?php echo $ivf_vitals_history_add->PReadMore->caption() ?><?php echo $ivf_vitals_history_add->PReadMore->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->PReadMore->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PReadMore" type="text/html"><span id="el_ivf_vitals_history_PReadMore">
<?php $ivf_vitals_history_add->PReadMore->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_PReadMore" name="x_PReadMore" id="x_PReadMore" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->PReadMore->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history_add->PReadMore->editAttributes() ?>><?php echo $ivf_vitals_history_add->PReadMore->EditValue ?></textarea>
</span></script>
<script type="text/html" class="ivf_vitals_historyadd_js">
loadjs.ready(["fivf_vitals_historyadd", "editor"], function() {
	ew.createEditor("fivf_vitals_historyadd", "x_PReadMore", 35, 4, <?php echo $ivf_vitals_history_add->PReadMore->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
<?php echo $ivf_vitals_history_add->PReadMore->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->MReadMore->Visible) { // MReadMore ?>
	<div id="r_MReadMore" class="form-group row">
		<label id="elh_ivf_vitals_history_MReadMore" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_MReadMore" type="text/html"><?php echo $ivf_vitals_history_add->MReadMore->caption() ?><?php echo $ivf_vitals_history_add->MReadMore->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->MReadMore->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MReadMore" type="text/html"><span id="el_ivf_vitals_history_MReadMore">
<?php $ivf_vitals_history_add->MReadMore->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_MReadMore" name="x_MReadMore" id="x_MReadMore" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->MReadMore->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history_add->MReadMore->editAttributes() ?>><?php echo $ivf_vitals_history_add->MReadMore->EditValue ?></textarea>
</span></script>
<script type="text/html" class="ivf_vitals_historyadd_js">
loadjs.ready(["fivf_vitals_historyadd", "editor"], function() {
	ew.createEditor("fivf_vitals_historyadd", "x_MReadMore", 35, 4, <?php echo $ivf_vitals_history_add->MReadMore->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
<?php echo $ivf_vitals_history_add->MReadMore->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->MariedFor->Visible) { // MariedFor ?>
	<div id="r_MariedFor" class="form-group row">
		<label id="elh_ivf_vitals_history_MariedFor" for="x_MariedFor" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_MariedFor" type="text/html"><?php echo $ivf_vitals_history_add->MariedFor->caption() ?><?php echo $ivf_vitals_history_add->MariedFor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->MariedFor->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MariedFor" type="text/html"><span id="el_ivf_vitals_history_MariedFor">
<input type="text" data-table="ivf_vitals_history" data-field="x_MariedFor" name="x_MariedFor" id="x_MariedFor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->MariedFor->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history_add->MariedFor->EditValue ?>"<?php echo $ivf_vitals_history_add->MariedFor->editAttributes() ?>>
</span></script>
<?php echo $ivf_vitals_history_add->MariedFor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->CMNCM->Visible) { // CMNCM ?>
	<div id="r_CMNCM" class="form-group row">
		<label id="elh_ivf_vitals_history_CMNCM" for="x_CMNCM" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_CMNCM" type="text/html"><?php echo $ivf_vitals_history_add->CMNCM->caption() ?><?php echo $ivf_vitals_history_add->CMNCM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->CMNCM->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_CMNCM" type="text/html"><span id="el_ivf_vitals_history_CMNCM">
<input type="text" data-table="ivf_vitals_history" data-field="x_CMNCM" name="x_CMNCM" id="x_CMNCM" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->CMNCM->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history_add->CMNCM->EditValue ?>"<?php echo $ivf_vitals_history_add->CMNCM->editAttributes() ?>>
</span></script>
<?php echo $ivf_vitals_history_add->CMNCM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->TemplateMenstrualHistory->Visible) { // TemplateMenstrualHistory ?>
	<div id="r_TemplateMenstrualHistory" class="form-group row">
		<label id="elh_ivf_vitals_history_TemplateMenstrualHistory" for="x_TemplateMenstrualHistory" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_TemplateMenstrualHistory" type="text/html"><?php echo $ivf_vitals_history_add->TemplateMenstrualHistory->caption() ?><?php echo $ivf_vitals_history_add->TemplateMenstrualHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->TemplateMenstrualHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_TemplateMenstrualHistory" type="text/html"><span id="el_ivf_vitals_history_TemplateMenstrualHistory">
<?php $ivf_vitals_history_add->TemplateMenstrualHistory->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_TemplateMenstrualHistory" data-value-separator="<?php echo $ivf_vitals_history_add->TemplateMenstrualHistory->displayValueSeparatorAttribute() ?>" id="x_TemplateMenstrualHistory" name="x_TemplateMenstrualHistory"<?php echo $ivf_vitals_history_add->TemplateMenstrualHistory->editAttributes() ?>>
			<?php echo $ivf_vitals_history_add->TemplateMenstrualHistory->selectOptionListHtml("x_TemplateMenstrualHistory") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_vitals_history_add->TemplateMenstrualHistory->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateMenstrualHistory" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_vitals_history_add->TemplateMenstrualHistory->caption() ?>" data-title="<?php echo $ivf_vitals_history_add->TemplateMenstrualHistory->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateMenstrualHistory',url:'ivf_mas_user_templateaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ivf_vitals_history_add->TemplateMenstrualHistory->Lookup->getParamTag($ivf_vitals_history_add, "p_x_TemplateMenstrualHistory") ?>
</span></script>
<?php echo $ivf_vitals_history_add->TemplateMenstrualHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->TemplateObstetricHistory->Visible) { // TemplateObstetricHistory ?>
	<div id="r_TemplateObstetricHistory" class="form-group row">
		<label id="elh_ivf_vitals_history_TemplateObstetricHistory" for="x_TemplateObstetricHistory" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_TemplateObstetricHistory" type="text/html"><?php echo $ivf_vitals_history_add->TemplateObstetricHistory->caption() ?><?php echo $ivf_vitals_history_add->TemplateObstetricHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->TemplateObstetricHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_TemplateObstetricHistory" type="text/html"><span id="el_ivf_vitals_history_TemplateObstetricHistory">
<?php $ivf_vitals_history_add->TemplateObstetricHistory->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_TemplateObstetricHistory" data-value-separator="<?php echo $ivf_vitals_history_add->TemplateObstetricHistory->displayValueSeparatorAttribute() ?>" id="x_TemplateObstetricHistory" name="x_TemplateObstetricHistory"<?php echo $ivf_vitals_history_add->TemplateObstetricHistory->editAttributes() ?>>
			<?php echo $ivf_vitals_history_add->TemplateObstetricHistory->selectOptionListHtml("x_TemplateObstetricHistory") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_vitals_history_add->TemplateObstetricHistory->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateObstetricHistory" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_vitals_history_add->TemplateObstetricHistory->caption() ?>" data-title="<?php echo $ivf_vitals_history_add->TemplateObstetricHistory->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateObstetricHistory',url:'ivf_mas_user_templateaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ivf_vitals_history_add->TemplateObstetricHistory->Lookup->getParamTag($ivf_vitals_history_add, "p_x_TemplateObstetricHistory") ?>
</span></script>
<?php echo $ivf_vitals_history_add->TemplateObstetricHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->TemplateFertilityTreatmentHistory->Visible) { // TemplateFertilityTreatmentHistory ?>
	<div id="r_TemplateFertilityTreatmentHistory" class="form-group row">
		<label id="elh_ivf_vitals_history_TemplateFertilityTreatmentHistory" for="x_TemplateFertilityTreatmentHistory" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_TemplateFertilityTreatmentHistory" type="text/html"><?php echo $ivf_vitals_history_add->TemplateFertilityTreatmentHistory->caption() ?><?php echo $ivf_vitals_history_add->TemplateFertilityTreatmentHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->TemplateFertilityTreatmentHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_TemplateFertilityTreatmentHistory" type="text/html"><span id="el_ivf_vitals_history_TemplateFertilityTreatmentHistory">
<?php $ivf_vitals_history_add->TemplateFertilityTreatmentHistory->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_TemplateFertilityTreatmentHistory" data-value-separator="<?php echo $ivf_vitals_history_add->TemplateFertilityTreatmentHistory->displayValueSeparatorAttribute() ?>" id="x_TemplateFertilityTreatmentHistory" name="x_TemplateFertilityTreatmentHistory"<?php echo $ivf_vitals_history_add->TemplateFertilityTreatmentHistory->editAttributes() ?>>
			<?php echo $ivf_vitals_history_add->TemplateFertilityTreatmentHistory->selectOptionListHtml("x_TemplateFertilityTreatmentHistory") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_vitals_history_add->TemplateFertilityTreatmentHistory->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateFertilityTreatmentHistory" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_vitals_history_add->TemplateFertilityTreatmentHistory->caption() ?>" data-title="<?php echo $ivf_vitals_history_add->TemplateFertilityTreatmentHistory->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateFertilityTreatmentHistory',url:'ivf_mas_user_templateaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ivf_vitals_history_add->TemplateFertilityTreatmentHistory->Lookup->getParamTag($ivf_vitals_history_add, "p_x_TemplateFertilityTreatmentHistory") ?>
</span></script>
<?php echo $ivf_vitals_history_add->TemplateFertilityTreatmentHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->TemplateSurgeryHistory->Visible) { // TemplateSurgeryHistory ?>
	<div id="r_TemplateSurgeryHistory" class="form-group row">
		<label id="elh_ivf_vitals_history_TemplateSurgeryHistory" for="x_TemplateSurgeryHistory" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_TemplateSurgeryHistory" type="text/html"><?php echo $ivf_vitals_history_add->TemplateSurgeryHistory->caption() ?><?php echo $ivf_vitals_history_add->TemplateSurgeryHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->TemplateSurgeryHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_TemplateSurgeryHistory" type="text/html"><span id="el_ivf_vitals_history_TemplateSurgeryHistory">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_TemplateSurgeryHistory" data-value-separator="<?php echo $ivf_vitals_history_add->TemplateSurgeryHistory->displayValueSeparatorAttribute() ?>" id="x_TemplateSurgeryHistory" name="x_TemplateSurgeryHistory"<?php echo $ivf_vitals_history_add->TemplateSurgeryHistory->editAttributes() ?>>
			<?php echo $ivf_vitals_history_add->TemplateSurgeryHistory->selectOptionListHtml("x_TemplateSurgeryHistory") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_vitals_history_add->TemplateSurgeryHistory->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateSurgeryHistory" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_vitals_history_add->TemplateSurgeryHistory->caption() ?>" data-title="<?php echo $ivf_vitals_history_add->TemplateSurgeryHistory->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateSurgeryHistory',url:'ivf_mas_user_templateaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ivf_vitals_history_add->TemplateSurgeryHistory->Lookup->getParamTag($ivf_vitals_history_add, "p_x_TemplateSurgeryHistory") ?>
</span></script>
<?php echo $ivf_vitals_history_add->TemplateSurgeryHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->TemplateFInvestigations->Visible) { // TemplateFInvestigations ?>
	<div id="r_TemplateFInvestigations" class="form-group row">
		<label id="elh_ivf_vitals_history_TemplateFInvestigations" for="x_TemplateFInvestigations" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_TemplateFInvestigations" type="text/html"><?php echo $ivf_vitals_history_add->TemplateFInvestigations->caption() ?><?php echo $ivf_vitals_history_add->TemplateFInvestigations->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->TemplateFInvestigations->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_TemplateFInvestigations" type="text/html"><span id="el_ivf_vitals_history_TemplateFInvestigations">
<?php $ivf_vitals_history_add->TemplateFInvestigations->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_TemplateFInvestigations" data-value-separator="<?php echo $ivf_vitals_history_add->TemplateFInvestigations->displayValueSeparatorAttribute() ?>" id="x_TemplateFInvestigations" name="x_TemplateFInvestigations"<?php echo $ivf_vitals_history_add->TemplateFInvestigations->editAttributes() ?>>
			<?php echo $ivf_vitals_history_add->TemplateFInvestigations->selectOptionListHtml("x_TemplateFInvestigations") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_vitals_history_add->TemplateFInvestigations->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateFInvestigations" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_vitals_history_add->TemplateFInvestigations->caption() ?>" data-title="<?php echo $ivf_vitals_history_add->TemplateFInvestigations->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateFInvestigations',url:'ivf_mas_user_templateaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ivf_vitals_history_add->TemplateFInvestigations->Lookup->getParamTag($ivf_vitals_history_add, "p_x_TemplateFInvestigations") ?>
</span></script>
<?php echo $ivf_vitals_history_add->TemplateFInvestigations->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->TemplatePlanOfManagement->Visible) { // TemplatePlanOfManagement ?>
	<div id="r_TemplatePlanOfManagement" class="form-group row">
		<label id="elh_ivf_vitals_history_TemplatePlanOfManagement" for="x_TemplatePlanOfManagement" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_TemplatePlanOfManagement" type="text/html"><?php echo $ivf_vitals_history_add->TemplatePlanOfManagement->caption() ?><?php echo $ivf_vitals_history_add->TemplatePlanOfManagement->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->TemplatePlanOfManagement->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_TemplatePlanOfManagement" type="text/html"><span id="el_ivf_vitals_history_TemplatePlanOfManagement">
<?php $ivf_vitals_history_add->TemplatePlanOfManagement->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_TemplatePlanOfManagement" data-value-separator="<?php echo $ivf_vitals_history_add->TemplatePlanOfManagement->displayValueSeparatorAttribute() ?>" id="x_TemplatePlanOfManagement" name="x_TemplatePlanOfManagement"<?php echo $ivf_vitals_history_add->TemplatePlanOfManagement->editAttributes() ?>>
			<?php echo $ivf_vitals_history_add->TemplatePlanOfManagement->selectOptionListHtml("x_TemplatePlanOfManagement") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_vitals_history_add->TemplatePlanOfManagement->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplatePlanOfManagement" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_vitals_history_add->TemplatePlanOfManagement->caption() ?>" data-title="<?php echo $ivf_vitals_history_add->TemplatePlanOfManagement->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplatePlanOfManagement',url:'ivf_mas_user_templateaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ivf_vitals_history_add->TemplatePlanOfManagement->Lookup->getParamTag($ivf_vitals_history_add, "p_x_TemplatePlanOfManagement") ?>
</span></script>
<?php echo $ivf_vitals_history_add->TemplatePlanOfManagement->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->TemplatePImpression->Visible) { // TemplatePImpression ?>
	<div id="r_TemplatePImpression" class="form-group row">
		<label id="elh_ivf_vitals_history_TemplatePImpression" for="x_TemplatePImpression" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_TemplatePImpression" type="text/html"><?php echo $ivf_vitals_history_add->TemplatePImpression->caption() ?><?php echo $ivf_vitals_history_add->TemplatePImpression->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->TemplatePImpression->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_TemplatePImpression" type="text/html"><span id="el_ivf_vitals_history_TemplatePImpression">
<?php $ivf_vitals_history_add->TemplatePImpression->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_TemplatePImpression" data-value-separator="<?php echo $ivf_vitals_history_add->TemplatePImpression->displayValueSeparatorAttribute() ?>" id="x_TemplatePImpression" name="x_TemplatePImpression"<?php echo $ivf_vitals_history_add->TemplatePImpression->editAttributes() ?>>
			<?php echo $ivf_vitals_history_add->TemplatePImpression->selectOptionListHtml("x_TemplatePImpression") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_vitals_history_add->TemplatePImpression->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplatePImpression" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_vitals_history_add->TemplatePImpression->caption() ?>" data-title="<?php echo $ivf_vitals_history_add->TemplatePImpression->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplatePImpression',url:'ivf_mas_user_templateaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ivf_vitals_history_add->TemplatePImpression->Lookup->getParamTag($ivf_vitals_history_add, "p_x_TemplatePImpression") ?>
</span></script>
<?php echo $ivf_vitals_history_add->TemplatePImpression->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->TemplateMedications->Visible) { // TemplateMedications ?>
	<div id="r_TemplateMedications" class="form-group row">
		<label id="elh_ivf_vitals_history_TemplateMedications" for="x_TemplateMedications" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_TemplateMedications" type="text/html"><?php echo $ivf_vitals_history_add->TemplateMedications->caption() ?><?php echo $ivf_vitals_history_add->TemplateMedications->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->TemplateMedications->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_TemplateMedications" type="text/html"><span id="el_ivf_vitals_history_TemplateMedications">
<?php $ivf_vitals_history_add->TemplateMedications->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_TemplateMedications" data-value-separator="<?php echo $ivf_vitals_history_add->TemplateMedications->displayValueSeparatorAttribute() ?>" id="x_TemplateMedications" name="x_TemplateMedications"<?php echo $ivf_vitals_history_add->TemplateMedications->editAttributes() ?>>
			<?php echo $ivf_vitals_history_add->TemplateMedications->selectOptionListHtml("x_TemplateMedications") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_vitals_history_add->TemplateMedications->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateMedications" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_vitals_history_add->TemplateMedications->caption() ?>" data-title="<?php echo $ivf_vitals_history_add->TemplateMedications->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateMedications',url:'ivf_mas_user_templateaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ivf_vitals_history_add->TemplateMedications->Lookup->getParamTag($ivf_vitals_history_add, "p_x_TemplateMedications") ?>
</span></script>
<?php echo $ivf_vitals_history_add->TemplateMedications->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->TemplateSemenAnalysis->Visible) { // TemplateSemenAnalysis ?>
	<div id="r_TemplateSemenAnalysis" class="form-group row">
		<label id="elh_ivf_vitals_history_TemplateSemenAnalysis" for="x_TemplateSemenAnalysis" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_TemplateSemenAnalysis" type="text/html"><?php echo $ivf_vitals_history_add->TemplateSemenAnalysis->caption() ?><?php echo $ivf_vitals_history_add->TemplateSemenAnalysis->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->TemplateSemenAnalysis->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_TemplateSemenAnalysis" type="text/html"><span id="el_ivf_vitals_history_TemplateSemenAnalysis">
<?php $ivf_vitals_history_add->TemplateSemenAnalysis->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_TemplateSemenAnalysis" data-value-separator="<?php echo $ivf_vitals_history_add->TemplateSemenAnalysis->displayValueSeparatorAttribute() ?>" id="x_TemplateSemenAnalysis" name="x_TemplateSemenAnalysis"<?php echo $ivf_vitals_history_add->TemplateSemenAnalysis->editAttributes() ?>>
			<?php echo $ivf_vitals_history_add->TemplateSemenAnalysis->selectOptionListHtml("x_TemplateSemenAnalysis") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_vitals_history_add->TemplateSemenAnalysis->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateSemenAnalysis" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_vitals_history_add->TemplateSemenAnalysis->caption() ?>" data-title="<?php echo $ivf_vitals_history_add->TemplateSemenAnalysis->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateSemenAnalysis',url:'ivf_mas_user_templateaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ivf_vitals_history_add->TemplateSemenAnalysis->Lookup->getParamTag($ivf_vitals_history_add, "p_x_TemplateSemenAnalysis") ?>
</span></script>
<?php echo $ivf_vitals_history_add->TemplateSemenAnalysis->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->MaleInsvestications->Visible) { // MaleInsvestications ?>
	<div id="r_MaleInsvestications" class="form-group row">
		<label id="elh_ivf_vitals_history_MaleInsvestications" for="x_MaleInsvestications" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_MaleInsvestications" type="text/html"><?php echo $ivf_vitals_history_add->MaleInsvestications->caption() ?><?php echo $ivf_vitals_history_add->MaleInsvestications->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->MaleInsvestications->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MaleInsvestications" type="text/html"><span id="el_ivf_vitals_history_MaleInsvestications">
<?php $ivf_vitals_history_add->MaleInsvestications->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_MaleInsvestications" data-value-separator="<?php echo $ivf_vitals_history_add->MaleInsvestications->displayValueSeparatorAttribute() ?>" id="x_MaleInsvestications" name="x_MaleInsvestications"<?php echo $ivf_vitals_history_add->MaleInsvestications->editAttributes() ?>>
			<?php echo $ivf_vitals_history_add->MaleInsvestications->selectOptionListHtml("x_MaleInsvestications") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_vitals_history_add->MaleInsvestications->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_MaleInsvestications" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_vitals_history_add->MaleInsvestications->caption() ?>" data-title="<?php echo $ivf_vitals_history_add->MaleInsvestications->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_MaleInsvestications',url:'ivf_mas_user_templateaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ivf_vitals_history_add->MaleInsvestications->Lookup->getParamTag($ivf_vitals_history_add, "p_x_MaleInsvestications") ?>
</span></script>
<?php echo $ivf_vitals_history_add->MaleInsvestications->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->TemplateMIMpression->Visible) { // TemplateMIMpression ?>
	<div id="r_TemplateMIMpression" class="form-group row">
		<label id="elh_ivf_vitals_history_TemplateMIMpression" for="x_TemplateMIMpression" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_TemplateMIMpression" type="text/html"><?php echo $ivf_vitals_history_add->TemplateMIMpression->caption() ?><?php echo $ivf_vitals_history_add->TemplateMIMpression->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->TemplateMIMpression->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_TemplateMIMpression" type="text/html"><span id="el_ivf_vitals_history_TemplateMIMpression">
<?php $ivf_vitals_history_add->TemplateMIMpression->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_TemplateMIMpression" data-value-separator="<?php echo $ivf_vitals_history_add->TemplateMIMpression->displayValueSeparatorAttribute() ?>" id="x_TemplateMIMpression" name="x_TemplateMIMpression"<?php echo $ivf_vitals_history_add->TemplateMIMpression->editAttributes() ?>>
			<?php echo $ivf_vitals_history_add->TemplateMIMpression->selectOptionListHtml("x_TemplateMIMpression") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_vitals_history_add->TemplateMIMpression->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateMIMpression" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_vitals_history_add->TemplateMIMpression->caption() ?>" data-title="<?php echo $ivf_vitals_history_add->TemplateMIMpression->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateMIMpression',url:'ivf_mas_user_templateaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ivf_vitals_history_add->TemplateMIMpression->Lookup->getParamTag($ivf_vitals_history_add, "p_x_TemplateMIMpression") ?>
</span></script>
<?php echo $ivf_vitals_history_add->TemplateMIMpression->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->TemplateMalePlanOfManagement->Visible) { // TemplateMalePlanOfManagement ?>
	<div id="r_TemplateMalePlanOfManagement" class="form-group row">
		<label id="elh_ivf_vitals_history_TemplateMalePlanOfManagement" for="x_TemplateMalePlanOfManagement" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_TemplateMalePlanOfManagement" type="text/html"><?php echo $ivf_vitals_history_add->TemplateMalePlanOfManagement->caption() ?><?php echo $ivf_vitals_history_add->TemplateMalePlanOfManagement->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->TemplateMalePlanOfManagement->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_TemplateMalePlanOfManagement" type="text/html"><span id="el_ivf_vitals_history_TemplateMalePlanOfManagement">
<?php $ivf_vitals_history_add->TemplateMalePlanOfManagement->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitals_history" data-field="x_TemplateMalePlanOfManagement" data-value-separator="<?php echo $ivf_vitals_history_add->TemplateMalePlanOfManagement->displayValueSeparatorAttribute() ?>" id="x_TemplateMalePlanOfManagement" name="x_TemplateMalePlanOfManagement"<?php echo $ivf_vitals_history_add->TemplateMalePlanOfManagement->editAttributes() ?>>
			<?php echo $ivf_vitals_history_add->TemplateMalePlanOfManagement->selectOptionListHtml("x_TemplateMalePlanOfManagement") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_vitals_history_add->TemplateMalePlanOfManagement->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateMalePlanOfManagement" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_vitals_history_add->TemplateMalePlanOfManagement->caption() ?>" data-title="<?php echo $ivf_vitals_history_add->TemplateMalePlanOfManagement->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateMalePlanOfManagement',url:'ivf_mas_user_templateaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ivf_vitals_history_add->TemplateMalePlanOfManagement->Lookup->getParamTag($ivf_vitals_history_add, "p_x_TemplateMalePlanOfManagement") ?>
</span></script>
<?php echo $ivf_vitals_history_add->TemplateMalePlanOfManagement->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label id="elh_ivf_vitals_history_TidNo" for="x_TidNo" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_TidNo" type="text/html"><?php echo $ivf_vitals_history_add->TidNo->caption() ?><?php echo $ivf_vitals_history_add->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->TidNo->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_TidNo" type="text/html"><span id="el_ivf_vitals_history_TidNo">
<input type="text" data-table="ivf_vitals_history" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_vitals_history_add->TidNo->EditValue ?>"<?php echo $ivf_vitals_history_add->TidNo->editAttributes() ?>>
</span></script>
<?php echo $ivf_vitals_history_add->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->pFamilyHistory->Visible) { // pFamilyHistory ?>
	<div id="r_pFamilyHistory" class="form-group row">
		<label id="elh_ivf_vitals_history_pFamilyHistory" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_pFamilyHistory" type="text/html"><?php echo $ivf_vitals_history_add->pFamilyHistory->caption() ?><?php echo $ivf_vitals_history_add->pFamilyHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->pFamilyHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_pFamilyHistory" type="text/html"><span id="el_ivf_vitals_history_pFamilyHistory">
<?php
$onchange = $ivf_vitals_history_add->pFamilyHistory->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$ivf_vitals_history_add->pFamilyHistory->EditAttrs["onchange"] = "";
?>
<span id="as_x_pFamilyHistory">
	<input type="text" class="form-control" name="sv_x_pFamilyHistory" id="sv_x_pFamilyHistory" value="<?php echo RemoveHtml($ivf_vitals_history_add->pFamilyHistory->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->pFamilyHistory->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->pFamilyHistory->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history_add->pFamilyHistory->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_pFamilyHistory" data-value-separator="<?php echo $ivf_vitals_history_add->pFamilyHistory->displayValueSeparatorAttribute() ?>" name="x_pFamilyHistory" id="x_pFamilyHistory" value="<?php echo HtmlEncode($ivf_vitals_history_add->pFamilyHistory->CurrentValue) ?>"<?php echo $onchange ?>>
<?php echo $ivf_vitals_history_add->pFamilyHistory->Lookup->getParamTag($ivf_vitals_history_add, "p_x_pFamilyHistory") ?>
</span></script>
<script type="text/html" class="ivf_vitals_historyadd_js">
loadjs.ready(["fivf_vitals_historyadd"], function() {
	fivf_vitals_historyadd.createAutoSuggest({"id":"x_pFamilyHistory","forceSelect":false});
});
</script>
<?php echo $ivf_vitals_history_add->pFamilyHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitals_history_add->pTemplateMedications->Visible) { // pTemplateMedications ?>
	<div id="r_pTemplateMedications" class="form-group row">
		<label id="elh_ivf_vitals_history_pTemplateMedications" class="<?php echo $ivf_vitals_history_add->LeftColumnClass ?>"><script id="tpc_ivf_vitals_history_pTemplateMedications" type="text/html"><?php echo $ivf_vitals_history_add->pTemplateMedications->caption() ?><?php echo $ivf_vitals_history_add->pTemplateMedications->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_vitals_history_add->RightColumnClass ?>"><div <?php echo $ivf_vitals_history_add->pTemplateMedications->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_pTemplateMedications" type="text/html"><span id="el_ivf_vitals_history_pTemplateMedications">
<?php $ivf_vitals_history_add->pTemplateMedications->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_pTemplateMedications" name="x_pTemplateMedications" id="x_pTemplateMedications" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_vitals_history_add->pTemplateMedications->getPlaceHolder()) ?>"<?php echo $ivf_vitals_history_add->pTemplateMedications->editAttributes() ?>><?php echo $ivf_vitals_history_add->pTemplateMedications->EditValue ?></textarea>
</span></script>
<script type="text/html" class="ivf_vitals_historyadd_js">
loadjs.ready(["fivf_vitals_historyadd", "editor"], function() {
	ew.createEditor("fivf_vitals_historyadd", "x_pTemplateMedications", 35, 4, <?php echo $ivf_vitals_history_add->pTemplateMedications->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
<?php echo $ivf_vitals_history_add->pTemplateMedications->CustomMsg ?></div></div>
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
{{include tmpl="#tpc_ivf_vitals_history_RIDNO"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_RIDNO")/}}
{{include tmpl="#tpc_ivf_vitals_history_Name"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_Name")/}}
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
			  				<tr><td>{{include tmpl="#tpc_ivf_vitals_history_Fheight"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_Fheight")/}} Cm.</td><td>{{include tmpl="#tpc_ivf_vitals_history_Fweight"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_Fweight")/}} Kg.</td></tr>
			  			</tbody>
			  		</table>
					<span class="ew-cell col-6">{{include tmpl="#tpc_ivf_vitals_history_FBMI"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_FBMI")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_IdentificationMark"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_IdentificationMark")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_FBuild"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_FBuild")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_FSkinColor"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_FSkinColor")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_FEyesColor"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_FEyesColor")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_FHairColor"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_FHairColor")/}}</span>
				  </div>
				<div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_MHairTexture"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_MHairTexture")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_Mothers"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_Mothers")/}}</span>
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
			  				<tr><td>{{include tmpl="#tpc_ivf_vitals_history_Mheight"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_Mheight")/}} Cm.</td><td>{{include tmpl="#tpc_ivf_vitals_history_Mweight"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_Mweight")/}} Kg.</td></tr>
			  			</tbody>
			  		</table>
					<span class="ew-cell col-6">{{include tmpl="#tpc_ivf_vitals_history_MBMI"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_MBMI")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_Address"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_Address")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_MBuild"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_MBuild")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_MSkinColor"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_MSkinColor")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_MEyesColor"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_MEyesColor")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_MhairColor"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_MhairColor")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_FhairTexture"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_FhairTexture")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_Fothers"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_Fothers")/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_MariedFor"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_MariedFor")/}}</span>
				  </div>
				  				 <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_CMNCM"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_CMNCM")/}}</span>
				  </div>
{{include tmpl="#tpc_ivf_vitals_history_Chiefcomplaints"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_Chiefcomplaints")/}}
  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_CoitalHistory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_CoitalHistory")/}}</span>
				  </div>
				  				 <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_FertilityTreatmentHistory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_FertilityTreatmentHistory")/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_MenstrualHistory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_MenstrualHistory")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_ObstetricHistory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_ObstetricHistory")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_MedicalHistory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_MedicalHistory")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_SurgeryHistory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_SurgeryHistory")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_FamilyHistory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_FamilyHistory")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_PInvestigations"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_PInvestigations")/}}</span>
				  </div>
					<div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_pTemplateMedications"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_pTemplateMedications")/}}</span>
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
						<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_Addictions"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_Addictions")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_Medical"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_Medical")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_Surgical"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_Surgical")/}}</span>
				  </div>
				<div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_pFamilyHistory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_pFamilyHistory")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_SemenAnalysis"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_SemenAnalysis")/}}</span>
				  </div>
				    <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_MInsvestications"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_MInsvestications")/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_Medications"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_Medications")/}}</span>
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
					<span class="ew-cell col-6">{{include tmpl="#tpc_ivf_vitals_history_PGE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_PGE")/}}</span>
					<span class="ew-cell col-6">{{include tmpl="#tpc_ivf_vitals_history_PPR"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_PPR")/}}</span>
					<span class="ew-cell col-6">{{include tmpl="#tpc_ivf_vitals_history_PBP"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_PBP")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_Breast"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_Breast")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_PPA"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_PPA")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_PPSV"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_PPSV")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_PPAPSMEAR"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_PPAPSMEAR")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_PTHYROID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_PTHYROID")/}}</span>
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
						<span class="ew-cell col-6">{{include tmpl="#tpc_ivf_vitals_history_MTHYROID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_MTHYROID")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_SecSexCharacters"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_SecSexCharacters")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_PenisUM"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_PenisUM")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_VAS"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_VAS")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_EPIDIDYMIS"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_EPIDIDYMIS")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_Varicocele"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_Varicocele")/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_PImpression"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_PImpression")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_PPlanOfManagement"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_PPlanOfManagement")/}}</span>
				  </div>
				 <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_PReadMore"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_PReadMore")/}}</span>
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
						<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_MIMpression"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_MIMpression")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_MPlanOfManagement"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_MPlanOfManagement")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_MReadMore"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_MReadMore")/}}</span>
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
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($ivf_vitals_history->Rows) ?> };
	ew.applyTemplate("tpd_ivf_vitals_historyadd", "tpm_ivf_vitals_historyadd", "ivf_vitals_historyadd", "<?php echo $ivf_vitals_history->CustomExport ?>", ew.templateData.rows[0]);
	$("script.ivf_vitals_historyadd_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$ivf_vitals_history_add->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	function calculateBmi(){var e=document.getElementById("x_Fweight").value,t=document.getElementById("x_Fheight").value;if(e>0&&t>0){var n=e/(t/100*t/100);(n=Math.round(1e3*n)/1e3)<18.5&&(n+=" Too Thin"),n>18.5&&n<25&&(n+=" Healthy"),n>25&&(n+=" Over Weight"),document.getElementById("x_FBMI").value=n}}function calculateBmiM(){var e=document.getElementById("x_Mweight").value,t=document.getElementById("x_Mheight").value;if(e>0&&t>0){var n=e/(t/100*t/100);(n=Math.round(1e3*n)/1e3)<18.5&&(n+=" Too Thin"),n>18.5&&n<25&&(n+=" Healthy"),n>25&&(n+=" Over Weight"),document.getElementById("x_MBMI").value=n}}function callSaveFunction(){document.getElementById("Repagehistoryview").value="EditFunction"}function callViewFunction(){document.getElementById("Repagehistoryview").value="ViewFunction"}function callNextFunction(){document.getElementById("Repagehistoryview").value="NextFunction"}function callHomeFunction(){document.getElementById("Repagehistoryview").value="HomeFunction"}document.getElementById("x_Fweight").style.width="80px",document.getElementById("x_Fheight").style.width="80px",document.getElementById("x_Mweight").style.width="80px",document.getElementById("x_Mheight").style.width="80px",$("#x_Fweight").change(function(){calculateBmi()}),$("#x_Fheight").change(function(){calculateBmi()}),$("#x_Mweight").change(function(){calculateBmiM()}),$("#x_Mheight").change(function(){calculateBmiM()});
});
</script>
<?php include_once "footer.php"; ?>
<?php
$ivf_vitals_history_add->terminate();
?>