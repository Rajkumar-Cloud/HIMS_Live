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
$ivf_stimulation_chart_delete = new ivf_stimulation_chart_delete();

// Run the page
$ivf_stimulation_chart_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_stimulation_chart_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fivf_stimulation_chartdelete = currentForm = new ew.Form("fivf_stimulation_chartdelete", "delete");

// Form_CustomValidate event
fivf_stimulation_chartdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_stimulation_chartdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_stimulation_chartdelete.lists["x_ARTCycle"] = <?php echo $ivf_stimulation_chart_delete->ARTCycle->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_ARTCycle"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->ARTCycle->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartdelete.lists["x_FemaleFactor"] = <?php echo $ivf_stimulation_chart_delete->FemaleFactor->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_FemaleFactor"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->FemaleFactor->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartdelete.lists["x_MaleFactor"] = <?php echo $ivf_stimulation_chart_delete->MaleFactor->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_MaleFactor"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->MaleFactor->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartdelete.lists["x_Protocol"] = <?php echo $ivf_stimulation_chart_delete->Protocol->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_Protocol"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->Protocol->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartdelete.lists["x_SemenFrozen"] = <?php echo $ivf_stimulation_chart_delete->SemenFrozen->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_SemenFrozen"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->SemenFrozen->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartdelete.lists["x_A4ICSICycle"] = <?php echo $ivf_stimulation_chart_delete->A4ICSICycle->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_A4ICSICycle"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->A4ICSICycle->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartdelete.lists["x_TotalICSICycle"] = <?php echo $ivf_stimulation_chart_delete->TotalICSICycle->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_TotalICSICycle"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->TotalICSICycle->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartdelete.lists["x_TypeOfInfertility"] = <?php echo $ivf_stimulation_chart_delete->TypeOfInfertility->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_TypeOfInfertility"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->TypeOfInfertility->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartdelete.lists["x_INJTYPE"] = <?php echo $ivf_stimulation_chart_delete->INJTYPE->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_INJTYPE"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->INJTYPE->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_ANTAGONISTSTARTDAY"] = <?php echo $ivf_stimulation_chart_delete->ANTAGONISTSTARTDAY->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_ANTAGONISTSTARTDAY"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->ANTAGONISTSTARTDAY->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartdelete.lists["x_PRETREATMENT"] = <?php echo $ivf_stimulation_chart_delete->PRETREATMENT->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_PRETREATMENT"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->PRETREATMENT->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartdelete.lists["x_MedicalFactors"] = <?php echo $ivf_stimulation_chart_delete->MedicalFactors->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_MedicalFactors"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->MedicalFactors->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartdelete.lists["x_TRIGGERR"] = <?php echo $ivf_stimulation_chart_delete->TRIGGERR->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_TRIGGERR"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->TRIGGERR->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_ATHOMEorCLINIC"] = <?php echo $ivf_stimulation_chart_delete->ATHOMEorCLINIC->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_ATHOMEorCLINIC"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->ATHOMEorCLINIC->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartdelete.lists["x_ALLFREEZEINDICATION"] = <?php echo $ivf_stimulation_chart_delete->ALLFREEZEINDICATION->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_ALLFREEZEINDICATION"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->ALLFREEZEINDICATION->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartdelete.lists["x_ERA"] = <?php echo $ivf_stimulation_chart_delete->ERA->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_ERA"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->ERA->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartdelete.lists["x_ET"] = <?php echo $ivf_stimulation_chart_delete->ET->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_ET"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->ET->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartdelete.lists["x_SEMENPREPARATION"] = <?php echo $ivf_stimulation_chart_delete->SEMENPREPARATION->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_SEMENPREPARATION"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->SEMENPREPARATION->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartdelete.lists["x_REASONFORESET"] = <?php echo $ivf_stimulation_chart_delete->REASONFORESET->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_REASONFORESET"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->REASONFORESET->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartdelete.lists["x_Tablet1"] = <?php echo $ivf_stimulation_chart_delete->Tablet1->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_Tablet1"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->Tablet1->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_Tablet2"] = <?php echo $ivf_stimulation_chart_delete->Tablet2->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_Tablet2"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->Tablet2->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_Tablet3"] = <?php echo $ivf_stimulation_chart_delete->Tablet3->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_Tablet3"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->Tablet3->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_Tablet4"] = <?php echo $ivf_stimulation_chart_delete->Tablet4->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_Tablet4"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->Tablet4->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_Tablet5"] = <?php echo $ivf_stimulation_chart_delete->Tablet5->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_Tablet5"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->Tablet5->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_Tablet6"] = <?php echo $ivf_stimulation_chart_delete->Tablet6->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_Tablet6"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->Tablet6->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_Tablet7"] = <?php echo $ivf_stimulation_chart_delete->Tablet7->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_Tablet7"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->Tablet7->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_Tablet8"] = <?php echo $ivf_stimulation_chart_delete->Tablet8->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_Tablet8"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->Tablet8->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_Tablet9"] = <?php echo $ivf_stimulation_chart_delete->Tablet9->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_Tablet9"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->Tablet9->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_Tablet10"] = <?php echo $ivf_stimulation_chart_delete->Tablet10->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_Tablet10"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->Tablet10->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_Tablet11"] = <?php echo $ivf_stimulation_chart_delete->Tablet11->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_Tablet11"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->Tablet11->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_Tablet12"] = <?php echo $ivf_stimulation_chart_delete->Tablet12->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_Tablet12"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->Tablet12->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_Tablet13"] = <?php echo $ivf_stimulation_chart_delete->Tablet13->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_Tablet13"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->Tablet13->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_RFSH1"] = <?php echo $ivf_stimulation_chart_delete->RFSH1->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_RFSH1"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->RFSH1->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_RFSH2"] = <?php echo $ivf_stimulation_chart_delete->RFSH2->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_RFSH2"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->RFSH2->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_RFSH3"] = <?php echo $ivf_stimulation_chart_delete->RFSH3->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_RFSH3"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->RFSH3->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_RFSH4"] = <?php echo $ivf_stimulation_chart_delete->RFSH4->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_RFSH4"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->RFSH4->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_RFSH5"] = <?php echo $ivf_stimulation_chart_delete->RFSH5->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_RFSH5"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->RFSH5->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_RFSH6"] = <?php echo $ivf_stimulation_chart_delete->RFSH6->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_RFSH6"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->RFSH6->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_RFSH7"] = <?php echo $ivf_stimulation_chart_delete->RFSH7->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_RFSH7"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->RFSH7->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_RFSH8"] = <?php echo $ivf_stimulation_chart_delete->RFSH8->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_RFSH8"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->RFSH8->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_RFSH9"] = <?php echo $ivf_stimulation_chart_delete->RFSH9->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_RFSH9"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->RFSH9->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_RFSH10"] = <?php echo $ivf_stimulation_chart_delete->RFSH10->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_RFSH10"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->RFSH10->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_RFSH11"] = <?php echo $ivf_stimulation_chart_delete->RFSH11->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_RFSH11"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->RFSH11->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_RFSH12"] = <?php echo $ivf_stimulation_chart_delete->RFSH12->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_RFSH12"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->RFSH12->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_RFSH13"] = <?php echo $ivf_stimulation_chart_delete->RFSH13->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_RFSH13"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->RFSH13->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_HMG1"] = <?php echo $ivf_stimulation_chart_delete->HMG1->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_HMG1"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->HMG1->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_HMG2"] = <?php echo $ivf_stimulation_chart_delete->HMG2->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_HMG2"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->HMG2->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_HMG3"] = <?php echo $ivf_stimulation_chart_delete->HMG3->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_HMG3"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->HMG3->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_HMG4"] = <?php echo $ivf_stimulation_chart_delete->HMG4->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_HMG4"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->HMG4->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_HMG5"] = <?php echo $ivf_stimulation_chart_delete->HMG5->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_HMG5"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->HMG5->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_HMG6"] = <?php echo $ivf_stimulation_chart_delete->HMG6->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_HMG6"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->HMG6->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_HMG7"] = <?php echo $ivf_stimulation_chart_delete->HMG7->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_HMG7"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->HMG7->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_HMG8"] = <?php echo $ivf_stimulation_chart_delete->HMG8->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_HMG8"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->HMG8->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_HMG9"] = <?php echo $ivf_stimulation_chart_delete->HMG9->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_HMG9"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->HMG9->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_HMG10"] = <?php echo $ivf_stimulation_chart_delete->HMG10->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_HMG10"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->HMG10->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_HMG11"] = <?php echo $ivf_stimulation_chart_delete->HMG11->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_HMG11"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->HMG11->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_HMG12"] = <?php echo $ivf_stimulation_chart_delete->HMG12->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_HMG12"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->HMG12->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_HMG13"] = <?php echo $ivf_stimulation_chart_delete->HMG13->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_HMG13"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->HMG13->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_GnRH1"] = <?php echo $ivf_stimulation_chart_delete->GnRH1->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_GnRH1"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->GnRH1->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_GnRH2"] = <?php echo $ivf_stimulation_chart_delete->GnRH2->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_GnRH2"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->GnRH2->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_GnRH3"] = <?php echo $ivf_stimulation_chart_delete->GnRH3->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_GnRH3"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->GnRH3->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_GnRH4"] = <?php echo $ivf_stimulation_chart_delete->GnRH4->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_GnRH4"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->GnRH4->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_GnRH5"] = <?php echo $ivf_stimulation_chart_delete->GnRH5->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_GnRH5"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->GnRH5->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_GnRH6"] = <?php echo $ivf_stimulation_chart_delete->GnRH6->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_GnRH6"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->GnRH6->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_GnRH7"] = <?php echo $ivf_stimulation_chart_delete->GnRH7->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_GnRH7"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->GnRH7->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_GnRH8"] = <?php echo $ivf_stimulation_chart_delete->GnRH8->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_GnRH8"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->GnRH8->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_GnRH9"] = <?php echo $ivf_stimulation_chart_delete->GnRH9->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_GnRH9"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->GnRH9->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_GnRH10"] = <?php echo $ivf_stimulation_chart_delete->GnRH10->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_GnRH10"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->GnRH10->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_GnRH11"] = <?php echo $ivf_stimulation_chart_delete->GnRH11->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_GnRH11"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->GnRH11->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_GnRH12"] = <?php echo $ivf_stimulation_chart_delete->GnRH12->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_GnRH12"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->GnRH12->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_GnRH13"] = <?php echo $ivf_stimulation_chart_delete->GnRH13->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_GnRH13"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->GnRH13->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_Convert[]"] = <?php echo $ivf_stimulation_chart_delete->Convert->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_Convert[]"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->Convert->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartdelete.lists["x_InseminatinTechnique"] = <?php echo $ivf_stimulation_chart_delete->InseminatinTechnique->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_InseminatinTechnique"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->InseminatinTechnique->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartdelete.lists["x_IndicationForART"] = <?php echo $ivf_stimulation_chart_delete->IndicationForART->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_IndicationForART"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->IndicationForART->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartdelete.lists["x_Hysteroscopy"] = <?php echo $ivf_stimulation_chart_delete->Hysteroscopy->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_Hysteroscopy"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->Hysteroscopy->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartdelete.lists["x_EndometrialScratching"] = <?php echo $ivf_stimulation_chart_delete->EndometrialScratching->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_EndometrialScratching"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->EndometrialScratching->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartdelete.lists["x_TrialCannulation"] = <?php echo $ivf_stimulation_chart_delete->TrialCannulation->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_TrialCannulation"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->TrialCannulation->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartdelete.lists["x_CYCLETYPE"] = <?php echo $ivf_stimulation_chart_delete->CYCLETYPE->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_CYCLETYPE"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->CYCLETYPE->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartdelete.lists["x_OralEstrogenDosage"] = <?php echo $ivf_stimulation_chart_delete->OralEstrogenDosage->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_OralEstrogenDosage"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->OralEstrogenDosage->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartdelete.lists["x_GCSF"] = <?php echo $ivf_stimulation_chart_delete->GCSF->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_GCSF"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->GCSF->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartdelete.lists["x_ActivatedPRP"] = <?php echo $ivf_stimulation_chart_delete->ActivatedPRP->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_ActivatedPRP"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->ActivatedPRP->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartdelete.lists["x_AllFreeze"] = <?php echo $ivf_stimulation_chart_delete->AllFreeze->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_AllFreeze"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->AllFreeze->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartdelete.lists["x_TreatmentCancel"] = <?php echo $ivf_stimulation_chart_delete->TreatmentCancel->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_TreatmentCancel"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->TreatmentCancel->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartdelete.lists["x_Tablet14"] = <?php echo $ivf_stimulation_chart_delete->Tablet14->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_Tablet14"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->Tablet14->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_Tablet15"] = <?php echo $ivf_stimulation_chart_delete->Tablet15->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_Tablet15"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->Tablet15->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_Tablet16"] = <?php echo $ivf_stimulation_chart_delete->Tablet16->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_Tablet16"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->Tablet16->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_Tablet17"] = <?php echo $ivf_stimulation_chart_delete->Tablet17->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_Tablet17"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->Tablet17->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_Tablet18"] = <?php echo $ivf_stimulation_chart_delete->Tablet18->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_Tablet18"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->Tablet18->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_Tablet19"] = <?php echo $ivf_stimulation_chart_delete->Tablet19->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_Tablet19"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->Tablet19->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_Tablet20"] = <?php echo $ivf_stimulation_chart_delete->Tablet20->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_Tablet20"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->Tablet20->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_Tablet21"] = <?php echo $ivf_stimulation_chart_delete->Tablet21->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_Tablet21"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->Tablet21->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_Tablet22"] = <?php echo $ivf_stimulation_chart_delete->Tablet22->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_Tablet22"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->Tablet22->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_Tablet23"] = <?php echo $ivf_stimulation_chart_delete->Tablet23->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_Tablet23"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->Tablet23->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_Tablet24"] = <?php echo $ivf_stimulation_chart_delete->Tablet24->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_Tablet24"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->Tablet24->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_Tablet25"] = <?php echo $ivf_stimulation_chart_delete->Tablet25->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_Tablet25"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->Tablet25->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_RFSH14"] = <?php echo $ivf_stimulation_chart_delete->RFSH14->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_RFSH14"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->RFSH14->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_RFSH15"] = <?php echo $ivf_stimulation_chart_delete->RFSH15->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_RFSH15"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->RFSH15->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_RFSH16"] = <?php echo $ivf_stimulation_chart_delete->RFSH16->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_RFSH16"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->RFSH16->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_RFSH17"] = <?php echo $ivf_stimulation_chart_delete->RFSH17->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_RFSH17"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->RFSH17->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_RFSH18"] = <?php echo $ivf_stimulation_chart_delete->RFSH18->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_RFSH18"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->RFSH18->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_RFSH19"] = <?php echo $ivf_stimulation_chart_delete->RFSH19->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_RFSH19"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->RFSH19->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_RFSH20"] = <?php echo $ivf_stimulation_chart_delete->RFSH20->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_RFSH20"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->RFSH20->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_RFSH21"] = <?php echo $ivf_stimulation_chart_delete->RFSH21->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_RFSH21"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->RFSH21->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_RFSH22"] = <?php echo $ivf_stimulation_chart_delete->RFSH22->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_RFSH22"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->RFSH22->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_RFSH23"] = <?php echo $ivf_stimulation_chart_delete->RFSH23->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_RFSH23"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->RFSH23->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_RFSH24"] = <?php echo $ivf_stimulation_chart_delete->RFSH24->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_RFSH24"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->RFSH24->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_RFSH25"] = <?php echo $ivf_stimulation_chart_delete->RFSH25->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_RFSH25"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->RFSH25->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_HMG14"] = <?php echo $ivf_stimulation_chart_delete->HMG14->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_HMG14"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->HMG14->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_HMG15"] = <?php echo $ivf_stimulation_chart_delete->HMG15->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_HMG15"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->HMG15->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_HMG16"] = <?php echo $ivf_stimulation_chart_delete->HMG16->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_HMG16"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->HMG16->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_HMG17"] = <?php echo $ivf_stimulation_chart_delete->HMG17->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_HMG17"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->HMG17->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_HMG18"] = <?php echo $ivf_stimulation_chart_delete->HMG18->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_HMG18"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->HMG18->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_HMG19"] = <?php echo $ivf_stimulation_chart_delete->HMG19->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_HMG19"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->HMG19->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_HMG20"] = <?php echo $ivf_stimulation_chart_delete->HMG20->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_HMG20"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->HMG20->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_HMG21"] = <?php echo $ivf_stimulation_chart_delete->HMG21->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_HMG21"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->HMG21->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_HMG22"] = <?php echo $ivf_stimulation_chart_delete->HMG22->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_HMG22"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->HMG22->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_HMG23"] = <?php echo $ivf_stimulation_chart_delete->HMG23->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_HMG23"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->HMG23->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_HMG24"] = <?php echo $ivf_stimulation_chart_delete->HMG24->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_HMG24"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->HMG24->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_HMG25"] = <?php echo $ivf_stimulation_chart_delete->HMG25->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_HMG25"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->HMG25->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_GnRH14"] = <?php echo $ivf_stimulation_chart_delete->GnRH14->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_GnRH14"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->GnRH14->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_GnRH15"] = <?php echo $ivf_stimulation_chart_delete->GnRH15->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_GnRH15"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->GnRH15->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_GnRH16"] = <?php echo $ivf_stimulation_chart_delete->GnRH16->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_GnRH16"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->GnRH16->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_GnRH17"] = <?php echo $ivf_stimulation_chart_delete->GnRH17->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_GnRH17"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->GnRH17->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_GnRH18"] = <?php echo $ivf_stimulation_chart_delete->GnRH18->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_GnRH18"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->GnRH18->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_GnRH19"] = <?php echo $ivf_stimulation_chart_delete->GnRH19->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_GnRH19"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->GnRH19->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_GnRH20"] = <?php echo $ivf_stimulation_chart_delete->GnRH20->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_GnRH20"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->GnRH20->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_GnRH21"] = <?php echo $ivf_stimulation_chart_delete->GnRH21->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_GnRH21"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->GnRH21->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_GnRH22"] = <?php echo $ivf_stimulation_chart_delete->GnRH22->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_GnRH22"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->GnRH22->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_GnRH23"] = <?php echo $ivf_stimulation_chart_delete->GnRH23->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_GnRH23"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->GnRH23->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_GnRH24"] = <?php echo $ivf_stimulation_chart_delete->GnRH24->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_GnRH24"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->GnRH24->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_GnRH25"] = <?php echo $ivf_stimulation_chart_delete->GnRH25->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_GnRH25"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->GnRH25->lookupOptions()) ?>;
fivf_stimulation_chartdelete.lists["x_TUBAL_PATENCY"] = <?php echo $ivf_stimulation_chart_delete->TUBAL_PATENCY->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_TUBAL_PATENCY"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->TUBAL_PATENCY->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartdelete.lists["x_HSG"] = <?php echo $ivf_stimulation_chart_delete->HSG->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_HSG"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->HSG->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartdelete.lists["x_DHL"] = <?php echo $ivf_stimulation_chart_delete->DHL->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_DHL"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->DHL->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartdelete.lists["x_UTERINE_PROBLEMS"] = <?php echo $ivf_stimulation_chart_delete->UTERINE_PROBLEMS->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_UTERINE_PROBLEMS"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->UTERINE_PROBLEMS->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartdelete.lists["x_W_COMORBIDS"] = <?php echo $ivf_stimulation_chart_delete->W_COMORBIDS->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_W_COMORBIDS"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->W_COMORBIDS->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartdelete.lists["x_H_COMORBIDS"] = <?php echo $ivf_stimulation_chart_delete->H_COMORBIDS->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_H_COMORBIDS"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->H_COMORBIDS->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartdelete.lists["x_SEXUAL_DYSFUNCTION"] = <?php echo $ivf_stimulation_chart_delete->SEXUAL_DYSFUNCTION->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_SEXUAL_DYSFUNCTION"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->SEXUAL_DYSFUNCTION->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartdelete.lists["x_FOLLICLE_STATUS"] = <?php echo $ivf_stimulation_chart_delete->FOLLICLE_STATUS->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_FOLLICLE_STATUS"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->FOLLICLE_STATUS->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartdelete.lists["x_NUMBER_OF_IUI"] = <?php echo $ivf_stimulation_chart_delete->NUMBER_OF_IUI->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_NUMBER_OF_IUI"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->NUMBER_OF_IUI->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartdelete.lists["x_PROCEDURE"] = <?php echo $ivf_stimulation_chart_delete->PROCEDURE->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_PROCEDURE"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->PROCEDURE->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartdelete.lists["x_LUTEAL_SUPPORT"] = <?php echo $ivf_stimulation_chart_delete->LUTEAL_SUPPORT->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_LUTEAL_SUPPORT"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->LUTEAL_SUPPORT->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartdelete.lists["x_SPECIFIC_MATERNAL_PROBLEMS"] = <?php echo $ivf_stimulation_chart_delete->SPECIFIC_MATERNAL_PROBLEMS->Lookup->toClientList() ?>;
fivf_stimulation_chartdelete.lists["x_SPECIFIC_MATERNAL_PROBLEMS"].options = <?php echo JsonEncode($ivf_stimulation_chart_delete->SPECIFIC_MATERNAL_PROBLEMS->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $ivf_stimulation_chart_delete->showPageHeader(); ?>
<?php
$ivf_stimulation_chart_delete->showMessage();
?>
<form name="fivf_stimulation_chartdelete" id="fivf_stimulation_chartdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_stimulation_chart_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_stimulation_chart_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_stimulation_chart">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($ivf_stimulation_chart_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($ivf_stimulation_chart->id->Visible) { // id ?>
		<th class="<?php echo $ivf_stimulation_chart->id->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_id" class="ivf_stimulation_chart_id"><?php echo $ivf_stimulation_chart->id->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->RIDNo->Visible) { // RIDNo ?>
		<th class="<?php echo $ivf_stimulation_chart->RIDNo->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RIDNo" class="ivf_stimulation_chart_RIDNo"><?php echo $ivf_stimulation_chart->RIDNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Name->Visible) { // Name ?>
		<th class="<?php echo $ivf_stimulation_chart->Name->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Name" class="ivf_stimulation_chart_Name"><?php echo $ivf_stimulation_chart->Name->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->ARTCycle->Visible) { // ARTCycle ?>
		<th class="<?php echo $ivf_stimulation_chart->ARTCycle->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_ARTCycle" class="ivf_stimulation_chart_ARTCycle"><?php echo $ivf_stimulation_chart->ARTCycle->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->FemaleFactor->Visible) { // FemaleFactor ?>
		<th class="<?php echo $ivf_stimulation_chart->FemaleFactor->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_FemaleFactor" class="ivf_stimulation_chart_FemaleFactor"><?php echo $ivf_stimulation_chart->FemaleFactor->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->MaleFactor->Visible) { // MaleFactor ?>
		<th class="<?php echo $ivf_stimulation_chart->MaleFactor->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_MaleFactor" class="ivf_stimulation_chart_MaleFactor"><?php echo $ivf_stimulation_chart->MaleFactor->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Protocol->Visible) { // Protocol ?>
		<th class="<?php echo $ivf_stimulation_chart->Protocol->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Protocol" class="ivf_stimulation_chart_Protocol"><?php echo $ivf_stimulation_chart->Protocol->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->SemenFrozen->Visible) { // SemenFrozen ?>
		<th class="<?php echo $ivf_stimulation_chart->SemenFrozen->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_SemenFrozen" class="ivf_stimulation_chart_SemenFrozen"><?php echo $ivf_stimulation_chart->SemenFrozen->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->A4ICSICycle->Visible) { // A4ICSICycle ?>
		<th class="<?php echo $ivf_stimulation_chart->A4ICSICycle->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_A4ICSICycle" class="ivf_stimulation_chart_A4ICSICycle"><?php echo $ivf_stimulation_chart->A4ICSICycle->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->TotalICSICycle->Visible) { // TotalICSICycle ?>
		<th class="<?php echo $ivf_stimulation_chart->TotalICSICycle->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_TotalICSICycle" class="ivf_stimulation_chart_TotalICSICycle"><?php echo $ivf_stimulation_chart->TotalICSICycle->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->TypeOfInfertility->Visible) { // TypeOfInfertility ?>
		<th class="<?php echo $ivf_stimulation_chart->TypeOfInfertility->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_TypeOfInfertility" class="ivf_stimulation_chart_TypeOfInfertility"><?php echo $ivf_stimulation_chart->TypeOfInfertility->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Duration->Visible) { // Duration ?>
		<th class="<?php echo $ivf_stimulation_chart->Duration->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Duration" class="ivf_stimulation_chart_Duration"><?php echo $ivf_stimulation_chart->Duration->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->LMP->Visible) { // LMP ?>
		<th class="<?php echo $ivf_stimulation_chart->LMP->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_LMP" class="ivf_stimulation_chart_LMP"><?php echo $ivf_stimulation_chart->LMP->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->RelevantHistory->Visible) { // RelevantHistory ?>
		<th class="<?php echo $ivf_stimulation_chart->RelevantHistory->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RelevantHistory" class="ivf_stimulation_chart_RelevantHistory"><?php echo $ivf_stimulation_chart->RelevantHistory->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->IUICycles->Visible) { // IUICycles ?>
		<th class="<?php echo $ivf_stimulation_chart->IUICycles->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_IUICycles" class="ivf_stimulation_chart_IUICycles"><?php echo $ivf_stimulation_chart->IUICycles->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->AFC->Visible) { // AFC ?>
		<th class="<?php echo $ivf_stimulation_chart->AFC->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_AFC" class="ivf_stimulation_chart_AFC"><?php echo $ivf_stimulation_chart->AFC->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->AMH->Visible) { // AMH ?>
		<th class="<?php echo $ivf_stimulation_chart->AMH->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_AMH" class="ivf_stimulation_chart_AMH"><?php echo $ivf_stimulation_chart->AMH->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->FBMI->Visible) { // FBMI ?>
		<th class="<?php echo $ivf_stimulation_chart->FBMI->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_FBMI" class="ivf_stimulation_chart_FBMI"><?php echo $ivf_stimulation_chart->FBMI->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->MBMI->Visible) { // MBMI ?>
		<th class="<?php echo $ivf_stimulation_chart->MBMI->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_MBMI" class="ivf_stimulation_chart_MBMI"><?php echo $ivf_stimulation_chart->MBMI->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->OvarianVolumeRT->Visible) { // OvarianVolumeRT ?>
		<th class="<?php echo $ivf_stimulation_chart->OvarianVolumeRT->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_OvarianVolumeRT" class="ivf_stimulation_chart_OvarianVolumeRT"><?php echo $ivf_stimulation_chart->OvarianVolumeRT->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->OvarianVolumeLT->Visible) { // OvarianVolumeLT ?>
		<th class="<?php echo $ivf_stimulation_chart->OvarianVolumeLT->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_OvarianVolumeLT" class="ivf_stimulation_chart_OvarianVolumeLT"><?php echo $ivf_stimulation_chart->OvarianVolumeLT->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->DAYSOFSTIMULATION->Visible) { // DAYSOFSTIMULATION ?>
		<th class="<?php echo $ivf_stimulation_chart->DAYSOFSTIMULATION->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DAYSOFSTIMULATION" class="ivf_stimulation_chart_DAYSOFSTIMULATION"><?php echo $ivf_stimulation_chart->DAYSOFSTIMULATION->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->DOSEOFGONADOTROPINS->Visible) { // DOSEOFGONADOTROPINS ?>
		<th class="<?php echo $ivf_stimulation_chart->DOSEOFGONADOTROPINS->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DOSEOFGONADOTROPINS" class="ivf_stimulation_chart_DOSEOFGONADOTROPINS"><?php echo $ivf_stimulation_chart->DOSEOFGONADOTROPINS->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->INJTYPE->Visible) { // INJTYPE ?>
		<th class="<?php echo $ivf_stimulation_chart->INJTYPE->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_INJTYPE" class="ivf_stimulation_chart_INJTYPE"><?php echo $ivf_stimulation_chart->INJTYPE->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->ANTAGONISTDAYS->Visible) { // ANTAGONISTDAYS ?>
		<th class="<?php echo $ivf_stimulation_chart->ANTAGONISTDAYS->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_ANTAGONISTDAYS" class="ivf_stimulation_chart_ANTAGONISTDAYS"><?php echo $ivf_stimulation_chart->ANTAGONISTDAYS->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->ANTAGONISTSTARTDAY->Visible) { // ANTAGONISTSTARTDAY ?>
		<th class="<?php echo $ivf_stimulation_chart->ANTAGONISTSTARTDAY->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_ANTAGONISTSTARTDAY" class="ivf_stimulation_chart_ANTAGONISTSTARTDAY"><?php echo $ivf_stimulation_chart->ANTAGONISTSTARTDAY->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->GROWTHHORMONE->Visible) { // GROWTHHORMONE ?>
		<th class="<?php echo $ivf_stimulation_chart->GROWTHHORMONE->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GROWTHHORMONE" class="ivf_stimulation_chart_GROWTHHORMONE"><?php echo $ivf_stimulation_chart->GROWTHHORMONE->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->PRETREATMENT->Visible) { // PRETREATMENT ?>
		<th class="<?php echo $ivf_stimulation_chart->PRETREATMENT->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_PRETREATMENT" class="ivf_stimulation_chart_PRETREATMENT"><?php echo $ivf_stimulation_chart->PRETREATMENT->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->SerumP4->Visible) { // SerumP4 ?>
		<th class="<?php echo $ivf_stimulation_chart->SerumP4->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_SerumP4" class="ivf_stimulation_chart_SerumP4"><?php echo $ivf_stimulation_chart->SerumP4->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->FORT->Visible) { // FORT ?>
		<th class="<?php echo $ivf_stimulation_chart->FORT->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_FORT" class="ivf_stimulation_chart_FORT"><?php echo $ivf_stimulation_chart->FORT->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->MedicalFactors->Visible) { // MedicalFactors ?>
		<th class="<?php echo $ivf_stimulation_chart->MedicalFactors->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_MedicalFactors" class="ivf_stimulation_chart_MedicalFactors"><?php echo $ivf_stimulation_chart->MedicalFactors->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->SCDate->Visible) { // SCDate ?>
		<th class="<?php echo $ivf_stimulation_chart->SCDate->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_SCDate" class="ivf_stimulation_chart_SCDate"><?php echo $ivf_stimulation_chart->SCDate->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->OvarianSurgery->Visible) { // OvarianSurgery ?>
		<th class="<?php echo $ivf_stimulation_chart->OvarianSurgery->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_OvarianSurgery" class="ivf_stimulation_chart_OvarianSurgery"><?php echo $ivf_stimulation_chart->OvarianSurgery->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->PreProcedureOrder->Visible) { // PreProcedureOrder ?>
		<th class="<?php echo $ivf_stimulation_chart->PreProcedureOrder->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_PreProcedureOrder" class="ivf_stimulation_chart_PreProcedureOrder"><?php echo $ivf_stimulation_chart->PreProcedureOrder->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->TRIGGERR->Visible) { // TRIGGERR ?>
		<th class="<?php echo $ivf_stimulation_chart->TRIGGERR->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_TRIGGERR" class="ivf_stimulation_chart_TRIGGERR"><?php echo $ivf_stimulation_chart->TRIGGERR->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->TRIGGERDATE->Visible) { // TRIGGERDATE ?>
		<th class="<?php echo $ivf_stimulation_chart->TRIGGERDATE->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_TRIGGERDATE" class="ivf_stimulation_chart_TRIGGERDATE"><?php echo $ivf_stimulation_chart->TRIGGERDATE->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->ATHOMEorCLINIC->Visible) { // ATHOMEorCLINIC ?>
		<th class="<?php echo $ivf_stimulation_chart->ATHOMEorCLINIC->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_ATHOMEorCLINIC" class="ivf_stimulation_chart_ATHOMEorCLINIC"><?php echo $ivf_stimulation_chart->ATHOMEorCLINIC->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->OPUDATE->Visible) { // OPUDATE ?>
		<th class="<?php echo $ivf_stimulation_chart->OPUDATE->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_OPUDATE" class="ivf_stimulation_chart_OPUDATE"><?php echo $ivf_stimulation_chart->OPUDATE->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->ALLFREEZEINDICATION->Visible) { // ALLFREEZEINDICATION ?>
		<th class="<?php echo $ivf_stimulation_chart->ALLFREEZEINDICATION->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_ALLFREEZEINDICATION" class="ivf_stimulation_chart_ALLFREEZEINDICATION"><?php echo $ivf_stimulation_chart->ALLFREEZEINDICATION->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->ERA->Visible) { // ERA ?>
		<th class="<?php echo $ivf_stimulation_chart->ERA->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_ERA" class="ivf_stimulation_chart_ERA"><?php echo $ivf_stimulation_chart->ERA->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->PGTA->Visible) { // PGTA ?>
		<th class="<?php echo $ivf_stimulation_chart->PGTA->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_PGTA" class="ivf_stimulation_chart_PGTA"><?php echo $ivf_stimulation_chart->PGTA->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->PGD->Visible) { // PGD ?>
		<th class="<?php echo $ivf_stimulation_chart->PGD->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_PGD" class="ivf_stimulation_chart_PGD"><?php echo $ivf_stimulation_chart->PGD->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->DATEOFET->Visible) { // DATEOFET ?>
		<th class="<?php echo $ivf_stimulation_chart->DATEOFET->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DATEOFET" class="ivf_stimulation_chart_DATEOFET"><?php echo $ivf_stimulation_chart->DATEOFET->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->ET->Visible) { // ET ?>
		<th class="<?php echo $ivf_stimulation_chart->ET->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_ET" class="ivf_stimulation_chart_ET"><?php echo $ivf_stimulation_chart->ET->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->ESET->Visible) { // ESET ?>
		<th class="<?php echo $ivf_stimulation_chart->ESET->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_ESET" class="ivf_stimulation_chart_ESET"><?php echo $ivf_stimulation_chart->ESET->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->DOET->Visible) { // DOET ?>
		<th class="<?php echo $ivf_stimulation_chart->DOET->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DOET" class="ivf_stimulation_chart_DOET"><?php echo $ivf_stimulation_chart->DOET->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->SEMENPREPARATION->Visible) { // SEMENPREPARATION ?>
		<th class="<?php echo $ivf_stimulation_chart->SEMENPREPARATION->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_SEMENPREPARATION" class="ivf_stimulation_chart_SEMENPREPARATION"><?php echo $ivf_stimulation_chart->SEMENPREPARATION->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->REASONFORESET->Visible) { // REASONFORESET ?>
		<th class="<?php echo $ivf_stimulation_chart->REASONFORESET->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_REASONFORESET" class="ivf_stimulation_chart_REASONFORESET"><?php echo $ivf_stimulation_chart->REASONFORESET->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Expectedoocytes->Visible) { // Expectedoocytes ?>
		<th class="<?php echo $ivf_stimulation_chart->Expectedoocytes->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Expectedoocytes" class="ivf_stimulation_chart_Expectedoocytes"><?php echo $ivf_stimulation_chart->Expectedoocytes->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate1->Visible) { // StChDate1 ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate1->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate1" class="ivf_stimulation_chart_StChDate1"><?php echo $ivf_stimulation_chart->StChDate1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate2->Visible) { // StChDate2 ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate2->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate2" class="ivf_stimulation_chart_StChDate2"><?php echo $ivf_stimulation_chart->StChDate2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate3->Visible) { // StChDate3 ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate3->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate3" class="ivf_stimulation_chart_StChDate3"><?php echo $ivf_stimulation_chart->StChDate3->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate4->Visible) { // StChDate4 ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate4->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate4" class="ivf_stimulation_chart_StChDate4"><?php echo $ivf_stimulation_chart->StChDate4->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate5->Visible) { // StChDate5 ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate5->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate5" class="ivf_stimulation_chart_StChDate5"><?php echo $ivf_stimulation_chart->StChDate5->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate6->Visible) { // StChDate6 ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate6->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate6" class="ivf_stimulation_chart_StChDate6"><?php echo $ivf_stimulation_chart->StChDate6->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate7->Visible) { // StChDate7 ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate7->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate7" class="ivf_stimulation_chart_StChDate7"><?php echo $ivf_stimulation_chart->StChDate7->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate8->Visible) { // StChDate8 ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate8->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate8" class="ivf_stimulation_chart_StChDate8"><?php echo $ivf_stimulation_chart->StChDate8->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate9->Visible) { // StChDate9 ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate9->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate9" class="ivf_stimulation_chart_StChDate9"><?php echo $ivf_stimulation_chart->StChDate9->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate10->Visible) { // StChDate10 ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate10->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate10" class="ivf_stimulation_chart_StChDate10"><?php echo $ivf_stimulation_chart->StChDate10->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate11->Visible) { // StChDate11 ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate11->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate11" class="ivf_stimulation_chart_StChDate11"><?php echo $ivf_stimulation_chart->StChDate11->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate12->Visible) { // StChDate12 ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate12->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate12" class="ivf_stimulation_chart_StChDate12"><?php echo $ivf_stimulation_chart->StChDate12->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate13->Visible) { // StChDate13 ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate13->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate13" class="ivf_stimulation_chart_StChDate13"><?php echo $ivf_stimulation_chart->StChDate13->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay1->Visible) { // CycleDay1 ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay1->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay1" class="ivf_stimulation_chart_CycleDay1"><?php echo $ivf_stimulation_chart->CycleDay1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay2->Visible) { // CycleDay2 ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay2->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay2" class="ivf_stimulation_chart_CycleDay2"><?php echo $ivf_stimulation_chart->CycleDay2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay3->Visible) { // CycleDay3 ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay3->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay3" class="ivf_stimulation_chart_CycleDay3"><?php echo $ivf_stimulation_chart->CycleDay3->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay4->Visible) { // CycleDay4 ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay4->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay4" class="ivf_stimulation_chart_CycleDay4"><?php echo $ivf_stimulation_chart->CycleDay4->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay5->Visible) { // CycleDay5 ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay5->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay5" class="ivf_stimulation_chart_CycleDay5"><?php echo $ivf_stimulation_chart->CycleDay5->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay6->Visible) { // CycleDay6 ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay6->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay6" class="ivf_stimulation_chart_CycleDay6"><?php echo $ivf_stimulation_chart->CycleDay6->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay7->Visible) { // CycleDay7 ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay7->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay7" class="ivf_stimulation_chart_CycleDay7"><?php echo $ivf_stimulation_chart->CycleDay7->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay8->Visible) { // CycleDay8 ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay8->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay8" class="ivf_stimulation_chart_CycleDay8"><?php echo $ivf_stimulation_chart->CycleDay8->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay9->Visible) { // CycleDay9 ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay9->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay9" class="ivf_stimulation_chart_CycleDay9"><?php echo $ivf_stimulation_chart->CycleDay9->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay10->Visible) { // CycleDay10 ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay10->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay10" class="ivf_stimulation_chart_CycleDay10"><?php echo $ivf_stimulation_chart->CycleDay10->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay11->Visible) { // CycleDay11 ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay11->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay11" class="ivf_stimulation_chart_CycleDay11"><?php echo $ivf_stimulation_chart->CycleDay11->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay12->Visible) { // CycleDay12 ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay12->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay12" class="ivf_stimulation_chart_CycleDay12"><?php echo $ivf_stimulation_chart->CycleDay12->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay13->Visible) { // CycleDay13 ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay13->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay13" class="ivf_stimulation_chart_CycleDay13"><?php echo $ivf_stimulation_chart->CycleDay13->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay1->Visible) { // StimulationDay1 ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay1->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay1" class="ivf_stimulation_chart_StimulationDay1"><?php echo $ivf_stimulation_chart->StimulationDay1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay2->Visible) { // StimulationDay2 ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay2->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay2" class="ivf_stimulation_chart_StimulationDay2"><?php echo $ivf_stimulation_chart->StimulationDay2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay3->Visible) { // StimulationDay3 ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay3->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay3" class="ivf_stimulation_chart_StimulationDay3"><?php echo $ivf_stimulation_chart->StimulationDay3->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay4->Visible) { // StimulationDay4 ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay4->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay4" class="ivf_stimulation_chart_StimulationDay4"><?php echo $ivf_stimulation_chart->StimulationDay4->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay5->Visible) { // StimulationDay5 ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay5->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay5" class="ivf_stimulation_chart_StimulationDay5"><?php echo $ivf_stimulation_chart->StimulationDay5->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay6->Visible) { // StimulationDay6 ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay6->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay6" class="ivf_stimulation_chart_StimulationDay6"><?php echo $ivf_stimulation_chart->StimulationDay6->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay7->Visible) { // StimulationDay7 ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay7->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay7" class="ivf_stimulation_chart_StimulationDay7"><?php echo $ivf_stimulation_chart->StimulationDay7->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay8->Visible) { // StimulationDay8 ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay8->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay8" class="ivf_stimulation_chart_StimulationDay8"><?php echo $ivf_stimulation_chart->StimulationDay8->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay9->Visible) { // StimulationDay9 ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay9->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay9" class="ivf_stimulation_chart_StimulationDay9"><?php echo $ivf_stimulation_chart->StimulationDay9->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay10->Visible) { // StimulationDay10 ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay10->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay10" class="ivf_stimulation_chart_StimulationDay10"><?php echo $ivf_stimulation_chart->StimulationDay10->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay11->Visible) { // StimulationDay11 ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay11->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay11" class="ivf_stimulation_chart_StimulationDay11"><?php echo $ivf_stimulation_chart->StimulationDay11->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay12->Visible) { // StimulationDay12 ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay12->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay12" class="ivf_stimulation_chart_StimulationDay12"><?php echo $ivf_stimulation_chart->StimulationDay12->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay13->Visible) { // StimulationDay13 ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay13->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay13" class="ivf_stimulation_chart_StimulationDay13"><?php echo $ivf_stimulation_chart->StimulationDay13->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet1->Visible) { // Tablet1 ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet1->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet1" class="ivf_stimulation_chart_Tablet1"><?php echo $ivf_stimulation_chart->Tablet1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet2->Visible) { // Tablet2 ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet2->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet2" class="ivf_stimulation_chart_Tablet2"><?php echo $ivf_stimulation_chart->Tablet2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet3->Visible) { // Tablet3 ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet3->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet3" class="ivf_stimulation_chart_Tablet3"><?php echo $ivf_stimulation_chart->Tablet3->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet4->Visible) { // Tablet4 ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet4->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet4" class="ivf_stimulation_chart_Tablet4"><?php echo $ivf_stimulation_chart->Tablet4->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet5->Visible) { // Tablet5 ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet5->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet5" class="ivf_stimulation_chart_Tablet5"><?php echo $ivf_stimulation_chart->Tablet5->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet6->Visible) { // Tablet6 ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet6->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet6" class="ivf_stimulation_chart_Tablet6"><?php echo $ivf_stimulation_chart->Tablet6->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet7->Visible) { // Tablet7 ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet7->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet7" class="ivf_stimulation_chart_Tablet7"><?php echo $ivf_stimulation_chart->Tablet7->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet8->Visible) { // Tablet8 ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet8->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet8" class="ivf_stimulation_chart_Tablet8"><?php echo $ivf_stimulation_chart->Tablet8->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet9->Visible) { // Tablet9 ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet9->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet9" class="ivf_stimulation_chart_Tablet9"><?php echo $ivf_stimulation_chart->Tablet9->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet10->Visible) { // Tablet10 ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet10->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet10" class="ivf_stimulation_chart_Tablet10"><?php echo $ivf_stimulation_chart->Tablet10->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet11->Visible) { // Tablet11 ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet11->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet11" class="ivf_stimulation_chart_Tablet11"><?php echo $ivf_stimulation_chart->Tablet11->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet12->Visible) { // Tablet12 ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet12->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet12" class="ivf_stimulation_chart_Tablet12"><?php echo $ivf_stimulation_chart->Tablet12->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet13->Visible) { // Tablet13 ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet13->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet13" class="ivf_stimulation_chart_Tablet13"><?php echo $ivf_stimulation_chart->Tablet13->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH1->Visible) { // RFSH1 ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH1->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH1" class="ivf_stimulation_chart_RFSH1"><?php echo $ivf_stimulation_chart->RFSH1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH2->Visible) { // RFSH2 ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH2->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH2" class="ivf_stimulation_chart_RFSH2"><?php echo $ivf_stimulation_chart->RFSH2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH3->Visible) { // RFSH3 ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH3->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH3" class="ivf_stimulation_chart_RFSH3"><?php echo $ivf_stimulation_chart->RFSH3->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH4->Visible) { // RFSH4 ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH4->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH4" class="ivf_stimulation_chart_RFSH4"><?php echo $ivf_stimulation_chart->RFSH4->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH5->Visible) { // RFSH5 ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH5->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH5" class="ivf_stimulation_chart_RFSH5"><?php echo $ivf_stimulation_chart->RFSH5->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH6->Visible) { // RFSH6 ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH6->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH6" class="ivf_stimulation_chart_RFSH6"><?php echo $ivf_stimulation_chart->RFSH6->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH7->Visible) { // RFSH7 ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH7->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH7" class="ivf_stimulation_chart_RFSH7"><?php echo $ivf_stimulation_chart->RFSH7->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH8->Visible) { // RFSH8 ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH8->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH8" class="ivf_stimulation_chart_RFSH8"><?php echo $ivf_stimulation_chart->RFSH8->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH9->Visible) { // RFSH9 ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH9->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH9" class="ivf_stimulation_chart_RFSH9"><?php echo $ivf_stimulation_chart->RFSH9->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH10->Visible) { // RFSH10 ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH10->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH10" class="ivf_stimulation_chart_RFSH10"><?php echo $ivf_stimulation_chart->RFSH10->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH11->Visible) { // RFSH11 ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH11->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH11" class="ivf_stimulation_chart_RFSH11"><?php echo $ivf_stimulation_chart->RFSH11->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH12->Visible) { // RFSH12 ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH12->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH12" class="ivf_stimulation_chart_RFSH12"><?php echo $ivf_stimulation_chart->RFSH12->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH13->Visible) { // RFSH13 ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH13->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH13" class="ivf_stimulation_chart_RFSH13"><?php echo $ivf_stimulation_chart->RFSH13->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG1->Visible) { // HMG1 ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG1->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG1" class="ivf_stimulation_chart_HMG1"><?php echo $ivf_stimulation_chart->HMG1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG2->Visible) { // HMG2 ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG2->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG2" class="ivf_stimulation_chart_HMG2"><?php echo $ivf_stimulation_chart->HMG2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG3->Visible) { // HMG3 ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG3->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG3" class="ivf_stimulation_chart_HMG3"><?php echo $ivf_stimulation_chart->HMG3->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG4->Visible) { // HMG4 ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG4->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG4" class="ivf_stimulation_chart_HMG4"><?php echo $ivf_stimulation_chart->HMG4->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG5->Visible) { // HMG5 ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG5->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG5" class="ivf_stimulation_chart_HMG5"><?php echo $ivf_stimulation_chart->HMG5->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG6->Visible) { // HMG6 ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG6->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG6" class="ivf_stimulation_chart_HMG6"><?php echo $ivf_stimulation_chart->HMG6->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG7->Visible) { // HMG7 ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG7->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG7" class="ivf_stimulation_chart_HMG7"><?php echo $ivf_stimulation_chart->HMG7->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG8->Visible) { // HMG8 ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG8->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG8" class="ivf_stimulation_chart_HMG8"><?php echo $ivf_stimulation_chart->HMG8->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG9->Visible) { // HMG9 ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG9->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG9" class="ivf_stimulation_chart_HMG9"><?php echo $ivf_stimulation_chart->HMG9->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG10->Visible) { // HMG10 ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG10->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG10" class="ivf_stimulation_chart_HMG10"><?php echo $ivf_stimulation_chart->HMG10->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG11->Visible) { // HMG11 ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG11->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG11" class="ivf_stimulation_chart_HMG11"><?php echo $ivf_stimulation_chart->HMG11->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG12->Visible) { // HMG12 ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG12->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG12" class="ivf_stimulation_chart_HMG12"><?php echo $ivf_stimulation_chart->HMG12->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG13->Visible) { // HMG13 ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG13->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG13" class="ivf_stimulation_chart_HMG13"><?php echo $ivf_stimulation_chart->HMG13->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH1->Visible) { // GnRH1 ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH1->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH1" class="ivf_stimulation_chart_GnRH1"><?php echo $ivf_stimulation_chart->GnRH1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH2->Visible) { // GnRH2 ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH2->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH2" class="ivf_stimulation_chart_GnRH2"><?php echo $ivf_stimulation_chart->GnRH2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH3->Visible) { // GnRH3 ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH3->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH3" class="ivf_stimulation_chart_GnRH3"><?php echo $ivf_stimulation_chart->GnRH3->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH4->Visible) { // GnRH4 ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH4->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH4" class="ivf_stimulation_chart_GnRH4"><?php echo $ivf_stimulation_chart->GnRH4->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH5->Visible) { // GnRH5 ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH5->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH5" class="ivf_stimulation_chart_GnRH5"><?php echo $ivf_stimulation_chart->GnRH5->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH6->Visible) { // GnRH6 ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH6->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH6" class="ivf_stimulation_chart_GnRH6"><?php echo $ivf_stimulation_chart->GnRH6->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH7->Visible) { // GnRH7 ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH7->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH7" class="ivf_stimulation_chart_GnRH7"><?php echo $ivf_stimulation_chart->GnRH7->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH8->Visible) { // GnRH8 ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH8->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH8" class="ivf_stimulation_chart_GnRH8"><?php echo $ivf_stimulation_chart->GnRH8->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH9->Visible) { // GnRH9 ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH9->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH9" class="ivf_stimulation_chart_GnRH9"><?php echo $ivf_stimulation_chart->GnRH9->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH10->Visible) { // GnRH10 ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH10->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH10" class="ivf_stimulation_chart_GnRH10"><?php echo $ivf_stimulation_chart->GnRH10->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH11->Visible) { // GnRH11 ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH11->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH11" class="ivf_stimulation_chart_GnRH11"><?php echo $ivf_stimulation_chart->GnRH11->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH12->Visible) { // GnRH12 ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH12->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH12" class="ivf_stimulation_chart_GnRH12"><?php echo $ivf_stimulation_chart->GnRH12->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH13->Visible) { // GnRH13 ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH13->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH13" class="ivf_stimulation_chart_GnRH13"><?php echo $ivf_stimulation_chart->GnRH13->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->E21->Visible) { // E21 ?>
		<th class="<?php echo $ivf_stimulation_chart->E21->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E21" class="ivf_stimulation_chart_E21"><?php echo $ivf_stimulation_chart->E21->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->E22->Visible) { // E22 ?>
		<th class="<?php echo $ivf_stimulation_chart->E22->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E22" class="ivf_stimulation_chart_E22"><?php echo $ivf_stimulation_chart->E22->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->E23->Visible) { // E23 ?>
		<th class="<?php echo $ivf_stimulation_chart->E23->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E23" class="ivf_stimulation_chart_E23"><?php echo $ivf_stimulation_chart->E23->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->E24->Visible) { // E24 ?>
		<th class="<?php echo $ivf_stimulation_chart->E24->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E24" class="ivf_stimulation_chart_E24"><?php echo $ivf_stimulation_chart->E24->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->E25->Visible) { // E25 ?>
		<th class="<?php echo $ivf_stimulation_chart->E25->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E25" class="ivf_stimulation_chart_E25"><?php echo $ivf_stimulation_chart->E25->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->E26->Visible) { // E26 ?>
		<th class="<?php echo $ivf_stimulation_chart->E26->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E26" class="ivf_stimulation_chart_E26"><?php echo $ivf_stimulation_chart->E26->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->E27->Visible) { // E27 ?>
		<th class="<?php echo $ivf_stimulation_chart->E27->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E27" class="ivf_stimulation_chart_E27"><?php echo $ivf_stimulation_chart->E27->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->E28->Visible) { // E28 ?>
		<th class="<?php echo $ivf_stimulation_chart->E28->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E28" class="ivf_stimulation_chart_E28"><?php echo $ivf_stimulation_chart->E28->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->E29->Visible) { // E29 ?>
		<th class="<?php echo $ivf_stimulation_chart->E29->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E29" class="ivf_stimulation_chart_E29"><?php echo $ivf_stimulation_chart->E29->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->E210->Visible) { // E210 ?>
		<th class="<?php echo $ivf_stimulation_chart->E210->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E210" class="ivf_stimulation_chart_E210"><?php echo $ivf_stimulation_chart->E210->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->E211->Visible) { // E211 ?>
		<th class="<?php echo $ivf_stimulation_chart->E211->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E211" class="ivf_stimulation_chart_E211"><?php echo $ivf_stimulation_chart->E211->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->E212->Visible) { // E212 ?>
		<th class="<?php echo $ivf_stimulation_chart->E212->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E212" class="ivf_stimulation_chart_E212"><?php echo $ivf_stimulation_chart->E212->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->E213->Visible) { // E213 ?>
		<th class="<?php echo $ivf_stimulation_chart->E213->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E213" class="ivf_stimulation_chart_E213"><?php echo $ivf_stimulation_chart->E213->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->P41->Visible) { // P41 ?>
		<th class="<?php echo $ivf_stimulation_chart->P41->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P41" class="ivf_stimulation_chart_P41"><?php echo $ivf_stimulation_chart->P41->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->P42->Visible) { // P42 ?>
		<th class="<?php echo $ivf_stimulation_chart->P42->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P42" class="ivf_stimulation_chart_P42"><?php echo $ivf_stimulation_chart->P42->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->P43->Visible) { // P43 ?>
		<th class="<?php echo $ivf_stimulation_chart->P43->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P43" class="ivf_stimulation_chart_P43"><?php echo $ivf_stimulation_chart->P43->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->P44->Visible) { // P44 ?>
		<th class="<?php echo $ivf_stimulation_chart->P44->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P44" class="ivf_stimulation_chart_P44"><?php echo $ivf_stimulation_chart->P44->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->P45->Visible) { // P45 ?>
		<th class="<?php echo $ivf_stimulation_chart->P45->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P45" class="ivf_stimulation_chart_P45"><?php echo $ivf_stimulation_chart->P45->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->P46->Visible) { // P46 ?>
		<th class="<?php echo $ivf_stimulation_chart->P46->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P46" class="ivf_stimulation_chart_P46"><?php echo $ivf_stimulation_chart->P46->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->P47->Visible) { // P47 ?>
		<th class="<?php echo $ivf_stimulation_chart->P47->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P47" class="ivf_stimulation_chart_P47"><?php echo $ivf_stimulation_chart->P47->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->P48->Visible) { // P48 ?>
		<th class="<?php echo $ivf_stimulation_chart->P48->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P48" class="ivf_stimulation_chart_P48"><?php echo $ivf_stimulation_chart->P48->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->P49->Visible) { // P49 ?>
		<th class="<?php echo $ivf_stimulation_chart->P49->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P49" class="ivf_stimulation_chart_P49"><?php echo $ivf_stimulation_chart->P49->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->P410->Visible) { // P410 ?>
		<th class="<?php echo $ivf_stimulation_chart->P410->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P410" class="ivf_stimulation_chart_P410"><?php echo $ivf_stimulation_chart->P410->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->P411->Visible) { // P411 ?>
		<th class="<?php echo $ivf_stimulation_chart->P411->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P411" class="ivf_stimulation_chart_P411"><?php echo $ivf_stimulation_chart->P411->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->P412->Visible) { // P412 ?>
		<th class="<?php echo $ivf_stimulation_chart->P412->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P412" class="ivf_stimulation_chart_P412"><?php echo $ivf_stimulation_chart->P412->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->P413->Visible) { // P413 ?>
		<th class="<?php echo $ivf_stimulation_chart->P413->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P413" class="ivf_stimulation_chart_P413"><?php echo $ivf_stimulation_chart->P413->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt1->Visible) { // USGRt1 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt1->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt1" class="ivf_stimulation_chart_USGRt1"><?php echo $ivf_stimulation_chart->USGRt1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt2->Visible) { // USGRt2 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt2->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt2" class="ivf_stimulation_chart_USGRt2"><?php echo $ivf_stimulation_chart->USGRt2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt3->Visible) { // USGRt3 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt3->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt3" class="ivf_stimulation_chart_USGRt3"><?php echo $ivf_stimulation_chart->USGRt3->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt4->Visible) { // USGRt4 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt4->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt4" class="ivf_stimulation_chart_USGRt4"><?php echo $ivf_stimulation_chart->USGRt4->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt5->Visible) { // USGRt5 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt5->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt5" class="ivf_stimulation_chart_USGRt5"><?php echo $ivf_stimulation_chart->USGRt5->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt6->Visible) { // USGRt6 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt6->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt6" class="ivf_stimulation_chart_USGRt6"><?php echo $ivf_stimulation_chart->USGRt6->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt7->Visible) { // USGRt7 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt7->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt7" class="ivf_stimulation_chart_USGRt7"><?php echo $ivf_stimulation_chart->USGRt7->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt8->Visible) { // USGRt8 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt8->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt8" class="ivf_stimulation_chart_USGRt8"><?php echo $ivf_stimulation_chart->USGRt8->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt9->Visible) { // USGRt9 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt9->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt9" class="ivf_stimulation_chart_USGRt9"><?php echo $ivf_stimulation_chart->USGRt9->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt10->Visible) { // USGRt10 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt10->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt10" class="ivf_stimulation_chart_USGRt10"><?php echo $ivf_stimulation_chart->USGRt10->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt11->Visible) { // USGRt11 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt11->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt11" class="ivf_stimulation_chart_USGRt11"><?php echo $ivf_stimulation_chart->USGRt11->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt12->Visible) { // USGRt12 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt12->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt12" class="ivf_stimulation_chart_USGRt12"><?php echo $ivf_stimulation_chart->USGRt12->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt13->Visible) { // USGRt13 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt13->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt13" class="ivf_stimulation_chart_USGRt13"><?php echo $ivf_stimulation_chart->USGRt13->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt1->Visible) { // USGLt1 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt1->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt1" class="ivf_stimulation_chart_USGLt1"><?php echo $ivf_stimulation_chart->USGLt1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt2->Visible) { // USGLt2 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt2->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt2" class="ivf_stimulation_chart_USGLt2"><?php echo $ivf_stimulation_chart->USGLt2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt3->Visible) { // USGLt3 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt3->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt3" class="ivf_stimulation_chart_USGLt3"><?php echo $ivf_stimulation_chart->USGLt3->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt4->Visible) { // USGLt4 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt4->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt4" class="ivf_stimulation_chart_USGLt4"><?php echo $ivf_stimulation_chart->USGLt4->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt5->Visible) { // USGLt5 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt5->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt5" class="ivf_stimulation_chart_USGLt5"><?php echo $ivf_stimulation_chart->USGLt5->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt6->Visible) { // USGLt6 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt6->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt6" class="ivf_stimulation_chart_USGLt6"><?php echo $ivf_stimulation_chart->USGLt6->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt7->Visible) { // USGLt7 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt7->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt7" class="ivf_stimulation_chart_USGLt7"><?php echo $ivf_stimulation_chart->USGLt7->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt8->Visible) { // USGLt8 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt8->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt8" class="ivf_stimulation_chart_USGLt8"><?php echo $ivf_stimulation_chart->USGLt8->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt9->Visible) { // USGLt9 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt9->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt9" class="ivf_stimulation_chart_USGLt9"><?php echo $ivf_stimulation_chart->USGLt9->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt10->Visible) { // USGLt10 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt10->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt10" class="ivf_stimulation_chart_USGLt10"><?php echo $ivf_stimulation_chart->USGLt10->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt11->Visible) { // USGLt11 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt11->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt11" class="ivf_stimulation_chart_USGLt11"><?php echo $ivf_stimulation_chart->USGLt11->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt12->Visible) { // USGLt12 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt12->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt12" class="ivf_stimulation_chart_USGLt12"><?php echo $ivf_stimulation_chart->USGLt12->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt13->Visible) { // USGLt13 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt13->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt13" class="ivf_stimulation_chart_USGLt13"><?php echo $ivf_stimulation_chart->USGLt13->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM1->Visible) { // EM1 ?>
		<th class="<?php echo $ivf_stimulation_chart->EM1->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM1" class="ivf_stimulation_chart_EM1"><?php echo $ivf_stimulation_chart->EM1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM2->Visible) { // EM2 ?>
		<th class="<?php echo $ivf_stimulation_chart->EM2->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM2" class="ivf_stimulation_chart_EM2"><?php echo $ivf_stimulation_chart->EM2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM3->Visible) { // EM3 ?>
		<th class="<?php echo $ivf_stimulation_chart->EM3->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM3" class="ivf_stimulation_chart_EM3"><?php echo $ivf_stimulation_chart->EM3->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM4->Visible) { // EM4 ?>
		<th class="<?php echo $ivf_stimulation_chart->EM4->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM4" class="ivf_stimulation_chart_EM4"><?php echo $ivf_stimulation_chart->EM4->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM5->Visible) { // EM5 ?>
		<th class="<?php echo $ivf_stimulation_chart->EM5->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM5" class="ivf_stimulation_chart_EM5"><?php echo $ivf_stimulation_chart->EM5->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM6->Visible) { // EM6 ?>
		<th class="<?php echo $ivf_stimulation_chart->EM6->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM6" class="ivf_stimulation_chart_EM6"><?php echo $ivf_stimulation_chart->EM6->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM7->Visible) { // EM7 ?>
		<th class="<?php echo $ivf_stimulation_chart->EM7->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM7" class="ivf_stimulation_chart_EM7"><?php echo $ivf_stimulation_chart->EM7->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM8->Visible) { // EM8 ?>
		<th class="<?php echo $ivf_stimulation_chart->EM8->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM8" class="ivf_stimulation_chart_EM8"><?php echo $ivf_stimulation_chart->EM8->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM9->Visible) { // EM9 ?>
		<th class="<?php echo $ivf_stimulation_chart->EM9->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM9" class="ivf_stimulation_chart_EM9"><?php echo $ivf_stimulation_chart->EM9->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM10->Visible) { // EM10 ?>
		<th class="<?php echo $ivf_stimulation_chart->EM10->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM10" class="ivf_stimulation_chart_EM10"><?php echo $ivf_stimulation_chart->EM10->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM11->Visible) { // EM11 ?>
		<th class="<?php echo $ivf_stimulation_chart->EM11->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM11" class="ivf_stimulation_chart_EM11"><?php echo $ivf_stimulation_chart->EM11->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM12->Visible) { // EM12 ?>
		<th class="<?php echo $ivf_stimulation_chart->EM12->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM12" class="ivf_stimulation_chart_EM12"><?php echo $ivf_stimulation_chart->EM12->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM13->Visible) { // EM13 ?>
		<th class="<?php echo $ivf_stimulation_chart->EM13->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM13" class="ivf_stimulation_chart_EM13"><?php echo $ivf_stimulation_chart->EM13->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others1->Visible) { // Others1 ?>
		<th class="<?php echo $ivf_stimulation_chart->Others1->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others1" class="ivf_stimulation_chart_Others1"><?php echo $ivf_stimulation_chart->Others1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others2->Visible) { // Others2 ?>
		<th class="<?php echo $ivf_stimulation_chart->Others2->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others2" class="ivf_stimulation_chart_Others2"><?php echo $ivf_stimulation_chart->Others2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others3->Visible) { // Others3 ?>
		<th class="<?php echo $ivf_stimulation_chart->Others3->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others3" class="ivf_stimulation_chart_Others3"><?php echo $ivf_stimulation_chart->Others3->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others4->Visible) { // Others4 ?>
		<th class="<?php echo $ivf_stimulation_chart->Others4->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others4" class="ivf_stimulation_chart_Others4"><?php echo $ivf_stimulation_chart->Others4->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others5->Visible) { // Others5 ?>
		<th class="<?php echo $ivf_stimulation_chart->Others5->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others5" class="ivf_stimulation_chart_Others5"><?php echo $ivf_stimulation_chart->Others5->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others6->Visible) { // Others6 ?>
		<th class="<?php echo $ivf_stimulation_chart->Others6->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others6" class="ivf_stimulation_chart_Others6"><?php echo $ivf_stimulation_chart->Others6->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others7->Visible) { // Others7 ?>
		<th class="<?php echo $ivf_stimulation_chart->Others7->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others7" class="ivf_stimulation_chart_Others7"><?php echo $ivf_stimulation_chart->Others7->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others8->Visible) { // Others8 ?>
		<th class="<?php echo $ivf_stimulation_chart->Others8->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others8" class="ivf_stimulation_chart_Others8"><?php echo $ivf_stimulation_chart->Others8->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others9->Visible) { // Others9 ?>
		<th class="<?php echo $ivf_stimulation_chart->Others9->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others9" class="ivf_stimulation_chart_Others9"><?php echo $ivf_stimulation_chart->Others9->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others10->Visible) { // Others10 ?>
		<th class="<?php echo $ivf_stimulation_chart->Others10->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others10" class="ivf_stimulation_chart_Others10"><?php echo $ivf_stimulation_chart->Others10->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others11->Visible) { // Others11 ?>
		<th class="<?php echo $ivf_stimulation_chart->Others11->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others11" class="ivf_stimulation_chart_Others11"><?php echo $ivf_stimulation_chart->Others11->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others12->Visible) { // Others12 ?>
		<th class="<?php echo $ivf_stimulation_chart->Others12->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others12" class="ivf_stimulation_chart_Others12"><?php echo $ivf_stimulation_chart->Others12->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others13->Visible) { // Others13 ?>
		<th class="<?php echo $ivf_stimulation_chart->Others13->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others13" class="ivf_stimulation_chart_Others13"><?php echo $ivf_stimulation_chart->Others13->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR1->Visible) { // DR1 ?>
		<th class="<?php echo $ivf_stimulation_chart->DR1->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR1" class="ivf_stimulation_chart_DR1"><?php echo $ivf_stimulation_chart->DR1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR2->Visible) { // DR2 ?>
		<th class="<?php echo $ivf_stimulation_chart->DR2->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR2" class="ivf_stimulation_chart_DR2"><?php echo $ivf_stimulation_chart->DR2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR3->Visible) { // DR3 ?>
		<th class="<?php echo $ivf_stimulation_chart->DR3->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR3" class="ivf_stimulation_chart_DR3"><?php echo $ivf_stimulation_chart->DR3->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR4->Visible) { // DR4 ?>
		<th class="<?php echo $ivf_stimulation_chart->DR4->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR4" class="ivf_stimulation_chart_DR4"><?php echo $ivf_stimulation_chart->DR4->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR5->Visible) { // DR5 ?>
		<th class="<?php echo $ivf_stimulation_chart->DR5->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR5" class="ivf_stimulation_chart_DR5"><?php echo $ivf_stimulation_chart->DR5->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR6->Visible) { // DR6 ?>
		<th class="<?php echo $ivf_stimulation_chart->DR6->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR6" class="ivf_stimulation_chart_DR6"><?php echo $ivf_stimulation_chart->DR6->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR7->Visible) { // DR7 ?>
		<th class="<?php echo $ivf_stimulation_chart->DR7->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR7" class="ivf_stimulation_chart_DR7"><?php echo $ivf_stimulation_chart->DR7->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR8->Visible) { // DR8 ?>
		<th class="<?php echo $ivf_stimulation_chart->DR8->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR8" class="ivf_stimulation_chart_DR8"><?php echo $ivf_stimulation_chart->DR8->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR9->Visible) { // DR9 ?>
		<th class="<?php echo $ivf_stimulation_chart->DR9->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR9" class="ivf_stimulation_chart_DR9"><?php echo $ivf_stimulation_chart->DR9->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR10->Visible) { // DR10 ?>
		<th class="<?php echo $ivf_stimulation_chart->DR10->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR10" class="ivf_stimulation_chart_DR10"><?php echo $ivf_stimulation_chart->DR10->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR11->Visible) { // DR11 ?>
		<th class="<?php echo $ivf_stimulation_chart->DR11->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR11" class="ivf_stimulation_chart_DR11"><?php echo $ivf_stimulation_chart->DR11->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR12->Visible) { // DR12 ?>
		<th class="<?php echo $ivf_stimulation_chart->DR12->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR12" class="ivf_stimulation_chart_DR12"><?php echo $ivf_stimulation_chart->DR12->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR13->Visible) { // DR13 ?>
		<th class="<?php echo $ivf_stimulation_chart->DR13->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR13" class="ivf_stimulation_chart_DR13"><?php echo $ivf_stimulation_chart->DR13->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->TidNo->Visible) { // TidNo ?>
		<th class="<?php echo $ivf_stimulation_chart->TidNo->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_TidNo" class="ivf_stimulation_chart_TidNo"><?php echo $ivf_stimulation_chart->TidNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Convert->Visible) { // Convert ?>
		<th class="<?php echo $ivf_stimulation_chart->Convert->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Convert" class="ivf_stimulation_chart_Convert"><?php echo $ivf_stimulation_chart->Convert->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Consultant->Visible) { // Consultant ?>
		<th class="<?php echo $ivf_stimulation_chart->Consultant->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Consultant" class="ivf_stimulation_chart_Consultant"><?php echo $ivf_stimulation_chart->Consultant->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
		<th class="<?php echo $ivf_stimulation_chart->InseminatinTechnique->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_InseminatinTechnique" class="ivf_stimulation_chart_InseminatinTechnique"><?php echo $ivf_stimulation_chart->InseminatinTechnique->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->IndicationForART->Visible) { // IndicationForART ?>
		<th class="<?php echo $ivf_stimulation_chart->IndicationForART->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_IndicationForART" class="ivf_stimulation_chart_IndicationForART"><?php echo $ivf_stimulation_chart->IndicationForART->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Hysteroscopy->Visible) { // Hysteroscopy ?>
		<th class="<?php echo $ivf_stimulation_chart->Hysteroscopy->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Hysteroscopy" class="ivf_stimulation_chart_Hysteroscopy"><?php echo $ivf_stimulation_chart->Hysteroscopy->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->EndometrialScratching->Visible) { // EndometrialScratching ?>
		<th class="<?php echo $ivf_stimulation_chart->EndometrialScratching->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EndometrialScratching" class="ivf_stimulation_chart_EndometrialScratching"><?php echo $ivf_stimulation_chart->EndometrialScratching->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->TrialCannulation->Visible) { // TrialCannulation ?>
		<th class="<?php echo $ivf_stimulation_chart->TrialCannulation->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_TrialCannulation" class="ivf_stimulation_chart_TrialCannulation"><?php echo $ivf_stimulation_chart->TrialCannulation->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->CYCLETYPE->Visible) { // CYCLETYPE ?>
		<th class="<?php echo $ivf_stimulation_chart->CYCLETYPE->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CYCLETYPE" class="ivf_stimulation_chart_CYCLETYPE"><?php echo $ivf_stimulation_chart->CYCLETYPE->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->HRTCYCLE->Visible) { // HRTCYCLE ?>
		<th class="<?php echo $ivf_stimulation_chart->HRTCYCLE->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HRTCYCLE" class="ivf_stimulation_chart_HRTCYCLE"><?php echo $ivf_stimulation_chart->HRTCYCLE->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
		<th class="<?php echo $ivf_stimulation_chart->OralEstrogenDosage->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_OralEstrogenDosage" class="ivf_stimulation_chart_OralEstrogenDosage"><?php echo $ivf_stimulation_chart->OralEstrogenDosage->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
		<th class="<?php echo $ivf_stimulation_chart->VaginalEstrogen->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_VaginalEstrogen" class="ivf_stimulation_chart_VaginalEstrogen"><?php echo $ivf_stimulation_chart->VaginalEstrogen->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->GCSF->Visible) { // GCSF ?>
		<th class="<?php echo $ivf_stimulation_chart->GCSF->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GCSF" class="ivf_stimulation_chart_GCSF"><?php echo $ivf_stimulation_chart->GCSF->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->ActivatedPRP->Visible) { // ActivatedPRP ?>
		<th class="<?php echo $ivf_stimulation_chart->ActivatedPRP->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_ActivatedPRP" class="ivf_stimulation_chart_ActivatedPRP"><?php echo $ivf_stimulation_chart->ActivatedPRP->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->UCLcm->Visible) { // UCLcm ?>
		<th class="<?php echo $ivf_stimulation_chart->UCLcm->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_UCLcm" class="ivf_stimulation_chart_UCLcm"><?php echo $ivf_stimulation_chart->UCLcm->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->DATOFEMBRYOTRANSFER->Visible) { // DATOFEMBRYOTRANSFER ?>
		<th class="<?php echo $ivf_stimulation_chart->DATOFEMBRYOTRANSFER->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DATOFEMBRYOTRANSFER" class="ivf_stimulation_chart_DATOFEMBRYOTRANSFER"><?php echo $ivf_stimulation_chart->DATOFEMBRYOTRANSFER->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
		<th class="<?php echo $ivf_stimulation_chart->DAYOFEMBRYOTRANSFER->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DAYOFEMBRYOTRANSFER" class="ivf_stimulation_chart_DAYOFEMBRYOTRANSFER"><?php echo $ivf_stimulation_chart->DAYOFEMBRYOTRANSFER->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
		<th class="<?php echo $ivf_stimulation_chart->NOOFEMBRYOSTHAWED->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_NOOFEMBRYOSTHAWED" class="ivf_stimulation_chart_NOOFEMBRYOSTHAWED"><?php echo $ivf_stimulation_chart->NOOFEMBRYOSTHAWED->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
		<th class="<?php echo $ivf_stimulation_chart->NOOFEMBRYOSTRANSFERRED->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED" class="ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED"><?php echo $ivf_stimulation_chart->NOOFEMBRYOSTRANSFERRED->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
		<th class="<?php echo $ivf_stimulation_chart->DAYOFEMBRYOS->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DAYOFEMBRYOS" class="ivf_stimulation_chart_DAYOFEMBRYOS"><?php echo $ivf_stimulation_chart->DAYOFEMBRYOS->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
		<th class="<?php echo $ivf_stimulation_chart->CRYOPRESERVEDEMBRYOS->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS" class="ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS"><?php echo $ivf_stimulation_chart->CRYOPRESERVEDEMBRYOS->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->ViaAdmin->Visible) { // ViaAdmin ?>
		<th class="<?php echo $ivf_stimulation_chart->ViaAdmin->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_ViaAdmin" class="ivf_stimulation_chart_ViaAdmin"><?php echo $ivf_stimulation_chart->ViaAdmin->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->ViaStartDateTime->Visible) { // ViaStartDateTime ?>
		<th class="<?php echo $ivf_stimulation_chart->ViaStartDateTime->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_ViaStartDateTime" class="ivf_stimulation_chart_ViaStartDateTime"><?php echo $ivf_stimulation_chart->ViaStartDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->ViaDose->Visible) { // ViaDose ?>
		<th class="<?php echo $ivf_stimulation_chart->ViaDose->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_ViaDose" class="ivf_stimulation_chart_ViaDose"><?php echo $ivf_stimulation_chart->ViaDose->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->AllFreeze->Visible) { // AllFreeze ?>
		<th class="<?php echo $ivf_stimulation_chart->AllFreeze->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_AllFreeze" class="ivf_stimulation_chart_AllFreeze"><?php echo $ivf_stimulation_chart->AllFreeze->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->TreatmentCancel->Visible) { // TreatmentCancel ?>
		<th class="<?php echo $ivf_stimulation_chart->TreatmentCancel->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_TreatmentCancel" class="ivf_stimulation_chart_TreatmentCancel"><?php echo $ivf_stimulation_chart->TreatmentCancel->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->ProgesteroneAdmin->Visible) { // ProgesteroneAdmin ?>
		<th class="<?php echo $ivf_stimulation_chart->ProgesteroneAdmin->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_ProgesteroneAdmin" class="ivf_stimulation_chart_ProgesteroneAdmin"><?php echo $ivf_stimulation_chart->ProgesteroneAdmin->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->ProgesteroneStart->Visible) { // ProgesteroneStart ?>
		<th class="<?php echo $ivf_stimulation_chart->ProgesteroneStart->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_ProgesteroneStart" class="ivf_stimulation_chart_ProgesteroneStart"><?php echo $ivf_stimulation_chart->ProgesteroneStart->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->ProgesteroneDose->Visible) { // ProgesteroneDose ?>
		<th class="<?php echo $ivf_stimulation_chart->ProgesteroneDose->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_ProgesteroneDose" class="ivf_stimulation_chart_ProgesteroneDose"><?php echo $ivf_stimulation_chart->ProgesteroneDose->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate14->Visible) { // StChDate14 ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate14->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate14" class="ivf_stimulation_chart_StChDate14"><?php echo $ivf_stimulation_chart->StChDate14->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate15->Visible) { // StChDate15 ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate15->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate15" class="ivf_stimulation_chart_StChDate15"><?php echo $ivf_stimulation_chart->StChDate15->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate16->Visible) { // StChDate16 ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate16->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate16" class="ivf_stimulation_chart_StChDate16"><?php echo $ivf_stimulation_chart->StChDate16->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate17->Visible) { // StChDate17 ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate17->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate17" class="ivf_stimulation_chart_StChDate17"><?php echo $ivf_stimulation_chart->StChDate17->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate18->Visible) { // StChDate18 ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate18->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate18" class="ivf_stimulation_chart_StChDate18"><?php echo $ivf_stimulation_chart->StChDate18->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate19->Visible) { // StChDate19 ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate19->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate19" class="ivf_stimulation_chart_StChDate19"><?php echo $ivf_stimulation_chart->StChDate19->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate20->Visible) { // StChDate20 ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate20->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate20" class="ivf_stimulation_chart_StChDate20"><?php echo $ivf_stimulation_chart->StChDate20->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate21->Visible) { // StChDate21 ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate21->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate21" class="ivf_stimulation_chart_StChDate21"><?php echo $ivf_stimulation_chart->StChDate21->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate22->Visible) { // StChDate22 ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate22->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate22" class="ivf_stimulation_chart_StChDate22"><?php echo $ivf_stimulation_chart->StChDate22->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate23->Visible) { // StChDate23 ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate23->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate23" class="ivf_stimulation_chart_StChDate23"><?php echo $ivf_stimulation_chart->StChDate23->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate24->Visible) { // StChDate24 ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate24->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate24" class="ivf_stimulation_chart_StChDate24"><?php echo $ivf_stimulation_chart->StChDate24->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate25->Visible) { // StChDate25 ?>
		<th class="<?php echo $ivf_stimulation_chart->StChDate25->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate25" class="ivf_stimulation_chart_StChDate25"><?php echo $ivf_stimulation_chart->StChDate25->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay14->Visible) { // CycleDay14 ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay14->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay14" class="ivf_stimulation_chart_CycleDay14"><?php echo $ivf_stimulation_chart->CycleDay14->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay15->Visible) { // CycleDay15 ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay15->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay15" class="ivf_stimulation_chart_CycleDay15"><?php echo $ivf_stimulation_chart->CycleDay15->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay16->Visible) { // CycleDay16 ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay16->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay16" class="ivf_stimulation_chart_CycleDay16"><?php echo $ivf_stimulation_chart->CycleDay16->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay17->Visible) { // CycleDay17 ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay17->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay17" class="ivf_stimulation_chart_CycleDay17"><?php echo $ivf_stimulation_chart->CycleDay17->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay18->Visible) { // CycleDay18 ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay18->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay18" class="ivf_stimulation_chart_CycleDay18"><?php echo $ivf_stimulation_chart->CycleDay18->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay19->Visible) { // CycleDay19 ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay19->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay19" class="ivf_stimulation_chart_CycleDay19"><?php echo $ivf_stimulation_chart->CycleDay19->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay20->Visible) { // CycleDay20 ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay20->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay20" class="ivf_stimulation_chart_CycleDay20"><?php echo $ivf_stimulation_chart->CycleDay20->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay21->Visible) { // CycleDay21 ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay21->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay21" class="ivf_stimulation_chart_CycleDay21"><?php echo $ivf_stimulation_chart->CycleDay21->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay22->Visible) { // CycleDay22 ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay22->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay22" class="ivf_stimulation_chart_CycleDay22"><?php echo $ivf_stimulation_chart->CycleDay22->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay23->Visible) { // CycleDay23 ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay23->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay23" class="ivf_stimulation_chart_CycleDay23"><?php echo $ivf_stimulation_chart->CycleDay23->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay24->Visible) { // CycleDay24 ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay24->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay24" class="ivf_stimulation_chart_CycleDay24"><?php echo $ivf_stimulation_chart->CycleDay24->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay25->Visible) { // CycleDay25 ?>
		<th class="<?php echo $ivf_stimulation_chart->CycleDay25->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay25" class="ivf_stimulation_chart_CycleDay25"><?php echo $ivf_stimulation_chart->CycleDay25->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay14->Visible) { // StimulationDay14 ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay14->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay14" class="ivf_stimulation_chart_StimulationDay14"><?php echo $ivf_stimulation_chart->StimulationDay14->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay15->Visible) { // StimulationDay15 ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay15->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay15" class="ivf_stimulation_chart_StimulationDay15"><?php echo $ivf_stimulation_chart->StimulationDay15->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay16->Visible) { // StimulationDay16 ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay16->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay16" class="ivf_stimulation_chart_StimulationDay16"><?php echo $ivf_stimulation_chart->StimulationDay16->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay17->Visible) { // StimulationDay17 ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay17->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay17" class="ivf_stimulation_chart_StimulationDay17"><?php echo $ivf_stimulation_chart->StimulationDay17->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay18->Visible) { // StimulationDay18 ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay18->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay18" class="ivf_stimulation_chart_StimulationDay18"><?php echo $ivf_stimulation_chart->StimulationDay18->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay19->Visible) { // StimulationDay19 ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay19->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay19" class="ivf_stimulation_chart_StimulationDay19"><?php echo $ivf_stimulation_chart->StimulationDay19->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay20->Visible) { // StimulationDay20 ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay20->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay20" class="ivf_stimulation_chart_StimulationDay20"><?php echo $ivf_stimulation_chart->StimulationDay20->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay21->Visible) { // StimulationDay21 ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay21->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay21" class="ivf_stimulation_chart_StimulationDay21"><?php echo $ivf_stimulation_chart->StimulationDay21->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay22->Visible) { // StimulationDay22 ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay22->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay22" class="ivf_stimulation_chart_StimulationDay22"><?php echo $ivf_stimulation_chart->StimulationDay22->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay23->Visible) { // StimulationDay23 ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay23->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay23" class="ivf_stimulation_chart_StimulationDay23"><?php echo $ivf_stimulation_chart->StimulationDay23->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay24->Visible) { // StimulationDay24 ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay24->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay24" class="ivf_stimulation_chart_StimulationDay24"><?php echo $ivf_stimulation_chart->StimulationDay24->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay25->Visible) { // StimulationDay25 ?>
		<th class="<?php echo $ivf_stimulation_chart->StimulationDay25->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay25" class="ivf_stimulation_chart_StimulationDay25"><?php echo $ivf_stimulation_chart->StimulationDay25->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet14->Visible) { // Tablet14 ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet14->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet14" class="ivf_stimulation_chart_Tablet14"><?php echo $ivf_stimulation_chart->Tablet14->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet15->Visible) { // Tablet15 ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet15->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet15" class="ivf_stimulation_chart_Tablet15"><?php echo $ivf_stimulation_chart->Tablet15->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet16->Visible) { // Tablet16 ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet16->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet16" class="ivf_stimulation_chart_Tablet16"><?php echo $ivf_stimulation_chart->Tablet16->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet17->Visible) { // Tablet17 ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet17->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet17" class="ivf_stimulation_chart_Tablet17"><?php echo $ivf_stimulation_chart->Tablet17->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet18->Visible) { // Tablet18 ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet18->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet18" class="ivf_stimulation_chart_Tablet18"><?php echo $ivf_stimulation_chart->Tablet18->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet19->Visible) { // Tablet19 ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet19->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet19" class="ivf_stimulation_chart_Tablet19"><?php echo $ivf_stimulation_chart->Tablet19->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet20->Visible) { // Tablet20 ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet20->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet20" class="ivf_stimulation_chart_Tablet20"><?php echo $ivf_stimulation_chart->Tablet20->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet21->Visible) { // Tablet21 ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet21->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet21" class="ivf_stimulation_chart_Tablet21"><?php echo $ivf_stimulation_chart->Tablet21->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet22->Visible) { // Tablet22 ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet22->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet22" class="ivf_stimulation_chart_Tablet22"><?php echo $ivf_stimulation_chart->Tablet22->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet23->Visible) { // Tablet23 ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet23->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet23" class="ivf_stimulation_chart_Tablet23"><?php echo $ivf_stimulation_chart->Tablet23->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet24->Visible) { // Tablet24 ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet24->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet24" class="ivf_stimulation_chart_Tablet24"><?php echo $ivf_stimulation_chart->Tablet24->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet25->Visible) { // Tablet25 ?>
		<th class="<?php echo $ivf_stimulation_chart->Tablet25->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet25" class="ivf_stimulation_chart_Tablet25"><?php echo $ivf_stimulation_chart->Tablet25->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH14->Visible) { // RFSH14 ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH14->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH14" class="ivf_stimulation_chart_RFSH14"><?php echo $ivf_stimulation_chart->RFSH14->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH15->Visible) { // RFSH15 ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH15->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH15" class="ivf_stimulation_chart_RFSH15"><?php echo $ivf_stimulation_chart->RFSH15->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH16->Visible) { // RFSH16 ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH16->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH16" class="ivf_stimulation_chart_RFSH16"><?php echo $ivf_stimulation_chart->RFSH16->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH17->Visible) { // RFSH17 ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH17->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH17" class="ivf_stimulation_chart_RFSH17"><?php echo $ivf_stimulation_chart->RFSH17->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH18->Visible) { // RFSH18 ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH18->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH18" class="ivf_stimulation_chart_RFSH18"><?php echo $ivf_stimulation_chart->RFSH18->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH19->Visible) { // RFSH19 ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH19->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH19" class="ivf_stimulation_chart_RFSH19"><?php echo $ivf_stimulation_chart->RFSH19->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH20->Visible) { // RFSH20 ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH20->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH20" class="ivf_stimulation_chart_RFSH20"><?php echo $ivf_stimulation_chart->RFSH20->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH21->Visible) { // RFSH21 ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH21->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH21" class="ivf_stimulation_chart_RFSH21"><?php echo $ivf_stimulation_chart->RFSH21->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH22->Visible) { // RFSH22 ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH22->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH22" class="ivf_stimulation_chart_RFSH22"><?php echo $ivf_stimulation_chart->RFSH22->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH23->Visible) { // RFSH23 ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH23->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH23" class="ivf_stimulation_chart_RFSH23"><?php echo $ivf_stimulation_chart->RFSH23->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH24->Visible) { // RFSH24 ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH24->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH24" class="ivf_stimulation_chart_RFSH24"><?php echo $ivf_stimulation_chart->RFSH24->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH25->Visible) { // RFSH25 ?>
		<th class="<?php echo $ivf_stimulation_chart->RFSH25->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH25" class="ivf_stimulation_chart_RFSH25"><?php echo $ivf_stimulation_chart->RFSH25->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG14->Visible) { // HMG14 ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG14->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG14" class="ivf_stimulation_chart_HMG14"><?php echo $ivf_stimulation_chart->HMG14->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG15->Visible) { // HMG15 ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG15->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG15" class="ivf_stimulation_chart_HMG15"><?php echo $ivf_stimulation_chart->HMG15->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG16->Visible) { // HMG16 ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG16->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG16" class="ivf_stimulation_chart_HMG16"><?php echo $ivf_stimulation_chart->HMG16->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG17->Visible) { // HMG17 ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG17->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG17" class="ivf_stimulation_chart_HMG17"><?php echo $ivf_stimulation_chart->HMG17->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG18->Visible) { // HMG18 ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG18->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG18" class="ivf_stimulation_chart_HMG18"><?php echo $ivf_stimulation_chart->HMG18->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG19->Visible) { // HMG19 ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG19->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG19" class="ivf_stimulation_chart_HMG19"><?php echo $ivf_stimulation_chart->HMG19->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG20->Visible) { // HMG20 ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG20->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG20" class="ivf_stimulation_chart_HMG20"><?php echo $ivf_stimulation_chart->HMG20->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG21->Visible) { // HMG21 ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG21->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG21" class="ivf_stimulation_chart_HMG21"><?php echo $ivf_stimulation_chart->HMG21->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG22->Visible) { // HMG22 ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG22->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG22" class="ivf_stimulation_chart_HMG22"><?php echo $ivf_stimulation_chart->HMG22->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG23->Visible) { // HMG23 ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG23->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG23" class="ivf_stimulation_chart_HMG23"><?php echo $ivf_stimulation_chart->HMG23->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG24->Visible) { // HMG24 ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG24->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG24" class="ivf_stimulation_chart_HMG24"><?php echo $ivf_stimulation_chart->HMG24->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG25->Visible) { // HMG25 ?>
		<th class="<?php echo $ivf_stimulation_chart->HMG25->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG25" class="ivf_stimulation_chart_HMG25"><?php echo $ivf_stimulation_chart->HMG25->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH14->Visible) { // GnRH14 ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH14->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH14" class="ivf_stimulation_chart_GnRH14"><?php echo $ivf_stimulation_chart->GnRH14->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH15->Visible) { // GnRH15 ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH15->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH15" class="ivf_stimulation_chart_GnRH15"><?php echo $ivf_stimulation_chart->GnRH15->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH16->Visible) { // GnRH16 ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH16->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH16" class="ivf_stimulation_chart_GnRH16"><?php echo $ivf_stimulation_chart->GnRH16->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH17->Visible) { // GnRH17 ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH17->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH17" class="ivf_stimulation_chart_GnRH17"><?php echo $ivf_stimulation_chart->GnRH17->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH18->Visible) { // GnRH18 ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH18->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH18" class="ivf_stimulation_chart_GnRH18"><?php echo $ivf_stimulation_chart->GnRH18->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH19->Visible) { // GnRH19 ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH19->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH19" class="ivf_stimulation_chart_GnRH19"><?php echo $ivf_stimulation_chart->GnRH19->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH20->Visible) { // GnRH20 ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH20->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH20" class="ivf_stimulation_chart_GnRH20"><?php echo $ivf_stimulation_chart->GnRH20->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH21->Visible) { // GnRH21 ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH21->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH21" class="ivf_stimulation_chart_GnRH21"><?php echo $ivf_stimulation_chart->GnRH21->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH22->Visible) { // GnRH22 ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH22->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH22" class="ivf_stimulation_chart_GnRH22"><?php echo $ivf_stimulation_chart->GnRH22->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH23->Visible) { // GnRH23 ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH23->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH23" class="ivf_stimulation_chart_GnRH23"><?php echo $ivf_stimulation_chart->GnRH23->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH24->Visible) { // GnRH24 ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH24->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH24" class="ivf_stimulation_chart_GnRH24"><?php echo $ivf_stimulation_chart->GnRH24->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH25->Visible) { // GnRH25 ?>
		<th class="<?php echo $ivf_stimulation_chart->GnRH25->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH25" class="ivf_stimulation_chart_GnRH25"><?php echo $ivf_stimulation_chart->GnRH25->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->P414->Visible) { // P414 ?>
		<th class="<?php echo $ivf_stimulation_chart->P414->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P414" class="ivf_stimulation_chart_P414"><?php echo $ivf_stimulation_chart->P414->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->P415->Visible) { // P415 ?>
		<th class="<?php echo $ivf_stimulation_chart->P415->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P415" class="ivf_stimulation_chart_P415"><?php echo $ivf_stimulation_chart->P415->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->P416->Visible) { // P416 ?>
		<th class="<?php echo $ivf_stimulation_chart->P416->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P416" class="ivf_stimulation_chart_P416"><?php echo $ivf_stimulation_chart->P416->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->P417->Visible) { // P417 ?>
		<th class="<?php echo $ivf_stimulation_chart->P417->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P417" class="ivf_stimulation_chart_P417"><?php echo $ivf_stimulation_chart->P417->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->P418->Visible) { // P418 ?>
		<th class="<?php echo $ivf_stimulation_chart->P418->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P418" class="ivf_stimulation_chart_P418"><?php echo $ivf_stimulation_chart->P418->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->P419->Visible) { // P419 ?>
		<th class="<?php echo $ivf_stimulation_chart->P419->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P419" class="ivf_stimulation_chart_P419"><?php echo $ivf_stimulation_chart->P419->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->P420->Visible) { // P420 ?>
		<th class="<?php echo $ivf_stimulation_chart->P420->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P420" class="ivf_stimulation_chart_P420"><?php echo $ivf_stimulation_chart->P420->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->P421->Visible) { // P421 ?>
		<th class="<?php echo $ivf_stimulation_chart->P421->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P421" class="ivf_stimulation_chart_P421"><?php echo $ivf_stimulation_chart->P421->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->P422->Visible) { // P422 ?>
		<th class="<?php echo $ivf_stimulation_chart->P422->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P422" class="ivf_stimulation_chart_P422"><?php echo $ivf_stimulation_chart->P422->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->P423->Visible) { // P423 ?>
		<th class="<?php echo $ivf_stimulation_chart->P423->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P423" class="ivf_stimulation_chart_P423"><?php echo $ivf_stimulation_chart->P423->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->P424->Visible) { // P424 ?>
		<th class="<?php echo $ivf_stimulation_chart->P424->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P424" class="ivf_stimulation_chart_P424"><?php echo $ivf_stimulation_chart->P424->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->P425->Visible) { // P425 ?>
		<th class="<?php echo $ivf_stimulation_chart->P425->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P425" class="ivf_stimulation_chart_P425"><?php echo $ivf_stimulation_chart->P425->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt14->Visible) { // USGRt14 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt14->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt14" class="ivf_stimulation_chart_USGRt14"><?php echo $ivf_stimulation_chart->USGRt14->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt15->Visible) { // USGRt15 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt15->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt15" class="ivf_stimulation_chart_USGRt15"><?php echo $ivf_stimulation_chart->USGRt15->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt16->Visible) { // USGRt16 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt16->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt16" class="ivf_stimulation_chart_USGRt16"><?php echo $ivf_stimulation_chart->USGRt16->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt17->Visible) { // USGRt17 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt17->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt17" class="ivf_stimulation_chart_USGRt17"><?php echo $ivf_stimulation_chart->USGRt17->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt18->Visible) { // USGRt18 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt18->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt18" class="ivf_stimulation_chart_USGRt18"><?php echo $ivf_stimulation_chart->USGRt18->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt19->Visible) { // USGRt19 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt19->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt19" class="ivf_stimulation_chart_USGRt19"><?php echo $ivf_stimulation_chart->USGRt19->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt20->Visible) { // USGRt20 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt20->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt20" class="ivf_stimulation_chart_USGRt20"><?php echo $ivf_stimulation_chart->USGRt20->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt21->Visible) { // USGRt21 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt21->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt21" class="ivf_stimulation_chart_USGRt21"><?php echo $ivf_stimulation_chart->USGRt21->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt22->Visible) { // USGRt22 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt22->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt22" class="ivf_stimulation_chart_USGRt22"><?php echo $ivf_stimulation_chart->USGRt22->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt23->Visible) { // USGRt23 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt23->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt23" class="ivf_stimulation_chart_USGRt23"><?php echo $ivf_stimulation_chart->USGRt23->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt24->Visible) { // USGRt24 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt24->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt24" class="ivf_stimulation_chart_USGRt24"><?php echo $ivf_stimulation_chart->USGRt24->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt25->Visible) { // USGRt25 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGRt25->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt25" class="ivf_stimulation_chart_USGRt25"><?php echo $ivf_stimulation_chart->USGRt25->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt14->Visible) { // USGLt14 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt14->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt14" class="ivf_stimulation_chart_USGLt14"><?php echo $ivf_stimulation_chart->USGLt14->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt15->Visible) { // USGLt15 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt15->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt15" class="ivf_stimulation_chart_USGLt15"><?php echo $ivf_stimulation_chart->USGLt15->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt16->Visible) { // USGLt16 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt16->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt16" class="ivf_stimulation_chart_USGLt16"><?php echo $ivf_stimulation_chart->USGLt16->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt17->Visible) { // USGLt17 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt17->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt17" class="ivf_stimulation_chart_USGLt17"><?php echo $ivf_stimulation_chart->USGLt17->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt18->Visible) { // USGLt18 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt18->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt18" class="ivf_stimulation_chart_USGLt18"><?php echo $ivf_stimulation_chart->USGLt18->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt19->Visible) { // USGLt19 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt19->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt19" class="ivf_stimulation_chart_USGLt19"><?php echo $ivf_stimulation_chart->USGLt19->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt20->Visible) { // USGLt20 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt20->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt20" class="ivf_stimulation_chart_USGLt20"><?php echo $ivf_stimulation_chart->USGLt20->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt21->Visible) { // USGLt21 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt21->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt21" class="ivf_stimulation_chart_USGLt21"><?php echo $ivf_stimulation_chart->USGLt21->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt22->Visible) { // USGLt22 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt22->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt22" class="ivf_stimulation_chart_USGLt22"><?php echo $ivf_stimulation_chart->USGLt22->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt23->Visible) { // USGLt23 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt23->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt23" class="ivf_stimulation_chart_USGLt23"><?php echo $ivf_stimulation_chart->USGLt23->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt24->Visible) { // USGLt24 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt24->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt24" class="ivf_stimulation_chart_USGLt24"><?php echo $ivf_stimulation_chart->USGLt24->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt25->Visible) { // USGLt25 ?>
		<th class="<?php echo $ivf_stimulation_chart->USGLt25->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt25" class="ivf_stimulation_chart_USGLt25"><?php echo $ivf_stimulation_chart->USGLt25->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM14->Visible) { // EM14 ?>
		<th class="<?php echo $ivf_stimulation_chart->EM14->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM14" class="ivf_stimulation_chart_EM14"><?php echo $ivf_stimulation_chart->EM14->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM15->Visible) { // EM15 ?>
		<th class="<?php echo $ivf_stimulation_chart->EM15->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM15" class="ivf_stimulation_chart_EM15"><?php echo $ivf_stimulation_chart->EM15->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM16->Visible) { // EM16 ?>
		<th class="<?php echo $ivf_stimulation_chart->EM16->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM16" class="ivf_stimulation_chart_EM16"><?php echo $ivf_stimulation_chart->EM16->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM17->Visible) { // EM17 ?>
		<th class="<?php echo $ivf_stimulation_chart->EM17->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM17" class="ivf_stimulation_chart_EM17"><?php echo $ivf_stimulation_chart->EM17->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM18->Visible) { // EM18 ?>
		<th class="<?php echo $ivf_stimulation_chart->EM18->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM18" class="ivf_stimulation_chart_EM18"><?php echo $ivf_stimulation_chart->EM18->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM19->Visible) { // EM19 ?>
		<th class="<?php echo $ivf_stimulation_chart->EM19->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM19" class="ivf_stimulation_chart_EM19"><?php echo $ivf_stimulation_chart->EM19->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM20->Visible) { // EM20 ?>
		<th class="<?php echo $ivf_stimulation_chart->EM20->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM20" class="ivf_stimulation_chart_EM20"><?php echo $ivf_stimulation_chart->EM20->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM21->Visible) { // EM21 ?>
		<th class="<?php echo $ivf_stimulation_chart->EM21->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM21" class="ivf_stimulation_chart_EM21"><?php echo $ivf_stimulation_chart->EM21->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM22->Visible) { // EM22 ?>
		<th class="<?php echo $ivf_stimulation_chart->EM22->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM22" class="ivf_stimulation_chart_EM22"><?php echo $ivf_stimulation_chart->EM22->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM23->Visible) { // EM23 ?>
		<th class="<?php echo $ivf_stimulation_chart->EM23->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM23" class="ivf_stimulation_chart_EM23"><?php echo $ivf_stimulation_chart->EM23->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM24->Visible) { // EM24 ?>
		<th class="<?php echo $ivf_stimulation_chart->EM24->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM24" class="ivf_stimulation_chart_EM24"><?php echo $ivf_stimulation_chart->EM24->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM25->Visible) { // EM25 ?>
		<th class="<?php echo $ivf_stimulation_chart->EM25->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM25" class="ivf_stimulation_chart_EM25"><?php echo $ivf_stimulation_chart->EM25->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others14->Visible) { // Others14 ?>
		<th class="<?php echo $ivf_stimulation_chart->Others14->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others14" class="ivf_stimulation_chart_Others14"><?php echo $ivf_stimulation_chart->Others14->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others15->Visible) { // Others15 ?>
		<th class="<?php echo $ivf_stimulation_chart->Others15->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others15" class="ivf_stimulation_chart_Others15"><?php echo $ivf_stimulation_chart->Others15->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others16->Visible) { // Others16 ?>
		<th class="<?php echo $ivf_stimulation_chart->Others16->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others16" class="ivf_stimulation_chart_Others16"><?php echo $ivf_stimulation_chart->Others16->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others17->Visible) { // Others17 ?>
		<th class="<?php echo $ivf_stimulation_chart->Others17->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others17" class="ivf_stimulation_chart_Others17"><?php echo $ivf_stimulation_chart->Others17->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others18->Visible) { // Others18 ?>
		<th class="<?php echo $ivf_stimulation_chart->Others18->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others18" class="ivf_stimulation_chart_Others18"><?php echo $ivf_stimulation_chart->Others18->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others19->Visible) { // Others19 ?>
		<th class="<?php echo $ivf_stimulation_chart->Others19->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others19" class="ivf_stimulation_chart_Others19"><?php echo $ivf_stimulation_chart->Others19->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others20->Visible) { // Others20 ?>
		<th class="<?php echo $ivf_stimulation_chart->Others20->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others20" class="ivf_stimulation_chart_Others20"><?php echo $ivf_stimulation_chart->Others20->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others21->Visible) { // Others21 ?>
		<th class="<?php echo $ivf_stimulation_chart->Others21->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others21" class="ivf_stimulation_chart_Others21"><?php echo $ivf_stimulation_chart->Others21->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others22->Visible) { // Others22 ?>
		<th class="<?php echo $ivf_stimulation_chart->Others22->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others22" class="ivf_stimulation_chart_Others22"><?php echo $ivf_stimulation_chart->Others22->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others23->Visible) { // Others23 ?>
		<th class="<?php echo $ivf_stimulation_chart->Others23->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others23" class="ivf_stimulation_chart_Others23"><?php echo $ivf_stimulation_chart->Others23->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others24->Visible) { // Others24 ?>
		<th class="<?php echo $ivf_stimulation_chart->Others24->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others24" class="ivf_stimulation_chart_Others24"><?php echo $ivf_stimulation_chart->Others24->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others25->Visible) { // Others25 ?>
		<th class="<?php echo $ivf_stimulation_chart->Others25->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others25" class="ivf_stimulation_chart_Others25"><?php echo $ivf_stimulation_chart->Others25->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR14->Visible) { // DR14 ?>
		<th class="<?php echo $ivf_stimulation_chart->DR14->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR14" class="ivf_stimulation_chart_DR14"><?php echo $ivf_stimulation_chart->DR14->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR15->Visible) { // DR15 ?>
		<th class="<?php echo $ivf_stimulation_chart->DR15->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR15" class="ivf_stimulation_chart_DR15"><?php echo $ivf_stimulation_chart->DR15->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR16->Visible) { // DR16 ?>
		<th class="<?php echo $ivf_stimulation_chart->DR16->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR16" class="ivf_stimulation_chart_DR16"><?php echo $ivf_stimulation_chart->DR16->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR17->Visible) { // DR17 ?>
		<th class="<?php echo $ivf_stimulation_chart->DR17->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR17" class="ivf_stimulation_chart_DR17"><?php echo $ivf_stimulation_chart->DR17->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR18->Visible) { // DR18 ?>
		<th class="<?php echo $ivf_stimulation_chart->DR18->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR18" class="ivf_stimulation_chart_DR18"><?php echo $ivf_stimulation_chart->DR18->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR19->Visible) { // DR19 ?>
		<th class="<?php echo $ivf_stimulation_chart->DR19->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR19" class="ivf_stimulation_chart_DR19"><?php echo $ivf_stimulation_chart->DR19->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR20->Visible) { // DR20 ?>
		<th class="<?php echo $ivf_stimulation_chart->DR20->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR20" class="ivf_stimulation_chart_DR20"><?php echo $ivf_stimulation_chart->DR20->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR21->Visible) { // DR21 ?>
		<th class="<?php echo $ivf_stimulation_chart->DR21->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR21" class="ivf_stimulation_chart_DR21"><?php echo $ivf_stimulation_chart->DR21->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR22->Visible) { // DR22 ?>
		<th class="<?php echo $ivf_stimulation_chart->DR22->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR22" class="ivf_stimulation_chart_DR22"><?php echo $ivf_stimulation_chart->DR22->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR23->Visible) { // DR23 ?>
		<th class="<?php echo $ivf_stimulation_chart->DR23->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR23" class="ivf_stimulation_chart_DR23"><?php echo $ivf_stimulation_chart->DR23->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR24->Visible) { // DR24 ?>
		<th class="<?php echo $ivf_stimulation_chart->DR24->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR24" class="ivf_stimulation_chart_DR24"><?php echo $ivf_stimulation_chart->DR24->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR25->Visible) { // DR25 ?>
		<th class="<?php echo $ivf_stimulation_chart->DR25->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR25" class="ivf_stimulation_chart_DR25"><?php echo $ivf_stimulation_chart->DR25->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->E214->Visible) { // E214 ?>
		<th class="<?php echo $ivf_stimulation_chart->E214->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E214" class="ivf_stimulation_chart_E214"><?php echo $ivf_stimulation_chart->E214->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->E215->Visible) { // E215 ?>
		<th class="<?php echo $ivf_stimulation_chart->E215->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E215" class="ivf_stimulation_chart_E215"><?php echo $ivf_stimulation_chart->E215->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->E216->Visible) { // E216 ?>
		<th class="<?php echo $ivf_stimulation_chart->E216->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E216" class="ivf_stimulation_chart_E216"><?php echo $ivf_stimulation_chart->E216->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->E217->Visible) { // E217 ?>
		<th class="<?php echo $ivf_stimulation_chart->E217->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E217" class="ivf_stimulation_chart_E217"><?php echo $ivf_stimulation_chart->E217->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->E218->Visible) { // E218 ?>
		<th class="<?php echo $ivf_stimulation_chart->E218->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E218" class="ivf_stimulation_chart_E218"><?php echo $ivf_stimulation_chart->E218->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->E219->Visible) { // E219 ?>
		<th class="<?php echo $ivf_stimulation_chart->E219->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E219" class="ivf_stimulation_chart_E219"><?php echo $ivf_stimulation_chart->E219->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->E220->Visible) { // E220 ?>
		<th class="<?php echo $ivf_stimulation_chart->E220->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E220" class="ivf_stimulation_chart_E220"><?php echo $ivf_stimulation_chart->E220->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->E221->Visible) { // E221 ?>
		<th class="<?php echo $ivf_stimulation_chart->E221->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E221" class="ivf_stimulation_chart_E221"><?php echo $ivf_stimulation_chart->E221->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->E222->Visible) { // E222 ?>
		<th class="<?php echo $ivf_stimulation_chart->E222->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E222" class="ivf_stimulation_chart_E222"><?php echo $ivf_stimulation_chart->E222->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->E223->Visible) { // E223 ?>
		<th class="<?php echo $ivf_stimulation_chart->E223->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E223" class="ivf_stimulation_chart_E223"><?php echo $ivf_stimulation_chart->E223->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->E224->Visible) { // E224 ?>
		<th class="<?php echo $ivf_stimulation_chart->E224->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E224" class="ivf_stimulation_chart_E224"><?php echo $ivf_stimulation_chart->E224->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->E225->Visible) { // E225 ?>
		<th class="<?php echo $ivf_stimulation_chart->E225->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E225" class="ivf_stimulation_chart_E225"><?php echo $ivf_stimulation_chart->E225->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->EEETTTDTE->Visible) { // EEETTTDTE ?>
		<th class="<?php echo $ivf_stimulation_chart->EEETTTDTE->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EEETTTDTE" class="ivf_stimulation_chart_EEETTTDTE"><?php echo $ivf_stimulation_chart->EEETTTDTE->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->bhcgdate->Visible) { // bhcgdate ?>
		<th class="<?php echo $ivf_stimulation_chart->bhcgdate->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_bhcgdate" class="ivf_stimulation_chart_bhcgdate"><?php echo $ivf_stimulation_chart->bhcgdate->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->TUBAL_PATENCY->Visible) { // TUBAL_PATENCY ?>
		<th class="<?php echo $ivf_stimulation_chart->TUBAL_PATENCY->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_TUBAL_PATENCY" class="ivf_stimulation_chart_TUBAL_PATENCY"><?php echo $ivf_stimulation_chart->TUBAL_PATENCY->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->HSG->Visible) { // HSG ?>
		<th class="<?php echo $ivf_stimulation_chart->HSG->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HSG" class="ivf_stimulation_chart_HSG"><?php echo $ivf_stimulation_chart->HSG->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->DHL->Visible) { // DHL ?>
		<th class="<?php echo $ivf_stimulation_chart->DHL->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DHL" class="ivf_stimulation_chart_DHL"><?php echo $ivf_stimulation_chart->DHL->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->UTERINE_PROBLEMS->Visible) { // UTERINE_PROBLEMS ?>
		<th class="<?php echo $ivf_stimulation_chart->UTERINE_PROBLEMS->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_UTERINE_PROBLEMS" class="ivf_stimulation_chart_UTERINE_PROBLEMS"><?php echo $ivf_stimulation_chart->UTERINE_PROBLEMS->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->W_COMORBIDS->Visible) { // W_COMORBIDS ?>
		<th class="<?php echo $ivf_stimulation_chart->W_COMORBIDS->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_W_COMORBIDS" class="ivf_stimulation_chart_W_COMORBIDS"><?php echo $ivf_stimulation_chart->W_COMORBIDS->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->H_COMORBIDS->Visible) { // H_COMORBIDS ?>
		<th class="<?php echo $ivf_stimulation_chart->H_COMORBIDS->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_H_COMORBIDS" class="ivf_stimulation_chart_H_COMORBIDS"><?php echo $ivf_stimulation_chart->H_COMORBIDS->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->SEXUAL_DYSFUNCTION->Visible) { // SEXUAL_DYSFUNCTION ?>
		<th class="<?php echo $ivf_stimulation_chart->SEXUAL_DYSFUNCTION->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_SEXUAL_DYSFUNCTION" class="ivf_stimulation_chart_SEXUAL_DYSFUNCTION"><?php echo $ivf_stimulation_chart->SEXUAL_DYSFUNCTION->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->TABLETS->Visible) { // TABLETS ?>
		<th class="<?php echo $ivf_stimulation_chart->TABLETS->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_TABLETS" class="ivf_stimulation_chart_TABLETS"><?php echo $ivf_stimulation_chart->TABLETS->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->FOLLICLE_STATUS->Visible) { // FOLLICLE_STATUS ?>
		<th class="<?php echo $ivf_stimulation_chart->FOLLICLE_STATUS->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_FOLLICLE_STATUS" class="ivf_stimulation_chart_FOLLICLE_STATUS"><?php echo $ivf_stimulation_chart->FOLLICLE_STATUS->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->NUMBER_OF_IUI->Visible) { // NUMBER_OF_IUI ?>
		<th class="<?php echo $ivf_stimulation_chart->NUMBER_OF_IUI->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_NUMBER_OF_IUI" class="ivf_stimulation_chart_NUMBER_OF_IUI"><?php echo $ivf_stimulation_chart->NUMBER_OF_IUI->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->PROCEDURE->Visible) { // PROCEDURE ?>
		<th class="<?php echo $ivf_stimulation_chart->PROCEDURE->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_PROCEDURE" class="ivf_stimulation_chart_PROCEDURE"><?php echo $ivf_stimulation_chart->PROCEDURE->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->LUTEAL_SUPPORT->Visible) { // LUTEAL_SUPPORT ?>
		<th class="<?php echo $ivf_stimulation_chart->LUTEAL_SUPPORT->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_LUTEAL_SUPPORT" class="ivf_stimulation_chart_LUTEAL_SUPPORT"><?php echo $ivf_stimulation_chart->LUTEAL_SUPPORT->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->SPECIFIC_MATERNAL_PROBLEMS->Visible) { // SPECIFIC_MATERNAL_PROBLEMS ?>
		<th class="<?php echo $ivf_stimulation_chart->SPECIFIC_MATERNAL_PROBLEMS->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS" class="ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS"><?php echo $ivf_stimulation_chart->SPECIFIC_MATERNAL_PROBLEMS->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->ONGOING_PREG->Visible) { // ONGOING_PREG ?>
		<th class="<?php echo $ivf_stimulation_chart->ONGOING_PREG->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_ONGOING_PREG" class="ivf_stimulation_chart_ONGOING_PREG"><?php echo $ivf_stimulation_chart->ONGOING_PREG->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart->EDD_Date->Visible) { // EDD_Date ?>
		<th class="<?php echo $ivf_stimulation_chart->EDD_Date->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EDD_Date" class="ivf_stimulation_chart_EDD_Date"><?php echo $ivf_stimulation_chart->EDD_Date->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$ivf_stimulation_chart_delete->RecCnt = 0;
$i = 0;
while (!$ivf_stimulation_chart_delete->Recordset->EOF) {
	$ivf_stimulation_chart_delete->RecCnt++;
	$ivf_stimulation_chart_delete->RowCnt++;

	// Set row properties
	$ivf_stimulation_chart->resetAttributes();
	$ivf_stimulation_chart->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$ivf_stimulation_chart_delete->loadRowValues($ivf_stimulation_chart_delete->Recordset);

	// Render row
	$ivf_stimulation_chart_delete->renderRow();
?>
	<tr<?php echo $ivf_stimulation_chart->rowAttributes() ?>>
<?php if ($ivf_stimulation_chart->id->Visible) { // id ?>
		<td<?php echo $ivf_stimulation_chart->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_id" class="ivf_stimulation_chart_id">
<span<?php echo $ivf_stimulation_chart->id->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RIDNo->Visible) { // RIDNo ?>
		<td<?php echo $ivf_stimulation_chart->RIDNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_RIDNo" class="ivf_stimulation_chart_RIDNo">
<span<?php echo $ivf_stimulation_chart->RIDNo->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RIDNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Name->Visible) { // Name ?>
		<td<?php echo $ivf_stimulation_chart->Name->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Name" class="ivf_stimulation_chart_Name">
<span<?php echo $ivf_stimulation_chart->Name->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->ARTCycle->Visible) { // ARTCycle ?>
		<td<?php echo $ivf_stimulation_chart->ARTCycle->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_ARTCycle" class="ivf_stimulation_chart_ARTCycle">
<span<?php echo $ivf_stimulation_chart->ARTCycle->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ARTCycle->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->FemaleFactor->Visible) { // FemaleFactor ?>
		<td<?php echo $ivf_stimulation_chart->FemaleFactor->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_FemaleFactor" class="ivf_stimulation_chart_FemaleFactor">
<span<?php echo $ivf_stimulation_chart->FemaleFactor->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->FemaleFactor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->MaleFactor->Visible) { // MaleFactor ?>
		<td<?php echo $ivf_stimulation_chart->MaleFactor->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_MaleFactor" class="ivf_stimulation_chart_MaleFactor">
<span<?php echo $ivf_stimulation_chart->MaleFactor->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->MaleFactor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Protocol->Visible) { // Protocol ?>
		<td<?php echo $ivf_stimulation_chart->Protocol->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Protocol" class="ivf_stimulation_chart_Protocol">
<span<?php echo $ivf_stimulation_chart->Protocol->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Protocol->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->SemenFrozen->Visible) { // SemenFrozen ?>
		<td<?php echo $ivf_stimulation_chart->SemenFrozen->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_SemenFrozen" class="ivf_stimulation_chart_SemenFrozen">
<span<?php echo $ivf_stimulation_chart->SemenFrozen->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->SemenFrozen->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->A4ICSICycle->Visible) { // A4ICSICycle ?>
		<td<?php echo $ivf_stimulation_chart->A4ICSICycle->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_A4ICSICycle" class="ivf_stimulation_chart_A4ICSICycle">
<span<?php echo $ivf_stimulation_chart->A4ICSICycle->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->A4ICSICycle->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->TotalICSICycle->Visible) { // TotalICSICycle ?>
		<td<?php echo $ivf_stimulation_chart->TotalICSICycle->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_TotalICSICycle" class="ivf_stimulation_chart_TotalICSICycle">
<span<?php echo $ivf_stimulation_chart->TotalICSICycle->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->TotalICSICycle->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->TypeOfInfertility->Visible) { // TypeOfInfertility ?>
		<td<?php echo $ivf_stimulation_chart->TypeOfInfertility->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_TypeOfInfertility" class="ivf_stimulation_chart_TypeOfInfertility">
<span<?php echo $ivf_stimulation_chart->TypeOfInfertility->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->TypeOfInfertility->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Duration->Visible) { // Duration ?>
		<td<?php echo $ivf_stimulation_chart->Duration->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Duration" class="ivf_stimulation_chart_Duration">
<span<?php echo $ivf_stimulation_chart->Duration->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Duration->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->LMP->Visible) { // LMP ?>
		<td<?php echo $ivf_stimulation_chart->LMP->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_LMP" class="ivf_stimulation_chart_LMP">
<span<?php echo $ivf_stimulation_chart->LMP->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->LMP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RelevantHistory->Visible) { // RelevantHistory ?>
		<td<?php echo $ivf_stimulation_chart->RelevantHistory->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_RelevantHistory" class="ivf_stimulation_chart_RelevantHistory">
<span<?php echo $ivf_stimulation_chart->RelevantHistory->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RelevantHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->IUICycles->Visible) { // IUICycles ?>
		<td<?php echo $ivf_stimulation_chart->IUICycles->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_IUICycles" class="ivf_stimulation_chart_IUICycles">
<span<?php echo $ivf_stimulation_chart->IUICycles->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->IUICycles->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->AFC->Visible) { // AFC ?>
		<td<?php echo $ivf_stimulation_chart->AFC->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_AFC" class="ivf_stimulation_chart_AFC">
<span<?php echo $ivf_stimulation_chart->AFC->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->AFC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->AMH->Visible) { // AMH ?>
		<td<?php echo $ivf_stimulation_chart->AMH->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_AMH" class="ivf_stimulation_chart_AMH">
<span<?php echo $ivf_stimulation_chart->AMH->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->AMH->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->FBMI->Visible) { // FBMI ?>
		<td<?php echo $ivf_stimulation_chart->FBMI->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_FBMI" class="ivf_stimulation_chart_FBMI">
<span<?php echo $ivf_stimulation_chart->FBMI->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->FBMI->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->MBMI->Visible) { // MBMI ?>
		<td<?php echo $ivf_stimulation_chart->MBMI->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_MBMI" class="ivf_stimulation_chart_MBMI">
<span<?php echo $ivf_stimulation_chart->MBMI->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->MBMI->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->OvarianVolumeRT->Visible) { // OvarianVolumeRT ?>
		<td<?php echo $ivf_stimulation_chart->OvarianVolumeRT->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_OvarianVolumeRT" class="ivf_stimulation_chart_OvarianVolumeRT">
<span<?php echo $ivf_stimulation_chart->OvarianVolumeRT->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->OvarianVolumeRT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->OvarianVolumeLT->Visible) { // OvarianVolumeLT ?>
		<td<?php echo $ivf_stimulation_chart->OvarianVolumeLT->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_OvarianVolumeLT" class="ivf_stimulation_chart_OvarianVolumeLT">
<span<?php echo $ivf_stimulation_chart->OvarianVolumeLT->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->OvarianVolumeLT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DAYSOFSTIMULATION->Visible) { // DAYSOFSTIMULATION ?>
		<td<?php echo $ivf_stimulation_chart->DAYSOFSTIMULATION->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_DAYSOFSTIMULATION" class="ivf_stimulation_chart_DAYSOFSTIMULATION">
<span<?php echo $ivf_stimulation_chart->DAYSOFSTIMULATION->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DAYSOFSTIMULATION->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DOSEOFGONADOTROPINS->Visible) { // DOSEOFGONADOTROPINS ?>
		<td<?php echo $ivf_stimulation_chart->DOSEOFGONADOTROPINS->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_DOSEOFGONADOTROPINS" class="ivf_stimulation_chart_DOSEOFGONADOTROPINS">
<span<?php echo $ivf_stimulation_chart->DOSEOFGONADOTROPINS->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DOSEOFGONADOTROPINS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->INJTYPE->Visible) { // INJTYPE ?>
		<td<?php echo $ivf_stimulation_chart->INJTYPE->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_INJTYPE" class="ivf_stimulation_chart_INJTYPE">
<span<?php echo $ivf_stimulation_chart->INJTYPE->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->INJTYPE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->ANTAGONISTDAYS->Visible) { // ANTAGONISTDAYS ?>
		<td<?php echo $ivf_stimulation_chart->ANTAGONISTDAYS->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_ANTAGONISTDAYS" class="ivf_stimulation_chart_ANTAGONISTDAYS">
<span<?php echo $ivf_stimulation_chart->ANTAGONISTDAYS->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ANTAGONISTDAYS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->ANTAGONISTSTARTDAY->Visible) { // ANTAGONISTSTARTDAY ?>
		<td<?php echo $ivf_stimulation_chart->ANTAGONISTSTARTDAY->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_ANTAGONISTSTARTDAY" class="ivf_stimulation_chart_ANTAGONISTSTARTDAY">
<span<?php echo $ivf_stimulation_chart->ANTAGONISTSTARTDAY->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ANTAGONISTSTARTDAY->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GROWTHHORMONE->Visible) { // GROWTHHORMONE ?>
		<td<?php echo $ivf_stimulation_chart->GROWTHHORMONE->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_GROWTHHORMONE" class="ivf_stimulation_chart_GROWTHHORMONE">
<span<?php echo $ivf_stimulation_chart->GROWTHHORMONE->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GROWTHHORMONE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->PRETREATMENT->Visible) { // PRETREATMENT ?>
		<td<?php echo $ivf_stimulation_chart->PRETREATMENT->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_PRETREATMENT" class="ivf_stimulation_chart_PRETREATMENT">
<span<?php echo $ivf_stimulation_chart->PRETREATMENT->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->PRETREATMENT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->SerumP4->Visible) { // SerumP4 ?>
		<td<?php echo $ivf_stimulation_chart->SerumP4->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_SerumP4" class="ivf_stimulation_chart_SerumP4">
<span<?php echo $ivf_stimulation_chart->SerumP4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->SerumP4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->FORT->Visible) { // FORT ?>
		<td<?php echo $ivf_stimulation_chart->FORT->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_FORT" class="ivf_stimulation_chart_FORT">
<span<?php echo $ivf_stimulation_chart->FORT->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->FORT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->MedicalFactors->Visible) { // MedicalFactors ?>
		<td<?php echo $ivf_stimulation_chart->MedicalFactors->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_MedicalFactors" class="ivf_stimulation_chart_MedicalFactors">
<span<?php echo $ivf_stimulation_chart->MedicalFactors->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->MedicalFactors->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->SCDate->Visible) { // SCDate ?>
		<td<?php echo $ivf_stimulation_chart->SCDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_SCDate" class="ivf_stimulation_chart_SCDate">
<span<?php echo $ivf_stimulation_chart->SCDate->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->SCDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->OvarianSurgery->Visible) { // OvarianSurgery ?>
		<td<?php echo $ivf_stimulation_chart->OvarianSurgery->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_OvarianSurgery" class="ivf_stimulation_chart_OvarianSurgery">
<span<?php echo $ivf_stimulation_chart->OvarianSurgery->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->OvarianSurgery->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->PreProcedureOrder->Visible) { // PreProcedureOrder ?>
		<td<?php echo $ivf_stimulation_chart->PreProcedureOrder->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_PreProcedureOrder" class="ivf_stimulation_chart_PreProcedureOrder">
<span<?php echo $ivf_stimulation_chart->PreProcedureOrder->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->PreProcedureOrder->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->TRIGGERR->Visible) { // TRIGGERR ?>
		<td<?php echo $ivf_stimulation_chart->TRIGGERR->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_TRIGGERR" class="ivf_stimulation_chart_TRIGGERR">
<span<?php echo $ivf_stimulation_chart->TRIGGERR->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->TRIGGERR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->TRIGGERDATE->Visible) { // TRIGGERDATE ?>
		<td<?php echo $ivf_stimulation_chart->TRIGGERDATE->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_TRIGGERDATE" class="ivf_stimulation_chart_TRIGGERDATE">
<span<?php echo $ivf_stimulation_chart->TRIGGERDATE->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->TRIGGERDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->ATHOMEorCLINIC->Visible) { // ATHOMEorCLINIC ?>
		<td<?php echo $ivf_stimulation_chart->ATHOMEorCLINIC->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_ATHOMEorCLINIC" class="ivf_stimulation_chart_ATHOMEorCLINIC">
<span<?php echo $ivf_stimulation_chart->ATHOMEorCLINIC->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ATHOMEorCLINIC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->OPUDATE->Visible) { // OPUDATE ?>
		<td<?php echo $ivf_stimulation_chart->OPUDATE->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_OPUDATE" class="ivf_stimulation_chart_OPUDATE">
<span<?php echo $ivf_stimulation_chart->OPUDATE->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->OPUDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->ALLFREEZEINDICATION->Visible) { // ALLFREEZEINDICATION ?>
		<td<?php echo $ivf_stimulation_chart->ALLFREEZEINDICATION->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_ALLFREEZEINDICATION" class="ivf_stimulation_chart_ALLFREEZEINDICATION">
<span<?php echo $ivf_stimulation_chart->ALLFREEZEINDICATION->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ALLFREEZEINDICATION->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->ERA->Visible) { // ERA ?>
		<td<?php echo $ivf_stimulation_chart->ERA->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_ERA" class="ivf_stimulation_chart_ERA">
<span<?php echo $ivf_stimulation_chart->ERA->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ERA->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->PGTA->Visible) { // PGTA ?>
		<td<?php echo $ivf_stimulation_chart->PGTA->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_PGTA" class="ivf_stimulation_chart_PGTA">
<span<?php echo $ivf_stimulation_chart->PGTA->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->PGTA->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->PGD->Visible) { // PGD ?>
		<td<?php echo $ivf_stimulation_chart->PGD->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_PGD" class="ivf_stimulation_chart_PGD">
<span<?php echo $ivf_stimulation_chart->PGD->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->PGD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DATEOFET->Visible) { // DATEOFET ?>
		<td<?php echo $ivf_stimulation_chart->DATEOFET->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_DATEOFET" class="ivf_stimulation_chart_DATEOFET">
<span<?php echo $ivf_stimulation_chart->DATEOFET->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DATEOFET->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->ET->Visible) { // ET ?>
		<td<?php echo $ivf_stimulation_chart->ET->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_ET" class="ivf_stimulation_chart_ET">
<span<?php echo $ivf_stimulation_chart->ET->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ET->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->ESET->Visible) { // ESET ?>
		<td<?php echo $ivf_stimulation_chart->ESET->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_ESET" class="ivf_stimulation_chart_ESET">
<span<?php echo $ivf_stimulation_chart->ESET->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ESET->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DOET->Visible) { // DOET ?>
		<td<?php echo $ivf_stimulation_chart->DOET->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_DOET" class="ivf_stimulation_chart_DOET">
<span<?php echo $ivf_stimulation_chart->DOET->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DOET->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->SEMENPREPARATION->Visible) { // SEMENPREPARATION ?>
		<td<?php echo $ivf_stimulation_chart->SEMENPREPARATION->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_SEMENPREPARATION" class="ivf_stimulation_chart_SEMENPREPARATION">
<span<?php echo $ivf_stimulation_chart->SEMENPREPARATION->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->SEMENPREPARATION->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->REASONFORESET->Visible) { // REASONFORESET ?>
		<td<?php echo $ivf_stimulation_chart->REASONFORESET->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_REASONFORESET" class="ivf_stimulation_chart_REASONFORESET">
<span<?php echo $ivf_stimulation_chart->REASONFORESET->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->REASONFORESET->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Expectedoocytes->Visible) { // Expectedoocytes ?>
		<td<?php echo $ivf_stimulation_chart->Expectedoocytes->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Expectedoocytes" class="ivf_stimulation_chart_Expectedoocytes">
<span<?php echo $ivf_stimulation_chart->Expectedoocytes->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Expectedoocytes->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate1->Visible) { // StChDate1 ?>
		<td<?php echo $ivf_stimulation_chart->StChDate1->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StChDate1" class="ivf_stimulation_chart_StChDate1">
<span<?php echo $ivf_stimulation_chart->StChDate1->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate2->Visible) { // StChDate2 ?>
		<td<?php echo $ivf_stimulation_chart->StChDate2->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StChDate2" class="ivf_stimulation_chart_StChDate2">
<span<?php echo $ivf_stimulation_chart->StChDate2->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate3->Visible) { // StChDate3 ?>
		<td<?php echo $ivf_stimulation_chart->StChDate3->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StChDate3" class="ivf_stimulation_chart_StChDate3">
<span<?php echo $ivf_stimulation_chart->StChDate3->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate4->Visible) { // StChDate4 ?>
		<td<?php echo $ivf_stimulation_chart->StChDate4->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StChDate4" class="ivf_stimulation_chart_StChDate4">
<span<?php echo $ivf_stimulation_chart->StChDate4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate5->Visible) { // StChDate5 ?>
		<td<?php echo $ivf_stimulation_chart->StChDate5->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StChDate5" class="ivf_stimulation_chart_StChDate5">
<span<?php echo $ivf_stimulation_chart->StChDate5->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate6->Visible) { // StChDate6 ?>
		<td<?php echo $ivf_stimulation_chart->StChDate6->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StChDate6" class="ivf_stimulation_chart_StChDate6">
<span<?php echo $ivf_stimulation_chart->StChDate6->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate6->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate7->Visible) { // StChDate7 ?>
		<td<?php echo $ivf_stimulation_chart->StChDate7->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StChDate7" class="ivf_stimulation_chart_StChDate7">
<span<?php echo $ivf_stimulation_chart->StChDate7->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate7->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate8->Visible) { // StChDate8 ?>
		<td<?php echo $ivf_stimulation_chart->StChDate8->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StChDate8" class="ivf_stimulation_chart_StChDate8">
<span<?php echo $ivf_stimulation_chart->StChDate8->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate8->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate9->Visible) { // StChDate9 ?>
		<td<?php echo $ivf_stimulation_chart->StChDate9->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StChDate9" class="ivf_stimulation_chart_StChDate9">
<span<?php echo $ivf_stimulation_chart->StChDate9->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate9->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate10->Visible) { // StChDate10 ?>
		<td<?php echo $ivf_stimulation_chart->StChDate10->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StChDate10" class="ivf_stimulation_chart_StChDate10">
<span<?php echo $ivf_stimulation_chart->StChDate10->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate10->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate11->Visible) { // StChDate11 ?>
		<td<?php echo $ivf_stimulation_chart->StChDate11->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StChDate11" class="ivf_stimulation_chart_StChDate11">
<span<?php echo $ivf_stimulation_chart->StChDate11->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate11->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate12->Visible) { // StChDate12 ?>
		<td<?php echo $ivf_stimulation_chart->StChDate12->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StChDate12" class="ivf_stimulation_chart_StChDate12">
<span<?php echo $ivf_stimulation_chart->StChDate12->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate12->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate13->Visible) { // StChDate13 ?>
		<td<?php echo $ivf_stimulation_chart->StChDate13->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StChDate13" class="ivf_stimulation_chart_StChDate13">
<span<?php echo $ivf_stimulation_chart->StChDate13->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate13->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay1->Visible) { // CycleDay1 ?>
		<td<?php echo $ivf_stimulation_chart->CycleDay1->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_CycleDay1" class="ivf_stimulation_chart_CycleDay1">
<span<?php echo $ivf_stimulation_chart->CycleDay1->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay2->Visible) { // CycleDay2 ?>
		<td<?php echo $ivf_stimulation_chart->CycleDay2->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_CycleDay2" class="ivf_stimulation_chart_CycleDay2">
<span<?php echo $ivf_stimulation_chart->CycleDay2->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay3->Visible) { // CycleDay3 ?>
		<td<?php echo $ivf_stimulation_chart->CycleDay3->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_CycleDay3" class="ivf_stimulation_chart_CycleDay3">
<span<?php echo $ivf_stimulation_chart->CycleDay3->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay4->Visible) { // CycleDay4 ?>
		<td<?php echo $ivf_stimulation_chart->CycleDay4->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_CycleDay4" class="ivf_stimulation_chart_CycleDay4">
<span<?php echo $ivf_stimulation_chart->CycleDay4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay5->Visible) { // CycleDay5 ?>
		<td<?php echo $ivf_stimulation_chart->CycleDay5->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_CycleDay5" class="ivf_stimulation_chart_CycleDay5">
<span<?php echo $ivf_stimulation_chart->CycleDay5->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay6->Visible) { // CycleDay6 ?>
		<td<?php echo $ivf_stimulation_chart->CycleDay6->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_CycleDay6" class="ivf_stimulation_chart_CycleDay6">
<span<?php echo $ivf_stimulation_chart->CycleDay6->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay6->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay7->Visible) { // CycleDay7 ?>
		<td<?php echo $ivf_stimulation_chart->CycleDay7->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_CycleDay7" class="ivf_stimulation_chart_CycleDay7">
<span<?php echo $ivf_stimulation_chart->CycleDay7->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay7->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay8->Visible) { // CycleDay8 ?>
		<td<?php echo $ivf_stimulation_chart->CycleDay8->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_CycleDay8" class="ivf_stimulation_chart_CycleDay8">
<span<?php echo $ivf_stimulation_chart->CycleDay8->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay8->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay9->Visible) { // CycleDay9 ?>
		<td<?php echo $ivf_stimulation_chart->CycleDay9->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_CycleDay9" class="ivf_stimulation_chart_CycleDay9">
<span<?php echo $ivf_stimulation_chart->CycleDay9->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay9->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay10->Visible) { // CycleDay10 ?>
		<td<?php echo $ivf_stimulation_chart->CycleDay10->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_CycleDay10" class="ivf_stimulation_chart_CycleDay10">
<span<?php echo $ivf_stimulation_chart->CycleDay10->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay10->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay11->Visible) { // CycleDay11 ?>
		<td<?php echo $ivf_stimulation_chart->CycleDay11->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_CycleDay11" class="ivf_stimulation_chart_CycleDay11">
<span<?php echo $ivf_stimulation_chart->CycleDay11->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay11->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay12->Visible) { // CycleDay12 ?>
		<td<?php echo $ivf_stimulation_chart->CycleDay12->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_CycleDay12" class="ivf_stimulation_chart_CycleDay12">
<span<?php echo $ivf_stimulation_chart->CycleDay12->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay12->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay13->Visible) { // CycleDay13 ?>
		<td<?php echo $ivf_stimulation_chart->CycleDay13->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_CycleDay13" class="ivf_stimulation_chart_CycleDay13">
<span<?php echo $ivf_stimulation_chart->CycleDay13->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay13->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay1->Visible) { // StimulationDay1 ?>
		<td<?php echo $ivf_stimulation_chart->StimulationDay1->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StimulationDay1" class="ivf_stimulation_chart_StimulationDay1">
<span<?php echo $ivf_stimulation_chart->StimulationDay1->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay2->Visible) { // StimulationDay2 ?>
		<td<?php echo $ivf_stimulation_chart->StimulationDay2->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StimulationDay2" class="ivf_stimulation_chart_StimulationDay2">
<span<?php echo $ivf_stimulation_chart->StimulationDay2->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay3->Visible) { // StimulationDay3 ?>
		<td<?php echo $ivf_stimulation_chart->StimulationDay3->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StimulationDay3" class="ivf_stimulation_chart_StimulationDay3">
<span<?php echo $ivf_stimulation_chart->StimulationDay3->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay4->Visible) { // StimulationDay4 ?>
		<td<?php echo $ivf_stimulation_chart->StimulationDay4->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StimulationDay4" class="ivf_stimulation_chart_StimulationDay4">
<span<?php echo $ivf_stimulation_chart->StimulationDay4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay5->Visible) { // StimulationDay5 ?>
		<td<?php echo $ivf_stimulation_chart->StimulationDay5->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StimulationDay5" class="ivf_stimulation_chart_StimulationDay5">
<span<?php echo $ivf_stimulation_chart->StimulationDay5->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay6->Visible) { // StimulationDay6 ?>
		<td<?php echo $ivf_stimulation_chart->StimulationDay6->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StimulationDay6" class="ivf_stimulation_chart_StimulationDay6">
<span<?php echo $ivf_stimulation_chart->StimulationDay6->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay6->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay7->Visible) { // StimulationDay7 ?>
		<td<?php echo $ivf_stimulation_chart->StimulationDay7->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StimulationDay7" class="ivf_stimulation_chart_StimulationDay7">
<span<?php echo $ivf_stimulation_chart->StimulationDay7->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay7->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay8->Visible) { // StimulationDay8 ?>
		<td<?php echo $ivf_stimulation_chart->StimulationDay8->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StimulationDay8" class="ivf_stimulation_chart_StimulationDay8">
<span<?php echo $ivf_stimulation_chart->StimulationDay8->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay8->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay9->Visible) { // StimulationDay9 ?>
		<td<?php echo $ivf_stimulation_chart->StimulationDay9->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StimulationDay9" class="ivf_stimulation_chart_StimulationDay9">
<span<?php echo $ivf_stimulation_chart->StimulationDay9->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay9->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay10->Visible) { // StimulationDay10 ?>
		<td<?php echo $ivf_stimulation_chart->StimulationDay10->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StimulationDay10" class="ivf_stimulation_chart_StimulationDay10">
<span<?php echo $ivf_stimulation_chart->StimulationDay10->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay10->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay11->Visible) { // StimulationDay11 ?>
		<td<?php echo $ivf_stimulation_chart->StimulationDay11->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StimulationDay11" class="ivf_stimulation_chart_StimulationDay11">
<span<?php echo $ivf_stimulation_chart->StimulationDay11->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay11->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay12->Visible) { // StimulationDay12 ?>
		<td<?php echo $ivf_stimulation_chart->StimulationDay12->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StimulationDay12" class="ivf_stimulation_chart_StimulationDay12">
<span<?php echo $ivf_stimulation_chart->StimulationDay12->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay12->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay13->Visible) { // StimulationDay13 ?>
		<td<?php echo $ivf_stimulation_chart->StimulationDay13->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StimulationDay13" class="ivf_stimulation_chart_StimulationDay13">
<span<?php echo $ivf_stimulation_chart->StimulationDay13->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay13->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet1->Visible) { // Tablet1 ?>
		<td<?php echo $ivf_stimulation_chart->Tablet1->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Tablet1" class="ivf_stimulation_chart_Tablet1">
<span<?php echo $ivf_stimulation_chart->Tablet1->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet2->Visible) { // Tablet2 ?>
		<td<?php echo $ivf_stimulation_chart->Tablet2->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Tablet2" class="ivf_stimulation_chart_Tablet2">
<span<?php echo $ivf_stimulation_chart->Tablet2->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet3->Visible) { // Tablet3 ?>
		<td<?php echo $ivf_stimulation_chart->Tablet3->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Tablet3" class="ivf_stimulation_chart_Tablet3">
<span<?php echo $ivf_stimulation_chart->Tablet3->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet4->Visible) { // Tablet4 ?>
		<td<?php echo $ivf_stimulation_chart->Tablet4->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Tablet4" class="ivf_stimulation_chart_Tablet4">
<span<?php echo $ivf_stimulation_chart->Tablet4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet5->Visible) { // Tablet5 ?>
		<td<?php echo $ivf_stimulation_chart->Tablet5->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Tablet5" class="ivf_stimulation_chart_Tablet5">
<span<?php echo $ivf_stimulation_chart->Tablet5->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet6->Visible) { // Tablet6 ?>
		<td<?php echo $ivf_stimulation_chart->Tablet6->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Tablet6" class="ivf_stimulation_chart_Tablet6">
<span<?php echo $ivf_stimulation_chart->Tablet6->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet6->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet7->Visible) { // Tablet7 ?>
		<td<?php echo $ivf_stimulation_chart->Tablet7->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Tablet7" class="ivf_stimulation_chart_Tablet7">
<span<?php echo $ivf_stimulation_chart->Tablet7->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet7->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet8->Visible) { // Tablet8 ?>
		<td<?php echo $ivf_stimulation_chart->Tablet8->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Tablet8" class="ivf_stimulation_chart_Tablet8">
<span<?php echo $ivf_stimulation_chart->Tablet8->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet8->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet9->Visible) { // Tablet9 ?>
		<td<?php echo $ivf_stimulation_chart->Tablet9->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Tablet9" class="ivf_stimulation_chart_Tablet9">
<span<?php echo $ivf_stimulation_chart->Tablet9->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet9->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet10->Visible) { // Tablet10 ?>
		<td<?php echo $ivf_stimulation_chart->Tablet10->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Tablet10" class="ivf_stimulation_chart_Tablet10">
<span<?php echo $ivf_stimulation_chart->Tablet10->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet10->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet11->Visible) { // Tablet11 ?>
		<td<?php echo $ivf_stimulation_chart->Tablet11->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Tablet11" class="ivf_stimulation_chart_Tablet11">
<span<?php echo $ivf_stimulation_chart->Tablet11->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet11->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet12->Visible) { // Tablet12 ?>
		<td<?php echo $ivf_stimulation_chart->Tablet12->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Tablet12" class="ivf_stimulation_chart_Tablet12">
<span<?php echo $ivf_stimulation_chart->Tablet12->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet12->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet13->Visible) { // Tablet13 ?>
		<td<?php echo $ivf_stimulation_chart->Tablet13->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Tablet13" class="ivf_stimulation_chart_Tablet13">
<span<?php echo $ivf_stimulation_chart->Tablet13->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet13->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH1->Visible) { // RFSH1 ?>
		<td<?php echo $ivf_stimulation_chart->RFSH1->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_RFSH1" class="ivf_stimulation_chart_RFSH1">
<span<?php echo $ivf_stimulation_chart->RFSH1->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH2->Visible) { // RFSH2 ?>
		<td<?php echo $ivf_stimulation_chart->RFSH2->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_RFSH2" class="ivf_stimulation_chart_RFSH2">
<span<?php echo $ivf_stimulation_chart->RFSH2->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH3->Visible) { // RFSH3 ?>
		<td<?php echo $ivf_stimulation_chart->RFSH3->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_RFSH3" class="ivf_stimulation_chart_RFSH3">
<span<?php echo $ivf_stimulation_chart->RFSH3->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH4->Visible) { // RFSH4 ?>
		<td<?php echo $ivf_stimulation_chart->RFSH4->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_RFSH4" class="ivf_stimulation_chart_RFSH4">
<span<?php echo $ivf_stimulation_chart->RFSH4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH5->Visible) { // RFSH5 ?>
		<td<?php echo $ivf_stimulation_chart->RFSH5->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_RFSH5" class="ivf_stimulation_chart_RFSH5">
<span<?php echo $ivf_stimulation_chart->RFSH5->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH6->Visible) { // RFSH6 ?>
		<td<?php echo $ivf_stimulation_chart->RFSH6->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_RFSH6" class="ivf_stimulation_chart_RFSH6">
<span<?php echo $ivf_stimulation_chart->RFSH6->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH6->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH7->Visible) { // RFSH7 ?>
		<td<?php echo $ivf_stimulation_chart->RFSH7->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_RFSH7" class="ivf_stimulation_chart_RFSH7">
<span<?php echo $ivf_stimulation_chart->RFSH7->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH7->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH8->Visible) { // RFSH8 ?>
		<td<?php echo $ivf_stimulation_chart->RFSH8->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_RFSH8" class="ivf_stimulation_chart_RFSH8">
<span<?php echo $ivf_stimulation_chart->RFSH8->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH8->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH9->Visible) { // RFSH9 ?>
		<td<?php echo $ivf_stimulation_chart->RFSH9->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_RFSH9" class="ivf_stimulation_chart_RFSH9">
<span<?php echo $ivf_stimulation_chart->RFSH9->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH9->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH10->Visible) { // RFSH10 ?>
		<td<?php echo $ivf_stimulation_chart->RFSH10->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_RFSH10" class="ivf_stimulation_chart_RFSH10">
<span<?php echo $ivf_stimulation_chart->RFSH10->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH10->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH11->Visible) { // RFSH11 ?>
		<td<?php echo $ivf_stimulation_chart->RFSH11->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_RFSH11" class="ivf_stimulation_chart_RFSH11">
<span<?php echo $ivf_stimulation_chart->RFSH11->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH11->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH12->Visible) { // RFSH12 ?>
		<td<?php echo $ivf_stimulation_chart->RFSH12->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_RFSH12" class="ivf_stimulation_chart_RFSH12">
<span<?php echo $ivf_stimulation_chart->RFSH12->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH12->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH13->Visible) { // RFSH13 ?>
		<td<?php echo $ivf_stimulation_chart->RFSH13->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_RFSH13" class="ivf_stimulation_chart_RFSH13">
<span<?php echo $ivf_stimulation_chart->RFSH13->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH13->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG1->Visible) { // HMG1 ?>
		<td<?php echo $ivf_stimulation_chart->HMG1->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_HMG1" class="ivf_stimulation_chart_HMG1">
<span<?php echo $ivf_stimulation_chart->HMG1->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG2->Visible) { // HMG2 ?>
		<td<?php echo $ivf_stimulation_chart->HMG2->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_HMG2" class="ivf_stimulation_chart_HMG2">
<span<?php echo $ivf_stimulation_chart->HMG2->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG3->Visible) { // HMG3 ?>
		<td<?php echo $ivf_stimulation_chart->HMG3->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_HMG3" class="ivf_stimulation_chart_HMG3">
<span<?php echo $ivf_stimulation_chart->HMG3->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG4->Visible) { // HMG4 ?>
		<td<?php echo $ivf_stimulation_chart->HMG4->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_HMG4" class="ivf_stimulation_chart_HMG4">
<span<?php echo $ivf_stimulation_chart->HMG4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG5->Visible) { // HMG5 ?>
		<td<?php echo $ivf_stimulation_chart->HMG5->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_HMG5" class="ivf_stimulation_chart_HMG5">
<span<?php echo $ivf_stimulation_chart->HMG5->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG6->Visible) { // HMG6 ?>
		<td<?php echo $ivf_stimulation_chart->HMG6->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_HMG6" class="ivf_stimulation_chart_HMG6">
<span<?php echo $ivf_stimulation_chart->HMG6->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG6->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG7->Visible) { // HMG7 ?>
		<td<?php echo $ivf_stimulation_chart->HMG7->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_HMG7" class="ivf_stimulation_chart_HMG7">
<span<?php echo $ivf_stimulation_chart->HMG7->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG7->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG8->Visible) { // HMG8 ?>
		<td<?php echo $ivf_stimulation_chart->HMG8->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_HMG8" class="ivf_stimulation_chart_HMG8">
<span<?php echo $ivf_stimulation_chart->HMG8->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG8->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG9->Visible) { // HMG9 ?>
		<td<?php echo $ivf_stimulation_chart->HMG9->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_HMG9" class="ivf_stimulation_chart_HMG9">
<span<?php echo $ivf_stimulation_chart->HMG9->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG9->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG10->Visible) { // HMG10 ?>
		<td<?php echo $ivf_stimulation_chart->HMG10->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_HMG10" class="ivf_stimulation_chart_HMG10">
<span<?php echo $ivf_stimulation_chart->HMG10->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG10->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG11->Visible) { // HMG11 ?>
		<td<?php echo $ivf_stimulation_chart->HMG11->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_HMG11" class="ivf_stimulation_chart_HMG11">
<span<?php echo $ivf_stimulation_chart->HMG11->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG11->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG12->Visible) { // HMG12 ?>
		<td<?php echo $ivf_stimulation_chart->HMG12->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_HMG12" class="ivf_stimulation_chart_HMG12">
<span<?php echo $ivf_stimulation_chart->HMG12->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG12->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG13->Visible) { // HMG13 ?>
		<td<?php echo $ivf_stimulation_chart->HMG13->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_HMG13" class="ivf_stimulation_chart_HMG13">
<span<?php echo $ivf_stimulation_chart->HMG13->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG13->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH1->Visible) { // GnRH1 ?>
		<td<?php echo $ivf_stimulation_chart->GnRH1->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_GnRH1" class="ivf_stimulation_chart_GnRH1">
<span<?php echo $ivf_stimulation_chart->GnRH1->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH2->Visible) { // GnRH2 ?>
		<td<?php echo $ivf_stimulation_chart->GnRH2->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_GnRH2" class="ivf_stimulation_chart_GnRH2">
<span<?php echo $ivf_stimulation_chart->GnRH2->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH3->Visible) { // GnRH3 ?>
		<td<?php echo $ivf_stimulation_chart->GnRH3->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_GnRH3" class="ivf_stimulation_chart_GnRH3">
<span<?php echo $ivf_stimulation_chart->GnRH3->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH4->Visible) { // GnRH4 ?>
		<td<?php echo $ivf_stimulation_chart->GnRH4->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_GnRH4" class="ivf_stimulation_chart_GnRH4">
<span<?php echo $ivf_stimulation_chart->GnRH4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH5->Visible) { // GnRH5 ?>
		<td<?php echo $ivf_stimulation_chart->GnRH5->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_GnRH5" class="ivf_stimulation_chart_GnRH5">
<span<?php echo $ivf_stimulation_chart->GnRH5->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH6->Visible) { // GnRH6 ?>
		<td<?php echo $ivf_stimulation_chart->GnRH6->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_GnRH6" class="ivf_stimulation_chart_GnRH6">
<span<?php echo $ivf_stimulation_chart->GnRH6->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH6->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH7->Visible) { // GnRH7 ?>
		<td<?php echo $ivf_stimulation_chart->GnRH7->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_GnRH7" class="ivf_stimulation_chart_GnRH7">
<span<?php echo $ivf_stimulation_chart->GnRH7->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH7->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH8->Visible) { // GnRH8 ?>
		<td<?php echo $ivf_stimulation_chart->GnRH8->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_GnRH8" class="ivf_stimulation_chart_GnRH8">
<span<?php echo $ivf_stimulation_chart->GnRH8->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH8->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH9->Visible) { // GnRH9 ?>
		<td<?php echo $ivf_stimulation_chart->GnRH9->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_GnRH9" class="ivf_stimulation_chart_GnRH9">
<span<?php echo $ivf_stimulation_chart->GnRH9->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH9->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH10->Visible) { // GnRH10 ?>
		<td<?php echo $ivf_stimulation_chart->GnRH10->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_GnRH10" class="ivf_stimulation_chart_GnRH10">
<span<?php echo $ivf_stimulation_chart->GnRH10->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH10->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH11->Visible) { // GnRH11 ?>
		<td<?php echo $ivf_stimulation_chart->GnRH11->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_GnRH11" class="ivf_stimulation_chart_GnRH11">
<span<?php echo $ivf_stimulation_chart->GnRH11->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH11->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH12->Visible) { // GnRH12 ?>
		<td<?php echo $ivf_stimulation_chart->GnRH12->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_GnRH12" class="ivf_stimulation_chart_GnRH12">
<span<?php echo $ivf_stimulation_chart->GnRH12->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH12->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH13->Visible) { // GnRH13 ?>
		<td<?php echo $ivf_stimulation_chart->GnRH13->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_GnRH13" class="ivf_stimulation_chart_GnRH13">
<span<?php echo $ivf_stimulation_chart->GnRH13->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH13->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E21->Visible) { // E21 ?>
		<td<?php echo $ivf_stimulation_chart->E21->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_E21" class="ivf_stimulation_chart_E21">
<span<?php echo $ivf_stimulation_chart->E21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E21->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E22->Visible) { // E22 ?>
		<td<?php echo $ivf_stimulation_chart->E22->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_E22" class="ivf_stimulation_chart_E22">
<span<?php echo $ivf_stimulation_chart->E22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E22->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E23->Visible) { // E23 ?>
		<td<?php echo $ivf_stimulation_chart->E23->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_E23" class="ivf_stimulation_chart_E23">
<span<?php echo $ivf_stimulation_chart->E23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E23->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E24->Visible) { // E24 ?>
		<td<?php echo $ivf_stimulation_chart->E24->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_E24" class="ivf_stimulation_chart_E24">
<span<?php echo $ivf_stimulation_chart->E24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E24->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E25->Visible) { // E25 ?>
		<td<?php echo $ivf_stimulation_chart->E25->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_E25" class="ivf_stimulation_chart_E25">
<span<?php echo $ivf_stimulation_chart->E25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E25->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E26->Visible) { // E26 ?>
		<td<?php echo $ivf_stimulation_chart->E26->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_E26" class="ivf_stimulation_chart_E26">
<span<?php echo $ivf_stimulation_chart->E26->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E26->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E27->Visible) { // E27 ?>
		<td<?php echo $ivf_stimulation_chart->E27->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_E27" class="ivf_stimulation_chart_E27">
<span<?php echo $ivf_stimulation_chart->E27->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E27->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E28->Visible) { // E28 ?>
		<td<?php echo $ivf_stimulation_chart->E28->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_E28" class="ivf_stimulation_chart_E28">
<span<?php echo $ivf_stimulation_chart->E28->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E28->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E29->Visible) { // E29 ?>
		<td<?php echo $ivf_stimulation_chart->E29->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_E29" class="ivf_stimulation_chart_E29">
<span<?php echo $ivf_stimulation_chart->E29->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E29->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E210->Visible) { // E210 ?>
		<td<?php echo $ivf_stimulation_chart->E210->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_E210" class="ivf_stimulation_chart_E210">
<span<?php echo $ivf_stimulation_chart->E210->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E210->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E211->Visible) { // E211 ?>
		<td<?php echo $ivf_stimulation_chart->E211->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_E211" class="ivf_stimulation_chart_E211">
<span<?php echo $ivf_stimulation_chart->E211->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E211->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E212->Visible) { // E212 ?>
		<td<?php echo $ivf_stimulation_chart->E212->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_E212" class="ivf_stimulation_chart_E212">
<span<?php echo $ivf_stimulation_chart->E212->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E212->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E213->Visible) { // E213 ?>
		<td<?php echo $ivf_stimulation_chart->E213->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_E213" class="ivf_stimulation_chart_E213">
<span<?php echo $ivf_stimulation_chart->E213->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E213->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P41->Visible) { // P41 ?>
		<td<?php echo $ivf_stimulation_chart->P41->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_P41" class="ivf_stimulation_chart_P41">
<span<?php echo $ivf_stimulation_chart->P41->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P41->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P42->Visible) { // P42 ?>
		<td<?php echo $ivf_stimulation_chart->P42->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_P42" class="ivf_stimulation_chart_P42">
<span<?php echo $ivf_stimulation_chart->P42->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P42->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P43->Visible) { // P43 ?>
		<td<?php echo $ivf_stimulation_chart->P43->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_P43" class="ivf_stimulation_chart_P43">
<span<?php echo $ivf_stimulation_chart->P43->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P43->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P44->Visible) { // P44 ?>
		<td<?php echo $ivf_stimulation_chart->P44->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_P44" class="ivf_stimulation_chart_P44">
<span<?php echo $ivf_stimulation_chart->P44->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P44->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P45->Visible) { // P45 ?>
		<td<?php echo $ivf_stimulation_chart->P45->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_P45" class="ivf_stimulation_chart_P45">
<span<?php echo $ivf_stimulation_chart->P45->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P45->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P46->Visible) { // P46 ?>
		<td<?php echo $ivf_stimulation_chart->P46->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_P46" class="ivf_stimulation_chart_P46">
<span<?php echo $ivf_stimulation_chart->P46->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P46->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P47->Visible) { // P47 ?>
		<td<?php echo $ivf_stimulation_chart->P47->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_P47" class="ivf_stimulation_chart_P47">
<span<?php echo $ivf_stimulation_chart->P47->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P47->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P48->Visible) { // P48 ?>
		<td<?php echo $ivf_stimulation_chart->P48->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_P48" class="ivf_stimulation_chart_P48">
<span<?php echo $ivf_stimulation_chart->P48->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P48->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P49->Visible) { // P49 ?>
		<td<?php echo $ivf_stimulation_chart->P49->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_P49" class="ivf_stimulation_chart_P49">
<span<?php echo $ivf_stimulation_chart->P49->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P49->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P410->Visible) { // P410 ?>
		<td<?php echo $ivf_stimulation_chart->P410->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_P410" class="ivf_stimulation_chart_P410">
<span<?php echo $ivf_stimulation_chart->P410->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P410->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P411->Visible) { // P411 ?>
		<td<?php echo $ivf_stimulation_chart->P411->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_P411" class="ivf_stimulation_chart_P411">
<span<?php echo $ivf_stimulation_chart->P411->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P411->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P412->Visible) { // P412 ?>
		<td<?php echo $ivf_stimulation_chart->P412->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_P412" class="ivf_stimulation_chart_P412">
<span<?php echo $ivf_stimulation_chart->P412->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P412->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P413->Visible) { // P413 ?>
		<td<?php echo $ivf_stimulation_chart->P413->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_P413" class="ivf_stimulation_chart_P413">
<span<?php echo $ivf_stimulation_chart->P413->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P413->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt1->Visible) { // USGRt1 ?>
		<td<?php echo $ivf_stimulation_chart->USGRt1->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGRt1" class="ivf_stimulation_chart_USGRt1">
<span<?php echo $ivf_stimulation_chart->USGRt1->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt2->Visible) { // USGRt2 ?>
		<td<?php echo $ivf_stimulation_chart->USGRt2->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGRt2" class="ivf_stimulation_chart_USGRt2">
<span<?php echo $ivf_stimulation_chart->USGRt2->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt3->Visible) { // USGRt3 ?>
		<td<?php echo $ivf_stimulation_chart->USGRt3->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGRt3" class="ivf_stimulation_chart_USGRt3">
<span<?php echo $ivf_stimulation_chart->USGRt3->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt4->Visible) { // USGRt4 ?>
		<td<?php echo $ivf_stimulation_chart->USGRt4->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGRt4" class="ivf_stimulation_chart_USGRt4">
<span<?php echo $ivf_stimulation_chart->USGRt4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt5->Visible) { // USGRt5 ?>
		<td<?php echo $ivf_stimulation_chart->USGRt5->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGRt5" class="ivf_stimulation_chart_USGRt5">
<span<?php echo $ivf_stimulation_chart->USGRt5->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt6->Visible) { // USGRt6 ?>
		<td<?php echo $ivf_stimulation_chart->USGRt6->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGRt6" class="ivf_stimulation_chart_USGRt6">
<span<?php echo $ivf_stimulation_chart->USGRt6->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt6->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt7->Visible) { // USGRt7 ?>
		<td<?php echo $ivf_stimulation_chart->USGRt7->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGRt7" class="ivf_stimulation_chart_USGRt7">
<span<?php echo $ivf_stimulation_chart->USGRt7->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt7->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt8->Visible) { // USGRt8 ?>
		<td<?php echo $ivf_stimulation_chart->USGRt8->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGRt8" class="ivf_stimulation_chart_USGRt8">
<span<?php echo $ivf_stimulation_chart->USGRt8->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt8->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt9->Visible) { // USGRt9 ?>
		<td<?php echo $ivf_stimulation_chart->USGRt9->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGRt9" class="ivf_stimulation_chart_USGRt9">
<span<?php echo $ivf_stimulation_chart->USGRt9->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt9->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt10->Visible) { // USGRt10 ?>
		<td<?php echo $ivf_stimulation_chart->USGRt10->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGRt10" class="ivf_stimulation_chart_USGRt10">
<span<?php echo $ivf_stimulation_chart->USGRt10->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt10->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt11->Visible) { // USGRt11 ?>
		<td<?php echo $ivf_stimulation_chart->USGRt11->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGRt11" class="ivf_stimulation_chart_USGRt11">
<span<?php echo $ivf_stimulation_chart->USGRt11->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt11->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt12->Visible) { // USGRt12 ?>
		<td<?php echo $ivf_stimulation_chart->USGRt12->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGRt12" class="ivf_stimulation_chart_USGRt12">
<span<?php echo $ivf_stimulation_chart->USGRt12->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt12->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt13->Visible) { // USGRt13 ?>
		<td<?php echo $ivf_stimulation_chart->USGRt13->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGRt13" class="ivf_stimulation_chart_USGRt13">
<span<?php echo $ivf_stimulation_chart->USGRt13->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt13->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt1->Visible) { // USGLt1 ?>
		<td<?php echo $ivf_stimulation_chart->USGLt1->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGLt1" class="ivf_stimulation_chart_USGLt1">
<span<?php echo $ivf_stimulation_chart->USGLt1->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt2->Visible) { // USGLt2 ?>
		<td<?php echo $ivf_stimulation_chart->USGLt2->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGLt2" class="ivf_stimulation_chart_USGLt2">
<span<?php echo $ivf_stimulation_chart->USGLt2->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt3->Visible) { // USGLt3 ?>
		<td<?php echo $ivf_stimulation_chart->USGLt3->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGLt3" class="ivf_stimulation_chart_USGLt3">
<span<?php echo $ivf_stimulation_chart->USGLt3->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt4->Visible) { // USGLt4 ?>
		<td<?php echo $ivf_stimulation_chart->USGLt4->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGLt4" class="ivf_stimulation_chart_USGLt4">
<span<?php echo $ivf_stimulation_chart->USGLt4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt5->Visible) { // USGLt5 ?>
		<td<?php echo $ivf_stimulation_chart->USGLt5->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGLt5" class="ivf_stimulation_chart_USGLt5">
<span<?php echo $ivf_stimulation_chart->USGLt5->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt6->Visible) { // USGLt6 ?>
		<td<?php echo $ivf_stimulation_chart->USGLt6->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGLt6" class="ivf_stimulation_chart_USGLt6">
<span<?php echo $ivf_stimulation_chart->USGLt6->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt6->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt7->Visible) { // USGLt7 ?>
		<td<?php echo $ivf_stimulation_chart->USGLt7->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGLt7" class="ivf_stimulation_chart_USGLt7">
<span<?php echo $ivf_stimulation_chart->USGLt7->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt7->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt8->Visible) { // USGLt8 ?>
		<td<?php echo $ivf_stimulation_chart->USGLt8->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGLt8" class="ivf_stimulation_chart_USGLt8">
<span<?php echo $ivf_stimulation_chart->USGLt8->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt8->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt9->Visible) { // USGLt9 ?>
		<td<?php echo $ivf_stimulation_chart->USGLt9->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGLt9" class="ivf_stimulation_chart_USGLt9">
<span<?php echo $ivf_stimulation_chart->USGLt9->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt9->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt10->Visible) { // USGLt10 ?>
		<td<?php echo $ivf_stimulation_chart->USGLt10->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGLt10" class="ivf_stimulation_chart_USGLt10">
<span<?php echo $ivf_stimulation_chart->USGLt10->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt10->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt11->Visible) { // USGLt11 ?>
		<td<?php echo $ivf_stimulation_chart->USGLt11->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGLt11" class="ivf_stimulation_chart_USGLt11">
<span<?php echo $ivf_stimulation_chart->USGLt11->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt11->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt12->Visible) { // USGLt12 ?>
		<td<?php echo $ivf_stimulation_chart->USGLt12->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGLt12" class="ivf_stimulation_chart_USGLt12">
<span<?php echo $ivf_stimulation_chart->USGLt12->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt12->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt13->Visible) { // USGLt13 ?>
		<td<?php echo $ivf_stimulation_chart->USGLt13->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGLt13" class="ivf_stimulation_chart_USGLt13">
<span<?php echo $ivf_stimulation_chart->USGLt13->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt13->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM1->Visible) { // EM1 ?>
		<td<?php echo $ivf_stimulation_chart->EM1->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_EM1" class="ivf_stimulation_chart_EM1">
<span<?php echo $ivf_stimulation_chart->EM1->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM2->Visible) { // EM2 ?>
		<td<?php echo $ivf_stimulation_chart->EM2->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_EM2" class="ivf_stimulation_chart_EM2">
<span<?php echo $ivf_stimulation_chart->EM2->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM3->Visible) { // EM3 ?>
		<td<?php echo $ivf_stimulation_chart->EM3->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_EM3" class="ivf_stimulation_chart_EM3">
<span<?php echo $ivf_stimulation_chart->EM3->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM4->Visible) { // EM4 ?>
		<td<?php echo $ivf_stimulation_chart->EM4->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_EM4" class="ivf_stimulation_chart_EM4">
<span<?php echo $ivf_stimulation_chart->EM4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM5->Visible) { // EM5 ?>
		<td<?php echo $ivf_stimulation_chart->EM5->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_EM5" class="ivf_stimulation_chart_EM5">
<span<?php echo $ivf_stimulation_chart->EM5->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM6->Visible) { // EM6 ?>
		<td<?php echo $ivf_stimulation_chart->EM6->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_EM6" class="ivf_stimulation_chart_EM6">
<span<?php echo $ivf_stimulation_chart->EM6->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM6->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM7->Visible) { // EM7 ?>
		<td<?php echo $ivf_stimulation_chart->EM7->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_EM7" class="ivf_stimulation_chart_EM7">
<span<?php echo $ivf_stimulation_chart->EM7->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM7->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM8->Visible) { // EM8 ?>
		<td<?php echo $ivf_stimulation_chart->EM8->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_EM8" class="ivf_stimulation_chart_EM8">
<span<?php echo $ivf_stimulation_chart->EM8->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM8->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM9->Visible) { // EM9 ?>
		<td<?php echo $ivf_stimulation_chart->EM9->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_EM9" class="ivf_stimulation_chart_EM9">
<span<?php echo $ivf_stimulation_chart->EM9->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM9->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM10->Visible) { // EM10 ?>
		<td<?php echo $ivf_stimulation_chart->EM10->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_EM10" class="ivf_stimulation_chart_EM10">
<span<?php echo $ivf_stimulation_chart->EM10->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM10->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM11->Visible) { // EM11 ?>
		<td<?php echo $ivf_stimulation_chart->EM11->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_EM11" class="ivf_stimulation_chart_EM11">
<span<?php echo $ivf_stimulation_chart->EM11->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM11->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM12->Visible) { // EM12 ?>
		<td<?php echo $ivf_stimulation_chart->EM12->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_EM12" class="ivf_stimulation_chart_EM12">
<span<?php echo $ivf_stimulation_chart->EM12->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM12->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM13->Visible) { // EM13 ?>
		<td<?php echo $ivf_stimulation_chart->EM13->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_EM13" class="ivf_stimulation_chart_EM13">
<span<?php echo $ivf_stimulation_chart->EM13->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM13->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others1->Visible) { // Others1 ?>
		<td<?php echo $ivf_stimulation_chart->Others1->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Others1" class="ivf_stimulation_chart_Others1">
<span<?php echo $ivf_stimulation_chart->Others1->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others2->Visible) { // Others2 ?>
		<td<?php echo $ivf_stimulation_chart->Others2->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Others2" class="ivf_stimulation_chart_Others2">
<span<?php echo $ivf_stimulation_chart->Others2->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others3->Visible) { // Others3 ?>
		<td<?php echo $ivf_stimulation_chart->Others3->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Others3" class="ivf_stimulation_chart_Others3">
<span<?php echo $ivf_stimulation_chart->Others3->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others4->Visible) { // Others4 ?>
		<td<?php echo $ivf_stimulation_chart->Others4->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Others4" class="ivf_stimulation_chart_Others4">
<span<?php echo $ivf_stimulation_chart->Others4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others5->Visible) { // Others5 ?>
		<td<?php echo $ivf_stimulation_chart->Others5->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Others5" class="ivf_stimulation_chart_Others5">
<span<?php echo $ivf_stimulation_chart->Others5->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others6->Visible) { // Others6 ?>
		<td<?php echo $ivf_stimulation_chart->Others6->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Others6" class="ivf_stimulation_chart_Others6">
<span<?php echo $ivf_stimulation_chart->Others6->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others6->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others7->Visible) { // Others7 ?>
		<td<?php echo $ivf_stimulation_chart->Others7->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Others7" class="ivf_stimulation_chart_Others7">
<span<?php echo $ivf_stimulation_chart->Others7->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others7->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others8->Visible) { // Others8 ?>
		<td<?php echo $ivf_stimulation_chart->Others8->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Others8" class="ivf_stimulation_chart_Others8">
<span<?php echo $ivf_stimulation_chart->Others8->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others8->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others9->Visible) { // Others9 ?>
		<td<?php echo $ivf_stimulation_chart->Others9->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Others9" class="ivf_stimulation_chart_Others9">
<span<?php echo $ivf_stimulation_chart->Others9->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others9->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others10->Visible) { // Others10 ?>
		<td<?php echo $ivf_stimulation_chart->Others10->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Others10" class="ivf_stimulation_chart_Others10">
<span<?php echo $ivf_stimulation_chart->Others10->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others10->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others11->Visible) { // Others11 ?>
		<td<?php echo $ivf_stimulation_chart->Others11->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Others11" class="ivf_stimulation_chart_Others11">
<span<?php echo $ivf_stimulation_chart->Others11->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others11->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others12->Visible) { // Others12 ?>
		<td<?php echo $ivf_stimulation_chart->Others12->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Others12" class="ivf_stimulation_chart_Others12">
<span<?php echo $ivf_stimulation_chart->Others12->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others12->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others13->Visible) { // Others13 ?>
		<td<?php echo $ivf_stimulation_chart->Others13->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Others13" class="ivf_stimulation_chart_Others13">
<span<?php echo $ivf_stimulation_chart->Others13->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others13->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR1->Visible) { // DR1 ?>
		<td<?php echo $ivf_stimulation_chart->DR1->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_DR1" class="ivf_stimulation_chart_DR1">
<span<?php echo $ivf_stimulation_chart->DR1->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR2->Visible) { // DR2 ?>
		<td<?php echo $ivf_stimulation_chart->DR2->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_DR2" class="ivf_stimulation_chart_DR2">
<span<?php echo $ivf_stimulation_chart->DR2->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR3->Visible) { // DR3 ?>
		<td<?php echo $ivf_stimulation_chart->DR3->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_DR3" class="ivf_stimulation_chart_DR3">
<span<?php echo $ivf_stimulation_chart->DR3->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR4->Visible) { // DR4 ?>
		<td<?php echo $ivf_stimulation_chart->DR4->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_DR4" class="ivf_stimulation_chart_DR4">
<span<?php echo $ivf_stimulation_chart->DR4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR5->Visible) { // DR5 ?>
		<td<?php echo $ivf_stimulation_chart->DR5->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_DR5" class="ivf_stimulation_chart_DR5">
<span<?php echo $ivf_stimulation_chart->DR5->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR6->Visible) { // DR6 ?>
		<td<?php echo $ivf_stimulation_chart->DR6->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_DR6" class="ivf_stimulation_chart_DR6">
<span<?php echo $ivf_stimulation_chart->DR6->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR6->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR7->Visible) { // DR7 ?>
		<td<?php echo $ivf_stimulation_chart->DR7->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_DR7" class="ivf_stimulation_chart_DR7">
<span<?php echo $ivf_stimulation_chart->DR7->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR7->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR8->Visible) { // DR8 ?>
		<td<?php echo $ivf_stimulation_chart->DR8->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_DR8" class="ivf_stimulation_chart_DR8">
<span<?php echo $ivf_stimulation_chart->DR8->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR8->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR9->Visible) { // DR9 ?>
		<td<?php echo $ivf_stimulation_chart->DR9->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_DR9" class="ivf_stimulation_chart_DR9">
<span<?php echo $ivf_stimulation_chart->DR9->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR9->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR10->Visible) { // DR10 ?>
		<td<?php echo $ivf_stimulation_chart->DR10->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_DR10" class="ivf_stimulation_chart_DR10">
<span<?php echo $ivf_stimulation_chart->DR10->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR10->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR11->Visible) { // DR11 ?>
		<td<?php echo $ivf_stimulation_chart->DR11->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_DR11" class="ivf_stimulation_chart_DR11">
<span<?php echo $ivf_stimulation_chart->DR11->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR11->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR12->Visible) { // DR12 ?>
		<td<?php echo $ivf_stimulation_chart->DR12->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_DR12" class="ivf_stimulation_chart_DR12">
<span<?php echo $ivf_stimulation_chart->DR12->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR12->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR13->Visible) { // DR13 ?>
		<td<?php echo $ivf_stimulation_chart->DR13->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_DR13" class="ivf_stimulation_chart_DR13">
<span<?php echo $ivf_stimulation_chart->DR13->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR13->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->TidNo->Visible) { // TidNo ?>
		<td<?php echo $ivf_stimulation_chart->TidNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_TidNo" class="ivf_stimulation_chart_TidNo">
<span<?php echo $ivf_stimulation_chart->TidNo->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->TidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Convert->Visible) { // Convert ?>
		<td<?php echo $ivf_stimulation_chart->Convert->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Convert" class="ivf_stimulation_chart_Convert">
<span<?php echo $ivf_stimulation_chart->Convert->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Convert->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Consultant->Visible) { // Consultant ?>
		<td<?php echo $ivf_stimulation_chart->Consultant->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Consultant" class="ivf_stimulation_chart_Consultant">
<span<?php echo $ivf_stimulation_chart->Consultant->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Consultant->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
		<td<?php echo $ivf_stimulation_chart->InseminatinTechnique->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_InseminatinTechnique" class="ivf_stimulation_chart_InseminatinTechnique">
<span<?php echo $ivf_stimulation_chart->InseminatinTechnique->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->InseminatinTechnique->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->IndicationForART->Visible) { // IndicationForART ?>
		<td<?php echo $ivf_stimulation_chart->IndicationForART->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_IndicationForART" class="ivf_stimulation_chart_IndicationForART">
<span<?php echo $ivf_stimulation_chart->IndicationForART->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->IndicationForART->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Hysteroscopy->Visible) { // Hysteroscopy ?>
		<td<?php echo $ivf_stimulation_chart->Hysteroscopy->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Hysteroscopy" class="ivf_stimulation_chart_Hysteroscopy">
<span<?php echo $ivf_stimulation_chart->Hysteroscopy->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Hysteroscopy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EndometrialScratching->Visible) { // EndometrialScratching ?>
		<td<?php echo $ivf_stimulation_chart->EndometrialScratching->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_EndometrialScratching" class="ivf_stimulation_chart_EndometrialScratching">
<span<?php echo $ivf_stimulation_chart->EndometrialScratching->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EndometrialScratching->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->TrialCannulation->Visible) { // TrialCannulation ?>
		<td<?php echo $ivf_stimulation_chart->TrialCannulation->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_TrialCannulation" class="ivf_stimulation_chart_TrialCannulation">
<span<?php echo $ivf_stimulation_chart->TrialCannulation->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->TrialCannulation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CYCLETYPE->Visible) { // CYCLETYPE ?>
		<td<?php echo $ivf_stimulation_chart->CYCLETYPE->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_CYCLETYPE" class="ivf_stimulation_chart_CYCLETYPE">
<span<?php echo $ivf_stimulation_chart->CYCLETYPE->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CYCLETYPE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HRTCYCLE->Visible) { // HRTCYCLE ?>
		<td<?php echo $ivf_stimulation_chart->HRTCYCLE->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_HRTCYCLE" class="ivf_stimulation_chart_HRTCYCLE">
<span<?php echo $ivf_stimulation_chart->HRTCYCLE->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HRTCYCLE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
		<td<?php echo $ivf_stimulation_chart->OralEstrogenDosage->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_OralEstrogenDosage" class="ivf_stimulation_chart_OralEstrogenDosage">
<span<?php echo $ivf_stimulation_chart->OralEstrogenDosage->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->OralEstrogenDosage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
		<td<?php echo $ivf_stimulation_chart->VaginalEstrogen->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_VaginalEstrogen" class="ivf_stimulation_chart_VaginalEstrogen">
<span<?php echo $ivf_stimulation_chart->VaginalEstrogen->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->VaginalEstrogen->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GCSF->Visible) { // GCSF ?>
		<td<?php echo $ivf_stimulation_chart->GCSF->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_GCSF" class="ivf_stimulation_chart_GCSF">
<span<?php echo $ivf_stimulation_chart->GCSF->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GCSF->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->ActivatedPRP->Visible) { // ActivatedPRP ?>
		<td<?php echo $ivf_stimulation_chart->ActivatedPRP->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_ActivatedPRP" class="ivf_stimulation_chart_ActivatedPRP">
<span<?php echo $ivf_stimulation_chart->ActivatedPRP->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ActivatedPRP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->UCLcm->Visible) { // UCLcm ?>
		<td<?php echo $ivf_stimulation_chart->UCLcm->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_UCLcm" class="ivf_stimulation_chart_UCLcm">
<span<?php echo $ivf_stimulation_chart->UCLcm->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->UCLcm->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DATOFEMBRYOTRANSFER->Visible) { // DATOFEMBRYOTRANSFER ?>
		<td<?php echo $ivf_stimulation_chart->DATOFEMBRYOTRANSFER->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_DATOFEMBRYOTRANSFER" class="ivf_stimulation_chart_DATOFEMBRYOTRANSFER">
<span<?php echo $ivf_stimulation_chart->DATOFEMBRYOTRANSFER->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DATOFEMBRYOTRANSFER->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
		<td<?php echo $ivf_stimulation_chart->DAYOFEMBRYOTRANSFER->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_DAYOFEMBRYOTRANSFER" class="ivf_stimulation_chart_DAYOFEMBRYOTRANSFER">
<span<?php echo $ivf_stimulation_chart->DAYOFEMBRYOTRANSFER->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DAYOFEMBRYOTRANSFER->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
		<td<?php echo $ivf_stimulation_chart->NOOFEMBRYOSTHAWED->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_NOOFEMBRYOSTHAWED" class="ivf_stimulation_chart_NOOFEMBRYOSTHAWED">
<span<?php echo $ivf_stimulation_chart->NOOFEMBRYOSTHAWED->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->NOOFEMBRYOSTHAWED->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
		<td<?php echo $ivf_stimulation_chart->NOOFEMBRYOSTRANSFERRED->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED" class="ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED">
<span<?php echo $ivf_stimulation_chart->NOOFEMBRYOSTRANSFERRED->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->NOOFEMBRYOSTRANSFERRED->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
		<td<?php echo $ivf_stimulation_chart->DAYOFEMBRYOS->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_DAYOFEMBRYOS" class="ivf_stimulation_chart_DAYOFEMBRYOS">
<span<?php echo $ivf_stimulation_chart->DAYOFEMBRYOS->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DAYOFEMBRYOS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
		<td<?php echo $ivf_stimulation_chart->CRYOPRESERVEDEMBRYOS->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS" class="ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS">
<span<?php echo $ivf_stimulation_chart->CRYOPRESERVEDEMBRYOS->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CRYOPRESERVEDEMBRYOS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->ViaAdmin->Visible) { // ViaAdmin ?>
		<td<?php echo $ivf_stimulation_chart->ViaAdmin->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_ViaAdmin" class="ivf_stimulation_chart_ViaAdmin">
<span<?php echo $ivf_stimulation_chart->ViaAdmin->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ViaAdmin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->ViaStartDateTime->Visible) { // ViaStartDateTime ?>
		<td<?php echo $ivf_stimulation_chart->ViaStartDateTime->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_ViaStartDateTime" class="ivf_stimulation_chart_ViaStartDateTime">
<span<?php echo $ivf_stimulation_chart->ViaStartDateTime->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ViaStartDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->ViaDose->Visible) { // ViaDose ?>
		<td<?php echo $ivf_stimulation_chart->ViaDose->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_ViaDose" class="ivf_stimulation_chart_ViaDose">
<span<?php echo $ivf_stimulation_chart->ViaDose->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ViaDose->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->AllFreeze->Visible) { // AllFreeze ?>
		<td<?php echo $ivf_stimulation_chart->AllFreeze->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_AllFreeze" class="ivf_stimulation_chart_AllFreeze">
<span<?php echo $ivf_stimulation_chart->AllFreeze->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->AllFreeze->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->TreatmentCancel->Visible) { // TreatmentCancel ?>
		<td<?php echo $ivf_stimulation_chart->TreatmentCancel->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_TreatmentCancel" class="ivf_stimulation_chart_TreatmentCancel">
<span<?php echo $ivf_stimulation_chart->TreatmentCancel->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->TreatmentCancel->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->ProgesteroneAdmin->Visible) { // ProgesteroneAdmin ?>
		<td<?php echo $ivf_stimulation_chart->ProgesteroneAdmin->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_ProgesteroneAdmin" class="ivf_stimulation_chart_ProgesteroneAdmin">
<span<?php echo $ivf_stimulation_chart->ProgesteroneAdmin->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ProgesteroneAdmin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->ProgesteroneStart->Visible) { // ProgesteroneStart ?>
		<td<?php echo $ivf_stimulation_chart->ProgesteroneStart->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_ProgesteroneStart" class="ivf_stimulation_chart_ProgesteroneStart">
<span<?php echo $ivf_stimulation_chart->ProgesteroneStart->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ProgesteroneStart->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->ProgesteroneDose->Visible) { // ProgesteroneDose ?>
		<td<?php echo $ivf_stimulation_chart->ProgesteroneDose->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_ProgesteroneDose" class="ivf_stimulation_chart_ProgesteroneDose">
<span<?php echo $ivf_stimulation_chart->ProgesteroneDose->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ProgesteroneDose->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate14->Visible) { // StChDate14 ?>
		<td<?php echo $ivf_stimulation_chart->StChDate14->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StChDate14" class="ivf_stimulation_chart_StChDate14">
<span<?php echo $ivf_stimulation_chart->StChDate14->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate14->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate15->Visible) { // StChDate15 ?>
		<td<?php echo $ivf_stimulation_chart->StChDate15->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StChDate15" class="ivf_stimulation_chart_StChDate15">
<span<?php echo $ivf_stimulation_chart->StChDate15->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate15->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate16->Visible) { // StChDate16 ?>
		<td<?php echo $ivf_stimulation_chart->StChDate16->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StChDate16" class="ivf_stimulation_chart_StChDate16">
<span<?php echo $ivf_stimulation_chart->StChDate16->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate16->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate17->Visible) { // StChDate17 ?>
		<td<?php echo $ivf_stimulation_chart->StChDate17->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StChDate17" class="ivf_stimulation_chart_StChDate17">
<span<?php echo $ivf_stimulation_chart->StChDate17->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate17->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate18->Visible) { // StChDate18 ?>
		<td<?php echo $ivf_stimulation_chart->StChDate18->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StChDate18" class="ivf_stimulation_chart_StChDate18">
<span<?php echo $ivf_stimulation_chart->StChDate18->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate18->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate19->Visible) { // StChDate19 ?>
		<td<?php echo $ivf_stimulation_chart->StChDate19->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StChDate19" class="ivf_stimulation_chart_StChDate19">
<span<?php echo $ivf_stimulation_chart->StChDate19->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate19->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate20->Visible) { // StChDate20 ?>
		<td<?php echo $ivf_stimulation_chart->StChDate20->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StChDate20" class="ivf_stimulation_chart_StChDate20">
<span<?php echo $ivf_stimulation_chart->StChDate20->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate20->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate21->Visible) { // StChDate21 ?>
		<td<?php echo $ivf_stimulation_chart->StChDate21->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StChDate21" class="ivf_stimulation_chart_StChDate21">
<span<?php echo $ivf_stimulation_chart->StChDate21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate21->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate22->Visible) { // StChDate22 ?>
		<td<?php echo $ivf_stimulation_chart->StChDate22->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StChDate22" class="ivf_stimulation_chart_StChDate22">
<span<?php echo $ivf_stimulation_chart->StChDate22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate22->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate23->Visible) { // StChDate23 ?>
		<td<?php echo $ivf_stimulation_chart->StChDate23->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StChDate23" class="ivf_stimulation_chart_StChDate23">
<span<?php echo $ivf_stimulation_chart->StChDate23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate23->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate24->Visible) { // StChDate24 ?>
		<td<?php echo $ivf_stimulation_chart->StChDate24->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StChDate24" class="ivf_stimulation_chart_StChDate24">
<span<?php echo $ivf_stimulation_chart->StChDate24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate24->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate25->Visible) { // StChDate25 ?>
		<td<?php echo $ivf_stimulation_chart->StChDate25->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StChDate25" class="ivf_stimulation_chart_StChDate25">
<span<?php echo $ivf_stimulation_chart->StChDate25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate25->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay14->Visible) { // CycleDay14 ?>
		<td<?php echo $ivf_stimulation_chart->CycleDay14->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_CycleDay14" class="ivf_stimulation_chart_CycleDay14">
<span<?php echo $ivf_stimulation_chart->CycleDay14->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay14->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay15->Visible) { // CycleDay15 ?>
		<td<?php echo $ivf_stimulation_chart->CycleDay15->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_CycleDay15" class="ivf_stimulation_chart_CycleDay15">
<span<?php echo $ivf_stimulation_chart->CycleDay15->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay15->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay16->Visible) { // CycleDay16 ?>
		<td<?php echo $ivf_stimulation_chart->CycleDay16->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_CycleDay16" class="ivf_stimulation_chart_CycleDay16">
<span<?php echo $ivf_stimulation_chart->CycleDay16->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay16->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay17->Visible) { // CycleDay17 ?>
		<td<?php echo $ivf_stimulation_chart->CycleDay17->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_CycleDay17" class="ivf_stimulation_chart_CycleDay17">
<span<?php echo $ivf_stimulation_chart->CycleDay17->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay17->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay18->Visible) { // CycleDay18 ?>
		<td<?php echo $ivf_stimulation_chart->CycleDay18->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_CycleDay18" class="ivf_stimulation_chart_CycleDay18">
<span<?php echo $ivf_stimulation_chart->CycleDay18->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay18->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay19->Visible) { // CycleDay19 ?>
		<td<?php echo $ivf_stimulation_chart->CycleDay19->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_CycleDay19" class="ivf_stimulation_chart_CycleDay19">
<span<?php echo $ivf_stimulation_chart->CycleDay19->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay19->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay20->Visible) { // CycleDay20 ?>
		<td<?php echo $ivf_stimulation_chart->CycleDay20->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_CycleDay20" class="ivf_stimulation_chart_CycleDay20">
<span<?php echo $ivf_stimulation_chart->CycleDay20->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay20->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay21->Visible) { // CycleDay21 ?>
		<td<?php echo $ivf_stimulation_chart->CycleDay21->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_CycleDay21" class="ivf_stimulation_chart_CycleDay21">
<span<?php echo $ivf_stimulation_chart->CycleDay21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay21->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay22->Visible) { // CycleDay22 ?>
		<td<?php echo $ivf_stimulation_chart->CycleDay22->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_CycleDay22" class="ivf_stimulation_chart_CycleDay22">
<span<?php echo $ivf_stimulation_chart->CycleDay22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay22->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay23->Visible) { // CycleDay23 ?>
		<td<?php echo $ivf_stimulation_chart->CycleDay23->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_CycleDay23" class="ivf_stimulation_chart_CycleDay23">
<span<?php echo $ivf_stimulation_chart->CycleDay23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay23->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay24->Visible) { // CycleDay24 ?>
		<td<?php echo $ivf_stimulation_chart->CycleDay24->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_CycleDay24" class="ivf_stimulation_chart_CycleDay24">
<span<?php echo $ivf_stimulation_chart->CycleDay24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay24->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay25->Visible) { // CycleDay25 ?>
		<td<?php echo $ivf_stimulation_chart->CycleDay25->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_CycleDay25" class="ivf_stimulation_chart_CycleDay25">
<span<?php echo $ivf_stimulation_chart->CycleDay25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay25->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay14->Visible) { // StimulationDay14 ?>
		<td<?php echo $ivf_stimulation_chart->StimulationDay14->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StimulationDay14" class="ivf_stimulation_chart_StimulationDay14">
<span<?php echo $ivf_stimulation_chart->StimulationDay14->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay14->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay15->Visible) { // StimulationDay15 ?>
		<td<?php echo $ivf_stimulation_chart->StimulationDay15->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StimulationDay15" class="ivf_stimulation_chart_StimulationDay15">
<span<?php echo $ivf_stimulation_chart->StimulationDay15->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay15->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay16->Visible) { // StimulationDay16 ?>
		<td<?php echo $ivf_stimulation_chart->StimulationDay16->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StimulationDay16" class="ivf_stimulation_chart_StimulationDay16">
<span<?php echo $ivf_stimulation_chart->StimulationDay16->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay16->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay17->Visible) { // StimulationDay17 ?>
		<td<?php echo $ivf_stimulation_chart->StimulationDay17->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StimulationDay17" class="ivf_stimulation_chart_StimulationDay17">
<span<?php echo $ivf_stimulation_chart->StimulationDay17->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay17->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay18->Visible) { // StimulationDay18 ?>
		<td<?php echo $ivf_stimulation_chart->StimulationDay18->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StimulationDay18" class="ivf_stimulation_chart_StimulationDay18">
<span<?php echo $ivf_stimulation_chart->StimulationDay18->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay18->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay19->Visible) { // StimulationDay19 ?>
		<td<?php echo $ivf_stimulation_chart->StimulationDay19->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StimulationDay19" class="ivf_stimulation_chart_StimulationDay19">
<span<?php echo $ivf_stimulation_chart->StimulationDay19->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay19->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay20->Visible) { // StimulationDay20 ?>
		<td<?php echo $ivf_stimulation_chart->StimulationDay20->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StimulationDay20" class="ivf_stimulation_chart_StimulationDay20">
<span<?php echo $ivf_stimulation_chart->StimulationDay20->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay20->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay21->Visible) { // StimulationDay21 ?>
		<td<?php echo $ivf_stimulation_chart->StimulationDay21->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StimulationDay21" class="ivf_stimulation_chart_StimulationDay21">
<span<?php echo $ivf_stimulation_chart->StimulationDay21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay21->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay22->Visible) { // StimulationDay22 ?>
		<td<?php echo $ivf_stimulation_chart->StimulationDay22->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StimulationDay22" class="ivf_stimulation_chart_StimulationDay22">
<span<?php echo $ivf_stimulation_chart->StimulationDay22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay22->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay23->Visible) { // StimulationDay23 ?>
		<td<?php echo $ivf_stimulation_chart->StimulationDay23->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StimulationDay23" class="ivf_stimulation_chart_StimulationDay23">
<span<?php echo $ivf_stimulation_chart->StimulationDay23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay23->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay24->Visible) { // StimulationDay24 ?>
		<td<?php echo $ivf_stimulation_chart->StimulationDay24->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StimulationDay24" class="ivf_stimulation_chart_StimulationDay24">
<span<?php echo $ivf_stimulation_chart->StimulationDay24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay24->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay25->Visible) { // StimulationDay25 ?>
		<td<?php echo $ivf_stimulation_chart->StimulationDay25->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_StimulationDay25" class="ivf_stimulation_chart_StimulationDay25">
<span<?php echo $ivf_stimulation_chart->StimulationDay25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay25->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet14->Visible) { // Tablet14 ?>
		<td<?php echo $ivf_stimulation_chart->Tablet14->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Tablet14" class="ivf_stimulation_chart_Tablet14">
<span<?php echo $ivf_stimulation_chart->Tablet14->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet14->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet15->Visible) { // Tablet15 ?>
		<td<?php echo $ivf_stimulation_chart->Tablet15->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Tablet15" class="ivf_stimulation_chart_Tablet15">
<span<?php echo $ivf_stimulation_chart->Tablet15->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet15->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet16->Visible) { // Tablet16 ?>
		<td<?php echo $ivf_stimulation_chart->Tablet16->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Tablet16" class="ivf_stimulation_chart_Tablet16">
<span<?php echo $ivf_stimulation_chart->Tablet16->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet16->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet17->Visible) { // Tablet17 ?>
		<td<?php echo $ivf_stimulation_chart->Tablet17->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Tablet17" class="ivf_stimulation_chart_Tablet17">
<span<?php echo $ivf_stimulation_chart->Tablet17->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet17->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet18->Visible) { // Tablet18 ?>
		<td<?php echo $ivf_stimulation_chart->Tablet18->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Tablet18" class="ivf_stimulation_chart_Tablet18">
<span<?php echo $ivf_stimulation_chart->Tablet18->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet18->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet19->Visible) { // Tablet19 ?>
		<td<?php echo $ivf_stimulation_chart->Tablet19->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Tablet19" class="ivf_stimulation_chart_Tablet19">
<span<?php echo $ivf_stimulation_chart->Tablet19->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet19->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet20->Visible) { // Tablet20 ?>
		<td<?php echo $ivf_stimulation_chart->Tablet20->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Tablet20" class="ivf_stimulation_chart_Tablet20">
<span<?php echo $ivf_stimulation_chart->Tablet20->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet20->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet21->Visible) { // Tablet21 ?>
		<td<?php echo $ivf_stimulation_chart->Tablet21->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Tablet21" class="ivf_stimulation_chart_Tablet21">
<span<?php echo $ivf_stimulation_chart->Tablet21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet21->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet22->Visible) { // Tablet22 ?>
		<td<?php echo $ivf_stimulation_chart->Tablet22->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Tablet22" class="ivf_stimulation_chart_Tablet22">
<span<?php echo $ivf_stimulation_chart->Tablet22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet22->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet23->Visible) { // Tablet23 ?>
		<td<?php echo $ivf_stimulation_chart->Tablet23->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Tablet23" class="ivf_stimulation_chart_Tablet23">
<span<?php echo $ivf_stimulation_chart->Tablet23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet23->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet24->Visible) { // Tablet24 ?>
		<td<?php echo $ivf_stimulation_chart->Tablet24->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Tablet24" class="ivf_stimulation_chart_Tablet24">
<span<?php echo $ivf_stimulation_chart->Tablet24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet24->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet25->Visible) { // Tablet25 ?>
		<td<?php echo $ivf_stimulation_chart->Tablet25->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Tablet25" class="ivf_stimulation_chart_Tablet25">
<span<?php echo $ivf_stimulation_chart->Tablet25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet25->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH14->Visible) { // RFSH14 ?>
		<td<?php echo $ivf_stimulation_chart->RFSH14->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_RFSH14" class="ivf_stimulation_chart_RFSH14">
<span<?php echo $ivf_stimulation_chart->RFSH14->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH14->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH15->Visible) { // RFSH15 ?>
		<td<?php echo $ivf_stimulation_chart->RFSH15->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_RFSH15" class="ivf_stimulation_chart_RFSH15">
<span<?php echo $ivf_stimulation_chart->RFSH15->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH15->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH16->Visible) { // RFSH16 ?>
		<td<?php echo $ivf_stimulation_chart->RFSH16->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_RFSH16" class="ivf_stimulation_chart_RFSH16">
<span<?php echo $ivf_stimulation_chart->RFSH16->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH16->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH17->Visible) { // RFSH17 ?>
		<td<?php echo $ivf_stimulation_chart->RFSH17->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_RFSH17" class="ivf_stimulation_chart_RFSH17">
<span<?php echo $ivf_stimulation_chart->RFSH17->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH17->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH18->Visible) { // RFSH18 ?>
		<td<?php echo $ivf_stimulation_chart->RFSH18->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_RFSH18" class="ivf_stimulation_chart_RFSH18">
<span<?php echo $ivf_stimulation_chart->RFSH18->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH18->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH19->Visible) { // RFSH19 ?>
		<td<?php echo $ivf_stimulation_chart->RFSH19->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_RFSH19" class="ivf_stimulation_chart_RFSH19">
<span<?php echo $ivf_stimulation_chart->RFSH19->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH19->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH20->Visible) { // RFSH20 ?>
		<td<?php echo $ivf_stimulation_chart->RFSH20->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_RFSH20" class="ivf_stimulation_chart_RFSH20">
<span<?php echo $ivf_stimulation_chart->RFSH20->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH20->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH21->Visible) { // RFSH21 ?>
		<td<?php echo $ivf_stimulation_chart->RFSH21->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_RFSH21" class="ivf_stimulation_chart_RFSH21">
<span<?php echo $ivf_stimulation_chart->RFSH21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH21->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH22->Visible) { // RFSH22 ?>
		<td<?php echo $ivf_stimulation_chart->RFSH22->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_RFSH22" class="ivf_stimulation_chart_RFSH22">
<span<?php echo $ivf_stimulation_chart->RFSH22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH22->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH23->Visible) { // RFSH23 ?>
		<td<?php echo $ivf_stimulation_chart->RFSH23->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_RFSH23" class="ivf_stimulation_chart_RFSH23">
<span<?php echo $ivf_stimulation_chart->RFSH23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH23->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH24->Visible) { // RFSH24 ?>
		<td<?php echo $ivf_stimulation_chart->RFSH24->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_RFSH24" class="ivf_stimulation_chart_RFSH24">
<span<?php echo $ivf_stimulation_chart->RFSH24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH24->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH25->Visible) { // RFSH25 ?>
		<td<?php echo $ivf_stimulation_chart->RFSH25->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_RFSH25" class="ivf_stimulation_chart_RFSH25">
<span<?php echo $ivf_stimulation_chart->RFSH25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH25->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG14->Visible) { // HMG14 ?>
		<td<?php echo $ivf_stimulation_chart->HMG14->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_HMG14" class="ivf_stimulation_chart_HMG14">
<span<?php echo $ivf_stimulation_chart->HMG14->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG14->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG15->Visible) { // HMG15 ?>
		<td<?php echo $ivf_stimulation_chart->HMG15->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_HMG15" class="ivf_stimulation_chart_HMG15">
<span<?php echo $ivf_stimulation_chart->HMG15->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG15->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG16->Visible) { // HMG16 ?>
		<td<?php echo $ivf_stimulation_chart->HMG16->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_HMG16" class="ivf_stimulation_chart_HMG16">
<span<?php echo $ivf_stimulation_chart->HMG16->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG16->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG17->Visible) { // HMG17 ?>
		<td<?php echo $ivf_stimulation_chart->HMG17->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_HMG17" class="ivf_stimulation_chart_HMG17">
<span<?php echo $ivf_stimulation_chart->HMG17->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG17->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG18->Visible) { // HMG18 ?>
		<td<?php echo $ivf_stimulation_chart->HMG18->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_HMG18" class="ivf_stimulation_chart_HMG18">
<span<?php echo $ivf_stimulation_chart->HMG18->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG18->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG19->Visible) { // HMG19 ?>
		<td<?php echo $ivf_stimulation_chart->HMG19->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_HMG19" class="ivf_stimulation_chart_HMG19">
<span<?php echo $ivf_stimulation_chart->HMG19->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG19->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG20->Visible) { // HMG20 ?>
		<td<?php echo $ivf_stimulation_chart->HMG20->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_HMG20" class="ivf_stimulation_chart_HMG20">
<span<?php echo $ivf_stimulation_chart->HMG20->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG20->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG21->Visible) { // HMG21 ?>
		<td<?php echo $ivf_stimulation_chart->HMG21->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_HMG21" class="ivf_stimulation_chart_HMG21">
<span<?php echo $ivf_stimulation_chart->HMG21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG21->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG22->Visible) { // HMG22 ?>
		<td<?php echo $ivf_stimulation_chart->HMG22->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_HMG22" class="ivf_stimulation_chart_HMG22">
<span<?php echo $ivf_stimulation_chart->HMG22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG22->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG23->Visible) { // HMG23 ?>
		<td<?php echo $ivf_stimulation_chart->HMG23->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_HMG23" class="ivf_stimulation_chart_HMG23">
<span<?php echo $ivf_stimulation_chart->HMG23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG23->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG24->Visible) { // HMG24 ?>
		<td<?php echo $ivf_stimulation_chart->HMG24->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_HMG24" class="ivf_stimulation_chart_HMG24">
<span<?php echo $ivf_stimulation_chart->HMG24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG24->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG25->Visible) { // HMG25 ?>
		<td<?php echo $ivf_stimulation_chart->HMG25->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_HMG25" class="ivf_stimulation_chart_HMG25">
<span<?php echo $ivf_stimulation_chart->HMG25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG25->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH14->Visible) { // GnRH14 ?>
		<td<?php echo $ivf_stimulation_chart->GnRH14->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_GnRH14" class="ivf_stimulation_chart_GnRH14">
<span<?php echo $ivf_stimulation_chart->GnRH14->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH14->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH15->Visible) { // GnRH15 ?>
		<td<?php echo $ivf_stimulation_chart->GnRH15->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_GnRH15" class="ivf_stimulation_chart_GnRH15">
<span<?php echo $ivf_stimulation_chart->GnRH15->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH15->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH16->Visible) { // GnRH16 ?>
		<td<?php echo $ivf_stimulation_chart->GnRH16->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_GnRH16" class="ivf_stimulation_chart_GnRH16">
<span<?php echo $ivf_stimulation_chart->GnRH16->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH16->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH17->Visible) { // GnRH17 ?>
		<td<?php echo $ivf_stimulation_chart->GnRH17->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_GnRH17" class="ivf_stimulation_chart_GnRH17">
<span<?php echo $ivf_stimulation_chart->GnRH17->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH17->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH18->Visible) { // GnRH18 ?>
		<td<?php echo $ivf_stimulation_chart->GnRH18->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_GnRH18" class="ivf_stimulation_chart_GnRH18">
<span<?php echo $ivf_stimulation_chart->GnRH18->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH18->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH19->Visible) { // GnRH19 ?>
		<td<?php echo $ivf_stimulation_chart->GnRH19->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_GnRH19" class="ivf_stimulation_chart_GnRH19">
<span<?php echo $ivf_stimulation_chart->GnRH19->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH19->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH20->Visible) { // GnRH20 ?>
		<td<?php echo $ivf_stimulation_chart->GnRH20->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_GnRH20" class="ivf_stimulation_chart_GnRH20">
<span<?php echo $ivf_stimulation_chart->GnRH20->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH20->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH21->Visible) { // GnRH21 ?>
		<td<?php echo $ivf_stimulation_chart->GnRH21->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_GnRH21" class="ivf_stimulation_chart_GnRH21">
<span<?php echo $ivf_stimulation_chart->GnRH21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH21->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH22->Visible) { // GnRH22 ?>
		<td<?php echo $ivf_stimulation_chart->GnRH22->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_GnRH22" class="ivf_stimulation_chart_GnRH22">
<span<?php echo $ivf_stimulation_chart->GnRH22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH22->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH23->Visible) { // GnRH23 ?>
		<td<?php echo $ivf_stimulation_chart->GnRH23->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_GnRH23" class="ivf_stimulation_chart_GnRH23">
<span<?php echo $ivf_stimulation_chart->GnRH23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH23->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH24->Visible) { // GnRH24 ?>
		<td<?php echo $ivf_stimulation_chart->GnRH24->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_GnRH24" class="ivf_stimulation_chart_GnRH24">
<span<?php echo $ivf_stimulation_chart->GnRH24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH24->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH25->Visible) { // GnRH25 ?>
		<td<?php echo $ivf_stimulation_chart->GnRH25->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_GnRH25" class="ivf_stimulation_chart_GnRH25">
<span<?php echo $ivf_stimulation_chart->GnRH25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH25->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P414->Visible) { // P414 ?>
		<td<?php echo $ivf_stimulation_chart->P414->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_P414" class="ivf_stimulation_chart_P414">
<span<?php echo $ivf_stimulation_chart->P414->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P414->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P415->Visible) { // P415 ?>
		<td<?php echo $ivf_stimulation_chart->P415->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_P415" class="ivf_stimulation_chart_P415">
<span<?php echo $ivf_stimulation_chart->P415->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P415->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P416->Visible) { // P416 ?>
		<td<?php echo $ivf_stimulation_chart->P416->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_P416" class="ivf_stimulation_chart_P416">
<span<?php echo $ivf_stimulation_chart->P416->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P416->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P417->Visible) { // P417 ?>
		<td<?php echo $ivf_stimulation_chart->P417->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_P417" class="ivf_stimulation_chart_P417">
<span<?php echo $ivf_stimulation_chart->P417->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P417->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P418->Visible) { // P418 ?>
		<td<?php echo $ivf_stimulation_chart->P418->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_P418" class="ivf_stimulation_chart_P418">
<span<?php echo $ivf_stimulation_chart->P418->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P418->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P419->Visible) { // P419 ?>
		<td<?php echo $ivf_stimulation_chart->P419->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_P419" class="ivf_stimulation_chart_P419">
<span<?php echo $ivf_stimulation_chart->P419->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P419->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P420->Visible) { // P420 ?>
		<td<?php echo $ivf_stimulation_chart->P420->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_P420" class="ivf_stimulation_chart_P420">
<span<?php echo $ivf_stimulation_chart->P420->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P420->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P421->Visible) { // P421 ?>
		<td<?php echo $ivf_stimulation_chart->P421->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_P421" class="ivf_stimulation_chart_P421">
<span<?php echo $ivf_stimulation_chart->P421->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P421->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P422->Visible) { // P422 ?>
		<td<?php echo $ivf_stimulation_chart->P422->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_P422" class="ivf_stimulation_chart_P422">
<span<?php echo $ivf_stimulation_chart->P422->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P422->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P423->Visible) { // P423 ?>
		<td<?php echo $ivf_stimulation_chart->P423->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_P423" class="ivf_stimulation_chart_P423">
<span<?php echo $ivf_stimulation_chart->P423->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P423->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P424->Visible) { // P424 ?>
		<td<?php echo $ivf_stimulation_chart->P424->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_P424" class="ivf_stimulation_chart_P424">
<span<?php echo $ivf_stimulation_chart->P424->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P424->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->P425->Visible) { // P425 ?>
		<td<?php echo $ivf_stimulation_chart->P425->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_P425" class="ivf_stimulation_chart_P425">
<span<?php echo $ivf_stimulation_chart->P425->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P425->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt14->Visible) { // USGRt14 ?>
		<td<?php echo $ivf_stimulation_chart->USGRt14->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGRt14" class="ivf_stimulation_chart_USGRt14">
<span<?php echo $ivf_stimulation_chart->USGRt14->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt14->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt15->Visible) { // USGRt15 ?>
		<td<?php echo $ivf_stimulation_chart->USGRt15->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGRt15" class="ivf_stimulation_chart_USGRt15">
<span<?php echo $ivf_stimulation_chart->USGRt15->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt15->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt16->Visible) { // USGRt16 ?>
		<td<?php echo $ivf_stimulation_chart->USGRt16->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGRt16" class="ivf_stimulation_chart_USGRt16">
<span<?php echo $ivf_stimulation_chart->USGRt16->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt16->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt17->Visible) { // USGRt17 ?>
		<td<?php echo $ivf_stimulation_chart->USGRt17->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGRt17" class="ivf_stimulation_chart_USGRt17">
<span<?php echo $ivf_stimulation_chart->USGRt17->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt17->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt18->Visible) { // USGRt18 ?>
		<td<?php echo $ivf_stimulation_chart->USGRt18->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGRt18" class="ivf_stimulation_chart_USGRt18">
<span<?php echo $ivf_stimulation_chart->USGRt18->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt18->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt19->Visible) { // USGRt19 ?>
		<td<?php echo $ivf_stimulation_chart->USGRt19->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGRt19" class="ivf_stimulation_chart_USGRt19">
<span<?php echo $ivf_stimulation_chart->USGRt19->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt19->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt20->Visible) { // USGRt20 ?>
		<td<?php echo $ivf_stimulation_chart->USGRt20->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGRt20" class="ivf_stimulation_chart_USGRt20">
<span<?php echo $ivf_stimulation_chart->USGRt20->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt20->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt21->Visible) { // USGRt21 ?>
		<td<?php echo $ivf_stimulation_chart->USGRt21->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGRt21" class="ivf_stimulation_chart_USGRt21">
<span<?php echo $ivf_stimulation_chart->USGRt21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt21->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt22->Visible) { // USGRt22 ?>
		<td<?php echo $ivf_stimulation_chart->USGRt22->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGRt22" class="ivf_stimulation_chart_USGRt22">
<span<?php echo $ivf_stimulation_chart->USGRt22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt22->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt23->Visible) { // USGRt23 ?>
		<td<?php echo $ivf_stimulation_chart->USGRt23->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGRt23" class="ivf_stimulation_chart_USGRt23">
<span<?php echo $ivf_stimulation_chart->USGRt23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt23->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt24->Visible) { // USGRt24 ?>
		<td<?php echo $ivf_stimulation_chart->USGRt24->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGRt24" class="ivf_stimulation_chart_USGRt24">
<span<?php echo $ivf_stimulation_chart->USGRt24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt24->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt25->Visible) { // USGRt25 ?>
		<td<?php echo $ivf_stimulation_chart->USGRt25->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGRt25" class="ivf_stimulation_chart_USGRt25">
<span<?php echo $ivf_stimulation_chart->USGRt25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt25->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt14->Visible) { // USGLt14 ?>
		<td<?php echo $ivf_stimulation_chart->USGLt14->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGLt14" class="ivf_stimulation_chart_USGLt14">
<span<?php echo $ivf_stimulation_chart->USGLt14->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt14->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt15->Visible) { // USGLt15 ?>
		<td<?php echo $ivf_stimulation_chart->USGLt15->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGLt15" class="ivf_stimulation_chart_USGLt15">
<span<?php echo $ivf_stimulation_chart->USGLt15->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt15->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt16->Visible) { // USGLt16 ?>
		<td<?php echo $ivf_stimulation_chart->USGLt16->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGLt16" class="ivf_stimulation_chart_USGLt16">
<span<?php echo $ivf_stimulation_chart->USGLt16->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt16->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt17->Visible) { // USGLt17 ?>
		<td<?php echo $ivf_stimulation_chart->USGLt17->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGLt17" class="ivf_stimulation_chart_USGLt17">
<span<?php echo $ivf_stimulation_chart->USGLt17->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt17->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt18->Visible) { // USGLt18 ?>
		<td<?php echo $ivf_stimulation_chart->USGLt18->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGLt18" class="ivf_stimulation_chart_USGLt18">
<span<?php echo $ivf_stimulation_chart->USGLt18->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt18->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt19->Visible) { // USGLt19 ?>
		<td<?php echo $ivf_stimulation_chart->USGLt19->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGLt19" class="ivf_stimulation_chart_USGLt19">
<span<?php echo $ivf_stimulation_chart->USGLt19->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt19->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt20->Visible) { // USGLt20 ?>
		<td<?php echo $ivf_stimulation_chart->USGLt20->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGLt20" class="ivf_stimulation_chart_USGLt20">
<span<?php echo $ivf_stimulation_chart->USGLt20->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt20->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt21->Visible) { // USGLt21 ?>
		<td<?php echo $ivf_stimulation_chart->USGLt21->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGLt21" class="ivf_stimulation_chart_USGLt21">
<span<?php echo $ivf_stimulation_chart->USGLt21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt21->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt22->Visible) { // USGLt22 ?>
		<td<?php echo $ivf_stimulation_chart->USGLt22->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGLt22" class="ivf_stimulation_chart_USGLt22">
<span<?php echo $ivf_stimulation_chart->USGLt22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt22->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt23->Visible) { // USGLt23 ?>
		<td<?php echo $ivf_stimulation_chart->USGLt23->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGLt23" class="ivf_stimulation_chart_USGLt23">
<span<?php echo $ivf_stimulation_chart->USGLt23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt23->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt24->Visible) { // USGLt24 ?>
		<td<?php echo $ivf_stimulation_chart->USGLt24->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGLt24" class="ivf_stimulation_chart_USGLt24">
<span<?php echo $ivf_stimulation_chart->USGLt24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt24->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt25->Visible) { // USGLt25 ?>
		<td<?php echo $ivf_stimulation_chart->USGLt25->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_USGLt25" class="ivf_stimulation_chart_USGLt25">
<span<?php echo $ivf_stimulation_chart->USGLt25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt25->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM14->Visible) { // EM14 ?>
		<td<?php echo $ivf_stimulation_chart->EM14->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_EM14" class="ivf_stimulation_chart_EM14">
<span<?php echo $ivf_stimulation_chart->EM14->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM14->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM15->Visible) { // EM15 ?>
		<td<?php echo $ivf_stimulation_chart->EM15->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_EM15" class="ivf_stimulation_chart_EM15">
<span<?php echo $ivf_stimulation_chart->EM15->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM15->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM16->Visible) { // EM16 ?>
		<td<?php echo $ivf_stimulation_chart->EM16->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_EM16" class="ivf_stimulation_chart_EM16">
<span<?php echo $ivf_stimulation_chart->EM16->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM16->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM17->Visible) { // EM17 ?>
		<td<?php echo $ivf_stimulation_chart->EM17->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_EM17" class="ivf_stimulation_chart_EM17">
<span<?php echo $ivf_stimulation_chart->EM17->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM17->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM18->Visible) { // EM18 ?>
		<td<?php echo $ivf_stimulation_chart->EM18->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_EM18" class="ivf_stimulation_chart_EM18">
<span<?php echo $ivf_stimulation_chart->EM18->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM18->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM19->Visible) { // EM19 ?>
		<td<?php echo $ivf_stimulation_chart->EM19->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_EM19" class="ivf_stimulation_chart_EM19">
<span<?php echo $ivf_stimulation_chart->EM19->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM19->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM20->Visible) { // EM20 ?>
		<td<?php echo $ivf_stimulation_chart->EM20->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_EM20" class="ivf_stimulation_chart_EM20">
<span<?php echo $ivf_stimulation_chart->EM20->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM20->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM21->Visible) { // EM21 ?>
		<td<?php echo $ivf_stimulation_chart->EM21->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_EM21" class="ivf_stimulation_chart_EM21">
<span<?php echo $ivf_stimulation_chart->EM21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM21->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM22->Visible) { // EM22 ?>
		<td<?php echo $ivf_stimulation_chart->EM22->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_EM22" class="ivf_stimulation_chart_EM22">
<span<?php echo $ivf_stimulation_chart->EM22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM22->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM23->Visible) { // EM23 ?>
		<td<?php echo $ivf_stimulation_chart->EM23->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_EM23" class="ivf_stimulation_chart_EM23">
<span<?php echo $ivf_stimulation_chart->EM23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM23->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM24->Visible) { // EM24 ?>
		<td<?php echo $ivf_stimulation_chart->EM24->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_EM24" class="ivf_stimulation_chart_EM24">
<span<?php echo $ivf_stimulation_chart->EM24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM24->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM25->Visible) { // EM25 ?>
		<td<?php echo $ivf_stimulation_chart->EM25->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_EM25" class="ivf_stimulation_chart_EM25">
<span<?php echo $ivf_stimulation_chart->EM25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM25->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others14->Visible) { // Others14 ?>
		<td<?php echo $ivf_stimulation_chart->Others14->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Others14" class="ivf_stimulation_chart_Others14">
<span<?php echo $ivf_stimulation_chart->Others14->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others14->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others15->Visible) { // Others15 ?>
		<td<?php echo $ivf_stimulation_chart->Others15->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Others15" class="ivf_stimulation_chart_Others15">
<span<?php echo $ivf_stimulation_chart->Others15->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others15->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others16->Visible) { // Others16 ?>
		<td<?php echo $ivf_stimulation_chart->Others16->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Others16" class="ivf_stimulation_chart_Others16">
<span<?php echo $ivf_stimulation_chart->Others16->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others16->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others17->Visible) { // Others17 ?>
		<td<?php echo $ivf_stimulation_chart->Others17->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Others17" class="ivf_stimulation_chart_Others17">
<span<?php echo $ivf_stimulation_chart->Others17->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others17->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others18->Visible) { // Others18 ?>
		<td<?php echo $ivf_stimulation_chart->Others18->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Others18" class="ivf_stimulation_chart_Others18">
<span<?php echo $ivf_stimulation_chart->Others18->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others18->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others19->Visible) { // Others19 ?>
		<td<?php echo $ivf_stimulation_chart->Others19->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Others19" class="ivf_stimulation_chart_Others19">
<span<?php echo $ivf_stimulation_chart->Others19->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others19->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others20->Visible) { // Others20 ?>
		<td<?php echo $ivf_stimulation_chart->Others20->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Others20" class="ivf_stimulation_chart_Others20">
<span<?php echo $ivf_stimulation_chart->Others20->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others20->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others21->Visible) { // Others21 ?>
		<td<?php echo $ivf_stimulation_chart->Others21->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Others21" class="ivf_stimulation_chart_Others21">
<span<?php echo $ivf_stimulation_chart->Others21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others21->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others22->Visible) { // Others22 ?>
		<td<?php echo $ivf_stimulation_chart->Others22->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Others22" class="ivf_stimulation_chart_Others22">
<span<?php echo $ivf_stimulation_chart->Others22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others22->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others23->Visible) { // Others23 ?>
		<td<?php echo $ivf_stimulation_chart->Others23->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Others23" class="ivf_stimulation_chart_Others23">
<span<?php echo $ivf_stimulation_chart->Others23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others23->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others24->Visible) { // Others24 ?>
		<td<?php echo $ivf_stimulation_chart->Others24->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Others24" class="ivf_stimulation_chart_Others24">
<span<?php echo $ivf_stimulation_chart->Others24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others24->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others25->Visible) { // Others25 ?>
		<td<?php echo $ivf_stimulation_chart->Others25->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_Others25" class="ivf_stimulation_chart_Others25">
<span<?php echo $ivf_stimulation_chart->Others25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others25->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR14->Visible) { // DR14 ?>
		<td<?php echo $ivf_stimulation_chart->DR14->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_DR14" class="ivf_stimulation_chart_DR14">
<span<?php echo $ivf_stimulation_chart->DR14->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR14->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR15->Visible) { // DR15 ?>
		<td<?php echo $ivf_stimulation_chart->DR15->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_DR15" class="ivf_stimulation_chart_DR15">
<span<?php echo $ivf_stimulation_chart->DR15->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR15->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR16->Visible) { // DR16 ?>
		<td<?php echo $ivf_stimulation_chart->DR16->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_DR16" class="ivf_stimulation_chart_DR16">
<span<?php echo $ivf_stimulation_chart->DR16->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR16->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR17->Visible) { // DR17 ?>
		<td<?php echo $ivf_stimulation_chart->DR17->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_DR17" class="ivf_stimulation_chart_DR17">
<span<?php echo $ivf_stimulation_chart->DR17->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR17->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR18->Visible) { // DR18 ?>
		<td<?php echo $ivf_stimulation_chart->DR18->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_DR18" class="ivf_stimulation_chart_DR18">
<span<?php echo $ivf_stimulation_chart->DR18->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR18->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR19->Visible) { // DR19 ?>
		<td<?php echo $ivf_stimulation_chart->DR19->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_DR19" class="ivf_stimulation_chart_DR19">
<span<?php echo $ivf_stimulation_chart->DR19->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR19->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR20->Visible) { // DR20 ?>
		<td<?php echo $ivf_stimulation_chart->DR20->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_DR20" class="ivf_stimulation_chart_DR20">
<span<?php echo $ivf_stimulation_chart->DR20->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR20->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR21->Visible) { // DR21 ?>
		<td<?php echo $ivf_stimulation_chart->DR21->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_DR21" class="ivf_stimulation_chart_DR21">
<span<?php echo $ivf_stimulation_chart->DR21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR21->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR22->Visible) { // DR22 ?>
		<td<?php echo $ivf_stimulation_chart->DR22->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_DR22" class="ivf_stimulation_chart_DR22">
<span<?php echo $ivf_stimulation_chart->DR22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR22->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR23->Visible) { // DR23 ?>
		<td<?php echo $ivf_stimulation_chart->DR23->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_DR23" class="ivf_stimulation_chart_DR23">
<span<?php echo $ivf_stimulation_chart->DR23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR23->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR24->Visible) { // DR24 ?>
		<td<?php echo $ivf_stimulation_chart->DR24->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_DR24" class="ivf_stimulation_chart_DR24">
<span<?php echo $ivf_stimulation_chart->DR24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR24->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR25->Visible) { // DR25 ?>
		<td<?php echo $ivf_stimulation_chart->DR25->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_DR25" class="ivf_stimulation_chart_DR25">
<span<?php echo $ivf_stimulation_chart->DR25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR25->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E214->Visible) { // E214 ?>
		<td<?php echo $ivf_stimulation_chart->E214->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_E214" class="ivf_stimulation_chart_E214">
<span<?php echo $ivf_stimulation_chart->E214->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E214->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E215->Visible) { // E215 ?>
		<td<?php echo $ivf_stimulation_chart->E215->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_E215" class="ivf_stimulation_chart_E215">
<span<?php echo $ivf_stimulation_chart->E215->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E215->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E216->Visible) { // E216 ?>
		<td<?php echo $ivf_stimulation_chart->E216->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_E216" class="ivf_stimulation_chart_E216">
<span<?php echo $ivf_stimulation_chart->E216->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E216->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E217->Visible) { // E217 ?>
		<td<?php echo $ivf_stimulation_chart->E217->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_E217" class="ivf_stimulation_chart_E217">
<span<?php echo $ivf_stimulation_chart->E217->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E217->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E218->Visible) { // E218 ?>
		<td<?php echo $ivf_stimulation_chart->E218->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_E218" class="ivf_stimulation_chart_E218">
<span<?php echo $ivf_stimulation_chart->E218->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E218->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E219->Visible) { // E219 ?>
		<td<?php echo $ivf_stimulation_chart->E219->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_E219" class="ivf_stimulation_chart_E219">
<span<?php echo $ivf_stimulation_chart->E219->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E219->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E220->Visible) { // E220 ?>
		<td<?php echo $ivf_stimulation_chart->E220->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_E220" class="ivf_stimulation_chart_E220">
<span<?php echo $ivf_stimulation_chart->E220->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E220->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E221->Visible) { // E221 ?>
		<td<?php echo $ivf_stimulation_chart->E221->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_E221" class="ivf_stimulation_chart_E221">
<span<?php echo $ivf_stimulation_chart->E221->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E221->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E222->Visible) { // E222 ?>
		<td<?php echo $ivf_stimulation_chart->E222->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_E222" class="ivf_stimulation_chart_E222">
<span<?php echo $ivf_stimulation_chart->E222->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E222->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E223->Visible) { // E223 ?>
		<td<?php echo $ivf_stimulation_chart->E223->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_E223" class="ivf_stimulation_chart_E223">
<span<?php echo $ivf_stimulation_chart->E223->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E223->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E224->Visible) { // E224 ?>
		<td<?php echo $ivf_stimulation_chart->E224->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_E224" class="ivf_stimulation_chart_E224">
<span<?php echo $ivf_stimulation_chart->E224->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E224->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->E225->Visible) { // E225 ?>
		<td<?php echo $ivf_stimulation_chart->E225->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_E225" class="ivf_stimulation_chart_E225">
<span<?php echo $ivf_stimulation_chart->E225->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E225->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EEETTTDTE->Visible) { // EEETTTDTE ?>
		<td<?php echo $ivf_stimulation_chart->EEETTTDTE->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_EEETTTDTE" class="ivf_stimulation_chart_EEETTTDTE">
<span<?php echo $ivf_stimulation_chart->EEETTTDTE->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EEETTTDTE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->bhcgdate->Visible) { // bhcgdate ?>
		<td<?php echo $ivf_stimulation_chart->bhcgdate->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_bhcgdate" class="ivf_stimulation_chart_bhcgdate">
<span<?php echo $ivf_stimulation_chart->bhcgdate->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->bhcgdate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->TUBAL_PATENCY->Visible) { // TUBAL_PATENCY ?>
		<td<?php echo $ivf_stimulation_chart->TUBAL_PATENCY->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_TUBAL_PATENCY" class="ivf_stimulation_chart_TUBAL_PATENCY">
<span<?php echo $ivf_stimulation_chart->TUBAL_PATENCY->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->TUBAL_PATENCY->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->HSG->Visible) { // HSG ?>
		<td<?php echo $ivf_stimulation_chart->HSG->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_HSG" class="ivf_stimulation_chart_HSG">
<span<?php echo $ivf_stimulation_chart->HSG->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HSG->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->DHL->Visible) { // DHL ?>
		<td<?php echo $ivf_stimulation_chart->DHL->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_DHL" class="ivf_stimulation_chart_DHL">
<span<?php echo $ivf_stimulation_chart->DHL->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DHL->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->UTERINE_PROBLEMS->Visible) { // UTERINE_PROBLEMS ?>
		<td<?php echo $ivf_stimulation_chart->UTERINE_PROBLEMS->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_UTERINE_PROBLEMS" class="ivf_stimulation_chart_UTERINE_PROBLEMS">
<span<?php echo $ivf_stimulation_chart->UTERINE_PROBLEMS->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->UTERINE_PROBLEMS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->W_COMORBIDS->Visible) { // W_COMORBIDS ?>
		<td<?php echo $ivf_stimulation_chart->W_COMORBIDS->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_W_COMORBIDS" class="ivf_stimulation_chart_W_COMORBIDS">
<span<?php echo $ivf_stimulation_chart->W_COMORBIDS->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->W_COMORBIDS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->H_COMORBIDS->Visible) { // H_COMORBIDS ?>
		<td<?php echo $ivf_stimulation_chart->H_COMORBIDS->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_H_COMORBIDS" class="ivf_stimulation_chart_H_COMORBIDS">
<span<?php echo $ivf_stimulation_chart->H_COMORBIDS->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->H_COMORBIDS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->SEXUAL_DYSFUNCTION->Visible) { // SEXUAL_DYSFUNCTION ?>
		<td<?php echo $ivf_stimulation_chart->SEXUAL_DYSFUNCTION->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_SEXUAL_DYSFUNCTION" class="ivf_stimulation_chart_SEXUAL_DYSFUNCTION">
<span<?php echo $ivf_stimulation_chart->SEXUAL_DYSFUNCTION->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->SEXUAL_DYSFUNCTION->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->TABLETS->Visible) { // TABLETS ?>
		<td<?php echo $ivf_stimulation_chart->TABLETS->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_TABLETS" class="ivf_stimulation_chart_TABLETS">
<span<?php echo $ivf_stimulation_chart->TABLETS->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->TABLETS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->FOLLICLE_STATUS->Visible) { // FOLLICLE_STATUS ?>
		<td<?php echo $ivf_stimulation_chart->FOLLICLE_STATUS->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_FOLLICLE_STATUS" class="ivf_stimulation_chart_FOLLICLE_STATUS">
<span<?php echo $ivf_stimulation_chart->FOLLICLE_STATUS->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->FOLLICLE_STATUS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->NUMBER_OF_IUI->Visible) { // NUMBER_OF_IUI ?>
		<td<?php echo $ivf_stimulation_chart->NUMBER_OF_IUI->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_NUMBER_OF_IUI" class="ivf_stimulation_chart_NUMBER_OF_IUI">
<span<?php echo $ivf_stimulation_chart->NUMBER_OF_IUI->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->NUMBER_OF_IUI->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->PROCEDURE->Visible) { // PROCEDURE ?>
		<td<?php echo $ivf_stimulation_chart->PROCEDURE->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_PROCEDURE" class="ivf_stimulation_chart_PROCEDURE">
<span<?php echo $ivf_stimulation_chart->PROCEDURE->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->PROCEDURE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->LUTEAL_SUPPORT->Visible) { // LUTEAL_SUPPORT ?>
		<td<?php echo $ivf_stimulation_chart->LUTEAL_SUPPORT->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_LUTEAL_SUPPORT" class="ivf_stimulation_chart_LUTEAL_SUPPORT">
<span<?php echo $ivf_stimulation_chart->LUTEAL_SUPPORT->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->LUTEAL_SUPPORT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->SPECIFIC_MATERNAL_PROBLEMS->Visible) { // SPECIFIC_MATERNAL_PROBLEMS ?>
		<td<?php echo $ivf_stimulation_chart->SPECIFIC_MATERNAL_PROBLEMS->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS" class="ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS">
<span<?php echo $ivf_stimulation_chart->SPECIFIC_MATERNAL_PROBLEMS->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->SPECIFIC_MATERNAL_PROBLEMS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->ONGOING_PREG->Visible) { // ONGOING_PREG ?>
		<td<?php echo $ivf_stimulation_chart->ONGOING_PREG->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_ONGOING_PREG" class="ivf_stimulation_chart_ONGOING_PREG">
<span<?php echo $ivf_stimulation_chart->ONGOING_PREG->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ONGOING_PREG->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart->EDD_Date->Visible) { // EDD_Date ?>
		<td<?php echo $ivf_stimulation_chart->EDD_Date->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCnt ?>_ivf_stimulation_chart_EDD_Date" class="ivf_stimulation_chart_EDD_Date">
<span<?php echo $ivf_stimulation_chart->EDD_Date->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EDD_Date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$ivf_stimulation_chart_delete->Recordset->moveNext();
}
$ivf_stimulation_chart_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_stimulation_chart_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$ivf_stimulation_chart_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$ivf_stimulation_chart_delete->terminate();
?>