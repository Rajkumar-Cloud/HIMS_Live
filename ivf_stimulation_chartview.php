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
$ivf_stimulation_chart_view = new ivf_stimulation_chart_view();

// Run the page
$ivf_stimulation_chart_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_stimulation_chart_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$ivf_stimulation_chart->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fivf_stimulation_chartview = currentForm = new ew.Form("fivf_stimulation_chartview", "view");

// Form_CustomValidate event
fivf_stimulation_chartview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_stimulation_chartview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_stimulation_chartview.lists["x_ARTCycle"] = <?php echo $ivf_stimulation_chart_view->ARTCycle->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_ARTCycle"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->ARTCycle->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartview.lists["x_FemaleFactor"] = <?php echo $ivf_stimulation_chart_view->FemaleFactor->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_FemaleFactor"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->FemaleFactor->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartview.lists["x_MaleFactor"] = <?php echo $ivf_stimulation_chart_view->MaleFactor->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_MaleFactor"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->MaleFactor->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartview.lists["x_Protocol"] = <?php echo $ivf_stimulation_chart_view->Protocol->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_Protocol"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->Protocol->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartview.lists["x_SemenFrozen"] = <?php echo $ivf_stimulation_chart_view->SemenFrozen->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_SemenFrozen"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->SemenFrozen->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartview.lists["x_A4ICSICycle"] = <?php echo $ivf_stimulation_chart_view->A4ICSICycle->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_A4ICSICycle"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->A4ICSICycle->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartview.lists["x_TotalICSICycle"] = <?php echo $ivf_stimulation_chart_view->TotalICSICycle->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_TotalICSICycle"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->TotalICSICycle->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartview.lists["x_TypeOfInfertility"] = <?php echo $ivf_stimulation_chart_view->TypeOfInfertility->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_TypeOfInfertility"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->TypeOfInfertility->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartview.lists["x_INJTYPE"] = <?php echo $ivf_stimulation_chart_view->INJTYPE->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_INJTYPE"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->INJTYPE->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_ANTAGONISTSTARTDAY"] = <?php echo $ivf_stimulation_chart_view->ANTAGONISTSTARTDAY->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_ANTAGONISTSTARTDAY"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->ANTAGONISTSTARTDAY->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartview.lists["x_PRETREATMENT"] = <?php echo $ivf_stimulation_chart_view->PRETREATMENT->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_PRETREATMENT"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->PRETREATMENT->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartview.lists["x_MedicalFactors"] = <?php echo $ivf_stimulation_chart_view->MedicalFactors->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_MedicalFactors"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->MedicalFactors->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartview.lists["x_TRIGGERR"] = <?php echo $ivf_stimulation_chart_view->TRIGGERR->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_TRIGGERR"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->TRIGGERR->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_ATHOMEorCLINIC"] = <?php echo $ivf_stimulation_chart_view->ATHOMEorCLINIC->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_ATHOMEorCLINIC"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->ATHOMEorCLINIC->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartview.lists["x_ALLFREEZEINDICATION"] = <?php echo $ivf_stimulation_chart_view->ALLFREEZEINDICATION->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_ALLFREEZEINDICATION"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->ALLFREEZEINDICATION->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartview.lists["x_ERA"] = <?php echo $ivf_stimulation_chart_view->ERA->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_ERA"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->ERA->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartview.lists["x_ET"] = <?php echo $ivf_stimulation_chart_view->ET->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_ET"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->ET->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartview.lists["x_SEMENPREPARATION"] = <?php echo $ivf_stimulation_chart_view->SEMENPREPARATION->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_SEMENPREPARATION"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->SEMENPREPARATION->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartview.lists["x_REASONFORESET"] = <?php echo $ivf_stimulation_chart_view->REASONFORESET->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_REASONFORESET"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->REASONFORESET->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartview.lists["x_Tablet1"] = <?php echo $ivf_stimulation_chart_view->Tablet1->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_Tablet1"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->Tablet1->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_Tablet2"] = <?php echo $ivf_stimulation_chart_view->Tablet2->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_Tablet2"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->Tablet2->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_Tablet3"] = <?php echo $ivf_stimulation_chart_view->Tablet3->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_Tablet3"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->Tablet3->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_Tablet4"] = <?php echo $ivf_stimulation_chart_view->Tablet4->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_Tablet4"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->Tablet4->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_Tablet5"] = <?php echo $ivf_stimulation_chart_view->Tablet5->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_Tablet5"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->Tablet5->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_Tablet6"] = <?php echo $ivf_stimulation_chart_view->Tablet6->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_Tablet6"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->Tablet6->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_Tablet7"] = <?php echo $ivf_stimulation_chart_view->Tablet7->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_Tablet7"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->Tablet7->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_Tablet8"] = <?php echo $ivf_stimulation_chart_view->Tablet8->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_Tablet8"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->Tablet8->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_Tablet9"] = <?php echo $ivf_stimulation_chart_view->Tablet9->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_Tablet9"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->Tablet9->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_Tablet10"] = <?php echo $ivf_stimulation_chart_view->Tablet10->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_Tablet10"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->Tablet10->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_Tablet11"] = <?php echo $ivf_stimulation_chart_view->Tablet11->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_Tablet11"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->Tablet11->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_Tablet12"] = <?php echo $ivf_stimulation_chart_view->Tablet12->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_Tablet12"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->Tablet12->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_Tablet13"] = <?php echo $ivf_stimulation_chart_view->Tablet13->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_Tablet13"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->Tablet13->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_RFSH1"] = <?php echo $ivf_stimulation_chart_view->RFSH1->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_RFSH1"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->RFSH1->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_RFSH2"] = <?php echo $ivf_stimulation_chart_view->RFSH2->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_RFSH2"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->RFSH2->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_RFSH3"] = <?php echo $ivf_stimulation_chart_view->RFSH3->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_RFSH3"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->RFSH3->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_RFSH4"] = <?php echo $ivf_stimulation_chart_view->RFSH4->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_RFSH4"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->RFSH4->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_RFSH5"] = <?php echo $ivf_stimulation_chart_view->RFSH5->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_RFSH5"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->RFSH5->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_RFSH6"] = <?php echo $ivf_stimulation_chart_view->RFSH6->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_RFSH6"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->RFSH6->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_RFSH7"] = <?php echo $ivf_stimulation_chart_view->RFSH7->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_RFSH7"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->RFSH7->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_RFSH8"] = <?php echo $ivf_stimulation_chart_view->RFSH8->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_RFSH8"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->RFSH8->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_RFSH9"] = <?php echo $ivf_stimulation_chart_view->RFSH9->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_RFSH9"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->RFSH9->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_RFSH10"] = <?php echo $ivf_stimulation_chart_view->RFSH10->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_RFSH10"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->RFSH10->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_RFSH11"] = <?php echo $ivf_stimulation_chart_view->RFSH11->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_RFSH11"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->RFSH11->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_RFSH12"] = <?php echo $ivf_stimulation_chart_view->RFSH12->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_RFSH12"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->RFSH12->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_RFSH13"] = <?php echo $ivf_stimulation_chart_view->RFSH13->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_RFSH13"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->RFSH13->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_HMG1"] = <?php echo $ivf_stimulation_chart_view->HMG1->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_HMG1"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->HMG1->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_HMG2"] = <?php echo $ivf_stimulation_chart_view->HMG2->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_HMG2"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->HMG2->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_HMG3"] = <?php echo $ivf_stimulation_chart_view->HMG3->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_HMG3"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->HMG3->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_HMG4"] = <?php echo $ivf_stimulation_chart_view->HMG4->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_HMG4"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->HMG4->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_HMG5"] = <?php echo $ivf_stimulation_chart_view->HMG5->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_HMG5"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->HMG5->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_HMG6"] = <?php echo $ivf_stimulation_chart_view->HMG6->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_HMG6"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->HMG6->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_HMG7"] = <?php echo $ivf_stimulation_chart_view->HMG7->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_HMG7"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->HMG7->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_HMG8"] = <?php echo $ivf_stimulation_chart_view->HMG8->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_HMG8"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->HMG8->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_HMG9"] = <?php echo $ivf_stimulation_chart_view->HMG9->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_HMG9"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->HMG9->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_HMG10"] = <?php echo $ivf_stimulation_chart_view->HMG10->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_HMG10"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->HMG10->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_HMG11"] = <?php echo $ivf_stimulation_chart_view->HMG11->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_HMG11"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->HMG11->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_HMG12"] = <?php echo $ivf_stimulation_chart_view->HMG12->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_HMG12"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->HMG12->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_HMG13"] = <?php echo $ivf_stimulation_chart_view->HMG13->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_HMG13"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->HMG13->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_GnRH1"] = <?php echo $ivf_stimulation_chart_view->GnRH1->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_GnRH1"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->GnRH1->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_GnRH2"] = <?php echo $ivf_stimulation_chart_view->GnRH2->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_GnRH2"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->GnRH2->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_GnRH3"] = <?php echo $ivf_stimulation_chart_view->GnRH3->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_GnRH3"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->GnRH3->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_GnRH4"] = <?php echo $ivf_stimulation_chart_view->GnRH4->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_GnRH4"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->GnRH4->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_GnRH5"] = <?php echo $ivf_stimulation_chart_view->GnRH5->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_GnRH5"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->GnRH5->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_GnRH6"] = <?php echo $ivf_stimulation_chart_view->GnRH6->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_GnRH6"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->GnRH6->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_GnRH7"] = <?php echo $ivf_stimulation_chart_view->GnRH7->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_GnRH7"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->GnRH7->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_GnRH8"] = <?php echo $ivf_stimulation_chart_view->GnRH8->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_GnRH8"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->GnRH8->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_GnRH9"] = <?php echo $ivf_stimulation_chart_view->GnRH9->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_GnRH9"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->GnRH9->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_GnRH10"] = <?php echo $ivf_stimulation_chart_view->GnRH10->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_GnRH10"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->GnRH10->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_GnRH11"] = <?php echo $ivf_stimulation_chart_view->GnRH11->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_GnRH11"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->GnRH11->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_GnRH12"] = <?php echo $ivf_stimulation_chart_view->GnRH12->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_GnRH12"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->GnRH12->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_GnRH13"] = <?php echo $ivf_stimulation_chart_view->GnRH13->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_GnRH13"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->GnRH13->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_Convert[]"] = <?php echo $ivf_stimulation_chart_view->Convert->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_Convert[]"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->Convert->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartview.lists["x_InseminatinTechnique"] = <?php echo $ivf_stimulation_chart_view->InseminatinTechnique->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_InseminatinTechnique"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->InseminatinTechnique->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartview.lists["x_IndicationForART"] = <?php echo $ivf_stimulation_chart_view->IndicationForART->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_IndicationForART"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->IndicationForART->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartview.lists["x_Hysteroscopy"] = <?php echo $ivf_stimulation_chart_view->Hysteroscopy->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_Hysteroscopy"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->Hysteroscopy->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartview.lists["x_EndometrialScratching"] = <?php echo $ivf_stimulation_chart_view->EndometrialScratching->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_EndometrialScratching"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->EndometrialScratching->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartview.lists["x_TrialCannulation"] = <?php echo $ivf_stimulation_chart_view->TrialCannulation->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_TrialCannulation"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->TrialCannulation->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartview.lists["x_CYCLETYPE"] = <?php echo $ivf_stimulation_chart_view->CYCLETYPE->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_CYCLETYPE"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->CYCLETYPE->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartview.lists["x_OralEstrogenDosage"] = <?php echo $ivf_stimulation_chart_view->OralEstrogenDosage->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_OralEstrogenDosage"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->OralEstrogenDosage->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartview.lists["x_GCSF"] = <?php echo $ivf_stimulation_chart_view->GCSF->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_GCSF"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->GCSF->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartview.lists["x_ActivatedPRP"] = <?php echo $ivf_stimulation_chart_view->ActivatedPRP->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_ActivatedPRP"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->ActivatedPRP->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartview.lists["x_AllFreeze"] = <?php echo $ivf_stimulation_chart_view->AllFreeze->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_AllFreeze"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->AllFreeze->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartview.lists["x_TreatmentCancel"] = <?php echo $ivf_stimulation_chart_view->TreatmentCancel->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_TreatmentCancel"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->TreatmentCancel->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartview.lists["x_Projectron"] = <?php echo $ivf_stimulation_chart_view->Projectron->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_Projectron"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->Projectron->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartview.lists["x_Tablet14"] = <?php echo $ivf_stimulation_chart_view->Tablet14->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_Tablet14"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->Tablet14->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_Tablet15"] = <?php echo $ivf_stimulation_chart_view->Tablet15->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_Tablet15"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->Tablet15->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_Tablet16"] = <?php echo $ivf_stimulation_chart_view->Tablet16->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_Tablet16"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->Tablet16->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_Tablet17"] = <?php echo $ivf_stimulation_chart_view->Tablet17->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_Tablet17"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->Tablet17->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_Tablet18"] = <?php echo $ivf_stimulation_chart_view->Tablet18->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_Tablet18"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->Tablet18->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_Tablet19"] = <?php echo $ivf_stimulation_chart_view->Tablet19->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_Tablet19"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->Tablet19->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_Tablet20"] = <?php echo $ivf_stimulation_chart_view->Tablet20->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_Tablet20"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->Tablet20->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_Tablet21"] = <?php echo $ivf_stimulation_chart_view->Tablet21->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_Tablet21"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->Tablet21->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_Tablet22"] = <?php echo $ivf_stimulation_chart_view->Tablet22->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_Tablet22"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->Tablet22->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_Tablet23"] = <?php echo $ivf_stimulation_chart_view->Tablet23->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_Tablet23"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->Tablet23->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_Tablet24"] = <?php echo $ivf_stimulation_chart_view->Tablet24->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_Tablet24"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->Tablet24->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_Tablet25"] = <?php echo $ivf_stimulation_chart_view->Tablet25->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_Tablet25"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->Tablet25->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_RFSH14"] = <?php echo $ivf_stimulation_chart_view->RFSH14->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_RFSH14"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->RFSH14->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_RFSH15"] = <?php echo $ivf_stimulation_chart_view->RFSH15->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_RFSH15"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->RFSH15->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_RFSH16"] = <?php echo $ivf_stimulation_chart_view->RFSH16->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_RFSH16"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->RFSH16->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_RFSH17"] = <?php echo $ivf_stimulation_chart_view->RFSH17->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_RFSH17"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->RFSH17->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_RFSH18"] = <?php echo $ivf_stimulation_chart_view->RFSH18->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_RFSH18"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->RFSH18->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_RFSH19"] = <?php echo $ivf_stimulation_chart_view->RFSH19->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_RFSH19"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->RFSH19->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_RFSH20"] = <?php echo $ivf_stimulation_chart_view->RFSH20->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_RFSH20"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->RFSH20->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_RFSH21"] = <?php echo $ivf_stimulation_chart_view->RFSH21->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_RFSH21"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->RFSH21->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_RFSH22"] = <?php echo $ivf_stimulation_chart_view->RFSH22->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_RFSH22"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->RFSH22->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_RFSH23"] = <?php echo $ivf_stimulation_chart_view->RFSH23->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_RFSH23"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->RFSH23->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_RFSH24"] = <?php echo $ivf_stimulation_chart_view->RFSH24->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_RFSH24"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->RFSH24->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_RFSH25"] = <?php echo $ivf_stimulation_chart_view->RFSH25->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_RFSH25"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->RFSH25->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_HMG14"] = <?php echo $ivf_stimulation_chart_view->HMG14->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_HMG14"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->HMG14->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_HMG15"] = <?php echo $ivf_stimulation_chart_view->HMG15->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_HMG15"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->HMG15->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_HMG16"] = <?php echo $ivf_stimulation_chart_view->HMG16->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_HMG16"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->HMG16->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_HMG17"] = <?php echo $ivf_stimulation_chart_view->HMG17->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_HMG17"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->HMG17->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_HMG18"] = <?php echo $ivf_stimulation_chart_view->HMG18->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_HMG18"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->HMG18->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_HMG19"] = <?php echo $ivf_stimulation_chart_view->HMG19->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_HMG19"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->HMG19->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_HMG20"] = <?php echo $ivf_stimulation_chart_view->HMG20->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_HMG20"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->HMG20->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_HMG21"] = <?php echo $ivf_stimulation_chart_view->HMG21->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_HMG21"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->HMG21->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_HMG22"] = <?php echo $ivf_stimulation_chart_view->HMG22->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_HMG22"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->HMG22->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_HMG23"] = <?php echo $ivf_stimulation_chart_view->HMG23->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_HMG23"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->HMG23->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_HMG24"] = <?php echo $ivf_stimulation_chart_view->HMG24->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_HMG24"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->HMG24->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_HMG25"] = <?php echo $ivf_stimulation_chart_view->HMG25->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_HMG25"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->HMG25->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_GnRH14"] = <?php echo $ivf_stimulation_chart_view->GnRH14->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_GnRH14"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->GnRH14->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_GnRH15"] = <?php echo $ivf_stimulation_chart_view->GnRH15->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_GnRH15"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->GnRH15->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_GnRH16"] = <?php echo $ivf_stimulation_chart_view->GnRH16->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_GnRH16"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->GnRH16->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_GnRH17"] = <?php echo $ivf_stimulation_chart_view->GnRH17->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_GnRH17"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->GnRH17->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_GnRH18"] = <?php echo $ivf_stimulation_chart_view->GnRH18->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_GnRH18"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->GnRH18->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_GnRH19"] = <?php echo $ivf_stimulation_chart_view->GnRH19->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_GnRH19"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->GnRH19->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_GnRH20"] = <?php echo $ivf_stimulation_chart_view->GnRH20->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_GnRH20"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->GnRH20->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_GnRH21"] = <?php echo $ivf_stimulation_chart_view->GnRH21->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_GnRH21"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->GnRH21->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_GnRH22"] = <?php echo $ivf_stimulation_chart_view->GnRH22->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_GnRH22"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->GnRH22->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_GnRH23"] = <?php echo $ivf_stimulation_chart_view->GnRH23->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_GnRH23"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->GnRH23->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_GnRH24"] = <?php echo $ivf_stimulation_chart_view->GnRH24->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_GnRH24"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->GnRH24->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_GnRH25"] = <?php echo $ivf_stimulation_chart_view->GnRH25->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_GnRH25"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->GnRH25->lookupOptions()) ?>;
fivf_stimulation_chartview.lists["x_TUBAL_PATENCY"] = <?php echo $ivf_stimulation_chart_view->TUBAL_PATENCY->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_TUBAL_PATENCY"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->TUBAL_PATENCY->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartview.lists["x_HSG"] = <?php echo $ivf_stimulation_chart_view->HSG->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_HSG"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->HSG->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartview.lists["x_DHL"] = <?php echo $ivf_stimulation_chart_view->DHL->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_DHL"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->DHL->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartview.lists["x_UTERINE_PROBLEMS"] = <?php echo $ivf_stimulation_chart_view->UTERINE_PROBLEMS->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_UTERINE_PROBLEMS"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->UTERINE_PROBLEMS->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartview.lists["x_W_COMORBIDS"] = <?php echo $ivf_stimulation_chart_view->W_COMORBIDS->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_W_COMORBIDS"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->W_COMORBIDS->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartview.lists["x_H_COMORBIDS"] = <?php echo $ivf_stimulation_chart_view->H_COMORBIDS->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_H_COMORBIDS"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->H_COMORBIDS->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartview.lists["x_SEXUAL_DYSFUNCTION"] = <?php echo $ivf_stimulation_chart_view->SEXUAL_DYSFUNCTION->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_SEXUAL_DYSFUNCTION"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->SEXUAL_DYSFUNCTION->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartview.lists["x_FOLLICLE_STATUS"] = <?php echo $ivf_stimulation_chart_view->FOLLICLE_STATUS->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_FOLLICLE_STATUS"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->FOLLICLE_STATUS->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartview.lists["x_NUMBER_OF_IUI"] = <?php echo $ivf_stimulation_chart_view->NUMBER_OF_IUI->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_NUMBER_OF_IUI"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->NUMBER_OF_IUI->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartview.lists["x_PROCEDURE"] = <?php echo $ivf_stimulation_chart_view->PROCEDURE->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_PROCEDURE"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->PROCEDURE->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartview.lists["x_LUTEAL_SUPPORT"] = <?php echo $ivf_stimulation_chart_view->LUTEAL_SUPPORT->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_LUTEAL_SUPPORT"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->LUTEAL_SUPPORT->options(FALSE, TRUE)) ?>;
fivf_stimulation_chartview.lists["x_SPECIFIC_MATERNAL_PROBLEMS"] = <?php echo $ivf_stimulation_chart_view->SPECIFIC_MATERNAL_PROBLEMS->Lookup->toClientList() ?>;
fivf_stimulation_chartview.lists["x_SPECIFIC_MATERNAL_PROBLEMS"].options = <?php echo JsonEncode($ivf_stimulation_chart_view->SPECIFIC_MATERNAL_PROBLEMS->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$ivf_stimulation_chart->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $ivf_stimulation_chart_view->ExportOptions->render("body") ?>
<?php $ivf_stimulation_chart_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $ivf_stimulation_chart_view->showPageHeader(); ?>
<?php
$ivf_stimulation_chart_view->showMessage();
?>
<form name="fivf_stimulation_chartview" id="fivf_stimulation_chartview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_stimulation_chart_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_stimulation_chart_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_stimulation_chart">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_stimulation_chart_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($ivf_stimulation_chart->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_id"><script id="tpc_ivf_stimulation_chart_id" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->id->caption() ?></span></script></span></td>
		<td data-name="id"<?php echo $ivf_stimulation_chart->id->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_id" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_id">
<span<?php echo $ivf_stimulation_chart->id->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->RIDNo->Visible) { // RIDNo ?>
	<tr id="r_RIDNo">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RIDNo"><script id="tpc_ivf_stimulation_chart_RIDNo" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->RIDNo->caption() ?></span></script></span></td>
		<td data-name="RIDNo"<?php echo $ivf_stimulation_chart->RIDNo->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RIDNo" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_RIDNo">
<span<?php echo $ivf_stimulation_chart->RIDNo->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RIDNo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Name"><script id="tpc_ivf_stimulation_chart_Name" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Name->caption() ?></span></script></span></td>
		<td data-name="Name"<?php echo $ivf_stimulation_chart->Name->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Name" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Name">
<span<?php echo $ivf_stimulation_chart->Name->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Name->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->ARTCycle->Visible) { // ARTCycle ?>
	<tr id="r_ARTCycle">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ARTCycle"><script id="tpc_ivf_stimulation_chart_ARTCycle" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->ARTCycle->caption() ?></span></script></span></td>
		<td data-name="ARTCycle"<?php echo $ivf_stimulation_chart->ARTCycle->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ARTCycle" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_ARTCycle">
<span<?php echo $ivf_stimulation_chart->ARTCycle->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ARTCycle->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->FemaleFactor->Visible) { // FemaleFactor ?>
	<tr id="r_FemaleFactor">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_FemaleFactor"><script id="tpc_ivf_stimulation_chart_FemaleFactor" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->FemaleFactor->caption() ?></span></script></span></td>
		<td data-name="FemaleFactor"<?php echo $ivf_stimulation_chart->FemaleFactor->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_FemaleFactor" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_FemaleFactor">
<span<?php echo $ivf_stimulation_chart->FemaleFactor->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->FemaleFactor->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->MaleFactor->Visible) { // MaleFactor ?>
	<tr id="r_MaleFactor">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_MaleFactor"><script id="tpc_ivf_stimulation_chart_MaleFactor" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->MaleFactor->caption() ?></span></script></span></td>
		<td data-name="MaleFactor"<?php echo $ivf_stimulation_chart->MaleFactor->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_MaleFactor" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_MaleFactor">
<span<?php echo $ivf_stimulation_chart->MaleFactor->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->MaleFactor->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Protocol->Visible) { // Protocol ?>
	<tr id="r_Protocol">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Protocol"><script id="tpc_ivf_stimulation_chart_Protocol" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Protocol->caption() ?></span></script></span></td>
		<td data-name="Protocol"<?php echo $ivf_stimulation_chart->Protocol->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Protocol" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Protocol">
<span<?php echo $ivf_stimulation_chart->Protocol->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Protocol->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->SemenFrozen->Visible) { // SemenFrozen ?>
	<tr id="r_SemenFrozen">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_SemenFrozen"><script id="tpc_ivf_stimulation_chart_SemenFrozen" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->SemenFrozen->caption() ?></span></script></span></td>
		<td data-name="SemenFrozen"<?php echo $ivf_stimulation_chart->SemenFrozen->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_SemenFrozen" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_SemenFrozen">
<span<?php echo $ivf_stimulation_chart->SemenFrozen->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->SemenFrozen->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->A4ICSICycle->Visible) { // A4ICSICycle ?>
	<tr id="r_A4ICSICycle">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_A4ICSICycle"><script id="tpc_ivf_stimulation_chart_A4ICSICycle" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->A4ICSICycle->caption() ?></span></script></span></td>
		<td data-name="A4ICSICycle"<?php echo $ivf_stimulation_chart->A4ICSICycle->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_A4ICSICycle" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_A4ICSICycle">
<span<?php echo $ivf_stimulation_chart->A4ICSICycle->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->A4ICSICycle->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->TotalICSICycle->Visible) { // TotalICSICycle ?>
	<tr id="r_TotalICSICycle">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_TotalICSICycle"><script id="tpc_ivf_stimulation_chart_TotalICSICycle" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->TotalICSICycle->caption() ?></span></script></span></td>
		<td data-name="TotalICSICycle"<?php echo $ivf_stimulation_chart->TotalICSICycle->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_TotalICSICycle" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_TotalICSICycle">
<span<?php echo $ivf_stimulation_chart->TotalICSICycle->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->TotalICSICycle->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->TypeOfInfertility->Visible) { // TypeOfInfertility ?>
	<tr id="r_TypeOfInfertility">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_TypeOfInfertility"><script id="tpc_ivf_stimulation_chart_TypeOfInfertility" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->TypeOfInfertility->caption() ?></span></script></span></td>
		<td data-name="TypeOfInfertility"<?php echo $ivf_stimulation_chart->TypeOfInfertility->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_TypeOfInfertility" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_TypeOfInfertility">
<span<?php echo $ivf_stimulation_chart->TypeOfInfertility->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->TypeOfInfertility->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Duration->Visible) { // Duration ?>
	<tr id="r_Duration">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Duration"><script id="tpc_ivf_stimulation_chart_Duration" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Duration->caption() ?></span></script></span></td>
		<td data-name="Duration"<?php echo $ivf_stimulation_chart->Duration->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Duration" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Duration">
<span<?php echo $ivf_stimulation_chart->Duration->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Duration->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->LMP->Visible) { // LMP ?>
	<tr id="r_LMP">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_LMP"><script id="tpc_ivf_stimulation_chart_LMP" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->LMP->caption() ?></span></script></span></td>
		<td data-name="LMP"<?php echo $ivf_stimulation_chart->LMP->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_LMP" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_LMP">
<span<?php echo $ivf_stimulation_chart->LMP->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->LMP->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->RelevantHistory->Visible) { // RelevantHistory ?>
	<tr id="r_RelevantHistory">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RelevantHistory"><script id="tpc_ivf_stimulation_chart_RelevantHistory" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->RelevantHistory->caption() ?></span></script></span></td>
		<td data-name="RelevantHistory"<?php echo $ivf_stimulation_chart->RelevantHistory->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RelevantHistory" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_RelevantHistory">
<span<?php echo $ivf_stimulation_chart->RelevantHistory->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RelevantHistory->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->IUICycles->Visible) { // IUICycles ?>
	<tr id="r_IUICycles">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_IUICycles"><script id="tpc_ivf_stimulation_chart_IUICycles" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->IUICycles->caption() ?></span></script></span></td>
		<td data-name="IUICycles"<?php echo $ivf_stimulation_chart->IUICycles->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_IUICycles" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_IUICycles">
<span<?php echo $ivf_stimulation_chart->IUICycles->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->IUICycles->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->AFC->Visible) { // AFC ?>
	<tr id="r_AFC">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_AFC"><script id="tpc_ivf_stimulation_chart_AFC" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->AFC->caption() ?></span></script></span></td>
		<td data-name="AFC"<?php echo $ivf_stimulation_chart->AFC->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_AFC" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_AFC">
<span<?php echo $ivf_stimulation_chart->AFC->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->AFC->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->AMH->Visible) { // AMH ?>
	<tr id="r_AMH">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_AMH"><script id="tpc_ivf_stimulation_chart_AMH" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->AMH->caption() ?></span></script></span></td>
		<td data-name="AMH"<?php echo $ivf_stimulation_chart->AMH->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_AMH" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_AMH">
<span<?php echo $ivf_stimulation_chart->AMH->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->AMH->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->FBMI->Visible) { // FBMI ?>
	<tr id="r_FBMI">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_FBMI"><script id="tpc_ivf_stimulation_chart_FBMI" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->FBMI->caption() ?></span></script></span></td>
		<td data-name="FBMI"<?php echo $ivf_stimulation_chart->FBMI->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_FBMI" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_FBMI">
<span<?php echo $ivf_stimulation_chart->FBMI->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->FBMI->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->MBMI->Visible) { // MBMI ?>
	<tr id="r_MBMI">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_MBMI"><script id="tpc_ivf_stimulation_chart_MBMI" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->MBMI->caption() ?></span></script></span></td>
		<td data-name="MBMI"<?php echo $ivf_stimulation_chart->MBMI->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_MBMI" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_MBMI">
<span<?php echo $ivf_stimulation_chart->MBMI->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->MBMI->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->OvarianVolumeRT->Visible) { // OvarianVolumeRT ?>
	<tr id="r_OvarianVolumeRT">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_OvarianVolumeRT"><script id="tpc_ivf_stimulation_chart_OvarianVolumeRT" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->OvarianVolumeRT->caption() ?></span></script></span></td>
		<td data-name="OvarianVolumeRT"<?php echo $ivf_stimulation_chart->OvarianVolumeRT->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_OvarianVolumeRT" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_OvarianVolumeRT">
<span<?php echo $ivf_stimulation_chart->OvarianVolumeRT->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->OvarianVolumeRT->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->OvarianVolumeLT->Visible) { // OvarianVolumeLT ?>
	<tr id="r_OvarianVolumeLT">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_OvarianVolumeLT"><script id="tpc_ivf_stimulation_chart_OvarianVolumeLT" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->OvarianVolumeLT->caption() ?></span></script></span></td>
		<td data-name="OvarianVolumeLT"<?php echo $ivf_stimulation_chart->OvarianVolumeLT->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_OvarianVolumeLT" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_OvarianVolumeLT">
<span<?php echo $ivf_stimulation_chart->OvarianVolumeLT->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->OvarianVolumeLT->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->DAYSOFSTIMULATION->Visible) { // DAYSOFSTIMULATION ?>
	<tr id="r_DAYSOFSTIMULATION">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DAYSOFSTIMULATION"><script id="tpc_ivf_stimulation_chart_DAYSOFSTIMULATION" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->DAYSOFSTIMULATION->caption() ?></span></script></span></td>
		<td data-name="DAYSOFSTIMULATION"<?php echo $ivf_stimulation_chart->DAYSOFSTIMULATION->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DAYSOFSTIMULATION" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_DAYSOFSTIMULATION">
<span<?php echo $ivf_stimulation_chart->DAYSOFSTIMULATION->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DAYSOFSTIMULATION->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->DOSEOFGONADOTROPINS->Visible) { // DOSEOFGONADOTROPINS ?>
	<tr id="r_DOSEOFGONADOTROPINS">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DOSEOFGONADOTROPINS"><script id="tpc_ivf_stimulation_chart_DOSEOFGONADOTROPINS" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->DOSEOFGONADOTROPINS->caption() ?></span></script></span></td>
		<td data-name="DOSEOFGONADOTROPINS"<?php echo $ivf_stimulation_chart->DOSEOFGONADOTROPINS->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DOSEOFGONADOTROPINS" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_DOSEOFGONADOTROPINS">
<span<?php echo $ivf_stimulation_chart->DOSEOFGONADOTROPINS->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DOSEOFGONADOTROPINS->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->INJTYPE->Visible) { // INJTYPE ?>
	<tr id="r_INJTYPE">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_INJTYPE"><script id="tpc_ivf_stimulation_chart_INJTYPE" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->INJTYPE->caption() ?></span></script></span></td>
		<td data-name="INJTYPE"<?php echo $ivf_stimulation_chart->INJTYPE->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_INJTYPE" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_INJTYPE">
<span<?php echo $ivf_stimulation_chart->INJTYPE->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->INJTYPE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->ANTAGONISTDAYS->Visible) { // ANTAGONISTDAYS ?>
	<tr id="r_ANTAGONISTDAYS">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ANTAGONISTDAYS"><script id="tpc_ivf_stimulation_chart_ANTAGONISTDAYS" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->ANTAGONISTDAYS->caption() ?></span></script></span></td>
		<td data-name="ANTAGONISTDAYS"<?php echo $ivf_stimulation_chart->ANTAGONISTDAYS->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ANTAGONISTDAYS" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_ANTAGONISTDAYS">
<span<?php echo $ivf_stimulation_chart->ANTAGONISTDAYS->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ANTAGONISTDAYS->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->ANTAGONISTSTARTDAY->Visible) { // ANTAGONISTSTARTDAY ?>
	<tr id="r_ANTAGONISTSTARTDAY">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ANTAGONISTSTARTDAY"><script id="tpc_ivf_stimulation_chart_ANTAGONISTSTARTDAY" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->ANTAGONISTSTARTDAY->caption() ?></span></script></span></td>
		<td data-name="ANTAGONISTSTARTDAY"<?php echo $ivf_stimulation_chart->ANTAGONISTSTARTDAY->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ANTAGONISTSTARTDAY" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_ANTAGONISTSTARTDAY">
<span<?php echo $ivf_stimulation_chart->ANTAGONISTSTARTDAY->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ANTAGONISTSTARTDAY->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->GROWTHHORMONE->Visible) { // GROWTHHORMONE ?>
	<tr id="r_GROWTHHORMONE">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GROWTHHORMONE"><script id="tpc_ivf_stimulation_chart_GROWTHHORMONE" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->GROWTHHORMONE->caption() ?></span></script></span></td>
		<td data-name="GROWTHHORMONE"<?php echo $ivf_stimulation_chart->GROWTHHORMONE->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GROWTHHORMONE" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_GROWTHHORMONE">
<span<?php echo $ivf_stimulation_chart->GROWTHHORMONE->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GROWTHHORMONE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->PRETREATMENT->Visible) { // PRETREATMENT ?>
	<tr id="r_PRETREATMENT">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_PRETREATMENT"><script id="tpc_ivf_stimulation_chart_PRETREATMENT" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->PRETREATMENT->caption() ?></span></script></span></td>
		<td data-name="PRETREATMENT"<?php echo $ivf_stimulation_chart->PRETREATMENT->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_PRETREATMENT" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_PRETREATMENT">
<span<?php echo $ivf_stimulation_chart->PRETREATMENT->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->PRETREATMENT->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->SerumP4->Visible) { // SerumP4 ?>
	<tr id="r_SerumP4">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_SerumP4"><script id="tpc_ivf_stimulation_chart_SerumP4" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->SerumP4->caption() ?></span></script></span></td>
		<td data-name="SerumP4"<?php echo $ivf_stimulation_chart->SerumP4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_SerumP4" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_SerumP4">
<span<?php echo $ivf_stimulation_chart->SerumP4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->SerumP4->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->FORT->Visible) { // FORT ?>
	<tr id="r_FORT">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_FORT"><script id="tpc_ivf_stimulation_chart_FORT" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->FORT->caption() ?></span></script></span></td>
		<td data-name="FORT"<?php echo $ivf_stimulation_chart->FORT->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_FORT" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_FORT">
<span<?php echo $ivf_stimulation_chart->FORT->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->FORT->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->MedicalFactors->Visible) { // MedicalFactors ?>
	<tr id="r_MedicalFactors">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_MedicalFactors"><script id="tpc_ivf_stimulation_chart_MedicalFactors" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->MedicalFactors->caption() ?></span></script></span></td>
		<td data-name="MedicalFactors"<?php echo $ivf_stimulation_chart->MedicalFactors->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_MedicalFactors" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_MedicalFactors">
<span<?php echo $ivf_stimulation_chart->MedicalFactors->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->MedicalFactors->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->SCDate->Visible) { // SCDate ?>
	<tr id="r_SCDate">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_SCDate"><script id="tpc_ivf_stimulation_chart_SCDate" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->SCDate->caption() ?></span></script></span></td>
		<td data-name="SCDate"<?php echo $ivf_stimulation_chart->SCDate->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_SCDate" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_SCDate">
<span<?php echo $ivf_stimulation_chart->SCDate->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->SCDate->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->OvarianSurgery->Visible) { // OvarianSurgery ?>
	<tr id="r_OvarianSurgery">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_OvarianSurgery"><script id="tpc_ivf_stimulation_chart_OvarianSurgery" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->OvarianSurgery->caption() ?></span></script></span></td>
		<td data-name="OvarianSurgery"<?php echo $ivf_stimulation_chart->OvarianSurgery->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_OvarianSurgery" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_OvarianSurgery">
<span<?php echo $ivf_stimulation_chart->OvarianSurgery->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->OvarianSurgery->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->PreProcedureOrder->Visible) { // PreProcedureOrder ?>
	<tr id="r_PreProcedureOrder">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_PreProcedureOrder"><script id="tpc_ivf_stimulation_chart_PreProcedureOrder" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->PreProcedureOrder->caption() ?></span></script></span></td>
		<td data-name="PreProcedureOrder"<?php echo $ivf_stimulation_chart->PreProcedureOrder->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_PreProcedureOrder" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_PreProcedureOrder">
<span<?php echo $ivf_stimulation_chart->PreProcedureOrder->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->PreProcedureOrder->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->TRIGGERR->Visible) { // TRIGGERR ?>
	<tr id="r_TRIGGERR">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_TRIGGERR"><script id="tpc_ivf_stimulation_chart_TRIGGERR" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->TRIGGERR->caption() ?></span></script></span></td>
		<td data-name="TRIGGERR"<?php echo $ivf_stimulation_chart->TRIGGERR->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_TRIGGERR" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_TRIGGERR">
<span<?php echo $ivf_stimulation_chart->TRIGGERR->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->TRIGGERR->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->TRIGGERDATE->Visible) { // TRIGGERDATE ?>
	<tr id="r_TRIGGERDATE">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_TRIGGERDATE"><script id="tpc_ivf_stimulation_chart_TRIGGERDATE" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->TRIGGERDATE->caption() ?></span></script></span></td>
		<td data-name="TRIGGERDATE"<?php echo $ivf_stimulation_chart->TRIGGERDATE->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_TRIGGERDATE" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_TRIGGERDATE">
<span<?php echo $ivf_stimulation_chart->TRIGGERDATE->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->TRIGGERDATE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->ATHOMEorCLINIC->Visible) { // ATHOMEorCLINIC ?>
	<tr id="r_ATHOMEorCLINIC">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ATHOMEorCLINIC"><script id="tpc_ivf_stimulation_chart_ATHOMEorCLINIC" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->ATHOMEorCLINIC->caption() ?></span></script></span></td>
		<td data-name="ATHOMEorCLINIC"<?php echo $ivf_stimulation_chart->ATHOMEorCLINIC->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ATHOMEorCLINIC" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_ATHOMEorCLINIC">
<span<?php echo $ivf_stimulation_chart->ATHOMEorCLINIC->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ATHOMEorCLINIC->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->OPUDATE->Visible) { // OPUDATE ?>
	<tr id="r_OPUDATE">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_OPUDATE"><script id="tpc_ivf_stimulation_chart_OPUDATE" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->OPUDATE->caption() ?></span></script></span></td>
		<td data-name="OPUDATE"<?php echo $ivf_stimulation_chart->OPUDATE->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_OPUDATE" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_OPUDATE">
<span<?php echo $ivf_stimulation_chart->OPUDATE->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->OPUDATE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->ALLFREEZEINDICATION->Visible) { // ALLFREEZEINDICATION ?>
	<tr id="r_ALLFREEZEINDICATION">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ALLFREEZEINDICATION"><script id="tpc_ivf_stimulation_chart_ALLFREEZEINDICATION" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->ALLFREEZEINDICATION->caption() ?></span></script></span></td>
		<td data-name="ALLFREEZEINDICATION"<?php echo $ivf_stimulation_chart->ALLFREEZEINDICATION->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ALLFREEZEINDICATION" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_ALLFREEZEINDICATION">
<span<?php echo $ivf_stimulation_chart->ALLFREEZEINDICATION->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ALLFREEZEINDICATION->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->ERA->Visible) { // ERA ?>
	<tr id="r_ERA">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ERA"><script id="tpc_ivf_stimulation_chart_ERA" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->ERA->caption() ?></span></script></span></td>
		<td data-name="ERA"<?php echo $ivf_stimulation_chart->ERA->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ERA" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_ERA">
<span<?php echo $ivf_stimulation_chart->ERA->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ERA->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->PGTA->Visible) { // PGTA ?>
	<tr id="r_PGTA">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_PGTA"><script id="tpc_ivf_stimulation_chart_PGTA" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->PGTA->caption() ?></span></script></span></td>
		<td data-name="PGTA"<?php echo $ivf_stimulation_chart->PGTA->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_PGTA" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_PGTA">
<span<?php echo $ivf_stimulation_chart->PGTA->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->PGTA->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->PGD->Visible) { // PGD ?>
	<tr id="r_PGD">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_PGD"><script id="tpc_ivf_stimulation_chart_PGD" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->PGD->caption() ?></span></script></span></td>
		<td data-name="PGD"<?php echo $ivf_stimulation_chart->PGD->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_PGD" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_PGD">
<span<?php echo $ivf_stimulation_chart->PGD->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->PGD->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->DATEOFET->Visible) { // DATEOFET ?>
	<tr id="r_DATEOFET">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DATEOFET"><script id="tpc_ivf_stimulation_chart_DATEOFET" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->DATEOFET->caption() ?></span></script></span></td>
		<td data-name="DATEOFET"<?php echo $ivf_stimulation_chart->DATEOFET->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DATEOFET" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_DATEOFET">
<span<?php echo $ivf_stimulation_chart->DATEOFET->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DATEOFET->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->ET->Visible) { // ET ?>
	<tr id="r_ET">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ET"><script id="tpc_ivf_stimulation_chart_ET" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->ET->caption() ?></span></script></span></td>
		<td data-name="ET"<?php echo $ivf_stimulation_chart->ET->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ET" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_ET">
<span<?php echo $ivf_stimulation_chart->ET->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ET->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->ESET->Visible) { // ESET ?>
	<tr id="r_ESET">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ESET"><script id="tpc_ivf_stimulation_chart_ESET" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->ESET->caption() ?></span></script></span></td>
		<td data-name="ESET"<?php echo $ivf_stimulation_chart->ESET->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ESET" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_ESET">
<span<?php echo $ivf_stimulation_chart->ESET->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ESET->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->DOET->Visible) { // DOET ?>
	<tr id="r_DOET">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DOET"><script id="tpc_ivf_stimulation_chart_DOET" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->DOET->caption() ?></span></script></span></td>
		<td data-name="DOET"<?php echo $ivf_stimulation_chart->DOET->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DOET" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_DOET">
<span<?php echo $ivf_stimulation_chart->DOET->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DOET->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->SEMENPREPARATION->Visible) { // SEMENPREPARATION ?>
	<tr id="r_SEMENPREPARATION">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_SEMENPREPARATION"><script id="tpc_ivf_stimulation_chart_SEMENPREPARATION" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->SEMENPREPARATION->caption() ?></span></script></span></td>
		<td data-name="SEMENPREPARATION"<?php echo $ivf_stimulation_chart->SEMENPREPARATION->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_SEMENPREPARATION" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_SEMENPREPARATION">
<span<?php echo $ivf_stimulation_chart->SEMENPREPARATION->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->SEMENPREPARATION->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->REASONFORESET->Visible) { // REASONFORESET ?>
	<tr id="r_REASONFORESET">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_REASONFORESET"><script id="tpc_ivf_stimulation_chart_REASONFORESET" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->REASONFORESET->caption() ?></span></script></span></td>
		<td data-name="REASONFORESET"<?php echo $ivf_stimulation_chart->REASONFORESET->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_REASONFORESET" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_REASONFORESET">
<span<?php echo $ivf_stimulation_chart->REASONFORESET->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->REASONFORESET->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Expectedoocytes->Visible) { // Expectedoocytes ?>
	<tr id="r_Expectedoocytes">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Expectedoocytes"><script id="tpc_ivf_stimulation_chart_Expectedoocytes" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Expectedoocytes->caption() ?></span></script></span></td>
		<td data-name="Expectedoocytes"<?php echo $ivf_stimulation_chart->Expectedoocytes->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Expectedoocytes" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Expectedoocytes">
<span<?php echo $ivf_stimulation_chart->Expectedoocytes->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Expectedoocytes->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate1->Visible) { // StChDate1 ?>
	<tr id="r_StChDate1">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate1"><script id="tpc_ivf_stimulation_chart_StChDate1" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StChDate1->caption() ?></span></script></span></td>
		<td data-name="StChDate1"<?php echo $ivf_stimulation_chart->StChDate1->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate1" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StChDate1">
<span<?php echo $ivf_stimulation_chart->StChDate1->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate2->Visible) { // StChDate2 ?>
	<tr id="r_StChDate2">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate2"><script id="tpc_ivf_stimulation_chart_StChDate2" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StChDate2->caption() ?></span></script></span></td>
		<td data-name="StChDate2"<?php echo $ivf_stimulation_chart->StChDate2->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate2" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StChDate2">
<span<?php echo $ivf_stimulation_chart->StChDate2->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate3->Visible) { // StChDate3 ?>
	<tr id="r_StChDate3">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate3"><script id="tpc_ivf_stimulation_chart_StChDate3" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StChDate3->caption() ?></span></script></span></td>
		<td data-name="StChDate3"<?php echo $ivf_stimulation_chart->StChDate3->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate3" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StChDate3">
<span<?php echo $ivf_stimulation_chart->StChDate3->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate3->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate4->Visible) { // StChDate4 ?>
	<tr id="r_StChDate4">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate4"><script id="tpc_ivf_stimulation_chart_StChDate4" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StChDate4->caption() ?></span></script></span></td>
		<td data-name="StChDate4"<?php echo $ivf_stimulation_chart->StChDate4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate4" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StChDate4">
<span<?php echo $ivf_stimulation_chart->StChDate4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate4->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate5->Visible) { // StChDate5 ?>
	<tr id="r_StChDate5">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate5"><script id="tpc_ivf_stimulation_chart_StChDate5" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StChDate5->caption() ?></span></script></span></td>
		<td data-name="StChDate5"<?php echo $ivf_stimulation_chart->StChDate5->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate5" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StChDate5">
<span<?php echo $ivf_stimulation_chart->StChDate5->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate5->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate6->Visible) { // StChDate6 ?>
	<tr id="r_StChDate6">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate6"><script id="tpc_ivf_stimulation_chart_StChDate6" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StChDate6->caption() ?></span></script></span></td>
		<td data-name="StChDate6"<?php echo $ivf_stimulation_chart->StChDate6->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate6" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StChDate6">
<span<?php echo $ivf_stimulation_chart->StChDate6->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate6->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate7->Visible) { // StChDate7 ?>
	<tr id="r_StChDate7">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate7"><script id="tpc_ivf_stimulation_chart_StChDate7" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StChDate7->caption() ?></span></script></span></td>
		<td data-name="StChDate7"<?php echo $ivf_stimulation_chart->StChDate7->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate7" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StChDate7">
<span<?php echo $ivf_stimulation_chart->StChDate7->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate7->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate8->Visible) { // StChDate8 ?>
	<tr id="r_StChDate8">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate8"><script id="tpc_ivf_stimulation_chart_StChDate8" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StChDate8->caption() ?></span></script></span></td>
		<td data-name="StChDate8"<?php echo $ivf_stimulation_chart->StChDate8->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate8" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StChDate8">
<span<?php echo $ivf_stimulation_chart->StChDate8->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate8->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate9->Visible) { // StChDate9 ?>
	<tr id="r_StChDate9">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate9"><script id="tpc_ivf_stimulation_chart_StChDate9" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StChDate9->caption() ?></span></script></span></td>
		<td data-name="StChDate9"<?php echo $ivf_stimulation_chart->StChDate9->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate9" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StChDate9">
<span<?php echo $ivf_stimulation_chart->StChDate9->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate9->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate10->Visible) { // StChDate10 ?>
	<tr id="r_StChDate10">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate10"><script id="tpc_ivf_stimulation_chart_StChDate10" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StChDate10->caption() ?></span></script></span></td>
		<td data-name="StChDate10"<?php echo $ivf_stimulation_chart->StChDate10->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate10" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StChDate10">
<span<?php echo $ivf_stimulation_chart->StChDate10->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate10->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate11->Visible) { // StChDate11 ?>
	<tr id="r_StChDate11">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate11"><script id="tpc_ivf_stimulation_chart_StChDate11" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StChDate11->caption() ?></span></script></span></td>
		<td data-name="StChDate11"<?php echo $ivf_stimulation_chart->StChDate11->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate11" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StChDate11">
<span<?php echo $ivf_stimulation_chart->StChDate11->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate11->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate12->Visible) { // StChDate12 ?>
	<tr id="r_StChDate12">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate12"><script id="tpc_ivf_stimulation_chart_StChDate12" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StChDate12->caption() ?></span></script></span></td>
		<td data-name="StChDate12"<?php echo $ivf_stimulation_chart->StChDate12->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate12" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StChDate12">
<span<?php echo $ivf_stimulation_chart->StChDate12->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate12->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate13->Visible) { // StChDate13 ?>
	<tr id="r_StChDate13">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate13"><script id="tpc_ivf_stimulation_chart_StChDate13" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StChDate13->caption() ?></span></script></span></td>
		<td data-name="StChDate13"<?php echo $ivf_stimulation_chart->StChDate13->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate13" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StChDate13">
<span<?php echo $ivf_stimulation_chart->StChDate13->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate13->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay1->Visible) { // CycleDay1 ?>
	<tr id="r_CycleDay1">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay1"><script id="tpc_ivf_stimulation_chart_CycleDay1" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->CycleDay1->caption() ?></span></script></span></td>
		<td data-name="CycleDay1"<?php echo $ivf_stimulation_chart->CycleDay1->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay1" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_CycleDay1">
<span<?php echo $ivf_stimulation_chart->CycleDay1->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay2->Visible) { // CycleDay2 ?>
	<tr id="r_CycleDay2">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay2"><script id="tpc_ivf_stimulation_chart_CycleDay2" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->CycleDay2->caption() ?></span></script></span></td>
		<td data-name="CycleDay2"<?php echo $ivf_stimulation_chart->CycleDay2->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay2" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_CycleDay2">
<span<?php echo $ivf_stimulation_chart->CycleDay2->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay3->Visible) { // CycleDay3 ?>
	<tr id="r_CycleDay3">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay3"><script id="tpc_ivf_stimulation_chart_CycleDay3" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->CycleDay3->caption() ?></span></script></span></td>
		<td data-name="CycleDay3"<?php echo $ivf_stimulation_chart->CycleDay3->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay3" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_CycleDay3">
<span<?php echo $ivf_stimulation_chart->CycleDay3->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay3->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay4->Visible) { // CycleDay4 ?>
	<tr id="r_CycleDay4">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay4"><script id="tpc_ivf_stimulation_chart_CycleDay4" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->CycleDay4->caption() ?></span></script></span></td>
		<td data-name="CycleDay4"<?php echo $ivf_stimulation_chart->CycleDay4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay4" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_CycleDay4">
<span<?php echo $ivf_stimulation_chart->CycleDay4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay4->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay5->Visible) { // CycleDay5 ?>
	<tr id="r_CycleDay5">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay5"><script id="tpc_ivf_stimulation_chart_CycleDay5" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->CycleDay5->caption() ?></span></script></span></td>
		<td data-name="CycleDay5"<?php echo $ivf_stimulation_chart->CycleDay5->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay5" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_CycleDay5">
<span<?php echo $ivf_stimulation_chart->CycleDay5->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay5->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay6->Visible) { // CycleDay6 ?>
	<tr id="r_CycleDay6">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay6"><script id="tpc_ivf_stimulation_chart_CycleDay6" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->CycleDay6->caption() ?></span></script></span></td>
		<td data-name="CycleDay6"<?php echo $ivf_stimulation_chart->CycleDay6->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay6" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_CycleDay6">
<span<?php echo $ivf_stimulation_chart->CycleDay6->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay6->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay7->Visible) { // CycleDay7 ?>
	<tr id="r_CycleDay7">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay7"><script id="tpc_ivf_stimulation_chart_CycleDay7" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->CycleDay7->caption() ?></span></script></span></td>
		<td data-name="CycleDay7"<?php echo $ivf_stimulation_chart->CycleDay7->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay7" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_CycleDay7">
<span<?php echo $ivf_stimulation_chart->CycleDay7->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay7->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay8->Visible) { // CycleDay8 ?>
	<tr id="r_CycleDay8">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay8"><script id="tpc_ivf_stimulation_chart_CycleDay8" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->CycleDay8->caption() ?></span></script></span></td>
		<td data-name="CycleDay8"<?php echo $ivf_stimulation_chart->CycleDay8->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay8" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_CycleDay8">
<span<?php echo $ivf_stimulation_chart->CycleDay8->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay8->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay9->Visible) { // CycleDay9 ?>
	<tr id="r_CycleDay9">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay9"><script id="tpc_ivf_stimulation_chart_CycleDay9" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->CycleDay9->caption() ?></span></script></span></td>
		<td data-name="CycleDay9"<?php echo $ivf_stimulation_chart->CycleDay9->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay9" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_CycleDay9">
<span<?php echo $ivf_stimulation_chart->CycleDay9->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay9->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay10->Visible) { // CycleDay10 ?>
	<tr id="r_CycleDay10">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay10"><script id="tpc_ivf_stimulation_chart_CycleDay10" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->CycleDay10->caption() ?></span></script></span></td>
		<td data-name="CycleDay10"<?php echo $ivf_stimulation_chart->CycleDay10->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay10" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_CycleDay10">
<span<?php echo $ivf_stimulation_chart->CycleDay10->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay10->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay11->Visible) { // CycleDay11 ?>
	<tr id="r_CycleDay11">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay11"><script id="tpc_ivf_stimulation_chart_CycleDay11" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->CycleDay11->caption() ?></span></script></span></td>
		<td data-name="CycleDay11"<?php echo $ivf_stimulation_chart->CycleDay11->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay11" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_CycleDay11">
<span<?php echo $ivf_stimulation_chart->CycleDay11->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay11->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay12->Visible) { // CycleDay12 ?>
	<tr id="r_CycleDay12">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay12"><script id="tpc_ivf_stimulation_chart_CycleDay12" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->CycleDay12->caption() ?></span></script></span></td>
		<td data-name="CycleDay12"<?php echo $ivf_stimulation_chart->CycleDay12->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay12" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_CycleDay12">
<span<?php echo $ivf_stimulation_chart->CycleDay12->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay12->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay13->Visible) { // CycleDay13 ?>
	<tr id="r_CycleDay13">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay13"><script id="tpc_ivf_stimulation_chart_CycleDay13" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->CycleDay13->caption() ?></span></script></span></td>
		<td data-name="CycleDay13"<?php echo $ivf_stimulation_chart->CycleDay13->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay13" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_CycleDay13">
<span<?php echo $ivf_stimulation_chart->CycleDay13->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay13->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay1->Visible) { // StimulationDay1 ?>
	<tr id="r_StimulationDay1">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay1"><script id="tpc_ivf_stimulation_chart_StimulationDay1" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StimulationDay1->caption() ?></span></script></span></td>
		<td data-name="StimulationDay1"<?php echo $ivf_stimulation_chart->StimulationDay1->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay1" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StimulationDay1">
<span<?php echo $ivf_stimulation_chart->StimulationDay1->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay2->Visible) { // StimulationDay2 ?>
	<tr id="r_StimulationDay2">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay2"><script id="tpc_ivf_stimulation_chart_StimulationDay2" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StimulationDay2->caption() ?></span></script></span></td>
		<td data-name="StimulationDay2"<?php echo $ivf_stimulation_chart->StimulationDay2->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay2" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StimulationDay2">
<span<?php echo $ivf_stimulation_chart->StimulationDay2->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay3->Visible) { // StimulationDay3 ?>
	<tr id="r_StimulationDay3">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay3"><script id="tpc_ivf_stimulation_chart_StimulationDay3" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StimulationDay3->caption() ?></span></script></span></td>
		<td data-name="StimulationDay3"<?php echo $ivf_stimulation_chart->StimulationDay3->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay3" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StimulationDay3">
<span<?php echo $ivf_stimulation_chart->StimulationDay3->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay3->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay4->Visible) { // StimulationDay4 ?>
	<tr id="r_StimulationDay4">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay4"><script id="tpc_ivf_stimulation_chart_StimulationDay4" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StimulationDay4->caption() ?></span></script></span></td>
		<td data-name="StimulationDay4"<?php echo $ivf_stimulation_chart->StimulationDay4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay4" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StimulationDay4">
<span<?php echo $ivf_stimulation_chart->StimulationDay4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay4->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay5->Visible) { // StimulationDay5 ?>
	<tr id="r_StimulationDay5">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay5"><script id="tpc_ivf_stimulation_chart_StimulationDay5" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StimulationDay5->caption() ?></span></script></span></td>
		<td data-name="StimulationDay5"<?php echo $ivf_stimulation_chart->StimulationDay5->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay5" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StimulationDay5">
<span<?php echo $ivf_stimulation_chart->StimulationDay5->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay5->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay6->Visible) { // StimulationDay6 ?>
	<tr id="r_StimulationDay6">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay6"><script id="tpc_ivf_stimulation_chart_StimulationDay6" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StimulationDay6->caption() ?></span></script></span></td>
		<td data-name="StimulationDay6"<?php echo $ivf_stimulation_chart->StimulationDay6->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay6" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StimulationDay6">
<span<?php echo $ivf_stimulation_chart->StimulationDay6->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay6->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay7->Visible) { // StimulationDay7 ?>
	<tr id="r_StimulationDay7">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay7"><script id="tpc_ivf_stimulation_chart_StimulationDay7" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StimulationDay7->caption() ?></span></script></span></td>
		<td data-name="StimulationDay7"<?php echo $ivf_stimulation_chart->StimulationDay7->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay7" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StimulationDay7">
<span<?php echo $ivf_stimulation_chart->StimulationDay7->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay7->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay8->Visible) { // StimulationDay8 ?>
	<tr id="r_StimulationDay8">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay8"><script id="tpc_ivf_stimulation_chart_StimulationDay8" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StimulationDay8->caption() ?></span></script></span></td>
		<td data-name="StimulationDay8"<?php echo $ivf_stimulation_chart->StimulationDay8->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay8" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StimulationDay8">
<span<?php echo $ivf_stimulation_chart->StimulationDay8->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay8->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay9->Visible) { // StimulationDay9 ?>
	<tr id="r_StimulationDay9">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay9"><script id="tpc_ivf_stimulation_chart_StimulationDay9" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StimulationDay9->caption() ?></span></script></span></td>
		<td data-name="StimulationDay9"<?php echo $ivf_stimulation_chart->StimulationDay9->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay9" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StimulationDay9">
<span<?php echo $ivf_stimulation_chart->StimulationDay9->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay9->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay10->Visible) { // StimulationDay10 ?>
	<tr id="r_StimulationDay10">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay10"><script id="tpc_ivf_stimulation_chart_StimulationDay10" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StimulationDay10->caption() ?></span></script></span></td>
		<td data-name="StimulationDay10"<?php echo $ivf_stimulation_chart->StimulationDay10->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay10" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StimulationDay10">
<span<?php echo $ivf_stimulation_chart->StimulationDay10->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay10->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay11->Visible) { // StimulationDay11 ?>
	<tr id="r_StimulationDay11">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay11"><script id="tpc_ivf_stimulation_chart_StimulationDay11" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StimulationDay11->caption() ?></span></script></span></td>
		<td data-name="StimulationDay11"<?php echo $ivf_stimulation_chart->StimulationDay11->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay11" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StimulationDay11">
<span<?php echo $ivf_stimulation_chart->StimulationDay11->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay11->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay12->Visible) { // StimulationDay12 ?>
	<tr id="r_StimulationDay12">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay12"><script id="tpc_ivf_stimulation_chart_StimulationDay12" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StimulationDay12->caption() ?></span></script></span></td>
		<td data-name="StimulationDay12"<?php echo $ivf_stimulation_chart->StimulationDay12->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay12" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StimulationDay12">
<span<?php echo $ivf_stimulation_chart->StimulationDay12->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay12->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay13->Visible) { // StimulationDay13 ?>
	<tr id="r_StimulationDay13">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay13"><script id="tpc_ivf_stimulation_chart_StimulationDay13" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StimulationDay13->caption() ?></span></script></span></td>
		<td data-name="StimulationDay13"<?php echo $ivf_stimulation_chart->StimulationDay13->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay13" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StimulationDay13">
<span<?php echo $ivf_stimulation_chart->StimulationDay13->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay13->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet1->Visible) { // Tablet1 ?>
	<tr id="r_Tablet1">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet1"><script id="tpc_ivf_stimulation_chart_Tablet1" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Tablet1->caption() ?></span></script></span></td>
		<td data-name="Tablet1"<?php echo $ivf_stimulation_chart->Tablet1->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet1" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Tablet1">
<span<?php echo $ivf_stimulation_chart->Tablet1->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet2->Visible) { // Tablet2 ?>
	<tr id="r_Tablet2">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet2"><script id="tpc_ivf_stimulation_chart_Tablet2" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Tablet2->caption() ?></span></script></span></td>
		<td data-name="Tablet2"<?php echo $ivf_stimulation_chart->Tablet2->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet2" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Tablet2">
<span<?php echo $ivf_stimulation_chart->Tablet2->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet3->Visible) { // Tablet3 ?>
	<tr id="r_Tablet3">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet3"><script id="tpc_ivf_stimulation_chart_Tablet3" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Tablet3->caption() ?></span></script></span></td>
		<td data-name="Tablet3"<?php echo $ivf_stimulation_chart->Tablet3->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet3" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Tablet3">
<span<?php echo $ivf_stimulation_chart->Tablet3->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet3->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet4->Visible) { // Tablet4 ?>
	<tr id="r_Tablet4">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet4"><script id="tpc_ivf_stimulation_chart_Tablet4" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Tablet4->caption() ?></span></script></span></td>
		<td data-name="Tablet4"<?php echo $ivf_stimulation_chart->Tablet4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet4" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Tablet4">
<span<?php echo $ivf_stimulation_chart->Tablet4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet4->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet5->Visible) { // Tablet5 ?>
	<tr id="r_Tablet5">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet5"><script id="tpc_ivf_stimulation_chart_Tablet5" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Tablet5->caption() ?></span></script></span></td>
		<td data-name="Tablet5"<?php echo $ivf_stimulation_chart->Tablet5->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet5" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Tablet5">
<span<?php echo $ivf_stimulation_chart->Tablet5->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet5->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet6->Visible) { // Tablet6 ?>
	<tr id="r_Tablet6">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet6"><script id="tpc_ivf_stimulation_chart_Tablet6" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Tablet6->caption() ?></span></script></span></td>
		<td data-name="Tablet6"<?php echo $ivf_stimulation_chart->Tablet6->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet6" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Tablet6">
<span<?php echo $ivf_stimulation_chart->Tablet6->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet6->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet7->Visible) { // Tablet7 ?>
	<tr id="r_Tablet7">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet7"><script id="tpc_ivf_stimulation_chart_Tablet7" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Tablet7->caption() ?></span></script></span></td>
		<td data-name="Tablet7"<?php echo $ivf_stimulation_chart->Tablet7->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet7" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Tablet7">
<span<?php echo $ivf_stimulation_chart->Tablet7->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet7->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet8->Visible) { // Tablet8 ?>
	<tr id="r_Tablet8">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet8"><script id="tpc_ivf_stimulation_chart_Tablet8" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Tablet8->caption() ?></span></script></span></td>
		<td data-name="Tablet8"<?php echo $ivf_stimulation_chart->Tablet8->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet8" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Tablet8">
<span<?php echo $ivf_stimulation_chart->Tablet8->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet8->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet9->Visible) { // Tablet9 ?>
	<tr id="r_Tablet9">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet9"><script id="tpc_ivf_stimulation_chart_Tablet9" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Tablet9->caption() ?></span></script></span></td>
		<td data-name="Tablet9"<?php echo $ivf_stimulation_chart->Tablet9->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet9" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Tablet9">
<span<?php echo $ivf_stimulation_chart->Tablet9->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet9->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet10->Visible) { // Tablet10 ?>
	<tr id="r_Tablet10">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet10"><script id="tpc_ivf_stimulation_chart_Tablet10" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Tablet10->caption() ?></span></script></span></td>
		<td data-name="Tablet10"<?php echo $ivf_stimulation_chart->Tablet10->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet10" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Tablet10">
<span<?php echo $ivf_stimulation_chart->Tablet10->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet10->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet11->Visible) { // Tablet11 ?>
	<tr id="r_Tablet11">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet11"><script id="tpc_ivf_stimulation_chart_Tablet11" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Tablet11->caption() ?></span></script></span></td>
		<td data-name="Tablet11"<?php echo $ivf_stimulation_chart->Tablet11->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet11" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Tablet11">
<span<?php echo $ivf_stimulation_chart->Tablet11->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet11->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet12->Visible) { // Tablet12 ?>
	<tr id="r_Tablet12">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet12"><script id="tpc_ivf_stimulation_chart_Tablet12" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Tablet12->caption() ?></span></script></span></td>
		<td data-name="Tablet12"<?php echo $ivf_stimulation_chart->Tablet12->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet12" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Tablet12">
<span<?php echo $ivf_stimulation_chart->Tablet12->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet12->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet13->Visible) { // Tablet13 ?>
	<tr id="r_Tablet13">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet13"><script id="tpc_ivf_stimulation_chart_Tablet13" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Tablet13->caption() ?></span></script></span></td>
		<td data-name="Tablet13"<?php echo $ivf_stimulation_chart->Tablet13->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet13" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Tablet13">
<span<?php echo $ivf_stimulation_chart->Tablet13->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet13->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH1->Visible) { // RFSH1 ?>
	<tr id="r_RFSH1">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH1"><script id="tpc_ivf_stimulation_chart_RFSH1" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->RFSH1->caption() ?></span></script></span></td>
		<td data-name="RFSH1"<?php echo $ivf_stimulation_chart->RFSH1->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH1" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_RFSH1">
<span<?php echo $ivf_stimulation_chart->RFSH1->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH2->Visible) { // RFSH2 ?>
	<tr id="r_RFSH2">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH2"><script id="tpc_ivf_stimulation_chart_RFSH2" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->RFSH2->caption() ?></span></script></span></td>
		<td data-name="RFSH2"<?php echo $ivf_stimulation_chart->RFSH2->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH2" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_RFSH2">
<span<?php echo $ivf_stimulation_chart->RFSH2->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH3->Visible) { // RFSH3 ?>
	<tr id="r_RFSH3">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH3"><script id="tpc_ivf_stimulation_chart_RFSH3" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->RFSH3->caption() ?></span></script></span></td>
		<td data-name="RFSH3"<?php echo $ivf_stimulation_chart->RFSH3->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH3" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_RFSH3">
<span<?php echo $ivf_stimulation_chart->RFSH3->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH3->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH4->Visible) { // RFSH4 ?>
	<tr id="r_RFSH4">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH4"><script id="tpc_ivf_stimulation_chart_RFSH4" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->RFSH4->caption() ?></span></script></span></td>
		<td data-name="RFSH4"<?php echo $ivf_stimulation_chart->RFSH4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH4" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_RFSH4">
<span<?php echo $ivf_stimulation_chart->RFSH4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH4->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH5->Visible) { // RFSH5 ?>
	<tr id="r_RFSH5">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH5"><script id="tpc_ivf_stimulation_chart_RFSH5" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->RFSH5->caption() ?></span></script></span></td>
		<td data-name="RFSH5"<?php echo $ivf_stimulation_chart->RFSH5->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH5" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_RFSH5">
<span<?php echo $ivf_stimulation_chart->RFSH5->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH5->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH6->Visible) { // RFSH6 ?>
	<tr id="r_RFSH6">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH6"><script id="tpc_ivf_stimulation_chart_RFSH6" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->RFSH6->caption() ?></span></script></span></td>
		<td data-name="RFSH6"<?php echo $ivf_stimulation_chart->RFSH6->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH6" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_RFSH6">
<span<?php echo $ivf_stimulation_chart->RFSH6->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH6->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH7->Visible) { // RFSH7 ?>
	<tr id="r_RFSH7">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH7"><script id="tpc_ivf_stimulation_chart_RFSH7" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->RFSH7->caption() ?></span></script></span></td>
		<td data-name="RFSH7"<?php echo $ivf_stimulation_chart->RFSH7->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH7" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_RFSH7">
<span<?php echo $ivf_stimulation_chart->RFSH7->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH7->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH8->Visible) { // RFSH8 ?>
	<tr id="r_RFSH8">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH8"><script id="tpc_ivf_stimulation_chart_RFSH8" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->RFSH8->caption() ?></span></script></span></td>
		<td data-name="RFSH8"<?php echo $ivf_stimulation_chart->RFSH8->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH8" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_RFSH8">
<span<?php echo $ivf_stimulation_chart->RFSH8->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH8->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH9->Visible) { // RFSH9 ?>
	<tr id="r_RFSH9">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH9"><script id="tpc_ivf_stimulation_chart_RFSH9" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->RFSH9->caption() ?></span></script></span></td>
		<td data-name="RFSH9"<?php echo $ivf_stimulation_chart->RFSH9->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH9" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_RFSH9">
<span<?php echo $ivf_stimulation_chart->RFSH9->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH9->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH10->Visible) { // RFSH10 ?>
	<tr id="r_RFSH10">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH10"><script id="tpc_ivf_stimulation_chart_RFSH10" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->RFSH10->caption() ?></span></script></span></td>
		<td data-name="RFSH10"<?php echo $ivf_stimulation_chart->RFSH10->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH10" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_RFSH10">
<span<?php echo $ivf_stimulation_chart->RFSH10->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH10->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH11->Visible) { // RFSH11 ?>
	<tr id="r_RFSH11">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH11"><script id="tpc_ivf_stimulation_chart_RFSH11" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->RFSH11->caption() ?></span></script></span></td>
		<td data-name="RFSH11"<?php echo $ivf_stimulation_chart->RFSH11->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH11" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_RFSH11">
<span<?php echo $ivf_stimulation_chart->RFSH11->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH11->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH12->Visible) { // RFSH12 ?>
	<tr id="r_RFSH12">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH12"><script id="tpc_ivf_stimulation_chart_RFSH12" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->RFSH12->caption() ?></span></script></span></td>
		<td data-name="RFSH12"<?php echo $ivf_stimulation_chart->RFSH12->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH12" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_RFSH12">
<span<?php echo $ivf_stimulation_chart->RFSH12->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH12->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH13->Visible) { // RFSH13 ?>
	<tr id="r_RFSH13">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH13"><script id="tpc_ivf_stimulation_chart_RFSH13" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->RFSH13->caption() ?></span></script></span></td>
		<td data-name="RFSH13"<?php echo $ivf_stimulation_chart->RFSH13->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH13" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_RFSH13">
<span<?php echo $ivf_stimulation_chart->RFSH13->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH13->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG1->Visible) { // HMG1 ?>
	<tr id="r_HMG1">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG1"><script id="tpc_ivf_stimulation_chart_HMG1" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->HMG1->caption() ?></span></script></span></td>
		<td data-name="HMG1"<?php echo $ivf_stimulation_chart->HMG1->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG1" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_HMG1">
<span<?php echo $ivf_stimulation_chart->HMG1->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG2->Visible) { // HMG2 ?>
	<tr id="r_HMG2">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG2"><script id="tpc_ivf_stimulation_chart_HMG2" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->HMG2->caption() ?></span></script></span></td>
		<td data-name="HMG2"<?php echo $ivf_stimulation_chart->HMG2->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG2" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_HMG2">
<span<?php echo $ivf_stimulation_chart->HMG2->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG3->Visible) { // HMG3 ?>
	<tr id="r_HMG3">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG3"><script id="tpc_ivf_stimulation_chart_HMG3" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->HMG3->caption() ?></span></script></span></td>
		<td data-name="HMG3"<?php echo $ivf_stimulation_chart->HMG3->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG3" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_HMG3">
<span<?php echo $ivf_stimulation_chart->HMG3->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG3->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG4->Visible) { // HMG4 ?>
	<tr id="r_HMG4">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG4"><script id="tpc_ivf_stimulation_chart_HMG4" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->HMG4->caption() ?></span></script></span></td>
		<td data-name="HMG4"<?php echo $ivf_stimulation_chart->HMG4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG4" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_HMG4">
<span<?php echo $ivf_stimulation_chart->HMG4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG4->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG5->Visible) { // HMG5 ?>
	<tr id="r_HMG5">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG5"><script id="tpc_ivf_stimulation_chart_HMG5" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->HMG5->caption() ?></span></script></span></td>
		<td data-name="HMG5"<?php echo $ivf_stimulation_chart->HMG5->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG5" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_HMG5">
<span<?php echo $ivf_stimulation_chart->HMG5->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG5->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG6->Visible) { // HMG6 ?>
	<tr id="r_HMG6">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG6"><script id="tpc_ivf_stimulation_chart_HMG6" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->HMG6->caption() ?></span></script></span></td>
		<td data-name="HMG6"<?php echo $ivf_stimulation_chart->HMG6->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG6" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_HMG6">
<span<?php echo $ivf_stimulation_chart->HMG6->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG6->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG7->Visible) { // HMG7 ?>
	<tr id="r_HMG7">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG7"><script id="tpc_ivf_stimulation_chart_HMG7" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->HMG7->caption() ?></span></script></span></td>
		<td data-name="HMG7"<?php echo $ivf_stimulation_chart->HMG7->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG7" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_HMG7">
<span<?php echo $ivf_stimulation_chart->HMG7->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG7->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG8->Visible) { // HMG8 ?>
	<tr id="r_HMG8">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG8"><script id="tpc_ivf_stimulation_chart_HMG8" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->HMG8->caption() ?></span></script></span></td>
		<td data-name="HMG8"<?php echo $ivf_stimulation_chart->HMG8->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG8" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_HMG8">
<span<?php echo $ivf_stimulation_chart->HMG8->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG8->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG9->Visible) { // HMG9 ?>
	<tr id="r_HMG9">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG9"><script id="tpc_ivf_stimulation_chart_HMG9" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->HMG9->caption() ?></span></script></span></td>
		<td data-name="HMG9"<?php echo $ivf_stimulation_chart->HMG9->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG9" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_HMG9">
<span<?php echo $ivf_stimulation_chart->HMG9->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG9->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG10->Visible) { // HMG10 ?>
	<tr id="r_HMG10">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG10"><script id="tpc_ivf_stimulation_chart_HMG10" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->HMG10->caption() ?></span></script></span></td>
		<td data-name="HMG10"<?php echo $ivf_stimulation_chart->HMG10->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG10" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_HMG10">
<span<?php echo $ivf_stimulation_chart->HMG10->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG10->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG11->Visible) { // HMG11 ?>
	<tr id="r_HMG11">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG11"><script id="tpc_ivf_stimulation_chart_HMG11" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->HMG11->caption() ?></span></script></span></td>
		<td data-name="HMG11"<?php echo $ivf_stimulation_chart->HMG11->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG11" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_HMG11">
<span<?php echo $ivf_stimulation_chart->HMG11->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG11->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG12->Visible) { // HMG12 ?>
	<tr id="r_HMG12">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG12"><script id="tpc_ivf_stimulation_chart_HMG12" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->HMG12->caption() ?></span></script></span></td>
		<td data-name="HMG12"<?php echo $ivf_stimulation_chart->HMG12->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG12" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_HMG12">
<span<?php echo $ivf_stimulation_chart->HMG12->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG12->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG13->Visible) { // HMG13 ?>
	<tr id="r_HMG13">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG13"><script id="tpc_ivf_stimulation_chart_HMG13" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->HMG13->caption() ?></span></script></span></td>
		<td data-name="HMG13"<?php echo $ivf_stimulation_chart->HMG13->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG13" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_HMG13">
<span<?php echo $ivf_stimulation_chart->HMG13->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG13->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH1->Visible) { // GnRH1 ?>
	<tr id="r_GnRH1">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH1"><script id="tpc_ivf_stimulation_chart_GnRH1" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->GnRH1->caption() ?></span></script></span></td>
		<td data-name="GnRH1"<?php echo $ivf_stimulation_chart->GnRH1->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH1" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_GnRH1">
<span<?php echo $ivf_stimulation_chart->GnRH1->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH2->Visible) { // GnRH2 ?>
	<tr id="r_GnRH2">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH2"><script id="tpc_ivf_stimulation_chart_GnRH2" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->GnRH2->caption() ?></span></script></span></td>
		<td data-name="GnRH2"<?php echo $ivf_stimulation_chart->GnRH2->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH2" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_GnRH2">
<span<?php echo $ivf_stimulation_chart->GnRH2->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH3->Visible) { // GnRH3 ?>
	<tr id="r_GnRH3">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH3"><script id="tpc_ivf_stimulation_chart_GnRH3" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->GnRH3->caption() ?></span></script></span></td>
		<td data-name="GnRH3"<?php echo $ivf_stimulation_chart->GnRH3->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH3" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_GnRH3">
<span<?php echo $ivf_stimulation_chart->GnRH3->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH3->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH4->Visible) { // GnRH4 ?>
	<tr id="r_GnRH4">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH4"><script id="tpc_ivf_stimulation_chart_GnRH4" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->GnRH4->caption() ?></span></script></span></td>
		<td data-name="GnRH4"<?php echo $ivf_stimulation_chart->GnRH4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH4" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_GnRH4">
<span<?php echo $ivf_stimulation_chart->GnRH4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH4->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH5->Visible) { // GnRH5 ?>
	<tr id="r_GnRH5">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH5"><script id="tpc_ivf_stimulation_chart_GnRH5" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->GnRH5->caption() ?></span></script></span></td>
		<td data-name="GnRH5"<?php echo $ivf_stimulation_chart->GnRH5->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH5" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_GnRH5">
<span<?php echo $ivf_stimulation_chart->GnRH5->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH5->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH6->Visible) { // GnRH6 ?>
	<tr id="r_GnRH6">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH6"><script id="tpc_ivf_stimulation_chart_GnRH6" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->GnRH6->caption() ?></span></script></span></td>
		<td data-name="GnRH6"<?php echo $ivf_stimulation_chart->GnRH6->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH6" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_GnRH6">
<span<?php echo $ivf_stimulation_chart->GnRH6->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH6->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH7->Visible) { // GnRH7 ?>
	<tr id="r_GnRH7">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH7"><script id="tpc_ivf_stimulation_chart_GnRH7" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->GnRH7->caption() ?></span></script></span></td>
		<td data-name="GnRH7"<?php echo $ivf_stimulation_chart->GnRH7->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH7" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_GnRH7">
<span<?php echo $ivf_stimulation_chart->GnRH7->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH7->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH8->Visible) { // GnRH8 ?>
	<tr id="r_GnRH8">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH8"><script id="tpc_ivf_stimulation_chart_GnRH8" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->GnRH8->caption() ?></span></script></span></td>
		<td data-name="GnRH8"<?php echo $ivf_stimulation_chart->GnRH8->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH8" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_GnRH8">
<span<?php echo $ivf_stimulation_chart->GnRH8->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH8->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH9->Visible) { // GnRH9 ?>
	<tr id="r_GnRH9">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH9"><script id="tpc_ivf_stimulation_chart_GnRH9" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->GnRH9->caption() ?></span></script></span></td>
		<td data-name="GnRH9"<?php echo $ivf_stimulation_chart->GnRH9->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH9" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_GnRH9">
<span<?php echo $ivf_stimulation_chart->GnRH9->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH9->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH10->Visible) { // GnRH10 ?>
	<tr id="r_GnRH10">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH10"><script id="tpc_ivf_stimulation_chart_GnRH10" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->GnRH10->caption() ?></span></script></span></td>
		<td data-name="GnRH10"<?php echo $ivf_stimulation_chart->GnRH10->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH10" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_GnRH10">
<span<?php echo $ivf_stimulation_chart->GnRH10->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH10->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH11->Visible) { // GnRH11 ?>
	<tr id="r_GnRH11">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH11"><script id="tpc_ivf_stimulation_chart_GnRH11" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->GnRH11->caption() ?></span></script></span></td>
		<td data-name="GnRH11"<?php echo $ivf_stimulation_chart->GnRH11->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH11" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_GnRH11">
<span<?php echo $ivf_stimulation_chart->GnRH11->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH11->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH12->Visible) { // GnRH12 ?>
	<tr id="r_GnRH12">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH12"><script id="tpc_ivf_stimulation_chart_GnRH12" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->GnRH12->caption() ?></span></script></span></td>
		<td data-name="GnRH12"<?php echo $ivf_stimulation_chart->GnRH12->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH12" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_GnRH12">
<span<?php echo $ivf_stimulation_chart->GnRH12->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH12->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH13->Visible) { // GnRH13 ?>
	<tr id="r_GnRH13">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH13"><script id="tpc_ivf_stimulation_chart_GnRH13" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->GnRH13->caption() ?></span></script></span></td>
		<td data-name="GnRH13"<?php echo $ivf_stimulation_chart->GnRH13->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH13" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_GnRH13">
<span<?php echo $ivf_stimulation_chart->GnRH13->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH13->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->E21->Visible) { // E21 ?>
	<tr id="r_E21">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E21"><script id="tpc_ivf_stimulation_chart_E21" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->E21->caption() ?></span></script></span></td>
		<td data-name="E21"<?php echo $ivf_stimulation_chart->E21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E21" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_E21">
<span<?php echo $ivf_stimulation_chart->E21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E21->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->E22->Visible) { // E22 ?>
	<tr id="r_E22">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E22"><script id="tpc_ivf_stimulation_chart_E22" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->E22->caption() ?></span></script></span></td>
		<td data-name="E22"<?php echo $ivf_stimulation_chart->E22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E22" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_E22">
<span<?php echo $ivf_stimulation_chart->E22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E22->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->E23->Visible) { // E23 ?>
	<tr id="r_E23">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E23"><script id="tpc_ivf_stimulation_chart_E23" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->E23->caption() ?></span></script></span></td>
		<td data-name="E23"<?php echo $ivf_stimulation_chart->E23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E23" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_E23">
<span<?php echo $ivf_stimulation_chart->E23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E23->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->E24->Visible) { // E24 ?>
	<tr id="r_E24">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E24"><script id="tpc_ivf_stimulation_chart_E24" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->E24->caption() ?></span></script></span></td>
		<td data-name="E24"<?php echo $ivf_stimulation_chart->E24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E24" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_E24">
<span<?php echo $ivf_stimulation_chart->E24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E24->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->E25->Visible) { // E25 ?>
	<tr id="r_E25">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E25"><script id="tpc_ivf_stimulation_chart_E25" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->E25->caption() ?></span></script></span></td>
		<td data-name="E25"<?php echo $ivf_stimulation_chart->E25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E25" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_E25">
<span<?php echo $ivf_stimulation_chart->E25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E25->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->E26->Visible) { // E26 ?>
	<tr id="r_E26">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E26"><script id="tpc_ivf_stimulation_chart_E26" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->E26->caption() ?></span></script></span></td>
		<td data-name="E26"<?php echo $ivf_stimulation_chart->E26->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E26" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_E26">
<span<?php echo $ivf_stimulation_chart->E26->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E26->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->E27->Visible) { // E27 ?>
	<tr id="r_E27">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E27"><script id="tpc_ivf_stimulation_chart_E27" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->E27->caption() ?></span></script></span></td>
		<td data-name="E27"<?php echo $ivf_stimulation_chart->E27->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E27" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_E27">
<span<?php echo $ivf_stimulation_chart->E27->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E27->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->E28->Visible) { // E28 ?>
	<tr id="r_E28">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E28"><script id="tpc_ivf_stimulation_chart_E28" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->E28->caption() ?></span></script></span></td>
		<td data-name="E28"<?php echo $ivf_stimulation_chart->E28->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E28" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_E28">
<span<?php echo $ivf_stimulation_chart->E28->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E28->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->E29->Visible) { // E29 ?>
	<tr id="r_E29">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E29"><script id="tpc_ivf_stimulation_chart_E29" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->E29->caption() ?></span></script></span></td>
		<td data-name="E29"<?php echo $ivf_stimulation_chart->E29->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E29" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_E29">
<span<?php echo $ivf_stimulation_chart->E29->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E29->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->E210->Visible) { // E210 ?>
	<tr id="r_E210">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E210"><script id="tpc_ivf_stimulation_chart_E210" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->E210->caption() ?></span></script></span></td>
		<td data-name="E210"<?php echo $ivf_stimulation_chart->E210->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E210" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_E210">
<span<?php echo $ivf_stimulation_chart->E210->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E210->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->E211->Visible) { // E211 ?>
	<tr id="r_E211">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E211"><script id="tpc_ivf_stimulation_chart_E211" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->E211->caption() ?></span></script></span></td>
		<td data-name="E211"<?php echo $ivf_stimulation_chart->E211->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E211" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_E211">
<span<?php echo $ivf_stimulation_chart->E211->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E211->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->E212->Visible) { // E212 ?>
	<tr id="r_E212">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E212"><script id="tpc_ivf_stimulation_chart_E212" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->E212->caption() ?></span></script></span></td>
		<td data-name="E212"<?php echo $ivf_stimulation_chart->E212->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E212" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_E212">
<span<?php echo $ivf_stimulation_chart->E212->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E212->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->E213->Visible) { // E213 ?>
	<tr id="r_E213">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E213"><script id="tpc_ivf_stimulation_chart_E213" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->E213->caption() ?></span></script></span></td>
		<td data-name="E213"<?php echo $ivf_stimulation_chart->E213->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E213" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_E213">
<span<?php echo $ivf_stimulation_chart->E213->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E213->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->P41->Visible) { // P41 ?>
	<tr id="r_P41">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P41"><script id="tpc_ivf_stimulation_chart_P41" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->P41->caption() ?></span></script></span></td>
		<td data-name="P41"<?php echo $ivf_stimulation_chart->P41->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P41" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_P41">
<span<?php echo $ivf_stimulation_chart->P41->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P41->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->P42->Visible) { // P42 ?>
	<tr id="r_P42">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P42"><script id="tpc_ivf_stimulation_chart_P42" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->P42->caption() ?></span></script></span></td>
		<td data-name="P42"<?php echo $ivf_stimulation_chart->P42->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P42" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_P42">
<span<?php echo $ivf_stimulation_chart->P42->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P42->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->P43->Visible) { // P43 ?>
	<tr id="r_P43">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P43"><script id="tpc_ivf_stimulation_chart_P43" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->P43->caption() ?></span></script></span></td>
		<td data-name="P43"<?php echo $ivf_stimulation_chart->P43->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P43" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_P43">
<span<?php echo $ivf_stimulation_chart->P43->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P43->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->P44->Visible) { // P44 ?>
	<tr id="r_P44">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P44"><script id="tpc_ivf_stimulation_chart_P44" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->P44->caption() ?></span></script></span></td>
		<td data-name="P44"<?php echo $ivf_stimulation_chart->P44->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P44" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_P44">
<span<?php echo $ivf_stimulation_chart->P44->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P44->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->P45->Visible) { // P45 ?>
	<tr id="r_P45">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P45"><script id="tpc_ivf_stimulation_chart_P45" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->P45->caption() ?></span></script></span></td>
		<td data-name="P45"<?php echo $ivf_stimulation_chart->P45->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P45" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_P45">
<span<?php echo $ivf_stimulation_chart->P45->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P45->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->P46->Visible) { // P46 ?>
	<tr id="r_P46">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P46"><script id="tpc_ivf_stimulation_chart_P46" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->P46->caption() ?></span></script></span></td>
		<td data-name="P46"<?php echo $ivf_stimulation_chart->P46->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P46" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_P46">
<span<?php echo $ivf_stimulation_chart->P46->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P46->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->P47->Visible) { // P47 ?>
	<tr id="r_P47">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P47"><script id="tpc_ivf_stimulation_chart_P47" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->P47->caption() ?></span></script></span></td>
		<td data-name="P47"<?php echo $ivf_stimulation_chart->P47->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P47" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_P47">
<span<?php echo $ivf_stimulation_chart->P47->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P47->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->P48->Visible) { // P48 ?>
	<tr id="r_P48">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P48"><script id="tpc_ivf_stimulation_chart_P48" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->P48->caption() ?></span></script></span></td>
		<td data-name="P48"<?php echo $ivf_stimulation_chart->P48->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P48" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_P48">
<span<?php echo $ivf_stimulation_chart->P48->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P48->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->P49->Visible) { // P49 ?>
	<tr id="r_P49">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P49"><script id="tpc_ivf_stimulation_chart_P49" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->P49->caption() ?></span></script></span></td>
		<td data-name="P49"<?php echo $ivf_stimulation_chart->P49->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P49" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_P49">
<span<?php echo $ivf_stimulation_chart->P49->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P49->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->P410->Visible) { // P410 ?>
	<tr id="r_P410">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P410"><script id="tpc_ivf_stimulation_chart_P410" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->P410->caption() ?></span></script></span></td>
		<td data-name="P410"<?php echo $ivf_stimulation_chart->P410->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P410" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_P410">
<span<?php echo $ivf_stimulation_chart->P410->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P410->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->P411->Visible) { // P411 ?>
	<tr id="r_P411">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P411"><script id="tpc_ivf_stimulation_chart_P411" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->P411->caption() ?></span></script></span></td>
		<td data-name="P411"<?php echo $ivf_stimulation_chart->P411->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P411" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_P411">
<span<?php echo $ivf_stimulation_chart->P411->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P411->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->P412->Visible) { // P412 ?>
	<tr id="r_P412">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P412"><script id="tpc_ivf_stimulation_chart_P412" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->P412->caption() ?></span></script></span></td>
		<td data-name="P412"<?php echo $ivf_stimulation_chart->P412->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P412" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_P412">
<span<?php echo $ivf_stimulation_chart->P412->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P412->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->P413->Visible) { // P413 ?>
	<tr id="r_P413">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P413"><script id="tpc_ivf_stimulation_chart_P413" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->P413->caption() ?></span></script></span></td>
		<td data-name="P413"<?php echo $ivf_stimulation_chart->P413->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P413" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_P413">
<span<?php echo $ivf_stimulation_chart->P413->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P413->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt1->Visible) { // USGRt1 ?>
	<tr id="r_USGRt1">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt1"><script id="tpc_ivf_stimulation_chart_USGRt1" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGRt1->caption() ?></span></script></span></td>
		<td data-name="USGRt1"<?php echo $ivf_stimulation_chart->USGRt1->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt1" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGRt1">
<span<?php echo $ivf_stimulation_chart->USGRt1->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt2->Visible) { // USGRt2 ?>
	<tr id="r_USGRt2">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt2"><script id="tpc_ivf_stimulation_chart_USGRt2" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGRt2->caption() ?></span></script></span></td>
		<td data-name="USGRt2"<?php echo $ivf_stimulation_chart->USGRt2->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt2" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGRt2">
<span<?php echo $ivf_stimulation_chart->USGRt2->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt3->Visible) { // USGRt3 ?>
	<tr id="r_USGRt3">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt3"><script id="tpc_ivf_stimulation_chart_USGRt3" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGRt3->caption() ?></span></script></span></td>
		<td data-name="USGRt3"<?php echo $ivf_stimulation_chart->USGRt3->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt3" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGRt3">
<span<?php echo $ivf_stimulation_chart->USGRt3->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt3->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt4->Visible) { // USGRt4 ?>
	<tr id="r_USGRt4">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt4"><script id="tpc_ivf_stimulation_chart_USGRt4" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGRt4->caption() ?></span></script></span></td>
		<td data-name="USGRt4"<?php echo $ivf_stimulation_chart->USGRt4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt4" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGRt4">
<span<?php echo $ivf_stimulation_chart->USGRt4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt4->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt5->Visible) { // USGRt5 ?>
	<tr id="r_USGRt5">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt5"><script id="tpc_ivf_stimulation_chart_USGRt5" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGRt5->caption() ?></span></script></span></td>
		<td data-name="USGRt5"<?php echo $ivf_stimulation_chart->USGRt5->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt5" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGRt5">
<span<?php echo $ivf_stimulation_chart->USGRt5->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt5->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt6->Visible) { // USGRt6 ?>
	<tr id="r_USGRt6">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt6"><script id="tpc_ivf_stimulation_chart_USGRt6" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGRt6->caption() ?></span></script></span></td>
		<td data-name="USGRt6"<?php echo $ivf_stimulation_chart->USGRt6->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt6" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGRt6">
<span<?php echo $ivf_stimulation_chart->USGRt6->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt6->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt7->Visible) { // USGRt7 ?>
	<tr id="r_USGRt7">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt7"><script id="tpc_ivf_stimulation_chart_USGRt7" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGRt7->caption() ?></span></script></span></td>
		<td data-name="USGRt7"<?php echo $ivf_stimulation_chart->USGRt7->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt7" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGRt7">
<span<?php echo $ivf_stimulation_chart->USGRt7->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt7->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt8->Visible) { // USGRt8 ?>
	<tr id="r_USGRt8">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt8"><script id="tpc_ivf_stimulation_chart_USGRt8" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGRt8->caption() ?></span></script></span></td>
		<td data-name="USGRt8"<?php echo $ivf_stimulation_chart->USGRt8->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt8" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGRt8">
<span<?php echo $ivf_stimulation_chart->USGRt8->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt8->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt9->Visible) { // USGRt9 ?>
	<tr id="r_USGRt9">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt9"><script id="tpc_ivf_stimulation_chart_USGRt9" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGRt9->caption() ?></span></script></span></td>
		<td data-name="USGRt9"<?php echo $ivf_stimulation_chart->USGRt9->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt9" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGRt9">
<span<?php echo $ivf_stimulation_chart->USGRt9->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt9->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt10->Visible) { // USGRt10 ?>
	<tr id="r_USGRt10">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt10"><script id="tpc_ivf_stimulation_chart_USGRt10" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGRt10->caption() ?></span></script></span></td>
		<td data-name="USGRt10"<?php echo $ivf_stimulation_chart->USGRt10->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt10" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGRt10">
<span<?php echo $ivf_stimulation_chart->USGRt10->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt10->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt11->Visible) { // USGRt11 ?>
	<tr id="r_USGRt11">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt11"><script id="tpc_ivf_stimulation_chart_USGRt11" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGRt11->caption() ?></span></script></span></td>
		<td data-name="USGRt11"<?php echo $ivf_stimulation_chart->USGRt11->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt11" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGRt11">
<span<?php echo $ivf_stimulation_chart->USGRt11->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt11->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt12->Visible) { // USGRt12 ?>
	<tr id="r_USGRt12">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt12"><script id="tpc_ivf_stimulation_chart_USGRt12" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGRt12->caption() ?></span></script></span></td>
		<td data-name="USGRt12"<?php echo $ivf_stimulation_chart->USGRt12->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt12" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGRt12">
<span<?php echo $ivf_stimulation_chart->USGRt12->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt12->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt13->Visible) { // USGRt13 ?>
	<tr id="r_USGRt13">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt13"><script id="tpc_ivf_stimulation_chart_USGRt13" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGRt13->caption() ?></span></script></span></td>
		<td data-name="USGRt13"<?php echo $ivf_stimulation_chart->USGRt13->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt13" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGRt13">
<span<?php echo $ivf_stimulation_chart->USGRt13->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt13->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt1->Visible) { // USGLt1 ?>
	<tr id="r_USGLt1">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt1"><script id="tpc_ivf_stimulation_chart_USGLt1" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGLt1->caption() ?></span></script></span></td>
		<td data-name="USGLt1"<?php echo $ivf_stimulation_chart->USGLt1->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt1" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGLt1">
<span<?php echo $ivf_stimulation_chart->USGLt1->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt2->Visible) { // USGLt2 ?>
	<tr id="r_USGLt2">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt2"><script id="tpc_ivf_stimulation_chart_USGLt2" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGLt2->caption() ?></span></script></span></td>
		<td data-name="USGLt2"<?php echo $ivf_stimulation_chart->USGLt2->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt2" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGLt2">
<span<?php echo $ivf_stimulation_chart->USGLt2->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt3->Visible) { // USGLt3 ?>
	<tr id="r_USGLt3">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt3"><script id="tpc_ivf_stimulation_chart_USGLt3" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGLt3->caption() ?></span></script></span></td>
		<td data-name="USGLt3"<?php echo $ivf_stimulation_chart->USGLt3->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt3" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGLt3">
<span<?php echo $ivf_stimulation_chart->USGLt3->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt3->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt4->Visible) { // USGLt4 ?>
	<tr id="r_USGLt4">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt4"><script id="tpc_ivf_stimulation_chart_USGLt4" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGLt4->caption() ?></span></script></span></td>
		<td data-name="USGLt4"<?php echo $ivf_stimulation_chart->USGLt4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt4" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGLt4">
<span<?php echo $ivf_stimulation_chart->USGLt4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt4->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt5->Visible) { // USGLt5 ?>
	<tr id="r_USGLt5">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt5"><script id="tpc_ivf_stimulation_chart_USGLt5" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGLt5->caption() ?></span></script></span></td>
		<td data-name="USGLt5"<?php echo $ivf_stimulation_chart->USGLt5->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt5" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGLt5">
<span<?php echo $ivf_stimulation_chart->USGLt5->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt5->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt6->Visible) { // USGLt6 ?>
	<tr id="r_USGLt6">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt6"><script id="tpc_ivf_stimulation_chart_USGLt6" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGLt6->caption() ?></span></script></span></td>
		<td data-name="USGLt6"<?php echo $ivf_stimulation_chart->USGLt6->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt6" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGLt6">
<span<?php echo $ivf_stimulation_chart->USGLt6->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt6->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt7->Visible) { // USGLt7 ?>
	<tr id="r_USGLt7">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt7"><script id="tpc_ivf_stimulation_chart_USGLt7" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGLt7->caption() ?></span></script></span></td>
		<td data-name="USGLt7"<?php echo $ivf_stimulation_chart->USGLt7->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt7" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGLt7">
<span<?php echo $ivf_stimulation_chart->USGLt7->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt7->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt8->Visible) { // USGLt8 ?>
	<tr id="r_USGLt8">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt8"><script id="tpc_ivf_stimulation_chart_USGLt8" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGLt8->caption() ?></span></script></span></td>
		<td data-name="USGLt8"<?php echo $ivf_stimulation_chart->USGLt8->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt8" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGLt8">
<span<?php echo $ivf_stimulation_chart->USGLt8->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt8->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt9->Visible) { // USGLt9 ?>
	<tr id="r_USGLt9">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt9"><script id="tpc_ivf_stimulation_chart_USGLt9" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGLt9->caption() ?></span></script></span></td>
		<td data-name="USGLt9"<?php echo $ivf_stimulation_chart->USGLt9->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt9" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGLt9">
<span<?php echo $ivf_stimulation_chart->USGLt9->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt9->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt10->Visible) { // USGLt10 ?>
	<tr id="r_USGLt10">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt10"><script id="tpc_ivf_stimulation_chart_USGLt10" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGLt10->caption() ?></span></script></span></td>
		<td data-name="USGLt10"<?php echo $ivf_stimulation_chart->USGLt10->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt10" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGLt10">
<span<?php echo $ivf_stimulation_chart->USGLt10->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt10->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt11->Visible) { // USGLt11 ?>
	<tr id="r_USGLt11">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt11"><script id="tpc_ivf_stimulation_chart_USGLt11" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGLt11->caption() ?></span></script></span></td>
		<td data-name="USGLt11"<?php echo $ivf_stimulation_chart->USGLt11->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt11" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGLt11">
<span<?php echo $ivf_stimulation_chart->USGLt11->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt11->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt12->Visible) { // USGLt12 ?>
	<tr id="r_USGLt12">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt12"><script id="tpc_ivf_stimulation_chart_USGLt12" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGLt12->caption() ?></span></script></span></td>
		<td data-name="USGLt12"<?php echo $ivf_stimulation_chart->USGLt12->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt12" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGLt12">
<span<?php echo $ivf_stimulation_chart->USGLt12->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt12->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt13->Visible) { // USGLt13 ?>
	<tr id="r_USGLt13">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt13"><script id="tpc_ivf_stimulation_chart_USGLt13" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGLt13->caption() ?></span></script></span></td>
		<td data-name="USGLt13"<?php echo $ivf_stimulation_chart->USGLt13->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt13" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGLt13">
<span<?php echo $ivf_stimulation_chart->USGLt13->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt13->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM1->Visible) { // EM1 ?>
	<tr id="r_EM1">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM1"><script id="tpc_ivf_stimulation_chart_EM1" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->EM1->caption() ?></span></script></span></td>
		<td data-name="EM1"<?php echo $ivf_stimulation_chart->EM1->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM1" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_EM1">
<span<?php echo $ivf_stimulation_chart->EM1->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM2->Visible) { // EM2 ?>
	<tr id="r_EM2">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM2"><script id="tpc_ivf_stimulation_chart_EM2" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->EM2->caption() ?></span></script></span></td>
		<td data-name="EM2"<?php echo $ivf_stimulation_chart->EM2->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM2" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_EM2">
<span<?php echo $ivf_stimulation_chart->EM2->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM3->Visible) { // EM3 ?>
	<tr id="r_EM3">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM3"><script id="tpc_ivf_stimulation_chart_EM3" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->EM3->caption() ?></span></script></span></td>
		<td data-name="EM3"<?php echo $ivf_stimulation_chart->EM3->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM3" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_EM3">
<span<?php echo $ivf_stimulation_chart->EM3->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM3->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM4->Visible) { // EM4 ?>
	<tr id="r_EM4">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM4"><script id="tpc_ivf_stimulation_chart_EM4" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->EM4->caption() ?></span></script></span></td>
		<td data-name="EM4"<?php echo $ivf_stimulation_chart->EM4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM4" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_EM4">
<span<?php echo $ivf_stimulation_chart->EM4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM4->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM5->Visible) { // EM5 ?>
	<tr id="r_EM5">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM5"><script id="tpc_ivf_stimulation_chart_EM5" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->EM5->caption() ?></span></script></span></td>
		<td data-name="EM5"<?php echo $ivf_stimulation_chart->EM5->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM5" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_EM5">
<span<?php echo $ivf_stimulation_chart->EM5->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM5->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM6->Visible) { // EM6 ?>
	<tr id="r_EM6">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM6"><script id="tpc_ivf_stimulation_chart_EM6" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->EM6->caption() ?></span></script></span></td>
		<td data-name="EM6"<?php echo $ivf_stimulation_chart->EM6->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM6" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_EM6">
<span<?php echo $ivf_stimulation_chart->EM6->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM6->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM7->Visible) { // EM7 ?>
	<tr id="r_EM7">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM7"><script id="tpc_ivf_stimulation_chart_EM7" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->EM7->caption() ?></span></script></span></td>
		<td data-name="EM7"<?php echo $ivf_stimulation_chart->EM7->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM7" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_EM7">
<span<?php echo $ivf_stimulation_chart->EM7->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM7->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM8->Visible) { // EM8 ?>
	<tr id="r_EM8">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM8"><script id="tpc_ivf_stimulation_chart_EM8" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->EM8->caption() ?></span></script></span></td>
		<td data-name="EM8"<?php echo $ivf_stimulation_chart->EM8->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM8" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_EM8">
<span<?php echo $ivf_stimulation_chart->EM8->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM8->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM9->Visible) { // EM9 ?>
	<tr id="r_EM9">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM9"><script id="tpc_ivf_stimulation_chart_EM9" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->EM9->caption() ?></span></script></span></td>
		<td data-name="EM9"<?php echo $ivf_stimulation_chart->EM9->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM9" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_EM9">
<span<?php echo $ivf_stimulation_chart->EM9->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM9->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM10->Visible) { // EM10 ?>
	<tr id="r_EM10">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM10"><script id="tpc_ivf_stimulation_chart_EM10" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->EM10->caption() ?></span></script></span></td>
		<td data-name="EM10"<?php echo $ivf_stimulation_chart->EM10->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM10" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_EM10">
<span<?php echo $ivf_stimulation_chart->EM10->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM10->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM11->Visible) { // EM11 ?>
	<tr id="r_EM11">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM11"><script id="tpc_ivf_stimulation_chart_EM11" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->EM11->caption() ?></span></script></span></td>
		<td data-name="EM11"<?php echo $ivf_stimulation_chart->EM11->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM11" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_EM11">
<span<?php echo $ivf_stimulation_chart->EM11->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM11->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM12->Visible) { // EM12 ?>
	<tr id="r_EM12">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM12"><script id="tpc_ivf_stimulation_chart_EM12" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->EM12->caption() ?></span></script></span></td>
		<td data-name="EM12"<?php echo $ivf_stimulation_chart->EM12->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM12" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_EM12">
<span<?php echo $ivf_stimulation_chart->EM12->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM12->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM13->Visible) { // EM13 ?>
	<tr id="r_EM13">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM13"><script id="tpc_ivf_stimulation_chart_EM13" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->EM13->caption() ?></span></script></span></td>
		<td data-name="EM13"<?php echo $ivf_stimulation_chart->EM13->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM13" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_EM13">
<span<?php echo $ivf_stimulation_chart->EM13->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM13->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others1->Visible) { // Others1 ?>
	<tr id="r_Others1">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others1"><script id="tpc_ivf_stimulation_chart_Others1" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Others1->caption() ?></span></script></span></td>
		<td data-name="Others1"<?php echo $ivf_stimulation_chart->Others1->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others1" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Others1">
<span<?php echo $ivf_stimulation_chart->Others1->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others2->Visible) { // Others2 ?>
	<tr id="r_Others2">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others2"><script id="tpc_ivf_stimulation_chart_Others2" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Others2->caption() ?></span></script></span></td>
		<td data-name="Others2"<?php echo $ivf_stimulation_chart->Others2->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others2" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Others2">
<span<?php echo $ivf_stimulation_chart->Others2->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others3->Visible) { // Others3 ?>
	<tr id="r_Others3">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others3"><script id="tpc_ivf_stimulation_chart_Others3" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Others3->caption() ?></span></script></span></td>
		<td data-name="Others3"<?php echo $ivf_stimulation_chart->Others3->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others3" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Others3">
<span<?php echo $ivf_stimulation_chart->Others3->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others3->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others4->Visible) { // Others4 ?>
	<tr id="r_Others4">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others4"><script id="tpc_ivf_stimulation_chart_Others4" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Others4->caption() ?></span></script></span></td>
		<td data-name="Others4"<?php echo $ivf_stimulation_chart->Others4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others4" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Others4">
<span<?php echo $ivf_stimulation_chart->Others4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others4->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others5->Visible) { // Others5 ?>
	<tr id="r_Others5">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others5"><script id="tpc_ivf_stimulation_chart_Others5" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Others5->caption() ?></span></script></span></td>
		<td data-name="Others5"<?php echo $ivf_stimulation_chart->Others5->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others5" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Others5">
<span<?php echo $ivf_stimulation_chart->Others5->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others5->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others6->Visible) { // Others6 ?>
	<tr id="r_Others6">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others6"><script id="tpc_ivf_stimulation_chart_Others6" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Others6->caption() ?></span></script></span></td>
		<td data-name="Others6"<?php echo $ivf_stimulation_chart->Others6->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others6" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Others6">
<span<?php echo $ivf_stimulation_chart->Others6->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others6->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others7->Visible) { // Others7 ?>
	<tr id="r_Others7">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others7"><script id="tpc_ivf_stimulation_chart_Others7" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Others7->caption() ?></span></script></span></td>
		<td data-name="Others7"<?php echo $ivf_stimulation_chart->Others7->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others7" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Others7">
<span<?php echo $ivf_stimulation_chart->Others7->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others7->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others8->Visible) { // Others8 ?>
	<tr id="r_Others8">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others8"><script id="tpc_ivf_stimulation_chart_Others8" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Others8->caption() ?></span></script></span></td>
		<td data-name="Others8"<?php echo $ivf_stimulation_chart->Others8->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others8" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Others8">
<span<?php echo $ivf_stimulation_chart->Others8->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others8->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others9->Visible) { // Others9 ?>
	<tr id="r_Others9">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others9"><script id="tpc_ivf_stimulation_chart_Others9" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Others9->caption() ?></span></script></span></td>
		<td data-name="Others9"<?php echo $ivf_stimulation_chart->Others9->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others9" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Others9">
<span<?php echo $ivf_stimulation_chart->Others9->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others9->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others10->Visible) { // Others10 ?>
	<tr id="r_Others10">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others10"><script id="tpc_ivf_stimulation_chart_Others10" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Others10->caption() ?></span></script></span></td>
		<td data-name="Others10"<?php echo $ivf_stimulation_chart->Others10->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others10" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Others10">
<span<?php echo $ivf_stimulation_chart->Others10->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others10->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others11->Visible) { // Others11 ?>
	<tr id="r_Others11">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others11"><script id="tpc_ivf_stimulation_chart_Others11" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Others11->caption() ?></span></script></span></td>
		<td data-name="Others11"<?php echo $ivf_stimulation_chart->Others11->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others11" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Others11">
<span<?php echo $ivf_stimulation_chart->Others11->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others11->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others12->Visible) { // Others12 ?>
	<tr id="r_Others12">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others12"><script id="tpc_ivf_stimulation_chart_Others12" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Others12->caption() ?></span></script></span></td>
		<td data-name="Others12"<?php echo $ivf_stimulation_chart->Others12->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others12" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Others12">
<span<?php echo $ivf_stimulation_chart->Others12->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others12->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others13->Visible) { // Others13 ?>
	<tr id="r_Others13">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others13"><script id="tpc_ivf_stimulation_chart_Others13" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Others13->caption() ?></span></script></span></td>
		<td data-name="Others13"<?php echo $ivf_stimulation_chart->Others13->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others13" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Others13">
<span<?php echo $ivf_stimulation_chart->Others13->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others13->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR1->Visible) { // DR1 ?>
	<tr id="r_DR1">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR1"><script id="tpc_ivf_stimulation_chart_DR1" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->DR1->caption() ?></span></script></span></td>
		<td data-name="DR1"<?php echo $ivf_stimulation_chart->DR1->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR1" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_DR1">
<span<?php echo $ivf_stimulation_chart->DR1->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR2->Visible) { // DR2 ?>
	<tr id="r_DR2">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR2"><script id="tpc_ivf_stimulation_chart_DR2" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->DR2->caption() ?></span></script></span></td>
		<td data-name="DR2"<?php echo $ivf_stimulation_chart->DR2->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR2" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_DR2">
<span<?php echo $ivf_stimulation_chart->DR2->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR3->Visible) { // DR3 ?>
	<tr id="r_DR3">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR3"><script id="tpc_ivf_stimulation_chart_DR3" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->DR3->caption() ?></span></script></span></td>
		<td data-name="DR3"<?php echo $ivf_stimulation_chart->DR3->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR3" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_DR3">
<span<?php echo $ivf_stimulation_chart->DR3->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR3->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR4->Visible) { // DR4 ?>
	<tr id="r_DR4">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR4"><script id="tpc_ivf_stimulation_chart_DR4" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->DR4->caption() ?></span></script></span></td>
		<td data-name="DR4"<?php echo $ivf_stimulation_chart->DR4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR4" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_DR4">
<span<?php echo $ivf_stimulation_chart->DR4->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR4->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR5->Visible) { // DR5 ?>
	<tr id="r_DR5">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR5"><script id="tpc_ivf_stimulation_chart_DR5" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->DR5->caption() ?></span></script></span></td>
		<td data-name="DR5"<?php echo $ivf_stimulation_chart->DR5->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR5" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_DR5">
<span<?php echo $ivf_stimulation_chart->DR5->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR5->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR6->Visible) { // DR6 ?>
	<tr id="r_DR6">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR6"><script id="tpc_ivf_stimulation_chart_DR6" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->DR6->caption() ?></span></script></span></td>
		<td data-name="DR6"<?php echo $ivf_stimulation_chart->DR6->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR6" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_DR6">
<span<?php echo $ivf_stimulation_chart->DR6->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR6->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR7->Visible) { // DR7 ?>
	<tr id="r_DR7">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR7"><script id="tpc_ivf_stimulation_chart_DR7" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->DR7->caption() ?></span></script></span></td>
		<td data-name="DR7"<?php echo $ivf_stimulation_chart->DR7->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR7" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_DR7">
<span<?php echo $ivf_stimulation_chart->DR7->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR7->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR8->Visible) { // DR8 ?>
	<tr id="r_DR8">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR8"><script id="tpc_ivf_stimulation_chart_DR8" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->DR8->caption() ?></span></script></span></td>
		<td data-name="DR8"<?php echo $ivf_stimulation_chart->DR8->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR8" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_DR8">
<span<?php echo $ivf_stimulation_chart->DR8->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR8->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR9->Visible) { // DR9 ?>
	<tr id="r_DR9">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR9"><script id="tpc_ivf_stimulation_chart_DR9" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->DR9->caption() ?></span></script></span></td>
		<td data-name="DR9"<?php echo $ivf_stimulation_chart->DR9->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR9" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_DR9">
<span<?php echo $ivf_stimulation_chart->DR9->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR9->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR10->Visible) { // DR10 ?>
	<tr id="r_DR10">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR10"><script id="tpc_ivf_stimulation_chart_DR10" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->DR10->caption() ?></span></script></span></td>
		<td data-name="DR10"<?php echo $ivf_stimulation_chart->DR10->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR10" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_DR10">
<span<?php echo $ivf_stimulation_chart->DR10->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR10->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR11->Visible) { // DR11 ?>
	<tr id="r_DR11">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR11"><script id="tpc_ivf_stimulation_chart_DR11" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->DR11->caption() ?></span></script></span></td>
		<td data-name="DR11"<?php echo $ivf_stimulation_chart->DR11->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR11" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_DR11">
<span<?php echo $ivf_stimulation_chart->DR11->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR11->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR12->Visible) { // DR12 ?>
	<tr id="r_DR12">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR12"><script id="tpc_ivf_stimulation_chart_DR12" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->DR12->caption() ?></span></script></span></td>
		<td data-name="DR12"<?php echo $ivf_stimulation_chart->DR12->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR12" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_DR12">
<span<?php echo $ivf_stimulation_chart->DR12->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR12->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR13->Visible) { // DR13 ?>
	<tr id="r_DR13">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR13"><script id="tpc_ivf_stimulation_chart_DR13" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->DR13->caption() ?></span></script></span></td>
		<td data-name="DR13"<?php echo $ivf_stimulation_chart->DR13->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR13" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_DR13">
<span<?php echo $ivf_stimulation_chart->DR13->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR13->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->DOCTORRESPONSIBLE->Visible) { // DOCTORRESPONSIBLE ?>
	<tr id="r_DOCTORRESPONSIBLE">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DOCTORRESPONSIBLE"><script id="tpc_ivf_stimulation_chart_DOCTORRESPONSIBLE" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->DOCTORRESPONSIBLE->caption() ?></span></script></span></td>
		<td data-name="DOCTORRESPONSIBLE"<?php echo $ivf_stimulation_chart->DOCTORRESPONSIBLE->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DOCTORRESPONSIBLE" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_DOCTORRESPONSIBLE">
<span<?php echo $ivf_stimulation_chart->DOCTORRESPONSIBLE->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DOCTORRESPONSIBLE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->TidNo->Visible) { // TidNo ?>
	<tr id="r_TidNo">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_TidNo"><script id="tpc_ivf_stimulation_chart_TidNo" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->TidNo->caption() ?></span></script></span></td>
		<td data-name="TidNo"<?php echo $ivf_stimulation_chart->TidNo->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_TidNo" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_TidNo">
<span<?php echo $ivf_stimulation_chart->TidNo->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->TidNo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Convert->Visible) { // Convert ?>
	<tr id="r_Convert">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Convert"><script id="tpc_ivf_stimulation_chart_Convert" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Convert->caption() ?></span></script></span></td>
		<td data-name="Convert"<?php echo $ivf_stimulation_chart->Convert->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Convert" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Convert">
<span<?php echo $ivf_stimulation_chart->Convert->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Convert->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Consultant->Visible) { // Consultant ?>
	<tr id="r_Consultant">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Consultant"><script id="tpc_ivf_stimulation_chart_Consultant" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Consultant->caption() ?></span></script></span></td>
		<td data-name="Consultant"<?php echo $ivf_stimulation_chart->Consultant->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Consultant" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Consultant">
<span<?php echo $ivf_stimulation_chart->Consultant->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Consultant->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
	<tr id="r_InseminatinTechnique">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_InseminatinTechnique"><script id="tpc_ivf_stimulation_chart_InseminatinTechnique" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->InseminatinTechnique->caption() ?></span></script></span></td>
		<td data-name="InseminatinTechnique"<?php echo $ivf_stimulation_chart->InseminatinTechnique->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_InseminatinTechnique" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_InseminatinTechnique">
<span<?php echo $ivf_stimulation_chart->InseminatinTechnique->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->InseminatinTechnique->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->IndicationForART->Visible) { // IndicationForART ?>
	<tr id="r_IndicationForART">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_IndicationForART"><script id="tpc_ivf_stimulation_chart_IndicationForART" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->IndicationForART->caption() ?></span></script></span></td>
		<td data-name="IndicationForART"<?php echo $ivf_stimulation_chart->IndicationForART->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_IndicationForART" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_IndicationForART">
<span<?php echo $ivf_stimulation_chart->IndicationForART->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->IndicationForART->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Hysteroscopy->Visible) { // Hysteroscopy ?>
	<tr id="r_Hysteroscopy">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Hysteroscopy"><script id="tpc_ivf_stimulation_chart_Hysteroscopy" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Hysteroscopy->caption() ?></span></script></span></td>
		<td data-name="Hysteroscopy"<?php echo $ivf_stimulation_chart->Hysteroscopy->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Hysteroscopy" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Hysteroscopy">
<span<?php echo $ivf_stimulation_chart->Hysteroscopy->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Hysteroscopy->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->EndometrialScratching->Visible) { // EndometrialScratching ?>
	<tr id="r_EndometrialScratching">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EndometrialScratching"><script id="tpc_ivf_stimulation_chart_EndometrialScratching" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->EndometrialScratching->caption() ?></span></script></span></td>
		<td data-name="EndometrialScratching"<?php echo $ivf_stimulation_chart->EndometrialScratching->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EndometrialScratching" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_EndometrialScratching">
<span<?php echo $ivf_stimulation_chart->EndometrialScratching->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EndometrialScratching->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->TrialCannulation->Visible) { // TrialCannulation ?>
	<tr id="r_TrialCannulation">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_TrialCannulation"><script id="tpc_ivf_stimulation_chart_TrialCannulation" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->TrialCannulation->caption() ?></span></script></span></td>
		<td data-name="TrialCannulation"<?php echo $ivf_stimulation_chart->TrialCannulation->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_TrialCannulation" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_TrialCannulation">
<span<?php echo $ivf_stimulation_chart->TrialCannulation->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->TrialCannulation->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->CYCLETYPE->Visible) { // CYCLETYPE ?>
	<tr id="r_CYCLETYPE">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CYCLETYPE"><script id="tpc_ivf_stimulation_chart_CYCLETYPE" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->CYCLETYPE->caption() ?></span></script></span></td>
		<td data-name="CYCLETYPE"<?php echo $ivf_stimulation_chart->CYCLETYPE->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CYCLETYPE" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_CYCLETYPE">
<span<?php echo $ivf_stimulation_chart->CYCLETYPE->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CYCLETYPE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->HRTCYCLE->Visible) { // HRTCYCLE ?>
	<tr id="r_HRTCYCLE">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HRTCYCLE"><script id="tpc_ivf_stimulation_chart_HRTCYCLE" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->HRTCYCLE->caption() ?></span></script></span></td>
		<td data-name="HRTCYCLE"<?php echo $ivf_stimulation_chart->HRTCYCLE->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HRTCYCLE" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_HRTCYCLE">
<span<?php echo $ivf_stimulation_chart->HRTCYCLE->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HRTCYCLE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
	<tr id="r_OralEstrogenDosage">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_OralEstrogenDosage"><script id="tpc_ivf_stimulation_chart_OralEstrogenDosage" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->OralEstrogenDosage->caption() ?></span></script></span></td>
		<td data-name="OralEstrogenDosage"<?php echo $ivf_stimulation_chart->OralEstrogenDosage->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_OralEstrogenDosage" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_OralEstrogenDosage">
<span<?php echo $ivf_stimulation_chart->OralEstrogenDosage->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->OralEstrogenDosage->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
	<tr id="r_VaginalEstrogen">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_VaginalEstrogen"><script id="tpc_ivf_stimulation_chart_VaginalEstrogen" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->VaginalEstrogen->caption() ?></span></script></span></td>
		<td data-name="VaginalEstrogen"<?php echo $ivf_stimulation_chart->VaginalEstrogen->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_VaginalEstrogen" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_VaginalEstrogen">
<span<?php echo $ivf_stimulation_chart->VaginalEstrogen->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->VaginalEstrogen->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->GCSF->Visible) { // GCSF ?>
	<tr id="r_GCSF">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GCSF"><script id="tpc_ivf_stimulation_chart_GCSF" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->GCSF->caption() ?></span></script></span></td>
		<td data-name="GCSF"<?php echo $ivf_stimulation_chart->GCSF->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GCSF" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_GCSF">
<span<?php echo $ivf_stimulation_chart->GCSF->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GCSF->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->ActivatedPRP->Visible) { // ActivatedPRP ?>
	<tr id="r_ActivatedPRP">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ActivatedPRP"><script id="tpc_ivf_stimulation_chart_ActivatedPRP" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->ActivatedPRP->caption() ?></span></script></span></td>
		<td data-name="ActivatedPRP"<?php echo $ivf_stimulation_chart->ActivatedPRP->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ActivatedPRP" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_ActivatedPRP">
<span<?php echo $ivf_stimulation_chart->ActivatedPRP->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ActivatedPRP->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->UCLcm->Visible) { // UCLcm ?>
	<tr id="r_UCLcm">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_UCLcm"><script id="tpc_ivf_stimulation_chart_UCLcm" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->UCLcm->caption() ?></span></script></span></td>
		<td data-name="UCLcm"<?php echo $ivf_stimulation_chart->UCLcm->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_UCLcm" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_UCLcm">
<span<?php echo $ivf_stimulation_chart->UCLcm->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->UCLcm->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->DATOFEMBRYOTRANSFER->Visible) { // DATOFEMBRYOTRANSFER ?>
	<tr id="r_DATOFEMBRYOTRANSFER">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DATOFEMBRYOTRANSFER"><script id="tpc_ivf_stimulation_chart_DATOFEMBRYOTRANSFER" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->DATOFEMBRYOTRANSFER->caption() ?></span></script></span></td>
		<td data-name="DATOFEMBRYOTRANSFER"<?php echo $ivf_stimulation_chart->DATOFEMBRYOTRANSFER->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DATOFEMBRYOTRANSFER" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_DATOFEMBRYOTRANSFER">
<span<?php echo $ivf_stimulation_chart->DATOFEMBRYOTRANSFER->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DATOFEMBRYOTRANSFER->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
	<tr id="r_DAYOFEMBRYOTRANSFER">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DAYOFEMBRYOTRANSFER"><script id="tpc_ivf_stimulation_chart_DAYOFEMBRYOTRANSFER" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->DAYOFEMBRYOTRANSFER->caption() ?></span></script></span></td>
		<td data-name="DAYOFEMBRYOTRANSFER"<?php echo $ivf_stimulation_chart->DAYOFEMBRYOTRANSFER->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DAYOFEMBRYOTRANSFER" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_DAYOFEMBRYOTRANSFER">
<span<?php echo $ivf_stimulation_chart->DAYOFEMBRYOTRANSFER->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DAYOFEMBRYOTRANSFER->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
	<tr id="r_NOOFEMBRYOSTHAWED">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_NOOFEMBRYOSTHAWED"><script id="tpc_ivf_stimulation_chart_NOOFEMBRYOSTHAWED" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->NOOFEMBRYOSTHAWED->caption() ?></span></script></span></td>
		<td data-name="NOOFEMBRYOSTHAWED"<?php echo $ivf_stimulation_chart->NOOFEMBRYOSTHAWED->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_NOOFEMBRYOSTHAWED" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_NOOFEMBRYOSTHAWED">
<span<?php echo $ivf_stimulation_chart->NOOFEMBRYOSTHAWED->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->NOOFEMBRYOSTHAWED->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
	<tr id="r_NOOFEMBRYOSTRANSFERRED">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED"><script id="tpc_ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->NOOFEMBRYOSTRANSFERRED->caption() ?></span></script></span></td>
		<td data-name="NOOFEMBRYOSTRANSFERRED"<?php echo $ivf_stimulation_chart->NOOFEMBRYOSTRANSFERRED->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED">
<span<?php echo $ivf_stimulation_chart->NOOFEMBRYOSTRANSFERRED->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->NOOFEMBRYOSTRANSFERRED->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
	<tr id="r_DAYOFEMBRYOS">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DAYOFEMBRYOS"><script id="tpc_ivf_stimulation_chart_DAYOFEMBRYOS" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->DAYOFEMBRYOS->caption() ?></span></script></span></td>
		<td data-name="DAYOFEMBRYOS"<?php echo $ivf_stimulation_chart->DAYOFEMBRYOS->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DAYOFEMBRYOS" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_DAYOFEMBRYOS">
<span<?php echo $ivf_stimulation_chart->DAYOFEMBRYOS->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DAYOFEMBRYOS->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
	<tr id="r_CRYOPRESERVEDEMBRYOS">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS"><script id="tpc_ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->CRYOPRESERVEDEMBRYOS->caption() ?></span></script></span></td>
		<td data-name="CRYOPRESERVEDEMBRYOS"<?php echo $ivf_stimulation_chart->CRYOPRESERVEDEMBRYOS->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS">
<span<?php echo $ivf_stimulation_chart->CRYOPRESERVEDEMBRYOS->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CRYOPRESERVEDEMBRYOS->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->ViaAdmin->Visible) { // ViaAdmin ?>
	<tr id="r_ViaAdmin">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ViaAdmin"><script id="tpc_ivf_stimulation_chart_ViaAdmin" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->ViaAdmin->caption() ?></span></script></span></td>
		<td data-name="ViaAdmin"<?php echo $ivf_stimulation_chart->ViaAdmin->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ViaAdmin" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_ViaAdmin">
<span<?php echo $ivf_stimulation_chart->ViaAdmin->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ViaAdmin->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->ViaStartDateTime->Visible) { // ViaStartDateTime ?>
	<tr id="r_ViaStartDateTime">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ViaStartDateTime"><script id="tpc_ivf_stimulation_chart_ViaStartDateTime" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->ViaStartDateTime->caption() ?></span></script></span></td>
		<td data-name="ViaStartDateTime"<?php echo $ivf_stimulation_chart->ViaStartDateTime->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ViaStartDateTime" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_ViaStartDateTime">
<span<?php echo $ivf_stimulation_chart->ViaStartDateTime->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ViaStartDateTime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->ViaDose->Visible) { // ViaDose ?>
	<tr id="r_ViaDose">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ViaDose"><script id="tpc_ivf_stimulation_chart_ViaDose" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->ViaDose->caption() ?></span></script></span></td>
		<td data-name="ViaDose"<?php echo $ivf_stimulation_chart->ViaDose->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ViaDose" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_ViaDose">
<span<?php echo $ivf_stimulation_chart->ViaDose->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ViaDose->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->AllFreeze->Visible) { // AllFreeze ?>
	<tr id="r_AllFreeze">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_AllFreeze"><script id="tpc_ivf_stimulation_chart_AllFreeze" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->AllFreeze->caption() ?></span></script></span></td>
		<td data-name="AllFreeze"<?php echo $ivf_stimulation_chart->AllFreeze->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_AllFreeze" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_AllFreeze">
<span<?php echo $ivf_stimulation_chart->AllFreeze->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->AllFreeze->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->TreatmentCancel->Visible) { // TreatmentCancel ?>
	<tr id="r_TreatmentCancel">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_TreatmentCancel"><script id="tpc_ivf_stimulation_chart_TreatmentCancel" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->TreatmentCancel->caption() ?></span></script></span></td>
		<td data-name="TreatmentCancel"<?php echo $ivf_stimulation_chart->TreatmentCancel->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_TreatmentCancel" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_TreatmentCancel">
<span<?php echo $ivf_stimulation_chart->TreatmentCancel->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->TreatmentCancel->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Reason->Visible) { // Reason ?>
	<tr id="r_Reason">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Reason"><script id="tpc_ivf_stimulation_chart_Reason" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Reason->caption() ?></span></script></span></td>
		<td data-name="Reason"<?php echo $ivf_stimulation_chart->Reason->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Reason" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Reason">
<span<?php echo $ivf_stimulation_chart->Reason->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Reason->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->ProgesteroneAdmin->Visible) { // ProgesteroneAdmin ?>
	<tr id="r_ProgesteroneAdmin">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ProgesteroneAdmin"><script id="tpc_ivf_stimulation_chart_ProgesteroneAdmin" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->ProgesteroneAdmin->caption() ?></span></script></span></td>
		<td data-name="ProgesteroneAdmin"<?php echo $ivf_stimulation_chart->ProgesteroneAdmin->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ProgesteroneAdmin" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_ProgesteroneAdmin">
<span<?php echo $ivf_stimulation_chart->ProgesteroneAdmin->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ProgesteroneAdmin->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->ProgesteroneStart->Visible) { // ProgesteroneStart ?>
	<tr id="r_ProgesteroneStart">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ProgesteroneStart"><script id="tpc_ivf_stimulation_chart_ProgesteroneStart" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->ProgesteroneStart->caption() ?></span></script></span></td>
		<td data-name="ProgesteroneStart"<?php echo $ivf_stimulation_chart->ProgesteroneStart->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ProgesteroneStart" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_ProgesteroneStart">
<span<?php echo $ivf_stimulation_chart->ProgesteroneStart->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ProgesteroneStart->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->ProgesteroneDose->Visible) { // ProgesteroneDose ?>
	<tr id="r_ProgesteroneDose">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ProgesteroneDose"><script id="tpc_ivf_stimulation_chart_ProgesteroneDose" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->ProgesteroneDose->caption() ?></span></script></span></td>
		<td data-name="ProgesteroneDose"<?php echo $ivf_stimulation_chart->ProgesteroneDose->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ProgesteroneDose" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_ProgesteroneDose">
<span<?php echo $ivf_stimulation_chart->ProgesteroneDose->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ProgesteroneDose->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Projectron->Visible) { // Projectron ?>
	<tr id="r_Projectron">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Projectron"><script id="tpc_ivf_stimulation_chart_Projectron" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Projectron->caption() ?></span></script></span></td>
		<td data-name="Projectron"<?php echo $ivf_stimulation_chart->Projectron->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Projectron" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Projectron">
<span<?php echo $ivf_stimulation_chart->Projectron->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Projectron->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate14->Visible) { // StChDate14 ?>
	<tr id="r_StChDate14">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate14"><script id="tpc_ivf_stimulation_chart_StChDate14" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StChDate14->caption() ?></span></script></span></td>
		<td data-name="StChDate14"<?php echo $ivf_stimulation_chart->StChDate14->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate14" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StChDate14">
<span<?php echo $ivf_stimulation_chart->StChDate14->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate14->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate15->Visible) { // StChDate15 ?>
	<tr id="r_StChDate15">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate15"><script id="tpc_ivf_stimulation_chart_StChDate15" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StChDate15->caption() ?></span></script></span></td>
		<td data-name="StChDate15"<?php echo $ivf_stimulation_chart->StChDate15->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate15" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StChDate15">
<span<?php echo $ivf_stimulation_chart->StChDate15->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate15->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate16->Visible) { // StChDate16 ?>
	<tr id="r_StChDate16">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate16"><script id="tpc_ivf_stimulation_chart_StChDate16" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StChDate16->caption() ?></span></script></span></td>
		<td data-name="StChDate16"<?php echo $ivf_stimulation_chart->StChDate16->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate16" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StChDate16">
<span<?php echo $ivf_stimulation_chart->StChDate16->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate16->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate17->Visible) { // StChDate17 ?>
	<tr id="r_StChDate17">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate17"><script id="tpc_ivf_stimulation_chart_StChDate17" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StChDate17->caption() ?></span></script></span></td>
		<td data-name="StChDate17"<?php echo $ivf_stimulation_chart->StChDate17->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate17" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StChDate17">
<span<?php echo $ivf_stimulation_chart->StChDate17->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate17->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate18->Visible) { // StChDate18 ?>
	<tr id="r_StChDate18">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate18"><script id="tpc_ivf_stimulation_chart_StChDate18" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StChDate18->caption() ?></span></script></span></td>
		<td data-name="StChDate18"<?php echo $ivf_stimulation_chart->StChDate18->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate18" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StChDate18">
<span<?php echo $ivf_stimulation_chart->StChDate18->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate18->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate19->Visible) { // StChDate19 ?>
	<tr id="r_StChDate19">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate19"><script id="tpc_ivf_stimulation_chart_StChDate19" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StChDate19->caption() ?></span></script></span></td>
		<td data-name="StChDate19"<?php echo $ivf_stimulation_chart->StChDate19->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate19" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StChDate19">
<span<?php echo $ivf_stimulation_chart->StChDate19->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate19->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate20->Visible) { // StChDate20 ?>
	<tr id="r_StChDate20">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate20"><script id="tpc_ivf_stimulation_chart_StChDate20" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StChDate20->caption() ?></span></script></span></td>
		<td data-name="StChDate20"<?php echo $ivf_stimulation_chart->StChDate20->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate20" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StChDate20">
<span<?php echo $ivf_stimulation_chart->StChDate20->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate20->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate21->Visible) { // StChDate21 ?>
	<tr id="r_StChDate21">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate21"><script id="tpc_ivf_stimulation_chart_StChDate21" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StChDate21->caption() ?></span></script></span></td>
		<td data-name="StChDate21"<?php echo $ivf_stimulation_chart->StChDate21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate21" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StChDate21">
<span<?php echo $ivf_stimulation_chart->StChDate21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate21->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate22->Visible) { // StChDate22 ?>
	<tr id="r_StChDate22">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate22"><script id="tpc_ivf_stimulation_chart_StChDate22" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StChDate22->caption() ?></span></script></span></td>
		<td data-name="StChDate22"<?php echo $ivf_stimulation_chart->StChDate22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate22" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StChDate22">
<span<?php echo $ivf_stimulation_chart->StChDate22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate22->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate23->Visible) { // StChDate23 ?>
	<tr id="r_StChDate23">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate23"><script id="tpc_ivf_stimulation_chart_StChDate23" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StChDate23->caption() ?></span></script></span></td>
		<td data-name="StChDate23"<?php echo $ivf_stimulation_chart->StChDate23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate23" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StChDate23">
<span<?php echo $ivf_stimulation_chart->StChDate23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate23->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate24->Visible) { // StChDate24 ?>
	<tr id="r_StChDate24">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate24"><script id="tpc_ivf_stimulation_chart_StChDate24" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StChDate24->caption() ?></span></script></span></td>
		<td data-name="StChDate24"<?php echo $ivf_stimulation_chart->StChDate24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate24" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StChDate24">
<span<?php echo $ivf_stimulation_chart->StChDate24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate24->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StChDate25->Visible) { // StChDate25 ?>
	<tr id="r_StChDate25">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate25"><script id="tpc_ivf_stimulation_chart_StChDate25" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StChDate25->caption() ?></span></script></span></td>
		<td data-name="StChDate25"<?php echo $ivf_stimulation_chart->StChDate25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate25" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StChDate25">
<span<?php echo $ivf_stimulation_chart->StChDate25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StChDate25->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay14->Visible) { // CycleDay14 ?>
	<tr id="r_CycleDay14">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay14"><script id="tpc_ivf_stimulation_chart_CycleDay14" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->CycleDay14->caption() ?></span></script></span></td>
		<td data-name="CycleDay14"<?php echo $ivf_stimulation_chart->CycleDay14->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay14" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_CycleDay14">
<span<?php echo $ivf_stimulation_chart->CycleDay14->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay14->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay15->Visible) { // CycleDay15 ?>
	<tr id="r_CycleDay15">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay15"><script id="tpc_ivf_stimulation_chart_CycleDay15" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->CycleDay15->caption() ?></span></script></span></td>
		<td data-name="CycleDay15"<?php echo $ivf_stimulation_chart->CycleDay15->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay15" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_CycleDay15">
<span<?php echo $ivf_stimulation_chart->CycleDay15->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay15->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay16->Visible) { // CycleDay16 ?>
	<tr id="r_CycleDay16">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay16"><script id="tpc_ivf_stimulation_chart_CycleDay16" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->CycleDay16->caption() ?></span></script></span></td>
		<td data-name="CycleDay16"<?php echo $ivf_stimulation_chart->CycleDay16->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay16" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_CycleDay16">
<span<?php echo $ivf_stimulation_chart->CycleDay16->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay16->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay17->Visible) { // CycleDay17 ?>
	<tr id="r_CycleDay17">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay17"><script id="tpc_ivf_stimulation_chart_CycleDay17" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->CycleDay17->caption() ?></span></script></span></td>
		<td data-name="CycleDay17"<?php echo $ivf_stimulation_chart->CycleDay17->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay17" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_CycleDay17">
<span<?php echo $ivf_stimulation_chart->CycleDay17->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay17->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay18->Visible) { // CycleDay18 ?>
	<tr id="r_CycleDay18">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay18"><script id="tpc_ivf_stimulation_chart_CycleDay18" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->CycleDay18->caption() ?></span></script></span></td>
		<td data-name="CycleDay18"<?php echo $ivf_stimulation_chart->CycleDay18->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay18" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_CycleDay18">
<span<?php echo $ivf_stimulation_chart->CycleDay18->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay18->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay19->Visible) { // CycleDay19 ?>
	<tr id="r_CycleDay19">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay19"><script id="tpc_ivf_stimulation_chart_CycleDay19" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->CycleDay19->caption() ?></span></script></span></td>
		<td data-name="CycleDay19"<?php echo $ivf_stimulation_chart->CycleDay19->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay19" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_CycleDay19">
<span<?php echo $ivf_stimulation_chart->CycleDay19->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay19->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay20->Visible) { // CycleDay20 ?>
	<tr id="r_CycleDay20">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay20"><script id="tpc_ivf_stimulation_chart_CycleDay20" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->CycleDay20->caption() ?></span></script></span></td>
		<td data-name="CycleDay20"<?php echo $ivf_stimulation_chart->CycleDay20->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay20" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_CycleDay20">
<span<?php echo $ivf_stimulation_chart->CycleDay20->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay20->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay21->Visible) { // CycleDay21 ?>
	<tr id="r_CycleDay21">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay21"><script id="tpc_ivf_stimulation_chart_CycleDay21" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->CycleDay21->caption() ?></span></script></span></td>
		<td data-name="CycleDay21"<?php echo $ivf_stimulation_chart->CycleDay21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay21" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_CycleDay21">
<span<?php echo $ivf_stimulation_chart->CycleDay21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay21->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay22->Visible) { // CycleDay22 ?>
	<tr id="r_CycleDay22">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay22"><script id="tpc_ivf_stimulation_chart_CycleDay22" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->CycleDay22->caption() ?></span></script></span></td>
		<td data-name="CycleDay22"<?php echo $ivf_stimulation_chart->CycleDay22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay22" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_CycleDay22">
<span<?php echo $ivf_stimulation_chart->CycleDay22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay22->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay23->Visible) { // CycleDay23 ?>
	<tr id="r_CycleDay23">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay23"><script id="tpc_ivf_stimulation_chart_CycleDay23" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->CycleDay23->caption() ?></span></script></span></td>
		<td data-name="CycleDay23"<?php echo $ivf_stimulation_chart->CycleDay23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay23" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_CycleDay23">
<span<?php echo $ivf_stimulation_chart->CycleDay23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay23->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay24->Visible) { // CycleDay24 ?>
	<tr id="r_CycleDay24">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay24"><script id="tpc_ivf_stimulation_chart_CycleDay24" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->CycleDay24->caption() ?></span></script></span></td>
		<td data-name="CycleDay24"<?php echo $ivf_stimulation_chart->CycleDay24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay24" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_CycleDay24">
<span<?php echo $ivf_stimulation_chart->CycleDay24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay24->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->CycleDay25->Visible) { // CycleDay25 ?>
	<tr id="r_CycleDay25">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay25"><script id="tpc_ivf_stimulation_chart_CycleDay25" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->CycleDay25->caption() ?></span></script></span></td>
		<td data-name="CycleDay25"<?php echo $ivf_stimulation_chart->CycleDay25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay25" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_CycleDay25">
<span<?php echo $ivf_stimulation_chart->CycleDay25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->CycleDay25->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay14->Visible) { // StimulationDay14 ?>
	<tr id="r_StimulationDay14">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay14"><script id="tpc_ivf_stimulation_chart_StimulationDay14" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StimulationDay14->caption() ?></span></script></span></td>
		<td data-name="StimulationDay14"<?php echo $ivf_stimulation_chart->StimulationDay14->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay14" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StimulationDay14">
<span<?php echo $ivf_stimulation_chart->StimulationDay14->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay14->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay15->Visible) { // StimulationDay15 ?>
	<tr id="r_StimulationDay15">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay15"><script id="tpc_ivf_stimulation_chart_StimulationDay15" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StimulationDay15->caption() ?></span></script></span></td>
		<td data-name="StimulationDay15"<?php echo $ivf_stimulation_chart->StimulationDay15->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay15" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StimulationDay15">
<span<?php echo $ivf_stimulation_chart->StimulationDay15->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay15->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay16->Visible) { // StimulationDay16 ?>
	<tr id="r_StimulationDay16">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay16"><script id="tpc_ivf_stimulation_chart_StimulationDay16" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StimulationDay16->caption() ?></span></script></span></td>
		<td data-name="StimulationDay16"<?php echo $ivf_stimulation_chart->StimulationDay16->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay16" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StimulationDay16">
<span<?php echo $ivf_stimulation_chart->StimulationDay16->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay16->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay17->Visible) { // StimulationDay17 ?>
	<tr id="r_StimulationDay17">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay17"><script id="tpc_ivf_stimulation_chart_StimulationDay17" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StimulationDay17->caption() ?></span></script></span></td>
		<td data-name="StimulationDay17"<?php echo $ivf_stimulation_chart->StimulationDay17->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay17" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StimulationDay17">
<span<?php echo $ivf_stimulation_chart->StimulationDay17->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay17->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay18->Visible) { // StimulationDay18 ?>
	<tr id="r_StimulationDay18">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay18"><script id="tpc_ivf_stimulation_chart_StimulationDay18" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StimulationDay18->caption() ?></span></script></span></td>
		<td data-name="StimulationDay18"<?php echo $ivf_stimulation_chart->StimulationDay18->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay18" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StimulationDay18">
<span<?php echo $ivf_stimulation_chart->StimulationDay18->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay18->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay19->Visible) { // StimulationDay19 ?>
	<tr id="r_StimulationDay19">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay19"><script id="tpc_ivf_stimulation_chart_StimulationDay19" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StimulationDay19->caption() ?></span></script></span></td>
		<td data-name="StimulationDay19"<?php echo $ivf_stimulation_chart->StimulationDay19->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay19" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StimulationDay19">
<span<?php echo $ivf_stimulation_chart->StimulationDay19->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay19->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay20->Visible) { // StimulationDay20 ?>
	<tr id="r_StimulationDay20">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay20"><script id="tpc_ivf_stimulation_chart_StimulationDay20" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StimulationDay20->caption() ?></span></script></span></td>
		<td data-name="StimulationDay20"<?php echo $ivf_stimulation_chart->StimulationDay20->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay20" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StimulationDay20">
<span<?php echo $ivf_stimulation_chart->StimulationDay20->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay20->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay21->Visible) { // StimulationDay21 ?>
	<tr id="r_StimulationDay21">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay21"><script id="tpc_ivf_stimulation_chart_StimulationDay21" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StimulationDay21->caption() ?></span></script></span></td>
		<td data-name="StimulationDay21"<?php echo $ivf_stimulation_chart->StimulationDay21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay21" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StimulationDay21">
<span<?php echo $ivf_stimulation_chart->StimulationDay21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay21->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay22->Visible) { // StimulationDay22 ?>
	<tr id="r_StimulationDay22">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay22"><script id="tpc_ivf_stimulation_chart_StimulationDay22" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StimulationDay22->caption() ?></span></script></span></td>
		<td data-name="StimulationDay22"<?php echo $ivf_stimulation_chart->StimulationDay22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay22" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StimulationDay22">
<span<?php echo $ivf_stimulation_chart->StimulationDay22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay22->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay23->Visible) { // StimulationDay23 ?>
	<tr id="r_StimulationDay23">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay23"><script id="tpc_ivf_stimulation_chart_StimulationDay23" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StimulationDay23->caption() ?></span></script></span></td>
		<td data-name="StimulationDay23"<?php echo $ivf_stimulation_chart->StimulationDay23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay23" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StimulationDay23">
<span<?php echo $ivf_stimulation_chart->StimulationDay23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay23->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay24->Visible) { // StimulationDay24 ?>
	<tr id="r_StimulationDay24">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay24"><script id="tpc_ivf_stimulation_chart_StimulationDay24" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StimulationDay24->caption() ?></span></script></span></td>
		<td data-name="StimulationDay24"<?php echo $ivf_stimulation_chart->StimulationDay24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay24" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StimulationDay24">
<span<?php echo $ivf_stimulation_chart->StimulationDay24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay24->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->StimulationDay25->Visible) { // StimulationDay25 ?>
	<tr id="r_StimulationDay25">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay25"><script id="tpc_ivf_stimulation_chart_StimulationDay25" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->StimulationDay25->caption() ?></span></script></span></td>
		<td data-name="StimulationDay25"<?php echo $ivf_stimulation_chart->StimulationDay25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay25" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_StimulationDay25">
<span<?php echo $ivf_stimulation_chart->StimulationDay25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->StimulationDay25->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet14->Visible) { // Tablet14 ?>
	<tr id="r_Tablet14">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet14"><script id="tpc_ivf_stimulation_chart_Tablet14" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Tablet14->caption() ?></span></script></span></td>
		<td data-name="Tablet14"<?php echo $ivf_stimulation_chart->Tablet14->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet14" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Tablet14">
<span<?php echo $ivf_stimulation_chart->Tablet14->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet14->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet15->Visible) { // Tablet15 ?>
	<tr id="r_Tablet15">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet15"><script id="tpc_ivf_stimulation_chart_Tablet15" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Tablet15->caption() ?></span></script></span></td>
		<td data-name="Tablet15"<?php echo $ivf_stimulation_chart->Tablet15->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet15" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Tablet15">
<span<?php echo $ivf_stimulation_chart->Tablet15->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet15->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet16->Visible) { // Tablet16 ?>
	<tr id="r_Tablet16">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet16"><script id="tpc_ivf_stimulation_chart_Tablet16" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Tablet16->caption() ?></span></script></span></td>
		<td data-name="Tablet16"<?php echo $ivf_stimulation_chart->Tablet16->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet16" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Tablet16">
<span<?php echo $ivf_stimulation_chart->Tablet16->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet16->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet17->Visible) { // Tablet17 ?>
	<tr id="r_Tablet17">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet17"><script id="tpc_ivf_stimulation_chart_Tablet17" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Tablet17->caption() ?></span></script></span></td>
		<td data-name="Tablet17"<?php echo $ivf_stimulation_chart->Tablet17->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet17" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Tablet17">
<span<?php echo $ivf_stimulation_chart->Tablet17->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet17->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet18->Visible) { // Tablet18 ?>
	<tr id="r_Tablet18">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet18"><script id="tpc_ivf_stimulation_chart_Tablet18" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Tablet18->caption() ?></span></script></span></td>
		<td data-name="Tablet18"<?php echo $ivf_stimulation_chart->Tablet18->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet18" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Tablet18">
<span<?php echo $ivf_stimulation_chart->Tablet18->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet18->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet19->Visible) { // Tablet19 ?>
	<tr id="r_Tablet19">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet19"><script id="tpc_ivf_stimulation_chart_Tablet19" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Tablet19->caption() ?></span></script></span></td>
		<td data-name="Tablet19"<?php echo $ivf_stimulation_chart->Tablet19->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet19" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Tablet19">
<span<?php echo $ivf_stimulation_chart->Tablet19->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet19->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet20->Visible) { // Tablet20 ?>
	<tr id="r_Tablet20">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet20"><script id="tpc_ivf_stimulation_chart_Tablet20" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Tablet20->caption() ?></span></script></span></td>
		<td data-name="Tablet20"<?php echo $ivf_stimulation_chart->Tablet20->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet20" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Tablet20">
<span<?php echo $ivf_stimulation_chart->Tablet20->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet20->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet21->Visible) { // Tablet21 ?>
	<tr id="r_Tablet21">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet21"><script id="tpc_ivf_stimulation_chart_Tablet21" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Tablet21->caption() ?></span></script></span></td>
		<td data-name="Tablet21"<?php echo $ivf_stimulation_chart->Tablet21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet21" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Tablet21">
<span<?php echo $ivf_stimulation_chart->Tablet21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet21->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet22->Visible) { // Tablet22 ?>
	<tr id="r_Tablet22">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet22"><script id="tpc_ivf_stimulation_chart_Tablet22" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Tablet22->caption() ?></span></script></span></td>
		<td data-name="Tablet22"<?php echo $ivf_stimulation_chart->Tablet22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet22" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Tablet22">
<span<?php echo $ivf_stimulation_chart->Tablet22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet22->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet23->Visible) { // Tablet23 ?>
	<tr id="r_Tablet23">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet23"><script id="tpc_ivf_stimulation_chart_Tablet23" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Tablet23->caption() ?></span></script></span></td>
		<td data-name="Tablet23"<?php echo $ivf_stimulation_chart->Tablet23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet23" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Tablet23">
<span<?php echo $ivf_stimulation_chart->Tablet23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet23->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet24->Visible) { // Tablet24 ?>
	<tr id="r_Tablet24">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet24"><script id="tpc_ivf_stimulation_chart_Tablet24" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Tablet24->caption() ?></span></script></span></td>
		<td data-name="Tablet24"<?php echo $ivf_stimulation_chart->Tablet24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet24" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Tablet24">
<span<?php echo $ivf_stimulation_chart->Tablet24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet24->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Tablet25->Visible) { // Tablet25 ?>
	<tr id="r_Tablet25">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet25"><script id="tpc_ivf_stimulation_chart_Tablet25" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Tablet25->caption() ?></span></script></span></td>
		<td data-name="Tablet25"<?php echo $ivf_stimulation_chart->Tablet25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet25" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Tablet25">
<span<?php echo $ivf_stimulation_chart->Tablet25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Tablet25->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH14->Visible) { // RFSH14 ?>
	<tr id="r_RFSH14">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH14"><script id="tpc_ivf_stimulation_chart_RFSH14" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->RFSH14->caption() ?></span></script></span></td>
		<td data-name="RFSH14"<?php echo $ivf_stimulation_chart->RFSH14->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH14" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_RFSH14">
<span<?php echo $ivf_stimulation_chart->RFSH14->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH14->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH15->Visible) { // RFSH15 ?>
	<tr id="r_RFSH15">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH15"><script id="tpc_ivf_stimulation_chart_RFSH15" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->RFSH15->caption() ?></span></script></span></td>
		<td data-name="RFSH15"<?php echo $ivf_stimulation_chart->RFSH15->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH15" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_RFSH15">
<span<?php echo $ivf_stimulation_chart->RFSH15->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH15->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH16->Visible) { // RFSH16 ?>
	<tr id="r_RFSH16">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH16"><script id="tpc_ivf_stimulation_chart_RFSH16" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->RFSH16->caption() ?></span></script></span></td>
		<td data-name="RFSH16"<?php echo $ivf_stimulation_chart->RFSH16->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH16" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_RFSH16">
<span<?php echo $ivf_stimulation_chart->RFSH16->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH16->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH17->Visible) { // RFSH17 ?>
	<tr id="r_RFSH17">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH17"><script id="tpc_ivf_stimulation_chart_RFSH17" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->RFSH17->caption() ?></span></script></span></td>
		<td data-name="RFSH17"<?php echo $ivf_stimulation_chart->RFSH17->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH17" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_RFSH17">
<span<?php echo $ivf_stimulation_chart->RFSH17->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH17->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH18->Visible) { // RFSH18 ?>
	<tr id="r_RFSH18">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH18"><script id="tpc_ivf_stimulation_chart_RFSH18" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->RFSH18->caption() ?></span></script></span></td>
		<td data-name="RFSH18"<?php echo $ivf_stimulation_chart->RFSH18->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH18" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_RFSH18">
<span<?php echo $ivf_stimulation_chart->RFSH18->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH18->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH19->Visible) { // RFSH19 ?>
	<tr id="r_RFSH19">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH19"><script id="tpc_ivf_stimulation_chart_RFSH19" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->RFSH19->caption() ?></span></script></span></td>
		<td data-name="RFSH19"<?php echo $ivf_stimulation_chart->RFSH19->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH19" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_RFSH19">
<span<?php echo $ivf_stimulation_chart->RFSH19->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH19->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH20->Visible) { // RFSH20 ?>
	<tr id="r_RFSH20">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH20"><script id="tpc_ivf_stimulation_chart_RFSH20" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->RFSH20->caption() ?></span></script></span></td>
		<td data-name="RFSH20"<?php echo $ivf_stimulation_chart->RFSH20->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH20" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_RFSH20">
<span<?php echo $ivf_stimulation_chart->RFSH20->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH20->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH21->Visible) { // RFSH21 ?>
	<tr id="r_RFSH21">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH21"><script id="tpc_ivf_stimulation_chart_RFSH21" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->RFSH21->caption() ?></span></script></span></td>
		<td data-name="RFSH21"<?php echo $ivf_stimulation_chart->RFSH21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH21" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_RFSH21">
<span<?php echo $ivf_stimulation_chart->RFSH21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH21->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH22->Visible) { // RFSH22 ?>
	<tr id="r_RFSH22">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH22"><script id="tpc_ivf_stimulation_chart_RFSH22" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->RFSH22->caption() ?></span></script></span></td>
		<td data-name="RFSH22"<?php echo $ivf_stimulation_chart->RFSH22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH22" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_RFSH22">
<span<?php echo $ivf_stimulation_chart->RFSH22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH22->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH23->Visible) { // RFSH23 ?>
	<tr id="r_RFSH23">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH23"><script id="tpc_ivf_stimulation_chart_RFSH23" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->RFSH23->caption() ?></span></script></span></td>
		<td data-name="RFSH23"<?php echo $ivf_stimulation_chart->RFSH23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH23" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_RFSH23">
<span<?php echo $ivf_stimulation_chart->RFSH23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH23->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH24->Visible) { // RFSH24 ?>
	<tr id="r_RFSH24">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH24"><script id="tpc_ivf_stimulation_chart_RFSH24" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->RFSH24->caption() ?></span></script></span></td>
		<td data-name="RFSH24"<?php echo $ivf_stimulation_chart->RFSH24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH24" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_RFSH24">
<span<?php echo $ivf_stimulation_chart->RFSH24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH24->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->RFSH25->Visible) { // RFSH25 ?>
	<tr id="r_RFSH25">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH25"><script id="tpc_ivf_stimulation_chart_RFSH25" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->RFSH25->caption() ?></span></script></span></td>
		<td data-name="RFSH25"<?php echo $ivf_stimulation_chart->RFSH25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH25" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_RFSH25">
<span<?php echo $ivf_stimulation_chart->RFSH25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->RFSH25->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG14->Visible) { // HMG14 ?>
	<tr id="r_HMG14">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG14"><script id="tpc_ivf_stimulation_chart_HMG14" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->HMG14->caption() ?></span></script></span></td>
		<td data-name="HMG14"<?php echo $ivf_stimulation_chart->HMG14->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG14" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_HMG14">
<span<?php echo $ivf_stimulation_chart->HMG14->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG14->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG15->Visible) { // HMG15 ?>
	<tr id="r_HMG15">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG15"><script id="tpc_ivf_stimulation_chart_HMG15" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->HMG15->caption() ?></span></script></span></td>
		<td data-name="HMG15"<?php echo $ivf_stimulation_chart->HMG15->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG15" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_HMG15">
<span<?php echo $ivf_stimulation_chart->HMG15->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG15->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG16->Visible) { // HMG16 ?>
	<tr id="r_HMG16">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG16"><script id="tpc_ivf_stimulation_chart_HMG16" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->HMG16->caption() ?></span></script></span></td>
		<td data-name="HMG16"<?php echo $ivf_stimulation_chart->HMG16->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG16" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_HMG16">
<span<?php echo $ivf_stimulation_chart->HMG16->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG16->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG17->Visible) { // HMG17 ?>
	<tr id="r_HMG17">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG17"><script id="tpc_ivf_stimulation_chart_HMG17" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->HMG17->caption() ?></span></script></span></td>
		<td data-name="HMG17"<?php echo $ivf_stimulation_chart->HMG17->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG17" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_HMG17">
<span<?php echo $ivf_stimulation_chart->HMG17->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG17->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG18->Visible) { // HMG18 ?>
	<tr id="r_HMG18">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG18"><script id="tpc_ivf_stimulation_chart_HMG18" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->HMG18->caption() ?></span></script></span></td>
		<td data-name="HMG18"<?php echo $ivf_stimulation_chart->HMG18->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG18" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_HMG18">
<span<?php echo $ivf_stimulation_chart->HMG18->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG18->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG19->Visible) { // HMG19 ?>
	<tr id="r_HMG19">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG19"><script id="tpc_ivf_stimulation_chart_HMG19" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->HMG19->caption() ?></span></script></span></td>
		<td data-name="HMG19"<?php echo $ivf_stimulation_chart->HMG19->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG19" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_HMG19">
<span<?php echo $ivf_stimulation_chart->HMG19->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG19->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG20->Visible) { // HMG20 ?>
	<tr id="r_HMG20">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG20"><script id="tpc_ivf_stimulation_chart_HMG20" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->HMG20->caption() ?></span></script></span></td>
		<td data-name="HMG20"<?php echo $ivf_stimulation_chart->HMG20->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG20" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_HMG20">
<span<?php echo $ivf_stimulation_chart->HMG20->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG20->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG21->Visible) { // HMG21 ?>
	<tr id="r_HMG21">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG21"><script id="tpc_ivf_stimulation_chart_HMG21" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->HMG21->caption() ?></span></script></span></td>
		<td data-name="HMG21"<?php echo $ivf_stimulation_chart->HMG21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG21" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_HMG21">
<span<?php echo $ivf_stimulation_chart->HMG21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG21->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG22->Visible) { // HMG22 ?>
	<tr id="r_HMG22">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG22"><script id="tpc_ivf_stimulation_chart_HMG22" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->HMG22->caption() ?></span></script></span></td>
		<td data-name="HMG22"<?php echo $ivf_stimulation_chart->HMG22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG22" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_HMG22">
<span<?php echo $ivf_stimulation_chart->HMG22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG22->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG23->Visible) { // HMG23 ?>
	<tr id="r_HMG23">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG23"><script id="tpc_ivf_stimulation_chart_HMG23" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->HMG23->caption() ?></span></script></span></td>
		<td data-name="HMG23"<?php echo $ivf_stimulation_chart->HMG23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG23" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_HMG23">
<span<?php echo $ivf_stimulation_chart->HMG23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG23->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG24->Visible) { // HMG24 ?>
	<tr id="r_HMG24">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG24"><script id="tpc_ivf_stimulation_chart_HMG24" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->HMG24->caption() ?></span></script></span></td>
		<td data-name="HMG24"<?php echo $ivf_stimulation_chart->HMG24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG24" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_HMG24">
<span<?php echo $ivf_stimulation_chart->HMG24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG24->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->HMG25->Visible) { // HMG25 ?>
	<tr id="r_HMG25">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG25"><script id="tpc_ivf_stimulation_chart_HMG25" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->HMG25->caption() ?></span></script></span></td>
		<td data-name="HMG25"<?php echo $ivf_stimulation_chart->HMG25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG25" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_HMG25">
<span<?php echo $ivf_stimulation_chart->HMG25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HMG25->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH14->Visible) { // GnRH14 ?>
	<tr id="r_GnRH14">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH14"><script id="tpc_ivf_stimulation_chart_GnRH14" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->GnRH14->caption() ?></span></script></span></td>
		<td data-name="GnRH14"<?php echo $ivf_stimulation_chart->GnRH14->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH14" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_GnRH14">
<span<?php echo $ivf_stimulation_chart->GnRH14->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH14->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH15->Visible) { // GnRH15 ?>
	<tr id="r_GnRH15">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH15"><script id="tpc_ivf_stimulation_chart_GnRH15" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->GnRH15->caption() ?></span></script></span></td>
		<td data-name="GnRH15"<?php echo $ivf_stimulation_chart->GnRH15->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH15" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_GnRH15">
<span<?php echo $ivf_stimulation_chart->GnRH15->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH15->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH16->Visible) { // GnRH16 ?>
	<tr id="r_GnRH16">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH16"><script id="tpc_ivf_stimulation_chart_GnRH16" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->GnRH16->caption() ?></span></script></span></td>
		<td data-name="GnRH16"<?php echo $ivf_stimulation_chart->GnRH16->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH16" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_GnRH16">
<span<?php echo $ivf_stimulation_chart->GnRH16->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH16->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH17->Visible) { // GnRH17 ?>
	<tr id="r_GnRH17">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH17"><script id="tpc_ivf_stimulation_chart_GnRH17" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->GnRH17->caption() ?></span></script></span></td>
		<td data-name="GnRH17"<?php echo $ivf_stimulation_chart->GnRH17->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH17" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_GnRH17">
<span<?php echo $ivf_stimulation_chart->GnRH17->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH17->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH18->Visible) { // GnRH18 ?>
	<tr id="r_GnRH18">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH18"><script id="tpc_ivf_stimulation_chart_GnRH18" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->GnRH18->caption() ?></span></script></span></td>
		<td data-name="GnRH18"<?php echo $ivf_stimulation_chart->GnRH18->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH18" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_GnRH18">
<span<?php echo $ivf_stimulation_chart->GnRH18->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH18->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH19->Visible) { // GnRH19 ?>
	<tr id="r_GnRH19">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH19"><script id="tpc_ivf_stimulation_chart_GnRH19" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->GnRH19->caption() ?></span></script></span></td>
		<td data-name="GnRH19"<?php echo $ivf_stimulation_chart->GnRH19->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH19" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_GnRH19">
<span<?php echo $ivf_stimulation_chart->GnRH19->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH19->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH20->Visible) { // GnRH20 ?>
	<tr id="r_GnRH20">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH20"><script id="tpc_ivf_stimulation_chart_GnRH20" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->GnRH20->caption() ?></span></script></span></td>
		<td data-name="GnRH20"<?php echo $ivf_stimulation_chart->GnRH20->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH20" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_GnRH20">
<span<?php echo $ivf_stimulation_chart->GnRH20->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH20->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH21->Visible) { // GnRH21 ?>
	<tr id="r_GnRH21">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH21"><script id="tpc_ivf_stimulation_chart_GnRH21" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->GnRH21->caption() ?></span></script></span></td>
		<td data-name="GnRH21"<?php echo $ivf_stimulation_chart->GnRH21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH21" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_GnRH21">
<span<?php echo $ivf_stimulation_chart->GnRH21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH21->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH22->Visible) { // GnRH22 ?>
	<tr id="r_GnRH22">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH22"><script id="tpc_ivf_stimulation_chart_GnRH22" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->GnRH22->caption() ?></span></script></span></td>
		<td data-name="GnRH22"<?php echo $ivf_stimulation_chart->GnRH22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH22" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_GnRH22">
<span<?php echo $ivf_stimulation_chart->GnRH22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH22->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH23->Visible) { // GnRH23 ?>
	<tr id="r_GnRH23">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH23"><script id="tpc_ivf_stimulation_chart_GnRH23" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->GnRH23->caption() ?></span></script></span></td>
		<td data-name="GnRH23"<?php echo $ivf_stimulation_chart->GnRH23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH23" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_GnRH23">
<span<?php echo $ivf_stimulation_chart->GnRH23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH23->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH24->Visible) { // GnRH24 ?>
	<tr id="r_GnRH24">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH24"><script id="tpc_ivf_stimulation_chart_GnRH24" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->GnRH24->caption() ?></span></script></span></td>
		<td data-name="GnRH24"<?php echo $ivf_stimulation_chart->GnRH24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH24" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_GnRH24">
<span<?php echo $ivf_stimulation_chart->GnRH24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH24->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->GnRH25->Visible) { // GnRH25 ?>
	<tr id="r_GnRH25">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH25"><script id="tpc_ivf_stimulation_chart_GnRH25" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->GnRH25->caption() ?></span></script></span></td>
		<td data-name="GnRH25"<?php echo $ivf_stimulation_chart->GnRH25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH25" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_GnRH25">
<span<?php echo $ivf_stimulation_chart->GnRH25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->GnRH25->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->P414->Visible) { // P414 ?>
	<tr id="r_P414">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P414"><script id="tpc_ivf_stimulation_chart_P414" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->P414->caption() ?></span></script></span></td>
		<td data-name="P414"<?php echo $ivf_stimulation_chart->P414->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P414" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_P414">
<span<?php echo $ivf_stimulation_chart->P414->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P414->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->P415->Visible) { // P415 ?>
	<tr id="r_P415">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P415"><script id="tpc_ivf_stimulation_chart_P415" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->P415->caption() ?></span></script></span></td>
		<td data-name="P415"<?php echo $ivf_stimulation_chart->P415->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P415" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_P415">
<span<?php echo $ivf_stimulation_chart->P415->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P415->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->P416->Visible) { // P416 ?>
	<tr id="r_P416">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P416"><script id="tpc_ivf_stimulation_chart_P416" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->P416->caption() ?></span></script></span></td>
		<td data-name="P416"<?php echo $ivf_stimulation_chart->P416->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P416" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_P416">
<span<?php echo $ivf_stimulation_chart->P416->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P416->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->P417->Visible) { // P417 ?>
	<tr id="r_P417">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P417"><script id="tpc_ivf_stimulation_chart_P417" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->P417->caption() ?></span></script></span></td>
		<td data-name="P417"<?php echo $ivf_stimulation_chart->P417->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P417" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_P417">
<span<?php echo $ivf_stimulation_chart->P417->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P417->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->P418->Visible) { // P418 ?>
	<tr id="r_P418">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P418"><script id="tpc_ivf_stimulation_chart_P418" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->P418->caption() ?></span></script></span></td>
		<td data-name="P418"<?php echo $ivf_stimulation_chart->P418->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P418" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_P418">
<span<?php echo $ivf_stimulation_chart->P418->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P418->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->P419->Visible) { // P419 ?>
	<tr id="r_P419">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P419"><script id="tpc_ivf_stimulation_chart_P419" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->P419->caption() ?></span></script></span></td>
		<td data-name="P419"<?php echo $ivf_stimulation_chart->P419->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P419" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_P419">
<span<?php echo $ivf_stimulation_chart->P419->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P419->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->P420->Visible) { // P420 ?>
	<tr id="r_P420">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P420"><script id="tpc_ivf_stimulation_chart_P420" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->P420->caption() ?></span></script></span></td>
		<td data-name="P420"<?php echo $ivf_stimulation_chart->P420->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P420" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_P420">
<span<?php echo $ivf_stimulation_chart->P420->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P420->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->P421->Visible) { // P421 ?>
	<tr id="r_P421">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P421"><script id="tpc_ivf_stimulation_chart_P421" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->P421->caption() ?></span></script></span></td>
		<td data-name="P421"<?php echo $ivf_stimulation_chart->P421->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P421" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_P421">
<span<?php echo $ivf_stimulation_chart->P421->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P421->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->P422->Visible) { // P422 ?>
	<tr id="r_P422">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P422"><script id="tpc_ivf_stimulation_chart_P422" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->P422->caption() ?></span></script></span></td>
		<td data-name="P422"<?php echo $ivf_stimulation_chart->P422->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P422" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_P422">
<span<?php echo $ivf_stimulation_chart->P422->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P422->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->P423->Visible) { // P423 ?>
	<tr id="r_P423">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P423"><script id="tpc_ivf_stimulation_chart_P423" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->P423->caption() ?></span></script></span></td>
		<td data-name="P423"<?php echo $ivf_stimulation_chart->P423->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P423" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_P423">
<span<?php echo $ivf_stimulation_chart->P423->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P423->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->P424->Visible) { // P424 ?>
	<tr id="r_P424">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P424"><script id="tpc_ivf_stimulation_chart_P424" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->P424->caption() ?></span></script></span></td>
		<td data-name="P424"<?php echo $ivf_stimulation_chart->P424->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P424" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_P424">
<span<?php echo $ivf_stimulation_chart->P424->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P424->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->P425->Visible) { // P425 ?>
	<tr id="r_P425">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P425"><script id="tpc_ivf_stimulation_chart_P425" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->P425->caption() ?></span></script></span></td>
		<td data-name="P425"<?php echo $ivf_stimulation_chart->P425->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P425" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_P425">
<span<?php echo $ivf_stimulation_chart->P425->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->P425->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt14->Visible) { // USGRt14 ?>
	<tr id="r_USGRt14">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt14"><script id="tpc_ivf_stimulation_chart_USGRt14" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGRt14->caption() ?></span></script></span></td>
		<td data-name="USGRt14"<?php echo $ivf_stimulation_chart->USGRt14->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt14" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGRt14">
<span<?php echo $ivf_stimulation_chart->USGRt14->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt14->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt15->Visible) { // USGRt15 ?>
	<tr id="r_USGRt15">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt15"><script id="tpc_ivf_stimulation_chart_USGRt15" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGRt15->caption() ?></span></script></span></td>
		<td data-name="USGRt15"<?php echo $ivf_stimulation_chart->USGRt15->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt15" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGRt15">
<span<?php echo $ivf_stimulation_chart->USGRt15->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt15->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt16->Visible) { // USGRt16 ?>
	<tr id="r_USGRt16">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt16"><script id="tpc_ivf_stimulation_chart_USGRt16" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGRt16->caption() ?></span></script></span></td>
		<td data-name="USGRt16"<?php echo $ivf_stimulation_chart->USGRt16->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt16" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGRt16">
<span<?php echo $ivf_stimulation_chart->USGRt16->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt16->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt17->Visible) { // USGRt17 ?>
	<tr id="r_USGRt17">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt17"><script id="tpc_ivf_stimulation_chart_USGRt17" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGRt17->caption() ?></span></script></span></td>
		<td data-name="USGRt17"<?php echo $ivf_stimulation_chart->USGRt17->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt17" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGRt17">
<span<?php echo $ivf_stimulation_chart->USGRt17->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt17->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt18->Visible) { // USGRt18 ?>
	<tr id="r_USGRt18">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt18"><script id="tpc_ivf_stimulation_chart_USGRt18" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGRt18->caption() ?></span></script></span></td>
		<td data-name="USGRt18"<?php echo $ivf_stimulation_chart->USGRt18->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt18" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGRt18">
<span<?php echo $ivf_stimulation_chart->USGRt18->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt18->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt19->Visible) { // USGRt19 ?>
	<tr id="r_USGRt19">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt19"><script id="tpc_ivf_stimulation_chart_USGRt19" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGRt19->caption() ?></span></script></span></td>
		<td data-name="USGRt19"<?php echo $ivf_stimulation_chart->USGRt19->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt19" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGRt19">
<span<?php echo $ivf_stimulation_chart->USGRt19->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt19->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt20->Visible) { // USGRt20 ?>
	<tr id="r_USGRt20">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt20"><script id="tpc_ivf_stimulation_chart_USGRt20" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGRt20->caption() ?></span></script></span></td>
		<td data-name="USGRt20"<?php echo $ivf_stimulation_chart->USGRt20->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt20" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGRt20">
<span<?php echo $ivf_stimulation_chart->USGRt20->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt20->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt21->Visible) { // USGRt21 ?>
	<tr id="r_USGRt21">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt21"><script id="tpc_ivf_stimulation_chart_USGRt21" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGRt21->caption() ?></span></script></span></td>
		<td data-name="USGRt21"<?php echo $ivf_stimulation_chart->USGRt21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt21" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGRt21">
<span<?php echo $ivf_stimulation_chart->USGRt21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt21->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt22->Visible) { // USGRt22 ?>
	<tr id="r_USGRt22">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt22"><script id="tpc_ivf_stimulation_chart_USGRt22" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGRt22->caption() ?></span></script></span></td>
		<td data-name="USGRt22"<?php echo $ivf_stimulation_chart->USGRt22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt22" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGRt22">
<span<?php echo $ivf_stimulation_chart->USGRt22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt22->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt23->Visible) { // USGRt23 ?>
	<tr id="r_USGRt23">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt23"><script id="tpc_ivf_stimulation_chart_USGRt23" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGRt23->caption() ?></span></script></span></td>
		<td data-name="USGRt23"<?php echo $ivf_stimulation_chart->USGRt23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt23" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGRt23">
<span<?php echo $ivf_stimulation_chart->USGRt23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt23->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt24->Visible) { // USGRt24 ?>
	<tr id="r_USGRt24">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt24"><script id="tpc_ivf_stimulation_chart_USGRt24" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGRt24->caption() ?></span></script></span></td>
		<td data-name="USGRt24"<?php echo $ivf_stimulation_chart->USGRt24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt24" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGRt24">
<span<?php echo $ivf_stimulation_chart->USGRt24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt24->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGRt25->Visible) { // USGRt25 ?>
	<tr id="r_USGRt25">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt25"><script id="tpc_ivf_stimulation_chart_USGRt25" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGRt25->caption() ?></span></script></span></td>
		<td data-name="USGRt25"<?php echo $ivf_stimulation_chart->USGRt25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt25" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGRt25">
<span<?php echo $ivf_stimulation_chart->USGRt25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGRt25->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt14->Visible) { // USGLt14 ?>
	<tr id="r_USGLt14">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt14"><script id="tpc_ivf_stimulation_chart_USGLt14" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGLt14->caption() ?></span></script></span></td>
		<td data-name="USGLt14"<?php echo $ivf_stimulation_chart->USGLt14->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt14" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGLt14">
<span<?php echo $ivf_stimulation_chart->USGLt14->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt14->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt15->Visible) { // USGLt15 ?>
	<tr id="r_USGLt15">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt15"><script id="tpc_ivf_stimulation_chart_USGLt15" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGLt15->caption() ?></span></script></span></td>
		<td data-name="USGLt15"<?php echo $ivf_stimulation_chart->USGLt15->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt15" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGLt15">
<span<?php echo $ivf_stimulation_chart->USGLt15->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt15->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt16->Visible) { // USGLt16 ?>
	<tr id="r_USGLt16">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt16"><script id="tpc_ivf_stimulation_chart_USGLt16" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGLt16->caption() ?></span></script></span></td>
		<td data-name="USGLt16"<?php echo $ivf_stimulation_chart->USGLt16->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt16" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGLt16">
<span<?php echo $ivf_stimulation_chart->USGLt16->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt16->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt17->Visible) { // USGLt17 ?>
	<tr id="r_USGLt17">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt17"><script id="tpc_ivf_stimulation_chart_USGLt17" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGLt17->caption() ?></span></script></span></td>
		<td data-name="USGLt17"<?php echo $ivf_stimulation_chart->USGLt17->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt17" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGLt17">
<span<?php echo $ivf_stimulation_chart->USGLt17->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt17->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt18->Visible) { // USGLt18 ?>
	<tr id="r_USGLt18">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt18"><script id="tpc_ivf_stimulation_chart_USGLt18" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGLt18->caption() ?></span></script></span></td>
		<td data-name="USGLt18"<?php echo $ivf_stimulation_chart->USGLt18->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt18" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGLt18">
<span<?php echo $ivf_stimulation_chart->USGLt18->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt18->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt19->Visible) { // USGLt19 ?>
	<tr id="r_USGLt19">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt19"><script id="tpc_ivf_stimulation_chart_USGLt19" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGLt19->caption() ?></span></script></span></td>
		<td data-name="USGLt19"<?php echo $ivf_stimulation_chart->USGLt19->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt19" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGLt19">
<span<?php echo $ivf_stimulation_chart->USGLt19->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt19->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt20->Visible) { // USGLt20 ?>
	<tr id="r_USGLt20">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt20"><script id="tpc_ivf_stimulation_chart_USGLt20" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGLt20->caption() ?></span></script></span></td>
		<td data-name="USGLt20"<?php echo $ivf_stimulation_chart->USGLt20->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt20" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGLt20">
<span<?php echo $ivf_stimulation_chart->USGLt20->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt20->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt21->Visible) { // USGLt21 ?>
	<tr id="r_USGLt21">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt21"><script id="tpc_ivf_stimulation_chart_USGLt21" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGLt21->caption() ?></span></script></span></td>
		<td data-name="USGLt21"<?php echo $ivf_stimulation_chart->USGLt21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt21" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGLt21">
<span<?php echo $ivf_stimulation_chart->USGLt21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt21->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt22->Visible) { // USGLt22 ?>
	<tr id="r_USGLt22">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt22"><script id="tpc_ivf_stimulation_chart_USGLt22" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGLt22->caption() ?></span></script></span></td>
		<td data-name="USGLt22"<?php echo $ivf_stimulation_chart->USGLt22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt22" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGLt22">
<span<?php echo $ivf_stimulation_chart->USGLt22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt22->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt23->Visible) { // USGLt23 ?>
	<tr id="r_USGLt23">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt23"><script id="tpc_ivf_stimulation_chart_USGLt23" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGLt23->caption() ?></span></script></span></td>
		<td data-name="USGLt23"<?php echo $ivf_stimulation_chart->USGLt23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt23" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGLt23">
<span<?php echo $ivf_stimulation_chart->USGLt23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt23->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt24->Visible) { // USGLt24 ?>
	<tr id="r_USGLt24">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt24"><script id="tpc_ivf_stimulation_chart_USGLt24" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGLt24->caption() ?></span></script></span></td>
		<td data-name="USGLt24"<?php echo $ivf_stimulation_chart->USGLt24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt24" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGLt24">
<span<?php echo $ivf_stimulation_chart->USGLt24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt24->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->USGLt25->Visible) { // USGLt25 ?>
	<tr id="r_USGLt25">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt25"><script id="tpc_ivf_stimulation_chart_USGLt25" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->USGLt25->caption() ?></span></script></span></td>
		<td data-name="USGLt25"<?php echo $ivf_stimulation_chart->USGLt25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt25" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_USGLt25">
<span<?php echo $ivf_stimulation_chart->USGLt25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->USGLt25->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM14->Visible) { // EM14 ?>
	<tr id="r_EM14">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM14"><script id="tpc_ivf_stimulation_chart_EM14" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->EM14->caption() ?></span></script></span></td>
		<td data-name="EM14"<?php echo $ivf_stimulation_chart->EM14->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM14" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_EM14">
<span<?php echo $ivf_stimulation_chart->EM14->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM14->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM15->Visible) { // EM15 ?>
	<tr id="r_EM15">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM15"><script id="tpc_ivf_stimulation_chart_EM15" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->EM15->caption() ?></span></script></span></td>
		<td data-name="EM15"<?php echo $ivf_stimulation_chart->EM15->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM15" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_EM15">
<span<?php echo $ivf_stimulation_chart->EM15->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM15->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM16->Visible) { // EM16 ?>
	<tr id="r_EM16">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM16"><script id="tpc_ivf_stimulation_chart_EM16" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->EM16->caption() ?></span></script></span></td>
		<td data-name="EM16"<?php echo $ivf_stimulation_chart->EM16->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM16" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_EM16">
<span<?php echo $ivf_stimulation_chart->EM16->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM16->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM17->Visible) { // EM17 ?>
	<tr id="r_EM17">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM17"><script id="tpc_ivf_stimulation_chart_EM17" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->EM17->caption() ?></span></script></span></td>
		<td data-name="EM17"<?php echo $ivf_stimulation_chart->EM17->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM17" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_EM17">
<span<?php echo $ivf_stimulation_chart->EM17->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM17->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM18->Visible) { // EM18 ?>
	<tr id="r_EM18">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM18"><script id="tpc_ivf_stimulation_chart_EM18" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->EM18->caption() ?></span></script></span></td>
		<td data-name="EM18"<?php echo $ivf_stimulation_chart->EM18->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM18" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_EM18">
<span<?php echo $ivf_stimulation_chart->EM18->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM18->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM19->Visible) { // EM19 ?>
	<tr id="r_EM19">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM19"><script id="tpc_ivf_stimulation_chart_EM19" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->EM19->caption() ?></span></script></span></td>
		<td data-name="EM19"<?php echo $ivf_stimulation_chart->EM19->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM19" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_EM19">
<span<?php echo $ivf_stimulation_chart->EM19->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM19->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM20->Visible) { // EM20 ?>
	<tr id="r_EM20">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM20"><script id="tpc_ivf_stimulation_chart_EM20" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->EM20->caption() ?></span></script></span></td>
		<td data-name="EM20"<?php echo $ivf_stimulation_chart->EM20->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM20" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_EM20">
<span<?php echo $ivf_stimulation_chart->EM20->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM20->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM21->Visible) { // EM21 ?>
	<tr id="r_EM21">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM21"><script id="tpc_ivf_stimulation_chart_EM21" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->EM21->caption() ?></span></script></span></td>
		<td data-name="EM21"<?php echo $ivf_stimulation_chart->EM21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM21" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_EM21">
<span<?php echo $ivf_stimulation_chart->EM21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM21->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM22->Visible) { // EM22 ?>
	<tr id="r_EM22">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM22"><script id="tpc_ivf_stimulation_chart_EM22" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->EM22->caption() ?></span></script></span></td>
		<td data-name="EM22"<?php echo $ivf_stimulation_chart->EM22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM22" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_EM22">
<span<?php echo $ivf_stimulation_chart->EM22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM22->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM23->Visible) { // EM23 ?>
	<tr id="r_EM23">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM23"><script id="tpc_ivf_stimulation_chart_EM23" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->EM23->caption() ?></span></script></span></td>
		<td data-name="EM23"<?php echo $ivf_stimulation_chart->EM23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM23" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_EM23">
<span<?php echo $ivf_stimulation_chart->EM23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM23->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM24->Visible) { // EM24 ?>
	<tr id="r_EM24">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM24"><script id="tpc_ivf_stimulation_chart_EM24" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->EM24->caption() ?></span></script></span></td>
		<td data-name="EM24"<?php echo $ivf_stimulation_chart->EM24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM24" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_EM24">
<span<?php echo $ivf_stimulation_chart->EM24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM24->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->EM25->Visible) { // EM25 ?>
	<tr id="r_EM25">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM25"><script id="tpc_ivf_stimulation_chart_EM25" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->EM25->caption() ?></span></script></span></td>
		<td data-name="EM25"<?php echo $ivf_stimulation_chart->EM25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM25" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_EM25">
<span<?php echo $ivf_stimulation_chart->EM25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EM25->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others14->Visible) { // Others14 ?>
	<tr id="r_Others14">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others14"><script id="tpc_ivf_stimulation_chart_Others14" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Others14->caption() ?></span></script></span></td>
		<td data-name="Others14"<?php echo $ivf_stimulation_chart->Others14->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others14" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Others14">
<span<?php echo $ivf_stimulation_chart->Others14->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others14->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others15->Visible) { // Others15 ?>
	<tr id="r_Others15">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others15"><script id="tpc_ivf_stimulation_chart_Others15" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Others15->caption() ?></span></script></span></td>
		<td data-name="Others15"<?php echo $ivf_stimulation_chart->Others15->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others15" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Others15">
<span<?php echo $ivf_stimulation_chart->Others15->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others15->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others16->Visible) { // Others16 ?>
	<tr id="r_Others16">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others16"><script id="tpc_ivf_stimulation_chart_Others16" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Others16->caption() ?></span></script></span></td>
		<td data-name="Others16"<?php echo $ivf_stimulation_chart->Others16->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others16" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Others16">
<span<?php echo $ivf_stimulation_chart->Others16->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others16->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others17->Visible) { // Others17 ?>
	<tr id="r_Others17">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others17"><script id="tpc_ivf_stimulation_chart_Others17" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Others17->caption() ?></span></script></span></td>
		<td data-name="Others17"<?php echo $ivf_stimulation_chart->Others17->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others17" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Others17">
<span<?php echo $ivf_stimulation_chart->Others17->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others17->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others18->Visible) { // Others18 ?>
	<tr id="r_Others18">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others18"><script id="tpc_ivf_stimulation_chart_Others18" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Others18->caption() ?></span></script></span></td>
		<td data-name="Others18"<?php echo $ivf_stimulation_chart->Others18->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others18" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Others18">
<span<?php echo $ivf_stimulation_chart->Others18->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others18->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others19->Visible) { // Others19 ?>
	<tr id="r_Others19">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others19"><script id="tpc_ivf_stimulation_chart_Others19" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Others19->caption() ?></span></script></span></td>
		<td data-name="Others19"<?php echo $ivf_stimulation_chart->Others19->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others19" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Others19">
<span<?php echo $ivf_stimulation_chart->Others19->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others19->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others20->Visible) { // Others20 ?>
	<tr id="r_Others20">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others20"><script id="tpc_ivf_stimulation_chart_Others20" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Others20->caption() ?></span></script></span></td>
		<td data-name="Others20"<?php echo $ivf_stimulation_chart->Others20->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others20" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Others20">
<span<?php echo $ivf_stimulation_chart->Others20->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others20->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others21->Visible) { // Others21 ?>
	<tr id="r_Others21">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others21"><script id="tpc_ivf_stimulation_chart_Others21" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Others21->caption() ?></span></script></span></td>
		<td data-name="Others21"<?php echo $ivf_stimulation_chart->Others21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others21" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Others21">
<span<?php echo $ivf_stimulation_chart->Others21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others21->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others22->Visible) { // Others22 ?>
	<tr id="r_Others22">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others22"><script id="tpc_ivf_stimulation_chart_Others22" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Others22->caption() ?></span></script></span></td>
		<td data-name="Others22"<?php echo $ivf_stimulation_chart->Others22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others22" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Others22">
<span<?php echo $ivf_stimulation_chart->Others22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others22->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others23->Visible) { // Others23 ?>
	<tr id="r_Others23">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others23"><script id="tpc_ivf_stimulation_chart_Others23" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Others23->caption() ?></span></script></span></td>
		<td data-name="Others23"<?php echo $ivf_stimulation_chart->Others23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others23" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Others23">
<span<?php echo $ivf_stimulation_chart->Others23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others23->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others24->Visible) { // Others24 ?>
	<tr id="r_Others24">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others24"><script id="tpc_ivf_stimulation_chart_Others24" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Others24->caption() ?></span></script></span></td>
		<td data-name="Others24"<?php echo $ivf_stimulation_chart->Others24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others24" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Others24">
<span<?php echo $ivf_stimulation_chart->Others24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others24->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->Others25->Visible) { // Others25 ?>
	<tr id="r_Others25">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others25"><script id="tpc_ivf_stimulation_chart_Others25" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->Others25->caption() ?></span></script></span></td>
		<td data-name="Others25"<?php echo $ivf_stimulation_chart->Others25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others25" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_Others25">
<span<?php echo $ivf_stimulation_chart->Others25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->Others25->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR14->Visible) { // DR14 ?>
	<tr id="r_DR14">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR14"><script id="tpc_ivf_stimulation_chart_DR14" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->DR14->caption() ?></span></script></span></td>
		<td data-name="DR14"<?php echo $ivf_stimulation_chart->DR14->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR14" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_DR14">
<span<?php echo $ivf_stimulation_chart->DR14->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR14->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR15->Visible) { // DR15 ?>
	<tr id="r_DR15">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR15"><script id="tpc_ivf_stimulation_chart_DR15" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->DR15->caption() ?></span></script></span></td>
		<td data-name="DR15"<?php echo $ivf_stimulation_chart->DR15->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR15" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_DR15">
<span<?php echo $ivf_stimulation_chart->DR15->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR15->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR16->Visible) { // DR16 ?>
	<tr id="r_DR16">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR16"><script id="tpc_ivf_stimulation_chart_DR16" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->DR16->caption() ?></span></script></span></td>
		<td data-name="DR16"<?php echo $ivf_stimulation_chart->DR16->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR16" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_DR16">
<span<?php echo $ivf_stimulation_chart->DR16->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR16->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR17->Visible) { // DR17 ?>
	<tr id="r_DR17">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR17"><script id="tpc_ivf_stimulation_chart_DR17" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->DR17->caption() ?></span></script></span></td>
		<td data-name="DR17"<?php echo $ivf_stimulation_chart->DR17->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR17" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_DR17">
<span<?php echo $ivf_stimulation_chart->DR17->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR17->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR18->Visible) { // DR18 ?>
	<tr id="r_DR18">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR18"><script id="tpc_ivf_stimulation_chart_DR18" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->DR18->caption() ?></span></script></span></td>
		<td data-name="DR18"<?php echo $ivf_stimulation_chart->DR18->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR18" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_DR18">
<span<?php echo $ivf_stimulation_chart->DR18->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR18->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR19->Visible) { // DR19 ?>
	<tr id="r_DR19">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR19"><script id="tpc_ivf_stimulation_chart_DR19" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->DR19->caption() ?></span></script></span></td>
		<td data-name="DR19"<?php echo $ivf_stimulation_chart->DR19->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR19" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_DR19">
<span<?php echo $ivf_stimulation_chart->DR19->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR19->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR20->Visible) { // DR20 ?>
	<tr id="r_DR20">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR20"><script id="tpc_ivf_stimulation_chart_DR20" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->DR20->caption() ?></span></script></span></td>
		<td data-name="DR20"<?php echo $ivf_stimulation_chart->DR20->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR20" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_DR20">
<span<?php echo $ivf_stimulation_chart->DR20->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR20->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR21->Visible) { // DR21 ?>
	<tr id="r_DR21">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR21"><script id="tpc_ivf_stimulation_chart_DR21" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->DR21->caption() ?></span></script></span></td>
		<td data-name="DR21"<?php echo $ivf_stimulation_chart->DR21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR21" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_DR21">
<span<?php echo $ivf_stimulation_chart->DR21->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR21->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR22->Visible) { // DR22 ?>
	<tr id="r_DR22">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR22"><script id="tpc_ivf_stimulation_chart_DR22" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->DR22->caption() ?></span></script></span></td>
		<td data-name="DR22"<?php echo $ivf_stimulation_chart->DR22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR22" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_DR22">
<span<?php echo $ivf_stimulation_chart->DR22->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR22->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR23->Visible) { // DR23 ?>
	<tr id="r_DR23">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR23"><script id="tpc_ivf_stimulation_chart_DR23" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->DR23->caption() ?></span></script></span></td>
		<td data-name="DR23"<?php echo $ivf_stimulation_chart->DR23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR23" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_DR23">
<span<?php echo $ivf_stimulation_chart->DR23->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR23->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR24->Visible) { // DR24 ?>
	<tr id="r_DR24">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR24"><script id="tpc_ivf_stimulation_chart_DR24" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->DR24->caption() ?></span></script></span></td>
		<td data-name="DR24"<?php echo $ivf_stimulation_chart->DR24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR24" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_DR24">
<span<?php echo $ivf_stimulation_chart->DR24->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR24->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->DR25->Visible) { // DR25 ?>
	<tr id="r_DR25">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR25"><script id="tpc_ivf_stimulation_chart_DR25" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->DR25->caption() ?></span></script></span></td>
		<td data-name="DR25"<?php echo $ivf_stimulation_chart->DR25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR25" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_DR25">
<span<?php echo $ivf_stimulation_chart->DR25->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DR25->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->E214->Visible) { // E214 ?>
	<tr id="r_E214">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E214"><script id="tpc_ivf_stimulation_chart_E214" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->E214->caption() ?></span></script></span></td>
		<td data-name="E214"<?php echo $ivf_stimulation_chart->E214->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E214" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_E214">
<span<?php echo $ivf_stimulation_chart->E214->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E214->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->E215->Visible) { // E215 ?>
	<tr id="r_E215">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E215"><script id="tpc_ivf_stimulation_chart_E215" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->E215->caption() ?></span></script></span></td>
		<td data-name="E215"<?php echo $ivf_stimulation_chart->E215->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E215" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_E215">
<span<?php echo $ivf_stimulation_chart->E215->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E215->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->E216->Visible) { // E216 ?>
	<tr id="r_E216">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E216"><script id="tpc_ivf_stimulation_chart_E216" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->E216->caption() ?></span></script></span></td>
		<td data-name="E216"<?php echo $ivf_stimulation_chart->E216->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E216" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_E216">
<span<?php echo $ivf_stimulation_chart->E216->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E216->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->E217->Visible) { // E217 ?>
	<tr id="r_E217">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E217"><script id="tpc_ivf_stimulation_chart_E217" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->E217->caption() ?></span></script></span></td>
		<td data-name="E217"<?php echo $ivf_stimulation_chart->E217->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E217" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_E217">
<span<?php echo $ivf_stimulation_chart->E217->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E217->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->E218->Visible) { // E218 ?>
	<tr id="r_E218">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E218"><script id="tpc_ivf_stimulation_chart_E218" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->E218->caption() ?></span></script></span></td>
		<td data-name="E218"<?php echo $ivf_stimulation_chart->E218->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E218" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_E218">
<span<?php echo $ivf_stimulation_chart->E218->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E218->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->E219->Visible) { // E219 ?>
	<tr id="r_E219">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E219"><script id="tpc_ivf_stimulation_chart_E219" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->E219->caption() ?></span></script></span></td>
		<td data-name="E219"<?php echo $ivf_stimulation_chart->E219->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E219" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_E219">
<span<?php echo $ivf_stimulation_chart->E219->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E219->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->E220->Visible) { // E220 ?>
	<tr id="r_E220">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E220"><script id="tpc_ivf_stimulation_chart_E220" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->E220->caption() ?></span></script></span></td>
		<td data-name="E220"<?php echo $ivf_stimulation_chart->E220->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E220" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_E220">
<span<?php echo $ivf_stimulation_chart->E220->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E220->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->E221->Visible) { // E221 ?>
	<tr id="r_E221">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E221"><script id="tpc_ivf_stimulation_chart_E221" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->E221->caption() ?></span></script></span></td>
		<td data-name="E221"<?php echo $ivf_stimulation_chart->E221->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E221" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_E221">
<span<?php echo $ivf_stimulation_chart->E221->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E221->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->E222->Visible) { // E222 ?>
	<tr id="r_E222">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E222"><script id="tpc_ivf_stimulation_chart_E222" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->E222->caption() ?></span></script></span></td>
		<td data-name="E222"<?php echo $ivf_stimulation_chart->E222->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E222" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_E222">
<span<?php echo $ivf_stimulation_chart->E222->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E222->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->E223->Visible) { // E223 ?>
	<tr id="r_E223">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E223"><script id="tpc_ivf_stimulation_chart_E223" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->E223->caption() ?></span></script></span></td>
		<td data-name="E223"<?php echo $ivf_stimulation_chart->E223->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E223" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_E223">
<span<?php echo $ivf_stimulation_chart->E223->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E223->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->E224->Visible) { // E224 ?>
	<tr id="r_E224">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E224"><script id="tpc_ivf_stimulation_chart_E224" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->E224->caption() ?></span></script></span></td>
		<td data-name="E224"<?php echo $ivf_stimulation_chart->E224->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E224" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_E224">
<span<?php echo $ivf_stimulation_chart->E224->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E224->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->E225->Visible) { // E225 ?>
	<tr id="r_E225">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E225"><script id="tpc_ivf_stimulation_chart_E225" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->E225->caption() ?></span></script></span></td>
		<td data-name="E225"<?php echo $ivf_stimulation_chart->E225->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E225" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_E225">
<span<?php echo $ivf_stimulation_chart->E225->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->E225->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->EEETTTDTE->Visible) { // EEETTTDTE ?>
	<tr id="r_EEETTTDTE">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EEETTTDTE"><script id="tpc_ivf_stimulation_chart_EEETTTDTE" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->EEETTTDTE->caption() ?></span></script></span></td>
		<td data-name="EEETTTDTE"<?php echo $ivf_stimulation_chart->EEETTTDTE->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EEETTTDTE" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_EEETTTDTE">
<span<?php echo $ivf_stimulation_chart->EEETTTDTE->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EEETTTDTE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->bhcgdate->Visible) { // bhcgdate ?>
	<tr id="r_bhcgdate">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_bhcgdate"><script id="tpc_ivf_stimulation_chart_bhcgdate" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->bhcgdate->caption() ?></span></script></span></td>
		<td data-name="bhcgdate"<?php echo $ivf_stimulation_chart->bhcgdate->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_bhcgdate" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_bhcgdate">
<span<?php echo $ivf_stimulation_chart->bhcgdate->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->bhcgdate->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->TUBAL_PATENCY->Visible) { // TUBAL_PATENCY ?>
	<tr id="r_TUBAL_PATENCY">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_TUBAL_PATENCY"><script id="tpc_ivf_stimulation_chart_TUBAL_PATENCY" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->TUBAL_PATENCY->caption() ?></span></script></span></td>
		<td data-name="TUBAL_PATENCY"<?php echo $ivf_stimulation_chart->TUBAL_PATENCY->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_TUBAL_PATENCY" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_TUBAL_PATENCY">
<span<?php echo $ivf_stimulation_chart->TUBAL_PATENCY->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->TUBAL_PATENCY->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->HSG->Visible) { // HSG ?>
	<tr id="r_HSG">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HSG"><script id="tpc_ivf_stimulation_chart_HSG" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->HSG->caption() ?></span></script></span></td>
		<td data-name="HSG"<?php echo $ivf_stimulation_chart->HSG->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HSG" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_HSG">
<span<?php echo $ivf_stimulation_chart->HSG->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->HSG->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->DHL->Visible) { // DHL ?>
	<tr id="r_DHL">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DHL"><script id="tpc_ivf_stimulation_chart_DHL" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->DHL->caption() ?></span></script></span></td>
		<td data-name="DHL"<?php echo $ivf_stimulation_chart->DHL->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DHL" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_DHL">
<span<?php echo $ivf_stimulation_chart->DHL->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->DHL->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->UTERINE_PROBLEMS->Visible) { // UTERINE_PROBLEMS ?>
	<tr id="r_UTERINE_PROBLEMS">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_UTERINE_PROBLEMS"><script id="tpc_ivf_stimulation_chart_UTERINE_PROBLEMS" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->UTERINE_PROBLEMS->caption() ?></span></script></span></td>
		<td data-name="UTERINE_PROBLEMS"<?php echo $ivf_stimulation_chart->UTERINE_PROBLEMS->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_UTERINE_PROBLEMS" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_UTERINE_PROBLEMS">
<span<?php echo $ivf_stimulation_chart->UTERINE_PROBLEMS->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->UTERINE_PROBLEMS->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->W_COMORBIDS->Visible) { // W_COMORBIDS ?>
	<tr id="r_W_COMORBIDS">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_W_COMORBIDS"><script id="tpc_ivf_stimulation_chart_W_COMORBIDS" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->W_COMORBIDS->caption() ?></span></script></span></td>
		<td data-name="W_COMORBIDS"<?php echo $ivf_stimulation_chart->W_COMORBIDS->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_W_COMORBIDS" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_W_COMORBIDS">
<span<?php echo $ivf_stimulation_chart->W_COMORBIDS->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->W_COMORBIDS->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->H_COMORBIDS->Visible) { // H_COMORBIDS ?>
	<tr id="r_H_COMORBIDS">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_H_COMORBIDS"><script id="tpc_ivf_stimulation_chart_H_COMORBIDS" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->H_COMORBIDS->caption() ?></span></script></span></td>
		<td data-name="H_COMORBIDS"<?php echo $ivf_stimulation_chart->H_COMORBIDS->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_H_COMORBIDS" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_H_COMORBIDS">
<span<?php echo $ivf_stimulation_chart->H_COMORBIDS->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->H_COMORBIDS->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->SEXUAL_DYSFUNCTION->Visible) { // SEXUAL_DYSFUNCTION ?>
	<tr id="r_SEXUAL_DYSFUNCTION">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_SEXUAL_DYSFUNCTION"><script id="tpc_ivf_stimulation_chart_SEXUAL_DYSFUNCTION" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->SEXUAL_DYSFUNCTION->caption() ?></span></script></span></td>
		<td data-name="SEXUAL_DYSFUNCTION"<?php echo $ivf_stimulation_chart->SEXUAL_DYSFUNCTION->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_SEXUAL_DYSFUNCTION" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_SEXUAL_DYSFUNCTION">
<span<?php echo $ivf_stimulation_chart->SEXUAL_DYSFUNCTION->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->SEXUAL_DYSFUNCTION->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->TABLETS->Visible) { // TABLETS ?>
	<tr id="r_TABLETS">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_TABLETS"><script id="tpc_ivf_stimulation_chart_TABLETS" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->TABLETS->caption() ?></span></script></span></td>
		<td data-name="TABLETS"<?php echo $ivf_stimulation_chart->TABLETS->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_TABLETS" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_TABLETS">
<span<?php echo $ivf_stimulation_chart->TABLETS->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->TABLETS->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->FOLLICLE_STATUS->Visible) { // FOLLICLE_STATUS ?>
	<tr id="r_FOLLICLE_STATUS">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_FOLLICLE_STATUS"><script id="tpc_ivf_stimulation_chart_FOLLICLE_STATUS" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->FOLLICLE_STATUS->caption() ?></span></script></span></td>
		<td data-name="FOLLICLE_STATUS"<?php echo $ivf_stimulation_chart->FOLLICLE_STATUS->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_FOLLICLE_STATUS" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_FOLLICLE_STATUS">
<span<?php echo $ivf_stimulation_chart->FOLLICLE_STATUS->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->FOLLICLE_STATUS->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->NUMBER_OF_IUI->Visible) { // NUMBER_OF_IUI ?>
	<tr id="r_NUMBER_OF_IUI">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_NUMBER_OF_IUI"><script id="tpc_ivf_stimulation_chart_NUMBER_OF_IUI" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->NUMBER_OF_IUI->caption() ?></span></script></span></td>
		<td data-name="NUMBER_OF_IUI"<?php echo $ivf_stimulation_chart->NUMBER_OF_IUI->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_NUMBER_OF_IUI" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_NUMBER_OF_IUI">
<span<?php echo $ivf_stimulation_chart->NUMBER_OF_IUI->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->NUMBER_OF_IUI->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->PROCEDURE->Visible) { // PROCEDURE ?>
	<tr id="r_PROCEDURE">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_PROCEDURE"><script id="tpc_ivf_stimulation_chart_PROCEDURE" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->PROCEDURE->caption() ?></span></script></span></td>
		<td data-name="PROCEDURE"<?php echo $ivf_stimulation_chart->PROCEDURE->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_PROCEDURE" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_PROCEDURE">
<span<?php echo $ivf_stimulation_chart->PROCEDURE->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->PROCEDURE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->LUTEAL_SUPPORT->Visible) { // LUTEAL_SUPPORT ?>
	<tr id="r_LUTEAL_SUPPORT">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_LUTEAL_SUPPORT"><script id="tpc_ivf_stimulation_chart_LUTEAL_SUPPORT" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->LUTEAL_SUPPORT->caption() ?></span></script></span></td>
		<td data-name="LUTEAL_SUPPORT"<?php echo $ivf_stimulation_chart->LUTEAL_SUPPORT->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_LUTEAL_SUPPORT" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_LUTEAL_SUPPORT">
<span<?php echo $ivf_stimulation_chart->LUTEAL_SUPPORT->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->LUTEAL_SUPPORT->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->SPECIFIC_MATERNAL_PROBLEMS->Visible) { // SPECIFIC_MATERNAL_PROBLEMS ?>
	<tr id="r_SPECIFIC_MATERNAL_PROBLEMS">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS"><script id="tpc_ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->SPECIFIC_MATERNAL_PROBLEMS->caption() ?></span></script></span></td>
		<td data-name="SPECIFIC_MATERNAL_PROBLEMS"<?php echo $ivf_stimulation_chart->SPECIFIC_MATERNAL_PROBLEMS->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS">
<span<?php echo $ivf_stimulation_chart->SPECIFIC_MATERNAL_PROBLEMS->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->SPECIFIC_MATERNAL_PROBLEMS->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->ONGOING_PREG->Visible) { // ONGOING_PREG ?>
	<tr id="r_ONGOING_PREG">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ONGOING_PREG"><script id="tpc_ivf_stimulation_chart_ONGOING_PREG" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->ONGOING_PREG->caption() ?></span></script></span></td>
		<td data-name="ONGOING_PREG"<?php echo $ivf_stimulation_chart->ONGOING_PREG->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ONGOING_PREG" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_ONGOING_PREG">
<span<?php echo $ivf_stimulation_chart->ONGOING_PREG->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->ONGOING_PREG->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart->EDD_Date->Visible) { // EDD_Date ?>
	<tr id="r_EDD_Date">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EDD_Date"><script id="tpc_ivf_stimulation_chart_EDD_Date" class="ivf_stimulation_chartview" type="text/html"><span><?php echo $ivf_stimulation_chart->EDD_Date->caption() ?></span></script></span></td>
		<td data-name="EDD_Date"<?php echo $ivf_stimulation_chart->EDD_Date->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EDD_Date" class="ivf_stimulation_chartview" type="text/html">
<span id="el_ivf_stimulation_chart_EDD_Date">
<span<?php echo $ivf_stimulation_chart->EDD_Date->viewAttributes() ?>>
<?php echo $ivf_stimulation_chart->EDD_Date->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_ivf_stimulation_chartview" class="ew-custom-template"></div>
<script id="tpm_ivf_stimulation_chartview" type="text/html">
<div id="ct_ivf_stimulation_chart_view"><style>
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
.input-group {
	position: relative;
	display: flex;
	flex-wrap: inherit;
	align-items: stretch;
	width: 100%;
}
.ew-export-table td {
	padding: .0rem;
	border-bottom: 1px solid;
	border-top: 1px solid;
	border-left: 1px solid;
	border-right: 1px solid;
	border-color: #cfcfcf;
}
.card-bodyya {
	flex: 1 1 auto;
	padding: 0.25rem;
}
.card-bodyyaa {
	flex: 1 1 auto;
	padding: 0.25rem;
}
.table {
	width: auto;
	margin-bottom: 1rem;
	background-color: transparent;
}
.content-header {
	padding: 0px .0rem;
}
.container-fluid {
	width: 100%;
	padding-right: 0px;
	padding-left: 0px;
	margin-right: auto;
	margin-left: auto;
}
.mb-2, .progress-group, .my-2 {
	margin-bottom: .0rem !important;
}
.content-header h1 {
	font-size: 1.2rem;
	margin: 0;
}
.mb-3, .small-box, .card, .info-box, .callout, .my-3 {
	margin-bottom: 0.1rem !important;
}
.widget-user .widget-user-header {
	padding: 0.4rem;
	height: 70px;
	border-top-left-radius: .25rem;
	border-top-right-radius: .25rem;
}
.widget-user .widget-user-username {
	margin-top: 0;
	margin-bottom: 0px;
	font-size: 14px;
	font-weight: 300;
	text-shadow: 0 1px 1px rgb(0 0 0 / 20%);
}
h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
	margin-bottom: .05rem;
	font-family: inherit;
	font-weight: 500;
	line-height: 1.2;
	color: inherit;
}
.widget-user .widget-user-image {
	position: absolute;
	top: 1px;
	left: 90%;
	margin-left: -45px;
}
.widget-user .widget-user-image>img {
	width: 60px;
	height: auto;
	border: 3px solid #fff;
}
.description-block {
	display: block;
	margin: 0px 0;
	text-align: center;
}
.description-block>.description-header {
	margin: 0;
	padding: 0;
	font-weight: 400;
	font-size: 12px;
}
.card-header {
	position: relative;
	background-color: transparent;
	border-bottom: 1px solid #f4f4f4;
	border-top-left-radius: .025rem;
	border-top-right-radius: .025rem;
}
.card-body {
	flex: 1 1 auto;
	padding: 0.025rem;
}
.btn-app {
	border-radius: 3px;
	position: relative;
	padding: 0px 20px;
	margin: 0 0 0px 0px;
	min-width: 40px;
	height: 20px;
	text-align: center;
	color: #f1ecec;
	border: 1px solid #ddd;
	background-color: #28a745;
	font-size: 12px;
}
.card-header {
	padding: .075rem 0.025rem;
	margin-bottom: 0;
	background-color: rgba(17,17,17,0.03);
	border-bottom: 0 solid #f4f4f4;
}
.form-control {
	display: block;
	width: 100%;
	height: calc(1.7625rem + 2px);
	padding: .0375rem .075rem;
	font-size: .675rem;
	line-height: 1.5;
	color: #495057;
	background-color: #fff;
	background-clip: padding-box;
	border: 1px solid #ced4da;
	border-radius: .25rem;
	box-shadow: inset 0 0 0 rgb(17 17 17 / 0%);
	transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
.table {
	width: auto;
	margin-bottom: 0.1rem;
	background-color: transparent;
}
a:not([href]):not([tabindex]) {
	color: aliceblue;
	text-decoration: none;
}
.input-group>.form-control, .input-group>.custom-select, .input-group>.custom-file {
	position: relative;
	flex: inherit;
	width: 1%;
	margin-bottom: 0;
}
</style>
<?php
$cid = $_GET["fk_id"] ;
$IVFid = $_GET["fk_RIDNO"] ;
$dbhelper = &DbHelper();
$Tid = $_GET["fk_id"];//
$showmaster = $_GET["showmaster"] ;
if( $showmaster=="ivf_treatment_plan")
{
$sql = "SELECT * FROM ganeshkumar_bjhims.view_ivf_treatment where id='".$Tid."'; ";
$resultsA = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$resultsA[0]["RIDNO"]."'; ";
$results = $dbhelper->ExecuteRows($sql);
}else{
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$IVFid."'; ";
$results = $dbhelper->ExecuteRows($sql);
}
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Male"]."'; ";
$results1 = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Female"]."'; ";
$results2 = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_vitals_history where RIDNO='".$results[0]["id"]."'; ";
$resultsVitalHistory = $dbhelper->ExecuteRows($sql);
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
$pageHeader = 'Stimulation Chart For ' . $resultsA[0]["ARTCYCLE"];
?>	
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
<div class="row">
<?php echo $resultsVitalHistory[count($resultsVitalHistory)-1]["Chiefcomplaints"] ;?>
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
?>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title"><?php echo $pageHeader; ?></h3>
			</div>
			<div class="card-body">
<table class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_ARTCycle"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_ARTCycle"/}}</span>
				 </td>
				<td id="fieldProtocol">
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_Protocol"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_Protocol"/}}</span>
				</td>
				<td id="fieldGROWTHHORMONE">
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_GROWTHHORMONE"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_GROWTHHORMONE"/}}</span>
				</td>
					<td id="fieldSemenFrozen">
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_SemenFrozen"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_SemenFrozen"/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_TypeOfInfertility"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_TypeOfInfertility"/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_Duration"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_Duration"/}}</span>
				</td>
		 </tr>
		  <tr id="rowTypeOfInfertility">
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_TotalICSICycle"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_TotalICSICycle"/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_A4ICSICycle"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_A4ICSICycle"/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_IUICycles"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_IUICycles"/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_OvarianVolumeRT"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_OvarianVolumeRT"/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_RelevantHistory"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_RelevantHistory"/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_AFC"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_AFC"/}}</span>
				</td>
		 </tr>
		   <tr id="rowIUICycles">
		 </tr>
		  <tr id="rowMedicalFactors">
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_MedicalFactors"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_MedicalFactors"/}}</span>
				</td>
					<td>
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_OvarianSurgery"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_OvarianSurgery"/}}</span>
				</td>
					<td>
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_PRETREATMENT"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_PRETREATMENT"/}}</span>
				</td>	
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_AMH"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_AMH"/}}</span>
				</td>
				<td id="fieldINJTYPE">
					<span  class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_INJTYPE"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_INJTYPE"/}}</span>
				</td>
				<td id="fieldLMP">
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_LMP"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_LMP"/}}</span>
				</td>
		 </tr>
		  <tr>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_SCDate"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_SCDate"/}}</span>
				</td>
	<td id="fieldANTAGONISTSTARTDAY">
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_ANTAGONISTSTARTDAY"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_ANTAGONISTSTARTDAY"/}}</span>
				</td>
		 </tr>
		  <tr>
		 </tr> 
	</tbody>
</table>
</div>
<div class="card-body">
<table id="ETTableSt" class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_Consultant"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_Consultant"/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_InseminatinTechnique"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_InseminatinTechnique"/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_IndicationForART"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_IndicationForART"/}}</span>
				</td>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_Hysteroscopy"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_Hysteroscopy"/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_EndometrialScratching"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_EndometrialScratching"/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_TrialCannulation"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_TrialCannulation"/}}</span>
				</td>
		 </tr>
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_CYCLETYPE"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_CYCLETYPE"/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_HRTCYCLE"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_HRTCYCLE"/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_OralEstrogenDosage"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_OralEstrogenDosage"/}}</span>
				</td>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_VaginalEstrogen"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_VaginalEstrogen"/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_GCSF"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_GCSF"/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_ActivatedPRP"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_ActivatedPRP"/}}</span>
				</td>
		 </tr>
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_UCLcm"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_UCLcm"/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_DATOFEMBRYOTRANSFER"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_DATOFEMBRYOTRANSFER"/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_DAYOFEMBRYOTRANSFER"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_DAYOFEMBRYOTRANSFER"/}}</span>
				</td>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_NOOFEMBRYOSTHAWED"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_NOOFEMBRYOSTHAWED"/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED"/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_DAYOFEMBRYOS"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_DAYOFEMBRYOS"/}}</span>
				</td>
		 </tr>
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS"/}}</span>
				</td>
				<td>
					 <span class="ew-cell"></span>
				</td>
				<td>
					 <span class="ew-cell"></span>
				</td>
		 </tr>
	</tbody>
</table>
<table id="ETTableStIIUUII" class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_TUBAL_PATENCY"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_TUBAL_PATENCY"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_HSG"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_HSG"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_DHL"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_DHL"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_UTERINE_PROBLEMS"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_UTERINE_PROBLEMS"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_W_COMORBIDS"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_W_COMORBIDS"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_H_COMORBIDS"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_H_COMORBIDS"/}}</span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_SEXUAL_DYSFUNCTION"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_SEXUAL_DYSFUNCTION"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_TABLETS"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_TABLETS"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_FOLLICLE_STATUS"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_FOLLICLE_STATUS"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_PROCEDURE"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_PROCEDURE"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_LUTEAL_SUPPORT"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_LUTEAL_SUPPORT"/}}</span></td>
		  		<td></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_ONGOING_PREG"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_ONGOING_PREG"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_EDD_Date"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_EDD_Date"/}}</span></td>
		</tr>
	</tbody>
</table>
 <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<table   class="table table-striped ew-table ew-export-table" >
	<tbody>
		<tr>
		<td>
<div id="IUIivfcONVERTTER" class="row">
{{include tmpl="#tpc_ivf_stimulation_chart_Convert"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_Convert"/}}
</div>
</td>
<td>
<div id="AllFreezeVisible" class="row">
	{{include tmpl="#tpc_ivf_stimulation_chart_AllFreeze"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_AllFreeze"/}}
</div>
</td>
<td>
<div id="AllFreezeCancelReason" class="row">
	{{include tmpl="#tpc_ivf_stimulation_chart_TreatmentCancel"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_TreatmentCancel"/}}
</td>
<td>
	<div id='CancelReason' style="visibility: hidden" >
	{{include tmpl="#tpc_ivf_stimulation_chart_Reason"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_Reason"/}}
	</div>
</td>
<td>
<div id="ProjectronVisible" class="row">
	{{include tmpl="#tpc_ivf_stimulation_chart_Projectron"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_Projectron"/}}
</div>
</td>
<td>
<div id="ProgesteroneAdminTable"  class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Clinical Management</h3>
			</div>
			<div class="card-body"  style="overflow-x:auto;">
<table   class="table table-striped ew-table ew-export-table" style="width:40%;">
	<tbody>
		<tr><td>Detail Progesterone</td></tr>
		<tr><td><span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_ProgesteroneAdmin"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_ProgesteroneAdmin"/}}</span></td></tr>
	<tr><td><span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_ProgesteroneStart"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_ProgesteroneStart"/}}</span></td></tr>
		<tr><td><span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_ProgesteroneDose"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_ProgesteroneDose"/}}</span></td></tr>
			<tr><td></td></tr>
			<tr><td></td></tr>
			<tr><td></td></tr>
			<tr><td></td></tr>
			<tr><td></td></tr>
			<tr><td></td></tr>
			<tr><td></td></tr>
			<tr><td></td></tr>
		<tr><td><button type="button" onclick="ProgesteroneAccept()" class="btn btn-success">Accept</button>
<button type="button" onclick="ProgesteroneCancel()" class="btn btn-info">Cancel</button></td></tr>	
	</tbody>
</table>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
</td>
		</tr>
	</tbody>
</table>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title"></h3>
			</div>
			<div class="card-bodyya"  style="overflow-x:auto;">
<table id="tablechartadd"  class="table table-striped ew-table ew-export-table" >
	<thead>
		<tr>
				<td ><span class="ew-cell">Date</span></td>
				 <td ><span class="ew-cell">Cycle day</span></td>
				 <td id="tableStimulationday"><span class="ew-cell">Stimu day</span></td>
				<td id="tableTablet" ><span class="ew-cell">A/CC</span></td>
				 <td id="tableRFSH"><span class="ew-cell">R FSH</span></td>
				 <td id="tableHMG"><span class="ew-cell">HMG</span></td>
				<td><span class="ew-cell">GnRH</span></td>
				 <td id="tableE2"><span id="colE2" class="ew-cell">E2</span></td>
				 <td><span id="colP4" class="ew-cell">P4</span></td>
				<td><span id="colUSGRt" class="ew-cell">USG Rt</span></td>
				 <td ><span id="colUSGLt" class="ew-cell">USG Lt</span></td>
				 <td><span id="colET" class="ew-cell">ET</span></td>
				<td><span id="colOthers" class="ew-cell">Others</span></td>
				<td><span id="colDr" class="ew-cell">Dr</span></td>
		 </tr>
	</thead>
	<tbody>
		 <tr>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_StChDate1"/}}</td>
				 <td>{{include tmpl="#tpx_ivf_stimulation_chart_CycleDay1"/}}</td>
				 <td id="tableStimulationday1">{{include tmpl="#tpx_ivf_stimulation_chart_StimulationDay1"/}}</td>
				<td id="tableTablet1">{{include tmpl="#tpx_ivf_stimulation_chart_Tablet1"/}}</td>
				<td  id="tableRFSH1">{{include tmpl="#tpx_ivf_stimulation_chart_RFSH1"/}}</td>				 
				<td id="tableHMG1">{{include tmpl="#tpx_ivf_stimulation_chart_HMG1"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_GnRH1"/}}</td>
				<td id="tableE21">{{include tmpl="#tpx_ivf_stimulation_chart_E21"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_P41"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGRt1"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGLt1"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_EM1"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_Others1"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_DR1"/}}</td>
		 </tr>
		 	 <tr>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_StChDate2"/}}</td>
				 <td>{{include tmpl="#tpx_ivf_stimulation_chart_CycleDay2"/}}</td>
				 <td id="tableStimulationday2">{{include tmpl="#tpx_ivf_stimulation_chart_StimulationDay2"/}}</td>
				<td id="tableTablet2">{{include tmpl="#tpx_ivf_stimulation_chart_Tablet2"/}}</td>
				<td id="tableRFSH2">{{include tmpl="#tpx_ivf_stimulation_chart_RFSH2"/}}</td>				 
				<td id="tableHMG2">{{include tmpl="#tpx_ivf_stimulation_chart_HMG2"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_GnRH2"/}}</td>
				<td id="tableE22">{{include tmpl="#tpx_ivf_stimulation_chart_E22"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_P42"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGRt2"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGLt2"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_EM2"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_Others2"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_DR2"/}}</td>
		 </tr>
		 	 <tr>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_StChDate3"/}}</td>
				 <td>{{include tmpl="#tpx_ivf_stimulation_chart_CycleDay3"/}}</td>
				 <td id="tableStimulationday3">{{include tmpl="#tpx_ivf_stimulation_chart_StimulationDay3"/}}</td>
				<td id="tableTablet3">{{include tmpl="#tpx_ivf_stimulation_chart_Tablet3"/}}</td>
				<td id="tableRFSH3">{{include tmpl="#tpx_ivf_stimulation_chart_RFSH3"/}}</td>				 
				<td id="tableHMG3">{{include tmpl="#tpx_ivf_stimulation_chart_HMG3"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_GnRH3"/}}</td>
				<td id="tableE23">{{include tmpl="#tpx_ivf_stimulation_chart_E23"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_P43"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGRt3"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGLt3"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_EM3"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_Others3"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_DR3"/}}</td>
		 </tr>	
		 	 <tr>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_StChDate4"/}}</td>
				 <td>{{include tmpl="#tpx_ivf_stimulation_chart_CycleDay4"/}}</td>
				 <td id="tableStimulationday4">{{include tmpl="#tpx_ivf_stimulation_chart_StimulationDay4"/}}</td>
				<td id="tableTablet4">{{include tmpl="#tpx_ivf_stimulation_chart_Tablet4"/}}</td>
				<td id="tableRFSH4">{{include tmpl="#tpx_ivf_stimulation_chart_RFSH4"/}}</td>				 
				<td id="tableHMG4">{{include tmpl="#tpx_ivf_stimulation_chart_HMG4"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_GnRH4"/}}</td>
				<td id="tableE24">{{include tmpl="#tpx_ivf_stimulation_chart_E24"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_P44"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGRt4"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGLt4"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_EM4"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_Others4"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_DR4"/}}</td>
		 </tr>
	 <tr>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_StChDate5"/}}</td>
				 <td>{{include tmpl="#tpx_ivf_stimulation_chart_CycleDay5"/}}</td>
				 <td id="tableStimulationday5">{{include tmpl="#tpx_ivf_stimulation_chart_StimulationDay5"/}}</td>
				<td id="tableTablet5">{{include tmpl="#tpx_ivf_stimulation_chart_Tablet5"/}}</td>
				<td id="tableRFSH5">{{include tmpl="#tpx_ivf_stimulation_chart_RFSH5"/}}</td>				 
				<td id="tableHMG5">{{include tmpl="#tpx_ivf_stimulation_chart_HMG5"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_GnRH5"/}}</td>
				<td id="tableE25">{{include tmpl="#tpx_ivf_stimulation_chart_E25"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_P45"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGRt5"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGLt5"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_EM5"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_Others5"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_DR5"/}}</td>
		 </tr>	
		 	 <tr>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_StChDate6"/}}</td>
				 <td>{{include tmpl="#tpx_ivf_stimulation_chart_CycleDay6"/}}</td>
				 <td id="tableStimulationday6">{{include tmpl="#tpx_ivf_stimulation_chart_StimulationDay6"/}}</td>
				<td id="tableTablet6">{{include tmpl="#tpx_ivf_stimulation_chart_Tablet6"/}}</td>
				<td id="tableRFSH6">{{include tmpl="#tpx_ivf_stimulation_chart_RFSH6"/}}</td>				 
				<td id="tableHMG6">{{include tmpl="#tpx_ivf_stimulation_chart_HMG6"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_GnRH6"/}}</td>
				<td id="tableE26">{{include tmpl="#tpx_ivf_stimulation_chart_E26"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_P46"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGRt6"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGLt6"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_EM6"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_Others6"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_DR6"/}}</td>
		 </tr>
		 	 <tr>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_StChDate7"/}}</td>
				 <td>{{include tmpl="#tpx_ivf_stimulation_chart_CycleDay7"/}}</td>
				 <td id="tableStimulationday7">{{include tmpl="#tpx_ivf_stimulation_chart_StimulationDay7"/}}</td>
				<td id="tableTablet7">{{include tmpl="#tpx_ivf_stimulation_chart_Tablet7"/}}</td>
				<td id="tableRFSH7">{{include tmpl="#tpx_ivf_stimulation_chart_RFSH7"/}}</td>				 
				<td id="tableHMG7">{{include tmpl="#tpx_ivf_stimulation_chart_HMG7"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_GnRH7"/}}</td>
				<td id="tableE27">{{include tmpl="#tpx_ivf_stimulation_chart_E27"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_P47"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGRt7"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGLt7"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_EM7"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_Others7"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_DR7"/}}</td>
		 </tr>
	 <tr>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_StChDate8"/}}</td>
				 <td>{{include tmpl="#tpx_ivf_stimulation_chart_CycleDay8"/}}</td>
				 <td id="tableStimulationday8">{{include tmpl="#tpx_ivf_stimulation_chart_StimulationDay8"/}}</td>
				<td id="tableTablet8">{{include tmpl="#tpx_ivf_stimulation_chart_Tablet8"/}}</td>
				<td id="tableRFSH8">{{include tmpl="#tpx_ivf_stimulation_chart_RFSH8"/}}</td>				 
				<td id="tableHMG8">{{include tmpl="#tpx_ivf_stimulation_chart_HMG8"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_GnRH8"/}}</td>
				<td id="tableE28">{{include tmpl="#tpx_ivf_stimulation_chart_E28"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_P48"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGRt8"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGLt8"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_EM8"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_Others8"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_DR8"/}}</td>
		 </tr>	
		 	 <tr>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_StChDate9"/}}</td>
				 <td>{{include tmpl="#tpx_ivf_stimulation_chart_CycleDay9"/}}</td>
				 <td id="tableStimulationday9">{{include tmpl="#tpx_ivf_stimulation_chart_StimulationDay9"/}}</td>
				<td id="tableTablet9">{{include tmpl="#tpx_ivf_stimulation_chart_Tablet9"/}}</td>
				<td id="tableRFSH9">{{include tmpl="#tpx_ivf_stimulation_chart_RFSH9"/}}</td>				 
				<td id="tableHMG9">{{include tmpl="#tpx_ivf_stimulation_chart_HMG9"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_GnRH9"/}}</td>
				<td id="tableE29">{{include tmpl="#tpx_ivf_stimulation_chart_E29"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_P49"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGRt9"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGLt9"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_EM9"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_Others9"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_DR9"/}}</td>
		 </tr>
	 <tr>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_StChDate10"/}}</td>
				 <td>{{include tmpl="#tpx_ivf_stimulation_chart_CycleDay10"/}}</td>
				 <td id="tableStimulationday10">{{include tmpl="#tpx_ivf_stimulation_chart_StimulationDay10"/}}</td>
				<td id="tableTablet10">{{include tmpl="#tpx_ivf_stimulation_chart_Tablet10"/}}</td>
				<td id="tableRFSH10">{{include tmpl="#tpx_ivf_stimulation_chart_RFSH10"/}}</td>				 
				<td id="tableHMG10">{{include tmpl="#tpx_ivf_stimulation_chart_HMG10"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_GnRH10"/}}</td>
				<td id="tableE210">{{include tmpl="#tpx_ivf_stimulation_chart_E210"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_P410"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGRt10"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGLt10"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_EM10"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_Others10"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_DR10"/}}</td>
		 </tr>	
		 	 <tr>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_StChDate11"/}}</td>
				 <td>{{include tmpl="#tpx_ivf_stimulation_chart_CycleDay11"/}}</td>
				 <td id="tableStimulationday11">{{include tmpl="#tpx_ivf_stimulation_chart_StimulationDay11"/}}</td>
				<td id="tableTablet11">{{include tmpl="#tpx_ivf_stimulation_chart_Tablet11"/}}</td>
				<td id="tableRFSH11">{{include tmpl="#tpx_ivf_stimulation_chart_RFSH11"/}}</td>				 
				<td id="tableHMG11">{{include tmpl="#tpx_ivf_stimulation_chart_HMG11"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_GnRH11"/}}</td>
				<td id="tableE211">{{include tmpl="#tpx_ivf_stimulation_chart_E211"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_P411"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGRt11"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGLt11"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_EM11"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_Others11"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_DR11"/}}</td>
		 </tr>
		 	 <tr>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_StChDate12"/}}</td>
				 <td>{{include tmpl="#tpx_ivf_stimulation_chart_CycleDay12"/}}</td>
				 <td id="tableStimulationday12">{{include tmpl="#tpx_ivf_stimulation_chart_StimulationDay12"/}}</td>
				<td id="tableTablet12">{{include tmpl="#tpx_ivf_stimulation_chart_Tablet12"/}}</td>
				<td id="tableRFSH12">{{include tmpl="#tpx_ivf_stimulation_chart_RFSH12"/}}</td>				 
				<td id="tableHMG12">{{include tmpl="#tpx_ivf_stimulation_chart_HMG12"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_GnRH12"/}}</td>
				<td id="tableE212">{{include tmpl="#tpx_ivf_stimulation_chart_E212"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_P412"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGRt12"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGLt12"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_EM12"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_Others12"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_DR12"/}}</td>
		 </tr>
		 	 <tr>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_StChDate13"/}}</td>
				 <td>{{include tmpl="#tpx_ivf_stimulation_chart_CycleDay13"/}}</td>
				 <td id="tableStimulationday13">{{include tmpl="#tpx_ivf_stimulation_chart_StimulationDay13"/}}</td>
				<td id="tableTablet13">{{include tmpl="#tpx_ivf_stimulation_chart_Tablet13"/}}</td>
				<td id="tableRFSH13">{{include tmpl="#tpx_ivf_stimulation_chart_RFSH13"/}}</td>				 
				<td id="tableHMG13">{{include tmpl="#tpx_ivf_stimulation_chart_HMG13"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_GnRH13"/}}</td>
				<td id="tableE213">{{include tmpl="#tpx_ivf_stimulation_chart_E213"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_P413"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGRt13"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGLt13"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_EM13"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_Others13"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_DR13"/}}</td>
		 </tr>
		 <tr>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_StChDate14"/}}</td>
				 <td>{{include tmpl="#tpx_ivf_stimulation_chart_CycleDay14"/}}</td>
				 <td id="tableStimulationday14">{{include tmpl="#tpx_ivf_stimulation_chart_StimulationDay14"/}}</td>
				<td id="tableTablet14">{{include tmpl="#tpx_ivf_stimulation_chart_Tablet14"/}}</td>
				<td  id="tableRFSH14">{{include tmpl="#tpx_ivf_stimulation_chart_RFSH14"/}}</td>				 
				<td id="tableHMG14">{{include tmpl="#tpx_ivf_stimulation_chart_HMG14"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_GnRH14"/}}</td>
				<td id="tableE214">{{include tmpl="#tpx_ivf_stimulation_chart_E214"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_P414"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGRt14"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGLt14"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_EM14"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_Others14"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_DR14"/}}</td>
		 </tr>
		 <tr  id="trrow15" style="display: none;">
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_StChDate15"/}}</td>
				 <td>{{include tmpl="#tpx_ivf_stimulation_chart_CycleDay15"/}}</td>
				 <td id="tableStimulationday15">{{include tmpl="#tpx_ivf_stimulation_chart_StimulationDay15"/}}</td>
				<td id="tableTablet15">{{include tmpl="#tpx_ivf_stimulation_chart_Tablet15"/}}</td>
				<td  id="tableRFSH15">{{include tmpl="#tpx_ivf_stimulation_chart_RFSH15"/}}</td>				 
				<td id="tableHMG15">{{include tmpl="#tpx_ivf_stimulation_chart_HMG15"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_GnRH15"/}}</td>
				<td id="tableE215">{{include tmpl="#tpx_ivf_stimulation_chart_E215"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_P415"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGRt15"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGLt15"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_EM15"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_Others15"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_DR15"/}}</td>
		 </tr>
		 <tr id="trrow16" style="display: none;">
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_StChDate16"/}}</td>
				 <td>{{include tmpl="#tpx_ivf_stimulation_chart_CycleDay16"/}}</td>
				 <td id="tableStimulationday16">{{include tmpl="#tpx_ivf_stimulation_chart_StimulationDay16"/}}</td>
				<td id="tableTablet16">{{include tmpl="#tpx_ivf_stimulation_chart_Tablet16"/}}</td>
				<td  id="tableRFSH16">{{include tmpl="#tpx_ivf_stimulation_chart_RFSH16"/}}</td>				 
				<td id="tableHMG16">{{include tmpl="#tpx_ivf_stimulation_chart_HMG16"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_GnRH16"/}}</td>
				<td id="tableE216">{{include tmpl="#tpx_ivf_stimulation_chart_E216"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_P416"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGRt16"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGLt16"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_EM16"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_Others16"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_DR16"/}}</td>
		 </tr>
		 <tr id="trrow17" style="display: none;">
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_StChDate17"/}}</td>
				 <td>{{include tmpl="#tpx_ivf_stimulation_chart_CycleDay17"/}}</td>
				 <td id="tableStimulationday17">{{include tmpl="#tpx_ivf_stimulation_chart_StimulationDay17"/}}</td>
				<td id="tableTablet17">{{include tmpl="#tpx_ivf_stimulation_chart_Tablet17"/}}</td>
				<td  id="tableRFSH17">{{include tmpl="#tpx_ivf_stimulation_chart_RFSH17"/}}</td>				 
				<td id="tableHMG17">{{include tmpl="#tpx_ivf_stimulation_chart_HMG17"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_GnRH17"/}}</td>
				<td id="tableE217">{{include tmpl="#tpx_ivf_stimulation_chart_E217"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_P417"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGRt17"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGLt17"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_EM17"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_Others17"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_DR17"/}}</td>
		 </tr>
		 <tr id="trrow18" style="display: none;">
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_StChDate18"/}}</td>
				 <td>{{include tmpl="#tpx_ivf_stimulation_chart_CycleDay18"/}}</td>
				 <td id="tableStimulationday18">{{include tmpl="#tpx_ivf_stimulation_chart_StimulationDay18"/}}</td>
				<td id="tableTablet18">{{include tmpl="#tpx_ivf_stimulation_chart_Tablet18"/}}</td>
				<td  id="tableRFSH18">{{include tmpl="#tpx_ivf_stimulation_chart_RFSH18"/}}</td>				 
				<td id="tableHMG18">{{include tmpl="#tpx_ivf_stimulation_chart_HMG18"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_GnRH18"/}}</td>
				<td id="tableE218">{{include tmpl="#tpx_ivf_stimulation_chart_E218"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_P418"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGRt18"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGLt18"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_EM18"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_Others18"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_DR18"/}}</td>
		 </tr>
		 <tr id="trrow19" style="display: none;">
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_StChDate19"/}}</td>
				 <td>{{include tmpl="#tpx_ivf_stimulation_chart_CycleDay19"/}}</td>
				 <td id="tableStimulationday19">{{include tmpl="#tpx_ivf_stimulation_chart_StimulationDay19"/}}</td>
				<td id="tableTablet19">{{include tmpl="#tpx_ivf_stimulation_chart_Tablet19"/}}</td>
				<td  id="tableRFSH19">{{include tmpl="#tpx_ivf_stimulation_chart_RFSH19"/}}</td>				 
				<td id="tableHMG19">{{include tmpl="#tpx_ivf_stimulation_chart_HMG19"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_GnRH19"/}}</td>
				<td id="tableE219">{{include tmpl="#tpx_ivf_stimulation_chart_E219"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_P419"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGRt19"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGLt19"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_EM19"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_Others19"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_DR19"/}}</td>
		 </tr>
		 <tr id="trrow20" style="display: none;">
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_StChDate20"/}}</td>
				 <td>{{include tmpl="#tpx_ivf_stimulation_chart_CycleDay20"/}}</td>
				 <td id="tableStimulationday20">{{include tmpl="#tpx_ivf_stimulation_chart_StimulationDay20"/}}</td>
				<td id="tableTablet20">{{include tmpl="#tpx_ivf_stimulation_chart_Tablet20"/}}</td>
				<td  id="tableRFSH20">{{include tmpl="#tpx_ivf_stimulation_chart_RFSH20"/}}</td>				 
				<td id="tableHMG20">{{include tmpl="#tpx_ivf_stimulation_chart_HMG20"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_GnRH20"/}}</td>
				<td id="tableE220">{{include tmpl="#tpx_ivf_stimulation_chart_E220"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_P420"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGRt20"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGLt20"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_EM20"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_Others20"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_DR20"/}}</td>
		 </tr>
		 <tr id="trrow21" style="display: none;">
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_StChDate21"/}}</td>
				 <td>{{include tmpl="#tpx_ivf_stimulation_chart_CycleDay21"/}}</td>
				 <td id="tableStimulationday21">{{include tmpl="#tpx_ivf_stimulation_chart_StimulationDay21"/}}</td>
				<td id="tableTablet21">{{include tmpl="#tpx_ivf_stimulation_chart_Tablet21"/}}</td>
				<td  id="tableRFSH21">{{include tmpl="#tpx_ivf_stimulation_chart_RFSH21"/}}</td>				 
				<td id="tableHMG21">{{include tmpl="#tpx_ivf_stimulation_chart_HMG21"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_GnRH21"/}}</td>
				<td id="tableE221">{{include tmpl="#tpx_ivf_stimulation_chart_E221"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_P421"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGRt21"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGLt21"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_EM21"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_Others21"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_DR21"/}}</td>
		 </tr>
		 <tr id="trrow22" style="display: none;">
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_StChDate22"/}}</td>
				 <td>{{include tmpl="#tpx_ivf_stimulation_chart_CycleDay22"/}}</td>
				 <td id="tableStimulationday22">{{include tmpl="#tpx_ivf_stimulation_chart_StimulationDay22"/}}</td>
				<td id="tableTablet22">{{include tmpl="#tpx_ivf_stimulation_chart_Tablet22"/}}</td>
				<td  id="tableRFSH22">{{include tmpl="#tpx_ivf_stimulation_chart_RFSH22"/}}</td>				 
				<td id="tableHMG22">{{include tmpl="#tpx_ivf_stimulation_chart_HMG22"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_GnRH22"/}}</td>
				<td id="tableE222">{{include tmpl="#tpx_ivf_stimulation_chart_E222"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_P422"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGRt22"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGLt22"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_EM22"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_Others22"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_DR22"/}}</td>
		 </tr>
		 <tr id="trrow23" style="display: none;">
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_StChDate23"/}}</td>
				 <td>{{include tmpl="#tpx_ivf_stimulation_chart_CycleDay23"/}}</td>
				 <td id="tableStimulationday23">{{include tmpl="#tpx_ivf_stimulation_chart_StimulationDay23"/}}</td>
				<td id="tableTablet23">{{include tmpl="#tpx_ivf_stimulation_chart_Tablet23"/}}</td>
				<td  id="tableRFSH23">{{include tmpl="#tpx_ivf_stimulation_chart_RFSH23"/}}</td>				 
				<td id="tableHMG23">{{include tmpl="#tpx_ivf_stimulation_chart_HMG23"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_GnRH23"/}}</td>
				<td id="tableE223">{{include tmpl="#tpx_ivf_stimulation_chart_E223"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_P423"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGRt23"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGLt23"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_EM23"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_Others23"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_DR23"/}}</td>
		 </tr>
		 <tr id="trrow24" style="display: none;">
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_StChDate24"/}}</td>
				 <td>{{include tmpl="#tpx_ivf_stimulation_chart_CycleDay24"/}}</td>
				 <td id="tableStimulationday24">{{include tmpl="#tpx_ivf_stimulation_chart_StimulationDay24"/}}</td>
				<td id="tableTablet24">{{include tmpl="#tpx_ivf_stimulation_chart_Tablet24"/}}</td>
				<td  id="tableRFSH24">{{include tmpl="#tpx_ivf_stimulation_chart_RFSH24"/}}</td>				 
				<td id="tableHMG24">{{include tmpl="#tpx_ivf_stimulation_chart_HMG24"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_GnRH24"/}}</td>
				<td id="tableE224">{{include tmpl="#tpx_ivf_stimulation_chart_E224"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_P424"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGRt24"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGLt24"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_EM24"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_Others24"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_DR24"/}}</td>
		 </tr>
		 <tr  id="trrow25" style="display: none;" >
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_StChDate25"/}}</td>
				 <td>{{include tmpl="#tpx_ivf_stimulation_chart_CycleDay25"/}}</td>
				 <td id="tableStimulationday25">{{include tmpl="#tpx_ivf_stimulation_chart_StimulationDay25"/}}</td>
				<td id="tableTablet25">{{include tmpl="#tpx_ivf_stimulation_chart_Tablet25"/}}</td>
				<td  id="tableRFSH25">{{include tmpl="#tpx_ivf_stimulation_chart_RFSH25"/}}</td>				 
				<td id="tableHMG25">{{include tmpl="#tpx_ivf_stimulation_chart_HMG25"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_GnRH25"/}}</td>
				<td id="tableE225">{{include tmpl="#tpx_ivf_stimulation_chart_E225"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_P425"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGRt25"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_USGLt25"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_EM25"/}}</td>	
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_Others25"/}}</td>
				<td>{{include tmpl="#tpx_ivf_stimulation_chart_DR25"/}}</td>
		 </tr>
	</tbody>
</table>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<table class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<td><a class="btn btn-app" onclick="addrowsintable()"><i class="fas fa-plus"></i> Add</a></td>
				<td><span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_DAYSOFSTIMULATION"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_DAYSOFSTIMULATION"/}}</span></td>	
				<td><span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_DOSEOFGONADOTROPINS"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_DOSEOFGONADOTROPINS"/}}</span></td>
				<td><span  id="ANTAGONISTDAYSstum"  class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_ANTAGONISTDAYS"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_ANTAGONISTDAYS"/}}</span></td>
	   </tr>	
	</tbody>
</table>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Pre Procedure Order</h3>
			</div>
			<div class="card-body">
<table id="PreProcedureEEETTTDTE" class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_EEETTTDTE"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_EEETTTDTE"/}}</span>
				 </td>
				 <td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_bhcgdate"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_bhcgdate"/}}</span>
				</td>
				<td>
					<span class="ew-cell"></span>
				 </td>
				 <td>
					<span class="ew-cell"></span>
				</td>
		 </tr>
	</tbody>
</table>
<table id="PreProcedureOrderPPOOUU" class="ew-table" style="width:100%;">
	 <tbody>
		<tr id="RowPreProcedureOrder">
				<td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_PreProcedureOrder"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_PreProcedureOrder"/}}</span>
				 </td>
				 <td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_Expectedoocytes"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_Expectedoocytes"/}}</span>
				</td>
				<td>
					<span class="ew-cell"></span>
				 </td>
				 <td>
					<span class="ew-cell"></span>
				</td>
		 </tr>
		 <tr>
				 <td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_TRIGGERR"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_TRIGGERR"/}}</span>
				</td>
				<td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_TRIGGERDATE"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_TRIGGERDATE"/}}</span>
				 </td>
				 <td id="colATHOMEorCLINIC">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_ATHOMEorCLINIC"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_ATHOMEorCLINIC"/}}</span>
				 </td>
		 		 <td>
				 	<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_SEMENPREPARATION"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_SEMENPREPARATION"/}}</span>
				 </td>
				 <td>
					<span id="fieldOPUDATE" class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_OPUDATE"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_OPUDATE"/}}</span>
				 </td>
		 		 <td>
				 	<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_DOCTORRESPONSIBLE"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_DOCTORRESPONSIBLE"/}}</span>
				 </td>
		 </tr>
		 <tr id="RowALLFREEZEINDICATION"> 
				<td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_ALLFREEZEINDICATION"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_ALLFREEZEINDICATION"/}}</span>
				 </td>
				 <td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_ERA"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_ERA"/}}</span>
				 </td>
				 <td>
				 	<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_REASONFORESET"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_REASONFORESET"/}}</span>
				 </td>
				 <td>
					<span class="ew-cell"></span>
				 </td>
		 </tr>
  		  <tr id="RowDATEOFET">
				<td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_DATEOFET"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_DATEOFET"/}}</span>
				</td>
				 <td>
				 	<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_ET"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_ET"/}}</span>
				 </td>
				  <td>
				 	<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_ESET"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_ESET"/}}</span>
				 </td>
				 <td>
				 	<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_DOET"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_DOET"/}}</span>
				 </td>
				 <td id="colPGTA">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_PGTA"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_PGTA"/}}</span>
				 </td>
				 <td id="colPGD">
				 	<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_PGD"/}}&nbsp;{{include tmpl="#tpx_ivf_stimulation_chart_PGD"/}}</span>
				 </td>
		 </tr>
		 <tr>
		 </tr>
	</tbody>
</table>
 <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
</div>
</script>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($ivf_stimulation_chart->Rows) ?> };
ew.applyTemplate("tpd_ivf_stimulation_chartview", "tpm_ivf_stimulation_chartview", "ivf_stimulation_chartview", "<?php echo $ivf_stimulation_chart->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.ivf_stimulation_chartview_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$ivf_stimulation_chart_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$ivf_stimulation_chart->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

var mousedown;
var mouseup;
var keydownval;
var sorceEL;
var sourceROW;
var mouseUPEL;
var mouseUPROW;
document.addEventListener("keydown", function(event) {
  keydownval = event.which;
  console.log(event);
});
$('.text-muted').after('&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-app"  href="javascript:history.back()"><i class="fas fa-undo"></i> Back</a>');
$('#x_E21').mouseup(function(){
	mouseUPEL = "x_E21";
	mouseUPROW = 1;
	var selitem = document.getElementById("x_E2" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_E2" + i ).value = selitem;
		}
  	}
});
$('#x_E22').mouseup(function(){
	mouseUPEL = "x_E22";
	mouseUPROW = 2;
	var selitem = document.getElementById("x_E2" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_E2" + i ).value = selitem;
		}
  	}
});
$('#x_E23').mouseup(function(){
	mouseUPEL = "x_E23";
	mouseUPROW = 3;
	var selitem = document.getElementById("x_E2" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_E2" + i ).value = selitem;
		}
  	}
});
$('#x_E24').mouseup(function(){
	mouseUPEL = "x_E24";
	mouseUPROW = 4;
	var selitem = document.getElementById("x_E2" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_E2" + i ).value = selitem;
		}
  	}
});
$('#x_E25').mouseup(function(){
	mouseUPEL = "x_E25";
	mouseUPROW = 5;
	var selitem = document.getElementById("x_E2" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_E2" + i ).value = selitem;
		}
  	}
});
$('#x_E26').mouseup(function(){
	mouseUPEL = "x_E26";
	mouseUPROW = 6;
	var selitem = document.getElementById("x_E2" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_E2" + i ).value = selitem;
		}
  	}
});
$('#x_E27').mouseup(function(){
	mouseUPEL = "x_E27";
	mouseUPROW = 7;
	var selitem = document.getElementById("x_E2" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_E2" + i ).value = selitem;
		}
  	}
});
$('#x_E28').mouseup(function(){
	mouseUPEL = "x_E28";
	mouseUPROW = 8;
	var selitem = document.getElementById("x_E2" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_E2" + i ).value = selitem;
		}
  	}
});
$('#x_E29').mouseup(function(){
	mouseUPEL = "x_E29";
	mouseUPROW = 9;
	var selitem = document.getElementById("x_E2" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_E2" + i ).value = selitem;
		}
  	}
});
$('#x_E210').mouseup(function(){
	mouseUPEL = "x_E210";
	mouseUPROW = 10;
	var selitem = document.getElementById("x_E2" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_E2" + i ).value = selitem;
		}
  	}
});
$('#x_E211').mouseup(function(){
	mouseUPEL = "x_E211";
	mouseUPROW = 11;
	var selitem = document.getElementById("x_E2" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_E2" + i ).value = selitem;
		}
  	}
});
$('#x_E212').mouseup(function(){
	mouseUPEL = "x_E212";
	mouseUPROW = 12;
	var selitem = document.getElementById("x_E2" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_E2" + i ).value = selitem;
		}
  	}
});
$('#x_E213').mouseup(function(){
	mouseUPEL = "x_E213";
	mouseUPROW = 13;
	var selitem = document.getElementById("x_E2" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_E2" + i ).value = selitem;
		}
  	}
});
$('#x_E214').mouseup(function(){
	mouseUPEL = "x_E214";
	mouseUPROW = 14;
	var selitem = document.getElementById("x_E2" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_E2" + i ).value = selitem;
		}
  	}
});
$('#x_E215').mouseup(function(){
	mouseUPEL = "x_E215";
	mouseUPROW = 15;
	var selitem = document.getElementById("x_E2" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_E2" + i ).value = selitem;
		}
  	}
});
$('#x_E216').mouseup(function(){
	mouseUPEL = "x_E216";
	mouseUPROW = 16;
	var selitem = document.getElementById("x_E2" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_E2" + i ).value = selitem;
		}
  	}
});
$('#x_E217').mouseup(function(){
	mouseUPEL = "x_E217";
	mouseUPROW = 17;
	var selitem = document.getElementById("x_E2" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_E2" + i ).value = selitem;
		}
  	}
});
$('#x_E218').mouseup(function(){
	mouseUPEL = "x_E218";
	mouseUPROW = 18;
	var selitem = document.getElementById("x_E2" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_E2" + i ).value = selitem;
		}
  	}
});
$('#x_E219').mouseup(function(){
	mouseUPEL = "x_E219";
	mouseUPROW = 19;
	var selitem = document.getElementById("x_E2" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_E2" + i ).value = selitem;
		}
  	}
});
$('#x_E220').mouseup(function(){
	mouseUPEL = "x_E220";
	mouseUPROW = 20;
	var selitem = document.getElementById("x_E2" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_E2" + i ).value = selitem;
		}
  	}
});
$('#x_E221').mouseup(function(){
	mouseUPEL = "x_E221";
	mouseUPROW = 21;
	var selitem = document.getElementById("x_E2" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_E2" + i ).value = selitem;
		}
  	}
});
$('#x_E222').mouseup(function(){
	mouseUPEL = "x_E222";
	mouseUPROW = 22;
	var selitem = document.getElementById("x_E2" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_E2" + i ).value = selitem;
		}
  	}
});
$('#x_E223').mouseup(function(){
	mouseUPEL = "x_E223";
	mouseUPROW = 23;
	var selitem = document.getElementById("x_E2" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_E2" + i ).value = selitem;
		}
  	}
});
$('#x_E224').mouseup(function(){
	mouseUPEL = "x_E224";
	mouseUPROW = 24;
	var selitem = document.getElementById("x_E2" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_E2" + i ).value = selitem;
		}
  	}
});
$('#x_E225').mouseup(function(){
	mouseUPEL = "x_E225";
	mouseUPROW = 25;
	var selitem = document.getElementById("x_E2" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_E2" + i ).value = selitem;
		}
  	}
});
$('#x_E21').click(function(){
	sorceEL = "x_E21";
	sourceROW = 1;
});
$('#x_E22').click(function(){
	sorceEL = "x_E22";
	sourceROW = 2;
});
$('#x_E23').click(function(){
	sorceEL = "x_E23";
	sourceROW = 3;
});
$('#x_E24').click(function(){
	sorceEL = "x_E24";
	sourceROW = 4;
});
$('#x_E25').click(function(){
	sorceEL = "x_E25";
	sourceROW = 5;
});
$('#x_E26').click(function(){
	sorceEL = "x_E26";
	sourceROW = 6;
});
$('#x_E27').click(function(){
	sorceEL = "x_E27";
	sourceROW = 7;
});
$('#x_E28').click(function(){
	sorceEL = "x_E28";
	sourceROW = 8;
});
$('#x_E29').click(function(){
	sorceEL = "x_E29";
	sourceROW = 9;
});
$('#x_E210').click(function(){
	sorceEL = "x_E210";
	sourceROW = 10;
});
$('#x_E211').click(function(){
	sorceEL = "x_E211";
	sourceROW = 11;
});
$('#x_E212').click(function(){
	sorceEL = "x_E212";
	sourceROW = 12;
});
$('#x_E213').click(function(){
	sorceEL = "x_E213";
	sourceROW = 13;
});
$('#x_E214').click(function(){
	sorceEL = "x_E214";
	sourceROW = 14;
});
$('#x_E215').click(function(){
	sorceEL = "x_E215";
	sourceROW = 15;
});
$('#x_E216').click(function(){
	sorceEL = "x_E216";
	sourceROW = 16;
});
$('#x_E217').click(function(){
	sorceEL = "x_E217";
	sourceROW = 17;
});
$('#x_E218').click(function(){
	sorceEL = "x_E218";
	sourceROW = 18;
});
$('#x_E219').click(function(){
	sorceEL = "x_E219";
	sourceROW = 19;
});
$('#x_E220').click(function(){
	sorceEL = "x_E220";
	sourceROW = 20;
});
$('#x_E221').click(function(){
	sorceEL = "x_E221";
	sourceROW = 21;
});
$('#x_E222').click(function(){
	sorceEL = "x_E222";
	sourceROW = 22;
});
$('#x_E223').click(function(){
	sorceEL = "x_E223";
	sourceROW = 23;
});
$('#x_E224').click(function(){
	sorceEL = "x_E224";
	sourceROW = 24;
});
$('#x_E225').click(function(){
	sorceEL = "x_E225";
	sourceROW = 25;
});
$('#x_E21').mousedown(function(){
	sorceEL = "x_E21";
	sourceROW = 1;
});
$('#x_E22').mousedown(function(){
	sorceEL = "x_E22";
	sourceROW = 2;
});
$('#x_E23').mousedown(function(){
	sorceEL = "x_E23";
	sourceROW = 3;
});
$('#x_E24').mousedown(function(){
	sorceEL = "x_E24";
	sourceROW = 4;
});
$('#x_E25').mousedown(function(){
	sorceEL = "x_E25";
	sourceROW = 5;
});
$('#x_E26').mousedown(function(){
	sorceEL = "x_E26";
	sourceROW = 6;
});
$('#x_E27').mousedown(function(){
	sorceEL = "x_E27";
	sourceROW = 7;
});
$('#x_E28').mousedown(function(){
	sorceEL = "x_E28";
	sourceROW = 8;
});
$('#x_E29').mousedown(function(){
	sorceEL = "x_E29";
	sourceROW = 9;
});
$('#x_E210').mousedown(function(){
	sorceEL = "x_E210";
	sourceROW = 10;
});
$('#x_E211').mousedown(function(){
	sorceEL = "x_E211";
	sourceROW = 11;
});
$('#x_E212').mousedown(function(){
	sorceEL = "x_E212";
	sourceROW = 12;
});
$('#x_E213').mousedown(function(){
	sorceEL = "x_E213";
	sourceROW = 13;
});
$('#x_E214').mousedown(function(){
	sorceEL = "x_E214";
	sourceROW = 14;
});
$('#x_E215').mousedown(function(){
	sorceEL = "x_E215";
	sourceROW = 15;
});
$('#x_E216').mousedown(function(){
	sorceEL = "x_E216";
	sourceROW = 16;
});
$('#x_E217').mousedown(function(){
	sorceEL = "x_E217";
	sourceROW = 17;
});
$('#x_E218').mousedown(function(){
	sorceEL = "x_E218";
	sourceROW = 18;
});
$('#x_E219').mousedown(function(){
	sorceEL = "x_E219";
	sourceROW = 19;
});
$('#x_E220').mousedown(function(){
	sorceEL = "x_E220";
	sourceROW = 20;
});
$('#x_E221').mousedown(function(){
	sorceEL = "x_E221";
	sourceROW = 21;
});
$('#x_E222').mousedown(function(){
	sorceEL = "x_E222";
	sourceROW = 22;
});
$('#x_E223').mousedown(function(){
	sorceEL = "x_E223";
	sourceROW = 23;
});
$('#x_E224').mousedown(function(){
	sorceEL = "x_E224";
	sourceROW = 24;
});
$('#x_E225').mousedown(function(){
	sorceEL = "x_E225";
	sourceROW = 25;
});

//============================================================
$('#x_P41').mouseup(function(){
	mouseUPEL = "x_P41";
	mouseUPROW = 1;
	var selitem = document.getElementById("x_P4" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_P4" + i ).value = selitem;
		}
  	}
});
$('#x_P42').mouseup(function(){
	mouseUPEL = "x_P42";
	mouseUPROW = 2;
	var selitem = document.getElementById("x_P4" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_P4" + i ).value = selitem;
		}
  	}
});
$('#x_P43').mouseup(function(){
	mouseUPEL = "x_P43";
	mouseUPROW = 3;
	var selitem = document.getElementById("x_P4" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_P4" + i ).value = selitem;
		}
  	}
});
$('#x_P44').mouseup(function(){
	mouseUPEL = "x_P44";
	mouseUPROW = 4;
	var selitem = document.getElementById("x_P4" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_P4" + i ).value = selitem;
		}
  	}
});
$('#x_P45').mouseup(function(){
	mouseUPEL = "x_P45";
	mouseUPROW = 5;
	var selitem = document.getElementById("x_P4" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_P4" + i ).value = selitem;
		}
  	}
});
$('#x_P46').mouseup(function(){
	mouseUPEL = "x_P46";
	mouseUPROW = 6;
	var selitem = document.getElementById("x_P4" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_P4" + i ).value = selitem;
		}
  	}
});
$('#x_P47').mouseup(function(){
	mouseUPEL = "x_P47";
	mouseUPROW = 7;
	var selitem = document.getElementById("x_P4" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_P4" + i ).value = selitem;
		}
  	}
});
$('#x_P48').mouseup(function(){
	mouseUPEL = "x_P48";
	mouseUPROW = 8;
	var selitem = document.getElementById("x_P4" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_P4" + i ).value = selitem;
		}
  	}
});
$('#x_P49').mouseup(function(){
	mouseUPEL = "x_P49";
	mouseUPROW = 9;
	var selitem = document.getElementById("x_P4" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_P4" + i ).value = selitem;
		}
  	}
});
$('#x_P410').mouseup(function(){
	mouseUPEL = "x_P410";
	mouseUPROW = 10;
	var selitem = document.getElementById("x_P4" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_P4" + i ).value = selitem;
		}
  	}
});
$('#x_P411').mouseup(function(){
	mouseUPEL = "x_P411";
	mouseUPROW = 11;
	var selitem = document.getElementById("x_P4" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_P4" + i ).value = selitem;
		}
  	}
});
$('#x_P412').mouseup(function(){
	mouseUPEL = "x_P412";
	mouseUPROW = 12;
	var selitem = document.getElementById("x_P4" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_P4" + i ).value = selitem;
		}
  	}
});
$('#x_P413').mouseup(function(){
	mouseUPEL = "x_P413";
	mouseUPROW = 13;
	var selitem = document.getElementById("x_P4" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_P4" + i ).value = selitem;
		}
  	}
});
$('#x_P414').mouseup(function(){
	mouseUPEL = "x_P414";
	mouseUPROW = 14;
	var selitem = document.getElementById("x_P4" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_P4" + i ).value = selitem;
		}
  	}
});
$('#x_P415').mouseup(function(){
	mouseUPEL = "x_P415";
	mouseUPROW = 15;
	var selitem = document.getElementById("x_P4" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_P4" + i ).value = selitem;
		}
  	}
});
$('#x_P416').mouseup(function(){
	mouseUPEL = "x_P416";
	mouseUPROW = 16;
	var selitem = document.getElementById("x_P4" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_P4" + i ).value = selitem;
		}
  	}
});
$('#x_P417').mouseup(function(){
	mouseUPEL = "x_P417";
	mouseUPROW = 17;
	var selitem = document.getElementById("x_P4" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_P4" + i ).value = selitem;
		}
  	}
});
$('#x_P418').mouseup(function(){
	mouseUPEL = "x_P418";
	mouseUPROW = 18;
	var selitem = document.getElementById("x_P4" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_P4" + i ).value = selitem;
		}
  	}
});
$('#x_P419').mouseup(function(){
	mouseUPEL = "x_P419";
	mouseUPROW = 19;
	var selitem = document.getElementById("x_P4" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_P4" + i ).value = selitem;
		}
  	}
});
$('#x_P420').mouseup(function(){
	mouseUPEL = "x_P420";
	mouseUPROW = 20;
	var selitem = document.getElementById("x_P4" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_P4" + i ).value = selitem;
		}
  	}
});
$('#x_P421').mouseup(function(){
	mouseUPEL = "x_P421";
	mouseUPROW = 21;
	var selitem = document.getElementById("x_P4" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_P4" + i ).value = selitem;
		}
  	}
});
$('#x_P422').mouseup(function(){
	mouseUPEL = "x_P422";
	mouseUPROW = 22;
	var selitem = document.getElementById("x_P4" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_P4" + i ).value = selitem;
		}
  	}
});
$('#x_P423').mouseup(function(){
	mouseUPEL = "x_P423";
	mouseUPROW = 23;
	var selitem = document.getElementById("x_P4" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_P4" + i ).value = selitem;
		}
  	}
});
$('#x_P424').mouseup(function(){
	mouseUPEL = "x_P424";
	mouseUPROW = 24;
	var selitem = document.getElementById("x_P4" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_P4" + i ).value = selitem;
		}
  	}
});
$('#x_P425').mouseup(function(){
	mouseUPEL = "x_P425";
	mouseUPROW = 25;
	var selitem = document.getElementById("x_P4" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_P4" + i ).value = selitem;
		}
  	}
});
$('#x_P41').click(function(){
	sorceEL = "x_P41";
	sourceROW = 1;
});
$('#x_P42').click(function(){
	sorceEL = "x_P42";
	sourceROW = 2;
});
$('#x_P43').click(function(){
	sorceEL = "x_P43";
	sourceROW = 3;
});
$('#x_P44').click(function(){
	sorceEL = "x_P44";
	sourceROW = 4;
});
$('#x_P45').click(function(){
	sorceEL = "x_P45";
	sourceROW = 5;
});
$('#x_P46').click(function(){
	sorceEL = "x_P46";
	sourceROW = 6;
});
$('#x_P47').click(function(){
	sorceEL = "x_P47";
	sourceROW = 7;
});
$('#x_P48').click(function(){
	sorceEL = "x_P48";
	sourceROW = 8;
});
$('#x_P49').click(function(){
	sorceEL = "x_P49";
	sourceROW = 9;
});
$('#x_P410').click(function(){
	sorceEL = "x_P410";
	sourceROW = 10;
});
$('#x_P411').click(function(){
	sorceEL = "x_P411";
	sourceROW = 11;
});
$('#x_P412').click(function(){
	sorceEL = "x_P412";
	sourceROW = 12;
});
$('#x_P413').click(function(){
	sorceEL = "x_P413";
	sourceROW = 13;
});
$('#x_P414').click(function(){
	sorceEL = "x_P414";
	sourceROW = 14;
});
$('#x_P415').click(function(){
	sorceEL = "x_P415";
	sourceROW = 15;
});
$('#x_P416').click(function(){
	sorceEL = "x_P416";
	sourceROW = 16;
});
$('#x_P417').click(function(){
	sorceEL = "x_P417";
	sourceROW = 17;
});
$('#x_P418').click(function(){
	sorceEL = "x_P418";
	sourceROW = 18;
});
$('#x_P419').click(function(){
	sorceEL = "x_P419";
	sourceROW = 19;
});
$('#x_P420').click(function(){
	sorceEL = "x_P420";
	sourceROW = 20;
});
$('#x_P421').click(function(){
	sorceEL = "x_P421";
	sourceROW = 21;
});
$('#x_P422').click(function(){
	sorceEL = "x_P422";
	sourceROW = 22;
});
$('#x_P423').click(function(){
	sorceEL = "x_P423";
	sourceROW = 23;
});
$('#x_P424').click(function(){
	sorceEL = "x_P424";
	sourceROW = 24;
});
$('#x_P425').click(function(){
	sorceEL = "x_P425";
	sourceROW = 25;
});
$('#x_P41').mousedown(function(){
	sorceEL = "x_P41";
	sourceROW = 1;
});
$('#x_P42').mousedown(function(){
	sorceEL = "x_P42";
	sourceROW = 2;
});
$('#x_P43').mousedown(function(){
	sorceEL = "x_P43";
	sourceROW = 3;
});
$('#x_P44').mousedown(function(){
	sorceEL = "x_P44";
	sourceROW = 4;
});
$('#x_P45').mousedown(function(){
	sorceEL = "x_P45";
	sourceROW = 5;
});
$('#x_P46').mousedown(function(){
	sorceEL = "x_P46";
	sourceROW = 6;
});
$('#x_P47').mousedown(function(){
	sorceEL = "x_P47";
	sourceROW = 7;
});
$('#x_P48').mousedown(function(){
	sorceEL = "x_P48";
	sourceROW = 8;
});
$('#x_P49').mousedown(function(){
	sorceEL = "x_P49";
	sourceROW = 9;
});
$('#x_P410').mousedown(function(){
	sorceEL = "x_P410";
	sourceROW = 10;
});
$('#x_P411').mousedown(function(){
	sorceEL = "x_P411";
	sourceROW = 11;
});
$('#x_P412').mousedown(function(){
	sorceEL = "x_P412";
	sourceROW = 12;
});
$('#x_P413').mousedown(function(){
	sorceEL = "x_P413";
	sourceROW = 13;
});
$('#x_P414').mousedown(function(){
	sorceEL = "x_P414";
	sourceROW = 14;
});
$('#x_P415').mousedown(function(){
	sorceEL = "x_P415";
	sourceROW = 15;
});
$('#x_P416').mousedown(function(){
	sorceEL = "x_P416";
	sourceROW = 16;
});
$('#x_P417').mousedown(function(){
	sorceEL = "x_P417";
	sourceROW = 17;
});
$('#x_P418').mousedown(function(){
	sorceEL = "x_P418";
	sourceROW = 18;
});
$('#x_P419').mousedown(function(){
	sorceEL = "x_P419";
	sourceROW = 19;
});
$('#x_P420').mousedown(function(){
	sorceEL = "x_P420";
	sourceROW = 20;
});
$('#x_P421').mousedown(function(){
	sorceEL = "x_P421";
	sourceROW = 21;
});
$('#x_P422').mousedown(function(){
	sorceEL = "x_P422";
	sourceROW = 22;
});
$('#x_P423').mousedown(function(){
	sorceEL = "x_P423";
	sourceROW = 23;
});
$('#x_P424').mousedown(function(){
	sorceEL = "x_P424";
	sourceROW = 24;
});
$('#x_P425').mousedown(function(){
	sorceEL = "x_P425";
	sourceROW = 25;
});

//============================================================
$('#x_USGRt1').mouseup(function(){
	mouseUPEL = "x_USGRt1";
	mouseUPROW = 1;
	var selitem = document.getElementById("x_USGRt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGRt" + i ).value = selitem;
		}
  	}
});
$('#x_USGRt2').mouseup(function(){
	mouseUPEL = "x_USGRt2";
	mouseUPROW = 2;
	var selitem = document.getElementById("x_USGRt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGRt" + i ).value = selitem;
		}
  	}
});
$('#x_USGRt3').mouseup(function(){
	mouseUPEL = "x_USGRt3";
	mouseUPROW = 3;
	var selitem = document.getElementById("x_USGRt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGRt" + i ).value = selitem;
		}
  	}
});
$('#x_USGRt4').mouseup(function(){
	mouseUPEL = "x_USGRt4";
	mouseUPROW = 4;
	var selitem = document.getElementById("x_USGRt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGRt" + i ).value = selitem;
		}
  	}
});
$('#x_USGRt5').mouseup(function(){
	mouseUPEL = "x_USGRt5";
	mouseUPROW = 5;
	var selitem = document.getElementById("x_USGRt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGRt" + i ).value = selitem;
		}
  	}
});
$('#x_USGRt6').mouseup(function(){
	mouseUPEL = "x_USGRt6";
	mouseUPROW = 6;
	var selitem = document.getElementById("x_USGRt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGRt" + i ).value = selitem;
		}
  	}
});
$('#x_USGRt7').mouseup(function(){
	mouseUPEL = "x_USGRt7";
	mouseUPROW = 7;
	var selitem = document.getElementById("x_USGRt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGRt" + i ).value = selitem;
		}
  	}
});
$('#x_USGRt8').mouseup(function(){
	mouseUPEL = "x_USGRt8";
	mouseUPROW = 8;
	var selitem = document.getElementById("x_USGRt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGRt" + i ).value = selitem;
		}
  	}
});
$('#x_USGRt9').mouseup(function(){
	mouseUPEL = "x_USGRt9";
	mouseUPROW = 9;
	var selitem = document.getElementById("x_USGRt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGRt" + i ).value = selitem;
		}
  	}
});
$('#x_USGRt10').mouseup(function(){
	mouseUPEL = "x_USGRt10";
	mouseUPROW = 10;
	var selitem = document.getElementById("x_USGRt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGRt" + i ).value = selitem;
		}
  	}
});
$('#x_USGRt11').mouseup(function(){
	mouseUPEL = "x_USGRt11";
	mouseUPROW = 11;
	var selitem = document.getElementById("x_USGRt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGRt" + i ).value = selitem;
		}
  	}
});
$('#x_USGRt12').mouseup(function(){
	mouseUPEL = "x_USGRt12";
	mouseUPROW = 12;
	var selitem = document.getElementById("x_USGRt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGRt" + i ).value = selitem;
		}
  	}
});
$('#x_USGRt13').mouseup(function(){
	mouseUPEL = "x_USGRt13";
	mouseUPROW = 13;
	var selitem = document.getElementById("x_USGRt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGRt" + i ).value = selitem;
		}
  	}
});
$('#x_USGRt14').mouseup(function(){
	mouseUPEL = "x_USGRt14";
	mouseUPROW = 14;
	var selitem = document.getElementById("x_USGRt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGRt" + i ).value = selitem;
		}
  	}
});
$('#x_USGRt15').mouseup(function(){
	mouseUPEL = "x_USGRt15";
	mouseUPROW = 15;
	var selitem = document.getElementById("x_USGRt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGRt" + i ).value = selitem;
		}
  	}
});
$('#x_USGRt16').mouseup(function(){
	mouseUPEL = "x_USGRt16";
	mouseUPROW = 16;
	var selitem = document.getElementById("x_USGRt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGRt" + i ).value = selitem;
		}
  	}
});
$('#x_USGRt17').mouseup(function(){
	mouseUPEL = "x_USGRt17";
	mouseUPROW = 17;
	var selitem = document.getElementById("x_USGRt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGRt" + i ).value = selitem;
		}
  	}
});
$('#x_USGRt18').mouseup(function(){
	mouseUPEL = "x_USGRt18";
	mouseUPROW = 18;
	var selitem = document.getElementById("x_USGRt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGRt" + i ).value = selitem;
		}
  	}
});
$('#x_USGRt19').mouseup(function(){
	mouseUPEL = "x_USGRt19";
	mouseUPROW = 19;
	var selitem = document.getElementById("x_USGRt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGRt" + i ).value = selitem;
		}
  	}
});
$('#x_USGRt20').mouseup(function(){
	mouseUPEL = "x_USGRt20";
	mouseUPROW = 20;
	var selitem = document.getElementById("x_USGRt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGRt" + i ).value = selitem;
		}
  	}
});
$('#x_USGRt21').mouseup(function(){
	mouseUPEL = "x_USGRt21";
	mouseUPROW = 21;
	var selitem = document.getElementById("x_USGRt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGRt" + i ).value = selitem;
		}
  	}
});
$('#x_USGRt22').mouseup(function(){
	mouseUPEL = "x_USGRt22";
	mouseUPROW = 22;
	var selitem = document.getElementById("x_USGRt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGRt" + i ).value = selitem;
		}
  	}
});
$('#x_USGRt23').mouseup(function(){
	mouseUPEL = "x_USGRt23";
	mouseUPROW = 23;
	var selitem = document.getElementById("x_USGRt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGRt" + i ).value = selitem;
		}
  	}
});
$('#x_USGRt24').mouseup(function(){
	mouseUPEL = "x_USGRt24";
	mouseUPROW = 24;
	var selitem = document.getElementById("x_USGRt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGRt" + i ).value = selitem;
		}
  	}
});
$('#x_USGRt25').mouseup(function(){
	mouseUPEL = "x_USGRt25";
	mouseUPROW = 25;
	var selitem = document.getElementById("x_USGRt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGRt" + i ).value = selitem;
		}
  	}
});
$('#x_USGRt1').click(function(){
	sorceEL = "x_USGRt1";
	sourceROW = 1;
});
$('#x_USGRt2').click(function(){
	sorceEL = "x_USGRt2";
	sourceROW = 2;
});
$('#x_USGRt3').click(function(){
	sorceEL = "x_USGRt3";
	sourceROW = 3;
});
$('#x_USGRt4').click(function(){
	sorceEL = "x_USGRt4";
	sourceROW = 4;
});
$('#x_USGRt5').click(function(){
	sorceEL = "x_USGRt5";
	sourceROW = 5;
});
$('#x_USGRt6').click(function(){
	sorceEL = "x_USGRt6";
	sourceROW = 6;
});
$('#x_USGRt7').click(function(){
	sorceEL = "x_USGRt7";
	sourceROW = 7;
});
$('#x_USGRt8').click(function(){
	sorceEL = "x_USGRt8";
	sourceROW = 8;
});
$('#x_USGRt9').click(function(){
	sorceEL = "x_USGRt9";
	sourceROW = 9;
});
$('#x_USGRt10').click(function(){
	sorceEL = "x_USGRt10";
	sourceROW = 10;
});
$('#x_USGRt11').click(function(){
	sorceEL = "x_USGRt11";
	sourceROW = 11;
});
$('#x_USGRt12').click(function(){
	sorceEL = "x_USGRt12";
	sourceROW = 12;
});
$('#x_USGRt13').click(function(){
	sorceEL = "x_USGRt13";
	sourceROW = 13;
});
$('#x_USGRt14').click(function(){
	sorceEL = "x_USGRt14";
	sourceROW = 14;
});
$('#x_USGRt15').click(function(){
	sorceEL = "x_USGRt15";
	sourceROW = 15;
});
$('#x_USGRt16').click(function(){
	sorceEL = "x_USGRt16";
	sourceROW = 16;
});
$('#x_USGRt17').click(function(){
	sorceEL = "x_USGRt17";
	sourceROW = 17;
});
$('#x_USGRt18').click(function(){
	sorceEL = "x_USGRt18";
	sourceROW = 18;
});
$('#x_USGRt19').click(function(){
	sorceEL = "x_USGRt19";
	sourceROW = 19;
});
$('#x_USGRt20').click(function(){
	sorceEL = "x_USGRt20";
	sourceROW = 20;
});
$('#x_USGRt21').click(function(){
	sorceEL = "x_USGRt21";
	sourceROW = 21;
});
$('#x_USGRt22').click(function(){
	sorceEL = "x_USGRt22";
	sourceROW = 22;
});
$('#x_USGRt23').click(function(){
	sorceEL = "x_USGRt23";
	sourceROW = 23;
});
$('#x_USGRt24').click(function(){
	sorceEL = "x_USGRt24";
	sourceROW = 24;
});
$('#x_USGRt25').click(function(){
	sorceEL = "x_USGRt25";
	sourceROW = 25;
});
$('#x_USGRt1').mousedown(function(){
	sorceEL = "x_USGRt1";
	sourceROW = 1;
});
$('#x_USGRt2').mousedown(function(){
	sorceEL = "x_USGRt2";
	sourceROW = 2;
});
$('#x_USGRt3').mousedown(function(){
	sorceEL = "x_USGRt3";
	sourceROW = 3;
});
$('#x_USGRt4').mousedown(function(){
	sorceEL = "x_USGRt4";
	sourceROW = 4;
});
$('#x_USGRt5').mousedown(function(){
	sorceEL = "x_USGRt5";
	sourceROW = 5;
});
$('#x_USGRt6').mousedown(function(){
	sorceEL = "x_USGRt6";
	sourceROW = 6;
});
$('#x_USGRt7').mousedown(function(){
	sorceEL = "x_USGRt7";
	sourceROW = 7;
});
$('#x_USGRt8').mousedown(function(){
	sorceEL = "x_USGRt8";
	sourceROW = 8;
});
$('#x_USGRt9').mousedown(function(){
	sorceEL = "x_USGRt9";
	sourceROW = 9;
});
$('#x_USGRt10').mousedown(function(){
	sorceEL = "x_USGRt10";
	sourceROW = 10;
});
$('#x_USGRt11').mousedown(function(){
	sorceEL = "x_USGRt11";
	sourceROW = 11;
});
$('#x_USGRt12').mousedown(function(){
	sorceEL = "x_USGRt12";
	sourceROW = 12;
});
$('#x_USGRt13').mousedown(function(){
	sorceEL = "x_USGRt13";
	sourceROW = 13;
});
$('#x_USGRt14').mousedown(function(){
	sorceEL = "x_USGRt14";
	sourceROW = 14;
});
$('#x_USGRt15').mousedown(function(){
	sorceEL = "x_USGRt15";
	sourceROW = 15;
});
$('#x_USGRt16').mousedown(function(){
	sorceEL = "x_USGRt16";
	sourceROW = 16;
});
$('#x_USGRt17').mousedown(function(){
	sorceEL = "x_USGRt17";
	sourceROW = 17;
});
$('#x_USGRt18').mousedown(function(){
	sorceEL = "x_USGRt18";
	sourceROW = 18;
});
$('#x_USGRt19').mousedown(function(){
	sorceEL = "x_USGRt19";
	sourceROW = 19;
});
$('#x_USGRt20').mousedown(function(){
	sorceEL = "x_USGRt20";
	sourceROW = 20;
});
$('#x_USGRt21').mousedown(function(){
	sorceEL = "x_USGRt21";
	sourceROW = 21;
});
$('#x_USGRt22').mousedown(function(){
	sorceEL = "x_USGRt22";
	sourceROW = 22;
});
$('#x_USGRt23').mousedown(function(){
	sorceEL = "x_USGRt23";
	sourceROW = 23;
});
$('#x_USGRt24').mousedown(function(){
	sorceEL = "x_USGRt24";
	sourceROW = 24;
});
$('#x_USGRt25').mousedown(function(){
	sorceEL = "x_USGRt25";
	sourceROW = 25;
});

//===============================================================
$('#x_Tablet1').mouseup(function(){
	mouseUPEL = "x_Tablet1";
	mouseUPROW = 1;
	var selitem = document.getElementById("x_Tablet" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Tablet" + i ).value = selitem;
		}
  	}
});
$('#x_Tablet2').mouseup(function(){
	mouseUPEL = "x_Tablet2";
	mouseUPROW = 2;
	var selitem = document.getElementById("x_Tablet" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Tablet" + i ).value = selitem;
		}
  	}
});
$('#x_Tablet3').mouseup(function(){
	mouseUPEL = "x_Tablet3";
	mouseUPROW = 3;
	var selitem = document.getElementById("x_Tablet" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Tablet" + i ).value = selitem;
		}
  	}
});
$('#x_Tablet4').mouseup(function(){
	mouseUPEL = "x_Tablet4";
	mouseUPROW = 4;
	var selitem = document.getElementById("x_Tablet" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Tablet" + i ).value = selitem;
		}
  	}
});
$('#x_Tablet5').mouseup(function(){
	mouseUPEL = "x_Tablet5";
	mouseUPROW = 5;
	var selitem = document.getElementById("x_Tablet" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Tablet" + i ).value = selitem;
		}
  	}
});
$('#x_Tablet6').mouseup(function(){
	mouseUPEL = "x_Tablet6";
	mouseUPROW = 6;
	var selitem = document.getElementById("x_Tablet" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Tablet" + i ).value = selitem;
		}
  	}
});
$('#x_Tablet7').mouseup(function(){
	mouseUPEL = "x_Tablet7";
	mouseUPROW = 7;
	var selitem = document.getElementById("x_Tablet" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Tablet" + i ).value = selitem;
		}
  	}
});
$('#x_Tablet8').mouseup(function(){
	mouseUPEL = "x_Tablet8";
	mouseUPROW = 8;
	var selitem = document.getElementById("x_Tablet" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Tablet" + i ).value = selitem;
		}
  	}
});
$('#x_Tablet9').mouseup(function(){
	mouseUPEL = "x_Tablet9";
	mouseUPROW = 9;
	var selitem = document.getElementById("x_Tablet" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Tablet" + i ).value = selitem;
		}
  	}
});
$('#x_Tablet10').mouseup(function(){
	mouseUPEL = "x_Tablet10";
	mouseUPROW = 10;
	var selitem = document.getElementById("x_Tablet" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Tablet" + i ).value = selitem;
		}
  	}
});
$('#x_Tablet11').mouseup(function(){
	mouseUPEL = "x_Tablet11";
	mouseUPROW = 11;
	var selitem = document.getElementById("x_Tablet" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Tablet" + i ).value = selitem;
		}
  	}
});
$('#x_Tablet12').mouseup(function(){
	mouseUPEL = "x_Tablet12";
	mouseUPROW = 12;
	var selitem = document.getElementById("x_Tablet" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Tablet" + i ).value = selitem;
		}
  	}
});
$('#x_Tablet13').mouseup(function(){
	mouseUPEL = "x_Tablet13";
	mouseUPROW = 13;
	var selitem = document.getElementById("x_Tablet" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Tablet" + i ).value = selitem;
		}
  	}
});
$('#x_Tablet14').mouseup(function(){
	mouseUPEL = "x_Tablet14";
	mouseUPROW = 14;
	var selitem = document.getElementById("x_Tablet" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Tablet" + i ).value = selitem;
		}
  	}
});
$('#x_Tablet15').mouseup(function(){
	mouseUPEL = "x_Tablet15";
	mouseUPROW = 15;
	var selitem = document.getElementById("x_Tablet" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Tablet" + i ).value = selitem;
		}
  	}
});
$('#x_Tablet16').mouseup(function(){
	mouseUPEL = "x_Tablet16";
	mouseUPROW = 16;
	var selitem = document.getElementById("x_Tablet" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Tablet" + i ).value = selitem;
		}
  	}
});
$('#x_Tablet17').mouseup(function(){
	mouseUPEL = "x_Tablet17";
	mouseUPROW = 17;
	var selitem = document.getElementById("x_Tablet" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Tablet" + i ).value = selitem;
		}
  	}
});
$('#x_Tablet18').mouseup(function(){
	mouseUPEL = "x_Tablet18";
	mouseUPROW = 18;
	var selitem = document.getElementById("x_Tablet" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Tablet" + i ).value = selitem;
		}
  	}
});
$('#x_Tablet19').mouseup(function(){
	mouseUPEL = "x_Tablet19";
	mouseUPROW = 19;
	var selitem = document.getElementById("x_Tablet" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Tablet" + i ).value = selitem;
		}
  	}
});
$('#x_Tablet20').mouseup(function(){
	mouseUPEL = "x_Tablet20";
	mouseUPROW = 20;
	var selitem = document.getElementById("x_Tablet" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Tablet" + i ).value = selitem;
		}
  	}
});
$('#x_Tablet21').mouseup(function(){
	mouseUPEL = "x_Tablet21";
	mouseUPROW = 21;
	var selitem = document.getElementById("x_Tablet" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Tablet" + i ).value = selitem;
		}
  	}
});
$('#x_Tablet22').mouseup(function(){
	mouseUPEL = "x_Tablet22";
	mouseUPROW = 22;
	var selitem = document.getElementById("x_Tablet" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Tablet" + i ).value = selitem;
		}
  	}
});
$('#x_Tablet23').mouseup(function(){
	mouseUPEL = "x_Tablet23";
	mouseUPROW = 23;
	var selitem = document.getElementById("x_Tablet" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Tablet" + i ).value = selitem;
		}
  	}
});
$('#x_Tablet24').mouseup(function(){
	mouseUPEL = "x_Tablet24";
	mouseUPROW = 24;
	var selitem = document.getElementById("x_Tablet" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Tablet" + i ).value = selitem;
		}
  	}
});
$('#x_Tablet25').mouseup(function(){
	mouseUPEL = "x_Tablet25";
	mouseUPROW = 25;
	var selitem = document.getElementById("x_Tablet" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Tablet" + i ).value = selitem;
		}
  	}
});
$('#x_Tablet1').click(function(){
	sorceEL = "x_Tablet1";
	sourceROW = 1;
});
$('#x_Tablet2').click(function(){
	sorceEL = "x_Tablet2";
	sourceROW = 2;
});
$('#x_Tablet3').click(function(){
	sorceEL = "x_Tablet3";
	sourceROW = 3;
});
$('#x_Tablet4').click(function(){
	sorceEL = "x_Tablet4";
	sourceROW = 4;
});
$('#x_Tablet5').click(function(){
	sorceEL = "x_Tablet5";
	sourceROW = 5;
});
$('#x_Tablet6').click(function(){
	sorceEL = "x_Tablet6";
	sourceROW = 6;
});
$('#x_Tablet7').click(function(){
	sorceEL = "x_Tablet7";
	sourceROW = 7;
});
$('#x_Tablet8').click(function(){
	sorceEL = "x_Tablet8";
	sourceROW = 8;
});
$('#x_Tablet9').click(function(){
	sorceEL = "x_Tablet9";
	sourceROW = 9;
});
$('#x_Tablet10').click(function(){
	sorceEL = "x_Tablet10";
	sourceROW = 10;
});
$('#x_Tablet11').click(function(){
	sorceEL = "x_Tablet11";
	sourceROW = 11;
});
$('#x_Tablet12').click(function(){
	sorceEL = "x_Tablet12";
	sourceROW = 12;
});
$('#x_Tablet13').click(function(){
	sorceEL = "x_Tablet13";
	sourceROW = 13;
});
$('#x_Tablet14').click(function(){
	sorceEL = "x_Tablet14";
	sourceROW = 14;
});
$('#x_Tablet15').click(function(){
	sorceEL = "x_Tablet15";
	sourceROW = 15;
});
$('#x_Tablet16').click(function(){
	sorceEL = "x_Tablet16";
	sourceROW = 16;
});
$('#x_Tablet17').click(function(){
	sorceEL = "x_Tablet17";
	sourceROW = 17;
});
$('#x_Tablet18').click(function(){
	sorceEL = "x_Tablet18";
	sourceROW = 18;
});
$('#x_Tablet19').click(function(){
	sorceEL = "x_Tablet19";
	sourceROW = 19;
});
$('#x_Tablet20').click(function(){
	sorceEL = "x_Tablet20";
	sourceROW = 20;
});
$('#x_Tablet21').click(function(){
	sorceEL = "x_Tablet21";
	sourceROW = 21;
});
$('#x_Tablet22').click(function(){
	sorceEL = "x_Tablet22";
	sourceROW = 22;
});
$('#x_Tablet23').click(function(){
	sorceEL = "x_Tablet23";
	sourceROW = 23;
});
$('#x_Tablet24').click(function(){
	sorceEL = "x_Tablet24";
	sourceROW = 24;
});
$('#x_Tablet25').click(function(){
	sorceEL = "x_Tablet25";
	sourceROW = 25;
});
$('#x_Tablet1').mousedown(function(){
	sorceEL = "x_Tablet1";
	sourceROW = 1;
});
$('#x_Tablet2').mousedown(function(){
	sorceEL = "x_Tablet2";
	sourceROW = 2;
});
$('#x_Tablet3').mousedown(function(){
	sorceEL = "x_Tablet3";
	sourceROW = 3;
});
$('#x_Tablet4').mousedown(function(){
	sorceEL = "x_Tablet4";
	sourceROW = 4;
});
$('#x_Tablet5').mousedown(function(){
	sorceEL = "x_Tablet5";
	sourceROW = 5;
});
$('#x_Tablet6').mousedown(function(){
	sorceEL = "x_Tablet6";
	sourceROW = 6;
});
$('#x_Tablet7').mousedown(function(){
	sorceEL = "x_Tablet7";
	sourceROW = 7;
});
$('#x_Tablet8').mousedown(function(){
	sorceEL = "x_Tablet8";
	sourceROW = 8;
});
$('#x_Tablet9').mousedown(function(){
	sorceEL = "x_Tablet9";
	sourceROW = 9;
});
$('#x_Tablet10').mousedown(function(){
	sorceEL = "x_Tablet10";
	sourceROW = 10;
});
$('#x_Tablet11').mousedown(function(){
	sorceEL = "x_Tablet11";
	sourceROW = 11;
});
$('#x_Tablet12').mousedown(function(){
	sorceEL = "x_Tablet12";
	sourceROW = 12;
});
$('#x_Tablet13').mousedown(function(){
	sorceEL = "x_Tablet13";
	sourceROW = 13;
});
$('#x_Tablet14').mousedown(function(){
	sorceEL = "x_Tablet14";
	sourceROW = 14;
});
$('#x_Tablet15').mousedown(function(){
	sorceEL = "x_Tablet15";
	sourceROW = 15;
});
$('#x_Tablet16').mousedown(function(){
	sorceEL = "x_Tablet16";
	sourceROW = 16;
});
$('#x_Tablet17').mousedown(function(){
	sorceEL = "x_Tablet17";
	sourceROW = 17;
});
$('#x_Tablet18').mousedown(function(){
	sorceEL = "x_Tablet18";
	sourceROW = 18;
});
$('#x_Tablet19').mousedown(function(){
	sorceEL = "x_Tablet19";
	sourceROW = 19;
});
$('#x_Tablet20').mousedown(function(){
	sorceEL = "x_Tablet20";
	sourceROW = 20;
});
$('#x_Tablet21').mousedown(function(){
	sorceEL = "x_Tablet21";
	sourceROW = 21;
});
$('#x_Tablet22').mousedown(function(){
	sorceEL = "x_Tablet22";
	sourceROW = 22;
});
$('#x_Tablet23').mousedown(function(){
	sorceEL = "x_Tablet23";
	sourceROW = 23;
});
$('#x_Tablet24').mousedown(function(){
	sorceEL = "x_Tablet24";
	sourceROW = 24;
});
$('#x_Tablet25').mousedown(function(){
	sorceEL = "x_Tablet25";
	sourceROW = 25;
});

//==================================================================
//===================================================================
//================================================================
//==================================================================
//===============================================================

$('#x_USGLt1').mouseup(function(){
	mouseUPEL = "x_USGLt1";
	mouseUPROW = 1;
	var selitem = document.getElementById("x_USGLt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGLt" + i ).value = selitem;
		}
  	}
});
$('#x_USGLt2').mouseup(function(){
	mouseUPEL = "x_USGLt2";
	mouseUPROW = 2;
	var selitem = document.getElementById("x_USGLt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGLt" + i ).value = selitem;
		}
  	}
});
$('#x_USGLt3').mouseup(function(){
	mouseUPEL = "x_USGLt3";
	mouseUPROW = 3;
	var selitem = document.getElementById("x_USGLt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGLt" + i ).value = selitem;
		}
  	}
});
$('#x_USGLt4').mouseup(function(){
	mouseUPEL = "x_USGLt4";
	mouseUPROW = 4;
	var selitem = document.getElementById("x_USGLt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGLt" + i ).value = selitem;
		}
  	}
});
$('#x_USGLt5').mouseup(function(){
	mouseUPEL = "x_USGLt5";
	mouseUPROW = 5;
	var selitem = document.getElementById("x_USGLt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGLt" + i ).value = selitem;
		}
  	}
});
$('#x_USGLt6').mouseup(function(){
	mouseUPEL = "x_USGLt6";
	mouseUPROW = 6;
	var selitem = document.getElementById("x_USGLt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGLt" + i ).value = selitem;
		}
  	}
});
$('#x_USGLt7').mouseup(function(){
	mouseUPEL = "x_USGLt7";
	mouseUPROW = 7;
	var selitem = document.getElementById("x_USGLt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGLt" + i ).value = selitem;
		}
  	}
});
$('#x_USGLt8').mouseup(function(){
	mouseUPEL = "x_USGLt8";
	mouseUPROW = 8;
	var selitem = document.getElementById("x_USGLt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGLt" + i ).value = selitem;
		}
  	}
});
$('#x_USGLt9').mouseup(function(){
	mouseUPEL = "x_USGLt9";
	mouseUPROW = 9;
	var selitem = document.getElementById("x_USGLt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGLt" + i ).value = selitem;
		}
  	}
});
$('#x_USGLt10').mouseup(function(){
	mouseUPEL = "x_USGLt10";
	mouseUPROW = 10;
	var selitem = document.getElementById("x_USGLt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGLt" + i ).value = selitem;
		}
  	}
});
$('#x_USGLt11').mouseup(function(){
	mouseUPEL = "x_USGLt11";
	mouseUPROW = 11;
	var selitem = document.getElementById("x_USGLt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGLt" + i ).value = selitem;
		}
  	}
});
$('#x_USGLt12').mouseup(function(){
	mouseUPEL = "x_USGLt12";
	mouseUPROW = 12;
	var selitem = document.getElementById("x_USGLt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGLt" + i ).value = selitem;
		}
  	}
});
$('#x_USGLt13').mouseup(function(){
	mouseUPEL = "x_USGLt13";
	mouseUPROW = 13;
	var selitem = document.getElementById("x_USGLt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGLt" + i ).value = selitem;
		}
  	}
});
$('#x_USGLt14').mouseup(function(){
	mouseUPEL = "x_USGLt14";
	mouseUPROW = 14;
	var selitem = document.getElementById("x_USGLt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGLt" + i ).value = selitem;
		}
  	}
});
$('#x_USGLt15').mouseup(function(){
	mouseUPEL = "x_USGLt15";
	mouseUPROW = 15;
	var selitem = document.getElementById("x_USGLt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGLt" + i ).value = selitem;
		}
  	}
});
$('#x_USGLt16').mouseup(function(){
	mouseUPEL = "x_USGLt16";
	mouseUPROW = 16;
	var selitem = document.getElementById("x_USGLt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGLt" + i ).value = selitem;
		}
  	}
});
$('#x_USGLt17').mouseup(function(){
	mouseUPEL = "x_USGLt17";
	mouseUPROW = 17;
	var selitem = document.getElementById("x_USGLt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGLt" + i ).value = selitem;
		}
  	}
});
$('#x_USGLt18').mouseup(function(){
	mouseUPEL = "x_USGLt18";
	mouseUPROW = 18;
	var selitem = document.getElementById("x_USGLt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGLt" + i ).value = selitem;
		}
  	}
});
$('#x_USGLt19').mouseup(function(){
	mouseUPEL = "x_USGLt19";
	mouseUPROW = 19;
	var selitem = document.getElementById("x_USGLt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGLt" + i ).value = selitem;
		}
  	}
});
$('#x_USGLt20').mouseup(function(){
	mouseUPEL = "x_USGLt20";
	mouseUPROW = 20;
	var selitem = document.getElementById("x_USGLt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGLt" + i ).value = selitem;
		}
  	}
});
$('#x_USGLt21').mouseup(function(){
	mouseUPEL = "x_USGLt21";
	mouseUPROW = 21;
	var selitem = document.getElementById("x_USGLt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGLt" + i ).value = selitem;
		}
  	}
});
$('#x_USGLt22').mouseup(function(){
	mouseUPEL = "x_USGLt22";
	mouseUPROW = 22;
	var selitem = document.getElementById("x_USGLt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGLt" + i ).value = selitem;
		}
  	}
});
$('#x_USGLt23').mouseup(function(){
	mouseUPEL = "x_USGLt23";
	mouseUPROW = 23;
	var selitem = document.getElementById("x_USGLt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGLt" + i ).value = selitem;
		}
  	}
});
$('#x_USGLt24').mouseup(function(){
	mouseUPEL = "x_USGLt24";
	mouseUPROW = 24;
	var selitem = document.getElementById("x_USGLt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGLt" + i ).value = selitem;
		}
  	}
});
$('#x_USGLt25').mouseup(function(){
	mouseUPEL = "x_USGLt25";
	mouseUPROW = 25;
	var selitem = document.getElementById("x_USGLt" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_USGLt" + i ).value = selitem;
		}
  	}
});
$('#x_USGLt1').click(function(){
	sorceEL = "x_USGLt1";
	sourceROW = 1;
});
$('#x_USGLt2').click(function(){
	sorceEL = "x_USGLt2";
	sourceROW = 2;
});
$('#x_USGLt3').click(function(){
	sorceEL = "x_USGLt3";
	sourceROW = 3;
});
$('#x_USGLt4').click(function(){
	sorceEL = "x_USGLt4";
	sourceROW = 4;
});
$('#x_USGLt5').click(function(){
	sorceEL = "x_USGLt5";
	sourceROW = 5;
});
$('#x_USGLt6').click(function(){
	sorceEL = "x_USGLt6";
	sourceROW = 6;
});
$('#x_USGLt7').click(function(){
	sorceEL = "x_USGLt7";
	sourceROW = 7;
});
$('#x_USGLt8').click(function(){
	sorceEL = "x_USGLt8";
	sourceROW = 8;
});
$('#x_USGLt9').click(function(){
	sorceEL = "x_USGLt9";
	sourceROW = 9;
});
$('#x_USGLt10').click(function(){
	sorceEL = "x_USGLt10";
	sourceROW = 10;
});
$('#x_USGLt11').click(function(){
	sorceEL = "x_USGLt11";
	sourceROW = 11;
});
$('#x_USGLt12').click(function(){
	sorceEL = "x_USGLt12";
	sourceROW = 12;
});
$('#x_USGLt13').click(function(){
	sorceEL = "x_USGLt13";
	sourceROW = 13;
});
$('#x_USGLt14').click(function(){
	sorceEL = "x_USGLt14";
	sourceROW = 14;
});
$('#x_USGLt15').click(function(){
	sorceEL = "x_USGLt15";
	sourceROW = 15;
});
$('#x_USGLt16').click(function(){
	sorceEL = "x_USGLt16";
	sourceROW = 16;
});
$('#x_USGLt17').click(function(){
	sorceEL = "x_USGLt17";
	sourceROW = 17;
});
$('#x_USGLt18').click(function(){
	sorceEL = "x_USGLt18";
	sourceROW = 18;
});
$('#x_USGLt19').click(function(){
	sorceEL = "x_USGLt19";
	sourceROW = 19;
});
$('#x_USGLt20').click(function(){
	sorceEL = "x_USGLt20";
	sourceROW = 20;
});
$('#x_USGLt21').click(function(){
	sorceEL = "x_USGLt21";
	sourceROW = 21;
});
$('#x_USGLt22').click(function(){
	sorceEL = "x_USGLt22";
	sourceROW = 22;
});
$('#x_USGLt23').click(function(){
	sorceEL = "x_USGLt23";
	sourceROW = 23;
});
$('#x_USGLt24').click(function(){
	sorceEL = "x_USGLt24";
	sourceROW = 24;
});
$('#x_USGLt25').click(function(){
	sorceEL = "x_USGLt25";
	sourceROW = 25;
});
$('#x_USGLt1').mousedown(function(){
	sorceEL = "x_USGLt1";
	sourceROW = 1;
});
$('#x_USGLt2').mousedown(function(){
	sorceEL = "x_USGLt2";
	sourceROW = 2;
});
$('#x_USGLt3').mousedown(function(){
	sorceEL = "x_USGLt3";
	sourceROW = 3;
});
$('#x_USGLt4').mousedown(function(){
	sorceEL = "x_USGLt4";
	sourceROW = 4;
});
$('#x_USGLt5').mousedown(function(){
	sorceEL = "x_USGLt5";
	sourceROW = 5;
});
$('#x_USGLt6').mousedown(function(){
	sorceEL = "x_USGLt6";
	sourceROW = 6;
});
$('#x_USGLt7').mousedown(function(){
	sorceEL = "x_USGLt7";
	sourceROW = 7;
});
$('#x_USGLt8').mousedown(function(){
	sorceEL = "x_USGLt8";
	sourceROW = 8;
});
$('#x_USGLt9').mousedown(function(){
	sorceEL = "x_USGLt9";
	sourceROW = 9;
});
$('#x_USGLt10').mousedown(function(){
	sorceEL = "x_USGLt10";
	sourceROW = 10;
});
$('#x_USGLt11').mousedown(function(){
	sorceEL = "x_USGLt11";
	sourceROW = 11;
});
$('#x_USGLt12').mousedown(function(){
	sorceEL = "x_USGLt12";
	sourceROW = 12;
});
$('#x_USGLt13').mousedown(function(){
	sorceEL = "x_USGLt13";
	sourceROW = 13;
});
$('#x_USGLt14').mousedown(function(){
	sorceEL = "x_USGLt14";
	sourceROW = 14;
});
$('#x_USGLt15').mousedown(function(){
	sorceEL = "x_USGLt15";
	sourceROW = 15;
});
$('#x_USGLt16').mousedown(function(){
	sorceEL = "x_USGLt16";
	sourceROW = 16;
});
$('#x_USGLt17').mousedown(function(){
	sorceEL = "x_USGLt17";
	sourceROW = 17;
});
$('#x_USGLt18').mousedown(function(){
	sorceEL = "x_USGLt18";
	sourceROW = 18;
});
$('#x_USGLt19').mousedown(function(){
	sorceEL = "x_USGLt19";
	sourceROW = 19;
});
$('#x_USGLt20').mousedown(function(){
	sorceEL = "x_USGLt20";
	sourceROW = 20;
});
$('#x_USGLt21').mousedown(function(){
	sorceEL = "x_USGLt21";
	sourceROW = 21;
});
$('#x_USGLt22').mousedown(function(){
	sorceEL = "x_USGLt22";
	sourceROW = 22;
});
$('#x_USGLt23').mousedown(function(){
	sorceEL = "x_USGLt23";
	sourceROW = 23;
});
$('#x_USGLt24').mousedown(function(){
	sorceEL = "x_USGLt24";
	sourceROW = 24;
});
$('#x_USGLt25').mousedown(function(){
	sorceEL = "x_USGLt25";
	sourceROW = 25;
});

//============================================================
$('#x_EM1').mouseup(function(){
	mouseUPEL = "x_EM1";
	mouseUPROW = 1;
	var selitem = document.getElementById("x_EM" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_EM" + i ).value = selitem;
		}
  	}
});
$('#x_EM2').mouseup(function(){
	mouseUPEL = "x_EM2";
	mouseUPROW = 2;
	var selitem = document.getElementById("x_EM" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_EM" + i ).value = selitem;
		}
  	}
});
$('#x_EM3').mouseup(function(){
	mouseUPEL = "x_EM3";
	mouseUPROW = 3;
	var selitem = document.getElementById("x_EM" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_EM" + i ).value = selitem;
		}
  	}
});
$('#x_EM4').mouseup(function(){
	mouseUPEL = "x_EM4";
	mouseUPROW = 4;
	var selitem = document.getElementById("x_EM" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_EM" + i ).value = selitem;
		}
  	}
});
$('#x_EM5').mouseup(function(){
	mouseUPEL = "x_EM5";
	mouseUPROW = 5;
	var selitem = document.getElementById("x_EM" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_EM" + i ).value = selitem;
		}
  	}
});
$('#x_EM6').mouseup(function(){
	mouseUPEL = "x_EM6";
	mouseUPROW = 6;
	var selitem = document.getElementById("x_EM" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_EM" + i ).value = selitem;
		}
  	}
});
$('#x_EM7').mouseup(function(){
	mouseUPEL = "x_EM7";
	mouseUPROW = 7;
	var selitem = document.getElementById("x_EM" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_EM" + i ).value = selitem;
		}
  	}
});
$('#x_EM8').mouseup(function(){
	mouseUPEL = "x_EM8";
	mouseUPROW = 8;
	var selitem = document.getElementById("x_EM" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_EM" + i ).value = selitem;
		}
  	}
});
$('#x_EM9').mouseup(function(){
	mouseUPEL = "x_EM9";
	mouseUPROW = 9;
	var selitem = document.getElementById("x_EM" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_EM" + i ).value = selitem;
		}
  	}
});
$('#x_EM10').mouseup(function(){
	mouseUPEL = "x_EM10";
	mouseUPROW = 10;
	var selitem = document.getElementById("x_EM" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_EM" + i ).value = selitem;
		}
  	}
});
$('#x_EM11').mouseup(function(){
	mouseUPEL = "x_EM11";
	mouseUPROW = 11;
	var selitem = document.getElementById("x_EM" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_EM" + i ).value = selitem;
		}
  	}
});
$('#x_EM12').mouseup(function(){
	mouseUPEL = "x_EM12";
	mouseUPROW = 12;
	var selitem = document.getElementById("x_EM" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_EM" + i ).value = selitem;
		}
  	}
});
$('#x_EM13').mouseup(function(){
	mouseUPEL = "x_EM13";
	mouseUPROW = 13;
	var selitem = document.getElementById("x_EM" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_EM" + i ).value = selitem;
		}
  	}
});
$('#x_EM14').mouseup(function(){
	mouseUPEL = "x_EM14";
	mouseUPROW = 14;
	var selitem = document.getElementById("x_EM" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_EM" + i ).value = selitem;
		}
  	}
});
$('#x_EM15').mouseup(function(){
	mouseUPEL = "x_EM15";
	mouseUPROW = 15;
	var selitem = document.getElementById("x_EM" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_EM" + i ).value = selitem;
		}
  	}
});
$('#x_EM16').mouseup(function(){
	mouseUPEL = "x_EM16";
	mouseUPROW = 16;
	var selitem = document.getElementById("x_EM" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_EM" + i ).value = selitem;
		}
  	}
});
$('#x_EM17').mouseup(function(){
	mouseUPEL = "x_EM17";
	mouseUPROW = 17;
	var selitem = document.getElementById("x_EM" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_EM" + i ).value = selitem;
		}
  	}
});
$('#x_EM18').mouseup(function(){
	mouseUPEL = "x_EM18";
	mouseUPROW = 18;
	var selitem = document.getElementById("x_EM" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_EM" + i ).value = selitem;
		}
  	}
});
$('#x_EM19').mouseup(function(){
	mouseUPEL = "x_EM19";
	mouseUPROW = 19;
	var selitem = document.getElementById("x_EM" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_EM" + i ).value = selitem;
		}
  	}
});
$('#x_EM20').mouseup(function(){
	mouseUPEL = "x_EM20";
	mouseUPROW = 20;
	var selitem = document.getElementById("x_EM" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_EM" + i ).value = selitem;
		}
  	}
});
$('#x_EM21').mouseup(function(){
	mouseUPEL = "x_EM21";
	mouseUPROW = 21;
	var selitem = document.getElementById("x_EM" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_EM" + i ).value = selitem;
		}
  	}
});
$('#x_EM22').mouseup(function(){
	mouseUPEL = "x_EM22";
	mouseUPROW = 22;
	var selitem = document.getElementById("x_EM" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_EM" + i ).value = selitem;
		}
  	}
});
$('#x_EM23').mouseup(function(){
	mouseUPEL = "x_EM23";
	mouseUPROW = 23;
	var selitem = document.getElementById("x_EM" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_EM" + i ).value = selitem;
		}
  	}
});
$('#x_EM24').mouseup(function(){
	mouseUPEL = "x_EM24";
	mouseUPROW = 24;
	var selitem = document.getElementById("x_EM" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_EM" + i ).value = selitem;
		}
  	}
});
$('#x_EM25').mouseup(function(){
	mouseUPEL = "x_EM25";
	mouseUPROW = 25;
	var selitem = document.getElementById("x_EM" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_EM" + i ).value = selitem;
		}
  	}
});
$('#x_EM1').click(function(){
	sorceEL = "x_EM1";
	sourceROW = 1;
});
$('#x_EM2').click(function(){
	sorceEL = "x_EM2";
	sourceROW = 2;
});
$('#x_EM3').click(function(){
	sorceEL = "x_EM3";
	sourceROW = 3;
});
$('#x_EM4').click(function(){
	sorceEL = "x_EM4";
	sourceROW = 4;
});
$('#x_EM5').click(function(){
	sorceEL = "x_EM5";
	sourceROW = 5;
});
$('#x_EM6').click(function(){
	sorceEL = "x_EM6";
	sourceROW = 6;
});
$('#x_EM7').click(function(){
	sorceEL = "x_EM7";
	sourceROW = 7;
});
$('#x_EM8').click(function(){
	sorceEL = "x_EM8";
	sourceROW = 8;
});
$('#x_EM9').click(function(){
	sorceEL = "x_EM9";
	sourceROW = 9;
});
$('#x_EM10').click(function(){
	sorceEL = "x_EM10";
	sourceROW = 10;
});
$('#x_EM11').click(function(){
	sorceEL = "x_EM11";
	sourceROW = 11;
});
$('#x_EM12').click(function(){
	sorceEL = "x_EM12";
	sourceROW = 12;
});
$('#x_EM13').click(function(){
	sorceEL = "x_EM13";
	sourceROW = 13;
});
$('#x_EM14').click(function(){
	sorceEL = "x_EM14";
	sourceROW = 14;
});
$('#x_EM15').click(function(){
	sorceEL = "x_EM15";
	sourceROW = 15;
});
$('#x_EM16').click(function(){
	sorceEL = "x_EM16";
	sourceROW = 16;
});
$('#x_EM17').click(function(){
	sorceEL = "x_EM17";
	sourceROW = 17;
});
$('#x_EM18').click(function(){
	sorceEL = "x_EM18";
	sourceROW = 18;
});
$('#x_EM19').click(function(){
	sorceEL = "x_EM19";
	sourceROW = 19;
});
$('#x_EM20').click(function(){
	sorceEL = "x_EM20";
	sourceROW = 20;
});
$('#x_EM21').click(function(){
	sorceEL = "x_EM21";
	sourceROW = 21;
});
$('#x_EM22').click(function(){
	sorceEL = "x_EM22";
	sourceROW = 22;
});
$('#x_EM23').click(function(){
	sorceEL = "x_EM23";
	sourceROW = 23;
});
$('#x_EM24').click(function(){
	sorceEL = "x_EM24";
	sourceROW = 24;
});
$('#x_EM25').click(function(){
	sorceEL = "x_EM25";
	sourceROW = 25;
});
$('#x_EM1').mousedown(function(){
	sorceEL = "x_EM1";
	sourceROW = 1;
});
$('#x_EM2').mousedown(function(){
	sorceEL = "x_EM2";
	sourceROW = 2;
});
$('#x_EM3').mousedown(function(){
	sorceEL = "x_EM3";
	sourceROW = 3;
});
$('#x_EM4').mousedown(function(){
	sorceEL = "x_EM4";
	sourceROW = 4;
});
$('#x_EM5').mousedown(function(){
	sorceEL = "x_EM5";
	sourceROW = 5;
});
$('#x_EM6').mousedown(function(){
	sorceEL = "x_EM6";
	sourceROW = 6;
});
$('#x_EM7').mousedown(function(){
	sorceEL = "x_EM7";
	sourceROW = 7;
});
$('#x_EM8').mousedown(function(){
	sorceEL = "x_EM8";
	sourceROW = 8;
});
$('#x_EM9').mousedown(function(){
	sorceEL = "x_EM9";
	sourceROW = 9;
});
$('#x_EM10').mousedown(function(){
	sorceEL = "x_EM10";
	sourceROW = 10;
});
$('#x_EM11').mousedown(function(){
	sorceEL = "x_EM11";
	sourceROW = 11;
});
$('#x_EM12').mousedown(function(){
	sorceEL = "x_EM12";
	sourceROW = 12;
});
$('#x_EM13').mousedown(function(){
	sorceEL = "x_EM13";
	sourceROW = 13;
});
$('#x_EM14').mousedown(function(){
	sorceEL = "x_EM14";
	sourceROW = 14;
});
$('#x_EM15').mousedown(function(){
	sorceEL = "x_EM15";
	sourceROW = 15;
});
$('#x_EM16').mousedown(function(){
	sorceEL = "x_EM16";
	sourceROW = 16;
});
$('#x_EM17').mousedown(function(){
	sorceEL = "x_EM17";
	sourceROW = 17;
});
$('#x_EM18').mousedown(function(){
	sorceEL = "x_EM18";
	sourceROW = 18;
});
$('#x_EM19').mousedown(function(){
	sorceEL = "x_EM19";
	sourceROW = 19;
});
$('#x_EM20').mousedown(function(){
	sorceEL = "x_EM20";
	sourceROW = 20;
});
$('#x_EM21').mousedown(function(){
	sorceEL = "x_EM21";
	sourceROW = 21;
});
$('#x_EM22').mousedown(function(){
	sorceEL = "x_EM22";
	sourceROW = 22;
});
$('#x_EM23').mousedown(function(){
	sorceEL = "x_EM23";
	sourceROW = 23;
});
$('#x_EM24').mousedown(function(){
	sorceEL = "x_EM24";
	sourceROW = 24;
});
$('#x_EM25').mousedown(function(){
	sorceEL = "x_EM25";
	sourceROW = 25;
});

//================================================================
$('#x_Others1').mouseup(function(){
	mouseUPEL = "x_Others1";
	mouseUPROW = 1;
	var selitem = document.getElementById("x_Others" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Others" + i ).value = selitem;
		}
  	}
});
$('#x_Others2').mouseup(function(){
	mouseUPEL = "x_Others2";
	mouseUPROW = 2;
	var selitem = document.getElementById("x_Others" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Others" + i ).value = selitem;
		}
  	}
});
$('#x_Others3').mouseup(function(){
	mouseUPEL = "x_Others3";
	mouseUPROW = 3;
	var selitem = document.getElementById("x_Others" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Others" + i ).value = selitem;
		}
  	}
});
$('#x_Others4').mouseup(function(){
	mouseUPEL = "x_Others4";
	mouseUPROW = 4;
	var selitem = document.getElementById("x_Others" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Others" + i ).value = selitem;
		}
  	}
});
$('#x_Others5').mouseup(function(){
	mouseUPEL = "x_Others5";
	mouseUPROW = 5;
	var selitem = document.getElementById("x_Others" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Others" + i ).value = selitem;
		}
  	}
});
$('#x_Others6').mouseup(function(){
	mouseUPEL = "x_Others6";
	mouseUPROW = 6;
	var selitem = document.getElementById("x_Others" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Others" + i ).value = selitem;
		}
  	}
});
$('#x_Others7').mouseup(function(){
	mouseUPEL = "x_Others7";
	mouseUPROW = 7;
	var selitem = document.getElementById("x_Others" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Others" + i ).value = selitem;
		}
  	}
});
$('#x_Others8').mouseup(function(){
	mouseUPEL = "x_Others8";
	mouseUPROW = 8;
	var selitem = document.getElementById("x_Others" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Others" + i ).value = selitem;
		}
  	}
});
$('#x_Others9').mouseup(function(){
	mouseUPEL = "x_Others9";
	mouseUPROW = 9;
	var selitem = document.getElementById("x_Others" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Others" + i ).value = selitem;
		}
  	}
});
$('#x_Others10').mouseup(function(){
	mouseUPEL = "x_Others10";
	mouseUPROW = 10;
	var selitem = document.getElementById("x_Others" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Others" + i ).value = selitem;
		}
  	}
});
$('#x_Others11').mouseup(function(){
	mouseUPEL = "x_Others11";
	mouseUPROW = 11;
	var selitem = document.getElementById("x_Others" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Others" + i ).value = selitem;
		}
  	}
});
$('#x_Others12').mouseup(function(){
	mouseUPEL = "x_Others12";
	mouseUPROW = 12;
	var selitem = document.getElementById("x_Others" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Others" + i ).value = selitem;
		}
  	}
});
$('#x_Others13').mouseup(function(){
	mouseUPEL = "x_Others13";
	mouseUPROW = 13;
	var selitem = document.getElementById("x_Others" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Others" + i ).value = selitem;
		}
  	}
});
$('#x_Others14').mouseup(function(){
	mouseUPEL = "x_Others14";
	mouseUPROW = 14;
	var selitem = document.getElementById("x_Others" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Others" + i ).value = selitem;
		}
  	}
});
$('#x_Others15').mouseup(function(){
	mouseUPEL = "x_Others15";
	mouseUPROW = 15;
	var selitem = document.getElementById("x_Others" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Others" + i ).value = selitem;
		}
  	}
});
$('#x_Others16').mouseup(function(){
	mouseUPEL = "x_Others16";
	mouseUPROW = 16;
	var selitem = document.getElementById("x_Others" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Others" + i ).value = selitem;
		}
  	}
});
$('#x_Others17').mouseup(function(){
	mouseUPEL = "x_Others17";
	mouseUPROW = 17;
	var selitem = document.getElementById("x_Others" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Others" + i ).value = selitem;
		}
  	}
});
$('#x_Others18').mouseup(function(){
	mouseUPEL = "x_Others18";
	mouseUPROW = 18;
	var selitem = document.getElementById("x_Others" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Others" + i ).value = selitem;
		}
  	}
});
$('#x_Others19').mouseup(function(){
	mouseUPEL = "x_Others19";
	mouseUPROW = 19;
	var selitem = document.getElementById("x_Others" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Others" + i ).value = selitem;
		}
  	}
});
$('#x_Others20').mouseup(function(){
	mouseUPEL = "x_Others20";
	mouseUPROW = 20;
	var selitem = document.getElementById("x_Others" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Others" + i ).value = selitem;
		}
  	}
});
$('#x_Others21').mouseup(function(){
	mouseUPEL = "x_Others21";
	mouseUPROW = 21;
	var selitem = document.getElementById("x_Others" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Others" + i ).value = selitem;
		}
  	}
});
$('#x_Others22').mouseup(function(){
	mouseUPEL = "x_Others22";
	mouseUPROW = 22;
	var selitem = document.getElementById("x_Others" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Others" + i ).value = selitem;
		}
  	}
});
$('#x_Others23').mouseup(function(){
	mouseUPEL = "x_Others23";
	mouseUPROW = 23;
	var selitem = document.getElementById("x_Others" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Others" + i ).value = selitem;
		}
  	}
});
$('#x_Others24').mouseup(function(){
	mouseUPEL = "x_Others24";
	mouseUPROW = 24;
	var selitem = document.getElementById("x_Others" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Others" + i ).value = selitem;
		}
  	}
});
$('#x_Others25').mouseup(function(){
	mouseUPEL = "x_Others25";
	mouseUPROW = 25;
	var selitem = document.getElementById("x_Others" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_Others" + i ).value = selitem;
		}
  	}
});
$('#x_Others1').click(function(){
	sorceEL = "x_Others1";
	sourceROW = 1;
});
$('#x_Others2').click(function(){
	sorceEL = "x_Others2";
	sourceROW = 2;
});
$('#x_Others3').click(function(){
	sorceEL = "x_Others3";
	sourceROW = 3;
});
$('#x_Others4').click(function(){
	sorceEL = "x_Others4";
	sourceROW = 4;
});
$('#x_Others5').click(function(){
	sorceEL = "x_Others5";
	sourceROW = 5;
});
$('#x_Others6').click(function(){
	sorceEL = "x_Others6";
	sourceROW = 6;
});
$('#x_Others7').click(function(){
	sorceEL = "x_Others7";
	sourceROW = 7;
});
$('#x_Others8').click(function(){
	sorceEL = "x_Others8";
	sourceROW = 8;
});
$('#x_Others9').click(function(){
	sorceEL = "x_Others9";
	sourceROW = 9;
});
$('#x_Others10').click(function(){
	sorceEL = "x_Others10";
	sourceROW = 10;
});
$('#x_Others11').click(function(){
	sorceEL = "x_Others11";
	sourceROW = 11;
});
$('#x_Others12').click(function(){
	sorceEL = "x_Others12";
	sourceROW = 12;
});
$('#x_Others13').click(function(){
	sorceEL = "x_Others13";
	sourceROW = 13;
});
$('#x_Others14').click(function(){
	sorceEL = "x_Others14";
	sourceROW = 14;
});
$('#x_Others15').click(function(){
	sorceEL = "x_Others15";
	sourceROW = 15;
});
$('#x_Others16').click(function(){
	sorceEL = "x_Others16";
	sourceROW = 16;
});
$('#x_Others17').click(function(){
	sorceEL = "x_Others17";
	sourceROW = 17;
});
$('#x_Others18').click(function(){
	sorceEL = "x_Others18";
	sourceROW = 18;
});
$('#x_Others19').click(function(){
	sorceEL = "x_Others19";
	sourceROW = 19;
});
$('#x_Others20').click(function(){
	sorceEL = "x_Others20";
	sourceROW = 20;
});
$('#x_Others21').click(function(){
	sorceEL = "x_Others21";
	sourceROW = 21;
});
$('#x_Others22').click(function(){
	sorceEL = "x_Others22";
	sourceROW = 22;
});
$('#x_Others23').click(function(){
	sorceEL = "x_Others23";
	sourceROW = 23;
});
$('#x_Others24').click(function(){
	sorceEL = "x_Others24";
	sourceROW = 24;
});
$('#x_Others25').click(function(){
	sorceEL = "x_Others25";
	sourceROW = 25;
});
$('#x_Others1').mousedown(function(){
	sorceEL = "x_Others1";
	sourceROW = 1;
});
$('#x_Others2').mousedown(function(){
	sorceEL = "x_Others2";
	sourceROW = 2;
});
$('#x_Others3').mousedown(function(){
	sorceEL = "x_Others3";
	sourceROW = 3;
});
$('#x_Others4').mousedown(function(){
	sorceEL = "x_Others4";
	sourceROW = 4;
});
$('#x_Others5').mousedown(function(){
	sorceEL = "x_Others5";
	sourceROW = 5;
});
$('#x_Others6').mousedown(function(){
	sorceEL = "x_Others6";
	sourceROW = 6;
});
$('#x_Others7').mousedown(function(){
	sorceEL = "x_Others7";
	sourceROW = 7;
});
$('#x_Others8').mousedown(function(){
	sorceEL = "x_Others8";
	sourceROW = 8;
});
$('#x_Others9').mousedown(function(){
	sorceEL = "x_Others9";
	sourceROW = 9;
});
$('#x_Others10').mousedown(function(){
	sorceEL = "x_Others10";
	sourceROW = 10;
});
$('#x_Others11').mousedown(function(){
	sorceEL = "x_Others11";
	sourceROW = 11;
});
$('#x_Others12').mousedown(function(){
	sorceEL = "x_Others12";
	sourceROW = 12;
});
$('#x_Others13').mousedown(function(){
	sorceEL = "x_Others13";
	sourceROW = 13;
});
$('#x_Others14').mousedown(function(){
	sorceEL = "x_Others14";
	sourceROW = 14;
});
$('#x_Others15').mousedown(function(){
	sorceEL = "x_Others15";
	sourceROW = 15;
});
$('#x_Others16').mousedown(function(){
	sorceEL = "x_Others16";
	sourceROW = 16;
});
$('#x_Others17').mousedown(function(){
	sorceEL = "x_Others17";
	sourceROW = 17;
});
$('#x_Others18').mousedown(function(){
	sorceEL = "x_Others18";
	sourceROW = 18;
});
$('#x_Others19').mousedown(function(){
	sorceEL = "x_Others19";
	sourceROW = 19;
});
$('#x_Others20').mousedown(function(){
	sorceEL = "x_Others20";
	sourceROW = 20;
});
$('#x_Others21').mousedown(function(){
	sorceEL = "x_Others21";
	sourceROW = 21;
});
$('#x_Others22').mousedown(function(){
	sorceEL = "x_Others22";
	sourceROW = 22;
});
$('#x_Others23').mousedown(function(){
	sorceEL = "x_Others23";
	sourceROW = 23;
});
$('#x_Others24').mousedown(function(){
	sorceEL = "x_Others24";
	sourceROW = 24;
});
$('#x_Others25').mousedown(function(){
	sorceEL = "x_Others25";
	sourceROW = 25;
});

//===============================================================
$('#x_DR1').mouseup(function(){
	mouseUPEL = "x_DR1";
	mouseUPROW = 1;
	var selitem = document.getElementById("x_DR" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_DR" + i ).value = selitem;
		}
  	}
});
$('#x_DR2').mouseup(function(){
	mouseUPEL = "x_DR2";
	mouseUPROW = 2;
	var selitem = document.getElementById("x_DR" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_DR" + i ).value = selitem;
		}
  	}
});
$('#x_DR3').mouseup(function(){
	mouseUPEL = "x_DR3";
	mouseUPROW = 3;
	var selitem = document.getElementById("x_DR" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_DR" + i ).value = selitem;
		}
  	}
});
$('#x_DR4').mouseup(function(){
	mouseUPEL = "x_DR4";
	mouseUPROW = 4;
	var selitem = document.getElementById("x_DR" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_DR" + i ).value = selitem;
		}
  	}
});
$('#x_DR5').mouseup(function(){
	mouseUPEL = "x_DR5";
	mouseUPROW = 5;
	var selitem = document.getElementById("x_DR" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_DR" + i ).value = selitem;
		}
  	}
});
$('#x_DR6').mouseup(function(){
	mouseUPEL = "x_DR6";
	mouseUPROW = 6;
	var selitem = document.getElementById("x_DR" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_DR" + i ).value = selitem;
		}
  	}
});
$('#x_DR7').mouseup(function(){
	mouseUPEL = "x_DR7";
	mouseUPROW = 7;
	var selitem = document.getElementById("x_DR" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_DR" + i ).value = selitem;
		}
  	}
});
$('#x_DR8').mouseup(function(){
	mouseUPEL = "x_DR8";
	mouseUPROW = 8;
	var selitem = document.getElementById("x_DR" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_DR" + i ).value = selitem;
		}
  	}
});
$('#x_DR9').mouseup(function(){
	mouseUPEL = "x_DR9";
	mouseUPROW = 9;
	var selitem = document.getElementById("x_DR" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_DR" + i ).value = selitem;
		}
  	}
});
$('#x_DR10').mouseup(function(){
	mouseUPEL = "x_DR10";
	mouseUPROW = 10;
	var selitem = document.getElementById("x_DR" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_DR" + i ).value = selitem;
		}
  	}
});
$('#x_DR11').mouseup(function(){
	mouseUPEL = "x_DR11";
	mouseUPROW = 11;
	var selitem = document.getElementById("x_DR" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_DR" + i ).value = selitem;
		}
  	}
});
$('#x_DR12').mouseup(function(){
	mouseUPEL = "x_DR12";
	mouseUPROW = 12;
	var selitem = document.getElementById("x_DR" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_DR" + i ).value = selitem;
		}
  	}
});
$('#x_DR13').mouseup(function(){
	mouseUPEL = "x_DR13";
	mouseUPROW = 13;
	var selitem = document.getElementById("x_DR" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_DR" + i ).value = selitem;
		}
  	}
});
$('#x_DR14').mouseup(function(){
	mouseUPEL = "x_DR14";
	mouseUPROW = 14;
	var selitem = document.getElementById("x_DR" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_DR" + i ).value = selitem;
		}
  	}
});
$('#x_DR15').mouseup(function(){
	mouseUPEL = "x_DR15";
	mouseUPROW = 15;
	var selitem = document.getElementById("x_DR" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_DR" + i ).value = selitem;
		}
  	}
});
$('#x_DR16').mouseup(function(){
	mouseUPEL = "x_DR16";
	mouseUPROW = 16;
	var selitem = document.getElementById("x_DR" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_DR" + i ).value = selitem;
		}
  	}
});
$('#x_DR17').mouseup(function(){
	mouseUPEL = "x_DR17";
	mouseUPROW = 17;
	var selitem = document.getElementById("x_DR" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_DR" + i ).value = selitem;
		}
  	}
});
$('#x_DR18').mouseup(function(){
	mouseUPEL = "x_DR18";
	mouseUPROW = 18;
	var selitem = document.getElementById("x_DR" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_DR" + i ).value = selitem;
		}
  	}
});
$('#x_DR19').mouseup(function(){
	mouseUPEL = "x_DR19";
	mouseUPROW = 19;
	var selitem = document.getElementById("x_DR" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_DR" + i ).value = selitem;
		}
  	}
});
$('#x_DR20').mouseup(function(){
	mouseUPEL = "x_DR20";
	mouseUPROW = 20;
	var selitem = document.getElementById("x_DR" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_DR" + i ).value = selitem;
		}
  	}
});
$('#x_DR21').mouseup(function(){
	mouseUPEL = "x_DR21";
	mouseUPROW = 21;
	var selitem = document.getElementById("x_DR" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_DR" + i ).value = selitem;
		}
  	}
});
$('#x_DR22').mouseup(function(){
	mouseUPEL = "x_DR22";
	mouseUPROW = 22;
	var selitem = document.getElementById("x_DR" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_DR" + i ).value = selitem;
		}
  	}
});
$('#x_DR23').mouseup(function(){
	mouseUPEL = "x_DR23";
	mouseUPROW = 23;
	var selitem = document.getElementById("x_DR" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_DR" + i ).value = selitem;
		}
  	}
});
$('#x_DR24').mouseup(function(){
	mouseUPEL = "x_DR24";
	mouseUPROW = 24;
	var selitem = document.getElementById("x_DR" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_DR" + i ).value = selitem;
		}
  	}
});
$('#x_DR25').mouseup(function(){
	mouseUPEL = "x_DR25";
	mouseUPROW = 25;
	var selitem = document.getElementById("x_DR" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_DR" + i ).value = selitem;
		}
  	}
});
$('#x_DR1').click(function(){
	sorceEL = "x_DR1";
	sourceROW = 1;
});
$('#x_DR2').click(function(){
	sorceEL = "x_DR2";
	sourceROW = 2;
});
$('#x_DR3').click(function(){
	sorceEL = "x_DR3";
	sourceROW = 3;
});
$('#x_DR4').click(function(){
	sorceEL = "x_DR4";
	sourceROW = 4;
});
$('#x_DR5').click(function(){
	sorceEL = "x_DR5";
	sourceROW = 5;
});
$('#x_DR6').click(function(){
	sorceEL = "x_DR6";
	sourceROW = 6;
});
$('#x_DR7').click(function(){
	sorceEL = "x_DR7";
	sourceROW = 7;
});
$('#x_DR8').click(function(){
	sorceEL = "x_DR8";
	sourceROW = 8;
});
$('#x_DR9').click(function(){
	sorceEL = "x_DR9";
	sourceROW = 9;
});
$('#x_DR10').click(function(){
	sorceEL = "x_DR10";
	sourceROW = 10;
});
$('#x_DR11').click(function(){
	sorceEL = "x_DR11";
	sourceROW = 11;
});
$('#x_DR12').click(function(){
	sorceEL = "x_DR12";
	sourceROW = 12;
});
$('#x_DR13').click(function(){
	sorceEL = "x_DR13";
	sourceROW = 13;
});
$('#x_DR14').click(function(){
	sorceEL = "x_DR14";
	sourceROW = 14;
});
$('#x_DR15').click(function(){
	sorceEL = "x_DR15";
	sourceROW = 15;
});
$('#x_DR16').click(function(){
	sorceEL = "x_DR16";
	sourceROW = 16;
});
$('#x_DR17').click(function(){
	sorceEL = "x_DR17";
	sourceROW = 17;
});
$('#x_DR18').click(function(){
	sorceEL = "x_DR18";
	sourceROW = 18;
});
$('#x_DR19').click(function(){
	sorceEL = "x_DR19";
	sourceROW = 19;
});
$('#x_DR20').click(function(){
	sorceEL = "x_DR20";
	sourceROW = 20;
});
$('#x_DR21').click(function(){
	sorceEL = "x_DR21";
	sourceROW = 21;
});
$('#x_DR22').click(function(){
	sorceEL = "x_DR22";
	sourceROW = 22;
});
$('#x_DR23').click(function(){
	sorceEL = "x_DR23";
	sourceROW = 23;
});
$('#x_DR24').click(function(){
	sorceEL = "x_DR24";
	sourceROW = 24;
});
$('#x_DR25').click(function(){
	sorceEL = "x_DR25";
	sourceROW = 25;
});
$('#x_DR1').mousedown(function(){
	sorceEL = "x_DR1";
	sourceROW = 1;
});
$('#x_DR2').mousedown(function(){
	sorceEL = "x_DR2";
	sourceROW = 2;
});
$('#x_DR3').mousedown(function(){
	sorceEL = "x_DR3";
	sourceROW = 3;
});
$('#x_DR4').mousedown(function(){
	sorceEL = "x_DR4";
	sourceROW = 4;
});
$('#x_DR5').mousedown(function(){
	sorceEL = "x_DR5";
	sourceROW = 5;
});
$('#x_DR6').mousedown(function(){
	sorceEL = "x_DR6";
	sourceROW = 6;
});
$('#x_DR7').mousedown(function(){
	sorceEL = "x_DR7";
	sourceROW = 7;
});
$('#x_DR8').mousedown(function(){
	sorceEL = "x_DR8";
	sourceROW = 8;
});
$('#x_DR9').mousedown(function(){
	sorceEL = "x_DR9";
	sourceROW = 9;
});
$('#x_DR10').mousedown(function(){
	sorceEL = "x_DR10";
	sourceROW = 10;
});
$('#x_DR11').mousedown(function(){
	sorceEL = "x_DR11";
	sourceROW = 11;
});
$('#x_DR12').mousedown(function(){
	sorceEL = "x_DR12";
	sourceROW = 12;
});
$('#x_DR13').mousedown(function(){
	sorceEL = "x_DR13";
	sourceROW = 13;
});
$('#x_DR14').mousedown(function(){
	sorceEL = "x_DR14";
	sourceROW = 14;
});
$('#x_DR15').mousedown(function(){
	sorceEL = "x_DR15";
	sourceROW = 15;
});
$('#x_DR16').mousedown(function(){
	sorceEL = "x_DR16";
	sourceROW = 16;
});
$('#x_DR17').mousedown(function(){
	sorceEL = "x_DR17";
	sourceROW = 17;
});
$('#x_DR18').mousedown(function(){
	sorceEL = "x_DR18";
	sourceROW = 18;
});
$('#x_DR19').mousedown(function(){
	sorceEL = "x_DR19";
	sourceROW = 19;
});
$('#x_DR20').mousedown(function(){
	sorceEL = "x_DR20";
	sourceROW = 20;
});
$('#x_DR21').mousedown(function(){
	sorceEL = "x_DR21";
	sourceROW = 21;
});
$('#x_DR22').mousedown(function(){
	sorceEL = "x_DR22";
	sourceROW = 22;
});
$('#x_DR23').mousedown(function(){
	sorceEL = "x_DR23";
	sourceROW = 23;
});
$('#x_DR24').mousedown(function(){
	sorceEL = "x_DR24";
	sourceROW = 24;
});
$('#x_DR25').mousedown(function(){
	sorceEL = "x_DR25";
	sourceROW = 25;
});

//===================================================
$('#x_RFSH1').mouseup(function(){
	mouseUPEL = "x_RFSH1";
	mouseUPROW = 1;
	var selitem = document.getElementById("x_RFSH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_RFSH" + i ).value = selitem;
		}
  	}
});
$('#x_RFSH2').mouseup(function(){
	mouseUPEL = "x_RFSH2";
	mouseUPROW = 2;
	var selitem = document.getElementById("x_RFSH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_RFSH" + i ).value = selitem;
		}
  	}
});
$('#x_RFSH3').mouseup(function(){
	mouseUPEL = "x_RFSH3";
	mouseUPROW = 3;
	var selitem = document.getElementById("x_RFSH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_RFSH" + i ).value = selitem;
		}
  	}
});
$('#x_RFSH4').mouseup(function(){
	mouseUPEL = "x_RFSH4";
	mouseUPROW = 4;
	var selitem = document.getElementById("x_RFSH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_RFSH" + i ).value = selitem;
		}
  	}
});
$('#x_RFSH5').mouseup(function(){
	mouseUPEL = "x_RFSH5";
	mouseUPROW = 5;
	var selitem = document.getElementById("x_RFSH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_RFSH" + i ).value = selitem;
		}
  	}
});
$('#x_RFSH6').mouseup(function(){
	mouseUPEL = "x_RFSH6";
	mouseUPROW = 6;
	var selitem = document.getElementById("x_RFSH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_RFSH" + i ).value = selitem;
		}
  	}
});
$('#x_RFSH7').mouseup(function(){
	mouseUPEL = "x_RFSH7";
	mouseUPROW = 7;
	var selitem = document.getElementById("x_RFSH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_RFSH" + i ).value = selitem;
		}
  	}
});
$('#x_RFSH8').mouseup(function(){
	mouseUPEL = "x_RFSH8";
	mouseUPROW = 8;
	var selitem = document.getElementById("x_RFSH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_RFSH" + i ).value = selitem;
		}
  	}
});
$('#x_RFSH9').mouseup(function(){
	mouseUPEL = "x_RFSH9";
	mouseUPROW = 9;
	var selitem = document.getElementById("x_RFSH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_RFSH" + i ).value = selitem;
		}
  	}
});
$('#x_RFSH10').mouseup(function(){
	mouseUPEL = "x_RFSH10";
	mouseUPROW = 10;
	var selitem = document.getElementById("x_RFSH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_RFSH" + i ).value = selitem;
		}
  	}
});
$('#x_RFSH11').mouseup(function(){
	mouseUPEL = "x_RFSH11";
	mouseUPROW = 11;
	var selitem = document.getElementById("x_RFSH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_RFSH" + i ).value = selitem;
		}
  	}
});
$('#x_RFSH12').mouseup(function(){
	mouseUPEL = "x_RFSH12";
	mouseUPROW = 12;
	var selitem = document.getElementById("x_RFSH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_RFSH" + i ).value = selitem;
		}
  	}
});
$('#x_RFSH13').mouseup(function(){
	mouseUPEL = "x_RFSH13";
	mouseUPROW = 13;
	var selitem = document.getElementById("x_RFSH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_RFSH" + i ).value = selitem;
		}
  	}
});
$('#x_RFSH14').mouseup(function(){
	mouseUPEL = "x_RFSH14";
	mouseUPROW = 14;
	var selitem = document.getElementById("x_RFSH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_RFSH" + i ).value = selitem;
		}
  	}
});
$('#x_RFSH15').mouseup(function(){
	mouseUPEL = "x_RFSH15";
	mouseUPROW = 15;
	var selitem = document.getElementById("x_RFSH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_RFSH" + i ).value = selitem;
		}
  	}
});
$('#x_RFSH16').mouseup(function(){
	mouseUPEL = "x_RFSH16";
	mouseUPROW = 16;
	var selitem = document.getElementById("x_RFSH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_RFSH" + i ).value = selitem;
		}
  	}
});
$('#x_RFSH17').mouseup(function(){
	mouseUPEL = "x_RFSH17";
	mouseUPROW = 17;
	var selitem = document.getElementById("x_RFSH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_RFSH" + i ).value = selitem;
		}
  	}
});
$('#x_RFSH18').mouseup(function(){
	mouseUPEL = "x_RFSH18";
	mouseUPROW = 18;
	var selitem = document.getElementById("x_RFSH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_RFSH" + i ).value = selitem;
		}
  	}
});
$('#x_RFSH19').mouseup(function(){
	mouseUPEL = "x_RFSH19";
	mouseUPROW = 19;
	var selitem = document.getElementById("x_RFSH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_RFSH" + i ).value = selitem;
		}
  	}
});
$('#x_RFSH20').mouseup(function(){
	mouseUPEL = "x_RFSH20";
	mouseUPROW = 20;
	var selitem = document.getElementById("x_RFSH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_RFSH" + i ).value = selitem;
		}
  	}
});
$('#x_RFSH21').mouseup(function(){
	mouseUPEL = "x_RFSH21";
	mouseUPROW = 21;
	var selitem = document.getElementById("x_RFSH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_RFSH" + i ).value = selitem;
		}
  	}
});
$('#x_RFSH22').mouseup(function(){
	mouseUPEL = "x_RFSH22";
	mouseUPROW = 22;
	var selitem = document.getElementById("x_RFSH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_RFSH" + i ).value = selitem;
		}
  	}
});
$('#x_RFSH23').mouseup(function(){
	mouseUPEL = "x_RFSH23";
	mouseUPROW = 23;
	var selitem = document.getElementById("x_RFSH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_RFSH" + i ).value = selitem;
		}
  	}
});
$('#x_RFSH24').mouseup(function(){
	mouseUPEL = "x_RFSH24";
	mouseUPROW = 24;
	var selitem = document.getElementById("x_RFSH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_RFSH" + i ).value = selitem;
		}
  	}
});
$('#x_RFSH25').mouseup(function(){
	mouseUPEL = "x_RFSH25";
	mouseUPROW = 25;
	var selitem = document.getElementById("x_RFSH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_RFSH" + i ).value = selitem;
		}
  	}
});
$('#x_RFSH1').click(function(){
	sorceEL = "x_RFSH1";
	sourceROW = 1;
});
$('#x_RFSH2').click(function(){
	sorceEL = "x_RFSH2";
	sourceROW = 2;
});
$('#x_RFSH3').click(function(){
	sorceEL = "x_RFSH3";
	sourceROW = 3;
});
$('#x_RFSH4').click(function(){
	sorceEL = "x_RFSH4";
	sourceROW = 4;
});
$('#x_RFSH5').click(function(){
	sorceEL = "x_RFSH5";
	sourceROW = 5;
});
$('#x_RFSH6').click(function(){
	sorceEL = "x_RFSH6";
	sourceROW = 6;
});
$('#x_RFSH7').click(function(){
	sorceEL = "x_RFSH7";
	sourceROW = 7;
});
$('#x_RFSH8').click(function(){
	sorceEL = "x_RFSH8";
	sourceROW = 8;
});
$('#x_RFSH9').click(function(){
	sorceEL = "x_RFSH9";
	sourceROW = 9;
});
$('#x_RFSH10').click(function(){
	sorceEL = "x_RFSH10";
	sourceROW = 10;
});
$('#x_RFSH11').click(function(){
	sorceEL = "x_RFSH11";
	sourceROW = 11;
});
$('#x_RFSH12').click(function(){
	sorceEL = "x_RFSH12";
	sourceROW = 12;
});
$('#x_RFSH13').click(function(){
	sorceEL = "x_RFSH13";
	sourceROW = 13;
});
$('#x_RFSH14').click(function(){
	sorceEL = "x_RFSH14";
	sourceROW = 14;
});
$('#x_RFSH15').click(function(){
	sorceEL = "x_RFSH15";
	sourceROW = 15;
});
$('#x_RFSH16').click(function(){
	sorceEL = "x_RFSH16";
	sourceROW = 16;
});
$('#x_RFSH17').click(function(){
	sorceEL = "x_RFSH17";
	sourceROW = 17;
});
$('#x_RFSH18').click(function(){
	sorceEL = "x_RFSH18";
	sourceROW = 18;
});
$('#x_RFSH19').click(function(){
	sorceEL = "x_RFSH19";
	sourceROW = 19;
});
$('#x_RFSH20').click(function(){
	sorceEL = "x_RFSH20";
	sourceROW = 20;
});
$('#x_RFSH21').click(function(){
	sorceEL = "x_RFSH21";
	sourceROW = 21;
});
$('#x_RFSH22').click(function(){
	sorceEL = "x_RFSH22";
	sourceROW = 22;
});
$('#x_RFSH23').click(function(){
	sorceEL = "x_RFSH23";
	sourceROW = 23;
});
$('#x_RFSH24').click(function(){
	sorceEL = "x_RFSH24";
	sourceROW = 24;
});
$('#x_RFSH25').click(function(){
	sorceEL = "x_RFSH25";
	sourceROW = 25;
});
$('#x_RFSH1').mousedown(function(){
	sorceEL = "x_RFSH1";
	sourceROW = 1;
});
$('#x_RFSH2').mousedown(function(){
	sorceEL = "x_RFSH2";
	sourceROW = 2;
});
$('#x_RFSH3').mousedown(function(){
	sorceEL = "x_RFSH3";
	sourceROW = 3;
});
$('#x_RFSH4').mousedown(function(){
	sorceEL = "x_RFSH4";
	sourceROW = 4;
});
$('#x_RFSH5').mousedown(function(){
	sorceEL = "x_RFSH5";
	sourceROW = 5;
});
$('#x_RFSH6').mousedown(function(){
	sorceEL = "x_RFSH6";
	sourceROW = 6;
});
$('#x_RFSH7').mousedown(function(){
	sorceEL = "x_RFSH7";
	sourceROW = 7;
});
$('#x_RFSH8').mousedown(function(){
	sorceEL = "x_RFSH8";
	sourceROW = 8;
});
$('#x_RFSH9').mousedown(function(){
	sorceEL = "x_RFSH9";
	sourceROW = 9;
});
$('#x_RFSH10').mousedown(function(){
	sorceEL = "x_RFSH10";
	sourceROW = 10;
});
$('#x_RFSH11').mousedown(function(){
	sorceEL = "x_RFSH11";
	sourceROW = 11;
});
$('#x_RFSH12').mousedown(function(){
	sorceEL = "x_RFSH12";
	sourceROW = 12;
});
$('#x_RFSH13').mousedown(function(){
	sorceEL = "x_RFSH13";
	sourceROW = 13;
});
$('#x_RFSH14').mousedown(function(){
	sorceEL = "x_RFSH14";
	sourceROW = 14;
});
$('#x_RFSH15').mousedown(function(){
	sorceEL = "x_RFSH15";
	sourceROW = 15;
});
$('#x_RFSH16').mousedown(function(){
	sorceEL = "x_RFSH16";
	sourceROW = 16;
});
$('#x_RFSH17').mousedown(function(){
	sorceEL = "x_RFSH17";
	sourceROW = 17;
});
$('#x_RFSH18').mousedown(function(){
	sorceEL = "x_RFSH18";
	sourceROW = 18;
});
$('#x_RFSH19').mousedown(function(){
	sorceEL = "x_RFSH19";
	sourceROW = 19;
});
$('#x_RFSH20').mousedown(function(){
	sorceEL = "x_RFSH20";
	sourceROW = 20;
});
$('#x_RFSH21').mousedown(function(){
	sorceEL = "x_RFSH21";
	sourceROW = 21;
});
$('#x_RFSH22').mousedown(function(){
	sorceEL = "x_RFSH22";
	sourceROW = 22;
});
$('#x_RFSH23').mousedown(function(){
	sorceEL = "x_RFSH23";
	sourceROW = 23;
});
$('#x_RFSH24').mousedown(function(){
	sorceEL = "x_RFSH24";
	sourceROW = 24;
});
$('#x_RFSH25').mousedown(function(){
	sorceEL = "x_RFSH25";
	sourceROW = 25;
});

//=====================================================
$('#x_HMG1').mouseup(function(){
	mouseUPEL = "x_HMG1";
	mouseUPROW = 1;
	var selitem = document.getElementById("x_HMG" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_HMG" + i ).value = selitem;
		}
  	}
});
$('#x_HMG2').mouseup(function(){
	mouseUPEL = "x_HMG2";
	mouseUPROW = 2;
	var selitem = document.getElementById("x_HMG" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_HMG" + i ).value = selitem;
		}
  	}
});
$('#x_HMG3').mouseup(function(){
	mouseUPEL = "x_HMG3";
	mouseUPROW = 3;
	var selitem = document.getElementById("x_HMG" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_HMG" + i ).value = selitem;
		}
  	}
});
$('#x_HMG4').mouseup(function(){
	mouseUPEL = "x_HMG4";
	mouseUPROW = 4;
	var selitem = document.getElementById("x_HMG" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_HMG" + i ).value = selitem;
		}
  	}
});
$('#x_HMG5').mouseup(function(){
	mouseUPEL = "x_HMG5";
	mouseUPROW = 5;
	var selitem = document.getElementById("x_HMG" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_HMG" + i ).value = selitem;
		}
  	}
});
$('#x_HMG6').mouseup(function(){
	mouseUPEL = "x_HMG6";
	mouseUPROW = 6;
	var selitem = document.getElementById("x_HMG" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_HMG" + i ).value = selitem;
		}
  	}
});
$('#x_HMG7').mouseup(function(){
	mouseUPEL = "x_HMG7";
	mouseUPROW = 7;
	var selitem = document.getElementById("x_HMG" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_HMG" + i ).value = selitem;
		}
  	}
});
$('#x_HMG8').mouseup(function(){
	mouseUPEL = "x_HMG8";
	mouseUPROW = 8;
	var selitem = document.getElementById("x_HMG" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_HMG" + i ).value = selitem;
		}
  	}
});
$('#x_HMG9').mouseup(function(){
	mouseUPEL = "x_HMG9";
	mouseUPROW = 9;
	var selitem = document.getElementById("x_HMG" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_HMG" + i ).value = selitem;
		}
  	}
});
$('#x_HMG10').mouseup(function(){
	mouseUPEL = "x_HMG10";
	mouseUPROW = 10;
	var selitem = document.getElementById("x_HMG" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_HMG" + i ).value = selitem;
		}
  	}
});
$('#x_HMG11').mouseup(function(){
	mouseUPEL = "x_HMG11";
	mouseUPROW = 11;
	var selitem = document.getElementById("x_HMG" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_HMG" + i ).value = selitem;
		}
  	}
});
$('#x_HMG12').mouseup(function(){
	mouseUPEL = "x_HMG12";
	mouseUPROW = 12;
	var selitem = document.getElementById("x_HMG" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_HMG" + i ).value = selitem;
		}
  	}
});
$('#x_HMG13').mouseup(function(){
	mouseUPEL = "x_HMG13";
	mouseUPROW = 13;
	var selitem = document.getElementById("x_HMG" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_HMG" + i ).value = selitem;
		}
  	}
});
$('#x_HMG14').mouseup(function(){
	mouseUPEL = "x_HMG14";
	mouseUPROW = 14;
	var selitem = document.getElementById("x_HMG" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_HMG" + i ).value = selitem;
		}
  	}
});
$('#x_HMG15').mouseup(function(){
	mouseUPEL = "x_HMG15";
	mouseUPROW = 15;
	var selitem = document.getElementById("x_HMG" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_HMG" + i ).value = selitem;
		}
  	}
});
$('#x_HMG16').mouseup(function(){
	mouseUPEL = "x_HMG16";
	mouseUPROW = 16;
	var selitem = document.getElementById("x_HMG" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_HMG" + i ).value = selitem;
		}
  	}
});
$('#x_HMG17').mouseup(function(){
	mouseUPEL = "x_HMG17";
	mouseUPROW = 17;
	var selitem = document.getElementById("x_HMG" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_HMG" + i ).value = selitem;
		}
  	}
});
$('#x_HMG18').mouseup(function(){
	mouseUPEL = "x_HMG18";
	mouseUPROW = 18;
	var selitem = document.getElementById("x_HMG" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_HMG" + i ).value = selitem;
		}
  	}
});
$('#x_HMG19').mouseup(function(){
	mouseUPEL = "x_HMG19";
	mouseUPROW = 19;
	var selitem = document.getElementById("x_HMG" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_HMG" + i ).value = selitem;
		}
  	}
});
$('#x_HMG20').mouseup(function(){
	mouseUPEL = "x_HMG20";
	mouseUPROW = 20;
	var selitem = document.getElementById("x_HMG" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_HMG" + i ).value = selitem;
		}
  	}
});
$('#x_HMG21').mouseup(function(){
	mouseUPEL = "x_HMG21";
	mouseUPROW = 21;
	var selitem = document.getElementById("x_HMG" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_HMG" + i ).value = selitem;
		}
  	}
});
$('#x_HMG22').mouseup(function(){
	mouseUPEL = "x_HMG22";
	mouseUPROW = 22;
	var selitem = document.getElementById("x_HMG" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_HMG" + i ).value = selitem;
		}
  	}
});
$('#x_HMG23').mouseup(function(){
	mouseUPEL = "x_HMG23";
	mouseUPROW = 23;
	var selitem = document.getElementById("x_HMG" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_HMG" + i ).value = selitem;
		}
  	}
});
$('#x_HMG24').mouseup(function(){
	mouseUPEL = "x_HMG24";
	mouseUPROW = 24;
	var selitem = document.getElementById("x_HMG" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_HMG" + i ).value = selitem;
		}
  	}
});
$('#x_HMG25').mouseup(function(){
	mouseUPEL = "x_HMG25";
	mouseUPROW = 25;
	var selitem = document.getElementById("x_HMG" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_HMG" + i ).value = selitem;
		}
  	}
});
$('#x_HMG1').click(function(){
	sorceEL = "x_HMG1";
	sourceROW = 1;
});
$('#x_HMG2').click(function(){
	sorceEL = "x_HMG2";
	sourceROW = 2;
});
$('#x_HMG3').click(function(){
	sorceEL = "x_HMG3";
	sourceROW = 3;
});
$('#x_HMG4').click(function(){
	sorceEL = "x_HMG4";
	sourceROW = 4;
});
$('#x_HMG5').click(function(){
	sorceEL = "x_HMG5";
	sourceROW = 5;
});
$('#x_HMG6').click(function(){
	sorceEL = "x_HMG6";
	sourceROW = 6;
});
$('#x_HMG7').click(function(){
	sorceEL = "x_HMG7";
	sourceROW = 7;
});
$('#x_HMG8').click(function(){
	sorceEL = "x_HMG8";
	sourceROW = 8;
});
$('#x_HMG9').click(function(){
	sorceEL = "x_HMG9";
	sourceROW = 9;
});
$('#x_HMG10').click(function(){
	sorceEL = "x_HMG10";
	sourceROW = 10;
});
$('#x_HMG11').click(function(){
	sorceEL = "x_HMG11";
	sourceROW = 11;
});
$('#x_HMG12').click(function(){
	sorceEL = "x_HMG12";
	sourceROW = 12;
});
$('#x_HMG13').click(function(){
	sorceEL = "x_HMG13";
	sourceROW = 13;
});
$('#x_HMG14').click(function(){
	sorceEL = "x_HMG14";
	sourceROW = 14;
});
$('#x_HMG15').click(function(){
	sorceEL = "x_HMG15";
	sourceROW = 15;
});
$('#x_HMG16').click(function(){
	sorceEL = "x_HMG16";
	sourceROW = 16;
});
$('#x_HMG17').click(function(){
	sorceEL = "x_HMG17";
	sourceROW = 17;
});
$('#x_HMG18').click(function(){
	sorceEL = "x_HMG18";
	sourceROW = 18;
});
$('#x_HMG19').click(function(){
	sorceEL = "x_HMG19";
	sourceROW = 19;
});
$('#x_HMG20').click(function(){
	sorceEL = "x_HMG20";
	sourceROW = 20;
});
$('#x_HMG21').click(function(){
	sorceEL = "x_HMG21";
	sourceROW = 21;
});
$('#x_HMG22').click(function(){
	sorceEL = "x_HMG22";
	sourceROW = 22;
});
$('#x_HMG23').click(function(){
	sorceEL = "x_HMG23";
	sourceROW = 23;
});
$('#x_HMG24').click(function(){
	sorceEL = "x_HMG24";
	sourceROW = 24;
});
$('#x_HMG25').click(function(){
	sorceEL = "x_HMG25";
	sourceROW = 25;
});
$('#x_HMG1').mousedown(function(){
	sorceEL = "x_HMG1";
	sourceROW = 1;
});
$('#x_HMG2').mousedown(function(){
	sorceEL = "x_HMG2";
	sourceROW = 2;
});
$('#x_HMG3').mousedown(function(){
	sorceEL = "x_HMG3";
	sourceROW = 3;
});
$('#x_HMG4').mousedown(function(){
	sorceEL = "x_HMG4";
	sourceROW = 4;
});
$('#x_HMG5').mousedown(function(){
	sorceEL = "x_HMG5";
	sourceROW = 5;
});
$('#x_HMG6').mousedown(function(){
	sorceEL = "x_HMG6";
	sourceROW = 6;
});
$('#x_HMG7').mousedown(function(){
	sorceEL = "x_HMG7";
	sourceROW = 7;
});
$('#x_HMG8').mousedown(function(){
	sorceEL = "x_HMG8";
	sourceROW = 8;
});
$('#x_HMG9').mousedown(function(){
	sorceEL = "x_HMG9";
	sourceROW = 9;
});
$('#x_HMG10').mousedown(function(){
	sorceEL = "x_HMG10";
	sourceROW = 10;
});
$('#x_HMG11').mousedown(function(){
	sorceEL = "x_HMG11";
	sourceROW = 11;
});
$('#x_HMG12').mousedown(function(){
	sorceEL = "x_HMG12";
	sourceROW = 12;
});
$('#x_HMG13').mousedown(function(){
	sorceEL = "x_HMG13";
	sourceROW = 13;
});
$('#x_HMG14').mousedown(function(){
	sorceEL = "x_HMG14";
	sourceROW = 14;
});
$('#x_HMG15').mousedown(function(){
	sorceEL = "x_HMG15";
	sourceROW = 15;
});
$('#x_HMG16').mousedown(function(){
	sorceEL = "x_HMG16";
	sourceROW = 16;
});
$('#x_HMG17').mousedown(function(){
	sorceEL = "x_HMG17";
	sourceROW = 17;
});
$('#x_HMG18').mousedown(function(){
	sorceEL = "x_HMG18";
	sourceROW = 18;
});
$('#x_HMG19').mousedown(function(){
	sorceEL = "x_HMG19";
	sourceROW = 19;
});
$('#x_HMG20').mousedown(function(){
	sorceEL = "x_HMG20";
	sourceROW = 20;
});
$('#x_HMG21').mousedown(function(){
	sorceEL = "x_HMG21";
	sourceROW = 21;
});
$('#x_HMG22').mousedown(function(){
	sorceEL = "x_HMG22";
	sourceROW = 22;
});
$('#x_HMG23').mousedown(function(){
	sorceEL = "x_HMG23";
	sourceROW = 23;
});
$('#x_HMG24').mousedown(function(){
	sorceEL = "x_HMG24";
	sourceROW = 24;
});
$('#x_HMG25').mousedown(function(){
	sorceEL = "x_HMG25";
	sourceROW = 25;
});

//=================
$('#x_GnRH1').mouseup(function(){
	mouseUPEL = "x_GnRH1";
	mouseUPROW = 1;
	var selitem = document.getElementById("x_GnRH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_GnRH" + i ).value = selitem;
		}
  	}
});
$('#x_GnRH2').mouseup(function(){
	mouseUPEL = "x_GnRH2";
	mouseUPROW = 2;
	var selitem = document.getElementById("x_GnRH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_GnRH" + i ).value = selitem;
		}
  	}
});
$('#x_GnRH3').mouseup(function(){
	mouseUPEL = "x_GnRH3";
	mouseUPROW = 3;
	var selitem = document.getElementById("x_GnRH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_GnRH" + i ).value = selitem;
		}
  	}
});
$('#x_GnRH4').mouseup(function(){
	mouseUPEL = "x_GnRH4";
	mouseUPROW = 4;
	var selitem = document.getElementById("x_GnRH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_GnRH" + i ).value = selitem;
		}
  	}
});
$('#x_GnRH5').mouseup(function(){
	mouseUPEL = "x_GnRH5";
	mouseUPROW = 5;
	var selitem = document.getElementById("x_GnRH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_GnRH" + i ).value = selitem;
		}
  	}
});
$('#x_GnRH6').mouseup(function(){
	mouseUPEL = "x_GnRH6";
	mouseUPROW = 6;
	var selitem = document.getElementById("x_GnRH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_GnRH" + i ).value = selitem;
		}
  	}
});
$('#x_GnRH7').mouseup(function(){
	mouseUPEL = "x_GnRH7";
	mouseUPROW = 7;
	var selitem = document.getElementById("x_GnRH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_GnRH" + i ).value = selitem;
		}
  	}
});
$('#x_GnRH8').mouseup(function(){
	mouseUPEL = "x_GnRH8";
	mouseUPROW = 8;
	var selitem = document.getElementById("x_GnRH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_GnRH" + i ).value = selitem;
		}
  	}
});
$('#x_GnRH9').mouseup(function(){
	mouseUPEL = "x_GnRH9";
	mouseUPROW = 9;
	var selitem = document.getElementById("x_GnRH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_GnRH" + i ).value = selitem;
		}
  	}
});
$('#x_GnRH10').mouseup(function(){
	mouseUPEL = "x_GnRH10";
	mouseUPROW = 10;
	var selitem = document.getElementById("x_GnRH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_GnRH" + i ).value = selitem;
		}
  	}
});
$('#x_GnRH11').mouseup(function(){
	mouseUPEL = "x_GnRH11";
	mouseUPROW = 11;
	var selitem = document.getElementById("x_GnRH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_GnRH" + i ).value = selitem;
		}
  	}
});
$('#x_GnRH12').mouseup(function(){
	mouseUPEL = "x_GnRH12";
	mouseUPROW = 12;
	var selitem = document.getElementById("x_GnRH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_GnRH" + i ).value = selitem;
		}
  	}
});
$('#x_GnRH13').mouseup(function(){
	mouseUPEL = "x_GnRH13";
	mouseUPROW = 13;
	var selitem = document.getElementById("x_GnRH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_GnRH" + i ).value = selitem;
		}
  	}
});
$('#x_GnRH14').mouseup(function(){
	mouseUPEL = "x_GnRH14";
	mouseUPROW = 14;
	var selitem = document.getElementById("x_GnRH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_GnRH" + i ).value = selitem;
		}
  	}
});
$('#x_GnRH15').mouseup(function(){
	mouseUPEL = "x_GnRH15";
	mouseUPROW = 15;
	var selitem = document.getElementById("x_GnRH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_GnRH" + i ).value = selitem;
		}
  	}
});
$('#x_GnRH16').mouseup(function(){
	mouseUPEL = "x_GnRH16";
	mouseUPROW = 16;
	var selitem = document.getElementById("x_GnRH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_GnRH" + i ).value = selitem;
		}
  	}
});
$('#x_GnRH17').mouseup(function(){
	mouseUPEL = "x_GnRH17";
	mouseUPROW = 17;
	var selitem = document.getElementById("x_GnRH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_GnRH" + i ).value = selitem;
		}
  	}
});
$('#x_GnRH18').mouseup(function(){
	mouseUPEL = "x_GnRH18";
	mouseUPROW = 18;
	var selitem = document.getElementById("x_GnRH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_GnRH" + i ).value = selitem;
		}
  	}
});
$('#x_GnRH19').mouseup(function(){
	mouseUPEL = "x_GnRH19";
	mouseUPROW = 19;
	var selitem = document.getElementById("x_GnRH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_GnRH" + i ).value = selitem;
		}
  	}
});
$('#x_GnRH20').mouseup(function(){
	mouseUPEL = "x_GnRH20";
	mouseUPROW = 20;
	var selitem = document.getElementById("x_GnRH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_GnRH" + i ).value = selitem;
		}
  	}
});
$('#x_GnRH21').mouseup(function(){
	mouseUPEL = "x_GnRH21";
	mouseUPROW = 21;
	var selitem = document.getElementById("x_GnRH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_GnRH" + i ).value = selitem;
		}
  	}
});
$('#x_GnRH22').mouseup(function(){
	mouseUPEL = "x_GnRH22";
	mouseUPROW = 22;
	var selitem = document.getElementById("x_GnRH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_GnRH" + i ).value = selitem;
		}
  	}
});
$('#x_GnRH23').mouseup(function(){
	mouseUPEL = "x_GnRH23";
	mouseUPROW = 23;
	var selitem = document.getElementById("x_GnRH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_GnRH" + i ).value = selitem;
		}
  	}
});
$('#x_GnRH24').mouseup(function(){
	mouseUPEL = "x_GnRH24";
	mouseUPROW = 24;
	var selitem = document.getElementById("x_GnRH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_GnRH" + i ).value = selitem;
		}
  	}
});
$('#x_GnRH25').mouseup(function(){
	mouseUPEL = "x_GnRH25";
	mouseUPROW = 25;
	var selitem = document.getElementById("x_GnRH" + sourceROW ).value;
	if(keydownval == 17)
	{
		for (i = sourceROW; i <= mouseUPROW; i++) {
			document.getElementById("x_GnRH" + i ).value = selitem;
		}
  	}
});
$('#x_GnRH1').click(function(){
	sorceEL = "x_GnRH1";
	sourceROW = 1;
});
$('#x_GnRH2').click(function(){
	sorceEL = "x_GnRH2";
	sourceROW = 2;
});
$('#x_GnRH3').click(function(){
	sorceEL = "x_GnRH3";
	sourceROW = 3;
});
$('#x_GnRH4').click(function(){
	sorceEL = "x_GnRH4";
	sourceROW = 4;
});
$('#x_GnRH5').click(function(){
	sorceEL = "x_GnRH5";
	sourceROW = 5;
});
$('#x_GnRH6').click(function(){
	sorceEL = "x_GnRH6";
	sourceROW = 6;
});
$('#x_GnRH7').click(function(){
	sorceEL = "x_GnRH7";
	sourceROW = 7;
});
$('#x_GnRH8').click(function(){
	sorceEL = "x_GnRH8";
	sourceROW = 8;
});
$('#x_GnRH9').click(function(){
	sorceEL = "x_GnRH9";
	sourceROW = 9;
});
$('#x_GnRH10').click(function(){
	sorceEL = "x_GnRH10";
	sourceROW = 10;
});
$('#x_GnRH11').click(function(){
	sorceEL = "x_GnRH11";
	sourceROW = 11;
});
$('#x_GnRH12').click(function(){
	sorceEL = "x_GnRH12";
	sourceROW = 12;
});
$('#x_GnRH13').click(function(){
	sorceEL = "x_GnRH13";
	sourceROW = 13;
});
$('#x_GnRH14').click(function(){
	sorceEL = "x_GnRH14";
	sourceROW = 14;
});
$('#x_GnRH15').click(function(){
	sorceEL = "x_GnRH15";
	sourceROW = 15;
});
$('#x_GnRH16').click(function(){
	sorceEL = "x_GnRH16";
	sourceROW = 16;
});
$('#x_GnRH17').click(function(){
	sorceEL = "x_GnRH17";
	sourceROW = 17;
});
$('#x_GnRH18').click(function(){
	sorceEL = "x_GnRH18";
	sourceROW = 18;
});
$('#x_GnRH19').click(function(){
	sorceEL = "x_GnRH19";
	sourceROW = 19;
});
$('#x_GnRH20').click(function(){
	sorceEL = "x_GnRH20";
	sourceROW = 20;
});
$('#x_GnRH21').click(function(){
	sorceEL = "x_GnRH21";
	sourceROW = 21;
});
$('#x_GnRH22').click(function(){
	sorceEL = "x_GnRH22";
	sourceROW = 22;
});
$('#x_GnRH23').click(function(){
	sorceEL = "x_GnRH23";
	sourceROW = 23;
});
$('#x_GnRH24').click(function(){
	sorceEL = "x_GnRH24";
	sourceROW = 24;
});
$('#x_GnRH25').click(function(){
	sorceEL = "x_GnRH25";
	sourceROW = 25;
});
$('#x_GnRH1').mousedown(function(){
	sorceEL = "x_GnRH1";
	sourceROW = 1;
});
$('#x_GnRH2').mousedown(function(){
	sorceEL = "x_GnRH2";
	sourceROW = 2;
});
$('#x_GnRH3').mousedown(function(){
	sorceEL = "x_GnRH3";
	sourceROW = 3;
});
$('#x_GnRH4').mousedown(function(){
	sorceEL = "x_GnRH4";
	sourceROW = 4;
});
$('#x_GnRH5').mousedown(function(){
	sorceEL = "x_GnRH5";
	sourceROW = 5;
});
$('#x_GnRH6').mousedown(function(){
	sorceEL = "x_GnRH6";
	sourceROW = 6;
});
$('#x_GnRH7').mousedown(function(){
	sorceEL = "x_GnRH7";
	sourceROW = 7;
});
$('#x_GnRH8').mousedown(function(){
	sorceEL = "x_GnRH8";
	sourceROW = 8;
});
$('#x_GnRH9').mousedown(function(){
	sorceEL = "x_GnRH9";
	sourceROW = 9;
});
$('#x_GnRH10').mousedown(function(){
	sorceEL = "x_GnRH10";
	sourceROW = 10;
});
$('#x_GnRH11').mousedown(function(){
	sorceEL = "x_GnRH11";
	sourceROW = 11;
});
$('#x_GnRH12').mousedown(function(){
	sorceEL = "x_GnRH12";
	sourceROW = 12;
});
$('#x_GnRH13').mousedown(function(){
	sorceEL = "x_GnRH13";
	sourceROW = 13;
});
$('#x_GnRH14').mousedown(function(){
	sorceEL = "x_GnRH14";
	sourceROW = 14;
});
$('#x_GnRH15').mousedown(function(){
	sorceEL = "x_GnRH15";
	sourceROW = 15;
});
$('#x_GnRH16').mousedown(function(){
	sorceEL = "x_GnRH16";
	sourceROW = 16;
});
$('#x_GnRH17').mousedown(function(){
	sorceEL = "x_GnRH17";
	sourceROW = 17;
});
$('#x_GnRH18').mousedown(function(){
	sorceEL = "x_GnRH18";
	sourceROW = 18;
});
$('#x_GnRH19').mousedown(function(){
	sorceEL = "x_GnRH19";
	sourceROW = 19;
});
$('#x_GnRH20').mousedown(function(){
	sorceEL = "x_GnRH20";
	sourceROW = 20;
});
$('#x_GnRH21').mousedown(function(){
	sorceEL = "x_GnRH21";
	sourceROW = 21;
});
$('#x_GnRH22').mousedown(function(){
	sorceEL = "x_GnRH22";
	sourceROW = 22;
});
$('#x_GnRH23').mousedown(function(){
	sorceEL = "x_GnRH23";
	sourceROW = 23;
});
$('#x_GnRH24').mousedown(function(){
	sorceEL = "x_GnRH24";
	sourceROW = 24;
});
$('#x_GnRH25').mousedown(function(){
	sorceEL = "x_GnRH25";
	sourceROW = 25;
});

//=============
//==========================
//===========

 document.getElementById("x_ARTCycle").style.width = "150px";
  document.getElementById("x_Protocol").style.width = "140px";
   document.getElementById("x_GROWTHHORMONE").style.width = "100px";
   document.getElementById("x_SemenFrozen").style.width = "100px";
   document.getElementById("x_TypeOfInfertility").style.width = "100px";
   document.getElementById("x_Duration").style.width = "100px";
   document.getElementById("x_TotalICSICycle").style.width = "100px";
   document.getElementById("x_A4ICSICycle").style.width = "100px";
   document.getElementById("x_IUICycles").style.width = "100px";
   document.getElementById("x_OvarianVolumeRT").style.width = "100px";
document.getElementById("x_RelevantHistory").style.width = "100px";
   document.getElementById("x_AFC").style.width = "100px";
   document.getElementById("x_MedicalFactors").style.width = "100px";
   document.getElementById("x_OvarianSurgery").style.width = "100px";
   document.getElementById("x_PRETREATMENT").style.width = "150px";
   document.getElementById("x_AMH").style.width = "100px";
   document.getElementById("x_INJTYPE").style.width = "100px";
   document.getElementById("x_LMP").style.width = "100px";
   document.getElementById("x_SCDate").style.width = "100px";
   document.getElementById("x_ANTAGONISTSTARTDAY").style.width = "100px";
   document.getElementById("x_Consultant").style.width = "100px";
   document.getElementById("x_InseminatinTechnique").style.width = "100px";
   document.getElementById("x_IndicationForART").style.width = "100px";
   document.getElementById("x_Hysteroscopy").style.width = "100px";
   document.getElementById("x_EndometrialScratching").style.width = "100px";
   document.getElementById("x_TrialCannulation").style.width = "100px";
   document.getElementById("x_CYCLETYPE").style.width = "100px";
   document.getElementById("x_HRTCYCLE").style.width = "100px";
   document.getElementById("x_OralEstrogenDosage").style.width = "100px";
   document.getElementById("x_VaginalEstrogen").style.width = "100px";
   document.getElementById("x_GCSF").style.width = "100px";
   document.getElementById("x_ActivatedPRP").style.width = "100px";
   document.getElementById("x_UCLcm").style.width = "100px";
   document.getElementById("x_DATOFEMBRYOTRANSFER").style.width = "100px";
   document.getElementById("x_DAYOFEMBRYOTRANSFER").style.width = "100px";
   document.getElementById("x_NOOFEMBRYOSTHAWED").style.width = "100px";
   document.getElementById("x_NOOFEMBRYOSTRANSFERRED").style.width = "100px";
   document.getElementById("x_DAYOFEMBRYOS").style.width = "100px";
   document.getElementById("x_CRYOPRESERVEDEMBRYOS").style.width = "100px";
   document.getElementById("x_TUBAL_PATENCY").style.width = "100px";
   document.getElementById("x_HSG").style.width = "100px";
   document.getElementById("x_DHL").style.width = "100px";
   document.getElementById("x_UTERINE_PROBLEMS").style.width = "100px";
   document.getElementById("x_W_COMORBIDS").style.width = "100px";
   document.getElementById("x_H_COMORBIDS").style.width = "100px";
   document.getElementById("x_SEXUAL_DYSFUNCTION").style.width = "100px";
   document.getElementById("x_TABLETS").style.width = "100px";
   document.getElementById("x_FOLLICLE_STATUS").style.width = "100px";
   document.getElementById("x_PROCEDURE").style.width = "100px";
   document.getElementById("x_LUTEAL_SUPPORT").style.width = "100px";
   document.getElementById("x_SPECIFIC_MATERNAL_PROBLEMS").style.width = "100px";
   document.getElementById("x_ONGOING_PREG").style.width = "100px";
   document.getElementById("x_EDD_Date").style.width = "100px";
   document.getElementById("x_TRIGGERR").style.width = "100px";
   document.getElementById("x_TRIGGERDATE").style.width = "100px";
   document.getElementById("x_SEMENPREPARATION").style.width = "100px";
   document.getElementById("x_OPUDATE").style.width = "100px";
   document.getElementById("x_DAYSOFSTIMULATION").style.width = "100px";
   document.getElementById("x_DOSEOFGONADOTROPINS").style.width = "100px";
   document.getElementById("x_ProgesteroneStart").style.width = "100px";
   document.getElementById("x_ANTAGONISTDAYS").style.width = "100px";
   document.getElementById("x_PreProcedureOrder").style.width = "100px";
   document.getElementById("x_Expectedoocytes").style.width = "100px";
   document.getElementById("x_DOCTORRESPONSIBLE").style.width = "100px";
   document.getElementById("x_ALLFREEZEINDICATION").style.width = "100px";
   document.getElementById("x_ERA").style.width = "100px";
   document.getElementById("x_REASONFORESET").style.width = "100px";
   document.getElementById("x_DATEOFET").style.width = "100px";
   document.getElementById("x_ET").style.width = "100px";
   document.getElementById("x_ESET").style.width = "100px";
   document.getElementById("x_DOET").style.width = "100px";
   document.getElementById("x_PGTA").style.width = "100px";
   document.getElementById("x_PGD").style.width = "100px";
 document.getElementById("x_StChDate1").style.width = "100px";
  document.getElementById("x_StChDate2").style.width = "100px";
  document.getElementById("x_StChDate3").style.width = "100px";
  document.getElementById("x_StChDate4").style.width = "100px";
  document.getElementById("x_StChDate5").style.width = "100px";
  document.getElementById("x_StChDate6").style.width = "100px";
  document.getElementById("x_StChDate7").style.width = "100px";
  document.getElementById("x_StChDate8").style.width = "100px";
  document.getElementById("x_StChDate9").style.width = "100px";
  document.getElementById("x_StChDate10").style.width = "100px";
  document.getElementById("x_StChDate11").style.width = "100px";
  document.getElementById("x_StChDate12").style.width = "100px";
  document.getElementById("x_StChDate13").style.width = "100px";
 document.getElementById("x_StChDate14").style.width = "100px";
  document.getElementById("x_StChDate15").style.width = "100px";
   document.getElementById("x_StChDate16").style.width = "100px";
	document.getElementById("x_StChDate17").style.width = "100px";
  document.getElementById("x_StChDate18").style.width = "100px";
  document.getElementById("x_StChDate19").style.width = "100px";
  document.getElementById("x_StChDate20").style.width = "100px";
  document.getElementById("x_StChDate21").style.width = "100px";
  document.getElementById("x_StChDate22").style.width = "100px";
  document.getElementById("x_StChDate23").style.width = "100px";
  document.getElementById("x_StChDate24").style.width = "100px";
  document.getElementById("x_StChDate25").style.width = "100px";
   document.getElementById("x_CycleDay1").style.width = "60px";
   document.getElementById("x_CycleDay2").style.width = "60px";
   document.getElementById("x_CycleDay3").style.width = "60px";
   document.getElementById("x_CycleDay4").style.width = "60px";
   document.getElementById("x_CycleDay5").style.width = "60px";
   document.getElementById("x_CycleDay6").style.width = "60px";
   document.getElementById("x_CycleDay7").style.width = "60px";
   document.getElementById("x_CycleDay8").style.width = "60px";
   document.getElementById("x_CycleDay9").style.width = "60px";
   document.getElementById("x_CycleDay10").style.width = "60px";
   document.getElementById("x_CycleDay11").style.width = "60px";
   document.getElementById("x_CycleDay12").style.width = "60px";
   document.getElementById("x_CycleDay13").style.width = "60px";
document.getElementById("x_CycleDay14").style.width = "60px";
document.getElementById("x_CycleDay15").style.width = "60px";
document.getElementById("x_CycleDay16").style.width = "60px";
document.getElementById("x_CycleDay17").style.width = "60px";
document.getElementById("x_CycleDay18").style.width = "60px";
document.getElementById("x_CycleDay19").style.width = "60px";
document.getElementById("x_CycleDay20").style.width = "60px";
document.getElementById("x_CycleDay21").style.width = "60px";
document.getElementById("x_CycleDay22").style.width = "60px";
document.getElementById("x_CycleDay23").style.width = "60px";
document.getElementById("x_CycleDay24").style.width = "60px";
document.getElementById("x_CycleDay25").style.width = "60px";
   document.getElementById("x_StimulationDay1").style.width = "60px";
   document.getElementById("x_StimulationDay2").style.width = "60px";
   document.getElementById("x_StimulationDay3").style.width = "60px";
   document.getElementById("x_StimulationDay4").style.width = "60px";
   document.getElementById("x_StimulationDay5").style.width = "60px";
   document.getElementById("x_StimulationDay6").style.width = "60px";
   document.getElementById("x_StimulationDay7").style.width = "60px";
   document.getElementById("x_StimulationDay8").style.width = "60px";
   document.getElementById("x_StimulationDay9").style.width = "60px";
   document.getElementById("x_StimulationDay10").style.width = "60px";
   document.getElementById("x_StimulationDay11").style.width = "60px";
   document.getElementById("x_StimulationDay12").style.width = "60px";
   document.getElementById("x_StimulationDay13").style.width = "60px";
document.getElementById("x_StimulationDay14").style.width = "60px";
document.getElementById("x_StimulationDay15").style.width = "60px";
document.getElementById("x_StimulationDay16").style.width = "60px";
document.getElementById("x_StimulationDay17").style.width = "60px";
document.getElementById("x_StimulationDay18").style.width = "60px";
document.getElementById("x_StimulationDay19").style.width = "60px";
document.getElementById("x_StimulationDay20").style.width = "60px";
document.getElementById("x_StimulationDay21").style.width = "60px";
document.getElementById("x_StimulationDay22").style.width = "60px";
document.getElementById("x_StimulationDay23").style.width = "60px";
document.getElementById("x_StimulationDay24").style.width = "60px";
document.getElementById("x_StimulationDay25").style.width = "60px";
   document.getElementById("x_E21").style.width = "60px";
   document.getElementById("x_E22").style.width = "60px";
   document.getElementById("x_E23").style.width = "60px";
   document.getElementById("x_E24").style.width = "60px";
   document.getElementById("x_E25").style.width = "60px";
   document.getElementById("x_E26").style.width = "60px";
   document.getElementById("x_E27").style.width = "60px";
   document.getElementById("x_E28").style.width = "60px";
   document.getElementById("x_E29").style.width = "60px";
   document.getElementById("x_E210").style.width = "60px";
   document.getElementById("x_E211").style.width = "60px";
   document.getElementById("x_E212").style.width = "60px";
   document.getElementById("x_E213").style.width = "60px";
   document.getElementById("x_E214").style.width = "60px";
   document.getElementById("x_E215").style.width = "60px";
   document.getElementById("x_E216").style.width = "60px";
   document.getElementById("x_E217").style.width = "60px";
   document.getElementById("x_E218").style.width = "60px";
   document.getElementById("x_E219").style.width = "60px";
   document.getElementById("x_E220").style.width = "60px";
   document.getElementById("x_E221").style.width = "60px";
   document.getElementById("x_E222").style.width = "60px";
   document.getElementById("x_E223").style.width = "60px";
   document.getElementById("x_E224").style.width = "60px";
   document.getElementById("x_E225").style.width = "60px";
   document.getElementById("x_P41").style.width = "60px";
   document.getElementById("x_P42").style.width = "60px";
   document.getElementById("x_P43").style.width = "60px";
   document.getElementById("x_P44").style.width = "60px";
   document.getElementById("x_P45").style.width = "60px";
   document.getElementById("x_P46").style.width = "60px";
   document.getElementById("x_P47").style.width = "60px";
   document.getElementById("x_P48").style.width = "60px";
   document.getElementById("x_P49").style.width = "60px";
   document.getElementById("x_P410").style.width = "60px";
   document.getElementById("x_P411").style.width = "60px";
   document.getElementById("x_P412").style.width = "60px";
   document.getElementById("x_P413").style.width = "60px";
   document.getElementById("x_P414").style.width = "60px";
   document.getElementById("x_P415").style.width = "60px";
   document.getElementById("x_P416").style.width = "60px";
   document.getElementById("x_P417").style.width = "60px";
   document.getElementById("x_P418").style.width = "60px";
   document.getElementById("x_P419").style.width = "60px";
   document.getElementById("x_P420").style.width = "60px";
   document.getElementById("x_P421").style.width = "60px";
   document.getElementById("x_P422").style.width = "60px";
   document.getElementById("x_P423").style.width = "60px";
   document.getElementById("x_P424").style.width = "60px";
   document.getElementById("x_P425").style.width = "60px";
   document.getElementById("x_USGRt1").style.width = "60px";
   document.getElementById("x_USGRt2").style.width = "60px";
   document.getElementById("x_USGRt3").style.width = "60px";
   document.getElementById("x_USGRt4").style.width = "60px";
   document.getElementById("x_USGRt5").style.width = "60px";
   document.getElementById("x_USGRt6").style.width = "60px";
   document.getElementById("x_USGRt7").style.width = "60px";
   document.getElementById("x_USGRt8").style.width = "60px";
   document.getElementById("x_USGRt9").style.width = "60px";
   document.getElementById("x_USGRt10").style.width = "60px";
   document.getElementById("x_USGRt11").style.width = "60px";
   document.getElementById("x_USGRt12").style.width = "60px";
   document.getElementById("x_USGRt13").style.width = "60px";
   document.getElementById("x_USGRt14").style.width = "60px";
   document.getElementById("x_USGRt15").style.width = "60px";
   document.getElementById("x_USGRt16").style.width = "60px";
   document.getElementById("x_USGRt17").style.width = "60px";
   document.getElementById("x_USGRt18").style.width = "60px";
   document.getElementById("x_USGRt19").style.width = "60px";
   document.getElementById("x_USGRt20").style.width = "60px";
   document.getElementById("x_USGRt21").style.width = "60px";
   document.getElementById("x_USGRt22").style.width = "60px";
   document.getElementById("x_USGRt23").style.width = "60px";
   document.getElementById("x_USGRt24").style.width = "60px";
   document.getElementById("x_USGRt25").style.width = "60px";
   document.getElementById("x_USGLt1").style.width = "60px";
   document.getElementById("x_USGLt2").style.width = "60px";
   document.getElementById("x_USGLt3").style.width = "60px";
   document.getElementById("x_USGLt4").style.width = "60px";
   document.getElementById("x_USGLt5").style.width = "60px";
   document.getElementById("x_USGLt6").style.width = "60px";
   document.getElementById("x_USGLt7").style.width = "60px";
   document.getElementById("x_USGLt8").style.width = "60px";
   document.getElementById("x_USGLt9").style.width = "60px";
   document.getElementById("x_USGLt10").style.width = "60px";
   document.getElementById("x_USGLt11").style.width = "60px";
   document.getElementById("x_USGLt12").style.width = "60px";
   document.getElementById("x_USGLt13").style.width = "60px";
   document.getElementById("x_USGLt14").style.width = "60px";
   document.getElementById("x_USGLt15").style.width = "60px";
   document.getElementById("x_USGLt16").style.width = "60px";
   document.getElementById("x_USGLt17").style.width = "60px";
   document.getElementById("x_USGLt18").style.width = "60px";
   document.getElementById("x_USGLt19").style.width = "60px";
   document.getElementById("x_USGLt20").style.width = "60px";
   document.getElementById("x_USGLt21").style.width = "60px";
   document.getElementById("x_USGLt22").style.width = "60px";
   document.getElementById("x_USGLt23").style.width = "60px";
   document.getElementById("x_USGLt24").style.width = "60px";
   document.getElementById("x_USGLt25").style.width = "60px";
   document.getElementById("x_EM1").style.width = "60px";
   document.getElementById("x_EM2").style.width = "60px";
   document.getElementById("x_EM3").style.width = "60px";
   document.getElementById("x_EM4").style.width = "60px";
   document.getElementById("x_EM5").style.width = "60px";
   document.getElementById("x_EM6").style.width = "60px";
   document.getElementById("x_EM7").style.width = "60px";
   document.getElementById("x_EM8").style.width = "60px";
   document.getElementById("x_EM9").style.width = "60px";
   document.getElementById("x_EM10").style.width = "60px";
   document.getElementById("x_EM11").style.width = "60px";
   document.getElementById("x_EM12").style.width = "60px";
   document.getElementById("x_EM13").style.width = "60px";
   document.getElementById("x_EM14").style.width = "60px";
   document.getElementById("x_EM15").style.width = "60px";
   document.getElementById("x_EM16").style.width = "60px";
   document.getElementById("x_EM17").style.width = "60px";
   document.getElementById("x_EM18").style.width = "60px";
   document.getElementById("x_EM19").style.width = "60px";
   document.getElementById("x_EM20").style.width = "60px";
   document.getElementById("x_EM21").style.width = "60px";
   document.getElementById("x_EM22").style.width = "60px";
   document.getElementById("x_EM23").style.width = "60px";
   document.getElementById("x_EM24").style.width = "60px";
   document.getElementById("x_EM25").style.width = "60px";
   document.getElementById("x_Others1").style.width = "60px";
   document.getElementById("x_Others2").style.width = "60px";
   document.getElementById("x_Others3").style.width = "60px";
   document.getElementById("x_Others4").style.width = "60px";
   document.getElementById("x_Others5").style.width = "60px";
   document.getElementById("x_Others6").style.width = "60px";
   document.getElementById("x_Others7").style.width = "60px";
   document.getElementById("x_Others8").style.width = "60px";
   document.getElementById("x_Others9").style.width = "60px";
   document.getElementById("x_Others10").style.width = "60px";
   document.getElementById("x_Others11").style.width = "60px";
   document.getElementById("x_Others12").style.width = "60px";
   document.getElementById("x_Others13").style.width = "60px";
   document.getElementById("x_Others14").style.width = "60px";
   document.getElementById("x_Others15").style.width = "60px";
   document.getElementById("x_Others16").style.width = "60px";
   document.getElementById("x_Others17").style.width = "60px";
   document.getElementById("x_Others18").style.width = "60px";
   document.getElementById("x_Others19").style.width = "60px";
   document.getElementById("x_Others20").style.width = "60px";
   document.getElementById("x_Others21").style.width = "60px";
   document.getElementById("x_Others22").style.width = "60px";
   document.getElementById("x_Others23").style.width = "60px";
   document.getElementById("x_Others24").style.width = "60px";
   document.getElementById("x_Others25").style.width = "60px";
   document.getElementById("x_DR1").style.width = "60px";
   document.getElementById("x_DR2").style.width = "60px";
   document.getElementById("x_DR3").style.width = "60px";
   document.getElementById("x_DR4").style.width = "60px";
   document.getElementById("x_DR5").style.width = "60px";
   document.getElementById("x_DR6").style.width = "60px";
   document.getElementById("x_DR7").style.width = "60px";
   document.getElementById("x_DR8").style.width = "60px";
   document.getElementById("x_DR9").style.width = "60px";
   document.getElementById("x_DR10").style.width = "60px";
   document.getElementById("x_DR11").style.width = "60px";
   document.getElementById("x_DR12").style.width = "60px";
   document.getElementById("x_DR13").style.width = "60px";
   document.getElementById("x_DR14").style.width = "60px";
   document.getElementById("x_DR15").style.width = "60px";
   document.getElementById("x_DR16").style.width = "60px";
   document.getElementById("x_DR17").style.width = "60px";
   document.getElementById("x_DR18").style.width = "60px";
   document.getElementById("x_DR19").style.width = "60px";
   document.getElementById("x_DR20").style.width = "60px";
   document.getElementById("x_DR21").style.width = "60px";
   document.getElementById("x_DR22").style.width = "60px";
   document.getElementById("x_DR23").style.width = "60px";
   document.getElementById("x_DR24").style.width = "60px";
   document.getElementById("x_DR25").style.width = "60px";
   document.getElementById("x_Tablet1").style.width = "120px";
   document.getElementById("x_Tablet2").style.width = "156px";
   document.getElementById("x_Tablet3").style.width = "156px";
   document.getElementById("x_Tablet4").style.width = "156px";
   document.getElementById("x_Tablet5").style.width = "156px";
   document.getElementById("x_Tablet6").style.width = "156px";
   document.getElementById("x_Tablet7").style.width = "156px";
   document.getElementById("x_Tablet8").style.width = "156px";
   document.getElementById("x_Tablet9").style.width = "156px";
   document.getElementById("x_Tablet10").style.width = "156px";
   document.getElementById("x_Tablet11").style.width = "156px";
   document.getElementById("x_Tablet12").style.width = "156px";
   document.getElementById("x_Tablet13").style.width = "156px";
   document.getElementById("x_Tablet14").style.width = "156px";
   document.getElementById("x_Tablet15").style.width = "156px";
   document.getElementById("x_Tablet16").style.width = "156px";
   document.getElementById("x_Tablet17").style.width = "156px";
   document.getElementById("x_Tablet18").style.width = "156px";
   document.getElementById("x_Tablet19").style.width = "156px";
   document.getElementById("x_Tablet20").style.width = "156px";
   document.getElementById("x_Tablet21").style.width = "156px";
   document.getElementById("x_Tablet22").style.width = "156px";
   document.getElementById("x_Tablet23").style.width = "156px";
   document.getElementById("x_Tablet24").style.width = "156px";
   document.getElementById("x_Tablet25").style.width = "156px";
   document.getElementById("x_RFSH1").style.width = "120px";
   document.getElementById("x_RFSH2").style.width = "156px";
   document.getElementById("x_RFSH3").style.width = "156px";
   document.getElementById("x_RFSH4").style.width = "156px";
   document.getElementById("x_RFSH5").style.width = "156px";
   document.getElementById("x_RFSH6").style.width = "156px";
   document.getElementById("x_RFSH7").style.width = "156px";
   document.getElementById("x_RFSH8").style.width = "156px";
   document.getElementById("x_RFSH9").style.width = "156px";
   document.getElementById("x_RFSH10").style.width = "156px";
   document.getElementById("x_RFSH11").style.width = "156px";
   document.getElementById("x_RFSH12").style.width = "156px";
   document.getElementById("x_RFSH13").style.width = "156px";
   document.getElementById("x_RFSH14").style.width = "156px";
   document.getElementById("x_RFSH15").style.width = "156px";
   document.getElementById("x_RFSH16").style.width = "156px";
   document.getElementById("x_RFSH17").style.width = "156px";
   document.getElementById("x_RFSH18").style.width = "156px";
   document.getElementById("x_RFSH19").style.width = "156px";
   document.getElementById("x_RFSH20").style.width = "156px";
   document.getElementById("x_RFSH21").style.width = "156px";
   document.getElementById("x_RFSH22").style.width = "156px";
   document.getElementById("x_RFSH23").style.width = "156px";
   document.getElementById("x_RFSH24").style.width = "156px";
   document.getElementById("x_RFSH25").style.width = "156px";
   document.getElementById("x_HMG1").style.width = "120px";
   document.getElementById("x_HMG2").style.width = "156px";
   document.getElementById("x_HMG3").style.width = "156px";
   document.getElementById("x_HMG4").style.width = "156px";
   document.getElementById("x_HMG5").style.width = "156px";
   document.getElementById("x_HMG6").style.width = "156px";
   document.getElementById("x_HMG7").style.width = "156px";
   document.getElementById("x_HMG8").style.width = "156px";
   document.getElementById("x_HMG9").style.width = "156px";
   document.getElementById("x_HMG10").style.width = "156px";
   document.getElementById("x_HMG11").style.width = "156px";
   document.getElementById("x_HMG12").style.width = "156px";
   document.getElementById("x_HMG13").style.width = "156px";
   document.getElementById("x_HMG14").style.width = "156px";
   document.getElementById("x_HMG15").style.width = "156px";
   document.getElementById("x_HMG16").style.width = "156px";
   document.getElementById("x_HMG17").style.width = "156px";
   document.getElementById("x_HMG18").style.width = "156px";
   document.getElementById("x_HMG19").style.width = "156px";
   document.getElementById("x_HMG20").style.width = "156px";
   document.getElementById("x_HMG21").style.width = "156px";
   document.getElementById("x_HMG22").style.width = "156px";
   document.getElementById("x_HMG23").style.width = "156px";
   document.getElementById("x_HMG24").style.width = "156px";
   document.getElementById("x_HMG25").style.width = "156px";
   document.getElementById("x_GnRH1").style.width = "110px";
   document.getElementById("x_GnRH2").style.width = "146px";
   document.getElementById("x_GnRH3").style.width = "146px";
   document.getElementById("x_GnRH4").style.width = "146px";
   document.getElementById("x_GnRH5").style.width = "146px";
   document.getElementById("x_GnRH6").style.width = "146px";
   document.getElementById("x_GnRH7").style.width = "146px";
   document.getElementById("x_GnRH8").style.width = "146px";
   document.getElementById("x_GnRH9").style.width = "146px";
   document.getElementById("x_GnRH10").style.width = "146px";
   document.getElementById("x_GnRH11").style.width = "146px";
   document.getElementById("x_GnRH12").style.width = "146px";
   document.getElementById("x_GnRH13").style.width = "146px";
   document.getElementById("x_GnRH14").style.width = "146px";
   document.getElementById("x_GnRH15").style.width = "146px";
   document.getElementById("x_GnRH16").style.width = "146px";
   document.getElementById("x_GnRH17").style.width = "146px";
   document.getElementById("x_GnRH18").style.width = "146px";
   document.getElementById("x_GnRH19").style.width = "146px";
   document.getElementById("x_GnRH20").style.width = "146px";
   document.getElementById("x_GnRH21").style.width = "146px";
   document.getElementById("x_GnRH22").style.width = "146px";
   document.getElementById("x_GnRH23").style.width = "146px";
   document.getElementById("x_GnRH24").style.width = "146px";
   document.getElementById("x_GnRH25").style.width = "146px";
var tableE2 = document.getElementById("PreProcedureEEETTTDTE").style.display = "none";
var tableE2 = document.getElementById("ETTableStIIUUII").style.display = "none";
var tableE2 = document.getElementById("IUIivfcONVERTTER").style.display = "none";
	var artcycle = '<?php echo $resultsA[0]["ARTCYCLE"]; ?>';
	var Treatment = '<?php echo $resultsA[0]["Treatment"]; ?>';
	if (artcycle == 'Intrauterine insemination(IUI)') {
		var tableE2 = document.getElementById("tableE2").style.display = "none";
		var tableE2 = document.getElementById("tableE21").style.display = "none";
		var tableE2 = document.getElementById("tableE22").style.display = "none";
		var tableE2 = document.getElementById("tableE23").style.display = "none";
		var tableE2 = document.getElementById("tableE24").style.display = "none";
		var tableE2 = document.getElementById("tableE25").style.display = "none";
		var tableE2 = document.getElementById("tableE26").style.display = "none";
		var tableE2 = document.getElementById("tableE27").style.display = "none";
		var tableE2 = document.getElementById("tableE28").style.display = "none";
		var tableE2 = document.getElementById("tableE29").style.display = "none";
		var tableE2 = document.getElementById("tableE210").style.display = "none";
		var tableE2 = document.getElementById("tableE211").style.display = "none";
		var tableE2 = document.getElementById("tableE212").style.display = "none";
		var tableE2 = document.getElementById("tableE213").style.display = "none";
		var tableE2 = document.getElementById("tableE214").style.display = "none";
		var tableE2 = document.getElementById("tableE215").style.display = "none";
		var tableE2 = document.getElementById("tableE216").style.display = "none";
		var tableE2 = document.getElementById("tableE217").style.display = "none";
		var tableE2 = document.getElementById("tableE218").style.display = "none";
		var tableE2 = document.getElementById("tableE219").style.display = "none";
		var tableE2 = document.getElementById("tableE220").style.display = "none";
		var tableE2 = document.getElementById("tableE221").style.display = "none";
		var tableE2 = document.getElementById("tableE222").style.display = "none";
		var tableE2 = document.getElementById("tableE223").style.display = "none";
		var tableE2 = document.getElementById("tableE224").style.display = "none";
		var tableE2 = document.getElementById("tableE225").style.display = "none";
		var RowPreProcedureOrder = document.getElementById("RowPreProcedureOrder").style.display = "none";
		var RowALLFREEZEINDICATION = document.getElementById("RowALLFREEZEINDICATION").style.display = "none";
		var RowDATEOFET = document.getElementById("RowDATEOFET").style.display = "none";
		var colPGTA = document.getElementById("colPGTA").style.display = "none";
		var colPGD = document.getElementById("colPGD").style.display = "none";

	//	var colATHOMEorCLINIC = document.getElementById("colATHOMEorCLINIC").style.display = "none";
	 	var fieldOPUDATE = document.getElementById("fieldOPUDATE");//.innerHTML = "IUI Date";
		fieldOPUDATE.firstElementChild.innerText = "IUI Date";
		var x_OPUDATE = document.getElementById("x_OPUDATE");//.innerHTML = "IUI Date";
		x_OPUDATE.placeholder = "IUI Date";

	//	var colP4 = document.getElementById("colP4").innerHTML = "A/CC";
		var ProjectronVisible = document.getElementById("ProjectronVisible").style.display = "none";
		var AllFreezeVisible = document.getElementById("AllFreezeVisible").style.display = "none";
		var ANTAGONISTDAYSstum = document.getElementById("ANTAGONISTDAYSstum").style.display = "none";
		var tableE2 = document.getElementById("ETTableStIIUUII").style.display = "block";
		var tableE2 = document.getElementById("IUIivfcONVERTTER").style.display = "block";
	}
	if (artcycle === 'Frozen Embryo Transfer' || artcycle === 'Evaluation cycle' ) {
var colE2 = document.getElementById("colE2").innerHTML = "VE";
var colP4 = document.getElementById("colP4").innerHTML = "Patches";
var colUSGRt = document.getElementById("colUSGRt").innerHTML = "Progesterone";
var colUSGLt = document.getElementById("colUSGLt").innerHTML = "Ult";
var colET = document.getElementById("colET").innerHTML = "ET";
var colOthers = document.getElementById("colOthers").innerHTML = "Pattern";
var colDr = document.getElementById("colDr").innerHTML = "Observation";
		var tableStimulationday = document.getElementById("tableStimulationday").style.display = "none";
		var tableStimulationday = document.getElementById("tableStimulationday1").style.display = "none";
		var tableStimulationday = document.getElementById("tableStimulationday2").style.display = "none";
		var tableStimulationday = document.getElementById("tableStimulationday3").style.display = "none";
		var tableStimulationday = document.getElementById("tableStimulationday4").style.display = "none";
		var tableStimulationday = document.getElementById("tableStimulationday5").style.display = "none";
		var tableStimulationday = document.getElementById("tableStimulationday6").style.display = "none";
		var tableStimulationday = document.getElementById("tableStimulationday7").style.display = "none";
		var tableStimulationday = document.getElementById("tableStimulationday8").style.display = "none";
		var tableStimulationday = document.getElementById("tableStimulationday9").style.display = "none";
		var tableStimulationday = document.getElementById("tableStimulationday10").style.display = "none";
		var tableStimulationday = document.getElementById("tableStimulationday11").style.display = "none";
		var tableStimulationday = document.getElementById("tableStimulationday12").style.display = "none";
		var tableStimulationday = document.getElementById("tableStimulationday13").style.display = "none";
var tableStimulationday = document.getElementById("tableStimulationday14").style.display = "none";
var tableStimulationday = document.getElementById("tableStimulationday15").style.display = "none";
var tableStimulationday = document.getElementById("tableStimulationday16").style.display = "none";
var tableStimulationday = document.getElementById("tableStimulationday17").style.display = "none";
var tableStimulationday = document.getElementById("tableStimulationday18").style.display = "none";
var tableStimulationday = document.getElementById("tableStimulationday19").style.display = "none";
var tableStimulationday = document.getElementById("tableStimulationday20").style.display = "none";
var tableStimulationday = document.getElementById("tableStimulationday21").style.display = "none";
var tableStimulationday = document.getElementById("tableStimulationday22").style.display = "none";
var tableStimulationday = document.getElementById("tableStimulationday23").style.display = "none";
var tableStimulationday = document.getElementById("tableStimulationday24").style.display = "none";
var tableStimulationday = document.getElementById("tableStimulationday25").style.display = "none";
		var tableTablet = document.getElementById("tableTablet").style.display = "none";
		var tableTablet = document.getElementById("tableTablet1").style.display = "none";
		var tableTablet = document.getElementById("tableTablet2").style.display = "none";
		var tableTablet = document.getElementById("tableTablet3").style.display = "none";
		var tableTablet = document.getElementById("tableTablet4").style.display = "none";
		var tableTablet = document.getElementById("tableTablet5").style.display = "none";
		var tableTablet = document.getElementById("tableTablet6").style.display = "none";
		var tableTablet = document.getElementById("tableTablet7").style.display = "none";
		var tableTablet = document.getElementById("tableTablet8").style.display = "none";
		var tableTablet = document.getElementById("tableTablet9").style.display = "none";
		var tableTablet = document.getElementById("tableTablet10").style.display = "none";
		var tableTablet = document.getElementById("tableTablet11").style.display = "none";
		var tableTablet = document.getElementById("tableTablet12").style.display = "none";
		var tableTablet = document.getElementById("tableTablet13").style.display = "none";
		var tableTablet = document.getElementById("tableTablet14").style.display = "none";
		var tableTablet = document.getElementById("tableTablet15").style.display = "none";
		var tableTablet = document.getElementById("tableTablet16").style.display = "none";
		var tableTablet = document.getElementById("tableTablet17").style.display = "none";
		var tableTablet = document.getElementById("tableTablet18").style.display = "none";
		var tableTablet = document.getElementById("tableTablet19").style.display = "none";
		var tableTablet = document.getElementById("tableTablet20").style.display = "none";
		var tableTablet = document.getElementById("tableTablet21").style.display = "none";
		var tableTablet = document.getElementById("tableTablet22").style.display = "none";
		var tableTablet = document.getElementById("tableTablet23").style.display = "none";
		var tableTablet = document.getElementById("tableTablet24").style.display = "none";
		var tableTablet = document.getElementById("tableTablet25").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH1").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH2").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH3").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH4").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH5").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH6").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH7").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH8").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH9").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH10").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH11").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH12").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH13").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH14").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH15").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH16").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH17").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH18").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH19").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH20").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH21").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH22").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH23").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH24").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH25").style.display = "none";
		var tableHMG = document.getElementById("tableHMG").style.display = "none";
		var tableHMG = document.getElementById("tableHMG1").style.display = "none";
		var tableHMG = document.getElementById("tableHMG2").style.display = "none";
		var tableHMG = document.getElementById("tableHMG3").style.display = "none";
		var tableHMG = document.getElementById("tableHMG4").style.display = "none";
		var tableHMG = document.getElementById("tableHMG5").style.display = "none";
		var tableHMG = document.getElementById("tableHMG6").style.display = "none";
		var tableHMG = document.getElementById("tableHMG7").style.display = "none";
		var tableHMG = document.getElementById("tableHMG8").style.display = "none";
		var tableHMG = document.getElementById("tableHMG9").style.display = "none";
		var tableHMG = document.getElementById("tableHMG10").style.display = "none";
		var tableHMG = document.getElementById("tableHMG11").style.display = "none";
		var tableHMG = document.getElementById("tableHMG12").style.display = "none";
		var tableHMG = document.getElementById("tableHMG13").style.display = "none";
		var tableHMG = document.getElementById("tableHMG14").style.display = "none";
		var tableHMG = document.getElementById("tableHMG15").style.display = "none";
		var tableHMG = document.getElementById("tableHMG16").style.display = "none";
		var tableHMG = document.getElementById("tableHMG17").style.display = "none";
		var tableHMG = document.getElementById("tableHMG18").style.display = "none";
		var tableHMG = document.getElementById("tableHMG19").style.display = "none";
		var tableHMG = document.getElementById("tableHMG20").style.display = "none";
		var tableHMG = document.getElementById("tableHMG21").style.display = "none";
		var tableHMG = document.getElementById("tableHMG22").style.display = "none";
		var tableHMG = document.getElementById("tableHMG23").style.display = "none";
		var tableHMG = document.getElementById("tableHMG24").style.display = "none";
		var tableHMG = document.getElementById("tableHMG25").style.display = "none";
		var rowTypeOfInfertility = document.getElementById("rowTypeOfInfertility").style.display = "none";
		var rowIUICycles = document.getElementById("rowIUICycles").style.display = "none";
		var rowMedicalFactors = document.getElementById("rowMedicalFactors").style.display = "none";
		var fieldINJTYPE = document.getElementById("fieldINJTYPE").style.display = "none";
		var fieldLMP = document.getElementById("fieldLMP").style.display = "none";
		var fieldANTAGONISTSTARTDAY = document.getElementById("fieldANTAGONISTSTARTDAY").style.display = "none";
		var fieldProtocol = document.getElementById("fieldProtocol").style.display = "none";
		var fieldGROWTHHORMONE = document.getElementById("fieldGROWTHHORMONE").style.display = "none";
		var fieldSemenFrozen = document.getElementById("fieldSemenFrozen").style.display = "none";
		var ETTableSt = document.getElementById("ETTableSt").style.display = "block";
var ProjectronVisible = document.getElementById("ProjectronVisible").style.display = "block";
var AllFreezeVisible = document.getElementById("AllFreezeVisible").style.display = "none";
var ProgesteroneAdminTable = document.getElementById("ProgesteroneAdminTable").style.display = "none";
var ProjectronVisible = document.getElementById("ProjectronVisible").style.display = "block";
			var fieldSemenFrozen = document.getElementById("RowPreProcedureOrder").style.display = "none";
			var fieldSemenFrozen = document.getElementById("RowALLFREEZEINDICATION").style.display = "none";
			var fieldSemenFrozen = document.getElementById("PreProcedureOrderPPOOUU").style.display = "none";
			var tableE2 = document.getElementById("PreProcedureEEETTTDTE").style.display = "block";
	}else{
		var ETTableSt = document.getElementById("ETTableSt").style.display = "none";
		 if (artcycle != 'Intrauterine insemination(IUI)') {

		 	//	var ProjectronVisible = document.getElementById("ProjectronVisible").style.display = "block";
		 		var AllFreezeVisible = document.getElementById("AllFreezeVisible").style.display = "block";
		 }
		 var ProgesteroneAdminTable = document.getElementById("ProgesteroneAdminTable").style.display = "none";
	}
	if(Treatment == 'Fresh ET' || Treatment == 'Frozen ET' || Treatment == 'OD Fresh ET' || Treatment == 'OD Frozen ET' || Treatment == 'OD ICSI')
	{
var colE2 = document.getElementById("colE2").innerHTML = "VE";
var colP4 = document.getElementById("colP4").innerHTML = "Patches";
var colUSGRt = document.getElementById("colUSGRt").innerHTML = "Progesterone";
var colUSGLt = document.getElementById("colUSGLt").innerHTML = "Ult";
var colET = document.getElementById("colET").innerHTML = "ET";
var colOthers = document.getElementById("colOthers").innerHTML = "Pattern";
var colDr = document.getElementById("colDr").innerHTML = "Observation";
		var tableStimulationday = document.getElementById("tableStimulationday").style.display = "none";
		var tableStimulationday = document.getElementById("tableStimulationday1").style.display = "none";
		var tableStimulationday = document.getElementById("tableStimulationday2").style.display = "none";
		var tableStimulationday = document.getElementById("tableStimulationday3").style.display = "none";
		var tableStimulationday = document.getElementById("tableStimulationday4").style.display = "none";
		var tableStimulationday = document.getElementById("tableStimulationday5").style.display = "none";
		var tableStimulationday = document.getElementById("tableStimulationday6").style.display = "none";
		var tableStimulationday = document.getElementById("tableStimulationday7").style.display = "none";
		var tableStimulationday = document.getElementById("tableStimulationday8").style.display = "none";
		var tableStimulationday = document.getElementById("tableStimulationday9").style.display = "none";
		var tableStimulationday = document.getElementById("tableStimulationday10").style.display = "none";
		var tableStimulationday = document.getElementById("tableStimulationday11").style.display = "none";
		var tableStimulationday = document.getElementById("tableStimulationday12").style.display = "none";
		var tableStimulationday = document.getElementById("tableStimulationday13").style.display = "none";
var tableStimulationday = document.getElementById("tableStimulationday14").style.display = "none";
var tableStimulationday = document.getElementById("tableStimulationday15").style.display = "none";
var tableStimulationday = document.getElementById("tableStimulationday16").style.display = "none";
var tableStimulationday = document.getElementById("tableStimulationday17").style.display = "none";
var tableStimulationday = document.getElementById("tableStimulationday18").style.display = "none";
var tableStimulationday = document.getElementById("tableStimulationday19").style.display = "none";
var tableStimulationday = document.getElementById("tableStimulationday20").style.display = "none";
var tableStimulationday = document.getElementById("tableStimulationday21").style.display = "none";
var tableStimulationday = document.getElementById("tableStimulationday22").style.display = "none";
var tableStimulationday = document.getElementById("tableStimulationday23").style.display = "none";
var tableStimulationday = document.getElementById("tableStimulationday24").style.display = "none";
var tableStimulationday = document.getElementById("tableStimulationday25").style.display = "none";
		var tableTablet = document.getElementById("tableTablet").style.display = "none";
		var tableTablet = document.getElementById("tableTablet1").style.display = "none";
		var tableTablet = document.getElementById("tableTablet2").style.display = "none";
		var tableTablet = document.getElementById("tableTablet3").style.display = "none";
		var tableTablet = document.getElementById("tableTablet4").style.display = "none";
		var tableTablet = document.getElementById("tableTablet5").style.display = "none";
		var tableTablet = document.getElementById("tableTablet6").style.display = "none";
		var tableTablet = document.getElementById("tableTablet7").style.display = "none";
		var tableTablet = document.getElementById("tableTablet8").style.display = "none";
		var tableTablet = document.getElementById("tableTablet9").style.display = "none";
		var tableTablet = document.getElementById("tableTablet10").style.display = "none";
		var tableTablet = document.getElementById("tableTablet11").style.display = "none";
		var tableTablet = document.getElementById("tableTablet12").style.display = "none";
		var tableTablet = document.getElementById("tableTablet13").style.display = "none";
		var tableTablet = document.getElementById("tableTablet14").style.display = "none";
		var tableTablet = document.getElementById("tableTablet15").style.display = "none";
		var tableTablet = document.getElementById("tableTablet16").style.display = "none";
		var tableTablet = document.getElementById("tableTablet17").style.display = "none";
		var tableTablet = document.getElementById("tableTablet18").style.display = "none";
		var tableTablet = document.getElementById("tableTablet19").style.display = "none";
		var tableTablet = document.getElementById("tableTablet20").style.display = "none";
		var tableTablet = document.getElementById("tableTablet21").style.display = "none";
		var tableTablet = document.getElementById("tableTablet22").style.display = "none";
		var tableTablet = document.getElementById("tableTablet23").style.display = "none";
		var tableTablet = document.getElementById("tableTablet24").style.display = "none";
		var tableTablet = document.getElementById("tableTablet25").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH1").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH2").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH3").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH4").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH5").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH6").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH7").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH8").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH9").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH10").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH11").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH12").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH13").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH14").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH15").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH16").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH17").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH18").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH19").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH20").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH21").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH22").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH23").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH24").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH25").style.display = "none";
		var tableHMG = document.getElementById("tableHMG").style.display = "none";
		var tableHMG = document.getElementById("tableHMG1").style.display = "none";
		var tableHMG = document.getElementById("tableHMG2").style.display = "none";
		var tableHMG = document.getElementById("tableHMG3").style.display = "none";
		var tableHMG = document.getElementById("tableHMG4").style.display = "none";
		var tableHMG = document.getElementById("tableHMG5").style.display = "none";
		var tableHMG = document.getElementById("tableHMG6").style.display = "none";
		var tableHMG = document.getElementById("tableHMG7").style.display = "none";
		var tableHMG = document.getElementById("tableHMG8").style.display = "none";
		var tableHMG = document.getElementById("tableHMG9").style.display = "none";
		var tableHMG = document.getElementById("tableHMG10").style.display = "none";
		var tableHMG = document.getElementById("tableHMG11").style.display = "none";
		var tableHMG = document.getElementById("tableHMG12").style.display = "none";
		var tableHMG = document.getElementById("tableHMG13").style.display = "none";
		var tableHMG = document.getElementById("tableHMG14").style.display = "none";
		var tableHMG = document.getElementById("tableHMG15").style.display = "none";
		var tableHMG = document.getElementById("tableHMG16").style.display = "none";
		var tableHMG = document.getElementById("tableHMG17").style.display = "none";
		var tableHMG = document.getElementById("tableHMG18").style.display = "none";
		var tableHMG = document.getElementById("tableHMG19").style.display = "none";
		var tableHMG = document.getElementById("tableHMG20").style.display = "none";
		var tableHMG = document.getElementById("tableHMG21").style.display = "none";
		var tableHMG = document.getElementById("tableHMG22").style.display = "none";
		var tableHMG = document.getElementById("tableHMG23").style.display = "none";
		var tableHMG = document.getElementById("tableHMG24").style.display = "none";
		var tableHMG = document.getElementById("tableHMG25").style.display = "none";
		var tableTablet = document.getElementById("tableTablet").style.display = "none";
		var tableTablet = document.getElementById("tableTablet1").style.display = "none";
		var tableTablet = document.getElementById("tableTablet2").style.display = "none";
		var tableTablet = document.getElementById("tableTablet3").style.display = "none";
		var tableTablet = document.getElementById("tableTablet4").style.display = "none";
		var tableTablet = document.getElementById("tableTablet5").style.display = "none";
		var tableTablet = document.getElementById("tableTablet6").style.display = "none";
		var tableTablet = document.getElementById("tableTablet7").style.display = "none";
		var tableTablet = document.getElementById("tableTablet8").style.display = "none";
		var tableTablet = document.getElementById("tableTablet9").style.display = "none";
		var tableTablet = document.getElementById("tableTablet10").style.display = "none";
		var tableTablet = document.getElementById("tableTablet11").style.display = "none";
		var tableTablet = document.getElementById("tableTablet12").style.display = "none";
		var tableTablet = document.getElementById("tableTablet13").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH1").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH2").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH3").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH4").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH5").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH6").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH7").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH8").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH9").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH10").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH11").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH12").style.display = "none";
		var tableRFSH = document.getElementById("tableRFSH13").style.display = "none";
		var tableHMG = document.getElementById("tableHMG").style.display = "none";
		var tableHMG = document.getElementById("tableHMG1").style.display = "none";
		var tableHMG = document.getElementById("tableHMG2").style.display = "none";
		var tableHMG = document.getElementById("tableHMG3").style.display = "none";
		var tableHMG = document.getElementById("tableHMG4").style.display = "none";
		var tableHMG = document.getElementById("tableHMG5").style.display = "none";
		var tableHMG = document.getElementById("tableHMG6").style.display = "none";
		var tableHMG = document.getElementById("tableHMG7").style.display = "none";
		var tableHMG = document.getElementById("tableHMG8").style.display = "none";
		var tableHMG = document.getElementById("tableHMG9").style.display = "none";
		var tableHMG = document.getElementById("tableHMG10").style.display = "none";
		var tableHMG = document.getElementById("tableHMG11").style.display = "none";
		var tableHMG = document.getElementById("tableHMG12").style.display = "none";
		var tableHMG = document.getElementById("tableHMG13").style.display = "none";
		var rowTypeOfInfertility = document.getElementById("rowTypeOfInfertility").style.display = "none";
		var rowIUICycles = document.getElementById("rowIUICycles").style.display = "none";
		var rowMedicalFactors = document.getElementById("rowMedicalFactors").style.display = "none";
		var fieldINJTYPE = document.getElementById("fieldINJTYPE").style.display = "none";
		var fieldLMP = document.getElementById("fieldLMP").style.display = "none";
		var fieldANTAGONISTSTARTDAY = document.getElementById("fieldANTAGONISTSTARTDAY").style.display = "none";
		var fieldProtocol = document.getElementById("fieldProtocol").style.display = "none";
		var fieldGROWTHHORMONE = document.getElementById("fieldGROWTHHORMONE").style.display = "none";
		var fieldSemenFrozen = document.getElementById("fieldSemenFrozen").style.display = "none";
		var ETTableSt = document.getElementById("ETTableSt").style.display = "block";
var ProjectronVisible = document.getElementById("ProjectronVisible").style.display = "block";
var AllFreezeVisible = document.getElementById("AllFreezeVisible").style.display = "none";
var ProgesteroneAdminTable = document.getElementById("ProgesteroneAdminTable").style.display = "none";
	}
if(Treatment == "ICSI H")
{
	var tableE2 = document.getElementById("IUIivfcONVERTTER").style.display = "block";
	var ProjectronVisible = document.getElementById("ProjectronVisible").style.display = "none";
}
if(Treatment == 'OD ICSI')
{
			var fieldSemenFrozen = document.getElementById("PreProcedureOrderPPOOUU").style.display = "none";
			var tableE2 = document.getElementById("PreProcedureEEETTTDTE").style.display = "block";
}

//if(Treatment == 'ICSI H' || Treatment == 'ICSI H& D' || Treatment == 'ICSI D')
//{
//var ProjectronVisible = document.getElementById("ProjectronVisible").style.display = "block";
//}
function ProgesteroneAccept(){
var ProgesteroneAdminTable = document.getElementById("ProgesteroneAdminTable").style.display = "none";
}

function ProgesteroneCancel(){
var ProgesteroneAdminTable = document.getElementById("ProgesteroneAdminTable").style.display = "none";
}

function addDays(date, days) {
  const copy = new Date(Number(date))
  copy.setDate(date.getDate() + days)
  return copy
}

	function calculateDoseofGonadotropins() {
	}

	function calculateDoseofRFSHHMG()
	{
		var count = 0;
			var summ = 0;
		for (var x = 1; x < 24; x++) {
			var kk = "x_RFSH" + x;
			var Tablet = document.getElementById(kk).value;
			var SplitData = Tablet.split(" ");
			if (SplitData.length > 1) {
				count = parseInt(count) + 1;
				if(SplitData[0] == "Follisurge")
				{
					summ = parseInt( summ) + parseInt(SplitData[1]);
				}else{
					summ = parseInt( summ) + parseInt(SplitData[2]);
				}
			}
			var kk = "x_HMG" + x;
			var Tablet = document.getElementById(kk).value;
			var SplitData = Tablet.split(" ");
			if (SplitData.length > 1) {

				//count = parseInt(count) + 1;
				//summ = parseInt( summ) + parseInt(SplitData[1]);

				if(SplitData[0] == "HUMOG")
				{
					summ = parseInt( summ) + parseInt(SplitData[1]);
				}else{
					summ = parseInt( summ) + parseInt(SplitData[2]);
				}
			}
		}
		document.getElementById("x_DAYSOFSTIMULATION").value = count;
		document.getElementById("x_DOSEOFGONADOTROPINS").value = summ;
	}

function calculateDaysofGnRH()
{
var count = 0;
			var summ = 0;
		for (var x = 1; x < 24; x++) {
			var kk = "x_GnRH" + x;
			var Tablet = document.getElementById(kk).value;
			var SplitData = Tablet.split(" ");
			if (SplitData.length > 1) {
				count = parseInt(count) + 1;

			//	summ = parseInt( summ) + parseInt(SplitData[1]);
			}
		}
		document.getElementById("x_ANTAGONISTDAYS").value = count;
}

function addrowsintable()
{

//	var x=document.getElementById('tablechartadd');
//	var len = x.rows.length;
//	document.getElementById("trrow" + len).style.display = "block";

$('#tablechartadd tbody').find('tr:hidden:first').show();
}
</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$ivf_stimulation_chart_view->terminate();
?>